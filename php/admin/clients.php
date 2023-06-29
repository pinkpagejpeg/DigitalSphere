<?php
    session_start();

    include "../php_connect/connect.php";

    if (isset($_SESSION['id_user'])) {
        $IDuser = $_SESSION['id_user'];
        if($IDuser === '') {
            unset($IDuser);
        }
    }
?>

<DOCKTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/DigitalSphere/scss/main.css">
        <title>DigitalSphere</title>
    </head>
    <body>
        <div class="container">
            <?php
                include "../php_handler/header.php";
            ?>
        </div>

        <div class="container">
        <?php
            if (isset($IDuser)) {
                if (isset($roles)) {
                    if ($roles == 'Администратор') {
                        echo "
            <div class='admin_table_mainbox'> 
                <div class='admin_table_topline'> 
                    <h1 class='admin_table_title'>Клиенты</h1> 
                    <a class='admin_table_button_add' href='./create_clients.php'>Добавить запись</a>
                </div> 
                <div class='admin_table_box'> 
                    <div class='admin_table_titles'> 
                        <div class='admin_table_cell admin_services_table_id'> 
                            <p>№</p>
                        </div> 
                        <div class='admin_table_cell admin_clients_table_surname'> 
                            <p>Фамилия</p> 
                        </div>
                        <div class='admin_table_cell admin_clients_table_name'> 
                            <p>Имя</p> 
                        </div> 
                        <div class='admin_table_cell admin_clients_table_middle_name'> 
                            <p>Отчество</p> 
                        </div>  
                        <div class='admin_table_cell admin_clients_table_telephone'> 
                            <p>Телефон</p> 
                        </div>
                        <div class='admin_table_cell admin_clients_table_email'> 
                            <p>Электронная почта</p> 
                        </div> 
                        <div class='admin_table_cell admin_clients_table_act'> 
                            <p>Действие</p> 
                        </div> 
                    </div>";

                        if (isset($_GET['idD'])) {
                            $clientD = $_GET['idD'];
                            $qDeleteClient = "DELETE FROM `Clients` WHERE ID_Client='$clientD'";
                            addslashes($qDeleteClient);
                            $resDeleteClient = mysqli_query($connect, $qDeleteClient) or die(mysqli_error($connect));
                        }

                        $qInfoClient = "SELECT * FROM Clients";
                        addslashes($qInfoClient);
                        $resInfoClient = mysqli_query($connect, $qInfoClient) or die(mysqli_error($connect));
                        while ($InfoClient = mysqli_fetch_object($resInfoClient)) {
                            echo "
                                <div class=\"admin_table_row\"> 
                                    <div class=\"admin_table_cell admin_clients_table_id\"> 
                                        <p>$InfoClient->ID_Client</p> 
                                    </div> 
                                    <div class=\"admin_table_cell admin_clients_table_surname\"> 
                                        <p>$InfoClient->Surname</p> 
                                    </div> 
                                    <div class=\"admin_table_cell admin_clients_table_name\"> 
                                        <p>$InfoClient->Name</p> 
                                    </div> 
                                    <div class=\"admin_table_cell admin_clients_table_middle_name\"> 
                                        <p>$InfoClient->Middle_name</p> 
                                    </div> 
                                    <div class=\"admin_table_cell admin_clients_table_telephone\"> 
                                        <p>$InfoClient->Telephone</p> 
                                    </div> 
                                    <div class=\"admin_table_cell admin_clients_table_email\"> 
                                        <p>$InfoClient->Email</p> 
                                    </div> 
                                    <div class=\"admin_clients_table_act\"> 
                                        <a href=\"edit_clients.php?idA=$InfoClient->ID_Client\"><img class=\"admin_table_act_image\" src=\"/DigitalSphere/image/edit.png\"></a> 
                                        <a href=\"?idD=$InfoClient->ID_Client\"><img class=\"admin_table_act_image\" src=\"/DigitalSphere/image/remove.png\"></a> 
                                        </div> 
                                        </div> 
                                    ";
                                }
                                echo "
                                    </div> 
                                </div>";
                            } else {
                                echo "";
                            }
                        }
                    } else {
                        $_SESSION['message'] = 'Доступ к панели администратора закрыт для неавторизованных пользователей!';
                        header("location: ../admin/autorization_form.php");
                    }
                    ?>
                </div>
            </body>
        
            </html>