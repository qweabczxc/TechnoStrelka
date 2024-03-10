<?php
session_start();
$connect = mysqli_connect('26.15.252.141', 'eshkere', 'eshkere', 'test');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/profilee.css">
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
        <?php
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT avatar FROM users WHERE id = $id";
            $result = $connect->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $avatarData = $row['avatar'];
                
                echo '<img src="' . $avatarData . '" alt="Аватарка"' . '" id="profile_avatar">';

                // echo '<img src="data:image/jpeg;base64,' . base64_encode($avatarData) . '" alt="Аватарка">';
            } 
        }
        else{
            echo '<img src="' . $_SESSION['user']['avatar'] . '" id="profile_avatar">';

        }
        ?>
        
        <p id="profile_nick">qweabc</p>
        <button id="main_first_button">Albums</button>
        <button id="main_second_button">Edit profile</button>
        <div id="profile_all_files">
            <figure>
                <?php
                require "vendor/check_user.php";
                ?>
                <!-- <img src="uploads/1709469170страшылка пугалка.jpg" id="main_files_img"> -->
                <figcaption></figcaption>
            </figure>
            <!-- <figure>
                <img src="uploads/1709469170страшылка пугалка.jpg" id="main_files_img">
                <figcaption></figcaption>
            </figure>
            <figure>
                <img src="uploads/1709446977эдгар.jpg" id=  "main_files_img">
                <figcaption></figcaption>
            </figure>
            <figure>
                <img src="uploads/1709446977эдгар.jpg" id= "main_files_img">
                <figcaption></figcaption>
            </figure>
            <figure>
                <img src="uploads/1709446977эдгар.jpg" id= "main_files_img">
                <figcaption></figcaption>
            </figure> -->
        </div>
    </main>
</body>
</html>