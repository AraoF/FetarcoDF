<?php require_once('../Connections/Federacao.php'); ?>
<?php
 header("Content-Type: text/html; charset=ISO-8859-1",true);
 $idNoticias = isset($_POST['idNoticias'])  ? $_POST['idNoticias'] : "";
if ($idNoticias != "") {
	$query_noticia = sprintf("SELECT * FROM noticias WHERE idNoticias = %s", $idNoticias);
	$noticia = mysqli_query($Federacao,$query_noticia) or die(mysql_error());
	$row_noticia = mysqli_fetch_assoc($noticia);
	$totalRows_prova = mysqli_num_rows($noticia);
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
<p class="ParagrafoTitulo">Área Administrativa - Notícias</p>
</div>

<div id="utiladm">
  <form action="alteraregistronoticias.php" method="post" enctype="multipart/form-data" name="alterarnoticia" target="_self" id="alterarnoticia">

  <p>&nbsp;</p>
  <table width="762" border="1">
    <tr>
      <td width="195" scope="col">ID</td>
      <td width="551" scope="col"><input name="idNoticias" type="text" id="idNoticias" value="<?php echo $row_noticia['idNoticias']; ?>" size="5" maxlength="5" readonly></td>
    </tr>
    <tr>
      <td>Manchete</td>
      <td><label for="Manchete"></label>
        <span id="sprytextfield3">
        <input name="Manchete" type="text" id="ProvaNome" value="<?php echo utf8_decode($row_noticia['Manchete']); ?>" size="81" maxlength="80">
        <span class="textfieldRequiredMsg">Um valor é necessário.</span><span class="textfieldMinCharsMsg">Número mínimo de caracteres não atendido.</span><span class="textfieldMaxCharsMsg">Número máximo de caracteres excedido.</span></span></td>
    </tr>
    <tr>
      <td>Data de In&iacute;cio de Exibi&ccedil;&atilde;o</td>
      <td><span id="sprytextfield1">
      <?php $iniciodataexbicao= date('d/m/Y',strtotime(mysqli_real_escape_string($Federacao,$row_noticia['iniciodataexbicao']))); ?>
      <input name="iniciodataexbicao" type="text" id="iniciodataexbicao" value="<?php echo $iniciodataexbicao; ?>" size="10" maxlength="10">
      <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
    </tr>
    <tr>
      <td>Data de Fim de Exibi&ccedil;&atilde;o</td>
      <td><span id="sprytextfield2">
      <?php $fimdataexibicao= date('d/m/Y',strtotime(mysqli_real_escape_string($Federacao,$row_noticia['fimdataexibicao']))); ?>
      <input name="fimdataexibicao" type="text" id="fimdataexibicao" value="<?php echo $fimdataexibicao; ?>" size="10" maxlength="10">
      <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
    </tr>
    <tr>
      <td>Data de Inclusão</td>
      <td><?php $datainclusao= date('d/m/Y',strtotime(mysqli_real_escape_string($Federacao,$row_noticia['datainclusao']))); ?>
        <input name="datainclusao" type="text" id="datainclusao" value="<?php echo $datainclusao ?>" size="10" maxlength="10" readonly></td>
    </tr>
    <tr>
      <td>Foto 1</td>
      <td><input name="foto1" type="text" id="foto1" value="<?php echo $row_noticia['foto1']; ?>" size="45" maxlength="40">
        <input type="file" name="foto4" id="foto4"></td>
    </tr>
    <tr>
      <td>Foto 2</td>
      <td><label for="foto2"></label>
        <input name="foto2" type="text" id="foto2" value="<?php echo $row_noticia['foto2']; ?>" size="45" maxlength="45">
        <input type="file" name="foto5" id="foto5"></td>
    </tr>
    <tr>
      <td height="36">Foto 3</td>
      <td><label for="foto3"></label>
        <input name="foto3" type="text" id="foto3" value="<?php echo $row_noticia['foto3']; ?>" size="45" maxlength="45">
        <input type="file" name="foto6" id="foto6"></td>
    </tr>
    <tr>
      <td>Texto</td>
      <td><label for="texto"></label>
        <textarea name="texto" cols="80" rows="10" id="texto"><?php echo utf8_decode($row_noticia['texto']); ?></textarea></td>
    </tr>
  </table>
  <p>
    <input type="submit" name="Alterar" id="Alterar" value="Enviar">
  </p>
    </form>
</div>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "date", {format:"dd/mm/yyyy", validateOn:["blur"], useCharacterMasking:true});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "date", {format:"dd/mm/yyyy", validateOn:["blur"], useCharacterMasking:true});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {minChars:10, maxChars:80, validateOn:["blur"]});
</script>
</body>
</html>
<?php } 
mysqli_free_result($noticia);
?>