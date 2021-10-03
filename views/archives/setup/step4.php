<?php
Session::init();
if (isset($_SESSION['errorlogin'])) 
{
	$LABEL = $_SESSION['errorlogin'];
	$ID    = "errorregister";
}
else
{   
    $LABEL = "Installation steps";
	$ID    = "lregister";
}

$msg=$this->msg;
$URL=URL;
$DSP=dsp;
$EDRSUS=EDRSUS;
$LOGOD=logod;
$MSPRH=MSPRH;
$err = '';
$ok  = '';
$NAV= <<< menu
<p id="lsetup">
<button id="bnav" onclick="javascript:history.back();">    <img src="{$URL}public/images/b_prevpage.png"   width="16" height="16" border="0" alt=""/></button>
<button id="bnav" onclick="javascript:location.reload();"> <img src="{$URL}public/images/b_sbrowse.png"    width="16" height="16" border="0" alt=""/></button>
<button id="bnav" onclick="javascript:history.forward();"> <img src="{$URL}public/images/b_nextpage.png"   width="16" height="16" border="0" alt=""/></button>
<button id="bnav" onclick="javascript:toggleFullScreen();"><img src="{$URL}public/images/fs.png"           width="16" height="16" border="0" alt=""/></button>
</p>
menu;

$RSC = <<< rsc
<a href="https://www.facebook.com/">             <img src="{$URL}public/images/fb.png"             width="16" height="16" border="0" alt=""/></a>
<a href="https://twitter.com/">                  <img src="{$URL}public/images/tw.png"             width="16" height="16" border="0" alt=""/></a>
<a href="https://www.youtube.com/">              <img src="{$URL}public/images/yt.png"             width="16" height="16" border="0" alt=""/></a>
<a href="http://www.sante.gov.dz/">              <img src="{$URL}public/images/lb.jpg"             width="16" height="16" border="0" alt=""/></a>
<a href="http://www.dsp-djelfa.dz/index.php/ar/"><img src="{$URL}public/images/sante.jpg"          width="16" height="16" border="0" alt=""/></a>
<a href="http://www.ans.dz/index.php/fr/">       <img src="{$URL}public/images/gs.jpg"             width="16" height="16" border="0" alt=""/></a>
<a href="https://www.pharmnet-dz.com/">          <img src="{$URL}public/images/logolab/logov2.png" width="16" height="16" border="0" alt=""/></a>
rsc;

$error = false;
$goToNextStep = false;

if (isset($_POST['database']))
{
	$database = $_POST['database'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$host     = $_POST['host'];
	$nom_site = $_POST['nom_site'];
	$mail_site= $_POST['mail_site'];
	$url_site = $_POST['url_site'];
	
	
	//create database 
	$PARAM_hote       =$host;
	$PARAM_nom_bd     =$database;
	$PARAM_utilisateur=$username;
	$PARAM_mot_passe  =$password;   
	define('DNS', 'mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd);
	define('SER', 'mysql:host='.$PARAM_hote);
	define('USER', $PARAM_utilisateur);
	define('PASS', $PARAM_mot_passe);
	class Bdd 
		{
			private static $connexion = NULL;
			
			public static function connectBdd() 
			{
				if(!self::$connexion) 
				{
					self::$connexion = new PDO(DNS, USER, PASS);
					self::$connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				}
				return self::$connexion;
			}
			
			public static function createBdd($bdd) 
			{
				$pdo = new PDO(SER, USER, PASS);
				$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$requete = "CREATE DATABASE IF NOT EXISTS $bdd";
				$pdo->prepare($requete)->execute();
			}	
		}
	try 
		{
			Bdd::createBdd($PARAM_nom_bd);
			try {
				Bdd::connectBdd();
				
				//$ok .= 'La connexion mysql est : <img src="'.URL.'public/images/accept.png" width="25" height="25" align="absmiddle"><br />';
				$fp = fopen("./views/setup/cfg.php", "w");
				$config = "<?php \n";
				$config .= "$";
				$config .= "PARAM_hote        = '".$PARAM_hote."'; \n";
				$config .= "$";
				$config .= "PARAM_nom_bd      = '".$PARAM_nom_bd."'; \n";
				$config .= "$";
				$config .= "PARAM_utilisateur = '".$PARAM_utilisateur."'; \n";
				$config .= "$";
				$config .= "PARAM_mot_passe   = '".$PARAM_mot_passe."'; \n";
				$config .= "$";
				$config .= "PARAM_nom_site    = '".$nom_site."'; \n";
				$config .= "$";
				$config .= "PARAM_mail_site   = '".$mail_site."'; \n";
				$config .= "$";
				$config .= "PARAM_url_site    = '".$url_site."'; \n";
				$config .= "?>";
				if(fwrite($fp,$config)) {
					//$ok .= 'le fichier de connexion &agrave; la base de donn&eacute;s : <img src="'.URL.'public/images/accept.png" width="25" height="25" align="absmiddle"><br />';
				}
				else {
					//$err .= 'le fichier de connexion &agrave; la base de donn&eacute;s : <img src="'.URL.'public/images/faux.png" width="25" height="25" align="absmiddle"><br />';
				}
			} 
			catch(Exception $e) {
					$err .= 'La Base mysql est : <img src="'.URL.'public/images/accept.png" width="25" height="25" align="absmiddle"><br />';
					die();
			}	
		}
		catch(Exception $e) {
			$err .= 'Une erreur est survenue';
			die();
		}
	
	
	
	
	// check connection
	$connection = @mysql_connect($host, $username, $password);
	if ($connection)
	{
		$error = !mysql_select_db($database, $connection);
		@mysql_close($connestion);
		
		if (!$error)
		{
			$_SESSION['db_host'] = $host;
			$_SESSION['db_user'] = $username;
			$_SESSION['db_pass'] = $password;
			$_SESSION['db_name'] = $database;
			$_SESSION['nom_site']  = $nom_site;
			$_SESSION['mail_site'] = $mail_site;
			$_SESSION['url_site']  = $url_site;

			// allow user to proceed
			$goToNextStep = true;
		}
		else $error = mysql_error();
	}
	else
		$error = mysql_error();
}
else
{
	if (isset($_SESSION['db_host']))
	{
		$host = $_SESSION['db_host'];
		$username = $_SESSION['db_user'];
		$password = $_SESSION['db_pass'];
		$database = $_SESSION['db_name'];
		$nom_site = $_SESSION['nom_site'];
		$mail_site= $_SESSION['mail_site'];
		$url_site = $_SESSION['url_site'];
	
	}
	else
	{
		$database = "";
		$username = "";
		$password = "";
		$host     = "localhost";
		$nom_site = "";
		$mail_site= "";
		$url_site = "";
	}
}
$connection="";
if ($goToNextStep){ 
        $connection.='<form action="'.URL.'setup/step5" method="post">';
		$connection.='<div style="overflow-x:auto;">';
		$connection.='<table>';
		$connection.='<tr>';
		$connection.='<th>cfg</th>';
		$connection.='<th>cfg</th>';
		$connection.='</tr>';
		$connection.='<tr>';
		$connection.='<td><label>nom_site </label> </td>';
		$connection.='<td><input id="login"  class="title" type="text" name="Nom_site" value="'.$nom_site.'"></td>';
		$connection.='</tr>';
		$connection.='<tr>';
		$connection.='<td><label>mail_site</label> </td>';
		$connection.='<td><input id="login"  class="title" type="text" name="mail_site" value="'.$mail_site.'"></td>';
		$connection.='</tr>';
		$connection.='<tr>';
		$connection.='<td><label>url_site</label> </td>';
		$connection.='<td><input id="login"  class="title" type="text" name="url_site" value="'.$url_site.'"></td>';
		$connection.='</tr>';
		$connection.='<tr>';
		$connection.='<td><label>Database name </label> </td>';
		$connection.='<td><input id="login"  class="title" type="text" name="database" value="'.$database.'"></td>';
		$connection.='</tr>';
		$connection.='<tr>';
		$connection.='<td><label>Username</label> </td>'; 
		$connection.='<td><input id="login" class="title" type="text" name="username" value="'.$username.'"></td>';
		$connection.='</tr>';
		$connection.='<tr>';
		$connection.='<td><label>Password</label> </td>';
		$connection.='<td><input id="login" class="title" type="password" name="password" value="'.$password.'"></td>';
		$connection.='</tr>';
		$connection.='<tr>';
		$connection.='<td><label>Host</label>  </td>';
		$connection.='<td><input id="login" class="title" type="text" name="host" value="'.$host.'"></td>';
		$connection.='</tr>';
		$connection.='</table>';
		$connection.='</div>';
		$connection.='<hr>';	
		$connection.='<div class="success">Everything is ok! Go to next step...</div>';
		$connection.='</br><a href="'.URL.'setup/" id="Cancel"><img src="'.URL.'public/images/icons/cross.png" alt=""/> Cancel </a>';	
		$connection.='<input type="hidden" name="nextStep" value="importSQL">';
		$connection.='<button id="submits" type="submit" class="button positive"><img src="'.URL.'public/images/icons/tick.png" alt=""/> Next</button>';

}
else{
        $connection.='<form action="'.URL.'setup/step4" method="post">';
		$connection.='<div style="overflow-x:auto;">';
		$connection.='<table>';
		$connection.='<tr>';
		$connection.='<th>cfg</th>';
		$connection.='<th>cfg</th>';
		$connection.='</tr>';
		$connection.='<tr>';
		$connection.='<td><label>nom_site </label> </td>';
		$connection.='<td><input id="login"  class="title" type="text" name="nom_site" value="'.$nom_site.'"></td>';
		$connection.='</tr>';
		$connection.='<tr>';
		$connection.='<td><label>mail_site</label> </td>';
		$connection.='<td><input id="login"  class="title" type="text" name="mail_site" value="'.$mail_site.'"></td>';
		$connection.='</tr>';
		$connection.='<tr>';
		$connection.='<td><label>url_site</label> </td>';
		$connection.='<td><input id="login"  class="title" type="text" name="url_site" value="'.$url_site.'"></td>';
		$connection.='</tr>';
		$connection.='<tr>';
		$connection.='<td><label>Database name </label> </td>';
		$connection.='<td><input id="login"  class="title" type="text" name="database" value="'.$database.'"></td>';
		$connection.='</tr>';
		$connection.='<tr>';
		$connection.='<td><label>Username</label> </td>'; 
		$connection.='<td><input id="login" class="title" type="text" name="username" value="'.$username.'"></td>';
		$connection.='</tr>';
		$connection.='<tr>';
		$connection.='<td><label>Password</label> </td>';
		$connection.='<td><input id="login" class="title" type="password" name="password" value="'.$password.'"></td>';
		$connection.='</tr>';
		$connection.='<tr>';
		$connection.='<td><label>Host</label>  </td>';
		$connection.='<td><input id="login" class="title" type="text" name="host" value="'.$host.'"></td>';
		$connection.='</tr>';
		$connection.='</table>';
		$connection.='</div>';
        if ($error) 
		{
			$connection.='<p>Error establishing a database connection: '.$error.'</p>';	
		}
		$connection.='</br><a href="'.URL.'setup/" id="Cancel"><img src="'.URL.'public/images/icons/cross.png" alt=""/> Cancel </a>';
		$connection.='<input type="hidden" name="nextStep" value="database">';
		$connection.='<button id="submits" type="submit" class="button positive"><img src="'.URL.'public/images/icons/tick.png" alt=""/> Test connection</button>';	
}


$pageContents = <<< pageContents
<!---->
<div class="sheader1l"><p id="{$ID}">{$LABEL}</p></div>
<div class="sheader1r">{$NAV}</div>
<div class="sheader2l">5-Create database and test connection</div>
<div class="sheader2r">{$MSPRH}</div>
<div class="contentl">
{$ok}

{$connection}
	
</form>
</div>	
<div class="content"> <img id="image" src="{$URL}public/images/DBC.jpg"></div>
<div class="contentr"><img id="image" src="{$URL}public/images/{$LOGOD}"></div>	
<div class="scontentl2">{$EDRSUS}</div>	
<div class="scontentl3">{$RSC}</div>
<div class="scontentr1">{$DSP}</div>
pageContents;
echo $pageContents;
?>