<?php
 $name = "Mark";

include "navbar.html";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mood List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<style>
    footer {
        padding: 2rem 2rem 2rem !important;
    }
</style>

<body>
<?php
 $endpoint = "http://localhost/TestSite/api.php";
 $resource = file_get_contents($endpoint);
 $data = json_decode($resource, true);

?>

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
            <th>Edit</th>
            <th>Delete</th>
            
        </tr>
    </thead>

    <tbody>
        <?php
         
         foreach ($data as $row) {

                $valuedata = $row['mood'];
                $contextdata = $row['context'];
                $whendata = $row['mytime'];
                $id = $row['id'];

                $formatdate = date("l jS F Y H:i:s", strtotime($whendata));

                echo "<tr> 
                <td>$valuedata</td> 
                <td>$formatdate</td> 
                <td>$contextdata</td>
                <td><a href ='editform.php?editid=$id' class = 'button is-primary'>Edit</a></td>
                <td><a href ='deleteform.php?deleteid=$id' class = 'button is-danger'>Delete</a></td>
                </tr>";
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