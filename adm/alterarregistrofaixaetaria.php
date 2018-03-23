<?php require_once('../Connections/Federacao.php');
$FaixaEtaria = $_POST['FaixaEtaria'];
$iinicial=$_POST['idadeinicial'];
$ifinal=$_POST['idadefinal'];
$updateSQL = "Update faixaetaria set idadeinicial=$iinicial, idadefinal=$ifinal where FaixaEtaria='$FaixaEtaria'";
$Result1 = mysqli_query($Federacao,$updateSQL);
header("Location: faixaetaria.php");
?>
