
<?php
mysql_connect("localhost", "root", "") or die("Connection Failed"); 
mysql_select_db("phpro_auth")or die("Connection Failed"); 


$id = $_GET['meetingsID'];

$query = "DELETE FROM meetings WHERE meetingsID = '".$id."'";
	if(mysql_query($query))
	{
		 echo("<script>location.href = 'http://localhost/CompanyCalendar/UInterfaces/AdminPanel/pages/EditMeetings/EditMeetings.php';</script>");
	} 
		 
	else{
		echo "fail";
		} 
		
		?>