<?php

include "dbconn.php";

$id = $_POST['mood_id'];

$new_mood = $conn->real_escape_string($_POST['mood']);
$new_trigger = $_POST['trigger'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processing Edit Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>


<body>

    <?php
    $updateSQL = "UPDATE mood_data SET mood='$new_mood', context = '$new_trigger' WHERE id='$id'";

    $result = $conn->query($updateSQL);

    if (!$result) {
        echo "<p>Unable to perform update!</p>";
        exit($conn->error);
    } else {
        echo "<p>Mood Log successfully updated <a href = 'moodlist.php'>Back to Mood List</a></p>";
    }

    ?>

    <section class="section">
        <div class="container">
        </div>
    </section>


</body>

</html>