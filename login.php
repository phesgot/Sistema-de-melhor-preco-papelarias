<?php
require_once("Classes/DAO/UsuarioDao.php");
$UsuarioDao = new UsuarioDao();
session_start();
if (isset($_SESSION['logado'])) {
    header('Location: papelaria/painel_pape.php?');
}
?>

<!DOCTYPE html>

<html lang="pt-br">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Consulta Papelaria </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/theme.css" type="text/css"> 
  </head>

  <body>
    <nav class="navbar navbar-expand-md bg-primary navbar-dark">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <i class="fa d-inline fa-lg fa-cloud"></i>
          <b>Consulte Papelaria</b>
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="papelarias.php">
              <i class="fa fa-fw fa-building-o"></i>&nbsp;Papelarias</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contato.php">
              <i class="fa d-inline fa-lg fa-envelope-o"></i> Contatos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="carrinho.php">
              <i class="fa fa-fw fa-shopping-basket"></i>&nbsp;Orçamento</a>
            </li>
          </ul>
          <a class="btn navbar-btn ml-2 text-white btn-secondary" href="login.php">
          <i class="fa d-inline fa-lg fa-user-circle-o"></i>&nbsp;Entrar</a>
        </div>
      </div>
    </nav>

  
    <div >
      <br>
    </div>

  <div class="py-5" style="background-image: url('Imagens/fundo.png');">
    <div class="container">
      <div class="row">
        <div class="col-md-3"> </div>
        <div class="col-md-6">
          <div class="card text-white p-5 bg-dark">
            <div class="card-body">
              <h1 class="mb-4 text-center">Login</h1>
              <form role="form" method="post">
                <div class="form-group">
                  <label>E-mail</label>
                  <input type="email" class="form-control" placeholder="nome@domínio.com" maxlength="80" required="required" name="txtEmail"> </div>
                <div class="form-group">
                  <label>Senha</label>
                  <input type="password" class="form-control" id="senha" required="required" maxlength="40" name="txtSenha" placeholder="********"> </div>
                <button type="submit" class="btn btn-secondary btn-block" name="entrar">Entrar</button>
				<a class="btn btn-block btn-danger" href="esqueci_senha.php">Esqueci a Senha </a>
				<font color="red"><p style="padding:10px;" id="resultado" align="left"></p></font>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
		

  <div class="bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="p-4 col-md-4">
          <h2 class="mb-4 text-secondary">Consulte Papelaria</h2>
          <p class="text-white">A aaaaaaa
            <br> </p>
        </div>
        <div class="p-4 col-md-4">
          <h2 class="mb-4">Contatos</h2>
          <p>
            <a href="tel:+246 - 542 550 5462" class="text-white">
              <i class="fa d-inline mr-3 text-secondary fa-phone"></i>+55</a>&nbsp;(61) 3333-3333</p>
          <p>
            <a href="mailto:info@pingendo.com" class="text-white">
              <i class="fa d-inline mr-3 text-secondary fa-envelope-o"></i>info@acheaqui.com</a>.br</p>
          <p>
            <a href="https://goo.gl/maps/AUq7b9W7yYJ2" class="text-white" target="_blank">
              <i class="fa d-inline mr-3 fa-map-marker text-secondary"></i>Sobradinho, Brasília-</a>DF</p>
        </div>
        <div class="p-4 col-md-4">
          <h2 class="mb-4 text-light">Increva-se</h2>
          <form>
            <fieldset class="form-group text-white">
              <label for="exampleInputEmail1">Receber ofertas</label>
              <input type="email" class="form-control" placeholder="E-mail"> </fieldset>
            <button type="submit" class="btn btn-outline-primary bg-gradient">Enviar
              <br> </button>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-3">
          <p class="text-center text-white">© Copyright 2018 Consulte Papelaria - All rights reserved. </p>
        </div>
      </div>
    </div>
  </div>
<script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
  
  <?php
/*validando Usuario*/
if (isset($_POST['entrar'])) {
    if ($UsuarioDao->validarUsuario($_POST["txtEmail"], $_POST["txtSenha"])) {

	
        $consulta = $UsuarioDao->retornarInformacoes($_POST["txtEmail"]);

        $_SESSION['id_usu'] = $consulta['id_usu'];
		    $_SESSION['nome_usu'] = $consulta['nome_usu'];
		    $_SESSION['email_usu'] = $consulta['email_usu'];
		    $_SESSION['senha_usu'] = $consulta['senha_usu'];
		    $_SESSION['tipo_usu'] = $consulta['tipo_usu'];
        $_SESSION['logado'] = true;
		
		$tipo = $consulta['tipo_usu'];
		
		if ($tipo == 2){
        ?>
        <script>
            document.location.href = "Papelaria/painel_pape.php";
        </script>  
        <?php
		} else {
			?>
        <script>
            document.location.href = "Adiministrador/painel_adm.php";
        </script>  
        <?php
		}
    } else {
        ?>
        <script>
            document.getElementById("resultado").innerHTML = "*Usuário ou senha inválido";
        </script>  
        <?php
    }
}


?>
