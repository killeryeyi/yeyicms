/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : 127.0.0.1:3306
Source Database       : yeyicms

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-09-23 13:36:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for rt_admin
-- ----------------------------
DROP TABLE IF EXISTS `rt_admin`;
CREATE TABLE `rt_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_bin DEFAULT NULL COMMENT '登陆账号',
  `password` varchar(50) COLLATE utf8_bin DEFAULT NULL COMMENT '登陆密码',
  `name` varchar(10) COLLATE utf8_bin DEFAULT NULL COMMENT '注册人姓名',
  `phone` bigint(11) DEFAULT NULL COMMENT '手机号',
  `email` varchar(80) COLLATE utf8_bin DEFAULT NULL,
  `reg_number` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '注册号码',
  `company` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `company_en` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `nature` varchar(50) COLLATE utf8_bin DEFAULT NULL COMMENT '公司性质',
  `code` varchar(50) COLLATE utf8_bin DEFAULT NULL COMMENT '组织机构代码',
  `type` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '供应商法定身份识别类型',
  `path` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '注册上传的图片路径',
  `status` tinyint(1) unsigned DEFAULT '0' COMMENT '状态 0-表示不显示  1-显示',
  `login_ip` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `login_time` int(11) DEFAULT NULL,
  `reg_time` int(11) DEFAULT NULL COMMENT '注册时间',
  `group_id` int(11) DEFAULT NULL COMMENT '所属角色',
  `c_id` int(11) DEFAULT NULL COMMENT '所属公司',
  `token` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='后台管理员';

-- ----------------------------
-- Records of rt_admin
-- ----------------------------
INSERT INTO `rt_admin` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin', '183763156941', '11111111@qq.com', '', '', '', '', '', '', '', '1', '0.0.0.0', '1506136461', '0', '2', '0', '2217433d9981e838715d68433a39fbe35a7d056b', '1506144627');
INSERT INTO `rt_admin` VALUES ('2', 'sss', 'e10adc3949ba59abbe56e057f20f883e', 'sss1', '123131232131', '123@qq.com1', '', '桂林万通网络科技', '', '', '', '', '', '0', '127.0.0.1', '1504747575', '0', '1', '3', '', '1503906422');
INSERT INTO `rt_admin` VALUES ('3', '张三', 'e10adc3949ba59abbe56e057f20f883e', '张三', '54665', '5564', '', '桂林山水文化传媒', '', '', '', '', '', '0', '127.0.0.1', '1501215858', '0', '1', '4', '', '0');
INSERT INTO `rt_admin` VALUES ('6', '123@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '123@qq.com', '123111111', '11111', '', '桂林重重网络科技', '', '', '', '', '', '0', '127.0.0.1', '1501744147', '0', '1', '6', '', '0');
INSERT INTO `rt_admin` VALUES ('7', '888@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '小星', '155532551', '888@qq.com', '', '万和天宜', '', '', '', '', '', '0', '', '0', '0', '1', '7', '', '0');

-- ----------------------------
-- Table structure for rt_admin_group
-- ----------------------------
DROP TABLE IF EXISTS `rt_admin_group`;
CREATE TABLE `rt_admin_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `node` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='角色权限';

-- ----------------------------
-- Records of rt_admin_group
-- ----------------------------
INSERT INTO `rt_admin_group` VALUES ('2', '超级管理员', '22,24,25,35,23,28,29,30,37,119,120,121,122,123,124,125,126,127,128,129,130,134,153,159,18,33,34,187,188,189,190,191,192');

-- ----------------------------
-- Table structure for rt_admin_log
-- ----------------------------
DROP TABLE IF EXISTS `rt_admin_log`;
CREATE TABLE `rt_admin_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL COMMENT '用户id',
  `u_name` varchar(50) DEFAULT NULL COMMENT '用户名称账号',
  `content` varchar(200) DEFAULT NULL COMMENT '操作内容',
  `update_time` int(11) DEFAULT NULL COMMENT '操作时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=337 DEFAULT CHARSET=utf8 COMMENT='后台管理员操作日志';

-- ----------------------------
-- Records of rt_admin_log
-- ----------------------------
INSERT INTO `rt_admin_log` VALUES ('1', '1', 'admin', '添加菜单(名称:操作日志)', '1502154963');
INSERT INTO `rt_admin_log` VALUES ('2', '1', 'admin', '修改角色(名称:超级管理员)', '1502154976');
INSERT INTO `rt_admin_log` VALUES ('3', '1', 'admin', '修改招商信息(房号:A501)', '1502183647');
INSERT INTO `rt_admin_log` VALUES ('4', '1', 'admin', '删除企业信息(id:8)', '1502183868');
INSERT INTO `rt_admin_log` VALUES ('5', '1', 'admin', '修改招商信息(房号:B202)', '1502242467');
INSERT INTO `rt_admin_log` VALUES ('6', '1', 'admin', '删除招商信息(id:8)', '1502242497');
INSERT INTO `rt_admin_log` VALUES ('7', '1', 'admin', '删除维护报修(id:3)', '1502242511');
INSERT INTO `rt_admin_log` VALUES ('8', '1', 'admin', '修改角色(名称:企业用户)', '1502248936');
INSERT INTO `rt_admin_log` VALUES ('9', '1', 'admin', '修改菜单(名称:业务投诉列表)', '1502356536');
INSERT INTO `rt_admin_log` VALUES ('10', '1', 'admin', '修改菜单(名称:添加业务投诉)', '1502356562');
INSERT INTO `rt_admin_log` VALUES ('11', '1', 'admin', '修改菜单(名称:删除业务投诉)', '1502356598');
INSERT INTO `rt_admin_log` VALUES ('12', '1', 'admin', '修改菜单(名称:确认处理)', '1502356619');
INSERT INTO `rt_admin_log` VALUES ('13', '1', 'admin', '修改管理员(姓名:admin)', '1502357182');
INSERT INTO `rt_admin_log` VALUES ('14', '1', 'admin', '添加菜单(名称:资料分类)', '1502358437');
INSERT INTO `rt_admin_log` VALUES ('15', '1', 'admin', '修改角色(名称:超级管理员)', '1502358447');
INSERT INTO `rt_admin_log` VALUES ('16', '1', 'admin', '添加合同分类(名称:11)', '1502360138');
INSERT INTO `rt_admin_log` VALUES ('17', '1', 'admin', '确认接管(文件编号1111)', '1502360144');
INSERT INTO `rt_admin_log` VALUES ('18', '1', 'admin', '修改合同分类(id:7)', '1502360260');
INSERT INTO `rt_admin_log` VALUES ('19', '1', 'admin', '修改合同分类(id:7)', '1502360408');
INSERT INTO `rt_admin_log` VALUES ('20', '1', 'admin', '修改合同分类(id:7)', '1502415580');
INSERT INTO `rt_admin_log` VALUES ('21', '1', 'admin', '修改合同分类(id:7)', '1502415613');
INSERT INTO `rt_admin_log` VALUES ('22', '1', 'admin', '修改合同分类(id:7)', '1502415633');
INSERT INTO `rt_admin_log` VALUES ('23', '1', 'admin', '修改合同分类(id:7)', '1502415638');
INSERT INTO `rt_admin_log` VALUES ('24', '1', 'admin', '添加菜单(名称:添加资料)', '1502417591');
INSERT INTO `rt_admin_log` VALUES ('25', '1', 'admin', '添加菜单(名称:添加合同)', '1502417716');
INSERT INTO `rt_admin_log` VALUES ('26', '1', 'admin', '修改角色(名称:超级管理员)', '1502417751');
INSERT INTO `rt_admin_log` VALUES ('27', '1', 'admin', '修改水电信息(房号:B101)', '1502442095');
INSERT INTO `rt_admin_log` VALUES ('28', '1', 'admin', '添加菜单(名称:确认水电缴费)', '1502442443');
INSERT INTO `rt_admin_log` VALUES ('29', '1', 'admin', '修改角色(名称:超级管理员)', '1502442505');
INSERT INTO `rt_admin_log` VALUES ('30', '1', 'admin', '确认水电缴费(id:8)', '1502442720');
INSERT INTO `rt_admin_log` VALUES ('31', '1', 'admin', '添加菜单(名称:退回押金)', '1502444632');
INSERT INTO `rt_admin_log` VALUES ('32', '1', 'admin', '修改角色(名称:超级管理员)', '1502444708');
INSERT INTO `rt_admin_log` VALUES ('33', '1', 'admin', '确认收费(id:1)', '1502444733');
INSERT INTO `rt_admin_log` VALUES ('34', '1', 'admin', '退回押金(id:1)', '1502444845');
INSERT INTO `rt_admin_log` VALUES ('35', '1', 'admin', '确认收费(id:4)', '1502444971');
INSERT INTO `rt_admin_log` VALUES ('36', '1', 'admin', '退回押金(id:4)', '1502445049');
INSERT INTO `rt_admin_log` VALUES ('37', '1', 'admin', '修改菜单(名称:添加用户)', '1502445923');
INSERT INTO `rt_admin_log` VALUES ('38', '1', 'admin', '修改菜单(名称:修改用户)', '1502445935');
INSERT INTO `rt_admin_log` VALUES ('39', '1', 'admin', '修改菜单(名称:删除用户)', '1502445944');
INSERT INTO `rt_admin_log` VALUES ('40', '1', 'admin', '修改用户(姓名:admin)', '1502445964');
INSERT INTO `rt_admin_log` VALUES ('41', '1', 'admin', '修改菜单(名称:添加用户)', '1502446502');
INSERT INTO `rt_admin_log` VALUES ('42', '1', 'admin', '添加菜单(名称:修改管理员)', '1502446723');
INSERT INTO `rt_admin_log` VALUES ('43', '1', 'admin', '修改角色(名称:超级管理员)', '1502446761');
INSERT INTO `rt_admin_log` VALUES ('44', '1', 'admin', '修改用户(姓名:sss1)', '1502446905');
INSERT INTO `rt_admin_log` VALUES ('45', '1', 'admin', '修改角色(名称:物业管理)', '1502677170');
INSERT INTO `rt_admin_log` VALUES ('46', '1', 'admin', '修改角色(名称:企业用户)', '1502677233');
INSERT INTO `rt_admin_log` VALUES ('47', '1', 'admin', '修改角色(名称:企业服务管理)', '1502677269');
INSERT INTO `rt_admin_log` VALUES ('48', '1', 'admin', '修改角色(名称:招商管理)', '1502677305');
INSERT INTO `rt_admin_log` VALUES ('49', '1', 'admin', '修改角色(名称:工程水电表信息管理)', '1502677327');
INSERT INTO `rt_admin_log` VALUES ('50', '1', 'admin', '修改角色(名称:财务管理)', '1502677346');
INSERT INTO `rt_admin_log` VALUES ('51', '1', 'admin', '修改角色(名称:行政管理)', '1502677393');
INSERT INTO `rt_admin_log` VALUES ('52', '1', 'admin', '添加菜单(名称:导出资料excel)', '1502677673');
INSERT INTO `rt_admin_log` VALUES ('53', '1', 'admin', '修改角色(名称:超级管理员)', '1502677687');
INSERT INTO `rt_admin_log` VALUES ('54', '1', 'admin', '修改菜单(名称:导出资料excel)', '1502678838');
INSERT INTO `rt_admin_log` VALUES ('55', '1', 'admin', '导出资料excel(id:3,1)', '1502678844');
INSERT INTO `rt_admin_log` VALUES ('56', '1', 'admin', '导出资料excel(id:3,1)', '1502680150');
INSERT INTO `rt_admin_log` VALUES ('57', '1', 'admin', '添加菜单(名称:导出走访记录)', '1502680863');
INSERT INTO `rt_admin_log` VALUES ('58', '1', 'admin', '修改角色(名称:超级管理员)', '1502680878');
INSERT INTO `rt_admin_log` VALUES ('59', '1', 'admin', '导出走访记录(id:6,4,3)', '1502682561');
INSERT INTO `rt_admin_log` VALUES ('60', '1', 'admin', '修改走访记录(姓名:走访人员)', '1502682636');
INSERT INTO `rt_admin_log` VALUES ('61', '1', 'admin', '导出走访记录(id:6,4,3)', '1502682643');
INSERT INTO `rt_admin_log` VALUES ('62', '1', 'admin', '导出招商信息(id:3,1,4,2,7)', '1502705421');
INSERT INTO `rt_admin_log` VALUES ('63', '1', 'admin', '修改员工信息(名称:李四)', '1503025964');
INSERT INTO `rt_admin_log` VALUES ('64', '1', 'admin', '修改员工信息(名称:李四)', '1503026108');
INSERT INTO `rt_admin_log` VALUES ('65', '1', 'admin', '修改员工信息(名称:李四)', '1503026988');
INSERT INTO `rt_admin_log` VALUES ('66', '1', 'admin', '修改员工信息(名称:123)', '1503038142');
INSERT INTO `rt_admin_log` VALUES ('67', '1', 'admin', '修改员工信息(名称:小红)', '1503038482');
INSERT INTO `rt_admin_log` VALUES ('68', '1', 'admin', '修改员工信息(名称:123)', '1503039541');
INSERT INTO `rt_admin_log` VALUES ('69', '1', 'admin', '添加菜单(名称:人员异动)', '1503039662');
INSERT INTO `rt_admin_log` VALUES ('70', '1', 'admin', '修改角色(名称:超级管理员)', '1503039680');
INSERT INTO `rt_admin_log` VALUES ('71', '1', 'admin', '修改角色(名称:行政管理)', '1503039705');
INSERT INTO `rt_admin_log` VALUES ('72', '1', 'admin', '修改员工信息(名称:123)', '1503041909');
INSERT INTO `rt_admin_log` VALUES ('73', '1', 'admin', '添加菜单(名称:异动列表)', '1503044313');
INSERT INTO `rt_admin_log` VALUES ('74', '1', 'admin', '修改角色(名称:超级管理员)', '1503044328');
INSERT INTO `rt_admin_log` VALUES ('75', '1', 'admin', '添加菜单(名称:房型统计)', '1503279130');
INSERT INTO `rt_admin_log` VALUES ('76', '1', 'admin', '修改角色(名称:超级管理员)', '1503279154');
INSERT INTO `rt_admin_log` VALUES ('77', '1', 'admin', '修改文章(名称:)', '1503282226');
INSERT INTO `rt_admin_log` VALUES ('78', '1', 'admin', '修改文章(名称:)', '1503282848');
INSERT INTO `rt_admin_log` VALUES ('79', '1', 'admin', '修改文章(名称:)', '1503282859');
INSERT INTO `rt_admin_log` VALUES ('80', '1', 'admin', '添加员工信息(名称:张红)', '1503300186');
INSERT INTO `rt_admin_log` VALUES ('81', '1', 'admin', '修改员工信息(名称:张红)', '1503301316');
INSERT INTO `rt_admin_log` VALUES ('82', '1', 'admin', '修改员工信息(名称:张红)', '1503301873');
INSERT INTO `rt_admin_log` VALUES ('83', '1', 'admin', '添加菜单(名称:导出员工信息)', '1503305899');
INSERT INTO `rt_admin_log` VALUES ('84', '1', 'admin', '修改菜单(名称:导出员工信息)', '1503305952');
INSERT INTO `rt_admin_log` VALUES ('85', '1', 'admin', '修改角色(名称:超级管理员)', '1503305971');
INSERT INTO `rt_admin_log` VALUES ('86', '1', 'admin', '导出员工信息(id:5,4,3,2)', '1503305978');
INSERT INTO `rt_admin_log` VALUES ('87', '1', 'admin', '导出员工信息(id:5,4,3,2)', '1503306033');
INSERT INTO `rt_admin_log` VALUES ('88', '1', 'admin', '导出员工信息(id:5,4,3,2)', '1503306217');
INSERT INTO `rt_admin_log` VALUES ('89', '1', 'admin', '导出员工信息(id:2,3,4,5)', '1503306945');
INSERT INTO `rt_admin_log` VALUES ('90', '1', 'admin', '修改菜单(名称:资料分类)', '1503370887');
INSERT INTO `rt_admin_log` VALUES ('91', '1', 'admin', '修改菜单(名称:档案分类)', '1503370925');
INSERT INTO `rt_admin_log` VALUES ('92', '1', 'admin', '修改菜单(名称:添加档案分类)', '1503370947');
INSERT INTO `rt_admin_log` VALUES ('93', '1', 'admin', '修改菜单(名称:修改档案分类)', '1503370962');
INSERT INTO `rt_admin_log` VALUES ('94', '1', 'admin', '修改菜单(名称:删除档案分类)', '1503370973');
INSERT INTO `rt_admin_log` VALUES ('95', '1', 'admin', '修改档案分类(id:6)', '1503371349');
INSERT INTO `rt_admin_log` VALUES ('96', '1', 'admin', '修改档案分类(id:6)', '1503371615');
INSERT INTO `rt_admin_log` VALUES ('97', '1', 'admin', '修改档案分类(id:6)', '1503371704');
INSERT INTO `rt_admin_log` VALUES ('98', '1', 'admin', '修改档案分类(id:6)', '1503371720');
INSERT INTO `rt_admin_log` VALUES ('99', '1', 'admin', '修改档案分类(id:3)', '1503371727');
INSERT INTO `rt_admin_log` VALUES ('100', '1', 'admin', '添加档案分类(名称:招商类（F柜）)', '1503371736');
INSERT INTO `rt_admin_log` VALUES ('101', '1', 'admin', '添加档案分类(名称:房产测绘及合同(A1))', '1503371757');
INSERT INTO `rt_admin_log` VALUES ('102', '1', 'admin', '修改档案分类(id:9)', '1503372072');
INSERT INTO `rt_admin_log` VALUES ('103', '1', 'admin', '修改档案分类(id:9)', '1503372121');
INSERT INTO `rt_admin_log` VALUES ('104', '1', 'admin', '修改档案分类(id:9)', '1503372127');
INSERT INTO `rt_admin_log` VALUES ('105', '1', 'admin', '确认接管(文件编号ht251)', '1503372735');
INSERT INTO `rt_admin_log` VALUES ('106', '1', 'admin', '添加档案分类(名称:三江结算书（A2）)', '1503374158');
INSERT INTO `rt_admin_log` VALUES ('107', '1', 'admin', '确认接管(文件编号1111)', '1503374643');
INSERT INTO `rt_admin_log` VALUES ('108', '1', 'admin', '添加档案分类(名称:青狮潭项目材料(A3))', '1503384070');
INSERT INTO `rt_admin_log` VALUES ('109', '1', 'admin', '添加档案分类(名称:东兴项目(A4))', '1503384080');
INSERT INTO `rt_admin_log` VALUES ('110', '1', 'admin', '添加档案分类(名称:估价报告（A5）)', '1503384090');
INSERT INTO `rt_admin_log` VALUES ('111', '1', 'admin', '添加档案分类(名称:政府文件(B1))', '1503384108');
INSERT INTO `rt_admin_log` VALUES ('112', '1', 'admin', '添加档案分类(名称:中信银行财务类(B2))', '1503384115');
INSERT INTO `rt_admin_log` VALUES ('113', '1', 'admin', '添加档案分类(名称:其他银行财务类(B3))', '1503384122');
INSERT INTO `rt_admin_log` VALUES ('114', '1', 'admin', '添加档案分类(名称:审计报告书 (B4))', '1503384131');
INSERT INTO `rt_admin_log` VALUES ('115', '1', 'admin', '添加档案分类(名称:公司合同 (B5))', '1503384145');
INSERT INTO `rt_admin_log` VALUES ('116', '1', 'admin', '添加档案分类(名称:保险合同 (B6))', '1503384152');
INSERT INTO `rt_admin_log` VALUES ('117', '1', 'admin', '添加档案分类(名称:公司证照（B7）)', '1503384158');
INSERT INTO `rt_admin_log` VALUES ('118', '1', 'admin', '添加档案分类(名称:民华沿革材料（B8）)', '1503384165');
INSERT INTO `rt_admin_log` VALUES ('119', '1', 'admin', '添加档案分类(名称:电商谷成立及变更沿革材料（B9）)', '1503384172');
INSERT INTO `rt_admin_log` VALUES ('120', '1', 'admin', '添加档案分类(名称:民森档案材料（B10）)', '1503384179');
INSERT INTO `rt_admin_log` VALUES ('121', '1', 'admin', '添加档案分类(名称:创业物业档案材料（B11）)', '1503384185');
INSERT INTO `rt_admin_log` VALUES ('122', '1', 'admin', '添加档案分类(名称:传奇通信沿革材料（B12）)', '1503384218');
INSERT INTO `rt_admin_log` VALUES ('123', '1', 'admin', '添加档案分类(名称:民华商贸（网谷）档案材料（B13))', '1503384238');
INSERT INTO `rt_admin_log` VALUES ('124', '1', 'admin', '添加档案分类(名称:民森承包及租赁等合同（B14）)', '1503384244');
INSERT INTO `rt_admin_log` VALUES ('125', '1', 'admin', '添加档案分类(名称:请示、说明、申请报告（B15）)', '1503384251');
INSERT INTO `rt_admin_log` VALUES ('126', '1', 'admin', '添加档案分类(名称:案件纠纷（B16）)', '1503384257');
INSERT INTO `rt_admin_log` VALUES ('127', '1', 'admin', '添加档案分类(名称:民达公司沿革材料（B17）)', '1503384263');
INSERT INTO `rt_admin_log` VALUES ('128', '1', 'admin', '添加档案分类(名称:政府通知（B18）)', '1503384269');
INSERT INTO `rt_admin_log` VALUES ('129', '1', 'admin', '添加档案分类(名称:公司资金、资质申请、项目申报（S）)', '1503384278');
INSERT INTO `rt_admin_log` VALUES ('130', '1', 'admin', '添加档案分类(名称:公司方案，制度，培训班、验收材料，企业数据表（S1）)', '1503384285');
INSERT INTO `rt_admin_log` VALUES ('131', '1', 'admin', '添加档案分类(名称:正在生效的租赁合同 (F1))', '1503384293');
INSERT INTO `rt_admin_log` VALUES ('132', '1', 'admin', '添加档案分类(名称:过期未生效租赁合同(F2))', '1503384300');
INSERT INTO `rt_admin_log` VALUES ('133', '1', 'admin', '添加档案分类(名称:已办证买卖契约（F3）)', '1503384306');
INSERT INTO `rt_admin_log` VALUES ('134', '1', 'admin', '添加档案分类(名称:待过户销售合同(F4))', '1503384312');
INSERT INTO `rt_admin_log` VALUES ('135', '1', 'admin', '添加档案分类(名称:正在生效的物业管理服务协议（F5))', '1503384320');
INSERT INTO `rt_admin_log` VALUES ('136', '1', 'admin', '添加档案分类(名称:过期物业管理服务协议(购房)（F6）)', '1503384329');
INSERT INTO `rt_admin_log` VALUES ('137', '1', 'admin', '添加档案分类(名称:过期物业管理服务协议(租赁)（F7）)', '1503384335');
INSERT INTO `rt_admin_log` VALUES ('138', '1', 'admin', '添加档案分类(名称:车位及地下室租赁（F8）)', '1503384343');
INSERT INTO `rt_admin_log` VALUES ('139', '1', 'admin', '添加档案分类(名称:孵化协议 (F9))', '1503384350');
INSERT INTO `rt_admin_log` VALUES ('140', '1', 'admin', '删除菜单(id:154)', '1503385603');
INSERT INTO `rt_admin_log` VALUES ('141', '1', 'admin', '添加菜单(名称:资料合同删除)', '1503386011');
INSERT INTO `rt_admin_log` VALUES ('142', '1', 'admin', '修改角色(名称:超级管理员)', '1503386027');
INSERT INTO `rt_admin_log` VALUES ('143', '1', 'admin', '修改菜单(名称:资料合同删除)', '1503386095');
INSERT INTO `rt_admin_log` VALUES ('144', '1', 'admin', '导出资料excel(id:3)', '1503394432');
INSERT INTO `rt_admin_log` VALUES ('145', '1', 'admin', '修改菜单(名称:车位信息表)', '1503456339');
INSERT INTO `rt_admin_log` VALUES ('146', '1', 'admin', '导出招商信息(id:3,1,4,2,7)', '1503470897');
INSERT INTO `rt_admin_log` VALUES ('147', '1', 'admin', '添加菜单(名称:楼座管理)', '1503474007');
INSERT INTO `rt_admin_log` VALUES ('148', '1', 'admin', '添加菜单(名称:添加楼座)', '1503474064');
INSERT INTO `rt_admin_log` VALUES ('149', '1', 'admin', '修改菜单(名称:楼座管理)', '1503474077');
INSERT INTO `rt_admin_log` VALUES ('150', '1', 'admin', '添加菜单(名称:删除楼座)', '1503474101');
INSERT INTO `rt_admin_log` VALUES ('151', '1', 'admin', '修改角色(名称:超级管理员)', '1503474116');
INSERT INTO `rt_admin_log` VALUES ('152', '1', 'admin', '添加楼座(id:1)', '1503474799');
INSERT INTO `rt_admin_log` VALUES ('153', '1', 'admin', '删除楼座(id:2)', '1503474950');
INSERT INTO `rt_admin_log` VALUES ('154', '1', 'admin', '添加楼座(id:3)', '1503475008');
INSERT INTO `rt_admin_log` VALUES ('155', '1', 'admin', '添加菜单(名称:修改楼座)', '1503475193');
INSERT INTO `rt_admin_log` VALUES ('156', '1', 'admin', '修改角色(名称:超级管理员)', '1503475207');
INSERT INTO `rt_admin_log` VALUES ('157', '1', 'admin', '添加楼座(id:12)', '1503475441');
INSERT INTO `rt_admin_log` VALUES ('158', '1', 'admin', '修改楼座(id:1)', '1503475476');
INSERT INTO `rt_admin_log` VALUES ('159', '1', 'admin', '修改楼座(id:1)', '1503475482');
INSERT INTO `rt_admin_log` VALUES ('160', '1', 'admin', '修改楼座(id:1)', '1503475488');
INSERT INTO `rt_admin_log` VALUES ('161', '1', 'admin', '修改招商信息(房号:D503)', '1503476667');
INSERT INTO `rt_admin_log` VALUES ('162', '1', 'admin', '导出招商信息(id:3,1,4,2,7)', '1503478694');
INSERT INTO `rt_admin_log` VALUES ('163', '1', 'admin', '导出招商信息(id:3,1,4,2,7)', '1503478715');
INSERT INTO `rt_admin_log` VALUES ('164', '1', 'admin', '导出招商信息(id:3,1,4,2,7)', '1503478773');
INSERT INTO `rt_admin_log` VALUES ('165', '1', 'admin', '导出企业信息(id:6,4,3)', '1503479557');
INSERT INTO `rt_admin_log` VALUES ('166', '1', 'admin', '自定义导出企业信息(id:6,4,3)', '1503479621');
INSERT INTO `rt_admin_log` VALUES ('167', '1', 'admin', '导出水电表excel(id:8)', '1503480887');
INSERT INTO `rt_admin_log` VALUES ('168', '1', 'admin', '添加菜单(名称:租售记录)', '1503539870');
INSERT INTO `rt_admin_log` VALUES ('169', '1', 'admin', '修改角色(名称:超级管理员)', '1503539880');
INSERT INTO `rt_admin_log` VALUES ('170', '1', 'admin', '添加招商信息(房号:a110)', '1503559561');
INSERT INTO `rt_admin_log` VALUES ('171', '1', 'admin', '修改招商信息(房号:a110)', '1503560367');
INSERT INTO `rt_admin_log` VALUES ('172', '1', 'admin', '添加招商信息(房号:a111)', '1503560566');
INSERT INTO `rt_admin_log` VALUES ('173', '1', 'admin', '修改招商信息(房号:a110)', '1503562308');
INSERT INTO `rt_admin_log` VALUES ('174', '1', 'admin', '修改招商信息(房号:a111)', '1503562650');
INSERT INTO `rt_admin_log` VALUES ('175', '1', 'admin', '修改企业信息(名称:漓江科技)', '1503562954');
INSERT INTO `rt_admin_log` VALUES ('176', '1', 'admin', '修改水电信息(房号:a111)', '1503563026');
INSERT INTO `rt_admin_log` VALUES ('177', '1', 'admin', '修改水电信息(房号:a111)', '1503563223');
INSERT INTO `rt_admin_log` VALUES ('178', '1', 'admin', '修改水电信息(房号:a111)', '1503563398');
INSERT INTO `rt_admin_log` VALUES ('179', '1', 'admin', '修改菜单(名称:工程水电信息管理)', '1503628720');
INSERT INTO `rt_admin_log` VALUES ('180', '1', 'admin', '修改菜单(名称:物业管理)', '1503628730');
INSERT INTO `rt_admin_log` VALUES ('181', '1', 'admin', '修改菜单(名称:楼座管理)', '1503630183');
INSERT INTO `rt_admin_log` VALUES ('182', '1', 'admin', '修改菜单(名称:保安值班表)', '1503642530');
INSERT INTO `rt_admin_log` VALUES ('183', '1', 'admin', '修改菜单(名称:保洁工作表)', '1503642543');
INSERT INTO `rt_admin_log` VALUES ('184', '1', 'admin', '添加菜单(名称:来访记录)', '1503647595');
INSERT INTO `rt_admin_log` VALUES ('185', '1', 'admin', '添加菜单(名称:添加来访记录)', '1503647630');
INSERT INTO `rt_admin_log` VALUES ('186', '1', 'admin', '添加菜单(名称:修改来访信息)', '1503647664');
INSERT INTO `rt_admin_log` VALUES ('187', '1', 'admin', '添加菜单(名称:删除来访信息)', '1503647884');
INSERT INTO `rt_admin_log` VALUES ('188', '1', 'admin', '修改角色(名称:超级管理员)', '1503647899');
INSERT INTO `rt_admin_log` VALUES ('189', '1', 'admin', '添加来访记录(名称:凶獒)', '1503649532');
INSERT INTO `rt_admin_log` VALUES ('190', '1', 'admin', '修改来访信息(名称:凶獒1)', '1503649913');
INSERT INTO `rt_admin_log` VALUES ('191', '1', 'admin', '删除来访信息(id:1)', '1503649951');
INSERT INTO `rt_admin_log` VALUES ('192', '1', 'admin', '修改来访信息(名称:凶獒1)', '1503649982');
INSERT INTO `rt_admin_log` VALUES ('193', '1', 'admin', '添加菜单(名称:导出来访信息)', '1503650368');
INSERT INTO `rt_admin_log` VALUES ('194', '1', 'admin', '修改角色(名称:超级管理员)', '1503650457');
INSERT INTO `rt_admin_log` VALUES ('195', '1', 'admin', '导出来访信息(id:2)', '1503651197');
INSERT INTO `rt_admin_log` VALUES ('196', '1', 'admin', '修改车位信息(车位号:a101)', '1503652681');
INSERT INTO `rt_admin_log` VALUES ('197', '1', 'admin', '修改车位信息(车位号:a303)', '1503652688');
INSERT INTO `rt_admin_log` VALUES ('198', '1', 'admin', '确认缴费(id:1)', '1503653167');
INSERT INTO `rt_admin_log` VALUES ('199', '1', 'admin', '添加菜单(名称:车位收费清单)', '1503653464');
INSERT INTO `rt_admin_log` VALUES ('200', '1', 'admin', '修改角色(名称:超级管理员)', '1503653475');
INSERT INTO `rt_admin_log` VALUES ('201', '1', 'admin', '修改车位信息(车位号:a101)', '1503887589');
INSERT INTO `rt_admin_log` VALUES ('202', '1', 'admin', '添加车位信息(车位号:a202)', '1503887676');
INSERT INTO `rt_admin_log` VALUES ('203', '1', 'admin', '修改车位信息(车位号:a303)', '1503888851');
INSERT INTO `rt_admin_log` VALUES ('204', '1', 'admin', '添加菜单(名称:确认车位缴费)', '1503889147');
INSERT INTO `rt_admin_log` VALUES ('205', '1', 'admin', '修改角色(名称:超级管理员)', '1503889156');
INSERT INTO `rt_admin_log` VALUES ('206', '1', 'admin', '确认车位缴费(id:3)', '1503889186');
INSERT INTO `rt_admin_log` VALUES ('207', '1', 'admin', '修改车位信息(车位号:a202)', '1503890473');
INSERT INTO `rt_admin_log` VALUES ('208', '1', 'admin', '修改车位信息(车位号:a202)', '1503890503');
INSERT INTO `rt_admin_log` VALUES ('209', '1', 'admin', '添加菜单(名称:车位费记录)', '1503891152');
INSERT INTO `rt_admin_log` VALUES ('210', '1', 'admin', '修改角色(名称:超级管理员)', '1503891160');
INSERT INTO `rt_admin_log` VALUES ('211', '1', 'admin', '添加车位信息(车位号:1231)', '1503891772');
INSERT INTO `rt_admin_log` VALUES ('212', '1', 'admin', '修改车位信息(车位号:1231)', '1503892212');
INSERT INTO `rt_admin_log` VALUES ('213', '1', 'admin', '导出走访记录(id:7,6,4,3)', '1503903352');
INSERT INTO `rt_admin_log` VALUES ('214', '1', 'admin', '修改企业信息(名称:漓江科技)', '1503904465');
INSERT INTO `rt_admin_log` VALUES ('215', '1', 'admin', '添加走访记录(姓名:132)', '1503905723');
INSERT INTO `rt_admin_log` VALUES ('216', '1', 'admin', '修改走访记录(姓名:132)', '1503905729');
INSERT INTO `rt_admin_log` VALUES ('217', '1', 'admin', '修改走访记录(姓名:走访人员)', '1503905819');
INSERT INTO `rt_admin_log` VALUES ('218', '1', 'admin', '修改走访记录(姓名:132)', '1503905824');
INSERT INTO `rt_admin_log` VALUES ('219', '1', 'admin', '导出走访记录(id:7,6,4,3)', '1503905839');
INSERT INTO `rt_admin_log` VALUES ('220', '1', 'admin', '修改档案分类(id:6)', '1503905906');
INSERT INTO `rt_admin_log` VALUES ('221', '1', 'admin', '修改员工信息(名称:张红)', '1503905915');
INSERT INTO `rt_admin_log` VALUES ('222', '1', 'admin', '修改员工信息(名称:张红)', '1503905919');
INSERT INTO `rt_admin_log` VALUES ('223', '1', 'admin', '修改企业信息(名称:漓江科技)', '1503905987');
INSERT INTO `rt_admin_log` VALUES ('224', '1', 'admin', '修改企业信息(名称:漓江科技)', '1503905992');
INSERT INTO `rt_admin_log` VALUES ('225', '1', 'admin', '修改资料(文件编号:h123)', '1503906053');
INSERT INTO `rt_admin_log` VALUES ('226', '1', 'admin', '修改资料(文件编号:h123)', '1503906058');
INSERT INTO `rt_admin_log` VALUES ('227', '1', 'admin', '修改来访信息(名称:凶獒1)', '1503906157');
INSERT INTO `rt_admin_log` VALUES ('228', '1', 'admin', '修改车位信息(车位号:1231)', '1503906178');
INSERT INTO `rt_admin_log` VALUES ('229', '1', 'admin', '修改水电信息(房号:a111)', '1503906200');
INSERT INTO `rt_admin_log` VALUES ('230', '1', 'admin', '修改保安值班信息(姓名:张三)', '1503906253');
INSERT INTO `rt_admin_log` VALUES ('231', '1', 'admin', '修改保洁工作(姓名:张小妹)', '1503906258');
INSERT INTO `rt_admin_log` VALUES ('232', '1', 'admin', '修改用户(姓名:sss1)', '1503906422');
INSERT INTO `rt_admin_log` VALUES ('233', '1', 'admin', '用户申请修改(姓名:王伦)', '1503906448');
INSERT INTO `rt_admin_log` VALUES ('234', '1', 'admin', '修改管理员(姓名:admin)', '1503906547');
INSERT INTO `rt_admin_log` VALUES ('235', '1', 'admin', '修改文章(名称:)', '1503906562');
INSERT INTO `rt_admin_log` VALUES ('236', '1', 'admin', '修改企业信息(名称:桂林重重网络科技)', '1503969281');
INSERT INTO `rt_admin_log` VALUES ('237', '1', 'admin', '修改招商信息(房号:D503)', '1503973125');
INSERT INTO `rt_admin_log` VALUES ('238', '1', 'admin', '修改招商信息(房号:D503)', '1503973140');
INSERT INTO `rt_admin_log` VALUES ('239', '1', 'admin', '修改招商信息(房号:D503)', '1503973497');
INSERT INTO `rt_admin_log` VALUES ('240', '1', 'admin', '修改招商信息(房号:a110)', '1503974922');
INSERT INTO `rt_admin_log` VALUES ('241', '1', 'admin', '修改招商信息(房号:a110)', '1503974950');
INSERT INTO `rt_admin_log` VALUES ('242', '1', 'admin', '修改招商信息(房号:a110)', '1503975030');
INSERT INTO `rt_admin_log` VALUES ('243', '1', 'admin', '修改菜单(名称:客户管理)', '1503975756');
INSERT INTO `rt_admin_log` VALUES ('244', '1', 'admin', '修改菜单(名称:物业管理)', '1503977863');
INSERT INTO `rt_admin_log` VALUES ('245', '1', 'admin', '删除菜单(id:73)', '1503977870');
INSERT INTO `rt_admin_log` VALUES ('246', '1', 'admin', '添加菜单(名称:水电费通知预览)', '1504084380');
INSERT INTO `rt_admin_log` VALUES ('247', '1', 'admin', '修改角色(名称:超级管理员)', '1504084428');
INSERT INTO `rt_admin_log` VALUES ('248', '1', 'admin', '添加菜单(名称:预览房租物业通知)', '1504141251');
INSERT INTO `rt_admin_log` VALUES ('249', '1', 'admin', '修改角色(名称:超级管理员)', '1504141259');
INSERT INTO `rt_admin_log` VALUES ('250', '1', 'admin', '修改招商信息(房号:a110)', '1504142612');
INSERT INTO `rt_admin_log` VALUES ('251', '1', 'admin', '修改招商信息(房号:D503)', '1504142820');
INSERT INTO `rt_admin_log` VALUES ('252', '1', 'admin', '修改招商信息(房号:a111)', '1504165416');
INSERT INTO `rt_admin_log` VALUES ('253', '1', 'admin', '修改水电信息(房号:a111)', '1504165541');
INSERT INTO `rt_admin_log` VALUES ('254', '1', 'admin', '导出员工信息(id:5,4,3,2)', '1504583128');
INSERT INTO `rt_admin_log` VALUES ('255', '1', 'admin', '修改员工信息(名称:张红)', '1504599180');
INSERT INTO `rt_admin_log` VALUES ('256', '1', 'admin', '修改员工信息(名称:张红)', '1504599238');
INSERT INTO `rt_admin_log` VALUES ('257', '1', 'admin', '修改员工信息(名称:张红)', '1504599259');
INSERT INTO `rt_admin_log` VALUES ('258', '1', 'admin', '修改员工信息(名称:张红)', '1504599272');
INSERT INTO `rt_admin_log` VALUES ('259', '1', 'admin', '修改员工信息(名称:张红)', '1504599292');
INSERT INTO `rt_admin_log` VALUES ('260', '1', 'admin', '修改员工信息(名称:123)', '1504599468');
INSERT INTO `rt_admin_log` VALUES ('261', '1', 'admin', '修改员工信息(名称:123)', '1504600601');
INSERT INTO `rt_admin_log` VALUES ('262', '1', 'admin', '修改员工信息(名称:123)', '1504600623');
INSERT INTO `rt_admin_log` VALUES ('263', '1', 'admin', '修改员工信息(名称:123)', '1504600709');
INSERT INTO `rt_admin_log` VALUES ('264', '1', 'admin', '修改菜单(名称:企业问题及业务需求反馈)', '1504601017');
INSERT INTO `rt_admin_log` VALUES ('265', '1', 'admin', '修改菜单(名称:来访记录)', '1504601426');
INSERT INTO `rt_admin_log` VALUES ('266', '1', 'admin', '修改菜单(名称:押金管理)', '1504601479');
INSERT INTO `rt_admin_log` VALUES ('267', '1', 'admin', '修改文章栏目(名称:通知公告)', '1504601571');
INSERT INTO `rt_admin_log` VALUES ('268', '1', 'admin', '修改菜单(名称:通知公告)', '1504601594');
INSERT INTO `rt_admin_log` VALUES ('269', '1', 'admin', '删除楼座(id:7)', '1504604794');
INSERT INTO `rt_admin_log` VALUES ('270', '1', 'admin', '修改员工信息(名称:张红)', '1504605756');
INSERT INTO `rt_admin_log` VALUES ('271', '1', 'admin', '修改员工信息(名称:123)', '1504605766');
INSERT INTO `rt_admin_log` VALUES ('272', '1', 'admin', '修改员工信息(名称:小红)', '1504605775');
INSERT INTO `rt_admin_log` VALUES ('273', '1', 'admin', '修改员工信息(名称:小红)', '1504605785');
INSERT INTO `rt_admin_log` VALUES ('274', '1', 'admin', '添加菜单(名称:技术领域分类)', '1504660340');
INSERT INTO `rt_admin_log` VALUES ('275', '1', 'admin', '添加菜单(名称:添加技术领域分类)', '1504660444');
INSERT INTO `rt_admin_log` VALUES ('276', '1', 'admin', '添加菜单(名称:删除技术领域分类)', '1504660481');
INSERT INTO `rt_admin_log` VALUES ('277', '1', 'admin', '添加菜单(名称:修改技术领域分类)', '1504660536');
INSERT INTO `rt_admin_log` VALUES ('278', '1', 'admin', '修改菜单(名称:文章栏目管理)', '1504660596');
INSERT INTO `rt_admin_log` VALUES ('279', '1', 'admin', '修改角色(名称:超级管理员)', '1504660673');
INSERT INTO `rt_admin_log` VALUES ('280', '1', 'admin', '修改菜单(名称:添加技术领域分类)', '1504663958');
INSERT INTO `rt_admin_log` VALUES ('281', '1', 'admin', '修改菜单(名称:删除技术领域分类)', '1504663974');
INSERT INTO `rt_admin_log` VALUES ('282', '1', 'admin', '修改菜单(名称:修改技术领域分类)', '1504663988');
INSERT INTO `rt_admin_log` VALUES ('283', '1', 'admin', '添加技术领域分类(名称:技术分类A)', '1504664338');
INSERT INTO `rt_admin_log` VALUES ('284', '1', 'admin', '修改走访类型(名称:技术分类A1)', '1504664660');
INSERT INTO `rt_admin_log` VALUES ('285', '1', 'admin', '修改技术领域分类(名称:技术分类A2)', '1504664756');
INSERT INTO `rt_admin_log` VALUES ('286', '1', 'admin', '添加技术领域分类(名称:技术分类b)', '1504664820');
INSERT INTO `rt_admin_log` VALUES ('287', '1', 'admin', '添加技术领域分类(名称:技术分类c)', '1504664829');
INSERT INTO `rt_admin_log` VALUES ('288', '1', 'admin', '删除技术领域分类(id:45)', '1504664832');
INSERT INTO `rt_admin_log` VALUES ('289', '1', 'admin', '修改企业信息(名称:漓江科技)', '1504665150');
INSERT INTO `rt_admin_log` VALUES ('290', '1', 'admin', '修改企业信息(名称:桂林重重网络科技)', '1504665166');
INSERT INTO `rt_admin_log` VALUES ('291', '1', 'admin', '修改企业信息(名称:桂林山水文化传媒)', '1504665326');
INSERT INTO `rt_admin_log` VALUES ('292', '1', 'admin', '修改企业信息(名称:桂林万通网络科技)', '1504665332');
INSERT INTO `rt_admin_log` VALUES ('293', '1', 'admin', '修改企业信息(名称:桂林万通网络科技)', '1504665340');
INSERT INTO `rt_admin_log` VALUES ('294', '1', 'admin', '确认水电缴费(id:9)', '1504679412');
INSERT INTO `rt_admin_log` VALUES ('295', '1', 'admin', '确认缴费(id:)', '1504680604');
INSERT INTO `rt_admin_log` VALUES ('296', '1', 'admin', '确认缴费(id:)', '1504680645');
INSERT INTO `rt_admin_log` VALUES ('297', '1', 'admin', '确认缴费(id:9)', '1504680702');
INSERT INTO `rt_admin_log` VALUES ('298', '1', 'admin', '导出企业信息(id:7,6,4,3)', '1504683474');
INSERT INTO `rt_admin_log` VALUES ('299', '1', 'admin', '自定义导出企业信息(id:7,6,4,3)', '1504683556');
INSERT INTO `rt_admin_log` VALUES ('300', '1', 'admin', '修改招商信息(房号:D503)', '1504683767');
INSERT INTO `rt_admin_log` VALUES ('301', '1', 'admin', '修改招商信息(房号:D503)', '1504684355');
INSERT INTO `rt_admin_log` VALUES ('302', '1', 'admin', '修改企业信息(名称:漓江科技)', '1504684366');
INSERT INTO `rt_admin_log` VALUES ('303', '1', 'admin', '修改招商信息(房号:D503)', '1504689388');
INSERT INTO `rt_admin_log` VALUES ('304', '1', 'admin', '修改招商信息(房号:D503)', '1504747853');
INSERT INTO `rt_admin_log` VALUES ('305', '1', 'admin', '修改招商信息(房号:D503)', '1504747903');
INSERT INTO `rt_admin_log` VALUES ('306', '1', 'admin', '添加菜单(名称:房租物业缴费明细)', '1504749736');
INSERT INTO `rt_admin_log` VALUES ('307', '1', 'admin', '修改角色(名称:超级管理员)', '1504749747');
INSERT INTO `rt_admin_log` VALUES ('308', '1', 'admin', '修改菜单(名称:押金管理)', '1504749784');
INSERT INTO `rt_admin_log` VALUES ('309', '1', 'admin', '导出房租物业费excel(id:9,1)', '1504752397');
INSERT INTO `rt_admin_log` VALUES ('310', '1', 'admin', '修改招商信息(房号:D503)', '1504852367');
INSERT INTO `rt_admin_log` VALUES ('311', '1', 'admin', '修改员工信息(名称:张红)', '1505122336');
INSERT INTO `rt_admin_log` VALUES ('312', '1', 'admin', '添加菜单(名称:数据备份)', '1506063499');
INSERT INTO `rt_admin_log` VALUES ('313', '1', 'admin', '添加菜单(名称:备份数据库)', '1506063541');
INSERT INTO `rt_admin_log` VALUES ('314', '1', 'admin', '添加菜单(名称:还原数据库)', '1506063585');
INSERT INTO `rt_admin_log` VALUES ('315', '1', 'admin', '添加菜单(名称:备份数据库操作)', '1506063633');
INSERT INTO `rt_admin_log` VALUES ('316', '1', 'admin', '添加菜单(名称:还原数据库操作)', '1506063660');
INSERT INTO `rt_admin_log` VALUES ('317', '1', 'admin', '添加菜单(名称:删除数据库)', '1506063691');
INSERT INTO `rt_admin_log` VALUES ('318', '1', 'admin', '修改角色(名称:超级管理员)', '1506063703');
INSERT INTO `rt_admin_log` VALUES ('319', '1', 'admin', '修改角色(名称:超级管理员)', '1506137832');
INSERT INTO `rt_admin_log` VALUES ('320', '1', 'admin', '删除角色(id:1)', '1506137842');
INSERT INTO `rt_admin_log` VALUES ('321', '1', 'admin', '删除角色(id:4)', '1506137844');
INSERT INTO `rt_admin_log` VALUES ('322', '1', 'admin', '删除角色(id:5)', '1506137847');
INSERT INTO `rt_admin_log` VALUES ('323', '1', 'admin', '删除角色(id:6)', '1506137849');
INSERT INTO `rt_admin_log` VALUES ('324', '1', 'admin', '删除角色(id:7)', '1506137851');
INSERT INTO `rt_admin_log` VALUES ('325', '1', 'admin', '删除角色(id:8)', '1506137853');
INSERT INTO `rt_admin_log` VALUES ('326', '1', 'admin', '删除角色(id:9)', '1506137856');
INSERT INTO `rt_admin_log` VALUES ('327', '1', 'admin', '添加角色(名称:ss)', '1506138078');
INSERT INTO `rt_admin_log` VALUES ('328', '1', 'admin', '删除角色(id:10)', '1506138304');
INSERT INTO `rt_admin_log` VALUES ('329', '1', 'admin', '修改菜单(名称:添加用户1)', '1506139116');
INSERT INTO `rt_admin_log` VALUES ('330', '1', 'admin', '修改菜单(名称:添加用户)', '1506139121');
INSERT INTO `rt_admin_log` VALUES ('331', '1', 'admin', '修改轮播图(名称:繁华的夜景如今却再也无法洗尽铅华1)', '1506139391');
INSERT INTO `rt_admin_log` VALUES ('332', '1', 'admin', '修改文章(名称:)', '1506139802');
INSERT INTO `rt_admin_log` VALUES ('333', '1', 'admin', '修改文章(名称:)', '1506139808');
INSERT INTO `rt_admin_log` VALUES ('334', '1', 'admin', '修改管理员(姓名:admin)', '1506140424');
INSERT INTO `rt_admin_log` VALUES ('335', '1', 'admin', '修改菜单(名称:角色列表)', '1506141426');
INSERT INTO `rt_admin_log` VALUES ('336', '1', 'admin', '修改管理员(姓名:admin)', '1506144627');

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
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=utf8 COMMENT='权限节点';

-- ----------------------------
-- Records of rt_admin_rule
-- ----------------------------
INSERT INTO `rt_admin_rule` VALUES ('18', '28', 'user/add_user', '添加用户', '2', '1', '1', '1506139121');
INSERT INTO `rt_admin_rule` VALUES ('22', '0', 'group/index', '权限管理', '1', '9', '0', '1499235420');
INSERT INTO `rt_admin_rule` VALUES ('23', '22', 'group/add_group', '添加角色', '2', '1', '1', '1499849608');
INSERT INTO `rt_admin_rule` VALUES ('24', '22', 'group/edit_group', '修改角色', '2', '0', '1', '1499234427');
INSERT INTO `rt_admin_rule` VALUES ('25', '22', 'group/del_group', '删除角色', '2', '0', '1', '1499234433');
INSERT INTO `rt_admin_rule` VALUES ('28', '0', 'menu/index', '系统管理', '1', '10', '0', '1501223217');
INSERT INTO `rt_admin_rule` VALUES ('29', '28', 'menu/m_list', '菜单管理', '2', '0', '0', '1501223229');
INSERT INTO `rt_admin_rule` VALUES ('30', '28', 'menu/m_add', '添加菜单', '2', '0', '1', '1499849617');
INSERT INTO `rt_admin_rule` VALUES ('33', '28', 'menu/m_del', '删除菜单', '2', '3', '1', '1499234457');
INSERT INTO `rt_admin_rule` VALUES ('34', '28', 'menu/m_edit', '修改菜单', '2', '4', '1', '1499234462');
INSERT INTO `rt_admin_rule` VALUES ('35', '22', 'group/g_list', '角色列表', '2', '0', '0', '1506141426');
INSERT INTO `rt_admin_rule` VALUES ('37', '28', 'menu/m_del_all', '菜单批量删除', '2', '0', '1', '1499329389');
INSERT INTO `rt_admin_rule` VALUES ('119', '28', 'Site/index', '轮播图管理', '2', '0', '0', '1501224405');
INSERT INTO `rt_admin_rule` VALUES ('120', '28', 'site/add_banner', '添加轮播图', '2', '0', '1', '1501225361');
INSERT INTO `rt_admin_rule` VALUES ('121', '28', 'site/edit_banner', '修改轮播图', '2', '0', '1', '1501226544');
INSERT INTO `rt_admin_rule` VALUES ('122', '28', 'site/del_banner', '删除轮播图', '2', '0', '1', '1501227058');
INSERT INTO `rt_admin_rule` VALUES ('123', '28', 'article/index', '文章管理', '2', '0', '0', '1504601593');
INSERT INTO `rt_admin_rule` VALUES ('124', '28', 'article/add_article', '添加文章', '2', '0', '1', '1501229493');
INSERT INTO `rt_admin_rule` VALUES ('125', '28', 'article/edit_article', '修改文章', '2', '0', '1', '1501230077');
INSERT INTO `rt_admin_rule` VALUES ('126', '28', 'article/del_article', '删除文章', '2', '0', '1', '1501230362');
INSERT INTO `rt_admin_rule` VALUES ('127', '28', 'article/menu', '文章栏目管理', '2', '0', '1', '1504660596');
INSERT INTO `rt_admin_rule` VALUES ('128', '28', 'article/add_menu', '添加文章栏目', '2', '0', '1', '1501231719');
INSERT INTO `rt_admin_rule` VALUES ('129', '28', 'article/edit_menu', '修改文章栏目', '2', '0', '1', '1501232607');
INSERT INTO `rt_admin_rule` VALUES ('130', '28', 'article/del_menu', '删除文章栏目', '2', '0', '1', '1501232870');
INSERT INTO `rt_admin_rule` VALUES ('134', '28', 'user/admin_list', '后台管理员', '2', '0', '0', '1501639820');
INSERT INTO `rt_admin_rule` VALUES ('153', '28', 'site/log_list', '操作日志', '2', '0', '0', '1502154963');
INSERT INTO `rt_admin_rule` VALUES ('159', '28', 'user/edit_admin', '修改管理员', '2', '0', '1', '1502446723');
INSERT INTO `rt_admin_rule` VALUES ('187', '0', 'Database/index', '数据备份', '1', '11', '0', '1506063499');
INSERT INTO `rt_admin_rule` VALUES ('188', '187', 'Database/index_export', '备份数据库', '2', '0', '0', '1506063541');
INSERT INTO `rt_admin_rule` VALUES ('189', '187', 'Database/index_import', '还原数据库', '2', '0', '0', '1506063585');
INSERT INTO `rt_admin_rule` VALUES ('190', '187', 'Database/exportsql', '备份数据库操作', '2', '0', '1', '1506063633');
INSERT INTO `rt_admin_rule` VALUES ('191', '187', 'Database/importsql', '还原数据库操作', '2', '0', '1', '1506063660');
INSERT INTO `rt_admin_rule` VALUES ('192', '187', 'Database/del', '删除数据库', '2', '0', '1', '1506063691');

-- ----------------------------
-- Table structure for rt_article
-- ----------------------------
DROP TABLE IF EXISTS `rt_article`;
CREATE TABLE `rt_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(10) DEFAULT NULL COMMENT '所属栏目',
  `title` varchar(255) DEFAULT NULL COMMENT '文章标题',
  `author` varchar(50) DEFAULT NULL COMMENT '文章作者',
  `description` varchar(255) DEFAULT NULL COMMENT '描述',
  `content` text COMMENT '文章内容',
  `status` tinyint(2) DEFAULT NULL COMMENT '状态(1显示2隐藏)',
  `recommend` tinyint(2) DEFAULT NULL COMMENT '是否推荐(1推荐2不推荐)',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '修改时间',
  `meta_title` varchar(200) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='文章';

-- ----------------------------
-- Records of rt_article
-- ----------------------------
INSERT INTO `rt_article` VALUES ('1', '1', '民华科技', 'admin', '民华科技是一家集企业孵化服务、计算机软、硬件系统研发、节能电子产品生产及城市污泥处理的信息产业集团。公司位于桂林国家高新区信息产业园，拥有近六万平方米的企业孵化基地。', '&lt;p&gt;民华科技是一家集企业孵化服务、计算机软、硬件系统研发、节能电子产品生产及城市污泥处理的信息产业集团。公司位于桂林国家高新区信息产业园，拥有近六万平方米的企业孵化基地。&lt;/p&gt;', '1', '1', '1501171200', '1506139808', '', '', '');
INSERT INTO `rt_article` VALUES ('2', '1', '11', '11', '1111111111', '&lt;p&gt;111&lt;/p&gt;', '1', '1', '1785600', '1503282859', '', '', '');

-- ----------------------------
-- Table structure for rt_banner
-- ----------------------------
DROP TABLE IF EXISTS `rt_banner`;
CREATE TABLE `rt_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(10) DEFAULT NULL,
  `title` varchar(20) DEFAULT NULL COMMENT '图片名称',
  `url` varchar(255) NOT NULL COMMENT '链接',
  `img` varchar(255) NOT NULL COMMENT '图片地址',
  `sort` tinyint(11) NOT NULL COMMENT '排序',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='轮播图';

-- ----------------------------
-- Records of rt_banner
-- ----------------------------
INSERT INTO `rt_banner` VALUES ('5', '10', '繁华的夜景如今却再也无法洗尽铅华1', '/', 'banner/2017-07-28/597b027a3f4d2.png', '1', '1506139391');
INSERT INTO `rt_banner` VALUES ('7', '10', '繁华的夜景如今却再也无法洗尽铅华', '/', 'banner/2017-07-28/597b051d406d2.png', '2', '1501234461');

-- ----------------------------
-- Table structure for rt_imgtype
-- ----------------------------
DROP TABLE IF EXISTS `rt_imgtype`;
CREATE TABLE `rt_imgtype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL COMMENT '父级id',
  `name` varchar(200) DEFAULT NULL COMMENT '栏目名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rt_imgtype
-- ----------------------------
INSERT INTO `rt_imgtype` VALUES ('10', '0', '首页轮播图');
INSERT INTO `rt_imgtype` VALUES ('11', '10', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='文章栏目';

-- ----------------------------
-- Records of rt_menu
-- ----------------------------
INSERT INTO `rt_menu` VALUES ('1', '0', '通知公告', '2', '');
