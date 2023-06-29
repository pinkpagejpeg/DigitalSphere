<!DOCKTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/DigitalSphere/scss/main.css">
        <title>DigitalSphere</title>
    </head>
    <body>
        <div class="create_clients">
            <div class="create_clients_mainbox">
                <div class="create_clients_content">
                    <h1 class="create_clients_title admin_form_title">Добавление записи</h1>
                    <form class="create_clients_form admin_form" action="../php_handler/create_client.php" method="post">
                        <input class="create_clients_surname admin_input_create" type="text" name="Surname" placeholder="Фамилия" required>
                        <input class="create_clients_name admin_input_create" type="text" name="Name" placeholder="Имя" required>
                        <input class="create_clients_middle_name admin_input_create" type="text" name="Middle_name" placeholder="Отчество">
                        <input class="create_clients_telephone admin_input_create" type="tel" name="Telephone" data-phone-pattern placeholder="Номер телефона" required>
                        <input class="create_clients_email admin_input_create" type="email" name="Email" placeholder="Электронная почта" required>
                        <input class="create_clients_button  admin_form_create_button" type="submit" value="Добавить"/> 
                    </form>
                    <a class="create_clients_back admin_link_back" href="./clients.php">Вернуться к клиентам</a>
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
        <script src="/DigitalSphere/js/telephone_mask.js"></script>
    </body>
</html>