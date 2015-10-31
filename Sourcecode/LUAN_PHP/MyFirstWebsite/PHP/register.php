<html>
    <head>
        <title>REMIND.COM</title>
    </head>
    <body>
        <h2>Sign up Page</h2>
        <a href="index.php">Back</a> <br> <br>
        <form action="register.php" method="POST">
        <table>
            <tr>
              <td>Username :</td>
              <td><input type="text" name="username" required="required" /></td>
            </tr>
            <tr>
              <td>Password :</td>
              <td><input type="password" name="password" required="required" /></td>

            </tr>
        </table>
          <input type="submit" value="Register"/>
        </form>
    </body>
</html>

<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $Username = mysql_real_escape_string($_POST['username']);
    $Password = mysql_real_escape_string($_POST['password']);
    $bool = true;

    mysql_connect("localhost", "root", "") or die(mysql_error()); // connect to server
    mysql_select_db("logindb") or die("Cannot connect to database..."); // Connect to database
    $query = mysql_query("select * from user");
    while($row = mysql_fetch_array($query))
    {
      $table_users = $row["Username"];
      if ($Username == $table_users)
      {
        $bool = false;
        Print '<script>alert("Username has been taken! {0}, $table_users");</script>';
        Print '<script>widow.location.assign("register.php");</script>';
      }
    }

    if ($bool)
    {
      mysql_query("INSERT INTO user (Username, Password) VALUES ('$Username', '$Password')");
      Print '<script>alert("Successfully resgistered!");</script>';
      Print '<script>window.location.assign("register.php");</script>';
    }
    mysql_close();





  


  } 
?>