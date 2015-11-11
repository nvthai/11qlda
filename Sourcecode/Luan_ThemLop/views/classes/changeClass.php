<?php
	session_start();
	$con = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());
		$ClassName = mysqli_real_escape_string($con, $_POST['Code']);
		if ($ClassName != null)
		{
			$_SESSION['S_ClassName'] = $ClassName;
			header("location: index.php");
			exit();
		}
?>