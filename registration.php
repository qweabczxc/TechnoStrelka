<?php
    session_start();
    if ($_SESSION['user']) {
        header('Location: main_page.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/reg.css">
    <title>Kolosook</title>
</head>
<body>
    <form action="vendor/signup.php" method="post" enctype="multipart/form-data" class="general_block">
        <p class="general_block_txt">Registration</p>
        
        <input type="text" name="login" id="login" placeholder="Login" required>
        <input type="text" name="full_name" id="email" placeholder="Nickname" required>
        <input type="email" name="email" id="email" placeholder="Email" required>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <input type="password" name="password_confirm" id="password-confirm" placeholder="Confirm password">
        <button class="general_block_btn"><p class="general_block_btn_txt">Sign up</p></button>
        <a href="login.php" class="general_block_log">Sign in</a>
        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>
</body>
</html>

<!-- <form action="vendor/signup.php" method="post" enctype="multipart/form-data">
        <label>ФИО</label>
        <input type="text" name="full_name" placeholder="Введите свое полное имя" required>
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите свой логин" required>
        <label>Почта</label>
        <input type="email" name="email" placeholder="Введите адрес своей почты" required>
        <label>Изображение профиля</label>
        <input type="file" name="avatar" required>
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль" required>
        <label>Подтверждение пароля</label>
        <input type="password" name="password_confirm" placeholder="Подтвердите пароль" required>
        <button type="submit">Зарегистрироваться</button>
        <p>
            У вас уже есть аккаунт? - <a href="/">авторизируйтесь</a>!
        </p>
    </form> -->