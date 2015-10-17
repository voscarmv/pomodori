<html>
        <head>
                <title>Registration</title>
        </head>
        <body>
        	<h1>Registration</h1>
<?php

# Naive sign-up
#	TODO
#	_ Add password encryption
#	_ Sanitize incoming strings
#	_ Verify existence of user before registering
#	_ Check that username and password are not ""
#       _
 
$username = $_POST["username"];
$password = $_POST["password"];

$conn = new mysqli('mysql12.000webhost.com','a7915442_pomodor','70m47035','a7915442_pomodor');

if(mysqli_connect_error()){
?>
	        <p>Could not connect to database</p>
                <p><?php echo(mysqli_connect_error()); ?></p>
<?php
} else {
?>
	        <p>Connection with database successful</p>
<?php
        $result = $conn->query("insert into users values ('$username', '$password');");

        if(!$result){
?>
                <p>Could not register user</p>
                <p><?php echo($conn->error); ?></p>
<?php
        } else {
?>
                <p>User <b><?php echo($username); ?></b> successfully registered.</p>
<?php
        }
}
?>
                <p><a href="index.html">Go back home</a></p>
        </body>
</html>
