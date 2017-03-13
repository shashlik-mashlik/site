<?
DROP TABLE `mandarinko_static`;
CREATE TABLE IF NOT EXISTS `mandarinko_static` (
  `id` int(11) NOT NULL auto_increment,
  `url` varchar(256) NOT NULL,
  `editable` varchar(1) NOT NULL,
  `lastedit` varchar(10) NOT NULL,
  `title` varchar(256) NOT NULL,
  `header` varchar(256) NOT NULL,
  `text` text NOT NULL,
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO `mandarinko_static` (`id`, `url`, `editable`, `lastedit`, `title`, `header`, `text`, `metakey`, `metadesc`) VALUES
(1, 'sample', 'n', '1', 'Пример названия страницы', 'Пример заголовка', 'Пример статики', '', '');
?>