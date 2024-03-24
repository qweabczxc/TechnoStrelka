<?php
function updateOrInsertAvatar($imageData) {
    require "connect.php";

    // Проверяем, есть ли уже у пользователя аватарка
    $queryCheck = "SELECT avatar FROM users WHERE id = ?";
    $stmtCheck = $connect->prepare($queryCheck);
    $stmtCheck->bind_param("i", $_SESSION['user']['id']);
    $stmtCheck->execute();
    $result = $stmtCheck->get_result();

    if ($result->num_rows > 0) {
        // Если есть существующая аватарка, обновляем ее
        $queryUpdate = "UPDATE users SET avatar = ? WHERE id = ?";
        $stmtUpdate = $connect->prepare($queryUpdate);
        $stmtUpdate->bind_param("si", $imageData, $_SESSION['user']['id']);
        $stmtUpdate->execute();
        echo "Изображение успешно обновлено в базе данных.";
    } else {
        // Если нет существующей аватарки, добавляем новую
        $queryInsert = "INSERT INTO users (avatar) VALUES (?)";
        $stmtInsert = $connect->prepare($queryInsert);
        $stmtInsert->bind_param("b", $imageData);
        $stmtInsert->execute();
        echo "Изображение успешно добавлено в базе данных.";
    }
}
?>

<form method="POST" enctype="multipart/form-data">
    <input type="file" id="text_drop_files_center" name="filename" required>
    <button id="button_file_information_end" type="submit">publish</button>
</form>

<?php
if(isset($_FILES['filename'])){
    require "connect.php";
    
    // Проверка наличия файла и чтение данных изображения
    if ($_FILES['filename']['error'] === UPLOAD_ERR_OK) {
        $imageData = file_get_contents($_FILES['filename']['tmp_name']);
        
        // Проверка наличия данных изображения
        if ($imageData) {
            updateOrInsertAvatar($imageData);
        } else {
            echo "Ошибка: Не удалось прочитать данные изображения.";
        }
    } else {
        echo "Ошибка при загрузке файла.";
    }
}
?>
