<?php
require_once("../header.php");
require_once("../side-bar.php");
$status='';
$sql ="SELECT * FROM project where status='Y'";
$resultadao = mysql_query ($sql);
if(isset($_POST['submit']))
{
  $pname = $_POST["pname"];
  $pdesc = $_POST["desc"];
  $tname = $_POST["tname"];
  $tLevel = $_POST["tLevel"];
  $mysql_hostname = 'localhost';
    $mysql_username = 'root';
    $mysql_password = '';
    $mysql_dbname = 'phpro_auth';
  $dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password); 
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statement = $dbh->prepare("INSERT INTO project_tasks(projectId,name,description,level)
    VALUES(:projectId, :name, :description, :level)");
            $result = $statement->execute(array(
                "projectId"=>$pname,
                "name" => $tname,
                "description" => $pdesc,
                "level" => $tLevel
            ));
            if($result){
              $status = "Task Added Successfully ";
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
                        <h1 class="page-header">Add Task To Project</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <div class="row">
              
            </div>
            <div class="row col-lg-8">
            <form method="post" name="project_form">
              <div class="form-group">
                  <label class="col-sm-3 control-label">Project Name</label>
                  <div class="col-sm-7">
                      <select id="pname" name="pname" class="form-control" required>
                      <option value="">Select Project</option>
                        <?php
                          while ($row = mysql_fetch_object ($resultadao) )

                            { ?>
                                <option value="<?=$row->id?>"><?=$row->name?></option>
                            <?php 
                            } 
                          ?>
                      </select>
                      <span class="help-block"></span>
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Task Name</label>
                  <div class="col-sm-7">
                      <input type="text" id="tname" name="tname" value=""   class="form-control" required>
                      <span class="help-block"></span>
                  </div>
              </div>
              <div class="form-group">
                      <label class="col-sm-3 control-label">Task Level</label>
                      <div class="col-sm-7">
                          <select  id="tLevel" name="tLevel" value="" maxlength="20"  class="form-control">
                              <option value=""> Task Level </option>
                              <option value="1"> 1 </option>
                              <option value="2"> 2 </option>
                              <option value="3"> 3 </option>
                              <option value="4"> 4 </option>
                              <option value="5"> 5 </option>
                          </select>
                          <span class="help-block"></span>
                      </div>
                  </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Task Description</label>
                  <div class="col-sm-7">
                      <input type="text" id="desc" name="desc" value=""   class="form-control">
                      <span class="help-block"></span>
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