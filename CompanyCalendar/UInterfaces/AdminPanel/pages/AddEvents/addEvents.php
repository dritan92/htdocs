<?php
require_once("../header.php");
require_once("../side-bar.php");
?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Add Events</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
				
				
				<html>
				<?php

					/*** begin our session ***/
					

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
					<form action="addEvents_Submit.php" method="post">
					<fieldset>
			
					<p>
					<div class="form-group">
                                      <label class="col-sm-2 control-label">Event Title</label>
                                      <div class="col-sm-10">
                                          <input type="text" id="eventsTitle" name="eventsTitle" value="" maxlength="20"  class="form-control">
                                          <span class="help-block"></span>
                                      </div>
                                  </div>
					</p>
					
					<div class="form-group">
                                      <label class="col-sm-2 control-label">Event Description</label>
                                      <div class="col-sm-10">
                                          <textarea type="paragraph_text" id="eventsDetails" name="eventsDetails" value="" maxlength="1000" class="form-task " style="margin: 0px; width: 100%; height: 139px;"></textarea>
                                          <span class="help-block"></span>
                                      </div>
                                  </div>
					
					<div class="form-group">
                                      <label class="col-sm-2 control-label">Date</label>
                                      <div class="col-sm-10">
                                          <input type="date" id="meetingsDate" name="eventsDate" value="<?php echo $meetingsDate;?>" maxlength="20"  class="form-control datepiker">
                                          <span class="help-block"></span>
                                      </div>
                                  </div>
					<div class="form-group">
                                      <label class="col-sm-2 control-label">Time</label>
                                      <div class="col-sm-10">
                                          <input type="Time" id="meetingsTime" name="eventsTime" value="<?php echo $meetingsTime;?>" maxlength="20"  class="form-control datepiker">
                                          <span class="help-block"></span>
                                      </div>
                                  </div>
					
					
									  <div class="form-group">
                                      <label class="col-sm-2 control-label">Event Members</label>
                                      <div class="col-sm-10">
                                          <input type="text" id="users" name="users" value="" maxlength="20"  class="form-control">
                                          <span class="help-block"></span>
                                      </div>
                                  </div>
					<p>
					
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


  <script>var events = <?php echo $events ?>;</script>
  
  <script src='js/jquery-ui.min.js'></script>
  <script src='fc/lib/moment.min.js'></script>
  <script src='fc/fullcalendar.js'></script>
  <script src='js/main.js'></script>

  </body>
</html>