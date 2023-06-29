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
        <div class="create_groups">
            <div class="create_groups_mainbox">
                <div class="create_groups_content">
                    <h1 class="create_groups_title admin_form_title">Добавление записи</h1>
                    <form class="create_groups_form admin_form" action="../php_handler/create_group.php" method="post">
                        <input class="create_groups_name admin_input_create" type="text" name="Name" placeholder="Наименование" required>
                        <input class="create_groups_button admin_form_create_button" type="submit" value="Добавить"/> 
                    </form>
                    <a class="create_groups_back admin_link_back" href="./groups.php">Вернуться к группам</a>
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