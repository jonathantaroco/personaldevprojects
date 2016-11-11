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
<?php
$cpf = $_SESSION['cpf'];
$sql = "SELECT reserva.id_reserva, reserva.data_inicio, reserva.data_fim, reserva.estado, quartos.tipo, reserva.preco, hoteis.nome, hoteis.cidade
		FROM reserva, quartos, hoteis
		WHERE reserva.id = quartos.id AND reserva.cpf = '$cpf' AND quartos.cnpj = hoteis.cnpj
		ORDER BY reserva.id_reserva DESC";
$consulta = mysql_query($sql);

echo '<br>';echo '<br>';
echo '<table width=60% align="left" border=4 text-align="center">';echo'</br>';		
	echo '<tr>';
		echo '<th>ID da Reserva</th>';
		echo '<th>Data de Check-in</th>';
		echo '<th>Data de Check-out</th>';
		echo '<th>Estado da Reserva</th>';
		echo '<th>Tipo do Quarto</th>';
		echo '<th>Preço</th>';
		echo '<th>Nome do Hotel</th>';
		echo '<th>Cidade</th>';
	echo '</tr>';
while ($registro = mysql_fetch_array($consulta)) {
	echo '<td width=20%>'.$registro["id_reserva"].'</td>';
	echo '<td width=20%>'.$registro["data_inicio"].'</td>';
	echo '<td width=20%>'.$registro["data_fim"].'</td>';
	echo '<td width=20%>'.$registro["estado"].'</td>';
	echo '<td width=20%>'.$registro["tipo"].'</td>';
	echo '<td width=20%>R$ '.$registro["preco"].'</td>';
	echo '<td width=20%>'.$registro["nome"].'</td>';
	echo '<td width=20%>'.$registro["cidade"].'</td>';
echo '</tr>';
}
?>
<form align="left" name="form" method="post" action="painel.php">
<input type="submit" value="Voltar">
</form>
</body>

</html>