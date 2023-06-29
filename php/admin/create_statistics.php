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
        <div class="create_statistics">
            <div class="create_statistics_mainbox">
                <div class="create_statistics_content">
                    <h1 class="create_statistics_title admin_form_title">Добавление записи</h1>
                    <form class="create_statistics_form admin_form" action="../php_handler/create_statistic.php" method="post">
                        <?php
                            include "../php_connect/connect.php";

                            $qInfoIdProject = "SELECT * FROM Projects";
                            addslashes($qInfoIdProject);
                            $resInfoIdProject = mysqli_query($connect, $qInfoIdProject) or die(mysqli_error($connect));

                            echo "<select class=\"create_statistics_id_project admin_input_create\" name=\"Project_name\">";
                            while ($InfoIdProject = mysqli_fetch_object($resInfoIdProject))
                            echo "<option name=\"".$InfoIdProject->ID_Project."\" value=\"".$InfoIdProject->ID_Project."\">".$InfoIdProject->Name."</option>";
                            echo "</select>";

                            $qInfoIdGroup = "SELECT * FROM Groups";
                            addslashes($qInfoIdGroup);
                            $resInfoIdGroup = mysqli_query($connect, $qInfoIdGroup) or die(mysqli_error($connect));

                            echo "<select class=\"create_statistics_id_group admin_input_create\" name=\"Group_name\">";
                            while ($InfoIdGroup = mysqli_fetch_object($resInfoIdGroup))
                            echo "<option name=\"".$InfoIdGroup->ID_Group."\" value=\"".$InfoIdGroup->ID_Group."\">".$InfoIdGroup->Name."</option>";
                            echo "</select>";
                        ?>
                        <input class="create_statistics_start_execution admin_input_create" type="text" onkeyup="
                            var v = this.value;
                            if (v.match(/^\d{4}$/) !== null) {
                                this.value = v + '-';
                            } else if (v.match(/^\d{4}\-\d{2}$/) !== null) {
                                this.value = v + '-';
                            }"  
                            maxlength="10" name="Start_of_execution" placeholder="Начало выполнения" required>
                        <input class="create_statistics_end_execution admin_input_create" type="text" onkeyup="
                            var v = this.value;
                            if (v.match(/^\d{4}$/) !== null) {
                                this.value = v + '-';
                            } else if (v.match(/^\d{4}\-\d{2}$/) !== null) {
                                this.value = v + '-';
                            }"  
                            maxlength="10" name="End_of_execution" placeholder="Конец выполнения">
                        <input class="create_statistics_button admin_form_create_button" type="submit" value="Добавить"/> 
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