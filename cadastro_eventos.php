<?php header("Content-Type: text/html; charset=utf8");?>
<?php include 'dbh.php'; 
session_start(); ?>
<!DOCTYPE html>
<html>
  <?php $id_usuario = $_SESSION['id_usuario']; ?>
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
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
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
  <style>
  #map {
        height: 100%;
      }

      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      .pac-container {
        font-family: Roboto;
      }

      #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
      }

      #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }
      #target {
        width: 345px;
      }

    .input-cadastro {
      width: 60%;
      margin: 1% 20% 1% 20%;
    }
  </style>
  <body>
  <nav class="navbar navbar-primary">
  <div class="container-fluid" style="padding: 5px;">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
    <?php echo "<a href='logado.php?id=".$id."' class='navbar-brand'>Home</a>"?>
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
  <?php echo "<h1 style='text-align: center;'>Olá ".$nome.", cadastre seu evento aqui"; ?>


  <?php
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

if(strpos($url, 'erro=camposvazios')!== false){
  echo "<div style='width: 40%; margin: 2% 30% 0 30%; font-size: 20px;' class='alert alert-warning' role='alert'>
              <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
              <span class='sr-only'>Error:</span>
              Oops, parece que um campo ou mais estão vazios!!!
          </div>";
}

else if(strpos($url, 'sucesso=evento_cadastrado')!== false){
  echo "<div style='width: 40%; margin: 2% 30%; font-size: 20px;' class='alert alert-success' role='alert'>
              <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
              <span class='sr-only'>Error:</span>
              Evento cadastrado com sucesso!
          </div>";
}
?>

  <div class="cadastro">
    <div class="form">
      <form enctype="multipart/form-data" class="login-form" method="post" action="insert_eventos.php">
      <label for="imagem" style="font-size: 20px;">Imagem:</label>
          <input type="FILE" name="foto"/>
        <input type="text" placeholder="Nome Evento" name="nome_evento"/>    
        <input type="text" placeholder="Tipo do Evento" name="tipo_evento"/>
      <input type="text" placeholder="Preço" name="preco">      
        <input type="text" placeholder="Classificação (idade)" name="classificacao_evento"/>                     
        <input type="text" placeholder="Telefone de Contato" name="contato_evento"/>
        <input type="text" placeholder="Local de Vendas" name="local_vendas_evento"/>
      <input type="date" name="data"/>
      <input type="text" style="display: none;" name="id_usuario" value="<?php echo $id_usuario; ?>">
      <textarea rows="4" cols="50" placeholder="Descrição" name="desc_evento" style="resize: none;"></textarea>
        <!-- <textarea rows= "4" cols="50" placeholder="Descrição" name="desc_evento" style="resize: none;"></textarea> -->
      <label for="opcao" style="font-size: 20px;">Tempo do anuncio:</label>
      <select name="opcao" style="font-size: 20px; margin-bottom: 20px;">
      <option value="7">7 Dias | R$ 10</option>
      <option value="30">1 Mês | R$ 30</option>
      <option value="60">2 Meses |R$ 50</option>
      </select> 
         
      
                  
   
      <br>
       
        <button>Cadastrar</button>
      </form>
    </div>
  </div>



<style>
  

.cadastro {
  width: 360px;
  padding: 4% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input,
.form textarea {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #0099ff;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #147ec5;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}

.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
</style>



  </body>
</html>