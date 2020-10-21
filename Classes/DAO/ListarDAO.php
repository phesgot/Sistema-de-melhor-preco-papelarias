			
<?php
	
	require_once("Classes/Conexao.php");
	

	class ListarDAO { 
		
			function __construct() {
				$this->con = new Conexao();
				$this->pdo = $this->con->Connect();
			}
			
			
			public function retornarInformacoes() {
				try {

					$stmt = $this->pdo->prepare("
						SELECT produto.id_pro, produto.nome_pro, produto.preco_pro, produto.imagem_pro, 
								usuario.nome_usu
						FROM produto, usuario
						WHERE produto.fk_usuario_pro = usuario.id_usu
						order by rand()");
					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}
			
			public function viewAnuncio($id_produto) {
				try {
					
					$stmt = $this->pdo->prepare("SELECT produto.id_pro, produto.nome_pro, produto.preco_pro, produto.imagem_pro, produto.info_pro, 
								usuario.nome_usu,
								marca.marca
								 FROM produto, usuario, marca
								 WHERE produto.id_pro = :id_produto and produto.fk_usuario_pro = usuario.id_usu and produto.fk_marca_pro = marca.id_marca");
					
					$param = array( ":id_produto" => $id_produto);
					
					$stmt->execute($param);
					
					return $stmt->fetch(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}
			
			
/***************************************************Retorno de informaçãoe ao filtro de pesquisa e buscador***************************************************/			
			
												/*****************Retorno buscador*****************/
			public function retornarInformacoes1($info) {
				try {

					$stmt = $this->pdo->prepare("
						SELECT produto.id_pro, produto.nome_pro, produto.preco_pro, produto.imagem_pro, 
								usuario.nome_usu
						FROM produto, usuario
						WHERE produto.nome_pro LIKE '$info%' and produto.fk_usuario_pro = usuario.id_usu");
					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}

			
												/***************Retorno filtro por Categoria*****************/
			public function retornarInformacoes2($info1, $info2) {
				if($info2 == null){
				try {
				

					$stmt = $this->pdo->prepare("SELECT produto.id_pro, produto.nome_pro, produto.preco_pro, produto.imagem_pro, 
												usuario.nome_usu
												FROM produto, usuario
												WHERE 
												produto.fk_usuario_pro = usuario.id_usu and produto.fk_categoria_pro = '$info1' ");
					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
				}
											/***************Retorno filtro por Papelaria*****************/
				if($info1 == null){
				try {
				
					$stmt = $this->pdo->prepare("SELECT produto.id_pro, produto.nome_pro, produto.preco_pro, produto.imagem_pro, 
												usuario.nome_usu
												FROM produto, usuario
												WHERE 
												produto.fk_usuario_pro = usuario.id_usu and produto.fk_usuario_pro = '$info2' ");
					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
				}
											/***************Retorno filtro por categoria e papelaria*****************/
				if($info1 != null && $info2 != null){
				try {
				
					$stmt = $this->pdo->prepare("SELECT produto.id_pro, produto.nome_pro, produto.preco_pro, produto.imagem_pro, 
												usuario.nome_usu
												FROM produto, usuario
												WHERE 
												produto.fk_usuario_pro = usuario.id_usu  
												and produto.fk_usuario_pro = '$info2' 
												and produto.fk_categoria_pro = '$info1' ");
					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
				}
			}

/*********************************************************RETORNO LISTA*********************************************/

			public function retornarInformacoes3($info3) {
				try {

					$stmt = $this->pdo->prepare("
						SELECT item.item, item.quantidade_item, produto.imagem_pro, produto.nome_pro, produto.preco_pro, usuario.nome_usu 
FROM item, produto, usuario 
WHERE item.fk_item_lista = '8' and item.item = produto.fk_categoria_pro  and produto.fk_usuario_pro = usuario.id_usu and produto.preco_pro = (SELECT MIN(produto.preco_pro) FROM produto WHERE  produto.fk_categoria_pro = item.item)");
					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}



				/***************Listar Papelarias*****************/
			public function ListarPapelarias() {
				try {

					$stmt = $this->pdo->prepare("
						SELECT nome_usu, email_usu, telefone_usu, endereco, bairro, cidade, estado, cep
						FROM usuario, endereco
						WHERE tipo_usu = 2 and status_usu = 1 and id_usu = fk_usuario");
					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}



			public function retornarCategorias() {
				try {

					$stmt = $this->pdo->prepare("SELECT id_cat, nome_cat FROM categoria");
					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}


			public function retornarPapelarias() {
				try {

					$stmt = $this->pdo->prepare("SELECT id_usu, nome_usu FROM usuario WHERE tipo_usu = 2");
					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}


			public function retornarListas() {
				try {

					$stmt = $this->pdo->prepare("SELECT escola.nome_escola, lista.id_lista, lista.ensino, lista.ano   
						FROM escola, lista WHERE escola.id_escola = lista.escola");
					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}
	}
?>