-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 26 2023 г., 12:48
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hamk_hotel`
--

-- --------------------------------------------------------

--
-- Структура таблицы `applications`
--

CREATE TABLE `applications` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `room_id` int UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `finish_date` date NOT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `applications`
--

INSERT INTO `applications` (`id`, `user_id`, `room_id`, `start_date`, `finish_date`, `status`) VALUES
(3, 11, 10, '2023-08-01', '2023-08-10', 0),
(4, 11, 2, '2023-07-01', '2023-07-31', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `rooms`
--

CREATE TABLE `rooms` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `area` text NOT NULL,
  `price` int NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_reserved` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `area`, `price`, `description`, `image`, `is_reserved`) VALUES
(2, 'Zahir Reese', '33', 861, '                                                        Aut itaque eius labo                                                ', 'room2.jpg', 0),
(5, 'Kitra Stanton', '18', 90, 'Provident sint natu', 'room1.jpg', 0),
(6, 'Zelda Lynch', '18', 255, 'Ut ut quis debitis q', 'room5.jpg', 0),
(7, 'Gary Gilmore', '16', 65, 'Pariatur Sit ex od', 'room3.jpg', 1),
(8, 'Reed Holcomb', '36', 340, 'Eaque quia eiusmod m', 'room2.jpg', 0),
(11, 'Rogan George', '100', 531, 'Illum quis sit qui', 'room1.jpg', 1),
(12, 'Carolyn Collier', '20', 534, 'Repellendus Et in n', 'room2.jpg', 1),
(13, 'Callie Knowles', '90', 98, 'Laborum iste impedit', 'room3.jpg', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `second_name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `first_name`, `second_name`, `country`, `phone_number`, `password`, `email`, `type`) VALUES
(10, 'Admin', ' ', 'UZB', '+99899966-1999', '123', 'admin@hamk-hotel.com', 0),
(11, 'Musobek', 'Madrimov', 'UA', '+38(093) 396 13 02', '12345aA@', 'musobekmadrimov99@gmail.com', 1),
(14, 'Wyoming', 'Barron', 'DE', '+1 (359) 411-6043', 'Pa$$w0rd!', 'makyvyme@mailinator.com', 1),
(15, 'Wyoming', 'Barron', 'DE', '+1 (359) 411-6043', 'Pa$$w0rd!', 'makyvyme@mailinator.com', 1),
(16, 'Elmo', 'Rasmussen', 'DE', '+1 (363) 728-7172', 'Pa$$w0rd!', 'melu@mailinator.com', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
