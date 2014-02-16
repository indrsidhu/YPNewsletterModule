CREATE TABLE IF NOT EXISTS `yp_newsletter_contact_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `yp_newsletter_groups_id` int(10) unsigned NOT NULL,
  `data_attributes_data` text,
  `is_active` tinyint(4) DEFAULT '1',
  `created` date DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_yp_newsletter_contact_list_yp_newsletter_groups` (`yp_newsletter_groups_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `yp_newsletter_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `data_attributes_fields` text NOT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  `created` date DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
