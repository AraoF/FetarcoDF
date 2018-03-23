<?php require_once('../Connections/Federacao.php');
$idclube=$_POST['idclube'];
$ClubeSigla=$_POST['ClubeSigla'];
$ClubeNome=utf8_encode($_POST['ClubeNome']);
$ClubeCidade=utf8_encode($_POST['ClubeCidade']);
$ClubeUF=$_POST['ClubeUF'];
$EhFederacao=$_POST['EhFederacao'];
$ClubeBairro=utf8_encode($_POST['ClubeBairro']);
$ClubeCEP=$_POST['ClubeCEP'];
$ClubeCNPJ=$_POST['ClubeCNPJ'];
$ClubeEndereco=utf8_encode($_POST['ClubeEndereco']);
$ClubeTelefone=$_POST['ClubeTelefone'];
$updateSQL = "Update clube set ClubeSigla='$ClubeSigla', ClubeNome='$ClubeNome', ClubeCidade='$ClubeCidade', ClubeUF='$ClubeUF', Federacao=$EhFederacao, ClubeBairro='$ClubeBairro', ClubeCEP='$ClubeCEP', ClubeCNPJ='$ClubeCNPJ', ClubeEndereco='$ClubeEndereco', ClubeTelefone='$ClubeTelefone' where idclube=$idclube";
$Result1 = mysqli_query($Federacao,$updateSQL);
header("Location: clubes.php");
?>