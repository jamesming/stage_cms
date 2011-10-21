/*mysqldump.php version 1.02 */
/* Table structure for table `nu_spotlight_items` */
DROP TABLE IF EXISTS `nu_spotlight_items`;

CREATE TABLE `nu_spotlight_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `updated` datetime NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `blurb` blob,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=127 DEFAULT CHARSET=utf8;

/* dumping data for table `nu_spotlight_items` */
insert into `nu_spotlight_items` values
(91,'2011-09-22 19:01:47','2011-09-22 20:06:10','Store','Get Your nuvoTV Swag On!','<span class=\"Apple-style-span\" style=\"color: rgb(31, 30, 28); font-family: Helvetica, Arial, \'Liberation Sans\', FreeSans, sans-serif; font-size: 14px; line-height: 21px; background-color: rgb(255, 255, 255); \">Want to rock an Osmin-inspired T-shirt? Check out our nuvoTV online store for funny \"Fich, Sala, Wada\" tees and other Osminism paraphernalia.</span>'),
(94,'2011-09-22 19:17:12','2011-09-22 20:21:38','Ringtones','Download Nu Beats For Your Phone!','<span class=\"Apple-style-span\" style=\"color: rgb(31, 30, 28); font-family: Helvetica, Arial, \'Liberation Sans\', FreeSans, sans-serif; font-size: 14px; line-height: 21px; background-color: rgb(255, 255, 255); \">In desperate need of a new ringtone? Check out all the nuvoTV tunes available for download now.</span>'),
(87,'2011-09-22 18:53:59','2011-09-26 21:26:38','Hulu','Watch the World\'s most Psychotic Trainer on Hulu','<font size=\"3\">Relive some of the most unconventional <b>workouts</b> TV\'s ever seen now on Hulu.</font>'),
(103,'2011-09-22 19:48:18','2011-09-23 04:53:38','T-Shirt','Want to Rock a Super Cool Model Latina T-Shirt?','<span class=\"Apple-style-span\" style=\"color: rgb(31, 30, 28); font-family: Helvetica, Arial, \'Liberation Sans\', FreeSans, sans-serif; font-size: 14px; line-height: 21px; background-color: rgb(255, 255, 255); \">Of course you do! Share this video with your friends and we\'ll send you a FREE limited edition Model Latina T-shirt.</span>'),
(105,'2011-09-22 20:10:25','2011-09-22 20:10:46','Brightcove','Models! Discovery! Tattoos! @$$ Kicking!','<span class=\"Apple-style-span\" style=\"color: rgb(31, 30, 28); font-family: Helvetica, Arial, \'Liberation Sans\', FreeSans, sans-serif; font-size: 14px; line-height: 21px; background-color: rgb(255, 255, 255); \">From the glitz &amp; glamour of Model Latina Las Vegas to the dark &amp; futuristic world of James Cameron\'s Dark Angel, we\'ve got the hottest lineup of shows to keep you glued to your set. It\'s what\'s NU this week!</span>'),
(115,'2011-09-23 04:42:45','2011-09-23 04:43:56','Twitter','Tweet With Us Every Monday!','<span class=\"Apple-style-span\" style=\"color: rgb(31, 30, 28); font-family: Helvetica, Arial, \'Liberation Sans\', FreeSans, sans-serif; font-size: 14px; line-height: 21px; background-color: rgb(255, 255, 255); \">Be part of the \"in\" crowd. Use hashtag #MLVegas during Model Latina Las Vegas this Monday at 10/9c and your tweets may appear on nuvoTV</span>');

/* Table structure for table `nu_spotlight_items_images` */
DROP TABLE IF EXISTS `nu_spotlight_items_images`;

CREATE TABLE `nu_spotlight_items_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `image_type` varchar(255) NOT NULL,
  `nu_spotlight_item_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

/* dumping data for table `nu_spotlight_items_images` */
insert into `nu_spotlight_items_images` values
(4,'2011-09-22 22:23:06',null,'feature',87),
(5,'2011-09-22 22:27:08',null,'thumb',87),
(9,'2011-09-23 04:34:03',null,'feature',91),
(10,'2011-09-23 04:34:08',null,'thumb',91),
(11,'2011-09-23 04:36:53',null,'feature',94),
(12,'2011-09-23 04:37:02',null,'feature',103),
(13,'2011-09-23 04:38:29',null,'thumb',94),
(14,'2011-09-23 04:39:35',null,'thumb',103),
(15,'2011-09-23 04:40:49',null,'thumb',105),
(16,'2011-09-23 04:42:59',null,'feature',115),
(17,'2011-09-23 04:43:12',null,'thumb',115);

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
) ENGINE=MyISAM AUTO_INCREMENT=126 DEFAULT CHARSET=utf8;

/* dumping data for table `nu_spotlight_items_sets` */
insert into `nu_spotlight_items_sets` values
(50,'2011-09-26 21:07:00',null,115,11,5),
(49,'2011-09-26 21:07:00',null,91,11,4),
(48,'2011-09-26 21:07:00',null,94,11,3),
(47,'2011-09-26 21:07:00',null,103,11,2),
(46,'2011-09-26 21:07:00',null,87,11,1),
(125,'2011-09-27 18:55:05',null,103,12,5),
(124,'2011-09-27 18:55:05',null,103,12,4),
(123,'2011-09-27 18:55:05',null,103,12,3),
(122,'2011-09-27 18:55:05',null,103,12,2),
(121,'2011-09-27 18:55:05',null,103,12,1),
(110,'2011-09-26 23:35:08',null,0,13,5),
(109,'2011-09-26 23:35:08',null,0,13,4),
(108,'2011-09-26 23:35:08',null,87,13,3),
(107,'2011-09-26 23:35:08',null,94,13,2),
(106,'2011-09-26 23:35:08',null,91,13,1),
(105,'2011-09-26 22:15:59',null,115,14,5),
(104,'2011-09-26 22:15:59',null,87,14,4),
(103,'2011-09-26 22:15:59',null,103,14,3),
(102,'2011-09-26 22:15:59',null,94,14,2),
(101,'2011-09-26 22:15:59',null,91,14,1),
(100,'2011-09-26 22:15:25',null,103,15,5),
(99,'2011-09-26 22:15:25',null,105,15,4),
(98,'2011-09-26 22:15:25',null,87,15,3),
(97,'2011-09-26 22:15:25',null,91,15,2),
(96,'2011-09-26 22:15:25',null,103,15,1);

/* Table structure for table `nu_spotlight_sets` */
DROP TABLE IF EXISTS `nu_spotlight_sets`;

CREATE TABLE `nu_spotlight_sets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/* dumping data for table `nu_spotlight_sets` */
insert into `nu_spotlight_sets` values
(13,'2011-09-26 21:12:33','2011-09-26 23:35:08','Three tabs'),
(11,'2011-09-26 20:06:36','2011-09-26 21:07:00','First One Tested'),
(12,'2011-09-26 21:04:19','2011-09-27 18:55:05','All Black'),
(14,'2011-09-26 22:09:58','2011-09-26 22:15:59','another test'),
(15,'2011-09-26 22:14:32','2011-09-26 22:15:25','test');

/* Table structure for table `nu_spotlight_sets_calendars` */
DROP TABLE IF EXISTS `nu_spotlight_sets_calendars`;

CREATE TABLE `nu_spotlight_sets_calendars` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `month` int(2) DEFAULT NULL,
  `day` int(2) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `nu_spotlight_set_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nu_spotlight_set_id` (`nu_spotlight_set_id`),
  KEY `day` (`day`),
  KEY `month` (`month`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/* dumping data for table `nu_spotlight_sets_calendars` */
insert into `nu_spotlight_sets_calendars` values
(16,'2011-09-27 19:48:48',null,9,8,2011,15),
(9,'2011-09-27 19:10:42',null,9,4,2011,12),
(11,'2011-09-27 19:14:09',null,9,5,2011,11),
(12,'2011-09-27 19:32:13',null,9,7,2011,11),
(17,'2011-09-27 19:48:54',null,9,9,2011,14),
(14,'2011-09-27 19:39:41',null,9,23,2011,11),
(15,'2011-09-27 19:39:49',null,10,11,2011,12);

