<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/add_to_album.css">
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
                <img src="<?= $_SESSION['user']['avatar'] ?>" alt="Изображение" id="header_img" onclick="window.location.href='profile.php'">
                <?php
            } 
        ?>
        </div>
    </header>
    <main>
        <div id="div_drop_files">
            <p id="text_drop_files_center">Select a file or drag it here</p>
            <p id="text_drop_files_down">Photo or video only</p>
        </div>
        <div id="div_file_information">
            <input type="text" id="main_input" placeholder="Add a title">
            <input type="text" id="main_input" placeholder="Add to album">
            <div id="div_file_information_end">
                <button id="button_file_information_end">publish</button>
            </div>
        </div>
    </main>
</body>
</html>