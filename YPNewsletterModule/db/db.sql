-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 21, 2014 at 02:41 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `yiiplugins`
--

-- --------------------------------------------------------

--
-- Table structure for table `yp_newsletter_contact_list`
--

CREATE TABLE IF NOT EXISTS `yp_newsletter_contact_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `yp_newsletter_groups_id` int(10) unsigned NOT NULL,
  `data_attributes_data` text,
  `is_active` tinyint(4) DEFAULT '1',
  `created` date DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_yp_newsletter_contact_list_yp_newsletter_groups` (`yp_newsletter_groups_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `yp_newsletter_groups`
--

CREATE TABLE IF NOT EXISTS `yp_newsletter_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `data_attributes_fields` text NOT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  `created` date DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `yp_newsletter_template`
--

CREATE TABLE IF NOT EXISTS `yp_newsletter_template` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `yp_newsletter_groups_id` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `email_from` varchar(45) NOT NULL,
  `header` text,
  `body` text NOT NULL,
  `footer` text,
  `create` date DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_yp_newsletter_template_yp_newsletter_groups1` (`yp_newsletter_groups_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `yp_newsletter_contact_list`
--
ALTER TABLE `yp_newsletter_contact_list`
  ADD CONSTRAINT `fk_yp_newsletter_contact_list_yp_newsletter_groups` FOREIGN KEY (`yp_newsletter_groups_id`) REFERENCES `yp_newsletter_groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `yp_newsletter_template`
--
ALTER TABLE `yp_newsletter_template`
  ADD CONSTRAINT `fk_yp_newsletter_template_yp_newsletter_groups1` FOREIGN KEY (`yp_newsletter_groups_id`) REFERENCES `yp_newsletter_groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
