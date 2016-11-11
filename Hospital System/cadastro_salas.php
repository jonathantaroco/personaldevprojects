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
function validar(formulario){
  if(formulario.tipo.value == ''){
    alert("O campo Tipo da Sala é obrigatório.");
    return false;
  }
  if(formulario.num.value == ''){
    alert("O campo Número da Sala é obrigatório.");
    return false;
  }
  return true;
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
    <form id="formulario" method="post" action="cadastrando_salas.php" onsubmit="return validar(this)";>
	   Tipo da Sala: <input type="text" name="tipo"/><br></br>
	   Número da Sala: <input type="text" name="num"/><br></br>
	   Capacidade da Sala ("Unica" ou "Multipla"): <input type="text" name="capacidade"/><br></br>
	   Tipo da Cirurgia: <input type="text" name="tipocirurgia"/><br></br>
	   <input type="submit" value="Cadastrar"/>
    </form>
    <form align="left" name="form" method="post" action="painel_adm.php">
        <input type="submit" value="Voltar">
    </form>
    <form name="form" method="post" action="logout.php">
        <center>
        <input name="botao" type="image" value="teste" src="sair.jpg" width="80" height="40">
    </form>
</div>
<div id="rodape">
    Sistema de Hospital - Disciplina de Banco de Dados 2014
</div>
</div>
</body>

</html>