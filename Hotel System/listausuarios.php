<?php
session_start();
include "dbconexao.php";
?>
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
$sql = ("SELECT usuarios.nome, usuarios.cidade, usuarios.estado, usuarios.cpf FROM usuarios");
$consulta = mysql_query($sql);

echo '<br>';echo '<br>';
echo '<table width=60% align="left" border=4 text-align="center">';echo'</br>';		
	echo '<tr>';
		echo '<th>Nome do Usuário</th>';
		echo '<th>CPF do Usuário</th>';
		echo '<th>Cidade</th>';
		echo '<th>Estado</th>';
	echo '</tr>';
while ($registro = mysql_fetch_array($consulta)) {
	echo '<td width=20%>'.$registro["nome"].'</td>';
	echo '<td width=20%>'.$registro["cpf"].'</td>';
	echo '<td width=20%>'.$registro["cidade"].'</td>';
	echo '<td width=20%>'.$registro["estado"].'</td>';
echo '</tr>';
}
?>
<form align="left" name="form" method="post" action="painel_adm.php">
<input type="submit" value="Voltar">
</form>
</body>

</html>