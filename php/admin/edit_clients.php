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
        <div class="edit_clients">
            <div class="edit_clients_mainbox">
                <div class="edit_clients_content">
                    <h1 class="edit_clients_title admin_form_title">Редактирование записи</h1>
                    <?php
                        include "../php_connect/connect.php";

                        if(isset($_GET['idA'])) {
                            $client = $_GET['idA'];
                        }

                        echo "<form class=\"edit_clients_form admin_form\" action=\"../php_handler/edit_client.php?idA=$client\" method=\"post\">";

                        $qInfoClient = "SELECT * FROM Clients WHERE ID_Client='$client'";
                        addslashes($qInfoClient);
                        $resInfoClient = mysqli_query($connect, $qInfoClient) or die(mysqli_error($connect));
                        $InfoClient = mysqli_fetch_object($resInfoClient);
                    ?>  

                        <input class="edit_clients_surname admin_input_edit" type="text" name="Surname" value="<?php echo "".$InfoClient->Surname.""; ?>" required>
                        <input class="edit_clients_name admin_input_edit" type="text" name="Name" value="<?php echo "".$InfoClient->Name.""; ?>" required>
                        <input class="edit_clients_middle_name admin_input_edit" type="text" name="Middle_name" value="<?php echo "".$InfoClient->Middle_name.""; ?>">
                        <input class="edit_clients_telephone admin_input_edit" type="tel" name="Telephone" data-phone-pattern value="<?php echo "".$InfoClient->Telephone.""; ?>" required>
                        <input class="edit_clients_email admin_input_edit" type="email" name="Email" value="<?php echo "".$InfoClient->Email.""; ?>" required>
                        <input class="edit_clients_button  admin_form_edit_button" type="submit" value="Редактировать"/> 
                    </form>
                    <a class="create_clients_back admin_link_back" href="./clients.php">Вернуться к клиентам</a>
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
        <script src="/DigitalSphere/js/telephone_mask.js"></script>
    </body>
</html>