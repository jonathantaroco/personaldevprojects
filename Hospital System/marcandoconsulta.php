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
	setTimeout("window.location='painelpaciente.php'", 2000);
}
function failed(){
	setTimeout("window.location='marcarconsulta.php'", 2000);
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
$nome=$_POST['nome'];
$datapaciente=$_POST['data'];
$horapaciente=$_POST['hora'];

$sql = mysql_query("SELECT cpf FROM usuario WHERE nome = '$nome'");
while ($registro = mysql_fetch_array($sql)) {
    $cpfmedico = $registro['cpf'];
}
$sql = mysql_query("SELECT numero, data FROM atende WHERE cpfmed = '$cpfmedico' AND data = '$datapaciente' AND hora = '$horapaciente'");
$row = mysql_num_rows($sql);
$registro = mysql_fetch_array($sql);
if ($row == 1) {
    $numero = $registro['numero'];
    $sql = mysql_query("SELECT data FROM possuiconsulta WHERE cpfmed = '$cpfmedico' AND data = '$datapaciente' AND hora = '$horapaciente'");
    $row2 = mysql_num_rows($sql);
    if ($row2 > 0) {
        echo "<h3><center>Não foi possível. Este médico já possui consulta marcada no horário e dia desejado!</center><h3>";
        echo "<script>failed()</script>";        
    } else {
    $sql = mysql_query("INSERT INTO possuiconsulta (cpfmed, cpfpac, data, hora, numero) VALUES ('$cpfmedico','$_SESSION[cpf]','$datapaciente','$horapaciente','$numero')");
    echo "<h3><center>Consulta marcada com sucesso!</center><h3>";
    echo "<script>sucessfully()</script>";
    }
} else {
        echo "<h3><center>Não foi possível. Este médico não atende no horário e dia desejado!</center><h3>";
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