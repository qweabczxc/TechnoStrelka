<?php
session_start();
if(isset($_GET['album_id'])) {
    $album_id = $_GET['album_id'];

    // Получаем user_id по album_id
    $sql_user_id = "SELECT user_id FROM album WHERE album_id = $album_id";
    $result_user_id = $connect->query($sql_user_id);

    if ($result_user_id->num_rows > 0) {
        $row_user_id = $result_user_id->fetch_assoc();
        $id = $row_user_id['user_id'];
    } else {
        echo "User not found for the given album.";
        exit; // Выход из скрипта, если пользователь не найден
    }

    // Запрос для выбора фотографий по album_id
    $sql = "SELECT f.* FROM files f
            WHERE JSON_CONTAINS(CAST(f.album_id AS JSON), JSON_QUOTE(CAST($album_id AS CHAR)), '$')";

} else {
    $id = $_SESSION['user']['id'];

    // Запрос для выбора фотографий по user_id
    $sql = "SELECT f.* FROM files f
            WHERE f.user_id = $id";
}

$result = $connect->query($sql);

// Выводим фотографии
while($row = $result->fetch_assoc()) {
    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" id="main_files_img">';
}
?>
