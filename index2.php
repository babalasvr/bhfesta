<!-- charset utf-8, aceitando acentos, etc -->
<?php header("Content-Type: text/html; charset=utf8");?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
		<meta name="description" content="Pit">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Cnd bootstrap, ou seja, bootstrap mais recente, online -->
		<link rel="stylesheet" href=" https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css ">
		<!-- Font Awesome online -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
	</head>
<body>

<!-- Referenciando o css da página de login -->
<link rel="stylesheet" href="assets/css/login.css" type="text/css">

<?php
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if(strpos($url, 'erro=nacheingm')!== false){
	echo "<div style='width: 30%; margin: 2% 35%;' class='alert alert-danger' role='alert'>
  						<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
  						<span class='sr-only'>Error:</span>
  						Usuário ou senha errados!
					</div>";
}

else if(strpos($url, 'erro=camposvazios')!== false){
	echo "<div style='width: 30%; margin: 2% 35%;' class='alert alert-warning' role='alert'>
  						<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
  						<span class='sr-only'>Error:</span>
  						Oops, parece que um campo ou mais estão vazios!!!
					</div>";
}

else if(strpos($url, 'erro=campos_obrigatorios')!== false){
	echo "<div style='width: 30%; margin: 2% 35%;' class='alert alert-danger' role='alert'>
  						<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
  						<span class='sr-only'>Error:</span>
  						Todos os campos são necessários!
					</div>";
}

else if(strpos($url, 'erro=senhas_nao_conferem')!== false){
	echo "<div style='width: 30%; margin: 2% 35%;' class='alert alert-danger' role='alert'>
  						<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
  						<span class='sr-only'>Error:</span>
  						As senhas não conferem!
					</div>";
}

else if(strpos($url, 'erro=usuario_ja_existe')!== false){
	echo "<div style='width: 30%; margin: 2% 35%;' class='alert alert-warning' role='alert'>
  						<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
  						<span class='sr-only'>Error:</span>
  						Usuário já existe
					</div>";
}

else if(strpos($url, 'sucesso=usuario_cadastrado')!== false){
	echo "<div style='width: 30%; margin: 2% 35%;' class='alert alert-success' role='alert'>
  						<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
  						<span class='sr-only'>Error:</span>
  						Usuário cadastrado com sucesso
					</div>";
}
?>

<script>
	$( document ).ready(function() {
    	var usuario = document.getElementById("user");
    	var pass = document.getElementById("pas");

    	usuario.value = "";
    	pass.value = "";
	});
</script>
<body style="background:rgba(40,57,101,.9);">
<div class="login-wrap">
	<div class="login-html">
		<!-- Linkando pra primeira tab -->
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab"  style="margin-left: 20%;">Login</label>
		<!-- Linkando pra segunda tab -->
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Registre-se</label>
		<div class="login-form">
			<!-- Form da primeira tab -->
			<div class="sign-in-htm">
				<form method="POST" action="login.php">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" name="uid" type="text" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Senha</label>
					<input id="pass" name="pwd" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<input type="submit" class="button" value="Logar">
				</div>
				</form>
			</div>
			<!-- Form da segunda tab -->
			<div class="sign-up-htm">
				<form action="registro.php" method="POST">
				<div class="group">
					<label for="user" class="label">Nome</label>
					<input id="user" name="first" type="text" class="input">
				</div>
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" name="uid" type="text" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Endereço de e-mail</label>
					<input id="pass" name="email" type="text" class="input">
				</div>				
				<div class="group">
					<label for="pass" class="label">Senha</label>
					<input id="pass" name="pwd" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="pass" class="label">Confirme a Senha</label>
					<input id="pass" name="conf_senha" type="password" class="input" data-type="password">
				</div>				
				<div class="group">
					<input type="submit" class="button" value="Registrar">
				</div>
				</form>
			</div>
		</div>
	</div>
</div>