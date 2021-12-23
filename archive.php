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
            <th>Aanmaakmomnet</th>
            <th>Bekijken</th>
            <th>downloaden</th>
            <th>Verwijderen</th>
            </tr>
            </thead>
            <tbody>
            ';
            $fileArray = array();
            $files = array();
            if ($dh = opendir($fileDir)) {
                while (($file = readdir($dh)) !== false) {
                    if ($file == '.' || $file == '..') {
                        continue;
                    }
                    $fileNameArray = explode('_', $file);
                    $datum = date("Y-m-d", strtotime($fileNameArray[0]));
                    $tijd = date('H:i:s', strtotime($fileNameArray[1]));
                    $unixTimeStamp = $datum . $tijd;
                    $unixTimeStamp = strtotime($unixTimeStamp);
                    $fileArray['fileName'] = $file;
                    $fileArray['timeStamp'] = $unixTimeStamp;
                    $fileArray['date'] = $datum;
                    $fileArray['time'] = $tijd;
                    $files[] = $fileArray;
                }
            }else {
                echo 'er is iets fout gegaan met het openen van de map heb ik de juiste rechten?';
            }
        }else {
            echo 'map niet gevonden';
        }
        function date_compare($element1, $element2) {
            $datetime1 = $element1['timeStamp'];
            $datetime2 = $element2['timeStamp'];
            return $datetime2 - $datetime1;
        } 
        usort($files, 'date_compare');
        $sizeFiles = count($files);
        foreach ($files as $key => $value) {

            echo'
            <tr>
            <td>'.$files[$key]['date'].'</td>
            <td>'.$files[$key]['time'].'</td>
            <td><a class="btn btn-primary" href="archive/'.$files[$key]['fileName'].'">Bekijk</a></td>
            <td><a class="btn btn-primary" href="archive/'.$files[$key]['fileName'].'" download="'.$files[$key]['fileName'].'">Download</a></td>
            <td>
            <form action="delete.php" method="post">
                <input type="hidden" value="'.$files[$key]['fileName'].'" name="file">
                <button class="btn btn-danger" type="submit">Verwijderen</button>
            </form>
            </td>
            </tr>
            ';
        }
    ?>
</body>
</html>