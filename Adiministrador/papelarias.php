		<?php
			require_once("../Classes/DAO/AdministrativoDAO.php");
			
			$administrativoDao = new AdministrativoDAO();
		?>
<div >
  <br>
</div> 

    <div class="section" id="listaPapelarias">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h1>
              <i class="fa fa-fw fa-users"></i>Papelarias</h1>
          </div>
          <div class="col-md-6">
            <div class="btn-group btn-group-justified">
              <a href='?pagina=cadastrar_pap' class="btn btn-primary"><i class="fa fa-fw fa-user-plus"></i>Nova Papelaria</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <table class="table table-striped table-bordered" id="id_listaPapelarias" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Status</th>
				  <th>Papelaria</th>
                  <th>Telefone</th>
				  <th>E-mail</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
<?php
	foreach($administrativoDao->retornarInfoPAP() as $consulta ){
?>
                <tr>
                  
					 <td>
					  <?php
					  if($consulta["status_usu"]==1){ 
					  ?>
						<i class="-o fa fa-check fa-fw fa-lg text-success"></i>Ativo
						<?php
					  }else{
						?>
						<i class="-o fa fa-fw fa-lg text-danger fa-close"></i>Inativo
						<?php
					  }
					  ?>
					  </td>
					  <td><?=$consulta["nome_usu"];?></td>
					  <td><?=$consulta["telefone_usu"];?></td>
					  <td><?=$consulta["email_usu"];?></td>
					  <td>
						<button type="button" data-toggle="modal" data-target="#modal_visualizar<?=$consulta["id_usu"];?>">
							<i class="fa fa-eye fa-fw fa-lg text-primary" title="Vizualizar" ></i>
						</button>
						<button type="button" data-toggle="modal" data-target="#modal_editar<?=$consulta["id_usu"];?>">
							<i class="fa fa-fw fa-lg fa-pencil text-warning" title="Editar"></i>
						</button>
						<button type="button" data-toggle="modal" data-target="#modal_senha<?=$consulta["id_usu"];?>">
							<i class="fa fa-fw fa-unlock-alt text-dark" title="Alterar Senha"></i>
						</button>
				<?php
				  if($consulta["status_usu"]==1){ 
				  ?>
				  <button type="button" data-toggle="modal" data-target="#modal_desativar<?=$consulta["id_usu"];?>">
                     <i class="fa fa-fw fa-lg fa-trash-o text-danger" title="Desativar"></i>
				  </button>
					<?php
				  }else{
					?>
					<button type="button" data-toggle="modal" data-target="#modal_ativar<?=$consulta["id_usu"];?>">
					<i class="-o fa fa-check fa-fw fa-lg text-success" title="Ativar"></i>
					</button>
					<?php
				  }
				  ?>
					  </td>
                </tr>
				
<!-- Inicio Modal Vizualisar EMP--> 
  <div class="modal" id="modal_visualizar<?=$consulta["id_usu"];?>">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Visualizar Informações</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span>×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="list-group">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><b>Papelaria</b></h5>
              </div>
              <p class="mb-1"><b><?php echo $consulta["nome_usu"]; ?></b></p>
        
            
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">E-mail</h5>
              </div>
              <p class="mb-1"><?php echo $consulta["email_usu"]; ?></p>
           
            
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><b>CNPJ</b></h5>
              </div>
              <p class="mb-1"><b><?php echo $consulta["cnpj_usu"]; ?></b></p>
           
				<div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Telefone</h5>
              </div>
              <p class="mb-1"><?php echo $consulta["telefone_usu"]; ?></p>
			  
			  <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><b>Endereço</b></h5>
              </div>
              <p class="mb-1"><b><?php echo $consulta["endereco"]; ?>, <?php echo $consulta["cidade"]; ?>, <?php echo $consulta["bairro"]; ?>
			  -<?php echo $consulta["estado"]; ?> CEP: <?php echo $consulta["cep"]; ?></b></p>
			  
            
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Status</h5>
              </div>
			  <?php
				  if($consulta["status_usu"]==1){ 
				?>
              <p class="mb-1">Ativo</p>
			  <?php
				  }else{
			  ?>
			  <p class="mb-1">Inativo</p>
			  <?php
				  }
			  ?>
            
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Fim Modal Visualizar EMP-->
				
				
				
<!-- Inicio Modal Editar ADM-->
<div class="modal" id="modal_editar<?=$consulta["id_usu"];?>">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Papelaria</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span>×</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" method="post">
            <div class="form-group">
			<input type="text" style="display:none" name="id" maxlength="14" class="form-control"  value="<?=$consulta["id_usu"];?>">
              <label>Papelaria</label>
              <input type="text" class="form-control" value="<?=$consulta["nome_usu"];?>" name="txtNome" maxlength="80"> </div>
            <div class="form-group">
              <label>E-mail</label>
              <input type="email" class="form-control" value="<?=$consulta["email_usu"];?>" name="txtEmail" maxlength="80"> </div>
            <div class="form-group">
              <label>CNPJ</label>
              <input type="text" class="form-control" id="inlineFormInput" maxlength="14" readonly="true" value="<?=$consulta["cnpj_usu"];?>" name="txtCnpj" >
            </div>
			<div class="form-group">
              <label>Telefone Comercial</label>
              <input type="text" class="form-control" value="<?=$consulta["telefone_usu"];?>" name="txtTelefone" maxlength="10"> </div>
			  <div class="form-group">
              <label>CEP</label>
              <input type="text" class="form-control" value="<?=$consulta["cep"];?>" name="txtCep" maxlength="8"> </div>
			  <div class="form-group">
              <label for="exampleInputEmail1">UF</label>
              <select class="custom-control custom-select" name="txtUf">
                <option value="<?=$consulta["estado"];?>"><?php echo $consulta["estado"]; ?></option>
              </select>
            </div>
			<div class="form-group">
              <label for="exampleInputEmail1">Cidade</label>
              <select class="custom-control custom-select" name="txtCidade">
                <option value="<?=$consulta["cidade"];?>"><?php echo $consulta["cidade"]; ?></option>
              </select>
            </div>
			<div class="form-group">
              <label for="exampleInputEmail1">Bairro</label>
              <select class="custom-control custom-select" name="txtBairro">
                <option value="<?=$consulta["bairro"];?>"><?php echo $consulta["bairro"]; ?></option>
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
              <input type="text" class="form-control" value="<?=$consulta["endereco"];?>" name="txtEndereco" maxlength="80"> </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="btnAlterar">Alterar</button>
		  </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Fim Modal Editar ADM-->
  
     <!-- inicio Modal Desativar ADM-->	
  <div class="modal" id="modal_desativar<?=$consulta["id_usu"];?>">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Desativar Papelaria</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span>×</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Tem certeza que deseja desativar esta papelaria do sistema ?</p>
        </div>
		 <form class="" method="post">
            <div class="form-group">
			<input type="text" style="display:none" name="id" maxlength="14" class="form-control"  value="<?=$consulta["id_usu"];?>">
			</div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="btnDesativar">Sim</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
		  </form>
        </div>
      </div>
    </div>
  </div>  
  
    <!-- inicio Modal ativar ADM-->	
  <div class="modal" id="modal_ativar<?=$consulta["id_usu"];?>">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ativar Papelaria</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span>×</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Tem certeza que deseja ativar esta papelaria do sistema ?</p>
        </div>
		 <form class="" method="post">
            <div class="form-group">
			<input type="text" style="display:none" name="id" maxlength="14" class="form-control"  value="<?=$consulta["id_usu"];?>">
			</div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="btnAtivar">Sim</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
		  </form>
        </div>
      </div>
    </div>
  </div> 
  
  <!-- inicio Modal alterar senha Emp-->
 <div class="modal" id="modal_senha<?=$consulta["id_usu"];?>">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" >
          <h5 class="modal-title">Alterar Senha&nbsp;</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span>×</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" method="post">
            <div class="form-group">
              <label>Nova senha</label>
			  <input type="text" style="display:none" name="id" maxlength="14" class="form-control"  value="<?=$consulta["id_usu"];?>">
              <input type="password" class="form-control" name="txtSenha" maxlength="40" required> </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="btnAlterar_senha">Alterar</button>
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
  		    $('#id_listaPapelarias').DataTable({
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
/*Código editar Pap*/				
	if (isset($_POST['btnAlterar'])) {
				
					
		$nome  = $_POST['txtNome'];
		$email = ($_POST['txtEmail']);
		$cnpj = ($_POST['txtCnpj']);
		$telefone  = $_POST['txtTelefone'];
		$cep = ($_POST['txtCep']);
		$uf = ($_POST['txtUf']);
		$cidade  = $_POST['txtCidade'];
		$bairro  = $_POST['txtBairro'];
		$endereco = ($_POST['txtEndereco']);
		$id = $_POST['id'];
		
				
		if ($administrativoDao->alterarPap($id, $nome, $email, $cnpj, $telefone, $cep, $uf, $cidade, $bairro, $endereco)) {
		}	
		?>
			<script type="text/javascript">
				alert("Cadastro alterado com suscesso!");
				window.location = '?pagina=papelarias';
			</script>
		<?php

	}
	
	/*Código Desativar e ativar  EMP*/				
	if (isset($_POST['btnAtivar'])) {
				
		$id_usu = $_POST['id'];
		$status_usu = 1;
				
		if ($administrativoDao->ativarUsu($id_usu, $status_usu)) {
		}
		?>
			<script type="text/javascript">
				alert("Papelaria ativada com suscesso!!");
				window.location = '?pagina=papelarias';
			</script>
		<?php
	}
	
		if (isset($_POST['btnDesativar'])) {
				
		$id_usu = $_POST['id'];
		$status_usu = 2;
				
		if ($administrativoDao->desativarUsu($id_usu, $status_usu)) {
		}
		?>
			<script type="text/javascript">
				alert("Papelaria desativada com suscesso!");
				window.location = '?pagina=papelarias';
			</script>
		<?php
	}
	
/*Código alterar senha ADM*/	
	if (isset($_POST['btnAlterar_senha'])) {
				
					
		$senha_usu  = (md5($_POST['txtSenha']));
		$id_usu = $_POST['id'];
				
		if ($administrativoDao->alterarSenhaUsu($id_usu, $senha_usu)) {
		}
		?>
			<script type="text/javascript">
				alert("Senha alterada com suscesso!");
				window.location = '?pagina=papelarias';
			</script>
		<?php
	}
	
?> 
  