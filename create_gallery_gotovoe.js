document.getElementById("create-gallery-form").addEventListener("submit", function(event) {
  event.preventDefault(); // отменяем действие по умолчанию

  var galleryName = document.getElementById("gallery-name").value; // получаем название галереи

  // отправляем запрос на сервер для создания галереи
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "create_gallery.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // галерея создана успешно, обновляем список галерей на главной странице
      loadGalleries();
    }
  };
  xhr.send("gallery_name=" + galleryName);
});