<?php
require_once("../controllers/config.php");
//require_once("../views/profileView.php");
$picDir = HOST . USER_PICS;


$target_file = $picDir . basename($_FILES["picChange"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["picChange"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
		header("../controllers/profile.php");
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
?>