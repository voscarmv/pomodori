<html>
        <head>
                <title>Log out</title>
        </head>
        <body>
                <h1>Log out</h1>
<?php
session_start();
if(isset($_SESSION["valid_user"])){
        $username = $_SESSION["valid_user"];
        unset($_SESSION['valid_user']);
        session_destroy();
?>
                <p>User <b><?php echo($username); ?></b> has been logged out.</p>
<?php
} else {
?>
                <p>You are not logged in.</p>
<?php
}
?>

                <p><a href="index.html">Go back home</a></p>
        </body>
</html>
