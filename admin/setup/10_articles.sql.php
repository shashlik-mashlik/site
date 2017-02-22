<?
DROP TABLE `mandarinko_articles`;
DROP TABLE `mandarinko_articles_cat`;
CREATE TABLE IF NOT EXISTS `mandarinko_articles_cat` (
  `id` int(11) NOT NULL auto_increment,
  `url` varchar(256) NOT NULL,
  `title` varchar(256) NOT NULL,
  `text` text NOT NULL,
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO `mandarinko_articles_cat` (`id`, `url`, `title`, `text`, `metakey`, `metadesc`) VALUES
(1, 'sample', 'Пример категории', 'Пример описания', '', '');


CREATE TABLE IF NOT EXISTS `mandarinko_articles` (
  `id` int(11) NOT NULL auto_increment,
  `url` varchar(256) NOT NULL,
  `cat` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `text` text NOT NULL,
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO `mandarinko_articles` (`id`, `url`, `cat`, `title`, `text`, `metakey`, `metadesc`) VALUES
(1, 'sample', 1, 'Пример статьи', 'Пример статьи', '', '');
?>