function loadGalleries() {
  // отправляем запрос на сервер для получения списка галерей
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "get_galleries.php", true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // обновляем список галерей на главной странице
      document.getElementById("galleries-list").innerHTML = xhr.responseText;
    }
  };
  xhr.send();
}