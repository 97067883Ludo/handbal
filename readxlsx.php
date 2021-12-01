<?php
require 'vendor/shuchkin/simplexlsx/src/SimpleXLSX.php';

$file = 'wedstrijden.xlsx';

$xlsx = new SimpleXLSX($file);

//declareer error array voor als er fouten voorkomen bij het inladen van het xlsx bestand

global $errors;
$errors = array();


foreach ($xlsx->rows() as $row => $value) {
    //get header
    if ($row == 0) {
        $header = $value;
        $headerSize = count($header);
        continue;
    }
    //echo"Wedstrijd: <br />";
    for ($i=0; $i < $headerSize; $i++) {
        //array_push($wedstrijd, $regel);
        //echo $header[$i];
        //kijk of de het een datum of tijd is, dit moet gefixed worden
        if ($header[$i] == "Datum" || $header[$i] == "Tijd") {
            //call fixDateTime function om datum en tijd te fixen
            $fixedTime = fixDateTime($value[$i], $header[$i], $row, $errors);
            //$regel = array($header[$i] => $fixedTime);
            /*echo': ';
            echo $fixedTime;
            echo '<br />';*/
        }else{
            /*echo ': ';
            echo $value[$i];
            echo '<br />';*/
        }
    }
}


function fixDateTime($dateTime, $hoursOrDate, $row){

    try {
        //probeer de $dateTime om te zetten naar een dateTime data type
        $fixedTime = new DateTime($dateTime);
    }
    //als het gefaald is om het $dateTime om te zetten naar dateTime data type 
    //gooi de $row in de $error variable
    catch (\Throwable $th) {
        $row = $row +1;
        //push de regel fout in de errors array
        array_push($GLOBALS['errors'], $row);
        return " fout op regel $row";
    }
    
    switch ($hoursOrDate) {
        case 'Datum':
            return $fixedTime->format("Y-m-d");
            break;
        case 'Tijd':
            return $fixedTime->format("H:i");
            break;
        default:
            return;
            break;

    }
}

function writeHeader($header, $headerSize, $xlsx){
    $errors = $GLOBALS['errors'];
    foreach ($errors as $key => $value) {
        echo '
        <div class="alert alert-warning" role="alert">
            fout gedetecteerd op '.$value.'
        </div>
        ';
    }
    echo'
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        ';
    for ($i=0; $i < $headerSize; $i++) { 
        if ($header[$i] == 'Nummer' || $header[$i] == 'Accommodatie' || $header[$i] == 'Plaats' || $header[$i] == 'Opm PR') {
            
        }else{
            echo '
                    <th scope="col">'.$header[$i].'</th>
            ';
        }
    }
    echo'
        </tr>
    </thead>
    <tbody>
    ';
    walkThruxlsx($xlsx);
}

function walkThruxlsx($xlsx){
}



//var_dump($errors);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>    
    <div class="container-fluid p-5 bg-primary text-white text-center">
        <h1>Wedstrijd maker Handbal Haarle</h1>
        <h2>Hoofdpagina</h2>
    </div>
    <div class="container mt-5">
    <?php
    writeHeader($header, $headerSize, $xlsx);
    ?>
    </div>
</body>
</html>