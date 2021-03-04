<?php  
	/*destrói a sessão e redireciona para tela 'index.php' */
	session_start();
	session_destroy(); 
	header('location:../index.php');
	exit();
?>