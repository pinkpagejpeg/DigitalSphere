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
            <div class="admin_panel_report">
                <h2 class="title">Отчетность</h2>
                <div class="admin_panel_report_mainbox">
                    <div class="admin_panel_report_item admin_panel_report_departments">
                        <h3 class="admin_panel_report_info">Cписок всех сотрудников отдела разработки ПО</h3>
                        <div class="admin_panel_report_table"> 
                            <div class="admin_panel_report_titles"> 
                                <div class="admin_panel_report_table_cell"> 
                                    <p>ФИО</p> 
                                </div> 
                            </div> 

                            <?php
                                $qInfoReportDepartments = "SELECT CONCAT(Employees.Surname, ' ', Employees.Name, ' ', Employees.Middle_name) AS FIO 
                                FROM Employees INNER JOIN Departments ON Employees.ID_Department=Departments.ID_Department 
                                WHERE Departments.Name='Отдел разработки ПО'";
                                addslashes($qInfoReportDepartments);
                                $resInfoReportDepartments = mysqli_query($connect, $qInfoReportDepartments) or die(mysqli_error($connect));
                                while ($InfoReportDepartments = mysqli_fetch_object($resInfoReportDepartments)) {
                                    echo "
                                        <div class=\"admin_panel_report_table_row\"> 
                                            <div class=\"admin_panel_report_table_cell\"> 
                                                <p>$InfoReportDepartments->FIO</p> 
                                            </div> 
                                        </div> 
                                    ";
                                }
                            ?>
                        </div> 
                    </div>

                    <div class="admin_panel_report_item admin_panel_report_employee_project">
                        <h3 class="admin_panel_report_info">Cписок сотрудников, работающих на наибольшем количестве проектов</h3>
                        <div class="admin_panel_report_table"> 
                            <div class="admin_panel_report_titles"> 
                                <div class="admin_panel_report_table_cell"> 
                                    <p>ФИО</p> 
                                </div> 
                            </div> 

                            <?php
                                $qInfoReportEmployeeProject = "SELECT CONCAT(Employees.Surname, ' ', Employees.Name, ' ', Employees.Middle_name) AS FIO 
                                FROM Employees INNER JOIN Project_execution_statistics 
                                ON Project_execution_statistics.ID_Group=Employees.ID_Group
                                GROUP BY FIO ORDER BY COUNT(Project_execution_statistics.ID_Project) DESC LIMIT 3";
                                addslashes($qInfoReportEmployeeProject);
                                $resInfoReportEmployeeProject = mysqli_query($connect, $qInfoReportEmployeeProject) or die(mysqli_error($connect));
                                while ($InfoReportEmployeeProject = mysqli_fetch_object($resInfoReportEmployeeProject)) {
                                    echo "
                                        <div class=\"admin_panel_report_table_row\"> 
                                            <div class=\"admin_panel_report_table_cell\"> 
                                                <p>$InfoReportEmployeeProject->FIO</p> 
                                            </div> 
                                        </div> 
                                    ";
                                }
                            ?>
                        </div> 
                    </div>

                    <div class="admin_panel_report_item admin_panel_report_employee_exp">
                        <h3 class="admin_panel_report_info">Cписок сотрудников, у которых продолжительность работы в компании превышает 2 года</h3>
                        <div class="admin_panel_report_table"> 
                            <div class="admin_panel_report_titles"> 
                                <div class="admin_panel_report_table_cell"> 
                                    <p>ФИО</p> 
                                </div> 
                            </div> 

                            <?php
                                $qInfoReportExp = "SELECT FIO FROM
                                (SELECT CONCAT(Employees.Surname, ' ', Employees.Name, ' ', Employees.Middle_name) as FIO,
                                (year(current_date)-year(Employees.Start_of_work))-(Date_format(current_date, '%m%d')<Date_format(Employees.Start_of_work, '%m%d')) AS Stazh
                                FROM Employees
                                WHERE Employees.End_of_work is NULL
                                UNION
                                SELECT CONCAT(Employees.Surname, ' ', Employees.Name, ' ', Employees.Middle_name) as FIO,
                                (year(Employees.End_of_work)-year(Employees.Start_of_work))-(Date_format(Employees.End_of_work, '%m%d')<Date_format(Employees.Start_of_work, '%m%d')) AS Stazh
                                FROM Employees
                                WHERE Employees.End_of_work is not NULL) AS q   
                                WHERE Stazh>2";
                                addslashes($qInfoReportExp);
                                $resInfoReportExp = mysqli_query($connect, $qInfoReportExp) or die(mysqli_error($connect));
                                while ($InfoReportExp = mysqli_fetch_object($resInfoReportExp)) {
                                    echo "
                                        <div class=\"admin_panel_report_table_row\"> 
                                            <div class=\"admin_panel_report_table_cell\"> 
                                                <p>$InfoReportExp->FIO</p> 
                                            </div> 
                                        </div> 
                                    ";
                                }
                            ?>
                        </div> 
                    </div>

                    <div class="admin_panel_report_item admin_panel_report_projects">
                        <h3 class="admin_panel_report_info">Cписок всех сотрудников, работающих на проекте SEO-продвижение компании UpMaster</h3>
                        <div class="admin_panel_report_table"> 
                            <div class="admin_panel_report_titles"> 
                                <div class="admin_panel_report_table_cell"> 
                                    <p>ФИО</p> 
                                </div> 
                            </div> 

                            <?php
                                $qInfoReportProjects = "SELECT CONCAT(Employees.Surname, ' ', Employees.Name, ' ', Employees.Middle_name) AS FIO
                                FROM Employees INNER JOIN Project_execution_statistics ON Employees.ID_Group=Project_execution_statistics.ID_Group 
                                INNER JOIN Projects ON Projects.ID_Project=Project_execution_statistics.ID_Project 
                                WHERE Projects.Name='SEO-продвижение компании UpMaster' ";
                                addslashes($qInfoReportProjects);
                                $resInfoReportProjects = mysqli_query($connect, $qInfoReportProjects) or die(mysqli_error($connect));
                                while ($InfoReportProjects = mysqli_fetch_object($resInfoReportProjects)) {
                                    echo "
                                        <div class=\"admin_panel_report_table_row\"> 
                                            <div class=\"admin_panel_report_table_cell\"> 
                                                <p>$InfoReportProjects->FIO</p> 
                                            </div> 
                                        </div> 
                                    ";
                                }
                            ?>
                        </div> 
                    </div>

                    <div class="admin_panel_report_item admin_panel_report_project_notready">
                        <h3 class="admin_panel_report_info">Cписок проектов, которые еще не завершены</h3>
                        <div class="admin_panel_report_table"> 
                            <div class="admin_panel_report_titles"> 
                                <div class="admin_panel_report_table_cell"> 
                                    <p>Проекты</p> 
                                </div> 
                            </div> 

                            <?php
                                $qInfoReportProjectNotReady = "SELECT Projects.Name AS Project FROM Projects 
                                INNER JOIN Project_execution_statistics ON Project_execution_statistics.ID_Project=Projects.ID_Project
                                WHERE Project_execution_statistics.End_of_execution is NULL";
                                addslashes($qInfoReportProjectNotReady);
                                $resInfoReportProjectNotReady = mysqli_query($connect, $qInfoReportProjectNotReady) or die(mysqli_error($connect));
                                while ($InfoReportProjectNotReady = mysqli_fetch_object($resInfoReportProjectNotReady)) {
                                    echo "
                                        <div class=\"admin_panel_report_table_row\"> 
                                            <div class=\"admin_panel_report_table_cell\"> 
                                                <p>$InfoReportProjectNotReady->Project</p> 
                                            </div> 
                                        </div> 
                                    ";
                                }
                            ?>
                        </div> 
                    </div>

                    <div class="admin_panel_report_item admin_panel_report_project_year">
                        <h3 class="admin_panel_report_info">Cписок проектов, завершенных в 2022 году</h3>
                        <div class="admin_panel_report_table"> 
                            <div class="admin_panel_report_titles"> 
                                <div class="admin_panel_report_table_cell"> 
                                    <p>Проекты</p> 
                                </div> 
                            </div> 

                            <?php
                                $qInfoReportProjectYear = "SELECT Projects.Name AS Project 
                                FROM Projects INNER JOIN Project_execution_statistics ON Project_execution_statistics.ID_Project=Projects.ID_Project
                                WHERE YEAR(Project_execution_statistics.End_of_execution)=2022";
                                addslashes($qInfoReportProjectYear);
                                $resInfoReportProjectYear = mysqli_query($connect, $qInfoReportProjectYear) or die(mysqli_error($connect));
                                while ($InfoReportProjectYear = mysqli_fetch_object($resInfoReportProjectYear)) {
                                    echo "
                                        <div class=\"admin_panel_report_table_row\"> 
                                            <div class=\"admin_panel_report_table_cell\"> 
                                                <p>$InfoReportProjectYear->Project</p> 
                                            </div> 
                                        </div> 
                                    ";
                                }
                            ?>
                        </div> 
                    </div>

                    <div class="admin_panel_report_item admin_panel_report_project_employees">
                        <h3 class="admin_panel_report_info">Cписок проектов, в которых задействовано 2 сотрудника</h3>
                        <div class="admin_panel_report_table"> 
                            <div class="admin_panel_report_titles"> 
                                <div class="admin_panel_report_table_cell"> 
                                    <p>Проекты</p> 
                                </div> 
                            </div> 

                            <?php
                                $qInfoReportProjectEmployee = "SELECT Project, Employee_kolvo FROM
                                (SELECT Projects.Name AS Project, COUNT(Employees.ID_Employee) AS Employee_kolvo
                                FROM Projects INNER JOIN Project_execution_statistics
                                ON Project_execution_statistics.ID_Project=Projects.ID_Project
                                INNER JOIN Employees ON Employees.ID_Group=Project_execution_statistics.ID_Group
                                GROUP BY Projects.Name) AS q
                                WHERE Employee_kolvo=2";
                                addslashes($qInfoReportProjectEmployee);
                                $resInfoReportProjectEmployee = mysqli_query($connect, $qInfoReportProjectEmployee) or die(mysqli_error($connect));
                                while ($InfoReportProjectEmployee = mysqli_fetch_object($resInfoReportProjectEmployee)) {
                                    echo "
                                        <div class=\"admin_panel_report_table_row\"> 
                                            <div class=\"admin_panel_report_table_cell\"> 
                                                <p>$InfoReportProjectEmployee->Project</p> 
                                            </div> 
                                        </div> 
                                    ";
                                }
                            ?>
                        </div> 
                    </div>

                    <div class="admin_panel_report_item admin_panel_report_client_orders">
                        <h3 class="admin_panel_report_info">Cписок всех клиентов с указанием заказанных проектов</h3>
                        <div class="admin_panel_report_table"> 
                            <div class="admin_panel_report_titles"> 
                                <div class="admin_panel_report_table_cell admin_panel_report_fio_cell"> 
                                    <p>ФИО</p> 
                                </div> 
                                <div class="admin_panel_report_table_cell admin_panel_report_project_cell"> 
                                    <p>Проект</p> 
                                </div>
                            </div> 

                            <?php
                                $qInfoReportClientOrdersName = "SELECT CONCAT(Clients.Surname, ' ', Clients.Name, ' ', Clients.Middle_name) AS FIO, Projects.Name AS Project
                                FROM Clients INNER JOIN Orders ON Orders.ID_Client=Clients.ID_Client INNER JOIN Projects ON Projects.ID_Order=Orders.ID_Order";
                                addslashes($qInfoReportClientOrdersName);
                                $resInfoReportClientOrdersName = mysqli_query($connect, $qInfoReportClientOrdersName) or die(mysqli_error($connect));
                                while ($InfoReportClientOrdersName = mysqli_fetch_object($resInfoReportClientOrdersName)) {
                                    echo "
                                        <div class=\"admin_panel_report_table_row\"> 
                                            <div class=\"admin_panel_report_table_cell admin_panel_report_fio_cell\"> 
                                                <p>$InfoReportClientOrdersName->FIO</p> 
                                            </div> 
                                            <div class=\"admin_panel_report_table_cell admin_panel_report_project_cell\"> 
                                                <p>$InfoReportClientOrdersName->Project</p> 
                                            </div> 
                                        </div> 
                                    ";
                                }
                            ?>
                        </div> 
                    </div>

                    <div class="admin_panel_report_item admin_panel_report_client_kolvo">
                        <h3 class="admin_panel_report_info">Cписок общего количества проектов, связанных с каждым клиентом</h3>
                        <div class="admin_panel_report_table"> 
                            <div class="admin_panel_report_titles"> 
                                <div class="admin_panel_report_table_cell admin_panel_report_fio_cell"> 
                                    <p>ФИО</p> 
                                </div> 
                                <div class="admin_panel_report_table_cell admin_panel_report_kolvo_cell"> 
                                    <p>Кол-во</p> 
                                </div>
                            </div> 

                            <?php
                                $qInfoReportClientOrdersKolvo = "SELECT CONCAT(Clients.Surname, ' ', Clients.Name, ' ', Clients.Middle_name) AS FIO, COUNT(DISTINCT Projects.Name) AS Kolvo
                                FROM Clients INNER JOIN Orders ON Orders.ID_Client=Clients.ID_Client 
                                INNER JOIN Projects ON Projects.ID_Order=Orders.ID_Order GROUP BY FIO";
                                addslashes($qInfoReportClientOrdersKolvo);
                                $resInfoReportClientOrdersKolvo = mysqli_query($connect, $qInfoReportClientOrdersKolvo) or die(mysqli_error($connect));
                                while ($InfoReportClientOrdersKolvo = mysqli_fetch_object($resInfoReportClientOrdersKolvo)) {
                                    echo "
                                        <div class=\"admin_panel_report_table_row\"> 
                                            <div class=\"admin_panel_report_table_cell admin_panel_report_fio_cell\"> 
                                                <p>$InfoReportClientOrdersKolvo->FIO</p> 
                                            </div> 
                                            <div class=\"admin_panel_report_table_cell admin_panel_report_kolvo_cell\"> 
                                                <p>$InfoReportClientOrdersKolvo->Kolvo</p> 
                                            </div> 
                                        </div> 
                                    ";
                                }
                            ?>
                        </div> 
                    </div>

                    <div class="admin_panel_report_item admin_panel_report_employee_salary">
                        <h3 class="admin_panel_report_info">Cписок сотрудников, отсортированных по зарплате в порядке убывания</h3>
                        <div class="admin_panel_report_table"> 
                            <div class="admin_panel_report_titles"> 
                                <div class="admin_panel_report_table_cell admin_panel_report_fio_cell"> 
                                    <p>ФИО</p> 
                                </div> 
                                <div class="admin_panel_report_table_cell admin_panel_report_salary_cell"> 
                                    <p>Зарплата</p> 
                                </div>
                            </div> 

                            <?php
                                $qInfoReportEmployeeSalary = "SELECT CONCAT(Employees.Surname, ' ', Employees.Name, ' ', Employees.Middle_name) AS FIO, Employees.Salary AS Salary
                                FROM Employees ORDER BY Employees.Salary DESC";
                                addslashes($qInfoReportEmployeeSalary);
                                $resInfoReportEmployeeSalary = mysqli_query($connect, $qInfoReportEmployeeSalary) or die(mysqli_error($connect));
                                while ($InfoReportEmployeeSalary = mysqli_fetch_object($resInfoReportEmployeeSalary)) {
                                    echo "
                                        <div class=\"admin_panel_report_table_row\"> 
                                            <div class=\"admin_panel_report_table_cell admin_panel_report_fio_cell\"> 
                                                <p>$InfoReportEmployeeSalary->FIO</p> 
                                            </div> 
                                            <div class=\"admin_panel_report_table_cell admin_panel_report_salary_cell\"> 
                                                <p>$InfoReportEmployeeSalary->Salary</p> 
                                            </div> 
                                        </div> 
                                    ";
                                }
                            ?>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>