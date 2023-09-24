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
                    <h1 class='admin_table_title'>Статистика проведения проектов</h1> 
                    <a class='admin_table_button_add' href='./create_statistics.php'>Добавить запись</a>
                </div> 
                <div class='admin_table_box'> 
                    <div class='admin_table_titles'> 
                        <div class='admin_table_cell admin_services_table_id'> 
                            <p>№</p>
                        </div> 
                        <div class='admin_table_cell admin_statistics_table_id_project'> 
                            <p>Проект</p> 
                        </div> 
                        <div class='admin_table_cell admin_statistics_table_id_group'> 
                            <p>Группа</p> 
                        </div> 
                        <div class='admin_table_cell admin_statistics_table_start_execution'> 
                            <p>Начало выполнения</p> 
                        </div> 
                        <div class='admin_table_cell admin_statistics_table_end_execution'> 
                            <p>Конец выполнения</p> 
                        </div> 
                        <div class='admin_table_cell admin_statistics_table_act'> 
                            <p>Действие</p> 
                        </div> 
                    </div>";

                        if (isset($_GET['idD'])) {
                            $statisticD = $_GET['idD'];
                            $qDeleteStatistic = "DELETE FROM `Project_execution_statistics` WHERE ID_Project_execution_statistic='$statisticD'";
                            addslashes($qDeleteStatistic);
                            $resDeleteStatistic = mysqli_query($connect, $qDeleteStatistic) or die(mysqli_error($connect));
                        }

                        $qInfoStatistic = "SELECT ID_Project_execution_statistic, Projects.Name AS Project_name, Groups.Name AS Group_name, Start_of_execution, End_of_execution FROM Project_execution_statistics, Projects, Groups WHERE Project_execution_statistics.ID_Project = Projects.ID_Project AND Project_execution_statistics.ID_Group = Groups.ID_Group";
                        addslashes($qInfoStatistic);
                        $resInfoStatistic = mysqli_query($connect, $qInfoStatistic) or die(mysqli_error($connect));
                        while ($InfoStatistic = mysqli_fetch_object($resInfoStatistic)) {
                            echo "
                                <div class=\"admin_table_row\"> 
                                    <div class=\"admin_table_cell admin_statistics_table_id\"> 
                                        <p>$InfoStatistic->ID_Project_execution_statistic</p> 
                                    </div> 
                                    <div class=\"admin_table_cell admin_statistics_table_id_project\"> 
                                        <p>$InfoStatistic->Project_name</p> 
                                    </div> 
                                    <div class=\"admin_table_cell admin_statistics_table_id_group\"> 
                                        <p>$InfoStatistic->Group_name</p> 
                                    </div> 
                                    <div class=\"admin_table_cell admin_statistics_table_start_execution\"> 
                                        <p>$InfoStatistic->Start_of_execution</p> 
                                    </div> 
                                    <div class=\"admin_table_cell admin_statistics_table_end_execution\"> 
                                        <p>$InfoStatistic->End_of_execution</p> 
                                    </div>
                                    <div class=\"admin_services_table_act\"> 
                                        <a href=\"edit_statistics.php?idA=$InfoStatistic->ID_Project_execution_statistic\"><img class=\"admin_table_act_image\" src=\"/DigitalSphere/image/edit.png\"></a> 
                                        <a href=\"?idD=$InfoStatistic->ID_Project_execution_statistic\"><img class=\"admin_table_act_image\" src=\"/DigitalSphere/image/remove.png\"></a> 
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