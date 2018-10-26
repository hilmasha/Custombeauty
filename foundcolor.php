<?php 
$lushcolor=ucwords(strtolower('BROWN SUGAR'));
echo "/var/www/html/Lushtest/Foundation/$lushcolor.PNG";
?>

<html>
<h2>Your Match</h2>
<a href="suggested_product.php?phpvar=<?php echo $lushcolor; ?>">
    <img src="<?php 
$lushcolor=ucwords(strtolower('BROWN SUGAR'));
echo "../Lushtest/Foundation/$lushcolor.PNG";
?>
" alt="Foundation for you" width="100" height="150">
</a>
</html>