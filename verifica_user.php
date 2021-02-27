<?php
session_start();
if(!isset($_SESSION['codigouser'])){
	header("Location: login.php");
}
?>