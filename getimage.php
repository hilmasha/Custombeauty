<?php
$file = "/var/www/html/Lushtest/face2.jpg";
//echo '<img src=$filename alt="icon" />';
$type ='image/jpeg';
header('Content-Type:'.$type);
header('Content-Length: ' . filesize($file));
readfile($file);
?>