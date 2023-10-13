<?php
// подключение к базе данных
$servername = "localhost";
$username = "timkhv8w_bd";
$password = "HTkKsY11";
$dbname = "timkhv8w_bd";

$conn = new mysqli($servername, $username, $password, $dbname);

// получение списка галерей из базы данных
$sql = "SELECT * FROM galleries";
$result = $conn->query($sql);

// отображение списка галерей на главной странице
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<a href='" . $row["path"] . "'>" . $row["name"] . "</a><br>";
  }
} else {
  echo "No galleries found.";
}

$conn->close();
?>