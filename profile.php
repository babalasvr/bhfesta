<?php header("Content-Type: text/html; charset=utf8");?>
<?php include 'dbh.php'; ?>
<!DOCTYPE html>
<html>
	<?php $id_usuario = $_GET['id']; ?>
	<?php
		$procurando = "SELECT * FROM user WHERE id = '".$id_usuario."'";
		$result = mysqli_query($conn, $procurando);
		$linha = mysqli_fetch_assoc($result);
		$pwd = $linha['pwd'];
		$nome = $linha['first'];
		$id = $linha['id'];
		$last = $linha['email'];
	?>
	<head>
		<title>Ifest | Ola <?php echo $nome; ?></title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
		<meta name="description" content="Pit">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="assets/css/custom.css" type="text/css">
		<link rel="stylesheet" href=" https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css ">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
		<link rel="stylesheet" href="custom.css" type="text/css">
	</head>
	<body>
		<div class="topo" style="background-color: #ffb6c1; color: #000; text-align: center; padding: 10px">
		Belo Horizonte &#8675;
		</div>
		<nav class="navbar navbar-primary">
		  <div class="container-fluid" style="padding: 5px;">
		    <div class="navbar-header">
		      <li style="list-style-type: none;" class="navbar-brand" href="#">Ola <?php echo $nome; ?>
		      </li>
		    </div>
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">     
		      <ul class="nav navbar-nav navbar-right">
		        <form class="navbar-form">
		        <div class="form-group">
		          <input type="text" class="form-control" disabled placeholder="Pesquisar">
		        </div>
		        <button type="submit" class="btn btn-default" disabled>Pesquisar</button>
		      </form>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		<div class="setinha_volar">
			<?php echo "<a href='logado.php?id=".$id."'>&lt;&lt; Voltar </a>" ?>
		</div>
		<div class="container-profile">
		  <div class="header">
		    <?php echo "<h1>".$nome."<h1>"; ?>
		    <?php echo "<h2 style='font-size: 15px; padding-top: 10px;'>".$last."</h2>"; ?>
		     <img src="assets/img/anonimo.png" class="profile">
		  </div>
		  <div class="content-profile">
		    <h3>Sobre Mim</h3>
		    <p>Olá meu nome é: <?php echo $nome; ?></p>
		    <?php echo "<a href='eventos_usuario.php?id=".$id."' '>
<button type='button' class='btn btn-outline-info' style='margin-right: 10px;'style='top: 690px; position: absolute;'>Visualizar seus eventos</button>
</a>"?>
		  </div>    
		</div>
		<footer style="margin: 12.9% 0 0 0; background-color: #ffb6c1; padding: 8px; color: #000; font-family: 'Roboto', sans-serif; text-align: center;">
		Aceitamos:
		<i style="text-align: center;" class="fa fa-credit-card-alt" aria-hidden="true"></i>
		<i class="fa fa-cc-paypal" aria-hidden="true"></i>
	</footer>
		
	</body>
</html>