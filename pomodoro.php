<html>
        <head>
                <title>Do a pomodoro</title>
        </head>
        <body>
                <h1>Do a pomodoro</h1>

<?php
# TODO
#       _ Pure HTML timer


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
                        $start = date('Y-m-d H:i:s');
?>
                <h2>Task</h2>
<?php
                        if($result->num_rows > 0){
                                while ($row = mysqli_fetch_array($result)) {
?>
                <table border="1"><tr><td>
                        <p><b><?php echo($row["title"]); ?></b><?php echo ($row["done"] == true ? " [<i><b>DONE</b></i>]" : " [PENDING]") ?></p>
                        <p><pre><?php echo($row["description"]); ?></pre></p>
                </td></tr></table>
<?php
                                }
                        } else {
?>
                <p>No tasks found.</p>
<?php
                        }
?>
                <!-- <p>Query successful.</p> -->

                </td><td>

                <h2>Do a pomodoro for this task</h2>
                <p>This pomodoro started at <?php echo($start); ?></p>
                <iframe src="timer.php" width="200" height="120"></iframe>
                <form action="new_pomodoro.php?ix=<?php echo($ix); ?>&subix=<?php echo($subix); ?>" method="post">
                        <p><label>Report: <textarea name="report"></textarea></label></p>
                        <p><input type="submit" value="Finish"></p>
                        <input type="hidden" name="start" value="<?php echo($start); ?>">
                </form>
<?php
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
