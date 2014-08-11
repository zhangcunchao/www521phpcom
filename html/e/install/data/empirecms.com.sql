# --------------------------------------------------------
# 
# 帝国网站管理系统 
# 
# http://www.PHome.Net
# 
# EmpireCMS Version 6.6
# 
# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_article`;
CREATE TABLE `phome_ecms_article` (
  `id` int(11) NOT NULL auto_increment,
  `classid` smallint(6) NOT NULL default '0',
  `onclick` int(11) NOT NULL default '0',
  `newspath` char(20) NOT NULL default '',
  `keyboard` char(160) NOT NULL default '',
  `keyid` char(255) NOT NULL default '',
  `userid` int(11) NOT NULL default '0',
  `username` char(30) NOT NULL default '',
  `ztid` char(255) NOT NULL default '',
  `checked` tinyint(1) NOT NULL default '0',
  `istop` tinyint(1) NOT NULL default '0',
  `truetime` int(10) NOT NULL default '0',
  `ismember` tinyint(1) NOT NULL default '0',
  `dokey` tinyint(1) NOT NULL default '0',
  `userfen` smallint(6) NOT NULL default '0',
  `isgood` tinyint(1) NOT NULL default '0',
  `titlefont` char(20) NOT NULL default '',
  `titleurl` char(200) NOT NULL default '',
  `filename` char(60) NOT NULL default '',
  `groupid` smallint(6) NOT NULL default '0',
  `newstempid` smallint(6) NOT NULL default '0',
  `plnum` int(11) NOT NULL default '0',
  `firsttitle` tinyint(1) NOT NULL default '0',
  `isqf` tinyint(1) NOT NULL default '0',
  `totaldown` int(11) NOT NULL default '0',
  `title` char(200) NOT NULL default '',
  `newstime` int(10) NOT NULL default '0',
  `titlepic` char(200) NOT NULL default '',
  `closepl` tinyint(1) NOT NULL default '0',
  `havehtml` tinyint(1) NOT NULL default '0',
  `lastdotime` int(10) NOT NULL default '0',
  `haveaddfen` tinyint(1) NOT NULL default '0',
  `infopfen` int(11) NOT NULL default '0',
  `infopfennum` int(11) NOT NULL default '0',
  `votenum` int(11) NOT NULL default '0',
  `ftitle` char(120) NOT NULL default '',
  `smalltext` char(255) NOT NULL default '',
  `writer` char(30) NOT NULL default '',
  `befrom` char(60) NOT NULL default '',
  `newstext` char(50) NOT NULL default '',
  `diggtop` int(11) NOT NULL default '0',
  `stb` char(4) NOT NULL default '',
  `copyids` char(255) NOT NULL default '',
  `ttid` smallint(6) NOT NULL default '0',
  `infotags` char(160) NOT NULL default '',
  `ispic` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `checked` (`checked`),
  KEY `newstime` (`newstime`),
  KEY `truetime` (`truetime`),
  KEY `classid` (`classid`),
  KEY `ttid` (`ttid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_article_data_1`;
CREATE TABLE `phome_ecms_article_data_1` (
  `id` int(11) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_article_doc`;
CREATE TABLE `phome_ecms_article_doc` (
  `id` int(11) NOT NULL auto_increment,
  `classid` smallint(6) NOT NULL default '0',
  `onclick` int(11) NOT NULL default '0',
  `newspath` char(20) NOT NULL default '',
  `keyboard` char(160) NOT NULL default '',
  `keyid` char(255) NOT NULL default '',
  `userid` int(11) NOT NULL default '0',
  `username` char(30) NOT NULL default '',
  `ztid` char(255) NOT NULL default '',
  `checked` tinyint(1) NOT NULL default '0',
  `istop` tinyint(1) NOT NULL default '0',
  `truetime` int(10) NOT NULL default '0',
  `ismember` tinyint(1) NOT NULL default '0',
  `dokey` tinyint(1) NOT NULL default '0',
  `userfen` smallint(6) NOT NULL default '0',
  `isgood` tinyint(1) NOT NULL default '0',
  `titlefont` char(20) NOT NULL default '',
  `titleurl` char(200) NOT NULL default '',
  `filename` char(60) NOT NULL default '',
  `groupid` smallint(6) NOT NULL default '0',
  `newstempid` smallint(6) NOT NULL default '0',
  `plnum` int(11) NOT NULL default '0',
  `firsttitle` tinyint(1) NOT NULL default '0',
  `isqf` tinyint(1) NOT NULL default '0',
  `totaldown` int(11) NOT NULL default '0',
  `title` char(200) NOT NULL default '',
  `newstime` int(10) NOT NULL default '0',
  `titlepic` char(200) NOT NULL default '',
  `closepl` tinyint(1) NOT NULL default '0',
  `havehtml` tinyint(1) NOT NULL default '0',
  `lastdotime` int(10) NOT NULL default '0',
  `haveaddfen` tinyint(1) NOT NULL default '0',
  `infopfen` int(11) NOT NULL default '0',
  `infopfennum` int(11) NOT NULL default '0',
  `votenum` int(11) NOT NULL default '0',
  `ftitle` char(120) NOT NULL default '',
  `smalltext` char(255) NOT NULL default '',
  `writer` char(30) NOT NULL default '',
  `befrom` char(60) NOT NULL default '',
  `newstext` char(50) NOT NULL default '',
  `diggtop` int(11) NOT NULL default '0',
  `stb` char(4) NOT NULL default '',
  `copyids` char(255) NOT NULL default '',
  `ttid` smallint(6) NOT NULL default '0',
  `infotags` char(160) NOT NULL default '',
  `ispic` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `checked` (`checked`),
  KEY `newstime` (`newstime`),
  KEY `truetime` (`truetime`),
  KEY `classid` (`classid`),
  KEY `ttid` (`ttid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_article_doc_data`;
CREATE TABLE `phome_ecms_article_doc_data` (
  `id` int(11) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_download`;
CREATE TABLE `phome_ecms_download` (
  `id` int(11) NOT NULL auto_increment,
  `classid` smallint(6) NOT NULL default '0',
  `onclick` int(11) NOT NULL default '0',
  `newspath` varchar(20) NOT NULL default '',
  `keyboard` varchar(160) NOT NULL default '',
  `keyid` varchar(255) NOT NULL default '',
  `userid` int(11) NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `ztid` varchar(255) NOT NULL default '',
  `checked` tinyint(1) NOT NULL default '0',
  `istop` tinyint(1) NOT NULL default '0',
  `truetime` int(10) NOT NULL default '0',
  `ismember` tinyint(1) NOT NULL default '0',
  `dokey` tinyint(1) NOT NULL default '0',
  `userfen` smallint(6) NOT NULL default '0',
  `isgood` tinyint(1) NOT NULL default '0',
  `titlefont` varchar(20) NOT NULL default '',
  `titleurl` varchar(200) NOT NULL default '',
  `filename` varchar(60) NOT NULL default '',
  `groupid` smallint(6) NOT NULL default '0',
  `newstempid` smallint(6) NOT NULL default '0',
  `plnum` int(11) NOT NULL default '0',
  `firsttitle` tinyint(1) NOT NULL default '0',
  `isqf` tinyint(1) NOT NULL default '0',
  `totaldown` int(11) NOT NULL default '0',
  `title` varchar(200) NOT NULL default '',
  `newstime` int(10) NOT NULL default '0',
  `titlepic` varchar(200) NOT NULL default '',
  `closepl` tinyint(1) NOT NULL default '0',
  `havehtml` tinyint(1) NOT NULL default '0',
  `lastdotime` int(10) NOT NULL default '0',
  `haveaddfen` tinyint(1) NOT NULL default '0',
  `infopfen` int(11) NOT NULL default '0',
  `infopfennum` int(11) NOT NULL default '0',
  `votenum` int(11) NOT NULL default '0',
  `softfj` varchar(255) NOT NULL default '',
  `language` varchar(16) NOT NULL default '',
  `softtype` varchar(16) NOT NULL default '',
  `softsq` varchar(16) NOT NULL default '',
  `star` tinyint(1) NOT NULL default '0',
  `filetype` varchar(10) NOT NULL default '',
  `filesize` varchar(16) NOT NULL default '',
  `softsay` text NOT NULL,
  `stb` varchar(4) NOT NULL default '',
  `copyids` varchar(255) NOT NULL default '',
  `ttid` smallint(6) NOT NULL default '0',
  `infotags` varchar(160) NOT NULL default '',
  `ispic` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `checked` (`checked`),
  KEY `newstime` (`newstime`),
  KEY `truetime` (`truetime`),
  KEY `classid` (`classid`),
  KEY `ttid` (`ttid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_download_data_1`;
CREATE TABLE `phome_ecms_download_data_1` (
  `id` int(11) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  `softwriter` varchar(30) NOT NULL default '',
  `homepage` varchar(80) NOT NULL default '',
  `demo` varchar(120) NOT NULL default '',
  `downpath` mediumtext NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_download_doc`;
CREATE TABLE `phome_ecms_download_doc` (
  `id` int(11) NOT NULL auto_increment,
  `classid` smallint(6) NOT NULL default '0',
  `onclick` int(11) NOT NULL default '0',
  `newspath` varchar(20) NOT NULL default '',
  `keyboard` varchar(160) NOT NULL default '',
  `keyid` varchar(255) NOT NULL default '',
  `userid` int(11) NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `ztid` varchar(255) NOT NULL default '',
  `checked` tinyint(1) NOT NULL default '0',
  `istop` tinyint(1) NOT NULL default '0',
  `truetime` int(10) NOT NULL default '0',
  `ismember` tinyint(1) NOT NULL default '0',
  `dokey` tinyint(1) NOT NULL default '0',
  `userfen` smallint(6) NOT NULL default '0',
  `isgood` tinyint(1) NOT NULL default '0',
  `titlefont` varchar(20) NOT NULL default '',
  `titleurl` varchar(200) NOT NULL default '',
  `filename` varchar(60) NOT NULL default '',
  `groupid` smallint(6) NOT NULL default '0',
  `newstempid` smallint(6) NOT NULL default '0',
  `plnum` int(11) NOT NULL default '0',
  `firsttitle` tinyint(1) NOT NULL default '0',
  `isqf` tinyint(1) NOT NULL default '0',
  `totaldown` int(11) NOT NULL default '0',
  `title` varchar(200) NOT NULL default '',
  `newstime` int(10) NOT NULL default '0',
  `titlepic` varchar(200) NOT NULL default '',
  `closepl` tinyint(1) NOT NULL default '0',
  `havehtml` tinyint(1) NOT NULL default '0',
  `lastdotime` int(10) NOT NULL default '0',
  `haveaddfen` tinyint(1) NOT NULL default '0',
  `infopfen` int(11) NOT NULL default '0',
  `infopfennum` int(11) NOT NULL default '0',
  `votenum` int(11) NOT NULL default '0',
  `softfj` varchar(255) NOT NULL default '',
  `language` varchar(16) NOT NULL default '',
  `softtype` varchar(16) NOT NULL default '',
  `softsq` varchar(16) NOT NULL default '',
  `star` tinyint(1) NOT NULL default '0',
  `filetype` varchar(10) NOT NULL default '',
  `filesize` varchar(16) NOT NULL default '',
  `softsay` text NOT NULL,
  `stb` varchar(4) NOT NULL default '',
  `copyids` varchar(255) NOT NULL default '',
  `ttid` smallint(6) NOT NULL default '0',
  `infotags` varchar(160) NOT NULL default '',
  `ispic` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `checked` (`checked`),
  KEY `newstime` (`newstime`),
  KEY `truetime` (`truetime`),
  KEY `classid` (`classid`),
  KEY `ttid` (`ttid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_download_doc_data`;
CREATE TABLE `phome_ecms_download_doc_data` (
  `id` int(11) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  `softwriter` varchar(30) NOT NULL default '',
  `homepage` varchar(80) NOT NULL default '',
  `demo` varchar(120) NOT NULL default '',
  `downpath` mediumtext NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_flash`;
CREATE TABLE `phome_ecms_flash` (
  `id` int(11) NOT NULL auto_increment,
  `classid` smallint(6) NOT NULL default '0',
  `onclick` int(11) NOT NULL default '0',
  `newspath` varchar(20) NOT NULL default '',
  `keyboard` varchar(160) NOT NULL default '',
  `keyid` varchar(255) NOT NULL default '',
  `userid` int(11) NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `ztid` varchar(255) NOT NULL default '',
  `checked` tinyint(1) NOT NULL default '0',
  `istop` tinyint(1) NOT NULL default '0',
  `truetime` int(10) NOT NULL default '0',
  `ismember` tinyint(1) NOT NULL default '0',
  `dokey` tinyint(1) NOT NULL default '0',
  `userfen` smallint(6) NOT NULL default '0',
  `isgood` tinyint(1) NOT NULL default '0',
  `titlefont` varchar(20) NOT NULL default '',
  `titleurl` varchar(200) NOT NULL default '',
  `filename` varchar(60) NOT NULL default '',
  `groupid` smallint(6) NOT NULL default '0',
  `newstempid` smallint(6) NOT NULL default '0',
  `plnum` int(11) NOT NULL default '0',
  `firsttitle` tinyint(1) NOT NULL default '0',
  `isqf` tinyint(1) NOT NULL default '0',
  `totaldown` int(11) NOT NULL default '0',
  `title` varchar(200) NOT NULL default '',
  `newstime` int(10) NOT NULL default '0',
  `titlepic` varchar(200) NOT NULL default '',
  `closepl` tinyint(1) NOT NULL default '0',
  `havehtml` tinyint(1) NOT NULL default '0',
  `lastdotime` int(10) NOT NULL default '0',
  `haveaddfen` tinyint(1) NOT NULL default '0',
  `infopfen` int(11) NOT NULL default '0',
  `infopfennum` int(11) NOT NULL default '0',
  `votenum` int(11) NOT NULL default '0',
  `flashwriter` varchar(30) NOT NULL default '',
  `email` varchar(80) NOT NULL default '',
  `star` tinyint(1) NOT NULL default '0',
  `filesize` varchar(16) NOT NULL default '',
  `flashurl` varchar(255) NOT NULL default '',
  `width` varchar(12) NOT NULL default '',
  `height` varchar(12) NOT NULL default '',
  `flashsay` text NOT NULL,
  `stb` varchar(4) NOT NULL default '',
  `copyids` varchar(255) NOT NULL default '',
  `ttid` smallint(6) NOT NULL default '0',
  `infotags` varchar(160) NOT NULL default '',
  `ispic` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `checked` (`checked`),
  KEY `newstime` (`newstime`),
  KEY `truetime` (`truetime`),
  KEY `classid` (`classid`),
  KEY `ttid` (`ttid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_flash_data_1`;
CREATE TABLE `phome_ecms_flash_data_1` (
  `id` int(11) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_flash_doc`;
CREATE TABLE `phome_ecms_flash_doc` (
  `id` int(11) NOT NULL auto_increment,
  `classid` smallint(6) NOT NULL default '0',
  `onclick` int(11) NOT NULL default '0',
  `newspath` varchar(20) NOT NULL default '',
  `keyboard` varchar(160) NOT NULL default '',
  `keyid` varchar(255) NOT NULL default '',
  `userid` int(11) NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `ztid` varchar(255) NOT NULL default '',
  `checked` tinyint(1) NOT NULL default '0',
  `istop` tinyint(1) NOT NULL default '0',
  `truetime` int(10) NOT NULL default '0',
  `ismember` tinyint(1) NOT NULL default '0',
  `dokey` tinyint(1) NOT NULL default '0',
  `userfen` smallint(6) NOT NULL default '0',
  `isgood` tinyint(1) NOT NULL default '0',
  `titlefont` varchar(20) NOT NULL default '',
  `titleurl` varchar(200) NOT NULL default '',
  `filename` varchar(60) NOT NULL default '',
  `groupid` smallint(6) NOT NULL default '0',
  `newstempid` smallint(6) NOT NULL default '0',
  `plnum` int(11) NOT NULL default '0',
  `firsttitle` tinyint(1) NOT NULL default '0',
  `isqf` tinyint(1) NOT NULL default '0',
  `totaldown` int(11) NOT NULL default '0',
  `title` varchar(200) NOT NULL default '',
  `newstime` int(10) NOT NULL default '0',
  `titlepic` varchar(200) NOT NULL default '',
  `closepl` tinyint(1) NOT NULL default '0',
  `havehtml` tinyint(1) NOT NULL default '0',
  `lastdotime` int(10) NOT NULL default '0',
  `haveaddfen` tinyint(1) NOT NULL default '0',
  `infopfen` int(11) NOT NULL default '0',
  `infopfennum` int(11) NOT NULL default '0',
  `votenum` int(11) NOT NULL default '0',
  `flashwriter` varchar(30) NOT NULL default '',
  `email` varchar(80) NOT NULL default '',
  `star` tinyint(1) NOT NULL default '0',
  `filesize` varchar(16) NOT NULL default '',
  `flashurl` varchar(255) NOT NULL default '',
  `width` varchar(12) NOT NULL default '',
  `height` varchar(12) NOT NULL default '',
  `flashsay` text NOT NULL,
  `stb` varchar(4) NOT NULL default '',
  `copyids` varchar(255) NOT NULL default '',
  `ttid` smallint(6) NOT NULL default '0',
  `infotags` varchar(160) NOT NULL default '',
  `ispic` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `checked` (`checked`),
  KEY `newstime` (`newstime`),
  KEY `truetime` (`truetime`),
  KEY `classid` (`classid`),
  KEY `ttid` (`ttid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_flash_doc_data`;
CREATE TABLE `phome_ecms_flash_doc_data` (
  `id` int(11) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_info`;
CREATE TABLE `phome_ecms_info` (
  `id` int(11) NOT NULL auto_increment,
  `classid` smallint(6) NOT NULL default '0',
  `onclick` int(11) NOT NULL default '0',
  `newspath` varchar(20) NOT NULL default '',
  `keyboard` varchar(160) NOT NULL default '',
  `keyid` varchar(255) NOT NULL default '',
  `userid` int(11) NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `ztid` varchar(255) NOT NULL default '',
  `checked` tinyint(1) NOT NULL default '0',
  `istop` tinyint(1) NOT NULL default '0',
  `truetime` int(10) NOT NULL default '0',
  `ismember` tinyint(1) NOT NULL default '0',
  `dokey` tinyint(1) NOT NULL default '0',
  `userfen` smallint(6) NOT NULL default '0',
  `isgood` tinyint(1) NOT NULL default '0',
  `titlefont` varchar(20) NOT NULL default '',
  `titleurl` varchar(200) NOT NULL default '',
  `filename` varchar(60) NOT NULL default '',
  `groupid` smallint(6) NOT NULL default '0',
  `newstempid` smallint(6) NOT NULL default '0',
  `plnum` int(11) NOT NULL default '0',
  `firsttitle` tinyint(1) NOT NULL default '0',
  `isqf` tinyint(1) NOT NULL default '0',
  `totaldown` int(11) NOT NULL default '0',
  `title` varchar(200) NOT NULL default '',
  `newstime` int(10) NOT NULL default '0',
  `titlepic` varchar(200) NOT NULL default '',
  `closepl` tinyint(1) NOT NULL default '0',
  `havehtml` tinyint(1) NOT NULL default '0',
  `lastdotime` int(10) NOT NULL default '0',
  `haveaddfen` tinyint(1) NOT NULL default '0',
  `infopfen` int(11) NOT NULL default '0',
  `infopfennum` int(11) NOT NULL default '0',
  `votenum` int(11) NOT NULL default '0',
  `smalltext` text NOT NULL,
  `myarea` varchar(30) NOT NULL default '',
  `stb` varchar(4) NOT NULL default '',
  `copyids` varchar(255) NOT NULL default '',
  `ttid` smallint(6) NOT NULL default '0',
  `infotags` varchar(160) NOT NULL default '',
  `ispic` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `checked` (`checked`),
  KEY `newstime` (`newstime`),
  KEY `truetime` (`truetime`),
  KEY `classid` (`classid`),
  KEY `ttid` (`ttid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_info_data_1`;
CREATE TABLE `phome_ecms_info_data_1` (
  `id` int(11) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  `email` varchar(80) NOT NULL default '',
  `mycontact` varchar(255) NOT NULL default '',
  `address` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_info_doc`;
CREATE TABLE `phome_ecms_info_doc` (
  `id` int(11) NOT NULL auto_increment,
  `classid` smallint(6) NOT NULL default '0',
  `onclick` int(11) NOT NULL default '0',
  `newspath` varchar(20) NOT NULL default '',
  `keyboard` varchar(160) NOT NULL default '',
  `keyid` varchar(255) NOT NULL default '',
  `userid` int(11) NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `ztid` varchar(255) NOT NULL default '',
  `checked` tinyint(1) NOT NULL default '0',
  `istop` tinyint(1) NOT NULL default '0',
  `truetime` int(10) NOT NULL default '0',
  `ismember` tinyint(1) NOT NULL default '0',
  `dokey` tinyint(1) NOT NULL default '0',
  `userfen` smallint(6) NOT NULL default '0',
  `isgood` tinyint(1) NOT NULL default '0',
  `titlefont` varchar(20) NOT NULL default '',
  `titleurl` varchar(200) NOT NULL default '',
  `filename` varchar(60) NOT NULL default '',
  `groupid` smallint(6) NOT NULL default '0',
  `newstempid` smallint(6) NOT NULL default '0',
  `plnum` int(11) NOT NULL default '0',
  `firsttitle` tinyint(1) NOT NULL default '0',
  `isqf` tinyint(1) NOT NULL default '0',
  `totaldown` int(11) NOT NULL default '0',
  `title` varchar(200) NOT NULL default '',
  `newstime` int(10) NOT NULL default '0',
  `titlepic` varchar(200) NOT NULL default '',
  `closepl` tinyint(1) NOT NULL default '0',
  `havehtml` tinyint(1) NOT NULL default '0',
  `lastdotime` int(10) NOT NULL default '0',
  `haveaddfen` tinyint(1) NOT NULL default '0',
  `infopfen` int(11) NOT NULL default '0',
  `infopfennum` int(11) NOT NULL default '0',
  `votenum` int(11) NOT NULL default '0',
  `smalltext` text NOT NULL,
  `myarea` varchar(30) NOT NULL default '',
  `stb` varchar(4) NOT NULL default '',
  `copyids` varchar(255) NOT NULL default '',
  `ttid` smallint(6) NOT NULL default '0',
  `infotags` varchar(160) NOT NULL default '',
  `ispic` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `checked` (`checked`),
  KEY `newstime` (`newstime`),
  KEY `truetime` (`truetime`),
  KEY `classid` (`classid`),
  KEY `ttid` (`ttid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_info_doc_data`;
CREATE TABLE `phome_ecms_info_doc_data` (
  `id` int(11) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  `email` varchar(80) NOT NULL default '',
  `mycontact` varchar(255) NOT NULL default '',
  `address` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_infoclass_article`;
CREATE TABLE `phome_ecms_infoclass_article` (
  `classid` int(11) NOT NULL default '0',
  `zz_title` text NOT NULL,
  `z_title` varchar(255) NOT NULL default '',
  `qz_title` varchar(255) NOT NULL default '',
  `save_title` varchar(10) NOT NULL default '',
  `zz_titlepic` text NOT NULL,
  `z_titlepic` varchar(255) NOT NULL default '',
  `qz_titlepic` varchar(255) NOT NULL default '',
  `save_titlepic` varchar(10) NOT NULL default '',
  `zz_newstime` text NOT NULL,
  `z_newstime` varchar(255) NOT NULL default '',
  `qz_newstime` varchar(255) NOT NULL default '',
  `save_newstime` varchar(10) NOT NULL default '',
  `zz_ftitle` text NOT NULL,
  `z_ftitle` varchar(255) NOT NULL default '',
  `qz_ftitle` text NOT NULL,
  `save_ftitle` varchar(10) NOT NULL default '',
  `zz_smalltext` text NOT NULL,
  `z_smalltext` varchar(255) NOT NULL default '',
  `qz_smalltext` text NOT NULL,
  `save_smalltext` varchar(10) NOT NULL default '',
  `zz_writer` text NOT NULL,
  `z_writer` varchar(255) NOT NULL default '',
  `qz_writer` text NOT NULL,
  `save_writer` varchar(10) NOT NULL default '',
  `zz_befrom` text NOT NULL,
  `z_befrom` varchar(255) NOT NULL default '',
  `qz_befrom` text NOT NULL,
  `save_befrom` varchar(10) NOT NULL default '',
  `zz_newstext` text NOT NULL,
  `z_newstext` varchar(255) NOT NULL default '',
  `qz_newstext` text NOT NULL,
  `save_newstext` varchar(10) NOT NULL default '',
  `zz_diggtop` text NOT NULL,
  `z_diggtop` varchar(255) NOT NULL default '',
  `qz_diggtop` varchar(255) NOT NULL default '',
  `save_diggtop` varchar(10) NOT NULL default '',
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_infoclass_download`;
CREATE TABLE `phome_ecms_infoclass_download` (
  `classid` int(11) NOT NULL default '0',
  `zz_title` text NOT NULL,
  `z_title` varchar(255) NOT NULL default '',
  `qz_title` varchar(255) NOT NULL default '',
  `save_title` varchar(10) NOT NULL default '',
  `zz_titlepic` text NOT NULL,
  `z_titlepic` varchar(255) NOT NULL default '',
  `qz_titlepic` varchar(255) NOT NULL default '',
  `save_titlepic` varchar(10) NOT NULL default '',
  `zz_newstime` text NOT NULL,
  `z_newstime` varchar(255) NOT NULL default '',
  `qz_newstime` varchar(255) NOT NULL default '',
  `save_newstime` varchar(10) NOT NULL default '',
  `zz_softwriter` text NOT NULL,
  `z_softwriter` varchar(255) NOT NULL default '',
  `qz_softwriter` text NOT NULL,
  `save_softwriter` varchar(10) NOT NULL default '',
  `zz_homepage` text NOT NULL,
  `z_homepage` varchar(255) NOT NULL default '',
  `qz_homepage` text NOT NULL,
  `save_homepage` varchar(10) NOT NULL default '',
  `zz_demo` text NOT NULL,
  `z_demo` varchar(255) NOT NULL default '',
  `qz_demo` text NOT NULL,
  `save_demo` varchar(10) NOT NULL default '',
  `zz_softfj` text NOT NULL,
  `z_softfj` varchar(255) NOT NULL default '',
  `qz_softfj` text NOT NULL,
  `save_softfj` varchar(10) NOT NULL default '',
  `zz_language` text NOT NULL,
  `z_language` varchar(255) NOT NULL default '',
  `qz_language` text NOT NULL,
  `save_language` varchar(10) NOT NULL default '',
  `zz_softtype` text NOT NULL,
  `z_softtype` varchar(255) NOT NULL default '',
  `qz_softtype` text NOT NULL,
  `save_softtype` varchar(10) NOT NULL default '',
  `zz_softsq` text NOT NULL,
  `z_softsq` varchar(255) NOT NULL default '',
  `qz_softsq` text NOT NULL,
  `save_softsq` varchar(10) NOT NULL default '',
  `zz_star` text NOT NULL,
  `z_star` varchar(255) NOT NULL default '',
  `qz_star` text NOT NULL,
  `save_star` varchar(10) NOT NULL default '',
  `zz_filetype` text NOT NULL,
  `z_filetype` varchar(255) NOT NULL default '',
  `qz_filetype` text NOT NULL,
  `save_filetype` varchar(10) NOT NULL default '',
  `zz_filesize` text NOT NULL,
  `z_filesize` varchar(255) NOT NULL default '',
  `qz_filesize` text NOT NULL,
  `save_filesize` varchar(10) NOT NULL default '',
  `zz_downpath` text NOT NULL,
  `z_downpath` varchar(255) NOT NULL default '',
  `qz_downpath` text NOT NULL,
  `save_downpath` varchar(10) NOT NULL default '',
  `zz_softsay` text NOT NULL,
  `z_softsay` varchar(255) NOT NULL default '',
  `qz_softsay` text NOT NULL,
  `save_softsay` varchar(10) NOT NULL default '',
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_infoclass_flash`;
CREATE TABLE `phome_ecms_infoclass_flash` (
  `classid` int(11) NOT NULL default '0',
  `zz_title` text NOT NULL,
  `z_title` varchar(255) NOT NULL default '',
  `qz_title` varchar(255) NOT NULL default '',
  `save_title` varchar(10) NOT NULL default '',
  `zz_titlepic` text NOT NULL,
  `z_titlepic` varchar(255) NOT NULL default '',
  `qz_titlepic` varchar(255) NOT NULL default '',
  `save_titlepic` varchar(10) NOT NULL default '',
  `zz_newstime` text NOT NULL,
  `z_newstime` varchar(255) NOT NULL default '',
  `qz_newstime` varchar(255) NOT NULL default '',
  `save_newstime` varchar(10) NOT NULL default '',
  `zz_flashwriter` text NOT NULL,
  `z_flashwriter` varchar(255) NOT NULL default '',
  `qz_flashwriter` text NOT NULL,
  `save_flashwriter` varchar(10) NOT NULL default '',
  `zz_email` text NOT NULL,
  `z_email` varchar(255) NOT NULL default '',
  `qz_email` text NOT NULL,
  `save_email` varchar(10) NOT NULL default '',
  `zz_star` text NOT NULL,
  `z_star` varchar(255) NOT NULL default '',
  `qz_star` text NOT NULL,
  `save_star` varchar(10) NOT NULL default '',
  `zz_filesize` text NOT NULL,
  `z_filesize` varchar(255) NOT NULL default '',
  `qz_filesize` text NOT NULL,
  `save_filesize` varchar(10) NOT NULL default '',
  `zz_flashurl` text NOT NULL,
  `z_flashurl` varchar(255) NOT NULL default '',
  `qz_flashurl` text NOT NULL,
  `save_flashurl` varchar(10) NOT NULL default '',
  `zz_width` text NOT NULL,
  `z_width` varchar(255) NOT NULL default '',
  `qz_width` text NOT NULL,
  `save_width` varchar(10) NOT NULL default '',
  `zz_height` text NOT NULL,
  `z_height` varchar(255) NOT NULL default '',
  `qz_height` text NOT NULL,
  `save_height` varchar(10) NOT NULL default '',
  `zz_flashsay` text NOT NULL,
  `z_flashsay` varchar(255) NOT NULL default '',
  `qz_flashsay` text NOT NULL,
  `save_flashsay` varchar(10) NOT NULL default '',
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_infoclass_info`;
CREATE TABLE `phome_ecms_infoclass_info` (
  `classid` int(11) NOT NULL default '0',
  `zz_title` text NOT NULL,
  `z_title` varchar(255) NOT NULL default '',
  `qz_title` varchar(255) NOT NULL default '',
  `save_title` varchar(10) NOT NULL default '',
  `zz_titlepic` text NOT NULL,
  `z_titlepic` varchar(255) NOT NULL default '',
  `qz_titlepic` varchar(255) NOT NULL default '',
  `save_titlepic` varchar(10) NOT NULL default '',
  `zz_newstime` text NOT NULL,
  `z_newstime` varchar(255) NOT NULL default '',
  `qz_newstime` varchar(255) NOT NULL default '',
  `save_newstime` varchar(10) NOT NULL default '',
  `zz_smalltext` text NOT NULL,
  `z_smalltext` varchar(255) NOT NULL default '',
  `qz_smalltext` text NOT NULL,
  `save_smalltext` varchar(10) NOT NULL default '',
  `zz_myarea` text NOT NULL,
  `z_myarea` varchar(255) NOT NULL default '',
  `qz_myarea` text NOT NULL,
  `save_myarea` varchar(10) NOT NULL default '',
  `zz_email` text NOT NULL,
  `z_email` varchar(255) NOT NULL default '',
  `qz_email` text NOT NULL,
  `save_email` varchar(10) NOT NULL default '',
  `zz_mycontact` text NOT NULL,
  `z_mycontact` varchar(255) NOT NULL default '',
  `qz_mycontact` text NOT NULL,
  `save_mycontact` varchar(10) NOT NULL default '',
  `zz_address` text NOT NULL,
  `z_address` varchar(255) NOT NULL default '',
  `qz_address` text NOT NULL,
  `save_address` varchar(10) NOT NULL default '',
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_infoclass_movie`;
CREATE TABLE `phome_ecms_infoclass_movie` (
  `classid` int(11) NOT NULL default '0',
  `zz_title` text NOT NULL,
  `z_title` varchar(255) NOT NULL default '',
  `qz_title` varchar(255) NOT NULL default '',
  `save_title` varchar(10) NOT NULL default '',
  `zz_titlepic` text NOT NULL,
  `z_titlepic` varchar(255) NOT NULL default '',
  `qz_titlepic` varchar(255) NOT NULL default '',
  `save_titlepic` varchar(10) NOT NULL default '',
  `zz_newstime` text NOT NULL,
  `z_newstime` varchar(255) NOT NULL default '',
  `qz_newstime` varchar(255) NOT NULL default '',
  `save_newstime` varchar(10) NOT NULL default '',
  `zz_movietype` text NOT NULL,
  `z_movietype` varchar(255) NOT NULL default '',
  `qz_movietype` text NOT NULL,
  `save_movietype` varchar(10) NOT NULL default '',
  `zz_company` text NOT NULL,
  `z_company` varchar(255) NOT NULL default '',
  `qz_company` varchar(255) NOT NULL default '',
  `save_company` varchar(10) NOT NULL default '',
  `zz_movietime` text NOT NULL,
  `z_movietime` varchar(255) NOT NULL default '',
  `qz_movietime` varchar(255) NOT NULL default '',
  `save_movietime` varchar(10) NOT NULL default '',
  `zz_player` text NOT NULL,
  `z_player` varchar(255) NOT NULL default '',
  `qz_player` varchar(255) NOT NULL default '',
  `save_player` varchar(10) NOT NULL default '',
  `zz_playadmin` text NOT NULL,
  `z_playadmin` varchar(255) NOT NULL default '',
  `qz_playadmin` varchar(255) NOT NULL default '',
  `save_playadmin` varchar(10) NOT NULL default '',
  `zz_filetype` text NOT NULL,
  `z_filetype` varchar(255) NOT NULL default '',
  `qz_filetype` text NOT NULL,
  `save_filetype` varchar(10) NOT NULL default '',
  `zz_filesize` text NOT NULL,
  `z_filesize` varchar(255) NOT NULL default '',
  `qz_filesize` text NOT NULL,
  `save_filesize` varchar(10) NOT NULL default '',
  `zz_star` text NOT NULL,
  `z_star` varchar(255) NOT NULL default '',
  `qz_star` text NOT NULL,
  `save_star` varchar(10) NOT NULL default '',
  `zz_playdk` text NOT NULL,
  `z_playdk` varchar(255) NOT NULL default '',
  `qz_playdk` text NOT NULL,
  `save_playdk` varchar(10) NOT NULL default '',
  `zz_playtime` text NOT NULL,
  `z_playtime` varchar(255) NOT NULL default '',
  `qz_playtime` varchar(255) NOT NULL default '',
  `save_playtime` varchar(10) NOT NULL default '',
  `zz_moviefen` text NOT NULL,
  `z_moviefen` varchar(255) NOT NULL default '',
  `qz_moviefen` varchar(255) NOT NULL default '',
  `save_moviefen` varchar(10) NOT NULL default '',
  `zz_downpath` text NOT NULL,
  `z_downpath` varchar(255) NOT NULL default '',
  `qz_downpath` text NOT NULL,
  `save_downpath` varchar(10) NOT NULL default '',
  `zz_onlinepath` text NOT NULL,
  `z_onlinepath` varchar(255) NOT NULL default '',
  `qz_onlinepath` text NOT NULL,
  `save_onlinepath` varchar(10) NOT NULL default '',
  `zz_moviesay` text NOT NULL,
  `z_moviesay` varchar(255) NOT NULL default '',
  `qz_moviesay` text NOT NULL,
  `save_moviesay` varchar(10) NOT NULL default '',
  `zz_playerid` text NOT NULL,
  `z_playerid` varchar(255) NOT NULL default '',
  `qz_playerid` text NOT NULL,
  `save_playerid` varchar(10) NOT NULL default '',
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_infoclass_news`;
CREATE TABLE `phome_ecms_infoclass_news` (
  `classid` int(11) NOT NULL default '0',
  `zz_title` text NOT NULL,
  `z_title` varchar(255) NOT NULL default '',
  `qz_title` varchar(255) NOT NULL default '',
  `save_title` varchar(10) NOT NULL default '',
  `zz_titlepic` text NOT NULL,
  `z_titlepic` varchar(255) NOT NULL default '',
  `qz_titlepic` varchar(255) NOT NULL default '',
  `save_titlepic` varchar(10) NOT NULL default '',
  `zz_newstime` text NOT NULL,
  `z_newstime` varchar(255) NOT NULL default '',
  `qz_newstime` varchar(255) NOT NULL default '',
  `save_newstime` varchar(10) NOT NULL default '',
  `zz_ftitle` text NOT NULL,
  `z_ftitle` varchar(255) NOT NULL default '',
  `qz_ftitle` text NOT NULL,
  `save_ftitle` varchar(10) NOT NULL default '',
  `zz_smalltext` text NOT NULL,
  `z_smalltext` varchar(255) NOT NULL default '',
  `qz_smalltext` text NOT NULL,
  `save_smalltext` varchar(10) NOT NULL default '',
  `zz_writer` text NOT NULL,
  `z_writer` varchar(255) NOT NULL default '',
  `qz_writer` text NOT NULL,
  `save_writer` varchar(10) NOT NULL default '',
  `zz_befrom` text NOT NULL,
  `z_befrom` varchar(255) NOT NULL default '',
  `qz_befrom` text NOT NULL,
  `save_befrom` varchar(10) NOT NULL default '',
  `zz_newstext` text NOT NULL,
  `z_newstext` varchar(255) NOT NULL default '',
  `qz_newstext` varchar(255) NOT NULL default '',
  `save_newstext` varchar(10) NOT NULL default '',
  `zz_diggtop` text NOT NULL,
  `z_diggtop` varchar(255) NOT NULL default '',
  `qz_diggtop` text NOT NULL,
  `save_diggtop` varchar(10) NOT NULL default '',
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_infoclass_photo`;
CREATE TABLE `phome_ecms_infoclass_photo` (
  `classid` int(11) NOT NULL default '0',
  `zz_title` text NOT NULL,
  `z_title` varchar(255) NOT NULL default '',
  `qz_title` varchar(255) NOT NULL default '',
  `save_title` varchar(10) NOT NULL default '',
  `zz_titlepic` text NOT NULL,
  `z_titlepic` varchar(255) NOT NULL default '',
  `qz_titlepic` varchar(255) NOT NULL default '',
  `save_titlepic` varchar(10) NOT NULL default '',
  `zz_newstime` text NOT NULL,
  `z_newstime` varchar(255) NOT NULL default '',
  `qz_newstime` varchar(255) NOT NULL default '',
  `save_newstime` varchar(10) NOT NULL default '',
  `zz_filesize` text NOT NULL,
  `z_filesize` varchar(255) NOT NULL default '',
  `qz_filesize` text NOT NULL,
  `save_filesize` varchar(10) NOT NULL default '',
  `zz_picsize` text NOT NULL,
  `z_picsize` varchar(255) NOT NULL default '',
  `qz_picsize` text NOT NULL,
  `save_picsize` varchar(10) NOT NULL default '',
  `zz_picfbl` text NOT NULL,
  `z_picfbl` varchar(255) NOT NULL default '',
  `qz_picfbl` text NOT NULL,
  `save_picfbl` varchar(10) NOT NULL default '',
  `zz_picfrom` text NOT NULL,
  `z_picfrom` varchar(255) NOT NULL default '',
  `qz_picfrom` text NOT NULL,
  `save_picfrom` varchar(10) NOT NULL default '',
  `zz_picurl` text NOT NULL,
  `z_picurl` varchar(255) NOT NULL default '',
  `qz_picurl` text NOT NULL,
  `save_picurl` varchar(10) NOT NULL default '',
  `zz_morepic` text NOT NULL,
  `z_morepic` varchar(255) NOT NULL default '',
  `qz_morepic` text NOT NULL,
  `save_morepic` varchar(10) NOT NULL default '',
  `zz_num` text NOT NULL,
  `z_num` varchar(255) NOT NULL default '',
  `qz_num` text NOT NULL,
  `save_num` varchar(10) NOT NULL default '',
  `zz_width` text NOT NULL,
  `z_width` varchar(255) NOT NULL default '',
  `qz_width` text NOT NULL,
  `save_width` varchar(10) NOT NULL default '',
  `zz_height` text NOT NULL,
  `z_height` varchar(255) NOT NULL default '',
  `qz_height` text NOT NULL,
  `save_height` varchar(10) NOT NULL default '',
  `zz_picsay` text NOT NULL,
  `z_picsay` varchar(255) NOT NULL default '',
  `qz_picsay` text NOT NULL,
  `save_picsay` varchar(10) NOT NULL default '',
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_infoclass_shop`;
CREATE TABLE `phome_ecms_infoclass_shop` (
  `classid` int(11) NOT NULL default '0',
  `zz_title` text NOT NULL,
  `z_title` varchar(255) NOT NULL default '',
  `qz_title` varchar(255) NOT NULL default '',
  `save_title` varchar(10) NOT NULL default '',
  `zz_titlepic` text NOT NULL,
  `z_titlepic` varchar(255) NOT NULL default '',
  `qz_titlepic` varchar(255) NOT NULL default '',
  `save_titlepic` varchar(10) NOT NULL default '',
  `zz_newstime` text NOT NULL,
  `z_newstime` varchar(255) NOT NULL default '',
  `qz_newstime` varchar(255) NOT NULL default '',
  `save_newstime` varchar(10) NOT NULL default '',
  `zz_productno` text NOT NULL,
  `z_productno` varchar(255) NOT NULL default '',
  `qz_productno` text NOT NULL,
  `save_productno` varchar(10) NOT NULL default '',
  `zz_pbrand` text NOT NULL,
  `z_pbrand` varchar(255) NOT NULL default '',
  `qz_pbrand` text NOT NULL,
  `save_pbrand` varchar(10) NOT NULL default '',
  `zz_intro` text NOT NULL,
  `z_intro` varchar(255) NOT NULL default '',
  `qz_intro` text NOT NULL,
  `save_intro` varchar(10) NOT NULL default '',
  `zz_unit` text NOT NULL,
  `z_unit` varchar(255) NOT NULL default '',
  `qz_unit` text NOT NULL,
  `save_unit` varchar(10) NOT NULL default '',
  `zz_weight` text NOT NULL,
  `z_weight` varchar(255) NOT NULL default '',
  `qz_weight` text NOT NULL,
  `save_weight` varchar(10) NOT NULL default '',
  `zz_tprice` text NOT NULL,
  `z_tprice` varchar(255) NOT NULL default '',
  `qz_tprice` text NOT NULL,
  `save_tprice` varchar(10) NOT NULL default '',
  `zz_price` text NOT NULL,
  `z_price` varchar(255) NOT NULL default '',
  `qz_price` text NOT NULL,
  `save_price` varchar(10) NOT NULL default '',
  `zz_buyfen` text NOT NULL,
  `z_buyfen` varchar(255) NOT NULL default '',
  `qz_buyfen` text NOT NULL,
  `save_buyfen` varchar(10) NOT NULL default '',
  `zz_pmaxnum` text NOT NULL,
  `z_pmaxnum` varchar(255) NOT NULL default '',
  `qz_pmaxnum` text NOT NULL,
  `save_pmaxnum` varchar(10) NOT NULL default '',
  `zz_productpic` text NOT NULL,
  `z_productpic` varchar(255) NOT NULL default '',
  `qz_productpic` text NOT NULL,
  `save_productpic` varchar(10) NOT NULL default '',
  `zz_newstext` text NOT NULL,
  `z_newstext` varchar(255) NOT NULL default '',
  `qz_newstext` text NOT NULL,
  `save_newstext` varchar(10) NOT NULL default '',
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_infotmp_article`;
CREATE TABLE `phome_ecms_infotmp_article` (
  `id` bigint(20) NOT NULL auto_increment,
  `classid` int(11) NOT NULL default '0',
  `oldurl` varchar(255) NOT NULL default '',
  `checked` tinyint(1) NOT NULL default '0',
  `tmptime` datetime NOT NULL default '0000-00-00 00:00:00',
  `title` varchar(200) NOT NULL default '',
  `newstime` datetime NOT NULL default '0000-00-00 00:00:00',
  `username` varchar(30) NOT NULL default '',
  `userid` int(11) NOT NULL default '0',
  `truetime` int(11) NOT NULL default '0',
  `keyboard` varchar(255) NOT NULL default '',
  `titlepic` varchar(200) NOT NULL default '',
  `ftitle` varchar(120) NOT NULL default '',
  `smalltext` varchar(255) NOT NULL default '',
  `writer` varchar(30) NOT NULL default '',
  `befrom` varchar(60) NOT NULL default '',
  `newstext` mediumtext NOT NULL,
  `diggtop` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_infotmp_download`;
CREATE TABLE `phome_ecms_infotmp_download` (
  `id` bigint(20) NOT NULL auto_increment,
  `classid` int(11) NOT NULL default '0',
  `oldurl` varchar(255) NOT NULL default '',
  `checked` tinyint(1) NOT NULL default '0',
  `tmptime` datetime NOT NULL default '0000-00-00 00:00:00',
  `title` varchar(200) NOT NULL default '',
  `newstime` datetime NOT NULL default '0000-00-00 00:00:00',
  `username` varchar(30) NOT NULL default '',
  `userid` int(11) NOT NULL default '0',
  `truetime` int(11) NOT NULL default '0',
  `keyboard` varchar(255) NOT NULL default '',
  `titlepic` varchar(200) NOT NULL default '',
  `softwriter` varchar(30) NOT NULL default '',
  `homepage` varchar(80) NOT NULL default '',
  `demo` varchar(120) NOT NULL default '',
  `softfj` varchar(255) NOT NULL default '',
  `language` varchar(16) NOT NULL default '',
  `softtype` varchar(16) NOT NULL default '',
  `softsq` varchar(16) NOT NULL default '',
  `star` tinyint(1) NOT NULL default '0',
  `filetype` varchar(10) NOT NULL default '',
  `filesize` varchar(16) NOT NULL default '',
  `downpath` mediumtext NOT NULL,
  `softsay` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_infotmp_flash`;
CREATE TABLE `phome_ecms_infotmp_flash` (
  `id` bigint(20) NOT NULL auto_increment,
  `classid` int(11) NOT NULL default '0',
  `oldurl` varchar(255) NOT NULL default '',
  `checked` tinyint(1) NOT NULL default '0',
  `tmptime` datetime NOT NULL default '0000-00-00 00:00:00',
  `title` varchar(200) NOT NULL default '',
  `newstime` datetime NOT NULL default '0000-00-00 00:00:00',
  `username` varchar(30) NOT NULL default '',
  `userid` int(11) NOT NULL default '0',
  `truetime` int(11) NOT NULL default '0',
  `keyboard` varchar(255) NOT NULL default '',
  `titlepic` varchar(200) NOT NULL default '',
  `flashwriter` varchar(30) NOT NULL default '',
  `email` varchar(80) NOT NULL default '',
  `star` tinyint(1) NOT NULL default '0',
  `filesize` varchar(16) NOT NULL default '',
  `flashurl` varchar(255) NOT NULL default '',
  `width` varchar(12) NOT NULL default '',
  `height` varchar(12) NOT NULL default '',
  `flashsay` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_infotmp_info`;
CREATE TABLE `phome_ecms_infotmp_info` (
  `id` bigint(20) NOT NULL auto_increment,
  `classid` int(11) NOT NULL default '0',
  `oldurl` varchar(255) NOT NULL default '',
  `checked` tinyint(1) NOT NULL default '0',
  `tmptime` datetime NOT NULL default '0000-00-00 00:00:00',
  `title` varchar(200) NOT NULL default '',
  `newstime` datetime NOT NULL default '0000-00-00 00:00:00',
  `username` varchar(30) NOT NULL default '',
  `userid` int(11) NOT NULL default '0',
  `truetime` int(11) NOT NULL default '0',
  `keyboard` varchar(255) NOT NULL default '',
  `titlepic` varchar(200) NOT NULL default '',
  `smalltext` text NOT NULL,
  `myarea` varchar(30) NOT NULL default '',
  `email` varchar(80) NOT NULL default '',
  `mycontact` varchar(255) NOT NULL default '',
  `address` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_infotmp_movie`;
CREATE TABLE `phome_ecms_infotmp_movie` (
  `id` bigint(20) NOT NULL auto_increment,
  `classid` int(11) NOT NULL default '0',
  `oldurl` varchar(255) NOT NULL default '',
  `checked` tinyint(1) NOT NULL default '0',
  `tmptime` datetime NOT NULL default '0000-00-00 00:00:00',
  `title` varchar(200) NOT NULL default '',
  `newstime` datetime NOT NULL default '0000-00-00 00:00:00',
  `username` varchar(30) NOT NULL default '',
  `userid` int(11) NOT NULL default '0',
  `truetime` int(11) NOT NULL default '0',
  `keyboard` varchar(255) NOT NULL default '',
  `titlepic` varchar(200) NOT NULL default '',
  `movietype` varchar(16) NOT NULL default '',
  `company` varchar(200) NOT NULL default '',
  `movietime` varchar(20) NOT NULL default '',
  `player` varchar(255) NOT NULL default '',
  `playadmin` varchar(255) NOT NULL default '',
  `filetype` varchar(10) NOT NULL default '',
  `filesize` varchar(16) NOT NULL default '',
  `star` tinyint(1) NOT NULL default '0',
  `playdk` varchar(30) NOT NULL default '',
  `playtime` varchar(20) NOT NULL default '',
  `moviefen` int(11) NOT NULL default '0',
  `downpath` mediumtext NOT NULL,
  `onlinepath` mediumtext NOT NULL,
  `moviesay` text NOT NULL,
  `playerid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_infotmp_news`;
CREATE TABLE `phome_ecms_infotmp_news` (
  `id` bigint(20) NOT NULL auto_increment,
  `classid` int(11) NOT NULL default '0',
  `oldurl` varchar(255) NOT NULL default '',
  `checked` tinyint(1) NOT NULL default '0',
  `tmptime` datetime NOT NULL default '0000-00-00 00:00:00',
  `title` varchar(200) NOT NULL default '',
  `newstime` datetime NOT NULL default '0000-00-00 00:00:00',
  `username` varchar(30) NOT NULL default '',
  `userid` int(11) NOT NULL default '0',
  `truetime` int(11) NOT NULL default '0',
  `keyboard` varchar(255) NOT NULL default '',
  `titlepic` varchar(200) NOT NULL default '',
  `ftitle` varchar(120) NOT NULL default '',
  `smalltext` varchar(255) NOT NULL default '',
  `writer` varchar(30) NOT NULL default '',
  `befrom` varchar(60) NOT NULL default '',
  `newstext` mediumtext NOT NULL,
  `diggtop` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_infotmp_photo`;
CREATE TABLE `phome_ecms_infotmp_photo` (
  `id` bigint(20) NOT NULL auto_increment,
  `classid` int(11) NOT NULL default '0',
  `oldurl` varchar(255) NOT NULL default '',
  `checked` tinyint(1) NOT NULL default '0',
  `tmptime` datetime NOT NULL default '0000-00-00 00:00:00',
  `title` varchar(200) NOT NULL default '',
  `newstime` datetime NOT NULL default '0000-00-00 00:00:00',
  `username` varchar(30) NOT NULL default '',
  `userid` int(11) NOT NULL default '0',
  `truetime` int(11) NOT NULL default '0',
  `keyboard` varchar(255) NOT NULL default '',
  `titlepic` varchar(200) NOT NULL default '',
  `filesize` varchar(10) NOT NULL default '',
  `picsize` varchar(20) NOT NULL default '',
  `picfbl` varchar(20) NOT NULL default '',
  `picfrom` varchar(120) NOT NULL default '',
  `picurl` varchar(200) NOT NULL default '',
  `morepic` mediumtext NOT NULL,
  `num` tinyint(4) NOT NULL default '0',
  `width` varchar(12) NOT NULL default '',
  `height` varchar(12) NOT NULL default '',
  `picsay` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_infotmp_shop`;
CREATE TABLE `phome_ecms_infotmp_shop` (
  `id` bigint(20) NOT NULL auto_increment,
  `classid` int(11) NOT NULL default '0',
  `oldurl` varchar(255) NOT NULL default '',
  `checked` tinyint(1) NOT NULL default '0',
  `tmptime` datetime NOT NULL default '0000-00-00 00:00:00',
  `title` varchar(200) NOT NULL default '',
  `newstime` datetime NOT NULL default '0000-00-00 00:00:00',
  `username` varchar(30) NOT NULL default '',
  `userid` int(11) NOT NULL default '0',
  `truetime` int(11) NOT NULL default '0',
  `keyboard` varchar(255) NOT NULL default '',
  `titlepic` varchar(200) NOT NULL default '',
  `productno` varchar(30) NOT NULL default '',
  `pbrand` varchar(30) NOT NULL default '',
  `intro` text NOT NULL,
  `unit` varchar(16) NOT NULL default '',
  `weight` varchar(20) NOT NULL default '',
  `tprice` float(11,2) NOT NULL default '0.00',
  `price` float(11,2) NOT NULL default '0.00',
  `buyfen` int(11) NOT NULL default '0',
  `pmaxnum` int(11) NOT NULL default '0',
  `productpic` varchar(255) NOT NULL default '',
  `newstext` mediumtext NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_movie`;
CREATE TABLE `phome_ecms_movie` (
  `id` int(11) NOT NULL auto_increment,
  `classid` smallint(6) NOT NULL default '0',
  `onclick` int(11) NOT NULL default '0',
  `newspath` varchar(20) NOT NULL default '',
  `keyboard` varchar(160) NOT NULL default '',
  `keyid` varchar(255) NOT NULL default '',
  `userid` int(11) NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `ztid` varchar(255) NOT NULL default '',
  `checked` tinyint(1) NOT NULL default '0',
  `istop` tinyint(1) NOT NULL default '0',
  `truetime` int(10) NOT NULL default '0',
  `ismember` tinyint(1) NOT NULL default '0',
  `dokey` tinyint(1) NOT NULL default '0',
  `userfen` smallint(6) NOT NULL default '0',
  `isgood` tinyint(1) NOT NULL default '0',
  `titlefont` varchar(20) NOT NULL default '',
  `titleurl` varchar(200) NOT NULL default '',
  `filename` varchar(60) NOT NULL default '',
  `groupid` smallint(6) NOT NULL default '0',
  `newstempid` smallint(6) NOT NULL default '0',
  `plnum` int(11) NOT NULL default '0',
  `firsttitle` tinyint(1) NOT NULL default '0',
  `isqf` tinyint(1) NOT NULL default '0',
  `totaldown` int(11) NOT NULL default '0',
  `title` varchar(200) NOT NULL default '',
  `newstime` int(10) NOT NULL default '0',
  `titlepic` varchar(200) NOT NULL default '',
  `closepl` tinyint(1) NOT NULL default '0',
  `havehtml` tinyint(1) NOT NULL default '0',
  `lastdotime` int(10) NOT NULL default '0',
  `haveaddfen` tinyint(1) NOT NULL default '0',
  `infopfen` int(11) NOT NULL default '0',
  `infopfennum` int(11) NOT NULL default '0',
  `votenum` int(11) NOT NULL default '0',
  `movietype` varchar(16) NOT NULL default '',
  `company` varchar(200) NOT NULL default '',
  `movietime` varchar(20) NOT NULL default '',
  `player` varchar(255) NOT NULL default '',
  `playadmin` varchar(255) NOT NULL default '',
  `filetype` varchar(10) NOT NULL default '',
  `filesize` varchar(16) NOT NULL default '',
  `star` tinyint(1) NOT NULL default '0',
  `moviefen` int(11) NOT NULL default '0',
  `moviesay` text NOT NULL,
  `stb` varchar(4) NOT NULL default '',
  `copyids` varchar(255) NOT NULL default '',
  `ttid` smallint(6) NOT NULL default '0',
  `infotags` varchar(160) NOT NULL default '',
  `ispic` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `checked` (`checked`),
  KEY `newstime` (`newstime`),
  KEY `truetime` (`truetime`),
  KEY `classid` (`classid`),
  KEY `ttid` (`ttid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_movie_data_1`;
CREATE TABLE `phome_ecms_movie_data_1` (
  `id` int(11) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  `playdk` varchar(30) NOT NULL default '',
  `playtime` varchar(20) NOT NULL default '',
  `downpath` mediumtext NOT NULL,
  `onlinepath` mediumtext NOT NULL,
  `playerid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_movie_doc`;
CREATE TABLE `phome_ecms_movie_doc` (
  `id` int(11) NOT NULL auto_increment,
  `classid` smallint(6) NOT NULL default '0',
  `onclick` int(11) NOT NULL default '0',
  `newspath` varchar(20) NOT NULL default '',
  `keyboard` varchar(160) NOT NULL default '',
  `keyid` varchar(255) NOT NULL default '',
  `userid` int(11) NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `ztid` varchar(255) NOT NULL default '',
  `checked` tinyint(1) NOT NULL default '0',
  `istop` tinyint(1) NOT NULL default '0',
  `truetime` int(10) NOT NULL default '0',
  `ismember` tinyint(1) NOT NULL default '0',
  `dokey` tinyint(1) NOT NULL default '0',
  `userfen` smallint(6) NOT NULL default '0',
  `isgood` tinyint(1) NOT NULL default '0',
  `titlefont` varchar(20) NOT NULL default '',
  `titleurl` varchar(200) NOT NULL default '',
  `filename` varchar(60) NOT NULL default '',
  `groupid` smallint(6) NOT NULL default '0',
  `newstempid` smallint(6) NOT NULL default '0',
  `plnum` int(11) NOT NULL default '0',
  `firsttitle` tinyint(1) NOT NULL default '0',
  `isqf` tinyint(1) NOT NULL default '0',
  `totaldown` int(11) NOT NULL default '0',
  `title` varchar(200) NOT NULL default '',
  `newstime` int(10) NOT NULL default '0',
  `titlepic` varchar(200) NOT NULL default '',
  `closepl` tinyint(1) NOT NULL default '0',
  `havehtml` tinyint(1) NOT NULL default '0',
  `lastdotime` int(10) NOT NULL default '0',
  `haveaddfen` tinyint(1) NOT NULL default '0',
  `infopfen` int(11) NOT NULL default '0',
  `infopfennum` int(11) NOT NULL default '0',
  `votenum` int(11) NOT NULL default '0',
  `movietype` varchar(16) NOT NULL default '',
  `company` varchar(200) NOT NULL default '',
  `movietime` varchar(20) NOT NULL default '',
  `player` varchar(255) NOT NULL default '',
  `playadmin` varchar(255) NOT NULL default '',
  `filetype` varchar(10) NOT NULL default '',
  `filesize` varchar(16) NOT NULL default '',
  `star` tinyint(1) NOT NULL default '0',
  `moviefen` int(11) NOT NULL default '0',
  `moviesay` text NOT NULL,
  `stb` varchar(4) NOT NULL default '',
  `copyids` varchar(255) NOT NULL default '',
  `ttid` smallint(6) NOT NULL default '0',
  `infotags` varchar(160) NOT NULL default '',
  `ispic` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `checked` (`checked`),
  KEY `newstime` (`newstime`),
  KEY `truetime` (`truetime`),
  KEY `classid` (`classid`),
  KEY `ttid` (`ttid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_movie_doc_data`;
CREATE TABLE `phome_ecms_movie_doc_data` (
  `id` int(11) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  `playdk` varchar(30) NOT NULL default '',
  `playtime` varchar(20) NOT NULL default '',
  `downpath` mediumtext NOT NULL,
  `onlinepath` mediumtext NOT NULL,
  `playerid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_news`;
CREATE TABLE `phome_ecms_news` (
  `id` int(11) NOT NULL auto_increment,
  `classid` smallint(6) NOT NULL default '0',
  `onclick` int(11) NOT NULL default '0',
  `newspath` char(20) NOT NULL default '',
  `keyboard` char(160) NOT NULL default '',
  `keyid` char(255) NOT NULL default '',
  `userid` int(11) NOT NULL default '0',
  `username` char(30) NOT NULL default '',
  `ztid` char(255) NOT NULL default '',
  `checked` tinyint(1) NOT NULL default '0',
  `istop` tinyint(1) NOT NULL default '0',
  `truetime` int(10) NOT NULL default '0',
  `ismember` tinyint(1) NOT NULL default '0',
  `dokey` tinyint(1) NOT NULL default '0',
  `userfen` smallint(6) NOT NULL default '0',
  `isgood` tinyint(1) NOT NULL default '0',
  `titlefont` char(20) NOT NULL default '',
  `titleurl` char(200) NOT NULL default '',
  `filename` char(60) NOT NULL default '',
  `groupid` smallint(6) NOT NULL default '0',
  `newstempid` smallint(6) NOT NULL default '0',
  `plnum` int(11) NOT NULL default '0',
  `firsttitle` tinyint(1) NOT NULL default '0',
  `isqf` tinyint(1) NOT NULL default '0',
  `totaldown` int(11) NOT NULL default '0',
  `title` char(200) NOT NULL default '',
  `newstime` int(10) NOT NULL default '0',
  `titlepic` char(200) NOT NULL default '',
  `closepl` tinyint(1) NOT NULL default '0',
  `havehtml` tinyint(1) NOT NULL default '0',
  `lastdotime` int(10) NOT NULL default '0',
  `haveaddfen` tinyint(1) NOT NULL default '0',
  `infopfen` int(11) NOT NULL default '0',
  `infopfennum` int(11) NOT NULL default '0',
  `votenum` int(11) NOT NULL default '0',
  `ftitle` char(120) NOT NULL default '',
  `smalltext` char(255) NOT NULL default '',
  `diggtop` int(11) NOT NULL default '0',
  `stb` char(4) NOT NULL default '',
  `copyids` char(255) NOT NULL default '',
  `ttid` smallint(6) NOT NULL default '0',
  `infotags` char(160) NOT NULL default '',
  `ispic` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `checked` (`checked`),
  KEY `newstime` (`newstime`),
  KEY `truetime` (`truetime`),
  KEY `classid` (`classid`),
  KEY `ttid` (`ttid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_news_data_1`;
CREATE TABLE `phome_ecms_news_data_1` (
  `id` int(11) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  `writer` varchar(30) NOT NULL default '',
  `befrom` varchar(60) NOT NULL default '',
  `newstext` mediumtext NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_news_doc`;
CREATE TABLE `phome_ecms_news_doc` (
  `id` int(11) NOT NULL auto_increment,
  `classid` smallint(6) NOT NULL default '0',
  `onclick` int(11) NOT NULL default '0',
  `newspath` char(20) NOT NULL default '',
  `keyboard` char(160) NOT NULL default '',
  `keyid` char(255) NOT NULL default '',
  `userid` int(11) NOT NULL default '0',
  `username` char(30) NOT NULL default '',
  `ztid` char(255) NOT NULL default '',
  `checked` tinyint(1) NOT NULL default '0',
  `istop` tinyint(1) NOT NULL default '0',
  `truetime` int(10) NOT NULL default '0',
  `ismember` tinyint(1) NOT NULL default '0',
  `dokey` tinyint(1) NOT NULL default '0',
  `userfen` smallint(6) NOT NULL default '0',
  `isgood` tinyint(1) NOT NULL default '0',
  `titlefont` char(20) NOT NULL default '',
  `titleurl` char(200) NOT NULL default '',
  `filename` char(60) NOT NULL default '',
  `groupid` smallint(6) NOT NULL default '0',
  `newstempid` smallint(6) NOT NULL default '0',
  `plnum` int(11) NOT NULL default '0',
  `firsttitle` tinyint(1) NOT NULL default '0',
  `isqf` tinyint(1) NOT NULL default '0',
  `totaldown` int(11) NOT NULL default '0',
  `title` char(200) NOT NULL default '',
  `newstime` int(10) NOT NULL default '0',
  `titlepic` char(200) NOT NULL default '',
  `closepl` tinyint(1) NOT NULL default '0',
  `havehtml` tinyint(1) NOT NULL default '0',
  `lastdotime` int(10) NOT NULL default '0',
  `haveaddfen` tinyint(1) NOT NULL default '0',
  `infopfen` int(11) NOT NULL default '0',
  `infopfennum` int(11) NOT NULL default '0',
  `votenum` int(11) NOT NULL default '0',
  `ftitle` char(120) NOT NULL default '',
  `smalltext` char(255) NOT NULL default '',
  `diggtop` int(11) NOT NULL default '0',
  `stb` char(4) NOT NULL default '',
  `copyids` char(255) NOT NULL default '',
  `ttid` smallint(6) NOT NULL default '0',
  `infotags` char(160) NOT NULL default '',
  `ispic` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `checked` (`checked`),
  KEY `newstime` (`newstime`),
  KEY `truetime` (`truetime`),
  KEY `classid` (`classid`),
  KEY `ttid` (`ttid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_news_doc_data`;
CREATE TABLE `phome_ecms_news_doc_data` (
  `id` int(11) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  `writer` varchar(30) NOT NULL default '',
  `befrom` varchar(60) NOT NULL default '',
  `newstext` mediumtext NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_photo`;
CREATE TABLE `phome_ecms_photo` (
  `id` int(11) NOT NULL auto_increment,
  `classid` smallint(6) NOT NULL default '0',
  `onclick` int(11) NOT NULL default '0',
  `newspath` varchar(20) NOT NULL default '',
  `keyboard` varchar(160) NOT NULL default '',
  `keyid` varchar(255) NOT NULL default '',
  `userid` int(11) NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `ztid` varchar(255) NOT NULL default '',
  `checked` tinyint(1) NOT NULL default '0',
  `istop` tinyint(1) NOT NULL default '0',
  `truetime` int(10) NOT NULL default '0',
  `ismember` tinyint(1) NOT NULL default '0',
  `dokey` tinyint(1) NOT NULL default '0',
  `userfen` smallint(6) NOT NULL default '0',
  `isgood` tinyint(1) NOT NULL default '0',
  `titlefont` varchar(20) NOT NULL default '',
  `titleurl` varchar(200) NOT NULL default '',
  `filename` varchar(60) NOT NULL default '',
  `groupid` smallint(6) NOT NULL default '0',
  `newstempid` smallint(6) NOT NULL default '0',
  `plnum` int(11) NOT NULL default '0',
  `firsttitle` tinyint(1) NOT NULL default '0',
  `isqf` tinyint(1) NOT NULL default '0',
  `totaldown` int(11) NOT NULL default '0',
  `title` varchar(200) NOT NULL default '',
  `newstime` int(10) NOT NULL default '0',
  `titlepic` varchar(200) NOT NULL default '',
  `closepl` tinyint(1) NOT NULL default '0',
  `havehtml` tinyint(1) NOT NULL default '0',
  `lastdotime` int(10) NOT NULL default '0',
  `haveaddfen` tinyint(1) NOT NULL default '0',
  `infopfen` int(11) NOT NULL default '0',
  `infopfennum` int(11) NOT NULL default '0',
  `votenum` int(11) NOT NULL default '0',
  `picurl` varchar(200) NOT NULL default '',
  `picsay` text NOT NULL,
  `stb` varchar(4) NOT NULL default '',
  `copyids` varchar(255) NOT NULL default '',
  `ttid` smallint(6) NOT NULL default '0',
  `infotags` varchar(160) NOT NULL default '',
  `ispic` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `checked` (`checked`),
  KEY `newstime` (`newstime`),
  KEY `truetime` (`truetime`),
  KEY `classid` (`classid`),
  KEY `ttid` (`ttid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_photo_data_1`;
CREATE TABLE `phome_ecms_photo_data_1` (
  `id` int(11) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  `filesize` varchar(10) NOT NULL default '',
  `picsize` varchar(20) NOT NULL default '',
  `picfbl` varchar(20) NOT NULL default '',
  `picfrom` varchar(120) NOT NULL default '',
  `morepic` mediumtext NOT NULL,
  `num` tinyint(4) NOT NULL default '0',
  `width` varchar(12) NOT NULL default '',
  `height` varchar(12) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_photo_doc`;
CREATE TABLE `phome_ecms_photo_doc` (
  `id` int(11) NOT NULL auto_increment,
  `classid` smallint(6) NOT NULL default '0',
  `onclick` int(11) NOT NULL default '0',
  `newspath` varchar(20) NOT NULL default '',
  `keyboard` varchar(160) NOT NULL default '',
  `keyid` varchar(255) NOT NULL default '',
  `userid` int(11) NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `ztid` varchar(255) NOT NULL default '',
  `checked` tinyint(1) NOT NULL default '0',
  `istop` tinyint(1) NOT NULL default '0',
  `truetime` int(10) NOT NULL default '0',
  `ismember` tinyint(1) NOT NULL default '0',
  `dokey` tinyint(1) NOT NULL default '0',
  `userfen` smallint(6) NOT NULL default '0',
  `isgood` tinyint(1) NOT NULL default '0',
  `titlefont` varchar(20) NOT NULL default '',
  `titleurl` varchar(200) NOT NULL default '',
  `filename` varchar(60) NOT NULL default '',
  `groupid` smallint(6) NOT NULL default '0',
  `newstempid` smallint(6) NOT NULL default '0',
  `plnum` int(11) NOT NULL default '0',
  `firsttitle` tinyint(1) NOT NULL default '0',
  `isqf` tinyint(1) NOT NULL default '0',
  `totaldown` int(11) NOT NULL default '0',
  `title` varchar(200) NOT NULL default '',
  `newstime` int(10) NOT NULL default '0',
  `titlepic` varchar(200) NOT NULL default '',
  `closepl` tinyint(1) NOT NULL default '0',
  `havehtml` tinyint(1) NOT NULL default '0',
  `lastdotime` int(10) NOT NULL default '0',
  `haveaddfen` tinyint(1) NOT NULL default '0',
  `infopfen` int(11) NOT NULL default '0',
  `infopfennum` int(11) NOT NULL default '0',
  `votenum` int(11) NOT NULL default '0',
  `picurl` varchar(200) NOT NULL default '',
  `picsay` text NOT NULL,
  `stb` varchar(4) NOT NULL default '',
  `copyids` varchar(255) NOT NULL default '',
  `ttid` smallint(6) NOT NULL default '0',
  `infotags` varchar(160) NOT NULL default '',
  `ispic` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `checked` (`checked`),
  KEY `newstime` (`newstime`),
  KEY `truetime` (`truetime`),
  KEY `classid` (`classid`),
  KEY `ttid` (`ttid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_photo_doc_data`;
CREATE TABLE `phome_ecms_photo_doc_data` (
  `id` int(11) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  `filesize` varchar(10) NOT NULL default '',
  `picsize` varchar(20) NOT NULL default '',
  `picfbl` varchar(20) NOT NULL default '',
  `picfrom` varchar(120) NOT NULL default '',
  `morepic` mediumtext NOT NULL,
  `num` tinyint(4) NOT NULL default '0',
  `width` varchar(12) NOT NULL default '',
  `height` varchar(12) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_shop`;
CREATE TABLE `phome_ecms_shop` (
  `id` int(11) NOT NULL auto_increment,
  `classid` smallint(6) NOT NULL default '0',
  `onclick` int(11) NOT NULL default '0',
  `newspath` varchar(20) NOT NULL default '',
  `keyboard` varchar(160) NOT NULL default '',
  `keyid` varchar(255) NOT NULL default '',
  `userid` int(11) NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `ztid` varchar(255) NOT NULL default '',
  `checked` tinyint(1) NOT NULL default '0',
  `istop` tinyint(1) NOT NULL default '0',
  `truetime` int(10) NOT NULL default '0',
  `ismember` tinyint(1) NOT NULL default '0',
  `dokey` tinyint(1) NOT NULL default '0',
  `userfen` smallint(6) NOT NULL default '0',
  `isgood` tinyint(1) NOT NULL default '0',
  `titlefont` varchar(20) NOT NULL default '',
  `titleurl` varchar(200) NOT NULL default '',
  `filename` varchar(60) NOT NULL default '',
  `groupid` smallint(6) NOT NULL default '0',
  `newstempid` smallint(6) NOT NULL default '0',
  `plnum` int(11) NOT NULL default '0',
  `firsttitle` tinyint(1) NOT NULL default '0',
  `isqf` tinyint(1) NOT NULL default '0',
  `totaldown` int(11) NOT NULL default '0',
  `title` varchar(200) NOT NULL default '',
  `newstime` int(10) NOT NULL default '0',
  `titlepic` varchar(200) NOT NULL default '',
  `closepl` tinyint(1) NOT NULL default '0',
  `havehtml` tinyint(1) NOT NULL default '0',
  `lastdotime` int(10) NOT NULL default '0',
  `haveaddfen` tinyint(1) NOT NULL default '0',
  `infopfen` int(11) NOT NULL default '0',
  `infopfennum` int(11) NOT NULL default '0',
  `votenum` int(11) NOT NULL default '0',
  `productno` varchar(30) NOT NULL default '',
  `pbrand` varchar(30) NOT NULL default '',
  `intro` text NOT NULL,
  `unit` varchar(16) NOT NULL default '',
  `weight` varchar(20) NOT NULL default '',
  `tprice` float(11,2) NOT NULL default '0.00',
  `price` float(11,2) NOT NULL default '0.00',
  `buyfen` int(11) NOT NULL default '0',
  `pmaxnum` int(11) NOT NULL default '0',
  `productpic` varchar(255) NOT NULL default '',
  `newstext` mediumtext NOT NULL,
  `stb` varchar(4) NOT NULL default '',
  `copyids` varchar(255) NOT NULL default '',
  `ttid` smallint(6) NOT NULL default '0',
  `infotags` varchar(160) NOT NULL default '',
  `ispic` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `checked` (`checked`),
  KEY `newstime` (`newstime`),
  KEY `truetime` (`truetime`),
  KEY `classid` (`classid`),
  KEY `ttid` (`ttid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_shop_data_1`;
CREATE TABLE `phome_ecms_shop_data_1` (
  `id` int(11) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_shop_doc`;
CREATE TABLE `phome_ecms_shop_doc` (
  `id` int(11) NOT NULL auto_increment,
  `classid` smallint(6) NOT NULL default '0',
  `onclick` int(11) NOT NULL default '0',
  `newspath` varchar(20) NOT NULL default '',
  `keyboard` varchar(160) NOT NULL default '',
  `keyid` varchar(255) NOT NULL default '',
  `userid` int(11) NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `ztid` varchar(255) NOT NULL default '',
  `checked` tinyint(1) NOT NULL default '0',
  `istop` tinyint(1) NOT NULL default '0',
  `truetime` int(10) NOT NULL default '0',
  `ismember` tinyint(1) NOT NULL default '0',
  `dokey` tinyint(1) NOT NULL default '0',
  `userfen` smallint(6) NOT NULL default '0',
  `isgood` tinyint(1) NOT NULL default '0',
  `titlefont` varchar(20) NOT NULL default '',
  `titleurl` varchar(200) NOT NULL default '',
  `filename` varchar(60) NOT NULL default '',
  `groupid` smallint(6) NOT NULL default '0',
  `newstempid` smallint(6) NOT NULL default '0',
  `plnum` int(11) NOT NULL default '0',
  `firsttitle` tinyint(1) NOT NULL default '0',
  `isqf` tinyint(1) NOT NULL default '0',
  `totaldown` int(11) NOT NULL default '0',
  `title` varchar(200) NOT NULL default '',
  `newstime` int(10) NOT NULL default '0',
  `titlepic` varchar(200) NOT NULL default '',
  `closepl` tinyint(1) NOT NULL default '0',
  `havehtml` tinyint(1) NOT NULL default '0',
  `lastdotime` int(10) NOT NULL default '0',
  `haveaddfen` tinyint(1) NOT NULL default '0',
  `infopfen` int(11) NOT NULL default '0',
  `infopfennum` int(11) NOT NULL default '0',
  `votenum` int(11) NOT NULL default '0',
  `productno` varchar(30) NOT NULL default '',
  `pbrand` varchar(30) NOT NULL default '',
  `intro` text NOT NULL,
  `unit` varchar(16) NOT NULL default '',
  `weight` varchar(20) NOT NULL default '',
  `tprice` float(11,2) NOT NULL default '0.00',
  `price` float(11,2) NOT NULL default '0.00',
  `buyfen` int(11) NOT NULL default '0',
  `pmaxnum` int(11) NOT NULL default '0',
  `productpic` varchar(255) NOT NULL default '',
  `newstext` mediumtext NOT NULL,
  `stb` varchar(4) NOT NULL default '',
  `copyids` varchar(255) NOT NULL default '',
  `ttid` smallint(6) NOT NULL default '0',
  `infotags` varchar(160) NOT NULL default '',
  `ispic` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `checked` (`checked`),
  KEY `newstime` (`newstime`),
  KEY `truetime` (`truetime`),
  KEY `classid` (`classid`),
  KEY `ttid` (`ttid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_ecms_shop_doc_data`;
CREATE TABLE `phome_ecms_shop_doc_data` (
  `id` int(11) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsad`;
CREATE TABLE `phome_enewsad` (
  `adid` int(11) NOT NULL auto_increment,
  `picurl` varchar(255) NOT NULL default '',
  `url` text NOT NULL,
  `pic_width` int(11) NOT NULL default '0',
  `pic_height` int(11) NOT NULL default '0',
  `onclick` int(11) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  `adtype` tinyint(4) NOT NULL default '0',
  `title` varchar(100) NOT NULL default '',
  `target` varchar(10) NOT NULL default '',
  `alt` varchar(120) NOT NULL default '',
  `starttime` date NOT NULL default '0000-00-00',
  `endtime` date NOT NULL default '0000-00-00',
  `adsay` text NOT NULL,
  `titlefont` varchar(255) NOT NULL default '',
  `titlecolor` varchar(10) NOT NULL default '',
  `htmlcode` text NOT NULL,
  `t` tinyint(4) NOT NULL default '0',
  `ylink` tinyint(1) NOT NULL default '0',
  `reptext` text NOT NULL,
  PRIMARY KEY  (`adid`),
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsadclass`;
CREATE TABLE `phome_enewsadclass` (
  `classid` smallint(6) NOT NULL auto_increment,
  `classname` varchar(60) NOT NULL default '',
  PRIMARY KEY  (`classid`)
) TYPE=MyISAM;

INSERT INTO `phome_enewsadclass` VALUES (1, '默认广告分类');

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsadminstyle`;
CREATE TABLE `phome_enewsadminstyle` (
  `styleid` smallint(6) NOT NULL auto_increment,
  `stylename` varchar(60) NOT NULL default '',
  `path` smallint(6) NOT NULL default '0',
  `isdefault` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`styleid`)
) TYPE=MyISAM;

INSERT INTO `phome_enewsadminstyle` VALUES (1, '管理员后台界面', 1, 1);
INSERT INTO `phome_enewsadminstyle` VALUES (2, '编辑后台界面', 2, 0);

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsbefrom`;
CREATE TABLE `phome_enewsbefrom` (
  `befromid` smallint(6) NOT NULL auto_increment,
  `sitename` varchar(60) NOT NULL default '',
  `siteurl` varchar(200) NOT NULL default '',
  PRIMARY KEY  (`befromid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsbq`;
CREATE TABLE `phome_enewsbq` (
  `bqid` smallint(6) NOT NULL auto_increment,
  `bqname` varchar(60) NOT NULL default '',
  `bqsay` text NOT NULL,
  `funname` varchar(60) NOT NULL default '',
  `bq` varchar(60) NOT NULL default '',
  `issys` tinyint(1) NOT NULL default '0',
  `bqgs` text NOT NULL,
  `isclose` tinyint(1) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  `myorder` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`bqid`),
  KEY `classid` (`classid`)
) TYPE=MyISAM;

INSERT INTO `phome_enewsbq` VALUES (1, '文字调用标签', '<table cellspacing=\\"1\\" cellpadding=\\"3\\" width=\\"100%\\" bgcolor=\\"#dbeaf5\\" border=\\"0\\">\r\n    <tbody>\r\n        <tr>\r\n            <td>\r\n            <div align=\\"center\\">参数</div>\r\n            </td>\r\n            <td>参数说明</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">栏目ID/专题ID</div>\r\n            </td>\r\n            <td height=\\"25\\">查看栏目ID点<a onclick=\\"window.open(\\\'../ListClass.php\\\');\\"><strong><u>这里</u></strong></a>，查看专题ID点<a onclick=\\"window.open(\\\'../ListZt.php\\\');\\"><strong><u>这里</u></strong></a>,当前ID=\\\'selfinfo\\\'<br />\r\n            多个栏目ID与专题ID可用,号格开，如\\\'1,2\\\'</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">显示条数</div>\r\n            </td>\r\n            <td height=\\"25\\">显示前几条记录</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">标题截取数</div>\r\n            </td>\r\n            <td height=\\"25\\">截取几个字符</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">是否显示时间</div>\r\n            </td>\r\n            <td height=\\"25\\">是否在标题后显示时间，0为不显示，1为显示</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">操作类型</div>\r\n            </td>\r\n            <td height=\\"25\\">具体看操作类型说明</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">是否显示栏目名</div>\r\n            </td>\r\n            <td height=\\"25\\">0为不显示，1为显示</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">时间格式化</div>\r\n            </td>\r\n            <td height=\\"25\\">形式：Y-m-d H:i:s．默认为：\\\'(m-d)\\\'</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">附加SQL条件</div>\r\n            </td>\r\n            <td height=\\"25\\">附加调用条件，如：&quot;title=\\\'帝国\\\'&quot;</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">显示排序</div>\r\n            </td>\r\n            <td height=\\"25\\">可指定按相应的字段排序，如：&quot;id desc&quot;</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td colspan=\\"2\\">\r\n            <div align=\\"center\\">（注：在栏目ID中写大栏目，系统会自己搜索子栏目的信息）</div>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>', 'sys_GetClassNews', 'phomenews', 1, '[phomenews]栏目ID/专题ID,显示条数,标题截取数,是否显示时间,操作类型,是否显示栏目名,\\\'时间格式化\\\',附加SQL条件,显示排序[/phomenews]', 0, 1, 9);
INSERT INTO `phome_enewsbq` VALUES (22, '留言板调用', '<table cellspacing=\\"1\\" cellpadding=\\"3\\" width=\\"100%\\" bgcolor=\\"#dbeaf5\\" border=\\"0\\">\r\n    <tbody>\r\n        <tr>\r\n            <td width=\\"40%\\">\r\n            <div align=\\"center\\">参数</div>\r\n            </td>\r\n            <td width=\\"60%\\">参数说明</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">显示信息数</div>\r\n            </td>\r\n            <td height=\\"25\\">显示记录数</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">标签模板ID</div>\r\n            </td>\r\n            <td height=\\"25\\">\r\n            <div align=\\"left\\">查看标签模板ID点<a onclick=\\"window.open(\\\'ListBqtemp.php\\\');\\"><strong><u>这里</u></strong></a></div>\r\n            </td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">&nbsp;</div>\r\n            </td>\r\n            <td height=\\"25\\">模板标签变量说明：<br />\r\n            留言ID：[!--lyid--]，留言内容：[!--lytext--]<br />\r\n            回复内容：[!--retext--]，留言时间：[!--lytime--]<br />\r\n            留言者：[!--name--]，留言者邮箱：[!--email--]<br />\r\n            序号：[!--no--]</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">留言分类ID</div>\r\n            </td>\r\n            <td height=\\"25\\">\r\n            <div align=\\"left\\">点击<strong><a onclick=\\"window.open(\\\'../tool/GbookClass.php\\\');\\">这里</a></strong>查看分类ID，0为不限制</div>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>', 'sys_ShowLyInfo', 'gbookinfo', 1, '[gbookinfo]显示信息数,标签模板ID,留言分类ID[/gbookinfo]', 0, 3, 5);
INSERT INTO `phome_enewsbq` VALUES (23, '专题调用标签', '<table cellspacing=\\"1\\" cellpadding=\\"3\\" width=\\"100%\\" bgcolor=\\"#dbeaf5\\" border=\\"0\\">\r\n    <tbody>\r\n        <tr>\r\n            <td>\r\n            <div align=\\"center\\">参数</div>\r\n            </td>\r\n            <td>参数说明</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">\r\n            <div align=\\"center\\">标签模板ID</div>\r\n            </div>\r\n            </td>\r\n            <td height=\\"25\\">查看标签模板ID点<a onclick=\\"window.open(\\\'ListBqtemp.php\\\');\\"><strong><u>这里</u></strong></a></td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">&nbsp;</div>\r\n            </td>\r\n            <td height=\\"25\\">\r\n            <p>模板标签变量说明：(list.var)<br />\r\n            [!--classurl--]：专题链接，[!--classname--]：专题名称<br />\r\n            [!--classid--]：专题id，[!--classimg--]：专题图片<br />\r\n            [!--intro--]：专题简介,[!--no--]：序号</p>\r\n            </td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">专题类别ID</div>\r\n            </td>\r\n            <td height=\\"25\\">\r\n            <div align=\\"left\\">点击<strong><a onclick=\\"window.open(\\\'../ListZtClass.php\\\');\\">这里</a></strong>查看分类ID，0为不限制，多个分类ID用逗号隔开，如\\\'1,2\\\'</div>\r\n            </td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">显示专题数</div>\r\n            </td>\r\n            <td height=\\"25\\">0为不限制</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">所属栏目ID</div>\r\n            </td>\r\n            <td height=\\"25\\">点击<strong><a onclick=\\"window.open(\\\'../ListClass.php\\\');\\">这里</a></strong>查看栏目ID，0为不限制，多个栏目ID用逗号隔开，如\\\'1,2\\\'</td>\r\n        </tr>\r\n    </tbody>\r\n</table>', 'sys_ShowZtData', 'eshowzt', 1, '[eshowzt]标签模板ID,专题类别ID,显示专题数,所属栏目ID[/eshowzt]', 0, 2, 6);
INSERT INTO `phome_enewsbq` VALUES (2, '图文信息调用(标题图片的信息)', '<table cellspacing=\\"1\\" cellpadding=\\"3\\" width=\\"100%\\" bgcolor=\\"#dbeaf5\\" border=\\"0\\">\r\n    <tbody>\r\n        <tr>\r\n            <td>\r\n            <div align=\\"center\\">参数</div>\r\n            </td>\r\n            <td>参数说明</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">栏目ID/专题ID</div>\r\n            </td>\r\n            <td height=\\"25\\">查看栏目ID点<a onclick=\\"window.open(\\\'../ListClass.php\\\');\\"><strong><u>这里</u></strong></a>，查看专题ID点<a onclick=\\"window.open(\\\'../ListZt.php\\\');\\"><strong><u>这里</u></strong></a>,当前ID=\\\'selfinfo\\\'<br />\r\n            多个栏目ID与专题ID可用,号格开，如\\\'1,2\\\'</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">每行显示条数</div>\r\n            </td>\r\n            <td height=\\"25\\">每行显示几个图片</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">显示总信息数</div>\r\n            </td>\r\n            <td height=\\"25\\">显示信息总数</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">图片宽度，图片高度</div>\r\n            </td>\r\n            <td height=\\"25\\">图文信息图片大小</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">是否显示标题</div>\r\n            </td>\r\n            <td height=\\"25\\">是否在图片下显示标题，0为不显示，1为显示</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td bgcolor=\\"#ffffff\\" height=\\"25\\">\r\n            <div align=\\"center\\">标题截取数</div>\r\n            </td>\r\n            <td height=\\"25\\">截取几个字符</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td bgcolor=\\"#ffffff\\" height=\\"25\\">\r\n            <div align=\\"center\\">操作类型说明</div>\r\n            </td>\r\n            <td height=\\"25\\">具体看操作类型说明</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">附加SQL条件</div>\r\n            </td>\r\n            <td height=\\"25\\">附加调用条件，如：&quot;title=\\\'帝国\\\'&quot;</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">显示排序</div>\r\n            </td>\r\n            <td height=\\"25\\">可指定按相应的字段排序，如：&quot;id desc&quot;</td>\r\n        </tr>\r\n    </tbody>\r\n</table>', 'sys_GetClassNewsPic', 'phomenewspic', 1, '[phomenewspic]栏目ID/专题ID,每行显示条数,显示总信息数,图片宽度,图片高度,是否显示标题,标题截取数,操作类型,附加SQL条件,显示排序[/phomenewspic]', 0, 1, 9);
INSERT INTO `phome_enewsbq` VALUES (3, '图片信息标签(调用单个)', '<table cellspacing=\\"1\\" cellpadding=\\"3\\" width=\\"100%\\" bgcolor=\\"#dbeaf5\\" border=\\"0\\">\r\n    <tbody>\r\n        <tr>\r\n            <td>\r\n            <div align=\\"center\\">参数</div>\r\n            </td>\r\n            <td>参数说明</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">图片信息ID</div>\r\n            </td>\r\n            <td height=\\"25\\">查看图片信息ID点<a onclick=\\"window.open(\\\'../NewsSys/ListPicNews.php\\\');\\"><strong><u>这里</u></strong></a></td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">是否显示标题</div>\r\n            </td>\r\n            <td height=\\"25\\">是否在图片下显示标题，0为不显示，1为显示</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">是否显示简介</div>\r\n            </td>\r\n            <td height=\\"25\\">是否在图片下显示简介，0为不显示，1为显示</td>\r\n        </tr>\r\n    </tbody>\r\n</table>', 'sys_GetPicNews', 'phomepic', 1, '[phomepic]图片信息ID,是否显示标题,是否显示简介[/phomepic]', 1, 4, 4);
INSERT INTO `phome_enewsbq` VALUES (4, '图片信息标签(调用多个)', '<table cellspacing=\\"1\\" cellpadding=\\"3\\" width=\\"100%\\" bgcolor=\\"#dbeaf5\\" border=\\"0\\">\r\n    <tbody>\r\n        <tr>\r\n            <td>\r\n            <div align=\\"center\\">参数</div>\r\n            </td>\r\n            <td>参数说明</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">图片信息类别ID</div>\r\n            </td>\r\n            <td height=\\"25\\">查看图片信息类别ID点<a onclick=\\"window.open(\\\'../NewsSys/PicClass.php\\\');\\"><strong><u>这里</u></strong></a></td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">每行显示条数</div>\r\n            </td>\r\n            <td height=\\"25\\">每行显示几个图片</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">调用总条数</div>\r\n            </td>\r\n            <td height=\\"25\\">显示新闻总数</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">图片宽度，图片高度</div>\r\n            </td>\r\n            <td height=\\"25\\">图片信息图片大小</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">是否显示标题</div>\r\n            </td>\r\n            <td height=\\"25\\">是否在图片下显示标题，0为不显示，1为显示</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td bgcolor=\\"#ffffff\\" height=\\"25\\">\r\n            <div align=\\"center\\">标题截取数</div>\r\n            </td>\r\n            <td height=\\"25\\">截取几个字符</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td bgcolor=\\"#ffffff\\" height=\\"25\\">\r\n            <div align=\\"center\\">是否显示原链接</div>\r\n            </td>\r\n            <td height=\\"25\\">0为显示,1为不显示</td>\r\n        </tr>\r\n    </tbody>\r\n</table>', 'sys_GetMorePicNews', 'phomemorepic', 1, '[phomemorepic]图片信息类别ID,每行显示条数,调用总条数,图片宽度,图片高度,是否显示标题,标题截取数,是否显示原链接[/phomemorepic]', 1, 4, 4);
INSERT INTO `phome_enewsbq` VALUES (5, '广告标签', '<table cellspacing=\\"1\\" cellpadding=\\"3\\" width=\\"100%\\" bgcolor=\\"#dbeaf5\\" border=\\"0\\">\r\n    <tbody>\r\n        <tr>\r\n            <td>\r\n            <div align=\\"center\\">参数</div>\r\n            </td>\r\n            <td>参数说明</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">广告ID</div>\r\n            </td>\r\n            <td height=\\"25\\">查看广告ID点<a onclick=\\"window.open(\\\'../tool/ListAd.php\\\');\\"><strong><u>这里</u></strong></a></td>\r\n        </tr>\r\n    </tbody>\r\n</table>', 'sys_GetAd', 'phomead', 1, '[phomead]广告ID[/phomead]', 0, 3, 5);
INSERT INTO `phome_enewsbq` VALUES (6, '投票标签', '<table cellspacing=\\"1\\" cellpadding=\\"3\\" width=\\"100%\\" bgcolor=\\"#dbeaf5\\" border=\\"0\\">\r\n    <tbody>\r\n        <tr>\r\n            <td>\r\n            <div align=\\"center\\">参数</div>\r\n            </td>\r\n            <td>参数说明</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">投票ID</div>\r\n            </td>\r\n            <td height=\\"25\\">查看投票ID点<a onclick=\\"window.open(\\\'../tool/ListVote.php\\\');\\"><strong><u>这里</u></strong></a></td>\r\n        </tr>\r\n    </tbody>\r\n</table>', 'sys_GetVote', 'phomevote', 1, '[phomevote]投票ID[/phomevote]', 0, 3, 5);
INSERT INTO `phome_enewsbq` VALUES (7, '简介型调用信息标签', '<table cellspacing=\\"1\\" cellpadding=\\"3\\" width=\\"100%\\" bgcolor=\\"#dbeaf5\\" border=\\"0\\">\r\n    <tbody>\r\n        <tr>\r\n            <td>\r\n            <div align=\\"center\\">参数</div>\r\n            </td>\r\n            <td>参数说明</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">栏目ID/专题ID</div>\r\n            </td>\r\n            <td height=\\"25\\">查看栏目ID点<a onclick=\\"window.open(\\\'../ListClass.php\\\');\\"><strong><u>这里</u></strong></a>，查看专题ID点<a onclick=\\"window.open(\\\'../ListZt.php\\\');\\"><strong><u>这里</u></strong></a>,当前ID=\\\'selfinfo\\\'<br />\r\n            多个栏目ID与专题ID可用,号格开，如\\\'1,2\\\'</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">显示条数</div>\r\n            </td>\r\n            <td height=\\"25\\">显示信息记录数</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">表格颜色</div>\r\n            </td>\r\n            <td height=\\"25\\">请加上\\\'\\\'(单引号)</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td bgcolor=\\"#ffffff\\" height=\\"25\\">\r\n            <div align=\\"center\\">操作类型</div>\r\n            </td>\r\n            <td height=\\"25\\">具体看操作类型说明</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td bgcolor=\\"#ffffff\\" height=\\"25\\">\r\n            <div align=\\"center\\">是否显示栏目名</div>\r\n            </td>\r\n            <td height=\\"25\\">0为不显示，1为显示</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">附加SQL条件</div>\r\n            </td>\r\n            <td height=\\"25\\">附加调用条件，如：&quot;title=\\\'帝国\\\'&quot;</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">显示排序</div>\r\n            </td>\r\n            <td height=\\"25\\">可指定按相应的字段排序，如：&quot;id desc&quot;</td>\r\n        </tr>\r\n    </tbody>\r\n</table>', 'sys_GetClassNewsText', 'phomenewstext', 1, '[phomenewstext]栏目ID/专题ID,显示条数,\\\'表格颜色\\\',操作类型,是否显示栏目名,附加SQL条件,显示排序[/phomenewstext]', 1, 1, 7);
INSERT INTO `phome_enewsbq` VALUES (11, '带模板的信息调用标签[万能标签]', '<table cellspacing=\\"1\\" cellpadding=\\"3\\" width=\\"100%\\" bgcolor=\\"#dbeaf5\\" border=\\"0\\">\r\n    <tbody>\r\n        <tr>\r\n            <td>\r\n            <div align=\\"center\\">参数</div>\r\n            </td>\r\n            <td>参数说明</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">栏目ID/专题ID</div>\r\n            </td>\r\n            <td height=\\"25\\">查看栏目ID点<a onclick=\\"window.open(\\\'../ListClass.php\\\');\\"><strong><u>这里</u></strong></a>，查看专题ID点<a onclick=\\"window.open(\\\'../ListZt.php\\\');\\"><strong><u>这里</u></strong></a>,当前ID=\\\'selfinfo\\\'<br />\r\n            多个栏目ID与专题ID可用,号格开，如\\\'1,2\\\'</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">显示条数</div>\r\n            </td>\r\n            <td height=\\"25\\">显示前几条记录</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">标题截取数</div>\r\n            </td>\r\n            <td height=\\"25\\">截取几个字符</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">是否显示栏目名</div>\r\n            </td>\r\n            <td height=\\"25\\">0为不显示，1为显示</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">操作类型</div>\r\n            </td>\r\n            <td height=\\"25\\">具体看操作类型说明</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">标签模板ID</div>\r\n            </td>\r\n            <td height=\\"25\\">查看标签模板ID点<a onclick=\\"window.open(\\\'ListBqtemp.php\\\');\\"><strong><u>这里</u></strong></a></td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">只显示有标题图片</div>\r\n            </td>\r\n            <td height=\\"25\\">0为不限制，1为只显示有标题图片的信息</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">附加SQL条件</div>\r\n            </td>\r\n            <td height=\\"25\\">附加调用条件，如：&quot;title=\\\'帝国\\\'&quot;</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">显示排序</div>\r\n            </td>\r\n            <td height=\\"25\\">可指定按相应的字段排序，如：&quot;id desc&quot;</td>\r\n        </tr>\r\n    </tbody>\r\n</table>', 'sys_GetEcmsInfo', 'ecmsinfo', 1, '[ecmsinfo]栏目ID/专题ID,显示条数,标题截取数,是否显示栏目名,操作类型,模板ID,只显示有标题图片,附加SQL条件,显示排序[/ecmsinfo]', 0, 1, 10);
INSERT INTO `phome_enewsbq` VALUES (10, '滚动图片信息标签', '<table cellspacing=\\"1\\" cellpadding=\\"3\\" width=\\"100%\\" bgcolor=\\"#dbeaf5\\" border=\\"0\\">\r\n    <tbody>\r\n        <tr>\r\n            <td>\r\n            <div align=\\"center\\">参数</div>\r\n            </td>\r\n            <td>参数说明</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">栏目ID/专题ID</div>\r\n            </td>\r\n            <td height=\\"25\\">查看栏目ID点<a onclick=\\"window.open(\\\'../ListClass.php\\\');\\"><strong><u>这里</u></strong></a>，查看专题ID点<a onclick=\\"window.open(\\\'../ListZt.php\\\');\\"><strong><u>这里</u></strong></a>,当前ID=\\\'selfinfo\\\'<br />\r\n            多个栏目ID与专题ID可用,号格开，如\\\'1,2\\\'</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">显示总数</div>\r\n            </td>\r\n            <td height=\\"25\\">显示信息总数</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">图片宽度，图片高度</div>\r\n            </td>\r\n            <td height=\\"25\\">图文信息图片大小</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">是否显示标题</div>\r\n            </td>\r\n            <td height=\\"25\\">是否在图片下显示标题，0为不显示，1为显示</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td bgcolor=\\"#ffffff\\" height=\\"25\\">\r\n            <div align=\\"center\\">标题截取数</div>\r\n            </td>\r\n            <td height=\\"25\\">截取几个字符</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td bgcolor=\\"#ffffff\\" height=\\"25\\">\r\n            <div align=\\"center\\">显示速度</div>\r\n            </td>\r\n            <td height=\\"25\\">默认值为5000毫秒(5秒)</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td bgcolor=\\"#ffffff\\" height=\\"25\\">\r\n            <div align=\\"center\\">操作类型说明</div>\r\n            </td>\r\n            <td height=\\"25\\">具体看操作类型说明</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">附加SQL条件</div>\r\n            </td>\r\n            <td height=\\"25\\">附加调用条件，如：&quot;title=\\\'帝国\\\'&quot;</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">显示排序</div>\r\n            </td>\r\n            <td height=\\"25\\">可指定按相应的字段排序，如：&quot;id desc&quot;</td>\r\n        </tr>\r\n    </tbody>\r\n</table>', 'sys_GetAutoPic', 'phomeautopic', 1, '[phomeautopic]栏目ID/专题ID,显示总数,图片宽度,图片高度,是否显示标题,标题截取数,显示速度,操作类型,附加SQL条件,显示排序[/phomeautopic]', 1, 1, 8);
INSERT INTO `phome_enewsbq` VALUES (12, '友情链接标签', '<table cellspacing=\\"1\\" cellpadding=\\"3\\" width=\\"100%\\" bgcolor=\\"#dbeaf5\\" border=\\"0\\">\r\n    <tbody>\r\n        <tr>\r\n            <td width=\\"40%\\">\r\n            <div align=\\"center\\">参数</div>\r\n            </td>\r\n            <td width=\\"60%\\">参数说明</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">每行显示记录数</div>\r\n            </td>\r\n            <td height=\\"25\\">每行显示记录数</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">显示总记录数</div>\r\n            </td>\r\n            <td height=\\"25\\">\r\n            <div align=\\"left\\">总记录数</div>\r\n            </td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">操作类型</div>\r\n            </td>\r\n            <td height=\\"25\\">\r\n            <div align=\\"left\\">0为所有记录，1为图片链接，2为文字链接</div>\r\n            </td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">分类ID</div>\r\n            </td>\r\n            <td height=\\"25\\">\r\n            <div align=\\"left\\">点击<strong><a onclick=\\"window.open(\\\'../tool/LinkClass.php\\\');\\">这里</a></strong>查看分类ID，0为不限制</div>\r\n            </td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">是否显示原链接</div>\r\n            </td>\r\n            <td height=\\"25\\">\r\n            <div align=\\"left\\">0为统计点击链接，1为显示原链接</div>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>', 'sys_GetSitelink', 'phomelink', 1, '[phomelink]每行显示数,显示总数,操作类型,分类id,是否显示原链接[/phomelink]', 0, 3, 5);
INSERT INTO `phome_enewsbq` VALUES (13, '显示栏目导航标签', '<p>[phomeshowclass]是否显示栏目记录数[/phomeshowclass]</p>', 'sys_ShowClass', 'phomeshowclass', 1, '[phomeshowclass]是否显示栏目记录数[/phomeshowclass]', 1, 2, 6);
INSERT INTO `phome_enewsbq` VALUES (14, '显示网站地图标签', '<table cellspacing=\\"1\\" cellpadding=\\"3\\" width=\\"100%\\" bgcolor=\\"#dbeaf5\\" border=\\"0\\">\r\n    <tbody>\r\n        <tr>\r\n            <td>\r\n            <div align=\\"center\\">参数</div>\r\n            </td>\r\n            <td>参数说明</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">栏目ID</div>\r\n            </td>\r\n            <td height=\\"25\\">查看栏目ID点<a onclick=\\"window.open(\\\'../ListClass.php\\\');\\"><strong><u>这里</u></strong></a></td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">子栏目每行显示记录数</div>\r\n            </td>\r\n            <td height=\\"25\\">子栏目每行显示多少个栏目</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">大栏目颜色</div>\r\n            </td>\r\n            <td height=\\"25\\">大栏目单元格颜色,记得加上单引号</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">子栏目颜色</div>\r\n            </td>\r\n            <td height=\\"25\\">子栏目表格颜色,记得加上单引号</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">是否显示栏目记录数</div>\r\n            </td>\r\n            <td height=\\"25\\">0为不显示，1为显示.如显示效率比较低</td>\r\n        </tr>\r\n    </tbody>\r\n</table>', 'sys_ShowMap', 'phomeshowmap', 1, '[phomeshowmap]栏目ID,子栏目每行显示记录数,\\\'大栏目颜色\\\',\\\'子栏目颜色\\\',是否显示栏目记录数[/phomeshowmap]', 1, 2, 6);
INSERT INTO `phome_enewsbq` VALUES (15, '引用文件标签', '<p>[includefile]\\\'文件地址\\\'[/includefile]<br />\r\n文件地址需要为相对地址,并且从后台目录算起：&quot;../../header.html&quot;（这个地址的header.html是放在ecms根目录）</p>', 'sys_IncludeFile', 'includefile', 1, '[includefile]\\\'文件地址\\\'[/includefile]', 1, 4, 4);
INSERT INTO `phome_enewsbq` VALUES (16, '读取远程页面', '<p>[readhttp]\\\'页面地址\\\'[/readhttp]</p>', 'sys_ReadFile', 'readhttp', 1, '[readhttp]\\\'页面地址\\\'[/readhttp]', 1, 4, 4);
INSERT INTO `phome_enewsbq` VALUES (17, '网站信息统计', '<p>操作类型说明：\r\n<table cellspacing=\\"1\\" cellpadding=\\"3\\" width=\\"100%\\" border=\\"0\\">\r\n    <tbody>\r\n        <tr bgcolor=\\"#dbeaf5\\">\r\n            <td width=\\"25%\\">\r\n            <div align=\\"center\\">操作类型</div>\r\n            </td>\r\n            <td width=\\"75%\\">内容</td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n            <div align=\\"center\\">0</div>\r\n            </td>\r\n            <td>统计栏目数据</td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n            <div align=\\"center\\">1</div>\r\n            </td>\r\n            <td>统计专题</td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n            <div align=\\"center\\">2</div>\r\n            </td>\r\n            <td>统计数据表</td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<br />\r\n时间范围：0为不限；1为今日；2为本月；3为本年<br />\r\n如果操作类型是&ldquo;统计数据表&rdquo;，栏目ID=\\\'数据表名\\\'</p>', 'sys_TotalData', 'totaldata', 1, '[totaldata]栏目ID,操作类型,时间范围[/totaldata]', 0, 1, 7);
INSERT INTO `phome_enewsbq` VALUES (18, 'FLASH幻灯信息调用', '<table cellspacing=\\"1\\" cellpadding=\\"3\\" width=\\"100%\\" bgcolor=\\"#dbeaf5\\" border=\\"0\\">\r\n    <tbody>\r\n        <tr>\r\n            <td>\r\n            <div align=\\"center\\">参数</div>\r\n            </td>\r\n            <td>参数说明</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">\r\n            <div align=\\"center\\">栏目ID/专题ID</div>\r\n            </div>\r\n            </td>\r\n            <td height=\\"25\\">查看栏目ID点<a onclick=\\"window.open(\\\'../ListClass.php\\\');\\"><strong><u>这里</u></strong></a>，查看专题ID点<a onclick=\\"window.open(\\\'../ListZt.php\\\');\\"><strong><u>这里</u></strong></a>,当前ID=\\\'selfinfo\\\'<br />\r\n            多个栏目ID与专题ID可用,号格开，如\\\'1,2\\\'</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">显示总数</div>\r\n            </td>\r\n            <td height=\\"25\\">显示信息总数</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">图片宽度，图片高度</div>\r\n            </td>\r\n            <td height=\\"25\\">图文信息图片大小</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">是否显示标题</div>\r\n            </td>\r\n            <td height=\\"25\\">是否在图片下显示标题，0为不显示，1为显示</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td bgcolor=\\"#ffffff\\" height=\\"25\\">\r\n            <div align=\\"center\\">标题截取数</div>\r\n            </td>\r\n            <td height=\\"25\\">截取几个字符</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td bgcolor=\\"#ffffff\\" height=\\"25\\">\r\n            <div align=\\"center\\">操作类型说明</div>\r\n            </td>\r\n            <td height=\\"25\\">具体看操作类型说明</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">附加SQL条件</div>\r\n            </td>\r\n            <td height=\\"25\\">附加调用条件，如：&quot;title=\\\'帝国\\\'&quot;</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">显示排序</div>\r\n            </td>\r\n            <td height=\\"25\\">可指定按相应的字段排序，如：&quot;id desc&quot;</td>\r\n        </tr>\r\n    </tbody>\r\n</table>', 'sys_FlashPixpic', 'phomeflashpic', 1, '[phomeflashpic]栏目ID/专题ID,显示总数,图片宽度,图片高度,是否显示标题,标题截取数,操作类型,停顿秒数,附加SQL条件,显示排序[/phomeflashpic]', 0, 1, 9);
INSERT INTO `phome_enewsbq` VALUES (19, '搜索关键字调用标签', '<p>栏目id为0，则显示所有栏目的关键字</p>\r\n<p>操作类型：0为搜索热门排行，1为最新搜索排行</p>', 'sys_ShowSearchKey', 'showsearch', 1, '[showsearch]每行显示条数,总条数,栏目id,操作类型[/showsearch]', 0, 1, 7);
INSERT INTO `phome_enewsbq` VALUES (20, '循环子栏目数据标签', '<table cellspacing=\\"1\\" cellpadding=\\"3\\" width=\\"100%\\" bgcolor=\\"#dbeaf5\\" border=\\"0\\">\r\n    <tbody>\r\n        <tr>\r\n            <td>\r\n            <div align=\\"center\\">参数</div>\r\n            </td>\r\n            <td>参数说明</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">栏目ID</div>\r\n            </td>\r\n            <td height=\\"25\\">查看栏目ID点<a onclick=\\"window.open(\\\'../ListClass.php\\\');\\"><strong><u>这里</u></strong></a>，单个为父栏目ID，多栏目可用&quot;,&quot;格开<br />\r\n            当前栏目ID用：\\\'selfinfo\\\'</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">显示条数</div>\r\n            </td>\r\n            <td height=\\"25\\">显示前几条记录</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">标题截取数</div>\r\n            </td>\r\n            <td height=\\"25\\">截取几个字符</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">是否显示栏目名</div>\r\n            </td>\r\n            <td height=\\"25\\">0为不显示，1为显示</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">操作类型</div>\r\n            </td>\r\n            <td height=\\"25\\">0：栏目最新<br />\r\n            1：栏目热门<br />\r\n            2：栏目推荐<br />\r\n            3：栏目评论排行<br />\r\n            4：栏目头条<br />\r\n            5：栏目下载排行</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">标签模板ID</div>\r\n            </td>\r\n            <td height=\\"25\\">查看标签模板ID点<a onclick=\\"window.open(\\\'ListBqtemp.php\\\');\\"><strong><u>这里</u></strong></a></td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">只显示有标题图片</div>\r\n            </td>\r\n            <td height=\\"25\\">0为不限制，1为只显示有标题图片的信息</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">显示栏目数</div>\r\n            </td>\r\n            <td height=\\"25\\">0为不限制</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">显示头条操作类型</div>\r\n            </td>\r\n            <td height=\\"25\\">0：不显示栏目头条<br />\r\n            1：栏目内容简介<br />\r\n            2：栏目推荐信息<br />\r\n            3：栏目头条信息<br />\r\n            4：栏目最新信息</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">头条标题截取数</div>\r\n            </td>\r\n            <td height=\\"25\\">截取几个字符</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">头条简介截取数</div>\r\n            </td>\r\n            <td height=\\"25\\">截取几个字符</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">头条只显示有标题图片</div>\r\n            </td>\r\n            <td height=\\"25\\">0为不限制，1为只显示有标题图片的信息</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">附加SQL条件</div>\r\n            </td>\r\n            <td height=\\"25\\">附加调用条件，如：&quot;title=\\\'帝国\\\'&quot;</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">显示排序</div>\r\n            </td>\r\n            <td height=\\"25\\">可指定按相应的字段排序，如：&quot;id desc&quot;</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">头条的模板变量<br />\r\n            (标签模板的页面模板内容中使用)</div>\r\n            </td>\r\n            <td height=\\"25\\">[!--sonclass.id--]：信息ID<br />\r\n            [!--sonclass.title--]：信息标题<br />\r\n            [!--sonclass.oldtitle--]：信息标题(不截取字数)<br />\r\n            [!--sonclass.titlepic--]：标题图片<br />\r\n            [!--sonclass.titleurl--]：信息链接<br />\r\n            [!--sonclass.text--]：信息简介</td>\r\n        </tr>\r\n    </tbody>\r\n</table>', 'sys_ForSonclassData', 'listsonclass', 1, '[listsonclass]栏目ID,显示条数,标题截取数,是否显示栏目名,操作类型,模板ID,只显示有标题图片,显示栏目数,显示头条操作类型,头条标题截取数,头条简介截取数,头条只显示有标题图片,附加SQL条件,显示排序[/listsonclass]', 0, 1, 9);
INSERT INTO `phome_enewsbq` VALUES (21, '带模板的栏目导航标签', '<table cellspacing=\\"1\\" cellpadding=\\"3\\" width=\\"100%\\" bgcolor=\\"#dbeaf5\\" border=\\"0\\">\r\n    <tbody>\r\n        <tr>\r\n            <td>\r\n            <div align=\\"center\\">参数</div>\r\n            </td>\r\n            <td>参数说明</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">父栏目ID</div>\r\n            </td>\r\n            <td height=\\"25\\">查看栏目ID点<a onclick=\\"window.open(\\\'../ListClass.php\\\');\\"><strong><u>这里</u></strong></a><br />\r\n            \\\'0\\\'为显示所有一级栏目<br />\r\n            \\\'selfinfo\\\'显示本栏目下级栏目</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">\r\n            <div align=\\"center\\">标签模板ID</div>\r\n            </div>\r\n            </td>\r\n            <td height=\\"25\\">查看标签模板ID点<a onclick=\\"window.open(\\\'ListBqtemp.php\\\');\\"><strong><u>这里</u></strong></a></td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">&nbsp;</div>\r\n            </td>\r\n            <td height=\\"25\\">\r\n            <p>模板标签变量说明：[!--bclassname--]：父栏目名,[!--bclassurl--]：父栏目链接,[!--bclassid--]：父栏目id</p>\r\n            <p>list.var模板标签：<br />\r\n            [!--classurl--]：栏目链接,[!--classname--]：栏目名称,[!--classid--]：栏目id,[!--classimg--]：栏目图片,[!--intro--]：栏目简介,[!--num--]：信息数,[!--no--]：序号</p>\r\n            </td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">是否显示栏目信息数</div>\r\n            </td>\r\n            <td height=\\"25\\">0为不显示，1为显示</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">显示栏目数</div>\r\n            </td>\r\n            <td height=\\"25\\">0为不限制</td>\r\n        </tr>\r\n    </tbody>\r\n</table>', 'sys_ShowClassByTemp', 'showclasstemp', 1, '[showclasstemp]父栏目ID,标签模板ID,是否显示栏目信息数,显示栏目数[/showclasstemp]', 0, 2, 6);
INSERT INTO `phome_enewsbq` VALUES (24, '图库模型分页标签', '<p>\r\n<table cellspacing=\\"1\\" cellpadding=\\"3\\" width=\\"100%\\" bgcolor=\\"#dbeaf5\\" border=\\"0\\">\r\n    <tbody>\r\n        <tr>\r\n            <td>\r\n            <div align=\\"center\\">参数</div>\r\n            </td>\r\n            <td>参数说明</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">\r\n            <div align=\\"center\\">标签模板ID</div>\r\n            </div>\r\n            </td>\r\n            <td height=\\"25\\">查看标签模板ID点<a onclick=\\"window.open(\\\'ListBqtemp.php\\\');\\"><strong><u>这里</u></strong></a></td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">&nbsp;</div>\r\n            </td>\r\n            <td height=\\"25\\">\r\n            <p><strong>模板标签变量说明：</strong><br />\r\n            图片集JS数组：[!--photor--]，缩略图导航：[!--smalldh--]<br />\r\n            分页导航：[!--select--]，标题分页导航：[!--titleselect--]，分页列表式导航：[!--listpage--]</p>\r\n            <p><strong>list.var模板标签：</strong><br />\r\n            图片名称：[!--picname--]，图片地址：[!--picurl--]</p>\r\n            </td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">导航图片宽度<br />\r\n            导航图片高度</div>\r\n            </td>\r\n            <td height=\\"25\\">0为按原图大小</td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</p>', 'sys_PhotoMorepage', 'eshowphoto', 1, '[eshowphoto]标签模板ID,导航图片宽度,导航图片高度[/eshowphoto]', 0, 1, 7);
INSERT INTO `phome_enewsbq` VALUES (25, '复选项输出函数', '<p>如：[echocheckbox]\\\'title\\\',\\\'&lt;br&gt;\\\'[/echocheckbox]：表示按回车分隔输出title字段的项</p>', 'sys_EchoCheckboxFValue', 'echocheckbox', 1, '[echocheckbox]\\\'字段\\\',\\\'分隔符\\\'[/echocheckbox]', 0, 3, 5);
INSERT INTO `phome_enewsbq` VALUES (26, '相关链接标签', '<p><strong>标签模板ID</strong>：查看标签模板ID点<a onclick=\\"window.open(\\\'ListBqtemp.php\\\');\\"><strong><u>这里</u></strong></a><br />\r\n<strong>操作类型</strong>：0为默认；1为按表；2为按栏目；3为按专题<br />\r\n<strong>操作对象</strong>：对应操作类型的表/栏目/专题。空则为默认。<br />\r\n<strong>是否显示栏目名</strong>：0为不显示；1为显示<br />\r\n<strong>只显示标题图片的信息</strong>：0为不限；1为只显示标题图片的信息</p>', 'sys_GetOtherLinkInfo', 'otherlink', 1, '[otherlink]标签模板ID,操作对象,调用条数,标题截取字数,是否显示栏目名,操作类型,只显示标题图片的信息[/otherlink]', 0, 1, 9);
INSERT INTO `phome_enewsbq` VALUES (27, '评论调用标签', '<p><strong>标签模板ID</strong>：查看标签模板ID点<a onclick=\\"window.open(\\\'ListBqtemp.php\\\');\\"><strong><u>这里</u></strong></a><br />\r\n<strong>栏目ID</strong>：0为不限调用栏目，父栏目会应用于子栏目<br />\r\n<strong>信息ID</strong>：0为不限<br />\r\n<strong>显示推荐评论</strong>：0为不限；1为只显示推荐评论<br />\r\n<strong>操作类型</strong>：0为按发布时间；1为按支持数；2为按反对数<br />\r\n<strong>标签模板说明</strong>：[!--title--]:信息标题；[!--titleurl--]:信息链接；[!--id--]:信息ID<br />\r\n[!--classid--]:栏目ID；[!--plid--]:评论ID；[!--username--]:发表者；[!--no--]:编号<br />\r\n[!--pltext--]:评论内容；[!--pltime--]:评论时间；[!--zcnum--]:支持数；[!--fdnum--]:反对数</p>', 'sys_ShowPlInfo', 'showplinfo', 1, '[showplinfo]调用条数,标签模板ID,栏目ID,信息ID,显示推荐评论,操作类型[/showplinfo]', 0, 3, 5);
INSERT INTO `phome_enewsbq` VALUES (28, '循环栏目导航标签', '<p>\r\n<table cellspacing=\\"1\\" cellpadding=\\"3\\" width=\\"100%\\" bgcolor=\\"#dbeaf5\\" border=\\"0\\">\r\n    <tbody>\r\n        <tr>\r\n            <td>\r\n            <div align=\\"center\\">参数</div>\r\n            </td>\r\n            <td>参数说明</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">父栏目ID</div>\r\n            </td>\r\n            <td height=\\"25\\">查看栏目ID点<a onclick=\\"window.open(\\\'../ListClass.php\\\');\\"><strong><u>这里</u></strong></a><br />\r\n            \\\'0\\\'为显示所有一级栏目<br />\r\n            \\\'selfinfo\\\'显示本栏目下级栏目<br />\r\n            多栏目固定调用可用&quot;,&quot;格开</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">\r\n            <div align=\\"center\\">标签模板ID</div>\r\n            </div>\r\n            </td>\r\n            <td height=\\"25\\">查看标签模板ID点<a onclick=\\"window.open(\\\'ListBqtemp.php\\\');\\"><strong><u>这里</u></strong></a></td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">&nbsp;</div>\r\n            </td>\r\n            <td height=\\"25\\">\r\n            <p>模板标签变量说明：[!--bclassname--]：父栏目名,[!--bclassurl--]：父栏目链接,[!--bclassid--]：父栏目id，[!--bclassimg--]：父栏目图片,[!--bintro--]：父栏目简介,[!--bnum--]：父栏目信息数,[!--bno--]：父栏目序号</p>\r\n            <p>list.var模板标签：<br />\r\n            [!--classurl--]：栏目链接,[!--classname--]：栏目名称,[!--classid--]：栏目id,[!--classimg--]：栏目图片,[!--intro--]：栏目简介,[!--num--]：信息数,[!--no--]：序号</p>\r\n            </td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">是否显示栏目信息数</div>\r\n            </td>\r\n            <td height=\\"25\\">0为不显示，1为显示</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">显示栏目数</div>\r\n            </td>\r\n            <td height=\\"25\\">0为不限制</td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</p>', 'sys_ForShowSonClass', 'listshowclass', 1, '[listshowclass]父栏目ID,标签模板ID,是否显示栏目信息数,显示栏目数[/listshowclass]', 0, 2, 6);
INSERT INTO `phome_enewsbq` VALUES (29, '调用TAGS的信息标签', '<table cellspacing=\\"1\\" cellpadding=\\"3\\" width=\\"100%\\" bgcolor=\\"#dbeaf5\\" border=\\"0\\">\r\n    <tbody>\r\n        <tr>\r\n            <td>\r\n            <div align=\\"center\\">参数</div>\r\n            </td>\r\n            <td>参数说明</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">TAGS的ID</div>\r\n            </td>\r\n            <td height=\\"25\\">查看TAGS的ID点<a onclick=\\"window.open(\\\'../tags/ListTags.php\\\');\\"><strong><u>这里</u></strong></a><br />\r\n            多个ID可以用,号格开，如\\\'1,2\\\'</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">显示条数</div>\r\n            </td>\r\n            <td height=\\"25\\">显示前几条记录</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">标题截取数</div>\r\n            </td>\r\n            <td height=\\"25\\">截取几个字符</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">标签模板ID</div>\r\n            </td>\r\n            <td height=\\"25\\">查看标签模板ID点<a onclick=\\"window.open(\\\'ListBqtemp.php\\\');\\"><strong><u>这里</u></strong></a></td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">栏目ID</div>\r\n            </td>\r\n            <td height=\\"25\\">限制只调用某一个或多个栏目的信息<br />\r\n            多个ID可以用,号格开，如\\\'1,2\\\'</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">系统模型ID</div>\r\n            </td>\r\n            <td height=\\"25\\">限制只调用某一个或多个系统模型的信息<br />\r\n            多个ID可以用,号格开，如\\\'1,2\\\'</td>\r\n        </tr>\r\n    </tbody>\r\n</table>', 'sys_eShowTagsInfo', 'tagsinfo', 0, '[tagsinfo]TAGS的ID,显示条数,标题截取数,标签模板ID,栏目ID,系统模型ID[/tagsinfo]', 0, 0, 9);
INSERT INTO `phome_enewsbq` VALUES (30, '调用碎片的信息标签', '<table cellspacing=\\"1\\" cellpadding=\\"3\\" width=\\"100%\\" bgcolor=\\"#dbeaf5\\" border=\\"0\\">\r\n    <tbody>\r\n        <tr>\r\n            <td>\r\n            <div align=\\"center\\">参数</div>\r\n            </td>\r\n            <td>参数说明</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">碎片变量名</div>\r\n            </td>\r\n            <td height=\\"25\\">查看碎片变量名点<a onclick=\\"window.open(\\\'../sp/ListSp.php\\\');\\"><strong><u>这里</u></strong></a></td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">显示条数</div>\r\n            </td>\r\n            <td height=\\"25\\">显示前几条记录</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">标题截取数</div>\r\n            </td>\r\n            <td height=\\"25\\">截取几个字符</td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n<br>\r\n<table cellspacing=\\"1\\" cellpadding=\\"3\\" width=\\"100%\\" bgcolor=\\"#dbeaf5\\" border=\\"0\\">\r\n  <tbody>\r\n    <tr> \r\n      <td colspan=\\"2\\"> <div align=\\"center\\">碎片标签模板变量说明</div></td>\r\n    </tr>\r\n    <tr bgcolor=\\"#ffffff\\"> \r\n      <td width=\\"34%\\" height=\\"25\\"> \r\n        <div align=\\"center\\">静态碎片</div></td>\r\n      <td width=\\"66%\\" height=\\"25\\">模板标签变量说明：[!--the.spname--]：碎片名称,[!--the.spid--]：碎片ID,[!--the.sppic--]：碎片效果图,[!--the.spsay--]：碎片描述 \r\n        <p>list.var模板标签：<br>\r\n          [!--title--]：标题,[!--oldtitle--]：标题ALT,[!--newstime--]：发布时间,[!--id--]：碎片信息ID,[!--titleurl--]：标题链接,[!--titlepic--]：标题缩图,[!--bigpic--]：标题大图,[!--titlepre--]：标题左边,[!--titlenext--]：标题右边,[!--smalltext--]：内容简介,[!--no.num--]：编号</p></td>\r\n    </tr>\r\n    <tr bgcolor=\\"#ffffff\\"> \r\n      <td height=\\"25\\"> <div align=\\"center\\">动态碎片</div></td>\r\n      <td height=\\"25\\">模板标签变量说明：[!--the.spname--]：碎片名称,[!--the.spid--]：碎片ID,[!--the.sppic--]：碎片效果图,[!--the.spsay--]：碎片描述 \r\n        <p>list.var模板标签：<br>\r\n          支持变量同模型信息调用</p></td>\r\n    </tr>\r\n    <tr bgcolor=\\"#ffffff\\"> \r\n      <td height=\\"25\\"> <div align=\\"center\\">代码碎片</div></td>\r\n      <td height=\\"25\\">无需标签模板，直接显示代码内容</td>\r\n    </tr>\r\n  </tbody>\r\n</table>\r\n', 'sys_eShowSpInfo', 'spinfo', 0, '[spinfo]碎片变量名,显示条数,标题截取数[/spinfo]', 0, 0, 9);
INSERT INTO `phome_enewsbq` VALUES (31, '调用TAGS标签', '<table cellspacing=\\"1\\" cellpadding=\\"3\\" width=\\"100%\\" bgcolor=\\"#dbeaf5\\" border=\\"0\\">\r\n    <tbody>\r\n        <tr>\r\n            <td>\r\n            <div align=\\"center\\">参数</div>\r\n            </td>\r\n            <td>参数说明</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">分类ID</div>\r\n            </td>\r\n            <td height=\\"25\\">\\\'\\\'空为不限制，查看TAGS分类ID点<a onclick=\\"window.open(\\\'../tags/TagsClass.php\\\');\\"><strong><u>这里</u></strong></a><br />\r\n            多个可以用,号格开，如\\\'1,2\\\'<br />\r\n            内容页显示当前TAGS可以用\\\'selfinfo\\\'</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">显示数量</div>\r\n            </td>\r\n            <td height=\\"25\\">显示前几条记录，0为显示所有（\\\'selfinfo\\\'本设置无效）</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">每行显示数量</div>\r\n            </td>\r\n            <td height=\\"25\\">一行显示多少个TAGS，0为不换行</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">显示排序</div>\r\n            </td>\r\n            <td height=\\"25\\">使用默认设置\\\'\\\'空就可以，默认是\\\'tagid desc\\\'（\\\'selfinfo\\\'本设置无效）</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">只显示推荐</div>\r\n            </td>\r\n            <td height=\\"25\\">只显示推荐的TAGS，0为不限制，1为限制（\\\'selfinfo\\\'本设置无效）</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">推荐TAGS属性</div>\r\n            </td>\r\n            <td height=\\"25\\">如果是推荐的TAGS，内容是否要加粗或加红（\\\'selfinfo\\\'本设置无效）<br />\r\n            设置\\\'s\\\'表示加粗、\\\'r\\\'表示加红、同时加粗加红用\\\'s,r\\\'</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">显示间隔符</div>\r\n            </td>\r\n            <td height=\\"25\\">TAGS之间显示间隔符，默认是\\\' &amp;nbsp; \\\'</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">是否显示信息数量</div>\r\n            </td>\r\n            <td height=\\"25\\">是否在TAGS后显示信息数量，0为不显示，1为显示（\\\'selfinfo\\\'本设置无效）</td>\r\n        </tr>\r\n        <tr bgcolor=\\"#ffffff\\">\r\n            <td height=\\"25\\">\r\n            <div align=\\"center\\">链接附加参数</div>\r\n            </td>\r\n            <td height=\\"25\\">可指定在TAGS链接后面增加参数，比如：\\\'&amp;tempid=模板ID\\\'</td>\r\n        </tr>\r\n    </tbody>\r\n</table>', 'sys_eShowTags', 'showtags', 0, '[showtags]分类ID,显示数量,每行显示数量,显示排序,只显示推荐,推荐TAGS属性,显示间隔符,是否显示信息数,链接附加参数[/showtags]', 0, 0, 9);

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsbqclass`;
CREATE TABLE `phome_enewsbqclass` (
  `classid` smallint(6) NOT NULL auto_increment,
  `classname` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`classid`)
) TYPE=MyISAM;

INSERT INTO `phome_enewsbqclass` VALUES (1, '信息调用');
INSERT INTO `phome_enewsbqclass` VALUES (2, '栏目调用');
INSERT INTO `phome_enewsbqclass` VALUES (3, '非信息调用');
INSERT INTO `phome_enewsbqclass` VALUES (4, '其它标签');

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsbuybak`;
CREATE TABLE `phome_enewsbuybak` (
  `username` varchar(30) NOT NULL default '',
  `card_no` varchar(255) NOT NULL default '',
  `buytime` datetime NOT NULL default '0000-00-00 00:00:00',
  `cardfen` int(11) NOT NULL default '0',
  `money` int(11) NOT NULL default '0',
  `userid` int(11) NOT NULL default '0',
  `userdate` int(11) NOT NULL default '0',
  `type` tinyint(1) NOT NULL default '0',
  KEY `userid` (`userid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsbuygroup`;
CREATE TABLE `phome_enewsbuygroup` (
  `id` smallint(6) NOT NULL auto_increment,
  `gname` varchar(255) NOT NULL default '',
  `gmoney` int(11) NOT NULL default '0',
  `gfen` int(11) NOT NULL default '0',
  `gdate` int(11) NOT NULL default '0',
  `ggroupid` smallint(6) NOT NULL default '0',
  `gzgroupid` smallint(6) NOT NULL default '0',
  `buygroupid` smallint(6) NOT NULL default '0',
  `gsay` text NOT NULL,
  `myorder` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewscard`;
CREATE TABLE `phome_enewscard` (
  `cardid` int(11) NOT NULL auto_increment,
  `card_no` varchar(30) NOT NULL default '',
  `password` varchar(20) NOT NULL default '',
  `money` int(11) NOT NULL default '0',
  `cardfen` int(11) NOT NULL default '0',
  `endtime` date NOT NULL default '0000-00-00',
  `cardtime` datetime NOT NULL default '0000-00-00 00:00:00',
  `carddate` int(11) NOT NULL default '0',
  `cdgroupid` smallint(6) NOT NULL default '0',
  `cdzgroupid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`cardid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsclass`;
CREATE TABLE `phome_enewsclass` (
  `classid` smallint(6) NOT NULL auto_increment,
  `bclassid` smallint(6) NOT NULL default '0',
  `classname` varchar(50) NOT NULL default '',
  `sonclass` text NOT NULL,
  `is_zt` tinyint(1) NOT NULL default '0',
  `lencord` smallint(6) NOT NULL default '0',
  `link_num` tinyint(4) NOT NULL default '0',
  `newstempid` smallint(6) NOT NULL default '0',
  `onclick` int(11) NOT NULL default '0',
  `listtempid` smallint(6) NOT NULL default '0',
  `featherclass` text NOT NULL,
  `islast` tinyint(1) NOT NULL default '0',
  `classpath` text NOT NULL,
  `classtype` varchar(10) NOT NULL default '',
  `newspath` varchar(20) NOT NULL default '',
  `filename` tinyint(1) NOT NULL default '0',
  `filetype` varchar(10) NOT NULL default '',
  `openpl` tinyint(1) NOT NULL default '0',
  `openadd` tinyint(1) NOT NULL default '0',
  `newline` int(11) NOT NULL default '0',
  `hotline` int(11) NOT NULL default '0',
  `goodline` int(11) NOT NULL default '0',
  `classurl` varchar(200) NOT NULL default '',
  `groupid` smallint(6) NOT NULL default '0',
  `myorder` smallint(6) NOT NULL default '0',
  `filename_qz` varchar(20) NOT NULL default '',
  `hotplline` tinyint(4) NOT NULL default '0',
  `modid` smallint(6) NOT NULL default '0',
  `checked` tinyint(1) NOT NULL default '0',
  `firstline` tinyint(4) NOT NULL default '0',
  `bname` varchar(50) NOT NULL default '',
  `islist` tinyint(1) NOT NULL default '0',
  `searchtempid` smallint(6) NOT NULL default '0',
  `tid` smallint(6) NOT NULL default '0',
  `tbname` varchar(60) NOT NULL default '',
  `maxnum` int(11) NOT NULL default '0',
  `checkpl` tinyint(1) NOT NULL default '0',
  `down_num` tinyint(4) NOT NULL default '0',
  `online_num` tinyint(4) NOT NULL default '0',
  `listorder` varchar(50) NOT NULL default '',
  `reorder` varchar(50) NOT NULL default '',
  `intro` text NOT NULL,
  `classimg` varchar(255) NOT NULL default '',
  `jstempid` smallint(6) NOT NULL default '0',
  `addinfofen` int(11) NOT NULL default '0',
  `listdt` tinyint(1) NOT NULL default '0',
  `showclass` tinyint(1) NOT NULL default '0',
  `showdt` tinyint(1) NOT NULL default '0',
  `checkqadd` tinyint(1) NOT NULL default '0',
  `qaddlist` tinyint(1) NOT NULL default '0',
  `qaddgroupid` text NOT NULL,
  `qaddshowkey` tinyint(1) NOT NULL default '0',
  `adminqinfo` tinyint(1) NOT NULL default '0',
  `doctime` smallint(6) NOT NULL default '0',
  `classpagekey` varchar(255) NOT NULL default '',
  `dtlisttempid` smallint(6) NOT NULL default '0',
  `classtempid` smallint(6) NOT NULL default '0',
  `nreclass` tinyint(1) NOT NULL default '0',
  `nreinfo` tinyint(1) NOT NULL default '0',
  `nrejs` tinyint(1) NOT NULL default '0',
  `nottobq` tinyint(1) NOT NULL default '0',
  `ipath` varchar(255) NOT NULL default '',
  `addreinfo` tinyint(1) NOT NULL default '0',
  `haddlist` tinyint(4) NOT NULL default '0',
  `sametitle` tinyint(1) NOT NULL default '0',
  `definfovoteid` smallint(6) NOT NULL default '0',
  `wburl` varchar(255) NOT NULL default '',
  `qeditchecked` tinyint(1) NOT NULL default '0',
  `wapstyleid` smallint(6) NOT NULL default '0',
  `repreinfo` tinyint(1) NOT NULL default '0',
  `pltempid` smallint(6) NOT NULL default '0',
  `cgroupid` text NOT NULL,
  `yhid` smallint(6) NOT NULL default '0',
  `wfid` smallint(6) NOT NULL default '0',
  `cgtoinfo` tinyint(1) NOT NULL default '0',
  `bdinfoid` varchar(25) NOT NULL default '',
  PRIMARY KEY  (`classid`),
  KEY `bclassid` (`bclassid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsclassadd`;
CREATE TABLE `phome_enewsclassadd` (
  `classid` smallint(6) NOT NULL default '0',
  `classtext` mediumtext NOT NULL,
  `ttids` text NOT NULL,
  PRIMARY KEY  (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsclassf`;
CREATE TABLE `phome_enewsclassf` (
  `fid` smallint(6) NOT NULL auto_increment,
  `f` varchar(30) NOT NULL default '',
  `fname` varchar(30) NOT NULL default '',
  `fform` varchar(20) NOT NULL default '',
  `fhtml` mediumtext NOT NULL,
  `fzs` varchar(255) NOT NULL default '',
  `myorder` smallint(6) NOT NULL default '0',
  `ftype` varchar(30) NOT NULL default '',
  `flen` varchar(20) NOT NULL default '',
  `fvalue` text NOT NULL,
  `fformsize` varchar(12) NOT NULL default '',
  PRIMARY KEY  (`fid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsdiggips`;
CREATE TABLE `phome_enewsdiggips` (
  `classid` smallint(6) NOT NULL default '0',
  `id` int(11) NOT NULL default '0',
  `ips` mediumtext NOT NULL,
  KEY `classid` (`classid`,`id`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsdo`;
CREATE TABLE `phome_enewsdo` (
  `doid` smallint(6) NOT NULL auto_increment,
  `doname` varchar(60) NOT NULL default '',
  `dotime` smallint(6) NOT NULL default '0',
  `isopen` tinyint(1) NOT NULL default '0',
  `doing` tinyint(4) NOT NULL default '0',
  `classid` text NOT NULL,
  `lasttime` int(11) NOT NULL default '0',
  PRIMARY KEY  (`doid`)
) TYPE=MyISAM;

INSERT INTO `phome_enewsdo` VALUES (1, '自动刷新首页', 12, 0, 0, ',', 1273215883);

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsdolog`;
CREATE TABLE `phome_enewsdolog` (
  `logid` bigint(20) NOT NULL auto_increment,
  `logip` varchar(20) NOT NULL default '',
  `logtime` datetime NOT NULL default '0000-00-00 00:00:00',
  `username` varchar(30) NOT NULL default '',
  `enews` varchar(30) NOT NULL default '',
  `doing` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`logid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsdownerror`;
CREATE TABLE `phome_enewsdownerror` (
  `errorid` int(11) NOT NULL auto_increment,
  `id` int(11) NOT NULL default '0',
  `errortext` varchar(255) NOT NULL default '',
  `errortime` datetime NOT NULL default '0000-00-00 00:00:00',
  `errorip` varchar(20) NOT NULL default '',
  `email` varchar(80) NOT NULL default '',
  `classid` smallint(6) NOT NULL default '0',
  `cid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`errorid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsdownrecord`;
CREATE TABLE `phome_enewsdownrecord` (
  `id` int(11) NOT NULL default '0',
  `pathid` int(11) NOT NULL default '0',
  `userid` int(11) NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `title` varchar(120) NOT NULL default '',
  `cardfen` int(11) NOT NULL default '0',
  `truetime` int(11) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  `online` tinyint(1) NOT NULL default '0',
  KEY `userid` (`userid`),
  KEY `truetime` (`truetime`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsdownurlqz`;
CREATE TABLE `phome_enewsdownurlqz` (
  `urlid` smallint(6) NOT NULL auto_increment,
  `urlname` varchar(30) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  `downtype` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`urlid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewserrorclass`;
CREATE TABLE `phome_enewserrorclass` (
  `classid` smallint(6) NOT NULL auto_increment,
  `classname` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsf`;
CREATE TABLE `phome_enewsf` (
  `fid` smallint(6) NOT NULL auto_increment,
  `f` varchar(30) NOT NULL default '',
  `fname` varchar(30) NOT NULL default '',
  `fform` varchar(20) NOT NULL default '',
  `fhtml` mediumtext NOT NULL,
  `fzs` varchar(255) NOT NULL default '',
  `isadd` tinyint(1) NOT NULL default '0',
  `isshow` tinyint(1) NOT NULL default '0',
  `iscj` tinyint(1) NOT NULL default '0',
  `cjhtml` mediumtext NOT NULL,
  `myorder` smallint(6) NOT NULL default '0',
  `ftype` varchar(30) NOT NULL default '',
  `flen` varchar(20) NOT NULL default '',
  `dotemp` tinyint(1) NOT NULL default '0',
  `tid` smallint(6) NOT NULL default '0',
  `tbname` varchar(60) NOT NULL default '',
  `savetxt` tinyint(1) NOT NULL default '0',
  `fvalue` text NOT NULL,
  `iskey` tinyint(1) NOT NULL default '0',
  `tobr` tinyint(1) NOT NULL default '0',
  `dohtml` tinyint(1) NOT NULL default '0',
  `qfhtml` mediumtext NOT NULL,
  `isonly` tinyint(1) NOT NULL default '0',
  `linkfieldval` varchar(30) NOT NULL default '',
  `samedata` tinyint(1) NOT NULL default '0',
  `fformsize` varchar(12) NOT NULL default '',
  `tbdataf` tinyint(1) NOT NULL default '0',
  `ispage` tinyint(1) NOT NULL default '0',
  `adddofun` varchar(255) NOT NULL default '',
  `editdofun` varchar(255) NOT NULL default '',
  `qadddofun` varchar(255) NOT NULL default '',
  `qeditdofun` varchar(255) NOT NULL default '',
  `linkfieldtb` varchar(60) NOT NULL default '',
  `linkfieldshow` varchar(30) NOT NULL default '',
  `editorys` tinyint(1) NOT NULL default '0',
  `issmalltext` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`fid`),
  KEY `tid` (`tid`)
) TYPE=MyISAM;

INSERT INTO `phome_enewsf` VALUES (1, 'title', '标题', 'text', '<table width=\\"100%\\" border=\\"0\\" cellpadding=\\"0\\" cellspacing=\\"0\\" bgcolor=\\"#DBEAF5\\">\r\n<tr> \r\n  <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">\r\n<?=$tts?\\"<select name=\\\'ttid\\\'><option value=\\\'0\\\'>标题分类</option>$tts</select>\\":\\"\\"?>\r\n	<input type=text name=title value=\\"<?=htmlspecialchars(stripSlashes($r[title]))?>\\" size=\\"60\\"> \r\n	<input type=\\"button\\" name=\\"button\\" value=\\"图文\\" onclick=\\"document.add.title.value=document.add.title.value+\\\'(图文)\\\';\\"> \r\n  </td>\r\n</tr>\r\n<tr> \r\n  <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">属性: \r\n	<input name=\\"titlefont[b]\\" type=\\"checkbox\\" value=\\"b\\"<?=$titlefontb?>>粗体\r\n	<input name=\\"titlefont[i]\\" type=\\"checkbox\\" value=\\"i\\"<?=$titlefonti?>>斜体\r\n	<input name=\\"titlefont[s]\\" type=\\"checkbox\\" value=\\"s\\"<?=$titlefonts?>>删除线\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;颜色: <input name=\\"titlecolor\\" type=\\"text\\" value=\\"<?=stripSlashes($r[titlecolor])?>\\" size=\\"10\\"><a onclick=\\"foreColor();\\"><img src=\\"../data/images/color.gif\\" width=\\"21\\" height=\\"21\\" align=\\"absbottom\\"></a>\r\n  </td>\r\n</tr>\r\n</table>', '标题', 0, 1, 1, '  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--title--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_title]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_title]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_title]" type="text" id="add[z_title]" value="<?=stripSlashes($r[z_title])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>', 0, 'CHAR', '200', 1, 1, 'news', 0, '', 0, 1, 1, '<input name=\\"title\\" type=\\"text\\" size=\\"42\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'title\\\',stripSlashes($r[title]))?>\\">', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (2, 'special.field', '特殊属性', '', '<table width=\\"100%\\" border=\\"0\\" cellpadding=\\"0\\" cellspacing=\\"0\\" bgcolor=\\"#DBEAF5\\">\r\n  <tr>\r\n    <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">信息属性: \r\n      <input name=\\"checked\\" type=\\"checkbox\\" value=\\"1\\"<?=$r[checked]?\\\' checked\\\':\\\'\\\'?>>\r\n      审核 &nbsp;&nbsp; 推荐 \r\n      <select name=\\"isgood\\" id=\\"isgood\\">\r\n        <option value=\\"0\\"<?=$r[isgood]==0?\\\' selected\\\':\\\'\\\'?>>不推荐</option>\r\n        <option value=\\"1\\"<?=$r[isgood]==1?\\\' selected\\\':\\\'\\\'?>>一级推荐</option>\r\n        <option value=\\"2\\"<?=$r[isgood]==2?\\\' selected\\\':\\\'\\\'?>>二级推荐</option>\r\n        <option value=\\"3\\"<?=$r[isgood]==3?\\\' selected\\\':\\\'\\\'?>>三级推荐</option>\r\n        <option value=\\"4\\"<?=$r[isgood]==4?\\\' selected\\\':\\\'\\\'?>>四级推荐</option>\r\n        <option value=\\"5\\"<?=$r[isgood]==5?\\\' selected\\\':\\\'\\\'?>>五级推荐</option>\r\n        <option value=\\"6\\"<?=$r[isgood]==6?\\\' selected\\\':\\\'\\\'?>>六级推荐</option>\r\n        <option value=\\"7\\"<?=$r[isgood]==7?\\\' selected\\\':\\\'\\\'?>>七级推荐</option>\r\n        <option value=\\"8\\"<?=$r[isgood]==8?\\\' selected\\\':\\\'\\\'?>>八级推荐</option>\r\n        <option value=\\"9\\"<?=$r[isgood]==9?\\\' selected\\\':\\\'\\\'?>>九级推荐</option>\r\n      </select>\r\n      &nbsp;&nbsp; 头条 \r\n      <select name=\\"firsttitle\\" id=\\"firsttitle\\">\r\n        <option value=\\"0\\"<?=$r[firsttitle]==0?\\\' selected\\\':\\\'\\\'?>>非头条</option>\r\n        <option value=\\"1\\"<?=$r[firsttitle]==1?\\\' selected\\\':\\\'\\\'?>>一级头条</option>\r\n        <option value=\\"2\\"<?=$r[firsttitle]==2?\\\' selected\\\':\\\'\\\'?>>二级头条</option>\r\n        <option value=\\"3\\"<?=$r[firsttitle]==3?\\\' selected\\\':\\\'\\\'?>>三级头条</option>\r\n        <option value=\\"4\\"<?=$r[firsttitle]==4?\\\' selected\\\':\\\'\\\'?>>四级头条</option>\r\n        <option value=\\"5\\"<?=$r[firsttitle]==5?\\\' selected\\\':\\\'\\\'?>>五级头条</option>\r\n        <option value=\\"6\\"<?=$r[firsttitle]==6?\\\' selected\\\':\\\'\\\'?>>六级头条</option>\r\n        <option value=\\"7\\"<?=$r[firsttitle]==7?\\\' selected\\\':\\\'\\\'?>>七级头条</option>\r\n        <option value=\\"8\\"<?=$r[firsttitle]==8?\\\' selected\\\':\\\'\\\'?>>八级头条</option>\r\n        <option value=\\"9\\"<?=$r[firsttitle]==9?\\\' selected\\\':\\\'\\\'?>>九级头条</option>\r\n      </select></td>\r\n  </tr>\r\n  <tr> \r\n    <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">关键字&nbsp;&nbsp;&nbsp;: \r\n      <input name=\\"keyboard\\" type=\\"text\\" size=\\"52\\" value=\\"<?=stripSlashes($r[keyboard])?>\\">\r\n      <font color=\\"#666666\\">(多个请用&quot;,&quot;隔开)</font></td>\r\n  </tr>\r\n  <tr> \r\n    <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">外部链接: \r\n      <input name=\\"titleurl\\" type=\\"text\\" value=\\"<?=stripSlashes($r[titleurl])?>\\" size=\\"52\\">\r\n      <font color=\\"#666666\\">(填写后信息连接地址将为此链接)</font></td>\r\n  </tr>\r\n</table>\r\n', '特殊属性', 0, 1, 0, '', 1, '', '', 0, 1, 'news', 0, '', 0, 1, 1, '<input name=\\"keyboard\\" type=\\"text\\" size=42 value=\\"<?=stripSlashes($r[keyboard])?>\\">\r\n      <font color=\\"#666666\\">(多个请用&quot;,&quot;隔开)</font>', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (3, 'titlepic', '标题图片', 'img', '\r\n<input name=\\"titlepic\\" type=\\"text\\" id=\\"titlepic\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[titlepic]))?>\\" size=\\"45\\">\r\n<a onclick=\\"window.open(\\\'ecmseditor/FileMain.php?type=1&classid=<?=$classid?>&filepass=<?=$filepass?>&doing=1&field=titlepic\\\',\\\'\\\',\\\'width=700,height=550,scrollbars=yes\\\');\\" title=\\"选择已上传的图片\\"><img src=\\"../data/images/changeimg.gif\\" border=\\"0\\" align=\\"absbottom\\"></a> \r\n', '标题图片', 0, 1, 1, '\r\n  <tr bgcolor=\\"#FFFFFF\\"> \r\n    <td height=\\"22\\" valign=\\"top\\"><strong>[!--enews.name--]正则：</strong><br>\r\n      ( \r\n      <input name=\\"textfield\\" type=\\"text\\" id=\\"textfield\\" value=\\"[!--titlepic--]\\" size=\\"20\\">\r\n      )</td>\r\n    <td><table width=\\"100%\\" border=\\"0\\" cellspacing=\\"1\\" cellpadding=\\"3\\">\r\n    <tr>\r\n      <td>附件前缀 \r\n        <input name=\\"add[qz_titlepic]\\" type=\\"text\\" id=\\"add[qz_titlepic]\\" value=\\"<?=stripSlashes($r[qz_titlepic])?>\\"> \r\n        <input name=\\"add[save_titlepic]\\" type=\\"checkbox\\" id=\\"add[save_titlepic]\\" value=\\" checked\\"<?=$r[save_titlepic]?>>\r\n        远程保存 </td>\r\n    </tr>\r\n    <tr> \r\n      <td><textarea name=\\"add[zz_titlepic]\\" cols=\\"60\\" rows=\\"10\\" id=\\"add[zz_titlepic]\\"><?=htmlspecialchars(stripSlashes($r[zz_titlepic]))?></textarea></td>\r\n    </tr>\r\n    <tr> \r\n      <td><input name=\\"add[z_titlepic]\\" type=\\"text\\" id=\\"titlepic5\\" value=\\"<?=stripSlashes($r[z_titlepic])?>\\">\r\n        (如填写这里，这就是字段的值)</td>\r\n    </tr>\r\n  </table></td>\r\n  </tr>\r\n', 2, 'CHAR', '200', 1, 1, 'news', 0, '', 0, 1, 1, '\r\n<input type=\\"file\\" name=\\"titlepicfile\\" size=\\"45\\">\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (4, 'newstime', '发布时间', 'text', '<input name=\\"newstime\\" type=\\"text\\" value=\\"<?=$r[newstime]?>\\"><input type=button name=button value=\\"设为当前时间\\" onclick=\\"document.add.newstime.value=\\\'<?=$todaytime?>\\\'\\">', '发布时间', 0, 1, 1, '  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--newstime--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_newstime]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_newstime]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_newstime]" type="text" id="add[z_newstime]" value="<?=stripSlashes($r[z_newstime])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>', 1, 'INT', '10', 1, 1, 'news', 0, '', 0, 1, 1, '', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (5, 'ftitle', '副标题', 'text', '<input name=\\"ftitle\\" type=\\"text\\" size=60 id=\\"ftitle\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[ftitle]))?>\\">\r\n', '副标题', 1, 1, 1, '\r\n  <tr bgcolor=\\"#FFFFFF\\"> \r\n    <td height=\\"22\\" valign=\\"top\\"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name=\\"textfield\\" type=\\"text\\" id=\\"textfield\\" value=\\"[!--ftitle--]\\" size=\\"20\\">)</td>\r\n    <td><table width=\\"100%\\" border=\\"0\\" cellspacing=\\"1\\" cellpadding=\\"3\\">\r\n        <tr> \r\n          <td><textarea name=\\"add[zz_ftitle]\\" cols=\\"60\\" rows=\\"10\\" id=\\"textarea\\"><?=htmlspecialchars(stripSlashes($r[zz_ftitle]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name=\\"add[z_ftitle]\\" type=\\"text\\" id=\\"add[z_ftitle]\\" value=\\"<?=stripSlashes($r[z_ftitle])?>\\">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 0, 'CHAR', '120', 1, 1, 'news', 0, '', 0, 1, 1, '<input name=\\"ftitle\\" type=\\"text\\" size=42 id=\\"ftitle\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'ftitle\\\',stripSlashes($r[ftitle]))?>\\">\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (6, 'smalltext', '内容简介', 'textarea', '<textarea name=\\"smalltext\\" cols=\\"80\\" rows=\\"10\\" id=\\"smalltext\\"><?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[smalltext]))?></textarea>\r\n', '内容简介', 1, 1, 1, '\r\n  <tr bgcolor=\\"#FFFFFF\\"> \r\n    <td height=\\"22\\" valign=\\"top\\"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name=\\"textfield\\" type=\\"text\\" id=\\"textfield\\" value=\\"[!--smalltext--]\\" size=\\"20\\">)</td>\r\n    <td><table width=\\"100%\\" border=\\"0\\" cellspacing=\\"1\\" cellpadding=\\"3\\">\r\n        <tr> \r\n          <td><textarea name=\\"add[zz_smalltext]\\" cols=\\"60\\" rows=\\"10\\" id=\\"textarea\\"><?=htmlspecialchars(stripSlashes($r[zz_smalltext]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name=\\"add[z_smalltext]\\" type=\\"text\\" id=\\"add[z_smalltext]\\" value=\\"<?=stripSlashes($r[z_smalltext])?>\\">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 2, 'CHAR', '255', 1, 1, 'news', 0, '', 0, 1, 1, '<textarea name=\\"smalltext\\" cols=\\"60\\" rows=\\"10\\" id=\\"smalltext\\"><?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'smalltext\\\',stripSlashes($r[smalltext]))?></textarea>\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 1);
INSERT INTO `phome_enewsf` VALUES (7, 'writer', '作者', 'text', '\r\n<?php\r\n$writer_sql=$empire->query(\\"select writer from {$dbtbpre}enewswriter\\");\r\nwhile($w_r=$empire->fetch($writer_sql))\r\n{\r\n	$w_class.=\\"<option value=\\\'\\".$w_r[writer].\\"\\\'>\\".$w_r[writer].\\"</option>\\";\r\n}\r\n?>\r\n<input type=text name=writer value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[writer]))?>\\" size=\\"\\"> \r\n        <select name=\\"w_id\\" id=\\"select7\\" onchange=\\"document.add.writer.value=document.add.w_id.value\\">\r\n          <option>选择作者</option>\r\n		  <?=$w_class?>\r\n        </select>\r\n<input type=\\"button\\" name=\\"wbutton\\" value=\\"增加作者\\" onclick=\\"window.open(\\\'NewsSys/writer.php?addwritername=\\\'+document.add.writer.value);\\">\r\n', '作者', 1, 1, 1, '\r\n  <tr bgcolor=\\"#FFFFFF\\"> \r\n    <td height=\\"22\\" valign=\\"top\\"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name=\\"textfield\\" type=\\"text\\" id=\\"textfield\\" value=\\"[!--writer--]\\" size=\\"20\\">)</td>\r\n    <td><table width=\\"100%\\" border=\\"0\\" cellspacing=\\"1\\" cellpadding=\\"3\\">\r\n        <tr> \r\n          <td><textarea name=\\"add[zz_writer]\\" cols=\\"60\\" rows=\\"10\\" id=\\"textarea\\"><?=htmlspecialchars(stripSlashes($r[zz_writer]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name=\\"add[z_writer]\\" type=\\"text\\" id=\\"add[z_writer]\\" value=\\"<?=stripSlashes($r[z_writer])?>\\">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 2, 'VARCHAR', '30', 1, 1, 'news', 0, '', 0, 1, 1, '\r\n<input name=\\"writer\\" type=\\"text\\" id=\\"writer\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'writer\\\',stripSlashes($r[writer]))?>\\" size=\\"\\">\r\n', 0, '', 0, '', 1, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (8, 'befrom', '信息来源', 'text', '\r\n<?php\r\n$befrom_sql=$empire->query(\\"select sitename from {$dbtbpre}enewsbefrom\\");\r\nwhile($b_r=$empire->fetch($befrom_sql))\r\n{\r\n	$b_class.=\\"<option value=\\\'\\".$b_r[sitename].\\"\\\'>\\".$b_r[sitename].\\"</option>\\";\r\n}\r\n?>\r\n<input type=\\"text\\" name=\\"befrom\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[befrom]))?>\\" size=\\"\\"> \r\n        <select name=\\"befrom_id\\" id=\\"befromid\\" onchange=\\"document.add.befrom.value=document.add.befrom_id.value\\">\r\n          <option>选择信息来源</option>\r\n          <?=$b_class?>\r\n        </select>\r\n<input type=\\"button\\" name=\\"wbutton\\" value=\\"增加来源\\" onclick=\\"window.open(\\\'NewsSys/BeFrom.php?addsitename=\\\'+document.add.befrom.value);\\">\r\n', '信息来源', 1, 1, 1, '\r\n  <tr bgcolor=\\"#FFFFFF\\"> \r\n    <td height=\\"22\\" valign=\\"top\\"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name=\\"textfield\\" type=\\"text\\" id=\\"textfield\\" value=\\"[!--befrom--]\\" size=\\"20\\">)</td>\r\n    <td><table width=\\"100%\\" border=\\"0\\" cellspacing=\\"1\\" cellpadding=\\"3\\">\r\n        <tr> \r\n          <td><textarea name=\\"add[zz_befrom]\\" cols=\\"60\\" rows=\\"10\\" id=\\"textarea\\"><?=htmlspecialchars(stripSlashes($r[zz_befrom]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name=\\"add[z_befrom]\\" type=\\"text\\" id=\\"add[z_befrom]\\" value=\\"<?=stripSlashes($r[z_befrom])?>\\">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 2, 'VARCHAR', '60', 1, 1, 'news', 0, '', 0, 1, 1, '\r\n<input name=\\"befrom\\" type=\\"text\\" id=\\"befrom\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'befrom\\\',stripSlashes($r[befrom]))?>\\" size=\\"\\">\r\n', 0, '', 0, '', 1, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (9, 'newstext', '新闻正文', 'editor', '<?=ECMS_ShowEditorVar(\\"newstext\\",$ecmsfirstpost==1?\\"\\":stripSlashes($r[newstext]),\\"Default\\",\\"\\",\\"300\\",\\"100%\\")?>\r\n<table width=\\"100%\\" border=\\"0\\" cellpadding=\\"3\\" cellspacing=\\"1\\" bgcolor=\\"#DBEAF5\\">\r\n          <tr> \r\n            <td bgcolor=\\"#FFFFFF\\"> <input name=\\"dokey\\" type=\\"checkbox\\" value=\\"1\\"<?=$r[dokey]==1?\\\' checked\\\':\\\'\\\'?>>\r\n              关键字替换&nbsp;&nbsp; <input name=\\"copyimg\\" type=\\"checkbox\\" id=\\"copyimg\\" value=\\"1\\">\r\n      远程保存图片(\r\n      <input name=\\"mark\\" type=\\"checkbox\\" id=\\"mark\\" value=\\"1\\">\r\n      <a href=\\"SetEnews.php\\" target=\\"_blank\\">加水印</a>)&nbsp;&nbsp; \r\n      <input name=\\"copyflash\\" type=\\"checkbox\\" id=\\"copyflash\\" value=\\"1\\">\r\n      远程保存FLASH(地址前缀： \r\n      <input name=\\"qz_url\\" type=\\"text\\" id=\\"qz_url\\" size=\\"\\">\r\n              )</td>\r\n          </tr>\r\n          <tr>\r\n            \r\n    <td bgcolor=\\"#FFFFFF\\"><input name=\\"repimgnexturl\\" type=\\"checkbox\\" id=\\"repimgnexturl\\" value=\\"1\\"> 图片链接转为下一页&nbsp;&nbsp; <input name=\\"autopage\\" type=\\"checkbox\\" id=\\"autopage\\" value=\\"1\\">自动分页\r\n      ,每 \r\n      <input name=\\"autosize\\" type=\\"text\\" id=\\"autosize\\" value=\\"5000\\" size=\\"5\\">\r\n      个字节为一页&nbsp;&nbsp; 取第 \r\n      <input name=\\"getfirsttitlepic\\" type=\\"text\\" id=\\"getfirsttitlepic\\" value=\\"\\" size=\\"1\\">\r\n      张上传图为标题图片( \r\n      <input name=\\"getfirsttitlespic\\" type=\\"checkbox\\" id=\\"getfirsttitlespic\\" value=\\"1\\">\r\n      缩略图: 宽 \r\n      <input name=\\"getfirsttitlespicw\\" type=\\"text\\" id=\\"getfirsttitlespicw\\" size=\\"3\\" value=\\"<?=$public_r[spicwidth]?>\\">\r\n      *高\r\n      <input name=\\"getfirsttitlespich\\" type=\\"text\\" id=\\"getfirsttitlespich\\" size=\\"3\\" value=\\"<?=$public_r[spicheight]?>\\">\r\n      )</td>\r\n          </tr>\r\n        </table>\r\n', '新闻正文', 1, 1, 1, '\r\n  <tr bgcolor=\\"#FFFFFF\\"> \r\n    <td height=\\"22\\" valign=\\"top\\"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name=\\"textfield\\" type=\\"text\\" id=\\"textfield\\" value=\\"[!--newstext--]\\" size=\\"20\\">)</td>\r\n    <td><table width=\\"100%\\" border=\\"0\\" cellspacing=\\"1\\" cellpadding=\\"3\\">\r\n        <tr> \r\n          <td><textarea name=\\"add[zz_newstext]\\" cols=\\"60\\" rows=\\"10\\" id=\\"textarea\\"><?=htmlspecialchars(stripSlashes($r[zz_newstext]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name=\\"add[z_newstext]\\" type=\\"text\\" id=\\"add[z_newstext]\\" value=\\"<?=stripSlashes($r[z_newstext])?>\\">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 2, 'MEDIUMTEXT', '', 1, 1, 'news', 0, '', 0, 1, 1, '<?=ECMS_ShowEditorVar(\\"newstext\\",$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'newstext\\\',stripSlashes($r[newstext])),\\"Default\\",\\"\\",\\"300\\",\\"100%\\")?>\r\n', 0, '', 0, '', 1, 1, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (10, 'title', '标题', 'text', '<table width=\\"100%\\" border=\\"0\\" cellpadding=\\"0\\" cellspacing=\\"0\\" bgcolor=\\"#DBEAF5\\">\r\n<tr> \r\n  <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">\r\n<?=$tts?\\"<select name=\\\'ttid\\\'><option value=\\\'0\\\'>标题分类</option>$tts</select>\\":\\"\\"?>\r\n	<input type=text name=title value=\\"<?=htmlspecialchars(stripSlashes($r[title]))?>\\" size=\\"60\\"> \r\n	<input type=\\"button\\" name=\\"button\\" value=\\"图文\\" onclick=\\"document.add.title.value=document.add.title.value+\\\'(图文)\\\';\\"> \r\n  </td>\r\n</tr>\r\n<tr> \r\n  <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">属性: \r\n	<input name=\\"titlefont[b]\\" type=\\"checkbox\\" value=\\"b\\"<?=$titlefontb?>>粗体\r\n	<input name=\\"titlefont[i]\\" type=\\"checkbox\\" value=\\"i\\"<?=$titlefonti?>>斜体\r\n	<input name=\\"titlefont[s]\\" type=\\"checkbox\\" value=\\"s\\"<?=$titlefonts?>>删除线\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;颜色: <input name=\\"titlecolor\\" type=\\"text\\" value=\\"<?=stripSlashes($r[titlecolor])?>\\" size=\\"10\\"><a onclick=\\"foreColor();\\"><img src=\\"../data/images/color.gif\\" width=\\"21\\" height=\\"21\\" align=\\"absbottom\\"></a>\r\n  </td>\r\n</tr>\r\n</table>', '标题', 0, 1, 1, '  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--title--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_title]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_title]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_title]" type="text" id="add[z_title]" value="<?=stripSlashes($r[z_title])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>', 0, 'VARCHAR', '200', 1, 2, 'download', 0, '', 0, 1, 1, '<input name=\\"title\\" type=\\"text\\" size=\\"42\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'title\\\',stripSlashes($r[title]))?>\\">', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (11, 'special.field', '特殊属性', '', '<table width=\\"100%\\" border=\\"0\\" cellpadding=\\"0\\" cellspacing=\\"0\\" bgcolor=\\"#DBEAF5\\">\r\n  <tr>\r\n    <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">信息属性: \r\n      <input name=\\"checked\\" type=\\"checkbox\\" value=\\"1\\"<?=$r[checked]?\\\' checked\\\':\\\'\\\'?>>\r\n      审核 &nbsp;&nbsp; 推荐 \r\n      <select name=\\"isgood\\" id=\\"isgood\\">\r\n        <option value=\\"0\\"<?=$r[isgood]==0?\\\' selected\\\':\\\'\\\'?>>不推荐</option>\r\n        <option value=\\"1\\"<?=$r[isgood]==1?\\\' selected\\\':\\\'\\\'?>>一级推荐</option>\r\n        <option value=\\"2\\"<?=$r[isgood]==2?\\\' selected\\\':\\\'\\\'?>>二级推荐</option>\r\n        <option value=\\"3\\"<?=$r[isgood]==3?\\\' selected\\\':\\\'\\\'?>>三级推荐</option>\r\n        <option value=\\"4\\"<?=$r[isgood]==4?\\\' selected\\\':\\\'\\\'?>>四级推荐</option>\r\n        <option value=\\"5\\"<?=$r[isgood]==5?\\\' selected\\\':\\\'\\\'?>>五级推荐</option>\r\n        <option value=\\"6\\"<?=$r[isgood]==6?\\\' selected\\\':\\\'\\\'?>>六级推荐</option>\r\n        <option value=\\"7\\"<?=$r[isgood]==7?\\\' selected\\\':\\\'\\\'?>>七级推荐</option>\r\n        <option value=\\"8\\"<?=$r[isgood]==8?\\\' selected\\\':\\\'\\\'?>>八级推荐</option>\r\n        <option value=\\"9\\"<?=$r[isgood]==9?\\\' selected\\\':\\\'\\\'?>>九级推荐</option>\r\n      </select>\r\n      &nbsp;&nbsp; 头条 \r\n      <select name=\\"firsttitle\\" id=\\"firsttitle\\">\r\n        <option value=\\"0\\"<?=$r[firsttitle]==0?\\\' selected\\\':\\\'\\\'?>>非头条</option>\r\n        <option value=\\"1\\"<?=$r[firsttitle]==1?\\\' selected\\\':\\\'\\\'?>>一级头条</option>\r\n        <option value=\\"2\\"<?=$r[firsttitle]==2?\\\' selected\\\':\\\'\\\'?>>二级头条</option>\r\n        <option value=\\"3\\"<?=$r[firsttitle]==3?\\\' selected\\\':\\\'\\\'?>>三级头条</option>\r\n        <option value=\\"4\\"<?=$r[firsttitle]==4?\\\' selected\\\':\\\'\\\'?>>四级头条</option>\r\n        <option value=\\"5\\"<?=$r[firsttitle]==5?\\\' selected\\\':\\\'\\\'?>>五级头条</option>\r\n        <option value=\\"6\\"<?=$r[firsttitle]==6?\\\' selected\\\':\\\'\\\'?>>六级头条</option>\r\n        <option value=\\"7\\"<?=$r[firsttitle]==7?\\\' selected\\\':\\\'\\\'?>>七级头条</option>\r\n        <option value=\\"8\\"<?=$r[firsttitle]==8?\\\' selected\\\':\\\'\\\'?>>八级头条</option>\r\n        <option value=\\"9\\"<?=$r[firsttitle]==9?\\\' selected\\\':\\\'\\\'?>>九级头条</option>\r\n      </select></td>\r\n  </tr>\r\n  <tr> \r\n    <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">关键字&nbsp;&nbsp;&nbsp;: \r\n      <input name=\\"keyboard\\" type=\\"text\\" size=\\"52\\" value=\\"<?=stripSlashes($r[keyboard])?>\\">\r\n      <font color=\\"#666666\\">(多个请用&quot;,&quot;隔开)</font></td>\r\n  </tr>\r\n  <tr> \r\n    <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">外部链接: \r\n      <input name=\\"titleurl\\" type=\\"text\\" value=\\"<?=stripSlashes($r[titleurl])?>\\" size=\\"52\\">\r\n      <font color=\\"#666666\\">(填写后信息连接地址将为此链接)</font></td>\r\n  </tr>\r\n</table>\r\n', '特殊属性', 0, 1, 0, '', 0, '', '', 0, 2, 'download', 0, '', 0, 1, 1, '<input name=\\"keyboard\\" type=\\"text\\" size=42 value=\\"<?=stripSlashes($r[keyboard])?>\\">\r\n      <font color=\\"#666666\\">(多个请用&quot;,&quot;隔开)</font>', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (12, 'titlepic', '标题图片', 'img', '\r\n<input name=\\"titlepic\\" type=\\"text\\" id=\\"titlepic\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[titlepic]))?>\\" size=\\"45\\">\r\n<a onclick=\\"window.open(\\\'ecmseditor/FileMain.php?type=1&classid=<?=$classid?>&filepass=<?=$filepass?>&doing=1&field=titlepic\\\',\\\'\\\',\\\'width=700,height=550,scrollbars=yes\\\');\\" title=\\"选择已上传的图片\\"><img src=\\"../data/images/changeimg.gif\\" border=\\"0\\" align=\\"absbottom\\"></a> \r\n', '标题图片', 0, 1, 1, '\r\n  <tr bgcolor=\\"#FFFFFF\\"> \r\n    <td height=\\"22\\" valign=\\"top\\"><strong>[!--enews.name--]正则：</strong><br>\r\n      ( \r\n      <input name=\\"textfield\\" type=\\"text\\" id=\\"textfield\\" value=\\"[!--titlepic--]\\" size=\\"20\\">\r\n      )</td>\r\n    <td><table width=\\"100%\\" border=\\"0\\" cellspacing=\\"1\\" cellpadding=\\"3\\">\r\n    <tr>\r\n      <td>附件前缀 \r\n        <input name=\\"add[qz_titlepic]\\" type=\\"text\\" id=\\"add[qz_titlepic]\\" value=\\"<?=stripSlashes($r[qz_titlepic])?>\\"> \r\n        <input name=\\"add[save_titlepic]\\" type=\\"checkbox\\" id=\\"add[save_titlepic]\\" value=\\" checked\\"<?=$r[save_titlepic]?>>\r\n        远程保存 </td>\r\n    </tr>\r\n    <tr> \r\n      <td><textarea name=\\"add[zz_titlepic]\\" cols=\\"60\\" rows=\\"10\\" id=\\"add[zz_titlepic]\\"><?=htmlspecialchars(stripSlashes($r[zz_titlepic]))?></textarea></td>\r\n    </tr>\r\n    <tr> \r\n      <td><input name=\\"add[z_titlepic]\\" type=\\"text\\" id=\\"titlepic5\\" value=\\"<?=stripSlashes($r[z_titlepic])?>\\">\r\n        (如填写这里，这就是字段的值)</td>\r\n    </tr>\r\n  </table></td>\r\n  </tr>\r\n', 1, 'VARCHAR', '200', 1, 2, 'download', 0, '', 0, 1, 1, '\r\n<input type=\\"file\\" name=\\"titlepicfile\\" size=\\"45\\">\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (13, 'newstime', '发布时间', 'text', '<input name=\\"newstime\\" type=\\"text\\" value=\\"<?=$r[newstime]?>\\"><input type=button name=button value=\\"设为当前时间\\" onclick=\\"document.add.newstime.value=\\\'<?=$todaytime?>\\\'\\">', '发布时间', 0, 1, 1, '  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--newstime--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_newstime]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_newstime]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_newstime]" type="text" id="add[z_newstime]" value="<?=stripSlashes($r[z_newstime])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>', 0, 'INT', '10', 1, 2, 'download', 0, '', 0, 1, 1, '', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (14, 'softwriter', '作者', 'text', '<input name=\\"softwriter\\" type=\\"text\\" size=60 id=\\"softwriter\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[softwriter]))?>\\">\r\n', '作者', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--softwriter--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_softwriter]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_softwriter]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_softwriter]" type="text" id="add[z_softwriter]" value="<?=stripSlashes($r[z_softwriter])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'VARCHAR', '30', 1, 2, 'download', 0, '', 0, 1, 1, '<input name=\\"softwriter\\" type=\\"text\\" size=42 id=\\"softwriter\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'softwriter\\\',stripSlashes($r[softwriter]))?>\\">\r\n', 0, '', 0, '', 1, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (15, 'homepage', '官方网站', 'text', '<input name=\\"homepage\\" type=\\"text\\" size=60 id=\\"homepage\\" value=\\"<?=$ecmsfirstpost==1?\\"http://\\":htmlspecialchars(stripSlashes($r[homepage]))?>\\">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--homepage--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_homepage]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_homepage]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_homepage]" type="text" id="add[z_homepage]" value="<?=stripSlashes($r[z_homepage])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'VARCHAR', '80', 1, 2, 'download', 0, 'http://', 0, 1, 1, '<input name=\\"homepage\\" type=\\"text\\" size=42 id=\\"homepage\\" value=\\"<?=$ecmsfirstpost==1?\\"http://\\":DoReqValue($mid,\\\'homepage\\\',stripSlashes($r[homepage]))?>\\">\r\n', 0, '', 0, '', 1, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (16, 'demo', '系统演示', 'text', '<input name=\\"demo\\" type=\\"text\\" size=60 id=\\"demo\\" value=\\"<?=$ecmsfirstpost==1?\\"http://\\":htmlspecialchars(stripSlashes($r[demo]))?>\\">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--demo--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_demo]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_demo]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_demo]" type="text" id="add[z_demo]" value="<?=stripSlashes($r[z_demo])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'VARCHAR', '120', 1, 2, 'download', 0, 'http://', 0, 1, 1, '<input name=\\"demo\\" type=\\"text\\" size=42 id=\\"demo\\" value=\\"<?=$ecmsfirstpost==1?\\"http://\\":DoReqValue($mid,\\\'demo\\\',stripSlashes($r[demo]))?>\\">\r\n', 0, '', 0, '', 1, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (17, 'softfj', '运行环境', 'text', '<input name=\\"softfj\\" type=\\"text\\" size=60 id=\\"softfj\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[softfj]))?>\\">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--softfj--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_softfj]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_softfj]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_softfj]" type="text" id="add[z_softfj]" value="<?=stripSlashes($r[z_softfj])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'VARCHAR', '255', 1, 2, 'download', 0, '', 0, 1, 1, '<input name=\\"softfj\\" type=\\"text\\" size=42 id=\\"softfj\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'softfj\\\',stripSlashes($r[softfj]))?>\\">\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (18, 'language', '软件语言', 'select', '<select name=\\"language\\" id=\\"language\\"><option value=\\"简体中文\\"<?=$r[language]==\\"简体中文\\"?\\\' selected\\\':\\\'\\\'?>>简体中文</option><option value=\\"繁体中文\\"<?=$r[language]==\\"繁体中文\\"?\\\' selected\\\':\\\'\\\'?>>繁体中文</option><option value=\\"英文\\"<?=$r[language]==\\"英文\\"?\\\' selected\\\':\\\'\\\'?>>英文</option><option value=\\"多国语言\\"<?=$r[language]==\\"多国语言\\"?\\\' selected\\\':\\\'\\\'?>>多国语言</option></select>', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--language--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_language]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_language]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_language]" type="text" id="add[z_language]" value="<?=stripSlashes($r[z_language])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'VARCHAR', '16', 1, 2, 'download', 0, '简体中文|繁体中文|英文|多国语言', 0, 1, 1, '<select name=\\"language\\" id=\\"language\\"><option value=\\"简体中文\\"<?=$r[language]==\\"简体中文\\"?\\\' selected\\\':\\\'\\\'?>>简体中文</option><option value=\\"繁体中文\\"<?=$r[language]==\\"繁体中文\\"?\\\' selected\\\':\\\'\\\'?>>繁体中文</option><option value=\\"英文\\"<?=$r[language]==\\"英文\\"?\\\' selected\\\':\\\'\\\'?>>英文</option><option value=\\"多国语言\\"<?=$r[language]==\\"多国语言\\"?\\\' selected\\\':\\\'\\\'?>>多国语言</option></select>', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (19, 'softtype', '软件类型', 'select', '<select name=\\"softtype\\" id=\\"softtype\\"><option value=\\"国产软件\\"<?=$r[softtype]==\\"国产软件\\"?\\\' selected\\\':\\\'\\\'?>>国产软件</option><option value=\\"汉化软件\\"<?=$r[softtype]==\\"汉化软件\\"?\\\' selected\\\':\\\'\\\'?>>汉化软件</option><option value=\\"国外软件\\"<?=$r[softtype]==\\"国外软件\\"?\\\' selected\\\':\\\'\\\'?>>国外软件</option></select>', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--softtype--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_softtype]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_softtype]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_softtype]" type="text" id="add[z_softtype]" value="<?=stripSlashes($r[z_softtype])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'VARCHAR', '16', 1, 2, 'download', 0, '国产软件|汉化软件|国外软件', 0, 1, 1, '<select name=\\"softtype\\" id=\\"softtype\\"><option value=\\"国产软件\\"<?=$r[softtype]==\\"国产软件\\"?\\\' selected\\\':\\\'\\\'?>>国产软件</option><option value=\\"汉化软件\\"<?=$r[softtype]==\\"汉化软件\\"?\\\' selected\\\':\\\'\\\'?>>汉化软件</option><option value=\\"国外软件\\"<?=$r[softtype]==\\"国外软件\\"?\\\' selected\\\':\\\'\\\'?>>国外软件</option></select>', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (20, 'softsq', '授权形式', 'select', '<select name=\\"softsq\\" id=\\"softsq\\"><option value=\\"共享软件\\"<?=$r[softsq]==\\"共享软件\\"?\\\' selected\\\':\\\'\\\'?>>共享软件</option><option value=\\"免费软件\\"<?=$r[softsq]==\\"免费软件\\"?\\\' selected\\\':\\\'\\\'?>>免费软件</option><option value=\\"自由软件\\"<?=$r[softsq]==\\"自由软件\\"?\\\' selected\\\':\\\'\\\'?>>自由软件</option><option value=\\"试用软件\\"<?=$r[softsq]==\\"试用软件\\"?\\\' selected\\\':\\\'\\\'?>>试用软件</option><option value=\\"演示软件\\"<?=$r[softsq]==\\"演示软件\\"?\\\' selected\\\':\\\'\\\'?>>演示软件</option><option value=\\"商业软件\\"<?=$r[softsq]==\\"商业软件\\"?\\\' selected\\\':\\\'\\\'?>>商业软件</option></select>', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--softsq--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_softsq]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_softsq]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_softsq]" type="text" id="add[z_softsq]" value="<?=stripSlashes($r[z_softsq])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'VARCHAR', '16', 1, 2, 'download', 0, '共享软件|免费软件|自由软件|试用软件|演示软件|商业软件', 0, 1, 1, '<select name=\\"softsq\\" id=\\"softsq\\"><option value=\\"共享软件\\"<?=$r[softsq]==\\"共享软件\\"?\\\' selected\\\':\\\'\\\'?>>共享软件</option><option value=\\"免费软件\\"<?=$r[softsq]==\\"免费软件\\"?\\\' selected\\\':\\\'\\\'?>>免费软件</option><option value=\\"自由软件\\"<?=$r[softsq]==\\"自由软件\\"?\\\' selected\\\':\\\'\\\'?>>自由软件</option><option value=\\"试用软件\\"<?=$r[softsq]==\\"试用软件\\"?\\\' selected\\\':\\\'\\\'?>>试用软件</option><option value=\\"演示软件\\"<?=$r[softsq]==\\"演示软件\\"?\\\' selected\\\':\\\'\\\'?>>演示软件</option><option value=\\"商业软件\\"<?=$r[softsq]==\\"商业软件\\"?\\\' selected\\\':\\\'\\\'?>>商业软件</option></select>', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (21, 'star', '软件等级', 'select', '<select name=\\"star\\" id=\\"star\\"><option value=\\"1\\"<?=$r[star]==\\"1\\"?\\\' selected\\\':\\\'\\\'?>>1星</option><option value=\\"2\\"<?=$r[star]==\\"2\\"||$ecmsfirstpost==1?\\\' selected\\\':\\\'\\\'?>>2星</option><option value=\\"3\\"<?=$r[star]==\\"3\\"?\\\' selected\\\':\\\'\\\'?>>3星</option><option value=\\"4\\"<?=$r[star]==\\"4\\"?\\\' selected\\\':\\\'\\\'?>>4星</option><option value=\\"5\\"<?=$r[star]==\\"5\\"?\\\' selected\\\':\\\'\\\'?>>5星</option></select>', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--star--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_star]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_star]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_star]" type="text" id="add[z_star]" value="<?=stripSlashes($r[z_star])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'TINYINT', '1', 1, 2, 'download', 0, '1|2:default|3|4|5', 0, 1, 1, '<select name=\\"star\\" id=\\"star\\"><option value=\\"1\\"<?=$r[star]==\\"1\\"?\\\' selected\\\':\\\'\\\'?>>1星</option><option value=\\"2\\"<?=$r[star]==\\"2\\"||$ecmsfirstpost==1?\\\' selected\\\':\\\'\\\'?>>2星</option><option value=\\"3\\"<?=$r[star]==\\"3\\"?\\\' selected\\\':\\\'\\\'?>>3星</option><option value=\\"4\\"<?=$r[star]==\\"4\\"?\\\' selected\\\':\\\'\\\'?>>4星</option><option value=\\"5\\"<?=$r[star]==\\"5\\"?\\\' selected\\\':\\\'\\\'?>>5星</option></select>', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (22, 'filetype', '文件类型', 'text', '<input name=\\"filetype\\" type=\\"text\\" id=\\"filetype\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[filetype]))?>\\">\r\n<select name=\\"select2\\" onchange=\\"document.add.filetype.value=this.value\\">\r\n        <option value=\\"\\">类型</option>\r\n        <option value=\\".zip\\">.zip</option>\r\n        <option value=\\".rar\\">.rar</option>\r\n        <option value=\\".exe\\">.exe</option>\r\n      </select>', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--filetype--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_filetype]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_filetype]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_filetype]" type="text" id="add[z_filetype]" value="<?=stripSlashes($r[z_filetype])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'VARCHAR', '10', 1, 2, 'download', 0, '', 0, 1, 1, '<input name=\\"filetype\\" type=\\"text\\" size=10 id=\\"filetype\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'filetype\\\',stripSlashes($r[filetype]))?>\\">\r\n<select name=\\"select2\\" onchange=\\"document.add.filetype.value=this.value\\">\r\n        <option value=\\"\\">类型</option>\r\n        <option value=\\".zip\\">.zip</option>\r\n        <option value=\\".rar\\">.rar</option>\r\n        <option value=\\".exe\\">.exe</option>\r\n      </select>', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (23, 'filesize', '文件大小', 'text', '<input name=\\"filesize\\" type=\\"text\\" id=\\"filesize\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[filesize]))?>\\">\r\n<select name=\\"select\\" onchange=\\"document.add.filesize.value+=this.value\\">\r\n        <option value=\\"\\">单位</option>\r\n        <option value=\\" MB\\">MB</option>\r\n        <option value=\\" KB\\">KB</option>\r\n        <option value=\\" GB\\">GB</option>\r\n        <option value=\\" BYTES\\">BYTES</option>\r\n      </select>', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--filesize--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_filesize]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_filesize]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_filesize]" type="text" id="add[z_filesize]" value="<?=stripSlashes($r[z_filesize])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'VARCHAR', '16', 1, 2, 'download', 0, '', 0, 1, 1, '<input name=\\"filesize\\" type=\\"text\\" size=10 id=\\"filesize\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'filesize\\\',stripSlashes($r[filesize]))?>\\">\r\n<select name=\\"select\\" onchange=\\"document.add.filesize.value+=this.value\\">\r\n        <option value=\\"\\">单位</option>\r\n        <option value=\\" MB\\">MB</option>\r\n        <option value=\\" KB\\">KB</option>\r\n        <option value=\\" GB\\">GB</option>\r\n        <option value=\\" BYTES\\">BYTES</option>\r\n      </select>', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (24, 'downpath', '下载地址', 'text', '<script>\r\nfunction doadd()\r\n{var i;\r\nvar str=\\"\\";\r\nvar oldi=0;\r\nvar j=0;\r\noldi=parseInt(document.add.editnum.value);\r\nfor(i=1;i<=document.add.downnum.value;i++)\r\n{\r\nj=i+oldi;\r\nstr=str+\\"<tr><td width=7%> <div align=center>\\"+j+\\"</div></td><td width=19%><div align=left><input name=downname[] type=text id=downname[] value=下载地址\\"+j+\\" size=17></div></td><td width=40%><input name=downpath[] type=text size=36 id=downpath\\"+j+\\" ondblclick=SpOpenChFile(0,\\\'downpath\\"+j+\\"\\\')><select name=thedownqz[]><option value=\\\'\\\'>--地址前缀--</option><?=$newdownqz?></select></td><td width=21%><div align=center><select name=downuser[] id=select><option value=0>游客</option><?=$ygroup?></select></div></td><td width=13%><div align=center><input name=fen[] type=text id=fen[] value=0 size=6></div></td></tr>\\";\r\n}\r\ndocument.getElementById(\\"adddown\\").innerHTML=\\"<table width=\\\'100%\\\' border=0 cellspacing=1 cellpadding=3>\\"+str+\\"</table>\\";\r\n}\r\n</script>\r\n<table width=\\"100%\\" border=\\"0\\" cellspacing=\\"0\\" cellpadding=\\"0\\">\r\n  <tr>\r\n    <td height=\\"25\\">下载地址前缀&nbsp;:\r\n      <input name=\\"downurl_qz\\" type=\\"text\\" size=\\"32\\">\r\n      <select name=\\"changeurl_qz\\" onchange=\\"document.add.downurl_qz.value=document.add.changeurl_qz.value\\">\r\n        <option value=\\"\\" selected>选择前缀</option>\r\n        <?=$downurlqz?>\r\n      </select>\r\n	  </td>\r\n  </tr>\r\n  <tr>\r\n    <td height=\\"25\\">选择/上传附件:\r\n      <input name=\\"changedown_url\\" id=\\"changedown_url\\" type=\\"text\\" size=\\"32\\">\r\n      <input type=\\"button\\" name=\\"Submit\\" value=\\"选择\\" onclick=\\"window.open(\\\'ecmseditor/FileMain.php?type=0&classid=<?=$classid?>&filepass=<?=$filepass?>&doing=1&field=changedown_url\\\',\\\'\\\',\\\'width=700,height=550,scrollbars=yes\\\');\\">&nbsp;\r\n	  <input type=\\"button\\" name=\\"Submit\\" value=\\"复制\\" onclick=\\"document.getElementById(\\\'changedown_url\\\').focus();document.getElementById(\\\'changedown_url\\\').select();clipboardData.setData(\\\'text\\\',document.getElementById(\\\'changedown_url\\\').value);\\"></td>\r\n  </tr>\r\n  <tr> \r\n    <td><table width=\\"100%\\" border=\\"0\\" cellpadding=\\"3\\" cellspacing=\\"1\\" bgcolor=\\"#DBEAF5\\">\r\n        <tr> \r\n          <td width=\\"7%\\"> <div align=\\"center\\">编号</div></td>\r\n          <td width=\\"19%\\"><div align=\\"left\\">下载名称</div></td>\r\n          <td width=\\"40%\\">下载地址 <font color=\\"#666666\\">(双击选择)</font></td>\r\n          <td width=\\"21%\\"> <div align=\\"center\\">权限</div></td>\r\n          <td width=\\"13%\\"> <div align=\\"center\\">点数</div></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n  <tr> \r\n    <td>\r\n    <?php\r\n    if($ecmsfirstpost==1)\r\n    {\r\n    ?>\r\n	<table width=\\\'100%\\\' border=0 cellspacing=1 cellpadding=3>\r\n	<?php\r\n	$editnum=3;\r\n	for($pathi=1;$pathi<=$editnum;$pathi++)\r\n	{\r\n	?>\r\n           <tr> \r\n              <td width=\\\'7%\\\'> <div align=center><?=$pathi?></div></td>\r\n              <td width=\\\'19%\\\'> <div align=left> \r\n                  <input name=downname[] type=text value=\\\'下载地址<?=$pathi?>\\\' size=17>\r\n                    </div></td>\r\n              <td width=\\\'40%\\\'>\r\n	      <input name=downpath[] type=text size=36 id=\\\'downpath<?=$pathi?>\\\' ondblclick=\\"SpOpenChFile(0,\\\'downpath<?=$pathi?>\\\');\\">\r\n	      <select name=thedownqz[]><option value=\\\'\\\'>--地址前缀--</option><?=$newdownqz?></select> \r\n                  </td>\r\n                  <td width=\\\'21%\\\'><div align=center> \r\n                      <select name=downuser[]>\r\n                        <option value=0>游客</option>\r\n                        <?=$ygroup?>\r\n                      </select>\r\n                    </div></td>\r\n                  <td width=\\\'13%\\\'> <div align=center> \r\n                      <input name=fen[] type=text value=0 size=6>\r\n                    </div></td>\r\n            </tr>\r\n	<?php\r\n	}\r\n	?>\r\n	</table>\r\n    <?php\r\n    }\r\n    else\r\n    {\r\n	$editnum=0;\r\n	$downloadpath=\\"\\";\r\n	if($r[downpath])\r\n	{\r\n		$r[downpath]=stripSlashes($r[downpath]);\r\n		//下载地址\r\n		$j=0;\r\n		$d_record=explode(\\"\\\\r\\\\n\\",$r[downpath]);\r\n		for($i=0;$i<count($d_record);$i++)\r\n		{\r\n			$j=$i+1;\r\n			$d_field=explode(\\"::::::\\",$d_record[$i]);\r\n			//权限\r\n			$tgroup=str_replace(\\" value=\\".$d_field[2].\\">\\",\\" value=\\".$d_field[2].\\" selected>\\",$ygroup);\r\n			//地址前缀\r\n			$tnewdownqz=str_replace(\\" value=\\\'\\".$d_field[4].\\"\\\'>\\",\\" value=\\\'\\".$d_field[4].\\"\\\' selected>\\",$newdownqz);\r\n			$downloadpath.=\\"<tr><td width=\\\'7%\\\'><div align=center>\\".$j.\\"</div></td><td width=\\\'19%\\\'><div align=left><input name=downname[] type=text id=downname[] value=\\\'\\".$d_field[0].\\"\\\' size=17></div></td><td width=\\\'40%\\\'><input name=downpath[] type=text id=downpath\\".$j.\\" value=\\\'\\".$d_field[1].\\"\\\' size=36 ondblclick=\\\\\\"SpOpenChFile(0,\\\'downpath\\".$j.\\"\\\');\\\\\\"><select name=thedownqz[]><option value=\\\'\\\'>--地址前缀--</option>\\".$tnewdownqz.\\"</select><input type=hidden name=pathid[] value=\\".$j.\\"><input type=checkbox name=delpathid[] value=\\".$j.\\">删</td><td width=\\\'21%\\\'><div align=center><select name=downuser[] id=select><option value=0>游客</option>\\".$tgroup.\\"</select></div></td><td width=\\\'13%\\\'><div align=center><input name=fen[] type=text id=fen[] value=\\\'\\".$d_field[3].\\"\\\' size=6></div></td></tr>\\";\r\n		}\r\n		$editnum=$j;\r\n		$downloadpath=\\"<table width=\\\'100%\\\' border=0 cellspacing=1 cellpadding=3>\\".$downloadpath.\\"</table>\\";\r\n	}\r\n	echo $downloadpath;\r\n    }\r\n    ?>\r\n    </td>\r\n  </tr>\r\n  <tr> \r\n    <td height=\\"25\\">下载地址扩展数量: <input name=\\"editnum\\" type=\\"hidden\\" id=\\"editnum\\" value=\\"<?=$editnum?>\\">\r\n      <input name=\\"downnum\\" type=\\"text\\" id=\\"downnum\\" value=\\"1\\" size=\\"6\\"> <input type=\\"button\\" name=\\"Submit5\\" value=\\"输出地址\\" onclick=\\"javascript:doadd();\\"></td>\r\n  </tr>\r\n  <tr> \r\n    <td id=adddown></td>\r\n  </tr>\r\n</table>\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor=\\"#FFFFFF\\"> \r\n    <td height=\\"22\\" valign=\\"top\\"><strong>[!--enews.name--]正则：</strong><br>\r\n      (\r\n      <input name=\\"textfield\\" type=\\"text\\" id=\\"textfield\\" value=\\"[!--ecmsdownpathurl--]\\" size=\\"20\\">\r\n      <br>\r\n      <input name=\\"textfield2\\" type=\\"text\\" id=\\"textfield2\\" value=\\"[!--ecmsdownpathname--]\\" size=\\"20\\">\r\n      )<br>\r\n      格式:地址正则(url)[!empirecms!]名称正则(name)</td>\r\n    <td><table width=\\"100%\\" border=\\"0\\" cellspacing=\\"1\\" cellpadding=\\"3\\">\r\n        <tr> \r\n          <td><textarea name=\\"add[zz_downpath]\\" cols=\\"60\\" rows=\\"10\\" id=\\"textarea\\"><?=htmlspecialchars(stripSlashes($r[zz_downpath]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td>地址前缀:\r\n<input name=\\"add[qz_downpath]\\" type=\\"text\\" id=\\"add[qz_downpath]\\" value=\\"<?=stripSlashes($r[qz_downpath])?>\\">\r\n        </td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'MEDIUMTEXT', '', 1, 2, 'download', 0, '', 0, 1, 1, '<input type=\\"file\\" name=\\"downpathfile\\" size=\\"45\\">\r\n', 0, '', 0, '', 1, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (25, 'softsay', '软件简介', 'textarea', '<textarea name=\\"softsay\\" cols=\\"80\\" rows=\\"10\\" id=\\"softsay\\"><?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[softsay]))?></textarea>\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--softsay--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_softsay]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_softsay]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_softsay]" type="text" id="add[z_softsay]" value="<?=stripSlashes($r[z_softsay])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'TEXT', '', 1, 2, 'download', 0, '', 0, 1, 1, '<textarea name=\\"softsay\\" cols=\\"60\\" rows=\\"10\\" id=\\"softsay\\"><?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'softsay\\\',stripSlashes($r[softsay]))?></textarea>\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 1);
INSERT INTO `phome_enewsf` VALUES (26, 'title', '标题', 'text', '<table width=\\"100%\\" border=\\"0\\" cellpadding=\\"0\\" cellspacing=\\"0\\" bgcolor=\\"#DBEAF5\\">\r\n<tr> \r\n  <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">\r\n<?=$tts?\\"<select name=\\\'ttid\\\'><option value=\\\'0\\\'>标题分类</option>$tts</select>\\":\\"\\"?>\r\n	<input type=text name=title value=\\"<?=htmlspecialchars(stripSlashes($r[title]))?>\\" size=\\"60\\"> \r\n	<input type=\\"button\\" name=\\"button\\" value=\\"图文\\" onclick=\\"document.add.title.value=document.add.title.value+\\\'(图文)\\\';\\"> \r\n  </td>\r\n</tr>\r\n<tr> \r\n  <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">属性: \r\n	<input name=\\"titlefont[b]\\" type=\\"checkbox\\" value=\\"b\\"<?=$titlefontb?>>粗体\r\n	<input name=\\"titlefont[i]\\" type=\\"checkbox\\" value=\\"i\\"<?=$titlefonti?>>斜体\r\n	<input name=\\"titlefont[s]\\" type=\\"checkbox\\" value=\\"s\\"<?=$titlefonts?>>删除线\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;颜色: <input name=\\"titlecolor\\" type=\\"text\\" value=\\"<?=stripSlashes($r[titlecolor])?>\\" size=\\"10\\"><a onclick=\\"foreColor();\\"><img src=\\"../data/images/color.gif\\" width=\\"21\\" height=\\"21\\" align=\\"absbottom\\"></a>\r\n  </td>\r\n</tr>\r\n</table>', '标题', 0, 1, 1, '  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--title--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_title]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_title]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_title]" type="text" id="add[z_title]" value="<?=stripSlashes($r[z_title])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>', 0, 'VARCHAR', '200', 1, 3, 'photo', 0, '', 0, 1, 1, '<input name=\\"title\\" type=\\"text\\" size=\\"42\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'title\\\',stripSlashes($r[title]))?>\\">', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (27, 'special.field', '特殊属性', '', '<table width=\\"100%\\" border=\\"0\\" cellpadding=\\"0\\" cellspacing=\\"0\\" bgcolor=\\"#DBEAF5\\">\r\n  <tr>\r\n    <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">信息属性: \r\n      <input name=\\"checked\\" type=\\"checkbox\\" value=\\"1\\"<?=$r[checked]?\\\' checked\\\':\\\'\\\'?>>\r\n      审核 &nbsp;&nbsp; 推荐 \r\n      <select name=\\"isgood\\" id=\\"isgood\\">\r\n        <option value=\\"0\\"<?=$r[isgood]==0?\\\' selected\\\':\\\'\\\'?>>不推荐</option>\r\n        <option value=\\"1\\"<?=$r[isgood]==1?\\\' selected\\\':\\\'\\\'?>>一级推荐</option>\r\n        <option value=\\"2\\"<?=$r[isgood]==2?\\\' selected\\\':\\\'\\\'?>>二级推荐</option>\r\n        <option value=\\"3\\"<?=$r[isgood]==3?\\\' selected\\\':\\\'\\\'?>>三级推荐</option>\r\n        <option value=\\"4\\"<?=$r[isgood]==4?\\\' selected\\\':\\\'\\\'?>>四级推荐</option>\r\n        <option value=\\"5\\"<?=$r[isgood]==5?\\\' selected\\\':\\\'\\\'?>>五级推荐</option>\r\n        <option value=\\"6\\"<?=$r[isgood]==6?\\\' selected\\\':\\\'\\\'?>>六级推荐</option>\r\n        <option value=\\"7\\"<?=$r[isgood]==7?\\\' selected\\\':\\\'\\\'?>>七级推荐</option>\r\n        <option value=\\"8\\"<?=$r[isgood]==8?\\\' selected\\\':\\\'\\\'?>>八级推荐</option>\r\n        <option value=\\"9\\"<?=$r[isgood]==9?\\\' selected\\\':\\\'\\\'?>>九级推荐</option>\r\n      </select>\r\n      &nbsp;&nbsp; 头条 \r\n      <select name=\\"firsttitle\\" id=\\"firsttitle\\">\r\n        <option value=\\"0\\"<?=$r[firsttitle]==0?\\\' selected\\\':\\\'\\\'?>>非头条</option>\r\n        <option value=\\"1\\"<?=$r[firsttitle]==1?\\\' selected\\\':\\\'\\\'?>>一级头条</option>\r\n        <option value=\\"2\\"<?=$r[firsttitle]==2?\\\' selected\\\':\\\'\\\'?>>二级头条</option>\r\n        <option value=\\"3\\"<?=$r[firsttitle]==3?\\\' selected\\\':\\\'\\\'?>>三级头条</option>\r\n        <option value=\\"4\\"<?=$r[firsttitle]==4?\\\' selected\\\':\\\'\\\'?>>四级头条</option>\r\n        <option value=\\"5\\"<?=$r[firsttitle]==5?\\\' selected\\\':\\\'\\\'?>>五级头条</option>\r\n        <option value=\\"6\\"<?=$r[firsttitle]==6?\\\' selected\\\':\\\'\\\'?>>六级头条</option>\r\n        <option value=\\"7\\"<?=$r[firsttitle]==7?\\\' selected\\\':\\\'\\\'?>>七级头条</option>\r\n        <option value=\\"8\\"<?=$r[firsttitle]==8?\\\' selected\\\':\\\'\\\'?>>八级头条</option>\r\n        <option value=\\"9\\"<?=$r[firsttitle]==9?\\\' selected\\\':\\\'\\\'?>>九级头条</option>\r\n      </select></td>\r\n  </tr>\r\n  <tr> \r\n    <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">关键字&nbsp;&nbsp;&nbsp;: \r\n      <input name=\\"keyboard\\" type=\\"text\\" size=\\"52\\" value=\\"<?=stripSlashes($r[keyboard])?>\\">\r\n      <font color=\\"#666666\\">(多个请用&quot;,&quot;隔开)</font></td>\r\n  </tr>\r\n  <tr> \r\n    <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">外部链接: \r\n      <input name=\\"titleurl\\" type=\\"text\\" value=\\"<?=stripSlashes($r[titleurl])?>\\" size=\\"52\\">\r\n      <font color=\\"#666666\\">(填写后信息连接地址将为此链接)</font></td>\r\n  </tr>\r\n</table>\r\n', '特殊属性', 0, 1, 0, '', 0, '', '', 0, 3, 'photo', 0, '', 0, 1, 1, '<input name=\\"keyboard\\" type=\\"text\\" size=\\"42\\" value=\\"<?=stripSlashes($r[keyboard])?>\\">\r\n      <font color=\\"#666666\\">(多个请用&quot;,&quot;隔开)</font>', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (28, 'titlepic', '标题图片', 'img', '\r\n<input name=\\"titlepic\\" type=\\"text\\" id=\\"titlepic\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[titlepic]))?>\\" size=\\"45\\">\r\n<a onclick=\\"window.open(\\\'ecmseditor/FileMain.php?type=1&classid=<?=$classid?>&filepass=<?=$filepass?>&doing=1&field=titlepic\\\',\\\'\\\',\\\'width=700,height=550,scrollbars=yes\\\');\\" title=\\"选择已上传的图片\\"><img src=\\"../data/images/changeimg.gif\\" border=\\"0\\" align=\\"absbottom\\"></a> \r\n', '标题图片', 0, 1, 1, '\r\n  <tr bgcolor=\\"#FFFFFF\\"> \r\n    <td height=\\"22\\" valign=\\"top\\"><strong>[!--enews.name--]正则：</strong><br>\r\n      ( \r\n      <input name=\\"textfield\\" type=\\"text\\" id=\\"textfield\\" value=\\"[!--titlepic--]\\" size=\\"20\\">\r\n      )</td>\r\n    <td><table width=\\"100%\\" border=\\"0\\" cellspacing=\\"1\\" cellpadding=\\"3\\">\r\n    <tr>\r\n      <td>附件前缀 \r\n        <input name=\\"add[qz_titlepic]\\" type=\\"text\\" id=\\"add[qz_titlepic]\\" value=\\"<?=stripSlashes($r[qz_titlepic])?>\\"> \r\n        <input name=\\"add[save_titlepic]\\" type=\\"checkbox\\" id=\\"add[save_titlepic]\\" value=\\" checked\\"<?=$r[save_titlepic]?>>\r\n        远程保存 </td>\r\n    </tr>\r\n    <tr> \r\n      <td><textarea name=\\"add[zz_titlepic]\\" cols=\\"60\\" rows=\\"10\\" id=\\"add[zz_titlepic]\\"><?=htmlspecialchars(stripSlashes($r[zz_titlepic]))?></textarea></td>\r\n    </tr>\r\n    <tr> \r\n      <td><input name=\\"add[z_titlepic]\\" type=\\"text\\" id=\\"titlepic5\\" value=\\"<?=stripSlashes($r[z_titlepic])?>\\">\r\n        (如填写这里，这就是字段的值)</td>\r\n    </tr>\r\n  </table></td>\r\n  </tr>\r\n', 2, 'VARCHAR', '200', 1, 3, 'photo', 0, '', 0, 1, 1, '\r\n<input type=\\"file\\" name=\\"titlepicfile\\" size=\\"45\\">\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (29, 'newstime', '发布时间', 'text', '<input name=\\"newstime\\" type=\\"text\\" value=\\"<?=$r[newstime]?>\\"><input type=button name=button value=\\"设为当前时间\\" onclick=\\"document.add.newstime.value=\\\'<?=$todaytime?>\\\'\\">', '发布时间', 0, 1, 1, '  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--newstime--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_newstime]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_newstime]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_newstime]" type="text" id="add[z_newstime]" value="<?=stripSlashes($r[z_newstime])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>', 0, 'INT', '10', 1, 3, 'photo', 0, '', 0, 1, 1, '', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (30, 'filesize', '文件大小', 'text', '<input name=\\"filesize\\" type=\\"text\\" size=60 id=\\"filesize\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[filesize]))?>\\">\r\n<select name=\\"select\\" onchange=\\"document.add.filesize.value+=this.value\\">\r\n        <option value=\\"\\">单位</option>\r\n        <option value=\\" MB\\">MB</option>\r\n        <option value=\\" KB\\">KB</option>\r\n        <option value=\\" GB\\">GB</option>\r\n        <option value=\\" BYTES\\">BYTES</option>\r\n      </select>', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--filesize--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_filesize]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_filesize]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_filesize]" type="text" id="add[z_filesize]" value="<?=stripSlashes($r[z_filesize])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'VARCHAR', '10', 1, 3, 'photo', 0, '', 0, 1, 1, '<input name=\\"filesize\\" type=\\"text\\" size=\\"42\\" id=\\"filesize\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'filesize\\\',stripSlashes($r[filesize]))?>\\">\r\n<select name=\\"select\\" onchange=\\"document.add.filesize.value+=this.value\\">\r\n        <option value=\\"\\">单位</option>\r\n        <option value=\\" MB\\">MB</option>\r\n        <option value=\\" KB\\">KB</option>\r\n        <option value=\\" GB\\">GB</option>\r\n        <option value=\\" BYTES\\">BYTES</option>\r\n      </select>', 0, '', 0, '', 1, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (31, 'picsize', '图片尺寸', 'text', '<input name=\\"picsize\\" type=\\"text\\" id=\\"picsize\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[picsize]))?>\\">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--picsize--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_picsize]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_picsize]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_picsize]" type="text" id="add[z_picsize]" value="<?=stripSlashes($r[z_picsize])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'VARCHAR', '20', 1, 3, 'photo', 0, '', 0, 1, 1, '<input name=\\"picsize\\" type=\\"text\\" size=\\"42\\" id=\\"picsize\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'picsize\\\',stripSlashes($r[picsize]))?>\\">\r\n', 0, '', 0, '', 1, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (32, 'picfbl', '图片分辨率', 'text', '<input name=\\"picfbl\\" type=\\"text\\" id=\\"picfbl\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[picfbl]))?>\\">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--picfbl--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_picfbl]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_picfbl]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_picfbl]" type="text" id="add[z_picfbl]" value="<?=stripSlashes($r[z_picfbl])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'VARCHAR', '20', 1, 3, 'photo', 0, '', 0, 1, 1, '<input name=\\"picfbl\\" type=\\"text\\" size=\\"42\\" id=\\"picfbl\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'picfbl\\\',stripSlashes($r[picfbl]))?>\\">\r\n', 0, '', 0, '', 1, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (33, 'picfrom', '来源', 'text', '<input name=\\"picfrom\\" type=\\"text\\" size=60 id=\\"picfrom\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[picfrom]))?>\\">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--picfrom--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_picfrom]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_picfrom]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_picfrom]" type="text" id="add[z_picfrom]" value="<?=stripSlashes($r[z_picfrom])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'VARCHAR', '120', 1, 3, 'photo', 0, '', 0, 1, 1, '<input name=\\"picfrom\\" type=\\"text\\" size=\\"42\\" id=\\"picfrom\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'picfrom\\\',stripSlashes($r[picfrom]))?>\\">\r\n', 0, '', 0, '', 1, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (34, 'picurl', '图片大图', 'img', '\r\n<input name=\\"picurl\\" type=\\"text\\" id=\\"picurl\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[picurl]))?>\\" size=\\"45\\">\r\n<a onclick=\\"window.open(\\\'ecmseditor/FileMain.php?type=1&classid=<?=$classid?>&filepass=<?=$filepass?>&doing=1&field=picurl\\\',\\\'\\\',\\\'width=700,height=550,scrollbars=yes\\\');\\" title=\\"选择已上传的图片\\"><img src=\\"../data/images/changeimg.gif\\" border=\\"0\\" align=\\"absbottom\\"></a> \r\n', '', 1, 1, 1, '\r\n  <tr bgcolor=\\"#FFFFFF\\"> \r\n    <td height=\\"22\\" valign=\\"top\\"><strong>[!--enews.name--]正则：</strong><br>\r\n      ( \r\n      <input name=\\"textfield\\" type=\\"text\\" id=\\"textfield\\" value=\\"[!--picurl--]\\" size=\\"20\\">\r\n      )</td>\r\n    <td><table width=\\"100%\\" border=\\"0\\" cellspacing=\\"1\\" cellpadding=\\"3\\">\r\n    <tr>\r\n      <td>附件前缀 \r\n        <input name=\\"add[qz_picurl]\\" type=\\"text\\" id=\\"add[qz_picurl]\\" value=\\"<?=stripSlashes($r[qz_picurl])?>\\"> \r\n        <input name=\\"add[save_picurl]\\" type=\\"checkbox\\" id=\\"add[save_picurl]\\" value=\\" checked\\"<?=$r[save_picurl]?>>\r\n        远程保存 </td>\r\n    </tr>\r\n    <tr> \r\n      <td><textarea name=\\"add[zz_picurl]\\" cols=\\"60\\" rows=\\"10\\" id=\\"add[zz_picurl]\\"><?=htmlspecialchars(stripSlashes($r[zz_picurl]))?></textarea></td>\r\n    </tr>\r\n    <tr> \r\n      <td><input name=\\"add[z_picurl]\\" type=\\"text\\" id=\\"picurl5\\" value=\\"<?=stripSlashes($r[z_picurl])?>\\">\r\n        (如填写这里，这就是字段的值)</td>\r\n    </tr>\r\n  </table></td>\r\n  </tr>\r\n', 2, 'VARCHAR', '200', 1, 3, 'photo', 0, '', 0, 1, 1, '\r\n<input type=\\"file\\" name=\\"picurlfile\\" size=\\"45\\">\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (35, 'morepic', '图片集', 'text', '<script>\r\nfunction dopicadd()\r\n{var i;\r\nvar str=\\"\\";\r\nvar oldi=0;\r\nvar j=0;\r\noldi=parseInt(document.add.morepicnum.value);\r\nfor(i=1;i<=document.add.downmorepicnum.value;i++)\r\n{\r\nj=i+oldi;\r\nstr=str+\\"<tr><td width=7%><div align=center>\\"+j+\\"</div></td><td width=33%><div align=center><input name=msmallpic[] type=text size=28 id=msmallpic\\"+j+\\" ondblclick=SpOpenChFile(1,\\\'msmallpic\\"+j+\\"\\\')><br><input type=file name=msmallpfile[] size=15></div></td><td width=30%><div align=center><input name=mbigpic[] type=text size=28 id=mbigpic\\"+j+\\" ondblclick=SpOpenChFile(1,\\\'mbigpic\\"+j+\\"\\\')><br><input type=file name=mbigpfile[] size=15></div></td><td width=30%><div align=center><input name=mpicname[] type=text></div></td></tr>\\";\r\n}\r\ndocument.getElementById(\\"addpicdown\\").innerHTML=\\"<table width=\\\'100%\\\' border=0 cellspacing=1 cellpadding=3>\\"+str+\\"</table>\\";\r\n}\r\n</script>\r\n<table width=\\"100%\\" border=\\"0\\" cellspacing=\\"0\\" cellpadding=\\"0\\">\r\n  <tr>\r\n    <td height=\\"25\\">\r\n	图片地址前缀:\r\n      <input name=\\"mpicurl_qz\\" type=\\"text\\" id=\\"mpicurl_qz\\">&nbsp;&nbsp;\r\n	  <input type=\\"checkbox\\" name=\\"msavepic\\" value=\\"1\\">远程保存&nbsp;<input type=\\"checkbox\\" name=\\"mcreatespic\\" value=\\"1\\" onclick=\\"if(this.checked){setmcreatespic.style.display=\\\'\\\';}else{setmcreatespic.style.display=\\\'none\\\';}\\">生成缩图\r\n	  <span id=\\"setmcreatespic\\" style=\\"display=none\\">：<input type=text name=\\"mcreatespicwidth\\" size=4 value=\\"<?=$public_r[spicwidth]?>\\">*<input type=text name=\\"mcreatespicheight\\" size=4 value=\\"<?=$public_r[spicheight]?>\\">(宽*高)</span>\r\n </td>\r\n  </tr>\r\n  <tr> \r\n    <td><table width=\\"100%\\" border=0 align=center cellpadding=3 cellspacing=1>\r\n  <tr bgcolor=\\"#DBEAF5\\"> \r\n    <td width=\\"7%\\"><div align=center>编号</div></td>\r\n    <td width=\\"33%\\"><div align=center>缩图 <font color=\\"#666666\\">(双击选择)</font></div></td>\r\n    <td width=\\"30%\\"><div align=center>大图 <font color=\\"#666666\\">(双击选择)</font></div></td>\r\n    <td width=\\"30%\\"><div align=center>图片说明</div></td>\r\n  </tr>\r\n</table></td>\r\n  </tr>\r\n  <tr> \r\n    <td>\r\n    <?php\r\n    if($ecmsfirstpost==1)\r\n    {\r\n	?>\r\n	<table width=\\\'100%\\\' border=0 align=center cellpadding=3 cellspacing=1>\r\n	<?php\r\n	$morepicnum=3;\r\n	for($mppathi=1;$mppathi<=$morepicnum;$mppathi++)\r\n	{\r\n	?>\r\n	<tr> \r\n		<td width=\\\'7%\\\'><div align=center><?=$mppathi?></div></td>\r\n		<td width=\\\'33%\\\'><div align=center>\r\n		<input name=msmallpic[] type=text id=\\\'msmallpic<?=$mppathi?>\\\' size=28 ondblclick=\\"SpOpenChFile(1,\\\'msmallpic<?=$mppathi?>\\\');\\">\r\n		<br><input type=file name=msmallpfile[] size=15>\r\n		</div></td>\r\n		<td width=\\\'30%\\\'><div align=center>\r\n		<input name=mbigpic[] type=text id=\\\'mbigpic<?=$mppathi?>\\\' size=28 ondblclick=\\"SpOpenChFile(1,\\\'mbigpic<?=$mppathi?>\\\');\\">\r\n		<br><input type=file name=mbigpfile[] size=15>\r\n		</div></td>\r\n		<td width=\\\'30%\\\'><div align=center>\r\n		<input name=mpicname[] type=text id=\\\'mpicname<?=$mppathi?>\\\'>\r\n		</div></td>\r\n	</tr>\r\n	<?php\r\n	}\r\n	?>\r\n	</table>\r\n	<?php\r\n    }\r\n    else\r\n    {\r\n	$morepicpath=\\"\\";\r\n	$morepicnum=0;\r\n	if($r[morepic])\r\n    	{\r\n    		$r[morepic]=stripSlashes($r[morepic]);\r\n    		//地址\r\n    		$j=0;\r\n    		$pd_record=explode(\\"\\\\r\\\\n\\",$r[morepic]);\r\n    		for($i=0;$i<count($pd_record);$i++)\r\n    		{\r\n			$j=$i+1;\r\n    			$pd_field=explode(\\"::::::\\",$pd_record[$i]);\r\n			$morepicpath.=\\"<tr> \r\n    <td width=\\\'7%\\\'><div align=center>\\".$j.\\"</div></td>\r\n    <td width=\\\'33%\\\'><div align=center>\r\n        <input name=msmallpic[] type=text value=\\\'\\".$pd_field[0].\\"\\\' size=28 id=msmallpic\\".$j.\\" ondblclick=\\\\\\"SpOpenChFile(1,\\\'msmallpic\\".$j.\\"\\\');\\\\\\">\r\n		<br><input type=file name=msmallpfile[] size=15>\r\n      </div></td>\r\n    <td width=\\\'30%\\\'><div align=center>\r\n        <input name=mbigpic[] type=text value=\\\'\\".$pd_field[1].\\"\\\' size=28 id=mbigpic\\".$j.\\" ondblclick=\\\\\\"SpOpenChFile(1,\\\'mbigpic\\".$j.\\"\\\');\\\\\\">\r\n		<br><input type=file name=mbigpfile[] size=15>\r\n      </div></td>\r\n    <td width=\\\'30%\\\'><div align=center>\r\n        <input name=mpicname[] type=text value=\\\'\\".$pd_field[2].\\"\\\'><input type=hidden name=mpicid[] value=\\".$j.\\"><input type=checkbox name=mdelpicid[] value=\\".$j.\\">删\r\n      </div></td>\r\n  </tr>\\";\r\n    		}\r\n    		$morepicnum=$j;\r\n    		$morepicpath=\\"<table width=\\\'100%\\\' border=0 cellspacing=1 cellpadding=3>\\".$morepicpath.\\"</table>\\";\r\n    	}\r\n	echo $morepicpath;\r\n    }\r\n    ?>\r\n    </td>\r\n  </tr>\r\n  <tr> \r\n    <td height=\\"25\\">地址扩展数量: <input name=\\"morepicnum\\" type=\\"hidden\\" id=\\"morepicnum\\" value=\\"<?=$morepicnum?>\\">\r\n      <input name=\\"downmorepicnum\\" type=\\"text\\" value=\\"1\\" size=\\"6\\"> <input type=\\"button\\" name=\\"Submit5\\" value=\\"输出地址\\" onclick=\\"javascript:dopicadd();\\"></td>\r\n  </tr>\r\n  <tr> \r\n    <td id=addpicdown></td>\r\n  </tr>\r\n</table>\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor=\\"#FFFFFF\\"> \r\n    <td height=\\"22\\" valign=\\"top\\"><strong>[!--enews.name--]正则：</strong><br>\r\n      (\r\n      <input name=\\"textfield\\" type=\\"text\\" id=\\"textfield\\" value=\\"[!--ecmsspicurl--]\\" size=\\"20\\">\r\n      <br>\r\n      <input name=\\"textfield2\\" type=\\"text\\" id=\\"textfield2\\" value=\\"[!--ecmsbpicurl--]\\" size=\\"20\\">\r\n	  <br>\r\n      <input name=\\"textfield2\\" type=\\"text\\" id=\\"textfield2\\" value=\\"[!--ecmspicname--]\\" size=\\"20\\">\r\n      )<br>\r\n      格式:缩略图[!empirecms!]大图[!empirecms!]名称</td>\r\n    <td><table width=\\"100%\\" border=\\"0\\" cellspacing=\\"1\\" cellpadding=\\"3\\">\r\n        <tr> \r\n          <td><textarea name=\\"add[zz_morepic]\\" cols=\\"60\\" rows=\\"10\\" id=\\"textarea\\"><?=htmlspecialchars(stripSlashes($r[zz_morepic]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td>地址前缀:\r\n<input name=\\"add[qz_morepic]\\" type=\\"text\\" id=\\"add[qz_morepic]\\" value=\\"<?=stripSlashes($r[qz_morepic])?>\\">\r\n<input name=\\"add[save_morepic]\\" type=\\"checkbox\\" id=\\"add[save_morepic]\\" value=\\" checked\\"<?=$r[save_morepic]?>>\r\n        远程保存\r\n        </td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 2, 'MEDIUMTEXT', '', 1, 3, 'photo', 0, '', 0, 1, 1, '<script>\r\nfunction dopicadd()\r\n{var i;\r\nvar str=\\"\\";\r\nvar oldi=0;\r\nvar j=0;\r\noldi=parseInt(document.add.morepicnum.value);\r\nfor(i=1;i<=document.add.downmorepicnum.value;i++)\r\n{\r\nj=i+oldi;\r\nstr=str+\\"<tr><td width=7%><div align=center>\\"+j+\\"</div></td><td width=33%><div align=center><input name=msmallpic[] type=text size=28 id=msmallpic\\"+j+\\"></div></td><td width=30%><div align=center><input name=mbigpic[] type=text size=28 id=mbigpic\\"+j+\\"></div></td><td width=30%><div align=center><input name=mpicname[] type=text></div></td></tr>\\";\r\n}\r\ndocument.getElementById(\\"addpicdown\\").innerHTML=\\"<table width=\\\'100%\\\' border=0 cellspacing=1 cellpadding=3>\\"+str+\\"</table>\\";\r\n}\r\n</script>\r\n<table width=\\"100%\\" border=\\"0\\" cellspacing=\\"0\\" cellpadding=\\"0\\">\r\n  <tr>\r\n    <td height=\\"25\\">\r\n	图片地址前缀:\r\n      <input name=\\"mpicurl_qz\\" type=\\"text\\" id=\\"mpicurl_qz\\" size=\\"32\\">\r\n      &nbsp;</td>\r\n  </tr>\r\n  <tr> \r\n    <td><table width=100% border=0 align=center cellpadding=3 cellspacing=1>\r\n  <tr bgcolor=\\\'#DBEAF5\\\'> \r\n    <td width=7%><div align=center>编号</div></td>\r\n    <td width=33%><div align=center>缩图</div></td>\r\n    <td width=30%><div align=center>大图</div></td>\r\n    <td width=30%><div align=center>图片说明</div></td>\r\n  </tr>\r\n</table></td>\r\n  </tr>\r\n  <tr> \r\n    <td> \r\n    <?php\r\n    if($ecmsfirstpost==1)\r\n    {\r\n	?>\r\n	<table width=\\\'100%\\\' border=0 align=center cellpadding=3 cellspacing=1>\r\n	<?php\r\n	$morepicnum=3;\r\n	for($mppathi=1;$mppathi<=$morepicnum;$mppathi++)\r\n	{\r\n	?>\r\n	<tr> \r\n		<td width=\\\'7%\\\'><div align=center><?=$mppathi?></div></td>\r\n		<td width=\\\'33%\\\'><div align=center>\r\n		<input name=msmallpic[] type=text id=msmallpic[] size=28>\r\n		</div></td>\r\n		<td width=\\\'30%\\\'><div align=center>\r\n		<input name=mbigpic[] type=text id=mbigpic[] size=28>\r\n		</div></td>\r\n		<td width=\\\'30%\\\'><div align=center>\r\n		<input name=mpicname[] type=text id=mpicname[]>\r\n		</div></td>\r\n	</tr>\r\n	<?php\r\n	}\r\n	?>\r\n	</table>\r\n	<?php\r\n    }\r\n    else\r\n    {\r\n	$morepicpath=\\"\\";\r\n	$morepicnum=0;\r\n	if($r[morepic])\r\n	{\r\n		$r[morepic]=stripSlashes($r[morepic]);\r\n		//地址\r\n		$j=0;\r\n		$pd_record=explode(\\"\\\\r\\\\n\\",$r[morepic]);\r\n		for($i=0;$i<count($pd_record);$i++)\r\n		{\r\n			$j=$i+1;\r\n			$pd_field=explode(\\"::::::\\",$pd_record[$i]);\r\n			$morepicpath.=\\"<tr> \r\n	<td width=\\\'7%\\\'><div align=center>\\".$j.\\"</div></td>\r\n    <td width=\\\'33%\\\'><div align=center>\r\n        <input name=msmallpic[] type=text value=\\\'\\".$pd_field[0].\\"\\\' size=28>\r\n      </div></td>\r\n    <td width=\\\'30%\\\'><div align=center>\r\n        <input name=mbigpic[] type=text value=\\\'\\".$pd_field[1].\\"\\\' size=28>\r\n      </div></td>\r\n    <td width=\\\'30%\\\'><div align=center>\r\n        <input name=mpicname[] type=text value=\\\'\\".$pd_field[2].\\"\\\'><input type=hidden name=mpicid[] value=\\".$j.\\"><input type=checkbox name=mdelpicid[] value=\\".$j.\\">删\r\n      </div></td></tr>\\";\r\n		}\r\n		$morepicnum=$j;\r\n		$morepicpath=\\"<table width=\\\'100%\\\' border=0 cellspacing=1 cellpadding=3>\\".$morepicpath.\\"</table>\\";\r\n	}\r\n	echo $morepicpath;\r\n    }\r\n    ?>\r\n    </td>\r\n  </tr>\r\n  <tr> \r\n    <td height=\\"25\\">地址扩展数量: <input name=\\"morepicnum\\" type=\\"hidden\\" id=\\"morepicnum\\" value=\\"<?=$morepicnum?>\\">\r\n      <input name=\\"downmorepicnum\\" type=\\"text\\" value=\\"1\\" size=\\"6\\"> <input type=\\"button\\" name=\\"Submit5\\" value=\\"输出地址\\" onclick=\\"javascript:dopicadd();\\"></td>\r\n  </tr>\r\n  <tr> \r\n    <td id=addpicdown></td>\r\n  </tr>\r\n</table>\r\n', 0, '', 0, '', 1, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (36, 'num', '每行显示条数', 'text', '<input name=\\"num\\" type=\\"text\\" size=3 id=\\"num\\" value=\\"<?=$ecmsfirstpost==1?\\"3\\":htmlspecialchars(stripSlashes($r[num]))?>\\">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--num--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_num]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_num]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_num]" type="text" id="add[z_num]" value="<?=stripSlashes($r[z_num])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 2, 'TINYINT', '', 1, 3, 'photo', 0, '3', 0, 1, 1, '<input name=\\"num\\" type=\\"text\\" size=3 id=\\"num\\" value=\\"<?=$ecmsfirstpost==1?\\"3\\":DoReqValue($mid,\\\'num\\\',stripSlashes($r[num]))?>\\">\r\n', 0, '', 0, '', 1, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (37, 'width', '缩图宽度', 'text', '<input name=\\"width\\" type=\\"text\\" size=6 id=\\"width\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[width]))?>\\">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--width--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_width]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_width]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_width]" type="text" id="add[z_width]" value="<?=stripSlashes($r[z_width])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 2, 'VARCHAR', '12', 1, 3, 'photo', 0, '', 0, 1, 1, '<input name=\\"width\\" type=\\"text\\" size=6 id=\\"width\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'width\\\',stripSlashes($r[width]))?>\\">\r\n', 0, '', 0, '', 1, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (38, 'height', '缩图高度', 'text', '<input name=\\"height\\" type=\\"text\\" size=6 id=\\"height\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[height]))?>\\">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--height--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_height]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_height]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_height]" type="text" id="add[z_height]" value="<?=stripSlashes($r[z_height])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 2, 'VARCHAR', '12', 1, 3, 'photo', 0, '', 0, 1, 1, '<input name=\\"height\\" type=\\"text\\" size=6 id=\\"height\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'height\\\',stripSlashes($r[height]))?>\\">\r\n', 0, '', 0, '', 1, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (39, 'picsay', '图片简介', 'textarea', '<textarea name=\\"picsay\\" cols=\\"80\\" rows=\\"10\\" id=\\"picsay\\"><?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[picsay]))?></textarea>\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--picsay--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_picsay]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_picsay]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_picsay]" type="text" id="add[z_picsay]" value="<?=stripSlashes($r[z_picsay])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 2, 'TEXT', '', 1, 3, 'photo', 0, '', 0, 1, 1, '<textarea name=\\"picsay\\" cols=\\"60\\" rows=\\"10\\" id=\\"picsay\\"><?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'picsay\\\',stripSlashes($r[picsay]))?></textarea>\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 1);
INSERT INTO `phome_enewsf` VALUES (40, 'title', '标题', 'text', '<table width=\\"100%\\" border=\\"0\\" cellpadding=\\"0\\" cellspacing=\\"0\\" bgcolor=\\"#DBEAF5\\">\r\n<tr> \r\n  <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">\r\n<?=$tts?\\"<select name=\\\'ttid\\\'><option value=\\\'0\\\'>标题分类</option>$tts</select>\\":\\"\\"?>\r\n	<input type=text name=title value=\\"<?=htmlspecialchars(stripSlashes($r[title]))?>\\" size=\\"60\\"> \r\n	<input type=\\"button\\" name=\\"button\\" value=\\"图文\\" onclick=\\"document.add.title.value=document.add.title.value+\\\'(图文)\\\';\\"> \r\n  </td>\r\n</tr>\r\n<tr> \r\n  <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">属性: \r\n	<input name=\\"titlefont[b]\\" type=\\"checkbox\\" value=\\"b\\"<?=$titlefontb?>>粗体\r\n	<input name=\\"titlefont[i]\\" type=\\"checkbox\\" value=\\"i\\"<?=$titlefonti?>>斜体\r\n	<input name=\\"titlefont[s]\\" type=\\"checkbox\\" value=\\"s\\"<?=$titlefonts?>>删除线\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;颜色: <input name=\\"titlecolor\\" type=\\"text\\" value=\\"<?=stripSlashes($r[titlecolor])?>\\" size=\\"10\\"><a onclick=\\"foreColor();\\"><img src=\\"../data/images/color.gif\\" width=\\"21\\" height=\\"21\\" align=\\"absbottom\\"></a>\r\n  </td>\r\n</tr>\r\n</table>', '标题', 0, 1, 1, '  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--title--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_title]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_title]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_title]" type="text" id="add[z_title]" value="<?=stripSlashes($r[z_title])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>', 0, 'VARCHAR', '200', 1, 4, 'flash', 0, '', 0, 1, 1, '<input name=\\"title\\" type=\\"text\\" size=\\"42\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'title\\\',stripSlashes($r[title]))?>\\">', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (41, 'special.field', '特殊属性', '', '<table width=\\"100%\\" border=\\"0\\" cellpadding=\\"0\\" cellspacing=\\"0\\" bgcolor=\\"#DBEAF5\\">\r\n  <tr>\r\n    <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">信息属性: \r\n      <input name=\\"checked\\" type=\\"checkbox\\" value=\\"1\\"<?=$r[checked]?\\\' checked\\\':\\\'\\\'?>>\r\n      审核 &nbsp;&nbsp; 推荐 \r\n      <select name=\\"isgood\\" id=\\"isgood\\">\r\n        <option value=\\"0\\"<?=$r[isgood]==0?\\\' selected\\\':\\\'\\\'?>>不推荐</option>\r\n        <option value=\\"1\\"<?=$r[isgood]==1?\\\' selected\\\':\\\'\\\'?>>一级推荐</option>\r\n        <option value=\\"2\\"<?=$r[isgood]==2?\\\' selected\\\':\\\'\\\'?>>二级推荐</option>\r\n        <option value=\\"3\\"<?=$r[isgood]==3?\\\' selected\\\':\\\'\\\'?>>三级推荐</option>\r\n        <option value=\\"4\\"<?=$r[isgood]==4?\\\' selected\\\':\\\'\\\'?>>四级推荐</option>\r\n        <option value=\\"5\\"<?=$r[isgood]==5?\\\' selected\\\':\\\'\\\'?>>五级推荐</option>\r\n        <option value=\\"6\\"<?=$r[isgood]==6?\\\' selected\\\':\\\'\\\'?>>六级推荐</option>\r\n        <option value=\\"7\\"<?=$r[isgood]==7?\\\' selected\\\':\\\'\\\'?>>七级推荐</option>\r\n        <option value=\\"8\\"<?=$r[isgood]==8?\\\' selected\\\':\\\'\\\'?>>八级推荐</option>\r\n        <option value=\\"9\\"<?=$r[isgood]==9?\\\' selected\\\':\\\'\\\'?>>九级推荐</option>\r\n      </select>\r\n      &nbsp;&nbsp; 头条 \r\n      <select name=\\"firsttitle\\" id=\\"firsttitle\\">\r\n        <option value=\\"0\\"<?=$r[firsttitle]==0?\\\' selected\\\':\\\'\\\'?>>非头条</option>\r\n        <option value=\\"1\\"<?=$r[firsttitle]==1?\\\' selected\\\':\\\'\\\'?>>一级头条</option>\r\n        <option value=\\"2\\"<?=$r[firsttitle]==2?\\\' selected\\\':\\\'\\\'?>>二级头条</option>\r\n        <option value=\\"3\\"<?=$r[firsttitle]==3?\\\' selected\\\':\\\'\\\'?>>三级头条</option>\r\n        <option value=\\"4\\"<?=$r[firsttitle]==4?\\\' selected\\\':\\\'\\\'?>>四级头条</option>\r\n        <option value=\\"5\\"<?=$r[firsttitle]==5?\\\' selected\\\':\\\'\\\'?>>五级头条</option>\r\n        <option value=\\"6\\"<?=$r[firsttitle]==6?\\\' selected\\\':\\\'\\\'?>>六级头条</option>\r\n        <option value=\\"7\\"<?=$r[firsttitle]==7?\\\' selected\\\':\\\'\\\'?>>七级头条</option>\r\n        <option value=\\"8\\"<?=$r[firsttitle]==8?\\\' selected\\\':\\\'\\\'?>>八级头条</option>\r\n        <option value=\\"9\\"<?=$r[firsttitle]==9?\\\' selected\\\':\\\'\\\'?>>九级头条</option>\r\n      </select></td>\r\n  </tr>\r\n  <tr> \r\n    <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">关键字&nbsp;&nbsp;&nbsp;: \r\n      <input name=\\"keyboard\\" type=\\"text\\" size=\\"52\\" value=\\"<?=stripSlashes($r[keyboard])?>\\">\r\n      <font color=\\"#666666\\">(多个请用&quot;,&quot;隔开)</font></td>\r\n  </tr>\r\n  <tr> \r\n    <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">外部链接: \r\n      <input name=\\"titleurl\\" type=\\"text\\" value=\\"<?=stripSlashes($r[titleurl])?>\\" size=\\"52\\">\r\n      <font color=\\"#666666\\">(填写后信息连接地址将为此链接)</font></td>\r\n  </tr>\r\n</table>\r\n', '特殊属性', 0, 1, 0, '', 0, '', '', 0, 4, 'flash', 0, '', 0, 1, 1, '<input name=\\"keyboard\\" type=\\"text\\" size=42 value=\\"<?=stripSlashes($r[keyboard])?>\\">\r\n      <font color=\\"#666666\\">(多个请用&quot;,&quot;隔开)</font>', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (42, 'titlepic', '标题图片', 'img', '\r\n<input name=\\"titlepic\\" type=\\"text\\" id=\\"titlepic\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[titlepic]))?>\\" size=\\"45\\">\r\n<a onclick=\\"window.open(\\\'ecmseditor/FileMain.php?type=1&classid=<?=$classid?>&filepass=<?=$filepass?>&doing=1&field=titlepic\\\',\\\'\\\',\\\'width=700,height=550,scrollbars=yes\\\');\\" title=\\"选择已上传的图片\\"><img src=\\"../data/images/changeimg.gif\\" border=\\"0\\" align=\\"absbottom\\"></a> \r\n', '标题图片', 0, 1, 1, '\r\n  <tr bgcolor=\\"#FFFFFF\\"> \r\n    <td height=\\"22\\" valign=\\"top\\"><strong>[!--enews.name--]正则：</strong><br>\r\n      ( \r\n      <input name=\\"textfield\\" type=\\"text\\" id=\\"textfield\\" value=\\"[!--titlepic--]\\" size=\\"20\\">\r\n      )</td>\r\n    <td><table width=\\"100%\\" border=\\"0\\" cellspacing=\\"1\\" cellpadding=\\"3\\">\r\n    <tr>\r\n      <td>附件前缀 \r\n        <input name=\\"add[qz_titlepic]\\" type=\\"text\\" id=\\"add[qz_titlepic]\\" value=\\"<?=stripSlashes($r[qz_titlepic])?>\\"> \r\n        <input name=\\"add[save_titlepic]\\" type=\\"checkbox\\" id=\\"add[save_titlepic]\\" value=\\" checked\\"<?=$r[save_titlepic]?>>\r\n        远程保存 </td>\r\n    </tr>\r\n    <tr> \r\n      <td><textarea name=\\"add[zz_titlepic]\\" cols=\\"60\\" rows=\\"10\\" id=\\"add[zz_titlepic]\\"><?=htmlspecialchars(stripSlashes($r[zz_titlepic]))?></textarea></td>\r\n    </tr>\r\n    <tr> \r\n      <td><input name=\\"add[z_titlepic]\\" type=\\"text\\" id=\\"titlepic5\\" value=\\"<?=stripSlashes($r[z_titlepic])?>\\">\r\n        (如填写这里，这就是字段的值)</td>\r\n    </tr>\r\n  </table></td>\r\n  </tr>\r\n', 1, 'VARCHAR', '200', 1, 4, 'flash', 0, '', 0, 1, 1, '\r\n<input type=\\"file\\" name=\\"titlepicfile\\" size=\\"45\\">\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (43, 'newstime', '发布时间', 'text', '<input name=\\"newstime\\" type=\\"text\\" value=\\"<?=$r[newstime]?>\\"><input type=button name=button value=\\"设为当前时间\\" onclick=\\"document.add.newstime.value=\\\'<?=$todaytime?>\\\'\\">', '发布时间', 0, 1, 1, '  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--newstime--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_newstime]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_newstime]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_newstime]" type="text" id="add[z_newstime]" value="<?=stripSlashes($r[z_newstime])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>', 0, 'INT', '10', 1, 4, 'flash', 0, '', 0, 1, 1, '', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (44, 'flashwriter', '作者', 'text', '<input name=\\"flashwriter\\" type=\\"text\\" size=60 id=\\"flashwriter\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[flashwriter]))?>\\">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--flashwriter--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_flashwriter]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_flashwriter]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_flashwriter]" type="text" id="add[z_flashwriter]" value="<?=stripSlashes($r[z_flashwriter])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'VARCHAR', '30', 1, 4, 'flash', 0, '', 0, 1, 1, '<input name=\\"flashwriter\\" type=\\"text\\" size=42 id=\\"flashwriter\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'flashwriter\\\',stripSlashes($r[flashwriter]))?>\\">\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (45, 'email', '作者邮箱', 'text', '<input name=\\"email\\" type=\\"text\\" size=60 id=\\"email\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[email]))?>\\">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--email--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_email]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_email]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_email]" type="text" id="add[z_email]" value="<?=stripSlashes($r[z_email])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'VARCHAR', '80', 1, 4, 'flash', 0, '', 0, 1, 1, '<input name=\\"email\\" type=\\"text\\" size=42 id=\\"email\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'email\\\',stripSlashes($r[email]))?>\\">\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (46, 'star', '作品等级', 'select', '<select name=\\"star\\" id=\\"star\\"><option value=\\"1\\"<?=$r[star]==\\"1\\"?\\\' selected\\\':\\\'\\\'?>>1星</option><option value=\\"2\\"<?=$r[star]==\\"2\\"||$ecmsfirstpost==1?\\\' selected\\\':\\\'\\\'?>>2星</option><option value=\\"3\\"<?=$r[star]==\\"3\\"?\\\' selected\\\':\\\'\\\'?>>3星</option><option value=\\"4\\"<?=$r[star]==\\"4\\"?\\\' selected\\\':\\\'\\\'?>>4星</option><option value=\\"5\\"<?=$r[star]==\\"5\\"?\\\' selected\\\':\\\'\\\'?>>5星</option></select>', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--star--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_star]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_star]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_star]" type="text" id="add[z_star]" value="<?=stripSlashes($r[z_star])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'TINYINT', '1', 1, 4, 'flash', 0, '1|2:default|3|4|5', 0, 1, 1, '<select name=\\"star\\" id=\\"star\\"><option value=\\"1\\"<?=$r[star]==\\"1\\"?\\\' selected\\\':\\\'\\\'?>>1星</option><option value=\\"2\\"<?=$r[star]==\\"2\\"||$ecmsfirstpost==1?\\\' selected\\\':\\\'\\\'?>>2星</option><option value=\\"3\\"<?=$r[star]==\\"3\\"?\\\' selected\\\':\\\'\\\'?>>3星</option><option value=\\"4\\"<?=$r[star]==\\"4\\"?\\\' selected\\\':\\\'\\\'?>>4星</option><option value=\\"5\\"<?=$r[star]==\\"5\\"?\\\' selected\\\':\\\'\\\'?>>5星</option></select>', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (47, 'filesize', '文件大小', 'text', '<input name=\\"filesize\\" type=\\"text\\" size=60 id=\\"filesize\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[filesize]))?>\\">\r\n<select name=\\"select\\" onchange=\\"document.add.filesize.value+=this.value\\">\r\n        <option value=\\"\\">单位</option>\r\n        <option value=\\" MB\\">MB</option>\r\n        <option value=\\" KB\\">KB</option>\r\n        <option value=\\" GB\\">GB</option>\r\n        <option value=\\" BYTES\\">BYTES</option>\r\n      </select>', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--filesize--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_filesize]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_filesize]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_filesize]" type="text" id="add[z_filesize]" value="<?=stripSlashes($r[z_filesize])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'VARCHAR', '16', 1, 4, 'flash', 0, '', 0, 1, 1, '<input name=\\"filesize\\" type=\\"text\\" size=42 id=\\"filesize\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'filesize\\\',stripSlashes($r[filesize]))?>\\">\r\n<select name=\\"select\\" onchange=\\"document.add.filesize.value+=this.value\\">\r\n        <option value=\\"\\">单位</option>\r\n        <option value=\\" MB\\">MB</option>\r\n        <option value=\\" KB\\">KB</option>\r\n        <option value=\\" GB\\">GB</option>\r\n        <option value=\\" BYTES\\">BYTES</option>\r\n      </select>', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (48, 'flashurl', 'Flash地址', 'flash', '\r\n<input name=\\"flashurl\\" type=\\"text\\" id=\\"flashurl\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[flashurl]))?>\\" size=\\"45\\">\r\n<a onclick=\\"window.open(\\\'ecmseditor/FileMain.php?type=2&classid=<?=$classid?>&filepass=<?=$filepass?>&doing=1&field=flashurl\\\',\\\'\\\',\\\'width=700,height=550,scrollbars=yes\\\');\\" title=\\"选择已上传的FLASH\\"><img src=\\"../data/images/changeflash.gif\\" border=\\"0\\" align=\\"absbottom\\"></a> \r\n', '', 1, 1, 1, '\r\n  <tr bgcolor=\\"#FFFFFF\\"> \r\n    <td height=\\"22\\" valign=\\"top\\"><strong>[!--enews.name--]正则：</strong><br>\r\n      ( \r\n      <input name=\\"textfield\\" type=\\"text\\" id=\\"textfield\\" value=\\"[!--flashurl--]\\" size=\\"20\\">\r\n      )</td>\r\n    <td><table width=\\"100%\\" border=\\"0\\" cellspacing=\\"1\\" cellpadding=\\"3\\">\r\n    <tr>\r\n      <td>附件前缀 \r\n        <input name=\\"add[qz_flashurl]\\" type=\\"text\\" id=\\"add[qz_flashurl]\\" value=\\"<?=stripSlashes($r[qz_flashurl])?>\\"> \r\n        <input name=\\"add[save_flashurl]\\" type=\\"checkbox\\" id=\\"add[save_flashurl]\\" value=\\" checked\\"<?=$r[save_flashurl]?>>\r\n        远程保存 </td>\r\n    </tr>\r\n    <tr> \r\n      <td><textarea name=\\"add[zz_flashurl]\\" cols=\\"60\\" rows=\\"10\\" id=\\"add[zz_flashurl]\\"><?=htmlspecialchars(stripSlashes($r[zz_flashurl]))?></textarea></td>\r\n    </tr>\r\n    <tr> \r\n      <td><input name=\\"add[z_flashurl]\\" type=\\"text\\" id=\\"flashurl5\\" value=\\"<?=stripSlashes($r[z_flashurl])?>\\">\r\n        (如填写这里，这就是字段的值)</td>\r\n    </tr>\r\n  </table></td>\r\n  </tr>\r\n', 1, 'VARCHAR', '255', 1, 4, 'flash', 0, '', 0, 1, 1, '\r\n<input type=\\"file\\" name=\\"flashurlfile\\" size=\\"45\\">\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (49, 'width', 'Flash宽度', 'text', '<input name=\\"width\\" type=\\"text\\" size=6 id=\\"width\\" value=\\"<?=$ecmsfirstpost==1?\\"600\\":htmlspecialchars(stripSlashes($r[width]))?>\\">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--width--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_width]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_width]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_width]" type="text" id="add[z_width]" value="<?=stripSlashes($r[z_width])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'VARCHAR', '12', 1, 4, 'flash', 0, '600', 0, 1, 1, '<input name=\\"width\\" type=\\"text\\" size=6 id=\\"width\\" value=\\"<?=$ecmsfirstpost==1?\\"600\\":DoReqValue($mid,\\\'width\\\',stripSlashes($r[width]))?>\\">\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (50, 'height', 'Flash高度', 'text', '<input name=\\"height\\" type=\\"text\\" size=6 id=\\"height\\" value=\\"<?=$ecmsfirstpost==1?\\"450\\":htmlspecialchars(stripSlashes($r[height]))?>\\">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--height--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_height]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_height]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_height]" type="text" id="add[z_height]" value="<?=stripSlashes($r[z_height])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'VARCHAR', '12', 1, 4, 'flash', 0, '450', 0, 1, 1, '<input name=\\"height\\" type=\\"text\\" size=6 id=\\"height\\" value=\\"<?=$ecmsfirstpost==1?\\"450\\":DoReqValue($mid,\\\'height\\\',stripSlashes($r[height]))?>\\">\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (51, 'flashsay', '作品简介', 'textarea', '<textarea name=\\"flashsay\\" cols=\\"80\\" rows=\\"10\\" id=\\"flashsay\\"><?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[flashsay]))?></textarea>\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--flashsay--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_flashsay]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_flashsay]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_flashsay]" type="text" id="add[z_flashsay]" value="<?=stripSlashes($r[z_flashsay])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'TEXT', '', 1, 4, 'flash', 0, '', 0, 1, 1, '<textarea name=\\"flashsay\\" cols=\\"60\\" rows=\\"10\\" id=\\"flashsay\\"><?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'flashsay\\\',stripSlashes($r[flashsay]))?></textarea>\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 1);
INSERT INTO `phome_enewsf` VALUES (52, 'title', '标题', 'text', '<table width=\\"100%\\" border=\\"0\\" cellpadding=\\"0\\" cellspacing=\\"0\\" bgcolor=\\"#DBEAF5\\">\r\n<tr> \r\n  <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">\r\n<?=$tts?\\"<select name=\\\'ttid\\\'><option value=\\\'0\\\'>标题分类</option>$tts</select>\\":\\"\\"?>\r\n	<input type=text name=title value=\\"<?=htmlspecialchars(stripSlashes($r[title]))?>\\" size=\\"60\\"> \r\n	<input type=\\"button\\" name=\\"button\\" value=\\"图文\\" onclick=\\"document.add.title.value=document.add.title.value+\\\'(图文)\\\';\\"> \r\n  </td>\r\n</tr>\r\n<tr> \r\n  <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">属性: \r\n	<input name=\\"titlefont[b]\\" type=\\"checkbox\\" value=\\"b\\"<?=$titlefontb?>>粗体\r\n	<input name=\\"titlefont[i]\\" type=\\"checkbox\\" value=\\"i\\"<?=$titlefonti?>>斜体\r\n	<input name=\\"titlefont[s]\\" type=\\"checkbox\\" value=\\"s\\"<?=$titlefonts?>>删除线\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;颜色: <input name=\\"titlecolor\\" type=\\"text\\" value=\\"<?=stripSlashes($r[titlecolor])?>\\" size=\\"10\\"><a onclick=\\"foreColor();\\"><img src=\\"../data/images/color.gif\\" width=\\"21\\" height=\\"21\\" align=\\"absbottom\\"></a>\r\n  </td>\r\n</tr>\r\n</table>', '标题', 0, 1, 1, '  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--title--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_title]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_title]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_title]" type="text" id="add[z_title]" value="<?=stripSlashes($r[z_title])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>', 0, 'VARCHAR', '200', 1, 5, 'movie', 0, '', 0, 1, 1, '<input name=\\"title\\" type=\\"text\\" size=\\"30\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'title\\\',stripSlashes($r[title]))?>\\">', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (53, 'special.field', '特殊属性', '', '<table width=\\"100%\\" border=\\"0\\" cellpadding=\\"0\\" cellspacing=\\"0\\" bgcolor=\\"#DBEAF5\\">\r\n  <tr>\r\n    <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">信息属性: \r\n      <input name=\\"checked\\" type=\\"checkbox\\" value=\\"1\\"<?=$r[checked]?\\\' checked\\\':\\\'\\\'?>>\r\n      审核 &nbsp;&nbsp; 推荐 \r\n      <select name=\\"isgood\\" id=\\"isgood\\">\r\n        <option value=\\"0\\"<?=$r[isgood]==0?\\\' selected\\\':\\\'\\\'?>>不推荐</option>\r\n        <option value=\\"1\\"<?=$r[isgood]==1?\\\' selected\\\':\\\'\\\'?>>一级推荐</option>\r\n        <option value=\\"2\\"<?=$r[isgood]==2?\\\' selected\\\':\\\'\\\'?>>二级推荐</option>\r\n        <option value=\\"3\\"<?=$r[isgood]==3?\\\' selected\\\':\\\'\\\'?>>三级推荐</option>\r\n        <option value=\\"4\\"<?=$r[isgood]==4?\\\' selected\\\':\\\'\\\'?>>四级推荐</option>\r\n        <option value=\\"5\\"<?=$r[isgood]==5?\\\' selected\\\':\\\'\\\'?>>五级推荐</option>\r\n        <option value=\\"6\\"<?=$r[isgood]==6?\\\' selected\\\':\\\'\\\'?>>六级推荐</option>\r\n        <option value=\\"7\\"<?=$r[isgood]==7?\\\' selected\\\':\\\'\\\'?>>七级推荐</option>\r\n        <option value=\\"8\\"<?=$r[isgood]==8?\\\' selected\\\':\\\'\\\'?>>八级推荐</option>\r\n        <option value=\\"9\\"<?=$r[isgood]==9?\\\' selected\\\':\\\'\\\'?>>九级推荐</option>\r\n      </select>\r\n      &nbsp;&nbsp; 头条 \r\n      <select name=\\"firsttitle\\" id=\\"firsttitle\\">\r\n        <option value=\\"0\\"<?=$r[firsttitle]==0?\\\' selected\\\':\\\'\\\'?>>非头条</option>\r\n        <option value=\\"1\\"<?=$r[firsttitle]==1?\\\' selected\\\':\\\'\\\'?>>一级头条</option>\r\n        <option value=\\"2\\"<?=$r[firsttitle]==2?\\\' selected\\\':\\\'\\\'?>>二级头条</option>\r\n        <option value=\\"3\\"<?=$r[firsttitle]==3?\\\' selected\\\':\\\'\\\'?>>三级头条</option>\r\n        <option value=\\"4\\"<?=$r[firsttitle]==4?\\\' selected\\\':\\\'\\\'?>>四级头条</option>\r\n        <option value=\\"5\\"<?=$r[firsttitle]==5?\\\' selected\\\':\\\'\\\'?>>五级头条</option>\r\n        <option value=\\"6\\"<?=$r[firsttitle]==6?\\\' selected\\\':\\\'\\\'?>>六级头条</option>\r\n        <option value=\\"7\\"<?=$r[firsttitle]==7?\\\' selected\\\':\\\'\\\'?>>七级头条</option>\r\n        <option value=\\"8\\"<?=$r[firsttitle]==8?\\\' selected\\\':\\\'\\\'?>>八级头条</option>\r\n        <option value=\\"9\\"<?=$r[firsttitle]==9?\\\' selected\\\':\\\'\\\'?>>九级头条</option>\r\n      </select></td>\r\n  </tr>\r\n  <tr> \r\n    <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">关键字&nbsp;&nbsp;&nbsp;: \r\n      <input name=\\"keyboard\\" type=\\"text\\" size=\\"52\\" value=\\"<?=stripSlashes($r[keyboard])?>\\">\r\n      <font color=\\"#666666\\">(多个请用&quot;,&quot;隔开)</font></td>\r\n  </tr>\r\n  <tr> \r\n    <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">外部链接: \r\n      <input name=\\"titleurl\\" type=\\"text\\" value=\\"<?=stripSlashes($r[titleurl])?>\\" size=\\"52\\">\r\n      <font color=\\"#666666\\">(填写后信息连接地址将为此链接)</font></td>\r\n  </tr>\r\n</table>\r\n', '特殊属性', 0, 1, 0, '', 0, '', '', 0, 5, 'movie', 0, '', 0, 1, 1, '关键字: \r\n      <input name=\\"keyboard\\" type=\\"text\\" value=\\"<?=stripSlashes($r[keyboard])?>\\">\r\n      <font color=\\"#666666\\">(多个请用&quot;,&quot;隔开)</font>', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (54, 'titlepic', '标题图片', 'img', '\r\n<input name=\\"titlepic\\" type=\\"text\\" id=\\"titlepic\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[titlepic]))?>\\" size=\\"45\\">\r\n<a onclick=\\"window.open(\\\'ecmseditor/FileMain.php?type=1&classid=<?=$classid?>&filepass=<?=$filepass?>&doing=1&field=titlepic\\\',\\\'\\\',\\\'width=700,height=550,scrollbars=yes\\\');\\" title=\\"选择已上传的图片\\"><img src=\\"../data/images/changeimg.gif\\" border=\\"0\\" align=\\"absbottom\\"></a> \r\n', '标题图片', 0, 1, 1, '\r\n  <tr bgcolor=\\"#FFFFFF\\"> \r\n    <td height=\\"22\\" valign=\\"top\\"><strong>[!--enews.name--]正则：</strong><br>\r\n      ( \r\n      <input name=\\"textfield\\" type=\\"text\\" id=\\"textfield\\" value=\\"[!--titlepic--]\\" size=\\"20\\">\r\n      )</td>\r\n    <td><table width=\\"100%\\" border=\\"0\\" cellspacing=\\"1\\" cellpadding=\\"3\\">\r\n    <tr>\r\n      <td>附件前缀 \r\n        <input name=\\"add[qz_titlepic]\\" type=\\"text\\" id=\\"add[qz_titlepic]\\" value=\\"<?=stripSlashes($r[qz_titlepic])?>\\"> \r\n        <input name=\\"add[save_titlepic]\\" type=\\"checkbox\\" id=\\"add[save_titlepic]\\" value=\\" checked\\"<?=$r[save_titlepic]?>>\r\n        远程保存 </td>\r\n    </tr>\r\n    <tr> \r\n      <td><textarea name=\\"add[zz_titlepic]\\" cols=\\"60\\" rows=\\"10\\" id=\\"add[zz_titlepic]\\"><?=htmlspecialchars(stripSlashes($r[zz_titlepic]))?></textarea></td>\r\n    </tr>\r\n    <tr> \r\n      <td><input name=\\"add[z_titlepic]\\" type=\\"text\\" id=\\"titlepic5\\" value=\\"<?=stripSlashes($r[z_titlepic])?>\\">\r\n        (如填写这里，这就是字段的值)</td>\r\n    </tr>\r\n  </table></td>\r\n  </tr>\r\n', 1, 'VARCHAR', '200', 1, 5, 'movie', 0, '', 0, 1, 1, '\r\n<input type=\\"file\\" name=\\"titlepicfile\\" size=\\"45\\">\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (55, 'newstime', '发布时间', 'text', '<input name=\\"newstime\\" type=\\"text\\" value=\\"<?=$r[newstime]?>\\"><input type=button name=button value=\\"设为当前时间\\" onclick=\\"document.add.newstime.value=\\\'<?=$todaytime?>\\\'\\">', '发布时间', 0, 1, 1, '  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--newstime--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_newstime]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_newstime]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_newstime]" type="text" id="add[z_newstime]" value="<?=stripSlashes($r[z_newstime])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>', 0, 'INT', '10', 1, 5, 'movie', 0, '', 0, 1, 1, '', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (56, 'movietype', '影片类型', 'select', '<select name=\\"movietype\\" id=\\"movietype\\"><option value=\\"港台影视\\"<?=$r[movietype]==\\"港台影视\\"?\\\' selected\\\':\\\'\\\'?>>港台影视</option><option value=\\"海外影视\\"<?=$r[movietype]==\\"海外影视\\"?\\\' selected\\\':\\\'\\\'?>>海外影视</option><option value=\\"大陆影视\\"<?=$r[movietype]==\\"大陆影视\\"?\\\' selected\\\':\\\'\\\'?>>大陆影视</option><option value=\\"日韩影视\\"<?=$r[movietype]==\\"日韩影视\\"?\\\' selected\\\':\\\'\\\'?>>日韩影视</option></select>', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--movietype--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_movietype]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_movietype]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_movietype]" type="text" id="add[z_movietype]" value="<?=stripSlashes($r[z_movietype])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'VARCHAR', '16', 1, 5, 'movie', 0, '港台影视|海外影视|大陆影视|日韩影视', 0, 1, 1, '<select name=\\"movietype\\" id=\\"movietype\\"><option value=\\"港台影视\\"<?=$r[movietype]==\\"港台影视\\"?\\\' selected\\\':\\\'\\\'?>>港台影视</option><option value=\\"海外影视\\"<?=$r[movietype]==\\"海外影视\\"?\\\' selected\\\':\\\'\\\'?>>海外影视</option><option value=\\"大陆影视\\"<?=$r[movietype]==\\"大陆影视\\"?\\\' selected\\\':\\\'\\\'?>>大陆影视</option><option value=\\"日韩影视\\"<?=$r[movietype]==\\"日韩影视\\"?\\\' selected\\\':\\\'\\\'?>>日韩影视</option></select>', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (57, 'company', '出品公司', 'text', '\r\n<input name="company" type="text" id="company" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($r[company]))?>">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--company--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_company]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_company]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_company]" type="text" id="add[z_company]" value="<?=stripSlashes($r[z_company])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'VARCHAR', '200', 1, 5, 'movie', 0, '', 0, 1, 1, '\r\n<input name="company" type="text" id="company" value="<?=$ecmsfirstpost==1?"":DoReqValue($mid,\'company\',stripSlashes($r[company]))?>">\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (58, 'movietime', '出品时间', 'text', '\r\n<input name="movietime" type="text" id="movietime" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($r[movietime]))?>">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--movietime--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_movietime]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_movietime]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_movietime]" type="text" id="add[z_movietime]" value="<?=stripSlashes($r[z_movietime])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'VARCHAR', '20', 1, 5, 'movie', 0, '', 0, 1, 1, '\r\n<input name="movietime" type="text" id="movietime" value="<?=$ecmsfirstpost==1?"":DoReqValue($mid,\'movietime\',stripSlashes($r[movietime]))?>">\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (59, 'player', '主演', 'text', '\r\n<input name="player" type="text" id="player" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($r[player]))?>">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--player--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_player]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_player]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_player]" type="text" id="add[z_player]" value="<?=stripSlashes($r[z_player])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'VARCHAR', '255', 1, 5, 'movie', 0, '', 0, 1, 1, '\r\n<input name="player" type="text" id="player" value="<?=$ecmsfirstpost==1?"":DoReqValue($mid,\'player\',stripSlashes($r[player]))?>">\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (60, 'playadmin', '导演', 'text', '\r\n<input name="playadmin" type="text" id="playadmin" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($r[playadmin]))?>">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--playadmin--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_playadmin]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_playadmin]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_playadmin]" type="text" id="add[z_playadmin]" value="<?=stripSlashes($r[z_playadmin])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'VARCHAR', '255', 1, 5, 'movie', 0, '', 0, 1, 1, '\r\n<input name="playadmin" type="text" id="playadmin" value="<?=$ecmsfirstpost==1?"":DoReqValue($mid,\'playadmin\',stripSlashes($r[playadmin]))?>">\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (61, 'filetype', '影片格式', 'text', '<input name=\\"filetype\\" type=\\"text\\" size=8 id=\\"filetype\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[filetype]))?>\\">\r\n<select name=\\"select2\\" onchange=\\"document.add.filetype.value=this.value\\">\r\n        <option value=\\"\\">类型</option>\r\n        <option value=\\".rm\\">.rm</option>\r\n        <option value=\\".rmvb\\">.rmvb</option>\r\n        <option value=\\".mp3\\">.mp3</option>\r\n        <option value=\\".asf\\">.asf</option>\r\n        <option value=\\".wmv\\">.wmv</option>\r\n        <option value=\\".avi\\">.avi</option>\r\n      </select>', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--filetype--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_filetype]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_filetype]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_filetype]" type="text" id="add[z_filetype]" value="<?=stripSlashes($r[z_filetype])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'VARCHAR', '10', 1, 5, 'movie', 0, '', 0, 1, 1, '<input name=\\"filetype\\" type=\\"text\\" id=\\"filetype\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'filetype\\\',stripSlashes($r[filetype]))?>\\">\r\n<select name=\\"select2\\" onchange=\\"document.add.filetype.value=this.value\\">\r\n        <option value=\\"\\">类型</option>\r\n        <option value=\\".rm\\">.rm</option>\r\n        <option value=\\".rmvb\\">.rmvb</option>\r\n        <option value=\\".mp3\\">.mp3</option>\r\n        <option value=\\".asf\\">.asf</option>\r\n        <option value=\\".wmv\\">.wmv</option>\r\n        <option value=\\".avi\\">.avi</option>\r\n      </select>', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (62, 'filesize', '影片大小', 'text', '<input name=\\"filesize\\" type=\\"text\\" size=12 id=\\"filesize\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[filesize]))?>\\">\r\n<select name=\\"select\\" onchange=\\"document.add.filesize.value+=this.value\\">\r\n        <option value=\\"\\">单位</option>\r\n        <option value=\\" MB\\">MB</option>\r\n        <option value=\\" KB\\">KB</option>\r\n        <option value=\\" GB\\">GB</option>\r\n        <option value=\\" BYTES\\">BYTES</option>\r\n      </select>', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--filesize--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_filesize]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_filesize]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_filesize]" type="text" id="add[z_filesize]" value="<?=stripSlashes($r[z_filesize])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'VARCHAR', '16', 1, 5, 'movie', 0, '', 0, 1, 1, '<input name=\\"filesize\\" type=\\"text\\" id=\\"filesize\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'filesize\\\',stripSlashes($r[filesize]))?>\\">\r\n<select name=\\"select\\" onchange=\\"document.add.filesize.value+=this.value\\">\r\n        <option value=\\"\\">单位</option>\r\n        <option value=\\" MB\\">MB</option>\r\n        <option value=\\" KB\\">KB</option>\r\n        <option value=\\" GB\\">GB</option>\r\n        <option value=\\" BYTES\\">BYTES</option>\r\n      </select>', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (63, 'star', '推荐等级', 'select', '<select name=\\"star\\" id=\\"star\\"><option value=\\"1\\"<?=$r[star]==\\"1\\"?\\\' selected\\\':\\\'\\\'?>>1星</option><option value=\\"2\\"<?=$r[star]==\\"2\\"||$ecmsfirstpost==1?\\\' selected\\\':\\\'\\\'?>>2星</option><option value=\\"3\\"<?=$r[star]==\\"3\\"?\\\' selected\\\':\\\'\\\'?>>3星</option><option value=\\"4\\"<?=$r[star]==\\"4\\"?\\\' selected\\\':\\\'\\\'?>>4星</option><option value=\\"5\\"<?=$r[star]==\\"5\\"?\\\' selected\\\':\\\'\\\'?>>5星</option></select>', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--star--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_star]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_star]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_star]" type="text" id="add[z_star]" value="<?=stripSlashes($r[z_star])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'TINYINT', '1', 1, 5, 'movie', 0, '1|2:default|3|4|5', 0, 1, 1, '<select name=\\"star\\" id=\\"star\\"><option value=\\"1\\"<?=$r[star]==\\"1\\"?\\\' selected\\\':\\\'\\\'?>>1星</option><option value=\\"2\\"<?=$r[star]==\\"2\\"||$ecmsfirstpost==1?\\\' selected\\\':\\\'\\\'?>>2星</option><option value=\\"3\\"<?=$r[star]==\\"3\\"?\\\' selected\\\':\\\'\\\'?>>3星</option><option value=\\"4\\"<?=$r[star]==\\"4\\"?\\\' selected\\\':\\\'\\\'?>>4星</option><option value=\\"5\\"<?=$r[star]==\\"5\\"?\\\' selected\\\':\\\'\\\'?>>5星</option></select>', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (64, 'playdk', '带宽要求', 'text', '<input name=\\"playdk\\" type=\\"text\\" id=\\"playdk\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[playdk]))?>\\">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--playdk--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_playdk]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_playdk]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_playdk]" type="text" id="add[z_playdk]" value="<?=stripSlashes($r[z_playdk])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'VARCHAR', '30', 1, 5, 'movie', 0, '', 0, 1, 1, '<input name=\\"playdk\\" type=\\"text\\" id=\\"playdk\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'playdk\\\',stripSlashes($r[playdk]))?>\\">\r\n', 0, '', 0, '', 1, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (65, 'playtime', '片长', 'text', '\r\n<input name="playtime" type="text" id="playtime" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($r[playtime]))?>">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--playtime--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_playtime]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_playtime]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_playtime]" type="text" id="add[z_playtime]" value="<?=stripSlashes($r[z_playtime])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'VARCHAR', '20', 1, 5, 'movie', 0, '', 0, 1, 1, '\r\n<input name="playtime" type="text" id="playtime" value="<?=$ecmsfirstpost==1?"":DoReqValue($mid,\'playtime\',stripSlashes($r[playtime]))?>">\r\n', 0, '', 0, '', 1, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (66, 'moviefen', '扣除点数', 'text', '\r\n<input name="moviefen" type="text" id="moviefen" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($r[moviefen]))?>">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--moviefen--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_moviefen]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_moviefen]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_moviefen]" type="text" id="add[z_moviefen]" value="<?=stripSlashes($r[z_moviefen])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'INT', '', 1, 5, 'movie', 0, '', 0, 1, 1, '\r\n<input name="moviefen" type="text" id="moviefen" value="<?=$ecmsfirstpost==1?"":DoReqValue($mid,\'moviefen\',stripSlashes($r[moviefen]))?>">\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (67, 'downpath', '下载地址', 'text', '<script>\r\nfunction doadd()\r\n{var i;\r\nvar str=\\"\\";\r\nvar oldi=0;\r\nvar j=0;\r\noldi=parseInt(document.add.editnum.value);\r\nfor(i=1;i<=document.add.downnum.value;i++)\r\n{\r\nj=i+oldi;\r\nstr=str+\\"<tr><td width=7%> <div align=center>\\"+j+\\"</div></td><td width=19%><div align=left><input name=downname[] type=text id=downname[] value=下载地址\\"+j+\\" size=17></div></td><td width=40%><input name=downpath[] type=text size=36 id=downpath\\"+j+\\" ondblclick=SpOpenChFile(0,\\\'downpath\\"+j+\\"\\\')><select name=thedownqz[]><option value=\\\'\\\'>--地址前缀--</option><?=$newdownqz?></select></td><td width=21%><div align=center><select name=downuser[] id=select><option value=0>游客</option><?=$ygroup?></select></div></td><td width=13%><div align=center><input name=fen[] type=text id=fen[] value=0 size=6></div></td></tr>\\";\r\n}\r\ndocument.getElementById(\\"adddown\\").innerHTML=\\"<table width=\\\'100%\\\' border=0 cellspacing=1 cellpadding=3>\\"+str+\\"</table>\\";\r\n}\r\n</script>\r\n<table width=\\"100%\\" border=\\"0\\" cellspacing=\\"0\\" cellpadding=\\"0\\">\r\n  <tr>\r\n    <td height=\\"25\\">下载地址前缀&nbsp;:\r\n      <input name=\\"downurl_qz\\" type=\\"text\\" size=\\"32\\">\r\n      <select name=\\"changeurl_qz\\" onchange=\\"document.add.downurl_qz.value=document.add.changeurl_qz.value\\">\r\n        <option value=\\"\\" selected>选择前缀</option>\r\n        <?=$downurlqz?>\r\n      </select>\r\n	  </td>\r\n  </tr>\r\n  <tr>\r\n    <td height=\\"25\\">选择/上传附件:\r\n      <input name=\\"changedown_url\\" id=\\"changedown_url\\" type=\\"text\\" size=\\"32\\">\r\n      <input type=\\"button\\" name=\\"Submit\\" value=\\"选择\\" onclick=\\"window.open(\\\'ecmseditor/FileMain.php?type=0&classid=<?=$classid?>&filepass=<?=$filepass?>&doing=1&field=changedown_url\\\',\\\'\\\',\\\'width=700,height=550,scrollbars=yes\\\');\\">&nbsp;\r\n	  <input type=\\"button\\" name=\\"Submit\\" value=\\"复制\\" onclick=\\"document.getElementById(\\\'changedown_url\\\').focus();document.getElementById(\\\'changedown_url\\\').select();clipboardData.setData(\\\'text\\\',document.getElementById(\\\'changedown_url\\\').value);\\"></td>\r\n  </tr>\r\n  <tr> \r\n    <td><table width=\\"100%\\" border=\\"0\\" cellpadding=\\"3\\" cellspacing=\\"1\\" bgcolor=\\"#DBEAF5\\">\r\n        <tr> \r\n          <td width=\\"7%\\"> <div align=\\"center\\">编号</div></td>\r\n          <td width=\\"19%\\"><div align=\\"left\\">下载名称</div></td>\r\n          <td width=\\"40%\\">下载地址 <font color=\\"#666666\\">(双击选择)</font></td>\r\n          <td width=\\"21%\\"> <div align=\\"center\\">权限</div></td>\r\n          <td width=\\"13%\\"> <div align=\\"center\\">点数</div></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n  <tr> \r\n    <td>\r\n    <?php\r\n    if($ecmsfirstpost==1)\r\n    {\r\n    ?>\r\n	<table width=\\\'100%\\\' border=0 cellspacing=1 cellpadding=3>\r\n	<?php\r\n	$editnum=3;\r\n	for($pathi=1;$pathi<=$editnum;$pathi++)\r\n	{\r\n	?>\r\n           <tr> \r\n              <td width=\\\'7%\\\'> <div align=center><?=$pathi?></div></td>\r\n              <td width=\\\'19%\\\'> <div align=left> \r\n                  <input name=downname[] type=text value=\\\'下载地址<?=$pathi?>\\\' size=17>\r\n                    </div></td>\r\n              <td width=\\\'40%\\\'>\r\n	      <input name=downpath[] type=text size=36 id=\\\'downpath<?=$pathi?>\\\' ondblclick=\\"SpOpenChFile(0,\\\'downpath<?=$pathi?>\\\');\\">\r\n	      <select name=thedownqz[]><option value=\\\'\\\'>--地址前缀--</option><?=$newdownqz?></select> \r\n                  </td>\r\n                  <td width=\\\'21%\\\'><div align=center> \r\n                      <select name=downuser[]>\r\n                        <option value=0>游客</option>\r\n                        <?=$ygroup?>\r\n                      </select>\r\n                    </div></td>\r\n                  <td width=\\\'13%\\\'> <div align=center> \r\n                      <input name=fen[] type=text value=0 size=6>\r\n                    </div></td>\r\n            </tr>\r\n	<?php\r\n	}\r\n	?>\r\n	</table>\r\n    <?php\r\n    }\r\n    else\r\n    {\r\n	$editnum=0;\r\n	$downloadpath=\\"\\";\r\n	if($r[downpath])\r\n	{\r\n		$r[downpath]=stripSlashes($r[downpath]);\r\n		//下载地址\r\n		$j=0;\r\n		$d_record=explode(\\"\\\\r\\\\n\\",$r[downpath]);\r\n		for($i=0;$i<count($d_record);$i++)\r\n		{\r\n			$j=$i+1;\r\n			$d_field=explode(\\"::::::\\",$d_record[$i]);\r\n			//权限\r\n			$tgroup=str_replace(\\" value=\\".$d_field[2].\\">\\",\\" value=\\".$d_field[2].\\" selected>\\",$ygroup);\r\n			//地址前缀\r\n			$tnewdownqz=str_replace(\\" value=\\\'\\".$d_field[4].\\"\\\'>\\",\\" value=\\\'\\".$d_field[4].\\"\\\' selected>\\",$newdownqz);\r\n			$downloadpath.=\\"<tr><td width=\\\'7%\\\'><div align=center>\\".$j.\\"</div></td><td width=\\\'19%\\\'><div align=left><input name=downname[] type=text id=downname[] value=\\\'\\".$d_field[0].\\"\\\' size=17></div></td><td width=\\\'40%\\\'><input name=downpath[] type=text id=downpath\\".$j.\\" value=\\\'\\".$d_field[1].\\"\\\' size=36 ondblclick=\\\\\\"SpOpenChFile(0,\\\'downpath\\".$j.\\"\\\');\\\\\\"><select name=thedownqz[]><option value=\\\'\\\'>--地址前缀--</option>\\".$tnewdownqz.\\"</select><input type=hidden name=pathid[] value=\\".$j.\\"><input type=checkbox name=delpathid[] value=\\".$j.\\">删</td><td width=\\\'21%\\\'><div align=center><select name=downuser[] id=select><option value=0>游客</option>\\".$tgroup.\\"</select></div></td><td width=\\\'13%\\\'><div align=center><input name=fen[] type=text id=fen[] value=\\\'\\".$d_field[3].\\"\\\' size=6></div></td></tr>\\";\r\n		}\r\n		$editnum=$j;\r\n		$downloadpath=\\"<table width=\\\'100%\\\' border=0 cellspacing=1 cellpadding=3>\\".$downloadpath.\\"</table>\\";\r\n	}\r\n	echo $downloadpath;\r\n    }\r\n    ?>\r\n    </td>\r\n  </tr>\r\n  <tr> \r\n    <td height=\\"25\\">下载地址扩展数量: <input name=\\"editnum\\" type=\\"hidden\\" id=\\"editnum\\" value=\\"<?=$editnum?>\\">\r\n      <input name=\\"downnum\\" type=\\"text\\" id=\\"downnum\\" value=\\"1\\" size=\\"6\\"> <input type=\\"button\\" name=\\"Submit5\\" value=\\"输出地址\\" onclick=\\"javascript:doadd();\\"></td>\r\n  </tr>\r\n  <tr> \r\n    <td id=adddown></td>\r\n  </tr>\r\n</table>\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor=\\"#FFFFFF\\"> \r\n    <td height=\\"22\\" valign=\\"top\\"><strong>[!--enews.name--]正则：</strong><br>\r\n      (\r\n      <input name=\\"textfield\\" type=\\"text\\" id=\\"textfield\\" value=\\"[!--ecmsdownpathurl--]\\" size=\\"20\\">\r\n      <br>\r\n      <input name=\\"textfield2\\" type=\\"text\\" id=\\"textfield2\\" value=\\"[!--ecmsdownpathname--]\\" size=\\"20\\">\r\n      )<br>\r\n      格式:地址正则(url)[!empirecms!]名称正则(name)</td>\r\n    <td><table width=\\"100%\\" border=\\"0\\" cellspacing=\\"1\\" cellpadding=\\"3\\">\r\n        <tr> \r\n          <td><textarea name=\\"add[zz_downpath]\\" cols=\\"60\\" rows=\\"10\\" id=\\"textarea\\"><?=htmlspecialchars(stripSlashes($r[zz_downpath]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td>地址前缀:\r\n<input name=\\"add[qz_downpath]\\" type=\\"text\\" id=\\"add[qz_downpath]\\" value=\\"<?=stripSlashes($r[qz_downpath])?>\\">\r\n        </td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'MEDIUMTEXT', '', 1, 5, 'movie', 0, '', 0, 1, 1, '<input type=\\"file\\" name=\\"downpathfile\\" size=\\"45\\">\r\n', 0, '', 0, '', 1, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (68, 'onlinepath', '在线观看地址', 'text', '<script>\r\nfunction dooadd()\r\n{var i;\r\nvar str=\\"\\";\r\nvar oldi=0;\r\nvar j=0;\r\noldi=parseInt(document.add.oeditnum.value);\r\nfor(i=1;i<=document.add.odownnum.value;i++)\r\n{\r\nj=i+oldi;\r\nstr=str+\\"<tr><td width=7%> <div align=center>\\"+j+\\"</div></td><td width=19%><div align=left><input name=odownname[] type=text value=\\"+j+\\" size=17></div></td><td width=40%><input name=odownpath[] type=text size=36 id=odownpath\\"+j+\\" ondblclick=SpOpenChFile(0,\\\'odownpath\\"+j+\\"\\\')><select name=othedownqz[]><option value=\\\'\\\'>--地址前缀--</option><?=$newdownqz?></select></td><td width=21%><div align=center><select name=odownuser[] id=select><option value=0>游客</option><?=$ygroup?></select></div></td><td width=13%><div align=center><input name=ofen[] type=text value=0 size=6></div></td></tr>\\";\r\n}\r\ndocument.getElementById(\\"addonline\\").innerHTML=\\"<table width=\\\'100%\\\' border=0 cellspacing=1 cellpadding=3>\\"+str+\\"</table>\\";\r\n}\r\n</script>\r\n<table width=\\"100%\\" border=\\"0\\" cellspacing=\\"0\\" cellpadding=\\"0\\">\r\n  <tr> \r\n    <td height=\\"25\\">观看地址前缀&nbsp;: \r\n      <input name=\\"onlineurl_qz\\" type=\\"text\\" size=\\"32\\"> <select name=\\"changeonlineurl_qz\\" onchange=\\"document.add.onlineurl_qz.value=document.add.changeonlineurl_qz.value\\">\r\n        <option value=\\"\\" selected>选择前缀</option>\r\n        <?=$downurlqz?>\r\n      </select>\r\n      </td>\r\n  </tr>\r\n  <tr> \r\n    <td height=\\"25\\">选择/上传附件: \r\n      <input name=\\"changeonline_url\\" id=\\"changeonline_url\\" type=\\"text\\" size=\\"32\\"> <input type=\\"button\\" name=\\"Submit\\" value=\\"选择\\" onclick=\\"window.open(\\\'ecmseditor/FileMain.php?type=0&classid=<?=$classid?>&filepass=<?=$filepass?>&doing=1&field=changeonline_url\\\',\\\'\\\',\\\'width=700,height=550,scrollbars=yes\\\');\\">&nbsp;\r\n	  <input type=\\"button\\" name=\\"Submit\\" value=\\"复制\\" onclick=\\"document.getElementById(\\\'changeonline_url\\\').focus();document.getElementById(\\\'changeonline_url\\\').select();clipboardData.setData(\\\'text\\\',document.getElementById(\\\'changeonline_url\\\').value);\\"></td>\r\n  </tr>\r\n  <tr> \r\n    <td><table width=\\"100%\\" border=\\"0\\" cellpadding=\\"3\\" cellspacing=\\"1\\" bgcolor=\\"#DBEAF5\\">\r\n        <tr> \r\n          <td width=\\"7%\\"> <div align=\\"center\\">编号</div></td>\r\n          <td width=\\"19%\\"><div align=\\"left\\">观看名称</div></td>\r\n          <td width=\\"40%\\">观看地址 <font color=\\"#666666\\">(双击选择)</font></td>\r\n          <td width=\\"21%\\"> <div align=\\"center\\">权限</div></td>\r\n          <td width=\\"13%\\"> <div align=\\"center\\">点数</div></td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n  <tr> \r\n    <td>\r\n    <?php\r\n    if($ecmsfirstpost==1)\r\n    {\r\n	?>\r\n	<table width=\\\'100%\\\' border=0 cellspacing=1 cellpadding=3>\r\n	<?php\r\n	$oeditnum=3;\r\n	for($opathi=1;$opathi<=$oeditnum;$opathi++)\r\n	{\r\n	?>\r\n		<tr> \r\n                  <td width=\\\'7%\\\'> <div align=center><?=$opathi?></div></td>\r\n                  <td width=\\\'19%\\\'> <div align=left> \r\n                      <input name=odownname[] type=text value=\\\'<?=$opathi?>\\\' size=17>\r\n                    </div></td>\r\n                  <td width=\\\'40%\\\'> \r\n		  <input name=odownpath[] type=text id=\\\'odownpath<?=$opathi?>\\\' size=36 ondblclick=\\"SpOpenChFile(0,\\\'odownpath<?=$opathi?>\\\');\\">\r\n		  <select name=othedownqz[]><option value=\\\'\\\'>--地址前缀--</option><?=$newdownqz?></select> \r\n                  </td>\r\n                  <td width=\\\'21%\\\'><div align=center> \r\n                      <select name=odownuser[] id=select>\r\n                        <option value=0>游客</option>\r\n                        <?=$ygroup?>\r\n                      </select>\r\n                    </div></td>\r\n                  <td width=\\\'13%\\\'> <div align=center> \r\n                      <input name=ofen[] type=text id=ofen[] value=0 size=6>\r\n                    </div></td>\r\n                </tr>\r\n	<?php\r\n	}\r\n	?>\r\n	</table>\r\n	<?php\r\n    }\r\n    else\r\n    {\r\n	$oeditnum=0;\r\n	$onlinemoviepath=\\"\\";\r\n	if($r[onlinepath])\r\n	{\r\n		$j=0;\r\n		$od_record=explode(\\"\\\\r\\\\n\\",$r[onlinepath]);\r\n		for($i=0;$i<count($od_record);$i++)\r\n		{\r\n			$j=$i+1;\r\n			$od_field=explode(\\"::::::\\",$od_record[$i]);\r\n			//权限\r\n			$tgroup=str_replace(\\" value=\\".$od_field[2].\\">\\",\\" value=\\".$od_field[2].\\" selected>\\",$ygroup);\r\n			//地址前缀\r\n			$tnewdownqz=str_replace(\\" value=\\\'\\".$od_field[4].\\"\\\'>\\",\\" value=\\\'\\".$od_field[4].\\"\\\' selected>\\",$newdownqz);\r\n			$onlinemoviepath.=\\"<tr><td width=\\\'7%\\\'><div align=center>\\".$j.\\"</div></td><td width=\\\'19%\\\'><div align=left><input name=odownname[] type=text value=\\\'\\".$od_field[0].\\"\\\' size=17></div></td><td width=\\\'40%\\\'><input name=odownpath[] type=text value=\\\'\\".$od_field[1].\\"\\\' size=36 id=odownpath\\".$j.\\" ondblclick=\\\\\\"SpOpenChFile(0,\\\'odownpath\\".$j.\\"\\\');\\\\\\"><select name=othedownqz[]><option value=\\\'\\\'>--地址前缀--</option>\\".$tnewdownqz.\\"</select><input type=hidden name=opathid[] value=\\".$j.\\"><input type=checkbox name=odelpathid[] value=\\".$j.\\">删</td><td width=\\\'21%\\\'><div align=center><select name=odownuser[] id=select><option value=0>游客</option>\\".$tgroup.\\"</select></div></td><td width=\\\'13%\\\'><div align=center><input name=ofen[] type=text value=\\\'\\".$od_field[3].\\"\\\' size=6></div></td></tr>\\";\r\n		}\r\n		$oeditnum=$j;\r\n		$onlinemoviepath=\\"<table width=\\\'100%\\\' border=0 cellspacing=1 cellpadding=3>\\".$onlinemoviepath.\\"</table>\\";\r\n	}\r\n	echo $onlinemoviepath;\r\n    }\r\n    ?>\r\n    </td>\r\n  </tr>\r\n  <tr> \r\n    <td height=\\"25\\">在线地址扩展数量: <input name=\\"oeditnum\\" type=\\"hidden\\" id=\\"oeditnum\\" value=\\"<?=$oeditnum?>\\">\r\n      <input name=\\"odownnum\\" type=\\"text\\" id=\\"odownnum\\" value=\\"1\\" size=\\"6\\"> <input type=\\"button\\" name=\\"Submit5\\" value=\\"输出地址\\" onclick=\\"javascript:dooadd();\\"></td>\r\n  </tr>\r\n  <tr> \r\n    <td id=addonline></td>\r\n  </tr>\r\n</table>\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor=\\"#FFFFFF\\"> \r\n    <td height=\\"22\\" valign=\\"top\\"><strong>[!--enews.name--]正则：</strong><br>\r\n      (\r\n      <input name=\\"textfield\\" type=\\"text\\" id=\\"textfield\\" value=\\"[!--ecmsonlinepathurl--]\\" size=\\"20\\">\r\n      <br>\r\n      <input name=\\"textfield2\\" type=\\"text\\" id=\\"textfield2\\" value=\\"[!--ecmsonlinepathname--]\\" size=\\"20\\">\r\n      )<br>\r\n      格式:地址正则(url)[!empirecms!]名称正则(name)</td>\r\n    <td><table width=\\"100%\\" border=\\"0\\" cellspacing=\\"1\\" cellpadding=\\"3\\">\r\n        <tr> \r\n          <td><textarea name=\\"add[zz_onlinepath]\\" cols=\\"60\\" rows=\\"10\\" id=\\"textarea\\"><?=htmlspecialchars(stripSlashes($r[zz_onlinepath]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td>地址前缀:\r\n<input name=\\"add[qz_onlinepath]\\" type=\\"text\\" id=\\"add[qz_onlinepath]\\" value=\\"<?=stripSlashes($r[qz_onlinepath])?>\\">\r\n        </td>\r\n        </tr>\r\n      </table>\r\n	  </td>\r\n  </tr>\r\n', 2, 'MEDIUMTEXT', '', 1, 5, 'movie', 0, '', 0, 1, 1, '<input type=\\"file\\" name=\\"onlinepathfile\\" size=\\"45\\">\r\n<input type=\\"hidden\\" name=\\"onlinepathmtfile\\" value=1>\r\n', 0, '', 0, '', 1, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (69, 'moviesay', '影片简介', 'textarea', '<textarea name=\\"moviesay\\" cols=\\"80\\" rows=\\"10\\" id=\\"moviesay\\"><?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[moviesay]))?></textarea>\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--moviesay--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_moviesay]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_moviesay]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_moviesay]" type="text" id="add[z_moviesay]" value="<?=stripSlashes($r[z_moviesay])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 2, 'TEXT', '', 1, 5, 'movie', 0, '', 0, 1, 1, '<textarea name=\\"moviesay\\" cols=\\"60\\" rows=\\"10\\" id=\\"moviesay\\"><?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'moviesay\\\',stripSlashes($r[moviesay]))?></textarea>\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 1);
INSERT INTO `phome_enewsf` VALUES (70, 'title', '标题', 'text', '<table width=\\"100%\\" border=\\"0\\" cellpadding=\\"0\\" cellspacing=\\"0\\" bgcolor=\\"#DBEAF5\\">\r\n<tr> \r\n  <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">\r\n<?=$tts?\\"<select name=\\\'ttid\\\'><option value=\\\'0\\\'>标题分类</option>$tts</select>\\":\\"\\"?>\r\n	<input type=text name=title value=\\"<?=htmlspecialchars(stripSlashes($r[title]))?>\\" size=\\"60\\"> \r\n	<input type=\\"button\\" name=\\"button\\" value=\\"图文\\" onclick=\\"document.add.title.value=document.add.title.value+\\\'(图文)\\\';\\"> \r\n  </td>\r\n</tr>\r\n<tr> \r\n  <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">属性: \r\n	<input name=\\"titlefont[b]\\" type=\\"checkbox\\" value=\\"b\\"<?=$titlefontb?>>粗体\r\n	<input name=\\"titlefont[i]\\" type=\\"checkbox\\" value=\\"i\\"<?=$titlefonti?>>斜体\r\n	<input name=\\"titlefont[s]\\" type=\\"checkbox\\" value=\\"s\\"<?=$titlefonts?>>删除线\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;颜色: <input name=\\"titlecolor\\" type=\\"text\\" value=\\"<?=stripSlashes($r[titlecolor])?>\\" size=\\"10\\"><a onclick=\\"foreColor();\\"><img src=\\"../data/images/color.gif\\" width=\\"21\\" height=\\"21\\" align=\\"absbottom\\"></a>\r\n  </td>\r\n</tr>\r\n</table>', '标题', 0, 1, 1, '  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--title--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_title]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_title]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_title]" type="text" id="add[z_title]" value="<?=stripSlashes($r[z_title])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>', 0, 'VARCHAR', '200', 1, 6, 'shop', 0, '', 0, 1, 1, '<input name=\\"title\\" type=\\"text\\" size=\\"30\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'title\\\',stripSlashes($r[title]))?>\\">', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (71, 'special.field', '特殊属性', '', '<table width=\\"100%\\" border=\\"0\\" cellpadding=\\"0\\" cellspacing=\\"0\\" bgcolor=\\"#DBEAF5\\">\r\n  <tr>\r\n    <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">信息属性: \r\n      <input name=\\"checked\\" type=\\"checkbox\\" value=\\"1\\"<?=$r[checked]?\\\' checked\\\':\\\'\\\'?>>\r\n      审核 &nbsp;&nbsp; 推荐 \r\n      <select name=\\"isgood\\" id=\\"isgood\\">\r\n        <option value=\\"0\\"<?=$r[isgood]==0?\\\' selected\\\':\\\'\\\'?>>不推荐</option>\r\n        <option value=\\"1\\"<?=$r[isgood]==1?\\\' selected\\\':\\\'\\\'?>>一级推荐</option>\r\n        <option value=\\"2\\"<?=$r[isgood]==2?\\\' selected\\\':\\\'\\\'?>>二级推荐</option>\r\n        <option value=\\"3\\"<?=$r[isgood]==3?\\\' selected\\\':\\\'\\\'?>>三级推荐</option>\r\n        <option value=\\"4\\"<?=$r[isgood]==4?\\\' selected\\\':\\\'\\\'?>>四级推荐</option>\r\n        <option value=\\"5\\"<?=$r[isgood]==5?\\\' selected\\\':\\\'\\\'?>>五级推荐</option>\r\n        <option value=\\"6\\"<?=$r[isgood]==6?\\\' selected\\\':\\\'\\\'?>>六级推荐</option>\r\n        <option value=\\"7\\"<?=$r[isgood]==7?\\\' selected\\\':\\\'\\\'?>>七级推荐</option>\r\n        <option value=\\"8\\"<?=$r[isgood]==8?\\\' selected\\\':\\\'\\\'?>>八级推荐</option>\r\n        <option value=\\"9\\"<?=$r[isgood]==9?\\\' selected\\\':\\\'\\\'?>>九级推荐</option>\r\n      </select>\r\n      &nbsp;&nbsp; 头条 \r\n      <select name=\\"firsttitle\\" id=\\"firsttitle\\">\r\n        <option value=\\"0\\"<?=$r[firsttitle]==0?\\\' selected\\\':\\\'\\\'?>>非头条</option>\r\n        <option value=\\"1\\"<?=$r[firsttitle]==1?\\\' selected\\\':\\\'\\\'?>>一级头条</option>\r\n        <option value=\\"2\\"<?=$r[firsttitle]==2?\\\' selected\\\':\\\'\\\'?>>二级头条</option>\r\n        <option value=\\"3\\"<?=$r[firsttitle]==3?\\\' selected\\\':\\\'\\\'?>>三级头条</option>\r\n        <option value=\\"4\\"<?=$r[firsttitle]==4?\\\' selected\\\':\\\'\\\'?>>四级头条</option>\r\n        <option value=\\"5\\"<?=$r[firsttitle]==5?\\\' selected\\\':\\\'\\\'?>>五级头条</option>\r\n        <option value=\\"6\\"<?=$r[firsttitle]==6?\\\' selected\\\':\\\'\\\'?>>六级头条</option>\r\n        <option value=\\"7\\"<?=$r[firsttitle]==7?\\\' selected\\\':\\\'\\\'?>>七级头条</option>\r\n        <option value=\\"8\\"<?=$r[firsttitle]==8?\\\' selected\\\':\\\'\\\'?>>八级头条</option>\r\n        <option value=\\"9\\"<?=$r[firsttitle]==9?\\\' selected\\\':\\\'\\\'?>>九级头条</option>\r\n      </select></td>\r\n  </tr>\r\n  <tr> \r\n    <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">关键字&nbsp;&nbsp;&nbsp;: \r\n      <input name=\\"keyboard\\" type=\\"text\\" size=\\"52\\" value=\\"<?=stripSlashes($r[keyboard])?>\\">\r\n      <font color=\\"#666666\\">(多个请用&quot;,&quot;隔开)</font></td>\r\n  </tr>\r\n  <tr> \r\n    <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">外部链接: \r\n      <input name=\\"titleurl\\" type=\\"text\\" value=\\"<?=stripSlashes($r[titleurl])?>\\" size=\\"52\\">\r\n      <font color=\\"#666666\\">(填写后信息连接地址将为此链接)</font></td>\r\n  </tr>\r\n</table>\r\n', '特殊属性', 0, 1, 0, '', 0, '', '', 0, 6, 'shop', 0, '', 0, 1, 1, '关键字: \r\n      <input name=\\"keyboard\\" type=\\"text\\" value=\\"<?=stripSlashes($r[keyboard])?>\\">\r\n      <font color=\\"#666666\\">(多个请用&quot;,&quot;隔开)</font>', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (72, 'titlepic', '标题图片', 'img', '\r\n<input name=\\"titlepic\\" type=\\"text\\" id=\\"titlepic\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[titlepic]))?>\\" size=\\"45\\">\r\n<a onclick=\\"window.open(\\\'ecmseditor/FileMain.php?type=1&classid=<?=$classid?>&filepass=<?=$filepass?>&doing=1&field=titlepic\\\',\\\'\\\',\\\'width=700,height=550,scrollbars=yes\\\');\\" title=\\"选择已上传的图片\\"><img src=\\"../data/images/changeimg.gif\\" border=\\"0\\" align=\\"absbottom\\"></a> \r\n', '标题图片', 0, 1, 1, '\r\n  <tr bgcolor=\\"#FFFFFF\\"> \r\n    <td height=\\"22\\" valign=\\"top\\"><strong>[!--enews.name--]正则：</strong><br>\r\n      ( \r\n      <input name=\\"textfield\\" type=\\"text\\" id=\\"textfield\\" value=\\"[!--titlepic--]\\" size=\\"20\\">\r\n      )</td>\r\n    <td><table width=\\"100%\\" border=\\"0\\" cellspacing=\\"1\\" cellpadding=\\"3\\">\r\n    <tr>\r\n      <td>附件前缀 \r\n        <input name=\\"add[qz_titlepic]\\" type=\\"text\\" id=\\"add[qz_titlepic]\\" value=\\"<?=stripSlashes($r[qz_titlepic])?>\\"> \r\n        <input name=\\"add[save_titlepic]\\" type=\\"checkbox\\" id=\\"add[save_titlepic]\\" value=\\" checked\\"<?=$r[save_titlepic]?>>\r\n        远程保存 </td>\r\n    </tr>\r\n    <tr> \r\n      <td><textarea name=\\"add[zz_titlepic]\\" cols=\\"60\\" rows=\\"10\\" id=\\"add[zz_titlepic]\\"><?=htmlspecialchars(stripSlashes($r[zz_titlepic]))?></textarea></td>\r\n    </tr>\r\n    <tr> \r\n      <td><input name=\\"add[z_titlepic]\\" type=\\"text\\" id=\\"titlepic5\\" value=\\"<?=stripSlashes($r[z_titlepic])?>\\">\r\n        (如填写这里，这就是字段的值)</td>\r\n    </tr>\r\n  </table></td>\r\n  </tr>\r\n', 1, 'VARCHAR', '200', 1, 6, 'shop', 0, '', 0, 1, 1, '\r\n<input type=\\"file\\" name=\\"titlepicfile\\" size=\\"45\\">\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (73, 'newstime', '发布时间', 'text', '<input name=\\"newstime\\" type=\\"text\\" value=\\"<?=$r[newstime]?>\\"><input type=button name=button value=\\"设为当前时间\\" onclick=\\"document.add.newstime.value=\\\'<?=$todaytime?>\\\'\\">', '发布时间', 0, 1, 1, '  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--newstime--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_newstime]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_newstime]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_newstime]" type="text" id="add[z_newstime]" value="<?=stripSlashes($r[z_newstime])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>', 0, 'INT', '10', 1, 6, 'shop', 0, '', 0, 1, 1, '', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (74, 'productno', '商品编号', 'text', '<input name=\\"productno\\" type=\\"text\\" size=60 id=\\"productno\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[productno]))?>\\">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--productno--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_productno]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_productno]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_productno]" type="text" id="add[z_productno]" value="<?=stripSlashes($r[z_productno])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 0, 'VARCHAR', '30', 1, 6, 'shop', 0, '', 0, 1, 1, '<input name=\\"productno\\" type=\\"text\\" id=\\"productno\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'productno\\\',stripSlashes($r[productno]))?>\\">\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (75, 'pbrand', '品牌', 'text', '<input name=\\"pbrand\\" type=\\"text\\" size=60 id=\\"pbrand\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[pbrand]))?>\\">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--pbrand--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_pbrand]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_pbrand]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_pbrand]" type="text" id="add[z_pbrand]" value="<?=stripSlashes($r[z_pbrand])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 0, 'VARCHAR', '30', 1, 6, 'shop', 0, '', 0, 1, 1, '<input name=\\"pbrand\\" type=\\"text\\" id=\\"pbrand\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'pbrand\\\',stripSlashes($r[pbrand]))?>\\">\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (76, 'intro', '简单描述', 'textarea', '<textarea name=\\"intro\\" cols=\\"80\\" rows=\\"10\\" id=\\"intro\\"><?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[intro]))?></textarea>\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--intro--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_intro]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_intro]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_intro]" type="text" id="add[z_intro]" value="<?=stripSlashes($r[z_intro])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 0, 'TEXT', '', 1, 6, 'shop', 0, '', 0, 1, 1, '<textarea name=\\"intro\\" cols=\\"60\\" rows=\\"10\\" id=\\"intro\\"><?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'intro\\\',stripSlashes($r[intro]))?></textarea>\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (77, 'unit', '计量单位', 'text', '<input name=\\"unit\\" type=\\"text\\" size=60 id=\\"unit\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[unit]))?>\\">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--unit--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_unit]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_unit]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_unit]" type="text" id="add[z_unit]" value="<?=stripSlashes($r[z_unit])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 0, 'VARCHAR', '16', 1, 6, 'shop', 0, '', 0, 1, 1, '<input name=\\"unit\\" type=\\"text\\" id=\\"unit\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'unit\\\',stripSlashes($r[unit]))?>\\">\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (78, 'weight', '单位重量', 'text', '<input name=\\"weight\\" type=\\"text\\" size=60 id=\\"weight\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[weight]))?>\\">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--weight--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_weight]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_weight]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_weight]" type="text" id="add[z_weight]" value="<?=stripSlashes($r[z_weight])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 0, 'VARCHAR', '20', 1, 6, 'shop', 0, '', 0, 1, 1, '<input name=\\"weight\\" type=\\"text\\" id=\\"weight\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'weight\\\',stripSlashes($r[weight]))?>\\">\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (79, 'tprice', '市场价格', 'text', '<input name=\\"tprice\\" type=\\"text\\" size=60 id=\\"tprice\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[tprice]))?>\\">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--tprice--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_tprice]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_tprice]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_tprice]" type="text" id="add[z_tprice]" value="<?=stripSlashes($r[z_tprice])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 0, 'FLOAT', '11,2', 1, 6, 'shop', 0, '', 0, 1, 1, '<input name=\\"tprice\\" type=\\"text\\" id=\\"tprice\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'tprice\\\',stripSlashes($r[tprice]))?>\\">\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (80, 'price', '购买价格', 'text', '<input name=\\"price\\" type=\\"text\\" size=60 id=\\"price\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[price]))?>\\">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--price--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_price]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_price]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_price]" type="text" id="add[z_price]" value="<?=stripSlashes($r[z_price])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 0, 'FLOAT', '11,2', 1, 6, 'shop', 0, '', 0, 1, 1, '<input name=\\"price\\" type=\\"text\\" id=\\"price\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'price\\\',stripSlashes($r[price]))?>\\">\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (81, 'buyfen', '积分购买', 'text', '<input name=\\"buyfen\\" type=\\"text\\" size=60 id=\\"buyfen\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[buyfen]))?>\\">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--buyfen--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_buyfen]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_buyfen]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_buyfen]" type="text" id="add[z_buyfen]" value="<?=stripSlashes($r[z_buyfen])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 0, 'INT', '', 1, 6, 'shop', 0, '', 0, 1, 1, '<input name=\\"buyfen\\" type=\\"text\\" id=\\"buyfen\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'buyfen\\\',stripSlashes($r[buyfen]))?>\\">\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (82, 'pmaxnum', '库存', 'text', '<input name=\\"pmaxnum\\" type=\\"text\\" size=60 id=\\"pmaxnum\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[pmaxnum]))?>\\">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--pmaxnum--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_pmaxnum]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_pmaxnum]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_pmaxnum]" type="text" id="add[z_pmaxnum]" value="<?=stripSlashes($r[z_pmaxnum])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 0, 'INT', '', 1, 6, 'shop', 0, '', 0, 1, 1, '<input name=\\"pmaxnum\\" type=\\"text\\" id=\\"pmaxnum\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'pmaxnum\\\',stripSlashes($r[pmaxnum]))?>\\">\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (83, 'productpic', '商品大图', 'img', '\r\n<input name=\\"productpic\\" type=\\"text\\" id=\\"productpic\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[productpic]))?>\\" size=\\"45\\">\r\n<a onclick=\\"window.open(\\\'ecmseditor/FileMain.php?type=1&classid=<?=$classid?>&filepass=<?=$filepass?>&doing=1&field=productpic\\\',\\\'\\\',\\\'width=700,height=550,scrollbars=yes\\\');\\" title=\\"选择已上传的图片\\"><img src=\\"../data/images/changeimg.gif\\" border=\\"0\\" align=\\"absbottom\\"></a> \r\n', '', 1, 1, 1, '\r\n  <tr bgcolor=\\"#FFFFFF\\"> \r\n    <td height=\\"22\\" valign=\\"top\\"><strong>[!--enews.name--]正则：</strong><br>\r\n      ( \r\n      <input name=\\"textfield\\" type=\\"text\\" id=\\"textfield\\" value=\\"[!--productpic--]\\" size=\\"20\\">\r\n      )</td>\r\n    <td><table width=\\"100%\\" border=\\"0\\" cellspacing=\\"1\\" cellpadding=\\"3\\">\r\n    <tr>\r\n      <td>附件前缀 \r\n        <input name=\\"add[qz_productpic]\\" type=\\"text\\" id=\\"add[qz_productpic]\\" value=\\"<?=stripSlashes($r[qz_productpic])?>\\"> \r\n        <input name=\\"add[save_productpic]\\" type=\\"checkbox\\" id=\\"add[save_productpic]\\" value=\\" checked\\"<?=$r[save_productpic]?>>\r\n        远程保存 </td>\r\n    </tr>\r\n    <tr> \r\n      <td><textarea name=\\"add[zz_productpic]\\" cols=\\"60\\" rows=\\"10\\" id=\\"add[zz_productpic]\\"><?=htmlspecialchars(stripSlashes($r[zz_productpic]))?></textarea></td>\r\n    </tr>\r\n    <tr> \r\n      <td><input name=\\"add[z_productpic]\\" type=\\"text\\" id=\\"productpic5\\" value=\\"<?=stripSlashes($r[z_productpic])?>\\">\r\n        (如填写这里，这就是字段的值)</td>\r\n    </tr>\r\n  </table></td>\r\n  </tr>\r\n', 1, 'VARCHAR', '255', 1, 6, 'shop', 0, '', 0, 1, 1, '\r\n<input type=\\"file\\" name=\\"productpicfile\\" size=\\"45\\">\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (84, 'newstext', '商品介绍', 'editor', '<?=ECMS_ShowEditorVar(\\"newstext\\",$ecmsfirstpost==1?\\"\\":stripSlashes($r[newstext]),\\"Default\\",\\"\\",\\"300\\",\\"100%\\")?>\r\n<table width=\\"100%\\" border=\\"0\\" cellpadding=\\"3\\" cellspacing=\\"1\\" bgcolor=\\"#DBEAF5\\">\r\n          <tr> \r\n            <td bgcolor=\\"#FFFFFF\\"> <input name=\\"dokey\\" type=\\"checkbox\\" value=\\"1\\"<?=$r[dokey]==1?\\\' checked\\\':\\\'\\\'?>>\r\n              关键字替换&nbsp;&nbsp; <input name=\\"copyimg\\" type=\\"checkbox\\" id=\\"copyimg\\" value=\\"1\\">\r\n      远程保存图片(\r\n      <input name=\\"mark\\" type=\\"checkbox\\" id=\\"mark\\" value=\\"1\\">\r\n      <a href=\\"SetEnews.php\\" target=\\"_blank\\">加水印</a>)&nbsp;&nbsp; \r\n      <input name=\\"copyflash\\" type=\\"checkbox\\" id=\\"copyflash\\" value=\\"1\\">\r\n      远程保存FLASH(地址前缀： \r\n      <input name=\\"qz_url\\" type=\\"text\\" id=\\"qz_url\\" size=\\"\\">\r\n              )</td>\r\n          </tr>\r\n          <tr>\r\n            \r\n    <td bgcolor=\\"#FFFFFF\\"><input name=\\"repimgnexturl\\" type=\\"checkbox\\" id=\\"repimgnexturl\\" value=\\"1\\"> 图片链接转为下一页&nbsp;&nbsp; <input name=\\"autopage\\" type=\\"checkbox\\" id=\\"autopage\\" value=\\"1\\">自动分页 \r\n      ,每 \r\n      <input name=\\"autosize\\" type=\\"text\\" id=\\"autosize\\" value=\\"5000\\" size=\\"5\\">\r\n      个字节为一页&nbsp;&nbsp; 取第 \r\n      <input name=\\"getfirsttitlepic\\" type=\\"text\\" id=\\"getfirsttitlepic\\" value=\\"\\" size=\\"1\\">\r\n      张上传图为标题图片( \r\n      <input name=\\"getfirsttitlespic\\" type=\\"checkbox\\" id=\\"getfirsttitlespic\\" value=\\"1\\">\r\n      缩略图: 宽 \r\n      <input name=\\"getfirsttitlespicw\\" type=\\"text\\" id=\\"getfirsttitlespicw\\" size=\\"3\\" value=\\"<?=$public_r[spicwidth]?>\\">\r\n      *高\r\n      <input name=\\"getfirsttitlespich\\" type=\\"text\\" id=\\"getfirsttitlespich\\" size=\\"3\\" value=\\"<?=$public_r[spicheight]?>\\">\r\n      )</td>\r\n          </tr>\r\n        </table>\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor=\\"#FFFFFF\\"> \r\n    <td height=\\"22\\" valign=\\"top\\"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name=\\"textfield\\" type=\\"text\\" id=\\"textfield\\" value=\\"[!--newstext--]\\" size=\\"20\\">)</td>\r\n    <td><table width=\\"100%\\" border=\\"0\\" cellspacing=\\"1\\" cellpadding=\\"3\\">\r\n        <tr> \r\n          <td><textarea name=\\"add[zz_newstext]\\" cols=\\"60\\" rows=\\"10\\" id=\\"textarea\\"><?=htmlspecialchars(stripSlashes($r[zz_newstext]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name=\\"add[z_newstext]\\" type=\\"text\\" id=\\"add[z_newstext]\\" value=\\"<?=stripSlashes($r[z_newstext])?>\\">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'MEDIUMTEXT', '', 1, 6, 'shop', 0, '', 0, 1, 1, '<?=ECMS_ShowEditorVar(\\"newstext\\",$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'newstext\\\',stripSlashes($r[newstext])),\\"Default\\",\\"\\",\\"300\\",\\"100%\\")?>\r\n', 0, '', 0, '', 0, 1, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (85, 'title', '标题', 'text', '<table width=\\"100%\\" border=\\"0\\" cellpadding=\\"0\\" cellspacing=\\"0\\" bgcolor=\\"#DBEAF5\\">\r\n<tr> \r\n  <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">\r\n<?=$tts?\\"<select name=\\\'ttid\\\'><option value=\\\'0\\\'>标题分类</option>$tts</select>\\":\\"\\"?>\r\n	<input type=text name=title value=\\"<?=htmlspecialchars(stripSlashes($r[title]))?>\\" size=\\"60\\"> \r\n	<input type=\\"button\\" name=\\"button\\" value=\\"图文\\" onclick=\\"document.add.title.value=document.add.title.value+\\\'(图文)\\\';\\"> \r\n  </td>\r\n</tr>\r\n<tr> \r\n  <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">属性: \r\n	<input name=\\"titlefont[b]\\" type=\\"checkbox\\" value=\\"b\\"<?=$titlefontb?>>粗体\r\n	<input name=\\"titlefont[i]\\" type=\\"checkbox\\" value=\\"i\\"<?=$titlefonti?>>斜体\r\n	<input name=\\"titlefont[s]\\" type=\\"checkbox\\" value=\\"s\\"<?=$titlefonts?>>删除线\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;颜色: <input name=\\"titlecolor\\" type=\\"text\\" value=\\"<?=stripSlashes($r[titlecolor])?>\\" size=\\"10\\"><a onclick=\\"foreColor();\\"><img src=\\"../data/images/color.gif\\" width=\\"21\\" height=\\"21\\" align=\\"absbottom\\"></a>\r\n  </td>\r\n</tr>\r\n</table>', '标题', 0, 1, 1, '  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--title--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_title]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_title]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_title]" type="text" id="add[z_title]" value="<?=stripSlashes($r[z_title])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>', 0, 'CHAR', '200', 1, 7, 'article', 0, '', 0, 1, 1, '<input name=\\"title\\" type=\\"text\\" size=\\"42\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'title\\\',stripSlashes($r[title]))?>\\">', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (86, 'special.field', '特殊属性', '', '<table width=\\"100%\\" border=\\"0\\" cellpadding=\\"0\\" cellspacing=\\"0\\" bgcolor=\\"#DBEAF5\\">\r\n  <tr>\r\n    <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">信息属性: \r\n      <input name=\\"checked\\" type=\\"checkbox\\" value=\\"1\\"<?=$r[checked]?\\\' checked\\\':\\\'\\\'?>>\r\n      审核 &nbsp;&nbsp; 推荐 \r\n      <select name=\\"isgood\\" id=\\"isgood\\">\r\n        <option value=\\"0\\"<?=$r[isgood]==0?\\\' selected\\\':\\\'\\\'?>>不推荐</option>\r\n        <option value=\\"1\\"<?=$r[isgood]==1?\\\' selected\\\':\\\'\\\'?>>一级推荐</option>\r\n        <option value=\\"2\\"<?=$r[isgood]==2?\\\' selected\\\':\\\'\\\'?>>二级推荐</option>\r\n        <option value=\\"3\\"<?=$r[isgood]==3?\\\' selected\\\':\\\'\\\'?>>三级推荐</option>\r\n        <option value=\\"4\\"<?=$r[isgood]==4?\\\' selected\\\':\\\'\\\'?>>四级推荐</option>\r\n        <option value=\\"5\\"<?=$r[isgood]==5?\\\' selected\\\':\\\'\\\'?>>五级推荐</option>\r\n        <option value=\\"6\\"<?=$r[isgood]==6?\\\' selected\\\':\\\'\\\'?>>六级推荐</option>\r\n        <option value=\\"7\\"<?=$r[isgood]==7?\\\' selected\\\':\\\'\\\'?>>七级推荐</option>\r\n        <option value=\\"8\\"<?=$r[isgood]==8?\\\' selected\\\':\\\'\\\'?>>八级推荐</option>\r\n        <option value=\\"9\\"<?=$r[isgood]==9?\\\' selected\\\':\\\'\\\'?>>九级推荐</option>\r\n      </select>\r\n      &nbsp;&nbsp; 头条 \r\n      <select name=\\"firsttitle\\" id=\\"firsttitle\\">\r\n        <option value=\\"0\\"<?=$r[firsttitle]==0?\\\' selected\\\':\\\'\\\'?>>非头条</option>\r\n        <option value=\\"1\\"<?=$r[firsttitle]==1?\\\' selected\\\':\\\'\\\'?>>一级头条</option>\r\n        <option value=\\"2\\"<?=$r[firsttitle]==2?\\\' selected\\\':\\\'\\\'?>>二级头条</option>\r\n        <option value=\\"3\\"<?=$r[firsttitle]==3?\\\' selected\\\':\\\'\\\'?>>三级头条</option>\r\n        <option value=\\"4\\"<?=$r[firsttitle]==4?\\\' selected\\\':\\\'\\\'?>>四级头条</option>\r\n        <option value=\\"5\\"<?=$r[firsttitle]==5?\\\' selected\\\':\\\'\\\'?>>五级头条</option>\r\n        <option value=\\"6\\"<?=$r[firsttitle]==6?\\\' selected\\\':\\\'\\\'?>>六级头条</option>\r\n        <option value=\\"7\\"<?=$r[firsttitle]==7?\\\' selected\\\':\\\'\\\'?>>七级头条</option>\r\n        <option value=\\"8\\"<?=$r[firsttitle]==8?\\\' selected\\\':\\\'\\\'?>>八级头条</option>\r\n        <option value=\\"9\\"<?=$r[firsttitle]==9?\\\' selected\\\':\\\'\\\'?>>九级头条</option>\r\n      </select></td>\r\n  </tr>\r\n  <tr> \r\n    <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">关键字&nbsp;&nbsp;&nbsp;: \r\n      <input name=\\"keyboard\\" type=\\"text\\" size=\\"52\\" value=\\"<?=stripSlashes($r[keyboard])?>\\">\r\n      <font color=\\"#666666\\">(多个请用&quot;,&quot;隔开)</font></td>\r\n  </tr>\r\n  <tr> \r\n    <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">外部链接: \r\n      <input name=\\"titleurl\\" type=\\"text\\" value=\\"<?=stripSlashes($r[titleurl])?>\\" size=\\"52\\">\r\n      <font color=\\"#666666\\">(填写后信息连接地址将为此链接)</font></td>\r\n  </tr>\r\n</table>\r\n', '特殊属性', 0, 1, 0, '', 1, '', '', 0, 7, 'article', 0, '', 0, 1, 1, '<input name=\\"keyboard\\" type=\\"text\\" size=42 value=\\"<?=stripSlashes($r[keyboard])?>\\">\r\n      <font color=\\"#666666\\">(多个请用&quot;,&quot;隔开)</font>', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (87, 'titlepic', '标题图片', 'img', '\r\n<input name=\\"titlepic\\" type=\\"text\\" id=\\"titlepic\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[titlepic]))?>\\" size=\\"45\\">\r\n<a onclick=\\"window.open(\\\'ecmseditor/FileMain.php?type=1&classid=<?=$classid?>&filepass=<?=$filepass?>&doing=1&field=titlepic\\\',\\\'\\\',\\\'width=700,height=550,scrollbars=yes\\\');\\" title=\\"选择已上传的图片\\"><img src=\\"../data/images/changeimg.gif\\" border=\\"0\\" align=\\"absbottom\\"></a> \r\n', '标题图片', 0, 1, 1, '\r\n  <tr bgcolor=\\"#FFFFFF\\"> \r\n    <td height=\\"22\\" valign=\\"top\\"><strong>[!--enews.name--]正则：</strong><br>\r\n      ( \r\n      <input name=\\"textfield\\" type=\\"text\\" id=\\"textfield\\" value=\\"[!--titlepic--]\\" size=\\"20\\">\r\n      )</td>\r\n    <td><table width=\\"100%\\" border=\\"0\\" cellspacing=\\"1\\" cellpadding=\\"3\\">\r\n    <tr>\r\n      <td>附件前缀 \r\n        <input name=\\"add[qz_titlepic]\\" type=\\"text\\" id=\\"add[qz_titlepic]\\" value=\\"<?=stripSlashes($r[qz_titlepic])?>\\"> \r\n        <input name=\\"add[save_titlepic]\\" type=\\"checkbox\\" id=\\"add[save_titlepic]\\" value=\\" checked\\"<?=$r[save_titlepic]?>>\r\n        远程保存 </td>\r\n    </tr>\r\n    <tr> \r\n      <td><textarea name=\\"add[zz_titlepic]\\" cols=\\"60\\" rows=\\"10\\" id=\\"add[zz_titlepic]\\"><?=htmlspecialchars(stripSlashes($r[zz_titlepic]))?></textarea></td>\r\n    </tr>\r\n    <tr> \r\n      <td><input name=\\"add[z_titlepic]\\" type=\\"text\\" id=\\"titlepic5\\" value=\\"<?=stripSlashes($r[z_titlepic])?>\\">\r\n        (如填写这里，这就是字段的值)</td>\r\n    </tr>\r\n  </table></td>\r\n  </tr>\r\n', 2, 'CHAR', '200', 1, 7, 'article', 0, '', 0, 1, 1, '\r\n<input type=\\"file\\" name=\\"titlepicfile\\" size=\\"45\\">\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (88, 'newstime', '发布时间', 'text', '<input name=\\"newstime\\" type=\\"text\\" value=\\"<?=$r[newstime]?>\\"><input type=button name=button value=\\"设为当前时间\\" onclick=\\"document.add.newstime.value=\\\'<?=$todaytime?>\\\'\\">', '发布时间', 0, 1, 1, '  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--newstime--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_newstime]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_newstime]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_newstime]" type="text" id="add[z_newstime]" value="<?=stripSlashes($r[z_newstime])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>', 1, 'INT', '10', 1, 7, 'article', 0, '', 0, 1, 1, '', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (89, 'ftitle', '副标题', 'text', '<input name=\\"ftitle\\" type=\\"text\\" size=60 id=\\"ftitle\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[ftitle]))?>\\">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor=\\"#FFFFFF\\"> \r\n    <td height=\\"22\\" valign=\\"top\\"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name=\\"textfield\\" type=\\"text\\" id=\\"textfield\\" value=\\"[!--ftitle--]\\" size=\\"20\\">)</td>\r\n    <td><table width=\\"100%\\" border=\\"0\\" cellspacing=\\"1\\" cellpadding=\\"3\\">\r\n        <tr> \r\n          <td><textarea name=\\"add[zz_ftitle]\\" cols=\\"60\\" rows=\\"10\\" id=\\"textarea\\"><?=htmlspecialchars(stripSlashes($r[zz_ftitle]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name=\\"add[z_ftitle]\\" type=\\"text\\" id=\\"add[z_ftitle]\\" value=\\"<?=stripSlashes($r[z_ftitle])?>\\">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 0, 'CHAR', '120', 1, 7, 'article', 0, '', 0, 1, 1, '<input name=\\"ftitle\\" type=\\"text\\" size=42 id=\\"ftitle\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'ftitle\\\',stripSlashes($r[ftitle]))?>\\">\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (90, 'smalltext', '内容简介', 'textarea', '<textarea name=\\"smalltext\\" cols=\\"80\\" rows=\\"10\\" id=\\"smalltext\\"><?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[smalltext]))?></textarea>\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor=\\"#FFFFFF\\"> \r\n    <td height=\\"22\\" valign=\\"top\\"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name=\\"textfield\\" type=\\"text\\" id=\\"textfield\\" value=\\"[!--smalltext--]\\" size=\\"20\\">)</td>\r\n    <td><table width=\\"100%\\" border=\\"0\\" cellspacing=\\"1\\" cellpadding=\\"3\\">\r\n        <tr> \r\n          <td><textarea name=\\"add[zz_smalltext]\\" cols=\\"60\\" rows=\\"10\\" id=\\"textarea\\"><?=htmlspecialchars(stripSlashes($r[zz_smalltext]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name=\\"add[z_smalltext]\\" type=\\"text\\" id=\\"add[z_smalltext]\\" value=\\"<?=stripSlashes($r[z_smalltext])?>\\">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 2, 'CHAR', '255', 1, 7, 'article', 0, '', 0, 1, 1, '<textarea name=\\"smalltext\\" cols=\\"60\\" rows=\\"10\\" id=\\"smalltext\\"><?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'smalltext\\\',stripSlashes($r[smalltext]))?></textarea>\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 1);
INSERT INTO `phome_enewsf` VALUES (91, 'writer', '作者', 'text', '\r\n<?php\r\n$writer_sql=$empire->query(\\"select writer from {$dbtbpre}enewswriter\\");\r\nwhile($w_r=$empire->fetch($writer_sql))\r\n{\r\n	$w_class.=\\"<option value=\\\'\\".$w_r[writer].\\"\\\'>\\".$w_r[writer].\\"</option>\\";\r\n}\r\n?>\r\n<input type=text name=writer value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[writer]))?>\\" size=\\"\\"> \r\n        <select name=\\"w_id\\" id=\\"select7\\" onchange=\\"document.add.writer.value=document.add.w_id.value\\">\r\n          <option>选择作者</option>\r\n		  <?=$w_class?>\r\n        </select>\r\n<input type=\\"button\\" name=\\"wbutton\\" value=\\"增加作者\\" onclick=\\"window.open(\\\'NewsSys/writer.php?addwritername=\\\'+document.add.writer.value);\\">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor=\\"#FFFFFF\\"> \r\n    <td height=\\"22\\" valign=\\"top\\"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name=\\"textfield\\" type=\\"text\\" id=\\"textfield\\" value=\\"[!--writer--]\\" size=\\"20\\">)</td>\r\n    <td><table width=\\"100%\\" border=\\"0\\" cellspacing=\\"1\\" cellpadding=\\"3\\">\r\n        <tr> \r\n          <td><textarea name=\\"add[zz_writer]\\" cols=\\"60\\" rows=\\"10\\" id=\\"textarea\\"><?=htmlspecialchars(stripSlashes($r[zz_writer]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name=\\"add[z_writer]\\" type=\\"text\\" id=\\"add[z_writer]\\" value=\\"<?=stripSlashes($r[z_writer])?>\\">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 2, 'CHAR', '30', 1, 7, 'article', 0, '', 0, 1, 1, '\r\n<input name=\\"writer\\" type=\\"text\\" id=\\"writer\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'writer\\\',stripSlashes($r[writer]))?>\\" size=\\"\\">\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (92, 'befrom', '信息来源', 'text', '\r\n<?php\r\n$befrom_sql=$empire->query(\\"select sitename from {$dbtbpre}enewsbefrom\\");\r\nwhile($b_r=$empire->fetch($befrom_sql))\r\n{\r\n	$b_class.=\\"<option value=\\\'\\".$b_r[sitename].\\"\\\'>\\".$b_r[sitename].\\"</option>\\";\r\n}\r\n?>\r\n<input type=\\"text\\" name=\\"befrom\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[befrom]))?>\\" size=\\"\\"> \r\n        <select name=\\"befrom_id\\" id=\\"befromid\\" onchange=\\"document.add.befrom.value=document.add.befrom_id.value\\">\r\n          <option>选择信息来源</option>\r\n          <?=$b_class?>\r\n        </select>\r\n<input type=\\"button\\" name=\\"wbutton\\" value=\\"增加来源\\" onclick=\\"window.open(\\\'NewsSys/BeFrom.php?addsitename=\\\'+document.add.befrom.value);\\">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor=\\"#FFFFFF\\"> \r\n    <td height=\\"22\\" valign=\\"top\\"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name=\\"textfield\\" type=\\"text\\" id=\\"textfield\\" value=\\"[!--befrom--]\\" size=\\"20\\">)</td>\r\n    <td><table width=\\"100%\\" border=\\"0\\" cellspacing=\\"1\\" cellpadding=\\"3\\">\r\n        <tr> \r\n          <td><textarea name=\\"add[zz_befrom]\\" cols=\\"60\\" rows=\\"10\\" id=\\"textarea\\"><?=htmlspecialchars(stripSlashes($r[zz_befrom]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name=\\"add[z_befrom]\\" type=\\"text\\" id=\\"add[z_befrom]\\" value=\\"<?=stripSlashes($r[z_befrom])?>\\">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 2, 'CHAR', '60', 1, 7, 'article', 0, '', 0, 1, 1, '\r\n<input name=\\"befrom\\" type=\\"text\\" id=\\"befrom\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'befrom\\\',stripSlashes($r[befrom]))?>\\" size=\\"\\">\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (93, 'newstext', '新闻正文', 'editor', '<?=ECMS_ShowEditorVar(\\"newstext\\",$ecmsfirstpost==1?\\"\\":stripSlashes($r[newstext]),\\"Default\\",\\"\\",\\"300\\",\\"100%\\")?>\r\n<table width=\\"100%\\" border=\\"0\\" cellpadding=\\"3\\" cellspacing=\\"1\\" bgcolor=\\"#DBEAF5\\">\r\n          <tr> \r\n            <td bgcolor=\\"#FFFFFF\\"> <input name=\\"dokey\\" type=\\"checkbox\\" value=\\"1\\"<?=$r[dokey]==1?\\\' checked\\\':\\\'\\\'?>>\r\n              关键字替换&nbsp;&nbsp; <input name=\\"copyimg\\" type=\\"checkbox\\" id=\\"copyimg\\" value=\\"1\\">\r\n      远程保存图片(\r\n      <input name=\\"mark\\" type=\\"checkbox\\" id=\\"mark\\" value=\\"1\\">\r\n      <a href=\\"SetEnews.php\\" target=\\"_blank\\">加水印</a>)&nbsp;&nbsp; \r\n      <input name=\\"copyflash\\" type=\\"checkbox\\" id=\\"copyflash\\" value=\\"1\\">\r\n      远程保存FLASH(地址前缀： \r\n      <input name=\\"qz_url\\" type=\\"text\\" id=\\"qz_url\\" size=\\"\\">\r\n              )</td>\r\n          </tr>\r\n          <tr>\r\n            \r\n    <td bgcolor=\\"#FFFFFF\\"><input name=\\"repimgnexturl\\" type=\\"checkbox\\" id=\\"repimgnexturl\\" value=\\"1\\"> 图片链接转为下一页&nbsp;&nbsp; <input name=\\"autopage\\" type=\\"checkbox\\" id=\\"autopage\\" value=\\"1\\">自动分页\r\n      ,每 \r\n      <input name=\\"autosize\\" type=\\"text\\" id=\\"autosize\\" value=\\"5000\\" size=\\"5\\">\r\n      个字节为一页&nbsp;&nbsp; 取第 \r\n      <input name=\\"getfirsttitlepic\\" type=\\"text\\" id=\\"getfirsttitlepic\\" value=\\"\\" size=\\"1\\">\r\n      张上传图为标题图片( \r\n      <input name=\\"getfirsttitlespic\\" type=\\"checkbox\\" id=\\"getfirsttitlespic\\" value=\\"1\\">\r\n      缩略图: 宽 \r\n      <input name=\\"getfirsttitlespicw\\" type=\\"text\\" id=\\"getfirsttitlespicw\\" size=\\"3\\" value=\\"<?=$public_r[spicwidth]?>\\">\r\n      *高\r\n      <input name=\\"getfirsttitlespich\\" type=\\"text\\" id=\\"getfirsttitlespich\\" size=\\"3\\" value=\\"<?=$public_r[spicheight]?>\\">\r\n      )</td>\r\n          </tr>\r\n        </table>\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor=\\"#FFFFFF\\"> \r\n    <td height=\\"22\\" valign=\\"top\\"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name=\\"textfield\\" type=\\"text\\" id=\\"textfield\\" value=\\"[!--newstext--]\\" size=\\"20\\">)</td>\r\n    <td><table width=\\"100%\\" border=\\"0\\" cellspacing=\\"1\\" cellpadding=\\"3\\">\r\n        <tr> \r\n          <td><textarea name=\\"add[zz_newstext]\\" cols=\\"60\\" rows=\\"10\\" id=\\"textarea\\"><?=htmlspecialchars(stripSlashes($r[zz_newstext]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name=\\"add[z_newstext]\\" type=\\"text\\" id=\\"add[z_newstext]\\" value=\\"<?=stripSlashes($r[z_newstext])?>\\">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 2, 'CHAR', '50', 1, 7, 'article', 1, '', 0, 1, 1, '<?=ECMS_ShowEditorVar(\\"newstext\\",$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'newstext\\\',stripSlashes($r[newstext])),\\"Default\\",\\"\\",\\"300\\",\\"100%\\")?>\r\n', 0, '', 0, '', 0, 1, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (94, 'title', '标题', 'text', '<table width=\\"100%\\" border=\\"0\\" cellpadding=\\"0\\" cellspacing=\\"0\\" bgcolor=\\"#DBEAF5\\">\r\n<tr> \r\n  <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">\r\n<?=$tts?\\"<select name=\\\'ttid\\\'><option value=\\\'0\\\'>标题分类</option>$tts</select>\\":\\"\\"?>\r\n	<input type=text name=title value=\\"<?=htmlspecialchars(stripSlashes($r[title]))?>\\" size=\\"60\\"> \r\n	<input type=\\"button\\" name=\\"button\\" value=\\"图文\\" onclick=\\"document.add.title.value=document.add.title.value+\\\'(图文)\\\';\\"> \r\n  </td>\r\n</tr>\r\n<tr> \r\n  <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">属性: \r\n	<input name=\\"titlefont[b]\\" type=\\"checkbox\\" value=\\"b\\"<?=$titlefontb?>>粗体\r\n	<input name=\\"titlefont[i]\\" type=\\"checkbox\\" value=\\"i\\"<?=$titlefonti?>>斜体\r\n	<input name=\\"titlefont[s]\\" type=\\"checkbox\\" value=\\"s\\"<?=$titlefonts?>>删除线\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;颜色: <input name=\\"titlecolor\\" type=\\"text\\" value=\\"<?=stripSlashes($r[titlecolor])?>\\" size=\\"10\\"><a onclick=\\"foreColor();\\"><img src=\\"../data/images/color.gif\\" width=\\"21\\" height=\\"21\\" align=\\"absbottom\\"></a>\r\n  </td>\r\n</tr>\r\n</table>', '标题', 0, 1, 1, '  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--title--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_title]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_title]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_title]" type="text" id="add[z_title]" value="<?=stripSlashes($r[z_title])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>', 0, 'VARCHAR', '200', 1, 8, 'info', 0, '', 0, 1, 1, '<input name=\\"title\\" type=\\"text\\" size=\\"42\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'title\\\',stripSlashes($r[title]))?>\\">', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (95, 'special.field', '特殊属性', '', '<table width=\\"100%\\" border=\\"0\\" cellpadding=\\"0\\" cellspacing=\\"0\\" bgcolor=\\"#DBEAF5\\">\r\n  <tr>\r\n    <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">信息属性: \r\n      <input name=\\"checked\\" type=\\"checkbox\\" value=\\"1\\"<?=$r[checked]?\\\' checked\\\':\\\'\\\'?>>\r\n      审核 &nbsp;&nbsp; 推荐 \r\n      <select name=\\"isgood\\" id=\\"isgood\\">\r\n        <option value=\\"0\\"<?=$r[isgood]==0?\\\' selected\\\':\\\'\\\'?>>不推荐</option>\r\n        <option value=\\"1\\"<?=$r[isgood]==1?\\\' selected\\\':\\\'\\\'?>>一级推荐</option>\r\n        <option value=\\"2\\"<?=$r[isgood]==2?\\\' selected\\\':\\\'\\\'?>>二级推荐</option>\r\n        <option value=\\"3\\"<?=$r[isgood]==3?\\\' selected\\\':\\\'\\\'?>>三级推荐</option>\r\n        <option value=\\"4\\"<?=$r[isgood]==4?\\\' selected\\\':\\\'\\\'?>>四级推荐</option>\r\n        <option value=\\"5\\"<?=$r[isgood]==5?\\\' selected\\\':\\\'\\\'?>>五级推荐</option>\r\n        <option value=\\"6\\"<?=$r[isgood]==6?\\\' selected\\\':\\\'\\\'?>>六级推荐</option>\r\n        <option value=\\"7\\"<?=$r[isgood]==7?\\\' selected\\\':\\\'\\\'?>>七级推荐</option>\r\n        <option value=\\"8\\"<?=$r[isgood]==8?\\\' selected\\\':\\\'\\\'?>>八级推荐</option>\r\n        <option value=\\"9\\"<?=$r[isgood]==9?\\\' selected\\\':\\\'\\\'?>>九级推荐</option>\r\n      </select>\r\n      &nbsp;&nbsp; 头条 \r\n      <select name=\\"firsttitle\\" id=\\"firsttitle\\">\r\n        <option value=\\"0\\"<?=$r[firsttitle]==0?\\\' selected\\\':\\\'\\\'?>>非头条</option>\r\n        <option value=\\"1\\"<?=$r[firsttitle]==1?\\\' selected\\\':\\\'\\\'?>>一级头条</option>\r\n        <option value=\\"2\\"<?=$r[firsttitle]==2?\\\' selected\\\':\\\'\\\'?>>二级头条</option>\r\n        <option value=\\"3\\"<?=$r[firsttitle]==3?\\\' selected\\\':\\\'\\\'?>>三级头条</option>\r\n        <option value=\\"4\\"<?=$r[firsttitle]==4?\\\' selected\\\':\\\'\\\'?>>四级头条</option>\r\n        <option value=\\"5\\"<?=$r[firsttitle]==5?\\\' selected\\\':\\\'\\\'?>>五级头条</option>\r\n        <option value=\\"6\\"<?=$r[firsttitle]==6?\\\' selected\\\':\\\'\\\'?>>六级头条</option>\r\n        <option value=\\"7\\"<?=$r[firsttitle]==7?\\\' selected\\\':\\\'\\\'?>>七级头条</option>\r\n        <option value=\\"8\\"<?=$r[firsttitle]==8?\\\' selected\\\':\\\'\\\'?>>八级头条</option>\r\n        <option value=\\"9\\"<?=$r[firsttitle]==9?\\\' selected\\\':\\\'\\\'?>>九级头条</option>\r\n      </select></td>\r\n  </tr>\r\n  <tr> \r\n    <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">关键字&nbsp;&nbsp;&nbsp;: \r\n      <input name=\\"keyboard\\" type=\\"text\\" size=\\"52\\" value=\\"<?=stripSlashes($r[keyboard])?>\\">\r\n      <font color=\\"#666666\\">(多个请用&quot;,&quot;隔开)</font></td>\r\n  </tr>\r\n  <tr> \r\n    <td height=\\"25\\" bgcolor=\\"#FFFFFF\\">外部链接: \r\n      <input name=\\"titleurl\\" type=\\"text\\" value=\\"<?=stripSlashes($r[titleurl])?>\\" size=\\"52\\">\r\n      <font color=\\"#666666\\">(填写后信息连接地址将为此链接)</font></td>\r\n  </tr>\r\n</table>\r\n', '特殊属性', 0, 1, 0, '', 0, '', '', 0, 8, 'info', 0, '', 0, 1, 1, '关键字: \r\n      <input name=\\"keyboard\\" type=\\"text\\" value=\\"<?=stripSlashes($r[keyboard])?>\\">\r\n      <font color=\\"#666666\\">(多个请用&quot;,&quot;隔开)</font>', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (96, 'titlepic', '标题图片', 'img', '\r\n<input name=\\"titlepic\\" type=\\"text\\" id=\\"titlepic\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[titlepic]))?>\\" size=\\"45\\">\r\n<a onclick=\\"window.open(\\\'ecmseditor/FileMain.php?type=1&classid=<?=$classid?>&filepass=<?=$filepass?>&doing=1&field=titlepic\\\',\\\'\\\',\\\'width=700,height=550,scrollbars=yes\\\');\\" title=\\"选择已上传的图片\\"><img src=\\"../data/images/changeimg.gif\\" border=\\"0\\" align=\\"absbottom\\"></a> \r\n', '标题图片', 0, 1, 1, '\r\n  <tr bgcolor=\\"#FFFFFF\\"> \r\n    <td height=\\"22\\" valign=\\"top\\"><strong>[!--enews.name--]正则：</strong><br>\r\n      ( \r\n      <input name=\\"textfield\\" type=\\"text\\" id=\\"textfield\\" value=\\"[!--titlepic--]\\" size=\\"20\\">\r\n      )</td>\r\n    <td><table width=\\"100%\\" border=\\"0\\" cellspacing=\\"1\\" cellpadding=\\"3\\">\r\n    <tr>\r\n      <td>附件前缀 \r\n        <input name=\\"add[qz_titlepic]\\" type=\\"text\\" id=\\"add[qz_titlepic]\\" value=\\"<?=stripSlashes($r[qz_titlepic])?>\\"> \r\n        <input name=\\"add[save_titlepic]\\" type=\\"checkbox\\" id=\\"add[save_titlepic]\\" value=\\" checked\\"<?=$r[save_titlepic]?>>\r\n        远程保存 </td>\r\n    </tr>\r\n    <tr> \r\n      <td><textarea name=\\"add[zz_titlepic]\\" cols=\\"60\\" rows=\\"10\\" id=\\"add[zz_titlepic]\\"><?=htmlspecialchars(stripSlashes($r[zz_titlepic]))?></textarea></td>\r\n    </tr>\r\n    <tr> \r\n      <td><input name=\\"add[z_titlepic]\\" type=\\"text\\" id=\\"titlepic5\\" value=\\"<?=stripSlashes($r[z_titlepic])?>\\">\r\n        (如填写这里，这就是字段的值)</td>\r\n    </tr>\r\n  </table></td>\r\n  </tr>\r\n', 1, 'VARCHAR', '200', 1, 8, 'info', 0, '', 0, 1, 1, '\r\n<input type=\\"file\\" name=\\"titlepicfile\\" size=\\"45\\">\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (97, 'newstime', '发布时间', 'text', '<input name=\\"newstime\\" type=\\"text\\" value=\\"<?=$r[newstime]?>\\"><input type=button name=button value=\\"设为当前时间\\" onclick=\\"document.add.newstime.value=\\\'<?=$todaytime?>\\\'\\">', '发布时间', 0, 1, 1, '  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--newstime--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_newstime]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_newstime]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_newstime]" type="text" id="add[z_newstime]" value="<?=stripSlashes($r[z_newstime])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>', 0, 'INT', '10', 1, 8, 'info', 0, '', 0, 1, 1, '', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (98, 'smalltext', '信息内容', 'textarea', '<textarea name=\\"smalltext\\" cols=\\"80\\" rows=\\"10\\" id=\\"smalltext\\"><?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[smalltext]))?></textarea>\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--smalltext--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_smalltext]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_smalltext]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_smalltext]" type="text" id="add[z_smalltext]" value="<?=stripSlashes($r[z_smalltext])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 0, 'TEXT', '', 1, 8, 'info', 0, '', 0, 1, 1, '<textarea name=\\"smalltext\\" cols=\\"60\\" rows=\\"10\\" id=\\"smalltext\\"><?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'smalltext\\\',stripSlashes($r[smalltext]))?></textarea>\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 1);
INSERT INTO `phome_enewsf` VALUES (99, 'myarea', '所在地', 'select', '<select name=\\"myarea\\" id=\\"myarea\\" size=6 style=\\"width=150\\"><option value=\\"东城区\\"<?=$r[myarea]==\\"东城区\\"||$ecmsfirstpost==1?\\\' selected\\\':\\\'\\\'?>>东城区</option><option value=\\"西城区\\"<?=$r[myarea]==\\"西城区\\"?\\\' selected\\\':\\\'\\\'?>>西城区</option><option value=\\"崇文区\\"<?=$r[myarea]==\\"崇文区\\"?\\\' selected\\\':\\\'\\\'?>>崇文区</option><option value=\\"宣武区\\"<?=$r[myarea]==\\"宣武区\\"?\\\' selected\\\':\\\'\\\'?>>宣武区</option><option value=\\"朝阳区\\"<?=$r[myarea]==\\"朝阳区\\"?\\\' selected\\\':\\\'\\\'?>>朝阳区</option><option value=\\"海淀区\\"<?=$r[myarea]==\\"海淀区\\"?\\\' selected\\\':\\\'\\\'?>>海淀区</option><option value=\\"丰台区\\"<?=$r[myarea]==\\"丰台区\\"?\\\' selected\\\':\\\'\\\'?>>丰台区</option><option value=\\"石景山区\\"<?=$r[myarea]==\\"石景山区\\"?\\\' selected\\\':\\\'\\\'?>>石景山区</option><option value=\\"通州区\\"<?=$r[myarea]==\\"通州区\\"?\\\' selected\\\':\\\'\\\'?>>通州区</option><option value=\\"昌平区\\"<?=$r[myarea]==\\"昌平区\\"?\\\' selected\\\':\\\'\\\'?>>昌平区</option><option value=\\"大兴区\\"<?=$r[myarea]==\\"大兴区\\"?\\\' selected\\\':\\\'\\\'?>>大兴区</option><option value=\\"其它\\"<?=$r[myarea]==\\"其它\\"?\\\' selected\\\':\\\'\\\'?>>其它</option></select>', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--myarea--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_myarea]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_myarea]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_myarea]" type="text" id="add[z_myarea]" value="<?=stripSlashes($r[z_myarea])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 1, 'VARCHAR', '30', 1, 8, 'info', 0, '东城区:default|西城区|崇文区|宣武区|朝阳区|海淀区|丰台区|石景山区|通州区|昌平区|大兴区|其它', 0, 1, 1, '<select name=\\"myarea\\" id=\\"myarea\\" size=6 style=\\"width=150\\"><option value=\\"东城区\\"<?=$r[myarea]==\\"东城区\\"||$ecmsfirstpost==1?\\\' selected\\\':\\\'\\\'?>>东城区</option><option value=\\"西城区\\"<?=$r[myarea]==\\"西城区\\"?\\\' selected\\\':\\\'\\\'?>>西城区</option><option value=\\"崇文区\\"<?=$r[myarea]==\\"崇文区\\"?\\\' selected\\\':\\\'\\\'?>>崇文区</option><option value=\\"宣武区\\"<?=$r[myarea]==\\"宣武区\\"?\\\' selected\\\':\\\'\\\'?>>宣武区</option><option value=\\"朝阳区\\"<?=$r[myarea]==\\"朝阳区\\"?\\\' selected\\\':\\\'\\\'?>>朝阳区</option><option value=\\"海淀区\\"<?=$r[myarea]==\\"海淀区\\"?\\\' selected\\\':\\\'\\\'?>>海淀区</option><option value=\\"丰台区\\"<?=$r[myarea]==\\"丰台区\\"?\\\' selected\\\':\\\'\\\'?>>丰台区</option><option value=\\"石景山区\\"<?=$r[myarea]==\\"石景山区\\"?\\\' selected\\\':\\\'\\\'?>>石景山区</option><option value=\\"通州区\\"<?=$r[myarea]==\\"通州区\\"?\\\' selected\\\':\\\'\\\'?>>通州区</option><option value=\\"昌平区\\"<?=$r[myarea]==\\"昌平区\\"?\\\' selected\\\':\\\'\\\'?>>昌平区</option><option value=\\"大兴区\\"<?=$r[myarea]==\\"大兴区\\"?\\\' selected\\\':\\\'\\\'?>>大兴区</option><option value=\\"其它\\"<?=$r[myarea]==\\"其它\\"?\\\' selected\\\':\\\'\\\'?>>其它</option></select>', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (100, 'email', '邮箱', 'text', '<input name=\\"email\\" type=\\"text\\" id=\\"email\\" value=\\"<?=$ecmsfirstpost==1?$memberinfor[$user_email]:htmlspecialchars(stripSlashes($r[email]))?>\\" size=\\"60\\">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--email--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_email]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_email]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_email]" type="text" id="add[z_email]" value="<?=stripSlashes($r[z_email])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 2, 'VARCHAR', '80', 1, 8, 'info', 0, '$memberinfor[$user_email]', 0, 1, 1, '<input name=\\"email\\" type=\\"text\\" id=\\"email\\" value=\\"<?=$ecmsfirstpost==1?$memberinfor[$user_email]:DoReqValue($mid,\\\'email\\\',stripSlashes($r[email]))?>\\" size=\\"46\\">\r\n', 0, '', 0, '46', 1, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (101, 'mycontact', '联系方式', 'text', '<input name=\\"mycontact\\" type=\\"text\\" size=60 id=\\"mycontact\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[mycontact]))?>\\">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--mycontact--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_mycontact]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_mycontact]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_mycontact]" type="text" id="add[z_mycontact]" value="<?=stripSlashes($r[z_mycontact])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 2, 'VARCHAR', '255', 1, 8, 'info', 0, '', 0, 1, 1, '<input name=\\"mycontact\\" type=\\"text\\" size=46 id=\\"mycontact\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'mycontact\\\',stripSlashes($r[mycontact]))?>\\">\r\n', 0, '', 0, '', 1, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (102, 'address', '联系地址', 'text', '<input name=\\"address\\" type=\\"text\\" id=\\"address\\" value=\\"<?=$ecmsfirstpost==1?$memberinfor[address]:htmlspecialchars(stripSlashes($r[address]))?>\\" size=\\"60\\">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--address--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_address]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_address]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_address]" type="text" id="add[z_address]" value="<?=stripSlashes($r[z_address])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 2, 'VARCHAR', '255', 1, 8, 'info', 0, '$memberinfor[address]', 0, 1, 1, '<input name=\\"address\\" type=\\"text\\" id=\\"address\\" value=\\"<?=$ecmsfirstpost==1?$memberinfor[address]:DoReqValue($mid,\\\'address\\\',stripSlashes($r[address]))?>\\" size=\\"46\\">\r\n', 0, '', 0, '46', 1, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (103, 'playerid', '播放器', 'text', '\r\n<?php\r\n$player_sql=$empire->query(\\"select id,player from {$dbtbpre}enewsplayer\\");\r\nwhile($player_r=$empire->fetch($player_sql))\r\n{\r\n	$select_player=\\\'\\\';\r\n	if($r[playerid]==$player_r[id])\r\n	{\r\n		$select_player=\\\' selected\\\';\r\n	}\r\n	$player_class.=\\"<option value=\\\'\\".$player_r[id].\\"\\\'\\".$select_player.\\">\\".$player_r[player].\\"</option>\\";\r\n}\r\n?>\r\n<select name=\\"playerid\\">\r\n<option value=0>自动识别</option>\r\n<?=$player_class?>\r\n</select>\r\n', '视频播放器', 1, 1, 1, '\r\n<?php\r\n$player_sql=$empire->query(\\"select id,player from {$dbtbpre}enewsplayer\\");\r\nwhile($player_r=$empire->fetch($player_sql))\r\n{\r\n	$select_player=\\\'\\\';\r\n	if($r[playerid]==$player_r[id])\r\n	{\r\n		$select_player=\\\' selected\\\';\r\n	}\r\n	$player_class.=\\"<option value=\\\'\\".$player_r[id].\\"\\\'\\".$select_player.\\">\\".$player_r[player].\\"</option>\\";\r\n}\r\n?>\r\n  <tr bgcolor=\\"#FFFFFF\\"> \r\n    <td height=\\"22\\" valign=\\"top\\"><strong>[!--enews.name--]：</strong><br>\r\n      (<input name=\\"textfield\\" type=\\"text\\" id=\\"textfield\\" value=\\"[!--playerid--]\\" size=\\"20\\">)</td>\r\n    <td><select name=\\"add[z_playerid]\\"><option value=0>自动识别</option><?=$player_class?></select></td>\r\n  </tr>\r\n', 1, 'SMALLINT', '', 1, 5, 'movie', 0, '', 0, 1, 1, '\r\n<?php\r\n$player_sql=$empire->query(\\"select id,player from {$dbtbpre}enewsplayer\\");\r\nwhile($player_r=$empire->fetch($player_sql))\r\n{\r\n	$select_player=\\\'\\\';\r\n	if($r[playerid]==$player_r[id])\r\n	{\r\n		$select_player=\\\' selected\\\';\r\n	}\r\n	$player_class.=\\"<option value=\\\'\\".$player_r[id].\\"\\\'\\".$select_player.\\">\\".$player_r[player].\\"</option>\\";\r\n}\r\n?>\r\n<select name=\\"playerid\\">\r\n<option value=0>自动识别</option>\r\n<?=$player_class?>\r\n</select>\r\n', 0, '', 0, '', 1, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (104, 'diggtop', '顶', 'text', '<input name=\\"diggtop\\" type=\\"text\\" id=\\"diggtop\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($r[diggtop]))?>\\">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--diggtop--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_diggtop]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_diggtop]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_diggtop]" type="text" id="add[z_diggtop]" value="<?=stripSlashes($r[z_diggtop])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 3, 'INT', '', 1, 1, 'news', 0, '', 0, 1, 1, '<input name=\\"diggtop\\" type=\\"text\\" id=\\"diggtop\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":DoReqValue($mid,\\\'diggtop\\\',stripSlashes($r[diggtop]))?>\\">\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);
INSERT INTO `phome_enewsf` VALUES (105, 'diggtop', '顶', 'text', '\r\n<input name="diggtop" type="text" id="diggtop" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($r[diggtop]))?>" size="">\r\n', '', 1, 1, 1, '\r\n  <tr bgcolor="#FFFFFF"> \r\n    <td height="22" valign="top"><strong>[!--enews.name--]正则：</strong><br>\r\n      (<input name="textfield" type="text" id="textfield" value="[!--diggtop--]" size="20">)</td>\r\n    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">\r\n        <tr> \r\n          <td><textarea name="add[zz_diggtop]" cols="60" rows="10" id="textarea"><?=htmlspecialchars(stripSlashes($r[zz_diggtop]))?></textarea></td>\r\n        </tr>\r\n        <tr> \r\n          <td><input name="add[z_diggtop]" type="text" id="add[z_diggtop]" value="<?=stripSlashes($r[z_diggtop])?>">\r\n            (如填写这里，将为字段的值)</td>\r\n        </tr>\r\n      </table></td>\r\n  </tr>\r\n', 3, 'INT', '', 1, 7, 'article', 0, '', 0, 1, 1, '\r\n<input name="diggtop" type="text" id="diggtop" value="<?=$ecmsfirstpost==1?"":DoReqValue($mid,\'diggtop\',stripSlashes($r[diggtop]))?>" size="">\r\n', 0, '', 0, '', 0, 0, '', '', '', '', '', '', 0, 0);

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsfava`;
CREATE TABLE `phome_enewsfava` (
  `favaid` bigint(20) NOT NULL auto_increment,
  `id` int(11) NOT NULL default '0',
  `favatime` datetime NOT NULL default '0000-00-00 00:00:00',
  `userid` int(11) NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `classid` smallint(6) NOT NULL default '0',
  `cid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`favaid`),
  KEY `userid` (`userid`),
  KEY `cid` (`cid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsfavaclass`;
CREATE TABLE `phome_enewsfavaclass` (
  `cid` int(11) NOT NULL auto_increment,
  `cname` varchar(30) NOT NULL default '',
  `userid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`cid`),
  KEY `userid` (`userid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsfeedback`;
CREATE TABLE `phome_enewsfeedback` (
  `id` int(11) NOT NULL auto_increment,
  `bid` smallint(6) NOT NULL default '0',
  `title` varchar(120) NOT NULL default '',
  `saytext` text NOT NULL,
  `name` varchar(30) NOT NULL default '',
  `email` varchar(80) NOT NULL default '',
  `call` varchar(30) NOT NULL default '',
  `homepage` varchar(160) NOT NULL default '',
  `company` varchar(80) NOT NULL default '',
  `address` varchar(255) NOT NULL default '',
  `saytime` datetime NOT NULL default '0000-00-00 00:00:00',
  `job` varchar(36) NOT NULL default '',
  `ip` varchar(20) NOT NULL default '',
  `filepath` varchar(20) NOT NULL default '',
  `filename` text NOT NULL,
  `userid` int(11) NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `bid` (`bid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsfeedbackclass`;
CREATE TABLE `phome_enewsfeedbackclass` (
  `bid` smallint(6) NOT NULL auto_increment,
  `bname` varchar(60) NOT NULL default '',
  `btemp` mediumtext NOT NULL,
  `bzs` varchar(255) NOT NULL default '',
  `enter` text NOT NULL,
  `mustenter` text NOT NULL,
  `filef` varchar(255) NOT NULL default '',
  `groupid` smallint(6) NOT NULL default '0',
  `checkboxf` text NOT NULL,
  `usernames` text NOT NULL,
  PRIMARY KEY  (`bid`)
) TYPE=MyISAM;

INSERT INTO `phome_enewsfeedbackclass` VALUES (1, '默认反馈分类', '[!--cp.header--]\r\n<table width=100% align=center cellpadding=3 cellspacing=1 class=\\"tableborder\\">\r\n  <form name=\\\'feedback\\\' method=\\\'post\\\' enctype=\\\'multipart/form-data\\\' action=\\\'../../enews/index.php\\\'>\r\n    <input name=\\\'enews\\\' type=\\\'hidden\\\' value=\\\'AddFeedback\\\'>\r\n    <tr>\r\n      <td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'><div align=\\"right\\">您的姓名:</div></td>\r\n      <td bgcolor=\\\'ffffff\\\'><input name=\\\'name\\\' type=\\\'text\\\' size=\\\'42\\\'>\r\n        (*)</td>\r\n    </tr>\r\n    <tr>\r\n      <td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'><div align=\\"right\\">职务:</div></td>\r\n      <td bgcolor=\\\'ffffff\\\'><input name=\\\'job\\\' type=\\\'text\\\' size=\\\'42\\\'></td>\r\n    </tr>\r\n    <tr>\r\n      <td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'><div align=\\"right\\">公司名称:</div></td>\r\n      <td bgcolor=\\\'ffffff\\\'><input name=\\\'company\\\' type=\\\'text\\\' size=\\\'42\\\'></td>\r\n    </tr>\r\n    <tr>\r\n      <td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'><div align=\\"right\\">联系邮箱:</div></td>\r\n      <td bgcolor=\\\'ffffff\\\'><input name=\\\'email\\\' type=\\\'text\\\' size=\\\'42\\\'></td>\r\n    </tr>\r\n    <tr>\r\n      <td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'><div align=\\"right\\">联系电话:</div></td>\r\n      <td bgcolor=\\\'ffffff\\\'><input name=\\\'call\\\' type=\\\'text\\\' size=\\\'42\\\'>\r\n        (*)</td>\r\n    </tr>\r\n    <tr>\r\n      <td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'><div align=\\"right\\">网站:</div></td>\r\n      <td bgcolor=\\\'ffffff\\\'><input name=\\\'homepage\\\' type=\\\'text\\\' size=\\\'42\\\'></td>\r\n    </tr>\r\n    <tr>\r\n      <td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'><div align=\\"right\\">联系地址:</div></td>\r\n      <td bgcolor=\\\'ffffff\\\'><input name=\\\'address\\\' type=\\\'text\\\' size=\\"42\\"></td>\r\n    </tr>\r\n    <tr>\r\n      <td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'><div align=\\"right\\">信息标题:</div></td>\r\n      <td bgcolor=\\\'ffffff\\\'><input name=\\\'title\\\' type=\\\'text\\\' size=\\"42\\"> (*)</td>\r\n    </tr>\r\n    <tr> \r\n      <td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'><div align=\\"right\\">信息内容(*):</div></td>\r\n      <td bgcolor=\\\'ffffff\\\'><textarea name=\\\'saytext\\\' cols=\\\'60\\\' rows=\\\'12\\\'></textarea> \r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td bgcolor=\\\'ffffff\\\'></td>\r\n      <td bgcolor=\\\'ffffff\\\'><input type=\\\'submit\\\' name=\\\'submit\\\' value=\\\'提交\\\'></td>\r\n    </tr>\r\n  </form>\r\n</table>\r\n[!--cp.footer--]', '', '您的姓名<!--field--->name<!--record-->职务<!--field--->job<!--record-->公司名称<!--field--->company<!--record-->联系邮箱<!--field--->email<!--record-->联系电话<!--field--->call<!--record-->网站<!--field--->homepage<!--record-->联系地址<!--field--->address<!--record-->信息标题<!--field--->title<!--record-->信息内容<!--field--->saytext<!--record-->', ',name,call,title,saytext,', ',', 0, '', '');

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsfeedbackf`;
CREATE TABLE `phome_enewsfeedbackf` (
  `fid` smallint(6) NOT NULL auto_increment,
  `f` varchar(30) NOT NULL default '',
  `fname` varchar(30) NOT NULL default '',
  `fform` varchar(20) NOT NULL default '',
  `fzs` varchar(255) NOT NULL default '',
  `myorder` smallint(6) NOT NULL default '0',
  `ftype` varchar(30) NOT NULL default '',
  `flen` varchar(20) NOT NULL default '',
  `fformsize` varchar(12) NOT NULL default '',
  `fvalue` text NOT NULL,
  PRIMARY KEY  (`fid`)
) TYPE=MyISAM;

INSERT INTO `phome_enewsfeedbackf` VALUES (1, 'title', '标题', 'text', '', 7, 'VARCHAR', '120', '', '');
INSERT INTO `phome_enewsfeedbackf` VALUES (2, 'saytext', '内容', 'textarea', '', 8, 'TEXT', '', '', '');
INSERT INTO `phome_enewsfeedbackf` VALUES (3, 'name', '姓名', 'text', '', 0, 'VARCHAR', '30', '', '');
INSERT INTO `phome_enewsfeedbackf` VALUES (4, 'email', '邮箱', 'text', '', 3, 'VARCHAR', '80', '', '');
INSERT INTO `phome_enewsfeedbackf` VALUES (5, 'call', '电话', 'text', '', 4, 'VARCHAR', '30', '', '');
INSERT INTO `phome_enewsfeedbackf` VALUES (6, 'homepage', '网站', 'text', '', 5, 'VARCHAR', '160', '', '');
INSERT INTO `phome_enewsfeedbackf` VALUES (7, 'company', '公司名称', 'text', '', 2, 'VARCHAR', '80', '', '');
INSERT INTO `phome_enewsfeedbackf` VALUES (8, 'address', '联系地址', 'text', '', 6, 'VARCHAR', '255', '', '');
INSERT INTO `phome_enewsfeedbackf` VALUES (9, 'job', '职务', 'text', '', 1, 'VARCHAR', '36', '', '');

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsfile`;
CREATE TABLE `phome_enewsfile` (
  `fileid` int(11) NOT NULL auto_increment,
  `filename` varchar(60) NOT NULL default '',
  `filesize` int(11) NOT NULL default '0',
  `path` varchar(20) NOT NULL default '',
  `adduser` varchar(30) NOT NULL default '',
  `filetime` datetime NOT NULL default '0000-00-00 00:00:00',
  `classid` smallint(6) NOT NULL default '0',
  `no` varchar(60) NOT NULL default '',
  `type` tinyint(4) NOT NULL default '0',
  `onclick` int(11) NOT NULL default '0',
  `id` bigint(20) NOT NULL default '0',
  `cjid` bigint(20) NOT NULL default '0',
  `fpath` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`fileid`),
  KEY `id` (`id`),
  KEY `type` (`type`),
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsgbook`;
CREATE TABLE `phome_enewsgbook` (
  `lyid` int(11) NOT NULL auto_increment,
  `name` varchar(30) NOT NULL default '',
  `email` varchar(80) NOT NULL default '',
  `call` varchar(30) NOT NULL default '',
  `lytime` datetime NOT NULL default '0000-00-00 00:00:00',
  `lytext` text NOT NULL,
  `retext` text NOT NULL,
  `bid` smallint(6) NOT NULL default '0',
  `ip` varchar(20) NOT NULL default '',
  `checked` tinyint(1) NOT NULL default '0',
  `userid` int(11) NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`lyid`),
  KEY `bid` (`bid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsgbookclass`;
CREATE TABLE `phome_enewsgbookclass` (
  `bid` smallint(6) NOT NULL auto_increment,
  `bname` varchar(60) NOT NULL default '',
  `checked` tinyint(1) NOT NULL default '0',
  `groupid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`bid`)
) TYPE=MyISAM;

INSERT INTO `phome_enewsgbookclass` VALUES (1, '默认留言分类', 0, 0);

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsgfenip`;
CREATE TABLE `phome_enewsgfenip` (
  `ip` varchar(20) NOT NULL default '',
  `addtime` int(11) NOT NULL default '0',
  UNIQUE KEY `ip` (`ip`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsgroup`;
CREATE TABLE `phome_enewsgroup` (
  `groupid` smallint(6) NOT NULL auto_increment,
  `groupname` varchar(50) NOT NULL default '',
  `dopublic` tinyint(1) NOT NULL default '0',
  `doclass` tinyint(1) NOT NULL default '0',
  `dotemplate` tinyint(1) NOT NULL default '0',
  `dopicnews` tinyint(1) NOT NULL default '0',
  `dofile` tinyint(1) NOT NULL default '0',
  `douser` tinyint(1) NOT NULL default '0',
  `dolog` tinyint(1) NOT NULL default '0',
  `domember` tinyint(1) NOT NULL default '0',
  `dobefrom` tinyint(1) NOT NULL default '0',
  `doword` tinyint(1) NOT NULL default '0',
  `dokey` tinyint(1) NOT NULL default '0',
  `doad` tinyint(1) NOT NULL default '0',
  `dovote` tinyint(1) NOT NULL default '0',
  `dogroup` tinyint(1) NOT NULL default '0',
  `doall` tinyint(1) NOT NULL default '0',
  `docj` tinyint(1) NOT NULL default '0',
  `dobq` tinyint(1) NOT NULL default '0',
  `domovenews` tinyint(1) NOT NULL default '0',
  `dopostdata` tinyint(1) NOT NULL default '0',
  `dochangedata` tinyint(1) NOT NULL default '0',
  `dopl` tinyint(1) NOT NULL default '0',
  `dof` tinyint(1) NOT NULL default '0',
  `dom` tinyint(1) NOT NULL default '0',
  `dodo` tinyint(1) NOT NULL default '0',
  `dodbdata` tinyint(1) NOT NULL default '0',
  `dorepnewstext` tinyint(1) NOT NULL default '0',
  `dotempvar` tinyint(1) NOT NULL default '0',
  `dostats` tinyint(1) NOT NULL default '0',
  `dowriter` tinyint(1) NOT NULL default '0',
  `dototaldata` tinyint(1) NOT NULL default '0',
  `dosearchkey` tinyint(1) NOT NULL default '0',
  `dozt` tinyint(1) NOT NULL default '0',
  `docard` tinyint(1) NOT NULL default '0',
  `dolink` tinyint(1) NOT NULL default '0',
  `doselfinfo` tinyint(1) NOT NULL default '0',
  `doexecsql` tinyint(1) NOT NULL default '0',
  `dotable` tinyint(1) NOT NULL default '0',
  `dodownurl` tinyint(1) NOT NULL default '0',
  `dodeldownrecord` tinyint(1) NOT NULL default '0',
  `doshoppayfs` tinyint(1) NOT NULL default '0',
  `doshopps` tinyint(1) NOT NULL default '0',
  `doshopdd` tinyint(1) NOT NULL default '0',
  `dogbook` tinyint(1) NOT NULL default '0',
  `dofeedback` tinyint(1) NOT NULL default '0',
  `douserpage` tinyint(1) NOT NULL default '0',
  `donotcj` tinyint(1) NOT NULL default '0',
  `dodownerror` tinyint(1) NOT NULL default '0',
  `dodelinfodata` tinyint(1) NOT NULL default '0',
  `doaddinfo` tinyint(1) NOT NULL default '0',
  `doeditinfo` tinyint(1) NOT NULL default '0',
  `dodelinfo` tinyint(1) NOT NULL default '0',
  `doadminstyle` tinyint(1) NOT NULL default '0',
  `dorepdownpath` tinyint(1) NOT NULL default '0',
  `douserjs` tinyint(1) NOT NULL default '0',
  `douserlist` tinyint(1) NOT NULL default '0',
  `domsg` tinyint(1) NOT NULL default '0',
  `dosendemail` tinyint(1) NOT NULL default '0',
  `dosetmclass` tinyint(1) NOT NULL default '0',
  `doinfodoc` tinyint(1) NOT NULL default '0',
  `dotempgroup` tinyint(1) NOT NULL default '0',
  `dofeedbackf` tinyint(1) NOT NULL default '0',
  `dotask` tinyint(1) NOT NULL default '0',
  `domemberf` tinyint(1) NOT NULL default '0',
  `dospacestyle` tinyint(1) NOT NULL default '0',
  `dospacedata` tinyint(1) NOT NULL default '0',
  `dovotemod` tinyint(1) NOT NULL default '0',
  `doplayer` tinyint(1) NOT NULL default '0',
  `dowap` tinyint(1) NOT NULL default '0',
  `dopay` tinyint(1) NOT NULL default '0',
  `dobuygroup` tinyint(1) NOT NULL default '0',
  `dosearchall` tinyint(1) NOT NULL default '0',
  `doinfotype` tinyint(1) NOT NULL default '0',
  `doplf` tinyint(1) NOT NULL default '0',
  `dopltable` tinyint(1) NOT NULL default '0',
  `dochadminstyle` tinyint(1) NOT NULL default '0',
  `dotags` tinyint(1) NOT NULL default '0',
  `dosp` tinyint(1) NOT NULL default '0',
  `doyh` tinyint(1) NOT NULL default '0',
  `dofirewall` tinyint(1) NOT NULL default '0',
  `dosetsafe` tinyint(1) NOT NULL default '0',
  `douserclass` tinyint(1) NOT NULL default '0',
  `doworkflow` tinyint(1) NOT NULL default '0',
  `domenu` tinyint(1) NOT NULL default '0',
  `dopubvar` tinyint(1) NOT NULL default '0',
  `doclassf` tinyint(1) NOT NULL default '0',
  `doztf` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`groupid`)
) TYPE=MyISAM;

INSERT INTO `phome_enewsgroup` VALUES (1, '超级管理员', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewshy`;
CREATE TABLE `phome_enewshy` (
  `fid` bigint(20) NOT NULL auto_increment,
  `userid` int(11) NOT NULL default '0',
  `fname` varchar(30) NOT NULL default '',
  `cid` int(11) NOT NULL default '0',
  `fsay` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`fid`),
  KEY `userid` (`userid`),
  KEY `cid` (`cid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewshyclass`;
CREATE TABLE `phome_enewshyclass` (
  `cid` int(11) NOT NULL auto_increment,
  `cname` varchar(30) NOT NULL default '',
  `userid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`cid`),
  KEY `userid` (`userid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsinfoclass`;
CREATE TABLE `phome_enewsinfoclass` (
  `classid` int(11) NOT NULL auto_increment,
  `bclassid` int(11) NOT NULL default '0',
  `classname` varchar(100) NOT NULL default '',
  `infourl` mediumtext NOT NULL,
  `newsclassid` smallint(6) NOT NULL default '0',
  `startday` date NOT NULL default '0000-00-00',
  `endday` date NOT NULL default '0000-00-00',
  `bz` text NOT NULL,
  `num` smallint(6) NOT NULL default '0',
  `copyimg` tinyint(1) NOT NULL default '0',
  `renum` smallint(6) NOT NULL default '0',
  `keyboard` text NOT NULL,
  `oldword` text NOT NULL,
  `newword` text NOT NULL,
  `titlelen` smallint(6) NOT NULL default '0',
  `retitlewriter` tinyint(1) NOT NULL default '0',
  `smalltextlen` smallint(6) NOT NULL default '0',
  `zz_smallurl` text NOT NULL,
  `zz_newsurl` text NOT NULL,
  `httpurl` varchar(255) NOT NULL default '',
  `repad` text NOT NULL,
  `imgurl` varchar(255) NOT NULL default '',
  `relistnum` smallint(6) NOT NULL default '0',
  `zz_titlepicl` text NOT NULL,
  `z_titlepicl` varchar(255) NOT NULL default '',
  `qz_titlepicl` varchar(255) NOT NULL default '',
  `save_titlepicl` varchar(10) NOT NULL default '',
  `keynum` tinyint(4) NOT NULL default '0',
  `insertnum` smallint(6) NOT NULL default '0',
  `copyflash` tinyint(1) NOT NULL default '0',
  `tid` smallint(6) NOT NULL default '0',
  `tbname` varchar(60) NOT NULL default '',
  `pagetype` tinyint(1) NOT NULL default '0',
  `smallpagezz` text NOT NULL,
  `pagezz` text NOT NULL,
  `smallpageallzz` text NOT NULL,
  `pageallzz` text NOT NULL,
  `mark` tinyint(1) NOT NULL default '0',
  `enpagecode` tinyint(1) NOT NULL default '0',
  `recjtheurl` tinyint(1) NOT NULL default '0',
  `hiddenload` tinyint(1) NOT NULL default '0',
  `justloadin` tinyint(1) NOT NULL default '0',
  `justloadcheck` tinyint(1) NOT NULL default '0',
  `delloadinfo` tinyint(1) NOT NULL default '0',
  `pagerepad` mediumtext NOT NULL,
  `newsztid` text NOT NULL,
  `getfirstpic` tinyint(4) NOT NULL default '0',
  `oldpagerep` text NOT NULL,
  `newpagerep` text NOT NULL,
  `keeptime` smallint(6) NOT NULL default '0',
  `lasttime` int(11) NOT NULL default '0',
  `newstextisnull` tinyint(1) NOT NULL default '0',
  `getfirstspic` tinyint(1) NOT NULL default '0',
  `getfirstspicw` smallint(6) NOT NULL default '0',
  `getfirstspich` smallint(6) NOT NULL default '0',
  `doaddtextpage` tinyint(1) NOT NULL default '0',
  `infourlispage` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`classid`),
  KEY `newsclassid` (`newsclassid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsinfotype`;
CREATE TABLE `phome_enewsinfotype` (
  `typeid` smallint(6) NOT NULL auto_increment,
  `tname` varchar(30) NOT NULL default '',
  `mid` smallint(6) NOT NULL default '0',
  `myorder` smallint(6) NOT NULL default '0',
  `yhid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`typeid`),
  KEY `mid` (`mid`,`myorder`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsinfovote`;
CREATE TABLE `phome_enewsinfovote` (
  `id` int(11) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  `title` varchar(120) NOT NULL default '',
  `voteip` mediumtext NOT NULL,
  `votetext` text NOT NULL,
  `voteclass` tinyint(1) NOT NULL default '0',
  `doip` tinyint(1) NOT NULL default '0',
  `dotime` date NOT NULL default '0000-00-00',
  `tempid` smallint(6) NOT NULL default '0',
  `width` int(11) NOT NULL default '0',
  `height` int(11) NOT NULL default '0',
  `diyotherlink` tinyint(1) NOT NULL default '0',
  `infouptime` int(10) NOT NULL default '0',
  `infodowntime` int(10) NOT NULL default '0',
  KEY `id` (`id`,`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewskey`;
CREATE TABLE `phome_enewskey` (
  `keyid` smallint(6) NOT NULL auto_increment,
  `keyname` varchar(60) NOT NULL default '',
  `keyurl` varchar(200) NOT NULL default '',
  PRIMARY KEY  (`keyid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewslink`;
CREATE TABLE `phome_enewslink` (
  `lid` smallint(6) NOT NULL auto_increment,
  `lname` varchar(100) NOT NULL default '',
  `lpic` varchar(255) NOT NULL default '',
  `lurl` varchar(255) NOT NULL default '',
  `ltime` datetime NOT NULL default '0000-00-00 00:00:00',
  `onclick` int(11) NOT NULL default '0',
  `width` varchar(10) NOT NULL default '',
  `height` varchar(10) NOT NULL default '',
  `target` varchar(10) NOT NULL default '',
  `myorder` tinyint(4) NOT NULL default '0',
  `email` varchar(60) NOT NULL default '',
  `lsay` text NOT NULL,
  `checked` tinyint(1) NOT NULL default '0',
  `ltype` smallint(6) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`lid`),
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewslinkclass`;
CREATE TABLE `phome_enewslinkclass` (
  `classid` smallint(6) NOT NULL auto_increment,
  `classname` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewslinktmp`;
CREATE TABLE `phome_enewslinktmp` (
  `newsurl` varchar(255) NOT NULL default '',
  `checkrnd` varchar(50) NOT NULL default '',
  `linkid` bigint(20) NOT NULL auto_increment,
  `titlepic` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`linkid`),
  KEY `checkrnd` (`checkrnd`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewslog`;
CREATE TABLE `phome_enewslog` (
  `loginid` int(11) NOT NULL auto_increment,
  `username` varchar(30) NOT NULL default '',
  `logintime` datetime NOT NULL default '0000-00-00 00:00:00',
  `loginip` varchar(20) NOT NULL default '',
  `status` tinyint(1) NOT NULL default '0',
  `password` varchar(30) NOT NULL default '',
  `loginauth` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`loginid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsloginfail`;
CREATE TABLE `phome_enewsloginfail` (
  `ip` varchar(20) NOT NULL default '',
  `num` tinyint(4) NOT NULL default '0',
  `lasttime` int(11) NOT NULL default '0',
  PRIMARY KEY  (`ip`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsmember`;
CREATE TABLE `phome_enewsmember` (
  `userid` int(11) NOT NULL auto_increment,
  `username` varchar(30) NOT NULL default '',
  `password` varchar(32) NOT NULL default '',
  `rnd` varchar(30) NOT NULL default '',
  `email` varchar(50) NOT NULL default '',
  `registertime` datetime NOT NULL default '0000-00-00 00:00:00',
  `groupid` smallint(6) NOT NULL default '0',
  `userfen` int(11) NOT NULL default '0',
  `userdate` int(11) NOT NULL default '0',
  `money` float(11,2) NOT NULL default '0.00',
  `zgroupid` smallint(6) NOT NULL default '0',
  `havemsg` tinyint(1) NOT NULL default '0',
  `checked` tinyint(1) NOT NULL default '0',
  `salt` varchar(8) NOT NULL default '',
  PRIMARY KEY  (`userid`),
  UNIQUE KEY `username` (`username`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsmemberadd`;
CREATE TABLE `phome_enewsmemberadd` (
  `userid` int(11) NOT NULL default '0',
  `truename` varchar(20) NOT NULL default '',
  `oicq` varchar(25) NOT NULL default '',
  `msn` varchar(120) NOT NULL default '',
  `call` varchar(30) NOT NULL default '',
  `phone` varchar(30) NOT NULL default '',
  `address` varchar(255) NOT NULL default '',
  `zip` varchar(8) NOT NULL default '',
  `spacestyleid` smallint(6) NOT NULL default '0',
  `homepage` varchar(200) NOT NULL default '',
  `saytext` text NOT NULL,
  `company` varchar(255) NOT NULL default '',
  `fax` varchar(30) NOT NULL default '',
  `userpic` varchar(200) NOT NULL default '',
  `spacename` varchar(255) NOT NULL default '',
  `spacegg` text NOT NULL,
  `viewstats` int(11) NOT NULL default '0',
  `todayinfodate` varchar(10) NOT NULL default '',
  `todayaddinfo` int(11) NOT NULL default '0',
  `todaydate` varchar(10) NOT NULL default '',
  `todaydown` int(11) NOT NULL default '0',
  `regip` varchar(20) NOT NULL default '',
  `authstr` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`userid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsmemberf`;
CREATE TABLE `phome_enewsmemberf` (
  `fid` smallint(6) NOT NULL auto_increment,
  `f` varchar(30) NOT NULL default '',
  `fname` varchar(30) NOT NULL default '',
  `fform` varchar(20) NOT NULL default '',
  `fhtml` mediumtext NOT NULL,
  `fzs` varchar(255) NOT NULL default '',
  `myorder` smallint(6) NOT NULL default '0',
  `ftype` varchar(30) NOT NULL default '',
  `flen` varchar(20) NOT NULL default '',
  `fvalue` text NOT NULL,
  `fformsize` varchar(12) NOT NULL default '',
  PRIMARY KEY  (`fid`)
) TYPE=MyISAM;

INSERT INTO `phome_enewsmemberf` VALUES (1, 'truename', '真实姓名', 'text', '\r\n<input name="truename" type="text" id="truename" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($addr[truename]))?>">\r\n', '', 1, 'VARCHAR', '20', '', '');
INSERT INTO `phome_enewsmemberf` VALUES (2, 'oicq', 'QQ号码', 'text', '<input name=\\"oicq\\" type=\\"text\\" id=\\"oicq\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($addr[oicq]))?>\\">\r\n', '', 5, 'VARCHAR', '25', '', '');
INSERT INTO `phome_enewsmemberf` VALUES (3, 'msn', 'MSN', 'text', '<input name=\\"msn\\" type=\\"text\\" id=\\"msn\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($addr[msn]))?>\\">\r\n', '', 6, 'VARCHAR', '120', '', '');
INSERT INTO `phome_enewsmemberf` VALUES (4, 'call', '联系电话', 'text', '<input name=\\"call\\" type=\\"text\\" id=\\"call\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($addr[call]))?>\\">\r\n', '', 2, 'VARCHAR', '30', '', '');
INSERT INTO `phome_enewsmemberf` VALUES (5, 'phone', '手机', 'text', '<input name=\\"phone\\" type=\\"text\\" id=\\"phone\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($addr[phone]))?>\\">\r\n', '', 4, 'VARCHAR', '30', '', '');
INSERT INTO `phome_enewsmemberf` VALUES (6, 'address', '联系地址', 'text', '<input name=\\"address\\" type=\\"text\\" id=\\"address\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($addr[address]))?>\\" size=\\"50\\">\r\n', '', 9, 'VARCHAR', '255', '', '');
INSERT INTO `phome_enewsmemberf` VALUES (7, 'zip', '邮编', 'text', '<input name=\\"zip\\" type=\\"text\\" id=\\"zip\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($addr[zip]))?>\\" size=\\"8\\">\r\n', '', 10, 'VARCHAR', '8', '', '');
INSERT INTO `phome_enewsmemberf` VALUES (9, 'homepage', '网址', 'text', '\r\n<input name="homepage" type="text" id="homepage" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($addr[homepage]))?>">\r\n', '', 7, 'VARCHAR', '200', '', '');
INSERT INTO `phome_enewsmemberf` VALUES (10, 'saytext', '简介', 'textarea', '<textarea name=\\"saytext\\" cols=\\"65\\" rows=\\"10\\" id=\\"saytext\\"><?=$ecmsfirstpost==1?\\"\\":stripSlashes($addr[saytext])?></textarea>\r\n', '', 11, 'TEXT', '', '', '');
INSERT INTO `phome_enewsmemberf` VALUES (11, 'company', '公司名称', 'text', '<input name=\\"company\\" type=\\"text\\" id=\\"company\\" value=\\"<?=$ecmsfirstpost==1?\\"\\":htmlspecialchars(stripSlashes($addr[company]))?>\\" size=\\"38\\">\r\n', '', 0, 'VARCHAR', '255', '', '');
INSERT INTO `phome_enewsmemberf` VALUES (12, 'fax', '传真', 'text', '\r\n<input name="fax" type="text" id="fax" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($addr[fax]))?>">\r\n', '', 3, 'VARCHAR', '30', '', '');
INSERT INTO `phome_enewsmemberf` VALUES (13, 'userpic', '会员头像', 'img', '<input type=\\"file\\" name=\\"userpicfile\\">&nbsp;&nbsp;\r\n<?=empty($addr[userpic])?\\"\\":\\"<img src=\\\'\\".htmlspecialchars(stripSlashes($addr[userpic])).\\"\\\' border=0>\\"?>', '', 8, 'VARCHAR', '200', '', '');

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsmemberfeedback`;
CREATE TABLE `phome_enewsmemberfeedback` (
  `fid` int(11) NOT NULL auto_increment,
  `name` varchar(12) NOT NULL default '',
  `company` varchar(80) NOT NULL default '',
  `phone` varchar(30) NOT NULL default '',
  `fax` varchar(20) NOT NULL default '',
  `email` varchar(80) NOT NULL default '',
  `address` varchar(255) NOT NULL default '',
  `zip` varchar(8) NOT NULL default '',
  `title` varchar(120) NOT NULL default '',
  `ftext` text NOT NULL,
  `userid` int(11) NOT NULL default '0',
  `ip` varchar(15) NOT NULL default '',
  `uid` int(11) NOT NULL default '0',
  `uname` varchar(30) NOT NULL default '',
  `addtime` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`fid`),
  KEY `userid` (`userid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsmemberform`;
CREATE TABLE `phome_enewsmemberform` (
  `fid` smallint(6) NOT NULL auto_increment,
  `fname` varchar(60) NOT NULL default '',
  `ftemp` mediumtext NOT NULL,
  `fzs` varchar(255) NOT NULL default '',
  `enter` text NOT NULL,
  `mustenter` text NOT NULL,
  `filef` varchar(255) NOT NULL default '',
  `imgf` varchar(255) NOT NULL default '0',
  `tobrf` text NOT NULL,
  `viewenter` text NOT NULL,
  `searchvar` varchar(255) NOT NULL default '',
  `canaddf` text NOT NULL,
  `caneditf` text NOT NULL,
  `checkboxf` text NOT NULL,
  PRIMARY KEY  (`fid`)
) TYPE=MyISAM;

INSERT INTO `phome_enewsmemberform` VALUES (1, '个人注册表单', '<table width=\\\'100%\\\' align=\\\'center\\\' cellpadding=3 cellspacing=1 bgcolor=\\\'#DBEAF5\\\'>\r\n<tr><td width=\\\'25%\\\' height=25 bgcolor=\\\'ffffff\\\'>真实姓名</td><td bgcolor=\\\'ffffff\\\'>[!--truename--]</td></tr>\r\n<tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>QQ号码</td><td bgcolor=\\\'ffffff\\\'>[!--oicq--]</td></tr>\r\n<tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>MSN</td><td bgcolor=\\\'ffffff\\\'>[!--msn--]</td></tr>\r\n<tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>联系电话</td><td bgcolor=\\\'ffffff\\\'>[!--call--]</td></tr>\r\n<tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>手机</td><td bgcolor=\\\'ffffff\\\'>[!--phone--]</td></tr>\r\n<tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>网站地址</td><td bgcolor=\\\'ffffff\\\'>[!--homepage--]</td></tr>\r\n<tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>会员头像</td><td bgcolor=\\\'ffffff\\\'>[!--userpic--]</td></tr>\r\n<tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>联系地址</td><td bgcolor=\\\'ffffff\\\'>[!--address--]&nbsp;邮编: [!--zip--]</td></tr>\r\n<tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>个人介绍</td><td bgcolor=\\\'ffffff\\\'>[!--saytext--]</td></tr>\r\n</table>', '', '真实姓名<!--field--->truename<!--record-->联系电话<!--field--->call<!--record-->手机<!--field--->phone<!--record-->QQ号码<!--field--->oicq<!--record-->MSN<!--field--->msn<!--record-->网站地址<!--field--->homepage<!--record-->会员头像<!--field--->userpic<!--record-->联系地址<!--field--->address<!--record-->邮编<!--field--->zip<!--record-->简介<!--field--->saytext<!--record-->', '', ',', ',userpic,', ',saytext,', '真实姓名<!--field--->truename<!--record-->联系电话<!--field--->call<!--record-->手机<!--field--->phone<!--record-->QQ号码<!--field--->oicq<!--record-->MSN<!--field--->msn<!--record-->网站地址<!--field--->homepage<!--record-->会员头像<!--field--->userpic<!--record-->联系地址<!--field--->address<!--record-->邮编<!--field--->zip<!--record-->简介<!--field--->saytext<!--record-->', '', ',truename,call,phone,oicq,msn,homepage,userpic,address,zip,saytext,', ',truename,call,phone,oicq,msn,homepage,userpic,address,zip,saytext,', ',');
INSERT INTO `phome_enewsmemberform` VALUES (2, '企员注册表单', '<table width=\\\'100%\\\' align=\\\'center\\\' cellpadding=3 cellspacing=1 bgcolor=\\\'#DBEAF5\\\'><tr><td width=\\\'25%\\\' height=25 bgcolor=\\\'ffffff\\\'>公司名称</td><td bgcolor=\\\'ffffff\\\'>[!--company--](*)</td></tr><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>联系人</td><td bgcolor=\\\'ffffff\\\'>[!--truename--](*)</td></tr><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>联系电话</td><td bgcolor=\\\'ffffff\\\'>[!--call--](*)</td></tr><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>传真</td><td bgcolor=\\\'ffffff\\\'>[!--fax--]</td></tr><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>手机</td><td bgcolor=\\\'ffffff\\\'>[!--phone--]</td></tr><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>QQ号码</td><td bgcolor=\\\'ffffff\\\'>[!--oicq--]</td></tr><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>MSN</td><td bgcolor=\\\'ffffff\\\'>[!--msn--]</td></tr><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>网址</td><td bgcolor=\\\'ffffff\\\'>[!--homepage--]</td></tr>\r\n<tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>会员头像</td><td bgcolor=\\\'ffffff\\\'>[!--userpic--]</td></tr>\r\n<tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>联系地址</td><td bgcolor=\\\'ffffff\\\'>[!--address--]&nbsp;邮编: [!--zip--]</td></tr><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>公司介绍</td><td bgcolor=\\\'ffffff\\\'>[!--saytext--]</td></tr></table>', '', '公司名称<!--field--->company<!--record-->联系人<!--field--->truename<!--record-->联系电话<!--field--->call<!--record-->传真<!--field--->fax<!--record-->手机<!--field--->phone<!--record-->QQ号码<!--field--->oicq<!--record-->MSN<!--field--->msn<!--record-->网址<!--field--->homepage<!--record-->会员头像<!--field--->userpic<!--record-->联系地址<!--field--->address<!--record-->邮编<!--field--->zip<!--record-->公司介绍<!--field--->saytext<!--record-->', ',company,truename,call,', ',', ',userpic,', ',saytext,', '公司名称<!--field--->company<!--record-->联系人<!--field--->truename<!--record-->联系电话<!--field--->call<!--record-->传真<!--field--->fax<!--record-->手机<!--field--->phone<!--record-->QQ号码<!--field--->oicq<!--record-->MSN<!--field--->msn<!--record-->网址<!--field--->homepage<!--record-->会员头像<!--field--->userpic<!--record-->联系地址<!--field--->address<!--record-->邮编<!--field--->zip<!--record-->公司介绍<!--field--->saytext<!--record-->', ',company,', ',company,truename,call,fax,phone,oicq,msn,homepage,userpic,address,zip,saytext,', ',company,truename,call,fax,phone,oicq,msn,homepage,userpic,address,zip,saytext,', ',');

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsmembergbook`;
CREATE TABLE `phome_enewsmembergbook` (
  `gid` int(11) NOT NULL auto_increment,
  `userid` int(11) NOT NULL default '0',
  `isprivate` tinyint(1) NOT NULL default '0',
  `uid` int(11) NOT NULL default '0',
  `uname` varchar(30) NOT NULL default '',
  `ip` varchar(15) NOT NULL default '',
  `addtime` datetime NOT NULL default '0000-00-00 00:00:00',
  `gbtext` text NOT NULL,
  `retext` text NOT NULL,
  `checked` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`gid`),
  KEY `userid` (`userid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsmembergroup`;
CREATE TABLE `phome_enewsmembergroup` (
  `groupid` smallint(6) NOT NULL auto_increment,
  `groupname` varchar(60) NOT NULL default '',
  `level` smallint(6) NOT NULL default '0',
  `checked` tinyint(1) NOT NULL default '0',
  `favanum` smallint(6) NOT NULL default '0',
  `daydown` int(11) NOT NULL default '0',
  `msglen` int(11) NOT NULL default '0',
  `msgnum` int(11) NOT NULL default '0',
  `canreg` tinyint(1) NOT NULL default '0',
  `formid` smallint(6) NOT NULL default '0',
  `regchecked` tinyint(1) NOT NULL default '0',
  `spacestyleid` smallint(6) NOT NULL default '0',
  `dayaddinfo` smallint(6) NOT NULL default '0',
  `infochecked` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`groupid`)
) TYPE=MyISAM;

INSERT INTO `phome_enewsmembergroup` VALUES (1, '普通会员', 1, 0, 120, 0, 255, 50, 1, 1, 0, 1, 0, 0);
INSERT INTO `phome_enewsmembergroup` VALUES (2, 'VIP会员', 2, 0, 200, 0, 255, 120, 0, 1, 0, 1, 0, 0);
INSERT INTO `phome_enewsmembergroup` VALUES (3, '企业会员', 1, 0, 120, 0, 255, 50, 1, 2, 0, 2, 0, 0);
INSERT INTO `phome_enewsmembergroup` VALUES (4, '企业VIP会员', 2, 0, 200, 0, 255, 120, 0, 2, 0, 2, 0, 0);

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsmenu`;
CREATE TABLE `phome_enewsmenu` (
  `menuid` int(11) NOT NULL auto_increment,
  `menuname` varchar(60) NOT NULL default '',
  `menuurl` varchar(255) NOT NULL default '',
  `myorder` smallint(6) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`menuid`),
  KEY `myorder` (`myorder`),
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsmenuclass`;
CREATE TABLE `phome_enewsmenuclass` (
  `classid` smallint(6) NOT NULL auto_increment,
  `classname` varchar(60) NOT NULL default '',
  `issys` tinyint(1) NOT NULL default '0',
  `myorder` smallint(6) NOT NULL default '0',
  `classtype` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`classid`),
  KEY `myorder` (`myorder`),
  KEY `classtype` (`classtype`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsmod`;
CREATE TABLE `phome_enewsmod` (
  `mid` smallint(6) NOT NULL auto_increment,
  `mname` varchar(100) NOT NULL default '',
  `mtemp` mediumtext NOT NULL,
  `mzs` varchar(255) NOT NULL default '',
  `cj` mediumtext NOT NULL,
  `enter` mediumtext NOT NULL,
  `tempvar` mediumtext NOT NULL,
  `sonclass` text NOT NULL,
  `searchvar` varchar(255) NOT NULL default '',
  `tid` smallint(6) NOT NULL default '0',
  `tbname` varchar(60) NOT NULL default '',
  `qenter` mediumtext NOT NULL,
  `mustqenterf` text NOT NULL,
  `qmtemp` mediumtext NOT NULL,
  `listandf` text NOT NULL,
  `setandf` tinyint(1) NOT NULL default '0',
  `listtempvar` mediumtext NOT NULL,
  `qmname` varchar(30) NOT NULL default '',
  `canaddf` text NOT NULL,
  `caneditf` text NOT NULL,
  `definfovoteid` smallint(6) NOT NULL default '0',
  `showmod` tinyint(1) NOT NULL default '0',
  `usemod` tinyint(1) NOT NULL default '0',
  `myorder` smallint(6) NOT NULL default '0',
  `orderf` text NOT NULL,
  `isdefault` tinyint(1) NOT NULL default '0',
  `listfile` varchar(30) NOT NULL default '',
  `printtempid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`mid`),
  KEY `tid` (`tid`)
) TYPE=MyISAM;

INSERT INTO `phome_enewsmod` VALUES (1, '新闻系统模型', '<table width=\\\'100%\\\' align=center cellpadding=3 cellspacing=1 class=\\"tableborder\\"><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>标题(*)</td><td bgcolor=\\\'ffffff\\\'>[!--title--]</td></tr><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>副标题</td><td bgcolor=\\\'ffffff\\\'>[!--ftitle--]</td></tr><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>特殊属性</td><td bgcolor=\\\'ffffff\\\'>[!--special.field--]</td></tr><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>发布时间</td><td bgcolor=\\\'ffffff\\\'>[!--newstime--]</td></tr><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>标题图片</td><td bgcolor=\\\'ffffff\\\'>[!--titlepic--]</td></tr><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>内容简介</td><td bgcolor=\\\'ffffff\\\'>[!--smalltext--]</td></tr><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>作者</td><td bgcolor=\\\'ffffff\\\'>[!--writer--]</td></tr><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>信息来源</td><td bgcolor=\\\'ffffff\\\'>[!--befrom--]</td></tr><tr><td height=25 colspan=2 bgcolor=\\\'ffffff\\\'><div align=left>新闻正文(*)</div></td></tr></table><div style=\\"background-color:#D0D0D0\\">[!--newstext--]</div>', '新闻系统模型', '标题<!--field--->title<!--record-->副标题<!--field--->ftitle<!--record-->发布时间<!--field--->newstime<!--record-->标题图片<!--field--->titlepic<!--record-->内容简介<!--field--->smalltext<!--record-->作者<!--field--->writer<!--record-->信息来源<!--field--->befrom<!--record-->新闻正文<!--field--->newstext<!--record-->', '标题<!--field--->title<!--record-->副标题<!--field--->ftitle<!--record-->特殊属性<!--field--->special.field<!--record-->发布时间<!--field--->newstime<!--record-->标题图片<!--field--->titlepic<!--record-->内容简介<!--field--->smalltext<!--record-->作者<!--field--->writer<!--record-->信息来源<!--field--->befrom<!--record-->新闻正文<!--field--->newstext<!--record-->', '标题<!--field--->title<!--record-->副标题<!--field--->ftitle<!--record-->发布时间<!--field--->newstime<!--record-->标题图片<!--field--->titlepic<!--record-->内容简介<!--field--->smalltext<!--record-->作者<!--field--->writer<!--record-->信息来源<!--field--->befrom<!--record-->新闻正文<!--field--->newstext<!--record-->顶<!--field--->diggtop<!--record-->', '|34|35|36|37|', ',title,smalltext,', 1, 'news', '标题<!--field--->title<!--record-->副标题<!--field--->ftitle<!--record-->特殊属性<!--field--->special.field<!--record-->标题图片<!--field--->titlepic<!--record-->内容简介<!--field--->smalltext<!--record-->作者<!--field--->writer<!--record-->信息来源<!--field--->befrom<!--record-->新闻正文<!--field--->newstext<!--record-->', ',title,newstext,', '<table width=100% align=center cellpadding=3 cellspacing=1 class=\\"tableborder\\"><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>标题(*)</td><td bgcolor=\\\'ffffff\\\'>[!--title--]</td></tr><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>副标题</td><td bgcolor=\\\'ffffff\\\'>[!--ftitle--]</td></tr><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>关键字</td><td bgcolor=\\\'ffffff\\\'>[!--special.field--]</td></tr><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>标题图片</td><td bgcolor=\\\'ffffff\\\'>[!--titlepic--]</td></tr><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>内容简介</td><td bgcolor=\\\'ffffff\\\'>[!--smalltext--]</td></tr><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>作者</td><td bgcolor=\\\'ffffff\\\'>[!--writer--]</td></tr><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>信息来源</td><td bgcolor=\\\'ffffff\\\'>[!--befrom--]</td></tr><tr><td height=25 colspan=2 bgcolor=\\\'ffffff\\\'><div align=left>新闻正文(*)</div></td></tr></table><div style=\\"background-color:#D0D0D0\\">[!--newstext--]</div>', '', 0, '标题<!--field--->title<!--record-->副标题<!--field--->ftitle<!--record-->发布时间<!--field--->newstime<!--record-->标题图片<!--field--->titlepic<!--record-->内容简介<!--field--->smalltext<!--record-->顶<!--field--->diggtop<!--record-->', '新闻', ',title,ftitle,newstime,titlepic,smalltext,writer,befrom,newstext,', ',title,ftitle,newstime,titlepic,smalltext,writer,befrom,newstext,', 0, 0, 0, 0, '', 1, '', 0);
INSERT INTO `phome_enewsmod` VALUES (2, '下载系统模型', '<script>\r\nfunction AddFj(str)\r\n{var r;\r\nvar a;\r\na=document.add.softfj.value;\r\nr=a.split(str);\r\nif(r.length!=1)\r\n{return true;}\r\ndocument.add.softfj.value+=\\"/\\"+str;\r\n}\r\nfunction DelFj(str)\r\n{\r\nvar a;\r\na=document.add.softfj.value;\r\ndocument.add.softfj.value=a.replace(\\"/\\"+str,\\"\\");\r\n}\r\n</script>\r\n<table width=100% align=center cellpadding=3 cellspacing=1 class=\\"tableborder\\">\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>软件名称(*)</td>\r\n    <td bgcolor=ffffff>[!--title--]</td>\r\n  </tr>\r\n  <tr>\r\n    <td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>特殊属性</td>\r\n    <td bgcolor=\\\'ffffff\\\'>[!--special.field--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>发布时间</td>\r\n    <td bgcolor=ffffff>[!--newstime--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>软件预览图</td>\r\n    <td bgcolor=ffffff>[!--titlepic--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>软件作者</td>\r\n    <td bgcolor=ffffff>[!--softwriter--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>厂商主页</td>\r\n    <td bgcolor=ffffff>[!--homepage--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>系统演示</td>\r\n    <td bgcolor=ffffff>[!--demo--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>运行环境</td>\r\n    <td bgcolor=ffffff>[!--softfj--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td height=25 bgcolor=ffffff>&nbsp;</td>\r\n    <td bgcolor=ffffff><input type=checkbox name=check value=\\\'Win9X/Me\\\' onclick=\\"if(this.checked){AddFj(this.value);}else{DelFj(this.value);}\\">\r\n      Win9X/Me&nbsp; <input type=checkbox name=check value=\\\'WinNT/2000/XP\\\' onclick=\\"if(this.checked){AddFj(this.value);}else{DelFj(this.value);}\\">\r\n      WinNT/2000/XP&nbsp; <input type=checkbox name=check value=\\\'Unix\\\' onclick=\\"if(this.checked){AddFj(this.value);}else{DelFj(this.value);}\\">\r\n      Unix&nbsp; <input type=checkbox name=check value=\\\'Linux\\\' onclick=\\"if(this.checked){AddFj(this.value);}else{DelFj(this.value);}\\">\r\n      Linux&nbsp; <input type=checkbox name=check value=\\\'DOS\\\' onclick=\\"if(this.checked){AddFj(this.value);}else{DelFj(this.value);}\\">\r\n      DOS&nbsp; <input type=checkbox name=check value=\\\'MAC OS\\\' onclick=\\"if(this.checked){AddFj(this.value);}else{DelFj(this.value);}\\">\r\n      MAC OS&nbsp; <input type=checkbox name=check value=\\\'Other\\\' onclick=\\"if(this.checked){AddFj(this.value);}else{DelFj(this.value);}\\">\r\n      Other</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>软件属性</td>\r\n    <td bgcolor=ffffff>软件语言：[!--language--]，软件类型：[!--softtype--]，授权形式：[!--softsq--]，软件评价：[!--star--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>文件</td>\r\n    <td bgcolor=ffffff>文件类型：[!--filetype--]，文件大小：[!--filesize--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>下载地址(*)</td>\r\n    <td bgcolor=ffffff>[!--downpath--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>软件简介(*)</td>\r\n    <td bgcolor=ffffff>[!--softsay--]</td>\r\n  </tr>\r\n</table>', '', '软件名称<!--field--->title<!--record-->发布时间<!--field--->newstime<!--record-->软件预览图<!--field--->titlepic<!--record-->软件作者<!--field--->softwriter<!--record-->厂商主页<!--field--->homepage<!--record-->系统演示<!--field--->demo<!--record-->运行环境<!--field--->softfj<!--record-->软件语言<!--field--->language<!--record-->软件类型<!--field--->softtype<!--record-->授权形式<!--field--->softsq<!--record-->软件评价<!--field--->star<!--record-->文件类型<!--field--->filetype<!--record-->文件大小<!--field--->filesize<!--record-->下载地址<!--field--->downpath<!--record-->软件简介<!--field--->softsay<!--record-->', '软件名称<!--field--->title<!--record-->特殊属性<!--field--->special.field<!--record-->发布时间<!--field--->newstime<!--record-->软件预览图<!--field--->titlepic<!--record-->软件作者<!--field--->softwriter<!--record-->厂商主页<!--field--->homepage<!--record-->系统演示<!--field--->demo<!--record-->运行环境<!--field--->softfj<!--record-->软件语言<!--field--->language<!--record-->软件类型<!--field--->softtype<!--record-->授权形式<!--field--->softsq<!--record-->软件评价<!--field--->star<!--record-->文件类型<!--field--->filetype<!--record-->文件大小<!--field--->filesize<!--record-->下载地址<!--field--->downpath<!--record-->软件简介<!--field--->softsay<!--record-->', '软件名称<!--field--->title<!--record-->发布时间<!--field--->newstime<!--record-->软件预览图<!--field--->titlepic<!--record-->软件作者<!--field--->softwriter<!--record-->厂商主页<!--field--->homepage<!--record-->系统演示<!--field--->demo<!--record-->运行环境<!--field--->softfj<!--record-->软件语言<!--field--->language<!--record-->软件类型<!--field--->softtype<!--record-->授权形式<!--field--->softsq<!--record-->软件评价<!--field--->star<!--record-->文件类型<!--field--->filetype<!--record-->文件大小<!--field--->filesize<!--record-->下载地址<!--field--->downpath<!--record-->软件简介<!--field--->softsay<!--record-->', '|38|39|40|41|', ',title,softsay,', 2, 'download', '软件名称<!--field--->title<!--record-->特殊属性<!--field--->special.field<!--record-->软件预览图<!--field--->titlepic<!--record-->软件作者<!--field--->softwriter<!--record-->厂商主页<!--field--->homepage<!--record-->系统演示<!--field--->demo<!--record-->运行环境<!--field--->softfj<!--record-->软件语言<!--field--->language<!--record-->软件类型<!--field--->softtype<!--record-->授权形式<!--field--->softsq<!--record-->文件类型<!--field--->filetype<!--record-->文件大小<!--field--->filesize<!--record-->下载地址<!--field--->downpath<!--record-->软件简介<!--field--->softsay<!--record-->', ',title,downpath,softsay,', '<script>\r\nfunction AddFj(str)\r\n{var r;\r\nvar a;\r\na=document.add.softfj.value;\r\nr=a.split(str);\r\nif(r.length!=1)\r\n{return true;}\r\ndocument.add.softfj.value+=\\"/\\"+str;\r\n}\r\nfunction DelFj(str)\r\n{\r\nvar a;\r\na=document.add.softfj.value;\r\ndocument.add.softfj.value=a.replace(\\"/\\"+str,\\"\\");\r\n}\r\n</script>\r\n<table width=100% align=center cellpadding=3 cellspacing=1 class=\\"tableborder\\">\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>软件名称(*)</td>\r\n    <td bgcolor=ffffff>[!--title--]</td>\r\n  </tr>\r\n  <tr>\r\n    <td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>关键字</td>\r\n    <td bgcolor=\\\'ffffff\\\'>[!--special.field--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>软件预览图</td>\r\n    <td bgcolor=ffffff>[!--titlepic--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>软件作者</td>\r\n    <td bgcolor=ffffff>[!--softwriter--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>厂商主页</td>\r\n    <td bgcolor=ffffff>[!--homepage--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>系统演示</td>\r\n    <td bgcolor=ffffff>[!--demo--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>运行环境</td>\r\n    <td bgcolor=ffffff>[!--softfj--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td height=25 bgcolor=ffffff>&nbsp;</td>\r\n    <td bgcolor=ffffff><input type=checkbox name=check value=\\\'Win9X/Me\\\' onclick=\\"if(this.checked){AddFj(this.value);}else{DelFj(this.value);}\\">\r\n      Win9X/Me&nbsp; <input type=checkbox name=check value=\\\'WinNT/2000/XP\\\' onclick=\\"if(this.checked){AddFj(this.value);}else{DelFj(this.value);}\\">\r\n      WinNT/2000/XP&nbsp; <input type=checkbox name=check value=\\\'Unix\\\' onclick=\\"if(this.checked){AddFj(this.value);}else{DelFj(this.value);}\\">\r\n      Unix&nbsp; <input type=checkbox name=check value=\\\'Linux\\\' onclick=\\"if(this.checked){AddFj(this.value);}else{DelFj(this.value);}\\">\r\n      Linux&nbsp; <input type=checkbox name=check value=\\\'DOS\\\' onclick=\\"if(this.checked){AddFj(this.value);}else{DelFj(this.value);}\\">\r\n      DOS&nbsp; <input type=checkbox name=check value=\\\'MAC OS\\\' onclick=\\"if(this.checked){AddFj(this.value);}else{DelFj(this.value);}\\">\r\n      MAC OS&nbsp; <input type=checkbox name=check value=\\\'Other\\\' onclick=\\"if(this.checked){AddFj(this.value);}else{DelFj(this.value);}\\">\r\n      Other</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>软件属性</td>\r\n    <td bgcolor=ffffff>软件语言：[!--language--]，软件类型：[!--softtype--]，授权形式：[!--softsq--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>文件</td>\r\n    <td bgcolor=ffffff>文件类型：[!--filetype--]，文件大小：[!--filesize--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>上传软件(*)</td>\r\n    <td bgcolor=ffffff>[!--downpath--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>软件简介(*)</td>\r\n    <td bgcolor=ffffff>[!--softsay--]</td>\r\n  </tr>\r\n</table>', '', 0, '软件名称<!--field--->title<!--record-->发布时间<!--field--->newstime<!--record-->软件预览图<!--field--->titlepic<!--record-->运行环境<!--field--->softfj<!--record-->软件语言<!--field--->language<!--record-->软件类型<!--field--->softtype<!--record-->授权形式<!--field--->softsq<!--record-->软件评价<!--field--->star<!--record-->文件类型<!--field--->filetype<!--record-->文件大小<!--field--->filesize<!--record-->软件简介<!--field--->softsay<!--record-->', '软件', ',title,newstime,titlepic,softwriter,homepage,demo,softfj,language,softtype,softsq,star,filetype,filesize,downpath,softsay,', ',title,newstime,titlepic,softwriter,homepage,demo,softfj,language,softtype,softsq,star,filetype,filesize,downpath,softsay,', 0, 0, 0, 0, '', 1, '', 0);
INSERT INTO `phome_enewsmod` VALUES (3, '图片系统模型', '<table width=100% align=center cellpadding=3 cellspacing=1 class=tableborder>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>图片名称(*)</td>\r\n    <td bgcolor=ffffff>[!--title--]</td>\r\n  </tr>\r\n  <tr>\r\n    <td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>特殊属性</td>\r\n    <td bgcolor=\\\'ffffff\\\'>[!--special.field--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>发布时间</td>\r\n    <td bgcolor=ffffff>[!--newstime--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>文件大小</td>\r\n    <td bgcolor=ffffff>[!--filesize--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>单图属性</td>\r\n    <td bgcolor=ffffff>图片尺寸：[!--picsize--]，图片分辨率：[!--picfbl--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>来源</td>\r\n    <td bgcolor=ffffff>[!--picfrom--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>图片小图</td>\r\n    <td bgcolor=ffffff>[!--titlepic--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>图片大图</td>\r\n    <td bgcolor=ffffff>[!--picurl--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>图片集</td>\r\n    <td bgcolor=ffffff>[!--morepic--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>图集属性</td>\r\n    <td bgcolor=ffffff>每行显示条数：[!--num--]，缩图大小：[!--width--]*[!--height--]<font color=\\"#666666\\">(宽*高)</font></td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>图片简介(*)</td>\r\n    <td bgcolor=ffffff>[!--picsay--]</td>\r\n  </tr>\r\n</table>', '', '图片名称<!--field--->title<!--record-->发布时间<!--field--->newstime<!--record-->文件大小<!--field--->filesize<!--record-->图片尺寸<!--field--->picsize<!--record-->图片分辨率<!--field--->picfbl<!--record-->来源<!--field--->picfrom<!--record-->图片小图<!--field--->titlepic<!--record-->图片大图<!--field--->picurl<!--record-->图片集<!--field--->morepic<!--record-->每行显示条数<!--field--->num<!--record-->缩图宽度<!--field--->width<!--record-->缩图高度<!--field--->height<!--record-->图片简介<!--field--->picsay<!--record-->', '图片名称<!--field--->title<!--record-->特殊属性<!--field--->special.field<!--record-->发布时间<!--field--->newstime<!--record-->文件大小<!--field--->filesize<!--record-->图片尺寸<!--field--->picsize<!--record-->图片分辨率<!--field--->picfbl<!--record-->来源<!--field--->picfrom<!--record-->图片小图<!--field--->titlepic<!--record-->图片大图<!--field--->picurl<!--record-->图片集<!--field--->morepic<!--record-->每行显示条数<!--field--->num<!--record-->缩图宽度<!--field--->width<!--record-->缩图高度<!--field--->height<!--record-->图片简介<!--field--->picsay<!--record-->', '图片名称<!--field--->title<!--record-->发布时间<!--field--->newstime<!--record-->文件大小<!--field--->filesize<!--record-->图片尺寸<!--field--->picsize<!--record-->图片分辨率<!--field--->picfbl<!--record-->来源<!--field--->picfrom<!--record-->图片小图<!--field--->titlepic<!--record-->图片大图<!--field--->picurl<!--record-->图片集<!--field--->morepic<!--record-->缩图宽度<!--field--->width<!--record-->缩图高度<!--field--->height<!--record-->图片简介<!--field--->picsay<!--record-->', '|52|53|54|', ',title,picsay,', 3, 'photo', '图片名称<!--field--->title<!--record-->文件大小<!--field--->filesize<!--record-->图片尺寸<!--field--->picsize<!--record-->图片分辨率<!--field--->picfbl<!--record-->来源<!--field--->picfrom<!--record-->图片小图<!--field--->titlepic<!--record-->图片大图<!--field--->picurl<!--record-->图片简介<!--field--->picsay<!--record-->', ',title,picsay,', '<table width=100% align=center cellpadding=3 cellspacing=1 class=tableborder><tr><td width=16% height=25 bgcolor=ffffff>图片名称</td><td bgcolor=ffffff>[!--title--]</td></tr>\r\n  <tr>\r\n    <td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>关键字</td>\r\n    <td bgcolor=\\\'ffffff\\\'>[!--special.field--]</td>\r\n  </tr>\r\n<tr><td width=16% height=25 bgcolor=ffffff>文件大小</td><td bgcolor=ffffff>[!--filesize--]</td></tr><tr><td width=16% height=25 bgcolor=ffffff>图片尺寸</td><td bgcolor=ffffff>[!--picsize--]</td></tr><tr><td width=16% height=25 bgcolor=ffffff>图片分辨率</td><td bgcolor=ffffff>[!--picfbl--]</td></tr><tr><td width=16% height=25 bgcolor=ffffff>来源</td><td bgcolor=ffffff>[!--picfrom--]</td></tr><tr><td width=16% height=25 bgcolor=ffffff>图片小图</td><td bgcolor=ffffff>[!--titlepic--]</td></tr><tr><td width=16% height=25 bgcolor=ffffff>图片大图</td><td bgcolor=ffffff>[!--picurl--]</td></tr><tr><td width=16% height=25 bgcolor=ffffff>图片简介</td><td bgcolor=ffffff>[!--picsay--]</td></tr></table>', '', 0, '图片名称<!--field--->title<!--record-->发布时间<!--field--->newstime<!--record-->图片小图<!--field--->titlepic<!--record-->图片大图<!--field--->picurl<!--record-->图片简介<!--field--->picsay<!--record-->', '图片', ',title,newstime,filesize,picsize,picfbl,picfrom,titlepic,picurl,morepic,num,width,height,picsay,', ',title,newstime,filesize,picsize,picfbl,picfrom,titlepic,picurl,morepic,num,width,height,picsay,', 0, 0, 0, 0, '', 1, '', 0);
INSERT INTO `phome_enewsmod` VALUES (4, 'FLASH系统模型', '<table width=100% align=center cellpadding=3 cellspacing=1 class=tableborder>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>作品名(*)</td>\r\n    <td bgcolor=ffffff>[!--title--]</td>\r\n  </tr>\r\n  <tr>\r\n    <td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>特殊属性</td>\r\n    <td bgcolor=\\\'ffffff\\\'>[!--special.field--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>发布时间</td>\r\n    <td bgcolor=ffffff>[!--newstime--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>作品预览图</td>\r\n    <td bgcolor=ffffff>[!--titlepic--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>作者</td>\r\n    <td bgcolor=ffffff>[!--flashwriter--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>作者邮箱</td>\r\n    <td bgcolor=ffffff>[!--email--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>作品评价</td>\r\n    <td bgcolor=ffffff>[!--star--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>文件大小</td>\r\n    <td bgcolor=ffffff>[!--filesize--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>Flash地址(*)</td>\r\n    <td bgcolor=ffffff>[!--flashurl--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>Flash规格</td>\r\n    <td bgcolor=ffffff>[!--width--]*[!--height--]<font color=\\"#666666\\">(宽度*高度)</font></td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>作品简介(*)</td>\r\n    <td bgcolor=ffffff>[!--flashsay--]</td>\r\n  </tr>\r\n</table>', '', '作品名<!--field--->title<!--record-->发布时间<!--field--->newstime<!--record-->作品预览图<!--field--->titlepic<!--record-->作者<!--field--->flashwriter<!--record-->作者邮箱<!--field--->email<!--record-->作品评价<!--field--->star<!--record-->文件大小<!--field--->filesize<!--record-->Flash地址<!--field--->flashurl<!--record-->Flash宽度<!--field--->width<!--record-->Flash高度<!--field--->height<!--record-->作品简介<!--field--->flashsay<!--record-->', '作品名<!--field--->title<!--record-->特殊属性<!--field--->special.field<!--record-->发布时间<!--field--->newstime<!--record-->作品预览图<!--field--->titlepic<!--record-->作者<!--field--->flashwriter<!--record-->作者邮箱<!--field--->email<!--record-->作品评价<!--field--->star<!--record-->文件大小<!--field--->filesize<!--record-->Flash地址<!--field--->flashurl<!--record-->Flash宽度<!--field--->width<!--record-->Flash高度<!--field--->height<!--record-->作品简介<!--field--->flashsay<!--record-->', '作品名<!--field--->title<!--record-->发布时间<!--field--->newstime<!--record-->作品预览图<!--field--->titlepic<!--record-->作者<!--field--->flashwriter<!--record-->作者邮箱<!--field--->email<!--record-->作品评价<!--field--->star<!--record-->文件大小<!--field--->filesize<!--record-->Flash地址<!--field--->flashurl<!--record-->Flash宽度<!--field--->width<!--record-->Flash高度<!--field--->height<!--record-->作品简介<!--field--->flashsay<!--record-->', '|50|51|', ',title,flashwriter,flashsay,', 4, 'flash', '作品名<!--field--->title<!--record-->特殊属性<!--field--->special.field<!--record-->作品预览图<!--field--->titlepic<!--record-->作者<!--field--->flashwriter<!--record-->作者邮箱<!--field--->email<!--record-->文件大小<!--field--->filesize<!--record-->Flash地址<!--field--->flashurl<!--record-->Flash宽度<!--field--->width<!--record-->Flash高度<!--field--->height<!--record-->作品简介<!--field--->flashsay<!--record-->', ',title,flashurl,flashsay,', '<table width=\\\'100%\\\' align=center cellpadding=3 cellspacing=1 class=tableborder>\r\n  <tr>\r\n    <td width=16% height=25 bgcolor=ffffff>作品名(*)</td>\r\n    <td bgcolor=ffffff>[!--title--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>关键字</td>\r\n    <td bgcolor=\\\'ffffff\\\'>[!--special.field--]</td>\r\n  </tr>\r\n  <tr>\r\n    <td width=16% height=25 bgcolor=ffffff>作品预览图</td>\r\n    <td bgcolor=ffffff>[!--titlepic--]</td>\r\n  </tr>\r\n  <tr>\r\n    <td width=16% height=25 bgcolor=ffffff>作者</td>\r\n    <td bgcolor=ffffff>[!--flashwriter--]</td>\r\n  </tr>\r\n  <tr>\r\n    <td width=16% height=25 bgcolor=ffffff>作者邮箱</td>\r\n    <td bgcolor=ffffff>[!--email--]</td>\r\n  </tr>\r\n  <tr>\r\n    <td width=16% height=25 bgcolor=ffffff>文件大小</td>\r\n    <td bgcolor=ffffff>[!--filesize--]</td>\r\n  </tr>\r\n  <tr>\r\n    <td width=16% height=25 bgcolor=ffffff>上传Flash(*)</td>\r\n    <td bgcolor=ffffff>[!--flashurl--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>Flash规格</td>\r\n    <td bgcolor=ffffff>[!--width--]*[!--height--]<font color=\\"#666666\\">(宽度*高度)</font></td>\r\n  </tr>\r\n  <tr>\r\n    <td width=16% height=25 bgcolor=ffffff>作品简介(*)</td>\r\n    <td bgcolor=ffffff>[!--flashsay--]</td>\r\n  </tr>\r\n</table>\r\n', '', 0, '作品名<!--field--->title<!--record-->发布时间<!--field--->newstime<!--record-->作品预览图<!--field--->titlepic<!--record-->作者<!--field--->flashwriter<!--record-->作品评价<!--field--->star<!--record-->文件大小<!--field--->filesize<!--record-->Flash地址<!--field--->flashurl<!--record-->作品简介<!--field--->flashsay<!--record-->', 'FLASH', ',title,newstime,titlepic,flashwriter,email,star,filesize,flashurl,width,height,flashsay,', ',title,newstime,titlepic,flashwriter,email,star,filesize,flashurl,width,height,flashsay,', 0, 0, 0, 0, '', 1, '', 0);
INSERT INTO `phome_enewsmod` VALUES (5, '电影系统模型', '<table width=100% align=center cellpadding=3 cellspacing=1 class=tableborder>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>影片名(*)</td>\r\n    <td bgcolor=ffffff>[!--title--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>特殊属性</td>\r\n    <td bgcolor=\\\'ffffff\\\'>[!--special.field--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>发布时间</td>\r\n    <td bgcolor=ffffff>[!--newstime--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>影片缩略图</td>\r\n    <td bgcolor=ffffff>[!--titlepic--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>影片类型</td>\r\n    <td bgcolor=ffffff>[!--movietype--]，推荐等级：[!--star--]，扣除点数：[!--moviefen--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>出品公司</td>\r\n    <td bgcolor=ffffff>[!--company--]，出品时间：[!--movietime--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>主演</td>\r\n    <td bgcolor=ffffff>[!--player--]，导演&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;：[!--playadmin--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>影片文件</td>\r\n    <td bgcolor=ffffff>影片格式：[!--filetype--]，影片大小：[!--filesize--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>影片属性</td>\r\n    <td bgcolor=ffffff>带宽要求：[!--playdk--]，片长：[!--playtime--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>下载地址</td>\r\n    <td bgcolor=ffffff>[!--downpath--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>在线观看播放器</td>\r\n    <td bgcolor=ffffff>[!--playerid--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>在线观看地址</td>\r\n    <td bgcolor=ffffff>[!--onlinepath--]</td>\r\n  </tr>\r\n  <tr> \r\n    <td width=16% height=25 bgcolor=ffffff>影片简介(*)</td>\r\n    <td bgcolor=ffffff>[!--moviesay--]</td>\r\n  </tr>\r\n</table>\r\n', '', '影片名<!--field--->title<!--record-->发布时间<!--field--->newstime<!--record-->影片缩略图<!--field--->titlepic<!--record-->影片类型<!--field--->movietype<!--record-->出品公司<!--field--->company<!--record-->出品时间<!--field--->movietime<!--record-->主演<!--field--->player<!--record-->导演<!--field--->playadmin<!--record-->影片格式<!--field--->filetype<!--record-->影片大小<!--field--->filesize<!--record-->推荐等级<!--field--->star<!--record-->带宽要求<!--field--->playdk<!--record-->片长<!--field--->playtime<!--record-->扣除点数<!--field--->moviefen<!--record-->下载地址<!--field--->downpath<!--record-->播放器<!--field--->playerid<!--record-->在线观看地址<!--field--->onlinepath<!--record-->影片简介<!--field--->moviesay<!--record-->', '影片名<!--field--->title<!--record-->特殊属性<!--field--->special.field<!--record-->发布时间<!--field--->newstime<!--record-->影片缩略图<!--field--->titlepic<!--record-->影片类型<!--field--->movietype<!--record-->出品公司<!--field--->company<!--record-->出品时间<!--field--->movietime<!--record-->主演<!--field--->player<!--record-->导演<!--field--->playadmin<!--record-->影片格式<!--field--->filetype<!--record-->影片大小<!--field--->filesize<!--record-->推荐等级<!--field--->star<!--record-->带宽要求<!--field--->playdk<!--record-->片长<!--field--->playtime<!--record-->扣除点数<!--field--->moviefen<!--record-->下载地址<!--field--->downpath<!--record-->播放器<!--field--->playerid<!--record-->在线观看地址<!--field--->onlinepath<!--record-->影片简介<!--field--->moviesay<!--record-->', '影片名<!--field--->title<!--record-->发布时间<!--field--->newstime<!--record-->影片缩略图<!--field--->titlepic<!--record-->影片类型<!--field--->movietype<!--record-->出品公司<!--field--->company<!--record-->出品时间<!--field--->movietime<!--record-->主演<!--field--->player<!--record-->导演<!--field--->playadmin<!--record-->影片格式<!--field--->filetype<!--record-->影片大小<!--field--->filesize<!--record-->推荐等级<!--field--->star<!--record-->带宽要求<!--field--->playdk<!--record-->片长<!--field--->playtime<!--record-->扣除点数<!--field--->moviefen<!--record-->下载地址<!--field--->downpath<!--record-->在线观看地址<!--field--->onlinepath<!--record-->影片简介<!--field--->moviesay<!--record-->', '|42|43|44|45|', ',title,movietype,company,player,playadmin,moviesay,', 5, 'movie', '', ',title,moviesay,', '<table width=100% align=center cellpadding=3 cellspacing=1 bgcolor=#DBEAF5></table>', '', 0, '影片名<!--field--->title<!--record-->发布时间<!--field--->newstime<!--record-->影片缩略图<!--field--->titlepic<!--record-->影片类型<!--field--->movietype<!--record-->出品公司<!--field--->company<!--record-->出品时间<!--field--->movietime<!--record-->主演<!--field--->player<!--record-->导演<!--field--->playadmin<!--record-->影片格式<!--field--->filetype<!--record-->影片大小<!--field--->filesize<!--record-->推荐等级<!--field--->star<!--record-->扣除点数<!--field--->moviefen<!--record-->影片简介<!--field--->moviesay<!--record-->', '电影', ',title,newstime,titlepic,movietype,company,movietime,player,playadmin,filetype,filesize,star,playdk,playtime,moviefen,downpath,playerid,onlinepath,moviesay,', ',title,newstime,titlepic,movietype,company,movietime,player,playadmin,filetype,filesize,star,playdk,playtime,moviefen,downpath,playerid,onlinepath,moviesay,', 0, 0, 0, 0, '', 1, '', 0);
INSERT INTO `phome_enewsmod` VALUES (6, '商城系统模型', '<table width=100% align=center cellpadding=3 cellspacing=1 class=tableborder>\r\n  <tr>\r\n    <td width=16% height=25 bgcolor=ffffff>商品名称(*)</td>\r\n    <td bgcolor=ffffff>[!--title--]</td>\r\n  </tr>\r\n  <tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>特殊属性</td><td bgcolor=\\\'ffffff\\\'>[!--special.field--]</td></tr>\r\n  <tr>\r\n    <td width=16% height=25 bgcolor=ffffff>发布时间</td>\r\n    <td bgcolor=ffffff>[!--newstime--]</td>\r\n  </tr>\r\n  <tr>\r\n    <td width=16% height=25 bgcolor=ffffff>商品编号</td>\r\n    <td bgcolor=ffffff>[!--productno--]</td>\r\n  </tr>\r\n  <tr>\r\n    <td width=16% height=25 bgcolor=ffffff>品牌</td>\r\n    <td bgcolor=ffffff>[!--pbrand--]</td>\r\n  </tr>\r\n  <tr>\r\n    <td width=16% height=25 bgcolor=ffffff>简单描述</td>\r\n    <td bgcolor=ffffff>[!--intro--]</td>\r\n  </tr>\r\n  <tr>\r\n    <td width=16% height=25 bgcolor=ffffff>计量单位</td>\r\n    <td bgcolor=ffffff>[!--unit--]</td>\r\n  </tr>\r\n  <tr>\r\n    <td width=16% height=25 bgcolor=ffffff>单位重量</td>\r\n    <td bgcolor=ffffff>[!--weight--]</td>\r\n  </tr>\r\n  <tr>\r\n    <td width=16% height=25 bgcolor=ffffff>市场价格</td>\r\n    <td bgcolor=ffffff>[!--tprice--]元</td>\r\n  </tr>\r\n  <tr>\r\n    <td width=16% height=25 bgcolor=ffffff>购买价格</td>\r\n    <td bgcolor=ffffff>[!--price--]元</td>\r\n  </tr>\r\n  <tr>\r\n    <td width=16% height=25 bgcolor=ffffff>积分购买</td>\r\n    <td bgcolor=ffffff>[!--buyfen--]点</td>\r\n  </tr>\r\n  <tr>\r\n    <td width=16% height=25 bgcolor=ffffff>库存</td>\r\n    <td bgcolor=ffffff>[!--pmaxnum--]</td>\r\n  </tr>\r\n  <tr>\r\n    <td width=16% height=25 bgcolor=ffffff>商品缩略片</td>\r\n    <td bgcolor=ffffff>[!--titlepic--]</td>\r\n  </tr>\r\n  <tr>\r\n    <td width=16% height=25 bgcolor=ffffff>商品大图</td>\r\n    <td bgcolor=ffffff>[!--productpic--]</td>\r\n  </tr>\r\n  <tr>\r\n    <td height=25 colspan=2 bgcolor=ffffff><div align=left>商品介绍(*)</div></td>\r\n  </tr>\r\n</table>\r\n<div style=\\"background-color:#D0D0D0\\">[!--newstext--]</div>', '', '商品名称<!--field--->title<!--record-->发布时间<!--field--->newstime<!--record-->商品编号<!--field--->productno<!--record-->品牌<!--field--->pbrand<!--record-->简单描述<!--field--->intro<!--record-->计量单位<!--field--->unit<!--record-->单位重量<!--field--->weight<!--record-->市场价格<!--field--->tprice<!--record-->购买价格<!--field--->price<!--record-->积分购买<!--field--->buyfen<!--record-->库存<!--field--->pmaxnum<!--record-->商品缩略片<!--field--->titlepic<!--record-->商品大图<!--field--->productpic<!--record-->商品介绍<!--field--->newstext<!--record-->', '商品名称<!--field--->title<!--record-->特殊属性<!--field--->special.field<!--record-->发布时间<!--field--->newstime<!--record-->商品编号<!--field--->productno<!--record-->品牌<!--field--->pbrand<!--record-->简单描述<!--field--->intro<!--record-->计量单位<!--field--->unit<!--record-->单位重量<!--field--->weight<!--record-->市场价格<!--field--->tprice<!--record-->购买价格<!--field--->price<!--record-->积分购买<!--field--->buyfen<!--record-->库存<!--field--->pmaxnum<!--record-->商品缩略片<!--field--->titlepic<!--record-->商品大图<!--field--->productpic<!--record-->商品介绍<!--field--->newstext<!--record-->', '商品名称<!--field--->title<!--record-->发布时间<!--field--->newstime<!--record-->商品编号<!--field--->productno<!--record-->品牌<!--field--->pbrand<!--record-->简单描述<!--field--->intro<!--record-->计量单位<!--field--->unit<!--record-->单位重量<!--field--->weight<!--record-->市场价格<!--field--->tprice<!--record-->购买价格<!--field--->price<!--record-->积分购买<!--field--->buyfen<!--record-->库存<!--field--->pmaxnum<!--record-->商品缩略片<!--field--->titlepic<!--record-->商品大图<!--field--->productpic<!--record-->商品介绍<!--field--->newstext<!--record-->', '|46|47|48|49|', ',title,productno,pbrand,intro,price,newstext,', 6, 'shop', '', ',title,newstext,', '<table width=100% align=center cellpadding=3 cellspacing=1 bgcolor=#DBEAF5></table>', ',pbrand,', 0, '商品名称<!--field--->title<!--record-->发布时间<!--field--->newstime<!--record-->商品编号<!--field--->productno<!--record-->品牌<!--field--->pbrand<!--record-->简单描述<!--field--->intro<!--record-->计量单位<!--field--->unit<!--record-->单位重量<!--field--->weight<!--record-->市场价格<!--field--->tprice<!--record-->购买价格<!--field--->price<!--record-->积分购买<!--field--->buyfen<!--record-->库存<!--field--->pmaxnum<!--record-->商品缩略片<!--field--->titlepic<!--record-->商品大图<!--field--->productpic<!--record-->商品介绍<!--field--->newstext<!--record-->', '商品', ',title,newstime,productno,pbrand,intro,unit,weight,tprice,price,buyfen,pmaxnum,titlepic,productpic,newstext,', ',title,newstime,productno,pbrand,intro,unit,weight,tprice,price,buyfen,pmaxnum,titlepic,productpic,newstext,', 0, 0, 0, 0, '', 1, '', 0);
INSERT INTO `phome_enewsmod` VALUES (7, '文章系统模型', '<table width=\\\'100%\\\' align=center cellpadding=3 cellspacing=1 class=\\"tableborder\\"><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>标题(*)</td><td bgcolor=\\\'ffffff\\\'>[!--title--]</td></tr><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>副标题</td><td bgcolor=\\\'ffffff\\\'>[!--ftitle--]</td></tr><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>特殊属性</td><td bgcolor=\\\'ffffff\\\'>[!--special.field--]</td></tr><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>发布时间</td><td bgcolor=\\\'ffffff\\\'>[!--newstime--]</td></tr><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>标题图片</td><td bgcolor=\\\'ffffff\\\'>[!--titlepic--]</td></tr><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>内容简介</td><td bgcolor=\\\'ffffff\\\'>[!--smalltext--]</td></tr><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>作者</td><td bgcolor=\\\'ffffff\\\'>[!--writer--]</td></tr><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>信息来源</td><td bgcolor=\\\'ffffff\\\'>[!--befrom--]</td></tr><tr><td height=25 colspan=2 bgcolor=\\\'ffffff\\\'><div align=left>新闻正文(*)</div></td></tr></table><div style=\\"background-color:#D0D0D0\\">[!--newstext--]</div>', '', '标题<!--field--->title<!--record-->副标题<!--field--->ftitle<!--record-->发布时间<!--field--->newstime<!--record-->标题图片<!--field--->titlepic<!--record-->内容简介<!--field--->smalltext<!--record-->作者<!--field--->writer<!--record-->信息来源<!--field--->befrom<!--record-->新闻正文<!--field--->newstext<!--record-->', '标题<!--field--->title<!--record-->副标题<!--field--->ftitle<!--record-->特殊属性<!--field--->special.field<!--record-->发布时间<!--field--->newstime<!--record-->标题图片<!--field--->titlepic<!--record-->内容简介<!--field--->smalltext<!--record-->作者<!--field--->writer<!--record-->信息来源<!--field--->befrom<!--record-->新闻正文<!--field--->newstext<!--record-->', '标题<!--field--->title<!--record-->副标题<!--field--->ftitle<!--record-->发布时间<!--field--->newstime<!--record-->标题图片<!--field--->titlepic<!--record-->内容简介<!--field--->smalltext<!--record-->作者<!--field--->writer<!--record-->信息来源<!--field--->befrom<!--record-->新闻正文<!--field--->newstext<!--record-->顶<!--field--->diggtop<!--record-->', '|55|56|57|', ',title,smalltext,', 7, 'article', '标题<!--field--->title<!--record-->副标题<!--field--->ftitle<!--record-->特殊属性<!--field--->special.field<!--record-->标题图片<!--field--->titlepic<!--record-->内容简介<!--field--->smalltext<!--record-->作者<!--field--->writer<!--record-->信息来源<!--field--->befrom<!--record-->新闻正文<!--field--->newstext<!--record-->', ',title,newstext,', '<table width=100% align=center cellpadding=3 cellspacing=1 class=\\"tableborder\\"><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>标题(*)</td><td bgcolor=\\\'ffffff\\\'>[!--title--]</td></tr><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>副标题</td><td bgcolor=\\\'ffffff\\\'>[!--ftitle--]</td></tr><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>关键字</td><td bgcolor=\\\'ffffff\\\'>[!--special.field--]</td></tr><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>标题图片</td><td bgcolor=\\\'ffffff\\\'>[!--titlepic--]</td></tr><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>内容简介</td><td bgcolor=\\\'ffffff\\\'>[!--smalltext--]</td></tr><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>作者</td><td bgcolor=\\\'ffffff\\\'>[!--writer--]</td></tr><tr><td width=\\\'16%\\\' height=25 bgcolor=\\\'ffffff\\\'>信息来源</td><td bgcolor=\\\'ffffff\\\'>[!--befrom--]</td></tr><tr><td height=25 colspan=2 bgcolor=\\\'ffffff\\\'><div align=left>新闻正文(*)</div></td></tr></table><div style=\\"background-color:#D0D0D0\\">[!--newstext--]</div>', '', 0, '标题<!--field--->title<!--record-->副标题<!--field--->ftitle<!--record-->发布时间<!--field--->newstime<!--record-->标题图片<!--field--->titlepic<!--record-->内容简介<!--field--->smalltext<!--record-->顶<!--field--->diggtop<!--record-->', '文章', ',title,ftitle,newstime,titlepic,smalltext,writer,befrom,newstext,', ',title,ftitle,newstime,titlepic,smalltext,writer,befrom,newstext,', 0, 0, 0, 0, '', 1, '', 0);
INSERT INTO `phome_enewsmod` VALUES (8, '分类信息系统模型', '<table width=100% align=center cellpadding=3 cellspacing=1 class=\\"tableborder\\"><tr><td width=16% height=25 bgcolor=ffffff>标题</td><td bgcolor=ffffff>[!--title--]</td></tr><tr><td width=16% height=25 bgcolor=ffffff>特殊属性</td><td bgcolor=ffffff>[!--special.field--]</td></tr><tr><td width=16% height=25 bgcolor=ffffff>发布时间</td><td bgcolor=ffffff>[!--newstime--]</td></tr><tr><td width=16% height=25 bgcolor=ffffff>信息内容</td><td bgcolor=ffffff>[!--smalltext--]</td></tr><tr><td width=16% height=25 bgcolor=ffffff>图片</td><td bgcolor=ffffff>[!--titlepic--]</td></tr><tr><td width=16% height=25 bgcolor=ffffff>所在地</td><td bgcolor=ffffff>[!--myarea--]</td></tr><tr><td width=16% height=25 bgcolor=ffffff>联系邮箱</td><td bgcolor=ffffff>[!--email--]</td></tr><tr><td width=16% height=25 bgcolor=ffffff>联系方式</td><td bgcolor=ffffff>[!--mycontact--]</td></tr><tr><td width=16% height=25 bgcolor=ffffff>联系地址</td><td bgcolor=ffffff>[!--address--]</td></tr></table>', '', '标题<!--field--->title<!--record-->发布时间<!--field--->newstime<!--record-->信息内容<!--field--->smalltext<!--record-->图片<!--field--->titlepic<!--record-->所在地<!--field--->myarea<!--record-->联系邮箱<!--field--->email<!--record-->联系方式<!--field--->mycontact<!--record-->联系地址<!--field--->address<!--record-->', '标题<!--field--->title<!--record-->特殊属性<!--field--->special.field<!--record-->发布时间<!--field--->newstime<!--record-->信息内容<!--field--->smalltext<!--record-->图片<!--field--->titlepic<!--record-->所在地<!--field--->myarea<!--record-->联系邮箱<!--field--->email<!--record-->联系方式<!--field--->mycontact<!--record-->联系地址<!--field--->address<!--record-->', '标题<!--field--->title<!--record-->发布时间<!--field--->newstime<!--record-->信息内容<!--field--->smalltext<!--record-->图片<!--field--->titlepic<!--record-->所在地<!--field--->myarea<!--record-->联系邮箱<!--field--->email<!--record-->联系方式<!--field--->mycontact<!--record-->联系地址<!--field--->address<!--record-->', '|11|12|13|14|15|16|18|19|20|21|23|24|25|26|28|29|30|31|', ',title,smalltext,myarea,', 8, 'info', '标题<!--field--->title<!--record-->信息内容<!--field--->smalltext<!--record-->图片<!--field--->titlepic<!--record-->所在地<!--field--->myarea<!--record-->联系邮箱<!--field--->email<!--record-->联系方式<!--field--->mycontact<!--record-->联系地址<!--field--->address<!--record-->', ',title,smalltext,myarea,email,', '<table width=100% align=center cellpadding=3 cellspacing=1 class=\\"tableborder\\"><tr>\r\n    <td width=16% height=25 bgcolor=ffffff>信息标题(*)</td>\r\n    <td bgcolor=ffffff>[!--title--]</td></tr><tr>\r\n    <td width=16% height=25 bgcolor=ffffff>信息内容(*)</td>\r\n    <td bgcolor=ffffff>[!--smalltext--]</td></tr><tr><td width=16% height=25 bgcolor=ffffff>图片</td><td bgcolor=ffffff>[!--titlepic--]</td></tr><tr>\r\n    <td width=16% height=25 bgcolor=ffffff>所在地(*)</td>\r\n    <td bgcolor=ffffff>[!--myarea--]</td></tr><tr>\r\n    <td width=16% height=25 bgcolor=ffffff>联系邮箱(*)</td>\r\n    <td bgcolor=ffffff>[!--email--]</td></tr><tr><td width=16% height=25 bgcolor=ffffff>联系方式</td><td bgcolor=ffffff>[!--mycontact--]</td></tr><tr><td width=16% height=25 bgcolor=ffffff>联系地址</td><td bgcolor=ffffff>[!--address--]</td></tr></table>', ',myarea,', 0, '标题<!--field--->title<!--record-->发布时间<!--field--->newstime<!--record-->信息内容<!--field--->smalltext<!--record-->图片<!--field--->titlepic<!--record-->所在地<!--field--->myarea<!--record-->', '分类信息', ',title,newstime,smalltext,titlepic,myarea,email,mycontact,address,', ',title,newstime,smalltext,titlepic,myarea,email,mycontact,address,', 0, 0, 0, 0, '', 1, '', 0);

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsnotcj`;
CREATE TABLE `phome_enewsnotcj` (
  `id` smallint(6) NOT NULL auto_increment,
  `word` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

INSERT INTO `phome_enewsnotcj` VALUES (1, '<input type=hidden value=\\\'欢迎使用帝国网站管理系统：www.phome.net\\\'>');
INSERT INTO `phome_enewsnotcj` VALUES (2, '<phome 帝国网站管理系统,phome.net>');
INSERT INTO `phome_enewsnotcj` VALUES (3, '<!--帝国CMS,phome.net-->');
INSERT INTO `phome_enewsnotcj` VALUES (4, '<table style=display=none><tr><td>\r\nEmpire CMS,phome.net\r\n</td></tr></table>');
INSERT INTO `phome_enewsnotcj` VALUES (5, '<div style=display=none>\r\n拥有帝国一切，皆有可能。欢迎访问phome.net\r\n</div>');

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewspage`;
CREATE TABLE `phome_enewspage` (
  `id` smallint(6) NOT NULL auto_increment,
  `title` varchar(120) NOT NULL default '',
  `pagetext` mediumtext NOT NULL,
  `path` varchar(255) NOT NULL default '',
  `classid` smallint(6) NOT NULL default '0',
  `pagetitle` varchar(120) NOT NULL default '',
  `pagekeywords` varchar(255) NOT NULL default '',
  `pagedescription` varchar(255) NOT NULL default '',
  `tempid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewspageclass`;
CREATE TABLE `phome_enewspageclass` (
  `classid` smallint(6) NOT NULL auto_increment,
  `classname` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewspayapi`;
CREATE TABLE `phome_enewspayapi` (
  `payid` smallint(6) NOT NULL auto_increment,
  `paytype` varchar(20) NOT NULL default '',
  `myorder` tinyint(4) NOT NULL default '0',
  `payfee` varchar(10) NOT NULL default '',
  `payuser` varchar(60) NOT NULL default '',
  `partner` varchar(60) NOT NULL default '',
  `paykey` varchar(120) NOT NULL default '',
  `paylogo` varchar(200) NOT NULL default '',
  `paysay` text NOT NULL,
  `payname` varchar(120) NOT NULL default '',
  `isclose` tinyint(1) NOT NULL default '0',
  `payemail` varchar(120) NOT NULL default '',
  `paymethod` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`payid`),
  UNIQUE KEY `paytype` (`paytype`)
) TYPE=MyISAM;

INSERT INTO `phome_enewspayapi` VALUES (1, 'tenpay', 1, '0', '', '', '', '', '财付通（www.tenpay.com） - 腾讯旗下在线支付平台，通过国家权威安全认证，支持各大银行网上支付。', '财付通', 0, '', 0);
INSERT INTO `phome_enewspayapi` VALUES (2, 'chinabank', 2, '0', '', '', '', '', '网银在线与中国工商银行、招商银行、中国建设银行、农业银行、民生银行等数十家金融机构达成协议。全面支持全国19家银行的信用卡及借记卡实现网上支付。（网址：http://www.chinabank.com.cn）', '网银在线', 0, '', 0);
INSERT INTO `phome_enewspayapi` VALUES (3, 'alipay', 0, '0', '', '', '', '', '支付宝网站(www.alipay.com) 是国内先进的网上支付平台。', '支付宝接口', 0, '', 1);

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewspayrecord`;
CREATE TABLE `phome_enewspayrecord` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `orderid` varchar(50) NOT NULL default '',
  `money` varchar(20) NOT NULL default '',
  `posttime` datetime NOT NULL default '0000-00-00 00:00:00',
  `paybz` varchar(255) NOT NULL default '',
  `type` varchar(12) NOT NULL default '',
  `payip` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `userid` (`userid`,`orderid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewspic`;
CREATE TABLE `phome_enewspic` (
  `picid` smallint(6) NOT NULL auto_increment,
  `title` varchar(120) NOT NULL default '',
  `pic_url` varchar(200) NOT NULL default '',
  `url` varchar(200) NOT NULL default '',
  `pic_width` varchar(20) NOT NULL default '',
  `pic_height` varchar(20) NOT NULL default '',
  `open_pic` varchar(20) NOT NULL default '',
  `border` tinyint(1) NOT NULL default '0',
  `pictext` text NOT NULL,
  `classid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`picid`),
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewspicclass`;
CREATE TABLE `phome_enewspicclass` (
  `classid` smallint(6) NOT NULL auto_increment,
  `classname` varchar(60) NOT NULL default '',
  PRIMARY KEY  (`classid`)
) TYPE=MyISAM;

INSERT INTO `phome_enewspicclass` VALUES (1, '默认图片信息类别');

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewspl`;
CREATE TABLE `phome_enewspl` (
  `plid` int(11) NOT NULL auto_increment,
  `username` varchar(30) NOT NULL default '',
  `sayip` varchar(20) NOT NULL default '',
  `saytime` datetime NOT NULL default '0000-00-00 00:00:00',
  `id` int(11) NOT NULL default '0',
  `checked` tinyint(1) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  `zcnum` smallint(6) NOT NULL default '0',
  `fdnum` smallint(6) NOT NULL default '0',
  `userid` int(11) NOT NULL default '0',
  `isgood` tinyint(1) NOT NULL default '0',
  `stb` varchar(6) NOT NULL default '',
  PRIMARY KEY  (`plid`),
  KEY `id` (`id`),
  KEY `classid` (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewspl_data_1`;
CREATE TABLE `phome_enewspl_data_1` (
  `plid` int(11) NOT NULL auto_increment,
  `classid` smallint(6) NOT NULL default '0',
  `id` int(11) NOT NULL default '0',
  `saytext` text NOT NULL,
  PRIMARY KEY  (`plid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsplayer`;
CREATE TABLE `phome_enewsplayer` (
  `id` smallint(6) NOT NULL auto_increment,
  `player` varchar(30) NOT NULL default '',
  `filename` varchar(20) NOT NULL default '',
  `bz` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

INSERT INTO `phome_enewsplayer` VALUES (1, 'RealPlayer', 'realplayer.php', 'RealPlayer播放器');
INSERT INTO `phome_enewsplayer` VALUES (2, 'MediaPlayer', 'mediaplayer.php', 'MediaPlayer播放器');
INSERT INTO `phome_enewsplayer` VALUES (3, 'FLASH', 'flasher.php', 'FLASH播放器');
INSERT INTO `phome_enewsplayer` VALUES (4, 'FLV播放器', 'flver.php', 'FLV播放器');

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsplf`;
CREATE TABLE `phome_enewsplf` (
  `fid` smallint(6) NOT NULL auto_increment,
  `f` varchar(30) NOT NULL default '',
  `fname` varchar(30) NOT NULL default '',
  `fzs` varchar(255) NOT NULL default '',
  `ftype` varchar(30) NOT NULL default '',
  `flen` varchar(20) NOT NULL default '',
  `ismust` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`fid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewspostdata`;
CREATE TABLE `phome_enewspostdata` (
  `postid` bigint(20) NOT NULL auto_increment,
  `rnd` varchar(32) NOT NULL default '',
  `postdata` varchar(255) NOT NULL default '',
  `ispath` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`postid`),
  KEY `rnd` (`rnd`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewspostserver`;
CREATE TABLE `phome_enewspostserver` (
  `pid` smallint(6) NOT NULL auto_increment,
  `pname` varchar(60) NOT NULL default '',
  `purl` varchar(255) NOT NULL default '',
  `ptype` tinyint(1) NOT NULL default '0',
  `ftphost` varchar(255) NOT NULL default '',
  `ftpport` varchar(20) NOT NULL default '',
  `ftpusername` varchar(120) NOT NULL default '',
  `ftppassword` varchar(120) NOT NULL default '',
  `ftppath` varchar(255) NOT NULL default '',
  `ftpmode` tinyint(1) NOT NULL default '0',
  `ftpssl` tinyint(1) NOT NULL default '0',
  `ftppasv` tinyint(1) NOT NULL default '0',
  `ftpouttime` smallint(6) NOT NULL default '0',
  `lastposttime` int(11) NOT NULL default '0',
  PRIMARY KEY  (`pid`),
  KEY `ptype` (`ptype`)
) TYPE=MyISAM;

INSERT INTO `phome_enewspostserver` VALUES (1, '附件服务器', '', 1, '', '', '', '', '', 0, 0, 0, 0, 0);

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewspublic`;
CREATE TABLE `phome_enewspublic` (
  `newsurl` varchar(120) NOT NULL default '',
  `sitename` varchar(60) NOT NULL default '',
  `email` varchar(50) NOT NULL default '',
  `filetype` text NOT NULL,
  `filesize` int(11) NOT NULL default '0',
  `hotnum` tinyint(4) NOT NULL default '0',
  `newnum` tinyint(4) NOT NULL default '0',
  `relistnum` int(11) NOT NULL default '0',
  `renewsnum` int(11) NOT NULL default '0',
  `min_keyboard` tinyint(4) NOT NULL default '0',
  `max_keyboard` tinyint(4) NOT NULL default '0',
  `search_num` tinyint(4) NOT NULL default '0',
  `search_pagenum` tinyint(4) NOT NULL default '0',
  `newslink` tinyint(4) NOT NULL default '0',
  `checked` tinyint(1) NOT NULL default '0',
  `pltime` int(11) NOT NULL default '0',
  `searchtime` int(11) NOT NULL default '0',
  `loginnum` smallint(6) NOT NULL default '0',
  `logintime` int(11) NOT NULL default '0',
  `addnews_ok` tinyint(1) NOT NULL default '0',
  `register_ok` tinyint(1) NOT NULL default '0',
  `indextype` varchar(10) NOT NULL default '',
  `goodlencord` tinyint(4) NOT NULL default '0',
  `goodtype` varchar(10) NOT NULL default '',
  `goodnum` tinyint(4) NOT NULL default '0',
  `searchtype` varchar(10) NOT NULL default '',
  `exittime` smallint(6) NOT NULL default '0',
  `smalltextlen` smallint(6) NOT NULL default '0',
  `defaultgroupid` smallint(6) NOT NULL default '0',
  `fileurl` varchar(255) NOT NULL default '',
  `phpmode` tinyint(1) NOT NULL default '0',
  `ftphost` varchar(255) NOT NULL default '',
  `ftpport` varchar(20) NOT NULL default '21',
  `ftpusername` varchar(120) NOT NULL default '',
  `ftppassword` varchar(120) NOT NULL default '',
  `ftppath` varchar(255) NOT NULL default '',
  `ftpmode` tinyint(1) NOT NULL default '0',
  `install` tinyint(1) NOT NULL default '0',
  `plsize` smallint(6) NOT NULL default '0',
  `plincludesize` smallint(6) NOT NULL default '0',
  `hotplnum` tinyint(4) NOT NULL default '0',
  `softversion` varchar(30) NOT NULL default '0',
  `lctime` int(11) NOT NULL default '0',
  `dorepnum` smallint(6) NOT NULL default '0',
  `loadtempnum` smallint(6) NOT NULL default '0',
  `firstnum` tinyint(4) NOT NULL default '0',
  `bakdbpath` varchar(50) NOT NULL default '',
  `bakdbzip` varchar(50) NOT NULL default '',
  `downpass` varchar(32) NOT NULL default '',
  `min_userlen` tinyint(4) NOT NULL default '0',
  `max_userlen` tinyint(4) NOT NULL default '0',
  `min_passlen` tinyint(4) NOT NULL default '0',
  `max_passlen` tinyint(4) NOT NULL default '0',
  `filechmod` tinyint(1) NOT NULL default '0',
  `tid` smallint(6) NOT NULL default '0',
  `tbname` varchar(60) NOT NULL default '',
  `loginkey_ok` tinyint(1) NOT NULL default '0',
  `limittype` tinyint(1) NOT NULL default '0',
  `plkey_ok` tinyint(1) NOT NULL default '0',
  `redodown` smallint(6) NOT NULL default '0',
  `fpnum` smallint(6) NOT NULL default '0',
  `havefp` tinyint(1) NOT NULL default '0',
  `candocode` tinyint(1) NOT NULL default '0',
  `opennotcj` tinyint(1) NOT NULL default '0',
  `reuserpagenum` int(11) NOT NULL default '0',
  `revotejsnum` int(11) NOT NULL default '0',
  `readjsnum` int(11) NOT NULL default '0',
  `qaddtran` tinyint(1) NOT NULL default '0',
  `qaddtransize` int(11) NOT NULL default '0',
  `ebakthisdb` tinyint(1) NOT NULL default '0',
  `delnewsnum` int(11) NOT NULL default '0',
  `markpos` tinyint(4) NOT NULL default '0',
  `markimg` varchar(80) NOT NULL default '',
  `marktext` varchar(80) NOT NULL default '',
  `markfontsize` varchar(12) NOT NULL default '',
  `markfontcolor` varchar(12) NOT NULL default '',
  `markfont` varchar(80) NOT NULL default '',
  `adminloginkey` tinyint(1) NOT NULL default '0',
  `php_outtime` int(11) NOT NULL default '0',
  `listpagefun` varchar(36) NOT NULL default '',
  `textpagefun` varchar(36) NOT NULL default '',
  `adfile` varchar(30) NOT NULL default '',
  `notsaveurl` text NOT NULL,
  `jstempid` smallint(6) NOT NULL default '0',
  `rssnum` smallint(6) NOT NULL default '0',
  `rsssub` smallint(6) NOT NULL default '0',
  `savetxtf` text NOT NULL,
  `dorepdlevelnum` int(11) NOT NULL default '0',
  `listpagelistfun` varchar(36) NOT NULL default '',
  `listpagelistnum` smallint(6) NOT NULL default '0',
  `infolinknum` int(11) NOT NULL default '0',
  `searchgroupid` smallint(6) NOT NULL default '0',
  `opencopytext` tinyint(1) NOT NULL default '0',
  `reuserjsnum` int(11) NOT NULL default '0',
  `reuserlistnum` int(11) NOT NULL default '0',
  `opentitleurl` tinyint(1) NOT NULL default '0',
  `qaddtranimgtype` text NOT NULL,
  `qaddtranfile` tinyint(1) NOT NULL default '0',
  `qaddtranfilesize` int(11) NOT NULL default '0',
  `qaddtranfiletype` text NOT NULL,
  `sendmailtype` tinyint(1) NOT NULL default '0',
  `smtphost` varchar(255) NOT NULL default '',
  `fromemail` varchar(120) NOT NULL default '',
  `loginemail` tinyint(1) NOT NULL default '0',
  `emailusername` varchar(60) NOT NULL default '',
  `emailpassword` varchar(60) NOT NULL default '',
  `smtpport` varchar(20) NOT NULL default '',
  `emailname` varchar(120) NOT NULL default '',
  `deftempid` smallint(6) NOT NULL default '0',
  `feedbacktfile` tinyint(1) NOT NULL default '0',
  `feedbackfilesize` int(11) NOT NULL default '0',
  `feedbackfiletype` text NOT NULL,
  `searchtempvar` tinyint(1) NOT NULL default '0',
  `showinfolevel` smallint(6) NOT NULL default '0',
  `navfh` varchar(20) NOT NULL default '',
  `spicwidth` smallint(6) NOT NULL default '0',
  `spicheight` smallint(6) NOT NULL default '0',
  `spickill` tinyint(1) NOT NULL default '0',
  `jpgquality` tinyint(4) NOT NULL default '0',
  `markpct` tinyint(4) NOT NULL default '0',
  `redoview` smallint(6) NOT NULL default '0',
  `reggetfen` smallint(6) NOT NULL default '0',
  `regbooktime` smallint(6) NOT NULL default '0',
  `revotetime` smallint(6) NOT NULL default '0',
  `nreclass` text NOT NULL,
  `nreinfo` text NOT NULL,
  `nrejs` text NOT NULL,
  `fpath` tinyint(1) NOT NULL default '0',
  `filepath` varchar(30) NOT NULL default '',
  `openmembertranimg` tinyint(1) NOT NULL default '0',
  `memberimgsize` int(11) NOT NULL default '0',
  `memberimgtype` text NOT NULL,
  `openmembertranfile` tinyint(1) NOT NULL default '0',
  `memberfilesize` int(11) NOT NULL default '0',
  `memberfiletype` text NOT NULL,
  `nottobq` text NOT NULL,
  `defspacestyleid` smallint(6) NOT NULL default '0',
  `canposturl` text NOT NULL,
  `openspace` tinyint(1) NOT NULL default '0',
  `defadminstyle` smallint(6) NOT NULL default '0',
  `realltime` smallint(6) NOT NULL default '0',
  `closeip` text NOT NULL,
  `openip` text NOT NULL,
  `hopenip` text NOT NULL,
  `plface` text NOT NULL,
  `plfacenum` tinyint(4) NOT NULL default '0',
  `closewords` text NOT NULL,
  `closewordsf` text NOT NULL,
  `textpagelistnum` smallint(6) NOT NULL default '0',
  `memberlistlevel` smallint(6) NOT NULL default '0',
  `wapopen` tinyint(1) NOT NULL default '0',
  `wapdefstyle` smallint(6) NOT NULL default '0',
  `wapshowmid` varchar(255) NOT NULL default '',
  `waplistnum` tinyint(4) NOT NULL default '0',
  `wapsubtitle` tinyint(4) NOT NULL default '0',
  `wapshowdate` varchar(50) NOT NULL default '',
  `wapchar` tinyint(1) NOT NULL default '0',
  `ebakcanlistdb` tinyint(1) NOT NULL default '0',
  `paymoneytofen` int(11) NOT NULL default '0',
  `payminmoney` int(11) NOT NULL default '0',
  `keytog` tinyint(1) NOT NULL default '0',
  `keyrnd` varchar(60) NOT NULL default '',
  `keytime` int(11) NOT NULL default '0',
  `regkey_ok` tinyint(1) NOT NULL default '0',
  `opengetdown` tinyint(1) NOT NULL default '0',
  `gbkey_ok` tinyint(1) NOT NULL default '0',
  `fbkey_ok` tinyint(1) NOT NULL default '0',
  `newaddinfotime` smallint(6) NOT NULL default '0',
  `classnavline` smallint(6) NOT NULL default '0',
  `classnavfh` varchar(120) NOT NULL default '',
  `plgroupid` smallint(6) NOT NULL default '0',
  `adminstyle` text NOT NULL,
  `sitekey` varchar(255) NOT NULL default '',
  `siteintro` text NOT NULL,
  `docnewsnum` int(11) NOT NULL default '0',
  `openschall` tinyint(1) NOT NULL default '0',
  `schallfield` tinyint(1) NOT NULL default '0',
  `schallminlen` tinyint(4) NOT NULL default '0',
  `schallmaxlen` tinyint(4) NOT NULL default '0',
  `schallnotcid` text NOT NULL,
  `schallnum` smallint(6) NOT NULL default '0',
  `schallpagenum` smallint(6) NOT NULL default '0',
  `dtcanbq` tinyint(1) NOT NULL default '0',
  `dtcachetime` int(11) NOT NULL default '0',
  `plclosewords` text NOT NULL,
  `plf` text NOT NULL,
  `plmustf` text NOT NULL,
  `pldatatbs` text NOT NULL,
  `pldeftb` varchar(6) NOT NULL default '',
  `defpltempid` smallint(6) NOT NULL default '0',
  `buycarnum` smallint(6) NOT NULL default '0',
  `shopddgroupid` smallint(6) NOT NULL default '0',
  `regretime` smallint(6) NOT NULL default '0',
  `regclosewords` text NOT NULL,
  `regemailonly` tinyint(1) NOT NULL default '0',
  `repkeynum` smallint(6) NOT NULL default '0',
  `getpasstime` int(11) NOT NULL default '0',
  `acttime` int(11) NOT NULL default '0',
  `regacttype` tinyint(1) NOT NULL default '0',
  `acttext` text NOT NULL,
  `getpasstext` text NOT NULL,
  `acttitle` varchar(120) NOT NULL default '',
  `getpasstitle` varchar(120) NOT NULL default '',
  `opengetpass` tinyint(1) NOT NULL default '0',
  `hlistinfonum` int(11) NOT NULL default '0',
  `qlistinfonum` int(11) NOT NULL default '0',
  `dtncanbq` tinyint(1) NOT NULL default '0',
  `dtncachetime` int(11) NOT NULL default '0',
  `readdinfotime` smallint(6) NOT NULL default '0',
  `qeditinfotime` int(11) NOT NULL default '0',
  `ftpssl` tinyint(1) NOT NULL default '0',
  `ftppasv` tinyint(1) NOT NULL default '0',
  `ftpouttime` smallint(6) NOT NULL default '0',
  `onclicktype` tinyint(1) NOT NULL default '0',
  `onclickfilesize` int(11) NOT NULL default '0',
  `onclickfiletime` int(11) NOT NULL default '0',
  `schalltime` smallint(6) NOT NULL default '0',
  `defprinttempid` smallint(6) NOT NULL default '0',
  `opentags` tinyint(1) NOT NULL default '0',
  `tagstempid` smallint(6) NOT NULL default '0',
  `usetags` text NOT NULL,
  `chtags` text NOT NULL,
  `tagslistnum` smallint(6) NOT NULL default '0',
  `closeqdt` tinyint(1) NOT NULL default '0',
  `settop` tinyint(1) NOT NULL default '0',
  `qlistinfomod` tinyint(1) NOT NULL default '0',
  `pl_num` tinyint(4) NOT NULL default '0',
  `gb_num` tinyint(4) NOT NULL default '0',
  `member_num` tinyint(4) NOT NULL default '0',
  `space_num` tinyint(4) NOT NULL default '0',
  `opendoip` text NOT NULL,
  `closedoip` text NOT NULL,
  `doiptype` varchar(255) NOT NULL default '',
  `filelday` int(11) NOT NULL default '0',
  `infolday` int(11) NOT NULL default '0',
  `baktempnum` tinyint(4) NOT NULL default '0',
  `dorepkey` tinyint(1) NOT NULL default '0',
  `dorepword` tinyint(1) NOT NULL default '0',
  `onclickrnd` varchar(20) NOT NULL default '',
  `indexpagedt` tinyint(1) NOT NULL default '0',
  `keybgcolor` varchar(8) NOT NULL default '',
  `keyfontcolor` varchar(8) NOT NULL default '',
  `keydistcolor` varchar(8) NOT NULL default '',
  `indexpageid` smallint(6) NOT NULL default '0',
  `closeqdtmsg` varchar(255) NOT NULL default '',
  `openfileserver` tinyint(1) NOT NULL default '0',
  `closemods` varchar(255) NOT NULL default ''
) TYPE=MyISAM;

INSERT INTO `phome_enewspublic` VALUES ('/ecms66/', '帝国网站管理系统', 'admin@phome.net', '|.gif|.jpg|.swf|.rar|.zip|.mp3|.wmv|.txt|.doc|', 2048, 10, 10, 8, 100, 2, 20, 20, 16, 0, 0, 20, 30, 5, 60, 0, 0, '.html', 0, '', 10, '.html', 40, 160, 1, '/ecms66/d/file/', 0, '', '21', '', '', '', 0, 0, 500, 0, 10, '6.5,1276569010', 1222406370, 300, 50, 10, 'bdata', 'zip', 'EmpireCMS', 3, 20, 6, 20, 1, 1, 'news', 0, 0, 1, 1, 0, 0, 1, 0, 50, 100, 100, 1, 50, 1, 300, 5, '../data/mark/maskdef.gif', '', '5', '', '../data/mark/cour.ttf', 1, 0, 'sys_ShowListPage', 'sys_ShowTextPage', 'thea', '', 1, 50, 300, ',article.newstext,', 300, 'sys_ShowListMorePage', 12, 100, 0, 0, 100, 8, 1, '|.gif|.jpg|', 1, 500, '|.zip|.rar|', 1, 'smtp.163.com', 'ecms@163.com', 1, 'ecms', 'ecms', '25', '帝国CMS', 0, 1, 500, '|.zip|.rar|', 1, 0, '>', 105, 118, 1, 80, 65, 24, 0, 30, 30, ',', ',', ',', 0, 'Y-m-d', 1, 50, '|.gif|.jpg|', 1, 500, '|.zip|.rar|', ',', 1, '', 0, 1, 0, '', '', '', '||[~e.jy~]##1.gif||[~e.kq~]##2.gif||[~e.se~]##3.gif||[~e.sq~]##4.gif||[~e.lh~]##5.gif||[~e.ka~]##6.gif||[~e.hh~]##7.gif||[~e.ys~]##8.gif||[~e.ng~]##9.gif||[~e.ot~]##10.gif||', 10, '', '', 6, 0, 1, 1, '', 10, 30, 'm-d', 0, 0, 10, 1, 2, '5eRjBWLdzUChWANuJdWwcvpTdgA7UH', 30, 0, 0, 0, 0, 0, 20, '&nbsp;|&nbsp;', 0, ',1,2,', '帝国网站管理系统,EmpireCMS', '　　帝国软件是一家专注于网络软件开发的科技公司，其主营产品“帝国网站管理系统(EmpireCMS)”是目前国内应用最广泛的CMS程序。通过多年的不断创新与完善，使系统集安全、强大、稳定、灵活于一身。目前EmpireCMS程序已经广泛应用在国内数十万家网站，覆盖国内上千万上网人群，并经过上千家知名网站的严格检测，被称为国内最安全、最稳定的开源CMS系统。', 300, 0, 1, 3, 20, ',,', 20, 16, 1, 43200, '', '', '', ',1,', '1', 1, 0, 0, 0, '', 1, 0, 72, 720, 0, '[!--username--] ，\r\n这封信是由 [!--sitename--] 发送的。\r\n\r\n您收到这封邮件，是因为在我们网站的新用户注册 Email 使用\r\n了您的地址。如果您并没有访问过我们的网站，或没有进行上述操作，请忽\r\n略这封邮件。您不需要退订或进行其他进一步的操作。\r\n\r\n----------------------------------------------------------------------\r\n帐号激活说明\r\n----------------------------------------------------------------------\r\n\r\n您是我们网站的新用户，注册 Email 时使用了本地址，我们需\r\n要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。\r\n\r\n您只需点击下面的链接即可激活您的帐号：\r\n\r\n[!--pageurl--]\r\n\r\n(如果上面不是链接形式，请将地址手工粘贴到浏览器地址栏再访问)\r\n\r\n感谢您的访问，祝您使用愉快！\r\n\r\n\r\n\r\n此致\r\n\r\n[!--sitename--] 管理团队.\r\n[!--news.url--]', '[!--username--] ，\r\n这封信是由 [!--sitename--] 发送的。\r\n\r\n您收到这封邮件，是因为在我们的网站上这个邮箱地址被登记为用户邮箱，\r\n且该用户请求使用 Email 密码重置功能所致。\r\n\r\n----------------------------------------------------------------------\r\n重要！\r\n----------------------------------------------------------------------\r\n\r\n如果您没有提交密码重置的请求或不是我们网站的注册用户，请立即忽略\r\n并删除这封邮件。只在您确认需要重置密码的情况下，才继续阅读下面的\r\n内容。\r\n\r\n----------------------------------------------------------------------\r\n密码重置说明\r\n----------------------------------------------------------------------\r\n\r\n您只需在提交请求后的三天之内，通过点击下面的链接重置您的密码：\r\n\r\n[!--pageurl--]\r\n\r\n(如果上面不是链接形式，请将地址手工粘贴到浏览器地址栏再访问)\r\n\r\n上面的页面打开后，输入新的密码后提交，之后您即可使用新的密码登录\r\n网站了。您可以在用户控制面板中随时修改您的密码。\r\n\r\n\r\n\r\n此致\r\n\r\n[!--sitename--] 管理团队.\r\n[!--news.url--]', '[[!--sitename--]] Email 地址验证', '[[!--sitename--]] 取回密码说明', 0, 30, 25, 1, 43200, 0, 0, 0, 0, 0, 0, 10, 60, 0, 1, 1, 1, ',1,2,3,4,5,6,7,8,', '', 25, 0, 0, 0, 20, 20, 20, 25, '', '', '', 0, 0, 3, 0, 0, '', 0, '', '', '', 0, '', 0, '');

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewspubvar`;
CREATE TABLE `phome_enewspubvar` (
  `varid` smallint(6) NOT NULL auto_increment,
  `myvar` varchar(60) NOT NULL default '',
  `varname` varchar(20) NOT NULL default '',
  `varvalue` text NOT NULL,
  `varsay` varchar(255) NOT NULL default '',
  `myorder` smallint(6) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  `tocache` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`varid`),
  UNIQUE KEY `varname` (`varname`),
  KEY `classid` (`classid`),
  KEY `tocache` (`tocache`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewspubvarclass`;
CREATE TABLE `phome_enewspubvarclass` (
  `classid` smallint(6) NOT NULL auto_increment,
  `classname` varchar(30) NOT NULL default '',
  `classsay` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsqmsg`;
CREATE TABLE `phome_enewsqmsg` (
  `mid` bigint(20) NOT NULL auto_increment,
  `title` varchar(120) NOT NULL default '',
  `msgtext` text NOT NULL,
  `haveread` tinyint(1) NOT NULL default '0',
  `msgtime` datetime NOT NULL default '0000-00-00 00:00:00',
  `to_username` varchar(30) NOT NULL default '',
  `from_userid` int(11) NOT NULL default '0',
  `from_username` varchar(30) NOT NULL default '',
  `outbox` tinyint(1) NOT NULL default '0',
  `issys` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`mid`),
  KEY `to_username` (`to_username`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewssearch`;
CREATE TABLE `phome_enewssearch` (
  `searchid` bigint(20) NOT NULL auto_increment,
  `keyboard` varchar(255) NOT NULL default '',
  `searchtime` int(11) NOT NULL default '0',
  `searchclass` varchar(255) NOT NULL default '',
  `result_num` int(11) NOT NULL default '0',
  `searchip` varchar(20) NOT NULL default '',
  `classid` varchar(255) NOT NULL default '',
  `onclick` int(11) NOT NULL default '0',
  `orderby` varchar(30) NOT NULL default '0',
  `myorder` tinyint(1) NOT NULL default '0',
  `checkpass` varchar(32) NOT NULL default '',
  `tbname` varchar(60) NOT NULL default '',
  `tempid` smallint(6) NOT NULL default '0',
  `iskey` tinyint(1) NOT NULL default '0',
  `andsql` text NOT NULL,
  `trueclassid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`searchid`),
  KEY `checkpass` (`checkpass`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewssearchall`;
CREATE TABLE `phome_enewssearchall` (
  `sid` int(11) NOT NULL auto_increment,
  `id` int(11) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  `title` text NOT NULL,
  `infotime` int(11) NOT NULL default '0',
  `infotext` mediumtext NOT NULL,
  PRIMARY KEY  (`sid`),
  KEY `id` (`id`,`classid`,`infotime`),
  FULLTEXT KEY `title` (`title`,`infotext`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewssearchall_load`;
CREATE TABLE `phome_enewssearchall_load` (
  `lid` smallint(6) NOT NULL auto_increment,
  `tbname` varchar(60) NOT NULL default '',
  `titlefield` varchar(30) NOT NULL default '',
  `infotextfield` varchar(30) NOT NULL default '',
  `smalltextfield` varchar(30) NOT NULL default '',
  `loadnum` smallint(6) NOT NULL default '0',
  `lasttime` int(11) NOT NULL default '0',
  `lastid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`lid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsshopdd`;
CREATE TABLE `phome_enewsshopdd` (
  `ddid` bigint(20) NOT NULL auto_increment,
  `ddno` varchar(30) NOT NULL default '',
  `ddtime` datetime NOT NULL default '0000-00-00 00:00:00',
  `userid` int(11) NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `outproduct` tinyint(1) NOT NULL default '0',
  `haveprice` tinyint(1) NOT NULL default '0',
  `checked` tinyint(1) NOT NULL default '0',
  `truename` varchar(20) NOT NULL default '',
  `oicq` varchar(25) NOT NULL default '',
  `msn` varchar(120) NOT NULL default '',
  `email` varchar(120) NOT NULL default '',
  `call` varchar(30) NOT NULL default '',
  `phone` varchar(30) NOT NULL default '',
  `address` varchar(255) NOT NULL default '',
  `zip` varchar(8) NOT NULL default '',
  `bz` text NOT NULL,
  `g_truename` varchar(20) NOT NULL default '',
  `g_oicq` varchar(25) NOT NULL default '',
  `g_msn` varchar(120) NOT NULL default '',
  `g_email` varchar(120) NOT NULL default '',
  `g_call` varchar(30) NOT NULL default '',
  `g_phone` varchar(30) NOT NULL default '',
  `g_address` varchar(255) NOT NULL default '',
  `g_zip` varchar(8) NOT NULL default '',
  `buycar` mediumtext NOT NULL,
  `psid` smallint(6) NOT NULL default '0',
  `psname` varchar(60) NOT NULL default '',
  `pstotal` float(11,2) NOT NULL default '0.00',
  `alltotal` float(11,2) NOT NULL default '0.00',
  `payfsid` smallint(6) NOT NULL default '0',
  `payfsname` varchar(60) NOT NULL default '',
  `payby` tinyint(4) NOT NULL default '0',
  `alltotalfen` float(11,2) NOT NULL default '0.00',
  `fp` tinyint(1) NOT NULL default '0',
  `fptt` varchar(255) NOT NULL default '',
  `fptotal` float(11,2) NOT NULL default '0.00',
  PRIMARY KEY  (`ddid`),
  KEY `ddno` (`ddno`),
  KEY `userid` (`userid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsshoppayfs`;
CREATE TABLE `phome_enewsshoppayfs` (
  `payid` smallint(6) NOT NULL auto_increment,
  `payname` varchar(60) NOT NULL default '',
  `payurl` varchar(255) NOT NULL default '',
  `paysay` text NOT NULL,
  `userpay` tinyint(1) NOT NULL default '0',
  `userfen` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`payid`)
) TYPE=MyISAM;

INSERT INTO `phome_enewsshoppayfs` VALUES (1, '邮政汇款', '', '邮政汇款地址:******', 0, 0);
INSERT INTO `phome_enewsshoppayfs` VALUES (2, '银行转帐', '', '银行转帐帐号:******', 0, 0);
INSERT INTO `phome_enewsshoppayfs` VALUES (3, '网银支付', '/ecms66/e/payapi/ShopPay.php?paytype=alipay', '<p>网银支付</p>', 0, 0);
INSERT INTO `phome_enewsshoppayfs` VALUES (4, '预付款支付', '', '预付款支付', 1, 0);
INSERT INTO `phome_enewsshoppayfs` VALUES (5, '货到付款(或上门收款)', '', '货到付款(或上门收款)说明', 0, 0);
INSERT INTO `phome_enewsshoppayfs` VALUES (6, '点数购买', '', '点数购买', 0, 1);

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsshopps`;
CREATE TABLE `phome_enewsshopps` (
  `pid` int(11) NOT NULL auto_increment,
  `pname` varchar(60) NOT NULL default '',
  `price` float(11,2) NOT NULL default '0.00',
  `otherprice` text NOT NULL,
  `psay` text NOT NULL,
  PRIMARY KEY  (`pid`)
) TYPE=MyISAM;

INSERT INTO `phome_enewsshopps` VALUES (1, '送货上门', '10.00', '', '送货上门');
INSERT INTO `phome_enewsshopps` VALUES (2, '特快专递（EMS）', '25.00', '', '特快专递（EMS）');
INSERT INTO `phome_enewsshopps` VALUES (3, '普通邮递', '5.00', '', '普通邮递');
INSERT INTO `phome_enewsshopps` VALUES (4, '邮局快邮', '12.00', '', '邮局快邮');

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewssp`;
CREATE TABLE `phome_enewssp` (
  `spid` smallint(6) NOT NULL auto_increment,
  `spname` varchar(30) NOT NULL default '',
  `varname` varchar(30) NOT NULL default '',
  `sppic` varchar(255) NOT NULL default '',
  `spsay` varchar(255) NOT NULL default '',
  `sptype` tinyint(1) NOT NULL default '0',
  `cid` smallint(6) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  `tempid` smallint(6) NOT NULL default '0',
  `maxnum` int(11) NOT NULL default '0',
  `sptime` int(10) NOT NULL default '0',
  `groupid` text NOT NULL,
  `userclass` text NOT NULL,
  `username` text NOT NULL,
  `isclose` tinyint(1) NOT NULL default '0',
  `cladd` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`spid`),
  UNIQUE KEY `varname` (`varname`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewssp_1`;
CREATE TABLE `phome_enewssp_1` (
  `sid` int(11) NOT NULL auto_increment,
  `spid` smallint(6) NOT NULL default '0',
  `title` varchar(200) NOT NULL default '',
  `titlepic` varchar(200) NOT NULL default '',
  `bigpic` varchar(200) NOT NULL default '',
  `titleurl` varchar(200) NOT NULL default '',
  `smalltext` varchar(255) NOT NULL default '',
  `titlefont` varchar(20) NOT NULL default '',
  `newstime` int(10) NOT NULL default '0',
  `titlepre` varchar(30) NOT NULL default '',
  `titlenext` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`sid`),
  KEY `spid` (`spid`),
  KEY `newstime` (`newstime`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewssp_2`;
CREATE TABLE `phome_enewssp_2` (
  `sid` int(11) NOT NULL auto_increment,
  `spid` smallint(6) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  `id` int(11) NOT NULL default '0',
  `newstime` int(10) NOT NULL default '0',
  PRIMARY KEY  (`sid`),
  KEY `spid` (`spid`),
  KEY `newstime` (`newstime`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewssp_3`;
CREATE TABLE `phome_enewssp_3` (
  `sid` int(11) NOT NULL auto_increment,
  `spid` smallint(6) NOT NULL default '0',
  `sptext` mediumtext NOT NULL,
  PRIMARY KEY  (`sid`),
  UNIQUE KEY `spid` (`spid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewssp_3_bak`;
CREATE TABLE `phome_enewssp_3_bak` (
  `bid` int(11) NOT NULL auto_increment,
  `sid` int(11) NOT NULL default '0',
  `spid` smallint(6) NOT NULL default '0',
  `sptext` mediumtext NOT NULL,
  `lastuser` varchar(30) NOT NULL default '',
  `lasttime` int(10) NOT NULL default '0',
  PRIMARY KEY  (`bid`),
  KEY `sid` (`sid`),
  KEY `spid` (`spid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsspacestyle`;
CREATE TABLE `phome_enewsspacestyle` (
  `styleid` smallint(6) NOT NULL auto_increment,
  `stylename` varchar(30) NOT NULL default '',
  `stylepic` varchar(255) NOT NULL default '',
  `stylesay` varchar(255) NOT NULL default '',
  `stylepath` varchar(30) NOT NULL default '0',
  `isdefault` tinyint(1) NOT NULL default '0',
  `membergroup` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`styleid`)
) TYPE=MyISAM;

INSERT INTO `phome_enewsspacestyle` VALUES (1, '默认个人空间模板', '', '默认个人空间模板', 'default', 1, ',1,2,');
INSERT INTO `phome_enewsspacestyle` VALUES (2, '默认企业空间模板', '', '默认企业空间模板', 'comdefault', 0, ',3,4,');

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsspclass`;
CREATE TABLE `phome_enewsspclass` (
  `classid` smallint(6) NOT NULL auto_increment,
  `classname` varchar(30) NOT NULL default '',
  `classsay` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewssql`;
CREATE TABLE `phome_enewssql` (
  `id` smallint(6) NOT NULL auto_increment,
  `sqlname` varchar(60) NOT NULL default '',
  `sqltext` text NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewstable`;
CREATE TABLE `phome_enewstable` (
  `tid` smallint(6) NOT NULL auto_increment,
  `tbname` varchar(60) NOT NULL default '',
  `tname` varchar(60) NOT NULL default '',
  `tsay` text NOT NULL,
  `isdefault` tinyint(1) NOT NULL default '0',
  `datatbs` text NOT NULL,
  `deftb` varchar(6) NOT NULL default '',
  `yhid` smallint(6) NOT NULL default '0',
  `mid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`tid`)
) TYPE=MyISAM;

INSERT INTO `phome_enewstable` VALUES (1, 'news', '新闻系统数据表', '新闻系统数据表', 1, ',1,', '1', 0, 1);
INSERT INTO `phome_enewstable` VALUES (2, 'download', '下载系统数据表', '下载系统数据表', 0, ',1,', '1', 0, 2);
INSERT INTO `phome_enewstable` VALUES (3, 'photo', '图片系统数据表', '图片系统数据表', 0, ',1,', '1', 0, 3);
INSERT INTO `phome_enewstable` VALUES (4, 'flash', 'FLASH系统数据表', 'FLASH系统数据表', 0, ',1,', '1', 0, 4);
INSERT INTO `phome_enewstable` VALUES (5, 'movie', '电影系统数据表', '电影系统数据表', 0, ',1,', '1', 0, 5);
INSERT INTO `phome_enewstable` VALUES (6, 'shop', '商城系统数据表', '商城系统数据表', 0, ',1,', '1', 0, 6);
INSERT INTO `phome_enewstable` VALUES (7, 'article', '文章系统数据表', '文章系统数据表(内容存文本)', 0, ',1,', '1', 0, 7);
INSERT INTO `phome_enewstable` VALUES (8, 'info', '分类信息数据表', '分类信息数据表', 0, ',1,', '1', 0, 8);

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewstags`;
CREATE TABLE `phome_enewstags` (
  `tagid` int(11) NOT NULL auto_increment,
  `tagname` char(20) NOT NULL default '',
  `num` int(11) NOT NULL default '0',
  `isgood` tinyint(1) NOT NULL default '0',
  `cid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`tagid`),
  UNIQUE KEY `tagname` (`tagname`),
  KEY `isgood` (`isgood`),
  KEY `cid` (`cid`),
  KEY `num` (`num`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewstagsclass`;
CREATE TABLE `phome_enewstagsclass` (
  `classid` smallint(6) NOT NULL auto_increment,
  `classname` varchar(60) NOT NULL default '',
  PRIMARY KEY  (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewstagsdata`;
CREATE TABLE `phome_enewstagsdata` (
  `tid` int(11) NOT NULL auto_increment,
  `tagid` int(11) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  `id` int(11) NOT NULL default '0',
  `newstime` int(10) NOT NULL default '0',
  `mid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`tid`),
  KEY `tagid` (`tagid`),
  KEY `classid` (`classid`),
  KEY `id` (`id`),
  KEY `newstime` (`newstime`),
  KEY `mid` (`mid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewstask`;
CREATE TABLE `phome_enewstask` (
  `id` smallint(6) NOT NULL auto_increment,
  `taskname` varchar(60) NOT NULL default '',
  `userid` int(11) NOT NULL default '0',
  `isopen` tinyint(1) NOT NULL default '0',
  `filename` varchar(60) NOT NULL default '',
  `lastdo` int(11) NOT NULL default '0',
  `doweek` char(1) NOT NULL default '0',
  `doday` char(2) NOT NULL default '0',
  `dohour` char(2) NOT NULL default '0',
  `dominute` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewstogzts`;
CREATE TABLE `phome_enewstogzts` (
  `togid` int(11) NOT NULL auto_increment,
  `keyboard` varchar(255) NOT NULL default '',
  `searchf` varchar(255) NOT NULL default '',
  `query` text NOT NULL,
  `specialsearch` varchar(255) NOT NULL default '',
  `classid` smallint(6) NOT NULL default '0',
  `retype` tinyint(1) NOT NULL default '0',
  `startday` varchar(20) NOT NULL default '',
  `endday` varchar(20) NOT NULL default '',
  `startid` int(11) NOT NULL default '0',
  `endid` int(11) NOT NULL default '0',
  `pline` int(11) NOT NULL default '0',
  `doecmszt` tinyint(1) NOT NULL default '0',
  `togztname` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`togid`),
  KEY `togztname` (`togztname`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsuser`;
CREATE TABLE `phome_enewsuser` (
  `userid` int(11) NOT NULL auto_increment,
  `username` varchar(30) NOT NULL default '',
  `password` varchar(32) NOT NULL default '',
  `rnd` varchar(20) NOT NULL default '',
  `adminclass` mediumtext NOT NULL,
  `groupid` smallint(6) NOT NULL default '0',
  `checked` tinyint(1) NOT NULL default '0',
  `styleid` smallint(6) NOT NULL default '0',
  `filelevel` tinyint(1) NOT NULL default '0',
  `salt` varchar(8) NOT NULL default '',
  `loginnum` int(11) NOT NULL default '0',
  `lasttime` int(11) NOT NULL default '0',
  `lastip` varchar(20) NOT NULL default '',
  `truename` varchar(20) NOT NULL default '',
  `email` varchar(120) NOT NULL default '',
  `classid` smallint(6) NOT NULL default '0',
  `pretime` int(11) NOT NULL default '0',
  `preip` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`userid`),
  UNIQUE KEY `username` (`username`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsuseradd`;
CREATE TABLE `phome_enewsuseradd` (
  `userid` int(11) NOT NULL auto_increment,
  `equestion` tinyint(4) NOT NULL default '0',
  `eanswer` varchar(32) NOT NULL default '',
  PRIMARY KEY  (`userid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsuserclass`;
CREATE TABLE `phome_enewsuserclass` (
  `classid` smallint(6) NOT NULL auto_increment,
  `classname` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsuserjs`;
CREATE TABLE `phome_enewsuserjs` (
  `jsid` smallint(6) NOT NULL auto_increment,
  `jsname` varchar(60) NOT NULL default '',
  `jssql` text NOT NULL,
  `jstempid` smallint(6) NOT NULL default '0',
  `jsfilename` varchar(120) NOT NULL default '',
  PRIMARY KEY  (`jsid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsuserlist`;
CREATE TABLE `phome_enewsuserlist` (
  `listid` smallint(6) NOT NULL auto_increment,
  `listname` varchar(60) NOT NULL default '',
  `pagetitle` varchar(120) NOT NULL default '',
  `filepath` varchar(120) NOT NULL default '',
  `filetype` varchar(12) NOT NULL default '',
  `totalsql` text NOT NULL,
  `listsql` text NOT NULL,
  `maxnum` int(11) NOT NULL default '0',
  `lencord` int(11) NOT NULL default '0',
  `listtempid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`listid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsvote`;
CREATE TABLE `phome_enewsvote` (
  `voteid` int(11) NOT NULL auto_increment,
  `title` varchar(120) NOT NULL default '',
  `votenum` int(11) NOT NULL default '0',
  `voteip` mediumtext NOT NULL,
  `votetext` text NOT NULL,
  `voteclass` tinyint(1) NOT NULL default '0',
  `doip` tinyint(1) NOT NULL default '0',
  `votetime` int(11) NOT NULL default '0',
  `dotime` date NOT NULL default '0000-00-00',
  `width` int(11) NOT NULL default '0',
  `height` int(11) NOT NULL default '0',
  `addtime` datetime NOT NULL default '0000-00-00 00:00:00',
  `tempid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`voteid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsvotemod`;
CREATE TABLE `phome_enewsvotemod` (
  `voteid` smallint(6) NOT NULL auto_increment,
  `title` varchar(120) NOT NULL default '',
  `votetext` text NOT NULL,
  `voteclass` tinyint(1) NOT NULL default '0',
  `doip` tinyint(1) NOT NULL default '0',
  `dotime` date NOT NULL default '0000-00-00',
  `tempid` smallint(6) NOT NULL default '0',
  `width` int(11) NOT NULL default '0',
  `height` int(11) NOT NULL default '0',
  `votenum` int(11) NOT NULL default '0',
  `ysvotename` varchar(60) NOT NULL default '',
  PRIMARY KEY  (`voteid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewswapstyle`;
CREATE TABLE `phome_enewswapstyle` (
  `styleid` smallint(6) NOT NULL auto_increment,
  `stylename` varchar(60) NOT NULL default '',
  `path` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`styleid`)
) TYPE=MyISAM;

INSERT INTO `phome_enewswapstyle` VALUES (1, '新闻模板', 1);
INSERT INTO `phome_enewswapstyle` VALUES (2, '分类信息模板', 2);

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewswfinfo`;
CREATE TABLE `phome_enewswfinfo` (
  `id` int(11) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  `wfid` smallint(6) NOT NULL default '0',
  `tid` int(11) NOT NULL default '0',
  `groupid` text NOT NULL,
  `userclass` text NOT NULL,
  `username` text NOT NULL,
  `checknum` tinyint(4) NOT NULL default '0',
  `tstatus` varchar(30) NOT NULL default '0',
  `checktno` tinyint(4) NOT NULL default '0',
  KEY `id` (`id`,`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewswfinfolog`;
CREATE TABLE `phome_enewswfinfolog` (
  `logid` int(11) NOT NULL auto_increment,
  `id` int(11) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  `wfid` smallint(6) NOT NULL default '0',
  `tid` int(11) NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `checktime` int(11) NOT NULL default '0',
  `checktext` text NOT NULL,
  `checknum` tinyint(4) NOT NULL default '0',
  `checktype` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`logid`),
  KEY `id` (`id`,`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewswords`;
CREATE TABLE `phome_enewswords` (
  `wordid` smallint(6) NOT NULL auto_increment,
  `oldword` varchar(255) NOT NULL default '',
  `newword` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`wordid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsworkflow`;
CREATE TABLE `phome_enewsworkflow` (
  `wfid` smallint(6) NOT NULL auto_increment,
  `wfname` varchar(60) NOT NULL default '',
  `wftext` varchar(255) NOT NULL default '',
  `myorder` smallint(6) NOT NULL default '0',
  `addtime` int(11) NOT NULL default '0',
  `adduser` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`wfid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsworkflowitem`;
CREATE TABLE `phome_enewsworkflowitem` (
  `tid` int(11) NOT NULL auto_increment,
  `wfid` smallint(6) NOT NULL default '0',
  `tname` varchar(60) NOT NULL default '',
  `tno` int(11) NOT NULL default '0',
  `ttext` varchar(255) NOT NULL default '',
  `groupid` text NOT NULL,
  `userclass` text NOT NULL,
  `username` text NOT NULL,
  `lztype` tinyint(1) NOT NULL default '0',
  `tbdo` int(11) NOT NULL default '0',
  `tddo` int(11) NOT NULL default '0',
  `tstatus` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`tid`),
  KEY `wfid` (`wfid`),
  KEY `tno` (`tno`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewswriter`;
CREATE TABLE `phome_enewswriter` (
  `wid` smallint(6) NOT NULL auto_increment,
  `writer` varchar(30) NOT NULL default '',
  `email` varchar(120) NOT NULL default '',
  PRIMARY KEY  (`wid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsyh`;
CREATE TABLE `phome_enewsyh` (
  `id` smallint(6) NOT NULL auto_increment,
  `yhname` varchar(30) NOT NULL default '',
  `yhtext` varchar(255) NOT NULL default '',
  `hlist` int(11) NOT NULL default '0',
  `qlist` int(11) NOT NULL default '0',
  `bqnew` int(11) NOT NULL default '0',
  `bqhot` int(11) NOT NULL default '0',
  `bqpl` int(11) NOT NULL default '0',
  `bqgood` int(11) NOT NULL default '0',
  `bqfirst` int(11) NOT NULL default '0',
  `bqdown` int(11) NOT NULL default '0',
  `otherlink` int(11) NOT NULL default '0',
  `qmlist` int(11) NOT NULL default '0',
  `dobq` tinyint(1) NOT NULL default '0',
  `dojs` tinyint(1) NOT NULL default '0',
  `dosbq` tinyint(1) NOT NULL default '0',
  `rehtml` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewszt`;
CREATE TABLE `phome_enewszt` (
  `ztid` smallint(6) NOT NULL auto_increment,
  `ztname` varchar(60) NOT NULL default '',
  `onclick` int(11) NOT NULL default '0',
  `ztnum` tinyint(4) NOT NULL default '0',
  `listtempid` smallint(6) NOT NULL default '0',
  `ztpath` varchar(255) NOT NULL default '',
  `zttype` varchar(10) NOT NULL default '',
  `newline` int(11) NOT NULL default '0',
  `zturl` varchar(200) NOT NULL default '',
  `hotline` tinyint(4) NOT NULL default '0',
  `goodline` tinyint(4) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  `hotplline` tinyint(4) NOT NULL default '0',
  `firstline` tinyint(4) NOT NULL default '0',
  `islist` tinyint(1) NOT NULL default '0',
  `maxnum` int(11) NOT NULL default '0',
  `tid` smallint(6) NOT NULL default '0',
  `tbname` varchar(60) NOT NULL default '',
  `reorder` varchar(50) NOT NULL default '',
  `intro` text NOT NULL,
  `ztimg` varchar(255) NOT NULL default '',
  `jstempid` smallint(6) NOT NULL default '0',
  `zcid` smallint(6) NOT NULL default '0',
  `showzt` tinyint(1) NOT NULL default '0',
  `ztpagekey` varchar(255) NOT NULL default '',
  `classtempid` smallint(6) NOT NULL default '0',
  `myorder` smallint(6) NOT NULL default '0',
  `nrejs` tinyint(1) NOT NULL default '0',
  `usezt` tinyint(1) NOT NULL default '0',
  `yhid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`ztid`),
  KEY `classid` (`classid`),
  KEY `zcid` (`zcid`),
  KEY `usezt` (`usezt`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsztadd`;
CREATE TABLE `phome_enewsztadd` (
  `ztid` smallint(6) NOT NULL default '0',
  `classtext` mediumtext NOT NULL,
  PRIMARY KEY  (`ztid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsztclass`;
CREATE TABLE `phome_enewsztclass` (
  `classid` smallint(6) NOT NULL auto_increment,
  `classname` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`classid`)
) TYPE=MyISAM;

# --------------------------------------------------------

DROP TABLE IF EXISTS `phome_enewsztf`;
CREATE TABLE `phome_enewsztf` (
  `fid` smallint(6) NOT NULL auto_increment,
  `f` varchar(30) NOT NULL default '',
  `fname` varchar(30) NOT NULL default '',
  `fform` varchar(20) NOT NULL default '',
  `fhtml` mediumtext NOT NULL,
  `fzs` varchar(255) NOT NULL default '',
  `myorder` smallint(6) NOT NULL default '0',
  `ftype` varchar(30) NOT NULL default '',
  `flen` varchar(20) NOT NULL default '',
  `fvalue` text NOT NULL,
  `fformsize` varchar(12) NOT NULL default '',
  PRIMARY KEY  (`fid`)
) TYPE=MyISAM;
