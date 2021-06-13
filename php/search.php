<?php
    session_start();
    $outgoing_id = $_SESSION['id'];
    include_once 'config.php';
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    $sql = "SELECT * FROM users WHERE fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%'";

    $output = "";

    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) > 0) {
        include_once "data.php";
    } else {
        $output .= 'Такой пользователь не зарегистрирован';
    }
    echo $output;
?>