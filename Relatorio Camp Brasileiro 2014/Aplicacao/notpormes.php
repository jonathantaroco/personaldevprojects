<?php
include("conexao.php");

	$filtro1 = $db->command(array("distinct"=>"items", "key"=>"link", "query" => array('link' => new MongoRegex("/.2014\/01./i"))));

	$filtro2 = $db->command(array("distinct"=>"items", "key"=>"link", "query" => array('link' => new MongoRegex("/.2014\/02./i"))));

	$filtro3 = $db->command(array("distinct"=>"items", "key"=>"link", "query" => array('link' => new MongoRegex("/.2014\/03./i"))));

	$filtro4 = $db->command(array("distinct"=>"items", "key"=>"link", "query" => array('link' => new MongoRegex("/.2014\/04./i"))));

	$filtro5 = $db->command(array("distinct"=>"items", "key"=>"link", "query" => array('link' => new MongoRegex("/.2014\/05./i"))));

	$filtro6 = $db->command(array("distinct"=>"items", "key"=>"link", "query" => array('link' => new MongoRegex("/.2014\/06./i"))));

	$filtro7 = $db->command(array("distinct"=>"items", "key"=>"link", "query" => array('link' => new MongoRegex("/.2014\/07./i"))));

	$filtro8 = $db->command(array("distinct"=>"items", "key"=>"link", "query" => array('link' => new MongoRegex("/.2014\/08./i"))));

	$filtro9 = $db->command(array("distinct"=>"items", "key"=>"link", "query" => array('link' => new MongoRegex("/.2014\/09./i"))));

	$filtro10 = $db->command(array("distinct"=>"items", "key"=>"link", "query" => array('link' => new MongoRegex("/.2014\/10./i"))));

	$filtro11 = $db->command(array("distinct"=>"items", "key"=>"link", "query" => array('link' => new MongoRegex("/.2014\/11./i"))));
	
	$filtro12 = $db->command(array("distinct"=>"items", "key"=>"link", "query" => array('link' => new MongoRegex("/.2014\/12./i"))));

include("geragraficos.php");

?>

