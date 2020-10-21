<?php
			require_once("../Classes/DAO/PapelariaDAO.php");
			require_once("../Classes/Entidades/Produto.php");
			require_once("../Classes/upLoad.php");
			
			$papelariaDAO = new PapelariaDAO();
			$produto = new Produto();
			$upLoad = new upLoad();
		?>

<body>
  	<div class="py-5">
    	<div class="container">
      		<div class="row">
        		<div class="col-md-12">
				<h1 class="">Adicionar Produto</h1>
	          	<div class="row">
	            	<div class="col-md-4">
	              		<form class="" method="post" enctype="multipart/form-data">
	                		<div class="form-group">
	                  			<label>Produto</label>
	                  			<input type="text" class="form-control" name="txtProduto" required="required" maxlength="80">
	              			</div>
	                		<div class="form-group">
	                  			<label>Categoria</label>
	                  			<select class="custom-control custom-select" name="txtCategoria" required="required">
	                  				<option value="">SELECIONE</option>
	                  		<?php
								foreach($papelariaDAO->retornarInfoCAT() as $consultaCat ){
									
							?>
                                  <option value="<?=$consultaCat["id_cat"];?>"><?=$consultaCat["nome_cat"];?></option>
							<?php
								}
							?>
	                  			</select>
	              			</div>
	              			<div class="form-group">
	                  			<label>Marca</label>
	                  			<select class="custom-control custom-select" name="txtMarca" required="required">
	                    			<option value="">SELECIONE</option>
	                    	<?php
								foreach($papelariaDAO->retornarInfoMAR() as $consultaMar ){
									
							?>
                                  <option value="<?=$consultaMar["id_marca"];?>"><?=$consultaMar["marca"];?></option>
							<?php
								}
							?>
	                  			</select>
	              			</div>
	            	</div>
	            	<div class="col-md-4">
	              		<div class="col-md-12">
	                		<div class="form-group">
	                			<label>Preço</label>
	                			<input type="text" class="form-control" name="txtPreco" required="required" maxlength="10" onKeyPress="return(moeda(this,'.',',',event))"> 
	                		</div>
	                		<div class="form-group">
	                  			<label>Descrição</label>
	                  			<textarea  class="form-control" name="txtInfo" required="required" rows="10"></textarea> 	 
	              			</div>
	            		</div>
	            	</div>
	            	<div class="col-md-4">
	              		<div class="col-md-12">
	                		<div class="form-group">
	                  			<label>Quantidade</label>
	                  			<input id="cep" type="number" class="form-control" name="txtQuantidade" required="required"> 
	                  		</div>
	                		<div class="form-group">
	                 			<label>Imagem</label>
	                  			<input type="file" class="form-control-file" name="txtImagem" multiple>
	                		</div>
	              		</div>
	            	</div>
	          	</div>
	          	<div class="row">
	            	<div class="col-md-12">
	              		<div class="row">
	                		<div class="col-md-3">
	                  			<div class="row">
	                   				<div class="col-md-12">
	                      				<a class="btn btn-danger" href="?pagina=produtos">Cancelar </a>
	                      				<button type="submit" class="btn btn-primary" name="btnCadastrar">Salvar</button>
						</form>
	                    			</div>
	                  			</div>
	                		</div>
	              		</div>
	            	</div>
          		</div>
        	</div>
      	</div>
    </div>
</body>

<?php
/*Código verifica e cadastra produtor*/
	if (isset($_POST['btnCadastrar'])) {


	
		$nome  = $_POST['txtProduto'];
		$categoria = ($_POST['txtCategoria']);
		$marca = ($_POST['txtMarca']);
		$preco = ($_POST['txtPreco']);
		$informacao  = $_POST['txtInfo'];
		$quantidade  = $_POST['txtQuantidade'];
		$imagem = $upLoad->upLoadFile($_FILES['txtImagem'], "../upImagem/", ".jpg");
		$id_usu = $_SESSION['id_usu'];
		
		$produto->setNome_pro($nome);
		$produto->setPreco_pro($preco);
		$produto->setImagem_pro($imagem);
		$produto->setInfo_pro($informacao);
		$produto->setQuant_pro($quantidade);
		$produto->setFk_categoria_pro($categoria);
		$produto->setFk_usuario_pro($id_usu);
		$produto->setFk_marca_pro($marca);

							
		if ($papelariaDAO->cadastrarProduto($produto)) {
						

			?>
				<script type="text/javascript">
					alert("Produto cadastrado com sucesso!");
					window.location = '?pagina=cadastrar_pro';
				</script>
			<?php
		} else {
			?>
				<script type="text/javascript">
					alert("Erro ao cadastrar produto!");
					window.location = '?pagina=cadastrar_pro';
					</script>
			<?php
				}			
	}
?>
