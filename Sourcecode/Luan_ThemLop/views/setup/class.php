<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<p>
		Add a class <br/>
	Once you add a class, you can invite students and parents, <br/>
	send announcements, and start chats.
	</p>
	<form action="class.php" method="POST">
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<div>Class name</div>
		<input name="ClassName" value=""/>
		<?php 
			session_start();
			if ($_SESSION['S_ClassName'] == '_exist_') 
			{
				Print '<div style="color:red">Class name is existed!</div>';
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
		 <input type='checkbox' name='ClassMessage' value='1'/>
		 <div>I will only message people 13 and older
It's okay if students are under 13. We'll ask for a parent's email address to keep everyone in the loop.</div>
	<input type="submit" value="Add">
	</form>
</body>
</html>


<?php 
if ($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//session_start();
		$con = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());
		$_ClassName = mysqli_real_escape_string($con, $_POST['ClassName']);
		$_ClassGrade = mysqli_real_escape_string($con, $_POST['ClassGrade']);
		$_ClassMessage = 0;
		$_ClassMessage = mysqli_real_escape_string($con, $_POST['ClassMessage']);
		$_ClassImage = "classes/images/default.png";

		// connect to database
		mysqli_select_db($con, "reminddb") or die("Cannot connect to database");
		
		//$_SESSION['S_TeacherId'] = 'adb';
		// classId Increment

		$query = mysqli_query($con, "SELECT ClassName FROM class WHERE ClassName = '$_ClassName'");	
		$count = mysqli_num_rows($query);
		if ($count > 0)
		{
			$_SESSION['S_ClassName'] = '_exist_';
			header("location: class.php");
			exit();
		}
		else
		{
			$_ClassCode = $_ClassName;
			$_SESSION['S_ClassName'] = $_ClassName;
			mysqli_query($con, "INSERT INTO class(TeacherId, ClassName, allowChat, messageChildren, GradeLevel, ClassImage, Code) VALUES ('aab', '$_ClassName', '1', '$_ClassMessage', '$_ClassGrade', '$_ClassImage', '$_ClassCode')");
			// redirect teacher
			header("location: ../classes/index.php");
			exit();		
		}
		
	}
?>
