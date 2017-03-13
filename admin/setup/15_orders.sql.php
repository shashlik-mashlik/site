<?
DROP TABLE `mandarinko_orders`;
CREATE TABLE `mandarinko_orders` (
	`id` INT( 11 ) NOT NULL AUTO_INCREMENT ,
	`userid` INT( 11 ) NOT NULL ,
	`date` INT( 10 ) NOT NULL ,
	`status` INT NOT NULL ,
	`comment` TEXT NOT NULL ,
	`goods` TEXT NOT NULL ,
	`weight` INT NOT NULL,
	`price` INT NOT NULL,
	`total` INT NOT NULL,
	PRIMARY KEY ( `id` )
) ENGINE = MYISAM ;

INSERT INTO `mandarinko_orders` (`id`, `userid`, `date`, `status`, `comment`, `goods`) VALUES
(1, 0, 0, 1, 'comment', 'goods');
?>