<?php
		
	require_once("Classes/DAO/listarDao.php");
	
	$listarDao = new ListarDao();
?>
	
<div class="section">
	<div class="container-fluid">
		<div class="row">
     
			
<?php
	$i=0;
	foreach($listarDao->retornarInformacoes() as $consulta ){
?>

					<div class="col-xl-2 col-md-4 col-sm-6 mb-3">
						<div class="card text-black bg-light o-hidden h-100">

							<div class="card-body">
								<img title="visualizar produto" src="upImagem/<?=$consulta["imagem_pro"];?>" class="img-fluid mx-auto d-block" height="80" width="80">
								<?=$consulta["nome_pro"];?>
								<p style="color:green; font-size:12px;">Vendido por: <?=$consulta["nome_usu"];?></p>	
								<p style="color:orange;">R$<?=number_format($consulta["preco_pro"] / 100, 2, ',', '');?></p>		
							</div>
							<a href='?pagina=viewAnuncio&cod=<?=$consulta["id_pro"];?>' class="card-footer text-black bg-info clearfix small z-1">
								<span class="float-left">Ver Detalhes</span>
								<span class="float-right">
									<i class="fa fa-angle-right"></i>
								</span>
							</a>
						</div>
					</div>

<?php
	$i++;
	if($i == 20){
	break;
	}
	}
?> 
			  
          
		</div>
	</div>
</div>