<!DOCTYPE html>
<html>
<head>
<?php $time = microtime(true);?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?php if (isset ($this->title)){echo $this->title; }else {echo title ;}?></title>
  <link rel="icon" type="image/png" href="<?PHP echo URL; ?>public/img/<?php echo logo ?>" />
 
  
  <!-- flag-icon-css -->
  <link rel="stylesheet" href="<?PHP echo URL; ?>plugins/flag-icon-css/css/flag-icon.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?PHP echo URL; ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?PHP echo URL; ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?PHP echo URL; ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?PHP echo URL; ?>plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?PHP echo URL; ?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?PHP echo URL; ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?PHP echo URL; ?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?PHP echo URL; ?>plugins/summernote/summernote-bs4.min.css">
 <!-- DataTables -->
  <link rel="stylesheet" href="<?PHP echo URL; ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?PHP echo URL; ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?PHP echo URL; ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
 
  
<link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/x.css?t=<?php echo time();?>">
<script src="<?php echo URL;?>public/js/x.js?t=<?php echo time();?>"></script>

<!--default js and css in view / -->
<?php if (isset($this->js)) {foreach ($this->js as $js)  {echo '<script type="text/javascript" src="'.URL.'views/'.$js.'"></script>';}}?>
<?php if (isset($this->css)){foreach ($this->css as $css){echo '<link rel="stylesheet" type="text/css" href="'.URL.'views/'.$css.'"></script>';}}?>
<?php  ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<?php 

require 'menu/preloader.php';
if (Session::get('loggedIn') == false)
{
	require 'menu/navbar_.php';
    require 'menu/main_sidebar_container_.php';
}
else
{
	
	require 'menu/navbar.php';
    require 'menu/main_sidebar_container.php';
	// if (Session::get('demgraphie') == 1){include('menu_deces.php');}	
	// if (Session::get('demgraphie') == 2){include('menu_naissance.php');}
	// if (Session::get('demgraphie') == 3){include('menu_demographie.php');}		
	// echo '<li class="parent"><a href="'.URL.'aide">'.TXT_HELP.' <img src="'.URL.'public/images/help.jpg" width="16" height="16" border="0" alt=""/></li>';	
	// echo '<li class="parent">';
	// echo '<a onclick="playSound()"  href="'.URL.'Login/logout/'.Session::get('id').'"  >'.TXT_LOGOUT.' <img src="'.URL.'public/images/s_loggoff.png" width="16" height="16" border="0" alt=""/></a>

	// </li>';
	// echo '<p id="wdj1" >';

	// if (Session::get('role') == '1'){
	// if (Session::get('lang')=='ar') {echo "مديرية الصحة و السكان - الجلفة";}
	// if (Session::get('lang')=='fr') {echo "DSP-DJELFA";}
	// if (Session::get('lang')=='en') {echo "DSP-DJELFA";}
	// }else {
	// if (Session::get('lang')=='ar') {echo HTML::nbrtostring('structure','id',Session::get('structure'),'structurear');}
	// if (Session::get('lang')=='fr') {echo HTML::nbrtostring('structure','id',Session::get('structure'),'structure');}
	// if (Session::get('lang')=='en') {echo HTML::nbrtostring('structure','id',Session::get('structure'),'structure');}		
	// }
	// echo '</p>';
}




















?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">