<?php
include("conexao.php"); 

	$filtro1 = $db->command(array("distinct"=>"items", "key"=>"texto", "query" => array('texto' => new MongoRegex("/.Vasco./i"), 'link' => new MongoRegex("/.futebol./i"))));

	$filtro2 = $db->command(array("distinct"=>"items", "key"=>"texto", "query" => array('texto' => new MongoRegex("/.São Paulo./i"), 'link' => new MongoRegex("/.futebol./i"))));

	$filtro3 = $db->command(array("distinct"=>"items", "key"=>"texto", "query" => array('texto' => new MongoRegex("/.Santos./i"), 'link' => new MongoRegex("/.futebol./i"))));

	$filtro4 = $db->command(array("distinct"=>"items", "key"=>"texto", "query" => array('texto' => new MongoRegex("/.Palmeiras./i"), 'link' => new MongoRegex("/.futebol./i"))));

	$filtro5 = $db->command(array("distinct"=>"items", "key"=>"texto", "query" => array('texto' => new MongoRegex("/.Internacional./i"), 'link' => new MongoRegex("/.futebol./i"))));

	$filtro6 = $db->command(array("distinct"=>"items", "key"=>"texto", "query" => array('texto' => new MongoRegex("/.Grêmio./i"), 'link' => new MongoRegex("/.futebol./i"))));

	$filtro7 = $db->command(array("distinct"=>"items", "key"=>"texto", "query" => array('texto' => new MongoRegex("/.Fluminense./i"), 'link' => new MongoRegex("/.futebol./i"))));

	$filtro8 = $db->command(array("distinct"=>"items", "key"=>"texto", "query" => array('texto' => new MongoRegex("/.Flamengo./i"), 'link' => new MongoRegex("/.futebol./i"))));

	$filtro9 = $db->command(array("distinct"=>"items", "key"=>"texto", "query" => array('texto' => new MongoRegex("/.Cruzeiro./i"), 'link' => new MongoRegex("/.futebol./i"))));

	$filtro10 = $db->command(array("distinct"=>"items", "key"=>"texto", "query" => array('texto' => new MongoRegex("/.Corinthians./i"), 'link' => new MongoRegex("/.futebol./i"))));

	$filtro11 = $db->command(array("distinct"=>"items", "key"=>"texto", "query" => array('texto' => new MongoRegex("/.Botafogo./i"), 'link' => new MongoRegex("/.futebol./i"))));
	
	$filtro12 = $db->command(array("distinct"=>"items", "key"=>"texto", "query" => array('texto' => new MongoRegex("/.Atlético-MG./i"), 'link' => new MongoRegex("/.futebol./i"))));

	$filtro13 = $db->command(array("distinct"=>"items", "key"=>"texto", "query" => array('texto' => new MongoRegex("/.Atlético-PR./i"), 'link' => new MongoRegex("/.futebol./i"))));

	$filtro14 = $db->command(array("distinct"=>"items", "key"=>"texto", "query" => array('texto' => new MongoRegex("/.Chapecoense./i"), 'link' => new MongoRegex("/.futebol./i"))));

	$filtro15 = $db->command(array("distinct"=>"items", "key"=>"texto", "query" => array('texto' => new MongoRegex("/.Joinville./i"), 'link' => new MongoRegex("/.futebol./i"))));

	$filtro16 = $db->command(array("distinct"=>"items", "key"=>"texto", "query" => array('texto' => new MongoRegex("/.Avaí./i"), 'link' => new MongoRegex("/.futebol./i"))));

	$filtro17 = $db->command(array("distinct"=>"items", "key"=>"texto", "query" => array('texto' => new MongoRegex("/.Ponte Preta./i"), 'link' => new MongoRegex("/.futebol./i"))));

	$filtro18 = $db->command(array("distinct"=>"items", "key"=>"texto", "query" => array('texto' => new MongoRegex("/.Goiás./i"), 'link' => new MongoRegex("/.futebol./i"))));

	$filtro19 = $db->command(array("distinct"=>"items", "key"=>"texto", "query" => array('texto' => new MongoRegex("/.Coritiba./i"), 'link' => new MongoRegex("/.futebol./i"))));

?>

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
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Atlético-MG', <?php echo count($filtro12["values"])?>],
          ['Botafogo', <?php echo count($filtro11["values"])?>],
          ['Corinthians', <?php echo count($filtro10["values"])?>],
          ['Cruzeiro', <?php echo count($filtro9["values"])?>],
          ['Flamengo', <?php echo count($filtro8["values"])?>],
	  ['Fluminense', <?php echo count($filtro7["values"])?>],
          ['Grêmio', <?php echo count($filtro6["values"])?>],
          ['Internacional', <?php echo count($filtro5["values"])?>],
          ['Palmeiras', <?php echo count($filtro4["values"])?>],
	  ['Santos', <?php echo count($filtro3["values"])?>],
	  ['São Paulo', <?php echo count($filtro2["values"])?>],
	  ['Vasco', <?php echo count($filtro1["values"])?>],
	  ['Atlético-PR', <?php echo count($filtro13["values"])?>],
  	  ['Avaí', <?php echo count($filtro14["values"])?>],
  	  ['Chapecoense', <?php echo count($filtro15["values"])?>],
	  ['Coritiba', <?php echo count($filtro16["values"])?>],
	  ['Goiás', <?php echo count($filtro17["values"])?>],
	  ['Joinville', <?php echo count($filtro18["values"])?>],
	  ['Ponte Preta', <?php echo count($filtro19["values"])?>],
        ]);

        // Set chart options
        var options = {'title':'BRASILEIRÃO 2014 - Quantidade de comentários por time',
                       'width':960,
                       'height':600};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

  	</head>

<body>
<div id="chart_div"></div>
</body>
</html>

