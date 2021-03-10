<?php  
include('../login/verifica_user.php');
include("../config.php");

/* -------------- CONSULTA NO BANCO OS DADOS DOS GATOS DO USUÁRIO -------------- */
$codigouser=$_SESSION['codigouser'];
$consultaGatos = $MYSQLi->query("SELECT * FROM TB_GATOS WHERE GAT_USU_CODIGO = $codigouser");

/* ----------------------------------------------------------------------------- */

include("../design_cabecalho_user.php");

?>


<div class="card-area">
	<div class="row">
		<?php while($resultado = $consultaGatos->fetch_assoc()){ ?>
			<div class="col-lg-4 col-md-6 mt-5">
				<div class="card card-bordered" style="border-radius:40px;">

					<div class="card-body">
						<h3><img class="imgcard-img-top img-fluid" style="width: 50px; height: 50px;margin:10px;border-radius:100%" src="../uploads/<?php echo $resultado['GAT_FOTO']; ?>" alt="imagem de perfil do">
						<?php echo $resultado['GAT_NOME']; ?></h3>
						<h6><?php echo $resultado['GAT_DESCRICAO']; ?></h6><br>
						<div class="row align-center justify-content-center">
							<button type="button" class="btn btn-rounded btn-primary mb-3 ml-2 mr-2" onclick="location.href='tela_perfil_gato.php?codigo=<?php echo $resultado['GAT_CODIGO']; ?>';" >VER GATO &nbsp;<i class="ti-eye"></i></button> 
							<button type="button" class="btn btn-rounded btn-primary mb-3 ml-2 mr-2" onclick="location.href='tela_editar_gato.php?codigo=<?php echo $resultado['GAT_CODIGO']; ?>';" >EDITAR GATO &nbsp;<i class="ti-pencil"></i></button> 
							<button type="button" class="btn btn-rounded btn-primary mb-3 ml-2 mr-2" style="border-radius:40px;" onclick="location.href='tela_cadastro_estado_de_saude.php?addByListar=<?php echo $resultado['GAT_CODIGO']; ?>';">NOVO ESTADO<i class="ti-plus"></i></button>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
<?php include("../design_rodape.php"); ?>
