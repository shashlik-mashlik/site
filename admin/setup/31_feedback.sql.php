<?
CREATE TABLE IF NOT EXISTS `feedback` (
`id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(25) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
?>