<html>
<head>
	<title>My First PHP Website</title>
	<link rel="stylesheet" href="bootstrap-3.3.5-dist\css\bootstrap.css">
	<link rel="stylesheet" href="bootstrap-3.3.5-dist\css\bootstrap-theme.css">
</head>
<?php
	session_start();
	if($_SESSION['user'])
	{

	}
	else
	{
		header("location:index.php");
	}
	$user = $_SESSION['user'];
	$id_exists = false;
?>

<body>
	<h2>Home Page</h2>
	<p>Hello <?php Print "$user"?>!</p>
	<a href="logout.php">Click here to logout</a><br/><br/>;
	<a href="home.php">Return to home page</a>
	<h2 align ="center"> Currently Selected</h2>
	<table border="1px" width="100%">
		<tr>
			<th>ID</th>
			<th>Details</th>
			<th>Post Time</th>
			<th>Edit Time</th>
			<th>Public Post</th>
		</tr>
		<?php
			if(!empty($_GET['id']))
			{
				$id = $_GET['id'];
				$_SESSION['id'] = $id;
				$id_exists = true;
				mysql_connect("localhost", "root", "") or die(mysql_error());
				mysql_select_db("first_db") or die("Cannot connect to database");
				$query = mysql_query("Select * from list Where id = '$id'");
				$count = mysql_num_rows($query);
				if($count > 0)
				{
					while ($row = mysql_fetch_array($query)) {
						Print "<tr>";
							Print '<td align="center">'. $row['id']. "</td>";
							Print '<td align="center">'. $row['details']. "</td>";
							Print '<td align="center">'. $row['date_posted']. " - ". 
							$row['time_posted']. "</td>";
							Print '<td align="center">'. $row['date_edited']. " - ". 
							$row['time_edited']. "</td>";
							Print '<td align="center">'. $row['public']. "</td>";
						Print "</tr>";
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
		if($id_exists)
		{
			Print '
			<form action="edit.php" method="POST">
				Enter new detail: <input type="text" name="details"/><br/>
				public post? <input type="checkbox" name="public[]" value="yes"/><br/>
				<input type="submit" value="Update List"/>
			</form>
			';
		}
		else
		{
			Print '<h2 align="center"> No data to be edited</h2>';
		}
	?>
</body>
</html>
<?php
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		mysql_connect("localhost", "root", "") or die(mysql_error());
		mysql_select_db("first_db") or die("Cannot connect to database");
		$details = mysql_real_escape_string($_POST['details']);
		$public = "no";
		$id = $_SESSION['id'];
		$time = strftime("%X");
		$date = strftime("%B %d, %Y");

		foreach ($_POST['public'] as $list) {
			if($list != null)
			{
				$public = "yes";
			}
		}
		mysql_query("UPDATE list SET details='$details', public = '$public',
		date_edited='$date', time_edited = '$time' WHERE id = '$id' ");

		header("location:home.php");
	}
?>