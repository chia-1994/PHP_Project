-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2020 年 09 月 03 日 17:05
-- 伺服器版本： 10.4.13-MariaDB
-- PHP 版本： 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `project`
--

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `orderNumber` int(11) NOT NULL,
  `memberId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ship_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ship_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ship_Address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `shipStatus` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paymentMethod` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paymentStatus` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_Price` int(11) NOT NULL,
  `ship_Fee` int(11) NOT NULL,
  `shopDiscount` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`orderID`, `orderNumber`, `memberId`, `ship_name`, `ship_phone`, `ship_Address`, `created_at`, `shipStatus`, `paymentMethod`, `paymentStatus`, `product_Price`, `ship_Fee`, `shopDiscount`, `totalPrice`, `note`) VALUES
(1, 1, '1', '五妹', '0922333111', '106台北市大安區復興南路一段390號2樓', '2020-09-03 10:59:21', '未出貨', '信用卡', '已付款', 200, 30, 0, 230, '有管理員可代收包裹'),
(2, 2, '2', '六仔', '0911222333', '106台北市大安區復興南路一段390號2樓', '2020-09-03 11:57:11', '未出貨', '貨到付款', '未付款', 100, 30, 0, 130, '晚上收貨'),
(3, 10, '3', '貓貓', '0911111111', '106台北市大安區復興南路一段390號2樓', '2020-09-03 14:56:20', '未出貨', '信用卡', '未付款', 200, 100, 0, 300, '');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
