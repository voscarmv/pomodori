<?php

?>
	<h1>Registration</h1>
<?php

# Naive sign-up
#	TODO
#	_ Add password encryption
#	_ Sanitize incoming strings
#	_ Verify existence of user before registering
#	_
 
$username = $_POST["username"];
$password = $_POST["password"];

?>
	<p>
<?php

$conn = new mysqli('localhost', 'pomodori_user', 'tomatoes', 'pomodori');
if(!$conn){
?>
	<p>Could not connect to database</p>
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
<?php
} else {
?>
	<p>User <b><?php echo $username ?></b> registration successful</p>
<?php
}

?>
