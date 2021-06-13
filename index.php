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
        <section class="login">
            <header class="login__header">Онлайн-чат v.1.0.0</header>
            <form id="login-form" action="/">
                <div class="login__error">Текст ошибки</div>
                <div class="login__info">
                    <div class="field text login__email">
                        <label for="login-email">Ваш E-Mail</label>
                        <input id="login-email" name="email" type="text" placeholder="Ваш E-Mail" required>
                    </div>
                    <div class="field text password">
                        <label for="pass">Пароль</label>
                        <input class="pass-field" id="pass" name="password" type="password" placeholder="Введите пароль" required>
                        <i class="fas fa-eye show-pass-btn"></i>
                    </div>
                </div>
                <div class="login__submit">
                    <button id="login-submit" type="submit">Войти</button>
                </div>
            </form>
            <div class="signup-text">Еще не зарегистрированы? <a href="/signup.php">Регистрация</a></div>
        </section>
    </div>
    <script src="js/login.js"></script>
    <script src="js/main.js"></script>
</body>
</html>