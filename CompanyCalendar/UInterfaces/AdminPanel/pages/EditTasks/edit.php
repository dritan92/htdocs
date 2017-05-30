<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="admin"){
      header('Location: index.php?err=2');
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
	  <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

   <body>
    
    
     

	
	
	<head>
    <meta charset="UTF-8">
	  <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
			
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" <a="" href="http://localhost/CompanyCalendar/UInterfaces/AdminPanel"><img src="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/logo1.png" alt="Mountain View" style="width:;height:;"><p></p>
</a>

            </div>
            <!-- /.navbar-header -->
			
			
			

			<!------------------------- Display comments--------------------------->
			
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    
					
					<?php
							
							// Database Variables (edit with your own server information)
							 $server = 'localhost';
							 $user = 'root';
							 $pass = '';
							 $db = 'phpro_auth';
							 
							 // Connect to Database
							 $connection = mysql_connect($server, $user, $pass) 
							 or die ("Could not connect to server ... \n" . mysql_error ());
							 mysql_select_db($db) 
							 or die ("Could not connect to database ... \n" . mysql_error ());
							
							$title = array();
							$comments = array();
							$date = array();
							
							$sql ="SELECT taskTitle,comments,checkedDate FROM task WHERE comments != 'NULL 'ORDER BY checkedDate DESC";
							$resultadao = mysql_query ($sql);
							$i=0;
							while ($row = mysql_fetch_object ($resultadao) AND $i!=6)

							{
								$titles = $row -> taskTitle;
								$commentss = $row -> comments;
								$dates = $row -> checkedDate;
								$title[$i] = $titles;
								$comments[$i] = $commentss;
								$date[$i] = $dates;
								
								$i =$i+1;
							
							}
							
							
							echo "<ul class='dropdown-menu dropdown-messages'>";
							
							
							
							
							for ($i=0; $i<6; $i++)	{
									echo "<li>";
									echo "<a href='#'>";
									echo "<div>";
									echo " <strong>$title[$i]</strong>";
									echo "<span class='pull-right text-muted'>";
									echo" <em>$date[$i]</em>";
									echo "</span>";
									echo "</div>";
									
									echo "<div>$comments[$i]</div>";
									
									
									echo"</a>";
									echo"</li>";
									
													}				
									echo "<li class='divider'></li>"		;					 
									echo "  </li>";
									echo "  </ul>";
								   
									echo " </li>";
		 
								  ?>
					
						
						
						
				
				
				
				<!------------------------- Display Tasks--------------------------->
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                   
							
							<?php
							
							// Database Variables (edit with your own server information)
							 $server = 'localhost';
							 $user = 'root';
							 $pass = '';
							 $db = 'phpro_auth';
							 
							 // Connect to Database
							 $connection = mysql_connect($server, $user, $pass) 
							 or die ("Could not connect to server ... \n" . mysql_error ());
							 mysql_select_db($db) 
							 or die ("Could not connect to database ... \n" . mysql_error ());
							
							$lista = array();
							$dens = array();

							echo "<ul class='dropdown-menu dropdown-tasks'>";
							
							$sql ="SELECT taskTitle,Progress FROM task ORDER BY taskID DESC";
							$resultadao = mysql_query ($sql);
							$i=0;
							while ($row = mysql_fetch_object ($resultadao))

							{
								$title = $row -> taskTitle;
								$progress = $row -> Progress;
								$lista[$i] = $title;
								$dens[$i] = $progress;
								$i =$i+1;
							
							}
							
							
							
							 for ($i=0; $i<5; $i++)	{
									echo "<li>";
									echo "<a href='#'>";
									echo "<div>";
									echo "<p>";
									echo"  <strong>$lista[$i]</strong>";
									echo  "<span class='pull-right text-muted'>$dens[$i] Complete</span>";
									echo "</p>";
									echo" <div class='progress progress-striped active'>";
									echo" <div class='progress-bar progress-bar-success' role='progressbar' aria-valuenow='$dens[$i]' aria-valuemin='0' aria-valuemax='100' style='width: $dens[$i]%'>";
									echo"    <span class='sr-only'>40% Complete (success)</span>";
									echo"   </div>";
									echo"  </div>";
									echo"</div>";
									echo"</a>";
									echo"</li>";
									
							 }					
			  
		  
								  ?>
								
												
							
                       
                        
                      
                        <li>
                            <a class="text-center" href="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/pages/viewtasks/viewtasks.php">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
				
				
				
				<!------------------------------------------------------------------------------------------------------------------------------------>
				
				
				
				
				
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
					
					
					
					
					
					
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                       
                        
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <img src="<?php echo $_SESSION['sess_userpic'] ;?>" alt="" height="30" width="30">
                    </a>
                    <ul class="dropdown-menu dropdown-user">
					
						<li><a href="#"><i class="fa fa-user fa-fw"></i>Welcome  "<?php echo $_SESSION['sess_username'];?>"</a></li>
                        
                        
                        <li class="divider"></li>
						
						
						
					
                        <li><a href="http://localhost/CompanyCalendar\Login/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
						 <li  <a="" href="http://localhost/CompanyCalendar/UInterfaces/AdminPanel"><img src="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/admin panel.png" Adminalt="Mountain View" style="width:;height:;"><p></p>
						
</a>
                            <!--<div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div> -->
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/pages/viewtasks/"><i class="fa fa-calendar fa-fw"></i> Calendar</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-tasks fa-fw"></i> Tasks<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/pages/viewtasks/viewtasks.php">View Tasks</a>
                                </li>
                                <li>
                                    <a href="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/pages/addtasks/addtasks.php">Add Tasks</a>
                                </li>
								<li>
                                    <a href="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/pages/edittasks/edittasks.php">Edit Tasks </a>
                                </li>
								
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-rocket fa-fw"></i> Events<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                                <li>
                                    <a href="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/pages/EditEvents/viewEvents.php">View Events</a>
                                </li>
                                <li>
                                    <a href="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/pages/addEvents/addEvents.php">Add Events</a>
                                </li>
								<li>
                                    <a href="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/pages/EditEvents/editevents.php">Edit Events</a>
                                </li>
								
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-comments fa-fw"></i> Meetings<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                                <li>
                                    <a href="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/pages/editmeetings/viewmeetings.php">View Meetings</a>
                                </li>
                                <li>
                                    <a href="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/pages/addmeetings/addmeetings.php">Add Meetings</a>
                                </li>
								<li>
                                    <a href="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/pages/editmeetings/editmeetings.php">Edit Meetings</a>
                                </li>
								
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/pages/charts/taskProgression.php">Task Progressions</a>
                                </li>
                                <li>
                                    <a href="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/pages/charts/donevsProg.php">Done vs. In Progress</a>
                                </li>
								    </ul>
                        
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Users<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/pages/addusers/addusers.php">Add Users</a>
                                </li>
                                <li>
                                    <a href="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/pages/editusers/editusers.php">Edit Users</a>
                                </li>
								
								
                            </ul>
                        </li>
                        
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Edit Tasks</h1>
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
								 function renderForm($taskID, $title, $description,$start,$due,$manager,$members,$progress)
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
                                          <input type="text" id="title" name="title" value="<?php echo $title;?>" maxlength="100"  class="form-control">
                                          <span class="help-block"></span>
                                      </div>
                                  </div>
					</p>
					
					<div class="form-group">
                                      <label class="col-sm-2 control-label">Task Description</label>
                                      <div class="col-sm-10">
										<textarea rows="4" cols="50" id="desription" name="description"class="form-task " style="margin: 0px; width: 100%; height: 139px;" ><?php echo $description;?>" </textarea>

                                          
                                          <span class="help-block"></span>
                                      </div>
                                  </div>
					
					<div class="form-group">
                                      <label class="col-sm-2 control-label">START Date</label>
                                      <div class="col-sm-10">
                                          <input type="date" id="start" name="start" value="<?php echo $start;?>" maxlength="20"  class="form-control datepiker">
                                          <span class="help-block"></span>
                                      </div>
                                  </div>
					<div class="form-group">
                                      <label class="col-sm-2 control-label">DUE Date</label>
                                      <div class="col-sm-10">
                                          <input type="date" id="due" name="due" value="<?php echo $due;?>" maxlength="20"  class="form-control datepiker">
                                          <span class="help-block"></span>
                                      </div>
                                  </div>
					<div class="form-group">
                                      <label class="col-sm-2 control-label">Task Manager</label>
                                      <div class="col-sm-10">
                                          <input type="text" id="manager" name="manager" value="<?php echo $manager;?>" maxlength="20"  class="form-control">
                                          <span class="help-block"></span>
                                      </div>
                                  </div>
                    <div class="form-group">
                                      <label class="col-sm-2 control-label">Task members</label>
                                      <div class="col-sm-10">
                                          <input type="text" id="members" name="members" value="<?php echo $members;?>" maxlength="200"  class="form-control">
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
						 
						 // check that firstname/lastname fields are both filled in
								 if ($title == '' || $start == '')
								 {
										 // generate error message
										 $error = 'ERROR: Please fill in all required fields!';
										 
										 //error, display form
										 renderForm($taskID, $title, $description,$start,$due,$manager,$members,$progress);
										 }
								 else
								 {
										 // save the data to the database
										 mysql_query("UPDATE task SET taskTitle='$title', description='$description' , startDate ='$start', dueDate='$due', manager='$manager', members='$members', Progress=$progress WHERE taskID='$taskID'")
										 or die(mysql_error()); 
										 
										 // once saved, redirect back to the view page
											echo("<script>location.href = 'http://localhost/CompanyCalendar/UInterfaces/AdminPanel/pages/edittasks/edittasks.php';</script>");
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
					 
					 
					 
					 // show form
					 renderForm($taskID, $title, $description,$start,$due,$manager,$members,$progress);
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