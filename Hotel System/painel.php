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

<?php
	echo '<br>';echo '<br>';echo '<br>';
	echo "<h1><center>Olá $_SESSION[login] !</h1></center>";
?>

</br>
<form name="form" method="post" action="reserva.php">
<center>
<br>
<br>
<input type="submit" value="Realizar reserva"/> <!-- REALIZAR RESERVA -->
</form>
<form name="form" method="post" action="cancelareserva.php">
<center>
<br>
<br>
<input type="submit" value="Cancelar uma reserva"/> <!-- CANCELAR RESERVA -->
</form>
<form name="form" method="post" action="listar.php">
<center>
<br>
<br>
<input type="submit" value="Consultar reservas disponíveis"/> <!-- CONSULTAR RESERVAS DISPONÍVEIS -->
</form>
<form name="form" method="post" action="consultahistorico.php">
<center>
<br>
<br>
<input type="submit" value="Consultar histórico de reservas feitas"/> <!-- CONSULTAR HISTÓRICO DE RESERVAS -->
</form>
<form name="form" method="post" action="editardados.php">
<center>
<br>
<br>
<input type="submit" value="Editar dados cadastrais"/> <!-- EDITAR DADOS PESSOAIS -->
</form>
<form name="form" method="post" action="relatoriopersonalizado.php">
<center>
<br>
<br>
<input type="submit" value="Relatórios personalizados"/> <!-- EDITAR DADOS PESSOAIS -->
</form>
<form name="form" method="post" action="logout.php">
<center>
<br>
<br>
<input name="botao" type="image" value="teste" src="sair.jpg" width="50" height="25">
</form>

</body>

</html>