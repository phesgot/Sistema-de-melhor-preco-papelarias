<?php

	require_once("Classes/Conexao.php");
	
	class UsuarioDao {
		
		   function __construct() {
				$this->con = new Conexao();
				$this->pdo = $this->con->Connect();
			}
		
		
		    public function consultarId_usu($email_usu) {
				try {
					$stmt = $this->pdo->prepare("SELECT id_usu FROM usuario WHERE email_usu = :email_usu");

					$param = array(":email_usu" => $email_usu);

					$stmt->execute($param);

				if ($stmt->rowCount() > 0) {
                $consultaIdusu = $stmt->fetch(PDO::FETCH_ASSOC);
                return $consultaIdusu['id_emp'];
					} else {
						return "";
					}
				} catch (Exception $ex) {
					echo "ERRO 02: {$ex->getMessage()}";
				}
			}

			public function validarUsuario($email_usu, $senha_usu) {
				try {
					$stmt = $this->pdo->prepare("SELECT email_usu, senha_usu FROM usuario WHERE email_usu = :email_usu and senha_usu = :senha_usu");
					$param = array(
						
						":email_usu" => $email_usu,
						"senha_usu" => md5($senha_usu)
					);

					$stmt->execute($param);

					if ($stmt->rowCount() > 0) {
						return true;
					} else {
						return false;
					}
				} catch (PDOException $ex) {
					echo "ERRO 03: {$ex->getMessage()}";
				}
			}

			public function retornarInformacoes($email_usu) {
				try {

					$stmt = $this->pdo->prepare("SELECT id_usu, nome_usu, email_usu, senha_usu, cpf_usu, cnpj_usu, telefone_usu, tipo_usu, status_usu FROM usuario WHERE email_usu = :email_usu");

					$param = array(":email_usu" => $email_usu);

					$stmt->execute($param);
					
					return $stmt->fetch(PDO::FETCH_ASSOC);
					
				} catch (PDOException $ex) {
					echo "ERRO 04: {$ex->getMessage()}";
				}
			}
						
			
			
	}

?>