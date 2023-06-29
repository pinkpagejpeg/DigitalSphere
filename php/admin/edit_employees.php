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
        <div class="edit_employees">
            <div class="edit_employees_mainbox">
                <div class="edit_employees_content">
                    <h1 class="edit_employees_title admin_form_title">Редактирование записи</h1>
                        <?php
                            include "../php_connect/connect.php";

                            if(isset($_GET['idA'])) {
                                $employee = $_GET['idA'];
                            }

                            echo "<form class=\"edit_employees_form admin_form\" action=\"../php_handler/edit_employee.php?idA=$employee\" method=\"post\">";
                            
                            $qInfoEmployee = "SELECT * FROM Employees WHERE ID_Employee='$employee'";
                            addslashes($qInfoEmployee);
                            $resInfoEmployee = mysqli_query($connect, $qInfoEmployee) or die(mysqli_error($connect));
                            $InfoEmployee = mysqli_fetch_object($resInfoEmployee);
                        ?>

                            <input class="edit_employees_surname admin_input_edit" type="text" name="Surname" value="<?php echo "".$InfoEmployee->Surname.""; ?>" required>
                            <input class="edit_employees_name admin_input_edit" type="text" name="Name" value="<?php echo "".$InfoEmployee->Name.""; ?>" required>
                            <input class="edit_employees_middle_name admin_input_edit" type="text" name="Middle_name" value="<?php echo "".$InfoEmployee->Middle_name.""; ?>">

                        <?php
                            $qInfoIdDepartment = "SELECT * FROM Departments";
                            addslashes($qInfoIdDepartment);
                            $resInfoIdDepartment = mysqli_query($connect, $qInfoIdDepartment) or die(mysqli_error($connect));

                            echo "<select class=\"edit_employees_id_department admin_input_edit\" name=\"Department_name\">";
                            while ($InfoIdDepartment = mysqli_fetch_object($resInfoIdDepartment))
                            echo "<option name=\"".$InfoIdDepartment->ID_Department."\" value=\"".$InfoIdDepartment->ID_Department."\">".$InfoIdDepartment->Name."</option>";
                            echo "</select>";

                            $qInfoIdGroup = "SELECT * FROM Groups";
                            addslashes($qInfoIdGroup);
                            $resInfoIdGroup = mysqli_query($connect, $qInfoIdGroup) or die(mysqli_error($connect));

                            echo "<select class=\"create_employees_id_group admin_input_edit\" name=\"Group_name\">";
                            while ($InfoIdGroup = mysqli_fetch_object($resInfoIdGroup))
                            echo "<option name=\"".$InfoIdGroup->ID_Group."\" value=\"".$InfoIdGroup->ID_Group."\">".$InfoIdGroup->Name."</option>";
                            echo "</select>";
                        ?>
                        <input class="edit_employees_salary admin_input_edit" type="number" step="1000" name="Salary" value="<?php echo "".$InfoEmployee->Salary.""; ?>">
                        <input class="edit_employees_start_work admin_input_edit" type="text" onkeyup="
                            var v = this.value;
                            if (v.match(/^\d{4}$/) !== null) {
                                this.value = v + '-';
                            } else if (v.match(/^\d{4}\-\d{2}$/) !== null) {
                                this.value = v + '-';
                            }"  
                            maxlength="10" name="Start_of_work" placeholder="Начало работы" value="<?php echo "".$InfoEmployee->Start_of_work.""; ?>" required>
                        <input class="edit_employees_end_work admin_input_edit" type="text" onkeyup="
                            var v = this.value;
                            if (v.match(/^\d{4}$/) !== null) {
                                this.value = v + '-';
                            } else if (v.match(/^\d{4}\-\d{2}$/) !== null) {
                                this.value = v + '-';
                            }"  
                            maxlength="10" name="End_of_work" placeholder="Конец работы" value="<?php echo "".$InfoEmployee->End_of_work.""; ?>">
                        <input class="edit_employees_button admin_form_edit_button" type="submit" value="Редактировать"/> 
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