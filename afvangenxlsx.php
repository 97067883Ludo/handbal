<?php
require "readxlsx.php";

if (!isset($_POST['product'])) {
    header("Location: /handbal/handbal/indexxlsx.php");
}

$product = $_POST['product'];
$productSize = count($product);
echo $productSize;

$i =0;
foreach ($rij as $key => $value) {
    if ($product[$i] == $key) {
        echo $value['datum']. "<br/>" . $value['thuisteam'] . "<br/>";
        $i++;
    }
    if ($productSize == $i) {
        return;
    }
}

?>