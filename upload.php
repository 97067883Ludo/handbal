<?php
$target_dir = 'upload/';
$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$uploadOk = 1;
print_r($_FILES);
if ($_FILES['fileToUpload']['name'] == null) {
    $uploadOk = 0;
    header('Location: index.php?Upload=1');
    return;
}

$maxSize = $_FILES['fileToUpload']['size'];
//echo $maxSize;

if ($maxSize > 200000) {
    $uploadOk = 0;
    header('Location: index.php?Upload=3');
    return;
}

if ($fileType != 'xlsx') {
    $uploadOk = 0;
    header('Location: index.php?Upload=2');
    return;
}


if ($uploadOk == 1) {
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    rename($target_file, $target_dir . 'wedstrijden.xlsx');
    header("Location: index.php?Upload=0"); 
}

?>