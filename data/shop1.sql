-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 09 2020 г., 12:32
-- Версия сервера: 8.0.15
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
-- База данных: `shop1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `good_id` int(11) NOT NULL,
  `session_id` text NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `good_id`, `session_id`, `quantity`, `cost`) VALUES
(13, 1, 'test', 6, 0),
(14, 2, 'test', 1, 0),
(47, 5, '4gnchl6eto7blr6ir8lnlc81un19q17k', 1, 0),
(84, 1, 'vt90lof7cq3cp4gigveg37m4bm24afr8', 1, 0),
(85, 2, 'vt90lof7cq3cp4gigveg37m4bm24afr8', 1, 0),
(87, 1, '63ooiufuvoemg8g7ses1i2a4vmsiflt1', 1, 0),
(88, 2, '63ooiufuvoemg8g7ses1i2a4vmsiflt1', 1, 0),
(89, 3, '7bqc2gcgg1ledrola2vs88196qrlmjf4', 2, 0),
(90, 4, 'alsni85kmt48khp1usl2n3c20o4tg2vn', 5, 0),
(91, 1, 'alsni85kmt48khp1usl2n3c20o4tg2vn', 2, 0),
(110, 1, 'dli08jabt6q5al52cpju251q8acgueof', 2, 0),
(133, 0, 's6h71fi2kmqhhrnhh65sccvtgra3f3ja', 1, 0),
(134, 3, 's6h71fi2kmqhhrnhh65sccvtgra3f3ja', 1, 0),
(135, 4, 's6h71fi2kmqhhrnhh65sccvtgra3f3ja', 1, 0),
(136, 1, 'b1c9us9lohm0gj5shau01guouluique4', 1, 0),
(137, 2, 'b1c9us9lohm0gj5shau01guouluique4', 1, 0),
(138, 3, 'b1c9us9lohm0gj5shau01guouluique4', 1, 0),
(139, 11, 'b1c9us9lohm0gj5shau01guouluique4', 1, 0),
(140, 13, 'b1c9us9lohm0gj5shau01guouluique4', 1, 0),
(141, 12, 'j1pm9473o18nc2uh1u1pu69jkag83tcf', 1, 0),
(142, 15, 'j1pm9473o18nc2uh1u1pu69jkag83tcf', 1, 0),
(143, 16, 'j1pm9473o18nc2uh1u1pu69jkag83tcf', 1, 0),
(144, 1, 'j1pm9473o18nc2uh1u1pu69jkag83tcf', 1, 0),
(145, 2, 'j1pm9473o18nc2uh1u1pu69jkag83tcf', 1, 0),
(146, 3, 'j1pm9473o18nc2uh1u1pu69jkag83tcf', 1, 0),
(147, 4, 'j1pm9473o18nc2uh1u1pu69jkag83tcf', 1, 0),
(148, 13, 'r9gtu9ne6v4ggofqfo5n5p2t5q4mp1ek', 1, 0),
(149, 15, 'r9gtu9ne6v4ggofqfo5n5p2t5q4mp1ek', 1, 0),
(150, 16, 'r9gtu9ne6v4ggofqfo5n5p2t5q4mp1ek', 1, 0),
(151, 1, 'r9gtu9ne6v4ggofqfo5n5p2t5q4mp1ek', 1, 8180000),
(152, 2, 'r9gtu9ne6v4ggofqfo5n5p2t5q4mp1ek', 1, 8670300),
(153, 1, 'kk09ff5q7v0nm0aroo25dao3k60lij25', 1, 8180000),
(154, 10, 'kk09ff5q7v0nm0aroo25dao3k60lij25', 1, 150500),
(155, 11, 'kk09ff5q7v0nm0aroo25dao3k60lij25', 1, 125000),
(156, 12, 'kk09ff5q7v0nm0aroo25dao3k60lij25', 1, 70000),
(221, 1, '9hn98l1drsq9u5c7766aa16d5ois0e97', 1, 8180000);

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `feedback`) VALUES
(1, 'Машка', 'Считаю ваш магазин лучшим прелучшим во всем мире :***'),
(2, 'Петя', 'Широчайший ассортимент автомобилей, все в одном месте, супер!'),
(3, 'Иван', 'Компетентные менеджеры, сервис - огонь! 5+'),
(31, 'Джереми Кларксон', 'Oh My God! I never see anything like it! Amazing, best idea!!!'),
(32, 'Alex', 'my feedback');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `imgName` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `views` int(11) NOT NULL DEFAULT '0',
  `cost` int(11) DEFAULT NULL,
  `prodName` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `imgName`, `views`, `cost`, `prodName`, `description`) VALUES
(1, '01.jpg', 58, 8180000, 'BMW 7 series', 'В этой серии некоторые детали ходовой части изготовлены из алюминия, это позволило добиться\r\n         большей точности рулевого управления. В передней части появился новый выступ на капоте, а сзади машины\r\n          установлена новая хромированная планка. По сравнению с более ранними моделями в этой серии также изменились\r\n           передние и задние фары и фартуки.'),
(2, '02.jpg', 15, 8670300, 'Mercedes-Benz S class', 'Mercedes-Benz S-класс — флагманская серия представительских автомобилей немецкой компании\r\n         Mercedes-Benz, дочернего подразделения концерна Daimler AG. Представляет собой наиболее значимую линейку\r\n          моделей в иерархии классов торговой марки.'),
(3, '03.jpg', 30, 8070100, 'Audi A8', 'Audi A8 четвертого поколения дебютировал в июле 2017 года, а в феврале 2018-го седан добрался\r\n         до России. Автомобиль построен на новой платформе и получил множество современных опций.'),
(4, '04.jpg', 1, 4650800, 'Hyundai Genesis G90', 'Автомобиль, пришедший на смену лимузину Hyundai Equus, воплотил в себе дизайнерскую концепцию\r\n         «Athletic Elegance» («Атлетичная элегантность»), «прописал» под своим капотом мощные моторы и получил богатый\r\n          функционал, ничем не уступающий именитым конкурентам.'),
(5, '05.jpg', 5, 4200700, 'KIA K900', 'Сбалансированный, энергичный, солидный и при этом совсем не скучный. Новый повод для чьей-то\r\n         зависти? Новое представление о роскоши! Впечатляющий дизайн интерьера, скульптурные линии кузова, умные\r\n          технологии и убедительная динамика. KIA K900 — эталон роскошного седана.'),
(6, 'default.jpg', 0, 125000, 'ВАЗ 2110', 'Просто отечественный автомобиль.'),
(9, 'default.jpg', 0, 99000, 'ВАЗ 2115', 'Просто отечественный автомобиль.'),
(10, 'default.jpg', 1, 150500, 'ВАЗ 2108', 'Просто отечественный автомобиль.'),
(11, 'default.jpg', 1, 125000, 'ВАЗ 2110', 'Просто отечественный автомобиль.'),
(12, 'default.jpg', 0, 70000, 'ВАЗ 2199', 'Просто отечественный автомобиль.'),
(13, 'default.jpg', 0, 99990, 'Десятка', 'Просто отечественный автомобиль.'),
(14, 'default.jpg', 0, 125000, 'ВАЗ 2110', 'Просто отечественный автомобиль.'),
(15, 'default.jpg', 0, 50000, 'ВАЗ 2105', 'Просто отечественный автомобиль.'),
(16, 'default.jpg', 0, 125000, 'ВАЗ 2110', 'Просто отечественный автомобиль.');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone` int(11) NOT NULL,
  `session_id` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `login` text,
  `sum` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `session_id`, `status`, `login`, `sum`) VALUES
(1, 'qwerty', 12345, '63ooiufuvoemg8g7ses1i2a4vmsiflt1', 1, NULL, NULL),
(2, 'aaa', 111, '7bqc2gcgg1ledrola2vs88196qrlmjf4', 1, NULL, NULL),
(3, 'Вася', 777, 'alsni85kmt48khp1usl2n3c20o4tg2vn', 3, NULL, NULL),
(4, 'Маша', 12345, 'lci4gvie4skmcm06k4ri1kdcnnoe5jr4', 1, NULL, NULL),
(5, 'aaa', 777, 'i7bts9c9o1eic74deqoq11v512lo0231', 1, 'user2', NULL),
(6, 'aaa', 777, 'qg6p9d471ahgh90unmspkjh38k3dmem4', 0, 'user2', NULL),
(7, 'Алексей', 98765, '95otpmps39id221eff6tdt1l3cstd488', 0, 'user1', NULL),
(8, 'Алексей', 555444, 'sd52k86th11hlqq1hsao898u30hdaavd', 1, 'user1', NULL),
(9, 'Алекс', 12345, 't3vemvjf8ck8oncjoepulqp57e9j6ao8', 0, 'user1', NULL),
(1000, 'Vasya', 123890, 'dli08jabt6q5al52cpju251q8acgueof', 0, NULL, 32500200),
(1001, 'Маша', 456, 'vc79ltiiq10gnm9tlgrfe4hsa0krfgkf', 0, NULL, 25701800),
(1002, 'qwer', 123, 'p2htn66g1vlo1nm76sd8cvl7hupteu50', 0, 'admin', 16360000),
(1003, '12', 12, 'k5geqf3skn9doi8bnvv0obt6lteip1je', 0, 'admin', 8180000);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  `hash` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `role` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`, `role`) VALUES
(1, 'admin', '$2y$10$AIP6ujMwJ9ycBS1ThfA8meqhUlboyQecz7ctIr.HJZtZMJtqKiLFW', '13567441695e6cd3f3d7d2c0.65119509', 1),
(2, 'user1', '$2y$10$AIP6ujMwJ9ycBS1ThfA8meqhUlboyQecz7ctIr.HJZtZMJtqKiLFW', '', 0),
(3, 'user2', '$2y$10$AIP6ujMwJ9ycBS1ThfA8meqhUlboyQecz7ctIr.HJZtZMJtqKiLFW', '19291171705e89cc5d993074.01774772', 0),
(4, 'user3', '$2y$10$AIP6ujMwJ9ycBS1ThfA8meqhUlboyQecz7ctIr.HJZtZMJtqKiLFW', '', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
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
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
