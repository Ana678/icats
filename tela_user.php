<?php  
include('verifica_user.php');
include('config.php');
$consulta = $MYSQLi->query("SELECT * FROM TB_GATOS");

include("design_cabecalho_user.php"); 

?>
<div class="row">
	<div class="col-12 mt-2">
		<div class="card">
			<div class="card-body">
				<h4 class="header-title text-center" style="margin-bottom: 25px">TABELA DE ACOMPANHAMENTO DOS GATOS</h4>
				<div class="single-table">
					<div class="table-responsive">
						<table class="table table-hover progress-table">
							<thead class="text-uppercase">
								<tr>
									<th scope="col">Nome</th>
									<th scope="col">Última Edição</th>
									<th  scope="col">Peso</th>
									<th  scope="col">Humor</th>
									<th scope="col" style="text-align:center">Como o gato está?</th>
								</tr>
							</thead>
							<tbody>
									<?php while($resultado = $consulta->fetch_assoc()){ ?> 
									<tr>
										<td><img src="uploads/<?php echo $resultado['GAT_FOTO']; ?>" style="width: 45px; height:45px;border-radius:100%">
											<?php echo $resultado['GAT_NOME']; ?></td>
											<td></td>
											<td></td>
											<td></td>
											<td style="text-align:center">
												<button type="button" class="btn btn-secondary" style="border-radius:40px;" data-toggle="modal"  data-target="#exampleModalCenter">Adicionar</button>
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
															<div class="modal-body text-left">
																<p style="text-align:left">
																	Você escolheu cuidar esse animal e será agora responsável por cuidar dele em caso de necessidades, por isso adicione e acompanhe o seu estado de saúde.
																</p>
																<br>
																<h4 class="header-title text-left">Cadastro de estado de saúde:</h4>
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
																<a href="tela_user.php" style="text-decoration: none;"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button></a>
																<a href=""><button type="button" class="btn btn-primary">Cadastrar</button></a> 

															</div>
														</div>
													</div>
												</div>
												<!--            FIM 		DO        MODAL                       -->
											</td>

										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include("design_rodape.php"); ?>