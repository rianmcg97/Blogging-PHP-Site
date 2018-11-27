<?php
require_once ("database.php");
$query = "Select * from user";
$statement = $db -> prepare($query);
$statement -> execute();
$user_array = $statement -> fetchAll();
$statement -> closeCursor();

    session_start();

if(!isset($_SESSION['user_session']))
{
	header("Location: login.php");
}

include_once 'database.php';

$stmt = $db->prepare("SELECT * FROM user WHERE Username = :Username");
$stmt->execute(array(":Username"=>$_SESSION['user_session']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
       <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/Main.css" rel="stylesheet" type="text/css"/>
    </head>
    <body class="w3-white">
        <nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center w3-red">
            <!-- Avatar image in top left corner -->
    <img src="avatars/<?php echo $row["Avatar"]?>" style="width:100%">
  <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-hover-white">
    <i class="fa fa-home w3-xxlarge"></i>
    <p>HOME</p>
  </a>
  <a href="#about" class="w3-bar-item w3-button w3-padding-large w3-hover-white">
    <i class="fa fa-user w3-xxlarge"></i>
    <p>ABOUT</p>
  </a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-hover-white">
    <i class="fa fa-pencil w3-xxlarge"></i>
    <p>ADD A BLOG</p>
  </a>
  <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hover-white">
    <i class="fa fa-envelope w3-xxlarge"></i>
    <p>CONTACT</p>
  </a>
    <p>&copy; <?php echo date("Y"); ?> The Bloggers.</p>
</nav>
        <div class="w3-padding-large" id="main">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-32 w3-center w3-white" id="home">
    <h1 class="w3-jumbo"><span class="w3-hide-small"></span>Add a Post</h1>
    <form action="add_post.php" id="add_post" name="add_post" method="POST">
        <label for="Username">User:</label>      
        <select name="Username"> 
                    <option>
                    <?php echo $row["Username"];  ?>
                    </option>
        </select>
                <br/><br>
                <label for="Title">Title:</label>
                <input type="text" id="Title" name="Title"/> <br> <br>               
                <label for="content">Content:</label><br>
                <textarea cols="50" rows="4" name="content"></textarea> <br>
                <br>
                <label for="Tags">Tags:</label>
                <input type="text" id="Tags" name="Tags"/>
                <input type="submit" id="add" value="Post"/>
                
            </form>
    </body>
</html>
