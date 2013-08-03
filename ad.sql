-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 06 月 30 日 12:20
-- 服务器版本: 5.5.24-log
-- PHP 版本: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `ad`
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

--
-- 转存表中的数据 `advertise`
--

INSERT INTO `advertise` (`id`, `project`, `title`, `content`, `format`, `width`, `height`, `price`, `profit`, `state`, `saleUrl`, `process`, `verify`) VALUES
(2, 1, '首页左侧顶部广告', '首页左侧顶部LOGO旁边的图片为', 1, 22, 100, 3000.3, 300, 1, '', 50, 1),
(3, 2, '首页左侧顶部', '位于首页左侧顶部LOGO旁边', 2, 150, 100, 3500, 10, 0, '', 0, 0),
(13, 1, '下边栏广告', '下边栏广告，导航栏左侧', 1, 300, 200, 120, 0, 1, '', 0, 0),
(24, 2, '首页LOGO旁边', '黄金广告位，点击率和展示高', 1, 200, 100, 3000, 600, 1, '', 40, 1),
(25, 15, '测试1', '测试1', 1, 200, 200, 180, 180, 1, '', 70, 1),
(26, 16, '测试', '1', 1, 1, 1, 1, 100, 1, '', 60, 1),
(27, 1, '次奥测试', '的的说法', 1, 2, 2, 2, 20, 1, '', 0, 0),
(28, 1, '是打发的说法', '2', 1, 2, 200, 2, 55, 0, '', 0, 0),
(29, 1, '3', '3', 1, 3, 3, 3, 65, 0, '', 0, 0),
(30, 1, '4', '4', 1, 4, 4, 4, 32, 1, '', 0, 0),
(31, 1, '5', '5', 1, 5, 5, 5, 0, 1, '', 0, 0),
(32, 18, '测试', '测试的没啥好说的', 1, 222, 222, 222, 0, 0, '', 0, 0);

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
  `fee` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `product`
--

INSERT INTO `product` (`id`, `name`, `url`, `impression`, `click`, `format`, `owner`, `shown`, `fee`) VALUES
(3, '三五互联主机', 'http://www.baidu.com', 1355, 188, 0, 10, '3.png', 3092),
(4, '广告非常', 'http://www.baidu.com', 0, 0, 0, 10, '4.png', 0);

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

--
-- 转存表中的数据 `project`
--

INSERT INTO `project` (`id`, `name`, `url`, `description`, `logo`, `category`, `owner`, `verify`, `alexa`, `type`) VALUES
(1, '测试测试1', 'http://www.zcool.com.cn', '中国最具人气的大型综合性设计网站，聚集了中国绝大部分的专业设计师、艺术院校师生、潮流艺术家等年轻创意人群，是国内最活跃的原创设计交流平台。会员交流涉及：艺术创作、广告创意、交互设计、影视动漫、时尚文化等诸多创意产业', '1.png', 1, 1, 0, 100000, 1),
(2, '模板王', 'http://www.mobanwang.com/', '提供网页模板，网页图标，网页特效，中文字体等网页设计素材下载，为广大网友制作网页提供网站模板素材免费下载参考。', '2.jpg', 7, 10, 0, 1000232, 1),
(15, '新测试', 'http://www.baidu.com', '士大夫士大夫', '8.jpg', 1, 10, 0, 2042223, 1),
(16, '测试', 'http://www.baidu.com', '测试', '6.png', 1, 1, 0, 1922253, 1),
(17, '都是', 'http://www.baidu.com', '短发多发点梵蒂冈地方', '17.png', 1, 10, 0, 100, 1),
(18, '站酷', 'http://www.zcool.com.cn', '中国最具人气的大型综合性设计网站，聚集了中国绝大部分的专业设计师、艺术院校师生、潮流艺术家等年轻创意人群，是国内最活跃的原创设计交流平台。会员交流涉及：艺术创作、广告创意、交互设计、影视动漫、时尚文化等诸多创意产业', '1.png', 1, 10, 0, 100, 1),
(19, '新测试', 'http://www.baidu.com', '士大夫士大夫', '9.jpg', 2, 10, 0, 2042223, 1),
(20, '新测试', 'http://www.baidu.com', '士大夫士大夫', '9.jpg', 1, 1, 0, 5, 1),
(21, '站酷', 'http://www.zcool.com.cn', '中国最具人气的大型综合性设计网站，聚集了中国绝大部分的专业设计师、艺术院校师生、潮流艺术家等年轻创意人群，是国内最活跃的原创设计交流平台。会员交流涉及：艺术创作、广告创意、交互设计、影视动漫、时尚文化等诸多创意产业', '1.png', 2, 10, 0, 100, 1),
(24, '站酷', 'http://www.zcool.com.cn', '中国最具人气的大型综合性设计网站，聚集了中国绝大部分的专业设计师、艺术院校师生、潮流艺术家等年轻创意人群，是国内最活跃的原创设计交流平台。会员交流涉及：艺术创作、广告创意、交互设计、影视动漫、时尚文化等诸多创意产业', '1.png', 3, 10, 0, 6427, 1),
(26, '站酷', 'http://www.zcool.com.cn', '中国最具人气的大型综合性设计网站，聚集了中国绝大部分的专业设计师、艺术院校师生、潮流艺术家等年轻创意人群，是国内最活跃的原创设计交流平台。会员交流涉及：艺术创作、广告创意、交互设计、影视动漫、时尚文化等诸多创意产业', '1.png', 1, 1, 0, 754894, 1),
(27, '站酷', 'http://www.zcool.com.cn', '中国最具人气的大型综合性设计网站，聚集了中国绝大部分的专业设计师、艺术院校师生、潮流艺术家等年轻创意人群，是国内最活跃的原创设计交流平台。会员交流涉及：艺术创作、广告创意、交互设计、影视动漫、时尚文化等诸多创意产业', '1.png', 1, 10, 0, 100000, 1);

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

--
-- 转存表中的数据 `report`
--

INSERT INTO `report` (`id`, `advertise`, `product`, `trade`, `impression`, `click`, `buyer`, `seller`, `date`, `ip`) VALUES
(1, 2, 3, 1, 1, 0, 10, 1, '2013-06-01 01:37:41', '210.72.132.162'),
(2, 3, 3, 2, 1, 0, 10, 1, '2013-06-02 03:10:34', '10.11.33.11'),
(3, 2, 3, 1, 1, 1, 10, 1, '2013-06-10 11:49:22', '192.168.1.1'),
(4, 2, 3, 1, 1, 0, 10, 1, '2013-06-13 22:26:14', '23.197.22.123'),
(6, 2, 2, 0, 1, 1, 10, 1, '2013-06-14 14:00:58', '144.22.134.175'),
(7, 2, 3, 1, 1, 0, 10, 1, '2013-05-13 16:00:00', '144.22.134.175'),
(8, 2, 3, 1, 1, 0, 10, 1, '2013-05-13 16:00:00', '23.197.22.123'),
(9, 3, 3, 2, 1, 0, 10, 1, '2013-06-15 03:10:34', '10.11.33.11'),
(10, 3, 3, 2, 1, 1, 10, 1, '2013-06-16 03:10:34', '10.11.33.11'),
(11, 3, 3, 2, 1, 0, 10, 1, '2013-06-19 03:10:34', '10.11.33.11'),
(12, 2, 3, 1, 10, 0, 10, 1, '2013-06-15 06:22:13', '144.22.134.175');

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

--
-- 转存表中的数据 `trade`
--

INSERT INTO `trade` (`id`, `product`, `advertise`, `price`, `number`, `startTime`, `endTime`, `process`, `state`, `buyer`, `seller`) VALUES
(1, 3, 2, 3000, 4, '2013-05-10 00:00:00', '2013-09-10 00:00:00', 20, 0, 10, 1),
(2, 3, 3, 1800, 1, '2013-05-01 00:00:00', '2013-06-01 00:00:00', 90, 1, 10, 1),
(3, 3, 13, 120, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 10, 1),
(4, 4, 27, 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 10, 1),
(5, 3, 27, 2, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 10, 1),
(6, 4, 13, 120, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 10, 1),
(7, 3, 31, 5, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 10, 1),
(8, 3, 30, 4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 10, 1);

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
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL DEFAULT '0',
  `payment` smallint(6) NOT NULL DEFAULT '0',
  `account` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `balance` double NOT NULL DEFAULT '0',
  `headimg` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `verify` tinyint(1) NOT NULL DEFAULT '0',
  `score` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

alter table user modify column password varchar(60);
--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `type`, `payment`, `account`, `balance`, `headimg`, `time`, `verify`, `score`) VALUES
(0, '系统', 'system@jiuweihu.com', '$2a$08$3vmoSWYzP0w4WHLQTfE.BuYO5OgowprHOoHPWg.nL187CzswsTW9m', 0, 0, '', 0, 'system.jpg', '2013-06-17 14:32:11', 0, 0),
(1, '张三丰', 'zhangsanfeng@mail.com', '$2a$08$3vmoSWYzP0w4WHLQTfE.BuYO5OgowprHOoHPWg.nL187CzswsTW9m', 1, 0, 'zhangsanfeng@mail.com', 12.03, 'default.jpg', '2013-04-28 16:00:00', 0, 0),
(10, '任宝占', 'winter_2000@126.com', '$2a$08$PzWaGmkALRxX0zKOCbHDCe7PtGJlT018BoZkMZKW7v2nVQKuIqbcW', 0, 0, 'winter_2000@126.com', 259, '10.jpg', '2013-05-03 14:52:08', 1, 0),
(11, 'dfdsfs', 'test@test.com', '$2a$08$PzWaGmkALRxX0zKOCbHDCe7PtGJlT018BoZkMZKW7v2nVQKuIqbcW', 1, 0, 'dsfsdfds', 0, 'default.jpg', '2013-05-14 11:50:23', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
