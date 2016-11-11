<html>
<head>
<title>Cadastrando Hotel</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript">
function edit(){
	setTimeout("window.location='painel_adm.php'", 2000);
}

</script>
</head>
<body>

<?php
session_start();
include "dbconexao.php";

$nome=$_POST['nome'];
$cidade=$_POST['cidade'];
$estado=$_POST['estado'];
$rua=$_POST['rua'];
$numero=$_POST['numero'];
$cnpj=$_SESSION["cnpj"];

$sql = "SELECT hoteis.cnpj
		FROM hoteis
		WHERE hoteis.cnpj = '$cnpj'";
$consulta = mysql_query($sql);
while ($registro = mysql_fetch_array($consulta)) {
	if ($registro['cnpj'] == $cnpj) {
		$sql = mysql_query("UPDATE hoteis SET hoteis.nome = '$nome', hoteis.cidade = '$cidade', hoteis.estado = '$estado',
						hoteis.rua= '$rua', hoteis.numero = '$numero' WHERE hoteis.cnpj = '$cnpj'");
			if ($sql) {
				echo "<h1><center>Dados alterados com sucesso! Você será redirecionado para a página principal!</center></h1>";
				echo "<script>edit()</script>";
			}
	}
}	
?>
<form name="form" method="post" action="cadastro_hotel.php">
<center>
<br>
<br>
<input name="botao" type="image" value="teste" src="novo_hotel.jpg" width="140" height="100">
</form>

<form name="form" method="post" action="logout.php">
<center>
<br>
<br>
<input name="botao" type="image" value="teste" src="sair.jpg" width="50" height="25">
</form>
</body>
</html>