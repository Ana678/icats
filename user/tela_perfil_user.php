<?php 
include("../config.php");
session_start();

/* -------------- CONSULTA NO BANCO OS DADOS USUÁRIO -------------- */

$codigouser=$_SESSION['codigouser'];
$consultaDadosUser=$MYSQLi->query("SELECT * FROM TB_USUARIOS WHERE USU_CODIGO=$codigouser");
$resultadoDadosUser=$consultaDadosUser->fetch_assoc();

/* ---------------------------------------------------------------- */
?>

<?php include("../design_cabecalho_user.php"); ?>
<div class="col-lg-11 mt-2">
    <div class="card">
        <div class="card-body">
            <div class="media mb-2">
                <div class="media-body">
                    <h4 class="mb-3">Perfil do usuário</h4> 
                    <h6>Nome: <?php echo $resultadoDadosUser['USU_NOME']; ?></h6>
                    <h6>Email: <?php echo $resultadoDadosUser['USU_EMAIL']; ?></h6>
                    <h6>Senha: <?php $count = strlen($resultadoDadosUser['USU_SENHA']); /* conta os caracteres da senha */
                    
                        for($i=0; $i < $count;$i++){
                            echo '*'.'<nobr>'; /* substitui por um asterisco */
                        }
                     ?>
                     </h6>
                    <h6>Celular: <?php echo $resultadoDadosUser['USU_TELEFONE']; ?></h6>
                </div>
                <img class="img-fluid ml-4" src="/uploads/<?php echo $resultadoDadosUser['USU_FOTO']; ?>" alt="image" style="width: 150px;height:150px; border-radius: 50%;" > 
            </div>
            <button type="button" class="btn btn-rounded btn-primary mb-3 ml-2 mr-2" onclick="location.href='tela_editar_user.php';" >EDITAR USUÁRIO &nbsp;<i class="ti-pencil"></i></button>
        </div>
    </div>
</div>


<?php include("../design_rodape.php"); ?>