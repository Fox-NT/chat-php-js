<?php
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm = mysqli_real_escape_string($conn, $_POST['confirm']);

    if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if ($password === $confirm) {
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                if (mysqli_num_rows($sql) > 0){
                    echo "$email - Этот E-mail уже зарегистрирован!";
                }else{
                    if (isset($_FILES['image'])) {
                        $img_name = $_FILES['image']['name'];
                        $img_type = $_FILES['image']['type'];
                        $tmp_name = $_FILES['image']['tmp_name'];

                        $img_explode = explode('.', $img_name);
                        $img_ext = end($img_explode);

                        $extensions = ['png', 'jpeg', 'jpg'];
                        if (in_array($img_ext, $extensions) === true) {
                            $time = time();
                            $new_img_name = $time.$img_name;
                            if (move_uploaded_file($tmp_name, 'images/avatars/'.$new_img_name)) {
                                $status = 'В сети';
                                $random_id = rand(time(), 10000000);

                                $sql2 = mysqli_query($conn, "INSERT INTO users (id, fname, lname, email, pass, image, status)
                                                               VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");
                                if ($sql2) {
                                    $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                    if(mysqli_num_rows($sql3) > 0) {
                                        $row = mysqli_fetch_assoc($sql3);
                                        $_SESSION['id'] = $row['id'];
                                        echo 'Выполнено';

                                    }
                                } else {
                                    echo 'Произошла какая-то ошибка. Попробуйте еще раз!';
                                }
                            }
                        } else {
                            echo 'Пожалуйста, выберите другое изображение - jpeg, jpg, png!';
                        }
                    } else {
                        echo 'Пожалуйста, выберите аватарку!';
                    }
                }
            } else {
             echo 'Пароли не совпадают';
            }
        } else {
            echo 'Этот адрес электронной почты неверный!';
        }
    } else {
        echo 'Все поля должны быть заполнены!';
    }
?>