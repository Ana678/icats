<?php  
	$endereco = "us-cdbr-east-03.cleardb.com";
	$usuario = "b44db6160d1f46";
	$senha = "220bc6fb";
	$banco = "DB_ICATS";
	$MYSQLi = new mysqli($endereco,$usuario,$senha,$banco,3306);
	//aninha se eu esquecer alguma vez, lembre de mudar a porta para 3306 e colocar a senha como "" (no seu n tem senha) MAS DESSA VEZ EU LEMBREIII :)
	if(mysqli_connect_errno()){
		die(mysqli_connect_error());
		exit();
	}
	mysqli_set_charset($MYSQLi,"UTF8");
?>