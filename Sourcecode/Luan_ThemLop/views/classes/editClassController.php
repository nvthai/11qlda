<?php 
	if ($_SERVER['REQUEST_METHOD'] == "POST")
	{
		session_start();
		$con = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());
		mysqli_select_db($con, "reminddb") or die("Cannot connect to database");
		$_ClassName = mysqli_real_escape_string($con, $_POST['ClassName']);
		$_ClassCode = mysqli_real_escape_string($con, $_POST['ClassCode']);
		$_GradeLevel = mysqli_real_escape_string($con, $_POST['ClassGrade']);
		// initial value
		$_AllowFind = '0';
		$_AllowChat = '0';
		$_ClassMessage = '0';
		$_id = mysqli_real_escape_string($con, $_POST['idCode']);
		$_AllowChat = isset($_POST['AllowChat']);
		$_AllowFind = isset($_POST['AllowFind']);
		$_ClassMessage = isset($_POST['ClassMessage']);

		$_SESSION['S_ClassName'] = $_ClassCode;

		mysqli_query($con, "UPDATE class SET ClassName = '$_ClassName', Code = '$_ClassCode', GradeLevel = '$_GradeLevel', allowChat = '$_AllowChat', messageChildren = '$_ClassMessage' WHERE Code = '$_id'");
		//Print '<script>alert("Updated.!");</script>';
		header("location: index.php");
		exit();
	}
 ?>