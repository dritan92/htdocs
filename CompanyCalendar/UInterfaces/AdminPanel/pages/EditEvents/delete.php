
<?php
mysql_connect("localhost", "root", "") or die("Connection Failed"); 
mysql_select_db("phpro_auth")or die("Connection Failed"); 


$id = $_GET['eventsID'];

$query = "DELETE FROM events WHERE eventsID = '".$id."'";
	if(mysql_query($query))
	{
		 echo("<script>location.href = 'http://localhost/CompanyCalendar/UInterfaces/AdminPanel/pages/EditEvents/editEvents.php';</script>");
	} 
		 
	else{
		echo "fail";
		} 
		
		?>