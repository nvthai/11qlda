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
		<form action="changeClass.php" method="POST">
			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<?php
			$_SESSION['S_Message'] = '';
			$con = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());
			mysqli_select_db($con, "reminddb") or die("Cannot connect to database");
			$query = mysqli_query($con, "SELECT * FROM class WHERE TeacherId = 'aab'");
			$Name = $_SESSION['S_ClassName'];
			//Print '<form action="index.php" method="POST">';
			//Print '<input type="hidden" name="_token" value="<?php echo csrf_token();
			while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
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
		?>
		</form>
	</table>	
</body>
</html>



