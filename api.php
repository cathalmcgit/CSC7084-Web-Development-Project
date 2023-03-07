<?php

header ("Content-Type: application/json");

if ($_SERVER ['REQUEST_METHOD'] === 'GET') {
    include "dbconn.php";

$readSQL = "SELECT * FROM mood_data";

$result = $conn->query($readSQL);

if (!$result) {
    exit($conn->error);
}

$api_response = array();

while ($row = $result->fetch_assoc()) {
    array_push($api_response, $row);
}

$response = json_encode($api_response);

if ($response != false) {
    http_response_code(200);
    echo $response;
} else {
    http_response_code(404);
    echo json_encode(["message" => "Unable to perform GET!"]);
}

}

if (($_SERVER['REQUEST_METHOD']==='POST') && (isset($_GET['addmood']))) {

    include "dbconn.php";

    parse_str(file_get_contents('php://input'), $_DATA);

    $mood = $conn->real_escape_string($_DATA["newmood"]);
    $trigg = $conn->real_escape_string($_DATA["newtrigger"]);

    $insertSQL = "INSERT INTO mood_data (mood, context) VALUES ('$mood','$trigg')";   

    $result = $conn->query($insertSQL);
    if (!$result) {
        http_response_code(400);
        exit($conn->error);
    } else {
        http_response_code(201);
        $last_id = $conn->insert_id;
        echo json_encode(["message" => "New Mood Log added at id = $last_id"]);
    }
}


?>