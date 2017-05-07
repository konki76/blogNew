<?php

namespace Acme\UserBundle\Command;

use Acme\UserBundle\Entity\Answer;
use Acme\UserBundle\Entity\Comment;
use Acme\UserBundle\Entity\Grp;
use Acme\UserBundle\Entity\pGrp;
use Acme\UserBundle\Entity\Post;
use Acme\UserBundle\Entity\Qcm;
use Acme\UserBundle\Entity\UE;
use Acme\UserBundle\Entity\UeGrp;
use Acme\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

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
        function last_index_of($sub_str, $instr)
        {
            if (strstr($instr, $sub_str)!="") {
                return(strlen($instr)-strpos(strrev($instr), $sub_str));
            }
            return(-1);
        }
        $name = $input->getArgument('name');
        // Showing when the script is launched
        $now = new \DateTime();
        $output->writeln('<comment>Start ['.$name.'] : ' . $now->format('d-m-Y G:i:s') . ' ---</comment>');
        
        $fileName = 'web/uploads/import/'.$name.'.txt';

        //a nettoyer
        $dirname = 'web/uploads/import/Qcm/';
        $dir = opendir($dirname);
        $file = readdir($dir);

        if ($name == 'curl') {
            $output->writeln('<comment>start CURL ['.$name.'] : ' . $now->format('d-m-Y G:i:s') . ' ---</comment>');
        // create a new cURL resource
//			curl_setopt($ch, CURLOPT_URL, 'https://francetv-test.neolane.net/ftv/ApiAboDesaboSite.jssp?token=nuez9RmhxRnp2OvygsuiBHsVavnsZXb9&email=alex.planchot_test@gmail.com&source=SITE&detailSource=lesitetv&json=[{"optin":"ftvOptLeSiteTv","action":"A"}]');

            $ch = curl_init();// init curl
            //curl_setopt($ch, CURLOPT_URL,'https://francetv-test.neolane.net/ftv/ApiAboDesaboSite.jssp?token=nuez9RmhxRnp2OvygsuiBHsVavnsZXb9&email=alex.planchot_test@gmail.com&source=SITE&detailSource=lesitetv&json=[{"optin":"ftvOptLeSiteTv","action":"A"}]');
            curl_setopt($ch, CURLOPT_URL, 'http://google.fr');
            // receive server response ...
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);// gives you a response from the server
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($ch);// response it ouputed in the response var
            $output->writeln('<comment>RETOUR CURL ['.$response.'] : ' . $now->format('d-m-Y G:i:s') . ' ---</comment>');
            curl_close($ch);// close curl connection
            
            
        $output->writeln('<comment>end CURL ['.$name.'] : ' . $now->format('d-m-Y G:i:s') . ' ---</comment>');
        }

        
        if ($name  == 'Qcm') {
            $dirname = 'web/uploads/import/Qcm/';
            $output->writeln('<comment>dirname ['.$dirname.'] : ' . $now->format('d-m-Y G:i:s') . ' ---</comment>');
        

            while ($file = readdir($dir)) {
                if ($file != '.' && $file != '..' && !is_dir($dirname.$file)) {
                    $fileName = $dirname.$file;
                    $output->writeln('<comment>Start folder by file ['.$fileName.'] ---</comment>');
                    // Importing on DB via Doctrine ORM
                    $this->import($file, $fileName, $input, $output);
                }
            }
            closedir($dir);
        } elseif ($name  == 'pGrp') {
            $dirname = 'web/uploads/import/pGrp/';
            $output->writeln('<comment>dirname ['.$dirname.'] : ' . $now->format('d-m-Y G:i:s') . ' ---</comment>');
        
            $dir = opendir($dirname);
            while ($file = readdir($dir)) {
                if ($file != '.' && $file != '..' && !is_dir($dirname.$file)) {
                    $fileName = $dirname.$file;
                    $output->writeln('<comment>Start folder by file ['.$file.'] ---</comment>');
                    // Importing on DB via Doctrine ORM
                    $this->import($file, $fileName, $input, $output);
                }
            }
            closedir($dir);
        } else {
            // Importing on DB via Doctrine ORM
            $this->import($file, $fileName, $input, $output);
        }

        // Showing when the script is over
        $now = new \DateTime();
        $output->writeln('<comment>End ['.$name.'] : ' . $now->format('d-m-Y G:i:s') . ' ---</comment>');
    }
    
    protected function import($file, $fileName, InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');
        $output->writeln('===> import[' .$fileName. '] $file['.$file.']  $name['.$name.']');
        // Getting php array of data from CSV
        $data = $this->get($fileName, $input, $output);
        
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
        $output->writeln('Data size['.$size.']$fileName['.$fileName.']');
        if ($name == 'pGrp') {
            /*
        QcmSlug
        grpSlug
        publishedAt
        */
        
            $iOextension = last_index_of(".", $file);
            $fileLengh = strlen($file);
            $fileNew = substr($file, 0, $iOextension-1);
            $output->writeln('<comment>[pGrp]Start $fileLengh['.$fileLengh.'] $fileNew['.$fileNew.'] iOextension['.$iOextension.'] --</comment>');

            //$output->writeln('pGrp by file');
            // Processing on each row of data
            foreach ($data as $row) {
                //	$output->writeln('a.Qcm by file');
            //Vérifie si QcmSlug existe déja
            //(à étudier)  vérification QcmSlug + grpSlug
                $pGrp = $em->getRepository('AcmeUserBundle:pGrp')
                           ->findOneByQcmSlug($row['slug']);
                //$output->writeln('slug[' .$row['slug']. ']');
                // If the pGrp doest not exist we create one
                if (!is_object($pGrp)) {
                    $pGrp = new pGrp();
                    $pGrp->setPublishedAt(new \DateTime());
                    $pGrp->setQcmSlug($row['slug']);
                    //recherche QcmId
                    $Qcm = $em->getRepository('AcmeUserBundle:Qcm')
                           ->findOneBySlug($row['slug']);
                    $pGrp->setQcm($Qcm);
                    
                    //filename sans la racine
                    $pGrp->setGrpSlug($fileNew);
                    //recherche grpId
                    $grp = $em->getRepository('AcmeUserBundle:Grp')
                           ->findOneBySlug($fileNew);
                    //$output->writeln('<comment>====> $fileNew['.$fileNew.'] $grp['.$grp->getTitle().'] --</comment>');
                    //$output->writeln('<comment>====> $fileNew['.$fileNew.'] --</comment>');
                    
                    $pGrp->setGrp($grp);

                    $em->persist($pGrp);
                }
                $em->flush();
                $em->clear();
                //else
                //	$output->writeln('pGrp exists !');
            }
        } elseif ($name == 'Post') {
            /*
        labelAnswer
        slug
        summary
        content
        authorEmail
        ko publishedAt
        */
            $output->writeln('Post by file');
            // Processing on each row of data
            foreach ($data as $row) {
                //	$output->writeln('a.Qcm by file');
                $Post = $em->getRepository('AcmeUserBundle:Post')
                           ->findOneBySlug($row['slug']);
                //$output->writeln('slug[' .$row['slug']. ']');
                // If the Post doest not exist we create one
                $ans = false;
                if (!is_object($Post)) {
                    $Post = new Post();
                    $Post->setSlug($row['labelAnswer']);
                    $Post->setSlug($row['slug']);
                    $Post->setTitle($row['title']);
                    $Post->setSummary($row['summary']);
                    $Post->setContent($row['content']);
                    $Post->setAuthorEmail('ayaponcho@hotmail.com');
                    $Post->setPublishedAt(new \DateTime());
                    $em->persist($Post);
                }
            }
        } elseif ($name == 'Qcm') {
            /*
        title
        slug
        summary
        content
        authorEmail
        ko publishedAt
        */
            $output->writeln('Qcm by file');
            // Processing on each row of data
            foreach ($data as $row) {
                //	$output->writeln('a.Qcm by file');
                $Qcm = $em->getRepository('AcmeUserBundle:Qcm')
                           ->findOneBySlug($row['slug']);
                //$output->writeln('slug[' .$row['slug']. ']');
                // If the Qcm doest not exist we create one
                $ans = false;
                if (!is_object($Qcm)) {
                    $Qcm = new Qcm();
                    $Qcm->setSlug($row['slug']);
                    $Qcm->setTitle($row['title']);
                    $Qcm->setSummary($row['summary']);
                    $Qcm->setContent($row['content']);
                    if ($row['answer'] == 'VRAI') {
                        $ans = true;
                    }
                    $Qcm->setAnswer1($ans);
                    //$Qcm->setAuthorEmail($row['authorEmail']);
                    $Qcm->setAuthorEmail('ayaponcho@hotmail.com');
                    $Qcm->setPublishedAt(new \DateTime());
                    $Qcm->setLabelAnswer1($row['labelAnswer']);
                    $Qcm->setAnswer1($row['answer']);
                    $Qcm->setCommentAnswer1($row['commentAnswer']);
                    $em->persist($Qcm);
                } else {
                    $varLabeAns1 = $Qcm->getLabelAnswer1();
                    $varLabeAns2 = $Qcm->getLabelAnswer2();
                    $varLabeAns3 = $Qcm->getLabelAnswer3();
                    $varLabeAns4 = $Qcm->getLabelAnswer4();
                    $varLabeAns5 = $Qcm->getLabelAnswer5();
                    //					$output->writeln('=> row[' .$row['labelAnswer']. 'vars[' .$varLabeAns1. '][' .$varLabeAns2. '][' .$varLabeAns3. '][' .$varLabeAns4. ']');
                    if ($varLabeAns1 !="" && $varLabeAns2=="") {
                        $Qcm->setLabelAnswer2($row['labelAnswer']);
                        $Qcm->setAnswer2($row['answer']);
                        $Qcm->setCommentAnswer2($row['commentAnswer']);
                        if ($row['answer'] == 'VRAI') {
                            $ans = true;
                        }
                        $Qcm->setAnswer2($ans);
                    }
                    if ($varLabeAns1 !="" && $varLabeAns2 !="" && $varLabeAns3=="") {
                        $Qcm->setLabelAnswer3($row['labelAnswer']);
                        $Qcm->setAnswer3($row['answer']);
                        $Qcm->setCommentAnswer3($row['commentAnswer']);
                        if ($row['answer'] == 'VRAI') {
                            $ans = true;
                        }
                        $Qcm->setAnswer3($ans);
                    }
                    if ($varLabeAns1 !="" && $varLabeAns2 !="" && $varLabeAns3!="" && $varLabeAns4=="") {
                        $Qcm->setLabelAnswer4($row['labelAnswer']);
                        $Qcm->setAnswer4($row['answer']);
                        $Qcm->setCommentAnswer4($row['commentAnswer']);
                        if ($row['answer'] == 'VRAI') {
                            $ans = true;
                        }
                        $Qcm->setAnswer4($ans);
                    }
                    if ($varLabeAns1 !="" && $varLabeAns2 !="" && $varLabeAns3!="" && $varLabeAns4==""&& $varLabeAns5=="") {
                        $Qcm->setLabelAnswer5($row['labelAnswer']);
                        $Qcm->setAnswer5($row['answer']);
                        $Qcm->setCommentAnswer5($row['commentAnswer']);
                        if ($row['answer'] == 'VRAI') {
                            $ans = true;
                        }
                        $Qcm->setAnswer5($ans);
                    }
                }
                // Updating info
//				$Qcm->setSlug($row['slug']);

                // Detaches all objects from Doctrine for memory save
                $em->flush();
                $em->clear();
                // Each 20 users persisted we flush everything
                if (($i % $batchSize) === 0) {
                    // Advancing for progress display on console
                    $progress->advance($batchSize);
                    $now = new \DateTime();
                    //$output->writeln(' of Qcm imported ... | ' . $now->format('d-m-Y G:i:s'));
                }
                $i++;
            }
        } elseif ($name == 'User') {
            // Processing on each row of data
            foreach ($data as $row) {
                $user = $em->getRepository('AcmeUserBundle:User')
                           ->findOneByEmail($row['email']);
                // If the user doest not exist we create one
                if (!is_object($user)) {
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
        } elseif ($name == 'UE') {
            /*
        title
        ko publishedAt
        slug
        startContent
        endContent
        */
        // Processing on each row of data
            foreach ($data as $row) {
                $ue = $em->getRepository('AcmeUserBundle:UE')
                           ->findOneByTitle($row['title']);
                // If the ue doest not exist we create one
                if (!is_object($ue)) {
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
                if (($i % $batchSize) === 0) {
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
        } elseif ($name == 'Answer') {
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
            foreach ($data as $row) {
                $answer = $em->getRepository('AcmeUserBundle:Answer')
                           ->findOneByContent($row['content']);
                // If the Answer doest not exist we create one
                if (!is_object($answer)) {
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
                if (($i % $batchSize) === 0) {
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
        } elseif ($name == 'Grp') {
            /*
        title
        ko publishedAt
        slug
        startContent
        endContent
        */
        // Processing on each row of data
            foreach ($data as $row) {
                $grp = $em->getRepository('AcmeUserBundle:Grp')
                           ->findOneBySlug($row['slug']);
                // If the grp doest not exist we create one
                if (!is_object($grp)) {
                    $grp = new Grp();
                    $grp->setTitle($row['title']);
                }
                // Updating info
                //$grp->setPublishedAt($row['publishedAt']);
                $grp->setPublishedAt(new \DateTime());
                $grp->setOrdre($row['ordre']);
                $grp->setSlug($row['slug']);
                $grp->setUe($row['ue']);
                $grp->setStartContent($row['startContent']);
                $grp->setEndContent($row['endContent']);
                // Do stuff here !
                // Persisting the current grp
                $em->persist($grp);
                // Each 20 grp persisted we flush everything
                if (($i % $batchSize) === 0) {
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
        } elseif ($name == 'ueGrp') {
            /*
        title
        publishedAt
        */
        // Processing on each row of data
            foreach ($data as $row) {
                $ueGrp = $em->getRepository('AcmeUserBundle:ueGrp')
                           ->findOneByTitle($row['grp_slug']);
                // If the ueGrp doest not exist we create one
                if (!is_object($ueGrp)) {
                    $ueGrp = new ueGrp();
                    $ueGrp->setTitle($row['grp_slug']);
                }
                // Updating info
                $ueGrp->setPublishedAt(new \DateTime());
                $output->writeln('start $row["grp_slug"] =>'.$row['grp_slug']. '<=');
                $em = $this->getContainer()->get('doctrine')->getManager();
                //$ueSlug ='ue1';
                //$output->writeln('1 $row["grp_slug"] =>'.$row['grp_slug']. '<=');
                $ueSlug = $row['ue_slug'];
                $output->writeln('2 $row["grp_slug"] =>'.$row['grp_slug']. '<=');
                $ue = $em->getRepository('AcmeUserBundle:UE')->findOneBySlug($ueSlug);
//				$ue = $em->getRepository('AcmeUserBundle:UE')->findUeByName($ueSlug);
                //convertir slug ue en entité ue
                //associé ue dans ueGrp
                //$output->writeln('======ue =>'.$ue. '<=');
                $ueGrp->setUe($ue);
                $em = $this->getContainer()->get('doctrine')->getManager();
                $grpSlug = $row['grp_slug'];
                //$grpSlug ='ue1';
                $output->writeln('===> grpSlug =>'.$grpSlug. '<=');
//				$grp = $em->getRepository('AcmeUserBundle:Grp')->findGrpByName($grpSlug);
                $grp = $em->getRepository('AcmeUserBundle:Grp')->findOneBySlug($grpSlug);
                $output->writeln('===> grp =>'.$grp. '<=');
                //convertir slug grp en entité grp
                //associé grp dans ueGrp
                $ueGrp->setGrp($grp);
                //$output->writeln('end $row["grp_slug"] =>'.$row['grp_slug']. '<=');
                
                //$ueGrp->setPublishedAt($row['publishedAt']);
                // Do stuff here !
                // Persisting the current ueGrp
                $em->persist($ueGrp);
                // Each 20 ueGrp persisted we flush everything
                if (($i % $batchSize) === 0) {
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
        } elseif ($name == 'Comment') {
            /*
        content
        authorEmail
        publishedAt
        */
        // Processing on each row of data
            foreach ($data as $row) {
                $comment = $em->getRepository('AcmeUserBundle:Comment')
                           ->findOneByContent($row['content']);
                // If the comment doest not exist we create one
                if (!is_object($comment)) {
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
                if (($i % $batchSize) === 0) {
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
        } else {
            $now = new \DateTime();
            $output->writeln('<comment>Entity ['.$name.'] not found ! ' . $now->format('d-m-Y G:i:s') . ' ---</comment>');
        }
        
        // Flushing and clear data on queue
        $em->flush();
        $em->clear();
        
        // Ending the progress bar process
        $progress->finish();
    }
 
/*	protected function entityImport($file,$filename,$fileName,InputInterface $input, OutputInterface $output)
    {

    }
*/
    protected function get($fileName, InputInterface $input, OutputInterface $output)
    {
        // Getting the CSV from filesystem
       // $fileName = 'web/uploads/import/Grp.csv';
        
        // Using service for converting CSV to PHP Array
        $converter = $this->getContainer()->get('import.csvtoarray');
        $data = $converter->convert($fileName, '|');
        
        return $data;
    }
}
