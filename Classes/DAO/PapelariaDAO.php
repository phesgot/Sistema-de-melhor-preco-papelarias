<?php
/*error_reporting(0);
ini_set(“display_errors”, 0 );*/

	require_once("..\Classes\Conexao.php");
	
	class PapelariaDao {
		
		   function __construct() {
				$this->con = new Conexao();
				$this->pdo = $this->con->Connect();
			}



	/*___________________________________________Papelarias _______________________________________ */		
					
				public function retornarInfoPAP($id_usu) {
				try {

					$stmt = $this->pdo->prepare("SELECT usuario.id_usu, usuario.nome_usu, usuario.email_usu, 
						usuario.cnpj_usu, usuario.telefone_usu, usuario.tipo_usu, usuario.status_usu, 
						endereco.id_end, endereco.cep, endereco.estado, endereco.cidade, endereco.bairro, 
						endereco.endereco, endereco.fk_usuario 
						FROM usuario, endereco 
						WHERE usuario.id_usu = '$id_usu' and endereco.fk_usuario = '$id_usu'");


					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}
			

			public function alterarPap($id_usu, $telefone, $cep, $uf, $cidade, $bairro, $endereco){
						
					$stmt = $this->pdo->query("UPDATE usuario, endereco 
											   SET usuario.telefone_usu = '$telefone', endereco.cep = '$cep', endereco.estado = '$uf', endereco.cidade = '$cidade', endereco.bairro = '$bairro', endereco.endereco = '$endereco'
											 WHERE usuario.id_usu = '$id_usu' and endereco.fk_usuario = '$id_usu'");
					$stmt->execute();						
							
					}

		public function alterarSenhaPap($id_usu, $senha_usu){
						
					$stmt = $this->pdo->query("UPDATE usuario SET  senha_usu = '$senha_usu'
												WHERE id_usu = '$id_usu' ");
					$stmt->execute();						
							
					}
									
					

		public function inserirCategoria($entcategoria){
			try{
				$stmt = $this->pdo->prepare("insert INTO categoria"
									. "(nome_cat)"
									. "VALUES "
									. "(:nome_cat)");
														
				$param = array(
					":nome_cat" => $entcategoria->getNome_cat()
				);
            
				return $stmt->execute($param);	
			
			} catch (PDOException $ex){
				echo "ERRO 01: {$ex->getMessage()}";
			}
		}
		
			public function existeCategoria ($nome_cat){

					$query = $this->pdo->prepare("SELECT nome_cat FROM categoria WHERE nome_cat = '$nome_cat'");
	
					$query->execute();					
					
					if ($query->rowCount() >= 1){
						return true;
					}else{
						return false;
					}

			}
		
		
		
				public function retornarInformacoesCAT() {
				try {

					$stmt = $this->pdo->prepare("SELECT id_cat, nome_cat FROM categoria");
					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}

			public function retornarInformacoesPRO() {
				try {

					$stmt = $this->pdo->prepare("SELECT produto.id_pro, produto.nome_pro, produto.preco_pro, produto.imagem_pro, produto.info_pro, produto.quant_pro, produto.promocao_pro, produto.desconto_pro, 
						produto.fk_categoria_pro, produto.fk_usuario_pro, categoria.id_cat, categoria.nome_cat, marca.id_marca, marca.marca 
						FROM produto, categoria, marca, usuario 
						WHERE produto.fk_usuario_pro = usuario.id_usu and produto.fk_categoria_pro = categoria.id_cat and produto.fk_marca_pro = marca.id_marca");


					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}

			public function cadastrarProduto($entProduto){
			try{
				$stmt = $this->pdo->prepare("insert INTO produto"
									. "(nome_pro, preco_pro, imagem_pro, info_pro, quant_pro, fk_categoria_pro,
										fk_usuario_pro, fk_marca_pro)"
									. "VALUES "
									. "(:nome_pro, :preco_pro, :imagem_pro, :info_pro, :quant_pro, :fk_categoria_pro, :fk_usuario_pro, :fk_marca_pro)");
														
				$param = array(
					":nome_pro" => $entProduto->getNome_pro(),
					":preco_pro" => $entProduto->getPreco_pro(),
					":imagem_pro" => $entProduto->getImagem_pro(),
					":info_pro" => $entProduto->getInfo_pro(),
					":quant_pro" => $entProduto->getQuant_pro(),
					":fk_categoria_pro" => $entProduto->getFk_categoria_pro(),
					":fk_usuario_pro" => $entProduto->getFk_usuario_pro(),
					":fk_marca_pro" => $entProduto->getFk_marca_pro()
				);
            
				return $stmt->execute($param);	
			
			} catch (PDOException $ex){
				echo "ERRO 01: {$ex->getMessage()}";
			}
		}


	    public function retornarInfoCAT() {
			try {
				$stmt = $this->pdo->prepare("SELECT id_cat, nome_cat FROM categoria");
				$stmt->execute();
						
				return $stmt->fetchall(PDO::FETCH_ASSOC);
					
			} catch (PDOException $ex) {
				echo "ERRO 02: {$ex->getMessage()}";
			}
		}	

		public function retornarInfoMAR() {
			try {
				$stmt = $this->pdo->prepare("SELECT id_marca, marca FROM marca");
				$stmt->execute();
						
				return $stmt->fetchall(PDO::FETCH_ASSOC);
					
			} catch (PDOException $ex) {
				echo "ERRO 02: {$ex->getMessage()}";
			}
		}

		public function excluirPro($id_pro){
						
				$stmt = $this->pdo->query(" DELETE FROM produto WHERE id_pro = '$id_pro'");
				$stmt->execute();						
							
			}

		public function alterarPro($id_pro, $produto, $marca, $categoria, $preco, $info, $quantidade){
						
					$stmt = $this->pdo->query("UPDATE produto SET  nome_pro = '$produto', preco_pro = '$preco', info_pro = '$info', quant_pro = '$quantidade', fk_categoria_pro = '$categoria', 
						fk_marca_pro = '$marca'   
						WHERE id_pro = '$id_pro'");
					$stmt->execute();						
							
					}
}

?>