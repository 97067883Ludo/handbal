<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>checkpagina</title>
</head>

<body>
    <div class="container-fluid p-5 bg-primary text-white text-center">
        <h1>Wedstrijd maker Handbal Haarle</h1>
        <h2>Check pagina</h2>
    </div>
    <?php
            //als er geen post is geset wijs dan weer terug naar index.php
            if (!isset($_POST['product'])) {
                header("Location: index.php");
            }
            else{
                //Als er wel een post is gestuurd haal de post op.
                $product = $_POST['product'];
                //Tel hoeveel elementen er in de variabel product zitten.
                $productSize = count($product);
            }
        //Require and load printmenu.php and readxlsx.php.
        require 'printMenu.php';
        require "readxlsx.php";
        //Call printmenu function to print the menu.
        printMenu();
    ?>
    <div class="container mt-5">
    <?php

        //Print header van de tabel.
        writeHeader($header, $headerSize);
        //Defineer een 2 tellers.
        $i = 0;
        //Defineer de teller die op het scherm wordt weergegeven.
        $teller = 1;
        //Loop door het xlsx van file readxslx.php.
        foreach ($rij as $key => $value) {
            //Als er een match is tussen de key en het product element print de regel.
            if ($product[$i] == $key) {
                echo '
                <tr>
                <td>' . $teller . '</td>
                <td> ' . $value['datum'] . '</td>
                <td>' . $value['tijd'] . '</td>
                <td>' . $value['thuisteam'] . '</td>
                <td>' . $value['uitteam'] . '</td>
                <td>' . $value['scheidsrechter-1'] . '</td>
                <td>' . $value['scheidsrechter-2'] . '</td>
                <td>' . $value['zaaldienst'] . '</td>
                </tr>
                ';
                $teller++;
                $i++;
            }
            //Als er geen elementen meer in product zijn break uit de foreach loop.
            if ($productSize == $i) {
                break;
            }
        }
        //Print een onzichtbare form die de items door post naar makepdfxlsx.php
        echo'
        </tbody>
        </table>
        <form action="makepdfxlsx.php" method="post">
        ';
        foreach ($product as $key => $value) {
            echo'
            <input type="hidden" name="product[]" value="'.$value.'">
            ';
        }

    ?>
        <input type="submit" class="btn btn-success" value="maak pdf">
    </div>
</body>
</html>
