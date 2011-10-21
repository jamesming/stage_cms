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
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

/* dumping data for table `nu_spotlight_items_sets` */
insert into `nu_spotlight_items_sets` values
(50,'2011-09-26 21:07:00',null,115,11,5),
(49,'2011-09-26 21:07:00',null,91,11,4),
(48,'2011-09-26 21:07:00',null,94,11,3),
(47,'2011-09-26 21:07:00',null,103,11,2),
(46,'2011-09-26 21:07:00',null,87,11,1),
(75,'2011-09-26 21:27:28',null,103,12,5),
(74,'2011-09-26 21:27:28',null,103,12,4),
(73,'2011-09-26 21:27:28',null,103,12,3),
(72,'2011-09-26 21:27:28',null,103,12,2),
(71,'2011-09-26 21:27:28',null,103,12,1),
(65,'2011-09-26 21:13:02',null,0,13,5),
(64,'2011-09-26 21:13:02',null,0,13,4),
(63,'2011-09-26 21:13:02',null,87,13,3),
(62,'2011-09-26 21:13:02',null,87,13,2),
(61,'2011-09-26 21:13:02',null,91,13,1);

/* Table structure for table `nu_spotlight_sets` */
DROP TABLE IF EXISTS `nu_spotlight_sets`;

CREATE TABLE `nu_spotlight_sets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/* dumping data for table `nu_spotlight_sets` */
insert into `nu_spotlight_sets` values
(13,'2011-09-26 21:12:33','2011-09-26 21:13:02','Three tabs'),
(11,'2011-09-26 20:06:36','2011-09-26 21:07:00','First One Tested'),
(12,'2011-09-26 21:04:19','2011-09-26 21:27:28','All Black');

