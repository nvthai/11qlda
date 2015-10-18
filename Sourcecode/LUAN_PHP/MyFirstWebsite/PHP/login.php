<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
  <h2>Login Page</h2>
        <a href="index.php">Back </a>
        <form action="checklogin.php" method="POST">
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
          <input type="submit" value="Log in"/>
        </form>
        <br/>
    <a href="register.php">Sign up</a>
</body>
</html>