<html>
        <head>
                <title>New project</title>
        </head>
        <body>
                <h1>New project</h1>
<?php
session_start();
if(isset($_SESSION["valid_user"])){
        $username = $_SESSION["valid_user"];
?>
                <p>Add a project</p>
<?php
} else {
?>
                <p>You are not logged in.</p>
                <p><a href="index.html">Go back home</a></p>
<?php
}
?>
        </body>
</html>
