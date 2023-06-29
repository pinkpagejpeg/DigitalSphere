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
        <div class="edit_groups">
            <div class="edit_groups_mainbox">
                <div class="edit_groups_content">
                    <h1 class="edit_groups_title admin_form_title">Редактирование записи</h1>
                    <?php
                        include "../php_connect/connect.php";

                        if(isset($_GET['idA'])) {
                            $group = $_GET['idA'];
                        }

                        echo "<form class=\"edit_groups_form admin_form\" action=\"../php_handler/edit_group.php?idA=$group\" method=\"post\">";

                        $qInfoGroup = "SELECT * FROM Groups WHERE ID_Group='$group'";
                        addslashes($qInfoGroup);
                        $resInfoGroup = mysqli_query($connect, $qInfoGroup) or die(mysqli_error($connect));
                        $InfoGroup = mysqli_fetch_object($resInfoGroup);
                    ?>  

                        <input class="edit_groups_name admin_input_edit" type="text" name="Name" value="<?php echo "".$InfoGroup->Name.""; ?>" required>
                        <input class="edit_groups_button admin_form_edit_button" type="submit" value="Редактировать"/> 
                    </form>
                    <a class="create_groups_back admin_link_back" href="./groups.php">Вернуться к группам</a>
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