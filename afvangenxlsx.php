<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    require 'printMenu.php';
    require "readxlsx.php";
    printMenu();
    ?>
    <div class="container mt-5">
        <?php

        if (!isset($_POST['product'])) {
            header("Location: /handbal/handbal/indexxlsx.php");
        }

        $product = $_POST['product'];
        $productSize = count($product);

        writeHeader($header, $headerSize);

        $i = 0;
        $teller = 1;
        foreach ($rij as $key => $value) {
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
            if ($productSize == $i) {
                break;
            }
        }
        echo'
        </tbody>
        </table>
        <form action="makepdf.php" method="post">
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