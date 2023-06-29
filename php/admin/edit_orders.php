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
        <div class="edit_orders">
            <div class="edit_orders_mainbox">
                <div class="edit_orders_content">
                    <h1 class="edit_orders_title admin_form_title">Редактирование записи</h1>
                        <?php
                            include "../php_connect/connect.php";

                            if(isset($_GET['idA'])) {
                                $order = $_GET['idA'];
                            }

                            echo "<form class=\"edit_orders_form admin_form\" action=\"../php_handler/edit_order.php?idA=$order\" method=\"post\">";

                            $qInfoOrder = "SELECT * FROM Orders WHERE ID_Order='$order'";
                            addslashes($qInfoOrder);
                            $resInfoOrder = mysqli_query($connect, $qInfoOrder) or die(mysqli_error($connect));
                            $InfoOrder = mysqli_fetch_object($resInfoOrder);

                            $qInfoIdClient = "SELECT ID_Client, CONCAT(Clients.Surname, ' ', Clients.Name, ' ', Clients.Middle_name) AS FIO, Telephone, Email FROM Clients";
                            addslashes($qInfoIdClient);
                            $resInfoIdClient = mysqli_query($connect, $qInfoIdClient) or die(mysqli_error($connect));

                            echo "<select class=\"edit_orders_id_client admin_input_edit\" name=\"FIO\">";
                            while ($InfoIdClient = mysqli_fetch_object($resInfoIdClient))
                            echo "<option name=\"".$InfoIdClient->ID_Client."\" value=\"".$InfoIdClient->ID_Client."\">".$InfoIdClient->FIO."</option>";
                            echo "</select>";

                            $qInfoIdService = "SELECT * FROM Services";
                            addslashes($qInfoIdService);
                            $resInfoIdService = mysqli_query($connect, $qInfoIdService) or die(mysqli_error($connect));

                            echo "<select class=\"edit_orders_id_service admin_input_edit\" name=\"Services_name\">";
                            while ($InfoIdService = mysqli_fetch_object($resInfoIdService))
                            echo "<option name=\"".$InfoIdService->ID_Service."\" value=\"".$InfoIdService->ID_Service."\">".$InfoIdService->Name."</option>";
                            echo "</select>";
                        ?>
                        <input class="edit_orders_date_receipt admin_input_edit" type="text" onkeyup="
                            var v = this.value;
                            if (v.match(/^\d{4}$/) !== null) {
                                this.value = v + '-';
                            } else if (v.match(/^\d{4}\-\d{2}$/) !== null) {
                                this.value = v + '-';
                            }"  
                            maxlength="10" name="Date_of_receipt" placeholder="Дата поступления" value="<?php echo "".$InfoOrder->Date_of_receipt.""; ?>"required>
                        <input class="edit_orders_date_completion admin_input_edit" type="text" onkeyup="
                            var v = this.value;
                            if (v.match(/^\d{4}$/) !== null) {
                                this.value = v + '-';
                            } else if (v.match(/^\d{4}\-\d{2}$/) !== null) {
                                this.value = v + '-';
                            }"  
                            maxlength="10" name="Date_of_completion" placeholder="Дата выполнения" value="<?php echo "".$InfoOrder->Date_of_completion.""; ?>">
                        <input class="edit_orders_button admin_form_edit_button" type="submit" value="Редактировать"/> 
                    </form>
                    <a class="edit_orders_back admin_link_back" href="./orders.php">Вернуться к заказам</a>
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