-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2020 年 11 月 05 日 13:16
-- サーバのバージョン： 5.7.30
-- PHP のバージョン: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `ec_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_item_table`
--

CREATE TABLE `gs_item_table` (
  `id` int(12) NOT NULL,
  `itemname` varchar(128) NOT NULL,
  `fname` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `value` int(8) NOT NULL,
  `brand` varchar(64) NOT NULL,
  `company` varchar(64) NOT NULL,
  `modelnum` varchar(64) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `gs_item_table`
--

INSERT INTO `gs_item_table` (`id`, `itemname`, `fname`, `value`, `brand`, `company`, `modelnum`, `detail`) VALUES
(10, 'colors', 'IMG_6281.jpg', 100, 'タカラトミー', 'ダイソー', '001', '塗り絵'),
(11, 'kusama', 'IMG_6282.jpg', 100, '明治', 'ダイソー', '002', 'カボチャ'),
(12, 'kabenoe', 'IMG_6283.jpg', 110, 'バンクシー', 'セリア', '003', '環境問題'),
(13, '美女', 'IMG_6284.jpg', 110, 'クッキー', '吉本興業', '004', 'くれてやんよ'),
(14, 'cocoro', 'IMG_6285.jpg', 400, 'キース', 'カルディ', '005', 'わーお'),
(15, 'girlfrend', 'IMG_6286.jpg', 200, 'muji', '無印良品', '006', '綺麗ですねー'),
(16, 'kimoi', 'IMG_6287.jpg', 7988, 'BOSE', 'yamada', '007', '気持ち悪いですねー'),
(17, 'wow', 'IMG_6288.jpg', 1, 'apple', '講談社', '008', 'sdfghjkl;'),
(18, 'tanjiro', 'IMG_6289.jpg', 7777, '集英社', 'jump', '009', '全集中');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_item_table`
--
ALTER TABLE `gs_item_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `gs_item_table`
--
ALTER TABLE `gs_item_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
