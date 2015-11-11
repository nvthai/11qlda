<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h3>Add a class</h3>
	<form action="addClass.php" method="POST">
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<div>Class name</div>
		<input name="ClassName" value=""/>
		<div>Class code</div>
		@<input name="ClassCode" value=""/>
		<?php  
			session_start();
			if ($_SESSION['S_Message'] == "_exist_")
			{
				Print '<div style="color:red">Oops! This code is already taken. Here are some available codes: @d6c66, @d6c668, or @d6c668k</div>';
			}
		?>
		<div>Grade level</div>
		<select name="ClassGrade" value="select">
			<option value="Preschool">Preschool</option>
			<option value="Kindergarten">Kindergarten</option>
			<option value="1">1st grade</option>
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
		<br/>
		 <input type="checkbox" name='AllowChat' value='1' checked="true" /> Anyone in this class can start a chat
		 <br/>
		 <input type="checkbox" name='ClassMessage' value='1' checked="true"/> I will only message people 13 or older
		 <br/>
		 <br/>
		 <div> It's okay if students are under 13. We'll ask for a parent's email address to keep everyone in the loop.</div>
		 <br/>
	<input type="submit" value="Add">
	</form>
</body>
</html>


<?php 
if ($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$con = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());
		mysqli_select_db($con, "reminddb") or die("Cannot connect to database");
		$_ClassName = mysqli_real_escape_string($con, $_POST['ClassName']);
		$_ClassGrade = mysqli_real_escape_string($con, $_POST['ClassGrade']);
		$_ClassCode = mysqli_real_escape_string($con, $_POST['ClassCode']);
		$_AllowChat = 1;
		$_AllowChat = mysqli_real_escape_string($con, $_POST['AllowChat']);
		$_ClassMessage = 1;
		$_ClassMessage = mysqli_real_escape_string($con, $_POST['ClassMessage']);
		$_ClassImage = "classes/images/default.png";

		$_SESSION['S_Message'] = $_ClassCode;
		// connect to database


		$query = mysqli_query($con, "SELECT Code FROM class WHERE Code = '$_ClassCode'");
		$count = mysqli_num_rows($query);
		if ($count > 0)
		{
			$_SESSION['S_Message'] = '_exist_';
			header("location: addClass.php");
			exit();
		}
		else
		{
			$_SESSION['S_Message'] = 'done';	
			// classId Increment
			mysqli_query($con, "INSERT INTO class(TeacherId, Code, ClassName, allowChat, messageChildren, GradeLevel, ClassImage) 
								VALUES ('aab','$_ClassCode', '$_ClassName', '1', '$_ClassMessage', '$_ClassGrade', '$_ClassImage')");
			mysqli_close($con);
			// redirect teacher
		header("location: index.php");		
		exit();
		}
		
	}
?>
