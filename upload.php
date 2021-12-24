<?php

if (!file_exists('upload')) {
    mkdir('upload');
}

$target_dir = 'upload/';
$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$uploadOk = 1;
$fileSize = $_FILES['fileToUpload']['size'];

print_r($_FILES);
if ($_FILES['fileToUpload']['name'] == null) {
    $uploadOk = 0;
    header('Location: index.php?Upload=1&MSG=1');
    return;
}

if ($fileType != 'xlsx') {
    $uploadOk = 0;
    header('Location: index.php?Upload=2&MSG=1');
    return;
}

if ($fileSize > 200000) {
    $uploadOk = 0;
    header('Location: index.php?Upload=3&MSG=1');
    return;
}

if ($uploadOk == 1) {
    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file);
    rename($target_file, $target_dir . 'wedstrijden.xlsx');
    header('Location: index.php?Upload=0&MSG=1');
}

?>