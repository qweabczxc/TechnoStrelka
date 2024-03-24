<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/create_album.css">
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
            <img src="<?= $_SESSION['user']['avatar'] ?>" alt="Изображение" id="header_img" onclick="window.location.href='profile.php'">
            <?php
        }
        ?>
    </div>
</header>
<main>

        <form action="vendor/create__album.php" method="POST" enctype="multipart/form-data">
            <div id="div_file_information">
                <input type="text" name="title" id="main_input" placeholder="Add a title" required>
                    <div id="div_file_information_end">
                        <p id="txt_file_information_end">hide from other users</p>
                        <input type="checkbox" name="private" id="checkbox_file_information_end">
                        <button id="button_file_information_end" type="submit">Create</button>
                    </div>
            </div>
        </form>

</main>
</body>
</html>