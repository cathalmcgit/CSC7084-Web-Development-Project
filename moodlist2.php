<?php
include("dbconn.php");

$name = "Mark";

$readSQL = "SELECT * FROM mood_data";

$result = $conn->query($readSQL);

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

    <div class="column">
            <div class="content is-medium has-text-centered has-text-white py-5 px-6 mgh-large">
            <div class="container">

<h2 class = "title is-2"> Mood List for <?php echo $name; ?> </h2>

<table class="table is-fullwidth is-bordered is-hoverable">
    <thead>
        <tr>
            <th>Mood</th>
            <th>Date & Time</th>
            <th>Trigger</th>
            
        </tr>
    </thead>

    <tbody>
        <?php
         
         foreach ($result as $row) {

                $valuedata = $row['mood'];
                $contextdata = $row['context'];
                $whendata = $row['mytime'];

                $formatdate = date("l jS F Y H:i:s", strtotime($whendata));


              echo "<div class='card'>
              <header class='card-header'>
    <p class='card-header-title'>
      $formatdate
    </p>
    </header>
              <div class='card-content'> 
                            <p>$valuedata</p>
                            <p> $contextdata</p>
                          </div> 
                          <footer class='card-footer'>
    <a href='#' class='card-footer-item'>Save</a>
    <a href='#' class='card-footer-item'>Edit</a>
    <a href='#' class='card-footer-item'>Delete</a>
  </footer>
                    </div>";
            }
        
        ?>
        

    </tbody>
</table>

</div>
            </div>
    </div>

    <?php

include "footer.html";

?>

</body>

</html>