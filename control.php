<html>
        <head>
                <title>Control panel</title>
        </head>
        <body>
                <h1>Control panel</h1>
<?php
session_start();
if(isset($_SESSION["valid_user"])){
        $username = $_SESSION["valid_user"];
?>
                <p><a href="">New project</a> | <a href="log_out.php">Log out</a></p>
                <p><b><?php echo($username) ?></b>'s projects:</p>
<?php
} else {
?>
                <p>You are not logged in.</p>
<?php
}
?>
        </body>
</html>
