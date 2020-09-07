-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2020 年 09 月 07 日 03:34
-- 伺服器版本： 10.4.13-MariaDB
-- PHP 版本： 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `triangle`
--

-- --------------------------------------------------------

--
-- 資料表結構 `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pwd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_number` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birth` date NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `members`
--

INSERT INTO `members` (`id`, `name`, `email`, `pwd`, `id_number`, `tel`, `gender`, `birth`, `address`, `level`) VALUES
(1, 'Ann', 'annisann@gmail.com', 'Ann4ann', 'T224059285', '0987112344', '2', '2020-09-07', 'TPE', 4),
(2, 'candy', 'candyiscandy@gmail.com', 'Candy4candy', 'H220493033', '0985432357', '2', '2019-09-18', 'TPE', 3),
(3, 'helen', 'helenishelen@gmail.com', 'Helen4helen', 'S229345999', '0988721933', '2', '1954-03-27', 'TPE', 3),
(4, 'alex', 'alexisalex@gmail.com', 'Alex4alex', 'A123456789', '0932873221', '1', '1966-05-21', 'TPE', 2),
(5, 'meg', 'megismeg@gmail.com', 'Meg4meg', 'T226547654', '0965908875', '2', '1968-02-29', 'TPE', 1),
(6, 'jason', 'jasonisjason@gmail.com', 'Jason4jason', 'U125437896', '0908332186', '1', '1985-04-29', 'TPE', 2),
(7, 'jack', 'jackisjack@gmail.com', 'Jack4jack', 'G129874567', '0943776432', '1', '1988-03-21', 'TPE', 3),
(8, 'ada', 'adaisada@gmail.com', 'Ada4ada', 'P217688721', '0972837182', '2', '1977-09-01', 'TPE', 2),
(9, 'Astrid', 'astridisastrid@gmail.com', 'Astrid4astrid', 'M224039102', '0966514273', '2', '1943-09-16', 'TPE', 5),
(10, 'Cara', 'caraiscara@gmail.com', 'Cara4cara', 'I228755406', '0988728193', '2', '1992-04-02', 'TPE', 2),
(11, 'eden', 'edeniseden@gmail.com', 'Eden4eden', 'E226538743', '0902819366', '2', '1977-09-01', 'TPE', 5),
(12, 'erin', 'eriniserin@gmail.com', 'Erind4erin', 'D223910293', '0943110492', '2', '1943-09-16', 'TPE', 3),
(13, 'hazel', 'hazelishazel@gmail.com', 'Hazel4hazel', 'R220391039', '0932910492', '2', '1992-04-02', 'TPE', 4),
(14, 'Iris', 'irisisiris@gmail.com', 'Iris4iris', 'T220948201', '0938172834', '2', '1987-09-06', 'TPE', 3),
(15, 'wendy', 'wendyiswendy@gmail.com', 'Wendy4wendy', 'E220492013', '0929183745', '2', '2019-09-02', 'TPE', 2),
(16, 'ivy', 'ivyisivt@gmail.com', 'Ivy4ivy', 'G220492840', '0907554321', '2', '1954-03-11', 'TPE', 3),
(17, 'judy', 'judyisjudy@gmail.com', 'Judy4judy', 'W220593019', '0965887642', '2', '1966-05-03', 'TPE', 4),
(18, 'kate', 'kateiskate@gmail.com', 'Kat34kate', 'P229403910', '0982733711', '2', '1968-02-29', 'TPE', 1),
(19, 'kate', 'kateiskate@gmail.com', 'Kateiskate', 'S220492019', '0908332186', '2', '1985-04-08', 'TPE', 5),
(20, 'lee', 'leeislee@gmail.com', 'Lee4lee', 'A220391039', '0943776432', '2', '1988-03-21', 'TPE', 3),
(21, 'lora', 'lora4lora@gmail.com', 'Lora4lora', 'A220491036', '0972837182', '2', '1977-09-01', 'TPE', 2),
(22, 'lucy', 'lucyislucy@gmail.com', 'Lucy4lucy', 'W220193029', '0966514273', '2', '1943-09-16', 'TPE', 5),
(23, 'mandy', 'mandyismandy@gmail.com', 'Mandy4mandy', 'E220391039', '0988728193', '2', '1992-04-02', 'TPE', 2),
(24, 'Mag', 'magismag@gmail.com', 'Mag4mag', 'Q220492810', '0902819366', '2', '1977-09-01', 'TPE', 5),
(25, 'molly', 'mollyismolly@gmail.com', 'Molly4molly', 'F220395810', '0943110492', '2', '1943-09-16', 'TPE', 3),
(26, 'myra', 'myraismyra@gmail.com', 'Myra4myra', 'F220492810', '0932910492', '2', '1992-04-02', 'TPE', 4),
(39, 'tom', 'tomistom@gmail.com', 'Tom4tom', 'A128504932', '0927194832', '1', '1994-09-05', 'TPE', 3),
(40, 'ray', 'rayisray@gmail.com', 'Ray4ray', 'A123564312', '0974638173', '1', '1965-09-01', 'TPE', 2),
(41, 'tina', 'tinaistina@gmail.com', 'Tina4tina', 'C225594832', '0977537263', '2', '2020-08-31', 'TPE', 1),
(43, 'patty', 'pattyispatty@gmail.com', 'Patty4patty', 'D220193827', '0982716234', '2', '2020-09-23', 'TPE', 3),
(44, 'addy', 'addyisaddy@gmail.com', 'Addy4addy', 'F120493029', '0937221983', '3', '2020-09-14', 'TPE', NULL),
(45, 'red', 'redisred@gmail.com', 'Red4red', 'F220193827', '0987654321', '2', '2020-09-23', 'TPE', NULL),
(48, 'toby', 'tobyistoby@gmail.com', 'Toby4toby', 'C125594832', '0982716234', '1', '2020-09-16', 'TPE', NULL);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
