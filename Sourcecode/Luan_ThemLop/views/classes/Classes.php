
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>

    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Tell about yourself</h3>
                    </div> 
                   <form action="Classes.php" method="POST">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <button type="submit" value="teacher" name="role">I'm teacher</button>
                        <button type="submit" value="student" name="role">I'm student</button>
                        <button type="submit" value="parent" name="role">I'm parent</button>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>



<!--add role to user-->
<?php 

if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $con = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());
        $roles = mysqli_real_escape_string($con, $_POST['role']);

        $decision = false;
        mysqli_select_db($con, "reminddb") or die("Cannot connect to database");
        if ($roles == "teacher")
        {

            // insert role
            // 1 = teacher
            mysqli_query($con, "UPDATE user SET Role = '1' WHERE UserId = '1'");
            // redirect teacher
            //header("location: teacher.php");  
            header("location: ../setup/teacherClass.php");
            exit();
            //echo "<p>OK</p>";
        }   

        if ($roles == "parent")
        {
            // redirect parent
            //header("location: parentClass.php");
            // 2 = parent
            //mysqli_query($con, "UPDATE user SET Role = '2' WHERE UserId = '1'");
            header("location: parentClass.php");
            exit();
            Print "<p>parent</p>";
        }
        if ($roles == "student")
        {
            // redirect to student  
            //header("location: studentClass.php");
            // 3 = student
            mysqli_query($con, "UPDATE user SET Role = '3' WHERE UserId = '1'");
        }       

        //mysql_query("INSERT INTO list(Details, DatePosted, TimePosted, Public) 
        //           VALUES ('$details', '$date', '$time', '$decision')");
        //header("location: aaaa.php"); 
    }
    else
    {
        //header("location: home.php");
    }
?>