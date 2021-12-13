<?php
require 'vendor/shuchkin/simplexlsx/src/SimpleXLSX.php';

$file = 'wedstrijden.xlsx';

$xlsx = new SimpleXLSX($file);

//declareer error array voor als er fouten voorkomen bij het inladen van het xlsx bestand
global $errors;
$errors = array();

//wedstrijd array deze array wordt gevuld met alle wedstrijden
$wedstrijd = array();
global $wedstrijd;

foreach ($xlsx->rows() as $row => $value) {
    //get header
    if ($row == 0) {
        global $headerSize;
        global $header;
        $header = $value;
        $header = array_map('strtolower', $header);
        $headerSize = count($header);
        continue;
    }
    //echo"Wedstrijd: <br />";
    for ($i=0; $i < $headerSize; $i++) {
        //array_push($wedstrijd, $regel);
        //echo $header[$i];
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
//var_dump($wedstrijd);


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
        case 'datum':
            return $fixedTime->format("Y-m-d");
            break;
        case 'tijd':
            return $fixedTime->format("H:i");
            break;
        default:
            return;
            break;

    }
}

function writeHeader($header, $headerSize){
    $errors = $GLOBALS['errors'];
    foreach ($errors as $key => $value) {
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
        if ($header[$i] == 'nummer' || $header[$i] == 'accommodatie' || $header[$i] == 'plaats' || $header[$i] == 'opm pr' || $header[$i] ==  NULL) {
            
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
}

function walkThruxlsx(){
    $headerSize = $GLOBALS['headerSize'];
    $header = $GLOBALS['header'];
    $wedstrijd = $GLOBALS['wedstrijd'];
    $i = 0;
    foreach ($wedstrijd as $key => $value) {

        echo'<tr>';
        echo'<th> <input type="checkbox" name="product[]" value="' . $i . '" id=""> </th>';
        for ($i=0; $i < $headerSize; $i++) { 
            
            if ($header[$i] == 'datum' || $header[$i] == 'tijd' || $header[$i] == 'thuisteam' 
                || $header[$i] == 'uitteam' || $header[$i] == 'scheidsrechter-1' || $header[$i] == 'scheidsrechter-2' 
                || $header[$i] == 'zaaldienst') {
                echo '<td>'.$value[$key][$header[$i]].'</td>';
                
            }
        }
        echo'</tr>';
        $i++;
    }
    echo'';
}



?>