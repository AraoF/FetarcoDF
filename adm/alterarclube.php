<?php require_once('../Connections/Federacao.php'); ?>
<?php
header("Content-Type: text/html; charset=ISO-8859-1",true);
$idclube =isset($_POST['idclube'])  ? $_POST['idclube'] : $_GET['idclube'];
	$query_clube = sprintf("SELECT * FROM clube WHERE idclube = %s", $idclube);
	$clube = mysqli_query($Federacao,$query_clube) or die(mysql_error());
	$row_clube = mysqli_fetch_assoc($clube);
	$totalRows_clube = mysqli_num_rows($clube);
if ($totalRows_clube > 0) {
  $query_dirigentes = sprintf("SELECT * FROM dirigentes INNER JOIN filiado ON dirigentes.idfiliado=filiado.idfiliado WHERE dirigentes.idclube = %s", $idclube);
  $dirigentes = mysqli_query($Federacao,$query_dirigentes) or die(mysql_error());
  $row_dirigentes = mysqli_fetch_assoc($dirigentes);
  $totalRows_dirigentes = mysqli_num_rows($dirigentes);

  $query_filiado = sprintf("SELECT idfiliado,nome,dirigente,idclubedirigente FROM filiado ORDER BY nome ASC");
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
<p class="ParagrafoTitulo">Área Administrativa - Clubes</p>
</div>

<div id="utiladm">

<table width="749" border="0">
<form action="alteraregistroclube.php" method="post" enctype="multipart/form-data" name="form1" target="_self">  
  	<tr>
    	<th width="59" align="center">ID</th>
    	<td width="316"><input name="idclube" type="text" id="idclube" value="<?php echo $row_clube['idclube'] ?>" size="5"></td>
    	<th width="100" align="center">Sigla</th>
    	<td><span id="sprytextfield1">
    	  <input name="ClubeSigla" type="text" id="ClubeSigla" value="<?php echo $row_clube['ClubeSigla']; ?>" size="11" maxlength="10">
    	  <span class="textfieldRequiredMsg">Um valor é necessário.</span></span></td>
    </tr>
    <tr>
    	<th width="59" align="center">Nome</th>
    	<td><span id="sprytextfield2">
        <input name="ClubeNome" type="text" id="ClubeNome" value="<?php echo utf8_decode($row_clube['ClubeNome']); ?>" size="47" maxlength="46">
        <span class="textfieldRequiredMsg">Um valor é necessário.</span><span class="textfieldMaxCharsMsg">Número máximo de caracteres excedido.</span><span class="textfieldMinCharsMsg">Número mínimo de caracteres não atendido.</span></span></td>
    	<th width="100" align="center">Federação?</th>
    	<td><span id="spryselect3">
    	  <select name="EhFederacao" id="EhFederacao">
    	    <option value=1 <?php if ($row_clube['Federacao']==1) {echo "selected=\"selected\"";} ?>>Sim</option >
    	    <option value=0 <?php if ($row_clube['Federacao']==0) {echo "selected=\"selected\"";} ?>>Não</option >
          </select>
    	  <span class="selectRequiredMsg">Selecione um item.</span></span></td>
    </tr>
    <tr>
    	<th width="59" align="center">CNPJ</th>
    	<td><span id="sprytextfield3">
    	  <input name="ClubeCNPJ" type="text" id="ClubeCNPJ" value="<?php echo $row_clube['ClubeCNPJ']; ?>" size="21" maxlength="20">
</span></td>
    	<th width="100" align="center">Endereço</th>
    	<td><input name="ClubeEndereco" type="text" id="ClubeEndereco" value="<?php echo utf8_decode($row_clube['ClubeEndereco']); ?>" size="31" maxlength="30"></td>
    </tr>
    <tr>
    	<th width="59" align="center">Bairro</th>
    	<td><input name="ClubeBairro" type="text" id="ClubeBairro" value="<?php echo utf8_decode($row_clube['ClubeBairro']); ?>" size="31"></td>
    	<th width="100" align="center">Cidade</th>
    	<td><input type="text" name="ClubeCidade" id="ClubeCidade" value="<?php echo utf8_decode($row_clube['ClubeCidade']); ?>"></td>
    </tr>
    <tr>
    	<th width="59" align="center">Estado</th>
    	<td><span id="spryselect1">
    	  <label for="ClubeUF"></label>
   	  <select name="ClubeUF" id="ClubeUF">
   	    <option value="AC" <?php if ($row_clube['ClubeUF']=='AC') {echo "selected=\"selected\"";} ?>>AC</option >       	    
   	    <option value="AL" <?php if ($row_clube['ClubeUF']=='AL') {echo "selected=\"selected\"";} ?>>AL</option >       	    
   	    <option value="AM" <?php if ($row_clube['ClubeUF']=='AM') {echo "selected=\"selected\"";} ?>>AM</option >       	    
   	    <option value="AP" <?php if ($row_clube['ClubeUF']=='AP') {echo "selected=\"selected\"";} ?>>AP</option >       	    
   	    <option value="BA" <?php if ($row_clube['ClubeUF']=='BA') {echo "selected=\"selected\"";} ?>>BA</option >       	    
   	    <option value="CE" <?php if ($row_clube['ClubeUF']=='CE') {echo "selected=\"selected\"";} ?>>CE</option >       	    
   	    <option value="DF" <?php if ($row_clube['ClubeUF']=='DF') {echo "selected=\"selected\"";} ?>>DF</option >       	    
   	    <option value="ES" <?php if ($row_clube['ClubeUF']=='ES') {echo "selected=\"selected\"";} ?>>ES</option >       	    
   	    <option value="GO" <?php if ($row_clube['ClubeUF']=='GO') {echo "selected=\"selected\"";} ?>>GO</option >       	    
   	    <option value="MA" <?php if ($row_clube['ClubeUF']=='MA') {echo "selected=\"selected\"";} ?>>MA</option >       	    
   	    <option value="MG" <?php if ($row_clube['ClubeUF']=='MG') {echo "selected=\"selected\"";} ?>>MG</option >       	    
   	    <option value="MS" <?php if ($row_clube['ClubeUF']=='MS') {echo "selected=\"selected\"";} ?>>MS</option >       	    
   	    <option value="MT" <?php if ($row_clube['ClubeUF']=='MT') {echo "selected=\"selected\"";} ?>>MT</option >       	    
   	    <option value="PA" <?php if ($row_clube['ClubeUF']=='PA') {echo "selected=\"selected\"";} ?>>PA</option >       	    
   	    <option value="PB" <?php if ($row_clube['ClubeUF']=='PB') {echo "selected=\"selected\"";} ?>>PB</option >       	    
   	    <option value="PE" <?php if ($row_clube['ClubeUF']=='PE') {echo "selected=\"selected\"";} ?>>PE</option >       	    
   	    <option value="PI" <?php if ($row_clube['ClubeUF']=='PI') {echo "selected=\"selected\"";} ?>>PI</option >       	    
   	    <option value="PI" <?php if ($row_clube['ClubeUF']=='PI') {echo "selected=\"selected\"";} ?>>PI</option >        	    
        <option value="PR" <?php if ($row_clube['ClubeUF']=='PR') {echo "selected=\"selected\"";} ?>>PR</option >        	    
        <option value="RJ" <?php if ($row_clube['ClubeUF']=='RJ') {echo "selected=\"selected\"";} ?>>RJ</option >     
   	    <option value="RN" <?php if ($row_clube['ClubeUF']=='RN') {echo "selected=\"selected\"";} ?>>RN</option >        	    
        <option value="RO" <?php if ($row_clube['ClubeUF']=='RO') {echo "selected=\"selected\"";} ?>>RO</option >             
   	    <option value="RR" <?php if ($row_clube['ClubeUF']=='RR') {echo "selected=\"selected\"";} ?>>RR</option >     
   	    <option value="RS" <?php if ($row_clube['ClubeUF']=='RS') {echo "selected=\"selected\"";} ?>>RS</option >                     
   	    <option value="SC" <?php if ($row_clube['ClubeUF']=='SC') {echo "selected=\"selected\"";} ?>>SC</option >     
   	    <option value="SE" <?php if ($row_clube['ClubeUF']=='SE') {echo "selected=\"selected\"";} ?>>SE</option >     
   	    <option value="SP" <?php if ($row_clube['ClubeUF']=='SP') {echo "selected=\"selected\"";} ?>>SP</option >       	    
   	    <option value="TO" <?php if ($row_clube['ClubeUF']=='TO') {echo "selected=\"selected\"";} ?>>TO</option >     
   	    <option value="BR" <?php if ($row_clube['ClubeUF']=='BR') {echo "selected=\"selected\"";} ?>>BR</option >     
   	    <option value="EX" <?php if ($row_clube['ClubeUF']=='EX') {echo "selected=\"selected\"";} ?>>EX</option >                             
 	    </select></span></td>
    	<th width="100" align="center">CEP</th>
    	<td><span id="sprytextfield4">
    	  <input type="text" name="ClubeCEP" id="ClubeCEP" value="<?php echo $row_clube['ClubeCEP']; ?>">
    	  <span class="textfieldInvalidFormatMsg">Formato inválido.</span></span></td>
    </tr> 
    <tr>
    	<th width="59" align="center">Telefone</th>
    	<td><span id="sprytextfield5">
        <input type="text" name="ClubeTelefone" id="ClubeTelefone" value="<?php echo $row_clube['ClubeTelefone']; ?>">
<span class="textfieldInvalidFormatMsg">Formato inválido.</span></span></td>
  	<td width="100" align="center">&nbsp;</td>
    <td width="246" align="center"><input type="submit" name="Alterar" id="Alterar" value="Enviar"></td>
    </tr>
    </form>
</table>
<br>
<!-- Dirigentes -->
<h2>Dirigentes do(a) <?php echo utf8_decode($row_clube['ClubeNome']);?></h2>
<table width="100%" border="1" cellspacing="5" cellpadding="5">
    <tr>
      <th width="289" height="35" scope="col">Dirigente</th>
      <th width="186" scope="col">Função</th>
      <th width="66" scope="col">Data de Início</th>
      <th width="66" scope="col">Data de Fim</th>
      <th width="267" scope="col">Ação</th>
    </tr>
    <tr><form action="incluirdirigente.php" method="post" enctype="multipart/form-data" name="incluirdirigentes" target="_self">  
    	<input type="hidden" name="idclube" value="<?php echo $idclube?>">
      <td width="289"><span id="spryselect2">
        <label for="Dirigente"></label>
        <select name="idfiliado" id="idfiliado">
        <?php do {  ?>
        	<option   value="<?php echo $row_filiado['idfiliado']?>"><?php echo utf8_decode($row_filiado['nome'])?></option> 
        <?php } while ($row_filiado = mysqli_fetch_assoc($filiado));
	  	$rows = mysqli_num_rows($filiado);
	    if($rows > 0) {
           mysqli_data_seek($filiado, 0);	   
		  $row_filiado = mysqli_fetch_assoc($filiado);
	    } ?>
        </select>
        <span class="selectRequiredMsg">Selecione um item.</span></span></td>
      <td>
        <label for="DirigentesFuncao"></label>
        <span id="sprytextfield6">
        <input name="DirigentesFuncao" type="text" id="DirigentesFuncao" size="31" maxlength="30">
        <span class="textfieldRequiredMsg">Um valor é necessário.</span><span class="textfieldMaxCharsMsg">Número máximo de caracteres excedido.</span></span></td>
      <td align="center"><label for="Dirigentesdatainicio"></label>
        <span id="sprytextfield7">
        <input name="Dirigentesdatainicio" type="text" id="Dirigentesdatainicio" size="11" maxlength="10">
        <span class="textfieldRequiredMsg">Um valor é necessário.</span><span class="textfieldInvalidFormatMsg">Formato inválido.</span></span></td>
      <td align="center"><label for="Dirigentesdatafim"></label>
        <span id="sprytextfield8">
        <input name="Dirigentesdatafim" type="text" id="Dirigentesdatafim" size="11" maxlength="10">
        <span class="textfieldRequiredMsg">Um valor é necessário.</span><span class="textfieldInvalidFormatMsg">Formato inválido.</span></span></td>
      <td align="center">
      <input name="Incluir" type="submit" value="Incluir"></td></form>
    </tr>
    <?php do { ?>
    <tr><form name="alterardirigente" method="post" action="alterardirigente.php">
      <td width="289"><?php echo $row_dirigentes['nome'];?></td>
      <td align="center"><input name="DirigentesFuncao" type="text" id="DirigentesFuncao" size="31" maxlength="30" value="<?php echo utf8_decode($row_dirigentes['DirigentesFuncao']); ?>">
        </td>
      <td align="center"><label for="Dirigentesdatainicio2"></label>
        <span id="sprytextfield9">
        <input name="Dirigentesdatainicio2" type="text" id="Dirigentesdatainicio2" size="11" maxlength="10" value="<?php $timestamp=strtotime($row_dirigentes['Dirigentesdatainicio']); echo date('d/m/Y',$timestamp); ?>">
        <span class="textfieldRequiredMsg">Um valor é necessário.</span><span class="textfieldInvalidFormatMsg">Formato inválido.</span></span></td>
      <td align="center"><label for="Dirigentesdatafim2"></label>
        <span id="sprytextfield10">
        <input name="Dirigentesdatafim2" type="text" id="Dirigentesdatafim2" size="11" maxlength="10" value="<?php $timestamp=strtotime($row_dirigentes['Dirigentesdatafim']); echo date('d/m/Y',$timestamp); ?>">
        <span class="textfieldRequiredMsg">Um valor é necessário.</span><span class="textfieldInvalidFormatMsg">Formato inválido.</span></span>        </td>
      <td>

      	<input name="Alterar" type="submit" class="botaoesquerda" value="Alterar">
        <input type="hidden" name="idfiliado" value="<?php echo $row_dirigentes['idfiliado']?>">     
   		<input type="hidden" name="idclube" value="<?php echo $idclube?>">
      </form>
      <form name="excluirdirigente" method="post" action="excluirdirigente.php">
   	  	<input type="hidden" name="idfiliado" value="<?php echo $row_dirigentes['idfiliado']?>">     
   		<input type="hidden" name="idclube" value="<?php echo $idclube?>">
        <input name="Excluir" type="submit" class="botaodireita" value="Excluir">
      </form> 
      </td>
    </tr>

    <?php } while ($row_dirigentes = mysqli_fetch_assoc($dirigentes)); ?>

</table>
</div>
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../SpryAssets/SpryMenuBarRightHover.gif"});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur"], maxChars:46, minChars:5});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {isRequired:false});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "zip_code", {isRequired:false, validateOn:["blur"], format:"zip_us9"});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "phone_number", {isRequired:false});
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3", {validateOn:["blur"]});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "none", {validateOn:["blur"], maxChars:30});
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7", "date", {format:"dd/mm/yyyy", validateOn:["blur"]});
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8", "date", {format:"dd/mm/yyyy", validateOn:["blur"]});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {validateOn:["blur"]});
var spryselect4 = new Spry.Widget.ValidationSelect("spryselect4");
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9", "date", {format:"dd/mm/yyyy", validateOn:["blur"]});
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10", "date", {format:"dd/mm/yyyy", validateOn:["blur"]});
</script>
</body>
</html>
<?php 
}
mysqli_free_result($clube);
mysqli_free_result($dirigentes);
?>