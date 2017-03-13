<?
DROP TABLE `mandarinko_text`;
CREATE TABLE IF NOT EXISTS `mandarinko_text` (
  `id` int(11) NOT NULL auto_increment,
  `position` varchar(50) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2;

INSERT INTO `mandarinko_text` (`id`, `position`, `text`) VALUES
(1,'sample', 'text');
?>