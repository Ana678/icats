<?php 
session_start();
include("../config.php");

/* -------------- CÓDIGOS PARA ADICIONAR UM NOVO USUÁRIO -------------- */

if(isset($_POST['nome'])) {

    $email = $_POST['email'];
    $senha = $_POST['password'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];

    if ($_FILES['arquivo']['size'] == 0){ /*verificar se algum arquivo para a foto foi selecionado */
        $foto = 'user_padrao.jpg'; /* se não, insere uma foto padrao no banco */
        $consultaInsert = $MYSQLi->query("INSERT INTO TB_USUARIOS (USU_EMAIL,USU_SENHA,USU_NOME,USU_TELEFONE,USU_FOTO) VALUES ('$email','$senha','$nome','$telefone' ,'$foto')");

        header("Location: login.php"); 
    }else{    
        $extensao=substr($_FILES['arquivo']['name'], -4);
        $foto=md5(time()).$extensao;
        $diretorio="../uploads/";
        move_uploaded_file($_FILES['arquivo']['tmp_name'],$diretorio.$foto);

        $consultaInsert = $MYSQLi->query("INSERT INTO TB_USUARIOS (USU_EMAIL,USU_SENHA,USU_NOME,USU_TELEFONE,USU_FOTO) VALUES ('$email','$senha','$nome','$telefone' ,'$foto')");
        
        header("Location: login.php");  
    }
    
}
/* -------------------------------------------------------------------- */
?>

<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ICATS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="../assets/images/icon/img7.jpg">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="../assets/css/typography.css">
    <link rel="stylesheet" href="../assets/css/default-css.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>
    
</head>

<body >
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area login-bg" >
        <div class="container">
            <div class="login-box ptb--100">
                <form method="POST" action="?" enctype="multipart/form-data">
                    <div class="login-form-head" style="background-color: white;">
                        <a href="../tela_principal.php"><img src="../assets/images/icon/img7.jpg" alt="logo" style="width: 50%;"></a><br>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Nome completo</label>
                            <input type="text" id="exampleInputPassword1" name="nome">
                            <i class="ti-pencil"></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Telefone</label>
                            <input type="text" id="exampleInputPassword1" name="telefone">
                            <i class="ti-headphone"></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" id="exampleInputEmail1" name="email">
                            <i class="ti-email"></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Senha</label>
                            <input type="password" id="exampleInputPassword1" name="password">
                            <i class="ti-lock"></i>
                        </div>
                        <div class="form-go">
                            <spam style="color:#B3B2B2;"> Foto: </spam>
                            <input type="file" id="arquivo" name="arquivo" placeholder="Foto user" class="form-control">

                        </div>
                        <div class="submit-btn-area">
                           <button type="submit" style="background-color: purple;color: white;margin-top:10px" >CADASTRAR <i class="ti-arrow-right"></i></button><br><br>
                       </div>
                   </div>
               </form>
           </div>
       </div>
   </div>
   <!-- login area end -->

   <!-- jquery latest version -->
   <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
   <!-- bootstrap 4 js -->
   <script src="../assets/js/popper.min.js"></script>
   <script src="../assets/js/bootstrap.min.js"></script>
   <script src="../assets/js/owl.carousel.min.js"></script>
   <script src="../assets/js/metisMenu.min.js"></script>
   <script src="../assets/js/jquery.slimscroll.min.js"></script>
   <script src="../assets/js/jquery.slicknav.min.js"></script>

   <!-- others plugins -->
   <script src="../assets/js/plugins.js"></script>
   <script src="../assets/js/scripts.js"></script>
</body>

</html>



