<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<a href="addClass.php"> Add a class</a>
	<br/>
	<?php 
		session_start();
		Print '<a href="editClassView.php?id='.$_SESSION['S_ClassName'].'">Edit a class</a>';
	 ?>


	<table border="1px" width="20%">
		<tr>
			<th>Class Name</th>
		</tr>
		<?php
			$_SESSION['S_Message'] = '';
			mysql_connect("localhost", "root", "") or die(mysql_error());
			mysql_select_db("reminddb") or die("Cannot connect to database");
			$query = mysql_query("SELECT * FROM class WHERE TeacherId = 'aab'");
			$Name = $_SESSION['S_ClassName'];
			Print '<form action="changeClass.php" method="POST">';
			while ($row = mysql_fetch_array($query))
			{
				if ($row['Code'] == $Name)
				{
					Print '<tr>';
					Print '<td align="center">' .$row['ClassName']. '</td>';
					Print '</tr>';		
				}	
				else
				{
					Print '<tr>';
					Print '<td align="center"><button name="Code" type="submit" value="'.$row['Code'].'">'.$row['ClassName'].'</button></td>';
					Print '</tr>';	
				}
				
			}
			Print '</form>';
			
		?>
	</table>	
</body>
</html>
