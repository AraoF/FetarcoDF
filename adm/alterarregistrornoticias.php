<?php require_once('../Connections/Federacao.php');
$Manchete = isset($_POST['Manchete'])  ? $_POST['Manchete'] : "";
$iniciodataexbicao = isset($_POST['iniciodataexbicao'])  ? $_POST['iniciodataexbicao'] : "";
$fimdataexibicao = isset($_POST['fimdataexibicao'])  ? $_POST['fimdataexibicao'] : "";
$recebe_foto1 = $_FILES['foto1']['name'];
$tmp_foto1 = $_FILES['foto1']['tmp_name'];
$foto1 = isset($_POST['foto1'])  ? $_POST['foto1'] : "";
$Manchete= utf8_encode($Manchete);
$d1=time();
$d2=strtotime("+365 days",time());
if($iniciodataexbicao=="") {$iniciodataexbicao=date('d/m/Y',$d1);};
if($fimdataexibicao=="") {$fimdataexbicao=date('Y-m-d',$d2);};
$iniciodataexbicao=implode("-",array_reverse(explode("/",$iniciodataexbicao)));
$fimdataexibicao=implode("-",array_reverse(explode("/",$fimdataexibicao)));
if ($Manchete != "") {
  $insertSQL = sprintf("INSERT INTO noticias (Manchete,iniciodataexbicao,foto1,fimdataexibicao) VALUES   ('%s','%s','%s','%s')", $Manchete,$iniciodataexbicao,$recebe_foto1,$fimdataexbicao);
 if(mysqli_query($Federacao,$insertSQL) or die("Erro ao salvar os dados-->".mysqli_error($Federacao)));{
	 move_uploaded_file($tmp_foto1,'../upload/'.$recebe_foto1);}
}
header("Location: noticias.php");
?>
