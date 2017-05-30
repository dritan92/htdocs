
<?php 

    mysql_connect('localhost', 'root', '');
    mysql_select_db('phpro_auth');

    $sql = "SELECT Role FROM phpro_users";
    $result = mysql_query($sql); 
    $user = mysql_fetch_array($result);
    $_SESSION['user'] = $user['user']; 
    $_SESSION['usertype'] = $user['usertype'];        

   if ($_SESSION['usertype']) == 'Admin' or $_SESSION['usertype']) == 'User')

   {
              echo you are connected
         if($_SESSION['usertype'] == 'Admin' ) 
                                   {
                                  echo you are an admin
                                    }
   }