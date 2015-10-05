<html>
        <head>
                <title>Delete task</title>
        </head>
        <body>
                <h1>Delete task</h1>
<?php
# TODO
#       _ 

session_start();
if(isset($_SESSION["valid_user"])){
        $username = $_SESSION["valid_user"];
?>
                <p>Delete pomodoro</p>
<?php
        $conn = new mysqli('localhost', 'pomodori_user', 'tomatoes', 'pomodori');

        if(mysqli_connect_error()){
?>
                <p>Could not connect to database</p>
                <p><?php echo(mysqli_connect_error()); ?></p>
<?php
        } else {
?>
                <p>Connection with database successful</p>
<?php
                $ix = $_GET["ix"];
                $query = ""
                        . "delete from projects where ix = '$ix' and username = '$username'; "
                        . "delete from deptree where ix = '$ix' and username = '$username'; "
                        . "delete from pomodoro where ix = '$ix' and username = '$username'; "
                ;
                $result = $conn->multi_query($query);

                if(!$result){
?>
                <p>Query failed</p>
                <p><?php echo($conn->error); ?></p>
<?php
                } else {
?>
                <p>Project deleted.</p>
                <a href="proj_ctrl.php?ix=<?php echo("$ix"); ?>">Back to project management</a>
<?php
                }
        }
} else {
?>
                <p>You are not logged in.</p>
                <p><a href="index.html">Go back home</a></p>
<?php
}
?>
        </body>
</html>
