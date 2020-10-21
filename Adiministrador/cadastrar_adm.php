		<?php
			require_once("../Classes/DAO/AdministrativoDAO.php");
			require_once("../Classes/Entidades/Usuario.php");
			
			$administrativoDao = new AdministrativoDAO();
			$usuario = new Usuario();
		?>
<body>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">Adicionar Administrador</h1>
          <div class="row">
            <div class="col-md-12">
              <p class="lead">Dados gerais</p>
              <div class="row">
                <div class="col-md-12">
                  <form class="" method="post">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Nome</label>
                          <input type="text" class="form-control" placeholder="Nome Completo" name="txtNome" required="required" maxlength="80"> </div>
                        <div class="form-group">
                          <label>CPF</label>
                          <input id="cpf" type="text" class="form-control" placeholder="" name="txtCpf" required="required" maxlength="14"> </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>E-mail</label>
                          <input type="text" class="form-control" placeholder="" name="txtEmail" required="required" maxlength="40"> </div>
                        <div class="form-group">
                          <label>Senha</label>
                          <input type="password" class="form-control" placeholder="" name="txtSenha" required="required" maxlength="20"> </div>
                      </div>
					  <div class="col-md-3">
                        <div class="form-group">
                          <label>Telefone</label>
                          <input type="text" id="telefone" class="form-control" placeholder="" name="txtTelefone" required="required" maxlength="14"> </div>
                      </div>
                    </div>
                            <div class="col-md-3"> </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <a class="btn btn-danger" href='?pagina=administradores'>Cancelar </a>
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
</body>
<?php
/*Código verifica e cadastra administrador*/
	if (isset($_POST['btnCadastrar'])) {
	
		$nome  = $_POST['txtNome'];
		$email = ($_POST['txtEmail']);
		$cpf = ($_POST['txtCpf']);
		$senha  = $_POST['txtSenha'];
		$telefone  = $_POST['txtTelefone'];
		$tipo = 1;
		
		$cpf = preg_replace("/[^0-9]/", "", $cpf);
		$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
		$telefone = preg_replace("/[^0-9]/", "", $telefone);
		$telefone = str_pad($telefone, 11, '0', STR_PAD_LEFT);
				
		$confereEmail = $administrativoDao->existeEmail($email);
		$confereCpf = $administrativoDao->existeCpf($cpf);
		$validaCpf = $administrativoDao->validaCpf($cpf);		
		

		if ($confereCpf != 1 && $confereEmail != 1 && $validaCpf != 1) {
			
			
			$usuario->setNome_usu($nome);
			$usuario->setEmail_usu($email);
			$usuario->setSenha_usu(md5($senha));
			$usuario->setCpf_usu($cpf);
			$usuario->setTelefone_usu($telefone);
			$usuario->setTipo_usu($tipo);
			
			
			
				
				if ($administrativoDao->cadastrarAdministrador($usuario)) {
					?>
						<script type="text/javascript">
							alert("Cadastrado com sucesso!");
						</script>
					<?php
				} else {
					?>
						<script type="text/javascript">
							alert("Erro ao cadastrar!");
						</script>
					<?php
				}
		} else if($validaCpf == 1){
			?>
				<script type="text/javascript">
					alert("ERRO: Este CPF não é valido!");
				</script>
			<?php
		} else if($confereEmail == 1){
			?>
				<script type="text/javascript">
					alert("ERRO: Já existe um cadastro com este E-mail!");
				</script>
			<?php
		} else if($confereCpf == 1){
			?>
				<script type="text/javascript">
					alert("ERRO: Já existe um cadastro com este CPF!");
				</script>
			<?php
		}
		 
	}
?>
