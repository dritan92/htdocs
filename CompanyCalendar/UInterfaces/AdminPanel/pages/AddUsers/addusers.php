<?php 
require_once("../header.php");
require_once("../side-bar.php");
$sql ="SELECT * FROM teams where parent=0";
$resultadao = mysql_query ($sql);

?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Add Users</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
				
				
				<html>
				
				<?php 

                                $errors = array(
                                    1=>"Invalid length of Username, No less than 2 Characters",
                                    2=>"Please Enter a Valid password!",
									3=>"Please check that the Password contains only alpha numeric characters",
									4=>"Please fill all the Fields bellow",
									5=>"The entered user already exist!",
                                    6=>"New User Added Successfully"
                                  );

                                $error_id = isset($_GET['err']) ? (int)$_GET['err'] : 0;

                                if ($error_id == 1) {
                                        echo '<p class="text-danger">'.$errors[$error_id].'</p>';
								}elseif ($error_id == 2) {
                                        echo '<p class="text-danger">'.$errors[$error_id].'</p>';
                                    }
								elseif ($error_id == 3) {
									echo '<p class="text-danger">'.$errors[$error_id].'</p>';
								}
								elseif ($error_id == 4) {
									echo '<p class="text-danger">'.$errors[$error_id].'</p>';
								}
								elseif ($error_id == 5) {
									echo '<p class="text-danger">'.$errors[$error_id].'</p>';
								}elseif ($error_id == 6) {
                                    echo '<p class="text-danger">'.$errors[$error_id].'</p>';
                                }
                               ?> 
		
				
				<?php
				
				
					

					/*** begin our session ***/
					/***session_start();

					/*** set a form token ***/
					$form_token = md5( uniqid('auth', true) );

					/*** set the session form token ***/
					$_SESSION['form_token'] = $form_token;
					?>

					<html>
					<head>
					<title>PHPRO Login</title>
					</head>

					<body>
					<!--<h2>Add user</h2>-->
					<form action="adduser_submit.php" method="post">
					<fieldset>
			
					<p>
					<div class="form-group">
                                      <label class="col-sm-2 control-label">Username</label>
                                      <div class="col-sm-10">
                                          <input type="text" id="phpro_username" name="phpro_username" value="" maxlength="20"  class="form-control">
                                          <span class="help-block"></span>
                                      </div>
                                  </div>
					</p>
					
					<div class="form-group">
                      <label class="col-sm-2 control-label">Password</label>
                      <div class="col-sm-10">
                          <input type="password" id="phpro_password" name="phpro_password" value="" maxlength="20"  class="form-control">
                          <span class="help-block"></span>
                      </div>
                  </div>
					
					<div class="form-group">
                      <label class="col-sm-2 control-label">Name</label>
                      <div class="col-sm-10">
                          <input type="text" id="Name" name="Name" value="" maxlength="20"  class="form-control">
                          <span class="help-block"></span>
                      </div>
                  </div>
					<div class="form-group">
                      <label class="col-sm-2 control-label">Surname</label>
                      <div class="col-sm-10">
                          <input type="text" id="Surname" name="Surname" value="" maxlength="20"  class="form-control">
                          <span class="help-block"></span>
                      </div>
                  </div>
					<div class="form-group">
                      <label class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-10">
                          <input type="text" id="Email" name="Email" value="" maxlength="20"  class="form-control">
                          <span class="help-block"></span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Maximum Tasks</label>
                      <div class="col-sm-10">
                          <input type="number" id="maxTask" name="maxTask" value="0" maxlength="20"  class="form-control">
                          <span class="help-block"></span>
                      </div>
                  </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Team</label>
                      <div class="col-sm-10">
                          <Select   id="team" name="team"  maxlength="20"  class="form-control" onchange="fetchSubTeams(this.value)" >
                          <?php
                          while ($row = mysql_fetch_object ($resultadao) )

                            { ?>
                                <option value="<?=$row->id?>"><?=$row->name?></option>
                            <?php 
                            } 
                          ?>
                            </Select>
                          <span class="help-block"></span>
                      </div>
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                      <label class="col-sm-2 control-label">Sub Teams</label>
                      <div class="col-sm-10" id="subteams">
                         <input class="form-control"> 
                      </div>
                    </div><br><br>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Level</label>
                      <div class="col-sm-10">
                          <select  id="level" name="level"  maxlength="20"  class="form-control" style="margin-top: 10px;">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          </select>
                          <span class="help-block"></span>
                      </div>
                    </div>
					<div class="form-group">
                                      <label class="col-sm-2 control-label">Role</label>
                                      <div class="col-sm-10">
                                           <input type="radio" name="Role" value="Admin" checked> Admin<br>
										   <input type="radio" name="Role" value="Manager" checked> Manager<br>
										   <input type="radio" name="Role" value="Employee" checked> Employee<br>
										  
                                          <span class="help-block"></span>
                                      </div>
                                  </div>
					<p>
					<input type="hidden" name="form_token" value="<?php echo $form_token; ?>" />
					<input type="submit" value="&rarr; Submit" />
					</p>
					</fieldset>
					</form>
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


  <!-- <script>var events = "<?php echo $events; ?>" </script> -->
  
  <script src='js/jquery-ui.min.js'></script>
  <script src='fc/lib/moment.min.js'></script>
  <script src='fc/fullcalendar.js'></script>
  <script src='js/main.js'></script>
  <script src='../app.js'></script>

  </body>
</html>