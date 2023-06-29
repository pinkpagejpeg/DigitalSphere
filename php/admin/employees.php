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
                </div> 
                <div class='admin_table_box'> 
                    <div class='admin_table_titles'> 
                        <div class='admin_table_cell admin_services_table_id'> 
                            <p>№</p>
                        </div> 
                        <div class='admin_table_cell admin_employees_table_surname'> 
                            <p>Фамилия</p> 
                        </div>
                        <div class='admin_table_cell admin_employees_table_name'> 
                            <p>Имя</p> 
                        </div> 
                        <div class='admin_table_cell admin_employees_table_middle_name'> 
                            <p>Отчество</p> 
                        </div>  
                        <div class='admin_table_cell admin_employees_table_id_department'> 
                            <p>Отдел</p> 
                        </div> 
                        <div class='admin_table_cell admin_employees_table_id_group'> 
                            <p>Группа</p> 
                        </div> 
                        <div class='admin_table_cell admin_employees_table_salary'> 
                            <p>Зарплата</p> 
                        </div>
                        <div class='admin_table_cell admin_employees_table_start_work'> 
                            <p>Начало работы</p> 
                        </div> 
                        <div class='admin_table_cell admin_employees_table_end_work'> 
                            <p>Конец работы</p> 
                        </div> 
                        <div class='admin_table_cell admin_employees_table_act'> 
                            <p>Действие</p> 
                        </div> 
                    </div>";

                        if (isset($_GET['idD'])) {
                            $employeeD = $_GET['idD'];
                            $qDeleteEmployee = "DELETE FROM `Employees` WHERE ID_Employee='$employeeD'";
                            addslashes($qDeleteEmployee);
                            $resDeleteEmployee = mysqli_query($connect, $qDeleteEmployee) or die(mysqli_error($connect));
                        }

                        $qInfoEmployee = "SELECT ID_Employee, Surname, Employees.Name, Middle_name, Departments.Name AS Department_name, Groups.Name AS Group_name, Salary, Start_of_work, End_of_work FROM Employees, Departments, Groups WHERE Employees.ID_Department = Departments.ID_Department AND Employees.ID_Group = Groups.ID_Group";
                        addslashes($qInfoEmployee);
                        $resInfoEmployee = mysqli_query($connect, $qInfoEmployee) or die(mysqli_error($connect));
                        while ($InfoEmployee = mysqli_fetch_object($resInfoEmployee)) {
                            echo "
                                <div class=\"admin_table_row\"> 
                                    <div class=\"admin_table_cell admin_employees_table_id\"> 
                                        <p>$InfoEmployee->ID_Employee</p> 
                                    </div> 
                                    <div class=\"admin_table_cell admin_employees_table_surname\"> 
                                        <p>$InfoEmployee->Surname</p> 
                                    </div> 
                                    <div class=\"admin_table_cell admin_employees_table_name\"> 
                                        <p>$InfoEmployee->Name</p> 
                                    </div> 
                                    <div class=\"admin_table_cell admin_employees_table_middle_name\"> 
                                        <p>$InfoEmployee->Middle_name</p> 
                                    </div> 
                                    <div class=\"admin_table_cell admin_employees_table_id_department\"> 
                                        <p>$InfoEmployee->Department_name</p> 
                                    </div> 
                                    <div class=\"admin_table_cell admin_employees_table_id_group\"> 
                                        <p>$InfoEmployee->Group_name</p> 
                                    </div> 
                                    <div class=\"admin_table_cell admin_employees_table_salary\"> 
                                        <p>$InfoEmployee->Salary</p> 
                                    </div>
                                    <div class=\"admin_table_cell admin_employees_table_start_work\"> 
                                        <p>$InfoEmployee->Start_of_work</p> 
                                    </div> 
                                    <div class=\"admin_table_cell admin_employees_table_end_work\"> 
                                        <p>$InfoEmployee->End_of_work</p> 
                                    </div>
                                    <div class=\"admin_employees_table_act\"> 
                                        <a href=\"edit_employees.php?idA=$InfoEmployee->ID_Employee\"><img class=\"admin_table_act_image\" src=\"/DigitalSphere/image/edit.png\"></a> 
                                        <a href=\"?idD=$InfoEmployee->ID_Employee\"><img class=\"admin_table_act_image\" src=\"/DigitalSphere/image/remove.png\"></a> 
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