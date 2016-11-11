<?php
session_start();
include "dbconexao.php";
?>
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
$sql = mysql_query("SELECT numero, data, hora FROM atende WHERE cpfmed = '$_SESSION[cpf]' AND data = '$_SESSION[datasistema]'");
$row = mysql_num_rows($sql);
if ($row > 0) {
    while ($registro = mysql_fetch_array($sql)) {
        echo "______________________"; echo "</br>"; echo "</br>";
        echo "<b>Consultório: </b>"; echo $registro['numero']; echo "</br>";
        echo "<b>Dia: </b>"; echo $registro['data']; echo "</br>";
        echo "<b>Hora: </b>"; echo $registro['hora']; echo "</br>";
    }
} else {
    echo "<h3>Você não foi alocado em nenhum consultório para hoje!</h3>";
}
?>
    <br><form name="form" method="post" action="painelmedico.php">
        <input type="submit" value="Voltar">
    </form>
</div>
</div>
</body>

</html>