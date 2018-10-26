<?php include('session.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="drop_menu.css">
	<title>Your Home Page</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>

<div id="profile">
<b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
<b id="logout" ><a href="logout.php">Log out</a></b>
</div>

<hr color="#FFFFFF" />

<div class="dropdown" style="margin:0 auto;" >
<button class="dropbtn">Update</button >
<div class="dropdown-content" >
	<a href="employee_insert.php">Product Stock</a>
	<a href="division_add.php">PO Status</a>
	</div>
</div>

<div class="dropdown" style="margin:0 auto;">
<button class="dropbtn">VIEW</button>
<div class="dropdown-content" >
	<a href="select_case.php">Purchase Orders</a>
	</div>
</div>



</body>
</html>