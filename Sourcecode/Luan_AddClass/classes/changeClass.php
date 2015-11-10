<?php
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$ClassName = mysql_real_escape_string($_POST['Code']);

		if ($ClassName != null)
		{
			$_SESSION['S_ClassName'] = $ClassName;
			header("location: index.php");
		}
	}
	
?>