<?php
include ("dbconn.php"); 

if (isset ($_POST['submitted'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $psword = $conn->real_escape_string($_POST['password']);
}

$insertSQL = "INSERT INTO users (username, email, psword) VALUES 
('$name','$email', '$psword')";   

    $result = $conn->query($insertSQL); 

    if (!$result) {
        echo "<p> Unable to insert into database table! </p>";
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
    <title>Log Your Mood</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<style>
    footer {
        padding: 2rem 2rem 2rem !important;
    }
</style>

<body>


<section class="section is-fullheight is-vcentered">

<h1 class = 'title'>Sign Up</h1>

<form action="process-signup.php" method="post" novalidate>
   
    <div class="field is-vcentered">
        <label class="label" for="name">Name</label>
     <div class="control">
        <input type="text" id="name" name="name" placeholder="Enter name">
    </div>
</div>
 
    <div class="field is-vcentered">
        <label class="label" for="email">Email</label>
        <div class="control"></div>
        <input type="email" id="email" name="email" placeholder="example@email.com">
    </div>


    <div class="field is-vcentered">
        <label class="label" for="password">Password</label>
        <div class="control"></div>
        <input type="password" id="password" name="password" placeholder="Enter password">
    </div>


    <div class="field is-vcentered">
        <label class="label" for="password_confirmation">Repeat Password</label>
        <div class="control"></div>
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Re-enter password">
    </div>

    <div class="control is-vcentered">
    <input class = "button is-primary is-rounded" type="submit" value="Sign Up" name="submitted">
</div>
</form>
</section>
    
                <?php
            include ("footer.html");
            ?>

</body>
</html>