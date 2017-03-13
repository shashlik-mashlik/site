-- MySQL dump 10.13  Distrib 5.6.35, for Linux (x86_64)
--
-- Host: localhost    Database: antondtl_sm
-- ------------------------------------------------------
-- Server version	5.7.17-11-beget-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `mandarinko_admins`
--

DROP TABLE IF EXISTS `mandarinko_admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mandarinko_admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `login_now_time` varchar(10) NOT NULL,
  `login_now_ip` varchar(15) NOT NULL,
  `login_last_time` varchar(10) NOT NULL,
  `login_last_ip` varchar(15) NOT NULL,
  `rights` varchar(100) NOT NULL,
  `token_seed` text NOT NULL,
  `token_cnt` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mandarinko_admins`
--

LOCK TABLES `mandarinko_admins` WRITE;
/*!40000 ALTER TABLE `mandarinko_admins` DISABLE KEYS */;
/*!40000 ALTER TABLE `mandarinko_admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mandarinko_base`
--

DROP TABLE IF EXISTS `mandarinko_base`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mandarinko_base` (
  `param` varchar(64) NOT NULL,
  `value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mandarinko_base`
--

LOCK TABLES `mandarinko_base` WRITE;
/*!40000 ALTER TABLE `mandarinko_base` DISABLE KEYS */;
INSERT INTO `mandarinko_base` VALUES ('login_count','3'),('version','1.1'),('admin_login','test'),('admin_pwd','test'),('admin_cnt1','0'),('admin_cnt2','0'),('login_time','30'),('tokenAuth','0'),('email','project@mandarinko.ru');
/*!40000 ALTER TABLE `mandarinko_base` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mandarinko_catalog`
--

DROP TABLE IF EXISTS `mandarinko_catalog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mandarinko_catalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `url` varchar(256) NOT NULL,
  `c_url` varchar(256) NOT NULL,
  `name` text NOT NULL,
  `metak` text NOT NULL,
  `metad` text NOT NULL,
  `sort` int(11) NOT NULL,
  `root` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=262 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mandarinko_catalog`
--

LOCK TABLES `mandarinko_catalog` WRITE;
/*!40000 ALTER TABLE `mandarinko_catalog` DISABLE KEYS */;
INSERT INTO `mandarinko_catalog` VALUES (260,0,'napitki','napitki','Напитки','','',260,'nd'),(259,0,'hleb','hleb','Хлеб','','',259,'nd'),(258,0,'sousy','sousy','Соусы','','',258,'nd'),(257,0,'garniry','garniry','Гарниры','','',257,'nd'),(256,0,'salat','salat','Салаты и Закуски','','',256,'nd'),(255,247,'ovoschi','shashliks/ovoschi','Овощи','','',255,'nd'),(253,247,'ryba','shashliks/ryba','Рыба','','',253,'nd'),(254,247,'nabory','shashliks/nabory','Наборы','','',254,'nd'),(252,247,'govyadina','shashliks/govyadina','Говядина','','',252,'nd'),(251,247,'telyatina','shashliks/telyatina','Телятина','','',251,'nd'),(250,247,'kura','shashliks/kura','Курица','','',250,'nd'),(249,247,'baranina','shashliks/baranina','Баранина','','',249,'nd'),(248,247,'svinina','shashliks/svinina','Свинина','','',248,'nd'),(247,0,'shashliks','shashliks','Шашлыки','','',247,'root'),(261,0,'pivo','pivo','Пиво','','',261,'nd');
/*!40000 ALTER TABLE `mandarinko_catalog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mandarinko_catalog_item`
--

DROP TABLE IF EXISTS `mandarinko_catalog_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mandarinko_catalog_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `url` text NOT NULL,
  `c_url` text NOT NULL,
  `name` text NOT NULL,
  `articul` text NOT NULL,
  `price` float NOT NULL,
  `old_price` text NOT NULL,
  `color` text NOT NULL,
  `desc` text NOT NULL,
  `top` text NOT NULL,
  `new` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=681356 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mandarinko_catalog_item`
--

LOCK TABLES `mandarinko_catalog_item` WRITE;
/*!40000 ALTER TABLE `mandarinko_catalog_item` DISABLE KEYS */;
INSERT INTO `mandarinko_catalog_item` VALUES (681350,261,'pivo','059','Пиво Котайк 0.5л','',110,'','','','','on'),(681351,261,'pivo','060','Пиво Киликия 0.5л','',110,'','','','','on'),(681349,260,'napitki','058','Тан 0.5л','',100,'','','','','on'),(681347,260,'napitki','056','Вода мин. Рычал-Су 0.5л','',80,'','','','','on'),(681348,260,'napitki','057','Морс Домашний 0.5л','',50,'','','','','on'),(681346,260,'napitki','055','Сок Добрый 1л','',100,'','','','','on'),(681344,260,'napitki','053','Лимонад Тархун 0.5л','',80,'','','','','on'),(681345,260,'napitki','054','Лимонад Дюшес 0.5л','',80,'','','','','on'),(681342,260,'napitki','051','Фанта 1л','',110,'','','','','on'),(681343,260,'napitki','052','Спрайт 1л','',110,'','','','','on'),(681340,260,'napitki','049','Спрайт 0.5л','',80,'','','','','on'),(681341,260,'napitki','050','Кола 1л','',110,'','','','','on'),(681339,260,'napitki','048','Фанта 0.5л','',80,'','','','','on'),(681337,259,'hleb','046','Лепешка','',10,'','','','','on'),(681338,260,'napitki','047','Кола 0.5л','',80,'','','','','on'),(681335,258,'sousy','044','Наршараб','',40,'','','','','on'),(681336,259,'hleb','045','Лаваш Армянский','',15,'','','','','on'),(681333,258,'sousy','042','Чесночный','',50,'','','','','on'),(681334,258,'sousy','043','Аджика','',40,'','','','','on'),(681331,258,'sousy','040','Шашлычный','',40,'','','','','on'),(681332,258,'sousy','041','Тар-тар','',40,'','','','','on'),(681330,257,'garniry','039','Картофель фри','',90,'','','','','on'),(681328,257,'garniry','037','Айдахо','',60,'','','','','on'),(681329,257,'garniry','038','Картофель по деревенски','',60,'','','','','on'),(681327,256,'salat','036','Соленья','',190,'','','','','on'),(681325,256,'salat','034','Салат Европейский','',200,'','','','','on'),(681326,256,'salat','035','Овощное ассорти','',190,'','','','','on'),(681324,256,'salat','033','Салат Палермо','',200,'','','','','on'),(681322,256,'salat','olivie','Салат Оливье','',170,'','','','','on'),(681323,256,'salat','032','Салат Кавказ','',160,'','','','','on'),(681321,256,'salat','030','Салат Греческий','',180,'','','','','on'),(681320,256,'salat','029','Салат Цезарь','',230,'','','','','on'),(681319,255,'shashliks/ovoschi','028','Ики-бир из баклажанов','',240,'','','','','on'),(681318,255,'shashliks/ovoschi','027','Картофель на углях','',100,'','','','','on'),(681317,255,'shashliks/ovoschi','026','Овощной шашлык','',150,'','','','','on'),(681316,254,'shashliks/nabory','025','Ассорти шашлыков','',1100,'','','','','on'),(681315,253,'shashliks/ryba','024','Сибас на углях','',500,'','','','','on'),(681314,253,'shashliks/ryba','023','Дорадо на углях','',410,'','','','','on'),(681312,253,'shashliks/ryba','021','Форель на углях','',500,'','','','','on'),(681313,253,'shashliks/ryba','022','Лосось на углях','',500,'','','','','on'),(681311,252,'shashliks/govyadina','020','Люля-кебаб говяжий','',220,'','','','','on'),(681310,252,'shashliks/govyadina','019','Сердце говяжье','',200,'','','','','on'),(681309,252,'shashliks/govyadina','018','Печень говяжья','',210,'','','','','on'),(681308,251,'shashliks/telyatina','017','Люля-кебаб телячий','',240,'','','','','on'),(681307,251,'shashliks/telyatina','016','Телятина на кости','',380,'','','','','on'),(681306,251,'shashliks/telyatina','015','Телячья мякоть','',480,'','','','','on'),(681305,250,'shashliks/kura','014','Люля-кебаб куриный','',200,'','','','','on'),(681304,250,'shashliks/kura','013','Филе индейки','',220,'','','','','on'),(681303,250,'shashliks/kura','012','Цыпленок на углях','',230,'','','','','on'),(681301,250,'shashliks/kura','010','Куриные крылышки','',180,'','','','','on'),(681302,250,'shashliks/kura','011','Куриное бедро','',190,'','','','','on'),(681299,250,'shashliks/kura','008','Куриное филе','',200,'','','','','on'),(681300,250,'shashliks/kura','009','Куриные ножки','',190,'','','','','on'),(681298,249,'shashliks/baranina','006','Люля-кебаб бараний','',260,'','','','','on'),(681293,248,'shashliks/svinina','001','Свиная шея','',290,'','','','','on'),(681297,249,'shashliks/baranina','005','Баранья мякоть','',490,'','','','','on'),(681296,249,'shashliks/baranina','004','Бараньи ребра','',330,'','','','','on'),(681295,248,'shashliks/svinina','003','Свиная корейка','',290,'','','','','on'),(681294,248,'shashliks/svinina','002','Свиные ребра','',290,'','','','','on');
/*!40000 ALTER TABLE `mandarinko_catalog_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mandarinko_catalog_mapping`
--

DROP TABLE IF EXISTS `mandarinko_catalog_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mandarinko_catalog_mapping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mandarinko_catalog_mapping`
--

LOCK TABLES `mandarinko_catalog_mapping` WRITE;
/*!40000 ALTER TABLE `mandarinko_catalog_mapping` DISABLE KEYS */;
/*!40000 ALTER TABLE `mandarinko_catalog_mapping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mandarinko_login`
--

DROP TABLE IF EXISTS `mandarinko_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mandarinko_login` (
  `ip` varchar(15) NOT NULL,
  `time` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mandarinko_login`
--

LOCK TABLES `mandarinko_login` WRITE;
/*!40000 ALTER TABLE `mandarinko_login` DISABLE KEYS */;
INSERT INTO `mandarinko_login` VALUES ('83.136.244.254','1487750988');
/*!40000 ALTER TABLE `mandarinko_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mandarinko_main_menu`
--

DROP TABLE IF EXISTS `mandarinko_main_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mandarinko_main_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `about` varchar(256) NOT NULL,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mandarinko_main_menu`
--

LOCK TABLES `mandarinko_main_menu` WRITE;
/*!40000 ALTER TABLE `mandarinko_main_menu` DISABLE KEYS */;
INSERT INTO `mandarinko_main_menu` VALUES (1,'Меню на главной','first_menu');
/*!40000 ALTER TABLE `mandarinko_main_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mandarinko_main_menu_item`
--

DROP TABLE IF EXISTS `mandarinko_main_menu_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mandarinko_main_menu_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` text NOT NULL,
  `title` text NOT NULL,
  `parent_title` text NOT NULL,
  `link` text NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mandarinko_main_menu_item`
--

LOCK TABLES `mandarinko_main_menu_item` WRITE;
/*!40000 ALTER TABLE `mandarinko_main_menu_item` DISABLE KEYS */;
INSERT INTO `mandarinko_main_menu_item` VALUES (3,'1','main','root','/','Главная'),(4,'1','market','root','/market','Каталог'),(5,'1','contact','root','/contact','Контакты');
/*!40000 ALTER TABLE `mandarinko_main_menu_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mandarinko_presentation`
--

DROP TABLE IF EXISTS `mandarinko_presentation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mandarinko_presentation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(256) NOT NULL,
  `name` text NOT NULL,
  `width` text NOT NULL,
  `height` text NOT NULL,
  `time_pause` text NOT NULL,
  `time_active` text NOT NULL,
  `method` text NOT NULL,
  `text_position` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mandarinko_presentation`
--

LOCK TABLES `mandarinko_presentation` WRITE;
/*!40000 ALTER TABLE `mandarinko_presentation` DISABLE KEYS */;
INSERT INTO `mandarinko_presentation` VALUES (1,'main','Презентация на главной','640','360','1000','1000','1','1');
/*!40000 ALTER TABLE `mandarinko_presentation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mandarinko_presentation_item`
--

DROP TABLE IF EXISTS `mandarinko_presentation_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mandarinko_presentation_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` text NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  `link` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mandarinko_presentation_item`
--

LOCK TABLES `mandarinko_presentation_item` WRITE;
/*!40000 ALTER TABLE `mandarinko_presentation_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `mandarinko_presentation_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mandarinko_scroller`
--

DROP TABLE IF EXISTS `mandarinko_scroller`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mandarinko_scroller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(256) NOT NULL,
  `name` text NOT NULL,
  `width` text NOT NULL,
  `height` text NOT NULL,
  `time_pause` text NOT NULL,
  `time_active` text NOT NULL,
  `method` text NOT NULL,
  `text_position` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mandarinko_scroller`
--

LOCK TABLES `mandarinko_scroller` WRITE;
/*!40000 ALTER TABLE `mandarinko_scroller` DISABLE KEYS */;
INSERT INTO `mandarinko_scroller` VALUES (1,'main','Презентация на главной','200','220','1000','1000','1','1');
/*!40000 ALTER TABLE `mandarinko_scroller` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mandarinko_scroller_item`
--

DROP TABLE IF EXISTS `mandarinko_scroller_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mandarinko_scroller_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` text NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  `coast` text NOT NULL,
  `link` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mandarinko_scroller_item`
--

LOCK TABLES `mandarinko_scroller_item` WRITE;
/*!40000 ALTER TABLE `mandarinko_scroller_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `mandarinko_scroller_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mandarinko_static`
--

DROP TABLE IF EXISTS `mandarinko_static`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mandarinko_static` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(256) NOT NULL,
  `editable` varchar(1) NOT NULL,
  `lastedit` varchar(10) NOT NULL,
  `title` varchar(256) NOT NULL,
  `header` varchar(256) NOT NULL,
  `text` text NOT NULL,
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mandarinko_static`
--

LOCK TABLES `mandarinko_static` WRITE;
/*!40000 ALTER TABLE `mandarinko_static` DISABLE KEYS */;
INSERT INTO `mandarinko_static` VALUES (1,'main','','1487768502','Главная','Главная','<p>\r\n	<span style=\"color: rgb(0, 0, 0); font-family: roboto; font-size: 17px;\">Компания &quot;Shashlik-Mashlik&quot; осуществляет бесплатную доставку по Санкт-Петербургу в указанных ниже районах.&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(0, 0, 0); font-family: roboto; font-size: 17px;\" />\r\n	<br style=\"box-sizing: border-box; color: rgb(0, 0, 0); font-family: roboto; font-size: 17px;\" />\r\n	<span style=\"color: rgb(0, 0, 0); font-family: roboto; font-size: 17px;\">Вы можете заказать доставку шашлыка, салатов и других блюд на дом или в офис в удобное вам время и место.&nbsp;</span></p>\r\n','',''),(4,'market','','1396435976','Каталог','Каталог','<p>\r\n	Каталог</p>\r\n','',''),(22,'about','','1487768102','О нас','О нас','<p>\r\n	<span style=\"color: rgb(0, 0, 0); font-family: roboto; font-size: 17px;\">Компания &quot;Shashlik-Mashlik&quot; занимается производством и доставкой еды: шашлыков, салатов, гарниров и других блюд кавказской кухни в Санкт-Петербурге.&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(0, 0, 0); font-family: roboto; font-size: 17px;\" />\r\n	<br style=\"box-sizing: border-box; color: rgb(0, 0, 0); font-family: roboto; font-size: 17px;\" />\r\n	<span style=\"color: rgb(0, 0, 0); font-family: roboto; font-size: 17px;\">Не знаете, где купить шашлык в Санкт-Петербурге? Теперь это не проблема.&nbsp;</span><br style=\"box-sizing: border-box; color: rgb(0, 0, 0); font-family: roboto; font-size: 17px;\" />\r\n	<br style=\"box-sizing: border-box; color: rgb(0, 0, 0); font-family: roboto; font-size: 17px;\" />\r\n	<span style=\"color: rgb(0, 0, 0); font-family: roboto; font-size: 17px;\">Служба доставки &laquo;Shashlik-Mashlik&raquo; была создана с целью напомнить, каким вкусным, разнообразным, а главное, полезным, могут быть блюда приготовленные на настоящем мангале (а не на гриле, как привыкли многие). Рыба, овощи и, конечно же, мясо, как следует прожаренные в собственном соку на натуральных углях и приправленные тщательно подобранными специями, произведут на ваших гостей неизгладимое впечатление.</span><br style=\"box-sizing: border-box; color: rgb(0, 0, 0); font-family: roboto; font-size: 17px;\" />\r\n	<br style=\"box-sizing: border-box; color: rgb(0, 0, 0); font-family: roboto; font-size: 17px;\" />\r\n	<span style=\"color: rgb(0, 0, 0); font-family: roboto; font-size: 17px;\">Вам нет нужды куда-то идти и что-то покупать. Все обязанности по доставке горячего, еще пахнущего дымком шашлыка к нужной двери мы берем на себя.</span></p>\r\n','','');
/*!40000 ALTER TABLE `mandarinko_static` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mandarinko_text`
--

DROP TABLE IF EXISTS `mandarinko_text`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mandarinko_text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(50) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mandarinko_text`
--

LOCK TABLES `mandarinko_text` WRITE;
/*!40000 ALTER TABLE `mandarinko_text` DISABLE KEYS */;
INSERT INTO `mandarinko_text` VALUES (1,'sample','text');
/*!40000 ALTER TABLE `mandarinko_text` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-22 20:04:00
