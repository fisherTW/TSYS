-- phpMyAdmin SQL Dump
-- version 2.11.2.1
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 建立日期: Apr 30, 2015, 09:18 AM
-- 伺服器版本: 5.0.45
-- PHP 版本: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 資料庫: `tsys`
--

-- --------------------------------------------------------

--
-- 資料表格式： `attachment`
--

DROP TABLE IF EXISTS `attachment`;
CREATE TABLE `attachment` (
  `t_id` int(11) NOT NULL,
  `row` tinyint(4) NOT NULL default '0',
  `type` int(11) NOT NULL COMMENT '1=photo,2=resume,3=cover letter,4=passport,5=recommendation letter,6=3-min self introduction video,7=10-15 min teaching demostration video',
  `path` varchar(50) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`t_id`,`row`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 列出以下資料庫的數據： `attachment`
--

INSERT INTO `attachment` (`t_id`, `row`, `type`, `path`) VALUES
(0, 0, 1, '20150410_064911_41.jpg'),
(0, 1, 1, '20150410_064914_82.jpg'),
(97, 0, 1, '20150411_030631_43.jpg'),
(97, 1, 1, '20150411_030632_44.jpg'),
(100, 0, 1, '20150318_061024_95.jpg'),
(100, 0, 3, '20150318_061058_81.jpg'),
(100, 0, 4, '20150310_085458_47.jpg'),
(100, 0, 5, '20150318_061109_12.jpg'),
(100, 0, 6, '20150318_041546_35.mp4'),
(100, 0, 7, '20150318_041452_8.mp4'),
(100, 1, 1, '20150326_025958_15.jpg'),
(101, 0, 1, '20150415_084257_71.jpg'),
(101, 0, 3, '20150415_084724_97.png'),
(101, 0, 4, '20150415_084625_62.PNG'),
(101, 0, 5, '20150415_084729_48.png'),
(101, 0, 6, '20150415_092203_8.mp4'),
(101, 0, 7, '20150416_011941_27.mp4'),
(101, 1, 1, '20150416_012400_6.jpg');

-- --------------------------------------------------------

--
-- 資料表格式： `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `id` int(11) NOT NULL auto_increment,
  `t_id` int(11) NOT NULL,
  `action_type` varchar(1) collate utf8_unicode_ci NOT NULL COMMENT 'CRUD',
  `u_id` smallint(6) NOT NULL,
  `log_time` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `column_name` varchar(50) collate utf8_unicode_ci NOT NULL COMMENT 'edit 才要記',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- 列出以下資料庫的數據： `log`
--


-- --------------------------------------------------------

--
-- 資料表格式： `mapping_certificate`
--

DROP TABLE IF EXISTS `mapping_certificate`;
CREATE TABLE `mapping_certificate` (
  `id` smallint(6) NOT NULL,
  `tw` varchar(100) collate utf8_unicode_ci NOT NULL,
  `en` varchar(50) collate utf8_unicode_ci default NULL,
  `cn` varchar(50) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 列出以下資料庫的數據： `mapping_certificate`
--

INSERT INTO `mapping_certificate` (`id`, `tw`, `en`, `cn`) VALUES
(1, '可任職於公立學校之K-12年級授課合格教師證', 'Certified teaching license for K-12 public school', '可任职于公立学校之K-12年级授课合格教师证'),
(2, '代課教師許可證', 'Substitute teaching permit', '代课教师许可证'),
(3, 'TESOL', 'TESOL', 'TESOL'),
(4, 'TEFL', 'TEFL', 'TEFL'),
(5, 'CELTA', 'CELTA', 'CELTA');

-- --------------------------------------------------------

--
-- 資料表格式： `mapping_degree`
--

DROP TABLE IF EXISTS `mapping_degree`;
CREATE TABLE `mapping_degree` (
  `id` tinyint(4) NOT NULL,
  `tw` varchar(50) collate utf8_unicode_ci NOT NULL,
  `en` varchar(50) collate utf8_unicode_ci default NULL,
  `cn` varchar(50) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 列出以下資料庫的數據： `mapping_degree`
--

INSERT INTO `mapping_degree` (`id`, `tw`, `en`, `cn`) VALUES
(1, '博士', 'Doctorate', '博士'),
(2, '碩士', 'Master', '硕士'),
(3, '學士', 'Bachelor', '学士'),
(4, '2-4年制學位文憑', 'Diploma', '2-4年制学位文凭');

-- --------------------------------------------------------

--
-- 資料表格式： `mapping_depart`
--

DROP TABLE IF EXISTS `mapping_depart`;
CREATE TABLE `mapping_depart` (
  `id` tinyint(4) NOT NULL,
  `tw` varchar(10) collate utf8_unicode_ci NOT NULL,
  `en` varchar(50) collate utf8_unicode_ci default NULL,
  `cn` varchar(50) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 列出以下資料庫的數據： `mapping_depart`
--

INSERT INTO `mapping_depart` (`id`, `tw`, `en`, `cn`) VALUES
(1, '線上師', NULL, NULL),
(2, '實體師', NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表格式： `mapping_good`
--

DROP TABLE IF EXISTS `mapping_good`;
CREATE TABLE `mapping_good` (
  `id` smallint(6) NOT NULL auto_increment,
  `tw` varchar(20) collate utf8_unicode_ci NOT NULL,
  `en` varchar(50) collate utf8_unicode_ci default NULL,
  `cn` varchar(50) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- 列出以下資料庫的數據： `mapping_good`
--

INSERT INTO `mapping_good` (`id`, `tw`, `en`, `cn`) VALUES
(1, '自助旅行', 'backpacking', '自助旅行'),
(2, '登山健行', 'hiking', '登山健行'),
(3, '攝影', 'photography', '摄影'),
(4, '溜冰/滑雪/直排輪', 'ice skating/ skiing/ inline skating', '溜冰/滑雪/直排轮'),
(5, '樂器', 'musical instruments', '乐器'),
(6, '翻譯/寫作', 'translation/ writing', '翻译/写作'),
(7, '多媒體', 'multimedia', '多媒体'),
(8, '電腦/資訊', 'computer/ database', '电脑/资讯'),
(9, '決策分析', 'decision analysis', '决策分析'),
(10, '創作', 'literary and artistic creation', '创作'),
(11, '品酒', 'wine tasting', '品酒'),
(12, '人力資源管理', 'human resource management', '人力资源管理'),
(13, '行銷', 'marketing', '行销'),
(14, '理財投資', 'financial planning', '理财投资'),
(15, '餐飲', 'culinary arts', '餐饮'),
(16, '會計', 'accounting', '会计'),
(17, '醫護', 'medical care', '医护'),
(18, '營養學', 'nutrition', '营养学'),
(19, '心理學', 'psychology', '心理学'),
(20, '智慧財產權', 'intellectual property rights', '智慧财产权');

-- --------------------------------------------------------

--
-- 資料表格式： `mapping_hi_e_status`
--

DROP TABLE IF EXISTS `mapping_hi_e_status`;
CREATE TABLE `mapping_hi_e_status` (
  `id` tinyint(4) NOT NULL,
  `tw` varchar(20) collate utf8_unicode_ci NOT NULL,
  `en` varchar(50) collate utf8_unicode_ci default NULL,
  `cn` varchar(50) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 列出以下資料庫的數據： `mapping_hi_e_status`
--


-- --------------------------------------------------------

--
-- 資料表格式： `mapping_interest`
--

DROP TABLE IF EXISTS `mapping_interest`;
CREATE TABLE `mapping_interest` (
  `id` smallint(6) NOT NULL auto_increment,
  `tw` varchar(20) collate utf8_unicode_ci NOT NULL,
  `en` varchar(50) collate utf8_unicode_ci default NULL,
  `cn` varchar(50) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- 列出以下資料庫的數據： `mapping_interest`
--

INSERT INTO `mapping_interest` (`id`, `tw`, `en`, `cn`) VALUES
(1, '語言', 'languages', '语言'),
(2, '流行', 'fashion', '流行'),
(3, '音樂', 'music', '音乐'),
(4, '文化', 'culture', '文化'),
(5, '舞蹈', 'dance', '舞蹈'),
(6, '電影', 'movies', '电影'),
(7, '藝術', 'arts', '艺术'),
(8, '美食', 'food', '美食'),
(9, '旅遊', 'travel', '旅游'),
(10, '名人', 'celebrities', '名人'),
(11, '體育', 'sports', '体育'),
(12, '汽車', 'cars', '汽车'),
(13, '商業', 'business', '商业'),
(14, '電腦', 'computer', '电脑'),
(15, '教育與教學', 'educaion and  instruction', '教育与教学'),
(16, '經營管理', 'business and management', '经营管理'),
(17, '健康醫學', 'health sciences', '健康医学'),
(18, '科技', 'science and technology', '科技'),
(19, '社會科學', 'social sciences', '社会科学'),
(20, '投資理財', 'financial planning', '投资理财'),
(21, '創作', 'literary and artistic creation', '创作');

-- --------------------------------------------------------

--
-- 資料表格式： `mapping_lang`
--

DROP TABLE IF EXISTS `mapping_lang`;
CREATE TABLE `mapping_lang` (
  `id` smallint(6) NOT NULL,
  `tw` varchar(20) collate utf8_unicode_ci NOT NULL,
  `en` varchar(50) collate utf8_unicode_ci default NULL,
  `cn` varchar(50) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 列出以下資料庫的數據： `mapping_lang`
--

INSERT INTO `mapping_lang` (`id`, `tw`, `en`, `cn`) VALUES
(1, '英文', 'English', '英文'),
(2, '西文', 'Spanish', '西文'),
(3, '法文', 'French', '法文'),
(4, '德文', 'German', '德文'),
(5, '華文', 'Chinese', '华文'),
(6, '日文', 'Japanese', '日文'),
(7, '韓文', 'Korean', '韩文'),
(8, '菲律賓語', 'Tagalog', '菲律宾语'),
(9, '越文', 'Vietnamese', '越文'),
(10, '泰文', 'Thai', '泰文'),
(11, '印尼文', 'Bahasa Indonesia', '印尼文'),
(12, '義文', 'Italian', '义文'),
(13, '葡文', 'Portuguese', '葡文'),
(14, '俄文', 'Russian', '俄文'),
(15, '波蘭文', 'Porlish', '波兰文'),
(16, '阿拉伯文', 'Arabic', '阿拉伯文');

-- --------------------------------------------------------

--
-- 資料表格式： `mapping_lang_hi`
--

DROP TABLE IF EXISTS `mapping_lang_hi`;
CREATE TABLE `mapping_lang_hi` (
  `id` smallint(6) NOT NULL auto_increment,
  `tw` varchar(20) collate utf8_unicode_ci NOT NULL,
  `en` varchar(50) collate utf8_unicode_ci default NULL,
  `cn` varchar(50) collate utf8_unicode_ci default NULL,
  `group` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=37 ;

--
-- 列出以下資料庫的數據： `mapping_lang_hi`
--

INSERT INTO `mapping_lang_hi` (`id`, `tw`, `en`, `cn`, `group`) VALUES
(1, '實用英文', 'Practical English', '实用英文', 1),
(2, '文法', 'Grammar', '文法', 1),
(3, '發音', 'Pronunciation', '发音', 1),
(4, '字彙', 'Vocabulary', '字汇', 1),
(5, '閱讀', 'Reading', '阅读', 1),
(6, '聽力', 'Listening', '听力', 1),
(7, '對話', 'English Conversation', '对话', 1),
(8, '寫作', 'Writing', '写作', 1),
(9, '電影英文', 'Movie English', '电影英文', 1),
(10, '旅英', 'Travel English', '旅英', 1),
(11, '商業英文', 'Business English', '商业英文', 1),
(12, '考試檢定', 'Exam Courses', '考试检定', 1),
(13, '新聞英文', 'News English', '新闻英文', 1),
(14, '企業班', 'Corporate Courses ', '企业班', 1),
(15, '青少年英文', 'Teens English', '青少年英文', 1),
(16, '兒童英文', 'Children''s English', '儿童英文', 1),
(17, '華文', 'Chinese', '华文', 2),
(18, '日文', 'Japanese', '日文', 2),
(19, '日文檢定', 'JLPT', '日文检定', 2),
(20, '韓文', 'Korean', '韩文', 2),
(21, '韓文檢定', 'TOPIK', '韩文检定', 2),
(22, '菲律賓語', 'Tagalog', '菲律宾语', 2),
(23, '越文', 'Vietnamese', '越文', 2),
(24, '泰文', 'Thai', '泰文', 2),
(25, '印尼文', 'Bahasa Indonesia', '印尼文', 2),
(26, '法文', 'French', '法文', 3),
(27, '德文', 'German', '德文', 3),
(28, '義文', 'Italian', '义文', 3),
(29, '西文', 'Spanish', '西文', 3),
(30, '葡文', 'Portuguese', '葡文', 3),
(31, '俄文', 'Russian', '俄文', 3),
(32, '波蘭文', 'Porlish', '波兰文', 3),
(33, '阿拉伯文', 'Arabic', '阿拉伯文', 3);

-- --------------------------------------------------------

--
-- 資料表格式： `mapping_lang_hi_group`
--

DROP TABLE IF EXISTS `mapping_lang_hi_group`;
CREATE TABLE `mapping_lang_hi_group` (
  `id` tinyint(6) NOT NULL,
  `tw` varchar(20) collate utf8_unicode_ci NOT NULL,
  `en` varchar(50) collate utf8_unicode_ci default NULL,
  `cn` varchar(50) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 列出以下資料庫的數據： `mapping_lang_hi_group`
--

INSERT INTO `mapping_lang_hi_group` (`id`, `tw`, `en`, `cn`) VALUES
(1, '英文語系', 'English', '英文语系'),
(2, '亞洲語系', 'Asian Languages', '亚洲语系'),
(3, '歐語及其他語系', 'European and other Languages', '欧语及其他语系');

-- --------------------------------------------------------

--
-- 資料表格式： `mapping_personality`
--

DROP TABLE IF EXISTS `mapping_personality`;
CREATE TABLE `mapping_personality` (
  `id` smallint(6) NOT NULL auto_increment,
  `tw` varchar(20) collate utf8_unicode_ci NOT NULL,
  `en` varchar(50) collate utf8_unicode_ci default NULL,
  `cn` varchar(50) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- 列出以下資料庫的數據： `mapping_personality`
--

INSERT INTO `mapping_personality` (`id`, `tw`, `en`, `cn`) VALUES
(1, '自信謙虛', 'humble and confident', '自信谦虚'),
(2, '善體人意', 'considerate', '善体人意'),
(3, '沈靜優雅', 'calm and graceful', '沉静优雅'),
(4, '親切隨和', 'kind-hearted, and easy-going', '亲切随和'),
(5, '成熟穩重', 'mature and reliable', '成熟稳重'),
(6, '溫文儒雅', 'gentle and cultivated ', '温文儒雅'),
(7, '熱情開朗', 'warm and cheerful', '热情开朗'),
(8, '自然率真', 'natural and sincere', '自然率真'),
(9, '樂觀活潑', 'energetic, lively, and optimistic', '乐观活泼'),
(10, '有創意', 'creative', '有创意'),
(11, '幽默風趣', 'humorous', '幽默风趣'),
(12, '不拘小節', 'laid-back', '不拘小节'),
(13, '有領袖力', 'charismatic', '有领袖力'),
(14, '細心體貼', 'thoughtful, thorough and attentive', '细心体贴');

-- --------------------------------------------------------

--
-- 資料表格式： `mapping_visa`
--

DROP TABLE IF EXISTS `mapping_visa`;
CREATE TABLE `mapping_visa` (
  `id` tinyint(4) NOT NULL,
  `tw` varchar(50) collate utf8_unicode_ci NOT NULL,
  `en` varchar(50) collate utf8_unicode_ci default NULL,
  `cn` varchar(50) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 列出以下資料庫的數據： `mapping_visa`
--

INSERT INTO `mapping_visa` (`id`, `tw`, `en`, `cn`) VALUES
(1, '居留證', 'ARC', '居留证'),
(2, '依親居留證', 'JFRC', '依亲居留证'),
(3, '開放性工作許可證', 'Open Work Permit', '开放性工作许可证'),
(4, '學生工作許可證', 'Student Work Permit', '学生工作许可证'),
(5, '青年交流簽證 / 度假打工簽證', 'Youth Mobility / Working holiday', '青年交流签证 / 度假打工签证');

-- --------------------------------------------------------

--
-- 資料表格式： `mapping_work_type`
--

DROP TABLE IF EXISTS `mapping_work_type`;
CREATE TABLE `mapping_work_type` (
  `id` tinyint(4) NOT NULL,
  `tw` varchar(20) collate utf8_unicode_ci NOT NULL,
  `en` varchar(50) collate utf8_unicode_ci default NULL,
  `cn` varchar(50) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 列出以下資料庫的數據： `mapping_work_type`
--


-- --------------------------------------------------------

--
-- 資料表格式： `t`
--

DROP TABLE IF EXISTS `t`;
CREATE TABLE `t` (
  `id` int(11) NOT NULL auto_increment,
  `name_full` varchar(100) collate utf8_unicode_ci NOT NULL,
  `location` varchar(2) collate utf8_unicode_ci NOT NULL,
  `nation` varchar(2) collate utf8_unicode_ci NOT NULL,
  `sex` tinyint(1) NOT NULL default '1' COMMENT '0=f,1=m',
  `birth_date` timestamp NOT NULL default '0000-00-00 00:00:00',
  `mail` varchar(100) collate utf8_unicode_ci NOT NULL,
  `address_permanent` varchar(200) collate utf8_unicode_ci NOT NULL,
  `phone_current` varchar(20) collate utf8_unicode_ci NOT NULL,
  `skype` varchar(100) collate utf8_unicode_ci NOT NULL,
  `available_start_date` timestamp NOT NULL default '0000-00-00 00:00:00',
  `current_employment_status` tinyint(4) NOT NULL,
  `contact` smallint(6) NOT NULL,
  `recruiter` smallint(6) NOT NULL,
  `remark` text collate utf8_unicode_ci,
  `create_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL default '0000-00-00 00:00:00',
  `is_enable` tinyint(1) NOT NULL default '1' COMMENT '0 to hide ',
  `is_blacklist` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=102 ;

--
-- 列出以下資料庫的數據： `t`
--

INSERT INTO `t` (`id`, `name_full`, `location`, `nation`, `sex`, `birth_date`, `mail`, `address_permanent`, `phone_current`, `skype`, `available_start_date`, `current_employment_status`, `contact`, `recruiter`, `remark`, `create_date`, `modify_date`, `is_enable`, `is_blacklist`) VALUES
(41, 'Allison Fisher41', '41', 'GB', 1, '0000-00-00 00:00:00', '', '', '', '', '0000-00-00 00:00:00', 0, 0, 0, '000', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(42, 'Allison Fisher42', '42', 'GB', 1, '0000-00-00 00:00:00', '', '', '', '', '0000-00-00 00:00:00', 0, 0, 0, '999', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(43, 'Allison Fisher43', '', 'GB', 1, '0000-00-00 00:00:00', '', '', '', '', '0000-00-00 00:00:00', 0, 0, 0, '00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(44, 'Allison Fisher44', '', 'GB', 1, '0000-00-00 00:00:00', '', '', '', '', '0000-00-00 00:00:00', 0, 0, 0, '5', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(45, 'Allison Fisher45', '', 'GB', 1, '0000-00-00 00:00:00', '', '', '', '', '0000-00-00 00:00:00', 0, 0, 0, '5', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(46, 'Allison Fisher46', '', 'GB', 1, '0000-00-00 00:00:00', '', '', '', '', '0000-00-00 00:00:00', 0, 0, 0, '5', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(47, 'Allison Fisher47', '', 'GB', 1, '0000-00-00 00:00:00', '', '', '', '', '0000-00-00 00:00:00', 0, 0, 0, 'ddd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(48, 'Allison Fisher48', '', 'GB', 1, '0000-00-00 00:00:00', '', '', '', '', '0000-00-00 00:00:00', 0, 0, 0, 'ddd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(49, 'Allison Fisher49', '', 'GB', 1, '0000-00-00 00:00:00', '', '', '', '', '0000-00-00 00:00:00', 0, 0, 0, '888', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(50, 'Allison Fisher50', '', 'GB', 1, '0000-00-00 00:00:00', '', '', '', '', '0000-00-00 00:00:00', 0, 0, 0, '66', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(51, 'Allison Fisher51', '', 'GB', 1, '0000-00-00 00:00:00', '', '', '', '', '0000-00-00 00:00:00', 0, 0, 0, 'jjj', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(54, 'Allison Fisher54', '', 'GB', 1, '0000-00-00 00:00:00', '', '', '', '', '0000-00-00 00:00:00', 0, 0, 0, '88', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(55, 'Allison Fisher55', '', 'GB', 1, '0000-00-00 00:00:00', '', '', '', '', '0000-00-00 00:00:00', 0, 0, 0, '99', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(56, 'Allison Fisher56', '', 'GB', 1, '0000-00-00 00:00:00', '', '', '', '', '0000-00-00 00:00:00', 0, 0, 0, '99', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(57, 'Allison Fisher57', '', 'GB', 1, '0000-00-00 00:00:00', '', '', '', '', '0000-00-00 00:00:00', 0, 0, 0, '9999', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(58, 'Allison Fisher58', '', 'GB', 1, '0000-00-00 00:00:00', '', '', '', '', '0000-00-00 00:00:00', 0, 0, 0, 'gg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(60, 'Allison Fisher60', '', 'GB', 1, '0000-00-00 00:00:00', '', '', '', '', '0000-00-00 00:00:00', 0, 0, 0, '00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(61, 'Allison Fisher61', '', 'GB', 1, '0000-00-00 00:00:00', '', '', '', '', '0000-00-00 00:00:00', 0, 0, 0, '000', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(62, 'Allison Fisher62', '', 'GB', 1, '0000-00-00 00:00:00', '', '', '', '', '0000-00-00 00:00:00', 0, 0, 0, '77', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(63, 'Allison Fisher63', '', 'GB', 1, '0000-00-00 00:00:00', '', '', '', '', '0000-00-00 00:00:00', 0, 0, 0, 'ff', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(64, 'Allison Fisher64', '', 'GB', 1, '0000-00-00 00:00:00', '', '', '', '', '0000-00-00 00:00:00', 0, 0, 0, 'rrr', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(65, 'Allison Fisher65', '', 'GB', 1, '0000-00-00 00:00:00', '', '', '', '', '0000-00-00 00:00:00', 0, 0, 0, 'hh', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(66, 'Allison Fisher66', '', 'GB', 1, '0000-00-00 00:00:00', '', '', '', '', '0000-00-00 00:00:00', 0, 0, 0, 'ccccc', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(71, 'Allison Fisher71', '0', 'GB', 0, '0000-00-00 00:00:00', '0', '0', '0', '0', '0000-00-00 00:00:00', 0, 0, 0, '0', '2015-02-06 07:13:24', '2015-02-06 07:13:24', 0, 0),
(72, 'Allison Fisher72', 'AD', 'GB', 0, '2015-02-04 00:00:00', 'rr', 'rr', 'r', 'rr', '2015-02-04 00:00:00', 1, 1, 1, '0', '2015-02-04 07:29:21', '2015-02-04 07:29:21', 0, 0),
(73, 'Allison Fisher73', 'AD', 'GB', 0, '2015-02-04 00:00:00', 'rr', 'rr', 'r', 'rr', '2015-02-04 00:00:00', 1, 1, 1, '0', '2015-02-04 07:30:52', '2015-02-04 07:30:52', 0, 0),
(74, 'Allison Fisher74', 'AD', 'GB', 0, '2015-02-04 00:00:00', 'rr', 'rr', 'r', 'rr', '2015-02-04 00:00:00', 1, 1, 1, '0', '2015-02-04 07:31:13', '2015-02-04 07:31:13', 0, 0),
(75, 'Allison Fisher75', 'AD', 'GB', 0, '2015-02-04 00:00:00', 'rr', 'rr', 'r', 'rr', '2015-02-04 00:00:00', 1, 1, 1, '0', '2015-02-04 07:37:23', '2015-02-04 07:37:23', 0, 0),
(76, 'Allison Fisher76', 'AD', 'GB', 0, '2015-02-04 00:00:00', 'rr', 'rr', 'r', 'rr', '2015-02-04 00:00:00', 1, 1, 1, '0', '2015-02-04 07:38:14', '2015-02-04 07:38:14', 0, 0),
(77, 'Allison Fisher77', 'AD', 'GB', 0, '2015-02-04 00:00:00', 'rr', 'rr', 'r', 'rr', '2015-02-04 00:00:00', 1, 1, 1, '0', '2015-02-04 08:09:17', '2015-02-04 08:09:17', 0, 0),
(78, 'Allison Fisher78', 'AD', 'GB', 0, '2015-02-04 00:00:00', 'rr', 'rr', 'r', 'rr', '2015-02-04 00:00:00', 1, 1, 1, '0', '2015-02-04 08:50:01', '2015-02-04 08:50:01', 0, 0),
(79, 'Allison Fisher79', 'AD', 'GB', 0, '2015-02-04 00:00:00', 'rr', 'rr', 'r', 'rr', '2015-02-04 00:00:00', 1, 1, 1, '0', '2015-02-04 08:50:31', '2015-02-04 08:50:31', 0, 0),
(80, 'Allison Fisher80', 'AD', 'GB', 0, '2015-02-04 00:00:00', 'rr', 'rr', 'r', 'rr', '2015-02-04 00:00:00', 1, 1, 1, '0', '2015-02-04 08:51:07', '2015-02-04 08:51:07', 0, 0),
(81, 'Allison Fisher81', 'AD', 'GB', 0, '2015-02-04 00:00:00', 'rr', 'rr', 'r', 'rr', '2015-02-04 00:00:00', 1, 1, 1, '0', '2015-02-04 08:52:40', '2015-02-04 08:52:40', 0, 0),
(82, 'Allison Fisher82', 'AD', 'GB', 0, '2015-02-04 00:00:00', 'rr', 'rr', 'r', 'rr', '2015-02-04 00:00:00', 1, 1, 1, '0', '2015-02-04 09:00:31', '2015-02-04 09:00:31', 0, 0),
(83, 'Allison Fisher83', 'AD', 'GB', 0, '2015-02-04 00:00:00', '66', '55', '6', '6', '2015-02-04 00:00:00', 1, 1, 1, '0', '2015-02-04 09:01:01', '2015-02-04 09:01:01', 0, 0),
(84, 'Allison Fisher84', 'AD', 'GB', 0, '2015-02-04 00:00:00', 'g', 'f', 'f', 'f', '2015-02-04 00:00:00', 1, 1, 1, '0', '2015-02-04 09:20:22', '2015-02-04 09:20:22', 0, 0),
(85, 'Allison Fisher85', 'AD', 'GB', 0, '2015-02-04 00:00:00', 'g', 'f', 'f', 'f', '2015-02-04 00:00:00', 1, 1, 1, '0', '2015-02-04 09:21:27', '2015-02-04 09:21:27', 0, 0),
(86, 'Allison Fisher86', 'AD', 'GB', 0, '2015-02-04 00:00:00', 'g', 'f', 'f', 'f', '2015-02-04 00:00:00', 1, 1, 1, '0', '2015-02-04 09:22:08', '2015-02-04 09:22:08', 0, 0),
(87, 'Allison Fisher87', 'AD', 'GB', 0, '2015-02-06 00:00:00', 's', 's', 's', 's', '2015-02-06 00:00:00', 1, 1, 1, '0', '2015-02-06 04:09:29', '2015-02-06 04:09:29', 0, 0),
(88, 'Allison Fisher88', 'AD', 'GB', 0, '2015-02-06 00:00:00', 's', 's', 's', 's', '2015-02-06 00:00:00', 1, 1, 1, '0', '2015-02-06 05:50:23', '2015-02-06 05:50:23', 0, 0),
(89, 'Allison Fisher89', '0', 'GB', 0, '0000-00-00 00:00:00', '0', '0', '0', '0', '0000-00-00 00:00:00', 0, 0, 0, '0', '2015-02-06 06:59:06', '2015-02-06 06:59:06', 0, 0),
(90, 'Allison Fisher90', 'AD', 'GB', 0, '2015-02-06 00:00:00', 's', 's', 's', 's', '2015-02-06 00:00:00', 1, 1, 1, '0', '2015-02-06 06:32:59', '2015-02-06 06:32:59', 0, 0),
(91, 'Allison Fisher91', 'AD', 'GB', 0, '2015-02-06 00:00:00', 's', 's', 's', 's', '2015-02-06 00:00:00', 1, 1, 1, '0', '2015-02-06 06:33:23', '2015-02-06 06:33:23', 0, 0),
(92, 'Allison Fisher92', 'AD', 'GB', 0, '2015-02-06 00:00:00', 's66', 's66', 's66', 's66', '2015-02-06 00:00:00', 1, 1, 1, '0', '2015-02-06 08:59:54', '2015-02-06 08:59:54', 0, 0),
(93, 'Allison Fisher93', 'AD', 'GB', 0, '2015-02-06 00:00:00', 'sdf', 'fsd', 'fsd', 'sdf', '2015-02-06 00:00:00', 1, 1, 1, '0', '2015-02-06 07:53:27', '2015-02-06 07:53:27', 0, 0),
(94, 'Allison Fisher94', 'AD', 'GB', 0, '2015-02-06 00:00:00', 'df', 'gdf', 'gf', 'dg', '2015-02-06 00:00:00', 1, 1, 1, '', '2015-02-06 08:31:14', '2015-02-06 08:31:14', 1, 0),
(95, 'Allison Fisher95', 'AD', 'GB', 0, '2015-02-06 00:00:00', 'df', 'gdf', 'gf', 'dg', '2015-02-06 00:00:00', 1, 1, 1, '', '2015-02-06 08:34:00', '2015-02-06 08:34:00', 1, 0),
(100, 'George Clooney', 'AD', 'US', 1, '1980-01-05 00:00:00', '99e', '0', '99p', '99s', '2015-02-28 00:00:00', 1, 2, 2, '0', '2015-02-06 09:04:34', '2015-04-22 05:46:01', 1, 0),
(101, '中川翔子', 'TW', 'JP', 0, '2015-04-15 00:00:00', 'fsdf', 'fsa', 'asdfsa', 'fsadfsaf', '2015-04-15 00:00:00', 2, 3, 2, '0', '2015-04-15 08:36:22', '2015-04-22 05:45:31', 1, 0);

-- --------------------------------------------------------

--
-- 資料表格式： `t_certificate`
--

DROP TABLE IF EXISTS `t_certificate`;
CREATE TABLE `t_certificate` (
  `t_id` int(11) NOT NULL,
  `certificate` smallint(6) NOT NULL,
  `file` varchar(100) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`t_id`,`certificate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 列出以下資料庫的數據： `t_certificate`
--

INSERT INTO `t_certificate` (`t_id`, `certificate`, `file`) VALUES
(86, 2, ''),
(86, 3, ''),
(101, 4, '');

-- --------------------------------------------------------

--
-- 資料表格式： `t_degree`
--

DROP TABLE IF EXISTS `t_degree`;
CREATE TABLE `t_degree` (
  `t_id` int(11) NOT NULL,
  `degree` tinyint(4) NOT NULL,
  `file` varchar(100) collate utf8_unicode_ci NOT NULL,
  `year_grad` varchar(4) collate utf8_unicode_ci NOT NULL,
  `school_name` varchar(50) collate utf8_unicode_ci NOT NULL,
  `nation` varchar(2) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`t_id`,`degree`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 列出以下資料庫的數據： `t_degree`
--

INSERT INTO `t_degree` (`t_id`, `degree`, `file`, `year_grad`, `school_name`, `nation`) VALUES
(90, 1, '', 'rrr', 'ttt', 'AD'),
(90, 3, '', 'yyy', 'yyy', 'AD'),
(91, 1, '', 'rrr0', 'ttt00', 'BD'),
(91, 3, '', 'yyy0', 'yyy00', 'BD'),
(92, 4, '', '564', '546', 'BE'),
(96, 3, '', '55', '', 'AD'),
(96, 4, '', '66', '', 'AD'),
(99, 3, '', '', '', 'AD'),
(99, 4, '', '', '', 'AD'),
(100, 2, '', 'b1', 'b2', 'CC'),
(100, 3, '', 'c1', 'c2', 'DM'),
(100, 4, '', 'd1', 'd2', 'EG');

-- --------------------------------------------------------

--
-- 資料表格式： `t_depart`
--

DROP TABLE IF EXISTS `t_depart`;
CREATE TABLE `t_depart` (
  `u_id` int(11) NOT NULL,
  `depart_id` tinyint(4) NOT NULL,
  `phase` tinyint(4) NOT NULL default '0' COMMENT '0 to 5',
  `is_up` tinyint(1) NOT NULL default '0' COMMENT '上架',
  PRIMARY KEY  (`u_id`,`depart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='外師或線上或其他';

--
-- 列出以下資料庫的數據： `t_depart`
--

INSERT INTO `t_depart` (`u_id`, `depart_id`, `phase`, `is_up`) VALUES
(1, 2, 0, 0),
(2, 2, 0, 0),
(3, 1, 0, 0),
(3, 2, 0, 0),
(4, 1, 0, 0),
(5, 1, 0, 0),
(5, 2, 0, 0),
(6, 1, 0, 0),
(7, 1, 0, 0),
(8, 1, 0, 0),
(8, 2, 0, 0),
(9, 2, 0, 0),
(10, 2, 0, 0),
(11, 2, 0, 0),
(12, 2, 0, 0),
(13, 2, 0, 0),
(14, 1, 0, 0),
(14, 2, 0, 0),
(15, 2, 0, 0),
(16, 2, 0, 0),
(17, 2, 0, 0),
(18, 2, 0, 0),
(19, 2, 0, 0),
(20, 2, 0, 0),
(21, 1, 0, 0),
(21, 2, 0, 0),
(22, 1, 0, 0),
(22, 2, 0, 0),
(23, 2, 0, 0),
(24, 2, 0, 0),
(25, 2, 0, 0),
(26, 2, 0, 0),
(27, 2, 0, 0),
(28, 1, 0, 0);

-- --------------------------------------------------------

--
-- 資料表格式： `t_fo`
--

DROP TABLE IF EXISTS `t_fo`;
CREATE TABLE `t_fo` (
  `t_id` int(11) NOT NULL,
  `is_validate` tinyint(1) NOT NULL default '0',
  `is_ignore` tinyint(1) NOT NULL default '0',
  `work_hour` tinyint(3) unsigned NOT NULL default '0' COMMENT '0=full time, num=x weekly hour',
  `location_preference` smallint(6) NOT NULL default '0' COMMENT '[sum]1=city,2=suburban,4=countryside',
  `teaching_preference` smallint(6) NOT NULL default '0' COMMENT '[sum]1=Senior high school (G10-12),2=Junior high school  (G7-9),4=Elementary school (G1-6),8=Language School,16=企業講師,32=大學',
  `sp_need` text collate utf8_unicode_ci,
  `q1` text collate utf8_unicode_ci COMMENT 'What do you want to offer for students in Taiwan?',
  `q2` text collate utf8_unicode_ci COMMENT 'What is your strength / weakness as a language instructor ?',
  `q3` text collate utf8_unicode_ci COMMENT 'Every school has its own management strategies. As a foreigner teacher, how would you like to be managed?',
  `q4` text collate utf8_unicode_ci COMMENT 'Would you say you are a team player? Please share your teamwork experience with an example',
  `q5` text collate utf8_unicode_ci COMMENT 'If you are teaching a group of students and some of them have more difficulty than others, what would you do to help them?',
  `q6` text collate utf8_unicode_ci COMMENT 'How flexible are you? Do you accept work shift and extra hours?',
  PRIMARY KEY  (`t_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 列出以下資料庫的數據： `t_fo`
--

INSERT INTO `t_fo` (`t_id`, `is_validate`, `is_ignore`, `work_hour`, `location_preference`, `teaching_preference`, `sp_need`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`) VALUES
(0, 0, 0, 0, 0, 0, '', '', '', '', '', '', ''),
(100, 1, 1, 0, 6, 49, '6786', '', '', 'ac1', 'ad1', 'ae1', 'af1'),
(101, 0, 0, 10, 0, 3, 'The quick brown fox jumps over the lazy dog.7', 'The quick brown fox jumps over the lazy dog.1', 'The quick brown fox jumps over the lazy dog.2', 'The quick brown fox jumps over the lazy dog.3', 'The quick brown fox jumps over the lazy dog.4', 'The quick brown fox jumps over the lazy dog.5', 'The quick brown fox jumps over the lazy dog.6');

-- --------------------------------------------------------

--
-- 資料表格式： `t_good`
--

DROP TABLE IF EXISTS `t_good`;
CREATE TABLE `t_good` (
  `t_id` int(11) NOT NULL,
  `good` smallint(6) NOT NULL,
  PRIMARY KEY  (`t_id`,`good`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 列出以下資料庫的數據： `t_good`
--

INSERT INTO `t_good` (`t_id`, `good`) VALUES
(0, 1),
(100, 1),
(100, 3),
(100, 8),
(100, 13);

-- --------------------------------------------------------

--
-- 資料表格式： `t_hi`
--

DROP TABLE IF EXISTS `t_hi`;
CREATE TABLE `t_hi` (
  `t_id` int(11) NOT NULL,
  `is_validate` tinyint(1) NOT NULL default '0',
  `is_ignore` tinyint(1) NOT NULL default '0',
  `name_alias` varchar(50) collate utf8_unicode_ci default NULL,
  `employment_status` tinyint(4) NOT NULL,
  `sound` varchar(50) collate utf8_unicode_ci default NULL COMMENT '口音',
  `tin_no` varchar(50) collate utf8_unicode_ci NOT NULL,
  `facebook` varchar(50) collate utf8_unicode_ci NOT NULL,
  `line` varchar(50) collate utf8_unicode_ci NOT NULL,
  `contact_other` varchar(50) collate utf8_unicode_ci NOT NULL,
  `sale_self` varchar(150) collate utf8_unicode_ci NOT NULL,
  `ent_week` int(11) NOT NULL COMMENT '[sum]1=mon,2=tue,4=wed,8=thu,16=fri,32=sat,64=sun',
  `ent_time_start` time NOT NULL,
  `ent_time_end` time NOT NULL,
  `ent_remark` varchar(50) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`t_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 列出以下資料庫的數據： `t_hi`
--

INSERT INTO `t_hi` (`t_id`, `is_validate`, `is_ignore`, `name_alias`, `employment_status`, `sound`, `tin_no`, `facebook`, `line`, `contact_other`, `sale_self`, `ent_week`, `ent_time_start`, `ent_time_end`, `ent_remark`) VALUES
(100, 1, 0, '1111z', 2, 'az', 'bz', 'cz', 'dz', 'ez', 'fz', 99, '21:30:00', '07:30:00', '78978gttty');

-- --------------------------------------------------------

--
-- 資料表格式： `t_interest`
--

DROP TABLE IF EXISTS `t_interest`;
CREATE TABLE `t_interest` (
  `t_id` int(11) NOT NULL,
  `interest` smallint(6) NOT NULL,
  PRIMARY KEY  (`t_id`,`interest`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 列出以下資料庫的數據： `t_interest`
--

INSERT INTO `t_interest` (`t_id`, `interest`) VALUES
(0, 11),
(100, 1),
(100, 2),
(100, 5),
(100, 7),
(100, 12),
(100, 17);

-- --------------------------------------------------------

--
-- 資料表格式： `t_lang`
--

DROP TABLE IF EXISTS `t_lang`;
CREATE TABLE `t_lang` (
  `t_id` int(11) NOT NULL,
  `lang` smallint(6) NOT NULL,
  PRIMARY KEY  (`t_id`,`lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 列出以下資料庫的數據： `t_lang`
--

INSERT INTO `t_lang` (`t_id`, `lang`) VALUES
(86, 7),
(86, 12),
(100, 8),
(100, 12),
(100, 13);

-- --------------------------------------------------------

--
-- 資料表格式： `t_lang_hi`
--

DROP TABLE IF EXISTS `t_lang_hi`;
CREATE TABLE `t_lang_hi` (
  `t_id` int(11) NOT NULL,
  `lang` smallint(6) NOT NULL,
  `type` tinyint(4) NOT NULL default '1' COMMENT '1=wish, 2=already',
  PRIMARY KEY  (`t_id`,`lang`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 列出以下資料庫的數據： `t_lang_hi`
--

INSERT INTO `t_lang_hi` (`t_id`, `lang`, `type`) VALUES
(0, 1, 1),
(0, 11, 2),
(0, 22, 2),
(0, 26, 1),
(0, 26, 2),
(86, 7, 1),
(86, 12, 1),
(100, 1, 1),
(100, 4, 2),
(100, 6, 1),
(100, 9, 2),
(100, 11, 1),
(100, 14, 1),
(100, 14, 2),
(100, 16, 1),
(100, 18, 1),
(100, 21, 2),
(100, 23, 1),
(100, 28, 1),
(100, 29, 2),
(100, 33, 1);

-- --------------------------------------------------------

--
-- 資料表格式： `t_log_contact`
--

DROP TABLE IF EXISTS `t_log_contact`;
CREATE TABLE `t_log_contact` (
  `t_id` int(11) NOT NULL,
  `row` int(11) NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `type` tinyint(4) NOT NULL,
  `topic` varchar(50) collate utf8_unicode_ci NOT NULL,
  `content` varchar(100) collate utf8_unicode_ci NOT NULL,
  `remark` text collate utf8_unicode_ci,
  PRIMARY KEY  (`t_id`,`row`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 列出以下資料庫的數據： `t_log_contact`
--

INSERT INTO `t_log_contact` (`t_id`, `row`, `date`, `type`, `topic`, `content`, `remark`) VALUES
(0, 1, '2015-04-14 00:00:00', 1, 'h', 'gh', 'hgf'),
(100, 1, '2015-04-22 00:00:00', 1, 'a1gp', 'a2dp', 'a3fp'),
(100, 2, '2015-04-22 00:00:00', 2, 'b1gq', 'b2dq', 'b3fq'),
(100, 3, '2015-04-22 00:00:00', 1, 'gdfgxxyyzz', 'dfgdf', 'gdfgdfgdfgdf');

-- --------------------------------------------------------

--
-- 資料表格式： `t_log_reward`
--

DROP TABLE IF EXISTS `t_log_reward`;
CREATE TABLE `t_log_reward` (
  `t_id` int(11) NOT NULL,
  `row` int(11) NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `reason` varchar(50) collate utf8_unicode_ci NOT NULL,
  `method` varchar(50) collate utf8_unicode_ci NOT NULL,
  `comment` varchar(100) collate utf8_unicode_ci NOT NULL,
  `remark` text collate utf8_unicode_ci,
  PRIMARY KEY  (`t_id`,`row`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 列出以下資料庫的數據： `t_log_reward`
--

INSERT INTO `t_log_reward` (`t_id`, `row`, `date`, `reason`, `method`, `comment`, `remark`) VALUES
(0, 1, '2015-04-14 00:00:00', 'hf', 'h', 'fgh', 'hgf'),
(100, 1, '2015-04-22 00:00:00', 'zm', '1zm', '1zm', '1zm'),
(100, 2, '2015-04-22 00:00:00', '1dm', '1sm', '1sm', '1sm'),
(100, 3, '2015-04-22 00:00:00', 'zm', '1zm', '1zm', '1zm'),
(100, 4, '2015-04-22 00:00:00', 'zm', '1zm', '1zm', '1zm'),
(100, 5, '2015-04-22 00:00:00', 'zm', '1zm', '1zm', '1zm'),
(100, 6, '2015-04-22 00:00:00', 'zm', '1zm', '1zm', '1zm'),
(100, 7, '2015-04-22 00:00:00', 'zm', '1zm', '1zm', '1zm');

-- --------------------------------------------------------

--
-- 資料表格式： `t_log_warning`
--

DROP TABLE IF EXISTS `t_log_warning`;
CREATE TABLE `t_log_warning` (
  `t_id` int(11) NOT NULL,
  `row` int(11) NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `type` tinyint(4) NOT NULL,
  `explain` varchar(50) collate utf8_unicode_ci NOT NULL,
  `plan` varchar(100) collate utf8_unicode_ci NOT NULL,
  `comment` varchar(50) collate utf8_unicode_ci NOT NULL,
  `remark` text collate utf8_unicode_ci,
  PRIMARY KEY  (`t_id`,`row`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 列出以下資料庫的數據： `t_log_warning`
--

INSERT INTO `t_log_warning` (`t_id`, `row`, `date`, `type`, `explain`, `plan`, `comment`, `remark`) VALUES
(0, 1, '2015-04-14 00:00:00', 1, 'h', 'gf', 'fh', 'hg'),
(100, 1, '2015-04-22 00:00:00', 1, '1sn', '1sn', '1sn', '1sn'),
(100, 2, '2015-04-22 00:00:00', 2, '1do', '1do', '1do', '1do'),
(100, 3, '2015-04-22 00:00:00', 2, '1sn', '1sn', '1sn', '1sn'),
(100, 4, '2015-04-22 00:00:00', 2, '1sn', '1sn', '1sn', '1sn'),
(100, 5, '2015-04-22 00:00:00', 2, '1sn', '1sn', '1sn', '1sn');

-- --------------------------------------------------------

--
-- 資料表格式： `t_personality`
--

DROP TABLE IF EXISTS `t_personality`;
CREATE TABLE `t_personality` (
  `t_id` int(11) NOT NULL,
  `personality` smallint(6) NOT NULL,
  PRIMARY KEY  (`t_id`,`personality`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 列出以下資料庫的數據： `t_personality`
--

INSERT INTO `t_personality` (`t_id`, `personality`) VALUES
(0, 1),
(100, 1),
(100, 6),
(100, 11);

-- --------------------------------------------------------

--
-- 資料表格式： `t_teaching_exp`
--

DROP TABLE IF EXISTS `t_teaching_exp`;
CREATE TABLE `t_teaching_exp` (
  `t_id` int(11) NOT NULL,
  `row` smallint(6) NOT NULL,
  `school_name` text collate utf8_unicode_ci NOT NULL,
  `nation` varchar(2) collate utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL default '0' COMMENT 't_fo.teaching_preference',
  `position_hold` text collate utf8_unicode_ci NOT NULL,
  `employment_start` timestamp NULL default NULL,
  `employment_end` timestamp NOT NULL default '0000-00-00 00:00:00',
  `responsibilities` text collate utf8_unicode_ci NOT NULL,
  `contact` text collate utf8_unicode_ci NOT NULL COMMENT 'Contact information of previous supervisor',
  PRIMARY KEY  (`t_id`,`row`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 列出以下資料庫的數據： `t_teaching_exp`
--

INSERT INTO `t_teaching_exp` (`t_id`, `row`, `school_name`, `nation`, `level`, `position_hold`, `employment_start`, `employment_end`, `responsibilities`, `contact`) VALUES
(0, 1, 'ss', 'AD', 0, 'ss', '2015-04-25 00:00:00', '2015-04-30 00:00:00', 'ss', 'sss'),
(100, 1, '1a', 'HR', 32, '1b', '2015-03-01 00:00:00', '2015-03-04 00:00:00', '1c', '1d'),
(100, 2, '2a', 'ID', 16, '2b', '2015-03-02 00:00:00', '2015-03-05 00:00:00', '2c', '2d'),
(100, 3, '3a', 'JE', 8, '3b', '2015-03-03 00:00:00', '2015-03-06 00:00:00', '3c', '3d'),
(100, 4, '1a', 'HR', 4, '1b', '2015-03-04 00:00:00', '2015-03-07 00:00:00', '1c', '1d'),
(101, 1, 'x', 'AD', 32, 'x', '2015-04-15 00:00:00', '2015-04-15 00:00:00', 'x', 'x');

-- --------------------------------------------------------

--
-- 資料表格式： `t_visa`
--

DROP TABLE IF EXISTS `t_visa`;
CREATE TABLE `t_visa` (
  `t_id` int(11) NOT NULL,
  `visa` tinyint(4) NOT NULL,
  PRIMARY KEY  (`t_id`,`visa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 列出以下資料庫的數據： `t_visa`
--

INSERT INTO `t_visa` (`t_id`, `visa`) VALUES
(79, 4),
(79, 5),
(80, 4),
(80, 5),
(81, 4),
(81, 5),
(82, 4),
(82, 5),
(83, 3),
(83, 4),
(86, 4),
(86, 5),
(99, 1),
(99, 3),
(100, 1),
(100, 2),
(101, 3);

-- --------------------------------------------------------

--
-- 資料表格式： `t_work_type`
--

DROP TABLE IF EXISTS `t_work_type`;
CREATE TABLE `t_work_type` (
  `t_id` int(11) NOT NULL auto_increment,
  `work_type` tinyint(4) NOT NULL,
  PRIMARY KEY  (`t_id`,`work_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- 列出以下資料庫的數據： `t_work_type`
--


-- --------------------------------------------------------

--
-- 資料表格式： `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL auto_increment,
  `account` varchar(50) collate utf8_unicode_ci NOT NULL,
  `password` varchar(50) collate utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL default '32' COMMENT '[sum] 1=Recruitment,2=Training,4=Management,8=Consultant,16=Administrator,32=Teacher,64=School',
  `t_id` int(11) default NULL,
  `is_enable` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- 列出以下資料庫的數據： `user`
--

INSERT INTO `user` (`id`, `account`, `password`, `role`, `t_id`, `is_enable`) VALUES
(1, 'e@s.s', '73c18c59a39b18382081ec00bb456d43', 32, NULL, 1),
(2, 'e@s.sr', '514f1b439f404f86f77090fa9edc96ce', 32, NULL, 1),
(3, 's@s.s', '8fa14cdd754f91cc6554c9e71929cce7', 32, NULL, 1),
(4, 's@s.st', '9990775155c3518a0d7917f7780b24aa', 32, NULL, 1),
(5, 'a@a.a', '1aabac6d068eef6a7bad3fdf50a05cc8', 32, 100, 1),
(6, 'a@a.ay', '2fb1c5cf58867b5bbc9a1b145a86f3a0', 32, NULL, 1),
(7, 'a@a.ay77', '0a113ef6b61820daa5611c870ed8d5ee', 32, NULL, 1),
(8, 'a@a.ay776546', 'ff604c6836dbb41cae4ec4e869c21f74', 32, NULL, 1),
(9, 'a@a.ay776546rty', 'ed1cfe40c31bdc9e5d5f16e1691b4ba9', 32, NULL, 1),
(10, 'dddd@aa.aaaaa', 'a9e49c7aefe022f0a8540361cce7575c', 32, NULL, 1),
(11, 'ssss@sss.ss', '11ddbaf3386aea1f2974eee984542152', 32, NULL, 1),
(12, 'mm@aa.com', 'fa7f08233358e9b466effa1328168527', 32, NULL, 1),
(13, 'm@m.d', 'c74fa4e634fe328abf54a7d94be357e2', 32, NULL, 1),
(14, 'c@d.d', '5d52ed16450d70611260e9282a43d30d', 32, NULL, 1),
(15, 'ddd@fsdf.fsd', '7d70663568cac5af684503681e3a4d41', 32, NULL, 1),
(16, 'c@323231321', '2070e4cfb8f24209647d3c9ec55098ee', 32, NULL, 1),
(17, 'sss@4324234', '0e9212587d373ca58e9bada0c15e6fe4', 32, NULL, 1),
(18, 'dfsdfsdf@3213', '438a7fe0e719c80665d5f35a3f9c5f98', 32, NULL, 1),
(19, 'fasdff@3423432', 'd58e3582afa99040e27b92b13c8f2280', 32, NULL, 1),
(20, 'dfsfsd3@sadffd', '6ff81213f4309e6d2fcf1f6350f79c5b', 32, 101, 1),
(21, 'z@zzz', 'f9ab17a7f20dd091d6d8ff68141dcbe7', 32, NULL, 1),
(22, 'aaa@fasdf.fdjsl', 'cb42e130d1471239a27fca6228094f0e', 32, NULL, 1),
(23, 'fasdfsd@fsdafsd', 'f1b3f738948ed38893455416be8acbf9', 32, NULL, 1),
(24, 'fzzzzz@ssdfds.fsd', 'ad4fe05c2d0572eef273fa40dd750161', 32, NULL, 1),
(25, 'zzz@aaa.ccc', '49559ca6980e9a71c07a843965139251', 32, NULL, 1),
(26, 'rgukhe@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', 32, NULL, 1),
(27, 'rwe@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', 32, NULL, 1),
(28, 'fasdfsa@dfsafsad', '0aef36fb7d884dc862a93d8e3ffc2a6c', 32, NULL, 1);
