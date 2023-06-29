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
        <div class="create_projects">
            <div class="create_projects_mainbox">
                <div class="create_projects_content">
                    <h1 class="create_projects_title admin_form_title">Добавление записи</h1>
                    <form class="create_projects_form admin_form" action="../php_handler/create_project.php" method="post">
                        <input class="create_projects_name admin_input_create" type="text" name="Name" placeholder="Наименование" required>
                        <?php
                            include "../php_connect/connect.php";

                            $qInfoIdOrder = "SELECT * FROM Orders";
                            addslashes($qInfoIdOrder);
                            $resInfoIdOrder = mysqli_query($connect, $qInfoIdOrder) or die(mysqli_error($connect));

                            echo "<select class=\"create_projects_id_order admin_input_create\" name=\"Date_of_receipt\">";
                            while ($InfoIdOrder = mysqli_fetch_object($resInfoIdOrder))
                            echo "<option name=\"".$InfoIdOrder->ID_Order."\" value=\"".$InfoIdOrder->ID_Order."\">".$InfoIdOrder->Date_of_receipt."</option>";
                            echo "</select>";
                            ?>
                        <input class="create_projects_button admin_form_create_button" type="submit" value="Добавить"/> 
                    </form>
                    <a class="create_projects_back admin_link_back" href="./projects.php">Вернуться к проектам</a>
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