<?php 

if ($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$roles = mysql_real_escape_string($_POST['role']);
		$time = strftime("%X");			// time
		$date = date("Y-m-d H:i:s"); // create date
		$decision = false;
		mysql_connect("localhost", "root", "") or die(mysql_error());
		mysql_select_db("reminddb") or die("Cannot connect to database");
		if ($roles == "teacher" )
		{

			// insert role
			mysql_query("INSERT INTO class(ClassId, TeacherId, Code, allowChat, messageChildren) 
					 VALUES ('2', 'teacher2', 'abc', '1', '1')");
			// redirect teacher
			//header("location: teacher.php");	
			echo "<p>$roles</p>";
			header("location: setup/teacherClass.php");
		}	

		if ($roles == "parent")
		{
			// redirect parent
			//header("location: parentClass.php");
		}
		if ($roles == "student")
		{
			// redirect to student	
			//header("location: studentClass.php");
		}		

		//mysql_query("INSERT INTO list(Details, DatePosted, TimePosted, Public) 
		//			 VALUES ('$details', '$date', '$time', '$decision')");
		//header("location: aaaa.php");	
	}
	else
	{
		//header("location: home.php");
	}
?>