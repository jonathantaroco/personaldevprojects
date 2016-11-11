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
	setTimeout("window.location='reservarsala.php'", 2000);
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
$sala = $_POST['sala'];
$diainicio = $_POST['diainicio'];
$diafim = $_POST['diafim'];
$paciente = $_POST['paciente'];
$numero = $_POST['numero'];
$hora = $_POST['hora'];
$cpfmedico = $_SESSION['cpf'];

$hora1 = $hora;
$hora = date('H:i',(strtotime($hora1) - strtotime($_SESSION['horacirurgia'])));
$hora2 = date('H:i',(strtotime($hora1) + strtotime($_SESSION['horacirurgia']))+strtotime("06:29"));

$sql = mysql_query("SELECT numero FROM salas WHERE numero = '$numero'");
$row = mysql_num_rows($sql);
if ($row == 0) {
    echo "<h3>Não foi possível. A sala que pediu não existe no sistema.</h3>";
    echo "<script>failed()</script>";
} else {
    $sql = mysql_query("SELECT cpf FROM usuario WHERE nome = '$paciente'");
    $row = mysql_num_rows($sql);
    $registro = mysql_fetch_array($sql);
    if ($row == 1) {
        $cpfpaciente = $registro['cpf'];
    }
    if ($sala == 'Sala de Cirurgia') {
        $sql = mysql_query("SELECT hora FROM reserva WHERE numero = '$numero' AND hora >= '$hora' AND hora <= '$hora2' AND datainicio = '$diainicio'");
        $row = mysql_num_rows($sql);
        if ($row == 0) {
            $sqlquery = mysql_query("INSERT INTO reserva (cpfmed, cpfpac, numero, datainicio, datafim, hora) VALUES ('$cpfmedico', '$cpfpaciente', '$numero', '$diainicio', '$diafim', '$hora1')");
            if ($sqlquery) {
                echo "<h3>Sala reservada com sucesso.</h3>";
                echo "<script>sucessfully()</script>";
            } else {
                echo "<h3>Não foi possível.</h3>";
                echo "<script>failed()</script>";
            }
        } else {
            echo "<h3><center>Não foi possível. Haverá cirurgia nesta sala no mesmo dia e hora.</center><h3>";
            echo "<script>failed()</script>";
        }
    } else if (($sala == 'Leito UTI') || ($sala == 'Quarto de Recuperacao')) {
        $sql = mysql_query("SELECT datainicio, datafim, numero FROM reserva WHERE numero = '$numero' AND datainicio <= '$diainicio' AND datafim >= '$diainicio'");
        $row = mysql_num_rows($sql);
            if ($row == 0) {
                $sqlquery = mysql_query("INSERT INTO reserva (cpfmed, cpfpac, numero, datainicio, datafim, hora) VALUES ('$cpfmedico', '$cpfpaciente', '$numero', '$diainicio', '$diafim', '$hora1')");
                if ($sqlquery) {
                    echo "<h3>Sala reservada com sucesso.</h3>";
                    echo "<script>sucessfully()</script>";
                } else {
                    echo "<h3>Não foi possível.</h3>";
                    echo "<script>failed()</script>";
                }
            } else {
                echo "<h3><center>Não foi possível. Este quarto está já foi reservado para este dia e hora.</center><h3>";
            echo "<script>failed()</script>";
            }
    } else if ($sala == 'Consultorio') {
        echo "<h3>Não foi possível. Você não pode reservar um Consultório.</h3>";
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