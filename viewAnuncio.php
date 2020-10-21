
<?php
		
	require_once("Classes/DAO/listarDAO.php");
			
	$listarDAO = new ListarDAO();
					
	$view = $listarDAO->viewAnuncio($_GET['cod']);
?>		

  <div class="py-5">
    <div class="container">
      <div class="row">
      	<!--Imagem-->
        <div class="col-md-6">
        	<img title="visualizar produto" src="upImagem/<?=$view["imagem_pro"];?>" class="img-fluid mx-auto d-block" height="400" width="400">
        </div>


        <div class="col-md-6">

		<div class="row">
        	<div class="col-md-12">
				<div class="card">
					<!--cards-header classe onde ficará o cabeçalho docartão -->
					<div class="card-header">
						<p class="card-text font-weight-bold">Vendido por: <?=$view["nome_usu"];?><p>
					</div>
					<div class="card-body">
						
						<h4 class="card-text font-weight-bold"">idProduto</h4>
						<h4 class="card-text font-weight-bold"><?=$view["marca"];?></h4>
						<h1 class="card-text font-weight-bold">R$ <?=number_format($view["preco_pro"] / 100, 2, ',', '');?></h1>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
            <div class="col-md-12">
            	<a class="btn btn-primary btn-block mt-2 mb-2" href="carrinho.php?add=carrinho&id=<?=$view["id_pro"];?>">Adicionar na lista</a>	
            </div>
        </div> 


          
           

          
        </div>
      </div>
      <div class="row">
      <!--Descrição-->
        <div class="col-md-12">
			<div class="card">
				<!--cards-header classe onde ficará o cabeçalho docartão -->
				<div class="card-header">
					<h2>Descrição</h2>
				</div>
				<div class="card-body">
					<p class="card-text"><?=$view["info_pro"];?></p>
				</div>
			</div>	
        </div>
      </div>
    </div>
  </div>



			