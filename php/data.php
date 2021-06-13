<?php
    while ($row = mysqli_fetch_assoc($query)) {
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['id']}
                 OR ougoing_msg_id = {$row['id']}) AND (ougoing_msg_id = {$outgoing_id}
                 OR ougoing_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        if (mysqli_num_rows($query2) > 0) {
            $result = $row2['msg'];
        } else {
            $result = 'Сообщений нет';
        }

        (strlen($result) > 28) ? $msg = substr($result, 0, 28).'...' : $msg = $result;
        ($outgoing_id == $row2['ougoing_msg_id']) ? $you = "Вы: " : $you = '';
        ($row['status'] == 'Не в сети') ? $offline = 'offline' : $offline = '';
        $output .= "<a href='chat.php?user_id=".$row['id']."'>
                        <div class='users__content'>
                            <div class='users__avatar'>
                                <img src='php/images/avatars/". $row['image'] ."' alt='". $row['fname'] . ' ' . $row['lname'] ."'>
                            </div>
                            <div class='users__info'>
                                <span class='users__name'>". $row['fname'] . ' ' . $row['lname'] ."</span>
                                <p class='users__message--last'>". $you . $msg ."</p>
                            </div>
                            <div class='users__status-wrapper'>
                                <p class='users__status ". $offline ."'><i class='fas fa-circle'></i></p>
                            </div>
                        </div>
                    </a>";
    }
?>