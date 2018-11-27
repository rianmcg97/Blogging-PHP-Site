<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/Main.css" rel="stylesheet" type="text/css"/>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
        <script src="./js/register.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body>
        <div class="container-fluid">
        <div class="row content">
        <div class="col-sm-3 sidenav">
            <h1>Registration</h1>
            <form action="add_user.php" id="register_user" name="register_user" method="POST" enctype="multipart/form-data">
                <label for="username">Enter a Username:</label>
                <input type="text" id="username" name="Username" required="">
                <span>*</span><br><br>
                <label for="email">Enter an Email Address:</label>
                <input type="text" id="email" name="Email" required="">
                <span>*</span><br><br>
                <label for="password1">Enter a Password:</label>
                <input type="password" id="password1" name="Password" required="">
                <span>*</span><br><br>
                <label for="password2">Confirm Password:</label>
                <input type="password" id="password2" required="">
                <span>*</span><br><br>
                <label>Select your Avatar</label>
    <input type="file" name="Avatar" id="Avatar"><br>
                <br>
                <input type="submit" id="register" name="register" value="Register">
            </form>
    </body>
</html>
