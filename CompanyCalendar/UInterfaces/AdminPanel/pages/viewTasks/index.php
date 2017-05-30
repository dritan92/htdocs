<?php
//session_start();
require_once("../header.php");
require_once("../side-bar.php");
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="admin"){
      header('Location: http://localhost/login/index.php?err=2');
    }
require_once 'config.php';
require_once 'functions.php';
$tasks = get_tasks();
$tasks = get_tasks_json($tasks);
$events = get_events();
$events = get_json($events);
$meetings = get_meetings();
$meetings = get_meetings_json($meetings);
$events = "[ $tasks $events $meetings ]";

/*print_arr($tasks);
print_arr($events);
print_arr($meetings);*/
?>



        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">My Calendar<img src="http://localhost/CompanyCalendar/UInterfaces/AdminPanel/pages/viewtasks/key.png" alt="Mountain View" style="width:;height:;"></h1> 
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
  
 
  

  <div id='calendar'></div>



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