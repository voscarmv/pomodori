<html>
        <head>
                <title>New project</title>
        </head>
        <body>
                <h1>New project</h1>
<?php
# TODO
#       _ Forbid empty strings
#       _
session_start();
if(isset($_SESSION["valid_user"])){
        $username = $_SESSION["valid_user"];
?>
                <p>Add a project</p>
<?php
        $title = $_POST["title"];
        $description = $_POST["description"];

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
                $result = $conn->query("insert into projects values ('$username', 0, '$title', '$description')");

                if(!$result){
                ?>
	                        <p>Query failed</p>
                                <p><?php echo($conn->error); ?></p>
                <?php
                } else {
                ?>
                                <p>New project added</p>
                                <p><b><?php echo($title); ?></b></p>
                                <p><pre><?php echo($description); ?></pre></p>
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
