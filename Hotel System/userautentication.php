<?php
session_start();
include "dbconexao.php";
?>
<html>
<head>
<title>Autenticando usuário</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript">
function loginsucessfully(){
	setTimeout("window.location='painel.php'", 4000);
}

function loginfailed(){
	setTimeout("window.location='login.php'", 4000);
}

</script>
</head>

<body>
<?php
$data=date("Y/m/d");
$login=$_POST['login'];
$senha=$_POST['senha'];
if($login == 'admin' && $senha == 'admin'){
	header("Location: painel_adm.php");
}
$sql = mysql_query("SELECT login, senha, cpf FROM usuarios WHERE login = '$login' and senha = '$senha' LIMIT 1") or die (mysql_error());
$row = mysql_num_rows($sql);
$linha = mysql_fetch_array($sql);
if ($row > 0){
	$_SESSION['login']=$_POST['login'];
	$_SESSION['senha']=$_POST['senha'];
	$_SESSION['cpf']=$linha['cpf'];
	echo "<center>Você foi autenticado com sucesso! Aguarde um instante...</center>";
	echo "<script>loginsucessfully()</script>";
} else {
	echo "<center>Nome do usuário ou senha inválidos! Aguarde um instante para tentar novamente...</center>";
	echo "<script>loginfailed()</script>";
}
$sql = "SELECT reserva.data_inicio, reserva.data_fim, reserva.estado
		FROM reserva
		WHERE reserva.data_inicio <= '$data' AND reserva.data_fim < '$data'";
$consulta = mysql_query($sql);		
while ($registro = mysql_fetch_array($consulta)) {
		$sql = mysql_query("UPDATE reserva SET reserva.estado = 'hospedado'");
	}		

?>
</body>
</html>