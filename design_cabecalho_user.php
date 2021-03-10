<html class="no-js" lang="en">
<head>
    <meta name="autors" content="Ana Carolina, Ana Heloisa, Elane, Paula, IFRN">
    <meta name="keywords" content="animais,ajudar,saude,ICATS">
    <meta name="description" content="O ICATS é um sistema para ajudar a regular a saúde de gatos">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ICATS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="/assets/images/icon/img7.jpg">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/themify-icons.css">
    <link rel="stylesheet" href="/assets/css/metisMenu.css">
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="/assets/css/typography.css">
    <link rel="stylesheet" href="/assets/css/default-css.css">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header" style="background-color: white;">
                <a href="/icats/tela_principal.php"><img src="/assets/images/icon/img7.jpg" alt="logo" style="width: 80%;"></a><br>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li><a href="/tela_principal.php"><i class="ti-home"></i> <span>Home</span></a></li>
                            <li><a href="/gatos/lista_gatos.php"><i class="ti-menu-alt"></i> <span>Lista de gatos</span></a></li>
                            <li><a href="/gatos/tela_cadastro_gato.php"><i class="ti-github"></i> <span>Cadastrar gato</span></a></li>
                            <li><a href="/tela_sobre_nos.php"><i class="ti-help-alt"></i> <span>Sobre nós</span></a></li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li><div class="user-profile pull-right">
                                <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php $primeiroNome = explode(" ", $_SESSION['username']); echo current($primeiroNome); ?> <i class="fa fa-angle-down"></i></h4>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/user/tela_perfil_user.php">Perfil</a>
                                    <a class="dropdown-item" href="/login/logout.php">Log Out</a>
                                </div>
                            </div></li>  
                        </ul>
                    </div>
                    
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area end -->
            <div class="main-content-inner">