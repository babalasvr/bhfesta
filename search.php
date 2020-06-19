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
			<?php echo "<a href='index.php?id=".$id_usuario."'>&lt;&lt; Voltar </a>" ?>
		</div>

		<div>
			<?php
				if(isset($_POST['btn_pesquisar'])) {
					$search = mysqli_real_escape_string($conn, $_POST['search']);
					$sql = "SELECT * FROM eventos WHERE nome_evento LIKE '%$search%' OR desc_evento LIKE '%$search%' OR localizacao LIKE '%$search%' OR preco LIKE '%$search%'";
					$result = mysqli_query($conn, $sql);
					$queryResult = mysqli_num_rows($result);

					echo "<h1 style='margin: 4% 0; text-align: center; font-family: 'Roboto', sans-serif;><b>".$queryResult."</b> resultado(s) para: ".$search."</h1>";

					if($queryResult > 0) {
						while ($aux = mysqli_fetch_assoc($result)) {
							echo "<div style='border-left: 4px solid #0099ff;' class='corpo-evento'>
						<label>Nome: <b>".$aux["nome_evento"]."</b></label>
						<br><label>Descricao: <b>".$aux["desc_evento"]."</b></label>
						<br><i class='fa fa-map-marker' aria-hidden='true'></i><b>".$aux["localizacao"]."</b>
						<br><label>A partir de: <b style='color: #0099ff;'>".$aux["preco"]."</b></label>
						<br>
						<div class='row' style='margin: 4% 0 0 0;'>
							<form class='col-md-2 offset-md-1 text-center'>
								<div class='stars'>
									<input type='radio' name='star' class='star-1' id='star-1' />
									<label class='star-1' for='star-1'>1</label>
									<input type='radio' name='star' class='star-2' id='star-2' />
									<label class='star-2' for='star-2'>2</label>
									<input type='radio' name='star' class='star-3' id='star-3' />
									<label class='star-3' for='star-3'>3</label>
									<input type='radio' name='star' class='star-4' id='star-4' />
									<label class='star-4' for='star-4'>4</label>
									<input type='radio' name='star' class='star-5' id='star-5' />
									<label class='star-5' for='star-5'>5</label>
									<span></span>
								</div>
							</form>
							<div class='col-md-6'>
								<div style='margin-top: 20px;' class='heart'></div>
							</div>
						</div>
					</div>";
						}
					}

					else {
						echo "
							<div style='width: 30%; margin: 2% 35%;' class='alert alert-warning' role='alert'>
  								<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
  								<span class='sr-only'>Error:</span>
  								Não há resultados para a sua pesquisa :/
							</div>";
					}
				}
			?>
		</div>
	</body>
</html>