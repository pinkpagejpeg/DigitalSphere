<?php
    session_start();

    include "../php_connect/connect.php";

    if(isset($_POST['Name'])) {
        $serviceName = $_POST['Name'];
        if($serviceName === '') {
            unset($serviceName);
        }
    }

    if(isset($_POST['Type_name'])) {
        $serviceIdType = $_POST['Type_name'];
        if($serviceIdType === '') {
            unset($serviceIdType);
        }
    }

    $serviceName = trim($_POST['Name']);
    $serviceIdType = trim($_POST['Type_name']);

    $qCreateService = "INSERT INTO `Services` (`Name`, `ID_Type_of_service`) VALUES ('$serviceName', $serviceIdType)";
    addslashes($qCreateService);
    $resCreateService = mysqli_query($connect, $qCreateService) or die(mysqli_error($connect));

    header("location: ../admin/services.php");
?>