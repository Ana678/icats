<?php
include("config.php");
session_start();

$codigouser=$_SESSION['codigouser'];
$consultaHumores = $MYSQLi->query("SELECT * FROM TB_HUMORES");

if(isset($_GET['addByUser'])){

    $codGato = $_GET['addByUser'];
    $voltar = 'tela_user.php';
    $codForm = '?addByUser='.$codGato;

    if(isset($_POST['nomeGato'])){ 
	
	$codNome  = $_POST['nomeGato'];
	$codHumor = $_POST['humor'];
	$peso     = $_POST['peso'];
	$data     = $_POST['data'];
	
    $consultaInsert=$MYSQLi->query("INSERT INTO TB_EST_SAUDE (EST_DATA,EST_PESO,EST_GAT_CODIGO,EST_HUM_CODIGO) VALUES ('$data',$peso,$codNome,$codHumor)");

	
	header("Location:tela_user.php");
    
    }
}
if(isset($_GET['addByListar'])){

    $codGato = $_GET['addByListar'];
    $voltar = 'lista_gatos.php';
    $codForm = '?addByListar='.$codGato;

    if(isset($_POST['nomeGato'])){ 
	
	$codNome  = $_POST['nomeGato'];
	$codHumor = $_POST['humor'];
	$peso     = $_POST['peso'];
	$data     = $_POST['data'];
	
    $consultaInsert=$MYSQLi->query("INSERT INTO TB_EST_SAUDE (EST_DATA,EST_PESO,EST_GAT_CODIGO,EST_HUM_CODIGO) VALUES ('$data',$peso,$codNome,$codHumor)");

	
	header("Location:lista_gatos.php");
    }
}

?>
<?php include("design_cabecalho_user.php"); ?>

<div class="row">
  <div class="col-lg-10 col-ml-12">
    <div class="row">
      <!-- basic form start -->
      <div class="col-12 mt-5">
        <div class="card">
          <div class="card-body">
            <h4 class="header-title">Adicionar Estado de saúde:</h4>
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
                    <input type="text" id="peso" name="peso" placeholder="3" class="form-control">&nbsp; Kg
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-form-label">Data de cadastro:</label>
                  <div class="input-group">
                    <input type="date" id="data" name="data" placeholder="Data de cadastro" class="form-control">
                  </div>
                </div>
                <div class="form-group text-center">
                        
                  <button type="button" class="btn btn-primary mb-3 mr-3" onclick="location.href='<?php echo $voltar ?>'">Voltar</button>
                  <button type="submit" class="btn btn-primary mb-3 ml-3">Adicionar</button>
                </div>
              </form>          
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php include("design_rodape.php"); ?>