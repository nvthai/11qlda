<!DOCTYPE html>
<html>
<head>
	<title>REMIND.COM</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<?php
	session_start();
	if ($_SESSION['user']){}
	else
	{
		header("location: index.php");
	}
	$user = $_SESSION['user'];
	$id_exists = false;
?>
<body>
	<h2>Edit List</h2> 
	 <a href="home.php">Back</a><br/>
	 <h2 align="center">Animal</h2>
	<table border="1px" width="100%">
		<tr>
			<th>Id</th>
			<th>Details</th>
			<th>Post Time</th>
			<th>Public Post</th>
		</tr>
		<?php
			if(!empty($_GET['id']))
			{
				$id = $_GET['id'];
				$_SESSION['id'] = $id;
				$id_exists = true;
				mysql_connect("localhost", "root", "") or die(mysql_error());
				mysql_select_db("logindb") or die("Cannot connect to database");
				$query = mysql_query("SELECT * FROM list WHERE ListId = '$id'");
				$count = mysql_num_rows($query);
				if ($count > 0)
				{
					while ($row = mysql_fetch_array($query))
					{
						Print '<tr>';
						Print '<td align="center">' .$row['ListId']. "</td>";
						Print '<td align="center">' .$row['Details']. '</td>';
						Print '<td align="center">' .$row['DatePosted']. " - " .$row['TimePosted'].'</td>';
						Print '<td align="center">' .$row['Public']. '</td>';
						Print '</tr>';
					}
				}
				else
				{
					$id_exists = false;
				}	
			}
		?>
	</table>
	<br/>

	<?php
		if ($id_exists)
		{
			Print '
			<form action="edit.php" method="POST">
				<table>
            		<tr>
              			<td>Add more to list: </td>
              			<td><input type="text" name="details"></td>
            		</tr>
            		<tr>
              			<td>Public post?</td>
              			<td><input type="checkbox" name="public[]" value="yes"></td>
            		</tr>
        		</table>
				<input type="submit" value="Update"/>
			</form>
			';
		}
		else
		{
			Print '<h2 align="center"> No data.</h2>';
		}
	?>
</body>
</html>



<!--running php-->
<?php
	if ($_SERVER['REQUEST_METHOD'] == "POST")
	{
		mysql_connect("localhost", "root", "") or die(mysql_error());
		mysql_select_db("logindb") or die("Cannot connect to database");
		$details = mysql_real_escape_string($_POST['details']);
		$public = false;
		$id = $_SESSION['id'];
		$time = strftime("%X");
		$date = date("Y-m-d H:i:s"); // edit date

		foreach ($_POST['public'] as $list) 
		{
			if ($list != null)
			{
				$public = true;
			}
		}
		mysql_query("UPDATE list SET Details = '$details', Public = '$public', DateEdited = '$date' WHERE ListId = '$id'");
		Print '<script>alert("Updated.!");</script>';
		header("location: home.php");
	}
?>