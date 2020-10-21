<?php
    
  require_once("Classes/DAO/listarDAO.php");
  
  $listarDAO = new ListarDAO();
 

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

      <!--------------------------------------------------------------Buscar-------------------------------------------->  
        <form class="form" action="">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Pesquisar" name="search" id="pesuisar">
            <div class="input-group-append">
              <button class="btn btn-sm btn-secondary" type="submit" id="btnfiltrar" name="pagina" value="buscar">ir<br></button>
            </div>
          </div>
        </form>
<!-----------------------------------------------------------------Final Buscar-------------------------------------------->  
<!-----------------------------------------------------------------Botão Filtrar--------------------------------------------> 
        <a class="btn navbar-btn ml-2 text-white btn-secondary" href="#ItemColapsso1"  data-toggle="collapse" aria-expanded="false" aria-controls="ItemColapsso1">
          <i class="fa d-inline fa-lg fa-filter"></i>&nbsp;Filtro</a>
<!-----------------------------------------------------------------Fim Filtrar--------------------------------------------> 


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


<!---------------------------------------------------------------Filtro------------------------------------------------>
    <div class="container-fluid mt-1">
      <div class="row">
        <div class="col-12">
          <div class="collapse" id="ItemColapsso1">
            <div class="card card-body">

<form>
            <div class="form-row">
              <div class="form-group col-md-5">
                <select class="custom-control custom-select" name="categorias" >
                  <option value="">Categoria</option>
                  <?php
                    foreach($listarDAO->retornarCategorias() as $categorias ){
                  ?>
                  <option value="<?=$categorias['id_cat'];?>"><?=$categorias['nome_cat'];?></option>
                  <?php
                    }
                  ?>
                </select>
              </div>

              <div class="form-group col-md-5">
                <select class="custom-control custom-select" name="papelarias">
                  <option value="">Papelaria</option>
                  <?php
                    foreach($listarDAO->retornarPapelarias() as $papelarias ){
                  ?>
                  <option  value="<?=$papelarias['id_usu'];?>"><?=$papelarias['nome_usu'];?></option>
                  <?php
                    }
                  ?>
                </select>
              </div>

              <div class="form-group col-md-2">
                  <button type="submit" class="btn btn-secondary btn-block" id="btnfiltrar" name='pagina' value="filtrar">Filtrar</button>
              </div>
              
            </div>
 </form>

 <form>
            <div class="form-row">
              <div class="form-group col-md-5">
                <select class="custom-control custom-select" name="idLista" required="required">
                  <option value="">Lista</option>
                  <?php
                    foreach($listarDAO->retornarListas() as $listas ){
                  ?>
                  <option value="<?=$listas["id_lista"];?>">
                    <?=$listas['nome_escola'];?> <?=$listas['ensino'];?> <?=$listas['ano'];?>
                  </option>
                  <?php
                    }
                  ?>
                </select>
              </div>

              <div class="form-group col-md-2">
                  <button type="submit" class="btn btn-secondary btn-block" name='pagina' value="lista">Filtrar</button>
              </div>
              
            </div>
 </form> 

            </div>
          </div>
        </div>
      </div>
    </div>
<!-----------------------------------------------------Fim do filtro----------------------------------------------->
  		
	<!------------------------------------------------Linkando páginas----------------------------------------------->			
    <div id="dvCentro">
      <div id="dvEsquerda">


        <?php
         
        if (isset($_GET['pagina'])){
          $pagina = $_GET['pagina'];
          
  
          switch ($pagina){
            case "viewAnuncio";
              include_once("viewAnuncio.php");
              break;
/****************************FILTRO DE PESQUISA******************************************************/              
            case "buscar";
              $info = ($_GET['search']);
              $i=0;
?>
    <div class="section">
      <div class="container-fluid">
        <div class="row">
<?php
              foreach($listarDAO->retornarInformacoes1($info) as $consulta ){
?>
          <div class="col-xl-2 col-md-4 col-sm-6 mb-3">
            <div class="card text-black bg-light o-hidden h-100">

              <div class="card-body">
                <img title="visualizar produto" src="upImagem/<?=$consulta["imagem_pro"];?>" class="img-fluid mx-auto d-block" height="80" width="80">
                <?=$consulta["nome_pro"];?>
                <p style="color:green; font-size:12px;">Vendido por: <?=$consulta["nome_usu"];?></p>  
                <p style="color:orange;">R$<?=number_format($consulta["preco_pro"] / 100, 2, ',', '');?></p>   
              </div>
              <a href='?pagina=viewAnuncio&cod=<?=$consulta["id_pro"];?>' class="card-footer text-black bg-info clearfix small z-1">
                <span class="float-left">Ver Detalhes</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
<?php
              $i++;
              }
              if($i == 0){
?>
              <h3>Nenhum resultado encontrado!</h3>
        </div>
      </div>
    </div>
<?php
              }
            
              break;
            
            case "filtrar";
              $info1 = ($_GET['categorias']);
              $info2 = ($_GET['papelarias']);
              $i=0;
?>
    <div class="section">
      <div class="container-fluid">
        <div class="row">
<?php
              foreach($listarDAO->retornarInformacoes2($info1, $info2) as $consulta ){
?>
              <div class="col-xl-2 col-md-4 col-sm-6 mb-3">
                <div class="card text-black bg-light o-hidden h-100">

                  <div class="card-body">
                    <img title="visualizar produto" src="upImagem/<?=$consulta["imagem_pro"];?>" class="img-fluid mx-auto d-block" height="80" width="80">
                    <?=$consulta["nome_pro"];?>
                    <p style="color:green; font-size:12px;">Vendido por: <?=$consulta["nome_usu"];?></p>  
                    <p style="color:orange;">R$<?=number_format($consulta["preco_pro"] / 100, 2, ',', '');?></p>   
                  </div>
                  <a href='?pagina=viewAnuncio&cod=<?=$consulta["id_pro"];?>' class="card-footer text-black bg-info clearfix small z-1">
                    <span class="float-left">Ver Detalhes</span>
                    <span class="float-right">
                      <i class="fa fa-angle-right"></i>
                    </span>
                  </a>
                </div>
              </div>

<?php
              $i++;
              }
              if($i == 0){
?>
              <h3>Nenhum resultado encontrado!</h3>
        </div>
      </div>
    </div>
<?php
              }
              break;
/****************************Filtrar Lista******************************************************/ 
          case "lista";
              $info3 = ($_GET['idLista']);
              $i=0;
?>
              <div class="section">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-12 mb-2">
                    <button id="btn" class="btn btn-secondary float-right naomostra">
                        <i class="fa fa-fw fa-lg fa-print text-dark" title="Imprimir"></i>
                    </button>
                    </div>
                     <div class="col-md-12" id="sua_div">
                        <div class="card">
                             <!--cards-header classe onde ficará o cabeçalho docartão -->
                          <div class="card-header">
                            <h1 class="card-text">Orçamento</h1>
                          </div>
                          <div class="card-body"> 
                            <table class="table table-striped table-bordered" id="id_listarPapelarias" cellspacing="0" width="100%">
                              <thead>
                                <tr>
                                  <th></th>
                                  <th>Produto</th>
                                  <th>Preço</th>
                                  <th>Quantidade</th>
                                  <th>Vendido por</th>
                                </tr>
                              </thead>
                              <tbody>
                      
<?php
                              $total = 0;
                              $totalPreco = array('total' => $total);
                              foreach($listarDAO->retornarInformacoes3($info3) as $consulta ){
?>
                              <tr>
                                <td><img class="img-fluid" height="40" width="40" src="upImagem/<?=$consulta["imagem_pro"];?>"></td>
                                <td><?=$consulta["nome_pro"];?></td>
                                <td>R$ <?=number_format($consulta["preco_pro"] / 100, 2, ',', '');?></td>
                                <td><?=$consulta["quantidade_item"];?></td>
                                <td><?=$consulta["nome_usu"];?></td>
                              </tr>

<?php
                        $preco =  $consulta["preco_pro"];
                        $quantidade = $consulta["quantidade_item"];
                        $preco = preg_replace("/[^0-9]/", "",$preco);
                        $total = $quantidade * $preco;


                      $totalPreco[$i] = $total;
                      $i++;
                      }

                      $subtotal = 0;
                      foreach ($totalPreco as $valortotal) {
                        $subtotal += $valortotal;
                    }

?>
                              </tbody>
                            </table>
                          </div>
                          <div class="card-footer text-muted">
                             <h4 class="float-right font-weight-bold text-secondary">Total: R$ <?=number_format($subtotal / 100, 2, ',', '');?></h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
<?php
                 if($i == 0){
?>
                      <h3>Nenhum resultado econtrado!</h3>                     
<?php
              }
              break;
/****************************FIM Filtrar Lista******************************************************/ 


/****************************FIM FILTRO DE PESQUISA******************************************************/  
          }
        }else{
            include_once("listarProdutos.php");
          } 
?>    





      </div>
		  <div id="dvDireita"></div>
      <div class="clear"></div>
    </div>
		<!------------------------------------------------FIM------------------------------------------------------>
		
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script>
        document.getElementById('btn').onclick = function() {
            var conteudo = document.getElementById('sua_div').innerHTML,
                tela_impressao = window.open('about:blank');

            tela_impressao.document.write(conteudo);
            tela_impressao.window.print();
            tela_impressao.window.close();
        };
        </script>
	</body>
</html>
  