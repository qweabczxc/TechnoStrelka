<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/adding_files11.css">
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
    <div id="div_drop_files">
    <form action="vendor/add_files.php" method="POST" enctype="multipart/form-data">
        <label for="text_drop_files_center">
            <img src="placeholder_image.jpg" id="preview_image" style="display: none;">
        </label>
        <input type="file" id="text_drop_files_center" name="filename" required>
        <p id="text_drop_files">Select a file or drag it here</p>
        <p id="text_drop_files_down">Photo or video only</p>
    
</div>
        <div id="div_file_information">
            <input type="text" name="title" id="main_input" placeholder="Add a title" required>
            <input type="text" name="tags" id="main_input" placeholder="Add a tags">
            <input type="text" name="album" id="main_input" placeholder="Add to album">
            <div id="div_file_information_end">
                <p id="txt_file_information_end">hide from other users</p>
                <input type="checkbox" name="private" id="checkbox_file_information_end">
                
                    <button id="button_file_information_end" type="submit">publish</button>
            </div>
            </form>
        </div>
    </main>
</body>
</html>
<script>
const fileInput = document.getElementById('text_drop_files_center');
const previewImage = document.getElementById('preview_image');

fileInput.addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImage.src = e.target.result;
            previewImage.style.display = 'block';
            document.getElementById('text_drop_files').style.display = 'none';
            document.getElementById('text_drop_files_down').style.display = 'none';
            document.getElementById('text_drop_files_center').style.display = 'none';
            
        }
        reader.readAsDataURL(file);
    }
});
</script>