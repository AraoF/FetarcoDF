<?php require_once('../Connections/Federacao.php'); ?>
<?php
header("Content-Type: text/html; charset=ISO-8859-1",true);

$query_tipodearco = "SELECT * FROM tipodearco";
$tipodearco = mysqli_query($Federacao,$query_tipodearco) or die(mysql_error());
$row_tipodearco = mysqli_fetch_assoc($tipodearco);
$totalRows_tipodearco = mysqli_num_rows($tipodearco);

$query_faixaetaria = "SELECT * FROM faixaetaria";
$faixaetaria = mysqli_query($Federacao,$query_faixaetaria) or die(mysql_error());
$row_faixaetaria = mysqli_fetch_assoc($faixaetaria);
$totalRows_faixaetaria = mysqli_num_rows($faixaetaria);

$query_categoria = "SELECT * FROM categoria";
$categoria = mysqli_query($Federacao,$query_categoria) or die(mysql_error());
$row_categoria = mysqli_fetch_assoc($categoria);
$totalRows_categoria = mysqli_num_rows($categoria);
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
<table width="850" border="1">
  <tr>
    <th width="120" scope="col">Sigla</th>
    <th width="180" scope="col">Categoria</th>
    <th width="148" scope="col">Tipo de Arco</th>
    <th width="105" scope="col">Sexo</th>
    <th width="105" scope="col">Faixa Etária</th>
    <th width="144" scope="col">Ação</th>  
  </tr>
    <tr>
  	<form action="incluircategoria.php" method="post" enctype="multipart/form-data" name="form1" target="_self">  
  	<td width="120" align="center"><input name="SiglaCategoria" type="text" size="3" maxlength="3"></td>
    <td width="180" align="center"><span id="sprytextfield4">
      <input name="CategoriaNome" type="text" size="30" maxlength="30">
      <span class="textfieldRequiredMsg">Um valor é necessário.</span></span></td>
    <td width="148" align="center"><span id="spryselect2">
      <select name="TipodeArco" id="TipodeArco">
        <?php do {  ?>
        <option value="<?php echo $row_tipodearco['TipodeArco']?>"
		<?php if (!(strcmp($row_tipodearco['TipodeArco'], $row_tipodearco['TipodeArco']))) {echo "selected=\"selected\"";} ?>><?php echo $row_tipodearco['TipodeArco']?></option>
        <?php
			} while ($row_tipodearco = mysqli_fetch_assoc($tipodearco));
	  $rows = mysqli_num_rows($tipodearco);
  if($rows > 0) {
      mysqli_data_seek($tipodearco, 0);
	  $row_tipodearco = mysqli_fetch_assoc($tipodearco);
  }
?>
      </select>
      <span class="selectRequiredMsg">Selecione um item.</span></span>     </td>
          	<td width="105" align="center"><span id="spryselect1">
   	  <select name="Sexo" id="Sexo">
   	    <option value="M">M</option>
   	    <option value="F">F</option>
 	    </select> <span class="selectRequiredMsg">Selecione um item.</span></span>   	  </td>
    <td width="148" align="center"><span id="spryselect2">
      <select name="FaixaEtaria" id="FaixaEtaria">
        <?php do {  ?>
        <option value="<?php echo $row_faixaetaria['FaixaEtaria']?>"
		<?php if (!(strcmp($row_faixaetaria['FaixaEtaria'], $row_faixaetaria['FaixaEtaria']))) {echo "selected=\"selected\"";} ?>><?php echo $row_faixaetaria['FaixaEtaria']?></option>
        <?php
			} while ($row_faixaetaria = mysqli_fetch_assoc($faixaetaria));
	  $rows = mysqli_num_rows($faixaetaria);
  if($rows > 0) {
      mysqli_data_seek($faixaetaria, 0);
	  $row_faixaetaria = mysqli_fetch_assoc($faixaetaria);
  }
?>
      </select>
      <span class="selectRequiredMsg">Selecione um item.</span></span>     </td> 
    <td width="144" align="center"><input name="Incluir" type="submit" value="Incluir"></td></form>
  </tr>
  <?php do { ?>
  <tr>
      <td width="120" align="center"><?php echo $row_categoria['SiglaCategoria']; ?></td>
      <td width="180" align="center"><?php echo utf8_decode($row_categoria['CategoriaNome']); ?></td>
      <td width="148" align="center"><?php echo utf8_decode($row_categoria['TipodeArco']); ?></td>
      <td width="105" align="center"><?php echo utf8_decode($row_categoria['Sexo']); ?></td>
      <td width="105" align="center"><?php echo utf8_decode($row_categoria['FaixaEtaria']); ?></td>
      <td width="144">
        <form action="excluircategoria.php" method="post" target="_self" class="botaoesquerda">
          <input type="hidden" name="SiglaCategoria" value="<?php echo $row_categoria['SiglaCategoria']; ?>">            
          <input type="submit" value="Excluir"/>
          </form>     
        <form action="alterarcategoria.php" method="post" target="_self" class="botaodireita">
          <input type="hidden" name="SiglaCategoria" value="<?php echo $row_categoria['SiglaCategoria']; ?>">
          <input type="submit" value="Alterar"/>
          </form>    
        </td>
      </tr>
  <?php } while ($row_categoria = mysqli_fetch_assoc($categoria)); ?>
</table>
</div>
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../SpryAssets/SpryMenuBarRightHover.gif"});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {validateOn:["blur"]});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {validateOn:["blur"]});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
</script>
</body>
</html>
<?php
mysqli_free_result($tipodearco);
mysqli_free_result($faixaetaria);
mysqli_free_result($categoria);
?>