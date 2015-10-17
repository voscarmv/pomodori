<html>
        <head>
                <title>New pomodoro</title>
        </head>
        <body>
                <h1>New pomodoro</h1>
<?php
# TODO
#       _ 

session_start();
if(isset($_SESSION["valid_user"])){
        $username = $_SESSION["valid_user"];
?>
                <p>Add a subtask</p>
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
                <!-- <p>Connection with database successful</p> -->
<?php
                $ix = $_GET["ix"];
                $subix = $_GET["subix"];
                $start = $_POST["start"];
                $finish = date('Y-m-d H:i:s');
                $report = $_POST["report"];
                $query = "insert into pomodoro values ('$ix', '$subix', 0, '$username', '$start', '$finish', '$report')";
                $result = $conn->query($query);

                if(!$result){
?>
                <p>Query failed</p>
                <p><?php echo($conn->error); ?></p>
<?php
                } else {
?>
		<table border="1"><tr><td>
                        <p><b>Start:</b> <?php echo($start); ?></p>
                        <p><b>Finish:</b> <?php echo($finish); ?></p>
                        <p>Report:</p>
                        <p><pre><?php echo($report); ?></pre></p>
		</td></tr></table>
                <p><a href="task_ctrl.php?ix=<?php echo("$ix"); ?>&subix=<?php echo("$subix"); ?>">Back to task management</a></p>
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
