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
<script type="text/javascript">
function loginsucessfully(){
	setTimeout("window.location='login.php'", 3000);
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
$estado=$_POST['estado'];
$cidade=$_POST['cidade'];
$rua=$_POST['rua'];
$numero=$_POST['numero'];
$telefone=$_POST['telefone'];
$login=$_POST['login'];
$senha=$_POST['senha'];
$plano=$_POST['plano'];

$cpf = $_SESSION['cpf'];

$sql = ("SELECT cpf FROM usuario WHERE cpf = '$cpf' LIMIT 1") or die (mysql_error());
$consulta = mysql_query($sql);
while ($registro = mysql_fetch_array($consulta)){
	if ($cpf == $registro["cpf"]) {
		$sql = mysql_query("UPDATE usuario SET usuario.nome = '$nome', usuario.cidade = '$cidade', usuario.estado = '$estado', usuario.rua= '$rua', usuario.numero = '$numero', usuario.login = '$login', usuario.senha = '$senha', usuario.plano = '$plano' WHERE cpf = '$cpf'");
		echo "<h3><center>Dados alterados com sucesso! Você será redirecionado para a página principal!</center></h3>";
		echo "<script>loginsucessfully(   )</script>";
	} else {
		echo "Erro!";
	}	
}
?>
</div>
<div id="rodape">
    Sistema de Hospital - Disciplina de Banco de Dados 2014
</div>
</body>
</html>