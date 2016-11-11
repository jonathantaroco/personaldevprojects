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
	setTimeout("window.location='especialidadesmedicas.php'", 2000);
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
$cpf=$_POST['espmed'];

$sql = mysql_query("SELECT * FROM possuiconsulta WHERE cpfmed = '$cpf'");
$rows = mysql_num_rows($sql);
echo "<h3>Número de consultas: $rows</h3>";
if ($rows > 0) {
    while ($registro = mysql_fetch_array($sql)) {
        echo "______________________"; echo "</br>"; echo "</br>";
        echo "<b>Consultório: </b>"; echo $registro['numero']; echo "</br>";
        echo "<b>Dia: </b>"; echo $registro['data']; echo "</br>";
        echo "<b>Hora: </b>"; echo $registro['hora']; echo "</br>";
    }
}
?>
    </br><form align="left" name="form" method="post" action="painel_presidente.php">
        <input type="submit" value="Voltar">
    </form>
</div>
<div id="rodape">
    Sistema de Hospital - Disciplina de Banco de Dados 2014
</div>
</div>
</body>
</html>