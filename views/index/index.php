<?php
Session::init();
if (isset($_SESSION['errorlogin'])) 
{
	$LABEL = $_SESSION['errorlogin'];
	$ID    = "errorregister";
}
else
{   
    $LABEL = "Accueil";
	$ID    = "lregister";
} 

$URL=URL;
$DSP=dsp;
$EDRSUS=EDRSUS;
$LOGOD=logod;
$EDRSFR=EDRSFR;
$MSPRH=MSPRH;

$NAV= <<< menu
<p id="llogin">
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

$SLIDE = <<< slide
<marquee behavior="slide" direction="up" scrollamount="2">
<p class="a">* Les informations rapportées par les certificats de décès permettent l'élaboration </p>
<p class="a">* Des statistiques exhaustives des causes médicales de décès en Algerie</p>
<p class="a">* Dont l'utilisation à pour  but  d'orienter et d'évaluer les actions et les recherches </p>
<p class="a">* Dans le domaine de la santé publique</p>
<p class="a">* Donc la qualité et la précision des certificats de décès doit etre ameliorée</p>
<p class="a">* Compte tenu des évolutions technologiques, le passage à un mode de certification </p>
<p class="a">* Electronique des décès est imperatif</p>
<p class="a">* Deverait permettre d'ameliorer considerablement le circuit du certificat de décès </p>	
</marquee>
slide;

$pageContents = <<< pageContents
<!---->
<div class="sheader1l"><p id="{$ID}">{$LABEL}</p></div>
<div class="sheader1r">{$NAV}</div>
<div class="sheader2l">{$EDRSFR}</div>
<div class="sheader2r">{$MSPRH}</div>
<div class="contentl">{$SLIDE}</div>

	
<div class="content"> <img id="image" src="{$URL}public/images/accueil.jpg"></div>
<div class="contentr"><img id="image" src="{$URL}public/images/{$LOGOD}"></div>	
<div class="scontentl2">{$EDRSUS}</div>	
<div class="scontentl3">{$RSC}</div>
<div class="scontentr1">{$DSP}<div id="heures"></div></div>
pageContents;
//echo $pageContents;
?>
<?php

// $servername = "localhost";
// $username = "tibaredha";
// $password = "030570";
// $dbname = "framework";
// $conn = new mysqli($servername, $username, $password, $dbname);
// if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}//STRUCTURED=1 and 

// function dateUS2FR($date)//2013-01-01
// {
// $J      = substr($date,8,2);
// $M      = substr($date,5,2);
// $A      = substr($date,0,4);
// $dateUS2FR =  $J."-".$M."-".$A ;
// return $dateUS2FR;//01-01-2013
// }
// $sql = "SELECT id,NOM,PRENOM,FILSDE,ETDE,SEX,STRUCTURED,DINS, Days,Months,Years FROM deceshosp where DINS > '2021-01-01' ORDER BY DINS asc limit 0,200    ";
// $result = $conn->query($sql);
// $row_cnt = mysqli_num_rows($result);
// printf("Le jeu de résultats a %d lignes.\n", $row_cnt);


// if ($result->num_rows > 0) 
// {
  // while($row = $result->fetch_assoc()) 
  // {
	// echo '<tr>';
	// echo '<td >'.dateUS2FR($row["DINS"]).'</td>';
	// echo '<td>'.$row["NOM"].'_'.strtolower($row["PRENOM"]).'_['.strtolower($row["FILSDE"]).']'.'</td>';
	// echo '<td>'.$row["SEX"].'</td>';
	
	// if ($row["Days"]<30){echo '<td class="table-danger" >'.$row["Days"].'&ensp;Jours</td>';		
	// }
	// else{
		// if($row["Days"]<365){echo '<td class="table-warning">'.$row["Months"].'&ensp;Mois</td>';}
		// else{echo '<td class="table-success">'.$row["Years"].'&ensp;Ans</td>';}	
	// }

	// echo '<td><a target = "_blank"  title="a"  href="./fpdf/deces/deceshosp.php?uc='.$row["id"].'"><i class="fas fa-print"></i></a></td>';
	// echo '<td><a target = "_blank"  title="b"  href="./tcpdf/deces/declaration.php?uc='.$row["id"].'"><i class="fas fa-print"></i></a></td>';
	// echo '<td><a target = "_blank"  title="c"  href="./fpdf/deces/deceshosp.php?uc='.$row["id"].'"><i class="fas fa-edit"></i></a></td>';
	// echo '<td><a target = "_blank"  title="d"  href="./tcpdf/deces/declaration.php?uc='.$row["id"].'"><i class="fas fa-trash"></i></a></td>';
	// echo '</tr>';
  // }
// } 
// else 
// {
  // echo "0 results";
// }
// $conn->close();
?> 

  


<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header"><h3 class="card-title">DataTable with minimal features & hover style</h3></div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead><tr><th>Rendering engine</th><th>Browser</th><th>Platform(s)</th><th>Engine version</th><th>CSS grade</th></tr></thead>
                  <tbody><tr><td>Trident</td><td>InternetExplorer 4.0</td><td>Win 95+</td><td> 4</td><td>X</td></tr></tbody>
                  <tfoot><tr><th>Rendering engine</th><th>Browser</th><th>Platform(s)</th><th>Engine version</th><th>CSS grade</th></tr></tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header"><h3 class="card-title">DataTable with default features</h3></div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead><tr><th>Rendering engine</th><th>Browser</th><th>Platform(s)</th><th>Engine version</th><th>CSS grade</th></tr></thead>
                  <tbody><tr><td>Trident</td><td>InternetExplorer 4.0</td><td>Win 95+</td><td> 4</td><td>X</td></tr></tbody>
                  <tfoot><tr> <th>Rendering engine</th><th>Browser</th><th>Platform(s)</th><th>Engine version</th><th>CSS grade</th></tr></tfoot>  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

<!-- jQuery -->
<script src="<?php echo URL;?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo URL;?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo URL;?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo URL;?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo URL;?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo URL;?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo URL;?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo URL;?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo URL;?>plugins/jszip/jszip.min.js"></script>
<script src="<?php echo URL;?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo URL;?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo URL;?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo URL;?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo URL;?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo URL;?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo URL;?>dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>












  