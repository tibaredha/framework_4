<?php include "./config.php";?>
<div class="card-header"><i class="fas fa-table mr-1"></i>Liste des deces </div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered border-primary" id="dataTable" width="100%" cellspacing="0">
<thead><tr><th>Date</th><th>Nom_Prenom_[Fils_de]</th><th>Sexe</th><th>Age</th><th><i class="fas fa-print"></i></th><th><i class="fas fa-print"></i></th><th><i class="fas fa-edit"></i></th><th><i class="fas fa-trash"></i></th</tr></thead>
<tfoot><tr><th>Date</th><th>Nom_Prenom_[Fils_de]</th><th>Sexe</th><th>Age</th><th><i class="fas fa-print"></i></th><th><i class="fas fa-print"></i></th><th><i class="fas fa-edit"></i></th><th><i class="fas fa-trash"></i></th</tr></tfoot>
<tbody>
<?php
$sql = "SELECT id,NOM,PRENOM,FILSDE,ETDE,SEX,STRUCTURED,DINS, Days,Months,Years FROM deceshosp where DINS > '2021-01-01' ORDER BY DINS asc limit 0,200    ";
$result = $conn->query($sql);
$row_cnt = mysqli_num_rows($result);
printf("Le jeu de résultats a %d lignes.\n", $row_cnt);


if ($result->num_rows > 0) 
{
  while($row = $result->fetch_assoc()) 
  {
	echo '<tr>';
	echo '<td >'.dateUS2FR($row["DINS"]).'</td>';
	echo '<td>'.$row["NOM"].'_'.strtolower($row["PRENOM"]).'_['.strtolower($row["FILSDE"]).']'.'</td>';
	echo '<td>'.$row["SEX"].'</td>';
	
	if ($row["Days"]<30){echo '<td class="table-danger" >'.$row["Days"].'&ensp;Jours</td>';		
	}
	else{
		if($row["Days"]<365){echo '<td class="table-warning">'.$row["Months"].'&ensp;Mois</td>';}
		else{echo '<td class="table-success">'.$row["Years"].'&ensp;Ans</td>';}	
	}

	echo '<td><a target = "_blank"  title="a"  href="./fpdf/deces/deceshosp.php?uc='.$row["id"].'"><i class="fas fa-print"></i></a></td>';
	echo '<td><a target = "_blank"  title="b"  href="./tcpdf/deces/declaration.php?uc='.$row["id"].'"><i class="fas fa-print"></i></a></td>';
	echo '<td><a target = "_blank"  title="c"  href="./fpdf/deces/deceshosp.php?uc='.$row["id"].'"><i class="fas fa-edit"></i></a></td>';
	echo '<td><a target = "_blank"  title="d"  href="./tcpdf/deces/declaration.php?uc='.$row["id"].'"><i class="fas fa-trash"></i></a></td>';
	echo '</tr>';
  }
} 
else 
{
  echo "0 results";
}
$conn->close();
?> 
</tbody>
</table>
</div>
 </div>