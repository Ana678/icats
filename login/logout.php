<?php  
	/*destrói a sessão e redireciona para tela 'index.php' */
	session_start();
	session_destroy(); 

	setcookie('codSessao', null, -1); //deixa os cookies vazios
	setcookie('namSessao', null, -1); //deixa os cookies vazios

	header('location:../index.php');
	exit();
?>