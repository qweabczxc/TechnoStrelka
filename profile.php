<?php
session_start();
require "vendor/connect.php";
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
<?php
if(isset($_GET['id']) && $_GET['id'] != $_SESSION['user']['id']) {
    $id = $_GET['id'];
    $sql = "SELECT avatar, full_name FROM users WHERE id = $id";
    $result = $connect->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $avatarData = $row['avatar'];
        $nameData = $row['full_name'];
        echo '<figure id ="figure_for_avatar">';
        echo '<img src="' . $avatarData . '" alt="Аватарка" id="profile_avatar">';
        echo '<figcaption id="profile_nick">' . $nameData . '</figcaption>';
        echo '</figure>';

        // Если изображение хранится в виде base64 строки:
        // echo '<img src="data:image/jpeg;base64,' . base64_encode($avatarData) . '" alt="Аватарка">';
    } 
}
else {
    echo '<figure id ="figure_for_avatar">';
    echo '<img src="' . $_SESSION['user']['avatar'] . '" id="profile_avatar">';
    echo '<figcaption id="profile_nick">' . $_SESSION['user']['full_name'] . '</figcaption>';
    echo '</figure>';
}
?>

        
<?php
if(isset($_GET['id']) && $_GET['id'] != $_SESSION['user']['id']) {
    echo "<button id='main_first_button' onclick='window.location.href=\"albums.php?id=" . $_GET['id'] . "\"'>Albums</button>";
}
else{
    echo "<button id='main_first_button' onclick='window.location.href=\"albums.php\"'>Albums</button>";
    echo "<button id='main_second_button'>Edit profile</button>";
    echo "<form action='vendor/logout.php'>";
    echo "<button id='main_third_button' type='submit'>Log out</button>";
    echo "</form>";
}
?>



        <div id="profile_all_files">
            <figure>
                <?php
                require "vendor/check_user.php";
                ?>
                <figcaption></figcaption>
            </figure>
        </div>
    </main>
</body>
</html>