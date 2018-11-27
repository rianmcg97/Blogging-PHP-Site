<?php
    require_once ("database.php");
    //write the query
    $query = "SELECT * from user ORDER BY Username";
    //sanitizing the query
    $statement = $db -> prepare($query);
    //executing the query
    $statement->execute();
    //fetch the results
    $users = $statement->fetchAll();
    //print_r($categories);
    $statement->closeCursor();
    
    $username = filter_input(INPUT_GET, "Username");
    
    $query1 = "SELECT * from comments ORDER BY postID";
    //sanitizing the query
    $statement1 = $db -> prepare($query1);
    //executing the query
    $statement1->execute();
    //fetch the results
    $comment = $statement->fetchAll();
    //print_r($categories);
    $statement->closeCursor();
    
    $postID = filter_input(INPUT_GET, "postID");
    
    $queryTable = "SELECT * from posts WHERE Username = :Username ORDER BY postID";
    $statement2 = $db ->prepare($queryTable);
    $statement2->bindValue(":Username", $username);
    $statement2->execute();
    $posts = $statement2->fetchAll();
    $statement2->closeCursor();
    
    $query2 = "SELECT * from comments WHERE postID = :postID";
    $statement3 = $db ->prepare($query2);
    $statement3->bindValue(":postID", $postID);
    $statement3->execute();
    $comments = $statement3->fetchAll();
    $statement2->closeCursor();
    
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
  <a href="add_post_form.php" class="w3-bar-item w3-button w3-padding-large w3-hover-white">
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
    <h2 class="w3-jumbo"><span class="w3-hide-small"></span><?php echo $username;?>'s Blogs</h2>
    
    
        <?php
        foreach ($posts as $p) :
            ?>
  
   
        
        <h3> <?php echo $p["Title"];?></h3><span><br>Created <?php echo $p["date"];?></span>
        <p><?php echo $p["content"];?></p>
        
        <form action="add_comment.php" id="add_comment" name="add_comment" method="POST">
            <input type="hidden" name="postID" value="<?php echo $p["postID"];?>"/>
        <label for="Username">User:</label>      
        <select name="Username"> 
                    <option>
                    <?php echo $p["Username"];  ?>
                    </option>
        </select><br>               
                <label for="Content">Comment:</label><br>
                <textarea cols="50" rows="4" name="Content"></textarea> <br>
                <input type="submit" id="comment" value="Post"/>
                
            </form>
        <?php endforeach;?>
        <?php foreach ($comments as $c) :
            ?>
        <p><?php echo $c["Content"];?> by <?php echo $c["Username"];?></p>
        <?php
        endforeach;
        ?>
        
    </body>
    
</html>
