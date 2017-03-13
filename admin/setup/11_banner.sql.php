<?
DROP TABLE `mandarinko_banner`;
CREATE TABLE IF NOT EXISTS `mandarinko_banner` (
  `id` int(11) NOT NULL auto_increment,
  `position` varchar(50) NOT NULL,
  `url` text NOT NULL,
  `alt` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

INSERT INTO `mandarinko_banner` (`id`, `position`, `url`, `alt`) VALUES
(1,'sample', '#', '');
?>