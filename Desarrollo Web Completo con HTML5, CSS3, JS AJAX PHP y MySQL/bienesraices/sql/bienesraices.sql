-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema bienesraices_crud
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bienesraices_crud
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bienesraices_crud` DEFAULT CHARACTER SET utf8 ;
USE `bienesraices_crud` ;

-- -----------------------------------------------------
-- Table `bienesraices_crud`.`vendedores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bienesraices_crud`.`vendedores` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `apellido` VARCHAR(45) NULL,
  `telefono` VARCHAR(9) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bienesraices_crud`.`propiedades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bienesraices_crud`.`propiedades` (
  `id` INT(11) NOT NULL,
  `titulo` VARCHAR(45) NULL,
  `precio` DECIMAL(10,2) NULL,
  `imagen` VARCHAR(200) NULL,
  `descripcion` LONGTEXT NULL,
  `habitaciones` INT(1) NULL,
  `wc` INT(1) NULL,
  `estacionamiento` INT(1) NULL,
  `creado` DATE NULL,
  `vendedores_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_propiedades_vendedores_idx` (`vendedores_id` ASC) VISIBLE,
  CONSTRAINT `fk_propiedades_vendedores`
    FOREIGN KEY (`vendedores_id`)
    REFERENCES `bienesraices_crud`.`vendedores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `bienesraices_crud`.`vendedores`
-- -----------------------------------------------------
START TRANSACTION;
USE `bienesraices_crud`;
INSERT INTO `bienesraices_crud`.`vendedores` (`id`, `nombre`, `apellido`, `telefono`) VALUES (1, 'Carlos', 'Oliva', '666666666');
INSERT INTO `bienesraices_crud`.`vendedores` (`id`, `nombre`, `apellido`, `telefono`) VALUES (2, 'Javier', 'Oliva', '666666666');

COMMIT;

