<?php
session_start();
if(isset($_SESSION['id'])){
    include_once "config.php";
    $outgoing_id = $_SESSION['id'];
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $output = "";
    $sql = mysqli_query($conn, "SELECT * FROM messages LEFT JOIN users ON users.id = messages.ougoing_msg_id
                WHERE (ougoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (ougoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id");
    if(mysqli_num_rows($sql) > 0){
        while($row = mysqli_fetch_assoc($sql)){
            if($row['ougoing_msg_id'] === $outgoing_id){
                $output .= '<div class="chat__message--outgoing message">
                                <div class="message__body">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
            }else{
                $output .= '<div class="chat__message--incoming message">
                                <img src="php/images/avatars/'.$row['image'].'" alt="">
                                <div class="message__body">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
            }
        }
    }else{
        $output .= '<div class="text">Сообщений нет...</div>';
    }
    echo $output;
}else{
    header("location: ../login.php");
}

?>