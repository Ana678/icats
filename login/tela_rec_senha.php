<?php 
include('funcoesRecuperarSenha.php');
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
                    <div class="login-form-body mb-2">
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" id="exampleInputEmail1" name="email">
                            <i class="ti-email"></i>
                        </div>
                        <div class="submit-btn-area mb-6 mr-2">
                            <div class="botaoAjuda" style="border: 1px solid #7E74FF; float:right; width: 25px; border-radius:100%; padding:5px;color: #7e74ff;" 
                                onmouseover="showMessage()" onmouseout="hideMessage()"> 
                                <i class="ti-help" style="color: #7e74ff;font-size: 12px;"></i>
                                
                            </div>
                            <div class="mensagem" style="text-align:right; display:none; color: #7e74ff;font-size: 14px;"> 
                             Nessa etapa, insira o email da sua conta! <br>Depois é só verificá-lo, e entrar no link!
                            </div>
                        </div>
                        <div class="submit-btn-area">
                           <button type="submit" style="background-color: purple;color: white;margin-top:20px">PESQUISAR <i class="ti-arrow-right"></i></button><br><br>
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