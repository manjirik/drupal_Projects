SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `skywards` ;
CREATE SCHEMA IF NOT EXISTS `skywards` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `skywards` ;

-- -----------------------------------------------------
-- Table `skywards`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `skywards`.`user` ;

CREATE  TABLE IF NOT EXISTS `skywards`.`user` (
  `user_id` INT NOT NULL AUTO_INCREMENT ,
  `firstname` VARCHAR(100) NULL ,
  `lastname` VARCHAR(100) NULL ,
  `fb_id` VARCHAR(100) NULL ,
  `email` VARCHAR(255) NULL ,
  `current_location` VARCHAR(255) NULL ,
  `home_town` VARCHAR(255) NULL ,
  `sky_mem_id` VARCHAR(100) NULL ,
  `is_active` TINYINT(1) NULL ,
  `created_date` DATETIME NULL ,
  `updated_date` DATETIME NULL ,
  PRIMARY KEY (`user_id`) ,
  INDEX `idx_firstname` (`firstname` ASC) ,
  INDEX `idx_lastname` (`lastname` ASC) ,
  INDEX `idx_current_location` (`current_location` ASC) ,
  INDEX `idx_hown_town` (`home_town` ASC) ,
  INDEX `idx_fb_id` (`fb_id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `skywards`.`continent`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `skywards`.`continent` ;

CREATE  TABLE IF NOT EXISTS `skywards`.`continent` (
  `continent_id` INT NOT NULL AUTO_INCREMENT ,
  `continent_name` VARCHAR(100) NULL ,
  `coordinates` TEXT NULL ,
  PRIMARY KEY (`continent_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `skywards`.`location`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `skywards`.`location` ;

CREATE  TABLE IF NOT EXISTS `skywards`.`location` (
  `location_id` INT NOT NULL AUTO_INCREMENT ,
  `city_name` VARCHAR(255) NULL ,
  `city_image` VARCHAR(100) NULL COMMENT 'confimation is required for the city image.' ,
  `short_desc` TEXT NULL ,
  `latitude` FLOAT NULL ,
  `longitude` FLOAT NULL ,
  `continent_id` INT NOT NULL ,
  `country_name` VARCHAR(100) NULL ,
  `status` TINYINT(1) NOT NULL DEFAULT 1 ,
  `destination_cnt` INT NOT NULL DEFAULT 0 COMMENT 'destination_cnt = for popular destinations' ,
  `is_emirates_location` TINYINT(1) NULL DEFAULT false ,
  `temprature` VARCHAR(5) NULL ,
  PRIMARY KEY (`location_id`) ,
  INDEX `idx_city_name` (`city_name` ASC) ,
  INDEX `idx_cont_id` (`continent_id` ASC) ,
  INDEX `fk_location_cont_id_idx` (`continent_id` ASC) ,
  CONSTRAINT `fk_location_cont_id`
    FOREIGN KEY (`continent_id` )
    REFERENCES `skywards`.`continent` (`continent_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `skywards`.`user_entry`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `skywards`.`user_entry` ;

CREATE  TABLE IF NOT EXISTS `skywards`.`user_entry` (
  `user_entry_id` INT NOT NULL ,
  `user_id` INT NOT NULL ,
  `location_id` INT NOT NULL ,
  `vote_count` INT NULL ,
  `entry_status` TINYINT(1) NULL DEFAULT true ,
  `entry_ticket_number` VARCHAR(100) NULL ,
  `entry_story` TEXT NULL ,
  PRIMARY KEY (`user_entry_id`) ,
  INDEX `idx_user_entry_user_id` (`user_id` ASC) ,
  INDEX `idx_user_entry_location_id` (`location_id` ASC) ,
  INDEX `idx_user_entry_entry_status` (`entry_status` ASC) ,
  CONSTRAINT `fk_user_entry_user_id`
    FOREIGN KEY (`user_id` )
    REFERENCES `skywards`.`user` (`user_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_entry_location_id`
    FOREIGN KEY (`location_id` )
    REFERENCES `skywards`.`location` (`location_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = '	';


-- -----------------------------------------------------
-- Table `skywards`.`vote_details`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `skywards`.`vote_details` ;

CREATE  TABLE IF NOT EXISTS `skywards`.`vote_details` (
  `vote_details_id` INT NOT NULL AUTO_INCREMENT ,
  `user_entry_id` INT NOT NULL ,
  `user_id` INT NOT NULL ,
  `vote_date` DATETIME NULL ,
  `draw_id` INT NULL ,
  PRIMARY KEY (`vote_details_id`) ,
  INDEX `idx_vote_details_id` (`user_entry_id` ASC) ,
  INDEX `fk_vote_details_user_id_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_vote_details_user_entry_id`
    FOREIGN KEY (`user_entry_id` )
    REFERENCES `skywards`.`user_entry` (`user_entry_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_vote_details_user_id`
    FOREIGN KEY (`user_id` )
    REFERENCES `skywards`.`user` (`user_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `skywards`.`user_notifications`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `skywards`.`user_notifications` ;

CREATE  TABLE IF NOT EXISTS `skywards`.`user_notifications` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `id_user_receiver` INT NOT NULL ,
  `id_user_sender` INT NOT NULL ,
  `fb_id_receiver` VARCHAR(100) NULL ,
  `fb_id_sender` VARCHAR(100) NULL ,
  `id_notification` INT NOT NULL ,
  `status` TINYINT(1) NULL DEFAULT false ,
  `timestamp` DATETIME NULL ,
  `notification_type` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `idx_id_user_receiver` (`id_user_receiver` ASC) ,
  INDEX `idx_id_user_sender` (`id_user_sender` ASC) ,
  INDEX `idx_fb_id_receiver` (`fb_id_receiver` ASC) ,
  INDEX `idx_fb_id_sender` (`fb_id_sender` ASC) ,
  INDEX `idx_status` (`status` ASC) ,
  INDEX `fk_user_noti_rec_id_idx` (`id_user_receiver` ASC) ,
  INDEX `fk_user_rec_fbid_idx` (`fb_id_receiver` ASC) ,
  CONSTRAINT `fk_user_noti_rec_id`
    FOREIGN KEY (`id_user_receiver` )
    REFERENCES `skywards`.`user` (`user_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_rec_fbid`
    FOREIGN KEY (`fb_id_receiver` )
    REFERENCES `skywards`.`user` (`fb_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `skywards`.`draw_details`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `skywards`.`draw_details` ;

CREATE  TABLE IF NOT EXISTS `skywards`.`draw_details` (
  `draw_id` INT NOT NULL AUTO_INCREMENT ,
  `draw_date` DATETIME NULL ,
  `user_entry_id` INT NOT NULL ,
  `vote_count` INT NULL ,
  `vote_details_vote_details_id` INT NOT NULL ,
  PRIMARY KEY (`draw_id`) ,
  INDEX `fk_draw_details_user_entry_id_idx` (`user_entry_id` ASC) ,
  INDEX `fk_draw_details_vote_details1_idx` (`vote_details_vote_details_id` ASC) ,
  CONSTRAINT `fk_draw_details_user_entry_id`
    FOREIGN KEY (`user_entry_id` )
    REFERENCES `skywards`.`user_entry` (`user_entry_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_draw_details_vote_details1`
    FOREIGN KEY (`vote_details_vote_details_id` )
    REFERENCES `skywards`.`vote_details` (`vote_details_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `skywards`.`user_entry_details`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `skywards`.`user_entry_details` ;

CREATE  TABLE IF NOT EXISTS `skywards`.`user_entry_details` (
  `user_entry_details_id` INT NOT NULL AUTO_INCREMENT ,
  `user_entry_id` INT NOT NULL ,
  `friend_id` INT NOT NULL ,
  `friend_email` VARCHAR(100) NULL ,
  `entry_status` TINYINT(1) NULL DEFAULT true ,
  `acceptance_status` TINYINT(1) NULL DEFAULT false ,
  `acceptance_date` DATETIME NULL ,  
  PRIMARY KEY (`user_entry_details_id`) ,
  INDEX `idx_user_entry_details_user_id` (`user_entry_id` ASC) ,
  INDEX `idx_user_entry_entry_status` (`entry_status` ASC) ,
  CONSTRAINT `fk_user_entry_details_id`
    FOREIGN KEY (`user_entry_id` )
    REFERENCES `skywards`.`user_entry` (`user_entry_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = '	';



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
