<?php


//if nothing is posted send user back to index.php
if (!isset($_POST['product'])) {
    header('Location: indexxlsx.php');
}

$product = $_POST['product'];
$productSize = count($product);

require_once __DIR__ . '/vendor/autoload.php';
require 'readxlsx.php';

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
echo$data;

$ii =0;
$i =0;
foreach ($rij as $key => $value) {
    if ($product[$i] == $key) {
        
    }
}


?>