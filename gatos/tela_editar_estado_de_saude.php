<?php
include("../config.php");
session_start();

$codigouser=$_SESSION['codigouser'];

if(isset($_GET['editar'])){

  $codigoEstadoSaude = $_GET['editar'];
  $consultaDadosGato=$MYSQLi->query("SELECT * FROM TB_EST_SAUDE JOIN TB_GATOS ON EST_GAT_CODIGO = GAT_CODIGO WHERE EST_CODIGO =  $codigoEstadoSaude;");
  $resultadoDadosGato=$consultaDadosGato->fetch_assoc();
  $consultaHumores = $MYSQLi->query("SELECT * FROM TB_HUMORES");
  $codGato = $resultadoDadosGato['GAT_CODIGO'];

  if(isset($_POST['nomeGato'])){ 
	
    $codNome  = $_POST['nomeGato'];
    $codHumor = $_POST['humor'];
    $peso     = $_POST['peso'];
    $data     = $_POST['data'];
    
    $consultaUpdate=$MYSQLi->query("UPDATE TB_EST_SAUDE SET EST_HUM_CODIGO='$codHumor',EST_GAT_CODIGO='$codNome',EST_PESO='$peso',EST_DATA='$data' WHERE EST_CODIGO=$codigoEstadoSaude;");
    
    header("Location:tela_perfil_gato.php?codigo=$codGato");
  }
}

?>
<?php include("../design_cabecalho_user.php"); ?>

<div class="row">
  <div class="col-lg-10 col-ml-12">
    <div class="row">
      <!-- basic form start -->
      <div class="col-12 mt-5">
        <div class="card">
          <div class="card-body">
            <h4 class="header-title">Editar Estado de saúde:</h4>
          <form action="?editar=<?php echo $codigoEstadoSaude ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
              <div class="form-group">
                <label class="col-form-label">Nome do gato:</label>
                <select class="custom-select" name="nomeGato">
                    <?php 
                      $consultaNomesGatos = $MYSQLi->query("SELECT * FROM TB_GATOS WHERE GAT_USU_CODIGO = $codigouser");

                      while($resultadoNomesGatos = $consultaNomesGatos->fetch_assoc()){ ?>
                      
                      <option value="<?php echo $resultadoNomesGatos['GAT_CODIGO'];?>"<?php 
                        if($resultadoNomesGatos['GAT_CODIGO'] == $resultadoDadosGato['GAT_CODIGO'])
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
                      <option value="<?php echo $resultadoHumores['HUM_CODIGO'];?>"<?php
                      if($resultadoDadosGato['EST_HUM_CODIGO'] == $resultadoHumores['HUM_CODIGO'])echo "selected";
                      ?>>
                      <?php echo $resultadoHumores['HUM_HUMOR']; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="col-form-label">Peso do gato:</label>
                  <div class="input-group">
                    <input value="<?php echo $resultadoDadosGato['EST_PESO']; ?>" type="text" id="peso" name="peso" placeholder="3" class="form-control">&nbsp; Kg
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-form-label">Data de cadastro:</label>
                  <div class="input-group">
                    <input value="<?php echo $resultadoDadosGato['EST_DATA']; ?>" type="date" id="data" name="data" placeholder="Data de cadastro" class="form-control">
                  </div>
                </div>
                <div class="form-group text-center mt-4">
                  <button type="button" class="btn btn-rounded btn-primary mb-3 ml-3 mr-3 pr-5 pl-5" onclick="location.href='tela_perfil_gato.php?codigo=<?php echo $resultadoDadosGato['GAT_CODIGO'];?>'">Voltar</button>
                  <button type="submit" class="btn btn-rounded btn-primary mb-3 ml-3 mr-3 pr-5 pl-5">Editar</button>
                </div>
              </form>          
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php include("../design_rodape.php"); ?>