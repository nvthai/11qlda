<?php 
	session_start();
	if(!empty($_GET['id']))
	{
		$_ClassName = $_GET['id'];
		$_id = $_GET['id'];
		mysql_connect("localhost", "root", "") or die(mysql_error());
		mysql_select_db("reminddb") or die("Cannot connect to database");
		$query = mysql_query("SELECT * FROM class WHERE TeacherId = 'aab' and Code = '$_ClassName'");
		$row = mysql_fetch_assoc($query);

		$_Code = $row['Code'];
		$_Grade = $row['GradeLevel'];
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="editClassController.php" method="POST">
		<h2>Class settings</h2>
		<h3>Information</h3>
		<div>Class name</div>
		<?php 
			// ClassName has value.
			Print '<input name="ClassName" value="'.$row['ClassName'].'"/>';
			Print '<input type="hidden" name="idCode" value="'.$_id.'"/>';
		 ?>

		<div>Class code</div>
		@
		<?php 

			// ClassName has value.
			Print '<input name="ClassCode" value="'.$_Code.'"/>';
		 ?>
		<div>Grade level</div>			
		<select name="ClassGrade" value="select" selected="Kindergarten">
			<option value="Preschool">Preschool</option>
			<option value="Kindergarten">Kindergarten</option>
			<option value="1" selected>1st grade</option>
			<option value="2">2nd grade</option>
			<option value="3">3rd grade</option>
			<option value="4">4th grade</option>
			<option value="5">5th grade</option>
			<option value="6">6th grade</option>
			<option value="7">7th grade</option>
			<option value="8">8th grade</option>
			<option value="9">9th grade</option>
			<option value="10">10th grade</option>
			<option value="11">11th grade</option>
			<option value="12">12th grade</option>
			<option value="other">Other</option>
		</select>
		 <br/>
		 <br/>

		<input type="submit" value="Save"/>	 
		<hr/>
		 <input type="checkbox" name="AllowChat" value="1" checked /> Anyone in this class can start a chat
		 <br/>
		 <input type="checkbox" name="AllowFind" value="1" /> Anyone from school can find this class
		 <br/>
		 <input type="checkbox" name="ClassMessage" value="1" checked/> I will only message people 13 or older
		 <br/>
		 <br/>
		 <div> It's okay if students are under 13. We'll ask for a parent's email address to keep everyone in the loop.</div>
		 <hr/>
	</form>

	<form action="deleteClass.php" method="POST">
		<input type="submit" value="Delete class"/>
	</form>
</body>
</html>