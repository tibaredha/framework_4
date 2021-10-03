<?php
include 'cfg.php'; //  fichier creer  lors de la 1ere instatlation instalation procesuce en cour de realisation   
define('DOCUMENT_ROOT', 'framework/');


//define('msp', 'Ministère de la santé et de la population et de la réforme hospitalière');
define('msp', "Système électronique d'enregistrement des décès et naissances ");
define('version', 'v2.0.1-beta1');


define('logon', 'naissance.png?t='.time());
//define('logolab', 'd:\\framework/public/images/logolab/logolab');
define('title', '??????');
define('sujet', 'deces');
define('admin', 'admin');
define('sadmin', 'tibaredha');

define('HASH_GENERAL_KEY', 'MixitUp200');
define('HASH_PASSWORD_KEY', 'catsFLYhigh2000miles');
define('path', 'D:\framework\libs\sessions');

define('URLCANVAS', $_SERVER["DOCUMENT_ROOT"].DOCUMENT_ROOT.'public/images/');//url pour canevas 
define('URLDUMP', $_SERVER["DOCUMENT_ROOT"].DOCUMENT_ROOT.'sql/Deces_');//url pour DUMP 
define('URLXLS', $_SERVER["DOCUMENT_ROOT"].DOCUMENT_ROOT.'xls/D_');//url pour DUMP 
// echo $_SERVER["DOCUMENT_ROOT"];
// date_default_timezone_set('Africa/Tunis');
date_default_timezone_set('Africa/Algiers');
//date_default_timezone_set('UTC');

function renemefille ($tiba,$amrane)
 {
       $new_name = dirname(__FILE__)."/".$tiba ;
       $old_name = dirname(__FILE__)."/".$amrane;
      
	   // $old_name = dirname(__FILE__)."/".$tiba;
       // $new_name  = dirname(__FILE__)."/".$amrane;
       
	   if(file_exists($new_name))
        { 
           echo "Error While Renaming $old_name" ;
        }
        else
        {
			if(rename( $old_name, $new_name))
			{ 
				echo "Successfully Renamed $old_name to $new_name" ;
			}
			else
			{
				echo "A File With The Same Name Already Exists" ;
			}
        }
 }

// renemefille ("tiba.txt","amrane.txt") ;  



function ajax($id,$tbl,$col,$order)
{
	$cnx = mysql_connect(DB_HOST,DB_USER,DB_PASS)or die('I cannot connect to the database because: ' . mysql_error());
	$db = mysql_select_db(DB_NAME);
	mysql_query("SET NAMES 'UTF8' ");
	if($id)
	{
		$sql=mysql_query("select * from $tbl where $col='$id'  order by $order");
		while($row=mysql_fetch_array($sql))
		{
			echo '<option value="'.$row[0].'">'.$row[1].'</option>';
		}
	}
}

// suite pour canvas 
function UPLOAD($imgBase64,$contenu)
{
	if( isset($imgBase64) && isset($contenu) )
	{
		$img = $imgBase64;
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = URLCANVAS .trim($contenu). '.jpg';
		$success = file_put_contents($file, $data); 
	}
}

?>






