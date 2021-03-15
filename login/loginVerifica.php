<?php  
	session_start();
	include('../config.php');

	if(empty($_POST['email']) || empty($_POST['senha'])){
		header("location:login.php");
		exit();
	}else{


		/* -------------- CÓDIGOS PARA VALIDAR O LOGIN -------------- */
		$email = mysqli_real_escape_string($MYSQLi,$_POST['email']);
		$senha = mysqli_real_escape_string($MYSQLi,$_POST['senha']);

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

				if(isset($_POST['checkbox'])){ /* se o usuario selecionar PERMANECER LOGADO */
					setcookie('codSessao', $codigouser, time() + 3600);
					setcookie('namSessao', $username, time() + 3600);
				}

				header("location:../tela_principal.php");
				exit();
				
		}else{ /* retorna mensagem para a tela de login */
			$_SESSION['nao_autenticado']=true;
			header("location:login.php");
			exit();
		}	

			
		/* ---------------------------------------------------------- */
	}


?>