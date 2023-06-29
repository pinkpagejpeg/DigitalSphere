<?php
    session_start();

    include "../php_connect/connect.php";

    if(isset($_GET['idA'])) {
        $group = $_GET['idA'];
    }

    if(isset($_POST['Name'])) {
        $groupName = $_POST['Name'];
        if($groupName === '') {
            unset($groupName);
        }
    } 
    
    $groupName = trim($_POST['Name']);
    $queryGroup = "UPDATE `Groups` SET `Name` = '$groupName' WHERE ID_Group = '$group'";
    addslashes($queryGroup);
    $resGroup = mysqli_query($connect, $queryGroup) or die(mysqli_error($connect));
    header("location: ../admin/groups.php");
?>
