<html>
        <head>
                <title>Manage project</title>
        </head>
        <body>
                <h1>Manage project</h1>

<?php
# TODO
#       _ Use composite auto_increment trigger for table projects
#       _

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
                $result = $conn->query("select * from projects where username='$username' and ix='$ix'");

                if(!$result){
                ?>
                <p>Could not query <b><?php echo($username) ?></b>'s projects.</p>
                <p><?php echo($conn->error); ?></p>
                <p><a href="index.html">Go back home</a></p>
                <?php
                } else {
                ?>
                <p>Query successful.</p>
                <?php
                        if($result->num_rows > 0){
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                <p><b><?php echo($row["title"]); ?></b></p>
                <p><pre><?php echo($row["description"]); ?></pre></p>
                                <?php
                                }
                        } else {
                        ?>
                <p>No matching projects found.</p>
                        <?php
                        }
                ?>
                <p><a href="control.php">Go back to control panel</a></p>                
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
