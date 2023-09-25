<?php
    session_start();

    include "../php_connect/connect.php";

    if (isset($_SESSION['id_user'])) {
        $IDuser = $_SESSION['id_user'];
        if($IDuser === '') {
            unset($IDuser);
        }
    }
    
?>

<DOCKTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/DigitalSphere/scss/main.css">
        <title>DigitalSphere</title>
    </head>
    <body>
        <div class="container">
            <?php
                include "../php_handler/header.php";
            ?>
        </div>

        <div class="container">
        <?php

        if (isset($IDuser)) {
            if (isset($roles)) {
                if ($roles == 'Администратор') {
                    echo "
            <div class='admin_table_mainbox'> 
                <div class='admin_table_topline'> 
                    <h1 class='admin_table_title'>Услуги</h1> 
                    <a class='admin_table_button_add' href='./create_services.php'>Добавить запись</a>
                </div>";

                try {
                    if (isset($_GET['idD'])) {
                        $serviceD = $_GET['idD'];
                        $qDeleteService = "DELETE FROM `Services` WHERE ID_Service='$serviceD'";
                        addslashes($qDeleteService);
                        $resDeleteService = mysqli_query($connect, $qDeleteService) or die(mysqli_error($connect));
                    }
                }
                catch (Exception $e) {
                    echo "<p class=\"admin_table_error_title main_text\">Нарушение целостности базы данных:</p>";
                    echo "<p class=\"main_text admin_table_error_text\">Сообщение об ошибке: ", $e, "</p>";
                    echo "<a class=\"admin_table_error_button\"href=\"./services.php\">Обновить</a>";
                }

                echo "
                <div class='admin_table_box'> 
                    <div class='admin_table_titles'> 
                        <div class='admin_table_cell admin_services_table_id'> 
                            <p>№</p>
                        </div> 
                        <div class='admin_table_cell admin_services_table_name'> 
                            <p>Наименование</p> 
                        </div> 
                        <div class='admin_table_cell admin_services_table_id_type'> 
                            <p>Тип</p> 
                        </div> 
                        <div class='admin_table_cell admin_services_table_act'> 
                            <p>Действие</p> 
                        </div> 
                    </div> ";

                        $qInfoService = "SELECT ID_Service, Services.Name AS Services_name, Type_of_services.Name AS Type_name FROM Services, Type_of_services WHERE Services.ID_Type_of_service  = Type_of_services.ID_Type_of_service ";
                        addslashes($qInfoService);
                        $resInfoService = mysqli_query($connect, $qInfoService) or die(mysqli_error($connect));
                        while ($InfoService = mysqli_fetch_object($resInfoService)) {
                            echo "
                                <div class=\"admin_table_row\"> 
                                    <div class=\"admin_table_cell admin_services_table_id\"> 
                                        <p>$InfoService->ID_Service</p> 
                                    </div> 
                                    <div class=\"admin_table_cell admin_services_table_name\"> 
                                        <p>$InfoService->Services_name</p> 
                                    </div> 
                                    <div class=\"admin_table_cell admin_services_table_id_type\"> 
                                        <p>$InfoService->Type_name</p> 
                                    </div> 
                                    <div class=\"admin_services_table_act\"> 
                                        <a href=\"edit_services.php?idA=$InfoService->ID_Service\"><img class=\"admin_table_act_image\" src=\"/DigitalSphere/image/edit.png\"></a> 
                                        <a href=\"?idD=$InfoService->ID_Service\"><img class=\"admin_table_act_image\" src=\"/DigitalSphere/image/remove.png\"></a> 
                                    </div> 
                                </div> 
                            ";
                        }
                    echo "
                </div> 
            </div>";
                    }
                    else {
                        echo "";
                    }
                }
            }
            else {
                $_SESSION['message'] = 'Доступ к панели администратора закрыт для неавторизованных пользователей!';
                header("location: ../admin/autorization_form.php");
            }
            ?>          
        </div>
    </body>
</html>