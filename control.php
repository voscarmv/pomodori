<html>
        <head>
                <title>Control panel</title>
        </head>
        <body>
                <h1>Control panel</h1>
<?php
# TODO
#       _ Use composite auto_increment trigger for table projects
#       _

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
                $result = $conn->query("select * from projects where username='$username'");

                if(!$result){
?>
                <p>Could not query <b><?php echo($username) ?></b>'s projects.</p>
                <p><?php echo($conn->error); ?></p>
                <p><a href="index.html">Go back home</a></p>
<?php
                } else {
?>
                <!-- <p>Query successful.</p> -->
                <h2>Create a new project</h2>
                <form action="new_project.php" method="post">
                        <p><label>Project title: <input type="text" name="title"></label></p>
                        <p><label>Description: <textarea name="description"></textarea></label></p>
                        <p><input type="submit" value="Create"></p>
                </form>

                </td><td>

                <h2>Current projects</h2>
                <p><b><?php echo($username) ?></b>'s projects:</p>
<?php
                        if($result->num_rows > 0){
                                while ($row = mysqli_fetch_array($result)) {
?>
		<p><table border="1"><tr><td>
		        <p><b><a href="proj_ctrl.php?ix=<?php echo($row["ix"]); ?>"><?php echo($row["title"]); ?></a></b></p>
		        <p><pre><?php echo($row["description"]); ?></pre></p>
		</td></tr></table></p>
<?php
                                }
                        } else {
?>
                <p>There are no projects.</p>
<?php
                        }
                }
        }
} else {
?>
                <p>You are not logged in.</p>
<?php
}
?>

                </td></tr></table>

                <p><a href="index.html">Go back home</a></p>
        </body>
</html>
