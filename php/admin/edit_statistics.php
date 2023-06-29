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
        <div class="edit_statistics">
            <div class="edit_statistics_mainbox">
                <div class="edit_statistics_content">
                    <h1 class="edit_statistics_title admin_form_title">Редактирование записи</h1>
                        <?php
                            include "../php_connect/connect.php";

                            if(isset($_GET['idA'])) {
                                $statistic = $_GET['idA'];
                            }

                            echo "<form class=\"edit_statistics_form admin_form\" action=\"../php_handler/edit_statistic.php?idA=$statistic\" method=\"post\">";

                            $qInfoStatistic = "SELECT * FROM Project_execution_statistics WHERE ID_Project_execution_statistic='$statistic'";
                            addslashes($qInfoStatistic);
                            $resInfoStatistic = mysqli_query($connect, $qInfoStatistic) or die(mysqli_error($connect));
                            $InfoStatistic = mysqli_fetch_object($resInfoStatistic);

                            $qInfoIdProject = "SELECT * FROM Projects";
                            addslashes($qInfoIdProject);
                            $resInfoIdProject = mysqli_query($connect, $qInfoIdProject) or die(mysqli_error($connect));

                            echo "<select class=\"create_statistics_id_project admin_input_edit\" name=\"Project_name\">";
                            while ($InfoIdProject = mysqli_fetch_object($resInfoIdProject))
                            echo "<option name=\"".$InfoIdProject->ID_Project."\" value=\"".$InfoIdProject->ID_Project."\">".$InfoIdProject->Name."</option>";
                            echo "</select>";

                            $qInfoIdGroup = "SELECT * FROM Groups";
                            addslashes($qInfoIdGroup);
                            $resInfoIdGroup = mysqli_query($connect, $qInfoIdGroup) or die(mysqli_error($connect));

                            echo "<select class=\"create_statistics_id_group admin_input_edit\" name=\"Group_name\">";
                            while ($InfoIdGroup = mysqli_fetch_object($resInfoIdGroup))
                            echo "<option name=\"".$InfoIdGroup->ID_Group."\" value=\"".$InfoIdGroup->ID_Group."\">".$InfoIdGroup->Name."</option>";
                            echo "</select>";
                        ?>
                        <input class="edit_statistics_start_execution admin_input_edit" type="text" onkeyup="
                            var v = this.value;
                            if (v.match(/^\d{4}$/) !== null) {
                                this.value = v + '-';
                            } else if (v.match(/^\d{4}\-\d{2}$/) !== null) {
                                this.value = v + '-';
                            }"  
                            maxlength="10" name="Start_of_execution" value="<?php echo "".$InfoStatistic->Start_of_execution.""; ?>" required>
                        <input class="edit_statistics_end_execution admin_input_edit" type="text" onkeyup="
                            var v = this.value;
                            if (v.match(/^\d{4}$/) !== null) {
                                this.value = v + '-';
                            } else if (v.match(/^\d{4}\-\d{2}$/) !== null) {
                                this.value = v + '-';
                            }"  
                            maxlength="10" name="End_of_execution" value="<?php echo "".$InfoStatistic->End_of_execution.""; ?>">
                        <input class="edit_statistics_button admin_form_edit_button" type="submit" value="Редактировать"/> 
                    </form>
                    <a class="create_statistics_back admin_link_back" href="./statistics.php">Вернуться к статистике</a>
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