<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jockey+One&family=Kranky&display=swap" rel="stylesheet">
    <title>main</title>
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
    <div id="main_div_name_with_imgs">
            <div id="main_div_name">
                <img src="<?= $_SESSION['random']['avatar'] ?>" class="main_img" onclick="redirectToPageWithId(<?php echo $_SESSION['random']['id']; ?>)">
                <p id="main_full_name"><?= $_SESSION['random']['full_name'] ?></p>
                <p id="main_id"><?= '@' . $_SESSION['random']['id'] ?></p> 
            </div>
            <div>
            <img src="<?= $_SESSION['random']['avatar'] ?>" class="main1_img main_imgs">
            <img src="<?= $_SESSION['random']['avatar'] ?>" class="main2_img main_imgs">
            <img src="<?= $_SESSION['random']['avatar'] ?>" class="main3_img main_imgs">
            <img src="<?= $_SESSION['random']['avatar'] ?>" class="main4_img main_imgs">
            </div>
        </div>
<?php
require 'vendor/random.php';
?>

        <div id="main_div_name_with_imgs">
            <div id="main_div_name">
                <img src="<?= $_SESSION['random']['avatar'] ?>" class="main_img" onclick="redirectToPageWithId(<?php echo $_SESSION['random']['id']; ?>)">
                <p id="main_full_name"><?= $_SESSION['random']['full_name'] ?></p>
                <p id="main_id"><?= '@' . $_SESSION['random']['id'] ?></p> 
            </div>
            <div>
            <img src="<?= $_SESSION['random']['avatar'] ?>" class="main1_img main_imgs">
            <img src="<?= $_SESSION['random']['avatar'] ?>" class="main2_img main_imgs">
            <img src="<?= $_SESSION['random']['avatar'] ?>" class="main3_img main_imgs">
            <img src="<?= $_SESSION['random']['avatar'] ?>" class="main4_img main_imgs">
            </div>
        </div>
        <?php
require 'vendor/random.php';
?>

        <div id="main_div_name_with_imgs">
            <div id="main_div_name">
                <img src="<?= $_SESSION['random']['avatar'] ?>" class="main_img" onclick="redirectToPageWithId(<?php echo $_SESSION['random']['id']; ?>)">
                <p id="main_full_name"><?= $_SESSION['random']['full_name'] ?></p>
                <p id="main_id"><?= '@' . $_SESSION['random']['id'] ?></p> 
            </div>
            <div>
                <img src="<?= $_SESSION['random']['avatar'] ?>" class="main1_img main_imgs">
                <img src="<?= $_SESSION['random']['avatar'] ?>" class="main2_img main_imgs">
                <img src="<?= $_SESSION['random']['avatar'] ?>" class="main3_img main_imgs">
                <img src="<?= $_SESSION['random']['avatar'] ?>" class="main4_img main_imgs">
            </div>
        </div>
    </main>

</body>
</html>
<?php
echo $_POST['full_name'];
?>

<script>
function redirectToPageWithId(id) {
    window.location.href = 'profile.php?id=' + id; // Переход на другую страницу с передачей ID в URL
}
</script>