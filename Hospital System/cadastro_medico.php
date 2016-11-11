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
  if(formulario.cpfmed.value == ''){
    alert("O campo CPF é obrigatório.");
    return false;
  }
  if(formulario.nome.value == ''){
    alert("O campo Nome é obrigatório.");
    return false;
  }
  if(formulario.login.value == ''){
    alert("O campo Login é obrigatório.");
    return false;
  }
  if(formulario.senha.value == ''){
    alert("O campo Senha é obrigatório.");
    return false;
  }
  if((formulario.estado.value == '') || (formulario.cidade.value == '') || (formulario.rua.value == '') || (formulario.numero.value == '')){
    alert("Faltam informações obrigatórias sobre o endereço.");
    return false;
  }
  if(formulario.telefone.value == ''){
    alert("O campo Telefone é obrigatório.");
    return false;
  }
  if(formulario.nascimento.value == ''){
    alert("O campo Data de Nascimento é obrigatório.");
    return false;
  }
  if(formulario.sexo.value == ''){
    alert("O campo Sexo é obrigatório.");
    return false;
  }
  if(formulario.crm.value == ''){
    alert("O campo CRM é obrigatório.");
    return false;
  }
  if(formulario.espmed.value == ''){
    alert("O campo Especialização Médica é obrigatório.");
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
    <form id="formulario" method="post" action="cadastrando_medico.php" onsubmit="return validar(this)";>
        CPF: <input type="text" name="cpfmed"/><br></br>
        Nome: <input type="text" name="nome"/><br></br>
        Login: <input type="text" name="login"/><br></br>
        Senha: <input type="password" name="senha"/><br></br>
        Estado: <input type="text" name="estado"/><br></br>
        Cidade: <input type="text" name="cidade"/><br></br>
        Rua: <input type="text" name="rua"/><br></br>
        Número: <input type="text" name="numero"/><br></br>
        Telefone: <input type="text" name="telefone"/><br></br>
        Data de Nascimento: <input type="date" name="nascimento"/><br></br>
        Sexo (Homem ou Mulher): <input type="text" name="sexo"/><br></br>
        CRM: <input type="text" name="crm"/><br></br>
        Especialização Médica: <input type="text" name="espmed"/><br></br>
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