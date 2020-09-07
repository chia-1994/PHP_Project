-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-09-03 11:23:50
-- 伺服器版本： 10.4.14-MariaDB
-- PHP 版本： 7.4.9

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
(32, 'DHC維他命C(30日份)【康是美】', 180, '2020-09-15', '2020-09-08', '55'),
(33, 'DHC維他命C(30日份)【康是美】', 180, '2020-09-15', '2020-09-16', '巴拉巴巴把'),
(34, 'DHC維他命C(30日份)【康是美】', 180, '2020-09-15', '2020-09-16', '巴拉巴巴把'),
(35, 'DHC維他命C(30日份)【康是美】', 180, '2020-09-15', '2020-09-16', '巴拉巴巴把'),
(36, 'dsafasdf', 500, '2020-09-09', '2020-09-03', '77777'),
(37, 'DHC維他命C(30日份)【康是美】', 200, '2020-09-15', '2020-09-16', '巴拉巴巴把'),
(38, 'DHC維他命C(30日份)【康是美】', 20000, '2020-09-15', '2020-09-16', '巴拉巴巴把8888'),
(39, 'DHC維他命C(30日份)【康是美】', 2000000000, '2020-09-15', '2020-09-16', '巴拉巴巴把777'),
(40, 'fdsd', 50, '2020-09-05', '2020-09-04', '五五五');

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
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
