<?php
session_start();
require "connect.php";
$imageData = file_get_contents($_FILES['filename']['tmp_name']);
$imageData = $connect->real_escape_string($imageData); // Экранирование данных изображения
$user_id = $_SESSION['user']['id'];
$title = $_POST['title'];
$tags = !empty($_POST['tags']) ? $_POST['tags'] : null; // Проверка на пустое значение
$album = !empty($_POST['album']) ? $_POST['album'] : null;
$private = $_POST['private'];

$sql = "SELECT album_id FROM files WHERE user_id = '$user_id'";
$result = $connect->query($sql);
$row = $result->fetch_assoc();
$current_album_id = json_decode($row['album_id'], true); // Добавляем параметр true для преобразования в ассоциативный массив

// Перезаписываем текущий массив новым значением
$current_album_id = [$album];

// Преобразуем массив обратно в JSON
$new_album_id = json_encode($current_album_id);
// Вставляем новую запись с обновленным album_id
$sql_insert = "INSERT INTO files (user_id, tags, private, image, name, album_id) VALUES ('$user_id', '$tags', '$private', '$imageData', '$title', '$new_album_id')";

if ($connect->query($sql_insert) === TRUE) {
    header('Location: ../profile.php');
} else {
    header('Location: ../adding_files.php');
}
?>
