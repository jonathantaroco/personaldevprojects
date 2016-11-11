<?php
session_start();
include "dbconexao.php";
?>

<html>

<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Alliance Hotéis</title>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<link href="http://fonts.googleapis.com/css?family=Arvo" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
</head>

<body>
<div id="header" class="container">
	<div id="logo">
		<h1><a href="#">Alliance Hotéis</a></h1>
	</div>
	<div id="menu">
		<ul>
			<li class="current_page_item"><a href="#">Homepage</a></li>
			<li><a href="#">Reservas On-line</a></li>
			<li><a href="#">Login</a></li>
			<li><a href="listar.php">Consultar reservas disponíveis</a></li>
		</ul>
	</div>
</div>
<?php
$nome=$_POST['nome'];
$cidade=$_POST['cidade'];
$checkin=$_POST['checkin'];
$checkout=$_POST['checkout'];
$tipo=$_POST['tipo'];

if (strtotime($checkin) < strtotime($checkout)) {
$datetime1 = date_create("$checkout");
$datetime2 = date_create("$checkin");
$interval = date_diff($datetime2, $datetime1);
$dias = $interval->format('%a');

$_SESSION['tipo']=$_POST['tipo'];
//SELECIONA HOTEL
$sql = "SELECT hoteis.cnpj
		FROM hoteis
		WHERE hoteis.cidade = '$cidade' AND hoteis.nome = '$nome'";
$consulta = mysql_query($sql);

while($registro = mysql_fetch_array($consulta)) {
		//echo '<td>'.$registro["cnpj"].'</td>';
		$cnpj = $registro["cnpj"];
	echo '<br>';
}
//VERIFICA SE HÁ VAGAS NO TIPO DO QUARTO ESCOLHIDO
$sql = "SELECT quartos.tipo, quartos.quant, quartos.preco
		FROM quartos
		WHERE quartos.cnpj = '$cnpj' AND quartos.tipo = '$tipo'";
$consulta = mysql_query($sql);
while($registro = mysql_fetch_array($consulta)) {
	if ($registro["quant"] > 0) {
		$quantidade = $registro["quant"];
		$preco = $registro["preco"];
	}
	else {
		$quantidade = $registro["quant"];
	}
}
//"OCUPA" UMA VAGA NO TIPO DE QUARTO ESCOLHIDO
if ($quantidade > 0) {
	$sql = mysql_query("UPDATE quartos SET quant=quant - 1 WHERE quartos.cnpj = '$cnpj' AND quartos.tipo = '$tipo'");
		if ($sql) { // verificação para saber se foi cadastrado
			//echo "Atualizado com sucesso.".mysql_error();
		} 
		else { // caso dê erro
			//echo "Falha ao atualizar.".mysql_error();
		}
//echo $_SESSION['cpf']; //resgata o cpf do usuário que está logado
//SELECIONA O ID DO QUARTO ESCOLHIDO
$sql = "SELECT quartos.id 
		FROM quartos 
		WHERE quartos.cnpj = '$cnpj' AND quartos.tipo = '$tipo'";
$consulta = mysql_query($sql);
while($registro = mysql_fetch_array($consulta)) {
	$id = $registro["id"];
}
$preco = $preco*$dias;
$sql = mysql_query("INSERT INTO reserva(id, cpf, data_inicio, data_fim, preco, estado) VALUES ('$id', '$_SESSION[cpf]', '$checkin', '$checkout', '$preco', 'reservado')");
if ($sql) {
	echo '<br>';echo '<br>';
	echo "<h1><center>Reserva efetuada com sucesso!</center></h1>";
}
} else {
	echo '<br>';echo '<br>';
	echo "<h1><center>Não há vagas para o quarto escolhido no hotel procurado!</center></h1>";
}
} else {
	echo '<br>';echo '<br>';
	echo "<h1><center>A data selecionada é inválida!</center></h1>";
}	
?>
<form name="form" method="post" action="painel.php">
<center>
<br>
<br>
<input type="submit" value="Voltar">
</form>
</body>

</html>