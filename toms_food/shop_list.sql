-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-09-09 07:57:59
-- 伺服器版本： 10.4.14-MariaDB
-- PHP 版本： 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `mo`
--

-- --------------------------------------------------------

--
-- 資料表結構 `shop_list`
--

CREATE TABLE `shop_list` (
  `sid` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `MD` date NOT NULL,
  `expried` date NOT NULL,
  `firm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `shop_list`
--

INSERT INTO `shop_list` (`sid`, `name`, `price`, `MD`, `expried`, `firm`) VALUES
(63, '日本味王蔓越莓口含錠60粒', 380, '2020-08-05', '2021-01-28', '東版生技有限公司'),
(64, '【情人蜂蜜-中秋送禮】台灣天空森林蜜700g*3入組', 990, '2019-08-05', '2020-12-28', '東版生技有限公司'),
(65, '黑芝麻糊30g x 12入(100%全天然)', 380, '2020-08-05', '2021-01-28', '宏偉食品有限公司'),
(66, '纖怡穀麥萃-蔓越莓南瓜籽', 500, '2020-10-05', '2021-10-28', '宏偉食品有限公司'),
(67, '統百米菓夾心餅(特濃黑芝麻)', 90, '2020-08-05', '2021-01-28', '宏偉食品有限公司'),
(68, '台樹西伯利亞野生松子', 380, '2020-08-05', '2021-01-28', '宏偉食品有限公司'),
(69, '里仁黃金苦蕎茶', 190, '2020-08-05', '2021-01-28', '東風食品有限公司'),
(70, 'Biona有機麥芽飲品(咖啡口感)', 360, '2020-08-07', '2021-10-28', '東風食品有限公司'),
(71, 'Aroina100%有機野櫻莓原汁', 680, '2020-08-05', '2021-01-28', '東風食品有限公司'),
(72, '米森有機黑森林野莓茶', 60, '2018-08-05', '2021-01-28', '東風食品有限公司'),
(73, '樂亞蜜有機雨前綠茶-玫瑰', 380, '2020-08-05', '2021-01-28', '東風食品有限公司'),
(74, '鈺統三機植物絞肉', 150, '2020-07-05', '2020-01-28', '誠食食品有限公司'),
(75, '福業【嘉年華+】有機冷凍白花椰', 380, '2020-08-05', '2021-01-28', '誠食食品有限公司'),
(76, '桑椹鳳檸雪酪', 190, '2020-08-04', '2021-05-28', '誠食食品有限公司'),
(77, '有機冷凍地瓜塊', 380, '2020-08-05', '2021-01-28', '誠食食品有限公司'),
(78, '淨源茶坊【嘉年華+】有機茶禮盒(鐵罐)', 3800, '2020-09-05', '2021-05-01', '誠食食品有限公司');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `shop_list`
--
ALTER TABLE `shop_list`
  ADD PRIMARY KEY (`sid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `shop_list`
--
ALTER TABLE `shop_list`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
