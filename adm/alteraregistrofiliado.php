<?php require_once('../Connections/Federacao.php');
$idfiliado=$_POST['idfiliado'];
$nome=utf8_encode($_POST['nome']);
$matricula=$_POST['matricula'];
$sexo=$_POST['sexo'];
$datanascimento=$_POST['datanascimento'];
$datanascimento=implode("-",array_reverse(explode("/",$datanascimento)));
$celular=$_POST['celular'];
$email=$_POST['email'];
$uf=$_POST['uf'];
$foneresidencial=$_POST['foneresidencial'];
$endereco=utf8_encode($_POST['endereco']);
$cidade=utf8_encode($_POST['cidade']);
$cep=$_POST['cep'];
$datafiliacao=$_POST['datafiliacao'];
$datafiliacao=implode("-",array_reverse(explode("/",$datafiliacao)));
$idclube=$_POST['idclube'];
$estadocivil=utf8_encode($_POST['estadocivil']);
$nacionalidade=utf8_encode($_POST['nacionalidade']);
$cpf=$_POST['cpf'];
$rg=$_POST['rg'];
$passaporte=$_POST['passaporte'];
$validadepassaporte=$_POST['validadepassaporte'];
$validadepassaporte=implode("-",array_reverse(explode("/",$validadepassaporte)));
$arbitro=$_POST['arbitro'];
$atleta=$_POST['atleta'];
$composto=$_POST['composto'];
$recurvo=$_POST['recurvo'];
$nativo=$_POST['nativo'];
$paraolimpico=$_POST['paraolimpico'];
$idclassificacao=$_POST['idclassificacao'];
$classificador=$_POST['classificador'];
$dirigente=$_POST['dirigente'];
$instrutor=$_POST['instrutor'];
$tecnico=$_POST['tecnico'];
$observacao=utf8_encode($_POST['observacao']);
$foto=$_POST['foto'];
$categoriaArbitro=$_POST['categoriaArbitro'];
$ArbitroAtivo=$_POST['ArbitroAtivo'];
$AtletaAtivo=$_POST['AtletaAtivo'];
$idclubedirigente=$_POST['idclubedirigente'];
$nivelacesso=$_POST['nivelacesso'];



//$recebe_foto1=$_POST['foto1'];
//$recebe_foto1 = $_FILES['foto1']['name'];
//$tmp_foto1 = $_FILES['foto1']['tmp_name'];



$updateSQL = "Update filiado set nome='$nome', matricula=$matricula, sexo='$sexo', datanascimento='$datanascimento', celular='$celular', email='$email', uf='$uf', foneresidencial='$foneresidencial', endereco='$endereco', cidade='$cidade', cep='$cep', datafiliacao='$datafiliacao', idclube=$idclube, estadocivil='$estadocivil', nacionalidade='$nacionalidade', cpf='$cpf', rg='$rg', passaporte='$passaporte', validadepassaporte='$validadepassaporte', arbitro=$arbitro, atleta=$atleta, composto=$composto, recurvo=$recurvo, nativo=$nativo, paraolimpico=$paraolimpico, idclassificacao='$idclassificacao', classificador=$classificador, dirigente=$dirigente, instrutor=$instrutor, tecnico=$tecnico, observacao='$observacao', categoriaArbitro='$categoriaArbitro', ArbitroAtivo=$ArbitroAtivo, AtletaAtivo=$AtletaAtivo, idclubedirigente=$idclubedirigente, nivelacesso=$nivelacesso where idfiliado=$idfiliado"; 

$Result1 = mysqli_query($Federacao,$updateSQL);

//if ($recebe_foto4!=""){
//	if ($recebe_foto4<>$recebe_foto1) {
//		$updateSQL = "Update noticias set foto1='$recebe_foto4'where idNoticias=$idNoticias";
//		$Result2 = mysqli_query($Federacao,$updateSQL);
//		 move_uploaded_file($tmp_foto4,'../upload/'.$recebe_foto4);
//
//	};
//};

header("Location: filiados.php");
?>