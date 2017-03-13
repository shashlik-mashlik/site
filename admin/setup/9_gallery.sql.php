<?
CREATE TABLE IF NOT EXISTS `mandarinko_gallery` (
  `id` int(11) NOT NULL auto_increment,  
  `url` varchar(256) NOT NULL,
  `name` text NOT NULL,
  `metak` text NOT NULL,
  `metad` text NOT NULL,  
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `mandarinko_gallery` (`id`, `url`, `name`, `metak`, `metad`) VALUES
(1, 'main', 'Галерея', '', '');

CREATE TABLE IF NOT EXISTS `mandarinko_gallery_item` (
  `id` int(11) NOT NULL auto_increment,  
  `pid` text NOT NULL,  
  `title` text NOT NULL, 
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;
?>