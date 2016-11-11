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
  if((formulario.login.value == '') || (formulario.senha.value == '')){
    alert("Login inválido. Por favor verifique os campos.");
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
<div id="menumeio">    
    <form name="loginform" method="post" action="userautentication.php" onsubmit="return validar(this)";>
        <center>
            Login: <input type="text" name="login" /><br /><br />
            Senha: <input type="password" name="senha" /><br />
            </br>
        <input type="submit" value="Entrar" />
        </br>
        </br>
        Paciente novo?
        <a href="cadastro.php">Cadastre-se</a></center>
    </form>
</div>
<div id="rodape">
    Sistema de Hospital - Disciplina de Banco de Dados 2014
</div>
</div>
</body>

</html>
