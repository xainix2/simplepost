CREATE TABLE `database`.`newsletter` (
    `id` BIGINT NOT NULL AUTO_INCREMENT,
    `cname` VARCHAR(255) NOT NULL,
    `cemail` VARCHAR(255) NOT NULL,
    `extracol` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;