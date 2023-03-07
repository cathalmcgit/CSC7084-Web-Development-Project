<?php

    $mood_id = $_GET['editid'];

    $endpoint = 'http://localhost/TestSite/api.php?mood=$mood_id';

    $resource = file_get_contents($endpoint);

    $data = json_decode($resource,true);

include "navbar.html";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mood</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>

<body>

    <?php
    foreach ($data as $row) {
        $mood = $row['mood'];
        $trigger = $row['context'];
    }
    ?>

    <section class="section">
        <div class="container">

            <h1 class='title'> Edit Favourite </h1>
            <form action="editprocessing.php" method="post">

                <div class="columns is-mobile is-multiline has-background-warning has-text-white has-text-centered">
                    <div class="column is-7 px-6 py-5">

                        <div class="field">
                            <label class="label is-size-5" for="mood-input">How are you feeling today?</label>
                            <div class="select is-large">
                                <select name="mood" id="mood-input">

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
                                <input class="input is-medium" name="trigger" type=“text” value ="<?php echo $trigger ?>" id=“trigger-input”>
                            </div>
                        </div>
                    </div>
                </div>
                
                <input type="hidden" value="<?php echo $mood_id; ?>" name="mood_id">
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


</body>
</html>