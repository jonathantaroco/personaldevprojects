<?php
session_start();
include "dbconexao.php";
?>
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
  if ((formulario.datainicio.value == '') || (formulario.datafim.value == '') || (formulario.nome.value == '')) {
    alert("Por favor, preencha todos os campos.");
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
<form id="formulario" name="signup" method="post" action="alocacaoenfselecao.php" onsubmit="return validar(this);">
    <?php echo "<h4>Escolha o enfermeiro, uma data inicial e uma data final para obter o relatório:</h4>"?>
    <select name='nome'>
        <?php
            $sql = mysql_query ("SELECT cpf, nome FROM usuario WHERE tipousuario = 'Enfermeiro'");
            while($row = mysql_fetch_array($sql)) {
                echo "<option value='" . $row['cpf'] . "'>" . $row['nome'] . "</option>";
            }
        ?>
    </select></br></br>
    <input type="date" name="datainicio"/><br><br>
    <input type="date" name="datafim"/><br><br>
	<input type="submit" value="Consultar"/>
</form>
<form align="left" name="form" method="post" action="painel_presidente.php">
    <input type="submit" value="Voltar">
</form>
</div>
<div id="rodape">
    Sistema de Hospital - Disciplina de Banco de Dados 2014
</div>
</div>
</body>

</html>