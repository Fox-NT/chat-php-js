<?php
    session_start();
    include_once 'config.php';
    $outgoing_id = $_SESSION['id'];
    $sql = "SELECT * FROM users WHERE NOT id = ${outgoing_id}";
    $output = '';
    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) == 1) {
        $output .= "Нет пользователей в сети";
    } elseif (mysqli_num_rows($query) > 0) {
        include_once 'data.php';
    }

    echo $output;

?>

