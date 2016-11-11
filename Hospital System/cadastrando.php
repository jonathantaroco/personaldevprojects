<?php
session_start();
include "dbconexao.php";
?>
<html>

<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, user-scalable=no">
<title>Hospital</title>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<link href="responsive.css" rel="stylesheet" type="text/css" media="screen" />
<link href="http://fonts.googleapis.com/css?family=Arvo" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
<script type="text/javascript">
function loginsucessfully(){
	setTimeout("window.location='login.php'", 3000);
}
function loginfailed(){
	setTimeout("window.location='cadastro.php'", 3000);
}    
</script>
</head>
<body>
<div id="container">    
<div id="header">
	<div id="logo">
		<h1><a href="#">Sistema de Hospital</a></h1>
	</div>
</div>
<div id="menumeiousuario">
<?php
$nome=$_POST['nome'];
$cpf=$_POST['cpf'];
$estado=$_POST['estado'];
$cidade=$_POST['cidade'];
$rua=$_POST['rua'];
$numero=$_POST['numero'];
$telefone=$_POST['telefone'];
$login=$_POST['login'];
$senha=$_POST['senha'];
$plano=$_POST['plano'];
$nascimento=$_POST['nascimento'];
$sexo=$_POST['sexo'];

$sql = mysql_query("SELECT cpf FROM usuario WHERE cpf = '$cpf'") or die (mysql_error());
$row = mysql_num_rows($sql);
if ($row > 0){
	echo "<center>Este usuário já existe no sistema! Aguarde um instante...</center>";
	echo "<script>loginfailed()</script>";
} else {
    $sql = mysql_query("INSERT INTO usuario(tipousuario, cpf, nome, login, senha, telefone, estado, cidade, rua, numero, nascimento, sexo, coren, espenf, crm, espmed, plano) VALUES('Paciente', '$cpf','$nome','$login','$senha','$telefone', '$estado', '$cidade', '$rua', '$numero', '$nascimento', '$sexo', '', '', '', '', '$plano')");
    echo "<h1><center>Cadastro efetuado com sucesso!</center></h1>";
    echo "<script>loginsucessfully()</script>";
}
?>
</div>
<div id="rodape">
    Sistema de Hospital - Disciplina de Banco de Dados 2014
</div>
</div>

</body>
</html>