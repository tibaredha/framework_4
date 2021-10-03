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

try 
{ 		
	include("cfg.php"); 
	$options    = array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION );
	$connection = new PDO("mysql:host=$PARAM_hote;dbname=$PARAM_nom_bd", $PARAM_utilisateur, $PARAM_mot_passe, $options);
	$sql = file_get_contents(URL."views\setup\sql\import.sql");
	$connection->exec($sql);
	$msgx = "table are created successfully.";	
}
catch(PDOException $error)
{
	$msgx = $sql . "<br>" . $error->getMessage();
}
$pageContents = <<< pageContents
<!---->
<div class="sheader1l"><p id="{$ID}">{$LABEL}</p></div>
<div class="sheader1r">{$NAV}</div>
<div class="sheader2l">6-Import SQL and create tables</div>
<div class="sheader2r">{$MSPRH}</div>
<div class="contentl">	
	<form action="{$URL}setup/step6" method="post">			
		<a id="Cancel" href="{$URL}setup/" ><img src="{$URL}public/images/icons/cross.png" alt=""/>Cancel</a>
		<input type="hidden"  name="nextStep" value="requirements">
		<input  id="submits"   type="submit"  value="xxxx"   />
	</form>	
	{$msgx}
</div>	
<div class="content"> <img id="image" src="{$URL}public/images/IMPSQL.jpg"></div>
<div class="contentr"><img id="image" src="{$URL}public/images/{$LOGOD}"></div>	
<div class="scontentl2">{$EDRSUS}</div>	
<div class="scontentl3">{$RSC}</div>
<div class="scontentr1">{$DSP}</div>
pageContents;
echo $pageContents;
?>