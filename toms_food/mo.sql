-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-09-06 16:52:27
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
(32, 'DHC維他命C(30日份)【康是美】', 180, '2020-09-15', '2020-08-30', '55'),
(36, 'dsafasdf', 500, '2020-09-09', '2020-09-03', '77777'),
(38, 'DHC維他命C(30日份)【康是美】', 20000, '2020-08-30', '2020-08-30', '巴拉巴巴把8888'),
(39, 'DHC維他命C(30日份)【康是美】', 2000000000, '2020-09-15', '2020-08-30', '巴拉巴巴把777'),
(40, 'fdsd', 50, '2020-09-05', '2020-09-04', '五五五'),
(41, 'dsafasdf', 500, '2020-08-30', '2020-08-30', '鴻煒科技'),
(42, '55123', 200, '2019-02-08', '2019-02-08', '555'),
(43, '55123', 200, '2019-02-08', '2019-02-08', '555'),
(44, 'fdsd', 500, '2020-08-30', '2020-08-30', '巴拉巴巴把5'),
(45, '55123', 200, '2019-02-08', '2019-02-08', '555'),
(46, 'dsafasdf', 500, '2020-08-30', '2020-08-30', '巴拉巴巴把50'),
(47, 'dsafasdf', 500, '2020-09-12', '2020-10-09', '77777'),
(48, 'dsafasdf', 500, '2020-09-04', '2020-09-23', '鴻煒科技'),
(49, 'tomtt', 500, '2020-09-11', '2020-09-06', '77777'),
(50, 'fdsd', 500, '2020-09-11', '2020-09-10', '五五五'),
(51, 'es', 500, '2020-09-08', '2020-09-07', 'dddq'),
(52, 'dsafasdf', 500, '2020-09-09', '2020-09-09', '五五五'),
(53, 'dsafasdf', 500, '2020-09-02', '2020-08-30', '77777'),
(54, 'fdsd', 500, '2020-09-05', '2020-08-30', '77777'),
(55, 'fdsd', 50, '2020-10-10', '2020-09-09', '五五五'),
(56, 'fdsd', 50, '2020-10-10', '2020-09-09', '斧頭幫'),
(57, 'dsafasdf', 500, '2020-09-03', '2020-09-04', '77777'),
(58, 'tomtt', 500, '2020-09-03', '2020-09-04', '77777'),
(59, 'tomtt', 500, '2020-09-03', '2020-09-04', '77777'),
(61, 'dsafasdf', 500, '2020-09-02', '2020-10-02', '五五五');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

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
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
