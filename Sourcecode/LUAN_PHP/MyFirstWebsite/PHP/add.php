<?php
		session_start();
		if($_SESSION['user'])
		{
		}
		else
		{
			header("location: index.php"); //redirect if user not logged in
		}

	if ($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$details = mysql_real_escape_string($_POST['details']);
		$time = strftime("%X");			// time
		$date = date("Y-m-d H:i:s"); // create date
		$decision = false;
		mysql_connect("localhost", "root", "") or die(mysql_error());
		mysql_select_db("logindb") or die("Cannot connect to database");
		foreach($_POST['public'] as $each_check)
		{
			if ($each_check != null)
			{
				$decision = true;
			}
		}		

		mysql_query("INSERT INTO list(Details, DatePosted, TimePosted, Public) 
					 VALUES ('$details', '$date', '$time', '$decision')");
		header("location: home.php");	
	}
	else
	{
		header("location: home.php");
	}
?>
