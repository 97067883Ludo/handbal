<?php
require 'vendor/shuchkin/simplexlsx/src/SimpleXLSX.php';

$file = 'wedstrijden.xlsx';

$xlsx = new SimpleXLSX($file);

/*if ( $xlsx = SimpleXLSX::parse($file)) {
    echo"yooo";
}
else{
    echo "fout";
}*/
foreach ($xlsx->rows() as $row => $value) {

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

           //als de date time fix is gefaald dan trow error en die
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
    //echo $hoursOrDate;
    $explodedDate = explode(" ", $dateTime);
    //print_r($explodedDate);
    if ($hoursOrDate == "Datum") {
        return  $explodedDate[0];
    }else{
        return $explodedDate[1];
    }
    return FALSE;
}


?>