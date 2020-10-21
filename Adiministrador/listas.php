		<?php
			require_once("../Classes/DAO/AdministrativoDAO.php");
			
			$administrativoDao = new AdministrativoDAO();
		?>
<div >
  <br>
</div> 
    <div class="section" id="listarAdministradores">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h1>
              <i class="fa fa-fw fa-users"></i>Listas de Materiais</h1>
          </div>
          <div class="col-md-6">
            <div class="btn-group btn-group-justified">
              <a href='?pagina=cadastrar_lista' class="btn btn-primary"><i class="fa fa-fw fa-plus"></i>Nova Lista</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <table class="table table-striped table-bordered" id="id_listarAdministradores" cellspacing="0" width="100%">
              <thead>
                <tr>
					<th>Escola</th>
					<th>Ensino</th>
					<th>Ano</th>
          <th>Ações</th>

                </tr>
              </thead>
              <tbody>
<?php
	foreach($administrativoDao->retornarLista() as $consulta ){
?>
                <tr>
				          <td><?=$consulta['nome_escola'];?></td>
                  <td><?=$consulta['ensino'];?></td> 
                  <td><?=$consulta['ano'];?></td>
                  <td>
                    <button type="button" data-toggle="modal" data-target="#modal_visualizar<?=$consulta["id_lista"];?>">
					           <i class="fa fa-eye fa-fw fa-lg text-primary" title="Vizualizar" ></i>
					           </button>

					          <button type="button" data-toggle="modal" data-target="#modal_desativar<?=$consulta["id_lista"];?>">
                      <i class="fa fa-fw fa-lg fa-trash-o text-danger" title="Desativar"></i>
					          </button>
                  </td>
                </tr>

 <!-- Inicio Modal Vizualisar ADM--> 
  <div class="modal" id="modal_visualizar<?=$consulta["id_lista"];?>">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Visualizar Lista</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span>×</span>
          </button>
        </div>
        <div class="modal-body">
          <p><?=$consulta['nome_escola'];?> <?=$consulta['ensino'];?> <?=$consulta['ano'];?></p>

                <ul  class="list-group">
                  <li class="list-group-item d-flex justify-content-between align-items-center" >
                   <p>Item</p>  <p>Qauntidade</p>
                  </li>
            <?php
              foreach($administrativoDao->retornarListaCompleta($consulta["id_lista"]) as $listaCompleta ){
            ?>
             <li class="list-group-item d-flex justify-content-between align-items-center" >
                <p><?php echo $listaCompleta['nome_cat']; ?></p> <p><?php echo $listaCompleta['quantidade_item']; ?></p>
              </li>
           <?php
              }
            ?>
            </ul>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Fim Modal Visualizar ADM-->
				
				
						

   <!-- inicio Modal Desativar ADM-->	
  <div class="modal" id="modal_desativar<?=$consulta["id_lista"];?>">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Excluir Lista</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span>×</span>
          </button>
        </div>
        <div class="modal-body">
          <p><?=$consulta['nome_escola'];?> <?=$consulta['ensino'];?> <?=$consulta['ano'];?></p>
          </br>
          <p>Tem certeza que deseja desativar este administrador do sistema ?</p>
        </div>
    		<form class="" method="post">
          <div class="form-group">
    		    <input type="text" style="display:none" name="id" maxlength="14" class="form-control"  value="<?=$consulta["id_lista"];?>">
    			</div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger" name="btnDesativar">Sim</button>
              <button type="button" class="btn btn-primary" data-dismiss="modal">Não</button>
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
  		    $('#id_listarAdministradores').DataTable({
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

		if (isset($_POST['btnDesativar'])) {
				
		$id_lista = $_POST['id'];
				
		if ($administrativoDao->excluirItem($id_lista)) {
		}
    if ($administrativoDao->excluirLista($id_lista)) {
    }
		?>
			<script type="text/javascript">
				alert("Lista excluida com suscesso!");
				window.location = '?pagina=listas';
			</script>
		<?php
	}
	
?>   