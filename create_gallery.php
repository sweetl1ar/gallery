<?php
$servername = "localhost";
$username = "timkhv8w_bd";
$password = "HTkKsY11";
$dbname = "timkhv8w_bd";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$gallery_name = $_POST["gallery-name"];

$desired_dir = "galleries/" . $gallery_name;
mkdir($desired_dir, 0700);

$sql = "INSERT INTO galleries (name, path) VALUES ('$gallery_name', '$desired_dir')";
if ($conn->query($sql) === TRUE) {
  echo "Gallery created successfully";
} else {
  echo "Error creating gallery: " . $conn->error;
}

$conn->close();
?>