<?php
    session_start();
    if (!isset($_SESSION['id'])) {
        header("location: /index.php");
    }
?>
<?php
    include_once "header.php";
?>
<body>
    <div class="container__chat">
        <section class="chat">
            <header class="chat__header">
                <?php
                    include_once "php/config.php";
                    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                    $sql = mysqli_query($conn, "SELECT * FROM users WHERE id = {$user_id}");
                    if (mysqli_num_rows($sql) > 0) {
                        $row = mysqli_fetch_assoc($sql);
                    }
                ?>
                <div class="chat__content">
                    <div class="chat__back">
                        <a href="/users.php"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <div class="chat__avatar">
                        <img src="php/images/avatars/<?php echo $row['image'] ?>" alt="<?php echo $row['fname'] . " " . $row['lname'] ?>">
                    </div>
                    <div class="chat__info">
                        <span class="chat__name"><?php echo $row['fname'] . " " . $row['lname'] ?></span>
                        <p class="chat__status"><?php echo $row['status'] ?></p>
                    </div>
                </div>
            </header>
            <div class="chat__container">

            </div>
            <form class="chat__send" action="/" autocomplete="off">
                <input type="text" name="outgoing_id" value="<?php echo $_SESSION['id']; ?>" hidden>
                <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                <input id="send" name="message" type="text" placeholder="Введите сообщение...">
                <button class="send-btn"><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>
    <script src="js/chat.js"></script>
    <script src="js/main.js"></script>
</body>
</html>