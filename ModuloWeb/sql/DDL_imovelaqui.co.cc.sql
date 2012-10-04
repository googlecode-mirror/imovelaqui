-- -----------------------------------------------------
-- Table `imovel_tipo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `imovel_tipo` ;

CREATE  TABLE IF NOT EXISTS `imovel_tipo` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `tipo` VARCHAR(50) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tipo_contrato`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tipo_contrato` ;

CREATE  TABLE IF NOT EXISTS `tipo_contrato` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `tipo` VARCHAR(40) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `estado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `estado` ;

CREATE  TABLE IF NOT EXISTS `estado` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `uf` VARCHAR(2) NOT NULL COMMENT 'Imobiliária X - Desc > ABB\\nImobiliária Y - Desc > ACC' ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `nome_UNIQUE` (`nome` ASC) ,
  UNIQUE INDEX `uf_UNIQUE` (`uf` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cidade`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `cidade` ;

CREATE  TABLE IF NOT EXISTS `cidade` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(100) NOT NULL COMMENT '	' ,
  `id_estado` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_cidade_estado_idx` (`id_estado` ASC) ,
  CONSTRAINT `fk_cidade_estado`
    FOREIGN KEY (`id_estado` )
    REFERENCES `estado` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `imovel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `imovel` ;

CREATE  TABLE IF NOT EXISTS `imovel` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `cep` VARCHAR(8) NULL ,
  `bairro` VARCHAR(50) NULL ,
  `endereco` VARCHAR(50) NULL ,
  `numero` VARCHAR(20) NOT NULL ,
  `metragem` VARCHAR(60) NOT NULL ,
  `latitude` VARCHAR(60) NULL ,
  `longitude` VARCHAR(60) NULL ,
  `imovel_tipo` INT NOT NULL ,
  `tipo_contrato` INT NOT NULL ,
  `cidade` INT NOT NULL ,
  PRIMARY KEY (`id`, `cidade`) ,
  INDEX `fk_imovel_imovel_tipo_idx` (`imovel_tipo` ASC) ,
  INDEX `fk_imovel_tipo_contrato_idx` (`tipo_contrato` ASC) ,
  INDEX `fk_imovel_cidade_idx` (`cidade` ASC) ,
  CONSTRAINT `fk_imovel_imovel_tipo`
    FOREIGN KEY (`imovel_tipo` )
    REFERENCES `imovel_tipo` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_imovel_tipo_contrato`
    FOREIGN KEY (`tipo_contrato` )
    REFERENCES `tipo_contrato` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_imovel_cidade`
    FOREIGN KEY (`cidade` )
    REFERENCES `cidade` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `imobiliaria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `imobiliaria` ;

CREATE  TABLE IF NOT EXISTS `imobiliaria` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `id_matriz` INT NULL COMMENT 'Referência para a matriz, caso esta seja uma imobiliária filial.' ,
  `nome` VARCHAR(60) NOT NULL ,
  `site` VARCHAR(100) NULL ,
  `cep` VARCHAR(8) NULL ,
  `bairro` VARCHAR(50) NULL ,
  `endereco` VARCHAR(50) NULL ,
  `numero` VARCHAR(20) NULL ,
  `cidade` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `site_UNIQUE` (`site` ASC) ,
  INDEX `fk_imobiliaria_imobiliaria_idx` (`id_matriz` ASC) ,
  INDEX `fk_imobiliaria_cidade_idx` (`cidade` ASC) ,
  CONSTRAINT `fk_imobiliaria_imobiliaria`
    FOREIGN KEY (`id_matriz` )
    REFERENCES `imobiliaria` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_imobiliaria_cidade`
    FOREIGN KEY (`cidade` )
    REFERENCES `cidade` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `foto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `foto` ;

CREATE  TABLE IF NOT EXISTS `foto` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `caminho` VARCHAR(100) NOT NULL ,
  `imovel` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_fotos_imovel_idx` (`imovel` ASC) ,
  CONSTRAINT `fk_fotos_imovel`
    FOREIGN KEY (`imovel` )
    REFERENCES `imovel` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `imovel_imobiliaria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `imovel_imobiliaria` ;

CREATE  TABLE IF NOT EXISTS `imovel_imobiliaria` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `imovel` INT NOT NULL ,
  `imobiliaria` INT NOT NULL ,
  `descricao_imovel` TEXT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_imovel_imobiliaria_imobiliaria` (`imobiliaria` ASC) ,
  INDEX `fk_imovel_imobiliaria_imovel` (`imovel` ASC) ,
  INDEX `fk_imovel_imobiliaria_imobiliaria_idx` (`imobiliaria` ASC) ,
  CONSTRAINT `fk_imovel_imobiliaria_imovel`
    FOREIGN KEY (`imovel` )
    REFERENCES `imovel` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_imovel_imobiliaria_imobiliaria`
    FOREIGN KEY (`imobiliaria` )
    REFERENCES `imobiliaria` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `comodos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `comodos` ;

CREATE  TABLE IF NOT EXISTS `comodos` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `tipo` VARCHAR(45) NULL ,
  `medida` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `imovel_comodos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `imovel_comodos` ;

CREATE  TABLE IF NOT EXISTS `imovel_comodos` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `imovel` INT NOT NULL ,
  `comodos` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_imovel_comodos_comodos_idx` (`comodos` ASC) ,
  INDEX `fk_imovel_comodos_imovel_idx` (`imovel` ASC) ,
  CONSTRAINT `fk_imovel_comodos_imovel`
    FOREIGN KEY (`imovel` )
    REFERENCES `imovel` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_imovel_comodos_comodos`
    FOREIGN KEY (`comodos` )
    REFERENCES `comodos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;