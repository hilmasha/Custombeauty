<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect("172.31.89.58", "lush", "admin", "custombeauty", 3306);
// Selecting Database
$db = mysqli_select_db($connection,"custombeauty");
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($connection,"SELECT * FROM employee_login WHERE employee_id='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['employee_id'];
if(!isset($login_session)){
mysqli_close($connection); // Closing Connection
header('Location: loginpage.php'); // Redirecting To login Page
}
?>
