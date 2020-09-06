-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2020 年 09 月 05 日 09:50
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
-- 資料庫： `product`
--

-- --------------------------------------------------------

--
-- 資料表結構 `product_cosme`
--

CREATE TABLE `product_cosme` (
  `sid` int(11) NOT NULL,
  `product` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `amount` int(3) NOT NULL,
  `vender` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `product_cosme`
--

INSERT INTO `product_cosme` (`sid`, `product`, `price`, `amount`, `vender`, `created_at`) VALUES
(1, '水晶橙花精華油50ml', 860, 35, '人間魚 PEOPLEFISH', '2020-09-03 09:52:07'),
(2, '橙花冰晶水凝露50ml', 980, 27, '人間魚 PEOPLEFISH', '2020-09-03 09:57:09'),
(3, '似水年華複方純露', 980, 20, '人間魚 PEOPLEFISH', '2020-09-03 09:57:09'),
(4, '藍蓮花複方凝萃花露', 680, 30, '人間魚 PEOPLEFISH', '2020-09-03 09:57:09'),
(5, '茶樹純露150ml｜老欉茶樹', 780, 40, '人間魚 PEOPLEFISH', '2020-09-03 10:00:37'),
(6, '黃金面膜-臉膜（乾式）', 3000, 36, '人間魚 PEOPLEFISH', '2020-09-03 10:02:58'),
(7, '黃金面膜-頸膜（乾式）', 1400, 35, '人間魚 PEOPLEFISH', '2020-09-03 10:02:58'),
(8, '黃金面膜-眼膜（乾式）', 1400, 30, '人間魚 PEOPLEFISH', '2020-09-03 10:02:58'),
(9, '茉提雅複方凝萃花露', 680, 42, '人間魚 PEOPLEFISH', '2020-09-03 10:04:26'),
(10, '竹薑純露150ml', 780, 29, '人間魚 PEOPLEFISH', '2020-09-03 10:19:20'),
(11, '零時感全效精華霜', 1380, 17, '人間魚 PEOPLEFISH', '2020-09-03 10:19:20'),
(12, '雪霧百合複方純露150ml', 980, 20, '人間魚 PEOPLEFISH', '2020-09-03 10:19:20'),
(13, '尼羅河奇蹟雪膚酪紫晶罐 22g+', 980, 18, '人間魚 PEOPLEFISH', '2020-09-03 10:19:20'),
(14, '多莓果精華油30ml', 1860, 9, '人間魚 PEOPLEFISH', '2020-09-03 10:19:20'),
(15, '金盞玉香複方純露150ml', 980, 14, '人間魚 PEOPLEFISH', '2020-09-03 10:22:08'),
(16, '竹薑純露150ml', 780, 29, '人間魚 PEOPLEFISH', '2020-09-03 10:22:08'),
(17, '竹薑純露150ml', 780, 29, '人間魚 PEOPLEFISH', '2020-09-03 10:22:08'),
(18, '歡顏嫩白柔膚精華霜26g+', 1380, 13, '人間魚 PEOPLEFISH', '2020-09-03 10:22:08'),
(19, '黃金玫瑰精華油50ml', 860, 19, '人間魚 PEOPLEFISH', '2020-09-03 10:26:05'),
(20, '雪姬晶緻潔膚面膜泥 26g+', 980, 27, '人間魚 PEOPLEFISH', '2020-09-03 10:26:05'),
(21, '輔酶Q10修復防皺精華', 620, 13, '人間魚 PEOPLEFISH', '2020-09-03 11:24:37'),
(22, '維生素C新生活力面部精華液', 586, 0, 'Avalon', '2020-09-03 11:25:24'),
(23, '維生素C強效防護抗皺新生霜', 505, 6, 'Avalon', '2020-09-03 11:27:24'),
(24, '有機無香料蘆薈首部/身體潤膚乳液', 500, 25, 'Avalon', '2020-09-03 11:28:37'),
(25, '輔酶Q10玫瑰果抗皺調理緊緻潤膚露', 413, 9, 'Avalon', '2020-09-03 11:30:02'),
(26, 'MKUP 美咖 煥顏修護導入晚安面膜(一盒五片)', 600, 50, 'MKUP 美咖', '2020-09-03 11:40:23'),
(27, 'MKUP 美咖 煥顏修護導入晚安面膜(一盒五片)', 600, 50, 'MKUP 美咖', '2020-09-03 11:40:39'),
(28, 'MKUP 美咖 活水精萃保濕棒2入', 1398, 22, 'MKUP 美咖', '2020-09-03 11:40:39'),
(29, 'MKUP 美咖 Q10美顏果凍保濕噴霧(大)', 599, 30, 'MKUP 美咖', '2020-09-03 11:54:46');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `product_cosme`
--
ALTER TABLE `product_cosme`
  ADD PRIMARY KEY (`sid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_cosme`
--
ALTER TABLE `product_cosme`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
