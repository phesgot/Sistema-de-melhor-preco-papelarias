<?php
    
  require_once("Classes/DAO/listarDao.php");
  
  $listarDao = new ListarDao();
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

  
  

    <div class="container-fluid mt-2">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <!--cards-header classe onde ficará o cabeçalho docartão -->
            <div class="card-header">
              <h1 class="card-text">Papelarias</h1>
            </div>
            <div class="card-body"> 
              <table class="table table-striped table-bordered" id="id_listarPapelarias" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>Endereço</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                      foreach ($listarDao->ListarPapelarias() as $consulta ) {
                    ?>
                  <tr>
                    <td><?=$consulta["nome_usu"];?></td>
                    <td><?=$consulta["telefone_usu"];?></td>
                    <td><?=$consulta["email_usu"];?></td>
                    <td><?=$consulta["endereco"];?> <?=$consulta["bairro"];?> <?=$consulta["cidade"];?>/<?=$consulta["estado"];?> CEP:<?=$consulta["cep"];?></td>
                  </tr>
                    <?php
                      }
                    ?>
                </tbody>
              </table>
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

  <script type="text/javascript" src="JS/jsDataTable1.js"></script>
  <script type="text/javascript" src="JS/jsDataTable2.js"></script>
  <script type="text/javascript" src="JS/jsDataTable3.js"></script>
  <link rel="stylesheet" href="CSS/DataTable2.css"> 
    <script>
      $(document).ready(function(){
          $('#id_listarPapelarias').DataTable({
              "language": {
                            "sEmptyTable": "Nenhum registro encontrado",
                            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                            "sInfoPostFix": "",
                            "sInfoThousands": ".",
                            "sLengthMenu": "_MENU_ resultados por página",
                            "sLoadingRecords": "Carregando...",
                            "sProcessing": "Processando...",
                            "sZeroRecords": "Nenhum registro encontrado",
                            "sSearch": "Pesquisar",
                            "oPaginate": {
                                "sNext": "Próximo",
                                "sPrevious": "Anterior",
                                "sFirst": "Primeiro",
                                "sLast": "Último"
                            },
                            "oAria": {
                                "sSortAscending": ": Ordenar colunas de forma ascendente",
                                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
}
          });
      });
    </script>



  </body>
</html>