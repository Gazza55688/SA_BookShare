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
  `owner_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `book_athor` varchar(50) NOT NULL,
  `book_pub` varchar(100) NOT NULL,
  `book_cat` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `book_pic` varchar(50) NOT NULL,
  `buy_sit` tinyint(1) NOT NULL,
  `buy_b` varchar(10) NOT NULL,
  `s_price` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `book`
--

INSERT INTO `book` (`book_id`, `owner_id`, `book_name`, `book_athor`, `book_pub`, `book_cat`, `book_pic`, `buy_sit`, `buy_b`, `s_price`) VALUES
(1, '409402647', '隱市致富地圖', '股市隱者', '大是文化', '商業理財', 'images/1.png', 0, 'b', 250),
(2, '409402647', '內捲效應', '王為', '采實 / 采實文化', '商業理財', 'images/2.png', 1, 'b', 100),
(3, '409402647', '請解開故事謎底 01【附特典本】', '雷雷夥伴', '台灣漫讀股份有限公司 / 蓋亞文化', '漫畫/圖文書', 'images/3.png', 0, 'b', 300),
(4, '409402647', 'Re:從零開始的異世界生活 第三章 Truth Of Zero(10)', '長月達平/マツセダイチ', '尖端出版', '漫畫/圖文書', 'images/4.png', 0, 'b', 250),
(5, '409402647', '學日文不用背單字', '伊藤幹彥', '台灣漫讀股份有限公司 / 我識出版社', '語言學習', 'images/5.png', 0, 'br', NULL),
(6, '409402647', '華燈初上：影像創作紀實', '百聿數碼', '尖端出版', '影視偶像', 'images/6.png', 0, 'b', 250),
(7, '409402647', '長征的路途', '中央通訊社', '中央通訊社', '人文史地', 'images/7.png', 0, 'b', 100),
(8, '409402647', '革命分子耶穌：重返拿撒勒人耶穌的生平與時代', '雷薩．阿斯蘭', '讀書共和國 / 衛城出版', '人文史地', 'images/8.png', 0, 'br', NULL),
(9, '409402647', 'Selfie Girl がおう作品集', 'がおう', '台灣漫讀股份有限公司 / 台灣角川', '一般版', 'images/9.png', 0, 'b', 200),
(11, '409402398', '生活情境どコデモ日本語 1', '輔仁大學日本語文學系教材編輯委員會', '希伯崙股份有限公司', '語言學習', 'images/IMG20220505152136.jpg', 0, 'b', 100),
(12, '409402398', '生活情境どコデモ日本語 2', '輔仁大學日本語文學系教材編輯委員會', '希伯崙股份有限公司', '語言學習', 'images/IMG20220505152229.jpg', 0, 'br', NULL),
(13, '409402398', '關於我在無意間被隔壁的天使變成廢柴這件事 1', '佐伯さん', '東立出版社有限公司', '童書/青少年文學', 'images/IMG20220505152241.jpg', 0, 'b', 150),
(14, '409402398', '關於我在無意間被隔壁的天使變成廢柴這件事 2', '佐伯さん', '東立出版社有限公司', '童書/青少年文學', 'images/IMG20220505152253.jpg', 0, 'b', 150),
(15, '409402398', '關於我在無意間被隔壁的天使變成廢柴這件事 3', '佐伯さん', '東立出版社有限公司', '童書/青少年文學', 'images/IMG20220505152627.jpg', 0, 'b', 150),
(16, '409402398', '關於我在無意間被隔壁的天使變成廢柴這件事 4', '佐伯さん', '東立出版社有限公司', '童書/青少年文學', 'images/IMG20220505152638.jpg', 0, 'br', NULL),
(17, '409402398', '關於我在無意間被隔壁的天使變成廢柴這件事 5', '佐伯さん', '東立出版社有限公司', '童書/青少年文學', 'images/IMG20220505152646.jpg', 0, 'br', NULL),
(18, '409402398', '平凡職業造就世界最強 11', '白米 良', '東立出版社有限公司', '童書/青少年文學', 'images/IMG20220505152700.jpg', 0, 'b', 100),
(19, '409402398', '平凡職業造就世界最強零 4', '白米 良', '東立出版社有限公司', '童書/青少年文學', 'images/IMG20220505152712.jpg', 0, 'b', 100),
(20, '409402398', '打工吧魔王大人 21', '和ヶ原聡司', '台灣角川股份有限公司', '童書/青少年文學', 'images/IMG20220505152722.jpg', 0, 'b', 100),
(21, '409402398', '請問您今天要來點兔子嗎? 9', 'Koi', '城邦文化事業股份有限公司 尖端出版', '童書/青少年文學', 'images/IMG20220505152735.jpg', 0, 'b', 100);

-- --------------------------------------------------------

--
-- 資料表結構 `cat`
--

CREATE TABLE `cat` (
  `cat_id` int(10) NOT NULL,
  `cat_name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `cat`
--

INSERT INTO `cat` (`cat_id`, `cat_name`) VALUES
(1, '文學小說'),
(2, '商業理財'),
(3, '藝術設計'),
(4, '人文史地'),
(5, '心理勵志'),
(6, '宗教命理'),
(7, '自然科普'),
(8, '醫療保健'),
(9, '生活風格'),
(10, '童書/青少年文學'),
(11, '考試用書/國中小參考書/教科書'),
(12, '影視偶像'),
(13, '漫畫/圖文書'),
(14, '語言學習'),
(15, '電腦資訊'),
(16, '其他');

-- --------------------------------------------------------

--
-- 資料表結構 `rate`
--

CREATE TABLE `rate` (
  `rate_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `rate` int(10) NOT NULL,
  `rate_w` varchar(50) NOT NULL,
  `rate_d` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `trade`
--

CREATE TABLE `trade` (
  `trade_id` int(10) NOT NULL,
  `book_id` int(10) NOT NULL,
  `buy_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `buy_text` varchar(50) DEFAULT NULL,
  `t_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `t_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `trade`
--

INSERT INTO `trade` (`trade_id`, `book_id`, `buy_id`, `buy_text`, `t_date`, `t_status`) VALUES
(12, 2, '409402661', '我們可以約在學校交易', '2022-05-27 09:21:22', 1),
(13, 8, '409402661', '', '2022-05-27 09:24:48', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `user_id` varchar(15) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_p` varchar(50) NOT NULL,
  `user_t` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_p`, `user_t`) VALUES
('409402398', 'min', '55148', '0915661778'),
('409402647', 'gazza', '55688', '0917229226'),
('409402661', 'wei', '12345', '0958736556');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- 資料表索引 `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- 資料表索引 `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`rate_id`,`user_id`);

--
-- 資料表索引 `trade`
--
ALTER TABLE `trade`
  ADD PRIMARY KEY (`trade_id`),
  ADD KEY `book` (`book_id`),
  ADD KEY `buy_id` (`buy_id`);

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
  MODIFY `book_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `cat`
--
ALTER TABLE `cat`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `rate`
--
ALTER TABLE `rate`
  MODIFY `rate_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `trade`
--
ALTER TABLE `trade`
  MODIFY `trade_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- 資料表的限制式 `trade`
--
ALTER TABLE `trade`
  ADD CONSTRAINT `book` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `trade_ibfk_2` FOREIGN KEY (`buy_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
