<?php
//load mpdf
require_once __DIR__ . '/vendor/autoload.php';

//load xml file
$xml = simplexml_load_file("Wedstrijdlijst.xml");

//get the posted information
$selected = $_POST['product'];

//if nothing is posted send user back to index.php
if ($selected == NULL) {
    header('Location: index.php');
}

//als haarle in de string zit zet deze stijl op de cel
$haarleStyle = 'background-color:black; color:white;';

//set variable naar 1 als 'haarle' is gedetecteerd
$haarleT = 0;
$haarleU = 0;

//store all pdf data in 1 variable
$data = '';

//create heading of the pdf file
$data .= '
<table style="border: 1px solid black; border-collapse: collapse; font-family:arial;">
<tr>
<td colspan="5"> <img src="logo.svg" alt="logo" width="374px"><br /> <div style="color:blue; text-decoration: underline;">www.handbalhaarle.nl</div></td>
</tr>
<tr>
    <th style="border: 1px solid black; background-color:grey;">Datum</th>
    <th style="border: 1px solid black; background-color:grey;">Tijd</th>
    <th style="border: 1px solid black; background-color:grey;" colspan="2">Teams:</th>
    <th style="border: 1px solid black; background-color:grey;">Scheidsr.:</th>
    <th style="border: 1px solid black; background-color:grey;">Tafeldienst</th>
</tr>';

$ii =0;
$i =0;
foreach ($xml as $key => $value) {
    if ($selected[$ii] == $i) {
        $teamU = array();
        $teamT = array();
        $explodedTeamT = explode(" ", $xml->$key[$i]->Thuisteam);
        $explodedTeamU = explode(" ", $xml->$key[$i]->Uitteam);
        if ($explodedTeamT[0] == "Haarle") {
            $haarleT = 1;
        }
        
        if ($explodedTeamU[0] == "Haarle") {
            $haarleU = 1;
        }
        $data .= '
        <tr>
            <td style="border: 1px solid black;">'.$xml->$key[$i]->Datum.'</td>
            <td style="border: 1px solid black;">'.$xml->$key[$i]->Tijd.'</td>
            <td style="border: 1px solid black;'; if($haarleT == 1){$data .= $haarleStyle; $haarleT = 0;} $data .= '">'.$xml->$key[$i]->Thuisteam.'</td>
            <td style="border: 1px solid black;'; if($haarleU == 1){$data .= $haarleStyle; $haarleU = 0;} $data .= '">'.$xml->$key[$i]->Uitteam.'</td>
            <td style="border: 1px solid black;" rowspan="2">'.$xml->$key[$i]->Scheidsrechter_1.' '.$xml->$key[$i]->Scheidsrechter_2.'</td>
            <td style="border: 1px solid black;" rowspan="2">'.$xml->$key[$i]->Zaaldienst.'</td>
        </tr>
        <tr>
            <td style="border: 1px solid black;"> </td>
            <td style="border: 1px solid black;" colspan="3"> -</td>
        </tr>
        ';
        
        $ii++;
    }

    $i++;
}

$data .= '
</table>
';

//making a new class mpdf
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']);

//write data to the pdf file
$mpdf->WriteHTML($data);

//output the pdf file to the browser
$mpdf->Output();

?>