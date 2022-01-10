<?php
require 'vendor/shuchkin/simplexlsx/src/SimpleXLSX.php';

$file = 'upload/wedstrijden.xlsx';

if (!file_exists($file)) {
    xlsxFileNotFound();
    die;
}

$xlsx = new SimpleXLSX($file);



//Declareer error array voor als er fouten voorkomen bij het inladen van het xlsx bestand.
global $errors;
$errors = array();

//Wedstrijd array deze array wordt gevuld met alle wedstrijden.
$wedstrijd = array();
global $rij;

foreach ($xlsx->rows() as $row => $value) {
    //Get header en continue naar het volgende element in de array.
    if ($row == 0) {
        global $headerSize;
        global $header;
        $header = $value;
        $header = array_map('strtolower', $header);
        $headerSize = count($header);
        continue;
    }
    for ($i=0; $i < $headerSize; $i++) {
        //kijk of de het een datum of tijd is, dit moet gefixed worden
        if ($header[$i] == "datum" || $header[$i] == "tijd") {
            //call fixDateTime function om datum en tijd te fixen
            $fixedTime = fixDateTime($value[$i], $header[$i], $row, $errors);

            $kolom[$header[$i]] = $fixedTime;
        }else{
            $kolom[$header[$i]] = $value[$i];
            
        }
    }
    $rij[] = $kolom;
    $wedstrijd[] = $rij;
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
    //Kijk of het uren of een datum is geef vervolgens de juiste informatie terug
    switch ($hoursOrDate) {
        case 'datum':
            return $fixedTime->format("d-m-Y");
            break;
        case 'tijd':
            return $fixedTime->format("H:i");
            break;
        default:
            return;
            break;

    }
}


//Deze functie schrijft de header op het beeldscherm met de juist stijl
function writeHeader($header, $headerSize){

    $errors = $GLOBALS['errors'];
    foreach ($errors as $value) {
        echo '
        <div class="alert alert-danger" role="alert">
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
            switch ($header[$i]) {
                case 'datum':
                    echo '
                    <th scope="col">'.$header[$i].'</th>
                    ';
                    break;
                case 'tijd':
                    echo '
                    <th scope="col">'.$header[$i].'</th>
                    ';
                    break;
                case 'thuisteam':
                    echo '
                    <th scope="col">'.$header[$i].'</th>
                    ';
                    break;
                case 'uitteam':
                    echo '
                    <th scope="col">'.$header[$i].'</th>
                    ';
                    break;
                case 'scheidsrechter-1':
                    echo '
                    <th scope="col">'.$header[$i].'</th>
                    ';
                    break;
                case 'scheidsrechter-2':
                    echo '
                    <th scope="col">'.$header[$i].'</th>
                    ';
                    break;
                case 'zaaldienst':
                    echo '
                    <th scope="col">'.$header[$i].'</th>
                    ';
                    break;
            }   
        }
    echo'
        </tr>
    </thead>
    <tbody>
    ';
}
//Deze fucntie loopt door de array die boven aan gemaakt is.
function walkThruxlsx(){
    $wedstrijd = $GLOBALS['rij'];
    $ii = 0;
    foreach ($wedstrijd as $key => $value) {
        echo '<tr>
        <th> <input type="checkbox" name="product[]" value="' . $ii . '" id=""> </th>
        <td> '.$value['datum'].'</td>
        <td>'.$value['tijd'].'</td>
        <td>'.$value['thuisteam'].'</td>
        <td>'.$value['uitteam'].'</td>
        <td>'.$value['scheidsrechter-1'].'</td>
        <td>'.$value['scheidsrechter-2'].'</td>
        <td>'.$value['zaaldienst'].'</td>
        </tr>
        ';
        $ii++;
    }
    echo "
    </tbody>
    </table>
    ";
}

function xlsxFileNotFound(){
    echo'
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <title>Bootstrap 5 Example</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
    
    <div class="container-fluid p-5 bg-primary text-white text-center">
      <h1>Wedstrijd Handbal Haarle</h1>
    </div>
      
    <div class="container mt-5">
      <div class="row">
        <div class="text-center">
          <h3>Excel bestand niet gevonden</h3>
          <p>bestand uploaden?</p>
          <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Bestand uploaden..." name="fileUpload">
          </form>
        </div>
    
      </div>
    </div>
    
    </body>
    </html>    
    ';

}

?>