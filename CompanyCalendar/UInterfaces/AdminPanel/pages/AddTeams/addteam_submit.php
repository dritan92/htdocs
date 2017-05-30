<?php
/*** begin our session ***/
session_start();

/*** first check that both the username, password and form token have been sent ***/
if(!isset( $_POST['phpro_name'], $_POST['form_token']))
{
    header('Location: addteam.php?err=1');
}
/*** check the form token is valid ***/
elseif( $_POST['form_token'] != $_SESSION['form_token'])
{
    echo("<script>location.href = 'http://localhost/CompanyCalendar/UInterfaces/AdminPanel/pages/addteams/addteam.php';</script>");
}
/*** check the username is the correct length ***/
elseif (strlen( $_POST['phpro_name']) > 20 || strlen($_POST['phpro_name']) < 2)
{
    header('Location: addteam.php?err=1');
}
/*** check the password is the correct length ***/

else
{
    /*** if we are here the data is valid and we can insert it into database ***/
    $phpro_name = filter_var($_POST['phpro_name'], FILTER_SANITIZE_STRING);
	$phpro_parent = filter_var($_POST['phpro_parent'], FILTER_SANITIZE_STRING);
	

    $mysql_hostname = 'localhost';

    /*** mysql username ***/
    $mysql_username = 'root';

    /*** mysql password ***/
    $mysql_password = '';

    /*** database name ***/
    $mysql_dbname = 'phpro_auth';

    try
    {
        $dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password);
        /*** $message = a message saying we have connected ***/

        /*** set the error mode to excptions ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*** prepare the insert ***/
        $stmt = $dbh->prepare("INSERT INTO teams (name, parent ) VALUES (:phpro_name,  :phpro_parent )");

        /*** bind the parameters ***/
        $stmt->bindParam(':phpro_name', $phpro_name, PDO::PARAM_STR);
        $stmt->bindParam(':phpro_parent', $phpro_parent, PDO::PARAM_STR, 40);

        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** unset the form token session variable ***/
        unset( $_SESSION['form_token'] );

        /*** if all is done, say thanks ***/
		
			echo("<script>location.href = 'http://localhost/CompanyCalendar/UInterfaces/AdminPanel/pages/editteams/editteam.php';</script>");
    }
	
	
	catch(Exception $e)
    {

        /*** check if the username already exists ***/
        if( $e->getCode() == 23000)
        {
            header('Location: addteam.php?err=1');
        }
        else
        {
            /*** if we are here, something has gone wrong with the database ***/
            header('Location: addteam.php?err=5');
        }
    }
	

			 $connection = mysql_connect( $mysql_hostname, $mysql_username,    $mysql_password) 
			 or die ("Could not connect to server ... \n" . mysql_error ());
			 mysql_select_db($mysql_dbname) 
			 or die ("Could not connect to database ... \n" . mysql_error ());
			
			$title = array();
			$comments = array();
			$date = array();
			$team = $_POST['phpro_name'];
			$sql ="SELECT * FROM teams WHERE name ='$team'";
			$resultadao = mysql_query ($sql);
			$i=0;
			while ($row = mysql_fetch_object ($resultadao) )

			{
			$i=$i+1;

			}

				if ($i>0)
				{

				header('Location: addteam.php?err=6');
				}

			/***************************************************/
}
?>

<html>
<head>

</head>
<body>
<p><?php echo $message; ?>
</body>
</html>