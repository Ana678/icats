<?php  
	$endereco = "us-cdbr-east-03.cleardb.com";
	$usuario = "bb50043256e1be";
	$senha = "29750589";
	$banco = "heroku_aef7b35a661dcb2";
	$MYSQLi = new mysqli($endereco,$usuario,$senha,$banco,3306);
	
	if(mysqli_connect_errno()){
		die(mysqli_connect_error());
		exit();
	}
	mysqli_set_charset($MYSQLi,"UTF8");
?>
