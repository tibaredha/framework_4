<div class="sheader1l"><p id="lregister">Gérer les laboratoires pharmaceutiques <?php //echo "";echo $this->msg; echo "";?></p></div><div class="sheader1r"><p id="lregister"><?php html::NAV();?></p></div>
<div class="sheader2l"> Modifier un laboratoire pharmaceutique</div>
<div class="sheader2r">MSPRH</div>
<?php
echo '<div class="contentl">';?>
<div class="form-style-10">
	<form class="tabaut" method="post" action="<?php echo URL."lab/editSave/".$this->user[0]['id'];?>">
		<div class="section"><span>1</span> Laboratoire</div>
		<div class="inner-wrap"><input  type="text" name="laboratoire" value="<?php echo $this->user[0]['laboratoire'];?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required=""      /></div>
		<div class="section"><span>2</span> Adresse</div>
		<div class="inner-wrap"><input  type="text" name="Adresse" value="<?php echo $this->user[0]['Adresse'];?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required=""  /></div>
	    <div class="section"><span>3</span> Telephone</div>
		<div class="inner-wrap"><input  type="text" name="tel" value="<?php echo $this->user[0]['tel'];?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required=""  /></div>
		<div class="section"><span>4</span> Site web</div>
		<div class="inner-wrap"><input  type="text" name="site" value="<?php echo $this->user[0]['site'];?>" onkeyup="javascript:this.value=this.value.toUpperCase();" required=""  /></div>
		</br>
		<div class="inner-wrap"><input  type="submit" /></div>
	
	</form>
	</div>
<?php
echo "</div>";	
?>
<div class="content"><img id="image" src="<?php echo URL;?>public/images/pha.jpg" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>			
<div class="scontentl2">Modifier un nouveau médicament</div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		