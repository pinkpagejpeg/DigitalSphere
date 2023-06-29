<?php
session_start();

include "../php_connect/connect.php";

if (isset($_SESSION['id_user'])) {
    $IDuser = $_SESSION['id_user'];
    if ($IDuser === '') {
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
                    <h1 class='admin_table_title'>Группы</h1> 
                    <a class='admin_table_button_add' href='./create_groups.php'>Добавить запись</a>
                </div> 
                <div class='admin_table_box'> 
                    <div class='admin_table_titles'> 
                        <div class='admin_table_cell admin_services_table_id'> 
                            <p>№</p>
                        </div> 
                        <div class='admin_table_cell admin_groups_table_name'> 
                            <p>Наименование</p> 
                        </div>
                        <div class='admin_table_cell admin_groups_table_act'> 
                            <p>Действие</p> 
                        </div> 
                    </div>";

                        if (isset($_GET['idD'])) {
                            $groupD = $_GET['idD'];
                            $qDeleteGroup = "DELETE FROM `Groups` WHERE ID_Group='$groupD'";
                            addslashes($qDeleteGroup);
                            $resDeleteGroup = mysqli_query($connect, $qDeleteGroup) or die(mysqli_error($connect));
                        }

                        $qInfoGroup = "SELECT * FROM Groups";
                        addslashes($qInfoGroup);
                        $resInfoGroup = mysqli_query($connect, $qInfoGroup) or die(mysqli_error($connect));
                        while ($InfoGroup = mysqli_fetch_object($resInfoGroup)) {
                            echo "
                                <div class=\"admin_table_row\"> 
                                    <div class=\"admin_table_cell admin_groups_table_id\"> 
                                        <p>$InfoGroup->ID_Group</p> 
                                    </div> 
                                    <div class=\"admin_table_cell admin_groups_table_name\"> 
                                        <p>$InfoGroup->Name</p> 
                                    </div> 
                                    <div class=\"admin_projects_table_act\"> 
                                        <a href=\"edit_groups.php?idA=$InfoGroup->ID_Group\"><img class=\"admin_table_act_image\" src=\"/DigitalSphere/image/edit.png\"></a> 
                                        <a href=\"?idD=$InfoGroup->ID_Group\"><img class=\"admin_table_act_image\" src=\"/DigitalSphere/image/remove.png\"></a> 
                                    </div> 
                                </div> 
                            ";
                        }
                        echo "
                            </div> 
                        </div>";
                    } else {
                        echo "";
                    }
                }
            } else {
                $_SESSION['message'] = 'Доступ к панели администратора закрыт для неавторизованных пользователей!';
                header("location: ../admin/autorization_form.php");
            }
            ?>
        </div>
    </body>

    </html>