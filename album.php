<?php
session_start();
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
            <button>Create</button>
            <img src="<?= $_SESSION['user']['avatar'] ?>" alt="Изображение" id="header_img">
        </div>
    </header>
    <main>
        <div class="polz">
            <img class="polz-img" src="img/зангецу 59.png">
            <p class="polz-text">zangetsu</p>
            <p class="polz-text-s">author: qweabc</p>
            <p class="hfo">hide from others</p>
            <input type="checkbox" id="main_checkbox">
        </div>
        <div class="zan">
            <img class="zan-s" src="img/зангецу 52.png">
            <img class="zan-s" src="img/зангецу 52.png">
            <img class="zan-s" src="img/зангецу 52.png">
            <img class="zan-s" src="img/зангецу 52.png">
            <img class="zan-s" src="img/зангецу 52.png">
            <div class="zan-d-p">
                <div class="create-st"></div>
                <div class="create-stn"></div>
                <p class="create-text">add new file</p>
            </div>
        </div>

    </main>
    </body>
    </html>