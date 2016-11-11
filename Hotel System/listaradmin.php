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
$sql = "SELECT hoteis.nome,hoteis.cidade,quartos.tipo,quartos.quant,quartos.preco
		FROM hoteis,quartos 
		WHERE hoteis.cnpj = quartos.cnpj";
$consulta = mysql_query($sql);
echo '<br>';echo '<br>';
echo '<table width=60% align="left" border=4 text-align="center">';echo'</br>';
echo '<tr>';
	echo '<th>Nome do Hotel</th>';
	echo '<th>Cidade</th>';
	echo '<th>Tipo do Quarto</th>';
	echo '<th>Preço</th>';
	echo '<th>Vagas</th>';
echo '</tr>';
while($registro = mysql_fetch_array($consulta)){
	if ($registro["quant"] > 0) {
			echo '<td width=25%>'.$registro["nome"].'</td>';
			echo '<td width=20%>'.$registro["cidade"].'</td>';
			echo '<td width=20%>'.$registro["tipo"].'</td>';
			echo '<td width=20%>R$ '.$registro["preco"].'</td>';
			echo '<td width=20%>'.$registro["quant"].'</td>';
		echo '</tr>';
	}
	else {
		echo "<br>";
		echo "<left>Não há quartos disponíveis de ".$registro["tipo"]." para reservas na cidade: ".$registro["cidade"]."</left><br>";
	}	
}
echo '</table>';	
?>

<form align="left" name="form" method="post" action="painel_adm.php">
<input type="submit" value="Voltar">
</form>
</body>

</html>