<?php
include('logincheck.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: emphomepg.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Form</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">

<div id="login">
<h1 style="color:white;font-family:helvetica;font-size:300%;">EMPLOYEE LOGIN</h1>

<form action="" method="post">
<label><strong><font color="#6e1594">Agent ID :</strong> </label>
<input id="text" name="employee_id" placeholder="********************" type="text" maxlength="20" color=#20355F>
<label><strong>Password :</strong></label>
<input id="password" name="password" placeholder="************" type="password" maxlength="12">
<input name="submit" type="submit" id="loginsubmit" value=" Login ">
<span><?php echo $error; ?></span>
</form>
</div>
</div>
</body>
</html>