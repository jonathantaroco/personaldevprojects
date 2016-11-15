<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title> Home </title>    

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

  	</head>

<body>

<?php
include("conexao.php");



	$filtro1 = $db->command(array("distinct"=>"items", "key"=>"link", "query" => array('link' => new MongoRegex("/.2014\/01./i"), 'titulo' => new MongoRegex("/.Goiás./i"))));

	$filtro2 = $db->command(array("distinct"=>"items", "key"=>"link", "query" => array('link' => new MongoRegex("/.2014\/02./i"), 'titulo' => new MongoRegex("/.Goiás./i"))));

	$filtro3 = $db->command(array("distinct"=>"items", "key"=>"link", "query" => array('link' => new MongoRegex("/.2014\/03./i"), 'titulo' => new MongoRegex("/.Goiás./i"))));

	$filtro4 = $db->command(array("distinct"=>"items", "key"=>"link", "query" => array('link' => new MongoRegex("/.2014\/04./i"), 'titulo' => new MongoRegex("/.Goiás./i"))));

	$filtro5 = $db->command(array("distinct"=>"items", "key"=>"link", "query" => array('link' => new MongoRegex("/.2014\/05./i"), 'titulo' => new MongoRegex("/.Goiás./i"))));

	$filtro6 = $db->command(array("distinct"=>"items", "key"=>"link", "query" => array('link' => new MongoRegex("/.2014\/06./i"), 'titulo' => new MongoRegex("/.Goiás./i"))));

	$filtro7 = $db->command(array("distinct"=>"items", "key"=>"link", "query" => array('link' => new MongoRegex("/.2014\/07./i"), 'titulo' => new MongoRegex("/.Goiás./i"))));

	$filtro8 = $db->command(array("distinct"=>"items", "key"=>"link", "query" => array('link' => new MongoRegex("/.2014\/08./i"), 'titulo' => new MongoRegex("/.Goiás./i"))));

	$filtro9 = $db->command(array("distinct"=>"items", "key"=>"link", "query" => array('link' => new MongoRegex("/.2014\/09./i"), 'titulo' => new MongoRegex("/.Goiás./i"))));

	$filtro10 = $db->command(array("distinct"=>"items", "key"=>"link", "query" => array('link' => new MongoRegex("/.2014\/10./i"), 'titulo' => new MongoRegex("/.Goiás./i"))));

	$filtro11 = $db->command(array("distinct"=>"items", "key"=>"link", "query" => array('link' => new MongoRegex("/.2014\/11./i"), 'titulo' => new MongoRegex("/.Goiás./i"))));

	$filtro12 = $db->command(array("distinct"=>"items", "key"=>"link", "query" => array('link' => new MongoRegex("/.2014\/12./i"), 'titulo' => new MongoRegex("/.Goiás./i"))));


include("geragraficos.php");
 

	$filtro = $db->command(array("distinct"=>"items", "key"=>"titulo", "query" => array('titulo' => new MongoRegex("/.Goiás./i"), 'link' => new MongoRegex("/.futebol./i"))));
	echo "Quantidade de notícias do Goiás: ";
	echo count($filtro["values"]); echo "<br>";
	$cont = count($filtro["values"]);
	$filtro2 = $db->command(array("distinct"=>"items", "key"=>"link", "query" => array('titulo' => new MongoRegex("/.Goiás./i"), 'link' => new MongoRegex("/.futebol./i"))));

	for ($i = 0; $i <  $cont; $i++) {
		echo "<p style='background: #ccccff;'>"."Título: ".$filtro['values'][$i]."</p>";
		echo "<b>Link:</b> ";
		echo $filtro2['values'][$i]; echo "<br>";
	}
?>
</body>
</html>

