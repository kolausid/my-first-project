-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июл 11 2024 г., 08:30
-- Версия сервера: 8.0.31
-- Версия PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mydb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth`
--

CREATE TABLE `auth` (
  `id` int NOT NULL,
  `login` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `lName` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `HB` date DEFAULT NULL,
  `email` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `date_reg` datetime DEFAULT NULL,
  `status_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `auth`
--

INSERT INTO `auth` (`id`, `login`, `password`, `name`, `lName`, `HB`, `email`, `date_reg`, `status_id`) VALUES
(44, 'loja', '$2y$10$vie16uuoswa9snTdRRg0jundre5aJSxBbWUdQUWjdFajeOke9Ex.y', '', '', '1999-11-11', 'login@login.ru', '2024-04-13 00:00:00', 0),
(53, 'kkkk', '$2y$10$vie16uuoswa9snTdRRg0jundre5aJSxBbWUdQUWjdFajeOke9Ex.y', 'kkkk', 'kkkkk', '1970-01-01', 'login@login.ru', '2024-04-15 00:00:00', 0),
(54, 'lllll', '$2y$10$vie16uuoswa9snTdRRg0jundre5aJSxBbWUdQUWjdFajeOke9Ex.y', 'sdfsdf', 'sdfsdf', '1970-01-01', 'login@login.ru', '2024-04-15 00:00:00', 0),
(55, 'fgjf', '$2y$10$vie16uuoswa9snTdRRg0jundre5aJSxBbWUdQUWjdFajeOke9Ex.y', 'ddd', 'ggg', '1970-01-01', 'login@login.ru', '2024-04-16 00:00:00', 0),
(57, 'Otpusk', '$2y$10$vie16uuoswa9snTdRRg0jundre5aJSxBbWUdQUWjdFajeOke9Ex.y', 'Отпуск', 'Отдыхаев', '1970-01-01', 'login@login.ru', '2024-04-19 00:00:00', 0),
(58, 'aaaa', '$2y$10$vie16uuoswa9snTdRRg0jundre5aJSxBbWUdQUWjdFajeOke9Ex.y', 'bbb', 'bbb', '1970-01-01', 'login@login.ru', '2024-04-20 00:00:00', 0),
(59, 'Nikola', '$2y$10$vie16uuoswa9snTdRRg0jundre5aJSxBbWUdQUWjdFajeOke9Ex.y', 'БОСС', 'АДМИНОВ', '1995-12-21', 'admin@admin.ru', '2024-04-29 00:00:00', 0),
(61, 'GRECHKA', '$2y$10$vie16uuoswa9snTdRRg0jundre5aJSxBbWUdQUWjdFajeOke9Ex.y', 'Гречка', 'Крупов', '1970-01-01', 'grechka@login.ru', '2024-04-29 00:00:00', 0),
(62, 'Tank', '$2y$10$vie16uuoswa9snTdRRg0jundre5aJSxBbWUdQUWjdFajeOke9Ex.y', 'Танк', 'Танков', '1970-01-01', 'tank@tank.ru', '2024-05-09 00:00:00', 0),
(63, 'admin1', '$2y$10$vie16uuoswa9snTdRRg0jundre5aJSxBbWUdQUWjdFajeOke9Ex.y', 'Админчик', 'Админовский', '1999-01-01', 'admin1@admin.ru', '2024-05-10 00:00:00', 0),
(64, 'Oleg', '$2y$10$vie16uuoswa9snTdRRg0jundre5aJSxBbWUdQUWjdFajeOke9Ex.y', 'Олег', 'Олегов', '1972-08-21', 'oleg@mail.ru', '2024-05-13 00:00:00', 2),
(65, 'Laima', '$2y$10$vie16uuoswa9snTdRRg0jundre5aJSxBbWUdQUWjdFajeOke9Ex.y', 'Лайма', 'Монстровна', '2021-10-01', 'laima@pes.ru', '2024-05-30 00:00:00', 2),
(66, 'Kkolya', '$2y$10$vie16uuoswa9snTdRRg0jundre5aJSxBbWUdQUWjdFajeOke9Ex.y', 'Николай', 'Тест', '2000-02-03', 'test@yandex.ru', '2024-07-11 00:00:00', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
