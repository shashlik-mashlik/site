<?
DROP TABLE `mandarinko_poll_ask`;

CREATE TABLE IF NOT EXISTS `mandarinko_poll_ask` (
  `id` int(11) NOT NULL auto_increment,
  `title` text NOT NULL,
  `time` varchar(10) NOT NULL,
  `var_numb` int(11) NOT NULL default '0',
  `ttl_numb` int(11) NOT NULL default '0',
  `comm_numb` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

INSERT INTO `mandarinko_poll_ask` (`id`, `title`, `var_numb`, `time`, `ttl_numb`, `comm_numb`) VALUES
(1, 'HeadCount_Sample', '3', '2100000000', '10', '1');

DROP TABLE `mandarinko_poll_answer`;

CREATE TABLE IF NOT EXISTS `mandarinko_poll_answer` (
  `id` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  `hc_id` int(11) NOT NULL,
  `counter` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

INSERT INTO `mandarinko_poll_answer` (`id`, `name`, `hc_id`, `counter`) VALUES
(1, 'Answer_Sample1', 1, '3');
INSERT INTO `mandarinko_poll_answer` (`id`, `name`, `hc_id`, `counter`) VALUES
(2, 'Answer_Sample2', 1, '3');
INSERT INTO `mandarinko_poll_answer` (`id`, `name`, `hc_id`, `counter`) VALUES
(3, 'Answer_Sample3', 1, '4');

DROP TABLE `mandarinko_poll_comments`;

CREATE TABLE IF NOT EXISTS `mandarinko_poll_comments` (
  `id` int(11) NOT NULL auto_increment,
  `hc_id` int(11) NOT NULL,
  `nick` text NOT NULL,
  `email` text NOT NULL,
  `time` varchar(10) NOT NULL,
  `msg` text NOT NULL,
  `moder` varchar(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

INSERT INTO `mandarinko_poll_comments` (`id`, `hc_id`, `nick`, `email`, `time`, `msg`, `moder`) VALUES
(1, 1, 'Nick_Sample', 'Email@Sample.ru', '2100000000', 'Message_Sample', '1');

DROP TABLE `mandarinko_poll_ip`;

CREATE TABLE IF NOT EXISTS `mandarinko_poll_ip` (
  `id` int(11) NOT NULL auto_increment,
  `ip` varchar(15) NOT NULL,
  `time` varchar(10) NOT NULL,
  `hc_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

INSERT INTO `mandarinko_poll_ip` (`id`, `ip`, `time`, `hc_id`) VALUES
(1, '192.168.0.1', '2100000000', '1');
?>