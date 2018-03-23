<?php require_once('Connections/Federacao.php'); ?>
<!doctype html>
<html>
<head>
<meta charset="iso-8859-1">
<meta name="robots" content="all">
<meta name="keywords" content="">
<meta name="description" content="">
<link href="imgs/favicon.png" rel="shortcut icon" "image/png"/>

<title>Federa&ccedil;&atilde;o de Tiro com Arco do Distrito Federal</title>
<?php
 header("Content-Type: text/html; charset=ISO-8859-1",true);
$anoatual = date('Y');
if (isset($_GET['ano'])) {
  $anoatual = $_GET['ano'];
}
$d1=$anoatual.'-01-01';
$d2=$anoatual.'-12-31';
$query_prova = "SELECT * FROM prova WHERE (Provadatainicio >= '".$d1."' AND Provadatainicio <= '".$d2."')  ORDER BY Provadatainicio ASC";
$prova = mysqli_query($Federacao,$query_prova) or die(mysql_error());
$row_prova = mysqli_fetch_assoc($prova);
$totalRows_prova = mysqli_num_rows($prova);
?>
<link href="estilos.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>


</head>
<body>
<div id="container">
<div id="topo1" >
<div id="simbolo">
<img src="imgs/Simbolo Fetarco-DF II.jpg" alt="Federa&ccedil;&atilde;o de Tiro com Arco do Distrito Federal" width="100" height="86">
</div>
<div id="nome">
<h1>Federa&ccedil;&atilde;o de Tiro com Arco do Distrito Federal </h1>
</div>
</div>
<!-- Início do Menu-->
<div id="menu">
<ul id="MenuBar1" class="MenuBarHorizontal">
  <li ><a href="index.php">Home</a></li>
  <li><a class="MenuBarItemSubmenu" href="#">A Federa&ccedil;&atilde;o</a>
    <ul>
      <li><a href="sobre.php">Sobre</a></li>
      <li><a href="dirigentes.php">Dirigentes</a></li>
      <li><a href="atletas.php">Atletas</a></li>
      <li><a href="estrutura.php">Estrutura</a></li>
    </ul>
  </li>
  <li><a class="MenuBarItemSubmenu" href="#">O Esporte</a>
    <ul>
      <li><a href="brasil.php">No Brasil</a></li>
      <li><a href="mundo.php">No Mundo</a></li>
      <li><a href="aspectostecnicos.php">Aspectos T&eacute;cnicos</a></li>
      <li><a href="equipamento.php">Equipamento</a></li>
      <li><a href="links.php">Links</a></li>
    </ul>
  </li>
  <li><a href="#"  class="MenuBarHorizontal MenuBarItemSubmenu">Campeonatos</a>
   <ul>
    <li><a href="calendario.php">Calend&aacute;rio</a></li>
    <li><a href="resultados.php">Resultados</a></li>
    <li><a href="ranking.php">Ranking</a></li>
  </ul></li>
  <li class="MenuBarHorizontal"><a href="contato.php" class="MenuBarItemIE">Contato</a></li>
  <li><a href="adm/index.php">&Aacute;rea Administrativa</a></li></ul>
</div>
<!-- fim do Menu -->
<div id="imagens"> 
<table width="95%" border="0" align="center" cellpadding="3" cellspacing="3">
  <tr>
    <td><img src="imgs/DSC06932.JPG" width="184" height="132"></td>
    <td><img src="imgs/EQUIPE BSB2005.jpg" width="374" height="132"></td>
    <td><img src="imgs/dsc01876reduzida.jpg" width="179" height="132"></td>
    <td><img src="imgs/luisebernardomedellin2010.jpg" width="201" height="132"></td>
  </tr>
</table>
</div>
<div id="titulos"><table width="99%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td width="23%"></td>
    <td width="5%"><img src="imgs/calendar_icon.png" width="40" height="41"></td>
    <td width="45%" valign="middle">Calend&aacute;rio de <?php echo $anoatual?></td>
    <td width="5%"><img src="imgs/180px-Archery_Target_80cm_svg.png" width="40" height="40"></td>
    <td width="22%" valign="middle">Servi&ccedil;os</td>
  </tr>
</table>
</div>
<div id="util">

<div id="calendario">
<?php if ($totalRows_prova>0){?>
  <table width="99%" border="1" cellpadding="2" cellspacing="2">
    <tr align="center">
      <td align="center">Tipo</td>
      <td align="center">Prova</td>
      <td align="center">Início</td>
      <td align="center">Fim</td>
      <td align="center">Local</td>
      <td align="center">Combate?</td>
      <td align="center">Observações</td>
    </tr>
    <?php do { ?>
    <tr>
      <td width="35px" align="center" >  <?php 
      if($row_prova['Tipodeprova']=='Outdoor'){?>
      <img src="imgs/180px-Archery_Target_80cm_svg.png" alt="" width="35" height="35">
      <?php } ?>
      <?php if($row_prova['Tipodeprova']=='Indoor'){?>
      <img src="imgs/indoor.jpg" width="12" height="35" class="centralizar">
      <?php } ?>
      <?php if($row_prova['Tipodeprova']=='Field'){?>
      <img src="imgs/6080face.jpg" width="35" height="35">
      <?php } ?></td>
      <td>	<?php echo utf8_decode($row_prova['ProvaNome']); ?></td>
      <td align="center"><?php $timestamp=strtotime($row_prova['Provadatainicio']);
				echo date('d/m/Y',$timestamp); ?></td>
      <td align="center"><?php $timestamp=strtotime($row_prova['Provadatafim']);
				echo date('d/m/Y',$timestamp); ?></td>
      <td>	<?php echo utf8_decode($row_prova['ProvaLocal']); ?></td>
      <td align="center"><?php if($row_prova['ProvaTemCombate']==1)echo 'Sim' ;else 'Não'  ?></td>
      <td align="center">	<?php if($row_prova['ProvaBrasileiro']==1){?>
      		<img src="imgs/brasileiro.jpg" alt="Brasileiro" width="35" height="25"> <?php }?>
      <?php if($row_prova['ProvaEstrelaFita']==1){?>
      			 <img src="imgs/fitastar.jpg" alt="Estrela Fita" width="33" height="35"> <?php }?>
      <?php if($row_prova['ProvaMICA']==1){?>
      <img src="imgs/waa.jpg" alt="MICA" width="31" height="36" > <?php }?>
      </td>
    </tr>
    <?php } while ($row_prova = mysqli_fetch_assoc($prova)); ?>
  </table>
  <?php } ?>
<br>
<form action="calendario.php?ano=<?php echo $anof?>" method="get" name="form1" target="_self">
    <label for="ano">Selecionar outro ano:</label>
    <select name="ano" id="ano">

      <?php     $anof=2004;
	  			$fim=date('Y');
	  			do { ?>
      <option value="<?php echo $anof ?>"<?php if ($anoatual=='<?php echo $anof ?>'){?> selected="selected"<?php }?>><?php echo $anof ?></option>
      <?php $anof=$anof+1; 
	  } while ($anof<=$fim); ?>
      </select>
    <input type="submit" name="outroano" id="outroano" value="Atualizar">
    </form>
<br>

</div>

<!--Início dos Serviços-->
<div id="servicos">
<?php include 'servicos.php' ?>
</div>
<!-- Fim dos Serviços-->
</div>
<!-- Início do Rodapé -->
<?php include 'rodape.php' ?>
<!-- Fim do Rodapé -->

</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
<?php
mysqli_free_result($prova);
?>
