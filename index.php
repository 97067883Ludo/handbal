<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Wedstrijd maker Handbal Haarle</title>
</head>

<body>
    <div class="container-fluid p-5 bg-primary text-white text-center">
        <h1>Wedstrijd maker Handbal Haarle</h1>
        <h2>Hoofdpagina</h2>
    </div>
    <div class="container mt-5">
    <a href="readcsv.php" class="btn btn-danger button">update lijst</a>
    <form action="afvangen.php" method="post">
    <input type="submit" class="btn btn-success button" value="Verder ->">
        <?php


        $xml = simplexml_load_file("Wedstrijdlijst.xml") or die("Fout bij het laden van bestand...");

        $i = 0;
            echo'
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Datum</th>
                    <th scope="col">Tijd</th>
                    <th scope="col">ThuisTeam</th>
                    <th scope="col">Uitteam</th>
                    <th scope="col">Scheidsrechter_1</th>
                    <th scope="col">Scheidsrechter_2</th>
                    <th scope="col">Zaaldienst</th>
                </tr>
            </thead>
            <tbody>
            ';
        foreach ($xml as $x => $value) {
            echo '
                    <tr>
                        <th> <input type="checkbox" name="product[]" value="' . $i . '" id=""> </th>
                        <td> '.$xml->$x[$i]->Datum.' </td>
                        <td> '.$xml->$x[$i]->Tijd.' </td>
                        <td> '.$xml->$x[$i]->Thuisteam.' </td>
                        <td> '.$xml->$x[$i]->Uitteam.' </td>
                        <td> '.$xml->$x[$i]->Scheidsrechter_1.' </td>
                        <td> '.$xml->$x[$i]->Scheidsrechter_2.' </td>
                        <td> '.$xml->$x[$i]->Zaaldienst.' </td>
                    </tr>
                ';
            $i++;
        }
        echo'
        </tbody>
        </table>
        ';
        ?>
        <input type="submit" class="btn btn-success button" value="Verder ->">
            </tbody>  
    </form>
</div>
</body>

</html>