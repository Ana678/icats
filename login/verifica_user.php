<?php
session_start();
if(!isset($_SESSION['codigouser'])){ /* serve para o caso do usuario querer entrar no sistema sem ser pela tela de login */
	header("Location: /icats/login/login.php");
}
?>