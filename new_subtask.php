<html>
        <head>
                <title>New subtask</title>
        </head>
        <body>
                <h1>New subtask</h1>
<?php
# TODO
#       _ Change to add task, not project
#       _

session_start();
if(isset($_SESSION["valid_user"])){
        $username = $_SESSION["valid_user"];
?>
                <p>Add a subtask</p>
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
                $ix = $_GET["ix"];
                $subix = $_GET["subix"];
                $query = ""
                        ."lock table deptree write;"
                        ."select @myleft := lft from nested_category"
                        ."where ix = '$ix' and subix = '$subix' and username = '$username';"
                        ."update deptree set rgt = rgt + 2 where rgt > @myleft;"
                        ."update deptree set lft = lft + 2 where lft > @myleft;"
                        ."insert into deptree values ('$ix', 0, '$username', '$title', '$description', false, @myleft + 1, @myleft + 2);"
                        ."unlock tables;"
                ;
                $result = $conn->multi_query($query);

                if(!$result){
                ?>
	                        <p>Query failed</p>
                                <p><?php echo($conn->error); ?></p>
                <?php
                } else {
                ?>
                                <p>New task added</p>
                                <p><b><?php echo($title); ?></b></p>
                                <p><pre><?php echo($description); ?></pre></p>
                                <a href="proj_ctrl.php?ix=<?php echo("$ix"); ?>">Back to project management</a>
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
