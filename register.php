<?php
require_once('db.php');
$login = $_POST['name'];
$email = $_POST['mail'];
$password = $_POST['pass'];

if (empty($login) || empty($email) || empty($password)) {
    // echo "chet sovpalo";
} else {
    $sql = "INSERT INTO users (login, email, password) VALUES ('$login', '$email', '$password')";
    if ($conn -> query($sql) === TRUE) {
        /*echo "rega uspehna";*/	
	}
	else {
		/*echo "oshibka" . $conn->error;*/
	}

} ?>