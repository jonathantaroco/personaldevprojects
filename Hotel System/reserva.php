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
<script type="text/javascript">
function validar(formulario){
  if(formulario.nome.value == ''){
    alert("O campo NOME DO HOTEL é obrigatório.");
    return false;
  }
  if(formulario.cidade.value == ''){
    alert("O campo CIDADE é obrigatório.");
    return false;
  }
  if(formulario.cidade.value == ''){
    alert("O campo CIDADE é obrigatório.");
    return false;
  }
  if(formulario.checkin.value == ''){
    alert("O campo DATA DE CHECK-IN é obrigatório.");
    return false;
  }
  if(formulario.checkout.value == ''){
    alert("O campo DATA DE CHECK-OUT é obrigatório.");
    return false;
  }
  if(formulario.tipo.value == ''){
    alert("O campo TIPO DE QUARTO é obrigatório.");
    return false;
  }  
  return true;
}
</script>
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
<form id="formulario" method="post" action="verificareserva.php" onsubmit="return validar(this)"><br><br><br>
	Nome do Hotel: <input type="text" name="nome"/><br>
	Cidade: <input type="text" name="cidade"/><br>
	Data de Check-in: <input type="date" name="checkin"/><br>
	Data de Check-out: <input type="date" name="checkout"/><br>
	Tipo de Quarto (Digite Solteiro ou Casal): <input type="text" name="tipo"><br><br>
	<input type="submit" value="Verificar disponibilidade">
</form>
<form name="form" method="post" action="painel.php">
<center>
<br>
<br>
<input type="submit" value="Voltar">
</form>
</body>

</html>
