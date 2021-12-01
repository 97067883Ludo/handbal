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
    
    echo"Wedstrijd: <br />";
    
    for ($i=0; $i < $headerSize; $i++) {
        echo $header[$i];
        //kijk of de het een datum of tijd is, dit moet gefixed worden
        if ($header[$i] == "Datum" || $header[$i] == "Tijd") {

            //call fixDateTime function om datum en tijd te fixen
            $fixedTime = fixDateTime($value[$i], $header[$i], $row, $errors);
            echo': ';
            echo $fixedTime;
            echo '<br />';
        }else{
            echo ': ';
            echo $value[$i];
            echo '<br />';
        }
    }
}



function fixDateTime($dateTime, $hoursOrDate, $row, $errors){

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

var_dump($errors);
?>
