<?php
    session_start();

    include "../php_connect/connect.php";

    if(isset($_POST['Project_name'])) {
        $statisticIdProject = $_POST['Project_name'];
        if($statisticIdProject === '') {
            unset($statisticIdProject);
        }
    }

    if(isset($_POST['Group_name'])) {
        $statisticIdGroup = $_POST['Group_name'];
        if($statisticIdGroup === '') {
            unset($statisticIdGroup);
        }
    }

    if(isset($_POST['Start_of_execution'])) {
        $statisticStartExecution = $_POST['Start_of_execution'];
        if($statisticStartExecution === '') {
            unset($statisticStartExecution);
        }
    }

    if(isset($_POST['End_of_execution'])) {
        $statisticEndExecution = $_POST['End_of_execution'];
        if($statisticEndExecution === '') {
            unset($statisticEndExecution);
        }
    }

    $statisticIdProject = trim($_POST['Project_name']);
    $statisticIdGroup = trim($_POST['Group_name']);
    $statisticStartExecution = trim($_POST['Start_of_execution']);
    $statisticEndExecution = trim($_POST['End_of_execution']);

    $statisticEndExecution = !empty($statisticEndExecution) ? "'$statisticEndExecution'" : "NULL";

    $qCreateStatistic = "INSERT INTO `Project_execution_statistics` (`ID_Project`, `ID_Group`, `Start_of_execution`, `End_of_execution`) VALUES ($statisticIdProject, $statisticIdGroup, '$statisticStartExecution', $statisticEndExecution)";
    addslashes($qCreateStatistic);
    $resCreateStatistic = mysqli_query($connect, $qCreateStatistic) or die(mysqli_error($connect));

    header("location: ../admin/statistics.php");
?>