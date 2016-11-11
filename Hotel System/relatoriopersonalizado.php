<?php
session_start();
include "dbconexao.php";
?>

<html>

<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Alliance Hotéis</title>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<link href="http://fonts.googleapis.com/css?family=Arvo" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
</head>

<body>
<div id="header" class="container">
	<div id="logo">
		<h1><a href="#">Alliance Hotéis</a></h1>
	</div>
	<div id="menu">
		<ul>
			<li class="current_page_item"><a href="#">Homepage</a></li>
			<li><a href="#">Reservas On-line</a></li>
			<li><a href="#">Login</a></li>
			<li><a href="listar.php">Consultar reservas disponíveis</a></li>
		</ul>
	</div>
</div>
<BR><BR><BR>
<form id="formulario" name="signup" method="post" action="relatoriopersonalizado2.php" onsubmit="return validar(this);">
	Entre com o tipo de relatório que deseja consultar (Por "nome" do hotel - Por "cidade" - Por "data"): <input type="text" name="nome"/><br></br>
	<input type="submit" value="Cadastrar"/>
<form align="center" name="form" method="post" action="painel.php">
<input type="submit" value="Voltar">
</form>
</body>

</html>