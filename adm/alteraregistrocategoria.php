<?php require_once('../Connections/Federacao.php');
$sigla=strtoupper($_POST["SiglaCategoria"]);
$nome=utf8_encode($_POST['CategoriaNome']);
$sexo=strtoupper($_POST['Sexo']);
$faixaetaria=$_POST['FaixaEtaria'];
$tipodearco=$_POST['TipodeArco'];
$dist1fita=$_POST['dist1fita'];
$dist2fita=$_POST['dist2fita'];
$dist3fita=$_POST['dist3fita'];
$dist4fita=$_POST['dist4fita'];
$distcombate=$_POST['distcombate'];
$distduplo=$_POST['distduplo'];
$distindoor=$_POST['distindoor'];
$observacao=utf8_encode($_POST['observacao']);
$updateSQL = "Update categoria set SiglaCategoria='$sigla', CategoriaNome='$nome', TipodeArco='$tipodearco', Sexo='$sexo', FaixaEtaria='$faixaetaria', dist1fita= $dist1fita , dist2fita= $dist2fita, dist3fita= $dist3fita, dist4fita= $dist4fita, distcombate= $distcombate, distindoor= $distindoor, distduplo= $distduplo, observacao='$observacao' where SiglaCategoria='$sigla'";
$Result1 = mysqli_query($Federacao,$updateSQL);
header("Location: categoria.php");
?>