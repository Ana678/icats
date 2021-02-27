<?php
include("config.php");
session_start();

if(isset($_POST['nome'])) {
  $extensao=substr($_FILES['arquivo']['name'], -4);
  $foto=md5(time()).$extensao;
  $diretorio="uploads/";
  move_uploaded_file($_FILES['arquivo']['tmp_name'],$diretorio.$foto);

  $nome = $_POST['nome'];
  $raca = $_POST['raca'];
  $sexo = $_POST['sexo'];
  $descricao=$_POST['descricao'];
  $consulta = $MYSQLi->query("INSERT INTO TB_ANIMAIS (ANI_NOME,ANI_SEXO,ANI_RACA,ANI_ONG_CODIGO,ANI_FOTO,ANI_DESCRICAO) VALUES ('$nome','$sexo','$raca',$codigoOng,'$foto','$descricao')");
  header("Location:tela_lista_ani_ong.php");
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
            <form action="?" method="POST" class="form-horizontal" enctype="multipart/form-data">
              <div class="form-group" style="margin-top: -45px;">
                <img style="width: 100px;height:100px; border-radius: 50%; float: right; margin-bottom: 8px;" src="https://i.pinimg.com/originals/aa/44/30/aa443099466ac6990767ecd8eff4444a.jpg">
                <div class="input-group">
                  <input type="text" id="nome" name="nome" placeholder="Bill borba gato" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <input type="email" id="email" name="email" placeholder="exemplo@hotmail.com" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <input type="number" id="telefone" name="telefone" placeholder="84998423160" class="form-control">
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
              <button type="submit" class="btn btn-primary mb-3 mr-3">Editar</button>
              <button type="button" class="btn btn-primary mb-3 ml-3">Voltar</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include("design_rodape.php"); ?>