		<?php
			require_once("../Classes/DAO/AdministrativoDAO.php");
			require_once("../Classes/Entidade/Empresa.php");
			
			$administrativoDao = new AdministrativoDAO();
			$empresa = new empresa();
		?>

<body>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
			<h1 class="">Adicionar Empresa</h1>
          <div class="row">
            <div class="col-md-3">
              <form class="" method="post">
                <div class="form-group">
                  <label>Nome da Empresa</label>
                  <input type="tex" class="form-control" name="txtNome" required="required" maxlength="80"> </div>
                <div class="form-group">
                  <label>E-mail</label>
                  <input type="email" class="form-control" name="txtEmail" required="required" maxlength="80"> </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">CNPJ</label>
                  <input id="cnpj" type="text" class="form-control"  name="txtCnpj" required="required" maxlength="80"> </div>
                <div class="form-group"></div>
              
            </div>
            <div class="col-md-3">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Telefone Comercial</label>
                  <input id="telefoneFixo" type="tel" class="form-control" name="txtTelefone" required="required" maxlength="20"> </div>
                <div class="form-group">
                  <label>Senha</label>
                  <input type="password" class="form-control" name="txtSenha" required="required" maxlength="80"> </div>
                <div class="form-group"></div>
                <div class="form-group"></div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="col-md-12">
                <div class="form-group">
                  <label>CEP</label>
                  <input id="cep" type="text" class="form-control" name="txtCep" required="required" maxlength="11"> </div>
                <div class="form-group">
                  <label>UF</label>
                  <select class="custom-control custom-select" name="txtUf">
                    <option value="DF">DF</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Cidade</label>
                  <select class="custom-control custom-select" name="txtCidade" required="required">
					<option value="Brasília">Brasília</option>
                  </select>
                </div>
                <div class="form-group"></div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Bairro</label>
                  <select class="custom-control custom-select" name="txtBairro" required="required">
                    <option value="">SELECIONE</option>
					<option>ÁGUAS CLARAS</option>
					<option>BRASILIA/PLANO PILOTO</option>
					<option>BRAZLÂNDIA</option>
					<option>CANDANGOLÂNDIA</option>
					<option>CEILÂNDIA</option>
					<option>CRUZEIRO</option>
					<option>FERCAL</option>
					<option>GAMA</option>
					<option>GUARÁ</option>
					<option>ITAPOÃ</option>
					<option>JARDIM BOTÂNICO</option>
					<option>LAGO NORTE</option>
					<option>LAGO SUL</option>
					<option>NÚCLEO BANDEIRANTE</option>
					<option>PARANOÁ</option>
					<option>PARK WAY</option>
					<option>PLANALTINA</option>
					<option>RECANTO DAS EMAS</option>
					<option>RIACHO FUNDO</option>
					<option>RIACHO FUNDO II</option>
					<option>SAMAMBAIA</option>
					<option>SANTA MARIA</option>
					<option>SÃO SEBASTIÃO</option>
					<option>SCIA (SETOR COMPLEMENTAR DE INDÚSTRIA E ABASTECIMENTO)</option>
					<option>SIA (SETOR DE INDÚSTRIA E ABASTECIMENTO)</option>
					<option>SOBRADINHO</option>
					<option>SOBRADINHO II</option>
					<option>SUDOESTE/OCTAGONAL</option>
					<option>TAGUATINGA</option>
					<option>VARJÃO</option>
					<option>VICENTE PIRES</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Endereço</label>
                  <input type="text" class="form-control" name="txtEndereco" required="required" maxlength="80"> </div>
                <div class="form-group"></div>
                <div class="form-group"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-3">
                  <div class="row">
                    <div class="col-md-12">
                      <a class="btn btn-danger" href="?pagina=empresas">Cancelar </a>
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
  </div>
</body>
<?php
/*Código verifica e cadastra administrador*/
	if (isset($_POST['btnCadastrar'])) {
	
		$nome  = $_POST['txtNome'];
		$email = ($_POST['txtEmail']);
		$cnpj = ($_POST['txtCnpj']);
		$telefone  = $_POST['txtTelefone'];
		$senha  = $_POST['txtSenha'];
		$cep = ($_POST['txtCep']);
		$uf = ($_POST['txtUf']);
		$cidade  = $_POST['txtCidade'];
		$bairro  = $_POST['txtBairro'];
		$endereco = ($_POST['txtEndereco']);

		
				
		$confereNome = $administrativoDao->existeEmpresa($nome);
		$confereEmail = $administrativoDao->existeEmail($email);
		$confereCnpj = $administrativoDao->existeCnpj($cnpj);
		$validaCnpj = $administrativoDao->validaCnpj($cnpj);

		

		if ($confereNome != 1 && $confereEmail != 1 && $confereCnpj != 1 && $validaCnpj == 1) {
			
			$cnpj = preg_replace("/[^0-9]/", "", $cnpj);
			$cnpj = str_pad($cnpj, 14, '0', STR_PAD_LEFT);
			$telefone = preg_replace("/[^0-9]/", "", $telefone);
			$telefone = str_pad($telefone, 10, '0', STR_PAD_LEFT);
			$cep = preg_replace("/[^0-9]/", "", $cep);
			$cep = str_pad($cep, 8, '0', STR_PAD_LEFT);
		
			$empresa->setNome_emp($nome);
			$empresa->setEmail_emp($email);
			$empresa->setCnpj($cnpj);
			$empresa->setTelefone_emp($telefone);
			$empresa->setSenha_emp(md5($senha));
			$empresa->setCep_emp($cep);
			$empresa->setUf_emp($uf);
			$empresa->setCidade_emp($cidade);
			$empresa->setBairro_emp($bairro);
			$empresa->setEndereco_emp($endereco);
			
				
				if ($administrativoDao->cadastrarEmpresa($empresa)) {
					?>
						<script type="text/javascript">
							alert("Cadastrado com sucesso!");
							window.location = '?pagina=cadastrar_emp';
						</script>
					<?php
				} else {
					?>
						<script type="text/javascript">
							alert("Erro ao cadastrar!");
							window.location = '?pagina=cadastrar_emp';
						</script>
					<?php
				}
		} else 	if($confereNome == 1){
			?>
				<script type="text/javascript">
					alert("ERRO: Está empresa já se encontra cadastrada no sistema!");
					window.location = '?pagina=cadastrar_emp';
				</script>
			<?php
		}
		
		if($confereEmail == 1){
			?>
				<script type="text/javascript">
					alert("ERRO: Já existe um cadastro com este E-mail!");
					window.location = '?pagina=cadastrar_emp';
				</script>
			<?php
		} else if($confereCnpj == 1){
			?>
				<script type="text/javascript">
					alert("ERRO: Já existe um cadastro com este CNPJ!");
					window.location = '?pagina=cadastrar_emp';
				</script>
			<?php
		} else if ($validaCnpj != 1){
			?>
				<script type="text/javascript">
					alert("ERRO: Este CNPJ não é valido!");
					window.location = '?pagina=cadastrar_emp';
				</script>
			<?php
		}
	}
?>
