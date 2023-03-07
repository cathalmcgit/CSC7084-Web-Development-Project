<?php
include "navbar.html";

session_start();

if (isset ($_SESSION["user_id"])) {
    include ("dbconn.php"); 

    $userinfo = "SELECT * FROM users WHERE id = {$_SESSION["user_id"]}";
    $result = $conn->query($userinfo); 

    if (!$result) {
        echo "<p> Info not available! </p>";
        exit($conn->error);
    }

    $user = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moodo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<style>
    footer {
        padding: 2rem 2rem 2rem !important;
    }

    #line {
        background-color: white;
    }
</style>

<body>

    <div class="hero has-background-white is-centered py-3">
        <center><img src="img/WebHeader2.png" alt="alternatetext" /></center>
    </div>

    <div class="columns has-background-info">

        <div class="column">
            <div class="content is-medium has-text-centered has-text-white py-2 px-6 mgh-large">
                <h2 class="title is-2 has-text-centered has-text-white">How Are You Today?</h2>

            <?php if (isset($user)){
                $username = $user['name'];
                $id = $user['id'];
                 echo "<p> Hello $username <p>";
                 echo "<p> <a href = 'logout.php'>Log out </a> </p>";
                 echo "<p> <a href = 'deleteaccount.php?deleteid=$id'>Delete Your Account </a> </p>";
                
            } else {
                 echo "<p><a href = 'login.php'>Log in </a> or <a href = 'signupfinal.php'>Sign Up </a>";
            } ?>
                
                

                <p class="content is-normal px-5 is-size-4">
                    This website provides users with the ability to log, track and revisit their moods
                </p>
                <button class="button is-white is-outlined" href ="logmood.php">Log Your Mood</button>
            </div>
        </div>
    </div>

    <hr id=line>
    

    <div class="columns is-mobile is-multiline has-background-info has-text-white has-text-centered">
        <div class="column is-7 px-6 py-3">

            <p class="content is-normal px-6 py-2 is-size-4">
                Tracking your mood can help you identify triggers,
                ongoing issues and when you might be feeling your best.
            </p>

            <button class="button is-white is-outlined" href ="moodlist.php">View Your Mood List</button>

            <p class="has-text-centered px-6 py-5 is-size-4">
                Tracking your mood can help you identify triggers,
                ongoing issues and when you might be feeling your best.
            </p>

            <button class="button is-white is-outlined" href ="moodsummary.php">View Your Mood Summary</button>
            <button type="button" onclick="alert('You pressed the button!')">Click me!</button>
        </div>

        <div class="column px-6 py-3">
            <p class="has-text-centered py-3 is-size-5">
                <img src="img/Moodo (1).gif" />
                This website provides users with the ability to log, track and revisit their moods
            </p>
        </div>

        <div class="hero">
            <img src="img/Divider4.png" alt="alternatetext" />
        </div>

        <?php
        include "footer.html";
        ?>

</body>

</html>