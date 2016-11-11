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
	echo "<h1><center>Olá Administrador !</h1></center>";
?>

</br>
<center>O que deseja fazer?</center>
</br>
<form align="center" name="form" method="post" action="cadastro_hotel.php">
<input type="submit" value="Cadastrar um hotel"> <!-- CADASTRAR HOTEL -->
</form>
<form align="center" name="form" method="post" action="listausuarios.php">
<input type="submit" value="Lista de usuários">
</form>
<form align="center" name="form" method="post" action="listahoteis.php">
<input type="submit" value="Lista de hotéis">
</form>
<form align="center" name="form" method="post" action="procurahotel.php">
<input type="submit" value="Editar dados de um hotel">
</form>
<form align="center" name="form" method="post" action="listaradmin.php">
<input type="submit" value="Consultar reservas disponíveis"/>
</form>
<form align="center" name="form" method="post" action="historicoreservatotal.php">
<input type="submit" value="Reservas atualmente no sistema">
</form>
<form align="center" name="form" method="post" action="cancelareservaadmin.php">
<input type="submit" value="Cancelar reservas de usuários">
</form>
<form align="center" name="form" method="post" action="receita.php">
<input type="submit" value="Consultar receita total">
</form>
</center>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<center>
<br>
<br>
<form name="form" method="post" action="logout.php">
<input name="botao" type="image" value="teste" src="sair.jpg" width="50" height="25">
</form>
</body>

</html>