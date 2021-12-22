<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Wedstrijd Handbal Haarle</title>
</head>
<body>
    <div class="container-fluid p-5 bg-primary text-white text-center">
        <h1>Wedstrijd maker Handbal Haarle</h1>
        <h2>Archief</h2>
    </div>
    <?php
        require 'printMenu.php';
        printMenu();
        $fileDir = 'archive';
        if (is_dir($fileDir)) {
            
            echo'
            <div class="container mt-5">
            <table class="table">
            <thead>
            <tr>
            <th>Aanmaakdatum</th>
            <th>Aanmaaktijd</th>
            <th>Bekijken</th>
            <th>downloaden</th>
            <th>Verwijderen</th>
            </tr>
            </thead>
            <tbody>
            ';
            $files = array();
            if ($dh = opendir($fileDir)) {
                while (($file = readdir($dh)) !== false) {
                    if ($file == '.' || $file == '..') {
                        continue;
                    }
                    
                    $fileNameArray = explode('_', $file);

                    $timeComma = $fileNameArray[1];

                    $timeComma = explode(",",$timeComma);
                    $tijd = '';
                    $archivedFiles = array();
                    foreach ($timeComma as $key => $value) {
                        $tijd .= $timeComma[$key];
                        if ( $key != 2) {
                            $tijd .= ':';
                        }
                    }
                    echo'
                    <tr>
                    <td>'.$fileNameArray[0].'</td>
                    <td>'.$tijd.'</td>
                    <td><a class="btn btn-primary" href="archive/'.$file.'">Bekijk</a></td>
                    <td><a class="btn btn-primary" href="archive/'.$file.'" download="'.$file.'">Download</a></td>
                    <td>
                    <form action="delete.php" method="post">
                        <input type="hidden" value="'.$file.'" name="file">
                        <button class="btn btn-danger" type="submit">Verwijderen</button>
                    </form>
                    </td>
                    </tr>
                    ';
                }
            }else {
                echo 'er is iets fout gegaan met het openen van de map heb ik de juiste rechten?';
            }
        }else {
            echo 'map niet gevonden';
        }


    ?>
</body>
</html>