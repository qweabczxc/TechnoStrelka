<?php
        $connect = mysqli_connect('26.15.252.141', 'eshkere', 'eshkere', 'test');

        $random_user_query = mysqli_query($connect, "SELECT * FROM `users` ORDER BY RAND() LIMIT 1");
        $random_user = mysqli_fetch_assoc($random_user_query);
        
        $_SESSION['random'] = [
            "id" => $random_user['id'],
            "full_name" => $random_user['full_name'],
            "avatar" => $random_user['avatar'],
            "email" => $random_user['email']
        ];
?>