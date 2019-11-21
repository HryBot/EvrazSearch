-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 21 2019 г., 10:17
-- Версия сервера: 10.4.6-MariaDB
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `evraz`
--

DELIMITER $$
--
-- Процедуры
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Change_Pass` (IN `UID` INT, IN `NPass` VARCHAR(1024) CHARSET utf8)  MODIFIES SQL DATA
UPDATE users SET password=NPass WHERE id_user=UID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Create_res` (IN `name` VARCHAR(255), IN `des` VARCHAR(255))  MODIFIES SQL DATA
INSERT INTO resources (res_name, res_description, res_url, res_keywords) VALUES(name,des, "no-Url", " ЕВРАЗ ")$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Create_user` (IN `login1` VARCHAR(255), IN `name1` VARCHAR(255), IN `surname1` VARCHAR(255), IN `birthday1` DATE, IN `pass1` VARCHAR(1024))  MODIFIES SQL DATA
INSERT INTO users (login, name, surname,birthday,password) VALUES (login1, name1, surname1, birthday1, pass1)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `idd` (IN `id` INT)  MODIFIES SQL DATA
SELECT * from users where id_user=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Search` (IN `SerText` VARCHAR(60))  MODIFIES SQL DATA
SELECT * FROM resources where res_keywords LIKE CONCAT("% ",SerText," %")$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `requests`
--

CREATE TABLE `requests` (
  `id_request` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `request_text` varchar(1024) NOT NULL,
  `request_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `requests`
--

INSERT INTO `requests` (`id_request`, `id_user`, `request_text`, `request_date`) VALUES
(2, 3, 'sss', '2019-11-20 00:00:00'),
(3, 3, 'Евраз', '2019-11-20 00:00:00'),
(4, 3, 'Евраз', '2019-11-21 00:00:00'),
(5, 3, 'Евраз', '2019-11-21 00:00:00'),
(6, 3, 'Евраз', '2019-11-21 00:00:00'),
(7, 3, 'Евраз', '2019-11-21 00:00:00'),
(8, 3, 'Евраз', '2019-11-21 00:00:00'),
(9, 3, 'Евраз НТМК', '2019-11-21 00:00:00'),
(10, 3, 'Евраз НТМК тендер', '2019-11-21 00:00:00'),
(11, 7, 'ЕВРАЗ', '2019-11-21 00:00:00'),
(12, 7, 'ЕВРАЗ', '2019-11-21 00:00:00'),
(13, 7, 'ЕВРАЗ', '2019-11-21 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `resources`
--

CREATE TABLE `resources` (
  `id_res` int(11) NOT NULL,
  `res_name` varchar(255) NOT NULL,
  `res_url` varchar(255) NOT NULL,
  `res_description` varchar(4048) DEFAULT NULL,
  `res_keywords` varchar(16000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `resources`
--

INSERT INTO `resources` (`id_res`, `res_name`, `res_url`, `res_description`, `res_keywords`) VALUES
(1, 'Конкурентные процедуры на закупку работ (услуг)', 'http://rus.evraz.com/fin-info/ntmk_uslugi_konkurent.php', 'Конкурентные процедуры на закупку работ (услуг)', ' процедуры работ услуг устройство обработка механическая ЕВРАЗ НТМК '),
(2, 'Тендеры: ЕВРАЗ НТМК (АО / ОАО)', 'http://rostender.info/category/tendery-oao-evraz-ntmk-9453', '\r\nТендеры: ЕВРАЗ НТМК (информация о тендере, место доставки, начальная цена, заказчик)', ' тендер ЕВРАЗ НТМК устройство '),
(3, 'Вакансии и работа : «металлургический завод» в Нижнем Тагиле', 'http://rostender.info/category/tendery-oao-evraz-ntmk-9453', 'Вакансии и работа в Нижнем Тагиле на металлургическом заводе', ' работ завод металлург вакансии разряд электро требования ЕВРАЗ '),
(4, 'ЕВРАЗ НТМК', 'http://rus.evraz.com/enterprise/steel/ntmk/', 'ЕВРАЗ Нижнетагильский металлургический комбинат (ЕВРАЗ НТМК)информация', ' ЕВРАЗ НТМК металлург производство'),
(5, 'Устав и иные внутренние документы | EVRAZ HOLDING ', 'http://evrazholdingfinance.ru/ustav_view', 'Устав и иные внутренние документы ЕвразХолдинг', ' NTMK EVRAZ '),
(6, 'Тест', 'no-Url', 'Тест123', 'ЕВРАЗ');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(1024) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `login`, `password`, `name`, `surname`, `birthday`) VALUES
(3, 'SergeyS', 'Evraz321', 'Сергей', 'Судаков', '1978-02-10'),
(4, 'ElenaD', 'Elena1980', 'Елена', 'Дерябина', '1980-10-10'),
(5, 'NikolayU', 'NTMKevraz', 'Николай', 'Усков', '1984-12-27'),
(6, 'ASDSAD', '$2y$10$XyNQwLkdin9s0U4MeeIfketm37pSsUQ57GSaVT90nzA3T3zUcZAQS', 'SADASD', 'ASDASD', '2019-10-31'),
(7, 'login', '$2y$10$bGbRFeDgVDze8Qh/OgMcWewPseX61cesbUGC43NAYj7HoPcYtFrGO', 'dasdas', 'ASDASD', '2019-10-30');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id_request`),
  ADD KEY `requests_fk0` (`id_user`);

--
-- Индексы таблицы `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id_res`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `requests`
--
ALTER TABLE `requests`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `resources`
--
ALTER TABLE `resources`
  MODIFY `id_res` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_fk0` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
