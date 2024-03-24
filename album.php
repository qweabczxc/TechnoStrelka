<?php
session_start();
require "vendor/connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/album.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jockey+One&family=Kranky&display=swap" rel="stylesheet">
    <title>Kolosook</title>
</head>
<body>
    <header>
        <a href="index.php" class="ref_mainpage">
            <img src="uploads/logo1.png" id="logo">
            <p id="kolosook">kolosook</p>
        </a>
        <div id="header_div_for_search">
            <img src="uploads/header_input.png" id="header_input_img">
            <input type="text" id="header_input" placeholder="Search">
        </div>
        <div id="button_img">
        <?php
            if ($_SESSION['user']) {
                ?>
                <button onclick="window.location.href='adding_files.php'">Create</button>
                <img src="<?= $_SESSION['user']['avatar'] ?>" alt="Изображение" id="header_img" onclick="window.location.href='profile.php'">
                <?php
            } else {
                ?>
                <button onclick="window.location.href='registration.php'">Sign up/in</button>
                <?php
            }
        ?>
        </div>
    </header>
    <main>
        <div class="polz">
        <?php
if(isset($_GET['album_id'])) {
    $album_id = $_GET['album_id'];

    $sql = "SELECT user_id FROM album WHERE album_id = $album_id";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id = $row['user_id'];

        // Запрос к таблице users для получения аватара пользователя на основе user_id
        $sql_user = "SELECT avatar FROM users WHERE id = $user_id";
        $result_user = $connect->query($sql_user);

        if ($result_user->num_rows > 0) {
            $row_user = $result_user->fetch_assoc();
            $avatarData = $row_user['avatar'];
            echo '<img src="' . $avatarData . '" alt="Аватарка" class="polz-img">';
        } else {
            echo '<img src="' . $_SESSION['user']['avatar'] . '" class="polz-img">';
           
        }

        // Установка значения $id для последующих запросов
        $id = $user_id;
    } else {
        echo "Album not found.";
    }
} else {
    echo '<img src="' . $_SESSION['user']['avatar'] . '" class="polz-img">';
}

if(isset($id)) {
    $sql = "SELECT name FROM album WHERE album_id = $album_id";
    $sql2 = "SELECT full_name FROM users WHERE id = $id";

    $result = $connect->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nameData = $row['name'];
        
        echo '<p class="polz-text">' . $nameData . '</p>';
    }

    $result2 = $connect->query($sql2);
    if ($result2->num_rows > 0) {
        $row2 = $result2->fetch_assoc();
        $nameData2 = $row2['full_name'];
        
        echo '<p class="polz-text-s"> author: ' . $nameData2 . '</p>';
    }
}
?>



<?php
if(isset($_GET['id']) && $_GET['id'] != $_SESSION['user']['id']) {

}
else{
    echo "<button id='add_button'>Add photo</button>";
}


?>
        </div>
        <div class="zan">
            <?php
                require "vendor/for_album.php"
            ?>

        </div>

    </main>
    </body>
    </html>
