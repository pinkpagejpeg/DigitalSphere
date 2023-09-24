<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="scss/main.css">
    <title>DigitalSphere</title>
</head>
<body>

    <!-- header -->
    
    <div class="container">
        <header class="header">
            <nav class="menu">
                <ul class="menu_wrapper">
                    <li class="menu_item_logo"><a href="./index.html" class="menu_link"><img class="menu_logo" src="./image/logo.svg" alt="Логотип DigitalSphere"></a></li>
                    <li class="menu_item"><a href="./index.html" class="menu_link">Главная</a></li>
                    <li class="menu_item"><a href="./services.html" class="menu_link menu_current_page">Услуги</a></li>
                    <li class="menu_item"><a href="./projects.html" class="menu_link">Проекты</a></li>
                    <li class="menu_item"><a href="./about.html" class="menu_link">О компании</a></li>
                    <li class="menu_item"><a href="./contacts.html" class="menu_link">Контакты</a></li>
                    <li class="menu_item_button"><a href="#" class="menu_button_text">Связаться с нами</a></li>
                </ul>
            </nav>
        </header>
    </div>

    <!-- feedback form -->

    <div class="feedback">
        <div class="feedback_mainbox">
            <div class="feedback_form_box">
                <a class="feedback_close_form_button"><img class="close feedback_close" src="./image/close.svg" alt="Закыть форму"></a>
                <h5 class="feedback_form_title">Связаться с нами</h5>
                <form class="feedback_form">
                    <div class="feedback_topline_form">
                        <input class="feedback_namebox" type="text" name="name" placeholder="Имя" autocomplete="off" required="required">
                        <input class="feedback_telephonebox" type="telephone" name="telephone" placeholder="Номер телефона" autocomplete="off" required="required">
                    </div>
                    <input class="feedback_emailbox" type="email" name="email" placeholder="Электронная почта" autocomplete="off" required="required">
                    <input class="feedback_send_button" type="submit" name="button" value="Отправить">
                    <p class="feedback_rules">Нажимая на кнопку Отправить, вы даете согласие на обработку персональных данных</p>
                </form>
            </div>
        </div>
    </div>

    <!-- button for support chat -->

    <a href="#" class="button_support support_chat_open"><img class="button_support_icon" src="./image/support_chat.png"></a>

    <!-- support chat -->
    
    <div class="support_chat">
        <div class="support_chat_mainbox">
            <a class="support_chat_close_button"><img class="close support_chat_close" src="./image/close.svg" alt="Закыть форму"></a>
            <div class="support_chat_topline">
                <div class="support_chat_status"></div>
                <p class="support_chat_title">Связаться с нами</p>
            </div>
            <p class="support_chat_subtitle">Онлайн консультант</p>
            <div class="support_chat_greetings">
                <p class="support_chat_greetings_text">Привет, я виртуальный помощник DigitalSphere. Как я могу вам помочь? Пожалуйста, подробно опишите свой вопрос, так я ничего не упущу и передам оператору точную информацию.</p>
            </div>
            <div class="support_chat_line"></div>
            <div class="support_chat_bottomline">
                <p class="support_chat_message">Введите сообщение...</p>
                <img class="support_chat_send_message" src="./image/right_arrow.svg" alt="Кнопка отправить">
            </div>
        </div>
    </div>

    <!-- services section -->

    <div class="container">
        <div class="services">
            <div class="services_mainbox">
                <h2 class="title services_title">Услуги</h2>
                <p class="main_text services_text">Разнообразный и богатый опыт говорит нам, что синтетическое тестирование предоставляет широкие возможности для существующих финансовых и административных условий. Современные технологии достигли такого уровня, что высокотехнологичная концепция общественного уклада не оставляет шанса для распределения внутренних резервов и ресурсов.</p>
                
                <div class="services_list">
                    <div class="services_list_item">
                        <div class="services_list_topline">
                            <img class="services_list_icon" src="./image/project_management.png" alt="Работы IT-консалтинг">
                            <h3 class="services_list_title subtitle">IT-консалтинг</h3>
                        </div>
                        <div class="services_list_info">
                            <p class="main_text services_list_text">Перспективное планирование говорит о возможностях прогресса профессионального сообщества. Непосредственные участники технического прогресса призывают нас к новым свершениям, которые, в свою очередь, должны быть объективно рассмотрены соответствующими инстанциями. Разнообразный и богатый опыт говорит нам, что убеждённость некоторых оппонентов однозначно фиксирует необходимость дальнейших направлений развития.</p>
                            <p class="main_text services_list_text">Перспективное планирование говорит о возможностях прогресса профессионального сообщества. Непосредственные участники технического прогресса призывают нас к новым свершениям, которые, в свою очередь, должны быть объективно рассмотрены соответствующими инстанциями. Разнообразный и богатый опыт говорит нам, что убеждённость некоторых оппонентов однозначно фиксирует необходимость дальнейших направлений развития.</p>
                            <div class="services_examples">
                                <p class="services_examples_item">Общий IT-аудит</p>
                                <p class="services_examples_item">Разработка IT-стратегии компании</p>
                                <p class="services_examples_item">Аудит программной инфраструктуры компании</p>
                                <p class="services_examples_item">Обеспечение непрерывности процессов и транзакций в бизнесе</p>
                                <p class="services_examples_item">Организация IT-процессов</p>
                            </div>
                            <div class="services_buttons">
                                <a class="button services_projects_button" href="./projects.html">Проекты</a>
                                <a class="button feedback_consulting_button" href="./php/order_form.php?idA=1">Заказать</a>
                            </div>
                        </div>
                    </div>

                    <div class="services_list_item">
                        <div class="services_list_topline">
                            <img class="services_list_icon" src="./image/personalization.png" alt="Работы Дизайн">
                            <h3 class="services_list_title subtitle">Дизайн</h3>
                        </div>
                        <div class="services_list_info">
                            <p class="main_text services_list_text">Перспективное планирование говорит о возможностях прогресса профессионального сообщества. Непосредственные участники технического прогресса призывают нас к новым свершениям, которые, в свою очередь, должны быть объективно рассмотрены соответствующими инстанциями. Разнообразный и богатый опыт говорит нам, что убеждённость некоторых оппонентов однозначно фиксирует необходимость дальнейших направлений развития.</p>
                            <p class="main_text services_list_text">Перспективное планирование говорит о возможностях прогресса профессионального сообщества. Непосредственные участники технического прогресса призывают нас к новым свершениям, которые, в свою очередь, должны быть объективно рассмотрены соответствующими инстанциями. Разнообразный и богатый опыт говорит нам, что убеждённость некоторых оппонентов однозначно фиксирует необходимость дальнейших направлений развития.</p>
                            <div class="services_examples">
                                <p class="services_examples_item">Веб-дизайн</p>
                                <p class="services_examples_item">Графический дизайн</p>
                                <p class="services_examples_item">Дизайн мобильных приложений</p>
                                <p class="services_examples_item">Информационный дизайн</p>
                                <p class="services_examples_item">UX-дизайн</p>
                                <p class="services_examples_item">UI-дизайн</p>
                            </div>
                            <div class="services_buttons">
                                <a class="button services_projects_button" href="./projects.html">Проекты</a>
                                <a class="button feedback_design_button" href="./php/order_form.php?idA=2">Заказать</a>
                            </div>
                        </div>
                    </div>

                    <div class="services_list_item">
                        <div class="services_list_topline">
                            <img class="services_list_icon" src="./image/developer.png" alt="Работы Разработка">
                            <h3 class="services_list_title subtitle">Разработка</h3>
                        </div>
                        <div class="services_list_info">
                            <p class="main_text services_list_text">Перспективное планирование говорит о возможностях прогресса профессионального сообщества. Непосредственные участники технического прогресса призывают нас к новым свершениям, которые, в свою очередь, должны быть объективно рассмотрены соответствующими инстанциями. Разнообразный и богатый опыт говорит нам, что убеждённость некоторых оппонентов однозначно фиксирует необходимость дальнейших направлений развития.</p>
                            <p class="main_text services_list_text">Перспективное планирование говорит о возможностях прогресса профессионального сообщества. Непосредственные участники технического прогресса призывают нас к новым свершениям, которые, в свою очередь, должны быть объективно рассмотрены соответствующими инстанциями. Разнообразный и богатый опыт говорит нам, что убеждённость некоторых оппонентов однозначно фиксирует необходимость дальнейших направлений развития.</p>
                            <div class="services_examples">
                                <p class="services_examples_item">Веб-разработка</p>
                                <p class="services_examples_item">Разработка серверного ПО</p>
                                <p class="services_examples_item">Мобильная разработка</p>
                                <p class="services_examples_item">Разработка системного ПО</p>
                                <p class="services_examples_item">Разработка прикладного ПО</p>
                                <p class="services_examples_item">Десктоп разработка</p>
                            </div>
                            <div class="services_buttons">
                                <a class="button services_projects_button" href="./projects.html">Проекты</a>
                                <a class="button feedback_develop_button" href="./php/order_form.php?idA=3">Заказать</a>
                            </div>
                        </div>
                    </div>

                    <div class="services_list_item">
                        <div class="services_list_topline">
                            <img class="services_list_icon" src="./image/paid_search.png" alt="Работы Цифровой маркетинг">
                            <h3 class="services_list_title subtitle">Цифровой маркетинг</h3>
                        </div>
                        <div class="services_list_info">
                            <p class="main_text services_list_text">Перспективное планирование говорит о возможностях прогресса профессионального сообщества. Непосредственные участники технического прогресса призывают нас к новым свершениям, которые, в свою очередь, должны быть объективно рассмотрены соответствующими инстанциями. Разнообразный и богатый опыт говорит нам, что убеждённость некоторых оппонентов однозначно фиксирует необходимость дальнейших направлений развития.</p>
                            <p class="main_text services_list_text">Перспективное планирование говорит о возможностях прогресса профессионального сообщества. Непосредственные участники технического прогресса призывают нас к новым свершениям, которые, в свою очередь, должны быть объективно рассмотрены соответствующими инстанциями. Разнообразный и богатый опыт говорит нам, что убеждённость некоторых оппонентов однозначно фиксирует необходимость дальнейших направлений развития.</p>
                            <div class="services_examples">
                                <p class="services_examples_item">SMM-продвижение</p>
                                <p class="services_examples_item">Оптимизация скорости конверсий</p>
                                <p class="services_examples_item">SEO-продвижение</p>
                                <p class="services_examples_item">Email-маркетинг</p>
                                <p class="services_examples_item">Партнерский маркетинг</p>
                                <p class="services_examples_item">Контекстная, баннерная, нативная реклама</p>
                            </div>
                            <div class="services_buttons">
                                <a class="button services_projects_button" href="./projects.html">Проекты</a>
                                <a class="button feedback_marketing_button" href="./php/order_form.php?idA=4">Заказать</a>
                            </div>
                        </div>
                    </div>

                    <div class="services_list_item">
                        <div class="services_list_topline">
                            <img class="services_list_icon" src="./image/computer_support.png" alt="Работы IT-аутсорсинг">
                            <h3 class="services_list_title subtitle">IT-аутсорсинг</h3>
                        </div>
                        <div class="services_list_info">
                            <p class="main_text services_list_text">Перспективное планирование говорит о возможностях прогресса профессионального сообщества. Непосредственные участники технического прогресса призывают нас к новым свершениям, которые, в свою очередь, должны быть объективно рассмотрены соответствующими инстанциями. Разнообразный и богатый опыт говорит нам, что убеждённость некоторых оппонентов однозначно фиксирует необходимость дальнейших направлений развития.</p>
                            <p class="main_text services_list_text">Перспективное планирование говорит о возможностях прогресса профессионального сообщества. Непосредственные участники технического прогресса призывают нас к новым свершениям, которые, в свою очередь, должны быть объективно рассмотрены соответствующими инстанциями. Разнообразный и богатый опыт говорит нам, что убеждённость некоторых оппонентов однозначно фиксирует необходимость дальнейших направлений развития.</p>
                            <div class="services_examples">
                                <p class="services_examples_item">Ресурсный аутсорсинг</p>
                                <p class="services_examples_item">Функциональный аутсорсинг</p>
                                <p class="services_examples_item">Стратегический аутсорсинг</p>
                            </div>
                            <div class="services_buttons">
                                <a class="button services_projects_button" href="./projects.html">Проекты</a>
                                <a class="button feedback_outsourcing_button" href="./php/order_form.php?idA=5">Заказать</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- feedback section -->

    <div class="services_feedback_background">
        <div class="container">
            <div class="services_feedback">
                <div class="services_feedback_mainbox">
                    <h3 class="services_feedback_title">Остались вопросы? Задайте их нам</h3>
                    <a class="button feedback_open_button" href="#">Связаться с нами</a>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->

    <div class="container">
        <footer class="footer">
            <div class="footer_mainbox">
                <img class="footer_logo" src="./image/logo.svg" alt="Логотип DigitalSphere">
                <p class="main_text footer_text">Перспективное планирование говорит о возможностях прогресса профессионального сообщества.</p>
                <div class="footer_dockbox">
                    <a class="footer_dock" href="#">Условия</a>
                    <a class="footer_dock" href="#">Конфиденциальность</a>
                    <a class="footer_dock" href="./php/admin/autorization_form.php">Сотрудникам</a>
                    <a class="footer_dock" href="#">Cookies</a>
                </div>
                <div class="footer_socialbox">
                    <a class="footer_social_link" href="#"><img class="footer_social_logo" src="./image/twitter_logo.svg" alt="Логотип Twitter"></a>
                    <a class="footer_social_link" href="#"><img class="footer_social_logo" src="./image/telegram_logo.svg" alt="Логотип Telegram"></a>
                    <a class="footer_social_link" href="#"><img class="footer_social_logo" src="./image/tiktok_logo.svg" alt="Логотип TikTok"></a>
                </div>
            </div>
        </footer>
    </div>

    <!-- JS files -->

    <script src="./js/feedback_form.js"></script>
    <script src="./js/support_chat.js"></script>
</body>
</html>