<?php
    // Объявление переменной connect, к которой присваивается функция mysqli_connect, 
    // возвращающая результат – ресурс соединения. Внутри этой функции
    // прописываются различные параметры: локальный сервер, логин, пароль, наименование БД.

    $connect=mysqli_connect('localhost', 'root', '', 'IT_company');

    // Функция mysqli_set_charset устанавливает к прописанному подключению кодировку utf8.

    mysqli_set_charset($connect, 'utf8');
    setlocale(LC_ALL, 'UTF-8');

    // Условный оператор if проверяет подключение к БД. Действие происходит так: если 
    // подключение отсутствует, то выводится сообщения об ошибке.

    if(!$connect) {
        printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
        exit;
    }
?>