
<?php
mysql_connect("localhost", "root", "") or die("Connection Failed"); 
mysql_select_db("phpro_auth")or die("Connection Failed"); 

$phpro_username = $_POST['phpro_username']; 
$UserID = $_POST['UserID']; 

$query = "DELETE FROM users WHERE username = '".$phpro_username."' OR id = '".$UserID."'";
	if(mysql_query($query))
	{
		echo "deleted";
	} 
		 
	else{
		echo "fail";
		} 
		
		?>