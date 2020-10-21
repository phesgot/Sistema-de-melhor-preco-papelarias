		<?php
			require_once("../Classes/DAO/AdministrativoDAO.php");
			
			$administrativoDao = new AdministrativoDAO();
		?>
<div >
  <br>
</div> 
    <div class="section" id="listarAdministradores">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h1>
              <i class="fa fa-fw fa-users"></i>Administradores</h1>
          </div>
          <div class="col-md-6">
            <div class="btn-group btn-group-justified">
              <a href='?pagina=cadastrar_adm' class="btn btn-primary"><i class="fa fa-fw fa-user-plus"></i>Novo Administrador</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <table class="table table-striped table-bordered" id="id_listarAdministradores" cellspacing="0" width="100%">
              <thead>
                <tr>
					<th>Status</th>
					<th>Nome</th>
					<th>E-mail</th>
					<th>Telefone</th>
					<th>Ações</th>
                </tr>
              </thead>
              <tbody>
<?php
	foreach($administrativoDao->retornarInformacoesADM() as $consulta ){
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
                  
                  <td><?=$consulta["email_usu"];?></td>
                  <td><?=$consulta["telefone_usu"];?></td>
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
                   </i>
                  </td>
                </tr>
 <!-- Inicio Modal Vizualisar ADM--> 
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
                <h5 class="mb-1"><b>Nome</b></h5>
              </div>
              <p class="mb-1"><b><?php echo $consulta["nome_usu"]; ?></b></p>
        
            
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">E-mail</h5>
              </div>
              <p class="mb-1"><?php echo $consulta["email_usu"]; ?></p>
           
            
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><b>CPF</b></h5>
              </div>
              <p class="mb-1"><b><?php echo $consulta["cpf_usu"]; ?></b></p>
           
            
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
  <!-- Fim Modal Visualizar ADM-->
				
				
				
<!-- Inicio Modal Editar ADM-->
<div class="modal" id="modal_editar<?=$consulta["id_usu"];?>">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Administrador</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span>×</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" method="post">
            <div class="form-group">
			<input type="text" style="display:none" name="id" maxlength="14" class="form-control"  value="<?=$consulta["id_usu"];?>">
              <label>Nome</label>
              <input type="text" class="form-control" maxlength="80" name="txtNome" value="<?=$consulta["nome_usu"];?>"> </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="txtEmail" maxlength="40" class="form-control" value="<?=$consulta["email_usu"];?>"> </div>
            <div class="form-group">
              <label>CPF</label>
              <input id="cpf" type="text" name="txtCpf" maxlength="14" class="form-control"  readonly="true" value="<?=$consulta["cpf_usu"];?>">
			  
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="btnAlterar" >Alterar</button>
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
          <h5 class="modal-title">Desativar Administrador</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span>×</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Tem certeza que deseja desativar este administrador do sistema ?</p>
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
          <h5 class="modal-title">Ativar Administrador</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span>×</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Tem certeza que deseja ativar este administrador do sistema ?</p>
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

<!-- inicio Modal alterar senha ADM-->
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
  		    $('#id_listarAdministradores').DataTable({
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
/*Código editar ADM*/				
	if (isset($_POST['btnAlterar'])) {
				
					
		$nome  = $_POST['txtNome'];
		$email = $_POST['txtEmail'];
		$id_usu = $_POST['id'];
		
				
		if ($administrativoDao->alterarUsu($id_usu, $nome, $email )) {
		}
		?>
			<script type="text/javascript">
				alert("Cadastro alterado com suscesso!");
				window.location = '?pagina=administradores';
			</script>
		<?php
	}
	
	/*Código Desativar e ativar  ADM*/				
	if (isset($_POST['btnAtivar'])) {
				
		$id_usu = $_POST['id'];
		$status_usu = 1;
				
		if ($administrativoDao->ativarUsu($id_usu, $status_usu)) {
		}
		?>
			<script type="text/javascript">
				alert("Administrador ativado com suscesso!!");
				window.location = '?pagina=administradores';
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
				alert("Administrador desativado com suscesso!");
				window.location = '?pagina=administradores';
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
				window.location = '?pagina=administradores';
			</script>
		<?php
	}
	
?>   