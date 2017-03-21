<?php
 
namespace Acme\UserBundle\Command;
 
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Acme\UserBundle\Entity\User;
use Acme\UserBundle\Entity\UE;
use Acme\UserBundle\Entity\Answer;
use Acme\UserBundle\Entity\Comment;
use Acme\UserBundle\Entity\Grp;
use Acme\UserBundle\Entity\pGrp;
use Acme\UserBundle\Entity\Post;
use Acme\UserBundle\Entity\UeGrp;

class ImportCommand extends ContainerAwareCommand
{
 
    protected function configure()
    {
        // Name and description for app/console command
        $this
        ->setName('import:csv')
        ->setDescription('Import users from CSV file')
		->addArgument(
                'name',
                InputArgument::OPTIONAL,
                'Who do you want to greet?'
            )
;
    }
 
    protected function execute(InputInterface $input, OutputInterface $output)
    {
		$name = $input->getArgument('name');
        // Showing when the script is launched
        $now = new \DateTime();
        $output->writeln('<comment>Start ['.$name.'] : ' . $now->format('d-m-Y G:i:s') . ' ---</comment>');
        
		$fileName = 'web/uploads/import/'.$name.'.txt';
		

		if($name  == 'Post')
		{
			$dirname = 'web/uploads/import/Post/';
			$dir = opendir($dirname); 
			while($file = readdir($dir)) {
				if($file != '.' && $file != '..' && !is_dir($dirname.$file))
				{
					$fileName = $file;
					$output->writeln('<comment>Start folder by file ['.$fileName.'] ---</comment>');
					// Importing on DB via Doctrine ORM
					$this->import($fileName,$input, $output);				
				}		
			}
			closedir($dir);
		}
		else
		{
			// Importing on DB via Doctrine ORM
			$this->import($fileName,$input, $output);		
		}

        // Showing when the script is over
        $now = new \DateTime();
        $output->writeln('<comment>End ['.$name.'] : ' . $now->format('d-m-Y G:i:s') . ' ---</comment>');
	}
    
    protected function import($fileName,InputInterface $input, OutputInterface $output)
    {
		$output->writeln('===> import[' .$fileName. ']');
		$name = $input->getArgument('name');
        // Getting php array of data from CSV
        $data = $this->get($fileName,$input, $output);
        
        // Getting doctrine manager
        $em = $this->getContainer()->get('doctrine')->getManager();
        // Turning off doctrine default logs queries for saving memory
        $em->getConnection()->getConfiguration()->setSQLLogger(null);
        
        // Define the size of record, the frequency for persisting the data and the current index of records
        $size = count($data);
        $batchSize = 20;
        $i = 1;
        
        // Starting progress
        $progress = new ProgressBar($output, $size);
        $progress->start();
        $output->writeln('Data size['.$size.']');
		
		if($name == 'Post')
		{
		/*
		title
		slug
		summary
		content
		authorEmail
		ko publishedAt
		*/
			$output->writeln('Post by file');
			// Processing on each row of data		
			foreach($data as $row) 
			{
				$output->writeln('a.Post by file');
				$post = $em->getRepository('AcmeUserBundle:Post')
						   ->findOneBySlug($row['slug']);
				//$output->writeln('slug[' .$row['slug']. ']');
				// If the post doest not exist we create one
				if(!is_object($post))
				{
					$post = new Post();
					$post->setSlug($row['slug']);
					$post->setTitle($row['title']);
					$post->setSummary($row['summary']);
					$post->setContent($row['content']);
					//$post->setAuthorEmail($row['authorEmail']);
					$post->setAuthorEmail('ayaponcho@hotmail.com');
					$post->setPublishedAt(new \DateTime());
					$post->setLabelAnswer1($row['labelAnswer']);
					$post->setAnswer1($row['answer']);
					$post->setCommentAnswer1($row['commentAnswer']);
					$em->persist($post);
				}
				else
				{
					$varLabeAns1 = $post->getLabelAnswer1();
					$varLabeAns2 = $post->getLabelAnswer2();
					$varLabeAns3 = $post->getLabelAnswer3();
					$varLabeAns4 = $post->getLabelAnswer4();
					$output->writeln('=> row[' .$row['labelAnswer']. 'vars[' .$varLabeAns1. '][' .$varLabeAns2. '][' .$varLabeAns3. '][' .$varLabeAns4. ']');
					if($varLabeAns1 !="" && $varLabeAns2=="")
					{
						$post->setLabelAnswer2($row['labelAnswer']);
						$post->setAnswer2($row['answer']);
						$post->setCommentAnswer2($row['commentAnswer']);
					}
					if($varLabeAns1 !="" && $varLabeAns2 !="" && $varLabeAns3=="")
					{
						$post->setLabelAnswer3($row['labelAnswer']);
						$post->setAnswer3($row['answer']);
						$post->setCommentAnswer3($row['commentAnswer']);
					}
					if( $varLabeAns1 !="" && $varLabeAns2 !="" && $varLabeAns3!="" && $varLabeAns4=="")
					{
						$post->setLabelAnswer4($row['labelAnswer']);
						$post->setAnswer4($row['answer']);
						$post->setCommentAnswer4($row['commentAnswer']);
					}
				}
				// Updating info
//				$post->setSlug($row['slug']);

				// Detaches all objects from Doctrine for memory save
				$em->flush();
				$em->clear();
				// Each 20 users persisted we flush everything
				if (($i % $batchSize) === 0) 
				{
					// Advancing for progress display on console
					$progress->advance($batchSize);
					$now = new \DateTime();
					$output->writeln(' of post imported ... | ' . $now->format('d-m-Y G:i:s'));
				}
				$i++;
			}
		}
		else if($name == 'User')
		{
			// Processing on each row of data
			foreach($data as $row) 
			{
				$user = $em->getRepository('AcmeUserBundle:User')
						   ->findOneByEmail($row['email']);
				// If the user doest not exist we create one
				if(!is_object($user)){
					$user = new User();
					$user->setEmail($row['email']);
				}
				// Updating info
				$user->setLastName($row['lastname']);
				$user->setFirstName($row['firstname']);
				$user->setUserName($row['username']);
				$user->setPassword($row['password']);
				// Do stuff here !
				// Persisting the current user
				$em->persist($user);
				// Each 20 users persisted we flush everything
				if (($i % $batchSize) === 0) 
				{
					$em->flush();
					// Detaches all objects from Doctrine for memory save
					$em->clear();
					// Advancing for progress display on console
					$progress->advance($batchSize);
					$now = new \DateTime();
					$output->writeln(' of users imported ... | ' . $now->format('d-m-Y G:i:s'));
				}
				$i++;
			}
		}
		else if($name == 'UE')
		{
		/*
		title
		ko publishedAt
		slug
		startContent
		endContent
		*/
		// Processing on each row of data
			foreach($data as $row) 
			{
				$ue = $em->getRepository('AcmeUserBundle:UE')
						   ->findOneByTitle($row['title']);
				// If the ue doest not exist we create one
				if(!is_object($ue)){
					$ue = new UE();
					$ue->setTitle($row['title']);
				}
				// Updating info
				//$ue->setPublishedAt($row['publishedAt']);
				$ue->setPublishedAt(new \DateTime());
				$ue->setSlug($row['slug']);
				$ue->setStartContent($row['startContent']);
				$ue->setEndContent($row['endContent']);
				// Do stuff here !
				// Persisting the current ue
				$em->persist($ue);
				// Each 20 ues persisted we flush everything
				if (($i % $batchSize) === 0) 
				{
					$em->flush();
					// Detaches all objects from Doctrine for memory save
					$em->clear();
					// Advancing for progress display on console
					$progress->advance($batchSize);
					$now = new \DateTime();
					$output->writeln(' of ues imported ... | ' . $now->format('d-m-Y G:i:s'));
				}
				$i++;
			}
		}
		else if($name == 'Answer')
		{
		/*
		content
		authorEmail
		ko publishedAt
		answer1
		answer2
		answer3
		answer4
		answer5
		answer6
		answer7
		answer8
		answer9
		answer10
		score
		*/
		// Processing on each row of data
			foreach($data as $row) 
			{
				$answer = $em->getRepository('AcmeUserBundle:Answer')
						   ->findOneByContent($row['content']);
				// If the Answer doest not exist we create one
				if(!is_object($answer)){
					$answer = new Answer();
					$answer->setContent($row['content']);
				}
				// Updating info
				$answer->setAuthorEmail($row['authorEmail']);
				//$answer->setPublishedAt($row['publishedAt']);
				$answer->setPublishedAt(new \DateTime());
				$answer->setAnswer1($row['answer1']);
				$answer->setAnswer2($row['answer2']);
				$answer->setAnswer3($row['answer3']);
				$answer->setAnswer4($row['answer4']);
				$answer->setAnswer5($row['answer5']);
				$answer->setAnswer6($row['answer6']);
				$answer->setAnswer7($row['answer7']);
				$answer->setAnswer8($row['answer8']);
				$answer->setAnswer9($row['answer9']);
				$answer->setAnswer10($row['answer10']);
				$answer->setScore($row['score']);
				// Do stuff here !
				// Persisting the current answer
				$em->persist($answer);
				// Each 20 answers persisted we flush everything
				if (($i % $batchSize) === 0) 
				{
					$em->flush();
					// Detaches all objects from Doctrine for memory save
					$em->clear();
					// Advancing for progress display on console
					$progress->advance($batchSize);
					$now = new \DateTime();
					$output->writeln(' of answers imported ... | ' . $now->format('d-m-Y G:i:s'));
				}
				$i++;
			}
		}
		else if($name == 'Grp')
		{
		/*
		title
		ko publishedAt
		slug
		startContent
		endContent
		*/
		// Processing on each row of data
			foreach($data as $row) 
			{
				$grp = $em->getRepository('AcmeUserBundle:Grp')
						   ->findOneBySlug($row['slug']);
				// If the grp doest not exist we create one
				if(!is_object($grp)){
					$grp = new Grp();
					$grp->setTitle($row['title']);
				}
				// Updating info
				//$grp->setPublishedAt($row['publishedAt']);
				$grp->setPublishedAt(new \DateTime());
				$grp->setSlug($row['slug']);
				$grp->setStartContent($row['startContent']);
				$grp->setEndContent($row['endContent']);
				// Do stuff here !
				// Persisting the current grp
				$em->persist($grp);
				// Each 20 grp persisted we flush everything
				if (($i % $batchSize) === 0) 
				{
					$em->flush();
					// Detaches all objects from Doctrine for memory save
					$em->clear();
					// Advancing for progress display on console
					$progress->advance($batchSize);
					$now = new \DateTime();
					$output->writeln(' of grp imported ... | ' . $now->format('d-m-Y G:i:s'));
				}
				$i++;
			}
		}
		else if($name == 'pGrp')
		{
		/*
		title
		publishedAt
		*/
		// Processing on each row of data
			foreach($data as $row) 
			{
				$pGrp = $em->getRepository('AcmeUserBundle:pGrp')
						   ->findOneByTitle($row['title']);
				// If the pGrp doest not exist we create one
				if(!is_object($pGrp)){
					$pGrp = new pGrp();
					$pGrp->setTitle($row['title']);
				}
				// Updating info
				//$pGrp->setPublishedAt($row['publishedAt']);
				$pGrp->setPublishedAt(new \DateTime());
				// Do stuff here !
				// Persisting the current pGrp
				$em->persist($pGrp);
				// Each 20 pGrp persisted we flush everything
				if (($i % $batchSize) === 0) 
				{
					$em->flush();
					// Detaches all objects from Doctrine for memory save
					$em->clear();
					// Advancing for progress display on console
					$progress->advance($batchSize);
					$now = new \DateTime();
					$output->writeln(' of pGrp imported ... | ' . $now->format('d-m-Y G:i:s'));
				}
				$i++;
			}
		}
		else if($name == 'ueGrp')
		{
		/*
		title
		publishedAt
		*/
		// Processing on each row of data
			foreach($data as $row) 
			{
				$ueGrp = $em->getRepository('AcmeUserBundle:ueGrp')
						   ->findOneByTitle($row['grp_slug']);
				// If the ueGrp doest not exist we create one
				if(!is_object($ueGrp)){
					$ueGrp = new ueGrp();
					$ueGrp->setTitle($row['grp_slug']);
				}
				// Updating info
				$ueGrp->setPublishedAt(new \DateTime());
				$output->writeln('start $row["grp_slug"] =>'.$row['grp_slug']. '<=');
//récupérer le slug ue 
			//$doctrine = $this->get('doctrine');
			//$doctrine = $this->getDoctrine();
				//$em = $this->getDoctrine()->getManager();
//				$em = $this->get('doctrine.orm.entity_manager');
				$em = $this->getContainer()->get('doctrine')->getManager();
				//$ueSlug ='ue1';
				//$output->writeln('1 $row["grp_slug"] =>'.$row['grp_slug']. '<=');
				$ueSlug = $row['ue_slug'];
				//$output->writeln('2 $row["grp_slug"] =>'.$row['grp_slug']. '<=');
				$ue = $em->getRepository('AcmeUserBundle:UE')->findUeByName($ueSlug);
				//convertir slug ue en entité ue
				//associé ue dans ueGrp
				//$output->writeln('3 $row["grp_slug"] =>'.$row['grp_slug']. '<=');
				$ueGrp->setUe($ue);
				//$output->writeln('ue $row["grp_slug"] =>'.$row['grp_slug']. '<=');
				$em = $this->getContainer()->get('doctrine')->getManager();
				$grpSlug = $row['grp_slug'];
				//$grpSlug ='ue1';
				$grp = $em->getRepository('AcmeUserBundle:Grp')->findGrpByName($grpSlug);
				//convertir slug grp en entité grp
				//associé grp dans ueGrp
				$ueGrp->setGrp($grp);
				//$output->writeln('end $row["grp_slug"] =>'.$row['grp_slug']. '<=');
				
				//$ueGrp->setPublishedAt($row['publishedAt']);
				// Do stuff here !
				// Persisting the current ueGrp
				$em->persist($ueGrp);
				// Each 20 ueGrp persisted we flush everything
				if (($i % $batchSize) === 0) 
				{
					$em->flush();
					// Detaches all objects from Doctrine for memory save
					$em->clear();
					// Advancing for progress display on console
					$progress->advance($batchSize);
					$now = new \DateTime();
					$output->writeln(' of ueGrp imported ... | ' . $now->format('d-m-Y G:i:s'));
				}
				$i++;
			}
		}
		else if($name == 'Comment')
		{
		/*
		content
		authorEmail
		publishedAt
		*/
		// Processing on each row of data
			foreach($data as $row) 
			{
				$comment = $em->getRepository('AcmeUserBundle:Comment')
						   ->findOneByContent($row['content']);
				// If the comment doest not exist we create one
				if(!is_object($comment)){
					$comment = new Comment();
					$comment->setContent($row['content']);
				}
				// Updating info
				$comment->setAuthorEmail($row['authorEmail']);
				$comment->setPublishedAt(new \DateTime());
				//$comment->setPublishedAt($row['publishedAt']);
				// Do stuff here !
				// Persisting the current comment
				$em->persist($comment);
				// Each 20 comments persisted we flush everything
				if (($i % $batchSize) === 0) 
				{
					$em->flush();
					// Detaches all objects from Doctrine for memory save
					$em->clear();
					// Advancing for progress display on console
					$progress->advance($batchSize);
					$now = new \DateTime();
					$output->writeln(' of comments imported ... | ' . $now->format('d-m-Y G:i:s'));
				}
				$i++;
			}
		}
		else
		{
			$now = new \DateTime();
			$output->writeln('<comment>Entity ['.$name.'] not found ! ' . $now->format('d-m-Y G:i:s') . ' ---</comment>');

		}
		
		// Flushing and clear data on queue
        $em->flush();
        $em->clear();
		
		// Ending the progress bar process
        $progress->finish();
    }
 
	protected function entityImport($fileName,InputInterface $input, OutputInterface $output)
    {
		/*
		$name = $input->getArgument('name');
        // Getting php array of data from CSV
        $data = $this->get($fileName,$input, $output);
        
        // Getting doctrine manager
        $em = $this->getContainer()->get('doctrine')->getManager();
        // Turning off doctrine default logs queries for saving memory
        $em->getConnection()->getConfiguration()->setSQLLogger(null);
        
        // Define the size of record, the frequency for persisting the data and the current index of records
        $size = count($data);
        $batchSize = 20;
        $i = 1;
        
        // Starting progress
        $progress = new ProgressBar($output, $size);
        $progress->start();
        
		if($name == 'User')
		{
			// Processing on each row of data
			foreach($data as $row) 
			{
				$user = $em->getRepository('AcmeUserBundle:User')
						   ->findOneByEmail($row['email']);
				// If the user doest not exist we create one
				if(!is_object($user)){
					$user = new User();
					$user->setEmail($row['email']);
				}
				// Updating info
				$user->setLastName($row['lastname']);
				$user->setFirstName($row['firstname']);
				$user->setUserName($row['username']);
				$user->setPassword($row['password']);
				// Do stuff here !
		
				// Persisting the current user
				$em->persist($user);
				
				// Each 20 users persisted we flush everything
				if (($i % $batchSize) === 0) {
	 
					$em->flush();
					// Detaches all objects from Doctrine for memory save
					$em->clear();
					
					// Advancing for progress display on console
					$progress->advance($batchSize);
					
					$now = new \DateTime();
					$output->writeln(' of users imported ... | ' . $now->format('d-m-Y G:i:s'));
	 
				}
	 
				$i++;
	 
			}
		}
		*/
	}
	
    protected function get($fileName, InputInterface $input, OutputInterface $output) 
    {
        // Getting the CSV from filesystem
        //$fileName = 'web/uploads/import/users.csv';
        
        // Using service for converting CSV to PHP Array
        $converter = $this->getContainer()->get('import.csvtoarray');
        $data = $converter->convert($fileName, '|');
        
        return $data;
    }
    
}

