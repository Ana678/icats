<?php
include("config.php");
session_start();

if(isset($_GET['codigo'])){

  $codigoGato = $_GET['codigo'];
  $consultaDadosGato=$MYSQLi->query("SELECT * FROM TB_EST_SAUDE WHERE EST_GAT_CODIGO = $codigoGato;");
  $resultadoDadosGato=$consultaDadosGato->fetch_assoc();
}


if(isset($_GET['editar'])){

  $codEditar= $_GET['editar'];

  if(isset($_POST['humor'])) {

    $humor= $_POST['humor'];
    $peso= $_POST['peso'];
    $data=$_POST['data'];

    $consultaUpdate = $MYSQLi->query("UPDATE TB_EST_SAUDE SET EST_HUM_CODIGO='$nome',GAT_SEX_CODIGO='$sexo',GAT_DESCRICAO='$descricao',GAT_IDADE='$idade' WHERE GAT_CODIGO=$codEditar;");

    header("Location:lista_gatos.php");

    
  }
}

if(isset($_GET['excluir'])){

  $codExcluir= $_GET['excluir'];

  $consultaDrop = $MYSQLi->query("DELETE FROM TB_EST_SAUDE WHERE EST_GAT_CODIGO = $codigoGato;");

  header("Location:lista_gatos.php");
  
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
            <h4 class="header-title">Editar Estado de saúde:</h4>
            <form action="?editar=<?php echo $codigoGato ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
              <div class="form-group">
                <label class="col-form-label">Nome do gato:</label>
                <label> <!--Aqui faz a consulta do nome do gato que está tendo o estado de saúde editado-->
                  <?php 
                  echo $resultadoDadosGato['GAT_NOME'];
                  ?> Bill
                </label>
                </div>
                <div class="form-group">
                  <label class="col-form-label">Humor do gato:</label>
                  <select class="custom-select" name="humor">
                    <option selected="selected" value="1">Muito triste</option>
                    <option value="2">Triste</option>
                    <option value="10">Muito feliz</option>
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
              </form>


             
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php include("design_rodape.php"); ?>