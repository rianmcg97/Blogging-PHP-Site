<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>BlogSite</title>
        <link href="css/Main.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <header><h1>Bloggers  \</h1></header>
        <main>
            <h1>Database error</h1>
            <p>There was an error connecting to your database.</p>
            <p>Check that the database is installed &amp; named correctly!</p>
            <p>Error message: <?php echo $error_message; ?></p>
        </main>
        <footer>
            <p>&copy; <?php echo date("Y"); ?> Bloggers inc.</p>
        </footer>
    </body>
</html>



