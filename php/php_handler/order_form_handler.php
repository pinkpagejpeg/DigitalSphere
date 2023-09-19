<?php
    session_start();

    include "../php_connect/connect.php";

    if(isset($_GET['idA'])) {
        $order = $_GET['idA'];
    }

    if(isset($_POST['button'])) {
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

        if(isset($_POST['Services_name'])) {
            $orderIdService = $_POST['Services_name'];
            if($orderIdService === '') {
                unset($orderIdService);
            }
        }

        if(isset($_POST['h-captcha-response'])) {
            $recapcha = $_POST['h-captcha-response'];
            
            if(!$recapcha){
                $_SESSION['message'] = 'Пожалуйста, подтвердите, что вы не робот';
                header('Location: ' . $_SERVER['HTTP_REFERER']);     
            }
            else  {
                $secretKey = 'ES_d25ec47f47a44aa180d8211222adae05';
                $url = 'https://hcaptcha.com/siteverify?response=' .  $recapcha . '&secret=' .  $secretKey;
                $response = file_get_contents($url);
                $responseKey = json_decode($response, true);


                if($responseKey['success']) {

                    $clientSurname = trim($_POST['Surname']);
                    $clientName = trim($_POST['Name']);
                    $clientMiddleName = trim($_POST['Middle_name']);
                    $clientTelephone = trim($_POST['Telephone']);
                    $clientEmail = trim($_POST['Email']);
                    $orderIdService = trim($_POST['Services_name']);

                    $qCreateOrder = "INSERT INTO `Website_orders` (`Surname`, `Name`, `Middle_name`, `Telephone`, `Email`, `ID_Service`, `Date_of_receipt`, `Date_of_completion`) 
                    VALUES ('$clientSurname', '$clientName', '$clientMiddleName', '$clientTelephone', '$clientEmail', $orderIdService, CURRENT_DATE(), NULL)";
                    addslashes($qCreateOrder);
                    $resCreateOrder = mysqli_query($connect, $qCreateOrder) or die(mysqli_error($connect));
                    
                    header("location: /DigitalSphere/services.php");
                }
            }
        }
    }
?>
