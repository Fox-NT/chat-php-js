<?php
    $ip = 'localhost';
    $db = 'chat';
    $db_user = 'chat';
    $db_pass = 'chat123';
    $conn = mysqli_connect($ip, $db_user, $db_pass, $db);

    if(!$conn) {
        echo 'Database connected' . mysqli_connect_error();
    }
?>