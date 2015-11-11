<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div>What do students and parents call you?</div>
<div>Your signature appears on chats </div>
<form action="teacherClass.php" method="POST">
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<table>
	<tr>
		<td>
		<select name="title">
			<option value="">[No Title]</option>
			<?php 
			$con = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());
			mysqli_select_db($con, "reminddb") or die("Cannot connect to database");
			$query = mysqli_query($con, "SELECT TitleName FROM title");
			while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
					{
						Print '<option value="'.$row['TitleName'].'">' .$row['TitleName']. "</option>";
					}
		 	?>
 	</td>
		<td></td>
	</tr>
</table>
	
	</select> 	
	<div>Name</div>
	<input name="name" value=""/>
	<input type="submit" value="Next"/>
</form>
</body>
</html>

<?php 

if ($_SERVER['REQUEST_METHOD'] == "POST")
	{
		session_start();
		$_SESSION['S_ClassName'] = 'init';
		header("location: class.php");
		exit();
	}

?>
