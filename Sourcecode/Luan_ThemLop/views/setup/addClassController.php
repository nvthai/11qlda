<?php 

if ($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$con = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());
		$_ClassName = mysqli_real_escape_string($con, $_POST['ClassName']);
		$_ClassGrade = mysqli_real_escape_string($con, $_POST['ClassGrade']);
		$_ClassMessage = 0;
		$_ClassMessage = mysqli_real_escape_string($con, $_POST['ClassMessage']);

		// connect to database
		mysqli_select_db($con, "reminddb") or die("Cannot connect to database");

		// classId Increment
		mysqli_query($con, "INSERT INTO class(TeacherId, Code, allowChat, messageChildren, GradeLevel) 
					 VALUES ('aa', '$_ClassName', '$_ClassNessage', '1', '$_ClassMessage')");
			// redirect teacher
		header("location: teacher.php");	
?>