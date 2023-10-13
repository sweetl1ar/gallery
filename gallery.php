<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8" />
    <title>Мои галереи</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
</head>

<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image">
        <input type="text" name="name" placeholder="Название">
        <input type="number" name="price" placeholder="Цена">
        <input type="submit" value="Загрузить">
    </form>
    
    <?php
    require_once('db.php');
    session_start();
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("SELECT * FROM photos WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
      $photo_id = $row['id'];
      $name = $row['name'];
      $price = $row['price'];
      $image_path = $row['image_path'];

      echo "<div>";
      echo "<img src=\"$image_path\">";
      echo "<h3>$name</h3>";
      echo "<p>$price руб.</p>";

      $stmt = $conn->prepare("SELECT * FROM reviews WHERE photo_id = ?");
      $stmt->bind_param("i", $photo_id);
      $stmt->execute();
      $reviews_result = $stmt->get_result();

      if ($reviews_result->num_rows > 0) {
        echo "<ul>";
        while ($review_row = $reviews_result->fetch_assoc()) {
          $comment = $review_row['comment'];
          echo "<li>$comment</li>";
        }
        echo "</ul>";
      }

      echo "</div>";
    }
    ?>
    
    <div class="gallery">
      <?php

        require_once 'db.php';

        $query = "SELECT * FROM photos WHERE user_id = 1";
        $result = mysqli_query($link, $query);

        while ($row = mysqli_fetch_assoc($result)) {
          echo '<img src="' . $row['photo_url'] . '" alt="' . $row['photo_title'] . '">';
        }
      ?>
    </div>

    <style>
      .gallery {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
      }

      .gallery img {
        width: 200px;
        height: auto;
        margin: 10px;
      }
    </style>

</body>
</html>