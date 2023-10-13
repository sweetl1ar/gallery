<?php
require_once('db.php');
session_start();
$user_id = $_SESSION['user_id'];
$name = $_POST['name'];
$price = $_POST['price'];

if (isset($_FILES['image'])) {
  $image_name = $_FILES['image']['name'];
  $image_tmp = $_FILES['image']['tmp_name'];
  $image_path = 'uploads/' . $image_name;
  move_uploaded_file($image_tmp, $image_path);

  $stmt = $conn->prepare("INSERT INTO photos (user_id, name, price, image_path) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("isds", $user_id, $name, $price, $image_path);
  $stmt->execute();
  $photo_id = $stmt->insert_id;

  if (!empty($_POST['comment'])) {
    $comment = $_POST['comment'];
    $stmt = $conn->prepare("INSERT INTO reviews (user_id, photo_id, comment) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $user_id, $photo_id, $comment);
    $stmt->execute();
  }

  header('Location: gallery.php');
  exit();
}
?>