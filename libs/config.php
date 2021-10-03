<?php
$cfg = "./libs/cfg.php";
if(!file_exists($cfg)) 
{
	//header('location: install/');
	echo "file".$cfg."d'ont existe ok";
}
else 
{
	//require $cfg;
	//echo "file".$cfg."existe ok";
	require './libs/cfg.php';
} 

define('LIBS', 'libs/');
//base de donnes 
define('DB_TYPE', 'mysql');
define('DB_HOST', $PARAM_hote); 
define('DB_NAME', 'framework');
define('DB_USER', 'tibaredha'); 
define('DB_PASS', '030570');    

if($_SERVER['HTTP_HOST'] == 'localhost') {define('URL', 'http://'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']).'/');	}else{define('URL', 'http://'.$_SERVER['SERVER_NAME'].":8080".dirname($_SERVER['PHP_SELF']).'/');	}

define('MSPRH','Ministère de la santé');
define('dsp', 'DSP-DJELFA');
define('wilaya','DJELFA');
define('EDRSFR', 'Système électronique d\'enregistrement des décès et naissances');
define('EDRSUS', 'Electronic Death and Birth Registration System');
define('logod', 'demographie.jpg?t='.time());
define('logo', 'funerail.jpg?t='.time());
define('Copyright', '&copy;  Copyright '.date('Y').' Designed by  Dr R.TIBA  - Tél : 07.72.71.80.59  - Email : tibaredha@yahoo.fr  -  DSP Djelfa');
define('framework', 'DECES');
?>






