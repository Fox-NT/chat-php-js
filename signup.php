<?php
    session_start();
    if (isset($_SESSION['id'])) {
        header("location: /users.php");
    }
?>
<?php
    include_once "header.php";
?>
<body>
    <div class="container">
        <section class="signup">
            <header class="signup__header">Онлайн-чат v.1.0.0</header>
            <form id="signup-form" action="/" enctype="multipart/form-data">
                <div class="signup__error">Текст ошибки</div>
                <div class="signup__info">
                    <div class="signup__name">
                        <div class="field text signup__firstname">
                            <label for="signup-firstname">Ваше имя</label>
                            <input id="signup-firstname" name="fname" type="text" placeholder="Ваше имя" required>
                        </div>
                        <div class="field text signup__lastname">
                            <label for="signup-lastname">Ваша фамилия</label>
                            <input id="signup-lastname" name="lname" type="text" placeholder="Ваша фамилия" required></div>
                    </div>
                    <div class="field text signup__email">
                        <label for="signup-email">Ваш E-Mail</label>
                        <input id="signup-email" name="email" type="text" placeholder="Ваш E-Mail" required>
                    </div>
                    <div class="field text password">
                        <label for="pass">Пароль</label>
                        <input class="pass-field" id="pass" name="password" type="password" placeholder="Введите пароль" required>
                        <i class="fas fa-eye show-pass-btn"></i>
                    </div>
                    <div class="field text signup__password--confirm">
                        <label for="signup-confirm">Подтвердите пароль</label>
                        <input class="pass-field" id="signup-confirm" name="confirm" type="password" placeholder="Подтвердите пароль">
                        <i class="fas fa-eye show-pass-btn"></i>
                    </div>
                    <div class="field img signup__avatar">
                        <label for="signup-avatar">Выберите Ваш аватар</label>
                        <input id="signup-avatar" name="image" type="file" required>
                    </div>
                </div>
                <div class="signup__submit">
                    <button id="signup-submit"  type="submit">Зарегистрироваться</button>
                </div>
            </form>
            <div class="login-text">Уже зарегистрированы? <a href="/index.php">Войти</a></div>
        </section>
    </div>
    <script src="js/signup.js"></script>
    <script src="js/main.js"></script>
</body>
</html>