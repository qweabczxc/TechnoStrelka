<?php
session_start();
?>

<form  method="post" enctype="multipart/form-data">
    <input type="file" name="photo" accept="image/*">
    <input type="text" name="name" placeholder="Имя файла">
    <input type="text" name="tags" placeholder="Теги">
    <input type="submit" value="Загрузить фото">
    </form>


<?php
if(isset($_FILES['photo'])) {
    $connect = mysqli_connect('26.15.252.141', 'eshkere', 'eshkere', 'test');
    
    $image = file_get_contents($_FILES['photo']['tmp_name']);
    $name = mysqli_real_escape_string($connect, $_POST['name']); // Экранирование для безопасности

    $query = "INSERT INTO files (name, tags, private, image) VALUES ('$_POST[name]', '$_POST[tags]', '$_POST[private]', '$image')";
    mysqli_query($connect, $query);
}
$query = "SELECT * FROM files WHERE name = '$name'";
$result = mysqli_query($connect, $query);
$file = mysqli_fetch_assoc($result);

// Отображаем изображение
echo '<img src="data:image/jpeg;base64,' . base64_encode($file['image']) . '" alt="Загруженное изображение">';
?>
