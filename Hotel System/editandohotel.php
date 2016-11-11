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
<br><br><br><br>
<?php
session_start();
include "dbconexao.php";
$_SESSION["cnpj"]=$_POST["cnpj"];
?>
<form id="formulario" method="post" action="editandohotel2.php" onsubmit="return validar(this)";>
	Nome do Hotel: <input type="text" name="nome"/><br></br>
	Cidade: <input type="text" name="cidade"/><br></br>
	Estado: <input type="text" name="estado"/><br></br>
	Rua: <input type="text" name="rua"/><br></br>
	Número: <input type="text" name="numero"/><br></br>
	<input type="submit" value="Editar Dados"/>
</form>

<form align="left" name="form" method="post" action="painel_adm.php">
<input type="submit" value="Voltar">
</form>
</body>

</html>