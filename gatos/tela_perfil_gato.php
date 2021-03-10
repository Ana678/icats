<?php 
include("../config.php");
session_start();
$codigouser=$_SESSION['codigouser'];
    
/* --- codigos para pegar dados do usuário e do estado de saude pelo código(gato) da url ---- */    

if(isset($_GET['codigo'])){
    $codigoGato = $_GET['codigo'];

    $consultaGato=$MYSQLi->query("SELECT * FROM TB_GATOS JOIN TB_SEXOS ON GAT_SEX_CODIGO = SEX_CODIGO WHERE GAT_CODIGO = $codigoGato");
    $resultadoGato=$consultaGato->fetch_assoc();

    $consultaEstadoSaude = $MYSQLi->query("SELECT *,date_format(EST_DATA,'%d.%m.%Y') AS DATA FROM TB_EST_SAUDE JOIN TB_HUMORES ON EST_HUM_CODIGO = HUM_CODIGO WHERE EST_GAT_CODIGO= $codigoGato ORDER BY EST_DATA DESC");
}
/* ----------------------------------------------------------------------------------------- */
if(isset($_GET['excluir'])){
    $codigoExcluirEstado = $_GET['excluir'];

    $consultaDeleteEstadosSaude=$MYSQLi->query("DELETE FROM TB_EST_SAUDE WHERE EST_CODIGO=$codigoExcluirEstado;");
}
include("../design_cabecalho_user.php");
?>



<div class="row justify-content-center mb-2">
    <div class="col-lg-8 mt-2">
        <div class="card">
            <div class="card-body">
                <div class="media mb-2">
                    <div class="media-body">
                        <h4 class="mb-3">Perfil do gato</h4> 
                        <h6>Nome: &nbsp;<?php echo $resultadoGato['GAT_NOME']; ?></h6>
                        <h6>Sexo: &nbsp;<?php echo $resultadoGato['SEX_SEXO']; ?></h6>
                        <h6>Idade: &nbsp;<?php echo $resultadoGato['GAT_IDADE'] ?>&nbsp;aninhos</h6>
                    </div>
                    <img class="img-fluid ml-4" src="../uploads/<?php echo $resultadoGato['GAT_FOTO'] ?>" alt="image" style="width: 120px;height:120px; border-radius: 50%;" >
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mt-2">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title text-center" style="margin-bottom: 25px">TABELA DE ACOMPANHAMENTO DE <span style="text-transform: uppercase">&nbsp;<?php echo $resultadoGato['GAT_NOME']; ?></span</h4>
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
                                <?php while($resultadoEstadoSaude = $consultaEstadoSaude->fetch_assoc()){ ?>
                                    <tr>
                                        <td><?php echo $resultadoEstadoSaude['DATA'];?></td>
                                        <td><?php echo $resultadoEstadoSaude['EST_PESO']; ?>&nbsp;kg</td>
                                        <td><?php echo $resultadoEstadoSaude['HUM_HUMOR']; ?></td>
                                        <td style="text-align:center">
                                        <button type="button" class="btn btn-rounded btn-primary mb-1 ml-2 mr-2" onclick="location.href='tela_editar_estado_de_saude.php?editar=<?php echo $resultadoEstadoSaude['EST_CODIGO']; ?>';" >EDITAR  &nbsp;<i class="ti-pencil"></i></button> 
                                        <form class="d-inline" action="?codigo=<?php echo $codigoGato ?>&&excluir=<?php echo $resultadoEstadoSaude['EST_CODIGO']; ?>" method="POST">
                                            <button type="submit" class="btn btn-rounded btn-primary mb-1 ml-2 mr-2">EXCLUIR  &nbsp;<i class="ti-trash"></i></button> 
                                        </form>
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


<?php include("../design_rodape.php"); ?>