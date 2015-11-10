<?php 
	if ($_SERVER['REQUEST_METHOD'] == "POST")
	{
		session_start();
		$_ClassName = mysql_real_escape_string($_POST['ClassName']);
		$_ClassCode = mysql_real_escape_string($_POST['ClassCode']);
		$_GradeLevel = mysql_real_escape_string($_POST['ClassGrade']);
		// initial value
		$_AllowFind = '0';
		$_AllowChat = '0';
		$_ClassMessage = '0';
		$_id = mysql_real_escape_string($_POST['idCode']);
		$_AllowChat = isset($_POST['AllowChat']);
		$_AllowFind = isset($_POST['AllowFind']);
		$_ClassMessage = isset($_POST['ClassMessage']);

		$_SESSION['S_ClassName'] = $_ClassCode;
		mysql_connect("localhost", "root", "") or die(mysql_error());
		mysql_select_db("reminddb") or die("Cannot connect to database");

		mysql_query("UPDATE class SET ClassName = '$_ClassName', Code = '$_ClassCode', GradeLevel = '$_GradeLevel', allowChat = '$_AllowChat', messageChildren = '$_ClassMessage' WHERE Code = '$_id'");
		//Print '<script>alert("Updated.!");</script>';
		header("location: index.php");
	}
 ?>