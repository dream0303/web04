-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2019-08-22 07:48:00
-- 伺服器版本： 10.1.39-MariaDB
-- PHP 版本： 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db04`
--

-- --------------------------------------------------------

--
-- 資料表結構 `foot`
--

CREATE TABLE `foot` (
  `id` int(11) NOT NULL,
  `txt` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `foot`
--

INSERT INTO `foot` (`id`, `txt`) VALUES
(1, 'AAAAaass');

-- --------------------------------------------------------

--
-- 資料表結構 `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `mas` int(11) NOT NULL,
  `chi` int(11) NOT NULL,
  `sh` int(11) NOT NULL DEFAULT '1',
  `txt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pri` int(11) NOT NULL,
  `form` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `num` int(11) NOT NULL,
  `filename` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `con` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `item`
--

INSERT INTO `item` (`id`, `mas`, `chi`, `sh`, `txt`, `pri`, `form`, `num`, `filename`, `con`) VALUES
(1, 2, 6, 1, '手工訂製長夾', 1200, '全牛皮', 2, '0403.jpg', '手工製作長夾卡片層6*2 鈔票層 *2 零錢拉鍊層 *1 \r\n採用愛馬仕相同的雙針縫法,皮件堅固耐用不脫線 \r\n材質:直革鞣(馬鞍皮)牛皮製作  \r\n手工染色 '),
(7, 2, 6, 1, '兩用式磁扣腰包', 685, '中型', 18, '0404.jpg', '材質:進口牛皮\r\n顏色:黑色荔枝紋+黑色珠光面皮(黑色縫線)\r\n尺寸:15cm*14cm(高)*6cm(前後)\r\n產地:臺灣\r\n'),
(9, 2, 6, 1, '超薄設計男士長款真皮', 800, 'L號', 61, '0405.jpg', '基本:編織皮革對摺長款零錢包\r\n特色:最潮流最時尚的單品 \r\n顏色:黑色珠光面皮(黑色縫線)\r\n形狀:黑白格編織皮革對摺 '),
(10, 3, 8, 1, '經典牛皮少女帆船鞋', 1000, 'S號', 6, '0406.jpg', '以傳統學院派風格聞名，創始近百年工藝製鞋精神\r\n共用獨家專利氣墊技術，兼具紐約工藝精神，與舒適跑格靈魂\r\n'),
(11, 3, 9, 1, '經典優雅時尚流行涼鞋', 2650, 'LL', 8, '0407.jpg', '優雅流線方型楦頭設計，結合簡潔線條綴飾，\r\n獨特的弧度與曲線美，突顯年輕優雅品味，\r\n是年輕上班族不可或缺的鞋款！\r\n全新美國運回，現貨附鞋盒'),
(12, 4, 11, 1, '寵愛天然藍寶女戒', 28000, '1克拉', 1, '0408.jpg', '◎典雅設計品味款\r\n◎藍寶為珍貴天然寶石之一，具有保值收藏\r\n◎專人設計製造，以貴重珠寶精緻鑲工製造\r\n'),
(13, 5, 12, 1, '反折式大容量手提肩背包', 888, 'L號', 15, '0409.jpg', '特色:反折式的包口設計,釘釦的裝飾,讓簡單的包型更增添趣味性\r\n材質:棉布\r\n顏色:藍色\r\n尺寸:長50cm寬20cm高41cm\r\n產地:日本\r\n'),
(14, 2, 6, 1, '男單肩包男', 650, '多功能', 7, '0410.jpg', '特色:男單肩包/電腦包/公文包/雙肩背包多用途\r\n材質:帆不\r\n顏色:黑色\r\n尺寸:深11cm寬42cm高33cm\r\n產地:香港\r\n');

-- --------------------------------------------------------

--
-- 資料表結構 `leader`
--

CREATE TABLE `leader` (
  `id` int(11) NOT NULL,
  `txt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pw` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `item` int(11) NOT NULL DEFAULT '0',
  `od` int(11) NOT NULL DEFAULT '0',
  `user` int(11) NOT NULL DEFAULT '0',
  `foot` int(11) NOT NULL DEFAULT '0',
  `news` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `leader`
--

INSERT INTO `leader` (`id`, `txt`, `pw`, `item`, `od`, `user`, `foot`, `news`) VALUES
(1, 'admin', '1234', 1, 1, 1, 1, 1),
(2, 'aaaa', '1234', 1, 0, 1, 0, 1),
(5, 'asddsasasad', 'assa', 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `mu`
--

CREATE TABLE `mu` (
  `id` int(11) NOT NULL,
  `txt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mas` int(11) NOT NULL DEFAULT '0',
  `sh` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `mu`
--

INSERT INTO `mu` (`id`, `txt`, `url`, `mas`, `sh`) VALUES
(1, '全部商品', '', 0, 1),
(2, '流行皮件', '', 0, 1),
(3, '流行鞋區', '', 0, 1),
(4, '流行飾品', '', 0, 1),
(5, '背包', '', 0, 1),
(6, '男用皮件', '', 2, 1),
(7, '女用皮件', '', 2, 1),
(8, '少女鞋區', '', 3, 1),
(9, '紳士流行鞋區', '', 3, 1),
(10, '時尚手錶', '', 4, 1),
(11, '時尚珠寶', '', 4, 1),
(12, '背包', '', 5, 1),
(14, 'asdasd', '', 13, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `od`
--

CREATE TABLE `od` (
  `id` int(11) NOT NULL,
  `no` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `txt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `em` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `addr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pri` int(11) NOT NULL,
  `dt` date NOT NULL,
  `carid` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `od`
--

INSERT INTO `od` (`id`, `no`, `txt`, `name`, `em`, `addr`, `tel`, `pri`, `dt`, `carid`) VALUES
(10, '20190821110846', 'aa', 'aa', 'aa', 'aa', 'aa', 3088, '2019-08-21', 'a:3:{i:0;s:1:\"1\";i:1;s:2:\"10\";i:2;s:2:\"13\";}');

-- --------------------------------------------------------

--
-- 資料表結構 `total`
--

CREATE TABLE `total` (
  `id` int(11) NOT NULL,
  `txt` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `total`
--

INSERT INTO `total` (`id`, `txt`) VALUES
(1, '3');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `txt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pw` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `addr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `em` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dt` date NOT NULL DEFAULT '2019-08-02'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `name`, `txt`, `pw`, `tel`, `addr`, `em`, `dt`) VALUES
(1, 'asd', 'adsdas', 'adsasd', 'asd', 'asdads', 'asdadsads', '2019-08-20'),
(2, 'asdasd', 'asdadsdd', 'ddd', 'sad', 'asdasd', 'asdads', '2019-08-20'),
(5, 'aa', 'aa', 'aa', 'aa', 'aa', 'aa', '2019-08-20');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `foot`
--
ALTER TABLE `foot`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `leader`
--
ALTER TABLE `leader`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `mu`
--
ALTER TABLE `mu`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `od`
--
ALTER TABLE `od`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `total`
--
ALTER TABLE `total`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動增長(AUTO_INCREMENT)
--

--
-- 使用資料表自動增長(AUTO_INCREMENT) `foot`
--
ALTER TABLE `foot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `leader`
--
ALTER TABLE `leader`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `mu`
--
ALTER TABLE `mu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `od`
--
ALTER TABLE `od`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `total`
--
ALTER TABLE `total`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
