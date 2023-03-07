<?php
include ("dbconn.php"); 



if (isset ($_POST['submitted'])) {
    $mood =$conn->real_escape_string($_POST['mood']);
    $trigger = $_POST['trigger'];
}
$a=date("Y-m-d H:i:s");
$insertSQL = "INSERT INTO mood_data (mood, context) VALUES 
('$mood','$trigger')";   

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


    <div class="columns has-background-info">

        <div class="column">
            <div class="content is-medium has-text-centered has-text-white py-5 px-6 mgh-large">
                <h2 class="title is-2 has-text-centered has-text-white">How Are You Today?</h2>
                <p class=px-6>
                    This website provides users with the ability to log, track and revisit their moods
                    This website provides users with the ability to log, track and revisit their moods
                    This website provides users with the ability to log, track and revisit their moods
                </p>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="container">
            <form action=<?php echo $_SERVER['PHP_SELF']; ?> method="post">

            <div class="columns is-mobile is-multiline has-background-warning has-text-white has-text-centered">
                    <div class="column is-7 px-6 py-5">
                        
                    <div class="field">
                    <label class="label is-size-5" for="mood-input">How are you feeling today?</label>
                    <div class="select is-large">
                        <select name="mood" id="mood-input">

                        <?php

                    if ($fav == "Meat") {
                        echo "<option selected>Meat</option>
                        <option>Fish</option>
                    <option>Vegetables</option>
                    <option>Desert</option>";
                    } elseif ($fav == "Fish") {
                    echo " <option selected>Fish</option>
                    <option>Vegetables</option>
                    <option>Desert</option>
                    <option>Meat</option>";
                    } elseif ($fav == "Vegetables") {
                        echo " 
                        <option selected >Vegetables</option>
                        <option>Desert</option>
                        <option>Meat</option>
                        <option >Fish</option>";
                    } elseif ($fav == "Desert") {
                        echo " 
                        <option selected >Desert</option>
                        <option>Vegetables</option>
                        <option>Meat</option>
                        <option >Fish</option>";
                    }
                    ?>

                            <option>Happy 😊</option>
                            <option>Sad 😟 </option>
                            <option>Angry 😡</option>
                            <option>Tired 🥱</option>
                            <option>Sick 🤢</option>
                        </select>
                    </div>
                    </div>
                </div>

                    
                <div class="column px-6 py-3">
                <div class="field">
                    <label class="label is-size-5" for="trigger-input">Is there a reason you feel that way? (optional)</label>
                    <div class="control">
                        <input class="input is-medium" name="trigger" type=“text” placeholder="Tell us more..." id=“trigger-input”>
                    </div>
                </div>
                </div>

                </div>
            <div class="content is-medium has-text-centered has-text-white py-4 px-5 mgh-large">
                <div class="field">
                    <div class="control">
                        <input class="button is-success is-medium" type="submit" value="Submit" name="submitted">
                    </div>
                </div>
            </div>
            </form>
        </div>
        
    </section>
    
                <?php
            include ("footer.html");
            ?>

</body>

</html>