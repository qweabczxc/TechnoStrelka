<?php

session_start();
if(isset($_GET['id'])) {
    $id = $_GET['id'];
  
}
else{
    $id = $_SESSION['user']['id'];
    
}
$sql = "SELECT * FROM files WHERE user_id = $id";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    // Выводим фотографии
    while($row = $result->fetch_assoc()) {
        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"id="main_files_img" ">';
    }
}
?>
