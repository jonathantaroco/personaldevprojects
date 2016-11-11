<?php
include "dbconexao.php";

	session_start();
	if(!isset($_SESSION["login"]) || !isset($_SESSION["senha"])){
		header("Location: login.php");
		exit;
	}
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
</head>

<body>
<div id="container">
<div id="header">    
	<div id="logo">
		<h1><a href="#">Sistema de Hospital</a></h1>
	</div>
</div>

<?php
	echo '<br>';echo '<br>';echo '<br>';
	echo "<h1><center>Olá $_SESSION[login] !</h1></center>";
?>
<center>O que deseja fazer?</center>
<div id="menumeiousuario">
    <center><a href="alocarenfermeiro.php">Alocar Enfermeiro</a></br></br>
    <a href="reservarsala.php">Reservar uma Sala</a></br></br>
    <a href="listarconsultorio.php">Consultório do Dia</a></br></br>
    <a href="editardados.php">Editar Dados Cadastrais</a></center></br>
</div>
<center>
    <form name="form" method="post" action="logout.php">
        <input name="botao" type="image" value="teste" src="sair.jpg" width="80" height="40">
    </form>
</center>
<div id="rodape">
    Sistema de Hospital - Disciplina de Banco de Dados 2014
</div>
</div>
</body>

</html>