<?php   
include('login/verifica_user.php');
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

	
	header("Location:tela_principal.php");
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
												<a  href="gatos/tela_cadastro_estado_de_saude.php?addByPrincipal=<?php echo $codGato ?>">
													<button type="button" class="btn btn-secondary" style="border-radius:40px;">Adicionar</button>
												</a>
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