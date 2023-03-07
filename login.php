<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $conn = require "dbconn.php";

    $sql = sprintf("SELECT * FROM users
            WHERE email = '%s'",
          $conn->real_escape_string($_POST["email"])) ;

    $result = $conn->query($sql);

    $user = $result->fetch_assoc();

    if ($user) {

       if (password_verify($_POST["password"], $user["password_hash"])) {
        
            session_start();

            session_regenerate_id();

            $_SESSION["user_id"] = $user["id"];

            header("Location: index.php");

       }
    }

    $is_invalid = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>

<body>

    <h1 class='title'>Login</h1>

    <?php if ($is_invalid):?>
        <em>Invalid Login</em>
        <?php endif; ?>

    <form method="post">
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email"
            value = "<?= htmlspecialchars ($_POST["email"] ?? "") ?>">
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>

        <button>Login</button>
    </form>

</body>

</html>