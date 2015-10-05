<html>
        <head>
                <title>Delete task</title>
        </head>
        <body>
                <h1>Delete task</h1>
<?php
# TODO
#       _ 

session_start();
if(isset($_SESSION["valid_user"])){
        $username = $_SESSION["valid_user"];
?>
                <p>Delete pomodoro</p>
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
                $query = ""
                        ."lock table deptree write, pomodoro write; "
                        ."        select "
                        ."                @mylft := lft, "
                        ."                @myrgt := rgt, "
                        ."                @mywdt := rgt - lft + 1 "
                        ."                from deptree  "
                        ."                where ix = '$ix' "
                        ."                and subix = '$subix' "
                        ."                and username = '$username' "
                        ."        ; "
                        ."        delete "
                        ."                from pomodoro "
                        ."                using deptree inner join pomodoro "
                        ."                where deptree.lft between @mylft and @myrgt "
                        ."                and pomodoro.ix = deptree.ix "
                        ."                and pomodoro.subix = deptree.subix "
                        ."                and pomodoro.username = deptree.username "
                        ."        ; "
                        ."        delete "
                        ."                from deptree "
                        ."                where lft between @mylft and @myrgt "
                        ."        ; "
                        ."        update "
                        ."                deptree "
                        ."                set rgt = rgt - @mywdt "
                        ."                where rgt > @myrgt "
                        ."        ; "
                        ."        update "
                        ."                deptree "
                        ."                set lft = lft - @mywdt "
                        ."                where lft > @myrgt "
                        ."        ; "
                        ."unlock tables; "
                ;
                $result = $conn->multi_query($query);

                if(!$result){
?>
                <p>Query failed</p>
                <p><?php echo($conn->error); ?></p>
<?php
                } else {
?>
                <p>Task deleted along with corresponding subtasks and pomodori.</p>
                <a href="control.php">Back to project management</a>
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
