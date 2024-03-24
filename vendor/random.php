<?php
require "vendor/connect.php";

$random_user_query = mysqli_query($connect, "SELECT * FROM `users` ORDER BY RAND() LIMIT 1");
$random_user = mysqli_fetch_assoc($random_user_query);

$sql = "SELECT * FROM files WHERE user_id = " . $random_user['id'];
$result = $connect->query($sql);

$photos_array = []; // Массив для хранения данных о фотографиях
$i = 0;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($i == 4) break;
        
        $photos_array[] = base64_encode($row['image']);
        $i++;
    }

    shuffle($photos_array); // Перемешиваем массив с фотографиями

    $_SESSION['photos_for_main_page'] = $photos_array; 
    // Проверяем тип данных изображения
    if (gettype($random_user['avatar']) == 'resource') {
        // Кодируем данные для занесения в сессию
        $avatarEncoded = base64_encode(stream_get_contents($random_user['avatar']));
    } else {
        $avatarEncoded = $random_user['avatar'];
    }

    $_SESSION['random'] = [
        "id" => $random_user['id'],
        "full_name" => $random_user['full_name'],
        "avatar" => $avatarEncoded,
        "email" => $random_user['email']
    ];
}
?>
