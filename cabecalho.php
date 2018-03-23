<link href="estilos.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<div id="container2">
<div id="topo1" >
<div id="simbolo">
<img src="imgs/Simbolo Fetarco-DF II.jpg" alt="Federa&ccedil;&atilde;o de Tiro com Arco do Distrito Federal" width="100" height="86">
</div>
<div id="nome">
<h1>Federa&ccedil;&atilde;o de Tiro com Arco do Distrito Federal </h1>
</div>
</div>
<div id="menu" >
<ul id="MenuBar1" class="MenuBarHorizontal">
  <li ><a href="index.php" class="MenuBarHorizontal" >Home</a></li>
  <li><a class="MenuBarItemSubmenu" href="#">A Federa&ccedil;&atilde;o</a>
    <ul>
      <li><a href="#">Sobre</a></li>
      <li><a href="#">Dirigentes</a></li>
      <li><a href="#">Atletas</a></li>
      <li><a href="#">Estrutura</a></li>
    </ul>
  </li>
  <li><a class="MenuBarItemSubmenu" href="#">O Esporte</a>
    <ul>
      <li><a href="#">No Brasil</a></li>
      <li><a href="#">No Mundo</a></li>
      <li><a href="#">Aspectos T&eacute;cnicos</a></li>
      <li><a href="#">Equipamento</a></li>
      <li><a href="#">Links</a></li>
    </ul>
  </li>
  <li class="MenuBarHorizontal"><a href="#" class="MenuBarItemIE">Contato</a></li>
  <li><a href="calendario.php?ano=<?php echo $anoatual?>">Calend&aacute;rio</a></li>
  <li><a href="#">&Aacute;rea Administrativa</a></li>
</ul>
</div>
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>