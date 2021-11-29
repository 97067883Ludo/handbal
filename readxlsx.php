<?php
require 'vendor/shuchkin/simplexlsx/src/SimpleXLSX.php';

$file = 'wedstrijden.xlsx';

$xlsx = new SimpleXLSX($file);

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
           $fixedTime = fixDateTime($value[$i], $header[$i]);

           //als de date time fix is gefaald trow error en die
           if (!$fixedTime) {
               echo "error fix time";
               die;
           }
            echo ': ';
            echo $fixedTime;
            echo '<br />';
        }else{
            echo ': ';
            echo $value[$i];
            echo '<br />';
        }
    }
}

function fixDateTime($dateTime, $hoursOrDate){
    //explode date because of yyy/mm/dd hh:mm:ss
    //explode it to 2 seperate strings
    $explodedDate = explode(" ", $dateTime);
    //check if date is datum of uren
    if ($hoursOrDate == "Datum") {
        return  $explodedDate[0];
    }else{
        return $explodedDate[1];
    }
    //als het niet is gelukt return false en faal de conversie
    return FALSE;
}

?>