<?php


if (isset($_POST['submitted'])) {

    $mood = $_POST['newmood'];
$trigg = ($_POST['newtrigger']);

$endpoint = "http://localhost/TestSite/api.php?addmood";

$postdata = http_build_query(
    array(
        'newmood' => $mood,
        'newtrigger' => $trigg
    )
);

$opts = array(
    'http' => array(
        'method' => 'POST',
        'header' => 'Content-Type: application/x-www-formurlencoded',
        'content' => $postdata
    )
    );

    $context = stream_context_create($opts);
    $resource = file_get_contents($endpoint, false, $context);
}





//echo"<p>Movie = ($name), Year = ($release_year), Is winner? ($winner)</p>";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oscar Winners!</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
</head>
<body>
   <?php

    if($resource === FALSE) {
        exit("Unable to add movie!");
    } else {
        echo "<p>Movie successfully added <a href = 'oscarsindex.php'>Back to Movies</a></p>";
    }

   ?>
</body>
</html>