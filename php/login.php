<?php
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (!empty($email) && !empty($password)) {
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND pass = '{$password}'");
        if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
            $status = 'В сети';
            $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE id = {$row['id']}");
            if ($sql2) {
                $_SESSION['id'] = $row['id'];
            }
            echo 'Выполнено';
        } else {
            echo 'E-Mail или Пароль введены неверно';
        }
    } else {
        echo 'Заполнены не все поля';
    }
?>
