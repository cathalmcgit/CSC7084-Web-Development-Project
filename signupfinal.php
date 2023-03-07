<?php

include "navbar.html";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<style>
    footer {
        padding: 2rem 2rem 2rem !important;
    }
</style>

<body>

    <div class="has-background-info">

    <div class="content is-medium has-text-centered has-text-white py-5 px-6 mgh-large">
                <h2 class="title is-2 has-text-centered has-text-white">Sign Up</h2>
                <p class=px-6>
                    This website provides users with the ability to log, track and revisit their moods
                </p>
            </div>
        </div>

    <section class="section">
        <form action="process-signup.php" method="post" novalidate>

        <div class="columns has-background-info">

<div class="column">
    <div class="content is-medium has-text-centered has-text-white py-2 px-3 mgh-large">
        
        <div class="field">
            <label class="label is-size-5" for="name-input">Name</label>
         <div class="control">
            <input class="input is-medium" name="name" type ="text" placeholder="Enter name" id="name-input">
        </div>
    </div>

    <div class="field">
            <label class="label is-size-5" for="email-input">Email</label>
            <div class="control">
            <input class="input is-medium"  name="email" type ="email" placeholder="example@email.com" id="email-input">
            </div>
        </div>

        <div class="field">
            <label class="label is-size-5" for="password-input">Password</label>
            <div class="control">
            <input class="input is-medium" type = "password" id="password-input" name="password" placeholder="Enter password">
            </div>
        </div>

        <div class="field">
            <label class="label is-size-5" for="password_confirmation">Repeat Password</label>
            <div class="control">
            <input class="input is-medium" type = "password" id="password_confirmation" name="password_confirmation" placeholder="Re-enter password">
            </div>
        </div>

    </div>
</div>
                </div>

            <div class="content is-medium has-text-centered has-text-white py-4 px-5 mgh-large">
                <div class="field">
                    <div class="control">
                        <input class="button is-success is-medium" type="submit" value="Sign Up" name="submitted">
                    </div>
                </div>
            </div>

</form>
    </section>

    <?php
            include ("footer.html");
            ?>
            
</body>
</html>