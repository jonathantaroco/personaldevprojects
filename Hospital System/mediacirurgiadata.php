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

echo "<h4>Média de Cirurgias</h4>";

$sqlquery = mysql_query("SELECT cpfmed, cpfpac, numero FROM reserva WHERE (numero BETWEEN 200 AND 299) AND ((datainicio >= '$datainicio' OR datainicio = '$datainicio' OR datainicio <= '$datainicio') AND (datafim >= '$datafim' OR datafim = '$datafim' OR datafim <= '$datafim') AND (datafim >= '$datainicio') AND (datainicio <= '$datafim'))") or die(mysql_error());
$reserva = mysql_num_rows($sqlquery);
echo "Houve ".$reserva." cirurgia(s) entre ".$datainicio." e ".$datafim;echo "<br>";
while ($registro = mysql_fetch_array($sqlquery)) {
    $nomemed = $registro['cpfmed'];
    $nomepac = $registro['cpfpac'];
    $sqlmed = mysql_query("SELECT nome, espmed FROM usuario WHERE cpf = '$nomemed'");
    $registromed = mysql_fetch_array($sqlmed);
    $sqlpac = mysql_query("SELECT nome FROM usuario WHERE cpf = '$nomepac'");
    $registropac = mysql_fetch_array($sqlpac);
    echo "___________________________";echo "<br>";echo "<br>";
    echo "Médico responsável pela cirurgia: ".$registromed['nome'];echo "<br>";
    echo "Paciente: ".$registropac['nome'];echo "<br>";
    echo "Área Médica: ".$registromed['espmed'];echo "<br>";
}
?>
    </br></br><form align="left" name="form" method="post" action="painel_presidente.php">
        <input type="submit" value="Voltar">
    </form>
</div>
<div id="rodape">
    Sistema de Hospital - Disciplina de Banco de Dados 2014
</div>
</div>
</body>
</html>