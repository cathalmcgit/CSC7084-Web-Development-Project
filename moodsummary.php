<?php
include("dbconn.php");

$name = "Mark";

$readSQL = "SELECT * FROM moods";

$result = $conn->query($readSQL);

if (!$result) {
    exit($conn->error);
}

include "navbar.html";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mood Summary</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>

<body>

    <div class=container>
        <ul class>
            <li class="list-item"><a href="moodsummary.php">Schedule</a></li>
            <li class="list-item"><a href="logmood.php">Add</a></li>
        </ul>
    </div>

    <div class="section">
        <div class="container">
            <div>
                <div>

                    <h2 class="title is-2">Mood Summary</h2>


                    <div>
                        <?php
                        while ($row = $result->fetch_assoc()) {

                            $valuedata = $row['value'];
                            $contextdata = $row['context'];
                            $whendata = $row['datetime'];

                            $formatdate = date("l jS F Y", strtotime($whendata));

                            echo "<div>
<div>
<div class='card card-content'>
    <div class='content'>
<h3 class = 'card-header-title'>$formatdate</h3>
$valuedata
$contextdata
</div>
</div>
</div>
</div>";
                        }
                        ?>
                    </div>


                </div>
            </div>

</body>

</html>