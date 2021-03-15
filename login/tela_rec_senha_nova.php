<?php 
include('funcoesRecuperarSenha.php');

if(isset($_GET['hash'])){

    $hash = $_GET['hash'];

    $consultaRecover = $MYSQLi->query("SELECT * FROM TB_RECOVER WHERE REC_HASH = '$hash' AND REC_STATUS = 0");
    $resultadoConsultaRecover = $consultaRecover->fetch_assoc();

    if(isset($resultadoConsultaRecover['REC_HASH'])){ /* valida se a hash ainda existe no banco de dados */
 
        if(isset($_POST['senha'])){ /* pega os dados da nova senha */
        $nsenha = $_POST['senha']; 
        $confsenha = $_POST['confirmarsenha']; 
        
            if($nsenha == $confsenha){ /* a senha e a confirmação devem ser iguais */

                $emailUser = $resultadoConsultaRecover['REC_EMAIL'];
                $updateSenha = $MYSQLi->query("UPDATE TB_USUARIOS SET USU_SENHA = '$nsenha' WHERE USU_EMAIL = '$emailUser'");
                $deleteRecover = $MYSQLi->query("DELETE FROM TB_RECOVER WHERE REC_EMAIL = '$emailUser'");

                /* Logo após a senha ter sido recuperada, é excluida da tabela 'TB_RECOVER' a linha correspondente a esse email */
                header("Location:login.php");  
            }else{
                echo "<br><div class='alert alert-danger text-center'>A senha e a confirmação estão diferentes! </div>";
            }     
        }
    }else{ /* caso a hash nao exista no banco de dados*/
        echo "<br><div class='alert alert-danger text-center'>Solicitação recusada, tente novamente.</div>";
    }
}

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
                <form method="POST" action="?hash=<?php echo $hash ?>" enctype="multipart/form-data">
                    <div class="login-form-head" style="background-color: white;">
                        <a href="../tela_principal.php"><img src="../assets/images/icon/img7.jpg" alt="logo" style="width: 50%;"></a><br>
                    </div>
                    <div class="login-form-body pt-0">
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Nova Senha</label>
                            <input type="password" id="exampleInputEmail1" name="senha">
                            <i class="ti-lock"></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Confirmar Nova Senha</label>
                            <input type="password" id="exampleInputEmail1" name="confirmarsenha">
                            <i class="ti-lock"></i>
                        </div>
                        <div class="submit-btn-area mb-6 mr-2">
                            <div class="botaoAjuda" style="border: 1px solid #7E74FF; float:right; width: 25px; border-radius:100%; padding:5px;color: #7e74ff;" 
                                onmouseover="showMessage()" onmouseout="hideMessage()"> 
                                <i class="ti-help" style="color: #7e74ff;font-size: 12px;"></i>
                                
                            </div>
                            <div class="mensagem" style="text-align:right; display:none; color: #7e74ff;font-size: 14px;"> 
                             Nessa etapa, insira a nova senha duas vezes!
                            </div>
                        </div>
                        <div class="submit-btn-area">
                           <button type="submit" style="background-color: purple;color: white;margin-top:20px">ALTERAR <i class="ti-arrow-right"></i></button><br><br>
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

   <script>
    let mensagem = document.querySelector(".mensagem") ;
    let botaoAjuda = document.querySelector(".botaoAjuda") ;
    // mostra a mensagem
    function showMessage(){   
    mensagem.style.display = "block";  
    botaoAjuda.style.display = "none";   
    }
    // esconde a mensagem
    function hideMessage(){
    mensagem.style.display = "none"; 
    botaoAjuda.style.display = "block";  
    }
    </script>

</body>

</html>