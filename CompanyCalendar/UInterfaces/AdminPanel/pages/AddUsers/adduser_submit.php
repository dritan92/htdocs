<?php
/*** begin our session ***/
session_start();





//print_r($_POST); exit;
/*** first check that both the username, password and form token have been sent ***/
if(!isset( $_POST['phpro_username'], $_POST['phpro_password'], $_POST['form_token']))
{
    header('Location: addusers.php?err=1');
}
/*** check the form token is valid ***/
elseif( $_POST['form_token'] != $_SESSION['form_token'])
{
    echo("<script>location.href = 'http://localhost/CompanyCalendar/UInterfaces/AdminPanel/pages/addusers/addusers.php';</script>");
}
/*** check the username is the correct length ***/
elseif (strlen( $_POST['phpro_username']) > 20 || strlen($_POST['phpro_username']) < 2)
{
    header('Location: addusers.php?err=1');
}
/*** check the password is the correct length ***/
elseif (strlen( $_POST['phpro_password']) > 20 || strlen($_POST['phpro_password']) < 4)
{
    header('Location: addusers.php?err=2');
}
/*** check the username has only alpha numeric characters ***/

/*** check the password has only alpha numeric characters ***/
elseif (ctype_alnum($_POST['phpro_password']) != true)
{
        /*** if there is no match ***/
        header('Location: addusers.php?err=3');
}
elseif ($_POST['phpro_username'] == '' || $_POST['phpro_password'] == '' || $_POST['Email'] == '' || $_POST['Name'] == '' || $_POST['Surname'] == '' || $_POST['Role'] == '')
{
        /*** if there is no match ***/
        header('Location: addusers.php?err=4');
		
}



elseif ($_POST['phpro_username'] == '' || $_POST['phpro_password'] == '' || $_POST['Email'] == '' || $_POST['Name'] == '' || $_POST['Surname'] == '' || $_POST['Role'] == '')
{
        /*** if there is no match ***/
        header('Location: addusers.php?err=4');
		
}

else
{
    /*** if we are here the data is valid and we can insert it into database ***/
    $phpro_username = filter_var($_POST['phpro_username'], FILTER_SANITIZE_STRING);
    $phpro_password = filter_var($_POST['phpro_password'], FILTER_SANITIZE_STRING);
	$Name = filter_var($_POST['Name'], FILTER_SANITIZE_STRING);
	$Surname = filter_var($_POST['Surname'], FILTER_SANITIZE_STRING);
	$Email = filter_var($_POST['Email'], FILTER_SANITIZE_STRING);
    $level = filter_var($_POST['level'], FILTER_SANITIZE_STRING);
    $team = filter_var($_POST['team'], FILTER_SANITIZE_STRING);
	$Role = filter_var($_POST['Role'], FILTER_SANITIZE_STRING);
    $maxTask = filter_var($_POST['maxTask'], FILTER_SANITIZE_STRING);
//print_r($_POST); exit;



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
        $connection = mysql_connect( $mysql_hostname, $mysql_username,    $mysql_password) 
             or die ("Could not connect to server ... \n" . mysql_error ());
             mysql_select_db($mysql_dbname) 
             or die ("Could not connect to database ... \n" . mysql_error ());

        $sql ="SELECT * FROM users where username ='$phpro_username' ";

        $existObj = mysql_query ($sql);
        
        $currObj = mysql_fetch_object($existObj);

        if($currObj){
            
            header('Location: addusers.php?err=5');   
        }
        else{


        $dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password);
        /*** $message = a message saying we have connected ***/

        /*** set the error mode to excptions ***/
        
        
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*** prepare the insert ***/
        $stmt = $dbh->prepare("INSERT INTO users (username, password , Name , Surname , Email,Role ,teamid,level,max_tasks) VALUES (:phpro_username, :phpro_password, :Name, :Surname, :Email, :Role,:team,:level,:maxTask )");

        /*** bind the parameters ***/
        $stmt->bindParam(':phpro_username', $phpro_username, PDO::PARAM_STR);
        $stmt->bindParam(':phpro_password', $phpro_password, PDO::PARAM_STR, 40);
		$stmt->bindParam(':Name', $Name, PDO::PARAM_STR);
		$stmt->bindParam(':Surname', $Surname, PDO::PARAM_STR);
		$stmt->bindParam(':Email', $Email, PDO::PARAM_STR);
        $stmt->bindParam(':Role', $Role, PDO::PARAM_STR);	
        $stmt->bindParam(':team', $team, PDO::PARAM_STR);   
        $stmt->bindParam(':level', $level, PDO::PARAM_STR);   
        $stmt->bindParam(':maxTask', $maxTask, PDO::PARAM_STR);   





        /*** execute the prepared statement ***/
        $stmt->execute();
        $lastInsertId = $dbh->lastInsertId();
        $teamsEmployee = $_POST["subteams"];
        if(sizeof($teamsEmployee) > 0){
            foreach ($teamsEmployee as $value) {
            $statement = $dbh->prepare("INSERT INTO teams_employee(teamId, employeeId)
    VALUES(:teamId, :employeeId)");
            $statement->execute(array(
                "teamId" => $value,
                "employeeId" => $lastInsertId
            ));
               # code...
            }
            
        }
        

        /*** unset the form token session variable ***/
        unset( $_SESSION['form_token'] );
        /*** if all is done, say thanks ***/
			
			echo("<script>location.href = 'http://localhost/CompanyCalendar/UInterfaces/AdminPanel/pages/editusers/editusers.php';</script>");
    }//
    }
	
	
	catch(Exception $e)
    {
        /*** check if the username already exists ***/
        if( $e->getCode() == 23000)
        {
            header('Location: addusers.php?err=5');
        }
        else
        {
            /*** if we are here, something has gone wrong with the database ***/
            header('Location: addusers.php?err=5');
        }
    }
	
	

							 
			/* checking if the user already exists*/

			 $connection = mysql_connect( $mysql_hostname, $mysql_username,    $mysql_password) 
			 or die ("Could not connect to server ... \n" . mysql_error ());
			 mysql_select_db($mysql_dbname) 
			 or die ("Could not connect to database ... \n" . mysql_error ());
			
			$title = array();
			$comments = array();
			$date = array();
			$myUser = $_POST['phpro_username'];
			$sql ="SELECT username FROM users WHERE username ='$myUser'";
			$resultadao = mysql_query ($sql);
			$i=0;
			while ($row = mysql_fetch_object ($resultadao) )

			{
			$i=$i+1;

			}

			if ($i>0)
			{

			header('Location: addusers.php?err=6');
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