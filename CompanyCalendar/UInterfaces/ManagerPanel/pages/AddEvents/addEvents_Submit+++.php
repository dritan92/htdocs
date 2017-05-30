<?php
/*** begin our session ***/
session_start();



if ($_POST['evetnsTitle'] == '' || $_POST['evetnsDetails'] == '' || $_POST['evetnsDate'] == '' || $_POST['evetnsTime'] == '' || $_POST['users'] == '' )
{
        /*** if there is no match ***/
        $message = "************Please fill all the fields************";
		//include('adduser.php');
		
}
else
{
    /*** if we are here the data is valid and we can insert it into database ***/
    $evetnsTitle = filter_var($_POST['evetnsTitle'], FILTER_SANITIZE_STRING);
    $evetnsDetails = filter_var($_POST['evetnsDetails'], FILTER_SANITIZE_STRING);
	$evetnsDate = filter_var($_POST['evetnsDate'], FILTER_SANITIZE_STRING);
	$evetnsTime = filter_var($_POST['evetnsTime'], FILTER_SANITIZE_STRING);
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
        $stmt = $dbh->prepare("INSERT INTO events (evetnsTitle, evetnsDetails , evetnsDate , evetnsTime , users ) VALUES (:evetnsTitle, :evetnsDetails, :evetnsDate, :evetnsTime, :users )");

        /*** bind the parameters ***/
        $stmt->bindParam(':evetnsTitle', $evetnsTitle, PDO::PARAM_STR);
        $stmt->bindParam(':evetnsDetails', $evetnsDetails, PDO::PARAM_STR);
		$stmt->bindParam(':evetnsDate', $evetnsDate, PDO::PARAM_STR);
		$stmt->bindParam(':evetnsTime', $evetnsTime, PDO::PARAM_STR);
		$stmt->bindParam(':users', $users, PDO::PARAM_STR);
		
        





        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** unset the form token session variable ***/
        unset( $_SESSION['form_token'] );

        /*** if all is done, say thanks ***/
			
			echo("<script>location.href = 'http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/pages/EditEvents/viewEvents.php';</script>");
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