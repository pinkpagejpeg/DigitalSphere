<?php
    session_start();

    include "../php_connect/connect.php";

    if(isset($_GET['idA'])) {
        $service = $_GET['idA'];
    }

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
        $queryService = "UPDATE `Services` SET `Name` = '$serviceName', `ID_Type_of_service` = $serviceIdType WHERE ID_Service = '$service'";
        addslashes($queryService);
        $resService = mysqli_query($connect, $queryService) or die(mysqli_error($connect));
        header("location: ../admin/services.php");
?>
