<?
CREATE TABLE IF NOT EXISTS `mandarinko_main_menu` (
  `id` int(11) NOT NULL auto_increment,  
  `about` varchar(256) NOT NULL,
  `name` text NOT NULL,  
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `mandarinko_main_menu` (`id`, `name`, `about`) VALUES
(1, 'first_menu', 'Меню на главной');

CREATE TABLE IF NOT EXISTS `mandarinko_main_menu_item` (
  `id` int(11) NOT NULL auto_increment,  
  `pid` text NOT NULL,  
  `title` text NOT NULL,
  `parent_title` text NOT NULL,
  `link` text NOT NULL,  
  `text` text NOT NULL, 
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;
?>