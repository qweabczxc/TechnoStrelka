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
        if(isset($_GET['id']) && $_GET['id'] != $_SESSION['user']['id']) {
            $id = $_GET['id'];
            $sql = "SELECT avatar, full_name FROM users WHERE id = $id";
            $result = $connect->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $avatarData = $row['avatar'];
                $nameData = $row['full_name'];
                echo '<img src="' . $avatarData . '" alt="Аватарка" class="polz-img">';
                echo '<p class="polz-text">' . $nameData . "'s album" .  '</p>';

                
            } 
        }
        else {
            echo '<img src="' . $_SESSION['user']['avatar'] . '" class="polz-img">';
                echo '<p class="polz-text">' . $_SESSION['user']['full_name'] . "'s album" . '</p>';
            }
            if(isset($_GET['id']) && $_GET['id'] != $_SESSION['user']['id']) {

            }
            else{
                echo "<button id='button_create_alb' onclick='window.location.href=\"create_album.php\"'>Create album</button>";
            }
        ?>

        </div>



        <div class="zan">
        <?php
if(isset($_GET['id']) && $_GET['id'] != $_SESSION['user']['id']) {
    $user_id = $_GET['id'];
}
else{
    $user_id = $_SESSION['user']['id'];
}


// Запрос к таблице album для получения album_id с user_id равным user_id текущего пользователя
$sql = "SELECT album_id FROM album WHERE user_id = $user_id";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $album_id = $row['album_id'];
        echo '<a href="album.php?album_id=' . $album_id . '"><div class="square"></div></a>';
    }
}
?>


        </div>
    </main>
</body>
</html>