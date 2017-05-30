<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
	$pic = $_SESSION['sess_userpic'];
    if(!isset($_SESSION['sess_username']) && $role!="admin"){
      header('Location: index.php?err=2');
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  
  <meta http-equiv="refresh" content="0; http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/pages/viewtasks/?id=<?php echo $_SESSION['sess_user_id'];?>	" />

  
</head>
</html>