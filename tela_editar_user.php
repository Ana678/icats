<?php 
session_start();
include("config.php");

$codigouser = $_SESSION['codigouser'];
$consultaDadosUser=$MYSQLi->query("SELECT * FROM TB_USUARIOS WHERE USU_CODIGO = $codigouser");
$resultadoDadosUser=$consultaDadosUser->fetch_assoc();

if(isset($_GET['editar'])){

    $codEditar= $_GET['editar'];
  
    if(isset($_POST['nome'])) {
     
      $nome= $_POST['nome'];
      $email= $_POST['email'];
      $telefone=$_POST['telefone'];
  
      if ($_FILES['arquivo']['size'] == 0){ /*verificar se algum arquivo foi selecionado */
  
        $consultaUpdate = $MYSQLi->query("UPDATE TB_USUARIOS SET USU_NOME='$nome',USU_EMAIL='$email',USU_TELEFONE='$telefone' WHERE USU_CODIGO=$codEditar;");
        
        header("Location:tela_perfil_user.php");
  
      }else{ 
        $extensao=substr($_FILES['arquivo']['name'], -4);
        $foto=md5(time()).$extensao;
        $diretorio="uploads/";
        move_uploaded_file($_FILES['arquivo']['tmp_name'],$diretorio.$foto);
        
        $consultaUpdate = $MYSQLi->query("UPDATE TB_USUARIOS SET USU_NOME='$nome',USU_EMAIL='$email',USU_FOTO = '$foto', USU_TELEFONE='$telefone' WHERE USU_CODIGO=$codEditar;");
        
        header("Location:tela_perfil_user.php");
      }
      
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
            <h4 class="header-title">Editar Perfil</h4>
            <form action="?editar=<?php echo $codigouser ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
              <div class="form-group" style="margin-top: -45px;">
                <img style="width: 100px;height:100px; border-radius: 50%; float: right; margin-bottom: 8px;" src="uploads/<?php echo $resultadoDadosUser['USU_FOTO']; ?>">
                <div class="input-group">
                  <input type="text" id="nome" name="nome" placeholder="Bill borba gato" class="form-control" value="<?php echo $resultadoDadosUser['USU_NOME']; ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <input type="email" id="email" name="email" placeholder="exemplo@hotmail.com" class="form-control" value="<?php echo $resultadoDadosUser['USU_EMAIL']; ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <input type="number" id="telefone" name="telefone" placeholder="84998423160" class="form-control" value="<?php echo $resultadoDadosUser['USU_TELEFONE']; ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="arquivo" name="arquivo">
                      <label class="custom-file-label" for="arquivo">Escolha a sua foto de perfil</label>
                    </div>
                  </div>
              </div>

              <div class="form-group text-center">
              <button type="button" class="btn btn-primary mb-3 mr-3">Voltar</button>
              <button type="submit" class="btn btn-primary mb-3 ml-3">Editar</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include("design_rodape.php"); ?>