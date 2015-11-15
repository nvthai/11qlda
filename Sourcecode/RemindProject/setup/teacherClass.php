<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div>What do students and parents call you?</div>
<div>Your signature appears on chats </div>
<form action="teacherClass.php" method="POST">
<table>
	<tr>
		<td>
		<select name="title">
			<option value="">[No Title]</option>
			<?php 
			mysql_connect("localhost", "root", "") or die(mysql_error());
			mysql_select_db("reminddb") or die("Cannot connect to database");
			$query = mysql_query("SELECT TitleName FROM title");
			while ($row = mysql_fetch_array($query))
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
		header("location: class.php");
	}

?>
