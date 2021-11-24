![image info](./public/images/logo.png)

# DONATE ME - Online donation Platform

### Database Configurations

#### Database name - donate_me (Local database is require to run the Web Application)

#### Users table creation query

~~~~sql
CREATE TABLE `donate_me`.`users` ( `id` INT NOT NULL AUTO_INCREMENT , `first_name` VARCHAR(20) NOT NULL , `last_name` VARCHAR(20) NOT NULL , `email` VARCHAR(50) NOT NULL , `password` VARCHAR(255) NOT NULL , `role` VARCHAR(10) NOT NULL , `created_at` TIMESTAMP NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
~~~~

~~~~sql
ALTER TABLE `users` ADD `phone_number` VARCHAR(10) NOT NULL AFTER `role`, ADD `address_line_1` VARCHAR(20) NOT NULL AFTER `phone_number`, ADD `address_line_2` VARCHAR(20) NOT NULL AFTER `address_line_1`, ADD `city_town` VARCHAR(20) NOT NULL AFTER `address_line_2`, ADD `postal_code` VARCHAR(10) NOT NULL AFTER `city_town`, ADD `state` VARCHAR(20) NOT NULL AFTER `postal_code`;
~~~~

#### Requests table creation query

~~~~sql
CREATE TABLE `donate_me`.`requests` ( `id` INT NOT NULL AUTO_INCREMENT , `title` VARCHAR(50) NOT NULL , `description` VARCHAR(500) NOT NULL , `total_amount` INT NOT NULL , `collected_amount` INT NOT NULL , `user_id` INT NOT NULL , `status` VARCHAR(10) NOT NULL , `created_at` TIMESTAMP NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
~~~~

#### Donations table creation query

~~~~sql
CREATE TABLE `donate_me`.`donations` ( `id` INT NOT NULL AUTO_INCREMENT , `request_id` INT NOT NULL , `user_id` INT NOT NULL , `amount` INT NOT NULL , `status` VARCHAR(10) NOT NULL , `created_at` TIMESTAMP NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
~~~~

#### Notifications table creation query

~~~~sql
CREATE TABLE `donate_me`.`notifications` ( `id` INT NOT NULL AUTO_INCREMENT , `title` VARCHAR(50) NOT NULL , `description` VARCHAR(250) NOT NULL , `status` VARCHAR(10) NOT NULL , `user_id` INT NOT NULL , `created_at` TIMESTAMP NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
~~~~
