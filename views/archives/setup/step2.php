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

$goToNextStep = true;
if (!$goToNextStep) 
{
	$msgerror= '<div class="error">Contact your webserver support (hosting service) to get the necessary PHP settings fixed and refresh this site!</div>'; 
}
else 
{
	$msgerror='';
}
$phpVersion='5.3.0';
$currentPhpVersion = phpversion();
$phpVersionOk = version_compare($currentPhpVersion, 5) >= 0;
$loadedExtensions = get_loaded_extensions();
foreach ($loadedExtensions as $key => $ext) $loadedExtensions[$key] = strtolower($ext); 
$showExtensions = array();
$extensions = array("mysql","mysqli", "pdo_mysql","pdo_odbc","openssl","zip");

foreach ($extensions as $ext)
	{
		$isLoaded = in_array($ext, $loadedExtensions);
		$showExtensions[$ext] =  $isLoaded;
		if (!$isLoaded) $goToNextStep = false;
	}

 
if ($phpVersionOk) 
{ 
	$imgverssio='<img src="'.URL.'public/images/accept.png"> OK'; 
} 
else 
{ 
	$imgverssio='<img src="'.URL.'public/images/cancel.png"> Below requirement! Please update your PHP installation.';
}
$projectContents = '';
foreach ($showExtensions as $extension => $status):
    $projectContents .= '<tr bgcolor="white"><td>'.$extension.'</td>';
	if ($status)
	{ 
	  $projectContents .='<td><img src="'.URL.'public/images/accept.png"> OK</td>'; 
	} 
	else 
	{ 
     $projectContents .='<td><img src="'.URL.'public/images/cancel.png"> Not installed!</td></tr>';  
	} 	
endforeach;

$projectContents1 = '';
if ($goToNextStep) 
{ 
	$step="step3";
	$valueh="filePermissions";
} 
else 
{
	$step="step2";
    $valueh="requirements";	
}
$pageContents = <<< pageContents
<!---->
<div class="sheader1l"><p id="{$ID}">{$LABEL}</p></div>
<div class="sheader1r">{$NAV}</div>
<div class="sheader2l">3-Server requirements</div>
<div class="sheader2r">{$MSPRH}</div>
<div class="contentl">
{$msgerror}	
	
<h4>PHP Version</h4>
	<table  width='65%' >
		<thead>
			<tr>
				<th>Name</th>
				<th>Version</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<tr bgcolor="white">
				<td>Required</td>
				<td>{$phpVersion}</td>
				<td><img src="{$URL}public/images/accept.png"> OK</td>
			</tr>
			<tr bgcolor="white">
				<td>You have</td>
				<td>{$currentPhpVersion}</td>
				<td>
				{$imgverssio}
				</td>
			</tr>
		</tbody>
	</table>	
	
<h4>PHP Extensions</h4>
	<table width='65%'  >
		<thead>
			<tr>
				<th>Name</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			{$projectContents}	
		</tbody>
	</table>
</br>
<form action="{$URL}setup/step3" method="post">
<a href="{$URL}setup/" id="Cancel"><img src="{$URL}public/images/icons/cross.png" alt=""/> Cancel </a>
<input type="hidden" name="nextStep" value="{$step}">
<button id="submits" type="submit" class="{$valueh}">
<img src="{$URL}public/images/icons/tick.png" alt=""/> Next
</button>
</form>

</div>	
<div class="content"> <img id="image" src="{$URL}public/images/dump.jpg"></div>
<div class="contentr"><img id="image" src="{$URL}public/images/{$LOGOD}"></div>	
<div class="scontentl2">{$EDRSUS}</div>	
<div class="scontentl3">{$RSC}</div>
<div class="scontentr1">{$DSP}</div>
pageContents;
echo $pageContents;
?>		