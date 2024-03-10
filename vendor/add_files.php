<?php
session_start();
$connect = mysqli_connect('26.15.252.141', 'eshkere', 'eshkere', 'test');
$imageData = file_get_contents($_FILES['filename']['tmp_name']);
$imageData = $connect->real_escape_string($imageData); // Экранирование данных изображения
$user_id = $_SESSION['user']['id'];
$title = $_POST['title'];
$tags = !empty($_POST['tags']) ? $_POST['tags'] : null; // Проверка на пустое значение
$album = !empty($_POST['album']) ? $_POST['album'] : null;
$private = $_POST['private'];



$sql = "INSERT INTO files (user_id, tags, private, image, name) VALUES ('$user_id',  '$tags', '$private', '$imageData' , '$title')";

if ($connect->query($sql) === TRUE) {
    header('Location: ../profile.php');
} else {
    header('Location: ../adding_files.php');
}
?>