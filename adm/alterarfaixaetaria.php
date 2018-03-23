<?php require_once('../Connections/Federacao.php'); ?>
<?php
 header("Content-Type: text/html; charset=ISO-8859-1",true);
 $FaixaEtaria = isset($_POST['FaixaEtaria'])  ? $_POST['FaixaEtaria'] : "";
if ($FaixaEtaria != "") {
	$query_faixaetaria = sprintf("SELECT * FROM faixaetaria WHERE FaixaEtaria = '%s'", $FaixaEtaria);
	$faixaetaria = mysqli_query($Federacao,$query_faixaetaria) or die(mysql_error());
	$row_faixaetaria = mysqli_fetch_assoc($faixaetaria);
	$totalRows_prova = mysqli_num_rows($faixaetaria);
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
<p class="ParagrafoTitulo">Área Administrativa - Faixa Et&aacute;ria</p>
</div>

<div id="utiladm">
  <form action="alterarregistrofaixaetaria.php" method="post" enctype="multipart/form-data" name="alterarfaixaetaria" target="_self" id="alterarfaixaetaria">

  <p>&nbsp;</p>
  <table width="957" border="1">
    <tr>
      <td width="195" scope="col">Faixa Et&aacute;riia</td>
      <td width="746" scope="col"><input name="FaixaEtaria" type="text" id="FaixaEtaria" value="<?php echo $row_faixaetaria['FaixaEtaria']; ?>" size="10" maxlength="10" readonly></td>
    </tr>
    <tr>
      <td>Idade inicial</td>
      <td><span id="sprytextfield1">
      <input name="idadeinicial" type="text" id="idadeinicial" value="<?php echo $row_faixaetaria['idadeinicial']; ?>" size="2" maxlength="2">
      <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span><span class="textfieldMinValueMsg">O valor digitado é menor que o mínimo necessário.</span><span class="textfieldMaxValueMsg">O valor digitado é maior que o máximo permitido.</span><span class="textfieldMinCharsMsg">Número mínimo de caracteres não atendido.</span><span class="textfieldMaxCharsMsg">Número máximo de caracteres excedido.</span></span></td>
    </tr>
    <tr>
      <td>Idade final</td>
      <td><span id="sprytextfield2">
      <input name="idadefinal" type="text" id="idadefinal" value="<?php echo $row_faixaetaria['idadefinal']; ?>" size="2" maxlength="2">
      <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span><span class="textfieldMinCharsMsg">Número mínimo de caracteres não atendido.</span><span class="textfieldMaxCharsMsg">Número máximo de caracteres excedido.</span><span class="textfieldMinValueMsg">O valor digitado é menor que o mínimo necessário.</span><span class="textfieldMaxValueMsg">O valor digitado é maior que o máximo permitido.</span></span></td>
    </tr>
  </table>
  <p>
    <input type="submit" name="Alterar" id="Alterar" value="Enviar">
  </p>
    </form>
</div>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "integer", {validateOn:["blur"], useCharacterMasking:true, minValue:6, maxValue:99, minChars:1, maxChars:2});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "integer", {validateOn:["blur"], useCharacterMasking:true, minChars:2, maxChars:2, minValue:6, maxValue:99});
</script>
</body>
</html>
<?php } 
mysqli_free_result($faixaetaria);
?>