<?php
    include "./php_connect/connect.php";
?>

<!DOCKTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
        <link rel="stylesheet" href="/DigitalSphere/scss/main.css">
        <title>DigitalSphere</title>
    </head>

    <body>
        <div class=container>
            <div class="order">
                <div class="order_mainbox">
                    <div class="order_form_box">
                        <a class="order_close_form_button" href="/DigitalSphere/services.php"><img class="close order_close" src="/DigitalSphere/image/close.svg" alt="Закыть форму"></a>
                        <h5 class="order_form_title">Оформление заказа</h5>
                        <?php
                            if(isset($_GET['idA'])) {
                                $type_service = $_GET['idA'];
                            }
                            
                            echo "<form class=\"order_form\" action=\"./php_handler/order_form_handler.php?idA=$type_service\" method=\"post\">";

                                $qInfoOrder = "SELECT * FROM Type_of_services WHERE ID_Type_of_service = '$type_service'";
                                addslashes($qInfoOrder);
                                $resInfoOrder = mysqli_query($connect, $qInfoOrder) or die(mysqli_error($connect));
                                $InfoOrder = mysqli_fetch_object($resInfoOrder);
                        
                        ?>
                            <div class="order_doubleline_form">
                                <input class="order_surnamebox" type="text" name="Surname" placeholder="Фамилия" autocomplete="off" required="required">
                                <input class="order_namebox" type="text" name="Name" placeholder="Имя" autocomplete="off" required="required">
                            </div>
                            <div class="order_doubleline_form">
                                <input class="order_middle_namebox" type="text" name="Middle_name" placeholder="Отчество" autocomplete="off" required="required">
                                <input class="order_telephonebox" type="tel" name="Telephone" data-phone-pattern autocomplete="off" placeholder="Номер телефона" required>
                            </div>
                            <input class="order_emailbox" type="email" name="Email" placeholder="Электронная почта" autocomplete="off" required="required">
                            <div class="order_doubleline_form">
                                <p class="order_service_type">Тип заказа:</p>
                                <?php
                                    echo "
                                    <p class='order_service_type'>$InfoOrder->Name</p>";
                                ?>
                            </div>
                            <?php
                                $qInfoIdService = "SELECT * FROM Services";
                                addslashes($qInfoIdService);
                                $resInfoIdService = mysqli_query($connect, $qInfoIdService) or die(mysqli_error($connect));

                                echo "<select class=\"order_id_service\" name=\"Services_name\">";
                                while ($InfoIdService = mysqli_fetch_object($resInfoIdService))
                                    echo "<option name=\"" . $InfoIdService->ID_Service . "\" value=\"" . $InfoIdService->ID_Service . "\">" . $InfoIdService->Name . "</option>";
                                echo "</select>";
                            ?>
                            <div class="h-captcha" data-sitekey="29f5232c-c66a-4caf-b4fd-b8d3262d444d"></div>
                            <input class="order_send_button" type="submit" name="button" value="Отправить">
                            <p class="order_rules">Нажимая на кнопку Отправить, вы даете согласие на обработку персональных данных</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>

            <div class="message">
                <?php
                if (isset($_SESSION['message'])) {
                    echo '<p class="message_text">' . $_SESSION['message'] . '</p>';
                } else {
                    echo ' ';
                }
                unset($_SESSION['message']);
                ?>
            </div>
            <script src="/DigitalSphere/js/telephone_mask.js"></script>
    </body>

    </html>