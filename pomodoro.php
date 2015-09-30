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
                        $start = date('Y-m-d H:i:s');
?>
                <p>Query successful.</p>
                <h2>Do a pomodoro for this task</h2>
                <p>This pomodoro started at <?php echo($start); ?></p>
                <form action="new_pomodoro.php?ix=<?php echo($ix); ?>&subix=<?php echo($subix); ?>" method="post">
                        <p><label>Report: <textarea name="report"></textarea></label></p>
                        <p><input type="submit" value="Finish"></p>
                        <input type="hidden" name="start" value="<?php echo($start); ?>">
                </form>
<?php
                        if($result->num_rows > 0){
                                while ($row = mysqli_fetch_array($result)) {
?>
                <table border="1"><tr><td>
                        <p><b><?php echo($row["title"]); ?></b></p>
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
