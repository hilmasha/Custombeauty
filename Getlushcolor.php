<?php

include "FaceDetector.php"; //facedetector class

//initialize face-detect
$face_detect = new Face_Detector('detection.dat');
//detect face in image uploaded by user
$face_detect->face_detect('/var/www/html/face2.jpg');
list($ravg, $gavg, $bavg) = $face_detect->avgColor();
$skin = array($ravg,$gavg,$bavg); //dominant colour gotten from detected face

//connect to database
$connection = mysqli_connect("172.31.89.58", "lush", "admin", "custombeauty", 3306);
$query2 = "SELECT R, G, B FROM  skin_shade_match"; //select all rgb colours
$ses_sql2=mysqli_query($connection,$query2) or die(mysqli_error());

$colors =array();//initialize array to store all color rows in database
$color =array();//initialize array to store color in every row
//while reading through table store the result of query r,g,b
while($row = mysqli_fetch_assoc($ses_sql2)){ //look through query //https://stackoverflow.com/questions/5366620/storing-database-records-into-array
    $colors[] =array_values($row); //add each row returned to an array
}

function compareColors($colorA, $colorB) {//https://stackoverflow.com/questions/16884577/php-find-the-closest-rgb-to-predefined-rgb-from-list
    return abs($colorA[0] - $colorB[0]) + abs($colorA[1] - $colorB[1]) + abs($colorA[2] - $colorB[2]);
}

$selectedColor = $colors[0]; //select first set of r g b values
$deviation = PHP_INT_MAX; //deviation set to max php value possible

for ($i=0;$i<=count($colors);$i++) { //for loop until array length
    $color=array_values($colors[$i]); //store first row of rgb colors from array
    $curDev = compareColors($skin, $color);

    if ($curDev < $deviation) { //if the result of the compare version is less than the current deviation
        $deviation = $curDev;
        $selectedColor = $color;
    }
}
$r = $selectedColor[0];
$g = $selectedColor[1];
$b = $selectedColor[2];
//echo $r;
//echo "<br>";
//echo $g;
//echo "<br>";
//echo $b;
//echo "<br>";
//sql query to get associated lush name for color
$lushname = "SELECT lush_shade_name FROM skin_shade_match WHERE R='$r' AND G='$g' AND B='$b'";
$sql=mysqli_query($connection,$lushname) or die(mysqli_error());
$rowlush = mysqli_fetch_assoc($sql);
$lushcolor= $rowlush['lush_shade_name']; //variable storing lushname
$index=$rowlush['indexnumber'];
$colorup = $index+1;
$colordown=$index-1;
$lushup="SELECT lush_shade_name FROM skin_shade_match WHERE indexnumber='$colorup'";
$lushdown="SELECT lush_shade_name FROM skin_shade_match WHERE indexnumber='$colordown'";
$sql1=mysqli_query($connection,$lushup) or die(mysqli_error());
$sql2=mysqli_query($connection,$lushdown) or die(mysqli_error());
$rowlushup = mysqli_fetch_assoc($sql1);
$rowlushdown = mysqli_fetch_assoc($sql2);
$lushcolorup=$rowlushup['lush_shade_name'];
$lushcolordown=$rowlushdown['lush_shade_name'];
//header("Location: foundation_select.php");
?>
<html>
<body>
<h2>Your Match</h2>
<a href="suggested_product.php?phpvar=<?php echo $lushcolor; ?>">
<img src="<?php 
$yourcolor=ucwords(strtolower($lushcolor));
echo "../Lushtest/Foundation/$yourcolor.PNG";
?>
" alt="Foundation for you" width="100" height="150">
</a>
<?php
echo "<br>";
echo $yourcolor;
?>
<h2>Close Matches</h2>
<a href="suggested_product.php?phpvar=<?php echo $lushcolordown; ?>">
<img src="<?php 
$downcolor=ucwords(strtolower($lushcolordown));
echo "../Lushtest/Foundation/$downcolor.PNG";
?>
" alt="Close Match 1" width="100" height="150">
</a>
<?php
echo "<br>";
echo $downcolor;
?>
<a href="suggested_product.php?phpvar=<?php echo $lushcolorup;?>">
<img src="<?php 
$upcolor=ucwords(strtolower($lushcolorup));
echo "../Lushtest/Foundation/$upcolor.PNG";
?>
" alt="Close Match 2" width="100" height="150">
</a>
<?php
echo "<br>";
echo $upcolor;
?>
</body>
</html>


