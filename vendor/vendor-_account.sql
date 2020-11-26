-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020 年 09 月 09 日 11:00
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
-- 資料庫： `vendor`
--

-- --------------------------------------------------------

--
-- 資料表結構 `vendor- account`
--

CREATE TABLE `vendor- account` (
  `sid` int(11) NOT NULL,
  `account` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vendor_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `vendor- account`
--

INSERT INTO `vendor- account` (`sid`, `account`, `vendor_name`, `password`) VALUES
(1, 'Patagonia', 'Patagonia', '1234'),
(2, 'lativ', 'lativ', '1234'),
(3, 'honest', '誠實食品有限公司', '1234'),
(4, 'Dongfeng', '東風食品有限公司', '1234'),
(5, 'Magnificent', '宏偉食品有限公司', '1234'),
(6, 'PEOPLEFISH', '人間魚 PEOPLEFISH', '1234'),
(7, 'Avalon', 'Avalon', '1234'),
(8, 'MKUP', 'MKUP 美咖', '1234'),
(10, 'king', 'king', 'root');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `vendor- account`
--
ALTER TABLE `vendor- account`
  ADD PRIMARY KEY (`sid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
