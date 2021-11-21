# MVC design pattern is used in this project

## Instructions for the repo

### All the files should name in .php (No any .html files)

### Controller folder in app/ directory contains the controller clases. Class name and the file Name should be same (Eg: Controller.php => class Controller)

### Do not change app/config/config.php and app/lib/Core.php files

### Add the php view in the app/views according to the Endpoints

### Database Configurations

#### DBName - donate_me (Create the database using the phpmyadmin)

#### Table creation query - CREATE TABLE `donate_me`.`users` ( `id` INT NOT NULL AUTO_INCREMENT , `first_name` VARCHAR(20) NOT NULL , `last_name` VARCHAR(20) NOT NULL , `email` VARCHAR(50) NOT NULL , `password` VARCHAR(255) NOT NULL , `role` VARCHAR(10) NOT NULL , `created_at` TIMESTAMP NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

