<?php
	require_once("../Classes/DAO/AdministrativoDAO.php");
	require_once("../Classes/Entidades/Escola.php");
	require_once("../Classes/Entidades/Lista.php");
	require_once("../Classes/Entidades/Item.php");
			
	$administrativoDao = new AdministrativoDAO();
	$escola = new Escola();
	$lista = new Lista();
	$item = new Item();
?>
<script>
<!--Código botão add+-->
function Add(mostrar,esconder){

 var display = document.getElementById(mostrar, esconder).style.display;
 if(display == 'none') document.getElementById(mostrar, esconder).style.display = 'block';

}

</script>

 

<div class="container">
	<div class="row">
		<div class="col-12 mt-2">


					<!--Fazendo um acrodion-->
			<div id="accordion" role="tablist">

				<div class="card">
					<div class="card-header" role="tab" id="header1">
						<h5 class="mb-0">
							<a href="#colapso1" data-toggle="collapse" aria-expanded="false" aria-control="colapso1">
							Adicionar uma nova escola
							</a>
						</h5>
					</div>
					<div id="colapso1" class="collapse" role="tabpanel" aria-labelledby="header1" data-parent="#accordion">
						<div class="card-body">
							<div class="container">
      							<div class="row">
									<div class="col-md-6">
										<form class="form-inline" method="post">
			            					<label>Nome da Escola:</label>
			            						<input type="text" class="form-control ml-2 mr-2" name="txtEscola" required="required"> 
			            						<button class="btn btn-primary" type="submit" name="btnAddEscola">Adicionar</button>
										</form>
									</div>
									<div class="col-md-6">
										<table class="table table-striped table-bordered" id="id_listarCategorias" cellspacing="0" width="100%">
                        			<thead>
                            			<tr>
                    						<th>Escola</th>
                    						<th>Ações</th>
                            			</tr>
                        			</thead>
                        			<tbody>
			                        <?php
			                        	foreach($administrativoDao->retornarInformacoesEscola() as $consulta ){
			                        ?>
                            			<tr>
                              				<td><?=$consulta["nome_escola"];?></td>
                              				<td>
      					                   		<button type="button" data-toggle="modal" data-target="#modal_editar<?=$consulta["id_escola"];?>">
                                          			<i class="fa fa-fw fa-lg fa-pencil text-warning" title="Editar"></i>
      					                  		 </button>
                          						<button type="button" data-toggle="modal" data-target="#modal_excluir<?=$consulta["id_escola"];?>">
                                          			<i class="fa fa-fw fa-lg fa-trash-o text-danger" title="Desativar"></i>
                          						</button>
                              				</td>
                            			</tr>
						
                						<!-- Inicio Modal Editar ADM-->
                						<div class="modal" id="modal_editar<?=$consulta["id_escola"];?>">
						                    <div class="modal-dialog" role="document">
						                      <div class="modal-content">
						                        <div class="modal-header">
						                          <h5 class="modal-title">Editar Escola</h5>
						                          <button type="button" class="close" data-dismiss="modal">
						                            <span>×</span>
						                          </button>
						                        </div>
						                        <div class="modal-body">
						                          <form class="" method="post">
						                            <div class="form-group">
						                			<input type="text" style="display:none" name="id" maxlength="14" class="form-control"  value="<?=$consulta["id_escola"];?>">
						                              <label>Nome da Escola</label>
						                              <input type="text" class="form-control" maxlength="100" name="txtEscola" value="<?=$consulta["nome_escola"];?>"> </div>
						                        </div>
						                        <div class="modal-footer">
						                          <button type="submit" class="btn btn-primary" name="btnAlterar" >Alterar</button>
						                		  </form>
						                        </div>
						                      </div>
						                    </div>
						                  </div>	

						                   <!-- inicio Modal Excluir CAT-->	
						                  <div class="modal" id="modal_excluir<?=$consulta["id_escola"];?>">
						                    <div class="modal-dialog" role="document">
						                      <div class="modal-content">
						                        <div class="modal-header">
						                          <h5 class="modal-title">Excluir Escola</h5>
						                          <button type="button" class="close" data-dismiss="modal">
						                            <span>×</span>
						                          </button>
						                        </div>
						                        <div class="modal-body">
						                          <p>Tem certeza que deseja excluir esta escola do sistema ?</p>
						                        </div>
						                		 <form class="" method="post">
						                            <div class="form-group">
						                			<input type="text" style="display:none" name="id" maxlength="14" class="form-control"  value="<?=$consulta["id_escola"];?>">
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
				</div>



				<div class="card-header" role="tab" id="header2">
					<h5 class="mb-0">
						<a href="#colapso2" data-toggle="collapse" aria-expanded="false" aria-control="colapso1">
							Criar Lista
						</a>
					</h5>
				</div>
				<div id="colapso2" class="collapse" role="tabpane2" aria-labelledby="header2" data-parent="#accordion">
					<div class="card-body">
						<div class="container">
      						<div class="row">
								<div class="col-md-12">
									<form class="form-inline" method="post">
			           					<label class="mr-2">Escola:</label>
						                	<select class="form-control custom-select" name="selEscola">
						                    	<option value="">SELECIONE</option>
							              		<?php
													foreach($administrativoDao->retornarInformacoesEscola() as $consultaEscola ){
												?>
												<option value="<?=$consultaEscola["id_escola"];?>"><?=$consultaEscola["nome_escola"];?></option>
													<?php
														}
													?>
						                  	</select>
						                  	<label class="mr-2 ml-2">Ensino:</label>
						                 	<select class="form-control custom-select" name="selEnsino">
						                 		<option value="">SELECIONE</option>
								                <option>Infantil</option>
								                <option>Fundamental</option>
								            	<option>Médio</option>
						                  	</select>
						                  	<label class="mr-2 ml-2">Ano:</label>
						                  	<select class="form-control custom-select" name="selAno" required="required">
						                  		<option value="">SELECIONE</option>
												<option>Martenal</option>
								                <option>Pré Escola</option>
								                <option>1º Ano Fundamental</option>
								                <option>2º Ano Fundamental</option>
								                <option>3º Ano Fundamental</option>
								                <option>4º Ano Fundamental</option>
								                <option>5º Ano Fundamental</option>
								                <option>6º Ano Fundamental</option>
								                <option>7º Ano Fundamental</option>
								                <option>8º Ano Fundamental</option>
								                <option>9º Ano Fundamental</option>
								                <option>1º Ano Médio</option>
								                <option>2º Ano Médio</option>
								                <option>3º Ano Médio</option>
						                  	</select>
						                  	<button class="btn btn-primary ml-2" type="submit" name="btnAddLista">
						                  		Criar
						                  	</button>
									</form> 
								</div>
							</div>
						</div>
					</div>
				</div>





				<div class="card-header" role="tab" id="header3">
					<h5 class="mb-0">
						<a href="#colapso3"  data-toggle="collapse" aria-expanded="true" aria-control="colapso3">
							Cadastrar Produtos
						</a>
					</h5>
				</div>
				<div id="colapso3" class="collapse show" role="tabpanel" aria-labelledby="header3" data-parent="#accordion">
					<div class="card-body">
    					<div class="container">

    						<form class="" method="post">

     							<div class="row">
        							<div class="col-md-6">
        	 							<div class="form-group mr-2">
						            	    <label>Lista</label>
						                	<select class="custom-control custom-select" name="selLista" required="required">
						                    	<option value="">SELECIONE</option>
							              		<?php
													foreach($administrativoDao->retornarLista() as $consultaLista ){
												?>
												<option value="<?=$consultaLista["id_lista"];?>">
													<?=$consultaLista["nome_escola"];?> 
													<?=$consultaLista["ensino"];?>
													<?=$consultaLista["ano"];?>
													</option>
													<?php
														}
													?>
						                  	</select>
						                </div>
        							</div>
       						 	</div>


	      						<div class="row">
	        						<div class="col-md-12">
	          							<div class="row" id="origem">
	            							<div class="col-md-6">
	            								<div class="form-group">
								            		<label for="exampleInputEmail1">Produto</label>
								              		<select class="custom-control custom-select" name="selProduto1" required="required">
								              			<option value="">SELECIONE</option>
								              			<?php
															foreach($administrativoDao->retornarInformacoesCAT() as $consultaEscola ){
														?>
														<option value="<?=$consultaEscola["id_cat"];?>"><?=$consultaEscola["nome_cat"];?></option>
														<?php
															}
														?>
								               		</select>
								            	</div>
								        	</div>
									        <div class="col-md-2">       		
									            <div class="form-group">
									               	<label for="exampleInputEmail1">Quantidade</label>
									               	<input type="number" class="form-control" name="selQuantidade1" required="required">
									            </div>
									        </div>
									        <div class="col-md-4">
		            							<button type="button" class="btn btn-primary mt-4 btn-block" onclick="Add(1)">+ Produto</button>
		            						</div>     	
	            						</div>
	            					</div>
	            				</div>

	            				<div class="row" id="1" style="display: none;">
	        						<div class="col-md-12">
	            						<div class="row" >
	            							<div class="col-md-6">
	            								<div class="form-group">
								            		<label for="exampleInputEmail1">Produto</label>
								              			<select class="custom-control custom-select" name="selProduto2">
								              				<option value="">SELECIONE</option>
								              				<?php
															foreach($administrativoDao->retornarInformacoesCAT() as $consultaEscola ){
															?>
															<option value="<?=$consultaEscola["id_cat"];?>"><?=$consultaEscola["nome_cat"];?></option>
															<?php
																}
															?>
								               			</select>
								            	</div>
								        	</div>
									        <div class="col-md-2">       		
									            <div class="form-group">
									               	<label for="exampleInputEmail1">Quantidade</label>
									               	<input type="number" class="form-control" name="selQuantidade2">
									            </div>
									        </div>
									        <div class="col-md-4">
		            							<button type="button" class="btn btn-primary mt-4 btn-block" onclick="Add(2)">+ Produto</button>
		            						</div>     	
	            						</div>
	          						</div>
	          					</div>

		          				<div class="row" id="2" style="display: none;">
		        					<div class="col-md-12">
		            					<div class="row" >
		            						<div class="col-md-6">
		            							<div class="form-group">
									            	<label for="exampleInputEmail1">Produto</label>
									              	<select class="custom-control custom-select" name="selProduto3">
										            	<option value="">SELECIONE</option>
										            	<?php
															foreach($administrativoDao->retornarInformacoesCAT() as $consultaEscola ){
														?>
														<option value="<?=$consultaEscola["id_cat"];?>"><?=$consultaEscola["nome_cat"];?></option>
														<?php
															}
														?>
									               	</select>
									            </div>
									        </div>
									        <div class="col-md-2">       		
									            <div class="form-group">
									               	<label for="exampleInputEmail1">Quantidade</label>
									               		<input type="number" class="form-control" name="selQuantidade3">
									            </div>
									        </div>
									        <div class="col-md-4">
		            							<button type="button"  class="btn btn-primary mt-4 btn-block" onclick="Add(3)">+ Produto</button>
		            						</div>     	
		            					</div>
		          					</div>
		          				</div>

		          				<div class="row" id="3" style="display: none;">
		        					<div class="col-md-12">
		            					<div class="row" >
		            						<div class="col-md-6">
		            							<div class="form-group">
									            	<label for="exampleInputEmail1">Produto</label>
									              		<select class="custom-control custom-select" name="selProduto4">
									              			<option value="">SELECIONE</option>
									              			<?php
																foreach($administrativoDao->retornarInformacoesCAT() as $consultaEscola ){
															?>
															<option value="<?=$consultaEscola["id_cat"];?>"><?=$consultaEscola["nome_cat"];?></option>
															<?php
																}
															?>
									               		</select>
									            </div>
									        </div>
									        <div class="col-md-2">       		
									            <div class="form-group">
									               	<label for="exampleInputEmail1">Quantidade</label>
									               		<input type="number" class="form-control" name="selQuantidade4">
									            </div>
									        </div>
									        <div class="col-md-4">
		            							<button type="button" class="btn btn-primary mt-4 btn-block" onclick="Add(4)">+ Produto</button>
		            						</div>     	
		            					</div>
		          					</div>
		          				</div>

		          				<div class="row" id="4" style="display: none;">
		        					<div class="col-md-12">
		            					<div class="row" >
		            						<div class="col-md-6">
		            							<div class="form-group">
									            	<label for="exampleInputEmail1">Produto</label>
									              	<select class="custom-control custom-select" name="selProduto5">
									              		<option value="">SELECIONE</option>
									              		<?php
															foreach($administrativoDao->retornarInformacoesCAT() as $consultaEscola ){
														?>
														<option value="<?=$consultaEscola["id_cat"];?>"><?=$consultaEscola["nome_cat"];?></option>
														<?php
															}
														?>
									               	</select>
									            </div>
									        </div>
									        <div class="col-md-2">       		
									            <div class="form-group">
									               	<label for="exampleInputEmail1">Quantidade</label>
									               		<input type="number" class="form-control" name="selQuantidade5">
									            </div>
									        </div>
									        <div class="col-md-4">
		            							<button type="button"  class="btn btn-primary mt-4 btn-block" onclick="Add(5)">+ Produto</button>
		            						</div>     	
		            					</div>
		          					</div>
		          				</div>

		          				<div class="row" id="5" style="display: none;">
		        					<div class="col-md-12">
		            					<div class="row" >
		            						<div class="col-md-6">
		            							<div class="form-group">
									            	<label for="exampleInputEmail1">Produto</label>
									              	<select class="custom-control custom-select" name="selProduto6" >
									              		<option value="">SELECIONE</option>
									              		<?php
															foreach($administrativoDao->retornarInformacoesCAT() as $consultaEscola ){
														?>
														<option value="<?=$consultaEscola["id_cat"];?>"><?=$consultaEscola["nome_cat"];?></option>
														<?php
															}
														?>
									               	</select>
									            </div>
									        </div>
									        <div class="col-md-2">       		
									            <div class="form-group">
									               	<label for="exampleInputEmail1">Quantidade</label>
									               		<input type="number" class="form-control" name="selQuantidade6">
									            </div>
									        </div>
									        <div class="col-md-4">
		            							<button type="button"  class="btn btn-primary mt-4 btn-block" onclick="Add(6)">+ Produto</button>
		            						</div>     	
		            					</div>
		          					</div>
		          				</div>

		          				<div class="row" id="6" style="display: none;">
		        					<div class="col-md-12">
		            					<div class="row" >
		            						<div class="col-md-6">
		            							<div class="form-group">
									            	<label for="exampleInputEmail1">Produto</label>
									              	<select class="custom-control custom-select" name="selProduto7">
									              		<option value="">SELECIONE</option>
									              		<?php
															foreach($administrativoDao->retornarInformacoesCAT() as $consultaEscola ){
														?>
														<option value="<?=$consultaEscola["id_cat"];?>"><?=$consultaEscola["nome_cat"];?></option>
														<?php
															}
														?>
									               	</select>
									            </div>
									        </div>
									        <div class="col-md-2">       		
									            <div class="form-group">
									               	<label for="exampleInputEmail1">Quantidade</label>
									               		<input type="number" class="form-control" name="selQuantidade7">
									            </div>
									        </div>
									        <div class="col-md-4">
		            							<button type="button"  class="btn btn-primary mt-4 btn-block" onclick="Add(7)">+ Produto</button>
		            						</div>     	
		            					</div>
		          					</div>
		          				</div>

		          				<div class="row" id="7" style="display: none;">
		        					<div class="col-md-12">
		            					<div class="row" >
		            						<div class="col-md-6">
		            							<div class="form-group">
									            	<label for="exampleInputEmail1">Produto</label>
									              	<select class="custom-control custom-select" name="selProduto8">
									              		<option value="">SELECIONE</option>
									              		<?php
															foreach($administrativoDao->retornarInformacoesCAT() as $consultaEscola ){
														?>
														<option value="<?=$consultaEscola["id_cat"];?>"><?=$consultaEscola["nome_cat"];?></option>
														<?php
															}
														?>
									               	</select>
									            </div>
									        </div>
									        <div class="col-md-2">       		
									            <div class="form-group">
									               	<label for="exampleInputEmail1">Quantidade</label>
									               		<input type="number" class="form-control" name="selQuantidade8">
									            </div>
									        </div>
									        <div class="col-md-4">
		            							<button type="button"  class="btn btn-primary mt-4 btn-block" onclick="Add(8)">+ Produto</button>
		            						</div>     	
		            					</div>
		          					</div>
		          				</div>

		          				<div class="row" id="8" style="display: none;">
		        					<div class="col-md-12">
		            					<div class="row" >
		            						<div class="col-md-6">
		            							<div class="form-group">
									            	<label for="exampleInputEmail1">Produto</label>
									              	<select class="custom-control custom-select" name="selProduto9">
									              		<option value="">SELECIONE</option>
									              		<?php
															foreach($administrativoDao->retornarInformacoesCAT() as $consultaEscola ){
														?>
														<option value="<?=$consultaEscola["id_cat"];?>"><?=$consultaEscola["nome_cat"];?></option>
														<?php
															}
														?>
									               	</select>
									            </div>
									        </div>
									        <div class="col-md-2">       		
									            <div class="form-group">
									               	<label for="exampleInputEmail1">Quantidade</label>
									               		<input type="number" class="form-control" name="selQuantidade9">
									            </div>
									        </div>
									        <div class="col-md-4">
		            							<button type="button"  class="btn btn-primary mt-4 btn-block" onclick="Add(9)">+ Produto</button>
		            						</div>     	
		            					</div>
		          					</div>
		          				</div>

		          				<div class="row" id="9" style="display: none;">
		        					<div class="col-md-12">
		            					<div class="row" >
		            						<div class="col-md-6">
		            							<div class="form-group">
									            	<label for="exampleInputEmail1">Produto</label>
									              	<select class="custom-control custom-select" name="selProduto10">
									              		<option value="">SELECIONE</option>
									              		<?php
															foreach($administrativoDao->retornarInformacoesCAT() as $consultaEscola ){
														?>
														<option value="<?=$consultaEscola["id_cat"];?>"><?=$consultaEscola["nome_cat"];?></option>
														<?php
															}
														?>
									               	</select>
									            </div>
									        </div>
									        <div class="col-md-2">       		
									            <div class="form-group">
									               	<label for="exampleInputEmail1">Quantidade</label>
									               		<input type="number" class="form-control" name="selQuantidade10">
									            </div>
									        </div>
									        <div class="col-md-4">
		            							<button type="button"  class="btn btn-primary mt-4 btn-block" onclick="Add(10)">+ Produto</button>
		            						</div>     	
		            					</div>
		          					</div>
		          				</div>

		          				<div class="row" id="10" style="display: none;">
		        					<div class="col-md-12">
		            					<div class="row" >
		            						<div class="col-md-6">
		            							<div class="form-group">
									            	<label for="exampleInputEmail1">Produto</label>
									              	<select class="custom-control custom-select" name="selProduto">
									              		<option value="">SELECIONE</option>
									              		<?php
															foreach($administrativoDao->retornarInformacoesCAT() as $consultaEscola ){
														?>
														<option value="<?=$consultaEscola["id_cat"];?>"><?=$consultaEscola["nome_cat"];?></option>
														<?php
															}
														?>
									               	</select>
									            </div>
									        </div>
									        <div class="col-md-2">       		
									            <div class="form-group">
									               	<label for="exampleInputEmail1">Quantidade</label>
									               		<input type="number" class="form-control" name="selQuantidade">
									            </div>
									        </div>
									        <div class="col-md-4">
		            							<button type="button"  style="display: block;" class="btn btn-primary mt-4 btn-block" onclick="Add()">+ Produto</button>
		            						</div>     	
		            					</div>
		          					</div>
		          				</div>

								<div class="row">
		        					<div class="col-md-12">
		            					<div class="row" >
		            						<div class="col-md-4">
		            							<button type="submit" class="btn btn-primary btn-block" name="btnLista">Salvar Lista</button>
		            						</div>     	
		            					</div>
		          					</div>
		          				</div>

     					 	</form>

        				</div>
      				</div>
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

/*Código Inserir Escola*/
	if (isset($_POST['btnAddEscola'])) {
				
					
		$nome_escola  = $_POST['txtEscola'];
		$confere_escola = $administrativoDao->existeEscola($nome_escola);
		$escola->setNome_escola($nome_escola);
		
		if($confere_escola != 1){

			if ($administrativoDao->inserirEscola($escola)) {
			}
			?>
				<script type="text/javascript">
					alert("Escola inserida com suscesso!");
					window.location = '?pagina=cadastrar_lista';
				</script>
			<?php
		}else
			?>
				<script type="text/javascript">
					alert("Erro Escola já cadastrada!");
					window.location = '?pagina=cadastrar_lista';
				</script>
			<?php
	}


/*Código editar CAT*/				
	if (isset($_POST['btnAlterar'])) {
				
					
		$nome_escola  = $_POST['txtEscola'];
		$id_escola = $_POST['id'];
		
				
		if ($administrativoDao->alterarEscola($id_escola, $nome_escola)) {
		}
		?>
			<script type="text/javascript">
				alert("Escola alterada com suscesso!");
				window.location = '?pagina=cadastrar_lista';
			</script>
		<?php
	}
	
	
/*Código excluir Escola*/	
	if (isset($_POST['btnExcluir'])) {
				
		$id_escola = $_POST['id'];
				
		if ($administrativoDao->ecluirEscola($id_escola)) {
		}
		?>
			<script type="text/javascript">
				alert("escola excluida com suscesso!");
				window.location = '?pagina=cadastrar_lista';
			</script>
		<?php
	}

/*Código Criar Lista*/
	if (isset($_POST['btnAddLista'])) {
				
					
		$nome_escola  = $_POST['selEscola'];
		$ensino  = $_POST['selEnsino'];
		$ano  = $_POST['selAno'];

		$confere_lista = $administrativoDao->existeLista($nome_escola, $ensino, $ano);

		$lista->setEscola($nome_escola);
		$lista->setEnsino($ensino);
		$lista->setAno($ano);
		
		if($confere_lista != 1){

			if ($administrativoDao->inserirLista($lista)) {
			}
			?>
				<script type="text/javascript">
					alert("Lista criada com suscesso!");
					window.location = '?pagina=cadastrar_lista';
				</script>
			<?php
		}else
			?>
				<script type="text/javascript">
					alert("Erro lista já criada!");
					window.location = '?pagina=cadastrar_lista';
				</script>
			<?php
	}


	/*Código Salvar Lista*/
	if (isset($_POST['btnLista'])) {

					
		$list = $_POST['selLista'];

		$produto1  = $_POST['selProduto1'];
		$quantidade1  = $_POST['selQuantidade1'];

		$produto2  = $_POST['selProduto2'];
		$quantidade2  = $_POST['selQuantidade2'];

		$produto3  = $_POST['selProduto3'];
		$quantidade3  = $_POST['selQuantidade3'];

		$produto4  = $_POST['selProduto4'];
		$quantidade4  = $_POST['selQuantidade4'];

		$produto5  = $_POST['selProduto5'];
		$quantidade5  = $_POST['selQuantidade5'];

		$produto6  = $_POST['selProduto6'];
		$quantidade6  = $_POST['selQuantidade6'];

		$produto7  = $_POST['selProduto7'];
		$quantidade7  = $_POST['selQuantidade7'];

		$produto8  = $_POST['selProduto8'];
		$quantidade8  = $_POST['selQuantidade8'];

		$produto9  = $_POST['selProduto9'];
		$quantidade9  = $_POST['selQuantidade9'];

		$produto10  = $_POST['selProduto10'];
		$quantidade10  = $_POST['selQuantidade10'];

	


		
		if($quantidade1 != 0){

			$item->setItem($produto1);
			$item->setQuantidade_item($quantidade1);
			$item->setFk_item_lista($list);

			$administrativoDao->inserirItem($item);

		}	
			


		if($quantidade2 != 0){
	
			$item->setItem($produto2);
			$item->setQuantidade_item($quantidade2);
			$item->setFk_item_lista($list);

			$administrativoDao->inserirItem($item);

		}

		if($quantidade3 != 0){
	
			$item->setItem($produto3);
			$item->setQuantidade_item($quantidade3);
			$item->setFk_item_lista($list);

			$administrativoDao->inserirItem($item);

		}

		if($quantidade4 != 0){
	
			$item->setItem($produto4);
			$item->setQuantidade_item($quantidade4);
			$item->setFk_item_lista($list);

			$administrativoDao->inserirItem($item);

		}

		if($quantidade5 != 0){
	
			$item->setItem($produto5);
			$item->setQuantidade_item($quantidade5);
			$item->setFk_item_lista($list);

			$administrativoDao->inserirItem($item);

		}

		if($quantidade6 != 0){

			$item->setItem($produto6);
			$item->setQuantidade_item($quantidade6);
			$item->setFk_item_lista($list);

			$administrativoDao->inserirItem($item);

		}

		if($quantidade7 != 0){

			$item->setItem($produto7);
			$item->setQuantidade_item($quantidade7);
			$item->setFk_item_lista($list);

			$administrativoDao->inserirItem($item);

		}

		if($quantidade8 != 0){

			$item->setItem($produto8);
			$item->setQuantidade_item($quantidade8);
			$item->setFk_item_lista($list);

			$administrativoDao->inserirItem($item);

		}

		if($quantidade9 != 0){

			$item->setItem($produto9);
			$item->setQuantidade_item($quantidade9);
			$item->setFk_item_lista($list);

			$administrativoDao->inserirItem($item);

		}

		if($quantidade10 != 0){
	
			$item->setItem($produto10);
			$item->setQuantidade_item($quantidade10);
			$item->setFk_item_lista($list);

			$administrativoDao->inserirItem($item);

		}


			?>
				<script type="text/javascript">
					alert("Lista salva com suscesso!");
					window.location = '?pagina=cadastrar_lista';
				</script>
			<?php
	}

?>

