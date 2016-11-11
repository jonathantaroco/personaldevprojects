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
		<h1><a href="#">Sistema de Hospital</a></h1>
	</div>
</div>
    
<?php
include "dbconexao.php";

$numero=$_POST['num'];

$sql = mysql_query("SELECT numero FROM salas WHERE numero = '$numero'");
$row = mysql_num_rows($sql);
if ($row == 1) {
    $sql = mysql_query("DELETE FROM salas WHERE numero = '$numero'");
    echo "<h1><center>Remoção de sala efetuada com sucesso!</center></h1>";
} else {
    echo "<h3><center>Erro. Sala não existe no sistema!</center></h3>";
}
?>
<div id="menumeiousuario">    
    <center><a href="remover_salas.php">Clique aqui para remover outra sala</a></center></br>
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