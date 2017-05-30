    <?php
    require_once("../header.php");
    require_once("../side-bar.php");
    ?>

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
                                     function renderForm($id, $name, $manager)
                                     {
                              ?>
                                
                                     <body>
                                     <?php 
                                     // if there are any errors, display them
                                     
                                     ?> 
                                     
                                     <form action="" method="post">
                                     <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                                     <div>
                                     <p><strong>ID:</strong> <?php echo $id; ?></p>
                                     
                                     
                                  
                                  
                                  
                                  <div class="form-group">
                                          <label class="col-sm-2 control-label">Project Name</label>
                                          <div class="col-sm-10">
                                              <input type="text" id="name" name="name" value="<?php echo $name;?>" maxlength="100"  class="form-control">
                                              <span class="help-block"></span>
                                          </div>
                                      </div>
                        </p>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Project Manager</label>
                                  <div class="col-sm-10">
                                      <input type="text" id="manager" name="manager" value="<?php echo $manager;?>" maxlength="20"  class="form-control">
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
                             $id = $_POST['id'];
                             $title = mysql_real_escape_string(htmlspecialchars($_POST['name']));    
                             $manager = mysql_real_escape_string(htmlspecialchars($_POST
                                ['manager']));

                             
                             // check that firstname/lastname fields are both filled in
                                     if ($title == '' || $manager == '')
                                     {
                                             // generate error message
                                             $error = 'ERROR: Please fill in all required fields!';
                                             
                                             //error, display form
                                             renderForm($id, $title,$manager);
                                             }
                                     else
                                     {
                                             // save the data to the database
                                             mysql_query("UPDATE project SET name='$title',managerId = '$manager'  WHERE id='$id'")
                                             or die(mysql_error()); 
                                             
                                             // once saved, redirect back to the view page
                                                echo("<script>location.href = 'http://localhost/CompanyCalendar/UInterfaces/AdminPanel/pages/project/editProject.php';</script>");
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
                         $result = mysql_query("SELECT * FROM project WHERE id=$id")
                         or die(mysql_error()); 
                         $row = mysql_fetch_array($result);
                         
                         // check that the 'id' matches up with a row in the databse
                         if($row)
                         {
                         
                         // get data from db
                         $title = $row['name'];
                        
                         $manager = $row['managerId'];

                         // show form
                         renderForm($id, $title, $manager);
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