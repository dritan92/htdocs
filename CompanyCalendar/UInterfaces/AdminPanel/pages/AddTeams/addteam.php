<?php 
require_once("../header.php");
require_once("../side-bar.php");
$sql ="SELECT * FROM teams WHERE parent =0 ";
$resultadao = mysql_query ($sql);

?>


        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Add Teams</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
				
				
				<html>
				
				<?php 

                                $errors = array(
                                    1=>"The entered team already exist!",
                                    
                                  );

                                $error_id = isset($_GET['err']) ? (int)$_GET['err'] : 0;

                                if ($error_id == 1) {
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
					<form action="addteam_submit.php" method="post">
					<fieldset>
			
					
					<div class="form-group">
                      <label class="col-sm-2 control-label">Team Name</label>
                      <div class="col-sm-10">
                          <input type="text" id="phpro_name" name="phpro_name" value="" maxlength="20"  class="form-control" required>
                          <span class="help-block"></span>
                      </div>
                  </div>
					
					
					<div class="form-group">
                      <label class="col-sm-2 control-label">Parent Team</label>
                      <div class="col-sm-10">
                          <Select   id="phpro_parent" name="phpro_parent"  maxlength="20"  class="form-control">
                          	<option value="0">Parent</option>
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


  <script>var events = <?php echo $events ?>;</script>
  
  <script src='js/jquery-ui.min.js'></script>
  <script src='fc/lib/moment.min.js'></script>
  <script src='fc/fullcalendar.js'></script>
  <script src='js/main.js'></script>

  </body>
</html>