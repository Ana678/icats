<?php   
include('login/verifica_user.php');
include('config.php');

$codigouser=$_SESSION['codigouser'];

/* -------------- CONSULTA PARA PEGAR TODOS OS GATOS DO USUARIO ------------------- */
$consultaGatos = $MYSQLi->query("SELECT * FROM TB_GATOS WHERE GAT_USU_CODIGO = $codigouser");
/* ----------------------------------------------------------------- */

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
								<?php if(mysqli_num_rows ($consultaGatos)>0){ // se tiver algum gato cadastrado ....
											while($resultadoGatos = $consultaGatos->fetch_assoc()){ 
											/* --- Seleciona em 'TB_EST_SAUDE' o ultimo registro do estado de saúde do gato --- */
											$codGato=$resultadoGatos['GAT_CODIGO'];
											$consultaEstadoSaude = $MYSQLi->query("SELECT *,date_format(EST_DATA,'%d.%m.%Y') AS DATA FROM TB_EST_SAUDE JOIN TB_HUMORES ON EST_HUM_CODIGO = HUM_CODIGO WHERE EST_GAT_CODIGO= $codGato ORDER BY EST_DATA DESC LIMIT 1");
											$resultadoEstadoSaude = $consultaEstadoSaude->fetch_assoc();

											$primeiroNome = explode(" ", $resultadoGatos['GAT_NOME']); /* pega apenas o primeiro nome */

											/* -------------------------------------------------------------------------------- */
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
												<a  href="gatos/tela_cadastro_estado_de_saude.php?addByPrincipal=<?php echo $codGato ?>">
													<button type="button" class="btn btn-secondary" style="border-radius:40px;">Adicionar</button>
												</a>
											</td>
										</tr>
									<?php }}else{ ?>
											
											<tr class="text-center">
												<td></td>
												<td></td>
												<td class="text-center" style="padding:50px; font-size:16px">Você Não Cadastrou Nenhum Gato!<br>
												<button type="button" class="btn btn-rounded btn-primary ml-2 mr-2 mt-4" onclick="location.href='/icats/gatos/tela_cadastro_gato.php';" >CADASTRAR O PRIMEIRO GATO</button> 
												</td>
												<td></td>
												<td></td>
												
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