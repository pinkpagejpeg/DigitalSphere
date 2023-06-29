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
        <div class="edit_services">
            <div class="edit_services_mainbox">
                <div class="edit_services_content">
                    <h1 class="edit_services_title admin_form_title">Редактирование записи</h1>
                    <?php
                        include "../php_connect/connect.php";

                        if(isset($_GET['idA'])) {
                            $service = $_GET['idA'];
                        }

                        echo "<form class=\"edit_services_form admin_form\" action=\"../php_handler/edit_service.php?idA=$service\" method=\"post\">";

                        $qInfoService = "SELECT * FROM Services WHERE ID_Service='$service'";
                        addslashes($qInfoService);
                        $resInfoService = mysqli_query($connect, $qInfoService) or die(mysqli_error($connect));
                        $InfoService = mysqli_fetch_object($resInfoService);
                    ?>  

                        <input class="edit_services_name admin_input_edit" type="text" name="Name" value="<?php echo "".$InfoService->Name.""; ?>" required>
                        <?php
                            include "../php_connect/connect.php";

                            $qInfoIdType = "SELECT * FROM Type_of_services";
                            addslashes($qInfoIdType);
                            $resInfoIdType = mysqli_query($connect, $qInfoIdType) or die(mysqli_error($connect));

                            echo "<select class=\"create_services_id_type admin_input_edit\" name=\"Type_name\">";
                            while ($InfoIdType = mysqli_fetch_object($resInfoIdType))
                            echo "<option name=\"".$InfoIdType->ID_Type_of_service."\" value=\"".$InfoIdType->ID_Type_of_service."\">".$InfoIdType->Name."</option>";
                            echo "</select>";
                            ?>
                        <input class="edit_services_button admin_form_edit_button" type="submit" value="Редактировать"/> 
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