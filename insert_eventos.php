<?php

$foto = $_FILES["foto"];

// Se a foto estiver sido selecionada
if (!empty($foto["name"])) {
// Largura máxima em pixels
$largura = 1920;
// Altura máxima em pixels
$altura = 1080;
// Tamanho máximo do arquivo em bytes
$tamanho = 10000000;
$error = array();

// Verifica se o arquivo é uma imagem
if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
$error[1] = "Isso não é uma imagem.";
}

// Pega as dimensões da imagem
$dimensoes = getimagesize($foto["tmp_name"]);

// Verifica se a largura da imagem é maior que a largura permitida
if($dimensoes[0] > $largura) {
$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
}

// Verifica se a altura da imagem é maior que a altura permitida
if($dimensoes[1] > $altura) {
$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
}

// Verifica se o tamanho da imagem é maior que o tamanho permitido
if($foto["size"] > $tamanho) {
$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
}

// Se não houver nenhum erro
if (count($error) == 0) {
// Pega extensão da imagem
preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

// Gera um nome único para a imagem
$nome_imagem = md5(uniqid(time())) . "." . $ext[1];

// Caminho de onde ficará a imagem
$caminho_imagem = "assets/img/". $nome_imagem;

// Faz o upload da imagem para seu respectivo caminho
move_uploaded_file($foto["tmp_name"], $caminho_imagem);
}
else{
	echo "ERRO";
}
}



include 'dbh.php';
session_start();
$nome_evento = $_POST['nome_evento'];
$preco = $_POST['preco'];
$tipo = $_POST['tipo_evento'];
$classificacao = $_POST['classificacao_evento'];
$cotato = $_POST['contato_evento'];
$local_vendas = $_POST['local_vendas_evento'];
$desc_evento = $_POST['desc_evento'];
$id_usuario = $_SESSION['id_usuario'];
$data = $_POST['data'];
$tempo_anuncio = $_POST['opcao'];


if($nome_evento == "" || $preco == "" || $desc_evento == "") {
	header("location: cadastro_eventos.php?erro=camposvazios&id=".$id_usuario."");
}

else {
	$sql = "INSERT INTO eventos VALUES(null, '".$id_usuario."', '".$nome_evento."', '".$desc_evento."', '".$data."' , '".$preco."','".$tipo."','".$classificacao."','".$cotato."','".$local_vendas."','".$nome_imagem."','".$tempo_anuncio."','0');";	
	$result = mysqli_query($conn,$sql);
	if($result){
		header("location: cadastro_eventos.php?sucesso=evento_cadastrado&id=".$id_usuario."");
	}
	else{
		header("location: cadastro_eventos.php?erro=erro_ao_cadastrar&id=".$id_usuario."");
	}
}	