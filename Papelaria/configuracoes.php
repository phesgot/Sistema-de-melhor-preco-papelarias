<?php
	require_once("../Classes/DAO/PapelariaDAO.php");
			
	$papelariaDao = new PapelariaDAO();
?>
<body>
  	<div class="py-5">
    	<div class="container">
      		<div class="row">
        		<div class="col-md-12">
					<h1 class="">Alterar Dados</h1>
          			<div class="row">
          			  	<div class="col-md-3">
          			  		
<?php
	$id_usu = $_SESSION['id_usu'];
	foreach ($papelariaDao->retornarInfoPAP($id_usu) as $consulta) { 
?>
	              			<form class="" method="post">
	                			<div class="form-group">
	                  				<label>Nome da Papelaria</label>
	                  				<input type="tex" class="form-control" name="txtNome" required="required" maxlength="80" value="<?=$consulta["nome_usu"]; ?>" readonly="true"> 
	                  			</div>
	                			<div class="form-group">
	                  				<label>E-mail</label>
	                  				<input type="email" class="form-control" name="txtEmail" required="required" maxlength="80" value="<?=$consulta["email_usu"];?>" readonly="true"> 
	              				</div>
	                			<div class="form-group">
	                  				<label for="exampleInputEmail1">CNPJ</label>
	                  				<input id="cnpj" type="text" class="form-control"  name="txtCnpj" required="required" maxlength="80" value="<?=$consulta["cnpj_usu"];?>" readonly="true"> 
	                  			</div>
            			</div>
            			<div class="col-md-3">
              				<div class="col-md-12">
                				<div class="form-group">
                  					<label>Telefone Comercial</label>
                  					<input id="telefoneFixo" type="tel" class="form-control" name="txtTelefone" required="required" maxlength="20" value="<?=$consulta["telefone_usu"];?>"> 
                  				</div>
                  				<div class="form-group">
                  					<label>CEP</label>
                 					<input id="cep" type="text" class="form-control" name="txtCep" required="required" maxlength="20" value="<?=$consulta["cep"]; ?>">
                 				</div>
                 				<div class="form-group">
                 					<label>UF</label>
                  					<select class="custom-control custom-select" name="txtUf">
                   						 <option value="<?=$consulta["estado"];?>"><?php echo $consulta["estado"]; ?></option>
                  					</select>
                				</div>
              				</div>
            			</div>
            			<div class="col-md-3">
             				<div class="col-md-12">
               					<div class="form-group">
                  					<label for="exampleInputEmail1">Cidade</label>
                  					<select class="custom-control custom-select" name="txtCidade" required="required">
										<option value="<?=$consulta["cidade"];?>"><?php echo $consulta["cidade"]; ?></option>
                 					</select>
                				</div>
                				<div class="form-group">
                  					<label>Bairro</label>
                  					<select class="custom-control custom-select" name="txtBairro" required="required">
					                    <option value="<?=$consulta["bairro"];?>"><?php echo $consulta["bairro"]?>  
					                	</option>
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
                  					<input type="text" class="form-control" name="txtEndereco" required="required" maxlength="80" value="<?=$consulta["endereco"];?>"> 
                  				</div>
              				</div>
            			</div>
            			<div class="col-md-3">
              				<div class="col-md-12">
                				<div class="form-group">
                  					<label>Senha</label>
                  					<input type="password" class="form-control" name="txtSenha"  maxlength="80"> 
                  				</div>
                				<div class="form-group">
                  					<button type="submit" class="btn btn-primary btn-block" name="btnAlterar_senha">Alterar Senha		
                      				</button> 
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
                      						<a class="btn btn-danger" href="?pagina=inicio">Cancelar </a>
                      						<button type="submit" class="btn btn-primary" name="btnAlterar">Alterar
                      						</button>
					  		</form>
<?php
}
?>
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
/*Código verifica e altera dados*/				
	if (isset($_POST['btnAlterar'])) {				
					
		$telefone  = $_POST['txtTelefone'];
		$cep = ($_POST['txtCep']);
		$uf = ($_POST['txtUf']);
		$cidade  = $_POST['txtCidade'];
		$bairro  = $_POST['txtBairro'];
		$endereco = ($_POST['txtEndereco']);

		$telefone = preg_replace("/[^0-9]/", "", $telefone);
		$telefone = str_pad($telefone, 10, '0', STR_PAD_LEFT);
		$cep = preg_replace("/[^0-9]/", "", $cep);
		$cep = str_pad($cep, 8, '0', STR_PAD_LEFT);
		
				
		if ($papelariaDao->alterarPap($id_usu, $telefone, $cep, $uf, $cidade, $bairro, $endereco)) {
		}	
		?>
			<script type="text/javascript">
				alert("Dados alterado com suscesso!");
				window.location = '?pagina=configuracoes';
			</script>
		<?php
	}
/*Código alterar senha PAP*/	
	if (isset($_POST['btnAlterar_senha'])) {
				
					
		$senha_usu  = (md5($_POST['txtSenha']));
				
		if ($papelariaDao->alterarSenhaPap($id_usu, $senha_usu)) {
		}
		?>
			<script type="text/javascript">
				alert("Senha alterada com suscesso!");
				window.location = '?pagina=configuracoes';
			</script>
		<?php
	}
?>
