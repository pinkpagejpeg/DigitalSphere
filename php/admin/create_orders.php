<!DOCKTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/DigitalSphere/scss/main.css">
        <title>DigitalSphere</title>
    </head>
    <body>
        <div class="create_orders">
            <div class="create_orders_mainbox">
                <div class="create_orders_content">
                    <h1 class="create_orders_title admin_form_title">Добавление записи</h1>
                    <form class="create_orders_form admin_form" action="../php_handler/create_order.php" method="post">
                        <?php
                            include "../php_connect/connect.php";

                            $qInfoIdClient = "SELECT ID_Client, CONCAT(Clients.Surname, ' ', Clients.Name, ' ', Clients.Middle_name) AS FIO, Telephone, Email FROM Clients";
                            addslashes($qInfoIdClient);
                            $resInfoIdClient = mysqli_query($connect, $qInfoIdClient) or die(mysqli_error($connect));

                            echo "<select class=\"create_orders_id_client admin_input_create\" name=\"FIO\">";
                            while ($InfoIdClient = mysqli_fetch_object($resInfoIdClient))
                            echo "<option name=\"".$InfoIdClient->ID_Client."\" value=\"".$InfoIdClient->ID_Client."\">".$InfoIdClient->FIO."</option>";
                            echo "</select>";

                            $qInfoIdService = "SELECT * FROM Services";
                            addslashes($qInfoIdService);
                            $resInfoIdService = mysqli_query($connect, $qInfoIdService) or die(mysqli_error($connect));

                            echo "<select class=\"create_orders_id_service admin_input_create\" name=\"Services_name\">";
                            while ($InfoIdService = mysqli_fetch_object($resInfoIdService))
                            echo "<option name=\"".$InfoIdService->ID_Service."\" value=\"".$InfoIdService->ID_Service."\">".$InfoIdService->Name."</option>";
                            echo "</select>";
                        ?>
                        <input class="create_orders_date_receipt admin_input_create" type="text" onkeyup="
                            var v = this.value;
                            if (v.match(/^\d{4}$/) !== null) {
                                this.value = v + '-';
                            } else if (v.match(/^\d{4}\-\d{2}$/) !== null) {
                                this.value = v + '-';
                            }"  
                            maxlength="10" name="Date_of_receipt" placeholder="Дата поступления" required>
                        <input class="create_orders_date_completion admin_input_create" type="text" onkeyup="
                            var v = this.value;
                            if (v.match(/^\d{4}$/) !== null) {
                                this.value = v + '-';
                            } else if (v.match(/^\d{4}\-\d{2}$/) !== null) {
                                this.value = v + '-';
                            }"  
                            maxlength="10" name="Date_of_completion" placeholder="Дата выполнения">
                        <input class="create_orders_button admin_form_create_button" type="submit" value="Добавить"/> 
                    </form>
                    <a class="create_orders_back admin_link_back" href="./orders.php">Вернуться к заказам</a>
                </div>
            </div>
        </div>    

        <div class="message">
            <?php
                if (isset($_SESSION['message'])) {
                    echo '<p class="message_text">' . $_SESSION['message'] . '</p>';
                } 
                else {
                    echo ' ';
                }
                unset($_SESSION['message']);
            ?>
        </div>
    </body>
</html>