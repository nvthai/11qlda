<html>
    <head>
        <title>My first PHP Website</title>
        <link rel="stylesheet" href="bootstrap-3.3.5-dist\css\bootstrap.css">
        <link rel="stylesheet" href="bootstrap-3.3.5-dist\css\bootstrap-theme.css">
    </head>

    <body>
          <h2>Login Page</h2>
      <table>
      <a href="index.php">Click here to go back</a><br/><br/>
        <form action="checklogin.php" method="POST">
           Enter Username: <input type="text" name="username" required="required" /> <br/>
           Enter password: <input type="password" name="password" required="required" /> <br/>
           <input type="submit" value="Login"/>
        </form>
      </table>
    
        
    </body>
</html>
