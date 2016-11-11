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
function sucessfully(){
	setTimeout("window.location='painel_adm.php'", 2000);
}
function failed(){
	setTimeout("window.location='desalocar_medicos.php'", 2000);
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
<?php
include "dbconexao.php";

$nome=$_POST['nome'];
$data=$_POST['data'];
$hora=$_POST['hora'];
$numero=$_POST['numero'];

$sql = mysql_query("SELECT cpf FROM usuario WHERE nome = '$nome' AND tipousuario = 'Medico'");
    $row = mysql_num_rows($sql);
    $linha = mysql_fetch_array($sql);
    if ($row == 1) {
        $cpf=$linha['cpf'];
        $sql = mysql_query("DELETE FROM atende WHERE cpfmed = '$cpf' AND numero = '$numero' AND data = '$data' AND hora = '$hora'");
        if ($sql) {
            echo "<h3><center>Desalocação efetuada com sucesso!</center></h3>";
            echo "<script>sucessfully()</script>";  
        }
    } else {
        echo "<h3><center>Não foi possível. Médico inexistente!</center><h3>";
        echo "<script>failed()</script>";
    }
?>
</div>
<div id="rodape">
    Sistema de Hospital - Disciplina de Banco de Dados 2014
</div>
</div>
</body>
</html>