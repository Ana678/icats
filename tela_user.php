<?php   
include('verifica_user.php');
include('config.php');

$codigouser=$_SESSION['codigouser'];

$consultaGatos = $MYSQLi->query("SELECT * FROM TB_GATOS WHERE GAT_USU_CODIGO = $codigouser");
$consultaHumores = $MYSQLi->query("SELECT * FROM TB_HUMORES");

if(isset($_POST['nomeGato'])){ 
	
	$codNome  = $_POST['nomeGato'];
	$codHumor = $_POST['humor'];
	$peso     = $_POST['peso'];
	$data     = $_POST['data'];
	
    $consultaInsert=$MYSQLi->query("INSERT INTO TB_EST_SAUDE (EST_DATA,EST_PESO,EST_GAT_CODIGO,EST_HUM_CODIGO) VALUES ('$data',$peso,$codNome,$codHumor)");

	
	header("Location:tela_user.php");
}

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
									<?php while($resultadoGatos = $consultaGatos->fetch_assoc()){ 
											$codGato=$resultadoGatos['GAT_CODIGO'];
											$consultaEstadoSaude = $MYSQLi->query("SELECT *,date_format(EST_DATA,'%d.%m.%Y') AS DATA FROM TB_EST_SAUDE JOIN TB_HUMORES ON EST_HUM_CODIGO = HUM_CODIGO WHERE EST_GAT_CODIGO= $codGato ORDER BY EST_DATA DESC LIMIT 1");
											$resultadoEstadoSaude = $consultaEstadoSaude->fetch_assoc();
										

											$primeiroNome = explode(" ", $resultadoGatos['GAT_NOME']); 
									?> 
									<tr>
										<td><img src="uploads/<?php echo $resultadoGatos['GAT_FOTO']; ?>" style="width: 45px; height:45px;border-radius:100%">
										&nbsp;<?php echo current($primeiroNome); ?></td>

											<?php if(isset($resultadoEstadoSaude['DATA']) && isset($resultadoEstadoSaude['EST_PESO']) && isset($resultadoEstadoSaude['HUM_HUMOR'])){ ?>
											
											<td><?php echo $resultadoEstadoSaude['DATA'];?></td>
											<td><?php echo $resultadoEstadoSaude['EST_PESO']; ?></td>
											<td><?php echo $resultadoEstadoSaude['HUM_HUMOR']; ?></td>

											<?php }else{ ?>
											
											<td></td>
											<td></td>
											<td></td>

											<?php } ?>
											<td style="text-align:center">
												<a  data-toggle="modal"  data-target="#exampleModalCenter">
													<button type="button" class="btn btn-secondary" style="border-radius:40px;">Adicionar</button>
												</a>
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
																			<select class="custom-select" name="nomeGato">
																				<?php 
																					$consultaNomesGatos = $MYSQLi->query("SELECT * FROM TB_GATOS WHERE GAT_USU_CODIGO = $codigouser");

																					while($resultadoNomesGatos = $consultaNomesGatos->fetch_assoc()){ ?>
																					
																					<option value="<?php echo $resultadoNomesGatos['GAT_CODIGO'];?>"<?php 
																						if($resultadoNomesGatos['GAT_CODIGO'] == $codGato)
																							echo "selected";
																						?>>
																					<?php echo $resultadoNomesGatos['GAT_NOME']; ?>
																					</option>
																				<?php } ?>
																			</select>
																		</div>
																		<div class="form-group">
																			<label class="col-form-label">Humor do gato:</label>
																			<select class="custom-select" name="humor">
																				<?php while($resultadoHumores = $consultaHumores->fetch_assoc()){ ?>

																					<option value="<?php echo $resultadoHumores['HUM_CODIGO'];?>">
																					<?php echo $resultadoHumores['HUM_HUMOR']; ?>
																					</option>
																				<?php } ?>
																			</select>
																		</div>
																		<div class="form-group">
																			<label class="col-form-label">Peso do gato:</label>
																			<div class="input-group">
																				<input type="number" onchange="setTwoNumberDecimal" min="0.1" max="100" step="0.1" id="peso" name="peso" placeholder="3.5" class="form-control">&nbsp; Kg
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-form-label">Data de cadastro:</label>
																			<div class="input-group">
																				<input type="date" id="data" name="data" placeholder="Data de cadastro" class="form-control">
																			</div>
																		</div>
																	
														
															</div>
															<div class="modal-footer">
																<a href="tela_user.php" style="text-decoration: none;"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button></a>
																<button type="submit" class="btn btn-primary">Cadastrar</button>

															</div>
															</form>
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