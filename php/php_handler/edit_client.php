<?php
    session_start();

    include "../php_connect/connect.php";

    if(isset($_GET['idA'])) {
        $client = $_GET['idA'];
    }

    if(isset($_POST['Surname'])) {
        $clientSurname = $_POST['Surname'];
        if($clientSurname === '') {
            unset($clientSurname);
        }
    }

    if(isset($_POST['Name'])) {
        $clientName = $_POST['Name'];
        if($clientName === '') {
            unset($clientName);
        }
    }

    if(isset($_POST['Middle_name'])) {
        $clientMiddleName = $_POST['Middle_name'];
        if($clientMiddleName === '') {
            unset($clientMiddleName);
        }
    }

    if(isset($_POST['Telephone'])) {
        $clientTelephone = $_POST['Telephone'];
        if($clientTelephone === '') {
            unset($clientTelephone);
        }
    }

    if(isset($_POST['Email'])) {
        $clientEmail = $_POST['Email'];
        if($clientEmail === '') {
            unset($clientEmail);
        }
    }
        
    $clientSurname = trim($_POST['Surname']);
    $clientName = trim($_POST['Name']);
    $clientMiddleName = trim($_POST['Middle_name']);
    $clientTelephone = trim($_POST['Telephone']);
    $clientEmail = trim($_POST['Email']);
    
    $queryClient = "UPDATE `Clients` SET `Surname` = '$clientSurname', `Name` = '$clientName', `Middle_name` = '$clientMiddleName', `Telephone` = '$clientTelephone', `Email` = '$clientEmail' WHERE ID_Client = '$client'";
    addslashes($queryClient);
    $resClient = mysqli_query($connect, $queryClient) or die(mysqli_error($connect));
    header("location: ../admin/clients.php");
?>
