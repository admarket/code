-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主机: admarket.mysql.rds.aliyuncs.com:3306
-- 生成日期: 2013 年 10 月 09 日 21:16
-- 服务器版本: 5.5.18-Alibaba-3935-log
-- PHP 版本: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `eadmarket`
--

-- --------------------------------------------------------

--
-- 表的结构 `advertise`
--

CREATE TABLE IF NOT EXISTS `advertise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `format` tinyint(4) NOT NULL DEFAULT '0',
  `width` int(11) NOT NULL DEFAULT '0',
  `height` int(11) NOT NULL DEFAULT '0',
  `price` double NOT NULL DEFAULT '0',
  `profit` double NOT NULL DEFAULT '0',
  `state` tinyint(4) NOT NULL DEFAULT '0',
  `saleUrl` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `process` tinyint(4) NOT NULL DEFAULT '0',
  `verify` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

-- --------------------------------------------------------

--
-- 表的结构 `cash`
--

CREATE TABLE IF NOT EXISTS `cash` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `user` int(11) NOT NULL COMMENT '提现用户',
  `amount` int(11) NOT NULL DEFAULT '0' COMMENT '提现金额',
  `state` int(11) NOT NULL DEFAULT '0' COMMENT '提现状态',
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '申请时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='提现申请表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `cash`
--

INSERT INTO `cash` (`id`, `user`, `amount`, `state`, `createtime`) VALUES
(1, 12, 13, 0, '2013-10-09 13:12:05');

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`id`, `name`, `type`) VALUES
(1, '所有分类', 1),
(2, '新闻门户', 1),
(3, '社区论坛', 1),
(4, '博客空间', 1),
(5, '视频音乐', 1),
(6, '查询搜索', 1),
(7, '资源下载', 1),
(8, '网盘空间', 1),
(9, '小说文学', 1),
(10, '应用平台', 1),
(20, '游戏娱乐', 1),
(21, '其他类别', 1);

-- --------------------------------------------------------

--
-- 表的结构 `finance`
--

CREATE TABLE IF NOT EXISTS `finance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `type` varchar(4) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `number` double NOT NULL DEFAULT '0',
  `balance` double NOT NULL DEFAULT '0',
  `remark` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='财务记录表' AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `finance`
--

INSERT INTO `finance` (`id`, `user_id`, `type`, `number`, `balance`, `remark`, `time`) VALUES
(1, 10, '00', 750, 750, '交易编号：#2234', '2013-05-05 07:38:03'),
(2, 10, '11', 250, 500, '交易编号：#2 提现', '2013-05-05 07:48:08'),
(3, 10, '00', 500, 1000, '广告收入 广告编号：12', '2013-05-05 07:55:44'),
(4, 10, '00', 1000, 2000, '广告收入 广告编号：13', '2013-05-05 08:48:21'),
(5, 10, '11', 1000, 1000, '提现 交易编号：#0000', '2013-05-05 08:48:53'),
(6, 10, '10', 720, 268, '广告收入。交易编号：#6', '2013-06-29 12:39:05'),
(7, 10, '10', 5, 263, '广告收入。交易编号：#7', '2013-06-29 12:41:51'),
(8, 10, '10', 4, 259, '广告收入。交易编号：#8', '2013-06-29 12:42:10');

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL DEFAULT '0',
  `receiver` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `state` tinyint(4) NOT NULL DEFAULT '0',
  `type` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`id`, `sender`, `receiver`, `title`, `content`, `time`, `state`, `type`) VALUES
(1, 0, 10, '测试1', '测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容', '2013-06-17 13:55:37', 1, 2),
(2, 0, 10, '测试', '测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容', '2013-06-17 13:55:37', 1, 1),
(3, 0, 10, '测试', '测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容', '2013-06-17 13:55:37', 1, 1),
(4, 0, 10, '测试', '测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容', '2013-06-17 13:55:37', 1, 2),
(5, 0, 10, '测试', '测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容', '2013-06-17 13:55:37', 1, 3),
(6, 0, 10, '测试', '测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容', '2013-06-17 13:55:37', 0, 1),
(7, 0, 10, '测试', '测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容', '2013-06-17 13:55:37', 1, 3),
(8, 0, 10, '测试', '测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容', '2013-06-17 13:55:37', 1, 2),
(9, 0, 10, '测试', '测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容', '2013-06-17 13:55:37', 1, 1),
(10, 0, 10, '测试10', '测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容测试内容', '2013-06-17 13:55:37', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `impression` int(11) NOT NULL,
  `click` int(11) NOT NULL,
  `format` int(11) NOT NULL,
  `owner` int(11) NOT NULL,
  `shown` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `txt` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '默认广告内容',
  `image` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `video` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.swf',
  `fee` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `product`
--

INSERT INTO `product` (`id`, `name`, `url`, `impression`, `click`, `format`, `owner`, `shown`, `txt`, `image`, `video`, `fee`) VALUES
(3, '三五互联主机', 'http://www.baidu.com', 1355, 188, 0, 10, '3.png', '默认广告内容', 'default.jpg', 'default.swf', 3092),
(4, '广告非常', 'http://www.baidu.com', 0, 0, 0, 10, '4.png', '默认广告内容', 'default.jpg', 'default.swf', 0);

-- --------------------------------------------------------

--
-- 表的结构 `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0.png',
  `category` int(11) NOT NULL,
  `owner` int(11) NOT NULL,
  `verify` int(11) NOT NULL DEFAULT '0',
  `alexa` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

-- --------------------------------------------------------

--
-- 表的结构 `recharge_info`
--

CREATE TABLE IF NOT EXISTS `recharge_info` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '充值编号',
  `user_id` bigint(20) NOT NULL COMMENT '充值人编号',
  `cash` bigint(20) NOT NULL COMMENT '充值金额，以分为单位',
  `r_status` tinyint(4) NOT NULL COMMENT '记录状态',
  `gmt_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `gmt_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '最后修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `recharge_info`
--

INSERT INTO `recharge_info` (`id`, `user_id`, `cash`, `r_status`, `gmt_create`, `gmt_modified`) VALUES
(1, 10, 300000, 1, '2013-05-19 09:20:51', '2013-05-19 09:20:51'),
(2, 10, 300000, 1, '2013-05-19 09:25:51', '2013-05-19 09:25:51'),
(3, 10, 300000, 1, '2013-05-19 09:26:07', '2013-05-19 09:26:07');

-- --------------------------------------------------------

--
-- 表的结构 `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `advertise` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `trade` int(11) NOT NULL DEFAULT '0',
  `impression` int(11) NOT NULL DEFAULT '1',
  `click` int(11) NOT NULL DEFAULT '0',
  `buyer` int(11) NOT NULL,
  `seller` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- 表的结构 `trade`
--

CREATE TABLE IF NOT EXISTS `trade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` int(11) NOT NULL,
  `advertise` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `number` int(11) NOT NULL DEFAULT '0',
  `startTime` datetime NOT NULL,
  `endTime` datetime NOT NULL,
  `process` tinyint(4) NOT NULL,
  `state` tinyint(4) NOT NULL DEFAULT '0',
  `buyer` int(11) NOT NULL,
  `seller` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- 表的结构 `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
(1, '网站');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mobilephone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` smallint(6) NOT NULL DEFAULT '0',
  `payment` smallint(6) NOT NULL DEFAULT '0',
  `account` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `balance` double NOT NULL DEFAULT '0',
  `headimg` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `verify` tinyint(1) NOT NULL DEFAULT '0',
  `score` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `mobilephone`, `password`, `type`, `payment`, `account`, `balance`, `headimg`, `time`, `verify`, `score`) VALUES
(12, '任宝占', 'winter_2000@126.com', '13840266147', '96e79218965eb72c92a549dd5a330112', 0, 0, 'winter_2000@126.com', 100, '12.jpg', '2013-10-09 12:53:26', 0, 0),
(13, '史文锋', '576373455@qq.com', '18610313843', '9de5548f36a56f455e708ab233a0a1a7', 0, 0, 'swfyinshen', 0, 'default.jpg', '2013-10-09 13:04:51', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
