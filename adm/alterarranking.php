<?php require_once('../Connections/Federacao.php');
$IdFiliado=$_POST['IdFiliado'];
$IdCampeonato=$_POST['IdCampeonato'];
$Colocacao=$_POST['Colocacao'];
$SiglaCategoria=$_POST['SiglaCategoria'];
$Clube=$_POST['AlteraClube'];
$sql="Update rankingcampeonato set Clube='$Clube', Colocacao=$Colocacao where IdCampeonato=$IdCampeonato and IdFiliado=$IdFiliado and SiglaCategoria='$SiglaCategoria'";
$resultado=mysqli_query($Federacao,$sql);
header("Location: ranking.php?id=$IdCampeonato");
?>