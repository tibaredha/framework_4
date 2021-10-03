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

include("helper.php");
$goToNextStep = False;
clearstatcache();
$showPermissions = array();

$filePermissions = array();
$filePermissions["mvc/views/setup/tmp/database.php"] = "rw";
$filePermissions["mvc/views/setup/tmp/x.php"]        = "rw";
$filePermissions["mvc/views/setup/database_template.php"]        = "rw";
//echo '<pre>';print_r ($filePermissions);echo '</pre>';
foreach ($filePermissions as $key => $value)
{
	$error = "";
	$config['applicationPath'] = "../../../";
	$values = str_split($value);
	$file   = getRealpath(dirname(getenv('SCRIPT_FILENAME'))."/".$config['applicationPath'].$key);
	//echo $file;
	if (file_exists($file))
	{
		foreach ($values as $char)
		{
			switch ($char)
			{
				case "r": if (!is_readable($file))   $error = "Not readable"; break;
				case "w": if (!is_writable($file))   $error = "Not writeable"; break;
				case "x": if (!is_executable($file)) $error = "Not executeable"; break;
			}
		}
	}
	else
	{
		$error = "File doesnt exist!";
	}
		
	// combine string for user easy reading
	$showRequired = array();
	foreach ($values as $char)
	{
		switch ($char)
		{
			case "r": $showRequired[] = "Read"; break;
			case "w": $showRequired[] = "Write"; break;
			case "x": $showRequired[] = "Execute"; break; 
		}
	}
	$showPermissions[$key] = array("required" => $value, 
								   "error" => $error, 
								   "showRequired" => implode(", ", $showRequired), 
								   "realpath" => $file);	
	if ($error != "") 
	{
		//$goToNextStep = false;
		$goToNextStep = True;//echo $error;
	}
}	


if (!$goToNextStep) 
{ 
 $insta='<div class="error">The Installer has insufficient file permissions on this server! Please check your chmod permissions or contact support to get this issue resolved.</div>';
}
{
 $insta='';	
} 

$tavle ='';
$tavle.='<table  width="65%" >';
	$tavle.='<thead>';
		$tavle.='<tr>';
			$tavle.='<th>Name</th>';
			$tavle.='<th>Real Path</th>';
			$tavle.='<th>Required</th>';
			$tavle.='<th>Status</th>';
		$tavle.='</tr>';
	$tavle.='</thead>';
	$tavle.='<tbody>';
	foreach ($showPermissions as $filename => $permissions):
		    $tavle.='<tr bgcolor="white">';
			$tavle.='<td>'.$filename.'</td>';
			$tavle.='<td>'.$permissions['realpath'].'</td>';
			$tavle.='<td>'.$permissions['showRequired'].'</td>';
			$tavle.='<td>';
			if ($permissions['error'] !== "") 
			{ 
			$tavle.='<img src="'.URL.'public/images/accept.png"> OK ';
		} else { 
			$tavle.='<img src="'.URL.'public/images/cancel.png">'.$permissions['error'].''; } 
		    $tavle.='</td></tr>';
		endforeach;
	$tavle.='</tbody>';
$tavle.='</table>';


$tavle1 ='';
if ($goToNextStep) { 

$tavle1 .='</br><form action="'.URL.'setup/step4" method="post">';
	$tavle1 .='<a href="'.URL.'setup/" id="Cancel"><img src="'.URL.'public/images/icons/cross.png" alt=""/> Cancel </a>';
	$tavle1 .='<input type="hidden" name="nextStep" value="database">';
	$tavle1 .='<button  id="submits" type="submit" class="button positive">';
		$tavle1 .='<img src="'.URL.'public/images/icons/tick.png" alt=""/> Next';
	$tavle1 .='</button>';
$tavle1 .='</form>';
} 
else 
{ 
$tavle1 .='</br><form action="'.URL.'setup/step3" method="post">';
	$tavle1 .='<a href="'.URL.'setup/" id="Cancel"><img src="'.URL.'public/images/icons/cross.png" alt=""/> Cancel </a>';
	$tavle1 .='<input type="hidden" name="nextStep" value="filePermissions">';
	$tavle1 .='<button  id="submits" type="submit" class="button positive">';
		$tavle1 .='<img src="'.URL.'public/images/icons/tick.png" alt=""/> Retry';
	$tavle1 .='</button>';
$tavle1 .='</form>';
} 

$pageContents = <<< pageContents
<!---->
<div class="sheader1l"><p id="{$ID}">{$LABEL}</p></div>
<div class="sheader1r">{$NAV}</div>
<div class="sheader2l">4-File permissions</div>
<div class="sheader2r">{$MSPRH}</div>
<div class="contentl">
<h3>File permissions</h3>
{$insta}
{$tavle}
{$tavle1}	
</div>	
<div class="content"> <img id="image" src="{$URL}public/images/FP.PNG"></div>
<div class="contentr"><img id="image" src="{$URL}public/images/{$LOGOD}"></div>	
<div class="scontentl2">{$EDRSUS}</div>	
<div class="scontentl3">{$RSC}</div>
<div class="scontentr1">{$DSP}</div>
pageContents;
echo $pageContents;
?>