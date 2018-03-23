<?php require_once('Connections/Federacao.php'); ?>
<?php
 header("Content-Type: text/html; charset=ISO-8859-1",true);
$mynow=date('Y-m-d H:i:s',time());

$startRow_noticias=0;
$maxRows_noticias=3;
$query_noticias = sprintf("SELECT * FROM noticias where fimdataexibicao > now() ORDER BY iniciodataexbicao DESC, idNoticias DESC"); 
$query_noticias = sprintf("SELECT * FROM noticias ORDER BY iniciodataexbicao DESC, idNoticias DESC"); 
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

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="theme.css" type="text/css">
</head>


<body>
    <nav class="navbar navbar-expand-md bg-primary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
	  <img src="../federacao/imgs/Simbolo Fetarco-DF II.jpg" alt="Federação de Tiro com Arco do Distrito Federal" width="100" height="86">
	  <b> Federa&ccedil;&atilde;o de Tiro com Arco do Distrito Federal</b></a>
    </div>
  </nav>
  

<!-- Início do Menu-->
  <nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="#">Home</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="btn navbar-btn btn-primary ml-2 text-white" href="#">A Federação</a>
          </li>
          <li class="nav-item">
            <a class="btn navbar-btn btn-primary ml-2 text-white" href="#">Notícias</a>
          </li>
          <li class="nav-item">
            <a class="btn navbar-btn btn-primary ml-2 text-white" href="#">O Esporte</a>
          </li>
          <li class="nav-item">
            <a class="btn navbar-btn btn-primary ml-2 text-white" href="#">Campeonatos</a>
          </li>
          <li class="nav-item">
            <a class="btn navbar-btn btn-primary ml-2 text-white" href="#">Contato</a>
          </li>
          <li class="nav-item">
			<a class="btn navbar-btn btn-primary ml-2 text-white" href="http://fetarco-df.esp.br/federacao/adm/index.php">Área Restrita</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<!-- fim do Menu -->


<!-- Início das Imagens -->
  <div class="py-5 text-center opaque-overlay" style="background-image: url(&quot;arcos.jpg&quot;);">
    <div class="container py-5">
      <div class="row">
        <div class="col-md-12 text-white">
          <h1 class="display-3 mb-4">Fetarco DF</h1>
          <p class="lead mb-5">Federação de Tiro com Arco do Distrito Federal</p>
          <a href="#" class="btn btn-lg btn-outline-light mx-1">Sobre a Federação</a>
          <a href="http://www.arao.com.br/torneio_oficial.asp" class="btn btn-lg btn-primary mx-1" target=_blank>Resultados ao Vivo</a>
        </div>
      </div>
    </div>
  </div>
<!-- fim das imagens-->



<!-- início da área útil -->
<div id="util">
<!-- Início das Notícias -->

  <div class="py-5 bg-light text-dark">
		  <h1 class="text-center display-3">Notícias</h1>
    <div class="container">
      <div class="row">
		  
			<?php if($totalRows_noticias>0) { ?>
			<?php do { ?>

        <div class="col-md-4 my-3">
          <img class="img-fluid d-block mb-4" src="upload/<?php echo $row_noticias['foto1']; ?>">
          <h5><b><?php echo utf8_decode($row_noticias['Manchete']); ?></b></h5>
          <p class="mt-1"><?php echo utf8_decode($row_noticias['texto']); ?><br>publicado em: <?php echo utf8_decode($row_noticias['iniciodataexbicao']); ?></p>
        </div>
			<?php } while ($row_noticias = mysqli_fetch_assoc($noticias)); ?>
			<?php } ?>

      </div>
    </div>
  </div>
 
<!-- fim das notícias-->

<!-- início dos eventos -->

  
  <div class="py-5">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-6 align-self-center">
          <h2 class="">Agenda de Torneios e Campeonatos</h2>

		
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
					<b><?php echo utf8_decode($row_Prova['ProvaNome']); ?></b></br>
					<?php echo '&nbsp; &nbsp; &nbsp;Local: '.utf8_decode($row_Prova['ProvaLocal']); ?></br>
					<?php echo '&nbsp; &nbsp; &nbsp;Tipo de prova: '.$row_Prova['Tipodeprova']; ?></br>
					<?php $timestamp=strtotime($row_Prova['Provadatainicio']);
							echo '&nbsp; &nbsp; &nbsp;Data de início: '. date('d/m/Y',$timestamp);?></br>
				  <?php $timestamp=strtotime($row_Prova['Provadatafim']);
				echo '&nbsp; &nbsp; &nbsp;Data de término: ';
				echo date('d/m/Y',$timestamp); ?></br></td>
				<td width="14%"><?php if($row_Prova['ProvaBrasileiro']==1){?>
						<img src="imgs/brasileiro.jpg" width="35" height="25"></td>
					<?php } ?>
			  </tr>
			  <?php } while ($row_Prova = mysqli_fetch_assoc($Prova)); ?>
			  </table>
			<?php } ?>		
		
        </div>
        <div class="col-md-6 align-self-center">
          <img class="img-fluid d-block w-100" src="torneio.jpg"> </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <img class="img-fluid d-block mb-4 w-100" src="escolinha.jpg"> </div>
        <div class="col-md-6 align-self-center">
          <h2 class="">Escolinha</h2>
          <p class="">Venha se divertir conosco. Aulas orientadas e todo material incluso.<br><br>Local: Clube do Exército - Setor de Clubes Sul<br><br>Dias:<br>&nbsp; &nbsp; &nbsp; Seg a Qui de 17h às 19h&nbsp;<br>&nbsp; &nbsp; &nbsp; Ter e Qui de 19h às 21h&nbsp;<br>&nbsp; &nbsp; &nbsp; Sáb de 8h às 10h e de 10h às 12h&nbsp;<br><br>Informações: (61) 98271-0284 ou 3248-2427</p>
        </div>
      </div>
    </div>
  </div>
  

<!-- fim dos eventos-->

<!--Início dos Serviços-->
<!-- Fim dos Serviços-->


</div>
<!-- Fim da área Útil -->

<!-- Início do Rodapé -->
  <div class="bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="p-4 col-md-3">
          <h2 class="mb-4 text-secondary">Fetarco-DF</h2>
          <p class="text-white">
			Presidente: Luís Felipe Paulini<br>
			Telefone: (61) 9916-5382<br>
			<br>
			Diretor Financeiro: Hamilton Rafael de Oliveira<br>
			Escrit&oacute;rio: SCS Q 1 Bl.C Sala 414 - Bras&iacute;lia-DF<br>
			<br>
			Diretor T&eacute;cnico: Bernardo de Sousa Oliveira<br>
			<br>			
			Secretario Geral: Igor Geordano da SIlva Neiva<br>
			Telefone: (61) 98196-1373			
			</p>
        </div>
        <div class="p-4 col-md-3">
          <h2 class="mb-4 text-secondary">Mapa do site</h2>
          <ul class="list-unstyled">
			  <li class="">
				<a class="text-white" href="federacao.html">A Federação</a>
			  </li>
			  <li class="">
				<a class="text-white" href="noticias.html">Notícias</a>
			  </li>
			  <li class="">
				<a class="text-white" href="#">O Esporte</a>
			  </li>
			  <li class="">
				<a class="text-white" href="#">Campeonatos</a>
			  </li>
			  <li class="">
				<a class="text-white" href="#">Contato</a>
			  </li>
			  <li class="">
				<a class="text-white" href="http://www.arao.com.br/torneio_oficial.asp" target=_blank>Resultados ao Vivo</a>
			  </li>
			  <li class="">
				<a class="text-white" href="http://terraneto.eti.br/cacbtarco/" target=_blank>Comitê de Arbitragem</a>
			  </li>
			  <li class="">
				<a class="text-white" href="http://fetarco-df.esp.br/federacao/adm/index.php" target=_blank>Área Restrita</a>
			  </li>
			</ul>
        </div>
        <div class="p-4 col-md-3">
          <h2 class="mb-4">Redes Sociais</h2>
          <p>
            <a href="https://pt-br.facebook.com/Fetarco-DF-116590248405244/" class="text-white"><i class="fa d-inline mr-3 text-secondary fa-phone"></i>Facebook</a>
          </p>
          <p>
            <a href="" class="text-white"><i class="fa d-inline mr-3 text-secondary fa-envelope-o"></i>Youtube</a>
          </p>
          <p>
            <a href="" class="text-white" target="blank"><i class="fa d-inline mr-3 fa-map-marker text-secondary"></i>Twitter</a>
          </p>
        </div>
        <div class="p-4 col-md-3">
          <h2 class="mb-4 text-light">Notícias</h2>
          <form>
            <fieldset class="form-group text-white"> <label for="exampleInputEmail1">Receba nossas notícias</label>
              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Informe seu e-mail"> </fieldset>
            <button type="submit" class="btn btn-outline-secondary">Enviar</button>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-3">
          <p class="text-center text-white"><a href="http://www.innweb.com.br">Inn Web - Soluções para internet</a> </p>
		  <p class="text-center text-white">© Copyright 2017 Pingendo - All rights reserved. </p>
        </div>
      </div>
    </div>
  </div>
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
