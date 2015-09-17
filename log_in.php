<?php

# Naive log-in
#       _ Use https for session security
#       _ Consider using Source/22
#       _ 

$username = $_POST["username"];
$password = $_POST["password"];

$conn = new mysqli('localhost', 'pomodori_user', 'tomatoes', 'pomodori');

if(mysqli_connect_error()){
?>
	<p>Could not connect to database</p>

<?php
} else {
?>
	<p>Connection with database successful</p>
<?php
}
