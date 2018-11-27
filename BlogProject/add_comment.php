<?php
//connect to database
require_once ("database.php");
//get the values from te form
$postID = filter_input(INPUT_POST, "postID");
if (!isset($postID)) 
{
    echo "cannot add comment";
}
$content = filter_input(INPUT_POST, "Content");
$username = filter_input(INPUT_POST, "Username");
//run the insert query
$insertQuery = "INSERT INTO comments (postID, Content, Username) "
        . "VALUES (:np_postID, :np_content, :np_username)";
$statement = $db -> prepare($insertQuery);
$statement -> bindValue(":np_postID", $postID);
$statement -> bindValue(":np_content", $content);
$statement -> bindValue(":np_username", $username);
$statement -> execute();
$statement -> closeCursor();

include 'user_post.php';