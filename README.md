# icats

>#### Projeto feito para gerenciar a saude dos seus gatinhos


>Este projeto utiliza **PHP 8**


**Para esse projeto você vai precisar de um servidor Local - eu utilizei o Xamp**
```
É necessário que o banco esteja criado. Para isso, você usa o arquivo DB_ICATS.sql, inserindo-o no phpmyadmin
```

Após baixar o projeto, você precisa configurar o arquivo **'config.php'** com as informações do banco:
```
<?php  
	$endereco = "localhost";
	$usuario = "root";
	$senha = "";
	$banco = "DB_ICATS";
	$MYSQLi = new mysqli($endereco,$usuario,$senha,$banco,3306);
	
	if(mysqli_connect_errno()){
		die(mysqli_connect_error());
		exit();
	}
	mysqli_set_charset($MYSQLi,"UTF8");
?>

```
**Eu também ultilizei um serviço de email, configurando o xamp.**

Primeiro eu abri o servidor, cliquei em "config" na linha do apache, e depois abri o arquivo "php.ini", pesquisando por **sendmail_path**. Depois é só configurar com o seguinte comando e salvar.
```
sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t"
```
Depois eu fui no explorer e procurei pelo caminho \xampp\sendmail e entrei no arquivo "sendmail.ini". Pesquisei por **smtp_server**, **auth_username** e **auth_password**. Configure com suas credenciais do https://outlook.live.com/
```
smtp_server=smtp.live.com
auth_username=<seu email>@hotmail.com
auth_password=<sua senha>

```
**Depois dessas configurações, é só dar start no apache e mysql :D**

```