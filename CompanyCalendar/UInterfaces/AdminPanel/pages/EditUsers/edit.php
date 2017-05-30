<?php require_once("../header.php");
require_once("../side-bar.php"); ?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Edit Users</h1>
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
								 function renderForm($id, $username, $password,$name,$surname,$email,$role, $status,$maxTask,$error)
								 {
								 ?>
							
								 <body>
								 <?php 
								 // if there are any errors, display them
								 if ($error != '')
								 {
								 echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
								 }
								 ?> 
								 
								 <form action="" method="post">
								 <input type="hidden" name="id" value="<?php echo $id; ?>"/>
								 <div>
								 <p><strong>ID:</strong> <?php echo $id; ?></p>
								 
								 
								 <div class="form-group">
                                      <label class="col-sm-2 control-label">username: *</label>
                                      <div class="col-sm-10">
                                          <input type="text" id="username" name="username" value="<?php echo $username;?>" maxlength="20"  class="form-control">
                                          <span class="help-block"></span>
                                      </div>
                                  </div>
								 
								 
								
								 
								 <div class="form-group">
                                      <label class="col-sm-2 control-label">password: *</label>
                                      <div class="col-sm-10">
                                          <input type="text" id="password" name="password" value="<?php echo $password;?>" maxlength="20"  class="form-control">
                                          <span class="help-block"></span>
                                      </div>
                                  </div>
								  
								  
								 
								   <div class="form-group">
                                      <label class="col-sm-2 control-label">Name: *</label>
                                      <div class="col-sm-10">
                                          <input type="text" id="name" name="name" value="<?php echo $name;?>" maxlength="20"  class="form-control">
                                          <span class="help-block"></span>
                                      </div>
                                  </div>
								 
								 
								 
								 	   <div class="form-group">
                                      <label class="col-sm-2 control-label">surname: *</label>
                                      <div class="col-sm-10">
                                          <input type="text" id="surname" name="surname" value="<?php echo $surname;?>" maxlength="20"  class="form-control">
                                          <span class="help-block"></span>
                                      </div>
                                  </div>
								 
								  
								 
								   <div class="form-group">
								  <label class="col-sm-2 control-label">email: *</label>
								  <div class="col-sm-10">
									  <input type="text" id="email" name="email" value="<?php echo $email;?>" maxlength="20"  class="form-control">
									  <span class="help-block"></span>
								  </div>
							  
							  

								  
								   <div class="form-group">
								  <label class="col-sm-2 control-label">role: *</label>
								  <div class="col-sm-10">
									  <input type="text" id="role" name="role" value="<?php echo $role;?>" maxlength="20"  class="form-control">
									  <span class="help-block"></span>
								  </div>
								   <div class="form-group">
                                      <label class="col-sm-2 control-label">MaX Task: *</label>
                                      <div class="col-sm-10">
                                          <input type="number" id="maxTask" name="maxTask" value="<?php echo $maxTask;?>" maxlength="20"  class="form-control">
                                          <span class="help-block"></span>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Day Off: *</label>
                                      <div class="col-sm-10">
                                          <input type="checkbox" id="status" name="status" value="N" <?php if($status =='N') echo 'checked';?> maxlength="20"  class="form-control ">
                                          <span class="help-block"></span>
                                      </div>
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
						 $id = $_POST['id'];
						 $username = mysql_real_escape_string(htmlspecialchars($_POST['username']));
						 $password = mysql_real_escape_string(htmlspecialchars($_POST['password']));
						 $role = mysql_real_escape_string(htmlspecialchars($_POST['role']));
						 $name = mysql_real_escape_string(htmlspecialchars($_POST['name']));
						 $surname = mysql_real_escape_string(htmlspecialchars($_POST['surname']));
						 $email = mysql_real_escape_string(htmlspecialchars($_POST['email']));
                         $status = mysql_real_escape_string(htmlspecialchars($_POST['status']));
                          $maxTask = mysql_real_escape_string(htmlspecialchars($_POST['maxTask']));
						 
						 // maxTask check that firstname/lastname fields are both filled in
								 if ($username == '' || $password == '')
								 {
										 // generate error message
										 $error = 'ERROR: Please fill in all required fields!';
										 
										 //error, display form
										 renderForm($id, $username, $password,$name,$surname,$email,$role,$status,$maxTask, $error);
										 }
								 else
								 {
										 // save the data to the database
                                   // echo "UPDATE users SET username='$username', password='$password' , role ='$role', email='$email', name='$name', surname='$surname', status='$status' WHERE id='$id'"; exit;
										 mysql_query("UPDATE users SET username='$username', password='$password' , role ='$role', email='$email', name='$name', surname='$surname', status='$status', max_tasks='$maxTask' WHERE id='$id'")
										 or die(mysql_error()); 
										 
										 // once saved, redirect back to the view page
											echo("<script>location.href = 'http://localhost/CompanyCalendar/UInterfaces/AdminPanel/pages/editusers/editusers.php';</script>");
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
        					 $id = $_GET['id'];
        					 $result = mysql_query("SELECT * FROM users WHERE id=$id")
        					 or die(mysql_error()); 
        					 $row = mysql_fetch_array($result);
        					 
        					 // check that the 'id' matches up with a row in the databse
        					 if($row)
        					 {
    					 
            					 // get data from db
            					 $username = $row['username'];
            					 $password = $row['password'];
            					 $role = $row['role'];
            					 $name = $row['name'];
            					 $surname = $row['surname'];
            					 $email = $row['email'];
                                 $status = $row['status'];
            					 $maxTask = $row['max_tasks'];
            					 // show form
            					 renderForm($id, $username, $password,$name,$surname,$email,$role,$status, $maxTask,'');
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
    <script src="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/dist/js/sb-admin-2.js"></script>


  <script>var events = <?php echo $events ?>;</script>
  
  <script src='js/jquery-ui.min.js'></script>
  <script src='fc/lib/moment.min.js'></script>
  <script src='fc/fullcalendar.js'></script>
  <script src='js/main.js'></script>

  </body>
</html>