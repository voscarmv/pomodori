<html>
        <head>
                <title>Delete project</title>
        </head>
        <body>
                <h1>Delete project</h1>
<?php
# TODO
#       _ 

session_start();
if(isset($_SESSION["valid_user"])){
        $username = $_SESSION["valid_user"];
?>
                <p>Delete project</p>
<?php
        $conn = new mysqli('mysql12.000webhost.com','a7915442_pomodor','70m47035','a7915442_pomodor');

        if(mysqli_connect_error()){
?>
                <p>Could not connect to database</p>
                <p><?php echo(mysqli_connect_error()); ?></p>
<?php
        } else {
?>
                <!-- <p>Connection with database successful</p> -->
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
                <a href="control.php">Back to control panel</a>
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
