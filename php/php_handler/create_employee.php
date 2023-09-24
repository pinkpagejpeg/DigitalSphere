<?php
    session_start();

    include "../php_connect/connect.php";

    if(isset($_POST['Surname'])) {
        $employeeSurname = $_POST['Surname'];
        if($employeeSurname === '') {
            unset($employeeSurname);
        }
    }

    if(isset($_POST['Name'])) {
        $employeeName = $_POST['Name'];
        if($employeeName === '') {
            unset($employeeName);
        }
    }

    if(isset($_POST['Middle_name'])) {
        $employeeMiddleName = $_POST['Middle_name'];
        if($employeeMiddleName === '') {
            unset($employeeMiddleName);
        }
    }

    if(isset($_POST['Department_name'])) {
        $employeeIdProject = $_POST['Department_name'];
        if($employeeIdProject === '') {
            unset($employeeIdProject);
        }
    }

    if(isset($_POST['Group_name'])) {
        $employeeIdGroup = $_POST['Group_name'];
        if($employeeIdGroup === '') {
            unset($employeeIdGroup);
        }
    }

    if(isset($_POST['Salary'])) {
        $employeeSalary = $_POST['Salary'];
        if($employeeSalary === '') {
            unset($employeeSalary);
        }
    }

    if(isset($_POST['Start_of_work'])) {
        $employeeStartWork = $_POST['Start_of_work'];
        if($employeeStartWork === '') {
            unset($employeeStartWork);
        }
    }

    if(isset($_POST['End_of_work'])) {
        $employeeEndWork = $_POST['End_of_work'];
        if($employeeEndWork === '') {
            unset($employeeEndWork);
        }
    }

    $employeeSurname = trim($_POST['Surname']);
    $employeeName = trim($_POST['Name']);
    $employeeMiddleName = trim($_POST['Middle_name']);
    $employeeIdDepartment = trim($_POST['Department_name']);
    $employeeIdGroup = trim($_POST['Group_name']);
    $employeeSalary = trim($_POST['Salary']);
    $employeeStartWork = trim($_POST['Start_of_work']);
    $employeeEndWork = trim($_POST['End_of_work']);

    $employeeEndWork = !empty($employeeEndWork) ? "'$employeeEndWork'" : "NULL";

    $qCreateEmployee = "INSERT INTO `Employees` (`Surname`, `Name`, `Middle_name`, `ID_Department`, `ID_Group`, `Salary`, `Start_of_work`, `End_of_work`) VALUES ('$employeeSurname', '$employeeName', '$employeeMiddleName', $employeeIdDepartment, $employeeIdGroup, $employeeSalary, '$employeeStartWork', $employeeEndWork)";
    addslashes($qCreateEmployee);
    $resCreateEmployee = mysqli_query($connect, $qCreateEmployee) or die(mysqli_error($connect));

    header("location: ../admin/employees.php");
?>