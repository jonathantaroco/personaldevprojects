<html lang="pt">
  <head>
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
	  ['Janeiro', <?php echo count($filtro1["values"])?>],
	  ['Fevereiro', <?php echo count($filtro2["values"])?>],
	  ['Março', <?php echo count($filtro3["values"])?>],
          ['Abril', <?php echo count($filtro4["values"])?>],
          ['Maio', <?php echo count($filtro5["values"])?>],
          ['Junho', <?php echo count($filtro6["values"])?>],
	  ['Julho', <?php echo count($filtro7["values"])?>],
          ['Agosto', <?php echo count($filtro8["values"])?>],
          ['Setembro', <?php echo count($filtro9["values"])?>],
          ['Outubro', <?php echo count($filtro10["values"])?>],
          ['Novembro', <?php echo count($filtro11["values"])?>],
          ['Dezembro', <?php echo count($filtro12["values"])?>],
	]);

        // Set chart options
        var options = {'title':'Quantidade de notícias por mês',
                       'width':800,
                       'height':600};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

  </head>

<body>
<div id="chart_div"></div>
</body>
</html>
