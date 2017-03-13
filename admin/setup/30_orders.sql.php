<?
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `adrs` varchar(256) NOT NULL,
  `prsns` int(11) NOT NULL DEFAULT '1',
  `phone` varchar(12) NOT NULL,
  `email` varchar(48) DEFAULT NULL,
  `comment` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
?>