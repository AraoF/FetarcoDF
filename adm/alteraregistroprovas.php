<?php require_once('../Connections/Federacao.php');
$idProva = $_POST['idProva'];
$ProvaNome = utf8_encode($_POST['ProvaNome']);
$ProvaLocal = utf8_encode($_POST['ProvaLocal']);
$Tipodeprova =$_POST['Tipodeprova'];
$Provadatainicio=isset($_POST['Provadatainicio'])  ? $_POST['Provadatainicio'] : "";
$Provadatafim=isset($_POST['Provadatafim'])  ? $_POST['Provadatafim'] : "";
if($_POST['ProvaTemCombate'] == 'on'){$ProvaTemCombate=1;} else {$ProvaTemCombate=0;};
if($_POST['ProvaMICA'] == 'on'){$ProvaMICA=1;} else {$ProvaMICA=0;};
if($_POST['ProvaBrasileiro'] == 'on'){$ProvaBrasileiro=1;} else {$ProvaBrasileiro=0;};
if($_POST['ProvaEstrelaFita'] == 'on'){$ProvaEstrelaFita=1;} else {$ProvaEstrelaFita=0;};
if($Provadatainicio=="") {$Provadatainicio=date('d/m/Y');};
if($Provadatafim=="") {$Provadatafim=date('d/m/Y');};
$Provadatainicio=implode("-",array_reverse(explode("/",$Provadatainicio)));
$Provadatafim=implode("-",array_reverse(explode("/",$Provadatafim)));
$ProvaNumdistComposto=$_POST['ProvaNumdistComposto'];
$ProvaNumdistRecurvo=$_POST['ProvaNumdistRecurvo'];
$updateSQL = "Update prova set ProvaNome='$ProvaNome',ProvaLocal='$ProvaLocal',Tipodeprova='$Tipodeprova', ProvaTemCombate=$ProvaTemCombate, ProvaEstrelaFita=$ProvaEstrelaFita, ProvaMICA=$ProvaMICA, ProvaBrasileiro=$ProvaBrasileiro, Provadatainicio='$Provadatainicio', Provadatafim='$Provadatafim', ProvaNumdistComposto=$ProvaNumdistComposto, ProvaNumdistRecurvo=$ProvaNumdistRecurvo where idProva=$idProva";
$Result1 = mysqli_query($Federacao,$updateSQL);
if (mysqli_affected_rows($Federacao) != 1) { 
   if (mysqli_errno($Federacao)){
       die("Falha".mysqli_error($Federacao));
   }
}

header("Location: provas.php");
?>