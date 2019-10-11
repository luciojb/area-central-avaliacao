-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema areaCentralTest
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema areaCentralTest
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `areaCentralTest` DEFAULT CHARACTER SET utf8 ;
USE `areaCentralTest` ;

-- -----------------------------------------------------
-- Table `areaCentralTest`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `areaCentralTest`.`produto` (
  `id` INT NOT NULL,
  `descricao` VARCHAR(45) NOT NULL,
  `quantidade` INT NOT NULL,
  `barcode` VARCHAR(45) NOT NULL,
  `unitaryValue` DOUBLE NOT NULL,
  `active` TINYINT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `areaCentralTest`.`venda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `areaCentralTest`.`venda` (
  `id` INT NOT NULL,
  `product_id` INT NOT NULL,
  `quantity` INT NOT NULL,
  `unitaryValue` DOUBLE NOT NULL,
  `valueUpdate` TINYINT NOT NULL,
  `totalValue` DOUBLE NOT NULL,
  PRIMARY KEY (`id`, `product_id`),
  INDEX `fk_venda_produto_idx` (`product_id` ASC),
  CONSTRAINT `fk_venda_produto`
    FOREIGN KEY (`product_id`)
    REFERENCES `areaCentralTest`.`produto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
