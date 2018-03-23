<?php require_once('../Connections/Federacao.php'); ?>
<?php
header("Content-Type: text/html; charset=ISO-8859-1",true);

$query_tipodeprova = "SELECT * FROM tipodeprova";
$tipodeprova = mysqli_query($Federacao,$query_tipodeprova) or die(mysql_error());
$row_tipodeprova = mysqli_fetch_assoc($tipodeprova);
$totalRows_tipodeprova = mysqli_num_rows($tipodeprova);

$query_campeonato = "SELECT * FROM campeonato";
$campeonato = mysqli_query($Federacao,$query_campeonato) or die(mysql_error());
$row_campeonato = mysqli_fetch_assoc($campeonato);
$totalRows_campeonato = mysqli_num_rows($campeonato);
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
<p class="ParagrafoTitulo">Área Administrativa - Campeonatos</p>
</div>

<div id="utiladm">
  <form name="form2" method="post" action="">
    <label for="Campeonato"></label>
  </form>
<table width="937" border="1">
  <tr>
    <th width="65" scope="col">ID</th>
    <th width="65" scope="col">Ano</th>
    <th width="140" scope="col">Campeonato</th>
    <th width="80" scope="col">Tipo de Prova</th>
    <th width="100" scope="col">Número de Provas válidas para o Ranking</th>
    <th width="100" scope="col">Ação</th>  
  </tr>
    <tr>
  	<form action="incluircampeonato.php" method="post" enctype="multipart/form-data" name="form1" target="_self">  
  	<td width="65" align="center"><input name="IdCampeonato" type="text" size="5" maxlength="4" readonly></td>

    <td width="65" align="center"><span id="sprytextfield4"><input name="Ano" type="text" size="5" maxlength="4">
      <span class="textfieldRequiredMsg">Um valor é necessário.</span></span></td>

    <td width="140" align="center"><span id="sprytextfield2">
    <input name="Campeonato" type="text" id="Campeonato" size="46" maxlength="45">
    <span class="textfieldRequiredMsg">Um valor é necessário.</span><span class="textfieldMinCharsMsg">Número mínimo de caracteres não atendido.</span><span class="textfieldMaxCharsMsg">Número máximo de caracteres excedido.</span></span></td>
   	<td width="80" align="center"><span id="spryselect1"><span class="selectRequiredMsg">Selecione um item.</span></span>
          	  <select name="TipodeProvaNome" id="TipodeProvaNome">
          	    <?php do {  ?>
          	    <option value="<?php echo $row_tipodeprova['TipodeProvaNome']?>"
		<?php if (!(strcmp($row_tipodeprova['TipodeProvaNome'], $row_tipodeprova['TipodeProvaNome']))) {echo "selected=\"selected\"";} ?>><?php echo $row_tipodeprova['TipodeProvaNome']?></option>
          	    <?php
			} while ($row_tipodeprova = mysqli_fetch_assoc($tipodeprova));
	  $rows = mysqli_num_rows($tipodeprova);
  if($rows > 0) {
      mysqli_data_seek($tipodeprova, 0);
	  $row_tipodeprova = mysqli_fetch_assoc($tipodeprova);
  }
?>
   	        </select></td>
    <td width="100" align="center"><span id="spryselect2">
      <span id="sprytextfield1">
      <input name="Nprovas" type="text" id="Nprovas" size="3" maxlength="2">
      <span class="textfieldRequiredMsg">Um valor é necessário.</span><span class="textfieldInvalidFormatMsg">Formato inválido.</span><span class="textfieldMinCharsMsg">Número mínimo de caracteres não atendido.</span><span class="textfieldMaxCharsMsg">Número máximo de caracteres excedido.</span><span class="textfieldMinValueMsg">O valor digitado é menor que o mínimo necessário.</span><span class="textfieldMaxValueMsg">O valor digitado é maior que o máximo permitido.</span></span>      <span class="selectRequiredMsg">Selecione um item.</span></span>     </td> 
    <td width="100" align="center"><input name="Incluir" type="submit" value="Incluir"></td></form>
  </tr>
  <?php do { ?>
  <tr>
      <td width="65" align="center"><?php echo $row_campeonato['IdCampeonato']; ?></td>
      <td width="65" align="center"><?php echo $row_campeonato['Ano']; ?></td>
      <td width="140" align="center"><a href="ranking.php?id=<?php echo $row_campeonato['IdCampeonato']; ?>" target="_self"><?php echo utf8_decode($row_campeonato['Campeonato']); ?></a></td>
      <td width="80" align="center"><?php echo utf8_decode($row_campeonato['TipodeProvaNome']); ?></td>
      <td width="100" align="center"><?php echo $row_campeonato['Nprovas']; ?></td>
      <td width="100">
      <form action="excluircampeonato.php" method="post" target="_self" class="botaoesquerda">
        <input type="hidden" name="IdCampeonato" value="<?php echo $row_campeonato['IdCampeonato'];?>">    
        <input type="submit" value="Excluir"/>
      </form>   
      <form action="alterarcampeonato.php" method="post" target="_self">
        <input type="hidden" name="IdCampeonato" value="<?php echo $row_campeonato['IdCampeonato'];?>">
        <input type="submit" value="Alterar"/>
      </form>    
      </td>
      </tr>
  <?php } while ($row_campeonato = mysqli_fetch_assoc($campeonato)); ?>
</table>
</div>
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../SpryAssets/SpryMenuBarRightHover.gif"});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {validateOn:["blur"]});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {validateOn:["blur"]});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "integer", {validateOn:["blur"], minChars:1, maxChars:2, minValue:1, maxValue:20});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur"], minChars:5, maxChars:45});
</script>
</body>
</html>
<?php
mysqli_free_result($tipodeprova);
mysqli_free_result($campeonato);
?>