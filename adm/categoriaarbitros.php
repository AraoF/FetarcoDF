<?php require_once('../Connections/Federacao.php'); ?>
<?php
 header("Content-Type: text/html; charset=ISO-8859-1",true);

$query_categoriaarbitro = "SELECT * FROM categoria_arbitro";
$categoriaarbitro = mysqli_query($Federacao,$query_categoriaarbitro) or die(mysql_error());
$row_categoriaarbitro = mysqli_fetch_assoc($categoriaarbitro);
$totalRows_categoriaarbitro = mysqli_num_rows($categoriaarbitro);
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
<p class="ParagrafoTitulo">Área Administrativa - Categoria de &Aacute;rbitros</p>
</div>

<div id="utiladm">
<table width="396" border="1">
  <tr>
    <th width="240" scope="col">Sigla</th>
    <th width="240" scope="col">Categoria</th>
    <th width="140" scope="col">Ação</th>
    
  </tr>
    <tr>
  	<form action="incluircategoriaarbitros.php" method="post" enctype="multipart/form-data" name="form1" target="_self">  
  	<td align="center"><span id="sprytextfield4">
    <input name="SiglaCategoria" type="text" size="2" maxlength="2">
    <span class="textfieldRequiredMsg">Um valor é necessário.</span></span></td>
    <td align="center"><span id="sprytextfield1">
      <input name="NomeCategoria" type="text" size="30" maxlength="30">
      <span class="textfieldRequiredMsg">Um valor é necessário.</span></span>
    <td align="center"><input name="Incluir" type="submit" value="Incluir"></td></form>
  </tr>
  <?php do { ?>
  <tr>
      <td align="center"><?php echo $row_categoriaarbitro['SiglaCategoria']; ?></td>
      <td align="center"><?php echo utf8_decode($row_categoriaarbitro['NomeCategoria']); ?></td>
      <td align="center">
        <form action="excluircategoriaarbitros.php" method="post" target="_self">
          <input type="hidden" name="SiglaCategoria" value="<?php echo $row_categoriaarbitro['SiglaCategoria']; ?>">            
          <input type="submit" value="Excluir"/>
          </form>       
      </tr>
  <?php } while ($row_categoriaarbitro = mysqli_fetch_assoc($categoriaarbitro)); ?>
</table>
</div>
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../SpryAssets/SpryMenuBarRightHover.gif"});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {validateOn:["blur"]});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur"]});
</script>
</body>
</html>
<?php
mysqli_free_result($categoriaarbitro);
?>