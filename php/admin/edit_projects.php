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
        <div class="edit_projects">
            <div class="edit_projects_mainbox">
                <div class="edit_projects_content">
                    <h1 class="edit_projects_title admin_form_title">Редактирование записи</h1>
                    <?php
                        include "../php_connect/connect.php";

                        if(isset($_GET['idA'])) {
                            $project = $_GET['idA'];
                        }

                        echo "<form class=\"edit_projects_form admin_form\" action=\"../php_handler/edit_project.php?idA=$project\" method=\"post\">";

                        $qInfoProject = "SELECT * FROM Projects WHERE ID_Project='$project'";
                        addslashes($qInfoProject);
                        $resInfoProject = mysqli_query($connect, $qInfoProject) or die(mysqli_error($connect));
                        $InfoProject = mysqli_fetch_object($resInfoProject);
                    ?>  

                        <input class="edit_projects_name admin_input_edit" type="text" name="Name" value="<?php echo "".$InfoProject->Name.""; ?>" required>
                        <?php
                            $qInfoIdOrder = "SELECT * FROM Orders";
                            addslashes($qInfoIdOrder);
                            $resInfoIdOrder = mysqli_query($connect, $qInfoIdOrder) or die(mysqli_error($connect));

                            echo "<select class=\"edit_projects_id_order admin_input_edit\" name=\"Date_of_receipt\">";
                            while ($InfoIdOrder = mysqli_fetch_object($resInfoIdOrder))
                            echo "<option name=\"".$InfoIdOrder->ID_Order."\" value=\"".$InfoIdOrder->ID_Order."\">".$InfoIdOrder->Date_of_receipt."</option>";
                            echo "</select>";
                            ?>
                        <input class="edit_projects_button admin_form_edit_button" type="submit" value="Редактировать"/> 
                    </form>
                    <a class="create_projects_back admin_link_back" href="./projects.php">Вернуться к проектам</a>
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