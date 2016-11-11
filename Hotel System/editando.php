<?php
session_start();
include "dbconexao.php";
?>

<html>
<head>
<title>Editando...</title>
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
$cidade=$_POST['cidade'];
$estado=$_POST['estado'];
$rua=$_POST['rua'];
$numero=$_POST['numero'];
$login=$_POST['login'];
$senha=$_POST['senha'];

$cpf = $_SESSION['cpf'];

$sql = ("SELECT cpf FROM usuarios WHERE cpf = '$cpf' LIMIT 1") or die (mysql_error());
$consulta = mysql_query($sql);
while ($registro = mysql_fetch_array($consulta)){
	if ($cpf == $registro["cpf"]) {
		$sql = mysql_query("UPDATE usuarios SET usuarios.nome = '$nome', usuarios.cidade = '$cidade', usuarios.estado = '$estado',
							usuarios.rua= '$rua', usuarios.numero = '$numero', usuarios.login = '$login', usuarios.senha = '$senha' WHERE cpf = '$cpf'");
		echo "<h1><center>Dados alterados com sucesso! Você será redirecionado para a página principal!</center></h1>";
		echo "<script>loginsucessfully()</script>";
	} else {
		echo "Erro!";
	}	
}
?>

</body>
</html>