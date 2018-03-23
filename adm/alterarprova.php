<?php require_once('../Connections/Federacao.php'); ?>
<?php
 header("Content-Type: text/html; charset=ISO-8859-1",true);

$idProva = isset($_POST['idProva'])  ? $_POST['idProva'] : $_GET['idProva'];
if ($idProva != "") {

	$query_prova = sprintf("SELECT * FROM prova WHERE idProva = %s", $idProva);
	$prova = mysqli_query($Federacao,$query_prova) or die(mysql_error());
	$row_prova = mysqli_fetch_assoc($prova);
	$totalRows_prova = mysqli_num_rows($prova);
	
if ($totalRows_prova > 0) {
  $query_arbitros = sprintf("SELECT * FROM arbitros_da_prova INNER JOIN filiado ON arbitros_da_prova.idarbitro=filiado.idfiliado where arbitros_da_prova.idprova=%s ORDER BY nome ASC", $idProva);
  $arbitros = mysqli_query($Federacao,$query_arbitros) or die(mysql_error());
  $row_arbitros = mysqli_fetch_assoc($arbitros);
  $totalRows_arbitros = mysqli_num_rows($arbitros);

  $query_filiado = sprintf("SELECT idfiliado,nome,arbitro FROM filiado where arbitro=1");
  $filiado = mysqli_query($Federacao,$query_filiado) or die(mysql_error());
  $row_filiado = mysqli_fetch_assoc($filiado);
  $totalRows_filiado = mysqli_num_rows($filiado);
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
<p class="ParagrafoTitulo">Área Administrativa - Provas</p>
</div>

<div id="utiladm">
  <form action="alteraregistroprovas.php" method="post" enctype="multipart/form-data" name="alterarprova" target="_self" id="alterarprova">
  <table width="743" border="1">
    <tr>
      <td width="182" scope="col">ID</td>
      <td width="85" scope="col"><input name="idProva" type="text" id="idProva" value="<?php echo $row_prova['idProva']; ?>" size="5" maxlength="5" readonly></td>
      <td width="182">Nome</td>
      <td width="266"><label for="ProvaNome"></label>
        <input name="ProvaNome" type="text" id="ProvaNome" value="<?php echo utf8_decode($row_prova['ProvaNome']); ?>" size="45" maxlength="45"></td>
    </tr>
    <tr>
      <td width="182">Data de In&iacute;cio</td>
      <td><span id="sprytextfield1">
      <?php $Provadatainicio= date('d/m/Y',strtotime(mysqli_real_escape_string($Federacao,$row_prova['Provadatainicio']))); ?>
      <input name="Provadatainicio" type="text" id="Provadatainicio" value="<?php echo $Provadatainicio; ?>" size="10" maxlength="10">
      <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
      <td width="182">Data de Fim</td>
      <td><span id="sprytextfield2">
      <?php $Provadatafim= date('d/m/Y',strtotime(mysqli_real_escape_string($Federacao,$row_prova['Provadatafim']))); ?>
      <input name="Provadatafim" type="text" id="Provadatafim" value="<?php echo $Provadatafim; ?>" size="10" maxlength="10">
      <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
    </tr>
    <tr>
      <td width="182">Tipo da prova</td>
      <td><select name="Tipodeprova" id="Tipodeprova">
        <option value="3D" <?php if (!(strcmp("3D", $row_prova['Tipodeprova']))) {echo "selected=\"selected\"";} ?>>3D</option>
        <option value="Indoor" <?php if (!(strcmp("Indoor", $row_prova['Tipodeprova']))) {echo "selected=\"selected\"";} ?>>Indoor</option>
        <option value="Outdoor" <?php if (!(strcmp("Outdoor", $row_prova['Tipodeprova']))) {echo "selected=\"selected\"";} ?>>Outdoor</option>
        <option value="Field" <?php if (!(strcmp("Field", $row_prova['Tipodeprova']))) {echo "selected=\"selected\"";} ?>>Field</option>
      </select></td>
      <td width="182">Local</td>
      <td><input name="ProvaLocal" type="text" id="ProvaLocal" value="<?php echo utf8_decode($row_prova['ProvaLocal']); ?>" size="40" maxlength="40"></td>
    </tr>
    <tr>
      <td width="182">Brasileiro?</td>
      <td><input <?php if (!(strcmp($row_prova['ProvaBrasileiro'],1))) {echo "checked=\"checked\"";} ?> type="checkbox" name="ProvaBrasileiro" id="ProvaBrasileiro"></td>
      <td width="182">Estrela Fita?</td>
      <td><input <?php if (!(strcmp($row_prova['ProvaEstrelaFita'],1))) {echo "checked=\"checked\"";} ?> type="checkbox" name="ProvaEstrelaFita" id="ProvaEstrelaFita"></td>
    </tr>
    <tr>
      <td width="182">Mica?</td>
      <td><input <?php if (!(strcmp($row_prova['ProvaMICA'],1))) {echo "checked=\"checked\"";} ?> type="checkbox" name="ProvaMICA" id="ProvaMICA"></td>
      <td width="182">Tem combate?</td>
      <td><input <?php if (!(strcmp($row_prova['ProvaTemCombate'],1))) {echo "checked=\"checked\"";} ?> type="checkbox" name="ProvaTemCombate" id="ProvaTemCombate"></td>
    </tr>
    <tr>
      <td width="182">N&uacute;mero de dist&acirc;ncias de Recurvo</td>
      <td><select name="ProvaNumdistRecurvo" id="ProvaNumdistRecurvo">
        <option value="2" <?php if (!(strcmp(2, $row_prova['ProvaNumdistRecurvo']))) {echo "selected=\"selected\"";} ?>>2</option>
        <option value="4" <?php if (!(strcmp(4, $row_prova['ProvaNumdistRecurvo']))) {echo "selected=\"selected\"";} ?>>4</option>
      </select></td>
      <td width="182">N&uacute;mero de dist&acirc;ncias de Composto</td>
      <td><select name="ProvaNumdistComposto" id="ProvaNumdistComposto">
        <option value="2" <?php if (!(strcmp(2, $row_prova['ProvaNumdistComposto']))) {echo "selected=\"selected\"";} ?>>2</option>
        <option value="4" <?php if (!(strcmp(4, $row_prova['ProvaNumdistComposto']))) {echo "selected=\"selected\"";} ?>>4</option>
      </select></td>
    </tr>
  </table>
  <p>
    <input type="submit" name="Alterar" id="Alterar" value="Enviar">
  </p>
    </form>
<!-- Árbitros -->
<h2>&Aacute;rbitros da Prova</h2>
<table width="59%" border="1" cellspacing="5" cellpadding="5">
    <tr>
      <th width="230" height="35" scope="col">&Aacute;rbitro</th>
      <th width="139" scope="col">Função</th>
      <th width="146" scope="col">Ação</th>
    </tr>
    <form action="incluirarbitroprova.php" method="post" enctype="multipart/form-data" name="incluirarbitroprova" target="_self"> 
    <tr> 
    	<input type="hidden" name="idProva" value="<?php echo $idProva?>">
      <td width="230"><span id="spryselect2">
        <label for="Arbitro"></label>
        <select name="idarbitro" id="idarbitro">
        <?php do {  ?>
        	<option   value="<?php echo $row_filiado['idfiliado']?>"><?php echo utf8_decode($row_filiado['nome'])?></option> 
        <?php } while ($row_filiado = mysqli_fetch_assoc($filiado));
	  	$rows = mysqli_num_rows($filiado);
	    if($rows > 0) {
           mysqli_data_seek($filiado, 0);	   
		  $row_filiado = mysqli_fetch_assoc($filiado);
	    } ?>
        </select>
        <span class="selectRequiredMsg"></span></span></td>
      <td>
        <label for="ArbitroFuncao"></label>
        <span id="sprytextfield6">
          <label for="funcao"></label>
          <select name="funcao" id="funcao">
            <option value="&Aacute;rbitro">&Aacute;rbitro</option>
            <option value="DOS">DOS</option>
            <option value="Chefe dos &Aacute;rbitros">Chefe dos &Aacute;rbitros</option>
            <option value="Delegado T&eacute;cnico">Delegado T&eacute;cnico</option>
          </select>
          <span class="textfieldRequiredMsg">Um valor é necessário.</span>
          <span class="textfieldMaxCharsMsg">Número máximo de caracteres excedido.</span>
         </span></td>
      <td align="center">
        <input name="Incluir" type="submit" value="Incluir"></td>
    </tr>
    <?php if  ($totalRows_arbitros>0){?>
    </form>
    <?php do { ?>
    <tr>
    <form name="alterararbitroprova" method="post" action="alterararbitroprova.php">  
      <td width="230" height="74">      
         <?php echo utf8_decode($row_arbitros['nome'])?>
		</td>
      <td>
        <label for="ArbitroFuncao"></label>
        <span id="sprytextfield6"><span class="textfieldRequiredMsg">Um valor é necessário.</span>
          <span class="textfieldMaxCharsMsg">Número máximo de caracteres excedido.</span>
         </span>     
        <select name="funcao2" id="funcao2">
          <option value="&Aacute;rbitro"  <?php if (!(strcmp("Árbitro", utf8_decode($row_arbitros['funcao'])))) {echo "selected=\"selected\"";} ?>>&Aacute;rbitro</option>
          <option value="DOS" <?php if (!(strcmp("DOS", utf8_decode($row_arbitros['funcao'])))) {echo "selected=\"selected\"";} ?>>DOS</option>
          <option value="Chefe dos &Aacute;rbitros" <?php if (!(strcmp("Chefe dos Árbitros", utf8_decode($row_arbitros['funcao'])))) {echo "selected=\"selected\"";} ?>>Chefe dos &Aacute;rbitros</option>
          <option value="Delegado T&eacute;cnico" <?php if (!(strcmp("Delegado Técnico", utf8_decode($row_arbitros['funcao'])))) {echo "selected=\"selected\"";} ?>>Delegado T&eacute;cnico</option>
        </select>
      <td>
        <input name="Alterar" type="submit" class="botaoesquerda" value="Alterar">
        <input type="hidden" name="idarbitro" value="<?php echo $row_arbitros['idarbitro']?>">     
        <input type="hidden" name="idProva" value="<?php echo $idProva?>"></form>
      <form name="excluirarbitroprova" method="post" action="excluirarbitroprova.php">
   	  	<input type="hidden" name="idarbitro" value="<?php echo $row_arbitros['idarbitro']?>">     
   		<input type="hidden" name="idProva" value="<?php echo $idProva?>">
        <input name="Excluir" type="submit" class="botaodireita" value="Excluir">
      </form> 
    </tr>

    <?php } while ($row_arbitros = mysqli_fetch_assoc($arbitros)); ?>

</table>
<?php }?>
<!-- fim árbitros -->    
    
    
</div>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "date", {format:"dd/mm/yyyy", validateOn:["blur"], useCharacterMasking:true});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "date", {format:"dd/mm/yyyy", validateOn:["blur"], useCharacterMasking:true});
</script>
</body>
</html>
<?php } 
mysqli_free_result($prova);
mysqli_free_result($filiado);
mysqli_free_result($arbitros);
}
?>