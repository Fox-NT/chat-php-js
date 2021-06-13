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
    <div class="container">
        <section class="users">
            <?php
                include_once "php/config.php";
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE id = {$_SESSION['id']}");
                if (mysqli_num_rows($sql) > 0) {
                    $row = mysqli_fetch_assoc($sql);
                }
            ?>
            <header class="users__header">
                <div class="users__content">
                    <div class="users__avatar">
                        <img src="php/images/avatars/<?php echo $row['image'] ?>" alt="<?php echo $row['fname'] . " " . $row['lname'] ?>">
                    </div>
                    <div class="users__info">
                        <span class="users__name"><?php echo $row['fname'] . " " . $row['lname'] ?></span>
                        <p class="users__status"><?php echo $row['status'] ?></p>
                    </div>
                </div>
                <div class="users__logout">
                    <a href="php/logout.php?user_id=<?php echo $row['id'] ?>">Выход</a>
                </div>
            </header>
            <div class="users__search">
                <label for="search">Выберите с кем хотите начать диалог</label>
                <input id="search" type="text" placeholder="Введите имя пользователя...">
                <button class="search--btn"><i class="fas fa-search"></i></button>
            </div>
            <div class="users__list">

            </div>
        </section>
    </div>
    <script src="js/users.js"></script>
    <script src="js/main.js"></script>
</body>
</html>