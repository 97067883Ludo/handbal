<?php
require "readxlsx.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Wedstrijd Handbal Haarle</title>
</head>
<body>    
    <div class="container-fluid p-5 bg-primary text-white text-center">
        <h1>Wedstrijd maker Handbal Haarle</h1>
        <h2>Hoofdpagina</h2>
    </div>
        <?php
            require 'printMenu.php';
            printMenu();
        ?>
    <div class="container mt-5">
        <?php
            
        ?>
    <form action="afvangenxlsx.php" method="post">
    <input type="submit" class="btn btn-success button" value="Verder ->">
        <?php
            writeHeader($header, $headerSize);
            walkThruxlsx();
        ?>
    </form>
    </div>
</body>
</html>