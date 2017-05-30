<?php 
include("../header.php"); ?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Submit Your Progress</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
				
				
				<html>
						
					
							<?php
								/* 
								 EDIT.PHP
								 Allows user to edit specific entry in database
								*/

								 // creates the edit record form
								 // since this form is used multiple times in this file, I have made it a function that is easily reusable
								 function renderForm($taskID, $title, $description,$start,$due,$manager,$members,$progress,$status)
								 {
								 ?>
							
								 <body>
								 <?php 
								 // if there are any errors, display them
								 
								 ?> 
								 
								 <form action="" method="post">
								 <input type="hidden" name="id" value="<?php echo $taskID; ?>"/>
								 <div>
								 <p><strong>ID:</strong> <?php echo $taskID; ?></p>
								 
								 
							  
							  
							  
							  <div class="form-group">
                                      <label class="col-sm-2 control-label">Task Title</label>
                                      <div class="col-sm-10">
                                          <input type="text" id="title" name="title" value="<?php echo $title;?>" maxlength="100"  class="form-control" readonly>
                                          <span class="help-block"></span>
                                      </div>
                                  </div>
					</p>
					
					<div class="form-group">
                                      <label class="col-sm-2 control-label">Task Description</label>
                                      <div class="col-sm-10">
										<textarea rows="4" cols="50" id="desription" name="description"class="form-task " style="margin: 0px; width: 100%; height: 139px;"readonly ><?php echo $description;?>" </textarea>

                                          
                                          <span class="help-block"></span>
                                      </div>
                                  </div>
					
					<div class="form-group">
                                      <label class="col-sm-2 control-label">START Date</label>
                                      <div class="col-sm-10">
                                          <input type="date" id="start" name="start" value="<?php echo $start;?>" maxlength="20"  class="form-control datepiker"readonly>
                                          <span class="help-block"></span>
                                      </div>
                                  </div>
					<div class="form-group">
                                      <label class="col-sm-2 control-label">DUE Date</label>
                                      <div class="col-sm-10">
                                          <input type="date" id="due" name="due" value="<?php echo $due;?>" maxlength="20"  class="form-control datepiker"readonly>
                                          <span class="help-block"></span>
                                      </div>
                                  </div>
					<div class="form-group">
                                      <label class="col-sm-2 control-label">Task Manager</label>
                                      <div class="col-sm-10">
                                          <input type="text" id="manager" name="manager" value="<?php echo $manager;?>" maxlength="20"  class="form-control"readonly>
                                          <span class="help-block"></span>
                                      </div>
                                  </div>
                    <div class="form-group">
                                      <label class="col-sm-2 control-label">Task members</label>
                                      <div class="col-sm-10">
                                          <input type="text" id="members" name="members" value="<?php echo $members;?>" maxlength="200"  class="form-control"readonly>
                                          <span class="help-block"></span>
                                      </div>
                                  </div>
								   <div class="form-group">
                                      <label class="col-sm-2 control-label">Task Progression</label>
                                      <div class="col-sm-10">
                                          <input type="text" id="progress" name="progress" value="<?php echo $progress;?>" maxlength="200"  class="form-control">
                                          <span class="help-block"></span>
                                      </div>
                                  </div>
							  
							  <div class="form-group">
                                      <label class="col-sm-2 control-label">Completed ?</label>
                                      <div class="col-sm-10">
                                          <input type="checkbox" id="status" name="status" value="Y"  <?php  if ($status=='Y'){echo "checked";} ?>  class="form-control">
                                          <span class="help-block"></span>
                                      </div>
                                  </div>
							  

								  
								   
									  
									  <span class="help-block"></span>
								  </div>
								 <p>* Required</p>
								 <input type="submit" name="submit" value="Submit">
								 </div>
								 </form> 
								 </body>
								 </html> 
								 
								 
								 
								 
								 
								 
								 
					 <?php
					 }



					 // connect to the database
					 include('connect-db.php');
					 
					 // check if the form has been submitted. If it has, process the form and save it to the database
					 if (isset($_POST['submit']))
					 { 
					 // confirm that the 'id' value is a valid integer before getting the form data
						 if (is_numeric($_POST['id']))
						 {
						 // get form data, making sure it is valid
						 $taskID = $_POST['id'];
						 $title = mysql_real_escape_string(htmlspecialchars($_POST['title']));
						 
						 $start = mysql_real_escape_string(htmlspecialchars($_POST['start']));
						 $due = mysql_real_escape_string(htmlspecialchars($_POST['due']));
						 $description = mysql_real_escape_string(htmlspecialchars($_POST['description']));
						 $manager = mysql_real_escape_string(htmlspecialchars($_POST['manager']));
						 $members = mysql_real_escape_string(htmlspecialchars($_POST['members']));
						 $progress = mysql_real_escape_string(htmlspecialchars($_POST['progress']));
                         $status = mysql_real_escape_string(htmlspecialchars($_POST['status']));
						 
						 // check that firstname/lastname fields are both filled in
								 if ($title == '' || $start == '')
								 {
										 // generate error message
										 $error = 'ERROR: Please fill in all required fields!';
										 
										 //error, display form
										 renderForm($taskID, $title, $description,$start,$due,$manager,$members,$progress,$status);
										 }
								 else
								 {
										 // save the data to the database
                                    //echo "UPDATE task SET  Progress=$progress WHERE taskID='$taskID' status = '$status' "; exit;
										 mysql_query("UPDATE task SET  Progress=$progress, status = '$status' WHERE taskID='$taskID'  ")
										 or die(mysql_error()); 
										 
										 // once saved, redirect back to the view page
											echo("<script>location.href = 'http://localhost/CompanyCalendar/UInterfaces/EmployeePanel/pages/SubmitTasks/SubmitTasks.php?id=".$_SESSION['sess_user_id']."';</script>");
								 }
					 
						}
						 else
						 {
						 // if the 'id' isn't valid, display an error
						 echo 'Error!';
						 }
					 }
					 else
					 // if the form hasn't been submitted, get the data from the db and display the form
					 {
					 
					 // get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
					 if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
					 {
					 // query db
					 $taskID = $_GET['id'];
					 $result = mysql_query("SELECT * FROM task WHERE taskID=$taskID")
					 or die(mysql_error()); 
					 $row = mysql_fetch_array($result);
					 
					 // check that the 'id' matches up with a row in the databse
					 if($row)
					 {
					 
					 // get data from db
					 $title = $row['taskTitle'];
					 
					 $start = $row['startDate'];
					 $due = $row['dueDate'];
					 $description = $row['description'];
					 $manager = $row['manager'];
					 $members = $row['members'];
					 $progress=$row['Progress'];
                     $status=$row['status'];
					 
					 
					 
					 
					 // show form
					 renderForm($taskID, $title, $description,$start,$due,$manager,$members,$progress,$status);
					 }
					 else
					 // if no match, display result
					 {
					 echo "No results!";
					 }
					 }
					 else
					 // if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error
					 {
					 echo 'Error!';
					 }
					 }
					 
					?>
					
					</body>
						</html>			
									
									
	  <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="http://localhost/CompanyCalendar/UInterfaces/EmployeePanel/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="http://localhost/CompanyCalendar/UInterfaces/EmployeePanel/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="http://localhost/CompanyCalendar/UInterfaces/EmployeePanel/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="http://localhost/CompanyCalendar/UInterfaces/EmployeePanel/dist/js/sb-admin-2.js"></script>


  <script>var events = <?php echo $events ?>;</script>
  
  <script src='js/jquery-ui.min.js'></script>
  <script src='fc/lib/moment.min.js'></script>
  <script src='fc/fullcalendar.js'></script>
  <script src='js/main.js'></script>

  </body>
</html>