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
	setTimeout("window.location='alocacaoenf.php'", 2000);
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
$cpf=$_POST['nome'];
$datainicio=$_POST['datainicio'];
$datafim=$_POST['datafim'];

$sql = mysql_query("SELECT * FROM alocado WHERE cpfenf = '$cpf' AND (dia BETWEEN '$datainicio' AND '$datafim')");
$rows = mysql_num_rows($sql);
echo "<h3>Número de alocações para o enfermeiro escolhido entre o dia $datainicio e $datafim: $rows</h3>";
if ($rows > 0) {
    while ($registro = mysql_fetch_array($sql)) {
        echo "______________________"; echo "</br>"; echo "</br>";
        echo "<b>Sala de Cirurgia: </b>"; echo $registro['numero']; echo "</br>";
        echo "<b>Dia: </b>"; echo $registro['dia']; echo "</br>";
        echo "<b>Turno: </b>"; echo $registro['turno']; echo "</br>";
        echo "<b>Hora: </b>"; echo $registro['horainicio']; echo "</br>";
        echo "<b>Tempo a trabalhar: </b>"; echo $registro['hrstrabalhado']; echo "</br>";
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