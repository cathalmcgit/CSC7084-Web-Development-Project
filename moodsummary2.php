<?php
include("dbconn.php");

$name = "Mark";

$readSQL = "SELECT * FROM moods";

$result = $conn->query($readSQL);

if (!$result) {
    exit($conn->error);
}

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



    <nav class="navbar is-link" role="navigation" aria-label="main navigation">

        <div class="navbar-brand">
            <a class="navbar-item" href="index.html">
            </a>
            <a class="navbar-item" href="index.html">
                <img src="img/logo7.png" width="112" height="28">
            </a>

            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href ="index.html">
                    Home
                </a>

                <a class="navbar-item">
                    Sessions
                </a>

                <a class="navbar-item">
                    Mood
                </a>

                <a class="navbar-item">
                    Contact
                </a>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        More
                    </a>

                    <div class="navbar-dropdown">
                        <a class="navbar-item">
                            About
                        </a>
                        <a class="navbar-item">
                            Jobs
                        </a>
                        <a class="navbar-item">
                            Contact
                        </a>
                        <hr class="navbar-divider">
                        <a class="navbar-item">
                            Report an issue
                        </a>
                    </div>
                </div>
            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <a class="button is-primary" href="signup.html">
                            <strong>Sign up</strong>
                        </a>
                        <a class="button is-light">
                            Log in
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

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