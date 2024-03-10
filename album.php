<?php
session_start();
$connect = mysqli_connect('26.15.252.141', 'eshkere', 'eshkere', 'test');
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
    <title>Document</title>
</head>
<body>
    <header>
        <img src="uploads/logo1.png" id="logo">
        <p id="kolosook">kolosook</p>
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
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT avatar FROM users WHERE id = $id";
            $result = $connect->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $avatarData = $row['avatar'];
                
                echo '<img src="' . $avatarData . '" alt="Аватарка"' . '" class="polz-img">';

                // echo '<img src="data:image/jpeg;base64,' . base64_encode($avatarData) . '" class="polz-img">';
            } 
        }
        else{
            echo '<img src="' . $_SESSION['user']['avatar'] . '" class="polz-img">';

        }
        ?>
        <?php
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        else{
            $id = $_SESSION['user']['id'];
        }
        $sql = "SELECT name FROM album WHERE user_id = $id";
        $result = $connect->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nameData = $row['name'];
            
            echo '<p class="polz-text">' . $nameData . '</p>';

        }
        ?>
        <?php
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            else{
                $id = $_SESSION['user']['id'];
            }
            $sql = "SELECT full_name FROM users WHERE id = $id";
            $result = $connect->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $nameData = $row['full_name'];
                
                echo '<p class="polz-text-s"> author: ' . $nameData . '</p>';

            }
        ?>
            <p class="hfo">hide from others</p>
            <input type="checkbox" id="main_checkbox">
        </div>
        <div class="zan">
            <?php
            require "vendor/check_user.php";
            ?>

        </div>

    </main>
    </body>
    </html>