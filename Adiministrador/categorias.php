		<?php
			require_once("../Classes/DAO/AdministrativoDAO.php");
			require_once("../Classes/Entidades/categoria.php");
      require_once("../Classes/Entidades/marca.php");
			
			$administrativoDao = new AdministrativoDAO();
			$categoria = new Categoria();
      $marca = new Marca();
		?>
<div >
  <br>
</div> 

    <div class="section" id="listarCategorias">
        <div class="container">
            <div class="row ">
               <div class="col-md-3">
                  <h1>
                      <i class="fa fa-fw fa-users"></i>Categorias</h1>
               </div>
               <div class="col-md-3">
                      <div class="btn-group btn-group-justified"  style='float: right;'>
                         <button  class="btn btn-primary" data-toggle="modal" data-target="#modal_inserir" >
			                         <i class="fa fa-fw fa-plus"></i>Nova Categoria
			                   </button>
                       </div>
               </div>
               <div class="col-md-3">
                    <h1>
                        <i class="fa fa-fw fa-users"></i>Marcas</h1>
              </div>
              <div class="col-md-3">
                  <div class="btn-group btn-group-justified" style='float: right;'>
                      <button  class="btn btn-primary" data-toggle="modal" data-target="#modal_inserirMar">
                          <i class="fa fa-fw fa-plus"></i>Nova Marca
                      </button>
                  </div>
              </div>
        
            </div>
        </div>
    </div>


    <div class="section">
        <div class="container">
             <div class="row">
                  <div class="col-md-6">
                      <table class="table table-striped table-bordered" id="id_listarCategorias" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                    					<th>Categoria</th>
                    					<th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>


                        <?php
                        	foreach($administrativoDao->retornarInformacoesCAT() as $consulta ){
                        ?>
                            <tr>
                              <td><?=$consulta["nome_cat"];?></td>
                              <td>
      					                   <button type="button" data-toggle="modal" data-target="#modal_editar<?=$consulta["id_cat"];?>">
                                          <i class="fa fa-fw fa-lg fa-pencil text-warning" title="Editar"></i>
      					                   </button>
                          					<button type="button" data-toggle="modal" data-target="#modal_excluir<?=$consulta["id_cat"];?>">
                                          <i class="fa fa-fw fa-lg fa-trash-o text-danger" title="Desativar"></i>
                          					</button>
                              </td>
                            </tr>

               <!-- Inicio Modal nova categoria--> 
               <div class="modal" id="modal_inserir">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header" >
                        <h5 class="modal-title">Inserir categoria</h5>
                        <button type="button" class="close" data-dismiss="modal">
                          <span>×</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form class="" method="post">
                          <div class="form-group">
                            <label>Categoria</label>
                            <input type="text" class="form-control" name="txtNome" maxlength="40" required> </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="btnCadastrar">Cadastrar</button>
                    </form>
                      </div>
                    </div>
                  </div>
                </div> 
						
                <!-- Inicio Modal Editar ADM-->
                <div class="modal" id="modal_editar<?=$consulta["id_cat"];?>">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Editar Categoria</h5>
                          <button type="button" class="close" data-dismiss="modal">
                            <span>×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form class="" method="post">
                            <div class="form-group">
                			<input type="text" style="display:none" name="id" maxlength="14" class="form-control"  value="<?=$consulta["id_cat"];?>">
                              <label>Tipo</label>
                              <input type="text" class="form-control" maxlength="80" name="txtNome" value="<?=$consulta["nome_cat"];?>"> </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary" name="btnAlterar" >Alterar</button>
                		  </form>
                        </div>
                      </div>
                    </div>
                  </div>	

                   <!-- inicio Modal Excluir CAT-->	
                  <div class="modal" id="modal_excluir<?=$consulta["id_cat"];?>">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Excluir categoria</h5>
                          <button type="button" class="close" data-dismiss="modal">
                            <span>×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Tem certeza que deseja excluir esta categoria do sistema ?</p>
                        </div>
                		 <form class="" method="post">
                            <div class="form-group">
                			<input type="text" style="display:none" name="id" maxlength="14" class="form-control"  value="<?=$consulta["id_cat"];?>">
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
                </div> <!---->
                <div class="col-md-6">
                    <table class="table table-striped table-bordered" id="id_listarMarcas" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                              <th>Marca</th>
                              <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>


                        <?php
                          foreach($administrativoDao->retornarInformacoesMAR() as $consultaMar ){
                        ?>
                            <tr>
                              <td><?=$consultaMar["marca"];?></td>
                              <td>
                                   <button type="button" data-toggle="modal" data-target="#modal_editarMar<?=$consultaMar["id_marca"];?>">
                                          <i class="fa fa-fw fa-lg fa-pencil text-warning" title="Editar"></i>
                                   </button>
                                    <button type="button" data-toggle="modal" data-target="#modal_excluirMar<?=$consultaMar["id_marca"];?>">
                                          <i class="fa fa-fw fa-lg fa-trash-o text-danger" title="Excluir"></i>
                                    </button>
                              </td>
                            </tr>

               <!-- Inicio Modal nova categoria--> 
               <div class="modal" id="modal_inserirMar">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header" >
                        <h5 class="modal-title">Inserir Marca</h5>
                        <button type="button" class="close" data-dismiss="modal">
                          <span>×</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form class="" method="post">
                          <div class="form-group">
                            <label>Marca</label>
                            <input type="text" class="form-control" name="txtMarca" maxlength="40" required> </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="btnCadastrarMar">Cadastrar</button>
                    </form>
                      </div>
                    </div>
                  </div>
                </div> 
            
                <!-- Inicio Modal Editar ADM-->
                <div class="modal" id="modal_editarMar<?=$consultaMar["id_marca"];?>">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Editar Marca</h5>
                          <button type="button" class="close" data-dismiss="modal">
                            <span>×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form class="" method="post">
                            <div class="form-group">
                      <input type="text" style="display:none" name="id" maxlength="14" class="form-control"  value="<?=$consultaMar["id_marca"];?>">
                              <label>Tipo</label>
                              <input type="text" class="form-control" maxlength="80" name="txtMarca" value="<?=$consultaMar["marca"];?>"> </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary" name="btnAlterarMar" >Alterar</button>
                      </form>
                        </div>
                      </div>
                    </div>
                  </div>  

                   <!-- inicio Modal Excluir CAT--> 
                  <div class="modal" id="modal_excluirMar<?=$consultaMar["id_marca"];?>">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Excluir Marca</h5>
                          <button type="button" class="close" data-dismiss="modal">
                            <span>×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Tem certeza que deseja excluir esta marca do sistema ?</p>
                        </div>
                     <form class="" method="post">
                            <div class="form-group">
                      <input type="text" style="display:none" name="id" maxlength="14" class="form-control"  value="<?=$consultaMar["id_marca"];?>">
                      </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary" name="btnExcluirMar">Sim</button>
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
  		    $('#id_listarCategorias').DataTable({
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
      <script>
      $(document).ready(function(){
          $('#id_listarMarcas').DataTable({
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
/*Código Inserir CAT*/
	if (isset($_POST['btnCadastrar'])) {
				
					
		$nome_cat  = $_POST['txtNome'];
		$confereCat = $administrativoDao->existeCategoria($nome_cat);
		$categoria->setNome_cat($nome_cat);
		
		if($confereCat != 1){

			if ($administrativoDao->inserirCategoria($categoria)) {
			}
			?>
				<script type="text/javascript">
					alert("Categoria inserida com suscesso!");
					window.location = '?pagina=categorias';
				</script>
			<?php
		}else
			?>
				<script type="text/javascript">
					alert("Erro categoria já existente!");
					window.location = '?pagina=categorias';
				</script>
			<?php
	}
	
	
/*Código editar CAT*/				
	if (isset($_POST['btnAlterar'])) {
				
					
		$nome  = $_POST['txtNome'];
		$id_cat = $_POST['id'];
		
				
		if ($administrativoDao->alterarCat($id_cat, $nome)) {
		}
		?>
			<script type="text/javascript">
				alert("Categoria alterada com suscesso!");
				window.location = '?pagina=categorias';
			</script>
		<?php
	}
	
	
/*Código excluir CAT*/	
	if (isset($_POST['btnExcluir'])) {
				
		$id_cat = $_POST['id'];
				
		if ($administrativoDao->ecluirCat($id_cat)) {
		}
		?>
			<script type="text/javascript">
				alert("Categoria excluida com suscesso!");
				window.location = '?pagina=categorias';
			</script>
		<?php
	}


  /*Código Inserir MAR*/
  if (isset($_POST['btnCadastrarMar'])) {
        
          
    $marcas  = $_POST['txtMarca'];
    $confereMar = $administrativoDao->existeMarca($marcas);
    $marca->setMarca($marcas);
    
    if($confereMar != 1){

      if ($administrativoDao->inserirMarca($marca)) {
      }
      ?>
        <script type="text/javascript">
          alert("Marca inserida com suscesso!");
          window.location = '?pagina=categorias';
        </script>
      <?php
    }else
      ?>
        <script type="text/javascript">
          alert("Erro marca já existente!");
          window.location = '?pagina=categorias';
        </script>
      <?php
  }
  
  
/*Código editar MAR*/       
  if (isset($_POST['btnAlterarMar'])) {
        
          
    $marcas  = $_POST['txtMarca'];
    $id_marca = $_POST['id'];
    
        
    if ($administrativoDao->alterarMar($id_marca, $marcas)) {
    }
    ?>
      <script type="text/javascript">
        alert("Marca alterada com suscesso!");
        window.location = '?pagina=categorias';
      </script>
    <?php
  }
  
  
/*Código excluir MAR*/  
  if (isset($_POST['btnExcluirMar'])) {
        
    $id_marca = $_POST['id'];
        
    if ($administrativoDao->ecluirMar($id_marca)) {
    }
    ?>
      <script type="text/javascript">
        alert("Categoria excluida com suscesso!");
        window.location = '?pagina=categorias';
      </script>
    <?php
  }
	
?>   