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
</head>

<body>
<div id="container">    
<div id="header">
	<div id="logo">
		<h1><a href="#">Sistema de Hospital</a></h1>
	</div>
</div>
<div id="menumeiousuario">
<form id="formulario" name="signup" method="post" action="especialidadesmedicasselecao.php" onsubmit="return validar(this);">
    <?php echo "<h4>Escolha o nome da especialidade médica para obter o relatório:</h4>"?>
    <select name='espmed'>
        <?php
            $sql = mysql_query ("SELECT cpf, espmed FROM usuario WHERE tipousuario = 'Medico'");
            while($row = mysql_fetch_array($sql)) {
                echo "<option value='" . $row['cpf'] . "'>" . $row['espmed'] . "</option>";
            }
        ?>
    </select></br></br>
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