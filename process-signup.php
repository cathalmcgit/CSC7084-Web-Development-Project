<?php

if (empty ($_POST["name"])) {
    echo ("Name is required");
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo ("Valid email is required");
}

if (strlen($_POST["password"]) <8) {
    echo ("Password must be at least 8 characters");
}

if (! preg_match("/[a-z]/i", $_POST["password"])){
    echo ("Password must contain at least one letter");
}

if (! preg_match("/[0-9]/", $_POST["password"])){
    echo ("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    echo ("Passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$conn = require "dbconn.php";

$sql = "INSERT INTO users (name, email, password_hash)
    VALUES (?,?,?)";

$stmt = $conn->stmt_init();

if (! $stmt->prepare($sql)) {
    echo ("SQL error : $conn->error");
}

$stmt->bind_param("sss",
                $_POST["name"],
                $_POST["email"],
                $password_hash);

if ($stmt->execute()) {
    header ("Location: signupsuccess.php");

    exit;

} else {

    if ($conn->errno === 1062) {
        echo ("Email already taken");
    } else {
        echo ($conn->error . " " . $conn->errno);
    }
}