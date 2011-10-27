CREATE TABLE IF NOT EXISTS `feature_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `updated` datetime NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `title_format_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` blob,
  `video` blob,
  `polls_link` varchar(255) DEFAULT NULL,
  `add_facebook_comments` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `feature_items_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `feature_item_id` int(11) DEFAULT NULL,
  `image_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `feature_item_id` (`feature_item_id`),
  KEY `image_type_id` (`image_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;




CREATE TABLE IF NOT EXISTS `showpage_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `updated` datetime NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `about` blob,
  `video` blob,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `showpage_items_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `showpage_item_id` int(11) DEFAULT NULL,
  `image_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `showpage_item_id` (`showpage_item_id`),
  KEY `image_type_id` (`image_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;





CREATE TABLE IF NOT EXISTS `showpage_feature_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `updated` datetime NOT NULL,
  `showpage_item_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `title_format_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` blob,
  `video` blob,
  `polls_link` varchar(255) DEFAULT NULL,
  `add_facebook_comments` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `showpage_item_id` (`showpage_item_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `showpage_feature_items_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `showpage_feature_item_id` int(11) DEFAULT NULL,
  `image_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `showpage_feature_item_id` (`showpage_feature_item_id`),
  KEY `image_type_id` (`image_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `showpage_cast_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `updated` datetime NOT NULL,
  `showpage_item_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `content` blob,
  PRIMARY KEY (`id`),
  KEY `showpage_item_id` (`showpage_item_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `showpage_cast_items_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `showpage_cast_item_id` int(11) DEFAULT NULL,
  `image_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `showpage_cast_item_id` (`showpage_cast_item_id`),
  KEY `image_type_id` (`image_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;