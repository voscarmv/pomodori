<html>
        <head>
                <title>Mark task as pending</title>
        </head>
        <body>
                <h1>Mark task as pending</h1>
<?php
# TODO
#       _ 

session_start();
if(isset($_SESSION["valid_user"])){
        $username = $_SESSION["valid_user"];
?>
                <p>Mark task as pending</p>
<?php
        $title = $_POST["title"];
        $description = $_POST["description"];

        $conn = new mysqli('mysql12.000webhost.com','a7915442_pomodor','70m47035','a7915442_pomodor');

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
                $subix = $_GET["subix"];
                $query = "update deptree set done=false where ix='$ix' and subix='$subix'";
                $result = $conn->query($query);

                if(!$result){
?>
                <p>Query failed</p>
                <p><?php echo($conn->error); ?></p>
<?php
                } else {
?>
                <p>Task marked as pending</p>
                <a href="task_ctrl.php?ix=<?php echo("$ix"); ?>&subix=<?php echo("$subix"); ?>">Back to task management</a>
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
