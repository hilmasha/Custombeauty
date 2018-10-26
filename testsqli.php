<?php
//session_start(); // Starting Session
//var_dump($_SESSION)
$connection = mysqli_connect("172.31.89.58", "lush", "admin", "custombeauty", 3306);
//$query = mysqli_query($connection,"SELECT * FROM employee_login WHERE password='$password' AND employee_id='$Employee_ID');
$dbname = `custombeauty`;
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
else{
//echo "connected";
//$listdbtables = array_column(mysqli_fetch_all($connection->query('SHOW TABLES')),0);//http://php.net/manual/en/function.mysql-list-dbs.php
//if (empty($listdbtables)) {
  //  echo "DB Error, could not list tables\n";
  //  echo 'MySQL Error: ' . mysqli_error();
   // exit;
//}
//while ($row = mysqli_fetch_assoc($res)) {
   // echo "Table: {$row[0]}\n";
//}

//print_r($listdbtables);

$password = "otk6qcX0y8m";
$sql = "SELECT * FROM employee_login WHERE employee_id='Adara_Magenny'";
$result = mysqli_query($connection,$sql);
echo "<table>";
while($row=mysqli_fetch_array($result)){
echo "<tr><td>" . $row['password'] . "</td></tr>";
}
echo "</table>";
mysqli_close();
//$stmt = $mysqli->prepare($sql);
 //$stmt->execute();
// $stmt->bind_result($Employee,$Password);
//while($stmt->fetch())
  // {
//echo $Employee;
//}
}

?>