<!DOCTYPE html>
<?php
session_start();

if (!isset($_SESSION['logado'])) {
    header('Location: ../index.php?pagina=login');
}
?>
<html>

  <head>
    <meta charset="utf-8">
    <title>Painel Administrativo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	  <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
	  <script src="js/jquery.mask.min.js" type="text/javascript"></script>
  	<script type="text/javascript">
  		$(document).ready(function(){
  			$("#telefone").mask("(00)00000-0000");
  			$("#telefoneFixo").mask("(00)0000-0000");
  			$("#data").mask("00/00/0000");
  			$("#cpf").mask("000.000.000-00");
  			$("#cnpj").mask("00.000.000/0000-00");
  			$("#cep").mask("00.000-000");
  			$("#").mask("");
  			$("#").mask("");
  		})
  	</script>
  </head>
  <body>
    <nav class="navbar navbar-expand-md bg-primary navbar-dark">
      <div class="container">
        <a class="navbar-brand" href='?pagina=inicio'>
          <i class="fa d-inline fa-lg fa-cloud"></i>
          <b>Consulte Papelaria</b>
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item">
              <i class="fa d-inline fa-lg fa-user"></i> <?=$_SESSION['nome_usu'];?>
            </li>
          </ul>
          <a class="btn navbar-btn ml-2 text-white btn-danger" href="..\Classes\Logout\logout.php">
            <i class="fa d-inline fa-lg fa-user-circle-o"></i>&nbsp;Sair
          </a>
        </div>
      </div>
    </nav>
  	<!------------------------------------------------Linkando páginas--------------------------------------------------->			
    <div id="dvCentro">
      <div id="dvEsquerda">
        <?php
          if (isset($_GET['pagina'])) {
            $pagina = $_GET['pagina'];
              switch ($pagina) {
                case "inicio":
                  include_once("inicio.php");
                  break;
                case "administradores":
                  include_once ("administradores.php");
                  break;
    						case "cadastrar_adm":
                  include_once ("cadastrar_adm.php");
                  break;
                case "papelarias":
                  include_once ("papelarias.php");
                  break;
                case "cadastrar_pap":
                  include_once ("cadastrar_pap.php");
                  break;
    						case "categorias":
                  include_once ("categorias.php");
                  break;
    						case "produtos":
                  include_once ("produtos.php");
                  break;
    						case "listas":
                  include_once ("listas.php");
                  break;
    						case "promocoes":
                  include_once ("promocoes.php");
                  break;
                  case "cadastrar_lista":
                  include_once ("cadastrar_lista.php");
                  break;
                default:
                  include_once("inicio.php");
              }
          } else {
            include_once("inicio.php");
            }
        ?>
      </div>
      <div id="dvDireita"></div>
      <div class="clear"></div>
    </div>
		<!------------------------------------------------FIM------------------------------------------------------>
  </body>
</html>