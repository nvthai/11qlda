<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
ob_start();
require("config/dbconnect.php");
if($_POST) {
$name       = $_POST['name'];

$pass      = $_POST['pass'];

$name=strip_tags(mysql_real_escape_string($name));

$pass=strip_tags(mysql_real_escape_string($pass));

$sql = "SELECT * FROM account WHERE name='$name' AND pass ='$pass'";

$account = mysql_query($sql);    
if (mysql_num_rows($account)==1)   
{  
$_SESSION['myname'] = $name;
echo '<p class="success"> Welcome <span style="color:blue">'.$_SESSION['myname'].'</span> </br>
 Log in successfully! <br>
<a href="logout.php">Log out</a> !</p>';

}

else 

echo '<p class="success"> Username or password incorrect!</p>';

}

ob_end_flush();

?>