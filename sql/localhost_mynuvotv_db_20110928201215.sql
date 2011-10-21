/*mysqldump.php version 1.02 */
/* Table structure for table `image_types` */
DROP TABLE IF EXISTS `image_types`;

CREATE TABLE `image_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/* dumping data for table `image_types` */
insert into `image_types` values
(1,null,null,'feature'),
(2,null,null,'thumb'),
(3,null,null,'hero'),
(4,null,null,'tune_in'),
(5,null,null,'right_tab'),
(6,null,null,'premium_hero');

/* Table structure for table `nu_spotlight_items` */
DROP TABLE IF EXISTS `nu_spotlight_items`;

CREATE TABLE `nu_spotlight_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `updated` datetime NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `blurb` blob,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=133 DEFAULT CHARSET=utf8;

/* dumping data for table `nu_spotlight_items` */
insert into `nu_spotlight_items` values
(91,'2011-09-22 19:01:47','2011-09-22 20:06:10','Store','Get Your nuvoTV Swag On!','<span class=\"Apple-style-span\" style=\"color: rgb(31, 30, 28); font-family: Helvetica, Arial, \'Liberation Sans\', FreeSans, sans-serif; font-size: 14px; line-height: 21px; background-color: rgb(255, 255, 255); \">Want to rock an Osmin-inspired T-shirt? Check out our nuvoTV online store for funny \"Fich, Sala, Wada\" tees and other Osminism paraphernalia.</span>',''),
(94,'2011-09-22 19:17:12','2011-09-22 20:21:38','Ringtones','Download Nu Beats For Your Phone!','<span class=\"Apple-style-span\" style=\"color: rgb(31, 30, 28); font-family: Helvetica, Arial, \'Liberation Sans\', FreeSans, sans-serif; font-size: 14px; line-height: 21px; background-color: rgb(255, 255, 255); \">In desperate need of a new ringtone? Check out all the nuvoTV tunes available for download now.</span>',''),
(87,'2011-09-22 18:53:59','2011-09-28 19:56:47','Hulu','Watch the World\'s most Psychotic Trainer on Hulu','<font size=\"3\">Relive some of the most unconventional <b>workouts</b> TV\'s ever seen now on Hulu.</font>','test'),
(129,'2011-09-28 17:04:33','2011-09-28 17:05:46','Model Latino Video','Get behind the scenes coverage of the Models!','&nbsp;<span class=\"Apple-style-span\" style=\"color: rgb(31, 30, 28); font-family: Helvetica, Arial, \'Liberation Sans\', FreeSans, sans-serif; font-size: 14px; line-height: 21px; background-color: rgb(255, 255, 255); \">Want to know what the models do when not impressing the judges? Get behind-the-scenes coverage in Model Latina\'s Video Control Room.</span>',''),
(103,'2011-09-22 19:48:18','2011-09-23 04:53:38','T-Shirt','Want to Rock a Super Cool Model Latina T-Shirt?','<span class=\"Apple-style-span\" style=\"color: rgb(31, 30, 28); font-family: Helvetica, Arial, \'Liberation Sans\', FreeSans, sans-serif; font-size: 14px; line-height: 21px; background-color: rgb(255, 255, 255); \">Of course you do! Share this video with your friends and we\'ll send you a FREE limited edition Model Latina T-shirt.</span>',''),
(105,'2011-09-22 20:10:25','2011-09-22 20:10:46','Brightcove','Models! Discovery! Tattoos! @$$ Kicking!','<span class=\"Apple-style-span\" style=\"color: rgb(31, 30, 28); font-family: Helvetica, Arial, \'Liberation Sans\', FreeSans, sans-serif; font-size: 14px; line-height: 21px; background-color: rgb(255, 255, 255); \">From the glitz &amp; glamour of Model Latina Las Vegas to the dark &amp; futuristic world of James Cameron\'s Dark Angel, we\'ve got the hottest lineup of shows to keep you glued to your set. It\'s what\'s NU this week!</span>',''),
(115,'2011-09-23 04:42:45','2011-09-23 04:43:56','Twitter','Tweet With Us Every Monday!','<span class=\"Apple-style-span\" style=\"color: rgb(31, 30, 28); font-family: Helvetica, Arial, \'Liberation Sans\', FreeSans, sans-serif; font-size: 14px; line-height: 21px; background-color: rgb(255, 255, 255); \">Be part of the \"in\" crowd. Use hashtag #MLVegas during Model Latina Las Vegas this Monday at 10/9c and your tweets may appear on nuvoTV</span>','');

/* Table structure for table `nu_spotlight_items_images` */
DROP TABLE IF EXISTS `nu_spotlight_items_images`;

CREATE TABLE `nu_spotlight_items_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `image_type_id` int(11) NOT NULL,
  `image_type` varchar(255) NOT NULL,
  `nu_spotlight_item_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `image_type_id` (`image_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

/* dumping data for table `nu_spotlight_items_images` */
insert into `nu_spotlight_items_images` values
(4,'2011-09-22 22:23:06',null,4,'feature',87),
(5,'2011-09-22 22:27:08',null,5,'thumb',87),
(9,'2011-09-23 04:34:03',null,4,'feature',91),
(10,'2011-09-23 04:34:08',null,5,'thumb',91),
(11,'2011-09-23 04:36:53',null,4,'feature',94),
(12,'2011-09-23 04:37:02',null,4,'feature',103),
(13,'2011-09-23 04:38:29',null,5,'thumb',94),
(14,'2011-09-23 04:39:35',null,5,'thumb',103),
(15,'2011-09-23 04:40:49',null,5,'thumb',105),
(16,'2011-09-23 04:42:59',null,4,'feature',115),
(17,'2011-09-23 04:43:12',null,5,'thumb',115),
(22,'2011-09-28 17:05:32',null,4,'feature',129),
(23,'2011-09-28 17:05:38',null,5,'thumb',129);

/* Table structure for table `nu_spotlight_items_sets` */
DROP TABLE IF EXISTS `nu_spotlight_items_sets`;

CREATE TABLE `nu_spotlight_items_sets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `nu_spotlight_item_id` int(11) DEFAULT NULL,
  `nu_spotlight_set_id` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nu_spotlight_item_id` (`nu_spotlight_item_id`),
  KEY `nu_spotlight_set_id` (`nu_spotlight_set_id`)
) ENGINE=MyISAM AUTO_INCREMENT=161 DEFAULT CHARSET=utf8;

/* dumping data for table `nu_spotlight_items_sets` */
insert into `nu_spotlight_items_sets` values
(145,'2011-09-28 18:03:31',null,87,11,5),
(144,'2011-09-28 18:03:31',null,91,11,4),
(143,'2011-09-28 18:03:31',null,94,11,3),
(142,'2011-09-28 18:03:31',null,129,11,2),
(141,'2011-09-28 18:03:31',null,115,11,1),
(150,'2011-09-28 18:06:17',null,103,12,5),
(149,'2011-09-28 18:06:17',null,103,12,4),
(148,'2011-09-28 18:06:17',null,103,12,3),
(147,'2011-09-28 18:06:17',null,103,12,2),
(146,'2011-09-28 18:06:17',null,103,12,1),
(105,'2011-09-26 22:15:59',null,115,14,5),
(104,'2011-09-26 22:15:59',null,87,14,4),
(103,'2011-09-26 22:15:59',null,103,14,3),
(102,'2011-09-26 22:15:59',null,94,14,2),
(101,'2011-09-26 22:15:59',null,91,14,1),
(160,'2011-09-28 18:08:48',null,103,15,5),
(159,'2011-09-28 18:08:48',null,115,15,4),
(158,'2011-09-28 18:08:48',null,87,15,3),
(157,'2011-09-28 18:08:48',null,91,15,2),
(156,'2011-09-28 18:08:48',null,129,15,1),
(131,'2011-09-28 04:46:36',null,91,16,1),
(132,'2011-09-28 04:46:36',null,94,16,2),
(133,'2011-09-28 04:46:36',null,103,16,3),
(134,'2011-09-28 04:46:36',null,105,16,4),
(135,'2011-09-28 04:46:36',null,115,16,5);

/* Table structure for table `nu_spotlight_sets` */
DROP TABLE IF EXISTS `nu_spotlight_sets`;

CREATE TABLE `nu_spotlight_sets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/* dumping data for table `nu_spotlight_sets` */
insert into `nu_spotlight_sets` values
(11,'2011-09-26 20:06:36','2011-09-28 18:03:31','First One Tested'),
(12,'2011-09-26 21:04:19','2011-09-28 18:06:17','All Black'),
(14,'2011-09-26 22:09:58','2011-09-26 22:15:59','another test'),
(15,'2011-09-26 22:14:32','2011-09-28 18:08:48','test'),
(16,'2011-09-28 04:46:36',null,'testtesttest');

/* Table structure for table `nu_spotlight_sets_calendars` */
DROP TABLE IF EXISTS `nu_spotlight_sets_calendars`;

CREATE TABLE `nu_spotlight_sets_calendars` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `month` int(2) DEFAULT NULL,
  `day` int(2) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `day_of_year` int(11) NOT NULL,
  `nu_spotlight_set_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nu_spotlight_set_id` (`nu_spotlight_set_id`),
  KEY `day` (`day`),
  KEY `month` (`month`),
  KEY `day_of_year` (`day_of_year`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

/* dumping data for table `nu_spotlight_sets_calendars` */
insert into `nu_spotlight_sets_calendars` values
(39,'2011-09-28 16:15:09',null,9,13,2011,255,12);

