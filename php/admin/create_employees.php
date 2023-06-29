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
        <div class="create_employees">
            <div class="create_employees_mainbox">
                <div class="create_employees_content">
                    <h1 class="create_employees_title admin_form_title">Добавление записи</h1>
                    <form class="create_employees_form admin_form" action="../php_handler/create_employee.php" method="post">
                        <input class="create_employees_surname admin_input_create" type="text" name="Surname" placeholder="Фамилия" required>
                        <input class="create_employees_name admin_input_create" type="text" name="Name" placeholder="Имя" required>
                        <input class="create_employees_middle_name admin_input_create" type="text" name="Middle_name" placeholder="Отчество">
                        <?php
                            include "../php_connect/connect.php";

                            $qInfoIdDepartment = "SELECT * FROM Departments";
                            addslashes($qInfoIdDepartment);
                            $resInfoIdDepartment = mysqli_query($connect, $qInfoIdDepartment) or die(mysqli_error($connect));

                            echo "<select class=\"create_employees_id_department admin_input_create\" name=\"Department_name\">";
                            while ($InfoIdDepartment = mysqli_fetch_object($resInfoIdDepartment))
                            echo "<option name=\"".$InfoIdDepartment->ID_Department."\" value=\"".$InfoIdDepartment->ID_Department."\">".$InfoIdDepartment->Name."</option>";
                            echo "</select>";

                            $qInfoIdGroup = "SELECT * FROM Groups";
                            addslashes($qInfoIdGroup);
                            $resInfoIdGroup = mysqli_query($connect, $qInfoIdGroup) or die(mysqli_error($connect));

                            echo "<select class=\"create_employees_id_group admin_input_create\" name=\"Group_name\">";
                            while ($InfoIdGroup = mysqli_fetch_object($resInfoIdGroup))
                            echo "<option name=\"".$InfoIdGroup->ID_Group."\" value=\"".$InfoIdGroup->ID_Group."\">".$InfoIdGroup->Name."</option>";
                            echo "</select>";
                        ?>
                        <input class="create_employees_salary admin_input_create" type="number" step="1000" name="Salary" placeholder="Зарплата">
                        <input class="create_employees_start_work admin_input_create" type="text" onkeyup="
                            var v = this.value;
                            if (v.match(/^\d{4}$/) !== null) {
                                this.value = v + '-';
                            } else if (v.match(/^\d{4}\-\d{2}$/) !== null) {
                                this.value = v + '-';
                            }"  
                            maxlength="10" name="Start_of_work" placeholder="Начало работы" required>
                        <input class="create_employees_end_work admin_input_create" type="text" onkeyup="
                            var v = this.value;
                            if (v.match(/^\d{4}$/) !== null) {
                                this.value = v + '-';
                            } else if (v.match(/^\d{4}\-\d{2}$/) !== null) {
                                this.value = v + '-';
                            }"  
                            maxlength="10" name="End_of_work" placeholder="Конец работы">
                        <input class="create_employees_button admin_form_create_button" type="submit" value="Добавить"/> 
                    </form>
                    <a class="create_employees_back admin_link_back" href="./employees.php">Вернуться к сотрудникам</a>
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