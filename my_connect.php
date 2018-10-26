<?php

$mysqli = mysqli_connect("172.31.89.58", "lush", "admin", "custombeauty", 3306);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
else{
echo $mysqli->host_info . "\n";
echo "connected";
}
?>