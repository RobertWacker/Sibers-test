-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 04 2019 г., 11:04
-- Версия сервера: 5.6.38
-- Версия PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sibers_example`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(8) NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `gender` int(1) NOT NULL,
  `bday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `lastname`, `gender`, `bday`) VALUES
(1, 'Mercury', '123456', 'Иван', 'Иванов', 1, '1964-10-03'),
(2, 'Venus', '123456', 'Мария', 'Андреева', 2, '1987-12-10'),
(3, 'Earth', '123456', 'Анастасия', 'Сергейчук', 2, '1990-01-26'),
(4, 'Mars', '123456', 'Владимир', 'Костычев', 1, '1980-05-13'),
(5, 'Jupiter', '123456', 'Сергей', 'Бриль', 1, '1987-03-13'),
(6, 'Saturn', '123456', 'Павел', 'Родимов', 1, '1999-08-04'),
(7, 'Uranus', '123456', 'Никита', 'Смирнов', 1, '1957-01-30'),
(8, 'Neptune', '123456', 'Виктор', 'Шендрик', 1, '1927-09-10'),
(9, 'Pluto', '123456', 'Вячеслав', 'Муравлев', 1, '1997-05-17'),
(10, 'RobertWacker', 'affb4c9d53cd1edf6c4427dce79138d7', 'Роберт', 'Юрий', 1, '2019-03-04');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
