<?php
require_once("../header.php");
require_once("../side-bar.php");
?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Charts - Current Workload</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
           







								<?php
								include('connect-db.php');



								$sql ="SELECT taskTitle,Progress FROM task WHERE Progress = '100'";
								$resultadao = mysql_query ($sql);
								$i=0;
								while ($row = mysql_fetch_object ($resultadao))

								{

									$i =$i+1;
								}
								$sql ="SELECT taskTitle,Progress FROM task WHERE Progress < '100'";
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
										  ['Completed',     <?php echo  intval($i)?>],
										  ['In Progress',      <?php echo  intval($k)?>],
									  
										]);

										var options = {
										  title: 'Completed VS. In Progress'
										};

										var chart = new google.visualization.PieChart(document.getElementById('piechart'));

										chart.draw(data, options);
									  }
									</script>
								  </head>
								  <body>
									<div id="piechart" style="width: 1200px; height: 700px;"></div>
								  </body>
								</html>	
									
									
								  <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/dist/js/sb-admin-2.js"></script>

	<!-- DataTables JavaScript -->
    <script src="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    

  <script>var events = <?php echo $events ?>;</script>
  
 
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

  
  
  </body>
</html>