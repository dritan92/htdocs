<?php
/*** begin our session ***/
session_start();



if ($_POST['eventsTitle'] == '' || $_POST['eventsDetails'] == '' || $_POST['eventsDate'] == '' || $_POST['eventsTime'] == '' || $_POST['users'] == '' )
{
        /*** if there is no match ***/
        $message = "************Please fill all the fields************";
		//include('adduser.php');
		
}
else
{
    /*** if we are here the data is valid and we can insert it into database ***/
    $eventsTitle = filter_var($_POST['eventsTitle'], FILTER_SANITIZE_STRING);
    $eventsDetails = filter_var($_POST['eventsDetails'], FILTER_SANITIZE_STRING);
	$eventsDate = filter_var($_POST['eventsDate'], FILTER_SANITIZE_STRING);
	$eventsTime = filter_var($_POST['eventsTime'], FILTER_SANITIZE_STRING);
	$users = filter_var($_POST['users'], FILTER_SANITIZE_STRING);
	






    /*** now we can encrypt the password ***/
    /**$phpro_password = sha1( $phpro_password );*///
    
    /*** connect to database ***/
    /*** mysql hostname ***/
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
/*
meetingsTitle
meetingsDetails
meetingsDate
meetingsTime
users
*/
        /*** prepare the insert ***/
        $stmt = $dbh->prepare("INSERT INTO events (eventsTitle, eventsDetails , eventsDate , eventsTime , users ) VALUES (:eventsTitle, :eventsDetails, :eventsDate, :eventsTime, :users )");

        /*** bind the parameters ***/
        $stmt->bindParam(':eventsTitle', $eventsTitle, PDO::PARAM_STR);
        $stmt->bindParam(':eventsDetails', $eventsDetails, PDO::PARAM_STR);
		$stmt->bindParam(':eventsDate', $eventsDate, PDO::PARAM_STR);
		$stmt->bindParam(':eventsTime', $eventsTime, PDO::PARAM_STR);
		$stmt->bindParam(':users', $users, PDO::PARAM_STR);
		
        





        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** unset the form token session variable ***/
        unset( $_SESSION['form_token'] );

        /*** if all is done, say thanks ***/
			
			echo("<script>location.href = 'http://localhost/view2/pages/viewtasks/';</script>");
    }
    catch(Exception $e)
    {
        /*** check if the username already exists ***/
        if( $e->getCode() == 23000)
        {
            $message = 'Username already exists';
        }
        else
        {
            /*** if we are here, something has gone wrong with the database ***/
            $message = 'We are unable to process your request. Please try again later"';
        }
    }
}
?>

<html>
<head>
<title>PHPRO Login</title>
</head>
<body>
<p><?php echo $message; ?>
</body>
</html>