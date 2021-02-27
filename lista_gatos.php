<?php  
include('verifica_user.php');
include("config.php");

$codigouser=$_SESSION['codigouser'];

$consultaGatos = $MYSQLi->query("SELECT * FROM TB_GATOS WHERE GAT_USU_CODIGO = $codigouser");

include("design_cabecalho_user.php");
?>


<div class="card-area">
	<div class="row">
		<?php while($resultado = $consultaGatos->fetch_assoc()){ ?>
			<div class="col-lg-4 col-md-6 mt-5">
				<div class="card card-bordered" style="border-radius:40px;">

					<div class="card-body">
						<h3><img class="card-img-top img-fluid" style="width: 50px; heigth: 50px;margin:10px;border-radius:100%" src="uploads/<?php echo $resultado['GAT_FOTO']; ?>" alt="image">
						<?php echo $resultado['GAT_NOME']; ?></h3>
						<h6><?php echo $resultado['GAT_DESCRICAO']; ?></h6><br>
						<div class="row align-center justify-content-center">
							<button type="button" class="btn btn-rounded btn-primary mb-3 ml-2 mr-2" onclick="location.href='tela_perfil_gato.php?codigo=<?php echo $resultado['GAT_CODIGO']; ?>';" >VER GATO &nbsp;<i class="ti-eye"></i></button> 
							<button type="button" class="btn btn-rounded btn-primary mb-3 ml-2 mr-2" onclick="location.href='tela_editar_gato.php?codigo=<?php echo $resultado['GAT_CODIGO']; ?>';" >EDITAR GATO &nbsp;<i class="ti-pencil"></i></button> 
							<button type="button" class="btn btn-rounded btn-primary mb-3 ml-2 mr-2" style="border-radius:40px;" data-toggle="modal" data-target="#exampleModalCenter">NOVO ESTADO<i class="ti-plus"></i></button>

							<!--                    MODAL                       -->
							<div class="modal fade" id="exampleModalCenter">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" >Adicionar estado de saúde</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<p>
												Você escolheu cuidar esse animal e será agora responsável por cuidar dele em caso de necessidades, por isso adicione e acompanhe o seu estado de saúde.
											</p>
											<br>
												<h4 class="header-title">Cadastro de estado de saúde:</h4>

												<!--botei esse formulario pra poder servir de exemplo aninha, mas pode fazer do jeito que vc achar melhor-->
												<form action="?" method="POST" class="form-horizontal" enctype="multipart/form-data">
													<div class="form-group">
														<label class="col-form-label">Nome do gato:</label>
														<select class="custom-select" name="humor">
															<option selected="selected" value="1">Ximbica</option>
															<option value="2">Manoel</option>
															<option value="10">Paulino</option>
														</select>
													</div>
													<div class="form-group">
														<label class="col-form-label">Humor do gato:</label>
														<select class="custom-select" name="humor">
															<option selected="selected" value="1">Muito triste</option>
															<option value="2">Triste</option>
															<option value="10">Muito feliz</option>
														</select>
													</div>
													<div class="form-group">
														<label class="col-form-label">Peso do gato:</label>
														<div class="input-group">
															<input type="text" id="peso" name="peso" placeholder="3" class="form-control">&nbsp; Kg
														</div>
													</div>
													<div class="form-group">
														<label class="col-form-label">Data de cadastro:</label>
														<div class="input-group">
															<input type="date" id="data" name="data" placeholder="Data de cadastro" class="form-control">
														</div>
													</div>
												</form>						
										</div>
										<div class="modal-footer">
											<a href="tela_user.php" style="text-decoration: none;"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button></a>
											<a href=""><button type="button" class="btn btn-primary">Cadastrar</button></a> 

										</div>
									</div>
								</div>
							</div>
							<!--                    MODAL                       -->
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
<?php include("design_rodape.php"); ?>
