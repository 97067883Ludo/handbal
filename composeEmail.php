<?php
if (!isset($_POST['fileName'])) {
    header('Location: archive.php');
    return;
}
    $file = $_POST['fileName'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="ajax.js"></script>
    <title>Email opstellen</title>
</head>

<body>
    <div class="container-fluid p-5 bg-primary text-white text-center">
        <h1>Wedstrijd maker Handbal Haarle</h1>
        <h2>Email Opstellen</h2>
    </div>
<?php

    echo'
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6">
                <div id="mailStatus"></div>
                <h3>Email Opstellen</h3>
                    <div class="input-group">
                        <span class="input-group-text mt-3">Aan</span>
                        <input type="email" class="form-control mt-3" id="Email" placeholder="naam@voorbeeld.nl">
                    </div>
                    <div class="input-group">
                        <span class="input-group-text mt-3">Onderwerp</span>
                        <input type="text" class="form-control mt-3" id="Subject" placeholder="Onderwerp" name="Subject">
                    </div>
                    <textarea class="form-control mt-3" rows="5" id="Message" name="Message"></textarea>
                    <input type="hidden" id="file" value="archive/'.$file.'" name="fileName">
                    <button type="submit" onclick="sendMail()" id="send" class="btn btn-primary mt-3">Verstuur</button>
            </div>
            <div class="col-sm-6">
            <h3>Voorbeeld</h3>
                <div class="embed-responsive embed-responsive-21by9">
                    <iframe class="embed-responsive-item" width="100%" height="600px" src="archive/'.$file.'#toolbar=0"></iframe>
                </div>
            </div>
        </div>
    </body>
    ';
?>

</html>