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
    alert("O campo NOME COMPLETO é obrigatório.");
    return false;
  }
  if(formulario.cpf.value == ''){
    alert("O campo CPF é obrigatório.");
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
  if(formulario.login.value == ''){
    alert("O campo LOGIN é obrigatório.");
    return false;
  }
  if(formulario.senha.value == ''){
    alert("O campo SENHA é obrigatório.");
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
<br><br><br><br>
<form id="formulario" name="signup" method="post" action="cadastrando.php" onsubmit="return validar(this);">
	Nome completo: <input type="text" name="nome"/><br></br>
	CPF (sem pontos ou traços): <input type="text" name="cpf"/><br></br>
	Cidade: <input type="text" name="cidade"/><br></br>
	Estado: <input type="text" name="estado"/><br></br>
	Rua: <input type="text" name="rua"/><br></br>
	Número: <input type="text" name="numero"/><br></br>
	Login: <input type="text" name="login"/><br></br>
	Senha: <input type="password" name="senha"/><br></br>
	<input type="submit" value="Cadastrar"/>
</body>

</html>