
<?php
include('connect-db.php');



$sql ="SELECT title,Progress FROM task WHERE Progress = '100'";
$resultadao = mysql_query ($sql);
$i=0;
while ($row = mysql_fetch_object ($resultadao))

{

	$i =$i+1;
}
$sql ="SELECT title,Progress FROM task WHERE Progress < '100'";
$resultadao = mysql_query ($sql);
$k=0;
while ($row = mysql_fetch_object ($resultadao))

{

	$k =$k+1;
}

/*echo $i;

echo $k;*/
?>


<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Done',     <?php echo  intval($i)?>],
          ['In Progress',      <?php echo  intval($k)?>],
      
        ]);

        var options = {
          title: 'Done VS. In Progress'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>