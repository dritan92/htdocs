<?php 
require_once("../header.php");
require_once("../side-bar.php");
$sql ="SELECT * FROM teams where parent=0";
$allTeams = mysql_query ($sql);
$sql ="SELECT * FROM project where status='Y'";
$allProjects = mysql_query ($sql);
$sql1 ="SELECT * FROM users where role='Manager'";
$managers = mysql_query ($sql1);

?>
<style>
.applyStyle{
    background:green !important;
}
.redStyle{
    background:red ;
}
</style>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Add Tasks</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
				
				
				<html>
				<?php

					/*** begin our session ***/
					//session_start();

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
					<form action="addtasks_submit.php" method="post" id="add_task_form">
					<fieldset >
                    <div class="col-sm-7">
			         <div class="form-group">
                      <label class="col-sm-3 control-label">Project</label>
                      <div class="col-sm-9">
                          <Select   id="team" name="projectId"  maxlength="20"  class="form-control" onchange="fetchProjectTask(this.value)" >
                          <option value=''>Select Project</option>
                          <?php
                          while ($row = mysql_fetch_object ($allProjects) )

                            { ?>
                                <option value="<?=$row->id?>"><?=$row->name?></option>
                            <?php 
                            } 
                          ?>
                            </Select>
                          <span class="help-block"></span>
                      </div>
                      
                  </div>
				<div class="form-group">
                    <label class="col-sm-3 control-label">Task Title</label>
                        <div class="col-sm-9" id="projectTasks">
                            <select class="form-control" required></select>
                            <span class="help-block"> </span>
                        </div>
                </div>
                  <div class="form-group">
                      <label class="col-sm-3 control-label">Task Level</label>
                      <div class="col-sm-9">
                          <input type="text" id="tLevel" name="tLevel" value="" maxlength="20"  class="form-control" readonly>
                              
                          <span class="help-block"></span>
                      </div>
                  </div>
		
					
					<div class="form-group">
                                      <label class="col-sm-3 control-label">Task Description</label>
                                      <div class="col-sm-9">
                                          <textarea type="paragraph_text" id="desription" name="description" value="" maxlength=""  class="form-task " style="margin: 0px; width: 100%; height: 139px;"></textarea>
                                          <span class="help-block"></span>
                                      </div>
                                  </div>
					
					<div class="form-group">
                                      <label class="col-sm-3 control-label">START Date</label>
                                      <div class="col-sm-9">
                                          <input type="date" id="start" name="start" value="" maxlength="20"  class="form-control datepiker">
                                          <span class="help-block"></span>
                                      </div>
                                  </div>
					<div class="form-group">
                                      <label class="col-sm-3 control-label">DUE Date</label>
                                      <div class="col-sm-9">
                                          <input type="date" id="due" name="due" value="" maxlength="20"  class="form-control datepiker">
                                          <span class="help-block"></span>
                                      </div>
                                  </div>
					<div class="form-group">
                          <label class="col-sm-3 control-label">Task Manager</label>
                          <div class="col-sm-9">
                              <Select   id="team" name="manager" id="manager" maxlength="20"  class="form-control"  >
                                  <option value=''>Select Manager</option>
                                  <?php
                                  while ($row = mysql_fetch_object ($managers) )

                                    { ?>
                                        <option value="<?=$row->id?>"><?=$row->name?></option>
                                    <?php 
                                    } 
                                  ?>
                            </Select><span class="help-block"></span>
                          </div>
                      </div>
                     <div class="form-group">
                      <label class="col-sm-3 control-label">Team</label>
                      <div class="col-sm-9">
                          <Select   id="team" name="team"  maxlength="20"  class="form-control" onchange="fetchSubTeamsAndUsers(this.value)" >
                          <option value=''>Select Team</option>
                          <?php
                          while ($row = mysql_fetch_object ($allTeams) )

                            { ?>
                                <option value="<?=$row->id?>"><?=$row->name?></option>
                            <?php 
                            } 
                          ?>
                            </Select>
                          <span class="help-block"></span>
                      </div>
                      
                  </div>
                        <div class="form-group">
                        <label class="col-sm-3 control-label">Sub Teams</label>
                            <div class="col-sm-9" id="subteams">

                            </div>
                         
                        </div></div>
                    <!-- <div class="form-group" style="width: 100%;
    float: left;">
                                      <label class="col-sm-3 control-label">Task members</label>
                                      <div class="col-sm-9">
                                          <input type="text" id="members" name="members" value="" maxlength="200"  class="form-control">
                                          <span class="help-block"></span>
                                      </div>
                                  </div> -->
					<!--div class="form-group">
                                      <label class="col-sm-3 control-label">Periority</label>
                                      <div class="col-sm-9">
                                           <input type="radio" name="Role" value="Admin" checked> Admin<br>
										   <input type="radio" name="Role" value="Manager" checked> Manager<br>
										   <input type="radio" name="Role" value="Employee" checked> Employee<br>
										  
                                          <span class="help-block"></span>
                                      </div>
                                  </div-->
					<input type="hidden" name="bestVal" id="bestVal" value="" />
                    <input type="hidden" name="bestVal2" id="bestVal2" value="" />
					<input type="hidden" name="form_token" value="<?php echo $form_token; ?>" />
                    <div class="col-sm-5">
                    <div  id="radioGroup"> </div>
                    <div  id="radioGroup1"> </div>
                    </div>
                    <div style="width: 100%;float:left;">
					<input type="button" class="btn btn-primary" onclick="submit_form()"  value="Submit" /></div>
					
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



 <!--  <script>var events = <?php echo $events ?>;</script> -->
  
  <script src='js/jquery-ui.min.js'></script>
  <script src='fc/lib/moment.min.js'></script>
  <script src='fc/fullcalendar.js'></script>
  <script src='js/main.js'></script>
  <script src='../app1.js'></script>

  </body>
</html>