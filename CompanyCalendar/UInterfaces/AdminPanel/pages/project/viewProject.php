<?php
require_once("../header.php");
require_once("../side-bar.php");
?>

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">View Projects</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
           
				
															
							<?php
							/* 
								VIEW.PHP
								Displays all data from 'players' table
							*/

								// connect to the database
								include('../connect-db.php');

								// get results from database
								$result = mysql_query("SELECT p.*,u.name mname from project p inner join users u on p.managerId=u.id
") 
									or die(mysql_error());  
									
								// display data in table
								
								
								
								

								echo "<div class='panel-body'>";
								echo"<div class='dataTable_wrapper'>";
									echo"<table class='table table-striped table-bordered table-hover' id='dataTables-example'>";
										echo"<thead>";
											echo"<tr>";
												echo"<th>ID</th>";
												echo"<th>Project Name</th>";
												echo"<th>Project Manager</th>";
												
											echo"</tr>";
										echo"</thead>";
										echo"<tbody>";
								
								
										
								// loop through results of database query, displaying them in the table
								while($row = mysql_fetch_array( $result )) {
									
																								
									// echo out the contents of each row into a table
									echo "<tr class='odd gradeX'>";
									echo '<td>' . $row['id'] . '</td>';
									echo '<td>' . $row['name'] . '</td>';
									echo '<td>' . $row['mname'] . '</td>';
									
									
									
									

									echo "</tr>"; 
								} 
								
								echo "</tbody>";
								

								// close table>
								echo "</table>";
								echo"</div>";
							?>
					
					</body>
						</html>			
									
									
								  <!-- /#page-wrapper -->

    
									
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