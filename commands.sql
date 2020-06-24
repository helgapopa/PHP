CREATE DATABASE IF NOT EXISTS mysite;
USE mysite;

CREATE TABLE `mysite`.
`users2` (
    `id`INT UNSIGNED NOT NULL AUTO_INCREMENT, 
    `fname`VARCHAR(50) NOT NULL, 
    `lname` VARCHAR(50) NOT NULL, 
    `email` VARCHAR(50) NOT NULL, 
    `password` VARCHAR(100) NOT NULL, 
    `dateofbirth` DATE NOT NULL, 
    `gendre` ENUM('m', 'f', 'n') NOT NULL, 
    `telephone` CHAR(10) NOT NULL, 
    `image` VARCHAR(50) NOT NULL, 
    `add_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    PRIMARY KEY(`id`), UNIQUE `email_unic` (`email`)
) ENGINE = InnoDB;