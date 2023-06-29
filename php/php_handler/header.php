<?php
    include "../php_connect/connect.php";

    if (isset($_SESSION['id_user'])) {
        $IDuser = $_SESSION['id_user'];
        if($IDuser === '') {
            unset($IDuser);
        }
    }

    if (isset($IDuser)) {
        $query_access = "SELECT * FROM users, roles WHERE id_user = '$IDuser' AND users.id_role = roles.id_role";
        addslashes($query_access);
        $res_access = mysqli_query($connect, $query_access);
        $row_access = mysqli_fetch_object($res_access);
        $roles = $row_access->name_role;

        $qInfoUser = "SELECT * FROM `users` WHERE id_user = '$IDuser'";
        addslashes($qInfoUser);
        $resInfoUser = mysqli_query($connect, $qInfoUser) or die(mysqli_error($connect));
        $InfoUser = mysqli_fetch_object($resInfoUser);
    }
    else {
        $_SESSION['message'] = 'Доступ к панели администратора закрыт для неавторизованных пользователей!';
        header("location: ../admin/autorization_form.php");
    }
?>

<div id="header" class="admin_panel_header">
    <div class="admin_panel_header_mainbox">
        <img class="admin_panel_header_logo" src="/DigitalSphere/image/logo.svg">
        <a class="admin_panel_header_link" href="index_panel.php">Панель администратора</a>
        <p class="admin_panel_header_login"><?php echo "".$InfoUser->login."";?></p>
        <div class="admin_panel_header_links">
            <?php 
                if (isset($roles)) {
                    if ($roles == 'Администратор') {
                    echo "<a class='admin_panel_header_links_item' href='./clients.php'>Клиенты</a>";
                    echo "<a class='admin_panel_header_links_item' href='./employees.php'>Сотрудники</a>";
                    echo "<a class='admin_panel_header_links_item' href='./groups.php'>Группы</a>";
                    echo "<a class='admin_panel_header_links_item' href='./orders.php'>Заказы</a>";
                    echo "<a class='admin_panel_header_links_item' href='./projects.php'>Проекты</a>";
                    echo "<a class='admin_panel_header_links_item' href='./statistics.php'>Статистика</a>";
                    echo "<a class='admin_panel_header_links_item' href='./services.php'>Услуги</a>";
                }
                else {
                    echo "<a class='admin_panel_header_links_item' href='./projects.php'>Проекты</a>";
                }
            }
            ?>
        </div>
        <a class="admin_panel_header_exit" href="/DigitalSphere/php/php_handler/exit.php">Выйти</a>
    </div>
</div>