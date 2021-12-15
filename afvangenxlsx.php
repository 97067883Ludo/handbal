<?php

if (!isset($_POST['product'])) {
    header("Location: /handbal/handbal/indexxlsx.php");
}

$product = $_POST['product'];

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

$i =0;
foreach ($rij as $key => $value) {
    if ($product[$i] == $key) {
        echo $value['datum']. "<br/>" . $value['thuisteam'] . "<br/>";
        $i++;
    }
    
}

?>