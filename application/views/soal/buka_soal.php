<!DOCTYPE html>
<html lang="en" moznomarginboxes mozdisallowselectionprint>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url('assets/img/logo.png') ?>">

    <title><?= $title ?></title>
</head>

<body>
    <?php

    // The location of the PDF file 
    // on the server 
    $filename = $soal;

    // Header content type 
    header("Content-type: application/pdf");

    header("Content-Length: " . filesize($filename));

    // Send the file to the browser. 
    readfile($filename);
    ?>
</body>

</html>