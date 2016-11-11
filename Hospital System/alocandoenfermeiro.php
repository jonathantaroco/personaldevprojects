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
	setTimeout("window.location='painelmedico.php'", 2000);
}
function failed(){
	setTimeout("window.location='alocarenfermeiro.php'", 2000);
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
$nome = $_POST['nome'];
$dia = $_POST['dia'];
$horainicio = $_POST['horainicio'];
$periodo = $_POST['periodo'];
$numero = $_POST['numero'];
$cpfmedico = $_SESSION['cpf'];

$horapadrao = date("12:00");
$turnomanha = date("06:00");
$turnotarde = date("12:00");
$turnonoite = date("18:00");
$turnofinal = date("23:59");
$horainiciobkp = date($horainicio);
$horainicio = date('H:i:s',(strtotime($horainicio) - strtotime($horapadrao)));

if (($horainiciobkp >= $turnomanha) && ($horainiciobkp < $turnotarde)) {
    $turno = 'Manha';
} else if (($horainiciobkp >= $turnotarde) && ($horainiciobkp < $turnonoite)) {
    $turno = 'Tarde';
} else if (($horainiciobkp >= $turnonoite) && ($horainiciobkp <= $turnofinal)) {
    $turno = 'Noite';
} else {
    echo "<h3><center>Turno inválido.</center></h3>";
    echo "<script>failed()</script>";
}

if ($horainiciobkp < $horapadrao) {
    $timestamp1 = strtotime($dia);
    $timestamp2 = strtotime('-2 days', $timestamp1);
    $diaanterior = date('Y-m-d', $timestamp2);
} else if ($horainiciobkp >= $horapadrao) {
    $timestamp1 = strtotime($dia);
    $timestamp2 = strtotime('-1 day', $timestamp1);
    $diaanterior = date('Y-m-d', $timestamp2);
}

$sql = mysql_query("SELECT cpf FROM usuario WHERE nome = '$nome' AND tipousuario = 'Enfermeiro'");
$row = mysql_num_rows($sql);
$registro = mysql_fetch_array($sql);
if ($row == 1) {
    $cpfenfermeiro = $registro['cpf'];
} else {
    echo "<h3>Erro. Enfermeiro não existe no sistema.</h3>";
    echo "<script>failed()</script>";
}

$sql = mysql_query("SELECT cpfmed FROM alocado WHERE dia = '$dia' AND turno = '$turno' AND cpfenf = '$cpfenfermeiro'");
$row = mysql_num_rows($sql);
if ($row == 1) {
    echo "<h3>Erro. Este enfermeiro já foi alocado no mesmo dia e turno ou está de folga.</h3>";
    echo "<script>failed()</script>";
} else {
    $sqlquery = mysql_query("INSERT INTO alocado (cpfmed, cpfenf, dia, turno, numero, horainicio, hrstrabalhado) VALUES ('$cpfmedico', '$cpfenfermeiro', '$dia', '$turno', '$numero', '$horainiciobkp', '$periodo')");
    if ($sqlquery) {
        echo "<h3>Enfermeiro alocado com sucesso.</h3>";
        echo "<script>sucessfully()</script>";
    } else {
        echo "<h3>Não foi possível.</h3>";
        echo "<script>failed()</script>";
    }
}
?>
</div>
<div id="rodape">
    Sistema de Hospital - Disciplina de Banco de Dados 2014
</div>
</div>
</body>

</html>