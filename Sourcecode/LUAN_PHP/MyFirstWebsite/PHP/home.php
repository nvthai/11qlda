<!DOCTYPE html>
<html>
<head>
	<title>REMIND.COM</title>
</head>
	<?php
		session_start();
		if($_SESSION['user'])
		{
		}
		else
		{
			header("location: index.php"); //redirect if user not logged in
		}
		$user = $_SESSION['user'];
	?>


<body>
	<h2>HOME PAGE</h2>
	<p>Hello 
		<?php Print "$user" ?>, welcome to REMIND.COM.
	</p>
	 <a href="logout.php">Log out</a> <br/><br/>
	<form action="add.php" method="POST">
		<table>
            <tr>
              <td>Add more to list: </td>
              <td><input type="text" name="details" /></td>
            </tr>
            <tr>
              <td>Public post?</td>
              <td><input type="checkbox" name="public[]" value="yes"/></td>
            </tr>
        </table>
        <input type="submit" value="Add to list"/>
	</form>
	<br/>
	<h2 align="center">Animal</h2>
	<table border="1px" width="100%">
		<tr>
			<th>Id</th>
			<th>Details</th>
			<th>Post Time</th>
			<th>Edit Time</th>
			<th>Public Post</th>
			<th></th>
		</tr>
		<?php
			mysql_connect("localhost", "root", "") or die(mysql_error());
			mysql_select_db("logindb") or die("Cannot connect to database");
			$query = mysql_query("SELECT * FROM list");

			while ($row = mysql_fetch_array($query))
			{
				Print '<tr>';
				Print '<td align="center">' .$row['ListId']. "</td>";
				Print '<td align="center">' .$row['Details']. '</td>';
				Print '<td align="center">' .$row['DatePosted']. " - " .$row['TimePosted'].'</td>';
				Print '<td align="center">' .$row['DateEdited']. '</td>';
				Print '<td align="center">' .$row['Public']. '</td>';
				Print '<td align="center"> <a href="edit.php?id='.$row['ListId'].'">Edit</a> | <a href="#" onclick="ask('.$row['ListId'].')"> Delete</a></td> ';
			}
		?>
	</table>	
</body>
</html>


<script>
	function ask(id)
	{
		var r = confirm("Delete?");
		if (r == true)
		{
			window.location.assign("delete.php?id=" + id);
		}
	}
</script>