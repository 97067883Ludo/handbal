<?php
if ($_FILES['fileToUpload']['name'] == null) {
    header('Location: index.php?Upload=1');
    $uploadOk = 0;
    return;
}

$target_dir = 'upload/';
$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$uploadOk =1;

if ($fileType != 'xlsx') {
    $uploadOk = 0;
    header('Location: index.php?Upload=2');
    return;
}

move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

header("Location: index.php?Upload=0");

?>