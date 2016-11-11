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
  if(formulario.nome.value == ''){
    alert("O campo Nome Completo do Médico é obrigatório.");
    return false;
  }      
  if(formulario.data.value == ''){
    alert("O campo Dia e Hora é obrigatório.");
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
    <form id="formulario" name="signup" method="post" action="marcandoconsulta.php" onsubmit="return validar(this);">
	   Nome Completo do Médico: <input type="text" name="nome"/><br><br>
       Dia: <input type="date" name="data"/><br><br>
       Hora: <input type="time" name="hora"/><br><br>
	   <input type="submit" value="Marcar"/>
    </form>
    <form align="left" name="form" method="post" action="painelpaciente.php">
        <input type="submit" value="Voltar">
    </form>
</div>    
<div id="tabela">    
<?php
$sql = "(SELECT usuario.nome, atende.numero, atende.data, atende.hora FROM usuario, atende WHERE tipousuario = 'Medico' AND cpf = cpfmed)";
$consulta = mysql_query($sql);
echo "<h3>Horário de Atendimento dos Médicos</h3>";
		while ($registro = mysql_fetch_array($consulta)) {
            echo "______________________"; echo "</br>"; echo "</br>";
            echo "<b>Médico: </b>"; echo $registro['nome']; echo "</br>";
            echo "<b>Consultório: </b>"; echo $registro['numero']; echo "</br>";
            echo "<b>Dia: </b>"; echo $registro['data']; echo "</br>";
            echo "<b>Hora: </b>"; echo $registro['hora']; echo "</br>";
		}
?>
</div>
<div id="rodape">
    Sistema de Hospital - Disciplina de Banco de Dados 2014
</div>
</div>
</body>

</html>