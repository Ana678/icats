<?php
include("../config.php");
session_start();

$codigouser=$_SESSION['codigouser'];
$consultaHumores = $MYSQLi->query("SELECT * FROM TB_HUMORES");

/* -------------- SE A REQUISIÇAO DE ADICIONAR ESTADO DE SAUDE VIER DA TELA PRINCIPAL -------------- */

if(isset($_GET['addByPrincipal'])){

    $codGato = $_GET['addByPrincipal'];
    $voltar = '../tela_principal.php'; /* codigo usado no botão de voltar */
    $codForm = '?addByPrincipal='.$codGato; /* codigo usado na action do form */

    if(isset($_POST['nomeGato'])){ 
      
      if($_POST['nomeGato'] != "" && $_POST['humor'] != "" && $_POST['peso'] != "" && $_POST['data'] != ""){
        
        $codNome  = $_POST['nomeGato'];
        $codHumor = $_POST['humor'];
        $peso     = $_POST['peso'];
        $data     = $_POST['data'];
        
          $consultaInsert=$MYSQLi->query("INSERT INTO TB_EST_SAUDE (EST_DATA,EST_PESO,EST_GAT_CODIGO,EST_HUM_CODIGO) VALUES ('$data',$peso,$codNome,$codHumor)");

        
        header("Location:../tela_principal.php");
      }else{
        echo "<script> alert('Preencha Todos os Campos Obrigatórios'); </script>";
      }
    }
}
/* ------------------------------------------------------------------------------------------------ */
/* -------- SE A REQUISIÇAO DE ADICIONAR ESTADO DE SAUDE VIER DA TELA DE LISTAGEM DE GATOS -------- */

if(isset($_GET['addByListar'])){

    $codGato = $_GET['addByListar'];
    $voltar = 'lista_gatos.php'; /* codigo usado no botão de voltar */
    $codForm = '?addByListar='.$codGato; /* codigo usado na action do form */

    if(isset($_POST['nomeGato'])){ 
      
      if($_POST['nomeGato'] != "" && $_POST['humor'] != "" && $_POST['peso'] != "" && $_POST['data'] != ""){
          
        $codNome  = $_POST['nomeGato'];
        $codHumor = $_POST['humor'];
        $peso     = $_POST['peso'];
        $data     = $_POST['data'];
      
        $consultaInsert=$MYSQLi->query("INSERT INTO TB_EST_SAUDE (EST_DATA,EST_PESO,EST_GAT_CODIGO,EST_HUM_CODIGO) VALUES ('$data',$peso,$codNome,$codHumor)");

	      header("Location:lista_gatos.php");
    }else{
      echo "<script> alert('Preencha Todos os Campos Obrigatórios'); </script>";
    }
  }
}
/* ------------------------------------------------------------------------------------------------ */

?>
<?php include("../design_cabecalho_user.php"); ?>

<div class="row">
  <div class="col-lg-10 col-ml-12">
    <div class="row">
      <!-- basic form start -->
      <div class="col-12 mt-5">
        <div class="card">
          <div class="card-body">
            <h4 class="header-title">Adicionar Estado de saúde: <spam style="color: #7e74ff; font-size:14px;float:right">Todos os Campos são Obrigatórios</spam></h4>
          <form action="<?php echo $codForm ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
                    <input type="number" step="0.1" id="peso" name="peso" placeholder="3" class="form-control">&nbsp; Kg
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-form-label">Data de cadastro:</label>
                  <div class="input-group">
                    <input type="date" id="data" name="data" placeholder="Data de cadastro" class="form-control">
                  </div>
                </div>
                <div class="form-group text-center mt-4">
                  <button type="button" class="btn btn-rounded btn-primary mb-3 ml-3 mr-3 pr-5 pl-5" onclick="location.href='<?php echo $voltar ?>'">Voltar</button>
                  <button type="submit" class="btn btn-rounded btn-primary mb-3 ml-3 mr-3 pr-5 pl-5">Adicionar</button>
                </div>
              </form>          
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php include("../design_rodape.php"); ?>