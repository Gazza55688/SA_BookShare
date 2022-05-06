-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 
-- 伺服器版本： 8.0.17
-- PHP 版本： 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `user`
--

-- --------------------------------------------------------

--
-- 資料表結構 `book`
--

CREATE TABLE `book` (
  `book_id` int(10) NOT NULL,
  `own_name` varchar(50) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `book_athor` varchar(50) NOT NULL,
  `book_pub` varchar(100) NOT NULL,
  `book_ver` varchar(10) NOT NULL,
  `book_pic` varchar(50) NOT NULL,
  `buy_sit` tinyint(1) NOT NULL,
  `buy_b` varchar(10) NOT NULL,
  `s_price` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `book`
--

INSERT INTO `book` (`book_id`, `own_name`, `book_name`, `book_athor`, `book_pub`, `book_ver`, `book_pic`, `buy_sit`, `buy_b`, `s_price`) VALUES
(1, 'gazza', '隱市致富地圖', '股市隱者', '大是文化', '一般版', 'images/1.png', 0, 'b', 250),
(2, 'gazza', '內捲效應', '王為', '采實 / 采實文化', '一般版', 'images/2.png', 0, 'b', 100),
(3, 'gazza', '請解開故事謎底 01【附特典本】', '雷雷夥伴', '台灣漫讀股份有限公司 / 蓋亞文化', '一般版', 'images/3.png', 0, 'b', 300),
(4, 'gazza', 'Re:從零開始的異世界生活 第三章 Truth Of Zero(10)', '長月達平/マツセダイチ', '尖端出版', '一般版', 'images/4.png', 0, 'b', 250),
(5, 'gazza', '學日文不用背單字', '伊藤幹彥', '台灣漫讀股份有限公司 / 我識出版社', '一般版', 'images/5.png', 0, 'br', NULL),
(6, 'gazza', '華燈初上：影像創作紀實', '百聿數碼', '尖端出版', '一般版', 'images/6.png', 0, 'b', 250),
(7, 'gazza', '長征的路途', '中央通訊社', '中央通訊社', '一般版', 'images/7.png', 0, 'b', 100),
(8, 'gazza', '革命分子耶穌：重返拿撒勒人耶穌的生平與時代', '雷薩．阿斯蘭', '讀書共和國 / 衛城出版', '二版', 'images/8.png', 0, 'br', NULL),
(9, 'gazza', 'Selfie Girl がおう作品集', 'がおう', '台灣漫讀股份有限公司 / 台灣角川', '一般版', 'images/9.png', 0, 'b', 200),
(10, 'gazza', '乞丐王子', '馬克．吐溫', '滾石移動 / 目川文化數位股份有限公司', '一般版', 'images/10.png', 0, 'br', NULL),
(11, 'min', '生活情境どコデモ日本語 1', '輔仁大學日本語文學系教材編輯委員會', '希伯崙股份有限公司', '一般版', 'images/IMG20220505152136.jpg', 0, 'b', 100),
(12, 'min', '生活情境どコデモ日本語 2', '輔仁大學日本語文學系教材編輯委員會', '希伯崙股份有限公司', '一般版', 'images/IMG20220505152229.jpg', 0, 'br', NULL),
(13, 'min', '關於我在無意間被隔壁的天使變成廢柴這件事 1', '佐伯さん', '東立出版社有限公司', '一般版', 'images/IMG20220505152241.jpg', 0, 'b', 150),
(14, 'min', '關於我在無意間被隔壁的天使變成廢柴這件事 2', '佐伯さん', '東立出版社有限公司', '一般版', 'images/IMG20220505152253.jpg', 0, 'b', 150),
(15, 'min', '關於我在無意間被隔壁的天使變成廢柴這件事 3', '佐伯さん', '東立出版社有限公司', '一般版', 'images/IMG20220505152627.jpg', 0, 'b', 150),
(16, 'min', '關於我在無意間被隔壁的天使變成廢柴這件事 4', '佐伯さん', '東立出版社有限公司', '一般版', 'images/IMG20220505152638.jpg', 0, 'br', NULL),
(17, 'min', '關於我在無意間被隔壁的天使變成廢柴這件事 5', '佐伯さん', '東立出版社有限公司', '一般版', 'images/IMG20220505152646.jpg', 0, 'br', NULL),
(18, 'min', '平凡職業造就世界最強 11', '白米 良', '東立出版社有限公司', '一般版', 'images/IMG20220505152700.jpg', 0, 'b', 100),
(19, 'min', '平凡職業造就世界最強零 4', '白米 良', '東立出版社有限公司', '一般版', 'images/IMG20220505152712.jpg', 0, 'b', 100),
(20, 'min', '打工吧魔王大人 21', '和ヶ原聡司', '台灣角川股份有限公司', '一般版', 'images/IMG20220505152722.jpg', 0, 'b', 100),
(21, 'min', '請問您今天要來點兔子嗎? 9', 'Koi', '城邦文化事業股份有限公司 尖端出版', '一般版', 'images/IMG20220505152735.jpg', 0, 'b', 100),
(28, 'min', '家裡蹲吸血姬的鬱悶', '小林湖底', '', '一般版', 'images/IMG20220505152823.jpg', 0, 'b', 100);

-- --------------------------------------------------------

--
-- 資料表結構 `trade`
--

CREATE TABLE `trade` (
  `trade_id` int(10) NOT NULL,
  `book_id` int(10) NOT NULL,
  `buy_name` varchar(50) NOT NULL,
  `buy_text` varchar(50) DEFAULT NULL,
  `own_name` varchar(50) NOT NULL,
  `buy_l` varchar(100) NOT NULL,
  `t_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `user_id` varchar(15) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_p` varchar(50) NOT NULL,
  `user_t` varchar(50) NOT NULL,
  `rate_a` double DEFAULT NULL,
  `rate_1` int(20) DEFAULT NULL,
  `rate_2` int(20) DEFAULT NULL,
  `rate_3` int(20) DEFAULT NULL,
  `rate_4` int(20) DEFAULT NULL,
  `rate_5` int(20) DEFAULT NULL,
  `rate_w1` varchar(50) DEFAULT NULL,
  `rate_w2` varchar(50) DEFAULT NULL,
  `rate_w3` varchar(50) DEFAULT NULL,
  `rate_w4` varchar(50) DEFAULT NULL,
  `rate_w5` varchar(50) DEFAULT NULL,
  `rate_d1` date DEFAULT NULL,
  `rate_d2` date DEFAULT NULL,
  `rate_d3` date DEFAULT NULL,
  `rate_d4` date DEFAULT NULL,
  `rate_d5` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_p`, `user_t`, `rate_a`, `rate_1`, `rate_2`, `rate_3`, `rate_4`, `rate_5`, `rate_w1`, `rate_w2`, `rate_w3`, `rate_w4`, `rate_w5`, `rate_d1`, `rate_d2`, `rate_d3`, `rate_d4`, `rate_d5`) VALUES
('409402398', 'min', '55148', '55148', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('409402647', 'gazza', '55688', '0917229226', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- 資料表索引 `trade`
--
ALTER TABLE `trade`
  ADD PRIMARY KEY (`trade_id`),
  ADD KEY `book` (`book_id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `trade`
--
ALTER TABLE `trade`
  ADD CONSTRAINT `book` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
