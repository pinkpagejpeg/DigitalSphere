<?php
    session_start();

    include "../php_connect/connect.php";

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

    $qCreateOrder = "INSERT INTO `Orders` (`ID_Client`, `ID_Service`, `Date_of_receipt`, `Date_of_completion`) VALUES ($orderIdClient, $orderIdService, '$orderDateReceipt', '$orderDateCompletion')";
    addslashes($qCreateOrder);
    $resCreateOrder = mysqli_query($connect, $qCreateOrder) or die(mysqli_error($connect));

    header("location: ../admin/orders.php");
?>