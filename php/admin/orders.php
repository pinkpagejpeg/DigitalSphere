<?php
session_start();

include "../php_connect/connect.php";

if (isset($_SESSION['id_user'])) {
    $IDuser = $_SESSION['id_user'];
    if ($IDuser === '') {
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
                    <h1 class='admin_table_title'>Услуги</h1> 
                    <a class='admin_table_button_add' href='./create_services.php'>Добавить запись</a>
                </div> 
                <div class='admin_table_box'> 
                    <div class='admin_table_titles'> 
                        <div class='admin_table_cell admin_services_table_id'> 
                            <p>№</p>
                        </div> 
                        <div class='admin_table_cell admin_orders_table_id_client'> 
                            <p>Клиент</p> 
                        </div> 
                        <div class='admin_table_cell admin_orders_table_id_service'> 
                            <p>Услуга</p> 
                        </div> 
                        <div class='admin_table_cell admin_orders_table_date_receipt'> 
                            <p>Дата поступления</p> 
                        </div> 
                        <div class='admin_table_cell admin_orders_table_date_completion'> 
                            <p>Дата выполнения</p> 
                        </div> 
                        <div class='admin_table_cell admin_orders_table_act'> 
                            <p>Действие</p> 
                        </div> 
                    </div>";

                        if (isset($_GET['idD'])) {
                            $orderD = $_GET['idD'];
                            $qDeleteOrder = "DELETE FROM `Orders` WHERE ID_Order='$orderD'";
                            addslashes($qDeleteOrder);
                            $resDeleteOrder = mysqli_query($connect, $qDeleteOrder) or die(mysqli_error($connect));
                        }

                        $qInfoOrder = "SELECT ID_Order, CONCAT(Clients.Surname, ' ', Clients.Name, ' ', Clients.Middle_name) AS FIO, Services.Name AS Services_name, Date_of_receipt, Date_of_completion FROM Orders, Clients, Services WHERE Orders.ID_Client = Clients.ID_Client AND Orders.ID_Service = Services.ID_Service";
                        addslashes($qInfoOrder);
                        $resInfoOrder = mysqli_query($connect, $qInfoOrder) or die(mysqli_error($connect));
                        while ($InfoOrder = mysqli_fetch_object($resInfoOrder)) {
                            echo "
                                <div class=\"admin_table_row\"> 
                                    <div class=\"admin_table_cell admin_orders_table_id\"> 
                                        <p>$InfoOrder->ID_Order</p> 
                                    </div> 
                                    <div class=\"admin_table_cell admin_orders_table_id_client\"> 
                                        <p>$InfoOrder->FIO</p> 
                                    </div> 
                                    <div class=\"admin_table_cell admin_orders_table_id_service\"> 
                                        <p>$InfoOrder->Services_name</p> 
                                    </div> 
                                    <div class=\"admin_table_cell admin_orders_table_date_receipt\"> 
                                        <p>$InfoOrder->Date_of_receipt</p> 
                                    </div> 
                                    <div class=\"admin_table_cell admin_orders_table_date_completion\"> 
                                        <p>$InfoOrder->Date_of_completion</p> 
                                    </div>
                                    <div class=\"admin_orders_table_act\"> 
                                        <a href=\"edit_orders.php?idA=$InfoOrder->ID_Order\"><img class=\"admin_table_act_image\" src=\"/DigitalSphere/image/edit.png\"></a> 
                                        <a href=\"?idD=$InfoOrder->ID_Order\"><img class=\"admin_table_act_image\" src=\"/DigitalSphere/image/remove.png\"></a> 
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