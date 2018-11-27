<?php
$dsn = 'mysql:host=localhost;dbname=blogsite';
$username = "root";
$password = "pa55word";


//$dsn = 'mysql:host=mysql02.comp.dkit.ie;dbname=D00197531';
//$username = "D00197531";
//$password = "iJXedZly";

try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    error_reporting(E_ALL);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo $error_message;
    include ("database_error.php");
    exit();

}

