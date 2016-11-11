<html>
<head>
<title>Cadastrando Hotel</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<?php
include "dbconexao.php";

$nome=$_POST['nome'];
$cnpj=$_POST['cnpj'];
$cidade=$_POST['cidade'];
$estado=$_POST['estado'];
$rua=$_POST['rua'];
$numero=$_POST['numero'];
$numsol=$_POST['numsol'];
$presol=$_POST['presol'];
$numcas=$_POST['numcas'];
$precas=$_POST['precas'];

$sql = mysql_query("INSERT INTO hoteis(nome, cnpj, cidade, estado, rua, numero)
	VALUES('$nome','$cnpj','$cidade','$estado','$rua', '$numero')");
	
$sql = mysql_query("INSERT INTO quartos(tipo, preco, cnpj, quant)
	VALUES('Solteiro', '$presol', '$cnpj', '$numsol')");

$sql = mysql_query("INSERT INTO quartos(tipo, preco, cnpj, quant)
	VALUES('Casal', '$precas', '$cnpj', '$numcas')");

echo "<h1><center>Cadastro efetuado com sucesso!</center></h1>";

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