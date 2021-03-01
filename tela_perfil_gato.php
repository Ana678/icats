<?php 
include("config.php");
session_start();
$codigouser=$_SESSION['codigouser'];

if(isset($_GET['codigo'])){
    $codigoGato = $_GET['codigo'];

    $consultaGato=$MYSQLi->query("SELECT * FROM TB_GATOS WHERE GAT_CODIGO = $codigoGato");
    $resultado=$consultaGato->fetch_assoc();
    $sexo = $resultado['GAT_SEX_CODIGO'];
    $consultaSexo=$MYSQLi->query("SELECT SEX_SEXO FROM TB_SEXOS WHERE SEX_CODIGO = $sexo");
    $resultadoSexo=$consultaSexo->fetch_assoc();

    $consultaEstadoSaude =$MYSQLi->query("SELECT * FROM TB_EST_SAUDE WHERE EST_GAT_CODIGO = $codigoGato");
}

include("design_cabecalho_user.php");
?>



<div class="row justify-content-center mb-2">
    <div class="col-lg-8 mt-2">
        <div class="card">
            <div class="card-body">
                <div class="media mb-2">
                    <div class="media-body">
                        <h4 class="mb-3">Perfil do gato</h4> 
                        <h6>Nome: <?php echo $resultado['GAT_NOME']; ?></h6>
                        <h6>Sexo: <?php echo $resultadoSexo['SEX_SEXO']; ?></h6>
                        <h6>Idade: <?php echo $resultado['GAT_IDADE'] ?> aninhos</h6>
                    </div>
                    <img class="img-fluid ml-4" src="uploads/<?php echo $resultado['GAT_FOTO'] ?>" alt="image" style="width: 120px;height:120px; border-radius: 50%;" >
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title text-center" style="margin-bottom: 25px">TABELA DE ACOMPANHAMENTO DO BILL</h4>
                <div class="single-table">
                    <div class="table-responsive">
                        <table class="table table-hover progress-table">
                            <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">Data</th>
                                    <th  scope="col">Peso</th>
                                    <th  scope="col">Humor</th>
                                    <th scope="col" style="text-align:center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                        <td>25/08/21</td>
                                        <td>3 kg</td>
                                        <td>10 - muito bem</td>
                                        <td style="text-align:center">
                                        <button type="button" class="btn btn-rounded btn-primary mb-3 ml-2 mr-2" onclick="location.href='tela_editar_gato.php?codigo=<?php echo $codigoGato; ?>';" >EDITAR ESTADO &nbsp;<i class="ti-pencil"></i></button> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>20/08/21</td>
                                        <td>3 kg</td>
                                        <td>10 - muito bem</td>
                                        <td style="text-align:center">
                                        <button type="button" class="btn btn-rounded btn-primary mb-3 ml-2 mr-2" onclick="location.href='tela_editar_gato.php?codigo=<?php echo $codigoGato; ?>';" >EDITAR ESTADO &nbsp;<i class="ti-pencil"></i></button> 
                                        </td>
                                    </tr>
                                <?php while($resultadoEstadoSaude = $consultaEstadoSaude->fetch_assoc()){ ?>
                                    <tr>
                                        <td>25/08/21</td>
                                        <td>3 kg</td>
                                        <td>10 - muito bem</td>
                                        <td style="text-align:center">
                                        <button type="button" class="btn btn-rounded btn-primary mb-3 ml-2 mr-2" onclick="location.href='tela_editar_gato.php?codigo=<?php echo $codigoGato; ?>';" >EDITAR GATO &nbsp;<i class="ti-pencil"></i></button> 
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