-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 05 2021 г., 03:25
-- Версия сервера: 10.3.13-MariaDB-log
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
-- База данных: `fluid`
--

-- --------------------------------------------------------

--
-- Структура таблицы `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `timeCreated` date NOT NULL,
  `byUserId` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `dislikes` int(11) NOT NULL DEFAULT 0,
  `likesByUsers` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dislikesByUsers` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `answers`
--

INSERT INTO `answers` (`id`, `answer`, `timeCreated`, `byUserId`, `question_id`, `likes`, `dislikes`, `likesByUsers`, `dislikesByUsers`) VALUES
(1, 'gavno', '2021-11-02', 9, 12, 3, 1, '1,', '9,'),
(2, '4etko', '2021-11-03', 6, 12, 2, 0, '9,', ''),
(3, 'dasd', '2021-11-03', 9, 12, 1, 0, '9,', ''),
(4, 'asdsad', '2021-11-03', 9, 12, 1, 0, '9,', ''),
(5, 'dasdasdasd', '2021-11-03', 9, 12, 0, 0, '', ''),
(6, 'a', '2021-11-03', 9, 12, 1, 0, '', ''),
(7, 'arjey loh', '2021-11-03', 9, 12, 1, 0, '', ''),
(8, 'dasd', '2021-11-04', 9, 12, 0, 1, NULL, '9,'),
(9, 'dasd', '2021-11-04', 9, 13, 0, 0, NULL, ''),
(10, 'dasdasdasd', '2021-11-04', 9, 13, 1, 0, '9,', NULL),
(11, 'asdasdasd', '2021-11-04', 9, 13, 0, 0, NULL, ''),
(12, 'dasdas \r\ndasd', '2021-11-05', 9, 12, 1, 0, '9,', NULL),
(13, 'dasd', '2021-11-05', 9, 12, 1, 0, '9,', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'программирование'),
(2, 'gachi muchi'),
(4, 'aaadasdsad'),
(11, 'sadasdasd');

-- --------------------------------------------------------

--
-- Структура таблицы `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `byUserId` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `timeCreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `notes`
--

INSERT INTO `notes` (`id`, `title`, `description`, `byUserId`, `category_id`, `timeCreated`) VALUES
(1, 'Дневник 1', 'Описание дневника 1', 1, 1, '2021-11-02'),
(2, 'Дневник 2', 'Описание дневника 2', 1, 2, '2021-11-03'),
(3, 'aaaa', 'aaaa', 8, 1, '2021-11-02'),
(4, 'новое', 'да', 8, 4, '2021-11-02'),
(6, 'dasdasd', 'asdasd', 9, 2, '2021-11-05'),
(7, 'asdasdas', 'dasdasdasdasd', 9, 4, '2021-11-05');

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `byUserId` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `timeCreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `title`, `description`, `byUserId`, `category_id`, `timeCreated`) VALUES
(1, 'Вопрос 1', 'Описание 1', 1, 2, '2021-11-14'),
(2, 'Вопрос 2', 'Описание 2', 2, 1, '2021-11-03'),
(3, 'Вопрос 3', 'Описание 3', 6, 4, '2021-11-04'),
(4, 'Вопрос 4', 'Описание 4', 5, 2, '2021-11-05'),
(5, 'Вопрос 5', 'Описание 5', 8, 1, '2021-11-06'),
(6, 'Вопрос 6', 'Описание 6', 9, 4, '2021-11-07'),
(7, 'Вопрос 7', 'монитор', 8, 2, '2021-11-08'),
(8, 'Вопрос 8', 'Описание 8', 7, 1, '2021-11-09'),
(9, 'Вопрос 9', 'Описание 9', 6, 4, '2021-11-10'),
(10, 'Вопрос 10', 'Игра', 1, 2, '2021-11-11'),
(11, 'Вопрос 11', 'Описание 11', 8, 4, '2021-11-12'),
(12, 'aaaaa', 'aaaaa', 8, 1, '2021-11-02'),
(13, 'ты шо', 'куку', 8, 2, '2021-11-02'),
(14, 'dasd', 'asdasd', 8, 1, '2021-11-02'),
(15, 'dasd', 'asdasd', 8, 1, '2021-11-02'),
(18, 'вфывфыв', 'вфывфыв', 9, 2, '2021-11-03'),
(20, 'dasd', 'asdasd', 9, 1, '2021-11-04');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(1, 'Danil', '1337'),
(2, 'Dayn', '228'),
(5, 'john cena', 'wwe'),
(6, 'kebab', 'dayn'),
(7, 'Danild', '1337d'),
(8, 'jeka', '1'),
(9, 'admin', 'admin'),
(10, 'new', 'new'),
(11, 'aaaaaa', 'aaaaa'),
(12, 'aaaaaaaaaa', 'aa'),
(13, 'dasd', 'asdasd'),
(14, 'nnn', 'nnn'),
(15, 'rrr', 'rrr'),
(16, 'qqq', 'qqq'),
(17, 'www', 'www'),
(18, 'eee', 'eee'),
(19, '2222', '2222'),
(20, 'yyy', 'yyy');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `byUserId` (`byUserId`),
  ADD KEY `question_id` (`question_id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `byUserId` (`byUserId`,`category_id`),
  ADD KEY `notes_ibfk_2` (`category_id`);

--
-- Индексы таблицы `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `byUserId` (`byUserId`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`byUserId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`byUserId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`byUserId`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
