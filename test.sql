-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-12-30 16:00:52
-- 服务器版本： 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- 表的结构 `images`
--

CREATE TABLE `images` (
  `image_id` char(32) NOT NULL COMMENT '图片ID',
  `storage` varchar(50) NOT NULL DEFAULT 'filesystem' COMMENT '存储引擎',
  `image_name` varchar(50) DEFAULT NULL COMMENT '图片名称',
  `ident` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL COMMENT '网址',
  `l_ident` varchar(200) DEFAULT NULL COMMENT '大图唯一标识',
  `l_url` varchar(200) DEFAULT NULL COMMENT '大图URL地址',
  `m_ident` varchar(200) DEFAULT NULL COMMENT '中图唯一标识',
  `m_url` varchar(200) DEFAULT NULL COMMENT '中图URL地址',
  `s_ident` varchar(200) DEFAULT NULL COMMENT '小图唯一标识',
  `s_url` varchar(200) DEFAULT NULL COMMENT '小图URL地址',
  `width` mediumint(8) UNSIGNED DEFAULT NULL COMMENT '宽度',
  `height` mediumint(8) UNSIGNED DEFAULT NULL COMMENT '高度',
  `watermark` enum('true','false') DEFAULT 'false' COMMENT '有水印',
  `last_modified` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `images`
--

INSERT INTO `images` (`image_id`, `storage`, `image_name`, `ident`, `url`, `l_ident`, `l_url`, `m_ident`, `m_url`, `s_ident`, `s_url`, `width`, `height`, `watermark`, `last_modified`) VALUES
('000117ade10eed8a3640b44a22de45ae', 'filesystem', 'product-224.jpg', '/dd/6f/a8/3b64f08b8ffd0d91bcc34ad946f6d8972d2c435a.jpg', '/img/sources/banner/24fde0385461af47db2c45560709e731.jpg', '/2b/93/18/1e822e4dabd72328af949c7f8de4144b38296b44.jpg', 'public/images/2b/93/18/1e822e4dabd72328af949c7f8de4144b38296b44.jpg', '/f5/5b/c0/c342e554895cf5983c744691a7cc6da1c61e0950.jpg', 'public/images/f5/5b/c0/c342e554895cf5983c744691a7cc6da1c61e0950.jpg', '/8d/93/c4/30bd17d4f0b91c5286eebbc6f4996610688af861.jpg', 'public/images/8d/93/c4/30bd17d4f0b91c5286eebbc6f4996610688af861.jpg', 1204, 800, 'true', 1442456037);

-- --------------------------------------------------------

--
-- 表的结构 `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `age` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';

--
-- 转存表中的数据 `t_user`
--

INSERT INTO `t_user` (`id`, `username`, `age`, `address`) VALUES
(1, 'congxi', 0, '哈哈'),
(2, 'xi', 12, '哈哈哈');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `idx_full` (`image_id`,`url`,`s_url`,`m_url`,`l_url`,`last_modified`,`width`,`height`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
