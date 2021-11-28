<?php

//open csv file
$file = fopen("updateLijst/Wedstrijdlijst-csv.csv", "r") or die("Fout bij het laden van bestand");



//get header from csv file 
$baseheader = fgetcsv($file);

//replace header items with Schr._1, Schr._2
$replacements = array(7 => "Scheidsrechter_1", 8 => "Scheidsrechter_2");
$header = array_replace($baseheader, $replacements);

//create new xml class
$xml = new SimpleXMLElement('<xml/>'); 

while (($data = fgetcsv($file, 10000, ",")) !== FALSE) {
    //count how many elements there are in one line
    $num = count($data);
    //create xml child wedstrijd
    $Wedstrijd = $xml->addChild('Wedstrijd');
    for ($c=0; $c < $num; $c++) {
        //deze if statement zorgt ervoor dat de onnodige informatie niet in het xml bestand komt
        if ($c == 0 || $c == 5 || $c == 6 || $c == 10 || $c == 12 || $c == 13) {
            //doe niks 
        }
        //zorgt ervoor dat alle informatie die wel van belang is er in komt
        else{
            //voeg alle data toe in het child element wedstrijd
            $Wedstrijd->addChild($header[$c], $data[$c]);
            //echo $header[$c] . ' ' . $data[$c] . "<br />\n";
        }
    }
}

//put the finished xml var in the xml class
$finisedXml = $xml->asXML();

//write the variable to the file
file_put_contents('Wedstrijdlijst.xml', $finisedXml);
//close the file 
fclose($file);
//send user back to the index.php
header("Location: index.php");

?>
