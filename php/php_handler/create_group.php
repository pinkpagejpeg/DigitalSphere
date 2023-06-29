<?php
    session_start();

    include "../php_connect/connect.php";

    if(isset($_POST['Name'])) {
        $groupName = $_POST['Name'];
        if($groupName === '') {
            unset($groupName);
        }
    }

    $groupName = trim($_POST['Name']);

    $qCreateGroup = "INSERT INTO `Groups` (`Name`) VALUES ('$groupName')";
    addslashes($qCreateGroup);
    $resCreateGroup = mysqli_query($connect, $qCreateGroup) or die(mysqli_error($connect));

    header("location: ../admin/groups.php");
?>