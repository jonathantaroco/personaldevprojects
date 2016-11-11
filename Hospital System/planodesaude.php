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
function sucessfully(){
	setTimeout("window.location='painel_presidente.php'", 2000);
}
function failed(){
	setTimeout("window.location='taxadeocupacao.php'", 2000);
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
echo "<h4>Planos de Saúde</h4>";

$sqlquery = mysql_query("SELECT  DISTINCT plano FROM usuario WHERE tipousuario = 'Paciente'") or die(mysql_error());
$rows = mysql_num_rows($sqlquery);
while ($registro = mysql_fetch_array($sqlquery)) {
    echo $registro['plano'];echo "<br>";
}
?>
    </br></br><form align="left" name="form" method="post" action="painel_presidente.php">
        <input type="submit" value="Voltar">
    </form>
</div>
<div id="rodape">
    Sistema de Hospital - Disciplina de Banco de Dados 2014
</div>
</div>
</body>
</html>