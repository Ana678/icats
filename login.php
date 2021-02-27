<?php 
session_start();
?>

<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>TRYPETS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/img7.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    
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
                <form method="POST" action="loginUser.php">
                    <div class="login-form-head" style="background-color: white;">
                        <a href="tela_user.php"><img src="assets/images/icon/img7.jpg" alt="logo" style="width: 70%;"></a><br>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" id="exampleInputEmail1" name="email">
                            <i class="ti-email"></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" id="exampleInputPassword1" name="senha">
                            <i class="ti-lock"></i>
                        </div>
                        <div class="row mb-4 rmber-area">
                                <?php
                                if(isset($_SESSION['nao_autenticado'])){
                                    ?>
                                    <div class="alert alert-danger" role="alert">
                                        ERRO:USUÁRIO OU SENHA INVÁLIDOS
                                    </div>
                                <?php  } unset($_SESSION['nao_autenticado']); ?>
                            
                        </div>

                        <div class="submit-btn-area">
                           <button type="submit" style="background-color: purple;color: white;" >Entrar <i class="ti-arrow-right"></i></button><br><br>
                           <p class="text-muted"><a href="tela_rec_senha.php" style="color:#6c757d; font-family:Lato; font-size:15px">Esqueceu a senha?</a></p>
                       </div>
                       <div class="form-footer text-center mt-5">
                        <p class="text-muted">Não tem conta? <a href="tela_cadastro_user.php">CADASTRE-SE</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- login area end -->

<!-- jquery latest version -->
<script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
<!-- bootstrap 4 js -->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/metisMenu.min.js"></script>
<script src="assets/js/jquery.slimscroll.min.js"></script>
<script src="assets/js/jquery.slicknav.min.js"></script>

<!-- others plugins -->
<script src="assets/js/plugins.js"></script>
<script src="assets/js/scripts.js"></script>
</body>

</html>
