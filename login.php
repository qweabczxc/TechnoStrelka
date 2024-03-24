<?php
session_start();
require "vendor/connect.php";
if ($_SESSION['user']) {
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Kolosook</title>
</head>
<body>
<form action="vendor/signin.php" method="post" class="general_block">
        <p class="general_block_txt">Login</p>
        <input type="text" name="login" id="login" placeholder="Login">
        <input type="password" name="password" id="password" placeholder="Password">
        <button class="general_block_btn"><p class="general_block_btn_txt">Sign in</p></button>
        <a href="registration.php" class="general_block_reg">Sign up</a>
        <?php
        
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>
</body>
</html>
