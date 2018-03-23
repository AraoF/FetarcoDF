<?php require_once('../Connections/Federacao.php');
$idclube=$_POST['idclube'];
$idfiliado=$_POST['idfiliado'];
$DirigentesFuncao=utf8_encode($_POST['DirigentesFuncao']);
$Dirigentesdatainicio=$_POST['Dirigentesdatainicio2'];
$Dirigentesdatafim=$_POST['Dirigentesdatafim2'];
$Dirigentesdatainicio=implode("-",array_reverse(explode("/",$Dirigentesdatainicio)));
$Dirigentesdatafim=implode("-",array_reverse(explode("/",$Dirigentesdatafim)));
$updateSQL = "Update dirigentes set DirigentesFuncao='$DirigentesFuncao' ,Dirigentesdatainicio='$Dirigentesdatainicio', Dirigentesdatafim='$Dirigentesdatafim'  where idclube=$idclube and idfiliado=$idfiliado";
$Result1 = mysqli_query($Federacao,$updateSQL);
header("Location: alterarclube.php?idclube=$idclube");
?>