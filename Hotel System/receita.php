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
$total = 0;
$sql = "SELECT reserva.preco FROM reserva WHERE reserva.estado = 'hospedado'";
$consulta = mysql_query($sql);
while ($registro = mysql_fetch_array($consulta)) {
	$total = $total + $registro['preco'];
}
echo '<br>';echo '<br>';
echo '<table width=60% align="left" border=4 text-align="center">';echo'</br>';		
	echo '<tr>';
		echo '<th>Receita Total</th>';
	echo '</tr>';
	echo '<td align=center width=20%>R$ '.$total.'</td>';
echo '</tr>';		
echo '</table>';
?>
<form align="center" name="form" method="post" action="painel_adm.php">
<input type="submit" value="Voltar">
</form>
</body>

</html>