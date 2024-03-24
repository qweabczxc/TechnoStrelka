<?php

    $connect = mysqli_connect('26.17.190.53', 'root', '', 'test');
    if (!$connect) {
        die('Error connect to DataBase');
    }