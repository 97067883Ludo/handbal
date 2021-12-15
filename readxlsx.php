<?php
require 'vendor/shuchkin/simplexlsx/src/SimpleXLSX.php';

$file = 'wedstrijden.xlsx';

$xlsx = new SimpleXLSX($file);



//declareer error array voor als er fouten voorkomen bij het inladen van het xlsx bestand
global $errors;
$errors = array();

//wedstrijd array deze array wordt gevuld met alle wedstrijden
$wedstrijd = array();
global $rij;

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

function writeHeader($header, $headerSize){

    $headerHtml = '';

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
        /*for ($i=0; $i < $headerSize; $i++) { 
            if ($header[$i] == 'nummer' || $header[$i] == 'accommodatie' || $header[$i] == 'plaats' || $header[$i] == 'opm pr' || $header[$i] ==  NULL) {
                
            }else{
                echo '
                <th scope="col">'.$header[$i].'</th>
                ';
            }
        }*/
    echo'
        </tr>
    </thead>
    <tbody>
    ';
}

function walkThruxlsx(){
    $headerSize = $GLOBALS['headerSize'];
    $header = $GLOBALS['header'];
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


    /*foreach ($wedstrijd as $key => $value) {

        echo'<tr>';
        echo'<th> <input type="checkbox" name="product[]" value="' . $ii . '" id=""> </th>';
        for ($i=0; $i < $headerSize; $i++) {
            //pak alle informatie die we willen en echo ze
            if ($header[$i] == 'datum' || $header[$i] == 'tijd' || $header[$i] == 'thuisteam' 
                || $header[$i] == 'uitteam' || $header[$i] == 'scheidsrechter-1' || $header[$i] == 'scheidsrechter-2' 
                || $header[$i] == 'zaaldienst')
            {
                echo '<td>'.$value[$key][$header[$i]].'</td>';
            }
        }
        echo'</tr>';
        $ii++;
    }*/
}

?>