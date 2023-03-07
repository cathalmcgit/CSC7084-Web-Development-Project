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
    <title>Delete Account</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>


<body>

    <?php
    $deleteSQL = "DELETE FROM users WHERE id='$id'";

    $result = $conn->query($deleteSQL);

    if (!$result) {
        echo "<p>Unable to delete account!</p>";
        exit($conn->error);
    } else {
        echo "<p>Account Successfully Deleted <a href = 'index.php'>Back to Homepage</a></p>";
    }

    ?>

    <section class="section">
        <div class="container">
        </div>
    </section>


</body>

</html>