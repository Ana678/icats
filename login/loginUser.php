<?php  
	session_start();
	include('../config.php');

	if(empty($_POST['email']) || empty($_POST['senha'])){
		header("location:login.php");
		exit();
	}

	$email = mysqli_real_escape_string($MYSQLi,$_POST['email']);
	$senha =mysqli_real_escape_string($MYSQLi,$_POST['senha']);
	$query = "SELECT USU_CODIGO,USU_NOME FROM TB_USUARIOS WHERE USU_EMAIL='$email' AND USU_SENHA='$senha'";
	
	$result = mysqli_query($MYSQLi,$query);	
	$consulta=$MYSQLi->query("SELECT USU_CODIGO,USU_NOME FROM TB_USUARIOS WHERE USU_EMAIL='$email' AND USU_SENHA='$senha'");
	$resultado=$consulta->fetch_assoc();
	$codigouser=$resultado['USU_CODIGO'];
	$username = $resultado['USU_NOME'];
	$row = mysqli_num_rows($result);
	if ($row==1) {
		$_SESSION['username']=$username;
		$_SESSION['codigouser']=$codigouser;
		header("location:../tela_principal.php");
		exit();
	}else{
		$_SESSION['nao_autenticado']=true;
		header("location:login.php");
		exit();
	}
?>