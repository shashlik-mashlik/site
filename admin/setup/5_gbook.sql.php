<?
DROP TABLE `mandarinko_gbook`;

CREATE TABLE IF NOT EXISTS `mandarinko_gbook` (
  `id` int(11) NOT NULL auto_increment,
  `nick` text NOT NULL,
  `email` text NOT NULL,
  `time` varchar(10) NOT NULL,
  `msg` text NOT NULL,
  `answer` text NOT NULL default '',
  `moder` varchar(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

INSERT INTO `mandarinko_gbook` (`id`, `nick`, `email`, `time`, `msg`, `answer`, `moder`) VALUES
(1, '', '', '2100000000', 'Добро пожаловать', '', '1');
?>