<?php

//if nothing is posted send user back to index.php
if (!isset($_POST['product'])) {
    header('Location: index.php');
}

$archiveName = 'archive/';

$today = new DateTime('now');

$todayString = $today->format('d-m-Y_H.i.s_');

$archiveName .= $todayString;

$archiveName .= '.pdf';

$product = $_POST['product'];
$productSize = count($product);

require_once __DIR__ . '/vendor/autoload.php';
require 'readxlsx.php';

//making a new class mpdf
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']);

$mpdf->SetTitle(''. $rij[1]['datum'] .' Handbal overzicht');

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
        <td colspan="5"> <img src="img/logo.svg" alt="logo" width="374px"><br /> <div style="color:blue; text-decoration: underline;">www.handbalhaarle.nl</div></td>
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

foreach ($rij as $key => $value) {
    if ($product[$i] == $key) {
        $teamU = array();
        $teamT = array();
        $explodedTeamT = explode(" ", $rij[$key]['thuisteam']);
        $explodedTeamU = explode(" ", $rij[$key]['uitteam']);
        if ($explodedTeamT[0] == "Haarle" || $explodedTeamU[0] == "haarle") {
            $haarleT = 1;
        }
        
        if ($explodedTeamU[0] == "Haarle" || $explodedTeamU[0] == "haarle") {
            $haarleU = 1;
        }
        $data .= '
        <tr>
            <td style="border: 1px solid black;">'.$rij[$key]['datum'].'</td>
            <td style="border: 1px solid black;">'.$rij[$key]['tijd'].'</td>
            <td style="border: 1px solid black; '; if($haarleT == 1){$data .= $haarleStyle; $haarleT =0;} $data .= '">'.$rij[$key]['thuisteam'].'</td>
            <td style="border: 1px solid black; '; if($haarleU == 1){$data .= $haarleStyle; $haarleU =0;} $data .= '">'.$rij[$key]['uitteam'].'</td>
            <td style="border: 1px solid black;" rowspan="2">'.$rij[$key]['scheidsrechter-1'].' '.$rij[$key]['scheidsrechter-2'].'</td>
            <td style="border: 1px solid black;" rowspan="2">'.$rij[$key]['zaaldienst'].'</td>
        </tr>
        <tr>
            <td style="border: 1px solid black;"> </td>
            <td style="border: 1px solid black;" colspan="3"> -</td>
        </tr>
        ';
        $i++;

    }
    if ($productSize == $i) {
        break;
    }
}
$data .= '</table>';

//write data to the pdf file
$mpdf->WriteHTML($data);

//output the pdf file to the browser
$mpdf->Output($archiveName, 'F');
$mpdf->Output();

?>