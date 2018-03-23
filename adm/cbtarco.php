<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "index.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>

<?php require_once('../Connections/Federacao.php'); ?>
<?php
 header("Content-Type: text/html; charset=ISO-8859-1",true);

$query_cbtarco = "SELECT * FROM anualidadefederacao";
$cbtarco = mysqli_query($Federacao,$query_cbtarco) or die(mysql_error());
$row_cbtarco = mysqli_fetch_assoc($cbtarco);
$totalRows_cbtarco = mysqli_num_rows($cbtarco);
?>
<!doctype html>
<html>
<head>
<meta charset="iso-8859-1">
<meta name="robots" content="all">
<meta name="keywords" content="">
<meta name="description" content="">
<link href="../imgs/favicon.png" rel="shortcut icon" "image/png"/>

<title>Federa&ccedil;&atilde;o de Tiro com Arco do Distrito Federal</title>

<link href="../estilos.css" rel="stylesheet" type="text/css">
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>
<body>

<div id="container">
<div id="topo1" >
<div id="simbolo">
<img src="../imgs/Simbolo Fetarco-DF II.jpg" alt="Federa&ccedil;&atilde;o de Tiro com Arco do Distrito Federal" width="100" height="86">
</div>
<div id="nome">
<h1>Federa&ccedil;&atilde;o de Tiro com Arco do Distrito Federal </h1>
</div>
</div>
<!-- início do Menu -->
<div id="menu" >
<ul id="MenuBar1" class="MenuBarHorizontal">
  <li ><a href="../index.php" class="MenuBarHorizontal" >Home</a></li>
  <li><a href="filiados.php">Filiados</a></li>
  <li><a href="clubes.php">Clubes</a></li>
  <li><a href="#" class="MenuBarItemSubmenu">Competi&ccedil;&otilde;es</a>
    <ul>
      <li><a href="resultados.php">Resultados</a></li>
      <li><a href="campeonatos.php">Campeonatos</a></li>
      <li><a href="provas.php">Provas</a></li>
    </ul>
</li>
<li><a href="#" class="MenuBarItemSubmenu">Site</a>
  <ul>
    <li><a href="noticias.php">Not&iacute;cias</a></li>
    <li><a href="newsletter.php">Newsletter</a></li>
  </ul>
</li>
<li><a href="#" class="MenuBarItemSubmenu">Tabelas</a>
  <ul>
    <li><a href="categoria.php">Categoria</a></li>
    <li><a href="categoriaarbitros.php">Categoria de &Aacute;rbitros</a></li>
    <li><a href="classificacao.php">Classifica&ccedil;&atilde;o</a></li>
    <li><a href="faixaetaria.php">Faixa Etária</a></li>
    <li><a href="tipodearco.php">Tipo de Arco</a></li>
    <li><a href="tipodeprova.php">Tipo de Prova</a></li>
  </ul>
</li>
<li><a href="#" class="MenuBarItemSubmenu">Pagamentos</a>
  <ul>
    <li><a href="cbtarco.php">CBTARCO</a></li>
    <li><a href="anualidades.php">Anualidades</a></li>
  </ul>
</li>
</ul>
</div>
<br>
<br>
<!-- Início dos Títulos-->
<div id="titulosadm">
<p class="ParagrafoTitulo">Área Administrativa - Anualidade da Federação (pagamento para CBTARCO)</p>
</div>

<div id="utiladm">
<table width="911" border="1">
  <tr>
    <th width="50" scope="col">Ano</th>
    <th width="74" scope="col">Data do Pagamento</th>
    <th width="74" scope="col">Número de Arqueiros</th>
    <th width="74" scope="col">Número de Iniciantes</th>
    <th width="720" scope="col">Ação</th>
    
  </tr>
  <tr>
  	<form action="incluircbtarco.php" method="post" name="form1" target="_self">  
  	<td width="50" align="center"><span id="sprytextfield1">
    <input name="Ano" type="text" id="Ano" size="4" maxlength="4">
    <span class="textfieldRequiredMsg">Um valor é necessário.</span><span class="textfieldMinCharsMsg">Número mínimo de caracteres não atendido.</span><span class="textfieldMaxCharsMsg">Número máximo de caracteres excedido.</span><span class="textfieldInvalidFormatMsg">Formato inválido.</span><span class="textfieldMinValueMsg">O valor digitado é menor que o mínimo permitido.</span><span class="textfieldMaxValueMsg">O valor digitado é maior que o máximo permitido.</span></span></td>
     <td width="74" align="center"><input name="datapagamento" type="text" id="datapagamento" value=" <?php echo date('d/m/Y',time());?>" size="11" maxlength="10"></td>
      <td width="74" align="center"><label for="numarqueiros"></label>
        <span id="sprytextfield2">
        <input name="numarqueiros" type="text" id="numarqueiros" size="6" maxlength="5">
        <span class="textfieldRequiredMsg">Um valor é necessário.</span><span class="textfieldInvalidFormatMsg">Formato inválido.</span><span class="textfieldMinCharsMsg">Número mínimo de caracteres não atendido.</span><span class="textfieldMaxCharsMsg">Número máximo de caracteres excedido.</span><span class="textfieldMinValueMsg">O valor digitado é menor que o mínimo necessário.</span><span class="textfieldMaxValueMsg">O valor digitado é maior que o máximo permitido.</span></span></td>
      <td width="74" align="center"><label for="numiniciantes"></label>
        <span id="sprytextfield3">
        <input name="numiniciantes" type="text" id="numiniciantes" size="6" maxlength="5">
        <span class="textfieldRequiredMsg">Um valor é necessário.</span><span class="textfieldInvalidFormatMsg">Formato inválido.</span><span class="textfieldMinCharsMsg">Número mínimo de caracteres não atendido.</span><span class="textfieldMaxCharsMsg">Número máximo de caracteres excedido.</span><span class="textfieldMinValueMsg">O valor digitado é menor que o mínimo necessário.</span><span class="textfieldMaxValueMsg">O valor digitado é maior que o máximo permitido.</span></span></td>    
    <td width="720" align="center"><input name="Incluir" type="submit" value="Incluir"></td></form>
  </tr>
  <?php if($totalRows_cbtarco>0){ ?>

  <?php do { ?>
  <tr>
      <td width="50" align="center"><?php echo $row_cbtarco['Ano']; ?></td>
      <td width="74" align="center"><?php $timestamp=strtotime($row_cbtarco['datapagamento']); echo date('d/m/Y',$timestamp); ?></td>
      <td width="74" align="center"><?php echo $row_cbtarco['numeroarqueiros']; ?></td>
      <td width="74" align="center"><?php echo $row_cbtarco['numero iniciantes']; ?></td>
      
      <td align="center">
      <form action="excluircbtarco.php" method="post" target="_self">
        <input name="Ano" type="hidden" id="Ano" value="<?php echo $row_cbtarco['Ano'];?>">
        <input type="submit" class="botaoesquerda" value="Excluir">
       </form> </td>      
      </tr>
  <?php } while ($row_cbtarco = mysqli_fetch_assoc($cbtarco)); ?>
  <?php }; ?>
</table>
</div>
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../SpryAssets/SpryMenuBarRightHover.gif"});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "integer", {validateOn:["blur"], minChars:4, maxChars:4, minValue:2004, maxValue:2050});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "integer", {validateOn:["blur"], minChars:1, maxChars:5, minValue:0, maxValue:99999});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "integer", {minChars:1, maxChars:5, minValue:0, maxValue:99999, validateOn:["blur"]});
</script>
</body>
</html>
<?php
mysqli_free_result($cbtarco);
?>