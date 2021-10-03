<div class="sheader1l"><p id="lsetup"><?php echo "";echo $this->msg; echo "";?></p></div><div class="sheader1r"><p id="lsetup"><?php html::NAV();?></p></div>
<div class="sheader2l"><p id="lsetup">4-File permissions</p></div><div class="sheader2r">sheader3</div>
<div class="contentl">
<?php 

include("helper.php");


//****************************
	$goToNextStep = False;
	clearstatcache();
	$showPermissions = array();
	
	$filePermissions = array();
	$filePermissions["mvc/views/setup/database.php"] = "rw";
	$filePermissions["mvc/views/setup/tmp/x.php"] = "rw";
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
?>
<h3>File permissions</h3>

<?php

 
if (!$goToNextStep) 
{ 
 echo '<div class="error">The Installer has insufficient file permissions on this server! Please check your chmod permissions or contact support to get this issue resolved.</div>';
} 

?>

<table  width='65%' >
	<thead>
		<tr>
			<th>Name</th>
			<th>Real Path</th>
			<th>Required</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($showPermissions as $filename => $permissions): ?>
		<tr bgcolor="white">
			<td><?php echo $filename; ?></td>
			<td><?php echo $permissions['realpath']; ?></td>
			<td><?php echo $permissions['showRequired']; ?></td>
			<td><?php 
			if ($permissions['error'] !== "") { ?>
			<img src="<?php echo URL;?>public/images/accept.png"> OK 
			<?php } else { ?>
			<img src="<?php echo URL;?>public/images/cancel.png"><?php echo $permissions['error']; ?> <?php } ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>


<?php if ($goToNextStep) { ?>
<form action="<?php echo URL;?>setup/step4" method="post">
	<a href="<?php echo URL;?>setup/" id="Cancel"><img src="<?php echo URL;?>public/images/icons/cross.png" alt=""/> Cancel </a>
	<input type="hidden" name="nextStep" value="database">
	<button  id="submits" type="submit" class="button positive">
		<img src="<?php echo URL;?>public/images/icons/tick.png" alt=""/> Next
	</button>
</form>
<?php } else { ?>
	<form action="<?php echo URL;?>setup/step3" method="post">
		<a href="<?php echo URL;?>setup/" id="Cancel"><img src="<?php echo URL;?>public/images/icons/cross.png" alt=""/> Cancel </a>
		<input type="hidden" name="nextStep" value="filePermissions">
		<button  id="submits" type="submit" class="button positive">
			<img src="<?php echo URL;?>public/images/icons/tick.png" alt=""/> Retry
		</button>
	</form>
<?php } ?>


</div>	
<div class="content"><img id="image" src="<?php echo URL;?>public/images/FP.PNG"></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>

	
<div class="scontentl2"><?php echo "";echo $this->msg; echo "";?></div>		
<div class="scontentl3"><?php echo "";echo $this->msg; echo "";?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		