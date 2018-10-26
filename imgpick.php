<html>
<?php
session_start();
if (!isset($_SESSION['views'])) { //check if this page has been visited
    $_SESSION['views'] = 0; //if no initialize
}
$_SESSION['views'] = $_SESSION['views']+1; //increment upon visit i.e going back or refresh

if (!isset($_SESSION['view2'])) { //initiaize view count for next page
    $_SESSION['view2'] = 0;
}
?>
<body>
<link href="face_popup.css" rel="stylesheet" type="text/css">
<form action="" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
<?php
//echo '<a href="testsession.php?link">Find Match</a>'; //link to get to next page i.e bathbomb making or foundation stuff

//storing image on server for further processing
$target_dir = "/var/www/html/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
//move image from temporary php storage to server
    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "$target_dir".$_FILES["fileToUpload"]["name"])){
        echo "uploaded";
        $type ='image/jpeg';
        $imgdir= "$target_dir".$_FILES["fileToUpload"]["name"];
//rename image to face2
        $newname="/var/www/html/face2.jpg";
        rename($imgdir, $newname) or die("Unable to rename $imgdir to $newname.");//http://www.kavoir.com/2009/04/php-copying-renaming-and-moving-a-file.html
        //header('Content-Type:'.$type);
        //header('Content-Length: ' . filesize($file));
        //readfile($newname);
        header("Location: Getlushcolor.php");//redirects to page to process face and get best lush shade
        exit;
    }
    else{
        echo "file was not uploaded";
    }
}
?>
</body>
</html>

