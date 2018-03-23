<?php require_once('../Connections/Federacao.php');
$idprova=$_POST['idProva'];
$idarbitro=$_POST['idarbitro'];
$funcao=utf8_encode($_POST['funcao2']);
$updateSQL = "Update arbitros_da_prova set funcao='$funcao' where idprova=$idprova and idarbitro=$idarbitro";
$Result1 = mysqli_query($Federacao,$updateSQL);
header("Location: alterarprova.php?idProva=$idprova");
?>