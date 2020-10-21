<?php
error_reporting(0);
ini_set(“display_errors”, 0 );
?>

<style media="print">
.naomostra {
display: none;
}
</style>


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

<?php
  header('Content-Type: text/html; charset=utf-8');
	session_start();
	if(!isset($_SESSION['itens']))
	{
		$_SESSION['itens'] = array();
	}

	if(isset($_GET['add']) && $_GET['add'] == "carrinho")
	{
		/*Adiciona ao Carrinho*/

		$idProduto = $_GET['id'];
		if(!isset($_SESSION['itens'] [$idProduto]))
		{
			$_SESSION['itens'] [$idProduto] = 1;
		} else {
			$_SESSION['itens'] [$idProduto] +=1;
		}
	}

		/*****************************************************Exibe o Carrinho***********************************************************/


	if (count($_SESSION['itens']) == 0) {

?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <h4 class=" font-weight-bold text-dark text-center">Carrinho Vazio</h4>
          <a href="index.php" class="btn btn-secondary" type="button">Adicionar mais itens</a>
        </div>
      </div>
    </div>
<?php

	} else {

		$conexao  = new PDO('mysql:host=localhost;dbname=papelaria;charset=utf8', "root","1a2b3c4d5e6f@A");

		$_SESSION['dados'] = array();

?>

 <div class="container-fluid mt-2" >

    <div class="row">
        <div class="col-md-12 mb-2">
          <button id="btn" class="btn btn-secondary float-right naomostra">
            <i class="fa fa-fw fa-lg fa-print text-dark" title="Imprimir"></i>
          </button>
          <a href="index.php" class="btn btn-secondary float-left" type="button">Adicionar mais itens</a>
        </div>
    </div>

      <div class="row">
        <div class="col-md-12" id="sua_div">
          <div class="card">
            <!--cards-header classe onde ficará o cabeçalho docartão -->
            <div class="card-header">
              <h1 class="card-text float-left">Orçamento</h1>
            </div>
            <div class="card-body"> 
              <table class="table table-striped table-bordered table-sm" id="id_listarPapelarias" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="text-center"></th>
                    <th class="text-center">Produto</th>
                    <th class="text-center">Preço</th>
                    <th class="text-center">Quantidade</th>
                    <th class="text-center">Vendido por</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
<?php

		foreach ($_SESSION['itens'] as $idProduto => $quantidade) 
		{
			$select = $conexao->prepare("SELECT produto.nome_pro, produto.preco_pro, produto.imagem_pro, 
                usuario.nome_usu 
                FROM produto, usuario 
                WHERE produto.id_pro=? and produto.fk_usuario_pro = usuario.id_usu");
			$select->bindParam(1, $idProduto);
			$select->execute();
			$produtos = $select->fetchAll();
      $preco = $produtos[0] ["preco_pro"];
			$produtos[0] ["preco_pro"] = preg_replace("/[^0-9]/", "",$produtos[0] ["preco_pro"]);
			
			$total = $quantidade * $produtos[0] ["preco_pro"];

?>
				          <tr>
                    <td><img class="img-fluid" height="40" width="40" src="upImagem/<?=$produtos[0] ["imagem_pro"];?>"></td>
                    <td class="text-center"><?=$produtos[0] ["nome_pro"];?></td>
                    <td class="text-center">R$ <?=$preco;?></td>
                    <td class="text-center"><?=$quantidade;?></td>
                    <td class="text-center"><?=$produtos[0] ["nome_usu"];?></td>
                    <td class="text-center"><a href="remover.php?remover=carrinho&id=<?=$idProduto;?>">
                        <i class="fa fa-fw fa-lg fa-trash-o text-danger" title="Remover"></i>
                      </a>
                    </td>
				          </tr>
                  


<?php
				
				array_push(
				$_SESSION['dados'],
				array('total' => $total)
			);//Array push


		}

		$subtotal = 0;
		foreach ($_SESSION['dados'] as $valortotal) {
			
			$subtotal += $valortotal['total'];
		}
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

		<script type="text/javascript" src="JS/jsDataTable1.js"></script>
  		<script type="text/javascript" src="JS/jsDataTable2.js"></script>
  		<script type="text/javascript" src="JS/jsDataTable3.js"></script>

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