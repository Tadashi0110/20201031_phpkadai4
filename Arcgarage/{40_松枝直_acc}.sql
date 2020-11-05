-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2020 年 11 月 05 日 13:15
-- サーバのバージョン： 5.7.30
-- PHP のバージョン: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `ec_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_acc_table`
--

CREATE TABLE `gs_acc_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `kana` varchar(128) DEFAULT NULL,
  `email` varchar(128) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `postnum` varchar(12) DEFAULT NULL,
  `adress` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `gs_acc_table`
--

INSERT INTO `gs_acc_table` (`id`, `name`, `kana`, `email`, `pass`, `postnum`, `adress`) VALUES
(5, 'トランプ', 'トランプ', 'test', '1234', '11111', '111111'),
(6, 'ショーンK', 'ショーン', 'kkkk', '1234', '1234-123', 'アメリカ'),
(7, '浜田雅功', 'はまちゃん', 'hama', '1234', '12340123', '2344'),
(8, '松枝直', 'まつえだ', 'matsueda', '1234', '1342', 'dfghjkl');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_acc_table`
--
ALTER TABLE `gs_acc_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `gs_acc_table`
--
ALTER TABLE `gs_acc_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
