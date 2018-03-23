<?php require_once('../Connections/Federacao.php'); ?>
<?php
 header("Content-Type: text/html; charset=ISO-8859-1",true);
 $SiglaCategoria = isset($_POST['SiglaCategoria'])  ? $_POST['SiglaCategoria'] : "";
if ($SiglaCategoria != "") {
	$query_categoria = sprintf("SELECT * FROM categoria WHERE SiglaCategoria = '%s'", $SiglaCategoria);
	$categoria = mysqli_query($Federacao,$query_categoria) or die(mysql_error());
	$row_categoria = mysqli_fetch_assoc($categoria);
	$totalRows_categoria = mysqli_num_rows($categoria);
	
$query_tipodearco = "SELECT * FROM tipodearco";
$tipodearco = mysqli_query($Federacao,$query_tipodearco) or die(mysql_error());
$row_tipodearco = mysqli_fetch_assoc($tipodearco);
$totalRows_tipodearco = mysqli_num_rows($tipodearco);

$query_faixaetaria = "SELECT * FROM faixaetaria";
$faixaetaria = mysqli_query($Federacao,$query_faixaetaria) or die(mysql_error());
$row_faixaetaria = mysqli_fetch_assoc($faixaetaria);
$totalRows_faixaetaria = mysqli_num_rows($faixaetaria);
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
<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
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
<p class="ParagrafoTitulo">Área Administrativa - Categoria</p>
</div>

<div id="utiladm">
  <form action="alteraregistrocategoria.php" method="post" enctype="multipart/form-data" name="alterarcategoria" target="_self" id="alterarcategoria">
  <table width="957" border="1">
    <tr>
      <td width="204" scope="col">Sigla </td>
      <td width="737" scope="col"><input name="SiglaCategoria" type="text" id="SiglaCategoria" value="<?php echo $row_categoria['SiglaCategoria']; ?>" size="3" maxlength="3" readonly></td>
    </tr>
    <tr>
      <td>Categoria</td>
      <td><label for="CategoriaNome"></label>
        <span id="sprytextfield3">
        <input name="CategoriaNome" type="text" id="ProvaNome" value="<?php echo utf8_decode($row_categoria['CategoriaNome']); ?>" size="30" maxlength="30">
        <span class="textfieldRequiredMsg">Um valor é necessário.</span></span></td>
    </tr>
    <tr>
      <td>Tipo de Arco</td>
    <td align="left"><span id="spryselect3">
      <select name="TipodeArco" id="TipodeArco">
        <?php do {  ?>
        <option value="<?php echo $row_tipodearco['TipodeArco']?>"<?php if($row_categoria['TipodeArco']==$row_tipodearco['TipodeArco']){?> selected <?php };?>><?php echo $row_tipodearco['TipodeArco'];?></option>
        <?php
			} while ($row_tipodearco = mysqli_fetch_assoc($tipodearco));
	  $rows = mysqli_num_rows($tipodearco);
  if($rows > 0) {
      mysqli_data_seek($tipodearco, 0);
	  $row_tipodearco = mysqli_fetch_assoc($tipodearco);
  }
?>
      </select>
      <span class="selectInvalidMsg">Selecione um item válido.</span><span class="selectRequiredMsg">Selecione um item.</span></span></td>    </tr>
    <tr>
      <td>Sexo</td>
      <td><span id="spryselect1">
        <select name="Sexo" id="Sexo">
          <option value="M" <?php if ($row_categoria['Sexo']=='M') {echo "selected=\"selected\"";} ?>>M</option>
          <option value="F" <?php if ($row_categoria['Sexo']=='F') {echo "selected=\"selected\"";} ?>>F</option>
        </select>
        <span class="selectInvalidMsg">Selecione um item válido.</span><span class="selectRequiredMsg">Selecione um item.</span></span></td>
    </tr>
    <tr>
      <td>Faixa Et&aacute;ria</td>
      <td><select name="FaixaEtaria" id="FaixaEtaria">     
        <?php do {  ?>
        <option value="<?php echo $row_faixaetaria['FaixaEtaria']?>"<?php if($row_faixaetaria['FaixaEtaria']==$row_categoria['FaixaEtaria']){?> selected <?php };?>><?php echo $row_faixaetaria['FaixaEtaria'];?></option>
        <?php
			} while ($row_faixaetaria = mysqli_fetch_assoc($faixaetaria));
	  $rows = mysqli_num_rows($faixaetaria);
  if($rows > 0) {
      mysqli_data_seek($faixaetaria, 0);
	  $row_faixaetaria = mysqli_fetch_assoc($faixaetaria);
  }
?>
      </select>
        </td>
    </tr>
    <tr>
      <td>1&ordf; Dist&acirc;ncia</td>
      <td><input name="dist1fita" type="text" id="dist1fita" value="<?php echo $row_categoria['dist1fita']; ?>" size="2" maxlength="2"></td>
    </tr>
    <tr>
      <td>2&ordf; Dist&acirc;ncia</td>
      <td><input name="dist2fita" type="text" id="dist2fita" value="<?php echo $row_categoria['dist2fita']; ?>" size="2" maxlength="2"></td>
    </tr>
    <tr>
      <td>3&ordf; Dist&acirc;ncia</td>
      <td><input name="dist3fita" type="text" id="dist3fita" value="<?php echo $row_categoria['dist3fita']; ?>" size="2" maxlength="2"></td>
    </tr>
    <tr>
      <td>4&ordf; Dist&acirc;ncia</td>
      <td><input name="dist4fita" type="text" id="dist4fita" value="<?php echo $row_categoria['dist4fita']; ?>" size="2" maxlength="2"></td>
    </tr>
        <tr>
      <td> Dist&acirc;ncia do Combate</td>
      <td><input name="distcombate" type="text" id="distcombate" value="<?php echo $row_categoria['distcombate']; ?>" size="2" maxlength="2"></td>
    </tr>
        <tr>
      <td>Dist&acirc;ncia do Round Duplo</td>
      <td><input name="distduplo" type="text" id="distduplo" value="<?php echo $row_categoria['distduplo']; ?>" size="2" maxlength="2"></td>
    </tr>
        <tr>
      <td>Dist&acirc;ncia do Indoor</td>
      <td><input name="distindoor" type="text" id="distindoor" value="<?php echo $row_categoria['distindoor']; ?>" size="2" maxlength="2"></td>
    </tr>
     <tr>
      <td>Observação</td>
      <td><label for="texto">
        <textarea name="observacao" cols="100" rows="3" id="observacao"><?php echo utf8_decode($row_categoria['observacao']); ?></textarea>
      </label></td>
    </tr>
  </table>
  <p>
    <input type="submit" name="Alterar" id="Alterar" value="Enviar">
  </p>
    </form>
</div>
<form name="form1" method="post" action="">
</form>
</div>
<script type="text/javascript">
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {validateOn:["blur"]});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {validateOn:["blur"], invalidValue:"-1"});
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3", {invalidValue:"-1", validateOn:["blur"]});
</script>
</body>
</html>
<?php } 
mysqli_free_result($tipodearco);
mysqli_free_result($faixaetaria);
mysqli_free_result($categoria);
?>