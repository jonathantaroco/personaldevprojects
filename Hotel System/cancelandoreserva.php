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
<script type="text/javascript">
function redirecionar(){
	setTimeout("window.location='painel.php'", 4000);
}
</script>
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
$idreserva = $_POST['cancela'];
$sql = ("SELECT reserva.id_reserva, reserva.estado FROM reserva WHERE reserva.id_reserva = '$idreserva'");
$consulta = mysql_query($sql);
while ($registro = mysql_fetch_array($consulta)) {
	$estado = $registro["estado"];
	if ($estado == "reservado") {
		$sql = mysql_query("UPDATE reserva SET estado='cancelado' WHERE reserva.id_reserva = '$idreserva'");
			if ($sql) {
				echo "<br>";echo "<br>";echo "<br>";
				echo "<center>Reserva cancelada com sucesso! Aguarde um instante...</center>";
				echo "<script>redirecionar()</script>";
			}else {
				echo "<br>";echo "<br>";echo "<br>";
				echo "<center>Não foi possível cancelar a reserva! Aguarde um instante...</center>";
				echo "<script>redirecionar()</script>";
			}
		$sql = "SELECT reserva.id FROM reserva WHERE reserva.id_reserva = '$idreserva'";
		$consulta = mysql_query($sql);
		while ($registro = mysql_fetch_array($consulta)) {
			$cancela = $registro["id"];
		}	
		$sql = mysql_query("UPDATE quartos SET quant=quant+1 WHERE quartos.id = '$cancela'");
	} else {
		echo "<br>";echo "<br>";echo "<br>";
		echo "<center>NÃO HÁ RESERVAS EFETUADAS CORRESPONDENTES AO ID DIGITADO!</center>";
		echo "<center>AGUARDE UM MOMENTO POR FAVOR!</center>";
		echo "<script>redirecionar()</script>";
	}	
}		
?>
</body>

</html>