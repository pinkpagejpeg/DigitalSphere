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
        <div class="create_services">
            <div class="create_services_mainbox">
                <div class="create_services_content">
                    <h1 class="create_services_title admin_form_title">Добавление записи</h1>
                    <form class="create_services_form admin_form" action="../php_handler/create_service.php" method="post">
                        <input class="create_services_name admin_input_create" type="text" name="Name" placeholder="Наименование" required>
                        <?php
                            include "../php_connect/connect.php";

                            $qInfoIdType = "SELECT * FROM Type_of_services";
                            addslashes($qInfoIdType);
                            $resInfoIdType = mysqli_query($connect, $qInfoIdType) or die(mysqli_error($connect));

                            echo "<select class=\"create_services_id_type admin_input_create\" name=\"Type_name\">";
                            while ($InfoIdType = mysqli_fetch_object($resInfoIdType))
                            echo "<option name=\"".$InfoIdType->ID_Type_of_service."\" value=\"".$InfoIdType->ID_Type_of_service."\">".$InfoIdType->Name."</option>";
                            echo "</select>";
                            ?>
                        <input class="create_services_button admin_form_create_button" type="submit" value="Добавить"/> 
                    </form>
                    <a class="create_services_back admin_link_back" href="./services.php">Вернуться к услугам</a>
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