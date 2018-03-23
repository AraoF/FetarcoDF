<?php require_once('../Connections/Federacao.php');
$idNoticias=$_POST['idNoticias'];
$Manchete = utf8_encode($_POST['Manchete']);
$iniciodataexbicao = $_POST['iniciodataexbicao'];
$iniciodataexbicao=implode("-",array_reverse(explode("/",$iniciodataexbicao)));
$fimdataexibicao = $_POST['fimdataexibicao'];
$fimdataexibicao=implode("-",array_reverse(explode("/",$fimdataexibicao)));
$texto=utf8_encode($_POST['texto']);

$recebe_foto1=$_POST['foto1'];
$recebe_foto4 = $_FILES['foto4']['name'];
$tmp_foto4 = $_FILES['foto4']['tmp_name'];

$recebe_foto2=$_POST['foto2'];
$recebe_foto5 = $_FILES['foto5']['name'];
$tmp_foto5 = $_FILES['foto5']['tmp_name'];

$recebe_foto3=$_POST['foto3'];
$recebe_foto6 = $_FILES['foto6']['name'];
$tmp_foto6 = $_FILES['foto6']['tmp_name'];

$updateSQL = "Update noticias set Manchete='$Manchete', iniciodataexbicao='$iniciodataexbicao',fimdataexibicao='$fimdataexibicao',texto='$texto' where idNoticias=$idNoticias";
$Result1 = mysqli_query($Federacao,$updateSQL);

if ($recebe_foto4!=""){
	if ($recebe_foto4<>$recebe_foto1) {
		$updateSQL = "Update noticias set foto1='$recebe_foto4'where idNoticias=$idNoticias";
		$Result2 = mysqli_query($Federacao,$updateSQL);
		 move_uploaded_file($tmp_foto4,'../upload/'.$recebe_foto4);

	};
};
if ($recebe_foto5<>""){
	if($recebe_foto5<>$recebe_foto2) {
    	$updateSQL = "Update noticias set foto2='$recebe_foto5'where idNoticias=$idNoticias";
		$Result3 = mysqli_query($Federacao,$updateSQL);
		 move_uploaded_file($tmp_foto5,'../upload/'.$recebe_foto5);

	};
};
if ($recebe_foto6<>""){
	if($recebe_foto6<>$recebe_foto3) {
    	$updateSQL = "Update noticias set foto3='$recebe_foto6'where idNoticias=$idNoticias";
		$Result4 = mysqli_query($Federacao,$updateSQL);
		 move_uploaded_file($tmp_foto6,'../upload/'.$recebe_foto6);
	};
};

header("Location: noticias.php");
?>