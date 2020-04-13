-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 13 2020 г., 13:23
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
(221, 1, '9hn98l1drsq9u5c7766aa16d5ois0e97', 1, 8180000),
(224, 1, 't9ovo2vhqthv33ir6134vbmp4rf2qn4f', 1, 8180000),
(225, 1, 't9ovo2vhqthv33ir6134vbmp4rf2qn4f', 1, 8180000),
(226, 1, '0ln2pa5afgkb9qlglhj5r0gsd1v6cu64', 1, 8180000),
(227, 1, '0ln2pa5afgkb9qlglhj5r0gsd1v6cu64', 1, 8180000),
(228, 2, '0ln2pa5afgkb9qlglhj5r0gsd1v6cu64', 1, 8670300),
(229, 1, '0jpkctik7aqdrpj8dvfjlrvrctleit47', 1, 8180000),
(230, 1, '0jpkctik7aqdrpj8dvfjlrvrctleit47', 1, 8180000),
(231, 1, '0jpkctik7aqdrpj8dvfjlrvrctleit47', 1, 8180000),
(232, 1, '90djoquetfc1jpdeq8oilb9r5l9a7486', 1, 8180000),
(233, 1, '90djoquetfc1jpdeq8oilb9r5l9a7486', 1, 8180000),
(234, 1, '90djoquetfc1jpdeq8oilb9r5l9a7486', 1, 8180000),
(235, 1, '9qu0hdcnleigemhlde14ttmp9gc7ue71', 1, 8180000),
(236, 1, '9qu0hdcnleigemhlde14ttmp9gc7ue71', 1, 8180000),
(237, 1, '9qu0hdcnleigemhlde14ttmp9gc7ue71', 1, 8180000),
(238, 1, 't2upvau3j8dop896nu6aij9c74c60ep2', 1, 8180000),
(239, 1, 't2upvau3j8dop896nu6aij9c74c60ep2', 1, 8180000),
(254, 9, 'lag77kr4mr510ipagm5cgv7mkbsghsk9', 1, 99000),
(255, 9, 'lag77kr4mr510ipagm5cgv7mkbsghsk9', 1, 99000),
(260, 5, 'v9gcpj1hgrrpqfs7pqa90kd9g7b3g62a', 1, 4200700),
(265, 1, 'i17rivd3sjs7dp2svmdj5d764kkkvj86', 1, 8180000),
(272, 1, 'giqc88c0bn23nbroo1p6blaosup7geja', 1, 8180000),
(273, 2, 'giqc88c0bn23nbroo1p6blaosup7geja', 1, 8670300),
(274, 2, 'giqc88c0bn23nbroo1p6blaosup7geja', 1, 8670300),
(275, 6, '5r6m2nld1csaft2os5asfpcrukvj8i64', 1, 125000),
(276, 6, '5r6m2nld1csaft2os5asfpcrukvj8i64', 1, 125000),
(277, 1, 'sgcvrfvct2smvqpd42pgn3v39sstdgto', 1, 8180000),
(288, 9, 'o2ug75jogkh8kaks9g7mkbtoqk2k8gcd', 1, 99000),
(289, 1, 'cen591ccqklg9k7k8q4racp2psf16797', 1, 8180000),
(290, 1, '8vho3vpiumbuaun3snr2i4plpt8nkpnn', 1, 8180000),
(291, 1, '8vho3vpiumbuaun3snr2i4plpt8nkpnn', 1, 8180000),
(293, 10, 'mi7uge1514hvifdh61colescsgtudb2i', 1, 150500),
(294, 5, 'mi7uge1514hvifdh61colescsgtudb2i', 1, 4200700),
(296, 1, 'jgkpe6opm1i8ouk4vh9kf93bsk6eib6n', 1, 8180000);

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
(1, '01.jpg', 60, 8180000, 'BMW 7 series', 'В этой серии некоторые детали ходовой части изготовлены из алюминия, это позволило добиться\r\n         большей точности рулевого управления. В передней части появился новый выступ на капоте, а сзади машины\r\n          установлена новая хромированная планка. По сравнению с более ранними моделями в этой серии также изменились\r\n           передние и задние фары и фартуки.'),
(2, '02.jpg', 17, 8670300, 'Mercedes-Benz S class', 'Mercedes-Benz S-класс — флагманская серия представительских автомобилей немецкой компании\r\n         Mercedes-Benz, дочернего подразделения концерна Daimler AG. Представляет собой наиболее значимую линейку\r\n          моделей в иерархии классов торговой марки.'),
(3, '03.jpg', 31, 8070100, 'Audi A8', 'Audi A8 четвертого поколения дебютировал в июле 2017 года, а в феврале 2018-го седан добрался\r\n         до России. Автомобиль построен на новой платформе и получил множество современных опций.'),
(4, '04.jpg', 1, 4650800, 'Hyundai Genesis G90', 'Автомобиль, пришедший на смену лимузину Hyundai Equus, воплотил в себе дизайнерскую концепцию\r\n         «Athletic Elegance» («Атлетичная элегантность»), «прописал» под своим капотом мощные моторы и получил богатый\r\n          функционал, ничем не уступающий именитым конкурентам.'),
(5, '05.jpg', 5, 4200700, 'KIA K900', 'Сбалансированный, энергичный, солидный и при этом совсем не скучный. Новый повод для чьей-то\r\n         зависти? Новое представление о роскоши! Впечатляющий дизайн интерьера, скульптурные линии кузова, умные\r\n          технологии и убедительная динамика. KIA K900 — эталон роскошного седана.'),
(6, 'default.jpg', 0, 125000, 'ВАЗ 2110', 'Просто отечественный автомобиль.'),
(9, 'default.jpg', 0, 99000, 'ВАЗ 2115', 'Просто отечественный автомобиль.'),
(10, 'default.jpg', 5, 150500, 'ВАЗ 2108', 'Просто отечественный автомобиль.'),
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
  `phone` text NOT NULL,
  `session_id` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `login` text,
  `sum` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `session_id`, `status`, `login`, `sum`) VALUES
(1002, 'qwer', '123', 'p2htn66g1vlo1nm76sd8cvl7hupteu50', 0, 'admin', 16360000),
(1003, '12', '12', 'k5geqf3skn9doi8bnvv0obt6lteip1je', 3, 'admin', 8180000),
(1004, 'Саша', '12345', 'giqc88c0bn23nbroo1p6blaosup7geja', 0, NULL, 25520600),
(1005, 'user3', '777555', '5r6m2nld1csaft2os5asfpcrukvj8i64', 0, 'user3', 250000),
(1006, 'user3', '12345', 'sgcvrfvct2smvqpd42pgn3v39sstdgto', 2, 'user3', 8180000),
(1007, 'admin', '888999', 'o2ug75jogkh8kaks9g7mkbtoqk2k8gcd', 1, 'admin', 99000),
(1008, 'супермен', '12345', 'cen591ccqklg9k7k8q4racp2psf16797', 3, NULL, 8180000),
(1009, 'Вася', '123098', '8vho3vpiumbuaun3snr2i4plpt8nkpnn', 0, NULL, 16360000),
(1010, 'admin', '777', 'mi7uge1514hvifdh61colescsgtudb2i', 0, 'admin', 4351200);

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
(1, 'admin', '$2y$10$AIP6ujMwJ9ycBS1ThfA8meqhUlboyQecz7ctIr.HJZtZMJtqKiLFW', '12605717395e903d2c323286.73928611', 1),
(2, 'user1', '$2y$10$AIP6ujMwJ9ycBS1ThfA8meqhUlboyQecz7ctIr.HJZtZMJtqKiLFW', '10817338375e905dfdb5ade4.48899327', 0),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
