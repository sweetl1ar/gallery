<?php
require_once('db.php');
$login = $_POST['name'];
$email = $_POST['mail'];
$password = $_POST['pass'];

if (empty($login) || empty($password)) {
    
} else {
    $sql = "SELECT * FROM 'users' WHERE login = '$login', password = '$password'";
    $result = $conn -> query($sql);
    if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
            header('Refresh:1; url = http://timkhv8w.beget.tech/gallery.html');
        }
    } else {
        /**/
    }	
}
?>