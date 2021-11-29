<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
<div class="container-fluid p-5 bg-primary text-white text-center">
        <h1>Wedstrijd maker Handbal Haarle</h1>
        <h2>Checkpagina</h2>
    </div>


<div class="container mt-5">
<?php


$xml = simplexml_load_file("Wedstrijdlijst.xml") or die("er is een fout opgetreden bij het inladen van de lijst");
$selected = array();
$selected = $_POST['product'];
if ($selected == NULL) {
    header("Location: index.php");
}
$max = count($selected);
$ii =0;
$i =0;
$teller =1;

echo'
<table class="table">
<thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Datum</th>
        <th scope="col">Tijd</th>
        <th scope="col">ThuisTeam</th>
        <th scope="col">Uitteam</th>
        <th scope="col">Scheidsrechter 1</th>
        <th scope="col">Scheidsrechter 2</th>
        <th scope="col">Zaaldienst</th>
    </tr>
</thead>
<tbody>
';

foreach ($xml as $key => $value) {
    if ($max == $ii) {
        break;
    }
    if ($selected[$ii] == $i) {
        echo '
        <tr>
            <td> '.$teller.' </td>
            <td> '.$xml->$key[$i]->Datum.' </td>
            <td> '.$xml->$key[$i]->Tijd.' </td>
            <td> '.$xml->$key[$i]->Thuisteam.' </td>
            <td> '.$xml->$key[$i]->Uitteam.' </td>
            <td> '.$xml->$key[$i]->Scheidsrechter_1.' </td>
            <td> '.$xml->$key[$i]->Scheidsrechter_2.' </td>
            <td> '.$xml->$key[$i]->Zaaldienst.' </td>
        </tr>
    ';
        $teller++;
        $ii++;
    }
    $i++;
}

echo'
</tbody>
</table>
<form action="makepdf.php" method="post">


';
foreach ($selected as $key => $value) {
    echo'
    <input type="hidden" name="product[]" value="'.$value.'">
    ';
}

?>
<input type="submit" class="btn btn-success" value="maak pdf">
</form>
</div>
</body>
</html>