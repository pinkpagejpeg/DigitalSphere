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
            <div class="admin_table_mainbox"> 
                <div class="admin_table_topline"> 
                    <h1 class="admin_table_title">Проекты</h1>
                    <?php
                    if (isset($IDuser)) {
                        $query_access = "SELECT * FROM users, roles WHERE id_user = '$IDuser' AND users.id_role = roles.id_role";
                        addslashes($query_access);
                        $res_access = mysqli_query($connect, $query_access);
                        $row_access = mysqli_fetch_object($res_access);
                        
                        $roles = $row_access->name_role;

                        if (isset($roles)) {
                            if ($roles == 'Администратор') {
                                echo "
                                    <a class='admin_table_button_add' href='./create_projects.php'>Добавить запись</a>";
                            }
                            else {
                                echo " ";
                            }
                        }
                    }
                    else {
                        $_SESSION['message'] = 'Доступ к панели администратора закрыт для неавторизованных пользователей!';
                        header("location: ../admin/autorization_form.php");
                    }
                    ?>
                </div> 
                <div class="admin_table_box"> 
                    <div class="admin_table_titles"> 
                        <div class="admin_table_cell admin_projects_table_id"> 
                            <p>№</p>
                        </div> 
                        <div class="admin_table_cell admin_projects_table_name"> 
                            <p>Наименование</p> 
                        </div> 
                        <div class="admin_table_cell admin_projects_table_id_order"> 
                            <p>Заказ</p> 
                        </div> 
                        <?php
                            if (isset($IDuser)) {
                                if (isset($roles)) {
                                    if ($roles == 'Администратор') {
                                        echo "
                                            <div class='admin_table_cell admin_projects_table_act'> 
                                                <p>Действие</p> 
                                            </div>";
                                    }
                                    else {
                                        echo " ";
                                    }
                                }
                            }
                            else {
                                $_SESSION['message'] = 'Доступ к панели администратора закрыт для неавторизованных пользователей!';
                                header("location: ../admin/autorization_form.php");
                            }
                        ?>
                    </div> 

                    <?php
                        if (isset($IDuser)) {
                            if (isset($_GET['idD'])) {
                                $projectD = $_GET['idD'];
                                $qDeleteProject = "DELETE FROM `Projects` WHERE ID_Project='$projectD'";
                                addslashes($qDeleteProject);
                                $resDeleteProject = mysqli_query($connect, $qDeleteProject) or die(mysqli_error($connect));
                            }

                            $qInfoProject = "SELECT * FROM Projects, Orders WHERE Projects.ID_Order = Orders.ID_Order";
                            addslashes($qInfoProject);
                            $resInfoProject = mysqli_query($connect, $qInfoProject) or die(mysqli_error($connect));
                            while ($InfoProject = mysqli_fetch_object($resInfoProject)) {
                                echo "
                                    <div class=\"admin_table_row\"> 
                                        <div class=\"admin_table_cell admin_projects_table_id\"> 
                                            <p>$InfoProject->ID_Project</p> 
                                        </div> 
                                        <div class=\"admin_table_cell admin_projects_table_name\"> 
                                            <p>$InfoProject->Name</p> 
                                        </div> 
                                        <div class=\"admin_table_cell admin_projects_table_id_order\"> 
                                            <p>$InfoProject->Date_of_receipt</p> 
                                        </div> 
                                        <div class=\"admin_projects_table_act\">";
                                        

                                            if (isset($roles)) {
                                                if ($roles == 'Администратор') {
                                                    echo "
                                                    <a href=\"edit_projects.php?idA=$InfoProject->ID_Project\"><img class=\"admin_table_act_image\" src=\"/DigitalSphere/image/edit.png\"></a> 
                                                    <a href=\"?idD=$InfoProject->ID_Project\"><img class=\"admin_table_act_image\" src=\"/DigitalSphere/image/remove.png\"></a>";
                                                } 
                                                else {
                                                    echo " ";
                                                }
                                            }
                                        echo "
                                        </div> 
                                    </div> 
                                ";
                            }
                        }
                        else {
                            $_SESSION['message'] = 'Доступ к панели администратора закрыт для неавторизованных пользователей!';
                            header("location: ../admin/autorization_form.php");
                        }
                    ?>
                </div> 
            </div>
        </div>

    </body>
</html>