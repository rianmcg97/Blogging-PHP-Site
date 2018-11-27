<?php 
require_once ("database.php");

$username = filter_input(INPUT_POST, "Username");
if(!isset($username)){
    include ("registration.php");
    exit();
}

$email = filter_input(INPUT_POST, "Email");
if(!isset($email)){
    include ("registration.php");
    exit();
}

$password = filter_input(INPUT_POST, "Password");
if(!isset($password)){
    include ("registration.php");
    exit();
}

$target_dir = "avatars/";
print_r($_FILES);
$target_file = $target_dir . basename($_FILES["Avatar"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["register"])) {
    $check = getimagesize($_FILES["Avatar"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["Avatar"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["Avatar"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


$insertQuery = "INSERT INTO user (Username, Email, Password, Avatar)"
        . " VALUES (:np_username, :np_email, :np_password, :np_avatar)";

$statement = $db -> prepare($insertQuery);
$statement -> bindValue(":np_username", $username);
$statement -> bindValue(":np_email", $email);
$statement -> bindValue(":np_password", $password);
$statement -> bindValue(":np_avatar", basename( $_FILES["Avatar"]["name"]));
$statement -> execute();
$statement -> closeCursor();
include 'home.php';
?>



