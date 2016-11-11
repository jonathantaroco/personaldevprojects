<?php session_start(); include "dbconexao.php"; ?>
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
function loginsucessfullypaciente(){
	setTimeout("window.location='painelpaciente.php'", 2000);
}
function loginsucessfullymedico(){
	setTimeout("window.location='painelmedico.php'", 2000);
}
function loginsucessfullyenfermeiro(){
	setTimeout("window.location='painelenfermeiro.php'", 2000);
}
function loginfailed(){
	setTimeout("window.location='login.php'", 2000);
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
$_SESSION['datasistema']=date("Y-m-d");
$_SESSION['horaconsulta']=date("00:30");
$_SESSION['horacirurgia']=date("03:00");
$login=$_POST['login'];
$senha=$_POST['senha'];
if(($login == 'admin' && $senha == 'admin') || ($login == 'presidente' && $senha == 'presidente')){
    $sql = mysql_query("SELECT cpf FROM usuario WHERE login = 'admin' and senha = 'admin'") or die (mysql_error());
    $row = mysql_num_rows($sql);
    $linha = mysql_fetch_array($sql);
    if ($row == 1) {
        $_SESSION['cpf']=$linha['cpf'];
    }
    if ($login == 'admin' && $senha == 'admin') {
	   header("Location: painel_adm.php");
    } else if ($login == 'presidente' && $senha == 'presidente') {
       header("Location: painel_presidente.php");
    }
}
$sql = mysql_query("SELECT tipousuario, login, senha, cpf FROM usuario WHERE login = '$login' and senha = '$senha' LIMIT 1") or die (mysql_error());
$row = mysql_num_rows($sql);
$linha = mysql_fetch_array($sql);
if ($row == 1) {
    $_SESSION['tipousuario']=$linha['tipousuario'];
	$_SESSION['login']=$_POST['login'];
	$_SESSION['senha']=$_POST['senha'];
	$_SESSION['cpf']=$linha['cpf'];
} else {    
	echo "<h3><center>Nome do usuário ou senha inválidos! Aguarde um instante para tentar novamente!</center><h3>";
	echo "<script>loginfailed()</script>";
}
    
if ($_SESSION['tipousuario'] == 'Paciente') {
	echo "<h3><center>Você foi autenticado com sucesso! Aguarde um instante!</center><h3>";
	echo "<script>loginsucessfullypaciente()</script>";
} else if ($_SESSION['tipousuario'] == 'Medico') {
    echo "<h3><center>Você foi autenticado com sucesso! Aguarde um instante!</center><h3>";
	echo "<script>loginsucessfullymedico()</script>";
} else if ($_SESSION['tipousuario'] == 'Enfermeiro') {
    echo "<h3><center>Você foi autenticado com sucesso! Aguarde um instante!</center><h3>";
	echo "<script>loginsucessfullyenfermeiro()</script>";
}
?>
</div>
<div id="rodape">
    Sistema de Hospital - Disciplina de Banco de Dados 2014
</div>
</div>
</body>
</html>