<?php
session_start();
include "dbconexao.php";
?>
<html>

<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, user-scalable=no">
<title>Hospital</title>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<link href="responsive.css" rel="stylesheet" type="text/css" media="screen" />
<link href="http://fonts.googleapis.com/css?family=Arvo" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
<script type="text/javascript">
function sucessfully(){
	setTimeout("window.location='painel_presidente.php'", 2000);
}
function failed(){
	setTimeout("window.location='taxadeocupacao.php'", 2000);
}
</script>
</head>  

<body>
<div id="container">    
<div id="header">
	<div id="logo">
		<h1><a href="#">Sistema de Hospital</a></h1>
	</div>
</div>
<div id="menumeiousuario">
<?php
$datainicio=$_POST['datainicio'];
$datafim=$_POST['datafim'];

echo "<h3>Taxa de Ocupação Entre $datainicio e $datafim</h3>";
$sql = mysql_query("SELECT numero FROM reserva WHERE (numero BETWEEN 100 AND 199) AND ((datainicio >= '$datainicio' OR datainicio = '$datainicio' OR datainicio <= '$datainicio') AND (datafim >= '$datafim' OR datafim = '$datafim' OR datafim <= '$datafim') AND (datafim >= '$datainicio') AND (datainicio <= '$datafim'))") or die(mysql_error());
$reserva = mysql_num_rows($sql);
$sql = mysql_query("SELECT numero FROM salas WHERE (numero BETWEEN 100 AND 199)") or die(mysql_error());
$salas = mysql_num_rows($sql);
$taxa = ($reserva / $salas) * 100;
echo "Leito de UTI: ";echo number_format($taxa, 2, '.', '').'%';echo "<br>";

$sql = mysql_query("SELECT numero FROM reserva WHERE (numero BETWEEN 200 AND 299) AND ((datainicio >= '$datainicio' OR datainicio = '$datainicio' OR datainicio <= '$datainicio') AND (datafim >= '$datafim' OR datafim = '$datafim' OR datafim <= '$datafim') AND (datafim >= '$datainicio') AND (datainicio <= '$datafim'))") or die(mysql_error());
$reserva = mysql_num_rows($sql);
$sql = mysql_query("SELECT numero FROM salas WHERE (numero BETWEEN 200 AND 299)") or die(mysql_error());
$salas = mysql_num_rows($sql);
$taxa = ($reserva / $salas) * 100;
echo "Sala de Cirurgia: ";echo number_format($taxa, 2, '.', '').'%';echo "<br>";

$sql = mysql_query("SELECT DISTINCT numero FROM atende WHERE (numero BETWEEN 300 AND 399) AND (data BETWEEN '$datainicio' AND '$datafim')") or die(mysql_error());
$reserva = mysql_num_rows($sql);
$sql = mysql_query("SELECT numero FROM salas WHERE (numero BETWEEN 300 AND 399)") or die(mysql_error());
$salas = mysql_num_rows($sql);
$taxa = ($reserva / $salas) * 100;
echo "Consultórios: ";echo number_format($taxa, 2, '.', '').'%';echo "<br>";

$sql = mysql_query("SELECT numero FROM reserva WHERE (numero BETWEEN 400 AND 499) AND ((datainicio >= '$datainicio' OR datainicio = '$datainicio' OR datainicio <= '$datainicio') AND (datafim >= '$datafim' OR datafim = '$datafim' OR datafim <= '$datafim') AND (datafim >= '$datainicio') AND (datainicio <= '$datafim'))") or die(mysql_error());
$reserva = mysql_num_rows($sql);
$sql = mysql_query("SELECT numero FROM salas WHERE (numero BETWEEN 400 AND 499)") or die(mysql_error());
$salas = mysql_num_rows($sql);
$taxa = ($reserva / $salas) * 100;
echo "Quarto de Recuperação: ";echo number_format($taxa, 2, '.', '').'%';
?>
    <form align="left" name="form" method="post" action="painel_presidente.php">
        <input type="submit" value="Voltar">
    </form>
</div>
<div id="rodape">
    Sistema de Hospital - Disciplina de Banco de Dados 2014
</div>
</div>
</body>
</html>