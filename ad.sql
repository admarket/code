-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 05 月 18 日 12:58
-- 服务器版本: 5.5.24-log
-- PHP 版本: 5.3.13

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

--
-- 转存表中的数据 `advertise`
--

INSERT INTO `advertise` (`id`, `project`, `title`, `content`, `format`, `width`, `height`, `price`, `profit`, `state`, `saleUrl`) VALUES
(2, 1, '首页左侧顶部广告', '首页左侧顶部LOGO旁边的图片为', 1, 22, 100, 3000.3, 300, 1, ''),
(3, 2, '首页左侧顶部', '位于首页左侧顶部LOGO旁边', 1, 150, 100, 350, 10, 0, ''),
(13, 1, '下边栏广告', '下边栏广告，导航栏左侧', 1, 300, 200, 120, 0, 0, ''),
(24, 2, '首页LOGO旁边', '黄金广告位，点击率和展示高', 1, 200, 100, 300, 600, 1, ''),
(25, 15, '测试1', '测试1', 1, 200, 200, 180, 180, 1, ''),
(26, 16, '测试', '1', 1, 1, 1, 1, 100, 1, ''),
(27, 1, '次奥测试', '的的说法', 1, 2, 2, 2, 20, 0, ''),
(28, 1, '是打发的说法', '2', 1, 2, 2, 2, 55, 0, ''),
(29, 1, '3', '3', 1, 3, 3, 3, 65, 0, ''),
(30, 1, '4', '4', 1, 4, 4, 4, 32, 0, ''),
(31, 1, '5', '5', 1, 5, 5, 5, 0, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, '新闻门户'),
(2, '游戏娱乐'),
(3, '社区论坛'),
(4, '博客空间'),
(5, '视频音乐'),
(6, '查询搜索'),
(7, '资源下载'),
(8, '网盘空间'),
(9, '小说文学'),
(10, '应用平台'),
(20, '其他类别');

-- --------------------------------------------------------

--
-- 表的结构 `finance`
--

CREATE TABLE IF NOT EXISTS `finance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `number` double NOT NULL DEFAULT '0',
  `balance` double NOT NULL DEFAULT '0',
  `remark` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='财务记录表' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `finance`
--

INSERT INTO `finance` (`id`, `user_id`, `type`, `number`, `balance`, `remark`, `time`) VALUES
(1, 10, 0, 750, 750, '交易编号：#2234', '2013-05-05 07:38:03'),
(2, 10, 1, 250, 500, '交易编号：#2 提现', '2013-05-05 07:48:08'),
(3, 10, 0, 500, 1000, '广告收入 广告编号：12', '2013-05-05 07:55:44'),
(4, 10, 0, 1000, 2000, '广告收入 广告编号：13', '2013-05-05 08:48:21'),
(5, 10, 1, 1000, 1000, '提现 交易编号：#0000', '2013-05-05 08:48:53');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `project`
--

INSERT INTO `project` (`id`, `name`, `url`, `description`, `logo`, `category`, `owner`, `verify`) VALUES
(1, '站酷', 'http://www.zcool.com.cn', '中国最具人气的大型综合性设计网站，聚集了中国绝大部分的专业设计师、艺术院校师生、潮流艺术家等年轻创意人群，是国内最活跃的原创设计交流平台。会员交流涉及：艺术创作、广告创意、交互设计、影视动漫、时尚文化等诸多创意产业', '1.png', 1, 10, 0),
(2, '模板王', 'http://www.mobanwang.com/', '提供网页模板，网页图标，网页特效，中文字体等网页设计素材下载，为广大网友制作网页提供网站模板素材免费下载参考。', '2.png', 7, 10, 0),
(15, '新测试', 'http://www.baidu.com', '士大夫士大夫', '15.jpg', 1, 10, 0),
(16, '测试', 'http://www.baidu.com', '测试', '16.jpg', 1, 10, 0);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `type`, `payment`, `account`, `balance`, `headimg`, `time`, `verify`) VALUES
(1, '张三丰', 'zhangsanfeng@mail.com', '123456', 0, 0, 'zhangsanfeng@mail.com', 12.03, 'default.jpg', '2013-04-28 16:00:00', 0),
(10, '任宝占', 'winter_2000@126.com', '111111', 0, 0, 'winter_2000@126.com', 1000, '10.jpg', '2013-05-03 14:52:08', 1),
(11, 'dfdsfs', 'sdfsf@m.com', '111111', 0, 0, 'dsfsdfds', 0, 'default.jpg', '2013-05-14 11:50:23', 0);

CREATE TABLE if not exists recharge_info
(id bigint primary key AUTO_INCREMENT comment '充值编号',
user_id bigint not null comment '充值人编号',
cash bigint not null comment '充值金额，以分为单位',
r_status tinyint not null comment '记录状态',
gmt_create TIMESTAMP comment '创建时间',
gmt_modified TIMESTAMP comment '最后修改时间'
)ENGINE=INNODB DEFAULT CHARSET=utf8

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
