<html>
	<head>
		<title>My First PHP website</title>
		<link rel="stylesheet" href="bootstrap-3.3.5-dist\css\bootstrap.css">
		<link rel="stylesheet" href="bootstrap-3.3.5-dist\css\bootstrap-theme.css">

	</head>

	<?php
		 session_start();
		 if($_SESSION['user']){}
		 	else
		 	{
		 		header("location:index.php");
		 	}
		 	$user = $_SESSION['user'];
	?>
	<body>
		 <h2>HOME PAGE</h2>
		 <p>Hello <?php Print "$user" ?>!</p>
		 <a href="logout.php">Click here to logout</a><br/><br/>
		 <form action = "add.php" method="POST">
		 	Add more to list: <input type="text" name = "details"/><br/>
		 	public post? <input type = "checkbox" name = "public[]" value = "yes"/><br/>
		 	<input type = "submit" value="Add to list"/>
		 </form>
		 <h2 align="center">My list</h2>
		 <table border = "1px" width = "100%">
		 	<tr>
		     <th>ID</th>
		     <th>Details</th>
		     <th>Post Time</th>
		     <th>Edit Time</th>
		     <th>Edit</th>
		     <th>Delete</th>
		     <th>Public Post</th>
		 	</tr>
		 	<?php
		 		mysql_connect("localhost", "root", "") or die(mysql_error());
		 		mysql_select_db("first_db") or die("Cannot connect to database");
		 		$query = mysql_query("Select * from list");
		 		while ($row = mysql_fetch_array($query)) {
		 			Print "<tr>";
		 				Print '<td align="center">'. $row['id'] . "</td>";
		 				Print '<td align="center">'. $row['details'] . "</td>";
		 				Print '<td align="center">'. $row['date_posted'] . " - " . $row['time_posted'] . "</td>";
		 				Print '<td align="center">'. $row['date_edited'] .  " - " . $row['time_edited'] . "</td>";
		 				Print '<td align="center"><a href="edit.php?id='. $row['id'].'">edit</a> </td>';
		 				Print '<td align="center"><a href="#" onclick="myFunction('.$row['id'].')">delete</a> </td>';
		 				Print '<td align="center">'. $row['public'] . "</td>";
		 			Print "</tr>";
		 		}
		 	?>
		 </table>

	</body>
</html>
		 <script>
		 	function myFunction(id)
		 	{
		 		var r = confirm("Do you want to delete this record?");
		 		if(r == true)
		 		{
		 			window.location.assign("delete.php?id=" + id);
		 		}
		 	}
		 </script>