<?php
    session_start();

    include "../php_connect/connect.php";

    if(isset($_GET['idA'])) {
        $order = $_GET['idA'];
    }

    if(isset($_POST['FIO'])) {
        $orderIdClient = $_POST['FIO'];
        if($orderIdClient === '') {
            unset($orderIdClient);
        }
    }

    if(isset($_POST['Services_name'])) {
        $orderIdService = $_POST['Services_name'];
        if($orderIdService === '') {
            unset($orderIdService);
        }
    }

    if(isset($_POST['Date_of_receipt'])) {
        $orderDateReceipt = $_POST['Date_of_receipt'];
        if($orderDateReceipt === '') {
            unset($orderDateReceipt);
        }
    }

    if(isset($_POST['Date_of_completion'])) {
        $orderDateCompletion = $_POST['Date_of_completion'];
        if($orderDateCompletion === '') {
            unset($orderDateCompletion);
        }
    }

    $orderIdClient = trim($_POST['FIO']);
    $orderIdService = trim($_POST['Services_name']);
    $orderDateReceipt = trim($_POST['Date_of_receipt']);
    $orderDateCompletion = trim($_POST['Date_of_completion']);

    $orderDateCompletion = !empty($orderDateCompletion) ? "'$orderDateCompletion'" : "NULL";

    $queryOrder = "UPDATE `Orders` SET `ID_Client` = $orderIdClient, `ID_Service` = $orderIdService, `Date_of_receipt` = '$orderDateReceipt', `Date_of_completion` = $orderDateCompletion WHERE ID_Order = '$order'";
    addslashes($queryOrder);
    $resOrder = mysqli_query($connect, $queryOrder) or die(mysqli_error($connect));
    header("location: ../admin/orders.php");
?>
