<?php

include "FaceDetector.php";

$data = array();
$face_detect = new Face_Detector('detection.dat');

$face_detect->face_detect('/var/www/html/face2.jpg');
$face_detect->cropFace();
//list($ravg, $gavg, $bavg) = $face_detect->avgColor();
//echo "r = $ravg  ";
//echo "g = $gavg  ";
//echo "b = $bavg  ";
?>
