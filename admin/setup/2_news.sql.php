<?
DROP TABLE `mandarinko_news`;
CREATE TABLE IF NOT EXISTS `mandarinko_news` (
  `id` int(11) NOT NULL auto_increment,
  `title` text NOT NULL,
  `shot` text NOT NULL,
  `full` text NOT NULL,
  `date` varchar(10) NOT NULL,
  `metak` text NOT NULL,
  `metad` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO `mandarinko_news` (`id`, `title`, `shot`, `full`, `date`,`metak`,`metad`) VALUES
('1', 'Sample News', 'Shot text', 'Full text', '0','-','-');
?>