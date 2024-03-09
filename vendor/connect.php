<?php

    $connect = mysqli_connect('26.15.252.141', 'eshkere', 'eshkere', 'test');
    if (!$connect) {
        die('Error connect to DataBase');
    }