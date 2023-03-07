<?php
include("dbconn.php");

if (isset($_POST['formsubmit'])) { 
    $details = $conn->real_escape_string($_POST['new_details']); 
    $date = $_POST['new_date']; 

    $insertSQL = "INSERT INTO moods (items, mydate) VALUES 
('$details','$date')"; 

    $result = $conn->query($insertSQL); 
 
    if (!$result) { 
        exit($conn->error); 
    } else { 
        header('Location: index.php'); 
        exit; 
    } 

    $readSQL = "SELECT * FROM moods";

$result = $conn->query($readSQL);

if (!$result) {
    exit($conn->error);
}
}

include "navbar.html";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mood Summary</title>
</head>

<body>

    <div>
        <div>

            <nav>

                <div>
                    <img src="./img/logo7.png">

                    <ul class>
                        <li><a href="moodsummary.php">Schedule</a></li>
                        <li><a href="logmood.php">Add</a></li>
                    </ul>
                </div>

            </nav>
        </div>
    </div>

    <div>
        <div>

            <h2>My Schedule</h2>


            <div class="uk-section uk-background-muted">
        <div class="uk-container">

            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="uk-grid-small" uk-grid>
                <div class="uk-width-3-4@s">
                    <input class="uk-input" name="new_details" type="text" placeholder="Enter some 
details..." required>
                </div>

                <div class="uk-width-1-4@s"> 
     <input class="uk-input" name="new_date" type="date" required>
                </div>

                <div class="uk-width-1-4@s"> 
     <div uk-form-custom>
       <button class =" uk-button uk-button-primary uk-button-large" name="formsubmit">Add</button>
                </div>
        </div>

        </form>

    </div>
    </div>

</body>

</html>