<?php
    global $connection;
    $serverName = 'localhost';
    $user = "root";
    $password = "";

    $db = "faq_system";

    $connection = new mysqli($serverName, $user, $password, $db);

    if ($connection->connect_error > 0) {
        echo "Cobnnection Has error " . $connection->connect_error;
    }
?>