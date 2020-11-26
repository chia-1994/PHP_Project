-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020 年 09 月 09 日 11:01
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
-- 資料表結構 `vendor-list`
--

CREATE TABLE `vendor-list` (
  `sid` int(11) NOT NULL,
  `vendor_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TEL` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tax_ID_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `vendor-list`
--

INSERT INTO `vendor-list` (`sid`, `vendor_name`, `address`, `TEL`, `email`, `tax_ID_number`, `contact_person`) VALUES
(1, 'Patagonia', '台北市忠孝西路1段23號', '0223886578', 'patagonia@gmail.com', '80000123', 'Yvon Chouinard'),
(2, 'lativ', '2170 Folsom Street San Francisco, CA 94110 USA', '1-888-963-8943', 'lativ@gmail.com', '800000023', 'michael preysman'),
(3, 'gravis', '57 Hotaling Place57 Hotaling Place San Francisco, CA 94111', '(415) 469-1455', 'gravis@gmail.com', '80000004 ', 'philip chen'),
(4, 'journal standard', '8253 Melrose Ave. Los Angeles, CA 90046', '(213) 459-6079', 'journal-standard@gmail.com', '80000006 ', 'David Brisske'),
(5, 'Machismo', '207 S. Broadway, Floor 7, Los Angeles, CA 90012', '(213) 459-6078', 'Machismo@gmail.com', '80000008', 'Nyree Corby, Founder'),
(6, 'nozzle quiz', '236新北市土城區永豐路', '0222660512', 'nozzle-quiz@gmail.com', '800000025', 'Margarita'),
(7, 'ALNW', '10635 Santa Monica Blvd, Los Angeles, CA 90025', '1-800-310-3773', 'ALNW@gmail.com', '80000010', 'ruby'),
(161, '人間魚 PEOPLEFISH', '106台北市大安區基隆路二段112號3樓', '0227323766', 'PEOPLEFISH@gmail.com', '800000022', 'Helen'),
(162, 'Avalon', '407台中市西屯區大墩二十街88-1號', '0423286250', 'Avalon@gmail.com', '800000023', 'Tsunda'),
(163, 'MKUP 美咖', '236新北市土城區永豐路', '0222660511', 'MKUP@gmail.com', '800000025', 'sandy'),
(165, '誠實食品有限公司', '100台北市中正區忠孝西路一段102號10樓', '077250100', 'honest@gmail.com', '800000027', 'tom'),
(166, '東風食品有限公司', '116台北市文山區羅斯福路五段97巷9號', '0286633388', 'Dongfeng@gmail.com', '800000031', 'tommy'),
(167, '宏偉食品有限公司', '234永和區成功路二段66號', '0229262720', 'Magnificent@gmail.com', '800000033', 'Denny'),
(169, 'Allbirdssssss', '1717 SW Park Ave, Portland, OR', '17472575687', 'willy8642@gmail.com', 'q3123', 'awda');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `vendor-list`
--
ALTER TABLE `vendor-list`
  ADD PRIMARY KEY (`sid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `vendor-list`
--
ALTER TABLE `vendor-list`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
