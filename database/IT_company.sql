-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 27 2023 г., 21:48
-- Версия сервера: 5.7.39
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `IT_company`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Clients`
--

CREATE TABLE `Clients` (
  `ID_Client` int(11) NOT NULL,
  `Surname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Middle_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Telephone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Clients`
--

INSERT INTO `Clients` (`ID_Client`, `Surname`, `Name`, `Middle_name`, `Telephone`, `Email`) VALUES
(1, 'Иванов', 'Иван', 'Иванович', '+7-922-765-9063', 'Ivan@mail.ru'),
(2, 'Петров', 'Игорь', 'Сергеевич', '+7-953-768-2139', 'Igor@gmail.com'),
(3, 'Масликов', 'Александр', 'Юрьевич', '+7-934-455-1035', 'sasha@mail.ru'),
(4, 'Новикова', 'Анна', 'Михайловна', '+7-922-203-2046', 'anna@yandex.ru'),
(5, 'Красин', 'Евгений', 'Геннадьевич', '+7-953-765-2024', 'evgenii@mail.ru'),
(6, 'Дятлова', 'Анастасия', 'Григорьевна', '+7-949-795-1026', 'anastasiya@gmail.com'),
(7, 'Ляпина', 'Екатерина', 'Александровна', '+7-922-495-2845', 'ekaterina@yandex.ru'),
(8, 'Хмельницкая', 'Ульяна', 'Дмитриевна', '+7-903-365-2749', 'uliyana@mail.ru'),
(9, 'Жолобов', 'Владимир', 'Леонидович', '+7-969-285-3046', 'vladimir@gmail.com'),
(10, 'Шолохов', 'Владислав', 'Романович', '+7-916-375-2649', 'vladislav@yandex.ru'),
(11, 'test1', 'test1', '', '+7-933-666-5447', 'test1@mail.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `Departments`
--

CREATE TABLE `Departments` (
  `ID_Department` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Departments`
--

INSERT INTO `Departments` (`ID_Department`, `Name`) VALUES
(1, 'Отдел разработки ПО'),
(2, 'Отдел аналитики'),
(3, 'Отдел технической поддержки'),
(4, 'Отдел контроля качества'),
(5, 'Отдел разработки дизайна'),
(6, 'Отдел цифрового маркетинга');

-- --------------------------------------------------------

--
-- Структура таблицы `Employees`
--

CREATE TABLE `Employees` (
  `ID_Employee` int(11) NOT NULL,
  `Surname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Middle_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_Department` int(11) NOT NULL,
  `ID_Group` int(11) NOT NULL,
  `Salary` float(10,2) NOT NULL,
  `Start_of_work` date NOT NULL,
  `End_of_work` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Employees`
--

INSERT INTO `Employees` (`ID_Employee`, `Surname`, `Name`, `Middle_name`, `ID_Department`, `ID_Group`, `Salary`, `Start_of_work`, `End_of_work`) VALUES
(1, 'Горшков', 'Николай', 'Дмитриевич', 1, 9, 250000.00, '2021-06-01', NULL),
(2, 'Зайцев', 'Иван', 'Анатольевич', 1, 5, 200000.00, '2020-04-30', NULL),
(3, 'Долгий', 'Павел', 'Петрович', 5, 2, 175000.00, '2022-09-02', NULL),
(4, 'Завьялова', 'Кристина', 'Вячеславовна', 5, 8, 175000.00, '2021-10-14', '2023-06-06'),
(5, 'Горина', 'Надежда', 'Федоровна', 2, 7, 155000.00, '2019-11-15', '2022-04-04'),
(6, 'Зябликов', 'Александр', 'Валерьевич', 3, 1, 200000.00, '2018-09-07', NULL),
(7, 'Скопина', 'Валерия', 'Романова', 6, 4, 165000.00, '2023-03-01', NULL),
(8, 'Китова', 'Мария', 'Александровна', 6, 3, 175000.00, '2022-06-29', '2023-02-10'),
(9, 'Клопов', 'Виталий', 'Михайлович', 6, 3, 215000.00, '2020-05-23', '2022-11-25'),
(10, 'Ляпина', 'Вероника', 'Иванова', 1, 9, 220000.00, '2020-04-22', NULL),
(11, 'Ленина', 'Татьяна', 'Владимировна', 5, 2, 145000.00, '2022-11-24', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `Groups`
--

CREATE TABLE `Groups` (
  `ID_Group` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Groups`
--

INSERT INTO `Groups` (`ID_Group`, `Name`) VALUES
(1, 'Группа IT-аутсорсинга'),
(2, 'Группа веб-дизайна'),
(3, 'Группа SEO-продвижения'),
(4, 'Группа SMM-продвижения'),
(5, 'Группа мобильной разработки'),
(6, 'Группа общего IT-аудита'),
(7, 'Группа разработки IT-стратегий'),
(8, 'Группа дизайна мобильных приложений'),
(9, 'Группа веб-разработки'),
(10, 'Группа декстоп разработки'),
(11, 'test');

-- --------------------------------------------------------

--
-- Структура таблицы `Orders`
--

CREATE TABLE `Orders` (
  `ID_Order` int(11) NOT NULL,
  `ID_Client` int(11) NOT NULL,
  `ID_Service` int(11) NOT NULL,
  `Date_of_receipt` date NOT NULL,
  `Date_of_completion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Orders`
--

INSERT INTO `Orders` (`ID_Order`, `ID_Client`, `ID_Service`, `Date_of_receipt`, `Date_of_completion`) VALUES
(1, 1, 2, '2023-04-01', '2023-05-03'),
(2, 5, 6, '2022-12-14', '2023-04-30'),
(3, 10, 3, '2022-10-02', '2022-11-17'),
(4, 7, 5, '2022-08-03', '2023-04-08'),
(5, 8, 8, '2023-02-07', '2023-06-13'),
(6, 6, 10, '2022-05-18', '2022-06-02'),
(7, 4, 9, '2023-05-01', '2023-05-31'),
(8, 3, 1, '2022-11-08', '2022-12-01'),
(9, 2, 4, '2022-10-04', '2022-11-25'),
(10, 9, 7, '2023-02-01', '2023-04-17'),
(11, 1, 7, '2023-02-01', '2023-06-01'),
(12, 7, 5, '2023-06-09', NULL),
(13, 1, 10, '2023-05-23', NULL),
(17, 11, 1, '2001-01-01', '2002-02-02');

-- --------------------------------------------------------

--
-- Структура таблицы `Projects`
--

CREATE TABLE `Projects` (
  `ID_Project` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_Order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Projects`
--

INSERT INTO `Projects` (`ID_Project`, `Name`, `ID_Order`) VALUES
(1, 'Разработка IT-стратегии компании DomHome', 1),
(2, 'Мобильная разработка приложения GetMusic', 2),
(3, 'Веб-дизайн сайта компании TeachTech', 3),
(4, 'Веб-разработка ресурса WNext', 4),
(5, 'SMM-продвижение компании GymKit', 5),
(6, 'Стратегический аутсорсинг компании ButFlower', 6),
(7, 'Функциональный аутсорсинг компании Romal', 7),
(8, 'Общий IT-аудит компании Terrasa', 8),
(9, 'Дизайн мобильного приложения KolCal', 9),
(10, 'SEO-продвижение компании UpMaster', 10),
(11, 'SEO-продвижение компании Hunter', 11),
(12, 'Веб-разработка сайта Bronx', 12),
(13, 'Стратегический аутсорсинг компании Credit Zico', 13),
(16, 'test115611111', 6),
(17, 'test2222222222', 13),
(19, 'test44', 1),
(20, 'test44', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `Project_execution_statistics`
--

CREATE TABLE `Project_execution_statistics` (
  `ID_Project_execution_statistic` int(11) NOT NULL,
  `ID_Project` int(11) NOT NULL,
  `ID_Group` int(11) NOT NULL,
  `Start_of_execution` date NOT NULL,
  `End_of_execution` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Project_execution_statistics`
--

INSERT INTO `Project_execution_statistics` (`ID_Project_execution_statistic`, `ID_Project`, `ID_Group`, `Start_of_execution`, `End_of_execution`) VALUES
(1, 10, 3, '2023-02-01', '2023-04-16'),
(2, 5, 4, '2023-02-14', '2023-06-12'),
(3, 2, 5, '2022-12-16', '2023-04-16'),
(4, 8, 6, '2022-11-10', '2022-11-30'),
(5, 3, 2, '2022-10-09', '2022-11-16'),
(6, 4, 9, '2022-08-06', '2023-04-01'),
(7, 9, 8, '2022-10-10', '2022-11-20'),
(8, 6, 1, '2023-05-20', '2023-06-01'),
(9, 7, 1, '2023-05-05', '2023-05-30'),
(10, 1, 7, '2023-04-07', '2023-05-02'),
(11, 12, 9, '2023-06-11', NULL),
(12, 13, 1, '2023-05-25', NULL),
(14, 1, 1, '1980-02-13', '1980-03-15'),
(17, 2, 2, '2005-05-05', '2020-02-02'),
(18, 1, 11, '2022-02-02', '2022-12-12');

-- --------------------------------------------------------

--
-- Структура таблицы `Roles`
--

CREATE TABLE `Roles` (
  `id_role` int(11) NOT NULL,
  `name_role` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Roles`
--

INSERT INTO `Roles` (`id_role`, `name_role`) VALUES
(1, 'Администратор'),
(2, 'Сотрудник');

-- --------------------------------------------------------

--
-- Структура таблицы `Services`
--

CREATE TABLE `Services` (
  `ID_Service` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_Type_of_service` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Services`
--

INSERT INTO `Services` (`ID_Service`, `Name`, `ID_Type_of_service`) VALUES
(1, 'Общий IT-аудит', 1),
(2, 'Разработка IT-стратегии компании', 1),
(3, 'Веб-дизайн', 2),
(4, 'Дизайн мобильных приложений', 2),
(5, 'Веб-разработка', 3),
(6, 'Мобильная разработка', 3),
(7, 'SEO-продвижение', 4),
(8, 'SMM-продвижение', 4),
(9, 'Функциональный аутсорсинг', 5),
(10, 'Стратегический аутсорсинг', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `Type_of_services`
--

CREATE TABLE `Type_of_services` (
  `ID_Type_of_service` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Type_of_services`
--

INSERT INTO `Type_of_services` (`ID_Type_of_service`, `Name`) VALUES
(1, 'IT-консалтинг'),
(2, 'Дизайн'),
(3, 'Разработка'),
(4, 'Цифровой маркетинг'),
(5, 'IT-аутсорсинг');

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `id_user` int(11) NOT NULL,
  `login` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(34) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`id_user`, `login`, `password`, `id_role`) VALUES
(1, 'admin', 'admin', 1),
(2, 'sotrudnic', 'sotrudnic', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `Website_orders`
--

CREATE TABLE `Website_orders` (
  `ID_Website_order` int(11) NOT NULL,
  `Surname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Middle_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Telephone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_Service` int(11) NOT NULL,
  `Date_of_receipt` date NOT NULL,
  `Date_of_completion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Website_orders`
--

INSERT INTO `Website_orders` (`ID_Website_order`, `Surname`, `Name`, `Middle_name`, `Telephone`, `Email`, `ID_Service`, `Date_of_receipt`, `Date_of_completion`) VALUES
(1, 'Васюткин', 'Игорь', 'Анатольевич', '+7-922-789-0254', 'aslal@gmail.com', 1, '2023-06-20', '2023-06-30'),
(2, 'Масликов', 'Александр', 'Николаевич', '+7-999-999-9999', 'sashamaslikofff@mail.ru', 10, '2023-06-27', NULL),
(3, 'Лопаткина', 'Кристина', 'Дмитриевна', '+7-938-263-1832', 'mash@mail.ru', 8, '2023-06-27', NULL),
(4, 'Ломова', 'Анастасия', 'Юрьевна', '+7-234-273-2394', 'anastasiya@mail.ru', 5, '2023-06-27', NULL),
(5, 'Царицына', 'Мария', 'Алексеевна', '+7-273-854-2756', 'mariyatc@mail.ru', 1, '2023-06-27', NULL),
(6, 'Ефимов', 'Андрей', 'Иванович', '+7-947-832-7621', 'andreya@mail.ru', 2, '2023-06-27', NULL),
(7, 'Докутин', 'Анатолий', 'Геннадьевич', '+7-927-371-2831', 'anatoliiii@mail.ru', 3, '2023-06-27', NULL),
(8, 'Ефремов', 'Никита', 'Александрович', '+7-947-362-7526', 'nikita@mail.ru', 6, '2023-06-27', NULL),
(9, 'Мотыльков', 'Вячеслав', 'Артемович', '+7-928-472-2717', 'mot_vyacheslav@mail.ru', 9, '2023-06-27', NULL),
(10, 'Верещагин', 'Иван', 'Дмитриевич', '+7-922-987-0324', 'vereschagin@mail.ru', 8, '2023-06-27', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Clients`
--
ALTER TABLE `Clients`
  ADD PRIMARY KEY (`ID_Client`);

--
-- Индексы таблицы `Departments`
--
ALTER TABLE `Departments`
  ADD PRIMARY KEY (`ID_Department`);

--
-- Индексы таблицы `Employees`
--
ALTER TABLE `Employees`
  ADD PRIMARY KEY (`ID_Employee`),
  ADD KEY `DepartmantEmployee` (`ID_Department`),
  ADD KEY `GroupEmployee` (`ID_Group`);

--
-- Индексы таблицы `Groups`
--
ALTER TABLE `Groups`
  ADD PRIMARY KEY (`ID_Group`);

--
-- Индексы таблицы `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`ID_Order`),
  ADD KEY `ClientOrder` (`ID_Client`),
  ADD KEY `ServiceOrder` (`ID_Service`);

--
-- Индексы таблицы `Projects`
--
ALTER TABLE `Projects`
  ADD PRIMARY KEY (`ID_Project`),
  ADD KEY `OrderProject` (`ID_Order`);

--
-- Индексы таблицы `Project_execution_statistics`
--
ALTER TABLE `Project_execution_statistics`
  ADD PRIMARY KEY (`ID_Project_execution_statistic`),
  ADD KEY `GroupsStatistic` (`ID_Group`),
  ADD KEY `ProjectStatistic` (`ID_Project`);

--
-- Индексы таблицы `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Индексы таблицы `Services`
--
ALTER TABLE `Services`
  ADD PRIMARY KEY (`ID_Service`),
  ADD KEY `TypeOfServices` (`ID_Type_of_service`);

--
-- Индексы таблицы `Type_of_services`
--
ALTER TABLE `Type_of_services`
  ADD PRIMARY KEY (`ID_Type_of_service`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `UserRoles` (`id_role`);

--
-- Индексы таблицы `Website_orders`
--
ALTER TABLE `Website_orders`
  ADD PRIMARY KEY (`ID_Website_order`),
  ADD KEY `ServiceInfo` (`ID_Service`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Clients`
--
ALTER TABLE `Clients`
  MODIFY `ID_Client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `Departments`
--
ALTER TABLE `Departments`
  MODIFY `ID_Department` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `Employees`
--
ALTER TABLE `Employees`
  MODIFY `ID_Employee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `Groups`
--
ALTER TABLE `Groups`
  MODIFY `ID_Group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `Orders`
--
ALTER TABLE `Orders`
  MODIFY `ID_Order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `Projects`
--
ALTER TABLE `Projects`
  MODIFY `ID_Project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `Project_execution_statistics`
--
ALTER TABLE `Project_execution_statistics`
  MODIFY `ID_Project_execution_statistic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `Roles`
--
ALTER TABLE `Roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `Services`
--
ALTER TABLE `Services`
  MODIFY `ID_Service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `Type_of_services`
--
ALTER TABLE `Type_of_services`
  MODIFY `ID_Type_of_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `Website_orders`
--
ALTER TABLE `Website_orders`
  MODIFY `ID_Website_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Employees`
--
ALTER TABLE `Employees`
  ADD CONSTRAINT `DepartmantEmployee` FOREIGN KEY (`ID_Department`) REFERENCES `Departments` (`ID_Department`),
  ADD CONSTRAINT `GroupEmployee` FOREIGN KEY (`ID_Group`) REFERENCES `Groups` (`ID_Group`);

--
-- Ограничения внешнего ключа таблицы `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `ClientOrder` FOREIGN KEY (`ID_Client`) REFERENCES `Clients` (`ID_Client`),
  ADD CONSTRAINT `ServiceOrder` FOREIGN KEY (`ID_Service`) REFERENCES `Services` (`ID_Service`);

--
-- Ограничения внешнего ключа таблицы `Projects`
--
ALTER TABLE `Projects`
  ADD CONSTRAINT `OrderProject` FOREIGN KEY (`ID_Order`) REFERENCES `Orders` (`ID_Order`);

--
-- Ограничения внешнего ключа таблицы `Project_execution_statistics`
--
ALTER TABLE `Project_execution_statistics`
  ADD CONSTRAINT `GroupsStatistic` FOREIGN KEY (`ID_Group`) REFERENCES `Groups` (`ID_Group`),
  ADD CONSTRAINT `ProjectStatistic` FOREIGN KEY (`ID_Project`) REFERENCES `Projects` (`ID_Project`);

--
-- Ограничения внешнего ключа таблицы `Services`
--
ALTER TABLE `Services`
  ADD CONSTRAINT `TypeOfServices` FOREIGN KEY (`ID_Type_of_service`) REFERENCES `Type_of_services` (`ID_Type_of_service`);

--
-- Ограничения внешнего ключа таблицы `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `UserRoles` FOREIGN KEY (`id_role`) REFERENCES `Roles` (`id_role`);

--
-- Ограничения внешнего ключа таблицы `Website_orders`
--
ALTER TABLE `Website_orders`
  ADD CONSTRAINT `ServiceInfo` FOREIGN KEY (`ID_Service`) REFERENCES `Services` (`ID_Service`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
