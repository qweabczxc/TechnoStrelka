<?php
session_start();
require_once 'connect.php';

$album_name = !empty($_POST['title']) ? $connect->real_escape_string($_POST['title']) : null;
$private = $connect->real_escape_string($_POST['private']);
$user_id = $_SESSION['user']['id'];

if ($album_name) {
    $query = "INSERT INTO album (name, private, id_files, user_id) VALUES ('$album_name', '$private', 0, '$user_id')";
    if (mysqli_query($connect, $query)) {
        header('Location: ../albums.php');
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }
} else {
    echo "Album name cannot be empty.";
}


?>