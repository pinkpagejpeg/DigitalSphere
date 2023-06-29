<?php
    session_start(); 
    
    include "../php_connect/connect.php";
?>

<!DOCKTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <link rel="stylesheet" href="/DigitalSphere/scss/main.css">
        <title>DigitalSphere</title>
    </head>
    <body>
        <div class="auth">
            <div class="auth_mainbox">
                <div class="auth_content">
                    <h1 class="auth_title">Авторизация</h1>
                    <form class="auth_form" action="../php_handler/auth.php" method="post">
                        <input class="auth_login" type="text" name="login" placeholder="Введите логин" pattern = "[A-Za-z0-9]{4,}" title = "Логин не может быть короче 4 символов, использоваться могут только латинские символы и цифры." required>
                        <input class="auth_password" type="password" name="password" placeholder="Введите пароль" required>
                        <div class="g-recaptcha" data-sitekey="6LeFycomAAAAAGdx4nwdklPT2OzfUsTAaa37uvpx"></div>
                        <input class="auth_button" type="submit"  name="submit" value="Войти"/> 
                    </form>
                </div>
            </div>
        </div>   

        <div class="message">
            <?php
                if (isset($_SESSION['message'])) {
                    echo '<p class="message_text">' . $_SESSION['message'] . '</p>';
                } 
                else {
                    echo ' ';
                }
                unset($_SESSION['message']);
            ?>
        </div>
    </body>
</html>