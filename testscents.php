<?php
$connection = mysqli_connect("172.31.89.58", "lush", "admin", "custombeauty", 3306);
$query = "SELECT essential_oil_stock FROM essential_oils_stock WHERE essential_oil_name = "Lavender";
$ses_sql=mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($ses_sql)){;
    $bb_scent=$row['essential_oil_name'];
    echo ' <div>
        <a class="fragment" href="'. $bb_scent . '">
    </div>';
 echo $bb_scent;
}
mysqli_close($connection); // Closing Connection

?>