<?php require_once('../Connections/Federacao.php');
$IdCampeonato=$_POST['IdCampeonato'];
$Campeonato=utf8_encode($_POST['Campeonato']);
$Ano=$_POST['Ano'];
$Nprovas=$_POST['Nprovas'];
$TipodeProvaNome=$_POST['TipodeProvaNome'];
$sql="INSERT INTO campeonato (Ano,Campeonato,Nprovas,TipodeProvaNome) VALUES ($Ano,'$Campeonato',$Nprovas,'$TipodeProvaNome')";
$updateSQL = "Update campeonato set Campeonato='$Campeonato', Ano=$Ano, Nprovas=$Nprovas, TipodeProvaNome='$TipodeProvaNome' where IdCampeonato=$IdCampeonato";
$resultado=mysqli_query($Federacao,$updateSQL);
header("Location: campeonatos.php");
?>