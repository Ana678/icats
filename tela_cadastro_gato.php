<?php
include("config.php");
session_start();

$codigouser=$_SESSION['codigouser'];

$consultaSexo = $MYSQLi->query("SELECT * FROM TB_SEXOS");

if(isset($_POST['nome'])) {
  $extensao=substr($_FILES['arquivo']['name'], -4);
  $foto=md5(time()).$extensao;
  $diretorio="uploads/";
  move_uploaded_file($_FILES['arquivo']['tmp_name'],$diretorio.$foto);

  $nome = $_POST['nome'];
  $sexo = $_POST['sexo'];
  $descricao=$_POST['descricao'];
  $idade=$_POST['idade'];
  $consulta = $MYSQLi->query("INSERT INTO TB_GATOS (GAT_NOME,GAT_SEX_CODIGO,GAT_FOTO,GAT_DESCRICAO,GAT_USU_CODIGO,GAT_IDADE) VALUES ('$nome','$sexo','$foto','$descricao','$codigouser',$idade)");
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
            <h4 class="header-title">Cadastro de gato</h4>
            <form action="?" method="POST" class="form-horizontal" enctype="multipart/form-data">
              <div class="form-group">
                <label class="col-form-label">Nome do Gato:</label>
                  <div class="input-group">
                    <input type="text" id="nome" name="nome" placeholder="Nome do gato" class="form-control">
                  </div>
              </div>
              <div class="form-group">
                <label class="col-form-label">Idade do Gato:</label>
                 <div class="input-group">
                    <input type="number" id="idade" name="idade" placeholder="Idade do animal" class="form-control">
                  </div>
              </div>
              <div class="form-group">
                <label class="col-form-label">Sexo do gato:</label>
                
                <select class="custom-select" name="sexo">
                  <?php while($resultado = $consultaSexo->fetch_assoc()) { ?>
                    <option value="<?php echo $resultado['SEX_CODIGO']; ?>">
                      <?php echo $resultado['SEX_SEXO']; ?>
                    </option>
                  <?php } ?>
                </select>

              </div>
              <div class="form-group">
                <label class="col-form-label">Descrição Fofinha do Gato:</label>
                  <div class="input-group">
                    <input type="text" id="descricao" name="descricao" placeholder="Ximbica é um gato muito fofinho, carinhoso, sempre me entende. Eu amo ele <3" class="form-control">
                  </div>
              </div>
              <div class="form-group">
                <label class="col-form-label">Foto do Gato:</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="arquivo" name="arquivo">
                      <label class="custom-file-label" for="arquivo">Escolha a foto do gatinho</label>
                    </div>
                  </div>
              </div>
              <div class="form-group text-center">
                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Adicionar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include("design_rodape.php"); ?>