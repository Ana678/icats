<?php
session_start();
include("config.php");

if(isset($_POST['email'])) {
     

    $email = $_POST['email'];

    $sql = $MYSQLi->prepare("SELECT * FROM TB_USUARIOS WHERE USU_EMAIL = ?");
    $sql->bind_param("s", $email);
    $sql->execute();
    $get = $sql->get_result();
    $total = $get->num_rows;

    if($total > 0){
        $dados = $get->fetch_assoc();
        add_dados_recover($MYSQLi, $email);
    }else{

    }
}

function add_dados_recover($MYSQLi, $email){
    $hash = md5(rand());
    $sql = $MYSQLi->prepare("INSERT INTO TB_RECOVER (REC_EMAIL, REC_HASH) VALUES (?, ?)");
    $sql->bind_param("ss", $email, $hash);
    $sql->execute();

    if($sql->affected_rows > 0){
        enviar_email($MYSQLi, $email, $hash);
    }
}

function enviar_email($MYSQLi, $email, $hash){

    $destinatario = $email;

    $subject = "RECUPERAR SENHA";
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= 'From: Your name <anacarolinaneta@hotmail.com>' . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $message = "<html><head>";
    $message .= "
        <h2>Você solicitou uma nova senha?</h2>
        <hr>
        <h3>Se sim, aqui está o link para você recuperar a sua senha:</h3>
        <p>Para recuperar sua senha, acesse este link: <a href='http://localhost/icats/tela_rec_senha_nova.php?rash={$hash}'>http://localhost/icats/tela_rec_senha_nova.php?rash={$hash}</a></p>
        <hr>
        <h5>Não foi você quem solicitou? Se não ignore este email, porém alguém tentou alterar seus dados.</h5>
        <hr>
        Atenciosamente, Tutoriais e Informática.
    ";

    $message .="</head></html>";

    if(mail($destinatario, $subject, $message, $headers)){
        echo "<div class='alert alert-success'>Os dados foram enviados para o seu email. Acesse para recuperar.</div>";
    }else{
        echo "<div class='alert alert-danger'>Erro ao enviar</div>";
    }
}
?>