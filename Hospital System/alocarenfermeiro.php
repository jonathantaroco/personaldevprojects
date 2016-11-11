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
    alert("O campo Nome Completo do Enfermeiro é obrigatório.");
    return false;
  }      
  if(formulario.data.value == ''){
    alert("O campo Dia é obrigatório.");
    return false;
  }   
  if(formulario.turno.value == ''){
    alert("O campo Turno é obrigatório.");
    return false;
  }
  if(formulario.sala.value == ''){
    alert("O campo Tipo de Sala é obrigatório.");
    return false;
  }
  if(formulario.numero.value == ''){
    alert("O campo Número da Sala é obrigatório.");
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
    <form id="formulario" name="signup" method="post" action="alocandoenfermeiro.php" onsubmit="return validar(this);">
	   Nome Completo do Enfermeiro: <input type="text" name="nome"/><br><br>
       Dia: <input type="date" name="dia"/><br><br>
       Hora de início do trabalho: <input type="time" name="horainicio"/><br><br> 
       Tempo de trabalho: <input type="text" name="periodo"/><br><br>
       Número da Sala: <input type="text" name="numero"/><br><br>
	   <input type="submit" value="Solicitar Enfermeiro"/>
    </form>
    <form align="left" name="form" method="post" action="painelmedico.php">
        <input type="submit" value="Voltar">
    </form>
<?php
$sql = mysql_query("SELECT nome, espenf FROM usuario WHERE tipousuario = 'Enfermeiro'");
echo "<h3>Enfermeiros do Sistema</h3>";
while ($registro = mysql_fetch_array($sql)) {
    echo "______________________"; echo "</br>"; echo "</br>";
    echo "<b>Nome do Enfermeiro: </b>"; echo $registro['nome']; echo "</br>";
    echo "<b>Especialidade: </b>"; echo $registro['espenf']; echo "</br>";
}
?>
</div>
<div id="rodape">
    Sistema de Hospital - Disciplina de Banco de Dados 2014
</div>
</div>
</body>

</html>