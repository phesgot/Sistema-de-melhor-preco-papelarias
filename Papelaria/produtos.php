<?php
	require_once("../Classes/DAO/PapelariaDAO.php");
			
	$papelariaDao = new PapelariaDAO();
?>
<div >
  <br>
</div> 
<div class="section" id="listarProdutos">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1>
          <i class="fa fa-fw fa-ticket"></i>Produtos
        </h1>
      </div>
        <div class="col-md-6">
          <div class="btn-group btn-group-justified">
            <a href='?pagina=cadastrar_pro' class="btn btn-primary"><i class="fa fa-fw fa-plus"></i>Adicionar Produto
            </a>
          </div>
        </div>
    </div>
  </div>
</div>
<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-bordered table-sm" id="id_listarProdutos" cellspacing="0" width="100%">
          <thead>
            <tr>
    					<th>Produto</th>
		    			<th>Preço</th>
		    			<th>Categoria</th>
		    			<th>Marca</th>
              <th>Imagem</th>
			     		<th>Ações</th>
            </tr>
          </thead>
          <tbody>
<?php
  $id_usu = $_SESSION['id_usu'];
	foreach($papelariaDao->retornarInformacoesPRO($id_usu) as $consulta ){
?>
            <tr>
              <td><?=$consulta["nome_pro"];?></td>
              <td>R$<?=$consulta["preco_pro"];?></td>
              <td><?=$consulta["nome_cat"];?></td>   
              <td><?=$consulta["marca"];?></td>
              <td><img class="img-fluid" height="80" width="80" src="../upImagem/<?=$consulta["imagem_pro"];?>"></td>
              <td>
                <button type="button" data-toggle="modal" data-target="#modal_info<?=$consulta["id_pro"];?>">
					        <i class="fa fa-info fa-fw fa-lg text-primary" title="Informações" ></i>
					      </button>
					      <button type="button" data-toggle="modal" data-target="#modal_editar<?=$consulta["id_pro"];?>">
                  <i class="fa fa-fw fa-lg fa-pencil text-warning" title="Editar"></i>
					      </button>
					      <button type="button" data-toggle="modal" data-target="#modal_excluir<?=$consulta["id_pro"];?>">
                     <i class="fa fa-fw fa-lg fa-trash-o text-danger" title="Excluir"></i>
                </button>
              </td>
            </tr>

 <!-- Inicio Modal Informações PRO--> 
  <div class="modal"  id="modal_info<?=$consulta["id_pro"];?>">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Visualizar Informações</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span>×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="list-group">
              <div class="">
                <img class="img-fluid mx-auto d-block" height="200" width="200" src="../upImagem/<?=$consulta["imagem_pro"];?>">
              </div>


              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><b>Produto</b></h5>
              </div>
              <p class="mb-1"><b><?php echo $consulta["nome_pro"]; ?></b></p>

              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Marca</h5>
              </div>
              <p class="mb-1"><?php echo $consulta["marca"]; ?></p>

              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><b>Categoria</b></h5>
              </div>
              <p class="mb-1"><b><?php echo $consulta["nome_cat"]; ?></b></p>
        
            
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Preço</h5>
              </div>
              <p class="mb-1">R$<?php echo $consulta["preco_pro"]; ?></p>
           
            
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><b>Descrição</b></h5>
              </div>
              <pre class="mb-1"><b><?php echo $consulta["info_pro"]; ?></b></pre>
           
            
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Quantidade</h5>
              </div>
              <p class="mb-1"><?php echo $consulta["quant_pro"]; ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Fim Modal Visualizar ADM-->
				
				
				
<!-- Inicio Modal Editar ADM-->
<div class="modal" id="modal_editar<?=$consulta["id_pro"];?>">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Editar Produto</h5>
               <button type="button" class="close" data-dismiss="modal">
                  <span>×</span>
              </button>
          </div>

          <div class="modal-body">
              <form class="" method="post">
                  <div class="form-group">
			                 <input type="text" style="display:none" name="id" maxlength="14" class="form-control"  value="<?=$consulta["id_pro"];?>">

                        <label>Produto</label>
                        <input type="text" class="form-control" maxlength="80" name="txtProduto" value="<?=$consulta["nome_pro"];?>"> 
                  </div>

                  <div class="form-group">

                        <label>Marca</label>
                        <select class="custom-control custom-select" name="txtMarca" required="required">
                            <option value="<?=$consulta["id_marca"];?>"><?=$consulta["marca"];?></option>
                        <?php
                          foreach($papelariaDao->retornarInfoMAR() as $marcas ){
                        ?>
                            <option value="<?=$marcas["id_marca"];?>"><?=$marcas["marca"];?></option>
                        <?php
                           }
                        ?>    
                        </select>
                  </div>

                  <div class="form-group">

                        <label>Categoria</label>
                        <select class="custom-control custom-select" name="txtCategoria" required="required">
                            <option value="<?=$consulta["id_cat"];?>"><?=$consulta["nome_cat"];?></option>
                        <?php
                          foreach($papelariaDao->retornarInfoCAT() as $categorias ){
                        ?>
                            <option value="<?=$categorias["id_cat"];?>"><?=$categorias["nome_cat"];?></option>
                        <?php
                          }
                        ?>
                        </select>
                  </div>

                  <div class="form-group">

                        <label>Preço</label>
                        <input type="text" value="<?=$consulta["preco_pro"];?>" class="form-control" name="txtPreco" required="required" maxlength="10" onKeyPress="return(moeda(this,'.',',',event))"> 
                  </div>

                  <div class="form-group">

                        <label>Descrição</label>
                        <textarea class="form-control" name="txtInfo" required="required" maxlength="400" rows="5"><?=$consulta["info_pro"];?></textarea> 
                  </div>

                  <div class="form-group">

                        <label>Quantidade</label>
                        <input type="number" class="form-control" maxlength="80" name="txtQuantidade" value="<?=$consulta["quant_pro"];?>">  
                  </div>
          </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name="btnAlterar" >Alterar</button>

		        </form>
          </div>

        </div>
    </div>
</div>
  <!-- Fim Modal Editar ADM-->		

   <!-- inicio Modal Excluir Pro-->	
  <div class="modal" id="modal_excluir<?=$consulta["id_pro"];?>">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Excluir produto</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span>×</span>
          </button>
        </div>
        <div class="modal-body">
          <p><b><?=$consulta["nome_pro"];?></b>
            <br>
          Tem certeza que deseja excluir este produto do sistema ?</p>
        </div>
		 <form class="" method="post">
            <div class="form-group">
			<input type="text" style="display:none" name="id" maxlength="14" class="form-control"  value="<?=$consulta["id_pro"];?>">
			</div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="btnExcluir">Sim</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
		  </form>
        </div>
      </div>
    </div>
  </div>  
    
<?php
	}
?> 
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
	<script type="text/javascript" src="js/jsDataTable1.js"></script>
	<script type="text/javascript" src="js/jsDataTable2.js"></script>
	<script type="text/javascript" src="js/jsDataTable3.js"></script>
	<link rel="stylesheet" href="css/DataTable2.css"> 
    <script>
      $(document).ready(function(){
  		    $('#id_listarProdutos').DataTable({
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
	
	<?php
/*Código editar PRO*/				
	if (isset($_POST['btnAlterar'])) {
				
					
		$produto  = $_POST['txtProduto'];
		$marca = $_POST['txtMarca'];
    $categoria  = $_POST['txtCategoria'];
    $preco = $_POST['txtPreco'];
    $info  = $_POST['txtInfo'];
    $quantidade = $_POST['txtQuantidade'];
		$id = $_POST['id'];
		
				
		if ($papelariaDao->alterarPro($id, $produto, $marca, $categoria, $preco, $info, $quantidade)) {
		}
		?>
			<script type="text/javascript">
				alert("Produto alterado com suscesso!");
				window.location = '?pagina=produtos';
			</script>
		<?php
	}
	
	/*Código Excluir PRO*/
		if (isset($_POST['btnExcluir'])) {
				
		$id_pro = $_POST['id'];
				
		if ($papelariaDao->excluirPro($id_pro)) {
		}
		?>
			<script type="text/javascript">
				alert("Produto exluido com suscesso!");
				window.location = '?pagina=produtos';
			</script>
		<?php
	}
	
?>   