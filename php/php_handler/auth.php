<?php
    // Открытие сессии

    session_start();

    // Подключение файла с подключением к базе данных

    include "../php_connect/connect.php";

    // Проверки
    // Если пустая переменная ПОСТ [логин из формы]), 
    // тогда переменная login присваивается переменная ПОСТ [логин из формы]
    // Если переменная login равна пустому значению, тогда данная переменная удаляется.

    if(isset($_POST['submit'])) {
        if(isset($_POST['login'])) {
            $login = $_POST['login'];
            if($login === '') {
                unset($login);
            }
        } 
        
        // Проверки аналогично логину

        if(isset($_POST['password'])) {
            $password = $_POST['password'];
            if($password === '') {
            unset($password);
            }
        }

        if(isset($_POST['g-recaptcha-response'])) {
            $recapcha = $_POST['g-recaptcha-response'];
            
            if(!$recapcha){
                $_SESSION['message'] = 'Пожалуйста, подтвердите, что вы не робот';
                header('Location: ' . $_SERVER['HTTP_REFERER']);     
            }
            else  {
                $secretKey = '6LeFycomAAAAANThcyIhaR3m6KOk32apfiL0TGsY';
                $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $recapcha;
                $response = file_get_contents($url);
                $responseKey = json_decode($response, true);

                if($responseKey['success']) {

                    // Удаление лишних отступов в переменной

                    $login = trim($_POST['login']);
                    $password = trim($_POST['password']);

                    // check_user содержит запрос на вывод всей информации из таблицы users, где атрибут из БД login присваивается к 
                    // созданной переменной login и атрибут из БД password присваивается к созданной переменной password

                    $check_user = "SELECT * FROM `users` WHERE `login`= '$login' AND `password`= '$password'";

                    // result присваивается к функции mysqli_query, которая выполняет запрос и в ее параметрах
                    // указывается подключение к БД и запрос

                    $result = mysqli_query($connect, $check_user);

                    // info_user содержит функцию mysqli_fetch_array, которая используется для получения
                    // одной строки из результирующего набора, которую она помещает в массив
                    
                    $info_user = mysqli_fetch_array($result);

                    if(empty($info_user['id_user'])) {
                        $_SESSION['message'] = 'Неправильный логин или пароль!';
                        header("location: ../admin/autorization_form.php ");
                    }
                    else {
                        if($info_user['password'] === $password) {
                            $_SESSION['login'] = $info_user['login'];
                            $_SESSION['id_user'] = $info_user['id_user'];
                            $_SESSION['administrator_rights'] = $info_user['administrator_rights'];
                            header("location: ../admin/index_panel.php");
                        }
                        else {
                            $_SESSION['message'] = 'Неправильный пароль!';
                            header("location: ../admin/autorization_form.php");
                        }
                    }
                }
            }
        }
    }
?>