<?php
	require_once("../Classes/DAO/AdministrativoDAO.php");
			
	$administrativoDAO = new AdministrativoDAO();
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
              	<th>Papelaria</th>
			    <th>Ações</th>
            </tr>
          </thead>
          <tbody>
<?php
	foreach($administrativoDAO->retornarInformacoesPRO() as $consulta ){
?>
            <tr>
              <td><?=$consulta["nome_pro"];?></td>
              <td>R$<?=number_format($consulta["preco_pro"] / 100, 2, ',', '');?></td>
              <td><?=$consulta["nome_cat"];?></td>   
              <td><?=$consulta["marca"];?></td>
              <td><?=$consulta["nome_usu"];?></td>
              <td>
                <button type="button" data-toggle="modal" data-target="#modal_info<?=$consulta["id_pro"];?>">
				   <i class="fa fa-info fa-fw fa-lg text-primary" title="Informações" ></i>
				</button>
				<button type="button" data-toggle="modal" data-target="#modal_validar<?=$consulta["id_pro"];?>">
                    <i class="fa fa-fw fa-lg fa-check text-success" title="Validar"></i>
                </button>
                <button type="button" data-toggle="modal" data-target="#modal_invalidar<?=$consulta["id_pro"];?>">
                    <i class="fa fa-fw fa-lg fa-close text-danger" title="Invalidar"></i>
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
              <p class="mb-1">R$<?php echo number_format($consulta["preco_pro"] / 100, 2, ',', ''); ?></p>
           
            
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
							
		

   <!-- inicio Modal Validar Pro-->	
  <div class="modal" id="modal_validar<?=$consulta["id_pro"];?>">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Validar produto</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span>×</span>
          </button>
        </div>
        <div class="modal-body">
          <p><b><?=$consulta["nome_pro"];?></b>
            <br>
          Tem certeza que deseja validar este produto do sistema ?</p>
        </div>
		 <form class="" method="post">
            <div class="form-group">
			<input type="text" style="display:none" name="id" maxlength="14" class="form-control"  value="<?=$consulta["id_pro"];?>">
			</div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="btnValidar">Validar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
		  </form>
        </div>
      </div>
    </div>
  </div>  

     <!-- inicio Modal Não Validar Pro-->	
  <div class="modal" id="modal_invalidar<?=$consulta["id_pro"];?>">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Não validar produto</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span>×</span>
          </button>
        </div>
        <div class="modal-body">
          <p><b><?=$consulta["nome_pro"];?></b>
            <br>
          Tem certeza que deseja não validar este produto do sistema ?</p>
        </div>
		 <form class="" method="post">
            <div class="form-group">
			<input type="text" style="display:none" name="id" maxlength="14" class="form-control"  value="<?=$consulta["id_pro"];?>">
			</div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="btnInvalidar">Não Validar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
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
	
	/*Código validar PRO*/
		if (isset($_POST['btnValidar'])) {
				
		$id_pro = $_POST['id'];
				
		if ($administrativoDAO->validarPro($id_pro)) {
		}
		?>
			<script type="text/javascript">
				alert("Produto validado com suscesso!");
				window.location = '?pagina=produtos';
			</script>
		<?php
	}

    /*Código invalidar PRO*/
    if (isset($_POST['btnInvalidar'])) {
        
    $id_pro = $_POST['id'];
        
    if ($administrativoDAO->invalidarPro($id_pro)) {
    }
    ?>
      <script type="text/javascript">
        alert("Produto invalidado com suscesso!");
        window.location = '?pagina=produtos';
      </script>
    <?php
  }
	
?>   