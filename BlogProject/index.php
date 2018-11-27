<?php
 if (!isset($userID)) {
        $userID = filter_input(INPUT_GET, "userID", FILTER_VALIDATE_INT);
        if ($userID == NULL || $userID == FALSE) {
            $userID = 1;
        }
    }
    
    if (!isset($postID)) {
        $postID = filter_input(INPUT_GET, "postID", FILTER_VALIDATE_INT);
        if ($postID == NULL || $postID == FALSE) {
            $postID = 1;
        }
    }
    
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

    $queryUser = "SELECT * from user WHERE Username = :Username";
    $statement1 = $db ->prepare($queryUser);
    $statement1->bindValue(":Username", $username);
    $statement1->execute();
    $user = $statement1->fetch();
    $email = $user["Email"];
    $avatar = $user["Avatar"];
    $statement1->closeCursor();
    
    $queryPost = "SELECT * from posts WHERE postID = :postID";
    $statement3 = $db ->prepare($queryPost);
    $statement3->bindValue(":postID", $postID);
    $statement3->execute();
    $post = $statement1->fetch();
    $title = $post["Title"];
    $content = $post["content"];
    $tags = $post["tags"];
    $statement3->closeCursor();

    $queryTable = "SELECT * from posts WHERE Username = :Username";
    $statement2 = $db ->prepare($queryTable);
    $statement2->bindValue(":Username", $username);
    $statement2->execute();
    $posts = $statement2->fetchAll();
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
        <!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center w3-red">
    <!-- Avatar image in top left corner -->
    <img src="avatars/<?php echo $row["Avatar"]?>" style="width:100%">
  
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-hover-white">
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

<!-- Navbar on small screens (Hidden on medium and large screens) -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
    <a href="#" class="w3-bar-item w3-button" style="width:25% !important">HOME</a>
    <a href="#" class="w3-bar-item w3-button" style="width:25% !important">ABOUT</a>
    <a href="add_post_form.php" class="w3-bar-item w3-button" style="width:25% !important">Post to Page</a>
    <a href="#contact" class="w3-bar-item w3-button" style="width:25% !important">CONTACT</a>
  </div>
</div>

<!-- Page Content -->
<div class="w3-padding-large" id="main">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-32 w3-center w3-white" id="home">
    <h1 class="w3-jumbo"><span class="w3-hide-small">Hi <?php echo $row["Username"] ?></span> Welcome To The Bloggers Page</h1>

        
            <hr>
            <a href="logout.php" class="btn btn-warning"><i class="fa fa-sign-out" aria-hidden="true"></i> &nbsp;Sign Out</a></li>
    </div>

    <script src="https://use.fontawesome.com/ee309940e2.js"></script>

        
              
      </div>
      <!-- About Section -->
  <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
      <h1 class="w3-text-black">The Bloggers:</h1><br>
    <hr style="width:200px" class="w3-opacity">
                  
                
                    
                   
                        <?php
                        foreach ($users as $u):
                        ?>
    <h2><li><a class="w3-text-black" href="user_post.php?Username=<?php echo $u["Username"];?>"><?php echo $u["Username"];?> <?php echo $post["Title"];?></a>
            <img src="avatars/<?php echo $u["Avatar"];?>" id="avatar" style="width:50px" style="height: 50px" />   
        </li></h2>
                        <?php
                        endforeach;
                        ?>
                                       
                
 
            <section>
                <br>
                <br>                
            </section>
    </body>
</html>
