/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : yuan

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-07-07 17:52:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for rt_admin
-- ----------------------------
DROP TABLE IF EXISTS `rt_admin`;
CREATE TABLE `rt_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `name` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `phone` bigint(11) DEFAULT NULL,
  `email` varchar(80) COLLATE utf8_bin DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT '0' COMMENT '状态 0-表示不显示  1-显示',
  `login_ip` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `login_time` int(10) DEFAULT NULL,
  `group_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of rt_admin
-- ----------------------------
INSERT INTO `rt_admin` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin', '1111111111', '11111111@qq.com', '1', '0.0.0.0', '1499394620', '2');
INSERT INTO `rt_admin` VALUES ('2', 'sss', 'e10adc3949ba59abbe56e057f20f883e', null, '12313123213', '123@qq.com', '0', '0.0.0.0', '1499246570', '4');
INSERT INTO `rt_admin` VALUES ('3', '张三', 'e10adc3949ba59abbe56e057f20f883e', null, '11111', '12312332@qq.com', '0', '0.0.0.0', '1499394452', '2');

-- ----------------------------
-- Table structure for rt_admin_group
-- ----------------------------
DROP TABLE IF EXISTS `rt_admin_group`;
CREATE TABLE `rt_admin_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `node` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rt_admin_group
-- ----------------------------
INSERT INTO `rt_admin_group` VALUES ('1', '编辑', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20');
INSERT INTO `rt_admin_group` VALUES ('2', '超级管理员', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,36,22,23,24,25,35,26,27,28,29,30,33,34');
INSERT INTO `rt_admin_group` VALUES ('4', '测试', '17,18,19,20,36,22,23,24,25,35');

-- ----------------------------
-- Table structure for rt_admin_rule
-- ----------------------------
DROP TABLE IF EXISTS `rt_admin_rule`;
CREATE TABLE `rt_admin_rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `level` int(10) DEFAULT NULL COMMENT '栏目级别',
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  `status` int(1) DEFAULT '0' COMMENT '0显示1隐藏',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rt_admin_rule
-- ----------------------------
INSERT INTO `rt_admin_rule` VALUES ('1', '0', 'site/img_type', '图片分类', '1', '0', '0', '1499235331');
INSERT INTO `rt_admin_rule` VALUES ('2', '1', 'site/add_imgtype', '添加图片分类', '2', '0', '0', null);
INSERT INTO `rt_admin_rule` VALUES ('3', '1', 'site/edit_imgtype', '修改图片分类', '2', '0', '1', '1499234135');
INSERT INTO `rt_admin_rule` VALUES ('4', '1', 'site/del_imgtype', '删除图片分类', '2', '0', '1', '1499234327');
INSERT INTO `rt_admin_rule` VALUES ('5', '0', 'site/index', '轮播图', '1', '0', '0', null);
INSERT INTO `rt_admin_rule` VALUES ('6', '5', 'site/add_banner', '添加轮播图', '2', '0', '0', null);
INSERT INTO `rt_admin_rule` VALUES ('7', '5', 'site/edit_banner', '修改轮播图', '2', '0', '1', '1499234364');
INSERT INTO `rt_admin_rule` VALUES ('8', '5', 'site/del_banner', '删除轮播图', '2', '0', '1', '1499234372');
INSERT INTO `rt_admin_rule` VALUES ('9', '0', 'article/menu', '栏目管理', '1', '0', '0', null);
INSERT INTO `rt_admin_rule` VALUES ('10', '9', 'article/add_menu', '添加栏目', '2', '0', '0', null);
INSERT INTO `rt_admin_rule` VALUES ('11', '9', 'article/edit_menu', '修改栏目', '2', '0', '1', '1499234379');
INSERT INTO `rt_admin_rule` VALUES ('12', '9', 'article/del_menu', '删除栏目', '2', '0', '1', '1499234387');
INSERT INTO `rt_admin_rule` VALUES ('13', '0', 'article/index', '文章', '1', '0', '0', null);
INSERT INTO `rt_admin_rule` VALUES ('14', '13', 'article/add_article', '添加文章', '2', '0', '0', null);
INSERT INTO `rt_admin_rule` VALUES ('15', '13', 'article/edit_article', '修改文章', '2', '0', '1', '1499234397');
INSERT INTO `rt_admin_rule` VALUES ('16', '13', 'article/del_article', '删除文章', '2', '0', '1', '1499234403');
INSERT INTO `rt_admin_rule` VALUES ('17', '0', 'user/index', '管理员管理', '1', '0', '0', null);
INSERT INTO `rt_admin_rule` VALUES ('18', '17', 'user/add_user', '添加管理员', '2', '1', '0', '1499399250');
INSERT INTO `rt_admin_rule` VALUES ('19', '17', 'user/edit_user', '修改管理员', '2', '0', '1', '1499234410');
INSERT INTO `rt_admin_rule` VALUES ('20', '17', 'user/del_user', '删除管理员', '2', '0', '1', '1499234417');
INSERT INTO `rt_admin_rule` VALUES ('22', '0', 'group/index1', '角色管理', '1', '0', '0', '1499235420');
INSERT INTO `rt_admin_rule` VALUES ('23', '22', 'group/add_group', '添加角色', '2', '1', '0', '1499399231');
INSERT INTO `rt_admin_rule` VALUES ('24', '22', 'group/edit_group', '修改角色', '2', '0', '1', '1499234427');
INSERT INTO `rt_admin_rule` VALUES ('25', '22', 'group/del_group', '删除角色', '2', '0', '1', '1499234433');
INSERT INTO `rt_admin_rule` VALUES ('26', '0', 'site/guestbook', '在线留言', '1', '0', '1', '1499238063');
INSERT INTO `rt_admin_rule` VALUES ('27', '26', 'site/del_book', '删除留言', '2', '0', '1', '1499234448');
INSERT INTO `rt_admin_rule` VALUES ('28', '0', 'menu/index', '后台菜单', '1', '0', '0', null);
INSERT INTO `rt_admin_rule` VALUES ('29', '28', 'menu/m_list', '菜单列表', '2', '0', '0', null);
INSERT INTO `rt_admin_rule` VALUES ('30', '28', 'menu/m_add', '添加菜单', '2', '0', '0', null);
INSERT INTO `rt_admin_rule` VALUES ('33', '28', 'menu/m_del', '删除菜单', '2', '3', '1', '1499234457');
INSERT INTO `rt_admin_rule` VALUES ('34', '28', 'menu/m_edit', '修改菜单', '2', '4', '1', '1499234462');
INSERT INTO `rt_admin_rule` VALUES ('35', '22', 'group/g_list', '角色列表', '2', '0', '0', '1499235828');
INSERT INTO `rt_admin_rule` VALUES ('36', '17', 'user/u_list', '管理员列表', '2', '0', '0', '1499241447');

-- ----------------------------
-- Table structure for rt_article
-- ----------------------------
DROP TABLE IF EXISTS `rt_article`;
CREATE TABLE `rt_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(10) DEFAULT NULL COMMENT '所属栏目',
  `title` varchar(255) DEFAULT NULL COMMENT '文章标题',
  `author` varchar(50) DEFAULT NULL COMMENT '文章作者',
  `content` text COMMENT '文章内容',
  `status` tinyint(2) DEFAULT NULL COMMENT '状态(1显示2隐藏)',
  `recommend` tinyint(2) DEFAULT NULL COMMENT '是否推荐(1推荐2不推荐)',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '修改时间',
  `meta_title` varchar(200) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rt_article
-- ----------------------------
INSERT INTO `rt_article` VALUES ('1', '12', '宝强', 'admin', '&lt;p&gt;8月26日，王宝强更新微博，晒出和刘国梁王楠等人合照，配文称：“奥运精神，兄弟之情，举杯同庆，其乐融融。”&lt;/p&gt;', '1', '1', '1472400000', '1472460570', null, null, null);

-- ----------------------------
-- Table structure for rt_banner
-- ----------------------------
DROP TABLE IF EXISTS `rt_banner`;
CREATE TABLE `rt_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(10) DEFAULT NULL,
  `url` varchar(255) NOT NULL COMMENT '链接',
  `img` varchar(255) NOT NULL COMMENT '图片地址',
  `sort` tinyint(11) NOT NULL COMMENT '排序',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rt_banner
-- ----------------------------
INSERT INTO `rt_banner` VALUES ('5', '10', '1231232112', '2016-08-29/57c3ea85032fa.jpg', '123', '1472460686');

-- ----------------------------
-- Table structure for rt_guestbook
-- ----------------------------
DROP TABLE IF EXISTS `rt_guestbook`;
CREATE TABLE `rt_guestbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rt_guestbook
-- ----------------------------
INSERT INTO `rt_guestbook` VALUES ('1', 'ye', '18376315694', 'fsdfd@qq.com', 'dsfjnfslafxcv15', '456252351', '1');

-- ----------------------------
-- Table structure for rt_imgtype
-- ----------------------------
DROP TABLE IF EXISTS `rt_imgtype`;
CREATE TABLE `rt_imgtype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL COMMENT '父级id',
  `name` varchar(200) DEFAULT NULL COMMENT '栏目名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rt_imgtype
-- ----------------------------
INSERT INTO `rt_imgtype` VALUES ('10', '0', '首页轮播图');

-- ----------------------------
-- Table structure for rt_job
-- ----------------------------
DROP TABLE IF EXISTS `rt_job`;
CREATE TABLE `rt_job` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ico` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `title` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `describe` text COLLATE utf8_bin,
  `require` text COLLATE utf8_bin,
  `salary` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `promote` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `welfare` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT '0' COMMENT '状态 0-表示不显示  1-显示',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `create_time` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of rt_job
-- ----------------------------
INSERT INTO `rt_job` VALUES ('2', '20131129/52984f0421e7b.png', '网络推广员', 0x31E38081E7BD91E7BB9CE696B9E5BC8FE68EA8E5B9BFE4B89AE58AA1E5928CE99480E594AEE585ACE58FB8E4BAA7E59381200D0A32E38081E4BDBFE794A8E697BAE697BAE380815151E59091E5AEA2E688B7E4BB8BE7BB8DE585ACE58FB8E4B89AE58AA1EFBC8CE4B8BAE5AEA2E688B7E58A9EE79086E4B89AE58AA1E380820D0A33E38081E8B49FE8B4A3E4BAA7E59381E99480E594AEE38081E7BD91E7BB9CE68EA8E5B9BFE38081E4B8BAE9A1BEE5AEA2E59CA8E7BD91E4B88AE8A7A3E7AD94E997AEE9A2980D0A, 0x31E38081E4B8ADE4B893E4BBA5E4B88AE5ADA6E58E86EFBC8CE883BDE7869FE7BB83E58F8AE995BFE697B6E997B4E4BDBFE794A8E794B5E88491EFBC88E5A682EFBC9A71712CE697BAE697BAEFBC890D0A32E38081E59684E4BA8EE4BABAE4BAA4E6B581E38081E6B29FE9809AEFBC8CE4BA8BE4B89AE5BF83E5BCBA2E0D0A33E38081E585B7E69C89E889AFE5A5BDE79A84E88081E794A8E688B7E7BBB4E68AA4E883BDE58A9B0D0A34E38081E69C89E99480E594AEE7BB8FE9AA8CE88085E4BC98E585880D0A, '1500', '暂无', ',周末双休 提供住房  待遇：底薪+提成 +奖金 收入在1800-2500元左右，最高无上限。 工资待遇好,环境舒适宽阔。', '1', '2013-11-30', '2013-12-30', '1385707448');
INSERT INTO `rt_job` VALUES ('3', '20131129/52984ef46691d.png', 'ASP、asp.net，jsp开发程序员', 0x312EE4B8BBE8A681E8B49FE8B4A3E585ACE58FB8E7BD91E7AB99E9A1B9E79BAEE7A88BE5BA8FE5BC80E58F91E4B88EE7BBB4E68AA4EFBC8C0D0A322EE8B49FE8B4A3E9A1B9E79BAEE79A84E58886E69E90E38081E8AEBEE8AEA1E38081E7BC96E7A081E38081E6B58BE8AF95E7AD89E5B7A5E4BD9C0D0A, null, '3000', '暂无', '养老保险 周末双休 提供住房  1、帮解决租房问题，交通费按公车标准报销 2、双休 3、养老保险、医疗保险', '1', '2013-11-30', '2013-12-30', '1385707521');
INSERT INTO `rt_job` VALUES ('4', '20131129/52984ea898292.png', '财务会计', 0xE8B49FE8B4A3E585ACE58FB8E79A84E8B4A6E58AA1, 0xE4B8A5E6A0BCE68A8AE585B3E8B4A6E58AA1EFBC8CE5819AE588B0E6AF8FE4B880E7AC94E4B88DE98197E6BC8FEFBC8CE69C89E587ADE68DAEE380820D0A, '1500', '暂无', '养老保险 周末双休 提供住房  1 ，双休 2 ，提供租房补贴以及车费报销 3， 养老与医疗', '1', '2013-11-30', '2013-12-30', '1385707588');
INSERT INTO `rt_job` VALUES ('5', '20131129/52984ecf8145c.png', '网站项目总监/网站架构师', 0xE8B49FE8B4A3E9A1B9E79BAEE4BFA1E681AFE694B6E99B86E38081E695B4E79086EFBC8CE4B9A6E58699E7BD91E7AB99E9A1B9E79BAEE8AEA1E58892E4B9A6E38081E7BB93E69E84E6A186E69EB6E588B6E5AE9AE38081E5BC80E58F91E8BF9BE5BAA6E79B91E79DA3E7AEA1E79086E38082, 0x31EFBC8CE69C89E8B685E8BF8732E5B9B4E79A84E7BD91E7AB99E5BC80E58F91E7BB8FE9AA8CEFBC8CE7869FE68289E4B880E7A78DE5BC80E58F91E8AFADE8A880E380820D0A32EFBC8C20E69C89E4B9A6E58699E9A1B9E79BAEE8AEA1E58892E4B9A6E38081E7BB93E69E84E6A186E69EB6E69687E4BBB6E79A84E7BB8FE9AA8CE380820D0A33EFBC8C20E69C89E68A8AE68FA1E695B4E4B8AAE5BC80E58F91E8BF9BE5BAA6E4BBA5E58F8AE9A1B9E79BAEE79BB8E585B3E4BABAE59198E88083E6A0B8E7AEA1E79086E7BB8FE9AA8CE380820D0A, '3500', '暂无', '养老保险 周末双休 提供住房  1、帮解决租房问题，交通费按公车费标准全部报销 2、双休 3、养老保险、医疗保险。', '1', '2013-11-30', '2013-12-30', '1385707642');
INSERT INTO `rt_job` VALUES ('6', '20131129/52984ee1406c3.png', '中级网站美工设计人员', 0x312EE4B8BBE8A681E8B49FE8B4A3E585ACE58FB8E4BAA7E59381E7BD91E9A1B5E585A8E5A597E7BE8EE5B7A5E8AEBEE8AEA1EFBC88E9A1B5E99DA2E695B4E4BD93E5BDA2E8B1A1E8AEBEE8AEA1E69BB4E696B0E38081E59381E7898CE5BDA2E8B1A1E68993E980A0E38081E59586E59381E68F8FE8BFB0E7BE8EE58C96E38081E4BF83E99480E6B4BBE58AA8E5B9B3E99DA2E5889BE6848FEFBC9BEFBC890D0A322EE4B8BBE8A681E8B49FE8B4A3E585ACE58FB8E7AB99E58685E7BD91E9A1B5E38081E5B9BFE5918AE38081E59BBEE6A087E38081E68E92E78988E7AD89E79A84E8AEBEE8AEA1E4BFAEE694B9E5928CE7BBB4E68AA4EFBC9B0D0A332EE4B8BBE8A681E8B49FE8B4A3E4BC98E58C96E7BD91E7AB99E7958CE99DA2E8AEBEE8AEA1EFBC8CE883BDE79086E8A7A3E5B9B6E59684E4BA8EE8A1A8E78EB0E58685E5AEB9E8A681E4BCA0E8BEBEE79A84E79086E5BFB5EFBC8CE4B8B0E5AF8CE7BD91E7AB99E58685E5AEB9E38082, 0x312EE585B7E69C89E8BE83E5A5BDE79A84E889B2E5BDA9E690ADE9858DE883BDE58A9BEFBC8CE883BDE7869FE7BB83E8BF90E794A8E59BBEE78987E5A484E79086E5B7A5E585B7EFBC8870686F746F73686F70E6889666697265776F726BE7AD89EFBC89E588B6E4BD9CE69588E69E9CE59BBEEFBC9B0D0A322EE7869FE68289E68E8CE68FA148544D4CE4BBA3E7A081EFBC8CE7B2BEE9809A4449562B435353E5B883E5B180E68A80E69CAFE380820D0A332EE69C89E7BD91E9A1B5E8AEBEE8AEA1E588B6E4BD9CE7BB8FE9AA8CE58F8AE5B9B3E99DA2E8AEBEE8AEA1E59FBAE7A180E380820D0A342E2032E5B9B4E4BBA5E4B88AE79A84E7BD91E7AB99E7BE8EE5B7A5E8AEBEE8AEA1E5B7A5E4BD9CE7BB8FE9AA8CE380820D0A, '2500', '暂无', '养老保险 周末双休 提供住房  1、帮解决租房问题，交通费按公车费标准全部报销 2、双休 3、养老保险、医疗保险。', '1', '2013-11-30', '2013-12-30', '1385707690');

-- ----------------------------
-- Table structure for rt_menu
-- ----------------------------
DROP TABLE IF EXISTS `rt_menu`;
CREATE TABLE `rt_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL COMMENT '父级id',
  `name` varchar(200) DEFAULT NULL COMMENT '栏目名称',
  `single_page` tinyint(10) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rt_menu
-- ----------------------------
INSERT INTO `rt_menu` VALUES ('1', '0', '新闻中心', '2', null);
INSERT INTO `rt_menu` VALUES ('10', '0', '联系我们', '1', '&lt;p&gt;12321312312&lt;/p&gt;');
INSERT INTO `rt_menu` VALUES ('12', '1', '娱乐新闻', '2', '');
