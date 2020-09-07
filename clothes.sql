-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-09-07 07:08:09
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
-- 資料庫： `topic`
--

-- --------------------------------------------------------

--
-- 資料表結構 `clothes_category`
--

CREATE TABLE `clothes_category` (
  `sid` int(11) NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `clothes_category`
--

INSERT INTO `clothes_category` (`sid`, `gender`, `name`, `class`, `color`, `size`, `price`, `vendor`, `added_time`) VALUES
(160, '男裝', '純棉短袖', '上身', '白', 'S', '390', 'lativ', '2020-09-06 02:34:24'),
(161, '男裝', '純棉短袖', '上身', '白', 'M', '390', 'lativ', '2020-09-06 02:34:24'),
(162, '男裝', '純棉短袖', '上身', '白', 'L', '390', 'lativ', '2020-09-06 02:34:24'),
(163, '男裝', '純棉短袖', '上身', '亞麻灰', 'S', '390', 'lativ', '2020-09-06 02:34:24'),
(164, '男裝', '純棉短袖', '上身', '亞麻灰', 'M', '390', 'lativ', '2020-09-06 02:34:24'),
(165, '男裝', '純棉短袖', '上身', '亞麻灰', 'L', '390', 'lativ', '2020-09-06 02:34:24'),
(166, '女裝', '涼感背心', '上身', '軍綠', 'S', '490', 'patagonia', '2020-09-06 02:34:24'),
(167, '女裝', '涼感背心', '上身', '軍綠', 'M', '490', 'patagonia', '2020-09-06 02:34:24'),
(168, '女裝', '涼感背心', '上身', '軍綠', 'L', '490', 'patagonia', '2020-09-06 02:34:24'),
(169, '女裝', '涼感背心', '上身', '藏青', 'S', '490', 'patagonia', '2020-09-06 02:34:24'),
(170, '女裝', '涼感背心', '上身', '藏青', 'M', '490', 'patagonia', '2020-09-06 02:34:24'),
(171, '女裝', '涼感背心', '上身', '藏青', 'L', '490', 'patagonia', '2020-09-06 02:34:24'),
(172, '男裝', '高密織防潑水短褲', '下身', '卡其', 'S', '1290', 'gravis', '2020-09-06 02:34:24'),
(173, '男裝', '高密織防潑水短褲', '下身', '卡其', 'M', '1290', 'gravis', '2020-09-06 02:34:24'),
(174, '男裝', '高密織防潑水短褲', '下身', '卡其', 'L', '1290', 'gravis', '2020-09-06 02:34:24'),
(175, '男裝', '高密織防潑水短褲', '下身', '經典黑', 'S', '1290', 'gravis', '2020-09-06 02:34:24'),
(176, '男裝', '高密織防潑水短褲', '下身', '經典黑', 'M', '1290', 'gravis', '2020-09-06 02:34:24'),
(177, '男裝', '高密織防潑水短褲', '下身', '經典黑', 'L', '1290', 'gravis', '2020-09-06 02:34:24'),
(178, '女裝', '條紋半開襟洋裝', '下身', '焦糖棕', 'S', '1590', 'journal standard', '2020-09-06 02:34:24'),
(179, '女裝', '條紋半開襟洋裝', '下身', '焦糖棕', 'M', '1590', 'journal standard', '2020-09-06 02:34:24'),
(180, '女裝', '條紋半開襟洋裝', '下身', '焦糖棕', 'L', '1590', 'journal standard', '2020-09-06 02:34:24'),
(181, '男裝', '棉蠶絲條紋無領襯衫', '上身', '紅藍條紋', 'S', '890', 'Machismo', '2020-09-06 02:34:24'),
(182, '男裝', '棉蠶絲條紋無領襯衫', '上身', '紅藍條紋', 'M', '890', 'Machismo', '2020-09-06 02:34:24'),
(183, '男裝', '棉蠶絲條紋無領襯衫', '上身', '紅藍條紋', 'L', '890', 'Machismo', '2020-09-06 02:34:24'),
(184, '男裝', '棉蠶絲條紋無領襯衫', '上身', '橘黃條紋', 'S', '890', 'Machismo', '2020-09-06 02:34:24'),
(185, '男裝', '棉蠶絲條紋無領襯衫', '上身', '橘黃條紋', 'M', '890', 'Machismo', '2020-09-06 02:34:24'),
(186, '男裝', '棉蠶絲條紋無領襯衫', '上身', '橘黃條紋', 'L', '890', 'Machismo', '2020-09-06 02:34:24'),
(187, '女裝', '純棉仿舊針織外套', '上身', '經典黑', 'F', '2890', 'journal standard', '2020-09-06 02:34:24'),
(188, '女裝', '純棉仿舊針織外套', '上身', '鐵灰', 'F', '2890', 'journal standard', '2020-09-06 02:34:24'),
(189, '女裝', '純棉仿舊針織外套', '上身', '米白', 'F', '2890', 'journal standard', '2020-09-06 02:34:24'),
(191, 'OTHER', '小可愛內褲', '下身類', '白', 'S', '139', 'ALNW', '2020-09-06 14:37:38'),
(192, 'OTHER', '有機安全帽', '上身類', '黑', 'F', '19900', 'ALNW', '2020-09-06 14:45:49'),
(200, 'OTHER', '美麗諾羊毛登山襪', '下身', '谷綠', 'F', '390', 'nozzle quiz', '2020-09-06 22:41:05'),
(201, 'OTHER', '美麗諾羊毛登山襪', '下身', '峽藍', 'F', '390', 'nozzle quiz', '2020-09-06 22:41:05'),
(202, 'OTHER', '美麗諾羊毛登山襪', '下身', '米白', 'F', '390', 'nozzle quiz', '2020-09-06 22:41:05'),
(203, 'OTHER', '美麗諾羊毛登山襪', '下身', '峰黑', 'F', '390', 'nozzle quiz', '2020-09-06 22:41:05'),
(204, 'OTHER', '美麗諾羊毛登山襪', '下身', '嶽岩', 'F', '390', 'nozzle quiz', '2020-09-06 22:41:05'),
(213, '男裝', 'COLLARLESS SHORT SLEEVE SHIRT 無領短袖襯衫', '上身類', '海洋藍', 'S', '1890', 'FTMD', '2020-09-07 12:13:44');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `clothes_category`
--
ALTER TABLE `clothes_category`
  ADD PRIMARY KEY (`sid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `clothes_category`
--
ALTER TABLE `clothes_category`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
