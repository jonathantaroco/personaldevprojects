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
<?php
$nome = $_POST['nome'];
if ($nome == 'nome') {
	$nome = 1;
} else if ($nome == 'cidade') {
	$nome = 2;
} else if ($nome == 'data') {
	$nome = 3;
}

if ($nome == 1) {
?>
	<form id="formulario" name="signup" method="post" action="relatorionome.php">;
	Entre com o nome do hotel: <input type="text" name="nome"/><br></br>;
	<input type="submit" value="Consultar"/>
	</form>
<?php
} else if ($nome == 2) {
?>
	<form id="formulario" name="signup" method="post" action="relatoriocidade.php">;
	Entre com a cidade desejada: <input type="text" name="cidade"/><br></br>;
	<input type="submit" value="Consultar"/>
	</form>
<?php
} else if ($nome == 3) {
?>
	<form id="formulario" name="signup" method="post" action="relatoriodata.php">;
	Entre com a data desejada: <input type="date" name="data"/><br></br>;
	<input type="submit" value="Consultar"/>
	</form>	
<?php
}
?>
<form align="center" name="form" method="post" action="painel.php">
<input type="submit" value="Voltar">
</form>
</body>

</html>