<?php require_once('../Connections/Federacao.php'); ?>
<?php
header("Content-Type: text/html; charset=ISO-8859-1",true);
$idfiliado=$_POST['idfiliado'];

$query_filiado = "SELECT * FROM filiado where idfiliado=".$idfiliado;
$filiado= mysqli_query($Federacao,$query_filiado) or die(mysql_error());
$row_filiado = mysqli_fetch_assoc($filiado);
$totalRows_filiado = mysqli_num_rows($filiado);

$query_categoria = "SELECT * FROM categoria_arbitro";
$categoria = mysqli_query($Federacao,$query_categoria) or die(mysql_error());
$row_categoria = mysqli_fetch_assoc($categoria);
$totalRows_categoria = mysqli_num_rows($categoria);

$query_classificacao = "SELECT * FROM classificacao";
$classificacao = mysqli_query($Federacao,$query_classificacao) or die(mysql_error());
$row_classificacao = mysqli_fetch_assoc($classificacao);
$totalRows_classificacao = mysqli_num_rows($classificacao);

$query_clubes = "SELECT * FROM clube";
$clubes = mysqli_query($Federacao,$query_clubes) or die(mysql_error());
$row_clubes = mysqli_fetch_assoc($clubes);
$totalRows_clubes = mysqli_num_rows($clubes);
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
<p class="ParagrafoTitulo">Área Administrativa - Filiados</p>
</div>

<div id="utiladm">
    
<form action= "alteraregistrofiliado.php" method="post" target="_self">
<table width="710" border="1">
  	<tr>
  		<td colspan="6" align="center">Dados Pessoais</td>
        <td width="92" rowspan="5" align="center"> <?php 							
								   $foto = $row_filiado['foto'];        
								   if($foto != Null) {
  						       $img_blob = imagecreatefromstring($foto);
      							echo "<img src='data:image/jpeg;base64," . base64_encode( $foto )."' height='132px'  width='99px'";} ?>

		</td>
	</tr>
    <tr>
    <td width="144" scope="col" align="center">ID</td>
    <td >Nome</td>
    <td width="107" align="center">Matr&iacute;cula</td>
     <td width="97" align="center">Nascimento</td>
     <td width="48" align="center">Sexo</td>
    </tr>
   <tr>
    <td height="26" align="center"><input name="idfiliado" type="text" disabled size="3" maxlength="5" value="<?php echo $row_filiado['idfiliado']; ?>"></td>
    <td ><span id="sprytextfield2">
    <input name="nome" type="text" id="nome2" size="30" maxlength="40" value="<?php echo utf8_decode($row_filiado['nome']); ?>">
    <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldMinCharsMsg">Minimum number of characters not met.</span><span class="textfieldMaxCharsMsg">Exceeded maximum number of characters.</span></span></td>
 
    <td><span id="sprytextfield1">
    <input name="matricula" type="text" id="matricula" size="12" maxlength="11" align="middle" value="<?php echo $row_filiado['matricula']; ?>">
    <span class="textfieldRequiredMsg">Um valor &eacute; necess&aacute;rio.</span><span class="textfieldMinCharsMsg">N&uacute;mero m&iacute;nimo de caracteres n&atilde;o atendido.</span><span class="textfieldMaxCharsMsg">Exceeded maximum number of characters.</span></span></td>
    <td height="26"><?php $datanascimento= date('d/m/Y',strtotime(mysqli_real_escape_string($Federacao,$row_filiado['datanascimento']))); ?>
      <input name="datanascimento" type="text" id="datanascimento" value="<?php echo $datanascimento; ?>" size="10" maxlength="10">
	</td> 
 	<td><select name="sexo" id="sexo" value="<?php echo $row_filiado['sexo']; ?>">
   	  <option value="M">M</option>
   	  <option value="F">F</option>
   	</select></td> 
</tr>
    <tr>

    <td width="144" align="center">Estado Civil</td>

    <td width="181" scope="col">Email</td>
    <td colspan="3" rowspan="2">Alterar foto: <input name="foto1" type="file" id="foto1"></td>
   </tr>
   <tr>
     
    <td width="144" scope="col"><input type="text" name="estadocivil" id="estadocivil" value="<?php echo utf8_decode($row_filiado['estadocivil']); ?>"></td>   
 
    <td ><span id="sprytextfield3">
    <input name="email" type="text" id="email" value="<?php echo $row_filiado['email']; ?>" maxlength="30">
    <span class="textfieldRequiredMsg">Um valor é necessário.</span><span class="textfieldInvalidFormatMsg">Formato inválido.</span><span class="textfieldMaxCharsMsg">Número máximo de caracteres excedido.</span></span></td>    


  </tr>
</table>
<br>
<table width="75%" border="1" cellspacing="2" cellpadding="2">
  <tr>
    <td colspan="6" align="center">Endereço</td>
  </tr>
  <tr>
    <td width="19%">Endereço</td>
    <td width="19%">Cidade</td>
    <td width="8%">UF</td>
    <td width="19%">CEP</td>
    <td width="8%">Telefone</td>
    <td width="27%">Celular</td>
  </tr>
  <tr>
    <td><label for="endereco"></label>
      <input name="endereco" type="text" id="endereco" value="<?php echo utf8_decode($row_filiado['endereco']); ?>"></td>
    <td><input name="textfield" type="text" id="textfield" value="<?php echo utf8_decode($row_filiado['cidade']); ?>"></td>
    <td><span id="spryselect1"><span class="selectRequiredMsg">Selecione um item.</span>
   	  <label for="uf"></label>
   	  <select name="uf" id="uf">
   	    <option value="AC" <?php if($row_filiado['uf'] == "AC") {?> selected <?php } ?>>AC</option>         	    
   	    <option value="AL" <?php if($row_filiado['uf'] == "AL") {?> selected <?php } ?>>AL</option>
   	    <option value="AM" <?php if($row_filiado['uf'] == "AM") {?> selected <?php } ?>>AM</option>       
        <option value="AP" <?php if($row_filiado['uf'] == "AP") {?> selected <?php } ?>>AP</option>
   	    <option value="BA" <?php if($row_filiado['uf'] == "BA") {?> selected <?php } ?>>BA</option>
   	    <option value="CE" <?php if($row_filiado['uf'] == "CE") {?> selected <?php } ?>>CE</option>       
   	    <option value="DF" <?php if($row_filiado['uf'] == "DF") {?> selected <?php } ?>>DF</option>
   	    <option value="ES" <?php if($row_filiado['uf'] == "ES") {?> selected <?php } ?>>ES</option>       
   	    <option value="GO" <?php if($row_filiado['uf'] == "GO") {?> selected <?php } ?>>GO</option>
   	    <option value="MA" <?php if($row_filiado['uf'] == "MA") {?> selected <?php } ?>>MA</option>
   	    <option value="MG" <?php if($row_filiado['uf'] == "MG") {?> selected <?php } ?>>MG</option>
   	    <option value="MS" <?php if($row_filiado['uf'] == "MS") {?> selected <?php } ?>>MS</option>
   	    <option value="MT" <?php if($row_filiado['uf'] == "MT") {?> selected <?php } ?>>MT</option>
   	    <option value="PA" <?php if($row_filiado['uf'] == "PA") {?> selected <?php } ?>>PA</option>
   	    <option value="PB" <?php if($row_filiado['uf'] == "PB") {?> selected <?php } ?>>PB</option>
   	    <option value="PE" <?php if($row_filiado['uf'] == "PE") {?> selected <?php } ?>>PE</option>
   	    <option value="PI" <?php if($row_filiado['uf'] == "PI") {?> selected <?php } ?>>PI</option>       
   	    <option value="PR" <?php if($row_filiado['uf'] == "PR") {?> selected <?php } ?>>PR</option>
   	    <option value="RJ" <?php if($row_filiado['uf'] == "RJ") {?> selected <?php } ?>>RJ</option>
   	    <option value="RN" <?php if($row_filiado['uf'] == "RN") {?> selected <?php } ?>>RN</option>
   	    <option value="RO" <?php if($row_filiado['uf'] == "RO") {?> selected <?php } ?>>RO</option>              
   	    <option value="RR" <?php if($row_filiado['uf'] == "RR") {?> selected <?php } ?>>RR</option>       
   	    <option value="RS" <?php if($row_filiado['uf'] == "RS") {?> selected <?php } ?>>RS</option>
   	    <option value="SE" <?php if($row_filiado['uf'] == "SE") {?> selected <?php } ?>>SE</option>      
   	    <option value="SC" <?php if($row_filiado['uf'] == "SC") {?> selected <?php } ?>>SC</option>
        <option value="SP" <?php if($row_filiado['uf'] == "SP") {?> selected <?php } ?>>SP</option>
   	    <option value="TO" <?php if($row_filiado['uf'] == "TO") {?> selected <?php } ?>>TO</option>
   	    <option value="BR" <?php if($row_filiado['uf'] == "BR") {?> selected <?php } ?>>BR</option>
   	    <option value="EX" <?php if($row_filiado['uf'] == "EX") {?> selected <?php } ?>>EX</option>
 	    </select>
   	</span></td>
    <td><input name="cep" type="text" id="cep" value="<?php echo $row_filiado['cep']; ?>"></td>
    <td><input name="foneresidencial" type="text" id="foneresidencial" value="<?php echo $row_filiado['foneresidencial']; ?>"></td>
    <td><input name="celular" type="text" id="celular" value="<?php echo $row_filiado['celular']; ?>"></td>
  </tr>
</table>
<br>
<!-- documentos -->
<table width="90%" border="1" cellspacing="2" cellpadding="2">
  <tr>
    <td colspan="5" align="center">Documentos</td>
  </tr>
  <tr>
    <td>RG</td>
    <td>CPF</td>
    <td>Nacionalidade</td>
    <td>Passaporte</td>
    <td>Validade do Passaporte</td>
  </tr>
  <tr>
    <td><label for="rg"></label>
      <input name="rg" type="text" id="rg" value="<?php echo $row_filiado['rg']; ?>"></td>
    <td><label for="cpf"></label>
      <input name="cpf" type="text" id="cpf" value="<?php echo $row_filiado['cpf']; ?>"></td>
    <td><input name="nacionalidade" type="text" id="nacionalidade" value="<?php echo utf8_decode($row_filiado['nacionalidade']); ?>"></td>
    <td><label for="passaporte"></label>
      <input name="passaporte" type="text" id="passaporte" value="<?php echo $row_filiado['passaporte']; ?>"></td>
    <td><label for="validadepassaporte"></label>
      <input name="validadepassaporte" type="text" id="validadepassaporte" value="<?php echo $row_filiado['validadepassaporte']; ?>"></td>
  </tr>
</table>
<br>
<!-- filiação -->
<table width="91%" border="1" cellspacing="2" cellpadding="2">
  <tr>
    <td width="9%" >Filiação:</td>
    <td colspan="3" >Data de Filiação:<?php $datafiliacao= date('d/m/Y',strtotime(mysqli_real_escape_string($Federacao,$row_filiado['datafiliacao']))); ?>
      <input name="datafiliacao" type="text" id="datafiliacao" value="<?php echo $datafiliacao; ?>" size="10" maxlength="10"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="17%"><input type="checkbox" name="arbitro"  value="1" <?php if ($row_filiado['arbitro'] == 1) { ?>checked<?php } ; ?> id="arbitro">Árbitro:</td>
    <td width="65%">Categoria:
      <select name="categoriaarbitro" id="categoriaarbitro">
      	<?php do {?>
        <option value="<?php echo $row_categoria['SiglaCategoria'];?>" <?php if($row_filiado['categoriaArbitro'] == $row_categoria['SiglaCategoria']) {?> selected <?php } ?>><?php echo $row_categoria['NomeCategoria'];?></option>      
        <?php } while ($row_categoria = mysqli_fetch_assoc($categoria)); ?>
      </select></td>
    <td width="9%"><input type="checkbox" name="ArbitroAtivo" id="ArbitroAtivo" value=1  <?php if ($row_filiado['ArbitroAtivo'] == 1) { ?>checked<?php } ; ?>>Ativo</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="checkbox" name="atleta" value=1 <?php if ($row_filiado['atleta']==1) { ?>checked <?php }?> id="atleta">Atleta</td>
    <td>Clube: <select name="idclube" id="idclube">
       	<?php do {?>      
          <option value="<?php echo $row_clubes['idclube'];?>" <?php if($row_filiado['idclube'] == $row_clubes['idclube']) {?> selected <?php } ?>><?php echo $row_clubes['ClubeSigla']." - ".utf8_decode($row_clubes['ClubeNome']);?></option>      
        <?php } while ($row_clubes = mysqli_fetch_assoc($clubes)); ?> 
    </select></td>
    <td><input type="checkbox" name="AtletaAtivo" id="AtletaAtivo" <?php if ($row_filiado['AtletaAtivo']==1) { ?> checked <?php } ?>>Ativo</td>
  </tr>
  <tr>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td colspan="2">Arco: <input type="checkbox" name="Composto" value=1 <?php if ($row_filiado['composto']==1) { ?>checked<?php }?> id="Composto">Composto
  		<input type="checkbox" name="Nativo" value=1 <?php if($row_filiado['nativo']==1) { ?>checked<?php }?> id="Nativo">Nativo
  		<input type="checkbox" name="Recurvo" value=1 <?php if($row_filiado['recurvo']==1) { ?>checked<?php }?> id="Recurvo">Recurvo</td>
  </tr>  
  <tr>
    <td>&nbsp;</td>
    <td><input type="checkbox" name="paraolimpico" value="<?php echo $row_filiado['paraolimpico']; ?>" id="paraolimpico">Paraolímpico</td>
    <td colspan="2">Classifica&ccedil;&atilde;o:
      <select name="idclassificacao" id="idclassificacao">
      	<?php do {?>      
          <option value="<?php echo $row_classificacao['SiglaClassificacao'];?>" <?php if($row_filiado['idclassificacao'] == $row_classificacao['SiglaClassificacao']) {?> selected <?php } ?>><?php echo $row_classificacao['NomeClassificacao'];?></option>      
        <?php } while ($row_classificacao = mysqli_fetch_assoc($classificacao)); ?>    
  </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3"><input type="checkbox" name="classificador" value=1 <?php if($row_filiado['classificador']==1){ ?> checked<?php } ?> id="classificador">Classificador</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="checkbox" name="dirigente" value=1 <?php if($row_filiado['dirigente']==1) { ?>checked<?php }?> id="dirigente">Dirigente</td>
    <td colspan="2">Clube: <select name="idclubedirigente">
    	<?php $row_clubes = mysqli_data_seek($clubes,0); ?>
      	<?php do {?>      
          <option value="<?php echo $row_clubes['idclube'];?>" <?php if($row_filiado['idclubedirigente'] == $row_clubes['idclube']) {?> selected <?php } ?>><?php echo $row_clubes['ClubeSigla']." - ".utf8_decode($row_clubes['ClubeNome']);?></option>      
        <?php } while ($row_clubes = mysqli_fetch_assoc($clubes)); ?>      
    </select><br></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3"><input type="checkbox" name="instrutor" value=1 <?php if($row_filiado['instrutor']==1){ ?> checked<?php } ?>>Instrutor</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3"><input type="checkbox" name="tecnico"  value=1 <?php if($row_filiado['tecnico']==1){ ?> checked<?php } ?>>Técnico</td>
  </tr>
</table>
<table width="99%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="10%">observação:</td>
    <td width="67%"><textarea name="observacao" cols="80" rows="3"><?php echo utf8_decode($row_filiado['observacao']); ?></textarea></td>
	<td width="23%"><a href="gerarsenha?idfiliado=<?php echo $row_filiado['idfiliado']?>&email=<?php echo$row_filiado['email']?>" target="_self">Gerar nova senha</a><br>
    				Nível de acesso:<input name="nivelacesso" type="text" id="nivelacesso" size="3" maxlength="2"></td>
  </tr>
</table>

<input name="Alterar" type="submit" value="Alterar">
</form>

</div>
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../SpryAssets/SpryMenuBarRightHover.gif"});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {validateOn:["blur"]});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur"], minChars:5, maxChars:11});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {minChars:5, maxChars:40, validateOn:["blur"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "email", {validateOn:["blur"], maxChars:30});
</script>
</body>
</html>
<?php
mysqli_free_result($filiado);
?>