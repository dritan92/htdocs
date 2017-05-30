<?php
include('connect-db.php');
$lista = array();
$dens = array();


$sql ="SELECT title,Progress FROM task";
$resultadao = mysql_query ($sql);
$i=0;
while ($row = mysql_fetch_object ($resultadao))

{
	$title = $row -> title;
	$progress = $row -> Progress;
	$lista[$i] = $title;
	$dens[$i] = $progress;
	$i =$i+1;
}


?>




<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ["Task Title", "Progress"],
		  <?php
		  $k =$i;
		  for ($i=0; $i<$k; $i++)
			  
		  {
			  ?>
			["<?php echo $lista[$i]?>" ,  <?php echo  intval($dens[$i] )?>],
			  
		  <?php } ?>
	  ]);
		  
		/*   function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Opening Move', 'Percentage'],
          ["King's pawn (e4)", 44],
          ["Queen's pawn (d4)", 31],
          ["Knight to King 3 (Nf3)", 12],
          ["Queen's bishop pawn (c4)", 10],
          ['Other', 3]
        ]);*/
		  
		  
         

        var options = {
         
          width: 900,
          legend: { position: 'none' },
          
          bars: 'horizontal', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'Percentage'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };
    </script>
  </head>
  <body>
    <div id="top_x_div" style="width: 400; height: 200;"></div>
  </body>
</html>