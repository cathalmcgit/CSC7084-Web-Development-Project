<?php

include "dbconn.php";

$id = $_GET['deleteid'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Mood</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>


<body>

    <?php
    $deleteSQL = "DELETE FROM mood_data WHERE id='$id'";

    $result = $conn->query($deleteSQL);

    if (!$result) {
        echo "<p>Unable to delete Mood Log!</p>";
        exit($conn->error);
    } else {
        echo "<p>Mood Log successfully deleted <a href = 'moodlist.php'>Back to Mood List</a></p>";
    }

    ?>

    <section class="section">
        <div class="container">
        </div>
    </section>


</body>

</html>