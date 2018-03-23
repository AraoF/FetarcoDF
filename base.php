<?php require_once('Connections/Federacao.php'); ?>
<?php
 header("Content-Type: text/html; charset=ISO-8859-1",true);
$mynow=date('Y-m-d H:i:s',time());

$startRow_noticias=0;
$maxRows_noticias=2;
$query_noticias = sprintf("SELECT * FROM noticias ORDER BY iniciodataexbicao DESC"); 
//WHERE (iniciodataexbicao >= >= "."'"."%s"."'".") ORDER BY iniciodataexbicao DESC",$mynow);
$query_limit_noticias = sprintf("%s LIMIT %d, %d", $query_noticias, $startRow_noticias, $maxRows_noticias);
$noticias = mysqli_query($Federacao,$query_limit_noticias) or die(mysql_error());
$row_noticias = mysqli_fetch_assoc($noticias);
$totalRows_noticias = mysqli_num_rows($noticias);
$totalPages_noticias = ceil($totalRows_noticias/$maxRows_noticias)-1;

$startRow_Prova=0;
$maxRows_Prova=4;
$query_Prova = sprintf("SELECT * FROM prova WHERE (Provadatainicio >= "."'"."%s"."'".") ORDER BY Provadatainicio ASC", $mynow);
$query_limit_Prova = sprintf("%s LIMIT %d, %d", $query_Prova, $startRow_Prova, $maxRows_Prova);
$Prova = mysqli_query($Federacao,$query_limit_Prova) or die(mysql_error());
$row_Prova = mysqli_fetch_assoc($Prova);
$totalRows_Prova=mysqli_num_rows($Prova);
$totalPages_Prova = ceil($totalRows_Prova/$maxRows_Prova)-1;
?>
<!doctype html>
<html>
<head>
<meta charset="iso-8859-1">
<meta name="robots" content="all">
<meta name="keywords" content="">
<meta name="description" content="">
<link href="imgs/favicon.png" rel="shortcut icon" "image/png"/>

<title>Federa&ccedil;&atilde;o de Tiro com Arco do Distrito Federal</title>
<link href="estilos.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">
</style>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
</head>
<body>
<div id="container">
<div id="topo1" >
<div id="simbolo">
<img src="imgs/Simbolo Fetarco-DF II.jpg" alt="Federa&ccedil;&atilde;o de Tiro com Arco do Distrito Federal" width="100" height="86">
</div>
<div id="nome">
<h1>Federação de Tiro com Arco do Distrito Federal </h1>
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
  <li><a href="adm/menu.php">&Aacute;rea Administrativa</a></li></ul>
</div>
<!-- fim do Menu -->
<!-- Início das Imagens -->
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
<!-- fim das imagens-->
<!-- Início da barra de títulos -->
<div id="titulos"><table width="99%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td width="5%" height="40"><img src="imgs/180px-Archery_Target_80cm_svg.png" width="40" height="40">
   </td>
    <td width="31%" height="50" valign="middle">Not&iacute;cias</td>
    <td width="5%"><img src="imgs/calendar_icon.png" width="40" height="41"></td>
    <td width="32%" valign="middle">Próximas provas</td>
    <td width="5%"><img src="imgs/180px-Archery_Target_80cm_svg.png" width="40" height="40"></td>
    <td width="22%" valign="middle">Servi&ccedil;os</td>
  </tr>
</table>
</div>
<!-- fim da barra de títulos -->
<!-- início da área útil -->
<div id="util">
<!-- Início das Notícias -->
<div id="noticias">
<?php if($totalRows_noticias>0) { ?>
<?php do { ?>
<?php echo $row_noticias['Manchete']; ?><br>
<img src="imgs/<?php echo $row_noticias['foto1']; ?>" width="234" height="156" class="imagemnoticia"><br>
<br>
<img src="imgs/btn_maisinformacoes.png" width="95" height="21"><br>
<br>
<?php } while ($row_noticias = mysqli_fetch_assoc($noticias)); ?>
</div>
<?php } ?>
<!-- fim das notícias-->

<!-- início dos eventos -->
<div id="eventos">
<?php if($totalRows_Prova>0) { ?>
  <table width="98%" border="0" align="center" cellpadding="4" cellspacing="4" >
  <?php do { ?>
  <tr height="120">
    <td width="24%">
      <?php if($row_Prova['Tipodeprova']=='Outdoor'){?>
      <img src="imgs/180px-Archery_Target_80cm_svg.png" alt="" width="70" height="70">
      <?php } ?>
      <?php if($row_Prova['Tipodeprova']=='Indoor'){?>
      <img src="imgs/indoor.jpg" width="34" height="100" class="centralizar">
      <?php } ?>
      <?php if($row_Prova['Tipodeprova']=='Field'){?>
      <img src="imgs/6080face.jpg" width="70" height="69">
      <?php } ?>
    </td>
    <td width="62%">
		<?php echo utf8_decode($row_Prova['ProvaNome']); ?></br>
      	<?php echo 'Local: '.utf8_decode($row_Prova['ProvaLocal']); ?></br>
      	<?php echo 'Tipo de prova: '.$row_Prova['Tipodeprova']; ?></br>
      	<?php $timestamp=strtotime($row_Prova['Provadatainicio']);
				echo 'Data de início: '. date('d/m/Y',$timestamp);?></br>
      <?php $timestamp=strtotime($row_Prova['Provadatafim']);
	echo 'Data de término: ';
	echo date('d/m/Y',$timestamp); ?></br></td>
    <td width="14%"><?php if($row_Prova['ProvaBrasileiro']==1){?>
      		<img src="imgs/brasileiro.jpg" width="35" height="25"></td>
        <?php } ?>
  </tr>
  <?php } while ($row_Prova = mysqli_fetch_assoc($Prova)); ?>
  </table>
<?php } ?>
</div>
<!-- fim dos eventos-->

<!--Início dos Serviços-->
<div id="servicos">
<?php include 'servicos.php' ?>
</div>
<!-- Fim dos Serviços-->
</div>
<!-- Fim da área Útil -->

<!-- Início do Rodapé -->
<?php include 'rodape.php' ?>
<!-- Fim do Rodapé -->
</div>
<!-- Fim do container-->
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
<?php
mysqli_free_result($noticias);
mysqli_free_result($Prova);
?>
