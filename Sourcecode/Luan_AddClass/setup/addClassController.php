<?php 

if ($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$_ClassName = mysql_real_escape_string($_POST['ClassName']);
		$_ClassGrade = mysql_real_escape_string($_POST['ClassGrade']);
		$_ClassMessage = 0;
		$_ClassMessage = mysql_real_escape_string($_POST['ClassMessage']);

		// connect to database
		mysql_connect("localhost", "root", "") or die(mysql_error());
		mysql_select_db("reminddb") or die("Cannot connect to database");

		// classId Increment
		mysql_query("INSERT INTO class(TeacherId, Code, allowChat, messageChildren, GradeLevel) 
					 VALUES ('aa', '$_ClassName', '$_ClassNessage', '1', '$_ClassMessage')");
			// redirect teacher
		header("location: teacher.php");	
?>
