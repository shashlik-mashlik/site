<?
CREATE TABLE IF NOT EXISTS `mandarinko_presentation` (
  `id` int(11) NOT NULL auto_increment,  
  `url` varchar(256) NOT NULL,
  `name` text NOT NULL,
  `width` text NOT NULL,
  `height` text NOT NULL,
  `time_pause` text NOT NULL,
  `time_active` text NOT NULL,
  `method` text NOT NULL,
  `text_position` text NOT NULL,  
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `mandarinko_presentation` (`id`, `url`, `name`, `width`, `height`, `time_pause`, `time_active`, `method`, `text_position`) VALUES
(1, 'main', 'Презентация на главной', '640', '360', '1000', '1000', '1', '1');

CREATE TABLE IF NOT EXISTS `mandarinko_presentation_item` (
  `id` int(11) NOT NULL auto_increment,  
  `pid` text NOT NULL,  
  `title` text NOT NULL,
  `text` text NOT NULL,
  `link` text NOT NULL,  
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;
?>