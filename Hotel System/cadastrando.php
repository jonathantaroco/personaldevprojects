<?php
session_start();
include "dbconexao.php";
?>

<html>
<head>
<title>Cadastrando...</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript">
function loginsucessfully(){
	setTimeout("window.location='login.php'", 4000);
}
</script>
</head>
<body>

<?php
$nome=$_POST['nome'];
$cpf=$_POST['cpf'];
$cidade=$_POST['cidade'];
$estado=$_POST['estado'];
$rua=$_POST['rua'];
$numero=$_POST['numero'];
$login=$_POST['login'];
$senha=$_POST['senha'];

$sql = mysql_query("SELECT cpf FROM usuarios WHERE cpf = '$cpf'") or die (mysql_error());
$row = mysql_num_rows($sql);
if ($row > 0){
	echo "<center>Este usuário já existe no sistema! Aguarde um instante...</center>";
	echo "<script>loginsucessfully()</script>";
} else {
	$sql = mysql_query("INSERT INTO usuarios(nome, cpf, cidade, estado, rua, numero, login, senha)
	VALUES('$nome','$cpf','$cidade','$estado','$rua', '$numero','$login','$senha')");
	echo "<h1><center>Cadastro efetuado com sucesso!</center></h1>";
	echo "<script>loginsucessfully()</script>";
}
?>

</body>
</html>