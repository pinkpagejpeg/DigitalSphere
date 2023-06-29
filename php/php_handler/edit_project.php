<?php
    session_start();

    include "../php_connect/connect.php";

    if(isset($_GET['idA'])) {
        $project = $_GET['idA'];
    }

    if(isset($_POST['Name'])) {
        $projectName = $_POST['Name'];
        if($projectName === '') {
            unset($projectName);
        }
    } 
    
    if(isset($_POST['Date_of_receipt'])) {
        $projectIdOrder = $_POST['Date_of_receipt'];
        if($projectIdOrder === '') {
            unset($projectIdOrder);
        }
    }
        $projectName = trim($_POST['Name']);
        $projectIdOrder = trim($_POST['Date_of_receipt']);
        $queryProject = "UPDATE `Projects` SET `Name` = '$projectName', `ID_Order` = $projectIdOrder WHERE ID_Project = '$project'";
        addslashes($queryProject);
        $resProject = mysqli_query($connect, $queryProject) or die(mysqli_error($connect));
        header("location: ../admin/projects.php");
?>
