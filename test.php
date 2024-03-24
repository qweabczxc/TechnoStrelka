<?php
session_start();
require "vendor/connect.php";
?>



<?php
// $id_files = 189;
// $album_id = '["12", "1223", "321"]';

// $mysqli->query("UPDATE `files` SET `album_id` = '$album_id' WHERE `id_files` = $id_files");
// $id_files = 189;
// $new_values = '["456", "789"]';

// // Получаем текущее значение album_id
// $result = $mysqli->query("SELECT album_id FROM files WHERE id_files = $id_files");
// $row = $result->fetch_assoc();
// $current_values = json_decode($row['album_id']);

// // Добавляем новые значения в конец массива
// $new_album_id = array_merge($current_values, json_decode($new_values));

// // Обновляем запись с новым значением album_id
// $mysqli->query("UPDATE files SET album_id = '" . json_encode($new_album_id) . "' WHERE id_files = $id_files");

$hashedString = md5('zxzxzxzx');
echo $hashedString;


?>
