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
	setTimeout("window.location='painel_adm.php'", 2000);
}
function failed(){
	setTimeout("window.location='alocar_enfermeirosadmin.php'", 2000);
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
$cpfadmin = $_SESSION['cpf'];

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

$sql = mysql_query("SELECT dia, turno, horainicio, hrstrabalhado FROM alocado WHERE cpfenf = '$cpfenfermeiro'");
$row = mysql_num_rows($sql);
$hrstrabalhado1 = 0;
while ($registro = mysql_fetch_array($sql)) {
    $diasistema = $registro['dia'];
    $horainiciosistema = $registro['horainicio'];
    $turnosistema = $registro['turno'];
    if (($turno == 'Manha') && (($turnosistema == 'Manha') || ($turnosistema == 'Tarde') || ($turnosistema == 'Noite')) && ($diasistema == $diaanterior)) {
        if ($horainiciosistema > $horainicio) {
            $diavalido = 1;
            echo $diavalido;
            $hrstrabalhado = $registro['hrstrabalhado'];
            $hrstrabalhado1 = ($hrstrabalhado + $hrstrabalhado1);
        }
    } else if (($turno == 'Tarde') && (($turnosistema == 'Tarde') || ($turnosistema == 'Noite')) && ($diasistema == $diaanterior)) {
        if ($horainiciosistema > $horainicio) {
            $diavalido = 1;
            echo $diavalido;
            $hrstrabalhado = $registro['hrstrabalhado'];
            $hrstrabalhado1 = ($hrstrabalhado + $hrstrabalhado1);
        }
    } else if (($turno == 'Noite') && ($turnosistema == 'Noite') && ($diasistema == $diaanterior)) {
        if ($horainiciosistema > $horainicio) {
            $diavalido = 1;
            echo $diavalido;
            $hrstrabalhado = $registro['hrstrabalhado'];
            $hrstrabalhado1 = ($hrstrabalhado + $hrstrabalhado1);
        }
        
    } else if (($turno == 'Manha') && (($turnosistema == 'Manha') || ($turnosistema == 'Tarde') || ($turnosistema == 'Noite')) && ($diasistema > $diaanterior) && ($diasistema < $dia)) {
            $diavalido = 2;
            echo $diavalido;
            $hrstrabalhado = $registro['hrstrabalhado'];
            $hrstrabalhado1 = ($hrstrabalhado + $hrstrabalhado1);        
    } else if (($turno == 'Tarde') && (($turnosistema == 'Tarde') || ($turnosistema == 'Noite')) && ($diasistema > $diaanterior) && ($diasistema < $dia)) {
            $diavalido = 2;
            echo $diavalido;
            $hrstrabalhado = $registro['hrstrabalhado'];
            $hrstrabalhado1 = ($hrstrabalhado + $hrstrabalhado1);        
    } else if (($turno == 'Noite') && ($turnosistema == 'Noite') && ($diasistema > $diaanterior) && ($diasistema < $dia)) {
            $diavalido = 2;
            echo $diavalido;
            $hrstrabalhado = $registro['hrstrabalhado'];
            $hrstrabalhado1 = ($hrstrabalhado + $hrstrabalhado1);
        
    } else if (($turno == 'Manha') && ($diasistema == $dia)) {
            $diavalido = 3;
            echo $diavalido;
            $hrstrabalhado = $registro['hrstrabalhado'];
            $hrstrabalhado1 = ($hrstrabalhado + $hrstrabalhado1);        
    } else if (($turno == 'Tarde') && ($diasistema == $dia)) {
            $diavalido = 3;
            echo $diavalido;
            $hrstrabalhado = $registro['hrstrabalhado'];
            $hrstrabalhado1 = ($hrstrabalhado + $hrstrabalhado1);        
    } else if (($turno == 'Noite') && ($diasistema == $dia)) {
            $diavalido = 3;
            echo $diavalido;
            $hrstrabalhado = $registro['hrstrabalhado'];
            $hrstrabalhado1 = ($hrstrabalhado + $hrstrabalhado1);
        
    } else if (($horasistema >= $horainiciobkp) && ($diasistema > $diaanterior)) {
            $diavalido = 3;
            echo $diavalido;
            $hrstrabalhado = $registro['hrstrabalhado'];
            $hrstrabalhado1 = ($hrstrabalhado + $hrstrabalhado1);
    }
}
echo $hrstrabalhado1;
if ($hrstrabalhado1 < 12) {
    $sqlquery = mysql_query("INSERT INTO alocado (cpfmed, cpfenf, dia, turno, numero, horainicio, hrstrabalhado) VALUES ('$cpfadmin', '$cpfenfermeiro', '$dia', '$turno', '$numero', '$horainiciobkp', '$periodo')");
    if ($sqlquery) {
        echo "<h3>Enfermeiro alocado com sucesso.</h3>";
        echo "<script>sucessfully()</script>";
    } else {
        echo "<h3>Não foi possível. Enfermeiro está de folga neste horário.</h3>";
        echo "<script>failed()</script>";
    } 
} else {
    echo "<h3>Não foi possível. Enfermeiro está de folga neste horário.</h3>";
    echo "<script>failed()</script>";
}
?>
</div>
<div id="rodape">
    Sistema de Hospital - Disciplina de Banco de Dados 2014
</div>
</div>
</body>

</html>