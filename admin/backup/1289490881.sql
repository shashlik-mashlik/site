--mandarinko_admins, mandarinko_articles, mandarinko_articles_cat, mandarinko_banner, mandarinko_base, mandarinko_catalog, mandarinko_catalog_item, mandarinko_gallery, mandarinko_gallery_item, mandarinko_gbook, mandarinko_login, mandarinko_news, mandarinko_poll_answer, mandarinko_poll_ask, mandarinko_poll_comments, mandarinko_poll_ip, mandarinko_static, mandarinko_text
INSERT INTO `mandarinko_admins` (`id`, `email`, `pass`, `login_now_time`, `login_now_ip`, `login_last_time`, `login_last_ip`, `rights`) VALUES ('1', '1', 'ewr', '1287752992', '109.188.160.165', '1287530858', '178.130.2.65', '3,5,2,1,4'),
('2', '12', '11', '1287754300', '109.188.160.165', '1287752288', '109.188.160.165', '3,5,2,1,4');
------
INSERT INTO `mandarinko_articles` (`id`, `url`, `cat`, `title`, `text`, `metakey`, `metadesc`) VALUES ('1', 'sample', '1', 'Пример статики', 'Пример статики', '', '');
------
INSERT INTO `mandarinko_articles_cat` (`id`, `url`, `title`, `text`, `metakey`, `metadesc`) VALUES ('1', 'sample', 'Пример категории', 'Пример описания', '', '');
------
INSERT INTO `mandarinko_banner` (`id`, `position`, `url`, `alt`) VALUES ('1', 'sample', '#', '');
------
INSERT INTO `mandarinko_base` (`param`, `value`) VALUES ('login_count', '3'),
('version', '1.1'),
('admin_login', 'test'),
('admin_pwd', 'test'),
('login_time', '30'),
('tokenAuth', '0'),
('email', 'project@mandarinko.ru');
------
INSERT INTO `mandarinko_catalog` (`id`, `pid`, `url`, `name`, `metak`, `metad`, `sort`, `root`) VALUES ('1', '0', 'main', 'Главный раздел', '', '', '6', 'nd'),
('3', '0', '1', '2', '3', '4', '3', 'nd'),
('6', '0', '3', '3', '', '', '1', 'nd');
------
INSERT INTO `mandarinko_gallery` (`id`, `url`, `name`, `metak`, `metad`) VALUES ('1', 'main', 'Галерея1 ', '', ''),
('4', 'sub', 'hdh', '', '');
------
INSERT INTO `mandarinko_gallery_item` (`id`, `pid`, `title`) VALUES ('4', '1', 'title');
------
INSERT INTO `mandarinko_gbook` (`id`, `nick`, `email`, `time`, `msg`, `answer`, `moder`) VALUES ('1', '', '', '2100000000', 'Добро пожаловать!', '', '1');
------
INSERT INTO `mandarinko_login` (`ip`, `time`) VALUES ('109.188.169.194', '1289490782'),
('109.188.169.194', '1289490796');
------
INSERT INTO `mandarinko_news` (`id`, `title`, `shot`, `full`, `date`, `metak`, `metad`) VALUES ('1', 'Sample News', 'Shot text', 'Full text', '0', '-', '-');
------
INSERT INTO `mandarinko_poll_answer` (`id`, `name`, `hc_id`, `counter`) VALUES ('1', 'Answer_Sample1', '1', '3'),
('2', 'Answer_Sample2', '1', '3'),
('3', 'Answer_Sample3', '1', '5');
------
INSERT INTO `mandarinko_poll_ask` (`id`, `title`, `time`, `var_numb`, `ttl_numb`, `comm_numb`) VALUES ('1', 'HeadCount_Sample', '2100000000', '3', '11', '1');
------
INSERT INTO `mandarinko_poll_comments` (`id`, `hc_id`, `nick`, `email`, `time`, `msg`, `moder`) VALUES ('1', '1', 'Nick_Sample', 'Email@Sample.ru', '2100000000', 'Message_Sample', '1');
------
INSERT INTO `mandarinko_poll_ip` (`id`, `ip`, `time`, `hc_id`) VALUES ('1', '192.168.0.1', '2100000000', '1'),
('2', '92.100.159.114', '1288290626', '1');
------
INSERT INTO `mandarinko_static` (`id`, `url`, `editable`, `lastedit`, `header`, `text`, `metakey`, `metadesc`) VALUES ('1', 'sample', 'n', '1287754325', 'Пример статики', 'Пример статики', '', ''),
('2', '1', 'n', '1287754241', '2', '343<br />', '6', '5');
------
INSERT INTO `mandarinko_text` (`id`, `position`, `text`) VALUES ('1', 'sample', 'text');
------
