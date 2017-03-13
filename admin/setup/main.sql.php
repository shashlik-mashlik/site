<?
DROP TABLE `mandarinko_admins`;
DROP TABLE `mandarinko_base`;
DROP TABLE `mandarinko_login`;
CREATE TABLE IF NOT EXISTS `mandarinko_admins` (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `login_now_time` varchar(10) NOT NULL,
  `login_now_ip` varchar(15) NOT NULL,
  `login_last_time` varchar(10) NOT NULL,
  `login_last_ip` varchar(15) NOT NULL,
  `rights` varchar(100) NOT NULL,
  `token_seed` text NOT NULL,
  `token_cnt` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `mandarinko_base` (
  `param` varchar(64) NOT NULL,  
  `value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `mandarinko_base` (`param`, `value`) VALUES
('login_count', '3'),
('version', '1.1'),
('admin_login', 'test'),
('admin_pwd', 'test'),
('admin_cnt1', '0'),
('admin_cnt2', '0'),
('login_time', '30'),
('tokenAuth', '0'),
('email', 'project@mandarinko.ru');

CREATE TABLE IF NOT EXISTS `mandarinko_login` (
  `ip` varchar(15) NOT NULL,
  `time` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
?>