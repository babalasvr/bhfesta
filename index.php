<?php header("Content-Type: text/html; charset=utf8");?>
<?php include 'dbh.php'; 
session_start();?>
<!DOCTYPE html>
<html>
  <?php if(!isset($_SESSION['id_usuario']))
      header('Location: login_cadastro.php')?>
  <?php $id_usuario = $_SESSION['id_usuario']; ?>
  <?php
    $procurando = "SELECT * FROM user WHERE id = '".$id_usuario."'";
    $result = mysqli_query($conn, $procurando);
    $linha = mysqli_fetch_assoc($result);
    $pwd = $linha['pwd'];
    $nome = $linha['first'];
  ?>
  <head>
    <title>BHFestas | Tela Inicial </title>
    <link rel="shortcut icon" href="logo.png" type="image/x-png0"/>
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
  <?php
    $procurando = "SELECT * FROM user WHERE id = '".$id_usuario."'";
    $result = mysqli_query($conn, $procurando);
    $linha = mysqli_fetch_assoc($result);
    $pwd = $linha['pwd'];
    $nome = $linha['first'];
    $id = $linha['id'];
  ?>
  <!-- id=".$id_usuario.""); -->
  <!-- BACK TO TOP -->

  <div class="topo" style="background-color: #ffb6c1; color: #000; text-align: center; padding: 15px">
    BHFestas
  </div>
    <nav class="navbar navbar-primary">
  <div class="container-fluid" style="padding: 5px;">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
          <li style="list-style-type: none;" class="navbar-brand" href="#">Seja Bem Vindo Felipe e Max
      </li>
      
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">     
      <ul class="nav navbar-nav navbar-right">
    <?php echo "
        <form class='navbar-form' action='search.php?id=".$id."' method='post'>
        <div class='form-group'>
          <input type='text' name='search' required class='form-control' placeholder='Pesquisar'>
        </div>
        <button type='submit' name='btn_pesquisar' class='btn btn-info'>Pesquisar</button>
    <a href='login_cadastro.php' class='btn btn-success'><i class='fa fa-sign-out' aria-hidden='true'></i>Logar</a>
      </form>"; ?>
    
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<!-- famoso slider -->
<div class="logo"  style=" text-align: center; padding: 15px"><img src='assets/img/logo1.png' style='width: 650px; height: 280px;'>

<div class="slider"> 
  <div class="slide_viewer">
    <div class="slide_group">
      <div class="slide">
      </div>
      <div class="slide">
      </div>
    </div>
  </div>
</div><!-- End // .slider -->
<div class="slide_buttons">
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js.js"></script>

<?php

?>
    <!-- Anuncio do topo -->
    <h3 class="anuncio-top" style="margin-top: 5%;">VEJA TODOS EVENTOS DISPONÍVEIS</h3>
    <h4 style="margin-top: 4%;">O setor de eventos e entretenimento tem sido um dos mais impactados pela Covid-19, afetando direta e indiretamente diversas empresas que compõem a cadeia produtiva deste segmento, dentre elas produtores de evento, empresas de venda de ingressos, artistas, casas de espetáculo, entre outros.  Diante das proibições na realização de eventos impostas pelas autoridades governamentais, as empresas desse setor, além de reduzirem seu faturamento para praticamente zero, sofrem diversos impactos com o cancelamento ou adiamento dos eventos. Para melhor elucidar isso em toda a cadeia de entretenimento tomamos, como exemplo, um evento de teatro musical.  Para garantir que um evento aconteça em um determinado local, o produtor cultural ou realizador, precisa antecipar o pagamento da locação do espaço onde o evento ocorrerá. Com as datas e local definidos, é possível elaborar um cronograma reverso, contendo todas as ações que serão necessárias ao longo do tempo para viabilizar aquele determinado evento.</h4>
    <br><br><br>
    <iframe width="1020" height="630" src="https://www.youtube.com/embed/3rUqFAHLb9g" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <h3 class="empresa" style="margin-top: 6%;">Somos uma empresa criada com o intuito de divulgar eventos em Belo Horizonte para facilitar a vida dos que, assim como nós, amam uma noitada. A princípio, estaremos apenas em página formato WEB, mas se projeto tiver uma boa aceitação por vocês usuarios faremos uma plataforma para celulares. </h3>
</div>
  <footer style="margin: 10.9% 0 0 0; background-color: #ffb6c1; padding: 8px; color: #000; font-family: 'Roboto', sans-serif; text-align: center;">
    &copy 2020 - BHFestas
  </footer>
  </body>
</html>