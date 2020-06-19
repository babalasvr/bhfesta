	<?php header("Content-Type: text/html; charset=utf8");?>
<?php include 'dbh.php'; 
session_start();
$id_usuario = $_SESSION['id_usuario'];
$puxando_user = mysqli_query($conn, "select * from eventos WHERE id_usuario = '".$id_usuario."'") or die (mysqli_error($conn));
$linhas = mysqli_num_rows($puxando_user);
?>
<!DOCTYPE html>
<html>
	<?php $id_usuario = $_SESSION['id_usuario']; ?>
		<?php
		$procurando = "SELECT * FROM user WHERE id = '".$id_usuario."'";
		$result = mysqli_query($conn, $procurando);
		$linha = mysqli_fetch_assoc($result);
		$pwd = $linha['pwd'];
		$nome = $linha['first'];
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
		<!-- Início Navbar -->
		<nav class="navbar navbar-primary">
  			<div class="container-fluid" style="padding: 5px;">
	    		<div class="navbar-header">
	      			<li style="list-style-type: none;" class="navbar-brand" href="#">Ola <?php echo $nome; ?>
	     			 </li>
	    		</div>
	    		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">    
	    		</div>
  			</div>
		</nav>
		<!-- Fim Navbar -->

		<div class="setinha_volar">
			<?php echo "<a href='logado.php?id=".$id_usuario."'class='btn btn-primary' >&lt;&lt; Voltar </a>" ?>
		</div>

		<div>
		<h2 class="anuncio-top" style="margin-top: -1%;"><u>Seus Eventos:</u></h2>


		<?php
		if($linhas === 0)			
			echo "<div style='width: 25%; margin: 2% 40% 0 38%; font-size: 20px;' class='alert alert-warning' role='alert'>
  						<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
  						<span class='sr-only'>Error:</span>
  						Nao tem evento cadastrado!!!
					</div>";

	?>
	<?php
		if(isset($_GET['sucesso']) && $_GET['sucesso'] == "sucesso")			
			echo "<div style='width: 25%; margin: 2% 40% 0 38%; font-size: 20px;' class='alert alert-success' role='alert'>
  						<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
  						<span class='sr-only'>Error:</span>
  						Evento excluido com sucesso!!!
					</div>";

	?>
		
				<?php
			while($aux = mysqli_fetch_assoc($puxando_user))
 			{
 				
 				$datacerta = $aux['data'];

				echo "
					<div style='border-left: 4px solid #0099ff;' class='corpo-evento'>
						<label>Nome: <b>".$aux["nome_evento"]."</b></label>
						<br><img src='assets/img/".$aux["imagem_evento"]."' style='width: 550px; height: 300px;'>
						<br><label>Tipo: <b>".$aux["tipo"]."</b></label>
						<br><label>Classificação: <b>".$aux["classificacao"]." anos</b></label>
						<br><i class='fa fa-map-marker' aria-hidden='true'></i><b>".$aux["localizacao"]."</b>
						<br><i style='margin-right: 5px;' class='fa fa-calendar-plus-o' aria-hidden='true'></i><b>".date('d/m/Y', strtotime($datacerta))."</b>
						<br><label>A partir de: <b style='color: #0099ff;'>R$".$aux["preco"]."</b></label>
						<br>
						 <div class='row' style='margin: 4% 0 0 0;'>						
							<div class='col-md-4'>
								<a href='alterar_evento.php?id=".$aux['id_evento']."' class='btn btn-block btn-primary'>Editar Evento</a>
								<a href='usuario-deleta.php?id=".$aux['id_evento']."' onclick='confirmar()' class='btn btn-block btn-danger'>Deletar Evento</a>
							</div>


						</div>
					</div>
					";
 			}

		?>
		
			
		</div>
	</body>
</html>