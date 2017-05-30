<html>
	<head>
	<title>Delete data in the database</title>
	</head>

	<body>
	
	<?php
	// Connect to database server
	mysql_connect("mysql.myhost.com", "user", "sesame") or die (mysql_error ());

	// Select database
	mysql_select_db("mydatabase") or die(mysql_error());

	// The SQL statement that deletes the record
	$strSQL = "DELETE FROM people WHERE id = 24";
	mysql_query($strSQL);
	
	// Close the database connection
	mysql_close();
	?>

	<h1>Record is deleted!</h1>

	</body>
	</html>