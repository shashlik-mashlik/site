<?
CREATE TABLE IF NOT EXISTS `mandarinko_catalog` (
  `id` int(11) NOT NULL auto_increment,
  `pid` int(11) NOT NULL,
  `url` varchar(256) NOT NULL,
  `name` text NOT NULL,
  `type` text NOT NULL,
  `desc` text NOT NULL,
  `metak` text NOT NULL,
  `metad` text NOT NULL,
  `sort` int NOT NULL,
  `root` varchar(256) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `mandarinko_catalog` (`id`, `pid`, `url`, `name`, `type`, `desc`, `metak`, `metad`, `sort`, `root`) VALUES
(1, 0, 'seria1', 'Серия 1', 'Чугунные фонари высотой до 4.5м', 'Необходимо сказать, что чугунный фонарь является неотъемлемым символом города Петербурга. Чугун представляет собой сплав железа и углерода. Существует разный чугун, который определяется видом элементов, входящих в его состав. Несмотря на свое давнее происхождение, чугунные изделия пользуются большим спросом по всему миру. Сегодня чугунные фонари во многом отличаются от своих предшественников, но их декор остается таким же архитектурно привлекательным.', '', '', 1, 'nd');
?>