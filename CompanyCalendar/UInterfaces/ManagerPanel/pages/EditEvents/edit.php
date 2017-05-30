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
    <link href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
    <link href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
    <link href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                <a class="navbar-brand" <a href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/pages/viewtasks/index.php?id=<?php echo $_SESSION['sess_username'];?>"> <img src="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/logo1.png" alt="Mountain View" style="width:;height:;"><p></p>
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
							$myUser = $_SESSION['sess_username'];
							$sql ="SELECT taskTitle,comments,checkedDate FROM task WHERE members LIKE '%$myUser%' OR manager = '$myUser'    ORDER BY checkedDate DESC ";
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
							$myUser = $_SESSION['sess_username'];
							$sql ="SELECT taskTitle,Progress  FROM task WHERE members LIKE '%$myUser%' OR manager = '$myUser'    ORDER BY checkedDate DESC ";
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
                            <a class="text-center" href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/pages/viewtasks/viewtasks.php">
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
                        <li  <a="" href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel"><img src="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/managerpanel.png" Adminalt="Mountain View" style="width:;height:;"><p></p>
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
                            <a href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/pages/viewtasks/index.php?id=<?php echo $_SESSION['sess_username'];?>"><i class="fa fa-calendar fa-fw"></i> Calendar</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-tasks fa-fw"></i> Tasks<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/pages/viewtasks/viewtasks.php?id=<?php echo $_SESSION['sess_username'];?>">View Tasks</a>
                                </li>
                                <li>
                                    <a href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/pages/addtasks/addtasks.php?id=<?php echo $_SESSION['sess_username'];?>">Add Tasks</a>
                                </li>
								<li>
                                    <a href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/pages/edittasks/edittasks.php?id=<?php echo $_SESSION['sess_username'];?>">Edit Tasks </a>
                                </li>
								
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-rocket fa-fw"></i> Events<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                                <li>
                                    <a href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/pages/EditEvents/viewEvents.php">View Events</a>
                                </li>
                                <li>
                                    <a href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/pages/addEvents/addEvents.php">Add Events</a>
                                </li>
								<li>
                                    <a href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/pages/EditEvents/editevents.php">Edit Events</a>
                                </li>
								
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-comments fa-fw"></i> Meetings<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                                <li>
                                    <a href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/pages/editmeetings/viewmeetings.php">View Meetings</a>
                                </li>
                                <li>
                                    <a href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/pages/addmeetings/addmeetings.php">Add Meetings</a>
                                </li>
								<li>
                                    <a href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/pages/editmeetings/editmeetings.php">Edit Meetings</a>
                                </li>
								
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/pages/charts/taskProgression.php">Task Progressions</a>
                                </li>
                                <li>
                                    <a href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/pages/charts/donevsProg.php">Done vs. In Progress</a>
                                </li>
								    </ul>
                        
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
                        <h1 class="page-header">Edit Events</h1>
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
								 function renderForm($eventsID, $eventsTitle, $eventsDetails,$eventsTime ,$eventsDate,$users)
								 {
								 ?>
							
								 <body>
								 <?php 
								 // if there are any errors, display them
								
								 ?> 
								 
								 <form action="" method="post">
								 <input type="hidden" name="eventsID" value="<?php echo $eventsID; ?>"/>
								 <div>
								 <p><strong>ID:</strong> <?php echo $eventsID; ?></p>
								 
								 
							  
							  
							  
							  <div class="form-group">
                                      <label class="col-sm-2 control-label">Meeting's Title*</label>
                                      <div class="col-sm-10">
                                          <input type="text" id="eventsTitle" name="eventsTitle" value="<?php echo $eventsTitle;?>" maxlength="100"  class="form-control">
                                          <span class="help-block"></span>
                                      </div>
                                  </div>
					</p>
					
					<div class="form-group">
                                      <label class="col-sm-2 control-label">Meeting Description*</label>
                                      <div class="col-sm-10">
										<textarea rows="4" cols="50" id="eventsDetails" name="eventsDetails" value="<?php echo $eventsDetails;?>" class="form-task " style="margin: 0px; width: 100%; height: 139px;" ><?php echo $eventsDetails;?>" </textarea>

                                          
                                          <span class="help-block"></span>
                                      </div>
                                  </div>
					
					<div class="form-group">
                                      <label class="col-sm-2 control-label">Date*</label>
                                      <div class="col-sm-10">
                                          <input type="date" id="eventsDate" name="eventsDate" value="<?php echo $eventsDate;?>" maxlength="20"  class="form-control datepiker">
                                          <span class="help-block"></span>
                                      </div>
                                  </div>
					<div class="form-group">
                                      <label class="col-sm-2 control-label">Time*</label>
                                      <div class="col-sm-10">
                                          <input type="Time" id="meetingsTime" name="eventsTime" value="<?php echo $eventsTime;?>" maxlength="20"  class="form-control datepiker">
                                          <span class="help-block"></span>
                                      </div>
                                  </div>
					
                                  </div>
					
                    <div class="form-group">
                                      <label class="col-sm-2 control-label">Meeting Members*</label>
                                      <div class="col-sm-10">
                                          <input type="text" id="users" name="users" value="<?php echo $users;?>" maxlength="200"  class="form-control">
                                          <span class="help-block"></span>
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
						 if (is_numeric($_POST['eventsID']))
						 {
							 
							 
							 /*
							 '<td>' . $row['eventsID'] . '</td>';
									echo '<td>' . $row['eventsTitle'] . '</td>';
									echo '<td>' . $row['eventsDetails'] . '</td>';
									echo '<td>' . $row['eventsDate'] . '</td>';
									echo '<td>' . $row['eventsTime'] . '</td>';
									echo '<td>' . $row['users'] . '</td>';
									
									*/
							 
						 // get form data, making sure it is valid
						 $eventsID = $_POST['eventsID'];
						 $eventsTitle = mysql_real_escape_string(htmlspecialchars($_POST['eventsTitle']));
						 
						 $eventsDetails = mysql_real_escape_string(htmlspecialchars($_POST['eventsDetails']));
						 $eventsDate = mysql_real_escape_string(htmlspecialchars($_POST['eventsDate']));
						 $eventsTime = mysql_real_escape_string(htmlspecialchars($_POST['eventsTime']));
						 $users = mysql_real_escape_string(htmlspecialchars($_POST['users']));
						 
						 
						 
						 // check that firstname/lastname fields are both filled in
								 if ($eventsTitle == '' || $eventsTitle == ''||$eventsDate == '' || $eventsDate == ''||$eventsTime == '' || $users == '')
								 {
										 // generate error message
										 $error = 'ERROR: Please fill in all required fields!';
										 
										 //error, display form
										 renderForm($eventsID, $eventsTitle, $eventsDetails,$eventsTime ,$eventsDate,$users);
										 }
								 else
								 {
										 // save the data to the database
										 mysql_query("UPDATE events SET eventsTitle='$eventsTitle', eventsDetails='$eventsDetails' , eventsDate ='$eventsDate', eventsTime='$eventsTime',  users='$users' WHERE eventsID='$eventsID'")
										 or die(mysql_error()); 
										 
										 // once saved, redirect back to the view page
											echo("<script>location.href = 'http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/pages/EditEvents/editevents.php';</script>");
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
					 if (isset($_GET['eventsID']) && is_numeric($_GET['eventsID']) && $_GET['eventsID'] > 0)
					 {
					 // query db
					 $eventsID = $_GET['eventsID'];
					 $result = mysql_query("SELECT * FROM events WHERE eventsID=$eventsID")
					 or die(mysql_error()); 
					 $row = mysql_fetch_array($result);
					 
					 // check that the 'id' matches up with a row in the databse
					 if($row)
					 {
					 
					 // get data from db
					 $eventsTitle = $row['eventsTitle'];
					 
					 $eventsDetails = $row['eventsDetails'];
					 $eventsTime = $row['eventsTime'];
					 $eventsDate = $row['eventsDate'];
					 $users = $row['users'];
					 
					 
					 
					 
					 
					 // show form
					 renderForm($eventsID, $eventsTitle, $eventsDetails,$eventsTime ,$eventsDate,$users);
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
    <script src="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/dist/js/sb-admin-2.js"></script>


  <script>var events = <?php echo $events ?>;</script>
  
  <script src='js/jquery-ui.min.js'></script>
  <script src='fc/lib/moment.min.js'></script>
  <script src='fc/fullcalendar.js'></script>
  <script src='js/main.js'></script>

  </body>
</html>