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

<?php    
$cpf = $_SESSION['cpf'];

$sql = ("SELECT tipousuario, cpf, nome, estado, cidade, rua, numero, telefone, login, senha, plano FROM usuario WHERE cpf = '$cpf' LIMIT 1") or die (mysql_error());
$consulta = mysql_query($sql);
while ($registro = mysql_fetch_array($consulta)){
    if ($cpf == $registro["cpf"]) {
        $tipousuario = $registro["tipousuario"];
        $nome = $registro["nome"];
        $estado = $registro["estado"];
        $cidade = $registro["cidade"];
        $rua = $registro["rua"];
        $numero = $registro["numero"];
        $telefone = $registro["telefone"];
        $login = $registro["login"];
        $senha = $registro["senha"];
        $plano = $registro["plano"];
    }
}
    
?>
<div id="menumeiousuario"> 
    <form id="formulario" name="signup" method="post" action="editando.php">
	   Nome completo: <input type="text" value="<?php echo $nome ?>" name="nome"/><br></br>
	   Estado: <input type="text" value="<?php echo $estado ?>" name="estado"/><br></br>
       Cidade: <input type="text" value="<?php echo $cidade ?>" name="cidade"/><br></br>
	   Rua: <input type="text" value="<?php echo $rua ?>" name="rua"/><br></br>
	   Número: <input type="text" value="<?php echo $numero ?>" name="numero"/><br></br>
       Telefone: <input type="text" value="<?php echo $telefone ?>" name="telefone"/><br></br>
	   Login: <input type="text" value="<?php echo $login ?>" name="login"/><br></br>
	   Senha: <input type="password" value="<?php echo $senha ?>" name="senha"/><br></br>
       <?php
    if ($tipousuario == 'Paciente') { ?>
       Plano de Saúde: <input type="text" value="<?php echo $plano ?>" name="plano"/><br></br>
    <?php } ?>
	   <input type="submit" value="Alterar"/>
    </form>
    <?php
    if ($tipousuario == 'Paciente') {
        ?>
        <form align="left" name="form" method="post" action="painelpaciente.php">
            <input type="submit" value="Voltar">
        </form>
        <?php } else if ($tipousuario == 'Medico') {
        ?>
        <form align="left" name="form" method="post" action="painelmedico.php">
            <input type="submit" value="Voltar">
        </form>
        <?php } else if ($tipousuario == 'Enfermeiro') {
        ?>
        <form align="left" name="form" method="post" action="painelenfermeiro.php">
            <input type="submit" value="Voltar">
        </form>
        <?php } ?>
</div>
<div id="rodape">
    Sistema de Hospital - Disciplina de Banco de Dados 2014
</div>
</div>
</body>

</html>