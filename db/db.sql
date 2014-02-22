---------------------------------------------------------------------
-- BEFORE BEGINING REPLACE yiiplugins WITH your current database name
---------------------------------------------------------------------
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `yiiplugins` DEFAULT CHARACTER SET latin1 ;
USE `yiiplugins` ;

-- -----------------------------------------------------
-- Table `yiiplugins`.`yp_newsletter_groups`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `yiiplugins`.`yp_newsletter_groups` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `data_attributes_fields` TEXT NOT NULL ,
  `is_active` TINYINT NULL DEFAULT 1 ,
  `created` DATE NULL ,
  `updated` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yiiplugins`.`yp_newsletter_contact_list`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `yiiplugins`.`yp_newsletter_contact_list` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `yp_newsletter_groups_id` INT UNSIGNED NOT NULL ,
  `data_attributes_data` TEXT NULL ,
  `is_active` TINYINT NULL DEFAULT 1 ,
  `created` DATE NULL ,
  `updated` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_yp_newsletter_contact_list_yp_newsletter_groups` (`yp_newsletter_groups_id` ASC) ,
  CONSTRAINT `fk_yp_newsletter_contact_list_yp_newsletter_groups`
    FOREIGN KEY (`yp_newsletter_groups_id` )
    REFERENCES `yiiplugins`.`yp_newsletter_groups` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yiiplugins`.`yp_newsletter_template`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `yiiplugins`.`yp_newsletter_template` (
  `id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `yp_newsletter_groups_id` INT UNSIGNED NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `email_from` VARCHAR(45) NOT NULL ,
  `name_from` VARCHAR(45) NOT NULL ,
  `subject` VARCHAR(45) NOT NULL ,
  `body` TEXT NOT NULL ,
  `create` DATE NULL ,
  `updated` DATETIME NULL ,
  `is_active` TINYINT NOT NULL DEFAULT 0 ,
  `schedule_date` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_yp_newsletter_template_yp_newsletter_groups1` (`yp_newsletter_groups_id` ASC) ,
  CONSTRAINT `fk_yp_newsletter_template_yp_newsletter_groups1`
    FOREIGN KEY (`yp_newsletter_groups_id` )
    REFERENCES `yiiplugins`.`yp_newsletter_groups` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yiiplugins`.`yp_newsletter_log`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `yiiplugins`.`yp_newsletter_log` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `created` DATETIME NULL ,
  `yp_newsletter_contact_list_id` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_yp_newsletter_log_yp_newsletter_contact_list1` (`yp_newsletter_contact_list_id` ASC) ,
  CONSTRAINT `fk_yp_newsletter_log_yp_newsletter_contact_list1`
    FOREIGN KEY (`yp_newsletter_contact_list_id` )
    REFERENCES `yiiplugins`.`yp_newsletter_contact_list` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
