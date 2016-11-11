<?php session_start(); include "dbconexao.php"; ?>
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
		<h1><a href="#">sistema de Hospital</a></h1>
	</div>
</div>
    
<?php
include "dbconexao.php";

$tipo=$_POST['tipo'];
$numero=$_POST['num'];
$capacidade=$_POST['capacidade'];
$tipocirurgia=$_POST['tipocirurgia'];
$cpf=$_SESSION['cpf'];

$sql = mysql_query("SELECT numero FROM salas WHERE numero = '$numero'");
$row = mysql_num_rows($sql);
if ($row == 1) {
    echo "<h3><center>Erro. Sala já existe no sistema!</center></h3>";
} else {
    $sql = mysql_query("INSERT INTO salas(numero, cpfadmin, capacidade, tipocirurgia, tiposala)
	VALUES('$numero','$cpf','$capacidade','$tipocirurgia', '$tipo')");
    echo "<h1><center>Cadastro efetuado com sucesso!</center></h1>";
}
?>
<div id="menumeiousuario">    
    <center><a href="cadastro_salas.php">Clique aqui para cadastrar outra sala</a></center></br>
    <form align="left" name="form" method="post" action="painel_adm.php">
        <input type="submit" value="Voltar">
    </form>
</div>
<div id="rodape">
    Sistema de Hospital - Disciplina de Banco de Dados 2014
</div>
</div>
</body>
    
</html>