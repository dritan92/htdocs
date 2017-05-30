
<?php
mysql_connect("localhost", "root", "") or die("Connection Failed"); 
mysql_select_db("phpro_auth")or die("Connection Failed"); 


$id = $_GET['id'];

$query = "DELETE FROM task WHERE taskID = '".$id."'";
	if(mysql_query($query))
	{
		 echo("<script>location.href = 'http://localhost/CompanyCalendar/UInterfaces/AdminPanel/pages/Edittasks/edittasks.php';</script>");
	} 
		 
	else{
		echo "fail";
		} 
		
		?>