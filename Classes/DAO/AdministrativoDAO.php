<?php
/*error_reporting(0);
ini_set(“display_errors”, 0 );*/

	require_once("..\Classes\Conexao.php");
	
	class AdministrativoDao {
		
		   function __construct() {
				$this->con = new Conexao();
				$this->pdo = $this->con->Connect();
			}


	/*_____________________________________________________________________Geral ___________________________________________________________________________ */		
	
			public function existeEmail ($email_usu){

					$query = $this->pdo->prepare("SELECT * FROM usuario WHERE email_usu = '$email_usu'");
	
					$query->execute();					
					
					if ($query->rowCount() >= 1){
						return true;
					}else{
						return false;
					}

			}
	
			public function desativarUsu($id_usu, $status_usu){
						
					$stmt = $this->pdo->query("UPDATE usuario SET  status_usu = '$status_usu'
												WHERE id_usu = '$id_usu'");
					$stmt->execute();						
							
					}	
			
			public function ativarUsu($id_usu, $status_usu){
						
					$stmt = $this->pdo->query("UPDATE usuario SET  status_usu = '$status_usu'
												WHERE id_usu = '$id_usu'");
					$stmt->execute();						
							
					}
					
			public function alterarSenhaUsu($id_usu, $senha_usu){
						
					$stmt = $this->pdo->query("UPDATE usuario SET  senha_usu = '$senha_usu'
												WHERE id_usu = '$id_usu' ");
					$stmt->execute();						
							
					}
/*_____________________________________________________________________Administrador___________________________________________________________________________ */			
				
		public function cadastrarAdministrador($entUsuario){
			try{
				$stmt = $this->pdo->prepare("insert INTO usuario"
									. "(nome_usu, email_usu, senha_usu, cpf_usu, telefone_usu, tipo_usu)"
									. "VALUES "
									. "(:nome_usu, :email_usu, :senha_usu, :cpf_usu, :telefone_usu, :tipo_usu)");
														
				$param = array(
					":nome_usu" => $entUsuario->getNome_usu(),
					":email_usu" => $entUsuario->getEmail_usu(),
					":senha_usu" => $entUsuario->getSenha_usu(),
					":cpf_usu" => $entUsuario->getCpf_usu(),	
					":telefone_usu" => $entUsuario->getTelefone_usu(),
					":tipo_usu" => $entUsuario->getTipo_usu()
				);
            
				return $stmt->execute($param);	
			
			} catch (PDOException $ex){
				echo "ERRO 01: {$ex->getMessage()}";
			}
		}
		
		    public function consultarId_adm($email_usu) {
				try {
					$stmt = $this->pdo->prepare("SELECT id_usu FROM usuario WHERE email_usu = :email_usu and tipo_usu = 1");

					$param = array(":email_usu" => $email_usu);

					$stmt->execute($param);

				if ($stmt->rowCount() > 0) {
                $consultaIdadm = $stmt->fetch(PDO::FETCH_ASSOC);
                return $consultaIdadm['id_usu'];
					} else {
						return "";
					}
				} catch (Exception $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}


			public function retornarInformacoes($email_usu) {
				try {

					$stmt = $this->pdo->prepare("SELECT id_usu, nome_usu, email_usu, cpf_usu, telefone_usu, status_usu FROM usuario WHERE email_usu = :email_usu and tipo_usu = 1");

					$param = array(":email_usu" => $email_usu);

					$stmt->execute($param);
					
					return $stmt->fetch(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 04: {$ex->getMessage()}";
				}
			}
			
/*  Listar ADM  */			
				public function retornarInformacoesADM() {
				try {

					$stmt = $this->pdo->prepare("SELECT id_usu, nome_usu, email_usu, cpf_usu, telefone_usu, status_usu FROM usuario WHERE tipo_usu = 1 ");
					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}
			
			

			
			public function existeCpf ($cpf_usu){

					$query = $this->pdo->prepare("SELECT * FROM usuario WHERE cpf_usu = '$cpf_usu'");
	
					$query->execute();					
					
					if ($query->rowCount() >= 1){
						return true;
					}else{
						return false;
					}

			}
			
			public function alterarUsu($id_usu, $nome, $email ){
						
					$stmt = $this->pdo->query("UPDATE usuario SET  nome_usu = '$nome', email_usu = '$email'
												WHERE id_usu = '$id_usu'");
					$stmt->execute();						
							
					}
									
					
/*   Validar CPF  */

			 function validaCpf($cpf = null) {

				// Verifica se um número foi informado
				if(empty($cpf)) {
					return true;
				}

				// Elimina possivel mascara
				$cpf = preg_replace("/[^0-9]/", "", $cpf);
				$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
				
				// Verifica se o numero de digitos informados é igual a 11 
				if (strlen($cpf) != 11) {
					return true;
				}
				// Verifica se nenhuma das sequências invalidas abaixo 
				// foi digitada. Caso afirmativo, retorna falso
				else if ($cpf == '00000000000' || 
					$cpf == '11111111111' || 
					$cpf == '22222222222' || 
					$cpf == '33333333333' || 
					$cpf == '44444444444' || 
					$cpf == '55555555555' || 
					$cpf == '66666666666' || 
					$cpf == '77777777777' || 
					$cpf == '88888888888' || 
					$cpf == '99999999999') {
					return true;
				 // Calcula os digitos verificadores para verificar se o
				 // CPF é válido
				 } else {   
					
					for ($t = 9; $t < 11; $t++) {
						
						for ($d = 0, $c = 0; $c < $t; $c++) {
							$d += $cpf{$c} * (($t + 1) - $c);
						}
						$d = ((10 * $d) % 11) % 10;
						if ($cpf{$c} != $d) {
							return true;
						}
					}

					return false;
				}
			}
			

			
	/*_____________________________________________________________________Papelarias ___________________________________________________________________________ */		
		
	public function cadastrarPapelaria($entUsuario){
			try{
				$stmt = $this->pdo->prepare("insert INTO usuario"
									. "(nome_usu, email_usu, senha_usu, cnpj_usu, telefone_usu, tipo_usu)"
									. "VALUES "
									. "(:nome_usu, :email_usu, :senha_usu, :cnpj_usu, :telefone_usu, :tipo_usu)");
														
				$param = array(
					":nome_usu" => $entUsuario->getNome_usu(),
					":email_usu" => $entUsuario->getEmail_usu(),
					":senha_usu" => $entUsuario->getSenha_usu(),
					":cnpj_usu" => $entUsuario->getCnpj_usu(),
					":telefone_usu" => $entUsuario->getTelefone_usu(),
					":tipo_usu" => $entUsuario->getTipo_usu()
				);
            
				return $stmt->execute($param);
			
			} catch (PDOException $ex){
				echo "ERRO 01: {$ex->getMessage()}";
			}
		}
		
		public function ultimaId() {
				try {

					$stmt = $this->pdo->prepare("SELECT MAX(id_usu) as id_usu from usuario");

					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 04: {$ex->getMessage()}";
				}
			}
		
		
	public function cadastrarEndereco($entEndereco){
			try{
				$stmt = $this->pdo->prepare("insert INTO endereco"
									. "(cep, estado, cidade, bairro, endereco, fk_usuario)"
									. "VALUES "
									. "(:cep, :estado, :cidade, :bairro, :endereco, :fk_usuario)");
														
				$param = array(
					":cep" => $entEndereco->getCep(),
					":estado" => $entEndereco->getEstado(),
					":cidade" => $entEndereco->getCidade(),
					":bairro" => $entEndereco->getBairro(),
					":endereco" => $entEndereco->getEndereco(),
					":fk_usuario" => $entEndereco->getFk_usuario()
				);
            
				return $stmt->execute($param);	
			
			} catch (PDOException $ex){
				echo "ERRO 01: {$ex->getMessage()}";
			}
		}
		
		
		
		    public function consultarId_pap($email_usu) {
				try {
					$stmt = $this->pdo->prepare("SELECT id_usu FROM usuario WHERE email_usu = :email_usu and tipo_usu = 2");

					$param = array(":email_usu" => $email_usu);

					$stmt->execute($param);

				if ($stmt->rowCount() > 0) {
                $consultaIdpap = $stmt->fetch(PDO::FETCH_ASSOC);
                return $consultaIdpap['id_usu'];
					} else {
						return "";
					}
				} catch (Exception $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}


			public function retornarInformacoesPap($email_usu) {
				try {

					$stmt = $this->pdo->prepare("SELECT id_usu, nome_usu, cnpj_usu, telefone_usu, tipo_usu, status_usu FROM usuario WHERE email_usu = :email_usu and tipo_usu = 2");

					$param = array(":email_usu" => $email_usu);

					$stmt->execute($param);
					
					return $stmt->fetch(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 04: {$ex->getMessage()}";
				}
			}




			
/*  Listar Papelarias  
*/			
				public function retornarInfoPAP() {
				try {

					$stmt = $this->pdo->prepare("SELECT usuario.id_usu, usuario.nome_usu, usuario.email_usu, usuario.cnpj_usu, usuario.telefone_usu, usuario.tipo_usu, usuario.status_usu, endereco.id_end, endereco.cep, endereco.estado, endereco.cidade, endereco.bairro, endereco.endereco, endereco.fk_usuario FROM usuario, endereco WHERE tipo_usu = 2 and usuario.id_usu = endereco.fk_usuario ");
					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}
			
			
/* Existe Papelaria início */	


	
			public function existeCnpj ($cnpj){
				
					$cnpj = preg_replace("/[^0-9]/", "", $cnpj);
					$cnpj = str_pad($cnpj, 14, '0', STR_PAD_LEFT);

					$query = $this->pdo->prepare("SELECT * FROM usuario WHERE cnpj_usu = '$cnpj'");
	
					$query->execute();					
					
					if ($query->rowCount() >= 1){
						return true;
					}else{
						return false;
					}

			}
			
			public function existePapelaria ($nome_usu){

					$query = $this->pdo->prepare("SELECT * FROM usuario WHERE nome_usu = '$nome_usu'");
	
					$query->execute();					
					
					if ($query->rowCount() >= 1){
						return true;
					}else{
						return false;
					}

			}
			
			
/* Existe Papelaria fim */	

		
			
			public function alterarPap($id, $nome, $email, $cnpj, $telefone, $cep, $uf, $cidade, $bairro, $endereco){
						
					$stmt = $this->pdo->query("UPDATE usuario, endereco SET  usuario.nome_usu = '$nome', usuario.email_usu = '$email', 
											usuario.cnpj_usu = '$cnpj', usuario.telefone_usu = '$telefone', endereco.cep = '$cep', 
											endereco.estado = '$uf', endereco.cidade = '$cidade', endereco.bairro = '$bairro', endereco.endereco = '$endereco'
											 WHERE usuario.id_usu = '$id' and endereco.fk_usuario = '$id'");
					$stmt->execute();						
							
					}
									
					
/*          Validar CNPJ         */

					function validaCnpj($cnpj = null) {

					// Verifica se um número foi informado
					if(empty($cnpj)) {
						return false;
					}

					// Elimina possivel mascara
					$cnpj = preg_replace("/[^0-9]/", "", $cnpj);
					$cnpj = str_pad($cnpj, 14, '0', STR_PAD_LEFT);
					
					// Verifica se o numero de digitos informados é igual a 11 
					if (strlen($cnpj) != 14) {
						return false;
					}
					
					// Verifica se nenhuma das sequências invalidas abaixo 
					// foi digitada. Caso afirmativo, retorna falso
					else if ($cnpj == '00000000000000' || 
						$cnpj == '11111111111111' || 
						$cnpj == '22222222222222' || 
						$cnpj == '33333333333333' || 
						$cnpj == '44444444444444' || 
						$cnpj == '55555555555555' || 
						$cnpj == '66666666666666' || 
						$cnpj == '77777777777777' || 
						$cnpj == '88888888888888' || 
						$cnpj == '99999999999999') {
						return false;
						
					 // Calcula os digitos verificadores para verificar se o
					 // CPF é válido
					 } else {   
					 
						$j = 5;
						$k = 6;
						$soma1 = "";
						$soma2 = "";

						for ($i = 0; $i < 13; $i++) {

							$j = $j == 1 ? 9 : $j;
							$k = $k == 1 ? 9 : $k;

							$soma2 += ($cnpj{$i} * $k);

							if ($i < 12) {
								$soma1 += ($cnpj{$i} * $j);
							}

							$k--;
							$j--;

						}

						$digito1 = $soma1 % 11 < 2 ? 0 : 11 - $soma1 % 11;
						$digito2 = $soma2 % 11 < 2 ? 0 : 11 - $soma2 % 11;

						return (($cnpj{12} == $digito1) and ($cnpj{13} == $digito2));
					 
					}
				}
			
/*_____________________________________________________________________Listar Categorias___________________________________________________________________________ */			
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
		
			public function alterarCat($id_cat, $nome){
						
					$stmt = $this->pdo->query("UPDATE categoria SET  nome_cat = '$nome' WHERE id_cat = '$id_cat'");
					$stmt->execute();						
							
					}

			public function ecluirCat($id_cat){
						
				$stmt = $this->pdo->query(" DELETE FROM categoria WHERE id_cat = '$id_cat'");
				$stmt->execute();						
							
			}





			public function inserirMarca($entmarca){
			try{
				$stmt = $this->pdo->prepare("insert INTO marca"
									. "(marca)"
									. "VALUES "
									. "(:marca)");
														
				$param = array(
					":marca" => $entmarca->getMarca()
				);
            
				return $stmt->execute($param);	
			
			} catch (PDOException $ex){
				echo "ERRO 01: {$ex->getMessage()}";
			}
		}
		
			public function existeMarca ($marcas){

					$query = $this->pdo->prepare("SELECT marca FROM marca WHERE marca = '$marcas'");
	
					$query->execute();					
					
					if ($query->rowCount() >= 1){
						return true;
					}else{
						return false;
					}

			}


			

			public function retornarInformacoesMAR() {
				try {

					$stmt = $this->pdo->prepare("SELECT id_marca, marca FROM marca");
					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}
		
			public function alterarMar($id_marca, $marca){
						
					$stmt = $this->pdo->query("UPDATE marca SET  marca = '$marca' WHERE id_marca = '$id_marca'");
					$stmt->execute();						
							
					}

			public function ecluirMar($id_marca){
						
				$stmt = $this->pdo->query(" DELETE FROM marca WHERE id_marca = '$id_marca'");
				$stmt->execute();						
							
			}
	
	public function inserirEscola($escola){
			try{
				$stmt = $this->pdo->prepare("insert INTO escola"
									. "(nome_escola)"
									. "VALUES "
									. "(:nome_escola)");
														
				$param = array(
					":nome_escola" => $escola->getNome_escola()
				);
            
				return $stmt->execute($param);	
			
			} catch (PDOException $ex){
				echo "ERRO 01: {$ex->getMessage()}";
			}
		}
		
			public function existeEscola ($nome_escola){

					$query = $this->pdo->prepare("SELECT nome_escola FROM escola WHERE nome_escola = '$nome_escola'");
	
					$query->execute();					
					
					if ($query->rowCount() >= 1){
						return true;
					}else{
						return false;
					}

			}

			public function retornarInformacoesEscola() {
				try {

					$stmt = $this->pdo->prepare("SELECT id_escola, nome_escola FROM escola");
					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}
		
			public function alterarEscola($id_escola, $escola){
						
					$stmt = $this->pdo->query("UPDATE escola SET  nome_escola = '$escola' WHERE id_escola = '$id_escola'");
					$stmt->execute();						
							
					}

			public function ecluirEscola($id_escola){
						
				$stmt = $this->pdo->query(" DELETE FROM escola WHERE id_escola = '$id_escola'");
				$stmt->execute();						
							
			}
	
	

public function inserirLista($escola){
			try{
				$stmt = $this->pdo->prepare("insert INTO lista"
									. "(escola, ensino, ano)"
									. "VALUES "
									. "(:escola, :ensino, :ano)");
														
				$param = array(
					":escola" => $escola->getEscola(),
					":ensino" => $escola->getEnsino(),
					":ano" => $escola->getAno()
				);
            
				return $stmt->execute($param);	
			
			} catch (PDOException $ex){
				echo "ERRO 01: {$ex->getMessage()}";
			}
		}
		
			public function existeLista ($escola, $ensino, $ano){

					$query = $this->pdo->prepare("SELECT * FROM lista WHERE escola = '$escola' and ensino = '$ensino' and ano = '$ano' ");
	
					$query->execute();					
					
					if ($query->rowCount() >= 1){
						return true;
					}else{
						return false;
					}

			}

	
		public function retornarLista() {
				try {

					$stmt = $this->pdo->prepare("SELECT escola.nome_escola, lista.id_lista, lista.ensino, lista.ano   
						FROM escola, lista WHERE escola.id_escola = lista.escola");
					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}


		public function inserirItem($item){
			try{
				$stmt = $this->pdo->prepare("insert INTO item"
									. "(item, quantidade_item, fk_item_lista)"
									. "VALUES "
									. "(:item, :quantidade_item, :fk_item_lista)");
														
				$param = array(
					":item" => $item->getItem(),
					":quantidade_item" => $item->getQuantidade_item(),
					":fk_item_lista" => $item->getFk_item_lista()
				);
            
				return $stmt->execute($param);	
			
			} catch (PDOException $ex){
				echo "ERRO 01: {$ex->getMessage()}";
			}
		}
	

	public function retornarListaCompleta($id_lista) {
				try {

					$stmt = $this->pdo->prepare("
						SELECT escola.nome_escola, lista.id_lista, lista.ensino, lista.ano, item.quantidade_item, categoria.nome_cat   
						FROM escola, lista, item, categoria 
						WHERE lista.id_lista = '$id_lista'
						and lista.escola = escola.id_escola
						and lista.id_lista = item.fk_item_lista 
						and item.item = categoria.id_cat");
					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}

			public function excluirItem($id_lista){
						
					$stmt = $this->pdo->query(" DELETE FROM item WHERE fk_item_lista = '$id_lista' ");
					$stmt->execute();							
							
					}

			public function excluirLista($id_lista){
						
					$stmt = $this->pdo->query(" DELETE FROM lista WHERE id_lista = '$id_lista' ");
					$stmt->execute();							
							
					}



						public function retornarInformacoesPRO() {
				try {

					$stmt = $this->pdo->prepare("SELECT produto.id_pro, produto.nome_pro, produto.preco_pro, produto.imagem_pro, produto.info_pro, produto.quant_pro, produto.promocao_pro, produto.desconto_pro, 
						produto.fk_categoria_pro, produto.fk_usuario_pro, categoria.id_cat, categoria.nome_cat, marca.id_marca, marca.marca, usuario.nome_usu 
						FROM produto, categoria, marca, usuario   
						WHERE produto.fk_usuario_pro = usuario.id_usu and produto.fk_categoria_pro = categoria.id_cat and produto.fk_marca_pro = marca.id_marca");
					$stmt->execute();
					
					return $stmt->fetchall(PDO::FETCH_ASSOC);

					
				} catch (PDOException $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}
	
	}
	
	

?>