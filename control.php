<html>
        <head>
                <title>Control panel</title>
        </head>
        <body>
                <h1>Control panel</h1>

<?php
session_start();
if(isset($_SESSION["valid_user"])){
        $username = $_SESSION["valid_user"];
?>
                <p><a href="log_out.php">Log out</a></p>
                <h2>Create a new project</h2>
                <form action="new_project.php" method="post">
                        <p><label>Project title: <input type="text" name="title"></label></p>
                        <p><label>Description: <textarea name="description"></textarea></label></p>
                        <p><input type="submit" value="Create"></p>
                </form>
                <h2>Current projects</h2>
                <p><b><?php echo($username) ?></b>'s projects:</p>
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
        }

        $result = $conn->query("select * from projects where username='$username'");

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
                        while ($row = mysqli_fetch_row($result)) {
                                echo("<p> | ");
                                foreach($row as $key => $value){
                                        echo($value);
                                        echo(" | ");
                                }
                                echo("</p>\n");
                        }
                } else {
                ?>
                        <p>There are no projects.</p>
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
