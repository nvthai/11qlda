<html>
    <head>
        <title>My first PHP Website</title>
        <link rel="stylesheet" href="bootstrap-3.3.5-dist\css\bootstrap.css">
        <link rel="stylesheet" href="bootstrap-3.3.5-dist\css\bootstrap-theme.css">
    </head>
    <body>
        <h2>Registration Page</h2>
        <a href="index.php">Click here to go back</a><br/><br/>
        <form action="register.php" method="POST">
           Enter Username: <input type="text" name="username" required="required" /> <br/>
           Enter Password: <input type="password" name="password" required="required" /> <br/>
           <input type="submit" value="Register"/>
        </form>
    </body>
</html>

<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
    $Username = mysql_real_escape_string($_POST['username']);
    $Password = mysql_real_escape_string($_POST['password']);

    echo "Username entered is ". $Username. "<br/>";
    echo "Password entered is ". $Password;
    $bool = true;

    mysql_connect("localhost", "root", "") or die(mysql_error()); // Connect to server
    mysql_select_db("first_db") or die("Cannot connect to database"); // connect to database
    $query = mysql_query("Select * from users");
    while ($row = mysql_fetch_array($query)) 
    {
      $table_users = $row['username'];
      if($Username == $table_users)
      {
        $bool = false;
        Print '<script>alert("Username has been taken!");</script>';
        Print '<script>window.location.assign("register.php");</script>';

      }
    }

    if($bool)
    {
      mysql_query("INSERT INTO users (username, password) VALUES ('$Username', '$Password')");
      Print '<script>alert("Successfully Registered!");</script>';
      Print '<script>window.location.assign("register.php");</script>';     
    }
  }
?>