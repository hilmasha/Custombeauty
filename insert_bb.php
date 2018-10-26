<?php
include ('cust_session.php');

session_start();
$connection3 = mysqli_connect("172.31.89.58", "lush", "admin", "custombeauty", 3306);
//test variables sh
$quantity="200";
$theme="Galaxy";
$shape="circle";
$oil="Lavender";
echo $oil;
echo $_SESSION['loginuser'];
//$query45 = "INSERT INTO bb_specs (bb_num, cust_id, shape, colour_scheme_name, essential_oil, quantity) VALUES(CASE bb_num WHEN cust_id = '$login_session' NOT IN (SELECT cust_id FROM (SELECT DISTINCT cust_id FROM bb_specs) as derived) THEN 1 WHEN cust_id = '$login_session']' IN (SELECT cust_id FROM (SELECT DISTINCT cust_id FROM bb_specs) as derived) THEN (SELECT A FROM (SELECT (MAX(bb_num) + 1) as A FROM bb_specs WHERE cust_id = '$login_session') as derived) END, '$login_session','$shape', '$theme', '$oil', '$quantity')";
$sql45 = "INSERT INTO bb_specs (bb_num, cust_id, shape, colour_scheme_name, essential_oil, quantity) VALUES(CASE bb_num WHEN cust_id = 'C1069' NOT IN (SELECT cust_id FROM (SELECT DISTINCT cust_id FROM bb_specs) as derived) THEN 1 WHEN cust_id = 'C1069' IN (SELECT cust_id FROM (SELECT DISTINCT cust_id FROM bb_specs) as derived) THEN (SELECT A FROM (SELECT (MAX(bb_num) + 1) as A FROM bb_specs WHERE cust_id = 'C1069') as derived) END, 'C1069','circle', 'Gold Digger', 'vanilla', '20')";
$ses_sql45 = mysqli_query($connection3, $sql45) or die(mysqli_error()); 
//mysqli_close($connection); // Closing Connection

$querybb = "SELECT * FROM bb_specs WHERE cust_id='$login_session'";
$ses_sqlbb=mysqli_query($connection3,$querybb);

while($rowbb = mysqli_fetch_assoc($ses_sqlbb)){
  echo $rowbb['bb_num'];
   echo $rowbb ['cust_id'];
	echo $rowbb['
}

?>
