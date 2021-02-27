<?php 
include("config.php");
session_start();
$codigo=$_SESSION['codigouser'];
$consulta=$MYSQLi->query("SELECT * FROM TB_USUARIOS WHERE USU_CODIGO=$codigo");
$resultado=$consulta->fetch_assoc();
$consulta2=$MYSQLi->query("SELECT * FROM tb_apadrinhamentos JOIN tb_animais ON APA_ANI_CODIGO=ANI_CODIGO JOIN tb_usuarios ON APA_USU_CODIGO=USU_CODIGO WHERE USU_CODIGO=$codigo");
?>

<?php include("design_cabecalho_user.php"); ?>
<div class="col-lg-11 mt-2">
    <div class="card">
        <div class="card-body">
            <div class="media mb-2">
                <div class="media-body">
                    <h4 class="mb-3">Perfil do usuário</h4> 
                    <h6>Nome: Joana de Araújo</h6>
                    <h6>Email: joana@hotmail.com</h6>
                    <h6>Senha: **********</h6>
                    <h6>Celular:84 999234456</h6>
                </div>
                <img class="img-fluid ml-4" src="https://i.pinimg.com/originals/aa/44/30/aa443099466ac6990767ecd8eff4444a.jpg" alt="image" style="width: 150px;height:150px; border-radius: 50%;" > 
            </div>
            <button type="button" class="btn btn-rounded btn-primary mb-3 ml-2 mr-2" onclick="location.href='tela_editar_user.php';" >EDITAR USUÁRIO &nbsp;<i class="ti-pencil"></i></button>
        </div>
    </div>
</div>


<?php include("design_rodape.php"); ?>