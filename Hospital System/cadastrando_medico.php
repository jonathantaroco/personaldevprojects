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
function loginfailed(){
	setTimeout("window.location='cadastro_enfermeiro.php'", 3000);
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

<?php
include "dbconexao.php";

$cpf=$_POST['cpfmed'];
$nome=$_POST['nome'];
$login=$_POST['login'];
$senha=$_POST['senha'];
$estado=$_POST['estado'];
$cidade=$_POST['cidade'];
$rua=$_POST['rua'];
$numero=$_POST['numero'];
$telefone=$_POST['telefone'];
$nascimento=$_POST['nascimento'];
$sexo=$_POST['sexo'];
$crm=$_POST['crm'];
$especializacao=$_POST['espmed'];

$sql = mysql_query("SELECT cpf FROM usuario WHERE cpf = '$cpf'") or die (mysql_error());
$row = mysql_num_rows($sql);
if ($row >= 1){
    echo "<h1><center>Impossível cadastrar. Este usuário já existe no sistema!</center><h1>";
    echo "<script>loginfailed()</script>";
} else {
    $sql = mysql_query("INSERT INTO usuario(tipousuario, cpf, nome, login, senha, telefone, estado, cidade, rua, numero, nascimento, sexo, coren, espenf, crm, espmed, plano) VALUES('Medico', '$cpf','$nome','$login','$senha','$telefone', '$estado', '$cidade', '$rua', '$numero', '$nascimento', '$sexo', '', '', '$crm', '$especializacao', '')");
    echo "<h1><center>Cadastro efetuado com sucesso!</center></h1>";
}

?>
<div id="menumeiousuario">    
    <center><a href="cadastro_medico.php">Clique aqui para cadastrar outro médico</a></center></br>
    <form name="form" method="post" action="logout.php">
        <center>
        <input name="botao" type="image" value="teste" src="sair.jpg" width="80" height="40">
    </form>
</div>
<div id="rodape">
    Sistema de Hospital - Disciplina de Banco de Dados 2014
</div>
</div></body>
</html>