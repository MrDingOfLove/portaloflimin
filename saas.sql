/*
MySQL Data Transfer
Source Host: localhost
Source Database: saasshiro
Target Host: localhost
Target Database: saasshiro
Date: 2017/8/4 11:25:35
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for admin
-- ----------------------------
CREATE TABLE `admin` (
  `adminid` int(11) unsigned NOT NULL auto_increment,
  `adminuser` varchar(32) NOT NULL default '',
  `adminpass` char(32) NOT NULL default '',
  `adminemail` varchar(50) NOT NULL default '',
  `logintime` int(11) unsigned NOT NULL default '0',
  `loginip` bigint(20) NOT NULL default '0',
  `adminsalt` varchar(255) default NULL COMMENT '加密盐',
  `createtime` text NOT NULL,
  PRIMARY KEY  (`adminid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for dp
-- ----------------------------
CREATE TABLE `dp` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title` char(200) NOT NULL default '',
  `time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `brief` varchar(200) NOT NULL,
  `cover` varchar(100) NOT NULL default '',
  `detial` mediumtext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for government_affairs
-- ----------------------------
CREATE TABLE `government_affairs` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title` char(200) NOT NULL default '',
  `time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `detial` mediumtext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for information
-- ----------------------------
CREATE TABLE `information` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `username` varchar(40) NOT NULL default '',
  `phone` varchar(15) NOT NULL default '',
  `time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `address` char(100) NOT NULL default '',
  `category` varchar(11) NOT NULL default '',
  `detial` text NOT NULL,
  `handleresult` tinyint(1) NOT NULL default '0',
  `handledinfo` text,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for news
-- ----------------------------
CREATE TABLE `news` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title` char(200) NOT NULL default '',
  `time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `brief` varchar(200) NOT NULL,
  `cover` varchar(100) NOT NULL default '',
  `detial` mediumtext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_client
-- ----------------------------
CREATE TABLE `tb_client` (
  `client_id` int(11) NOT NULL COMMENT '客户id，不自增，主键',
  `client_name` varchar(255) default NULL COMMENT '客户名称',
  `client_pwd` varchar(255) default NULL COMMENT '客户密码',
  `client_cardid` char(18) default NULL COMMENT '客户身份证号',
  `client_type` varchar(255) default NULL COMMENT '客户类型',
  `client_info` varchar(255) default NULL COMMENT '表信息',
  `client_remark` varchar(255) default NULL COMMENT '备注',
  `client_address` varchar(255) default NULL COMMENT '地址',
  `client_tel` char(13) default NULL COMMENT '联系方式（移动电话类型）',
  `client_image` varchar(255) default NULL COMMENT '图片地址',
  `client_nickname` varchar(255) default NULL COMMENT '门户网站用户昵称',
  `client_salt` varchar(255) default NULL COMMENT '加密盐',
  `client_email` varchar(255) default NULL COMMENT '用户邮箱',
  PRIMARY KEY  (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_copy
-- ----------------------------
CREATE TABLE `tb_copy` (
  `copy_id` int(11) NOT NULL auto_increment COMMENT '抄录id，自增，主键',
  `client_id` int(11) default NULL COMMENT '客户id，不自增，主键',
  `copy_degree1` float default NULL COMMENT '表一度数',
  `copy_degree2` float default NULL COMMENT '表二度数',
  `copy_degree3` float default NULL COMMENT '表三度数',
  `copy_lasttime` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP COMMENT '最后时间',
  `copy_people` varchar(255) default NULL COMMENT '抄表人',
  `copy_money` float default NULL COMMENT '水费',
  `copy_sewage` float default NULL COMMENT '排污费',
  `copy_payment` float default NULL COMMENT '要交金额',
  PRIMARY KEY  (`copy_id`),
  KEY `FK_Reference_10` (`client_id`),
  CONSTRAINT `FK_Reference_10` FOREIGN KEY (`client_id`) REFERENCES `tb_client` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_count
-- ----------------------------
CREATE TABLE `tb_count` (
  `count_id` int(11) NOT NULL auto_increment COMMENT '统计id，自增，主键',
  `count_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP COMMENT '时间',
  `count_alipay` double default NULL COMMENT '支付宝总金额',
  `count_weixin` double default NULL COMMENT '微信总金额',
  `count_other` double default NULL COMMENT '其他总金额',
  PRIMARY KEY  (`count_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_logs
-- ----------------------------
CREATE TABLE `tb_logs` (
  `log_id` varchar(255) NOT NULL COMMENT '日志id不自增，主键',
  `user_id` int(11) default NULL COMMENT '用户id，自增，主键',
  `log_num` varchar(255) default NULL COMMENT '序号',
  `log_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP COMMENT '时间使用时间戳类型',
  `log_action` varchar(255) default NULL COMMENT '行为',
  PRIMARY KEY  (`log_id`),
  KEY `FK_Reference_1` (`user_id`),
  CONSTRAINT `FK_Reference_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_overdue
-- ----------------------------
CREATE TABLE `tb_overdue` (
  `overdue_id` int(11) NOT NULL auto_increment COMMENT '逾期id，自增，主键',
  `client_id` int(11) default NULL COMMENT '客户id，不自增，主键',
  `overdue_notdegree` float default NULL COMMENT '未交水量',
  `overdue_money` float default NULL COMMENT '总金额',
  `overdue_presult` varchar(255) default NULL COMMENT '处理结果',
  `overdue_ppeople` varchar(255) default NULL COMMENT '处理人',
  PRIMARY KEY  (`overdue_id`),
  KEY `FK_Reference_8` (`client_id`),
  CONSTRAINT `FK_Reference_8` FOREIGN KEY (`client_id`) REFERENCES `tb_client` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_payment
-- ----------------------------
CREATE TABLE `tb_payment` (
  `pay_id` int(11) NOT NULL auto_increment COMMENT '缴费id，自增，主键',
  `client_id` int(11) default NULL COMMENT '客户id，不自增，主键',
  `pay_degree` float default NULL COMMENT '用水量',
  `pay_price` float default NULL COMMENT '单价',
  `pay_invoince` varchar(255) default NULL COMMENT '发票',
  `pay_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP COMMENT '时间',
  `pay_over` float default NULL COMMENT '余额',
  `pay_mode` varchar(255) default NULL COMMENT '方式',
  `pay_money` float default NULL COMMENT '金额',
  PRIMARY KEY  (`pay_id`),
  KEY `FK_Reference_7` (`client_id`),
  CONSTRAINT `FK_Reference_7` FOREIGN KEY (`client_id`) REFERENCES `tb_client` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_power
-- ----------------------------
CREATE TABLE `tb_power` (
  `power_id` int(11) NOT NULL auto_increment COMMENT '权限id,自增，主键',
  `power_name` varchar(255) default NULL COMMENT '名称',
  `power_type` varchar(255) default NULL COMMENT '类型',
  `power_url` varchar(128) default NULL COMMENT '访问url地址',
  `power_code` varchar(128) default NULL COMMENT '权限代码字符串',
  `power_depict` varchar(255) default NULL COMMENT '描述',
  `available` char(1) default NULL COMMENT '是否可用,1：可用，0不可用',
  PRIMARY KEY  (`power_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_repair
-- ----------------------------
CREATE TABLE `tb_repair` (
  `repair_id` int(11) NOT NULL auto_increment COMMENT '报修id,自增,主键',
  `client_id` int(11) default NULL COMMENT '客户id，不自增，主键',
  `repair_people` varchar(255) default NULL COMMENT '报修人',
  `repair_stime` timestamp NULL default NULL COMMENT '报修时间',
  `repair_ptime` timestamp NULL default NULL COMMENT '处理时间',
  `repair_ppeople` varchar(255) default NULL COMMENT '处理人',
  `repair_pstate` varchar(255) default NULL COMMENT '处理状态',
  `repair_depict` varchar(255) default NULL COMMENT '描述',
  `repair_remark` varchar(255) default NULL COMMENT '备注',
  `repair_degree` float default NULL COMMENT '度数',
  `repair_presult` varchar(255) default NULL COMMENT '处理结果',
  PRIMARY KEY  (`repair_id`),
  KEY `FK_Reference_6` (`client_id`),
  CONSTRAINT `FK_Reference_6` FOREIGN KEY (`client_id`) REFERENCES `tb_client` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_report
-- ----------------------------
CREATE TABLE `tb_report` (
  `report_id` int(11) NOT NULL auto_increment COMMENT '举报id，自增，主键',
  `client_id` int(11) default NULL COMMENT '客户id，不自增，主键',
  `report_time` timestamp NULL default NULL COMMENT '举报时间',
  `report_pstate` varchar(255) default NULL COMMENT '处理状态',
  `report_ptime` timestamp NULL default NULL COMMENT '处理时间',
  `report_ppeople` varchar(255) default NULL COMMENT '处理人',
  `report_people` varchar(255) default NULL COMMENT '举报人',
  `report_depict` varchar(255) default NULL COMMENT '描述',
  `report_image` varchar(255) default NULL COMMENT '图片',
  `report_presult` varchar(255) default NULL COMMENT '处理结果',
  PRIMARY KEY  (`report_id`),
  KEY `FK_Reference_9` (`client_id`),
  CONSTRAINT `FK_Reference_9` FOREIGN KEY (`client_id`) REFERENCES `tb_client` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_role
-- ----------------------------
CREATE TABLE `tb_role` (
  `role_id` int(11) NOT NULL auto_increment COMMENT '角色id,自增，主键',
  `role_name` varchar(255) default NULL COMMENT '名字',
  `role_depict` varchar(255) default NULL COMMENT '描述',
  `role_state` varchar(255) default NULL COMMENT '状态',
  `role_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP COMMENT '时间',
  `role_create` varchar(255) default NULL COMMENT '创建者',
  PRIMARY KEY  (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_role_power
-- ----------------------------
CREATE TABLE `tb_role_power` (
  `role_id` int(11) NOT NULL COMMENT '角色id,自增，主键',
  `power_id` int(11) NOT NULL COMMENT '权限id,自增，主键',
  `remark` varchar(255) default NULL COMMENT '备注',
  PRIMARY KEY  (`role_id`,`power_id`),
  KEY `FK_Reference_14` (`power_id`),
  CONSTRAINT `FK_Reference_14` FOREIGN KEY (`power_id`) REFERENCES `tb_power` (`power_id`),
  CONSTRAINT `FK_Reference_13` FOREIGN KEY (`role_id`) REFERENCES `tb_role` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_sumladder
-- ----------------------------
CREATE TABLE `tb_sumladder` (
  `sum_id` int(11) NOT NULL auto_increment COMMENT '结算id，自增，主键',
  `sum_node` float default NULL COMMENT '水量节点',
  `sum_price` float default NULL COMMENT '单价',
  `sum_node2` float default NULL COMMENT '水量节点2',
  `sum_price2` float default NULL COMMENT '单价2',
  `sun_money2` float default NULL COMMENT '金额2',
  `sum_node3` float default NULL COMMENT '水量节点3',
  `sum_price3` float default NULL COMMENT '单价3',
  `sum_money3` float default NULL COMMENT '金额3',
  PRIMARY KEY  (`sum_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_types
-- ----------------------------
CREATE TABLE `tb_types` (
  `types_id` int(11) NOT NULL auto_increment COMMENT '类型id',
  `types_type` varchar(255) default NULL COMMENT '类型',
  `types_price` float default NULL COMMENT '水费单价',
  `types_sewage` float default NULL COMMENT '污水单价',
  PRIMARY KEY  (`types_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL auto_increment COMMENT '用户id，自增，主键',
  `user_code` varchar(255) default NULL COMMENT '用户账号',
  `user_name` varchar(255) default NULL COMMENT '用户名',
  `user_pwd` varchar(255) default NULL COMMENT '密码',
  `salt` varchar(64) default NULL COMMENT '盐',
  `locked` char(1) default NULL COMMENT '账号是否锁定，1：锁定，0未锁定',
  `user_tel` char(13) default NULL COMMENT '电话,这里我们以移动电话为主',
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_user_role
-- ----------------------------
CREATE TABLE `tb_user_role` (
  `user_id` int(11) NOT NULL COMMENT '用户id，自增，主键',
  `role_id` int(11) NOT NULL COMMENT '角色id,自增，主键',
  `remark` varchar(255) default NULL COMMENT '备注',
  PRIMARY KEY  (`user_id`,`role_id`),
  KEY `FK_Reference_12` (`role_id`),
  CONSTRAINT `FK_Reference_12` FOREIGN KEY (`role_id`) REFERENCES `tb_role` (`role_id`),
  CONSTRAINT `FK_Reference_11` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', 'admin', '', '1501810483', '2130706433', null, '');
INSERT INTO `dp` VALUES ('1', '首都地区水质空间差异明显北京深层地下水符合饮用水源要求1', '2009-09-09 00:00:00', '华龙网3月21日17时讯（记者 董进 实习生 余靖雯）“水是生命之源”。明天就是“世界水日”了，近年来人们一方面对节约水资源、保护水环境、减少水污染等方面越...', 'upload/cover/2017-07-24/6041169643465ef43deda8588d558ca1.png', '<p><img src=\"/upload/image/20170724/1500867918131754.png\" title=\"1500867918131754.png\" alt=\"3.png\"/></p><p>记者14日从北京市环保局获悉，监测数据显示，2015年北京地区水质空间差异较大，上游地表水水质总体好于下游。同时深层地下水也明显好于浅层地下水，符合国家饮用水水源要求。未来，北京将进一步加强饮用水水源保护治理。</p><p><br/></p><p>据北京市环保局通报，2015年北京市地表水水质总体稳定，但空间差异明显，上游地区的水库、湖泊、河流的水质状况总体好于下游。五大水系中，潮白河系水质最好，大清河系和北运河系水质总体较差。城市下游不达标水体断面中化学需氧量、氨氮年均浓度值分别为64.1毫克/升和9.2毫克/升，与上年相比分别上升3.7%、下降5.2%。</p><p>同时针对社会普遍关心的地下水质量情况。北京市环保局水和生态处处长韩永岐表示，从监测数据来看，北京浅层地下水超过国家三类标准的比例总体处于40%到50%之间，其中大约20%是受人为因素影响，其余是天然背景环境导致的超标。但是深层地下水的情况没有问题，符合国家关于饮用水水源的要求。</p><p><br/></p><p>据介绍，“十二五”期间，北京市不断加大污染减排力度，开展水污染深度治理，同时采取建设生态清洁小流域、退耕还林、搬迁规模化养殖场等措施，严格保护饮用水源。2015年，北京完成6座污水处理厂和再生水厂建设和升级改造，中心城区污水处理率达到98%，郊区污水处理率达到67%，再生水利用量达到9.5亿立方米。</p><p><br/></p>');
INSERT INTO `government_affairs` VALUES ('1', '中华人民共和国水污染防治法1', '2011-09-09 00:00:00', '<p>第一章 总 则</p><p>　　第一条为保护和改善生活环境与生态环境，防治污染和其他公害，保障人体健康，促进社会主义现代化建设的发展，制定本法。</p><p>　　第二条本法所称环境，是指影响人类生存和发展的各种天然的和经过人工改造的自然因素的总体，包括大气、水、海洋、土地、矿藏、森林、草原、野生生物、自然遗迹、人文遗迹、自然保护区、风景名胜区、城市和乡村等。</p><p>　　第三条本法适用于中华人民共和国领域和中华人民共和国管辖的其他海域。</p><p>　　第四条国家制定的环境保护规划必须纳入国民经济和社会发展计划，国家采取有利于环境保护的经济、技术政策和措施，使环境保护工作同经济建设和社会发展相协调。</p><p>　　第五条国家鼓励环境保护科学教育事业的发展，加强环境保护科学技术的研究和开发，提高环境保护科学技术水平，普及环境保护的科学知识。</p><p>　　第六条一切单位和个人都有保护环境的义务，并有权对污染和破坏环境的单位和个人进行检举和控告。</p><p>　　第七条国务院环境保护行政主管部门，对全国环境保护工作实施统一监督管理。</p><p>　　县级以上地方人民政府环境保护行政主管部门，对本辖区的环境保护工作实施统一监督管理。</p><p>　　国家海洋行政主管部门、港务监督、渔政渔港监督、军队环境保护部门和各级公安、交通、铁道、民航管理部门，依照有关法律的规定对环境污染防治实施监督管理。</p><p>　　县级以上人民政府的土地、矿产、林业、农业、水利行政主管部门，依照有关法律的规定对资源的保护实施监督管理。</p><p>　　第八条对保护环境有显著成绩的单位和个人，由人民政府给予奖励。</p><p>第二章 环境监督管理</p><p>　　第九条国务院环境保护行政主管部门制定国家环境质量标准。</p><p>　　省、自治区、直辖市人民政府对国家环境质量标准中未作规定的项目，可以制定地方环境质量标准，并报国务院环境保护行政主管部门备案。</p><p>　　第十条国务院环境保护行政主管部门根据国家环境质量标准和国家经济、技术条件，制定国家污染物排放标准。</p><p>　　省、自治区、直辖市人民政府对国家污染物排放标准中未作规定的项目，可以制定地方污染物排放标准；对国家污染物排放标准中已作规定的项目，可以制定严于国家污染物排放标准的地方污染物排放标准。地方污染物排放标准须报国务院环境保护行政主管部门备案。</p><p>　　凡是向已有地方污染物排放标准的区域排放污染物的，应当执行地方污染物排放标准。</p><p>　　第十一条国务院环境保护行政主管部门建立监测制度，制定监测规范，会同有关部门组织监测网络，加强对环境监测和管理。国务院和省、自治区、直辖市人民政府的环境保护行政主管部门，应当定期发布环境状况公报。</p><p>　　第十二条县级以上人民政府环境保护行政主管部门，应当会同有关部门对管辖范围内的环境状况进行调查和评价，拟订环境保护规划，经计划部门综合平衡后，报同级人民政府批准实施。</p><p>　　第十三条建设污染环境的项目，必须遵守国家有关建设项目环境保护管理的规定。</p><p>　　建设项目的环境影响报告书，必须对建设项目产生的污染和对环境的影响作出评价，规定防治措施，经项目主管部门预审并依照规定的程序报环境保护行政主管部门批准。环境影响报告书经批准后，计划部门方可批准建设项目设计任务书。</p><p>　　第十四条县级以上人民政府环境保护行政主管部门或者其他依照法律规定行使环境监督管理权的部门，有权对管辖范围内的排污单位进行现场检查。被检查的单位应当如实反映情况，提供必要的资料。检查机关应当为被检查的单位保守技术秘密和业务秘密。</p><p>　　第十五条跨行政区的环境污染和环境破坏的防治工作，由有关地方人民政府协商解决，或者由上级人民政府协调解决，做出决定。</p><p>第三章 保护和改善环境</p><p>　　第十六条地方各级人民政府，应当对本辖区的环境质量负责，采取措施改善环境质量。</p><p>　　第十七条各级人民政府对具有代表性的各种类型的自然生态系统区域，珍稀、濒危的野生动植物自然分布区域，重要的水源涵养区域，具有重大科学文化价值的地质构造、著名溶洞和化石分布区、冰川、火山、温泉等自然遗迹，以及人文遗迹、古树名木，应当采取措施加以保护，严禁破坏。</p><p>　　第十八条在国务院、国务院有关主管部门和省、自治区、直辖市人民政府划定的风景名胜区、自然保护区和其他需要特别保护的区域内，不得建设污染环境的工业生产设施；建设其他设施，其污染物排放不得超过规定的排放标准。已经建成的设施，其污染物排放超过规定的排放标准的，限期治理。</p><p>　　第十九条开发利用自然资源，必须采取措施保护生态环境。</p><p>　　第二十条各级人民政府应当加强对农业环境的保护，防治土壤污染、土地沙化、盐渍化、贫瘠化、沼泽化、地面沉降和防治植被破坏、水土流失、水源枯竭、种源灭绝以及其他生态失调现象的发生和发展，推广植物病虫害的综合防治，合理使用化肥、农药及植物生长激素。</p><p><br/></p>');
INSERT INTO `tb_power` VALUES ('1', '系统维护', 'menu', null, '', null, null);
INSERT INTO `tb_power` VALUES ('2', '抄表管理', 'menu', null, null, null, null);
INSERT INTO `tb_power` VALUES ('3', '缴费管理', 'menu', null, null, null, null);
INSERT INTO `tb_power` VALUES ('4', '用户管理', 'menu', null, null, null, null);
INSERT INTO `tb_power` VALUES ('5', '报修管理', 'menu', null, null, null, null);
INSERT INTO `tb_power` VALUES ('6', '抄表录入', 'permission', null, 'meterRead:add', null, null);
INSERT INTO `tb_power` VALUES ('7', '抄表列表', 'permission', null, 'meterRead:list', null, null);
INSERT INTO `tb_power` VALUES ('8', '报修提交', 'permission', null, 'meterRead:repair_submit', null, null);
INSERT INTO `tb_power` VALUES ('9', '举报提交', 'permission', null, 'meterRead:report_submit', null, null);
INSERT INTO `tb_power` VALUES ('10', '缴费录入', 'permission', null, 'pay:add', null, null);
INSERT INTO `tb_power` VALUES ('11', '缴费统计', 'permission', null, 'pay:select', null, null);
INSERT INTO `tb_power` VALUES ('12', '逾期', 'permission', null, 'pay:overdue_look', null, null);
INSERT INTO `tb_power` VALUES ('13', '处理结果', 'permission', null, 'pay:result', null, null);
INSERT INTO `tb_power` VALUES ('14', '打印数据', 'permission', null, 'pay:date', null, null);
INSERT INTO `tb_power` VALUES ('15', '收费明细', 'permission', null, 'pay:detail', null, null);
INSERT INTO `tb_power` VALUES ('16', '用户列表', 'permission', '/ClientList', 'user:list', null, null);
INSERT INTO `tb_power` VALUES ('17', '添加用户', 'permission', null, 'user:add', null, null);
INSERT INTO `tb_power` VALUES ('18', '修改用户信息', 'permission', null, 'user:update', null, null);
INSERT INTO `tb_power` VALUES ('19', '报修列表', 'permission', null, 'mend:list', null, null);
INSERT INTO `tb_power` VALUES ('20', '报修查看', 'permission', null, 'mend:repair_select', null, null);
INSERT INTO `tb_power` VALUES ('21', '报修处理', 'permission', null, 'mend:deal', null, null);
INSERT INTO `tb_power` VALUES ('22', '举报列表', 'permission', null, 'mend:list', null, null);
INSERT INTO `tb_power` VALUES ('23', '举报查看', 'permission', null, 'mend:report_select', null, null);
INSERT INTO `tb_power` VALUES ('24', '用户删除', 'permission', null, 'user:delete', null, null);
INSERT INTO `tb_power` VALUES ('25', '抄表详情查看', 'permission', null, 'meterRead:select', null, null);
INSERT INTO `tb_power` VALUES ('26', '系统全部操作', 'permission', null, 'sys:all', null, null);
INSERT INTO `tb_role` VALUES ('1', '超级管理员', null, null, '2017-08-04 10:56:12', null);
INSERT INTO `tb_role_power` VALUES ('1', '1', null);
INSERT INTO `tb_role_power` VALUES ('1', '2', null);
INSERT INTO `tb_role_power` VALUES ('1', '3', null);
INSERT INTO `tb_role_power` VALUES ('1', '4', null);
INSERT INTO `tb_role_power` VALUES ('1', '5', null);
INSERT INTO `tb_role_power` VALUES ('1', '6', null);
INSERT INTO `tb_role_power` VALUES ('1', '7', null);
INSERT INTO `tb_role_power` VALUES ('1', '8', null);
INSERT INTO `tb_role_power` VALUES ('1', '9', null);
INSERT INTO `tb_role_power` VALUES ('1', '10', null);
INSERT INTO `tb_role_power` VALUES ('1', '11', null);
INSERT INTO `tb_role_power` VALUES ('1', '12', null);
INSERT INTO `tb_role_power` VALUES ('1', '13', null);
INSERT INTO `tb_role_power` VALUES ('1', '14', null);
INSERT INTO `tb_role_power` VALUES ('1', '15', null);
INSERT INTO `tb_role_power` VALUES ('1', '16', null);
INSERT INTO `tb_role_power` VALUES ('1', '17', null);
INSERT INTO `tb_role_power` VALUES ('1', '18', null);
INSERT INTO `tb_role_power` VALUES ('1', '19', null);
INSERT INTO `tb_role_power` VALUES ('1', '20', null);
INSERT INTO `tb_role_power` VALUES ('1', '21', null);
INSERT INTO `tb_role_power` VALUES ('1', '22', null);
INSERT INTO `tb_role_power` VALUES ('1', '23', null);
INSERT INTO `tb_role_power` VALUES ('1', '24', null);
INSERT INTO `tb_role_power` VALUES ('1', '25', null);
INSERT INTO `tb_role_power` VALUES ('1', '26', null);
INSERT INTO `tb_user` VALUES ('1', null, '欧阳格', 'admin', null, null, null);
INSERT INTO `tb_user_role` VALUES ('1', '1', '欧阳格是超级管理员');
