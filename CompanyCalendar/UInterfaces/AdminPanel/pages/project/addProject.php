<?php
require_once("../header.php");
require_once("../side-bar.php");
$sql1 ="SELECT * FROM users where role='Manager'";
$managers = mysql_query ($sql1);
$status='';
if(isset($_POST['submit']))
{
  $pname = $_POST["pname"];
  $pdesc = $_POST["pdesc"];
  $manager = $_POST["manager"];
  $mysql_hostname = 'localhost';
    $mysql_username = 'root';
    $mysql_password = '';
    $mysql_dbname = 'phpro_auth';
  $dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password); 
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statement = $dbh->prepare("INSERT INTO project(name, description,managerId)
    VALUES(:name, :description, :managerId)");
            $result = $statement->execute(array(
                "name" => $pname,
                "description" => $pdesc,
                "managerId" => $manager
            ));
            if($result){
              $status = "Project Added Successfully";
            }
            else
            {
              $status = "Entry Failed ";
            }

}
?>
<div id="page-wrapper" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Add Project</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <div class="row">
              <p class="text-danger"><?=$status?></p>
            </div>
            <div class="row col-lg-8">
            <form method="post" name="project_form">
              <div class="form-group">
                  <label class="col-sm-3 control-label">Project Name</label>
                  <div class="col-sm-7">
                      <input type="text" id="pname" name="pname" value="" maxlength="20"  class="form-control" required>
                      <span class="help-block"></span>
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Project Description</label>
                  <div class="col-sm-7">
                      <input type="text" id="pdesc" name="pdesc" value=""   class="form-control">
                      <span class="help-block"></span>
                  </div>
              </div>
               <div class="form-group">
                    <label class="col-sm-3 control-label">Project Manager</label>
                    <div class="col-sm-7">
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
                  
                  <div class="col-sm-6">
                  
                      <input type="submit" id="pname" name="submit" value=" Submit" maxlength="20"  class="btn btn-primary pull-right">
                      <span class="help-block"></span>
                  </div>
              </div>
            </form>
              
            </div>
       
       </div>
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