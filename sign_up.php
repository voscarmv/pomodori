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

$result = $conn->query("insert into users values ('$username', '$password');");

if(!$result){
?>
	        <p>Could not register user</p>
                <p><?php echo($conn->error); ?></p>
                <p><a href="index.html">Go back home</a></p>
<?php
} else {
?>
                <p>User <b><?php echo($username); ?></b> successfully registered.</p>
<?php
}
?>
        </body>
</html>
