SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `seattle_ajax_basic` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `seattle_ajax_basic` ;

-- -----------------------------------------------------
-- Table `seattle_ajax_basic`.`posts`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `seattle_ajax_basic`.`posts` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `description` TEXT NULL ,
  `created_at` DATETIME NULL ,
  `updated_at` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

USE `seattle_ajax_basic` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
