<?php
include ('Getlushcolor.php');
?>
<html>
<body>
<h2>Your Match</h2>
<a href="suggested_product.php?phpvar=<?php echo $lushcolor; ?>">
<img src="<?php echo "/var/www/html/Lushtest/Foundation/ucwords(strtolower($lushcolor)).PNG";?>" alt="Foundation for you" width="100" height="150">
</a>
<?php
//echo "<br>";
echo $lushcolor;
?>
<h2>Close Matches</h2>
<a href="suggested_product.php?phpvar=<?php echo $lushcolordown; ?>">
<img src="<?php echo "/var/www/html/Lushtest/Foundation/ucwords(strtolower($lushcolordown)).PNG";?>" alt="Foundation for you" width="100" height="150">
</a>
<?php
//echo "<br>";
echo $lushcolordown;
?>
<a href="suggested_product.php?phpvar=<?php echo $lushcolorup;?>">
<img src="<?php echo "/var/www/html/Lushtest/Foundation/ucwords(strtolower($lushcolorup)).PNG";?>" alt="Foundation for you" width="100" height="150">
</a>
<?php
//echo "<br>";
echo $lushcolorup;
?>
</body>
</html>
