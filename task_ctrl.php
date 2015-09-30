<html>
        <head>
                <title>Manage task</title>
        </head>
        <body>
                <h1>Manage task</h1>

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
                $subix = $_GET["subix"];
                $result = $conn->query("select * from deptree where username='$username' and ix='$ix' and subix='$subix'");

                if(!$result){
?>
                <p>Could not query <b><?php echo($username) ?></b>'s projects.</p>
                <p><?php echo($conn->error); ?></p>
                <p><a href="index.html">Go back home</a></p>
<?php
                } else {
?>
                <p>Query successful.</p>
                <h2>Create a new subtask for this task</h2>
                <form action="new_subtask.php?ix=<?php echo($ix); ?>&subix=<?php echo($subix); ?>" method="post">
                        <p><label>Task title: <input type="text" name="title"></label></p>
                        <p><label>Description: <textarea name="description"></textarea></label></p>
                        <p><input type="submit" value="Create"></p>
                </form>
<?php
                        if($result->num_rows > 0){
                                while ($row = mysqli_fetch_array($result)) {
?>
                <table border="1"><tr><td>
                        <p><b><?php echo($row["title"]); ?></b></p>
                        <p><a href="pomodoro.php?ix=<?php echo($ix); ?>&subix=<?php echo($subix); ?>" method="post">Start a pomodoro</a></p>
                        <p><pre><?php echo($row["description"]); ?></pre></p>
                </td></tr></table>
<?php
                                }
                        } else {
?>
                <p>No tasks found.</p>
<?php
                        }
                }

# Display pomodori for this task

                $result = $conn->query("select * from pomodoro where username='$username' and ix='$ix' and subix='$subix'");

                if(!$result){
?>
                <p>Could not query <b><?php echo($username) ?></b>'s pomodori.</p>
                <p><?php echo($conn->error); ?></p>
                <p><a href="index.html">Go back home</a></p>
<?php
                } else {
?>
                <p>Query successful.</p>
                <h2>Pomodori for this task</h2>
<?php
                        if($result->num_rows > 0){
                                while ($row = mysqli_fetch_array($result)) {
?>
                <p><b>Start:</b> <?php echo($row["start"]); ?></p>
                <p><b>Finish:</b> <?php echo($row["finish"]); ?></p>
                <p>Report:</p>
                <p><pre><?php echo($row["report"]); ?></pre></p>
<?php
                                }
                        } else {
?>
                <p>No pomodori found.</p>
<?php
                        }
                }
?>
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
