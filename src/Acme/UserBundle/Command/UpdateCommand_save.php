<?php 
 
namespace Acme\UserBundle\Command;
 
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class UpdateCommand extends ContainerAwareCommand
{
 
    protected function configure()
    {
        // Name and description for app/console command
        $this
        ->setName('update:file')
        ->setDescription('Update from CSV file')
		->addArgument(
                'name',
                InputArgument::OPTIONAL,
                'Who do you want to greet?'
            );
    }
	

    
	protected function execute(InputInterface $input, OutputInterface $output)
    {
		function last_index_of($sub_str,$instr) 
		{ 
		if(strstr($instr,$sub_str)!="") { 
		return(strlen($instr)-strpos(strrev($instr),$sub_str)); 
		} 
		return(-1); 
		} 

		$name = $input->getArgument('name');
        // Showing when the script is launched
        $now = new \DateTime();
		
        $output->writeln('<comment>Start $name['.$name.'] : ' . $now->format('d-m-Y G:i:s') . ' ---</comment>');
        
//		$fileName = 'web/uploads/import/'.$name;
		$dirname = 'web/uploads/import/'.$name.'/';

		$patterns = array();
		//tabulation
		$replacements = array();

//		$patterns[1]=/'/';	$replacements[1]="'";//==> a corriger.
		$patterns[2]='/\t/';	$replacements[2]="|";//==> a corriger.
//		$patterns[2]='/&/';	$replacements[2]='&amp;';
//		$patterns[3]='/�/';	$replacements[3]='&euro;';
//		$patterns[4]='/</';	$replacements[4]='&lt;';
//		$patterns[5]='/>/';	$replacements[5]='&gt;';
//		$patterns[6]='/�/';	$replacements[6]='&oelig;';
//		$patterns[7]='/Y/';	$replacements[7]='&Yuml;';
	//	$patterns[8]='/Space/';	$replacements[8]='&nbsp;';
	//	$patterns[9]='/�/';	$replacements[9]='&iexcl;';
	//	$patterns[10]='/�/';	$replacements[10]='&cent;';
	//	$patterns[11]='/�/';	$replacements[11]='&pound;';
	////	$patterns[12]='/�/';	$replacements[12]='&curren;';
	//	$patterns[13]='/�/';	$replacements[13]='&yen';
	//	$patterns[14]='/�/';	$replacements[14]='&brvbar;';
	//	$patterns[15]='/�/';	$replacements[15]='&sect;';
	//	$patterns[16]='/�/';	$replacements[16]='&uml;';
//		$patterns[17]='/�/';	$replacements[17]='&copy;';
	//	$patterns[18]='/�/';	$replacements[18]='&ordf;';
	//	$patterns[19]='/�/';	$replacements[19]='&laquo;';
	//	$patterns[20]='/�/';	$replacements[20]='&not;';
	//	$patterns[21]='/�/';	$replacements[21]='&shy;';
	//	$patterns[22]='/�/';	$replacements[22]='&reg;';
	//	$patterns[23]='/�/';	$replacements[23]='&masr;';
	//	$patterns[24]='/�/';	$replacements[24]='&deg;';
	//	$patterns[25]='/�/';	$replacements[25]='&plusmn;';
	//	$patterns[26]='/�/';	$replacements[26]='&sup2;';
	//	$patterns[27]='/�/';	$replacements[27]='&sup3;';
	//	//$patterns[28]='/'/';	$replacements[28]='&acute;';
		$patterns[29]='/�/';	$replacements[29]='&micro;';
//		$patterns[30]='/�/';	$replacements[30]='&para;';
//		$patterns[31]='/�/';	$replacements[31]='&middot;';
//		$patterns[32]='/�/';	$replacements[32]='&cedil;';
//		$patterns[33]='/�/';	$replacements[33]='&sup1;';
//		$patterns[34]='/�/';	$replacements[34]='&ordm;';
//		$patterns[35]='/�/';	$replacements[35]='&raquo;';
//		$patterns[36]='/�/';	$replacements[36]='&frac14;';
//		$patterns[37]='/�/';	$replacements[37]='&frac12;';
//		$patterns[38]='/�/';	$replacements[38]='&frac34;';
//		$patterns[39]='/�/';	$replacements[39]='&iquest;';
//		$patterns[40]='/�/';	$replacements[40]='&Agrave;';
//		$patterns[41]='/�/';	$replacements[41]='&Aacute;';
//		$patterns[42]='/�/';	$replacements[42]='&Acirc;';
//		$patterns[43]='/�/';	$replacements[43]='&Atilde;';
//		$patterns[44]='/�/';	$replacements[44]='&Auml;';
//		$patterns[45]='/�/';	$replacements[45]='&Aring;';
//		$patterns[46]='/�/';	$replacements[46]='&Aelig';
//		$patterns[47]='/�/';	$replacements[47]='&Ccedil;';
		$patterns[48]='/�/';	$replacements[48]='&Egrave;';
		$patterns[49]='/�/';	$replacements[49]='&Eacute;';
		$patterns[50]='/�/';	$replacements[50]='&Ecirc;';
		$patterns[51]='/�/';	$replacements[51]='&Euml;';
	//	$patterns[52]='/�/';	$replacements[52]='&Igrave;';
	//	$patterns[53]='/�/';	$replacements[53]='&Iacute;';
		$patterns[54]='/�/';	$replacements[54]='&Icirc;';
		$patterns[55]='/�/';	$replacements[55]='&Iuml;';
	//	$patterns[56]='/�/';	$replacements[56]='&eth;';
//		$patterns[57]='/�/';	$replacements[57]='&Ntilde;';
	//	$patterns[58]='/�/';	$replacements[58]='&Ograve;';
	//	$patterns[59]='/�/';	$replacements[59]='&Oacute;';
		$patterns[60]='/�/';	$replacements[60]='&Ocirc;';
//		$patterns[61]='/�/';	$replacements[61]='&Otilde;';
		$patterns[62]='/�/';	$replacements[62]='&Ouml;';
	//	$patterns[63]='/�/';	$replacements[63]='&times;';
	//	$patterns[64]='/�/';	$replacements[64]='&Oslash;';
		$patterns[65]='/�/';	$replacements[65]='&Ugrave;';
		$patterns[66]='/�/';	$replacements[66]='&Uacute;';
		$patterns[67]='/�/';	$replacements[67]='&Ucirc;';
		$patterns[68]='/�/';	$replacements[68]='&Uuml;';
		$patterns[69]='/�/';	$replacements[69]='&Yacute;';
	//	$patterns[70]='/�/';	$replacements[70]='&thorn;';
	//	$patterns[71]='/�/';	$replacements[71]='&szlig;';
		$patterns[72]='/�/';	$replacements[72]='&agrave;';
		$patterns[73]='/�/';	$replacements[73]='&aacute;';
		$patterns[74]='/�/';	$replacements[74]='&acirc;';
//		$patterns[75]='/�/';	$replacements[75]='&atilde;';
		$patterns[76]='/�/';	$replacements[76]='&auml;';
	//	$patterns[77]='/�/';	$replacements[77]='&aring;';
		$patterns[78]='/�/';	$replacements[78]='&aelig;';
		$patterns[79]='/�/';	$replacements[79]='&ccedil;';
		$patterns[80]='/�/';	$replacements[80]='&egrave;';
		$patterns[81]='/�/';	$replacements[81]='&eacute;';
		$patterns[82]='/�/';	$replacements[82]='&ecirc;';
		$patterns[83]='/�/';	$replacements[83]='&euml;';
		$patterns[84]='/�/';	$replacements[84]='&igrave;';
		$patterns[85]='/�/';	$replacements[85]='&iacute;';
		$patterns[86]='/�/';	$replacements[86]='&icirc;';
		$patterns[87]='/�/';	$replacements[87]='&iuml;';
	//	$patterns[88]='/�/';	$replacements[88]='&eth;';
//		$patterns[89]='/�/';	$replacements[89]='&ntilde;';
	//	$patterns[90]='/�/';	$replacements[90]='&ograve;';
	//	$patterns[91]='/�/';	$replacements[91]='&oacute;';
		$patterns[92]='/�/';	$replacements[92]='&ocirc;';
//		$patterns[93]='/�/';	$replacements[93]='&otilde;';
		$patterns[94]='/�/';	$replacements[94]='&ouml;';
	//	$patterns[95]='/�/';	$replacements[95]='&divide;';
	//	$patterns[96]='/�/';	$replacements[96]='&oslash;';
		$patterns[97]='/�/';	$replacements[97]='&ugrave;';
		$patterns[98]='/�/';	$replacements[98]='&uacute;';
		$patterns[99]='/�/';	$replacements[99]='&ucirc;';
		$patterns[100]='/�/';	$replacements[100]='&uuml;';
	//	$patterns[101]='/�/';	$replacements[101]='&yacute;';
	//	$patterns[102]='/�/';	$replacements[102]='&thorn;';
	//	$patterns[103]='/�/';	$replacements[103]='&yuml;';


		$dir = opendir($dirname); 
		while($file = readdir($dir)) {
			if($file != '.' && $file != '..' && !is_dir($dirname.$file))
			{
				
				$fileName = $dirname.$file;
				$text=fopen($fileName,'r') or die("Fichier manquant"); 
				$contenu=file_get_contents($fileName); 
				$contenuMod=preg_replace($patterns, $replacements, $contenu);
				fclose($text); 
				$iOLastSlash = last_index_of("/",$fileName);	
//substr_replace()
				$justName = substr($fileName,-$iOLastSlash);
				$output->writeln('<comment>Start $justName['.$justName.'] iOLastSlash['.$iOLastSlash.']: ' . $now->format('d-m-Y G:i:s') . ' ---</comment>');
				$iOextension = last_index_of(".",$fileName);	
				//$justName = substr($justName,0,-$iOextension);
			$output->writeln('<comment>Start $justName['.$justName.'] iOLastSlash['.$iOLastSlash.']: ' . $now->format('d-m-Y G:i:s') . ' ---</comment>');
			
				$text2=fopen($fileName,'w+') or die("Fichier manquant"); 
				fwrite($text2,$contenuMod); 
				fclose($text2); 
				//echo 'file['.$dirname.$file.']';
			}
		}
		closedir($dir);
//		$contenuMod=str_replace('�', '&eacute;', $contenu); 

		//working	
        // Showing when the script is over
        $now = new \DateTime();
        $output->writeln('<comment>End ['.$name.'] : ' . $now->format('d-m-Y G:i:s') . ' ---</comment>');
    /*
	

/*
$patterns = array();
$patterns[0] = '/�/';
$patterns[1] = '/�/';
$patterns[2] = '/�/';
$replacements = array();
$replacements[0] = '&ecute;';
$replacements[1] = '&egrave;';
$replacements[2] = '&ecirc;';
///$output->writeln('<comment>row1 ['.$row.']');
$row = preg_replace($patterns, $replacements, $row);
///$output->writeln('<comment>row2 ['.$row.']');
*/
	}

}

