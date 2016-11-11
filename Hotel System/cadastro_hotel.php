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
  if(formulario.cnpj.value == ''){
    alert("O campo CNPJ é obrigatório.");
    return false;
  }
  if(formulario.cidade.value == ''){
    alert("O campo CIDADE é obrigatório.");
    return false;
  }
  if(formulario.estado.value == ''){
    alert("O campo ESTADO é obrigatório.");
    return false;
  }
  if(formulario.rua.value == ''){
    alert("O campo RUA é obrigatório.");
    return false;
  }
  if(formulario.numero.value == ''){
    alert("O campo NÚMERO é obrigatório.");
    return false;
  }
  if(formulario.numsol.value == ''){
    alert("O campo NÚMERO DE QUARTOS DE SOLTEIRO é obrigatório.");
    return false;
  }
  if(formulario.presol.value == ''){
    alert("O campo PREÇO DO QUARTO DE SOLTEIRO é obrigatório.");
    return false;
  }
  if(formulario.numcas.value == ''){
    alert("O campo NÚMERO DE QUARTOS DE CASAL é obrigatório.");
    return false;
  }
  if(formulario.precas.value == ''){
    alert("O campo PREÇO DO QUARTO DE CASAL é obrigatório.");
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
<br><br><br>
<form id="formulario" method="post" action="cadastrando_hotel.php" onsubmit="return validar(this)";>
	Nome do Hotel: <input type="text" name="nome"/><br></br>
	CNPJ: <input type="text" name="cnpj"/><br></br>
	Cidade: <input type="text" name="cidade"/><br></br>
	Estado: <input type="text" name="estado"/><br></br>
	Rua: <input type="text" name="rua"/><br></br>
	Número: <input type="text" name="numero"/><br></br>
	Número de quartos de solteiro: <input type="text" name="numsol"/><br></br>
	Preço do quarto de solteiro: <input type="text" name="presol"/><br></br>
	Número de quartos de casal: <input type="text" name="numcas"/><br></br>
	Preço do quarto de casal: <input type="text" name="precas"/><br></br>
	<input type="submit" value="Cadastrar"/>
</form>
<form align="left" name="form" method="post" action="painel_adm.php">
<input type="submit" value="Voltar">
</form>
<form name="form" method="post" action="logout.php">
<center>
<br>
<br>
<input name="botao" type="image" value="teste" src="sair.jpg" width="50" height="25">
</form>
</body>

</html>