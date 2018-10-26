<?php
include ('cust_session.php');
session_start();

if(isset($_GET['link']) && $_SESSION['views']==1 && $_SESSION['view2']==0 ){//https://stackoverflow.com/questions/11481806/php-session-for-counting-visits-and-redirect-if-sessionvisits-1
header("Refresh:0");    
$connection = mysqli_connect("172.31.89.58", "lush", "admin", "custombeauty", 3306);
//SQL Query to add new new cust_id and temp customer info to database
    $query = "INSERT INTO customer_info (cust_id, cust_name, cust_email, address_id) SELECT CONCAT('C', MAX(CAST(SUBSTRING_INDEX(cust_id,'C',-1) AS UNSIGNED)) + 1),'','','0' FROM customer_info ORDER BY LENGTH (cust_id), cust_id";
    $ses_sql = mysqli_query($connection, $query); 
    mysqli_close($connection); // Closing Connection
}

echo $_SESSION['loginuser'];
echo "<br>";
echo $_SESSION['views'];
echo $_SESSION['view2'];
$_SESSION['view2'] = $_SESSION['view2']+1;

?>

<html>
<div id="profile">
<b id="logout" ><a href="logout.php">Log out</a></b>
</div>
</html>