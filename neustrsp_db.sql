-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Ноя 23 2021 г., 01:04
-- Версия сервера: 5.7.21-20-beget-5.7.21-20-1-log
-- Версия PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `neustrsp_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `actions`
--
-- Создание: Ноя 21 2021 г., 15:28
-- Последнее обновление: Ноя 22 2021 г., 21:25
--

DROP TABLE IF EXISTS `actions`;
CREATE TABLE `actions` (
  `id` int(10) UNSIGNED NOT NULL,
  `company` varchar(45) NOT NULL,
  `license` varchar(10) NOT NULL,
  `description` varchar(45) NOT NULL,
  `price` float NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `actions`
--

INSERT INTO `actions` (`id`, `company`, `license`, `description`, `price`, `isActive`) VALUES
(1, 'Газпром', '045-060', 'Приобретите токенизированные акции GAZPROM', 336.78, 1),
(2, 'Лукойл', '045-062', 'Приобретите токенизированные акции Лукойл', 6790.2, 1),
(3, 'Альфа банк', '046-022', 'Приобретите токенизированные акции Альфа Банк', 325.85, 1),
(4, 'Сбербанк', '097-099', 'Приобретите токенизированные акции Сбербанк', 8942.45, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `LNK_actions_users`
--
-- Создание: Ноя 22 2021 г., 22:01
-- Последнее обновление: Ноя 22 2021 г., 22:01
--

DROP TABLE IF EXISTS `LNK_actions_users`;
CREATE TABLE `LNK_actions_users` (
  `id` int(11) NOT NULL,
  `actions_id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `count` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `LNK_actions_users`
--

INSERT INTO `LNK_actions_users` (`id`, `actions_id`, `users_id`, `count`) VALUES
(1, 1, 10, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--
-- Создание: Ноя 21 2021 г., 15:28
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `header` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `activeTo` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `activeFrom` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--
-- Создание: Ноя 21 2021 г., 15:28
-- Последнее обновление: Ноя 21 2021 г., 15:34
--

DROP TABLE IF EXISTS `statuses`;
CREATE TABLE `statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `color` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `color`) VALUES
(1, 'gold', 'gold');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--
-- Создание: Ноя 22 2021 г., 05:49
-- Последнее обновление: Ноя 22 2021 г., 05:49
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `registerDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `phone` varchar(15) NOT NULL,
  `password` varchar(45) NOT NULL,
  `avatarPath` varchar(45) NOT NULL,
  `statuses_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `salt` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `lastname`, `registerDate`, `phone`, `password`, `avatarPath`, `statuses_id`, `salt`) VALUES
(8, 'John', 'L', 'Martin', '2021-11-21 16:56:17', '89874188056', '3cc5d59040a4a78c4080d773cd6674b1', '', 1, '619a7a3139953'),
(9, 'John', 'L', 'Martin', '2021-11-22 05:48:15', '89874188055', '443199b7f0e14bc334556d7d6a083d00', '', 1, '619b2f1f723d6'),
(10, 'John', 'L', 'Martin', '2021-11-22 05:49:58', '89874188054', '7c4c1e32dafeabd661158494d9afef1d', '', 1, '619b2f86ab3fe');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Индексы таблицы `LNK_actions_users`
--
ALTER TABLE `LNK_actions_users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_actions_has_users_users1_idx` (`users_id`),
  ADD KEY `fk_actions_has_users_actions1_idx` (`actions_id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_users_statuses_idx` (`statuses_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `actions`
--
ALTER TABLE `actions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `LNK_actions_users`
--
ALTER TABLE `LNK_actions_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `LNK_actions_users`
--
ALTER TABLE `LNK_actions_users`
  ADD CONSTRAINT `fk_actions_has_users_actions1` FOREIGN KEY (`actions_id`) REFERENCES `actions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_actions_has_users_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_statuses` FOREIGN KEY (`statuses_id`) REFERENCES `statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
