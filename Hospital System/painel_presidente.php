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

<?php
    session_start();
    include "dbconexao.php";
	echo '<br>';echo '<br>';echo '<br>';
	echo "<h1><center>Olá Presidente !</h1></center>";
?>

<center>O que deseja fazer?</center>
<div id="menumeiousuario">    
    <center><a href="taxadeocupacao.php">Taxa de Ocupação das Salas</a></br></br>
    <a href="especialidadesmedicas.php">Especialidades Médicas mais Requisitadas</a></br></br>
    <a href="totaldeconsultas.php">Total de Consultas de Cada Médico</a></br></br>
    <a href="alocacaoenf.php">Enfermeiros Alocados</a></br></br>
    <a href="mediacirurgia.php">Média de Cirurgia dos Pacientes</a></br></br>
    <a href="planodesaude.php">Planos de Sáude Utilizados</a></br></br>
    <a href="numfuncionarios.php">Número de Funcionários do Hospital</a></center>
</div>
<center>
<form name="form" method="post" action="logout.php">
<input name="botao" type="image" src="sair.jpg" width="80" height="40">
</form>
</center>
<div id="rodape">
    Sistema de Hospital - Disciplina de Banco de Dados 2014
</div>
</div>
</body>

</html>