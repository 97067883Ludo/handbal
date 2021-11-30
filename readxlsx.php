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
            $fixedTime = fixDateTime($value[$i], $header[$i], $row);

            echo $fixedTime;
            echo '<br />';
        }else{
            echo ': ';
            echo $value[$i];
            echo '<br />';
        }
    }
}

function fixDateTime($dateTime, $hoursOrDate, $row){
    try {
        $fixedTime = new DateTime($dateTime);
    }
    
    catch (\Throwable $th) {
        //throw $th;
    }
    
    //echo $hoursOrDate;
    /*if ($hoursOrDate == "Datum") {
        return $fixedTime->format("Y-M-d");
    }
    elseif ($hoursOrDate == "Tijd") {
        return $fixedTime->format('H:i:s');
    }*/
    switch ($hoursOrDate) {
        case 'Datum':
            return $fixedTime->format("Y-m-d");
            break;
        case 'Tijd':
            return $fixedTime->format('H:i:s');
            break;
        default:
            return;
            break;
    }

}
?>