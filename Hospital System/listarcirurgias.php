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
$sql = mysql_query("SELECT cpfmed, numero, datainicio, hora FROM reserva WHERE cpfpac = '$_SESSION[cpf]' AND numero >= 200 AND numero <= 299");

echo "<h3>Cirurgias agendadas</h3>";
while ($registro = mysql_fetch_array($sql)) {
    $cpfmedico = $registro['cpfmed'];
    $data = $registro['datainicio'];
    $numero = $registro['numero'];
    $hora = $registro['hora'];
    $sqlquery = mysql_query("SELECT nome FROM usuario WHERE cpf = '$cpfmedico'");
    $registro2 = mysql_fetch_array($sqlquery);
    if ($sqlquery) {
        $nome = $registro2['nome'];
        echo "______________________"; echo "</br>"; echo "</br>"; 
        echo "<b>Médico Responsável: </b>"; echo $nome; echo "</br>";
        echo "<b>Data: </b>"; echo $data; echo "</br>";
        echo "<b>Hora: </b>"; echo $hora; echo "</br>";
        echo "<b>Sala de Cirurgia: </b>"; echo $numero; echo "</br>";
    } else { echo "erro"; }
}
?>
    <br><form align="left" name="form" method="post" action="painelpaciente.php">
        <input type="submit" value="Voltar">
    </form>
</div>
<div id="rodape">
    Sistema de Hospital - Disciplina de Banco de Dados 2014
</div>
</div>
</body>

</html>