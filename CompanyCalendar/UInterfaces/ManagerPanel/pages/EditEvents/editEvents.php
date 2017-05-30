<?php 
include("../header.php");
?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Edit Events</h1>
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
								include('connect-db.php');
								$myID=$_SESSION['sess_username'];
								// get results from database
								$result = mysql_query("SELECT * FROM events WHERE  eventsRespo LIKE '%$myID%' ") 
									or die(mysql_error());  
									
								// display data in table
								
								
								
								

								echo "<div class='panel-body'>";
								echo"<div class='dataTable_wrapper'>";
									echo"<table class='table table-striped table-bordered table-hover' id='dataTables-example'>";
										echo"<thead>";
											echo"<tr>";
												echo"<th>ID</th>";
												echo"<th>Title Title</th>";
												echo"<th>Event Discrpition</th>";
												echo"<th>Event Date</th>";
												echo"<th>Event Time</th>";
												echo"<th>Members</th>";
												
	
												echo"<th></th>";
												echo"<th></th>";
											echo"</tr>";
										echo"</thead>";
										echo"<tbody>";
								
								
										
								// loop through results of database query, displaying them in the table
								while($row = mysql_fetch_array( $result )) {
									
																								
									// echo out the contents of each row into a table
									echo "<tr class='odd gradeX'>";
									echo '<td>' . $row['eventsID'] . '</td>';
									echo '<td>' . $row['eventsTitle'] . '</td>';
									echo '<td>' . $row['eventsDetails'] . '</td>';
									echo '<td>' . $row['eventsDate'] . '</td>';
									echo '<td>' . $row['eventsTime'] . '</td>';
									echo '<td>' . $row['users'] . '</td>';
									
									echo '<td><a href="edit.php?eventsID=' . $row['eventsID'] . '">Edit</a></td>';
									echo '<td><a href="delete.php?eventsID=' . $row['eventsID'] . '">Delete</a></td>';
									
									
									

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

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/dist/js/sb-admin-2.js"></script>

	<!-- DataTables JavaScript -->
    <script src="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

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