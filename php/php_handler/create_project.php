<?php
    session_start();

    include "../php_connect/connect.php";

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

    $qCreateProject = "INSERT INTO `Projects` (`Name`, `ID_Order`) VALUES ('$projectName', '$projectIdOrder')";
    addslashes($qCreateProject);
    $resCreateProject = mysqli_query($connect, $qCreateProject) or die(mysqli_error($connect));

    header("location: ../admin/projects.php");
?>