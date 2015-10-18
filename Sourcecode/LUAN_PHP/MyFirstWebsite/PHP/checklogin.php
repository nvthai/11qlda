<?php
	session_start();
	$Username = mysql_real_escape_string($_POST['username']); // data from another form..
	$Password = mysql_real_escape_string($_POST['password']);


	// opening to connect database
	mysql_connect("localhost", "root", "") or die (mysql_error());
	mysql_select_db("logindb") or die ("Cannot connect to database");
	$query = mysql_query("SELECT * FROM user WHERE username = '$Username'");
	$exists = mysql_num_rows($query);
	$table_users = "";
	$table_password = "";
	if ($exists > 0) // if there are not existing username in database...
	{
		while($row = mysql_fetch_assoc($query))
		{
			$table_users = $row['Username'];
			$table_password = $row['Password'];
		}
		if (($Username == $table_users) && ($Password == $table_password))
		{
			if ($Password == $table_password)
			{
				$_SESSION['user'] = $Username;
				header("location: home.php");
			}
		}
		else
		{
			Print '<script>alert("Incorrect Password!");</script>';
			Print '<script>window.location.assign("login.php");</script>';
		}
	}
	else
	{
		Print '<script>alert("Incorrect username");</script>';
		Print '<script>window.location.assign("login.php");</script>';
	}
?>