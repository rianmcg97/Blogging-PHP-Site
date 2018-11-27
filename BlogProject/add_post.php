<?php
//connect to database
require_once ("database.php");
//get the values from te form
$username = filter_input(INPUT_POST, "Username");
if (!isset($username)) 
{
    include("add_post_form.php");
    exit();
}
$title = filter_input(INPUT_POST, "Title");
$content = filter_input(INPUT_POST, "content");
$tags = filter_input(INPUT_POST, "Tags");
//run the insert query
$insertQuery = "INSERT INTO posts (Username, Title, content, Tags) "
        . "VALUES (:np_Username, :np_Title, :np_content, :np_Tags)";
$statement = $db -> prepare($insertQuery);
$statement -> bindValue(":np_Username", $username);
$statement -> bindValue(":np_Title", $title);
$statement -> bindValue(":np_content", $content);
$statement -> bindValue(":np_Tags", $tags);
$statement -> execute();
$statement -> closeCursor();
include 'home.php';
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->



