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

    /*if ($row == 0) {
        $header = $value;
        $headerSize = count($header);
        continue;
    }
    echo"Wedstrijd: <br />";
    for ($i=0; $i < $headerSize; $i++) {
        echo $header[$i];
        echo ': ';
        echo $value[$i];
        echo '<br />';
    }*/
    echo "row $row ";
    print_r($value);
    echo"<br />";

}


?>