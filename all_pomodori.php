<html>
        <head>
                <title>All pomodori</title>
        </head>
        <body>
                <h1>All pomodori</h1>

<?php
# TODO
#       _ Correct to manage tasks, not projects
#       _ Rewrite to use nested set model for data display.
#	_

session_start();
if(isset($_SESSION["valid_user"])){
        $username = $_SESSION["valid_user"];
?>
                <p><a href="log_out.php">Log out</a></p>
                <table border="1"><tr><td>
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
                $result = $conn->query("select * from pomodoro where username='$username'");

                if(!$result){
?>
                <p>Could not query <b><?php echo($username) ?></b>'s pomodori.</p>
                <p><?php echo($conn->error); ?></p>
                <p><a href="index.html">Go back home</a></p>
<?php
                } else {
?>
                <!-- <p>Query successful.</p> -->
                <h2>Pomodori for this task</h2>
<?php
                        if($result->num_rows > 0){
                                while ($row = mysqli_fetch_array($result)) {
?>
		<p><table border="1"><tr><td>
		        <p><b>Start:</b> <?php echo($row["start"]); ?></p>
		        <p><b>Finish:</b> <?php echo($row["finish"]); ?></p>
                        <p><a href="delete_pomodoro.php?ix=<?php echo($row["ix"]); ?>&subix=<?php echo($row["subix"]); ?>&pomodoroid=<?php echo($row["pomodoroid"]); ?>">Delete this pomodoro</a></p>
		        <p>Report:</p>
		        <p><pre><?php echo($row["report"]); ?></pre></p>
		</td></tr></table></p>
<?php
                                }
                        } else {
?>
                <p>No pomodori found.</p>
<?php
                        }
                }
?>

                </td></tr></table>

                <p><a href="proj_ctrl.php?ix=<?php echo("$ix"); ?>">Back to project management</a></p>
<?php
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
