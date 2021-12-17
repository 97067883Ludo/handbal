<?php
if (isset($_POST['file'])) {
    header('Location: index.php');
}
$file = $_POST['file'];
$fileDir = 'archive/';
if (is_dir($fileDir)) {
    if ($dh = opendir($fileDir)) {
        
    }else{
        header('Location: archive.php?deleteCode=2');
    }
}else{
    header('Location: archive.php?deleteCode=1');
}

?>