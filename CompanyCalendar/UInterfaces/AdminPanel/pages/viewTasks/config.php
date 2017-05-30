<?php

@$db = mysqli_connect('localhost','root','','phpro_auth') or die ('Not connected to DB');
mysqli_set_charset($db, 'utf8') or die("Can't set sharset");
?>

