<?
CREATE TABLE IF NOT EXISTS `mandarinko_catalog_item_import` (
  `id` int(11) NOT NULL auto_increment,   
  `title` text NOT NULL,
  `text` text NOT NULL,
  `link` text NOT NULL,  
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;
?>