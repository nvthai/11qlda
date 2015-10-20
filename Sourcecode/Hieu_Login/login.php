<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
</head>

<body>

<?php
	$thongbao="";
	$user = "";
	$pass = "";
	if(isset($_POST["user"]) && isset($_POST["pass"]))
	{
		$user = $_POST["user"];
		$pass = $_POST["pass"];
		if(strcasecmp($user, "admin") == 0 && strcasecmp($pass, "123") == 0)
		{
			$thongbao = "Login thành công";
		}
		else
		{
			$thongbao = "Sai password hoặc user";
		}
	}
?>

<form action="login.php" method="post" name="form3" target="_self" id="form3">
  <table width="369" border="1" align="center">
    <tr>
      <td colspan="2"><div align="center">
          <p>DEMO LOGIN </p>
        <p>(user admin pass 123)</p>
      </div></td>
    </tr>
    <tr>
      <td width="122">User</td>
      <td width="231"><label>
        <input name="user" type="text" id="user" value="<?php echo $user;?>" />
        </label>
      </td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label>
        <input name="pass" type="password" id="pass" value="<?php echo $pass;?>" />
        </label>
      </td>
    </tr>
    <tr>
      <td colspan="2"><label>
        <div align="center"><?php echo $thongbao;?></div>
      </label>
      <div align="center">&nbsp;</div></td>
    </tr>
    <tr>
      <td colspan="2"><label>
          <div align="center">
            <input type="submit" name="Submit" value="Login" />
          </div>
        </label>
      </td>
    </tr>
  </table>
</form>
</body>
</html>
