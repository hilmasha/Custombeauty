<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
//ini_set('session.cookie_lifetime', 0);
$connection = mysqli_connect("172.31.89.58", "lush", "admin", "custombeauty", 3306);
session_start();// Starting Session
//query to get cust_id for current user that was just added to keep track and use
$query2 = "SELECT cust_id FROM  customer_info ORDER BY CAST(SUBSTRING(cust_id,LOCATE('C',cust_id)+1) AS UNSIGNED) DESC LIMIT 1";
$ses_sql2=mysqli_query($connection,$query2);
$row = mysqli_fetch_assoc($ses_sql2);
$login_session =$row['cust_id'];
$_SESSION['loginuser'] = $row['cust_id'];

if(!isset($login_session)){
header('Location: imgpick.php'); // Redirecting To Home Page
mysqli_close($connection); // Closing Connection
}

//echo $login_session;
?>

