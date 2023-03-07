<?php

    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "moodo";

    $conn = new mysqli($host, $user, $password, $dbname);


    if ($conn->connect_error) {
        exit("Connection Error: $conn->connect_error");
    } 

    return $conn;