<?php
session_start(); // Starting Session

$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    if (empty($_POST['employee_id']) || empty($_POST['password'])) {
        $error = "Employee_ID or Password is invalid";
    }
    else
    {
// Define $username and $password
        $employee_id=$_POST['employee_id'];
        $password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
        $connection = mysqli_connect("172.31.89.58", "lush", "admin", "custombeauty", 3306);
// To protect MySQL injection for Security purpose
        $employee_id = stripslashes($employee_id);
        $password = stripslashes($password);
        $employee_id = mysqli_real_escape_string($connection,$employee_id);
        $password = mysqli_real_escape_string($connection,$password);
// Selecting Database
       $db = mysqli_select_db($connection,"custombeauty");
// SQL query to fetch information of registerd users and finds user match.
	

    $query = mysqli_query($connection,"SELECT * FROM employee_login WHERE password='$password' AND employee_id='$employee_id'");
	$rows = mysqli_num_rows($query);
	if ($rows == 1) {
	$_SESSION['login_user'] = $employee_id; // Initializing Session
	header("location: emphomepg.php"); // Redirecting To home Page
	} 
	else {
	$error = "Username or Password is invalid";
	}
	mysqli_close(); // Closing Connection
	}
}
?>