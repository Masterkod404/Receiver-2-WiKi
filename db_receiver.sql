-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 17 2024 г., 17:01
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_receiver`
--

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE `article` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `nameArticle` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateArticle` date NOT NULL,
  `descripptionBlock` varchar(1200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `imgBlock` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `blockArticle`
--

CREATE TABLE `blockArticle` (
  `id` int NOT NULL,
  `idArticle` int NOT NULL,
  `typeBlock` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `id` int NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int NOT NULL,
  `progres_Bar` int NOT NULL,
  `email` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `imgProf` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(170) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`id`, `password`, `level`, `progres_Bar`, `email`, `imgProf`, `name`, `isAdmin`) VALUES
(1, '123', 1, 0, 'password@mail.ru', 'logoDefoltProfile.png', 'test', 0),
(2, '202cb962ac59075b964b07152d234b70', 0, 75, 'dima226regent@mail.ru', 'logoDefoltProfile.png', 'test2', 0),
(3, '81dc9bdb52d04dc20036dbd8313ed055', 0, 0, 'frankob@bk.ru', 'logoDefoltProfile.png', 'test3', 0),
(4, '202cb962ac59075b964b07152d234b70', 0, 13, 'rfgfg@mail.ru', 'logoDefoltProfile.png', 'test12', 0),
(5, '202cb962ac59075b964b07152d234b70', 0, 0, 'dima226regent@mail.ru', 'logoDefoltProfile.png', 'test13', 0),
(6, '777e4e8786e884c04c961becac743744', 0, 0, 'dima226regent@mail.ru', 'logoDefoltProfile.png', 'dima21', 0),
(7, '098f6bcd4621d373cade4e832627b4f6', 0, 0, 'copp@copp.copp', 'logoDefoltProfile.png', 'test18', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userArticl` (`user_id`);

--
-- Индексы таблицы `blockArticle`
--
ALTER TABLE `blockArticle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blockArcticle` (`idArticle`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `article`
--
ALTER TABLE `article`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `blockArticle`
--
ALTER TABLE `blockArticle`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `userArticl` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `blockArticle`
--
ALTER TABLE `blockArticle`
  ADD CONSTRAINT `blockArcticle` FOREIGN KEY (`idArticle`) REFERENCES `article` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
