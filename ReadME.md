# ![image info](./public/images/logo.png)

# DONATE ME - Online donation Platform

![GitHub language count](https://img.shields.io/github/languages/count/Hex-Clan-OOSD/donate-me)
![GitHub top language](https://img.shields.io/github/languages/top/Hex-Clan-OOSD/donate-me)
![Lines of code](https://img.shields.io/tokei/lines/github/Hex-Clan-OOSD/donate-me)
![GitHub repo size](https://img.shields.io/github/repo-size/Hex-Clan-OOSD/donate-me)

Donate me is an online donation platform that helps people to find foods, Money, tech equipments and so many other things.
All the information that are displayed by the users are run through a validation process. So the people can ensure that their money is not
going to wrong hands. This project was done with for the evaluation process in Object Oriented Software Development module. This project
is fully open-source. You can use it any where you want without any of our permissions. And we have not hosted this platfrom in
any server.

## Documentation

Development of the Web app was done according to the MVC design pattern. Here php has been used to manage database and other controls.
For the styling Bootstap V4.6 has been used. We have not used any front-end or back-end framework for this project.

### Database Documentation

```sql
CREATE DATABASE donate_me;
```

Users table creation query

```sql
CREATE TABLE `donate_me`.`users` ( `id` INT NOT NULL AUTO_INCREMENT , `first_name` VARCHAR(20) NOT NULL , `last_name` VARCHAR(20) NOT NULL , `email` VARCHAR(50) NOT NULL , `password` VARCHAR(255) NOT NULL , `role` VARCHAR(10) NOT NULL , `created_at` TIMESTAMP NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
```

```sql
ALTER TABLE `users` ADD `phone_number` VARCHAR(10) NOT NULL AFTER `role`, ADD `address_line_1` VARCHAR(20) NOT NULL AFTER `phone_number`, ADD `address_line_2` VARCHAR(20) NOT NULL AFTER `address_line_1`, ADD `city_town` VARCHAR(20) NOT NULL AFTER `address_line_2`, ADD `postal_code` VARCHAR(10) NOT NULL AFTER `city_town`, ADD `state` VARCHAR(20) NOT NULL AFTER `postal_code`;
```

Requests table creation query

```sql
CREATE TABLE `donate_me`.`requests` ( `id` INT NOT NULL AUTO_INCREMENT , `title` VARCHAR(50) NOT NULL , `description` VARCHAR(500) NOT NULL , `total_amount` INT NOT NULL , `collected_amount` INT NOT NULL , `user_id` INT NOT NULL , `status` VARCHAR(10) NOT NULL , `created_at` TIMESTAMP NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
```

Donations table creation query

```sql
CREATE TABLE `donate_me`.`donations` ( `id` INT NOT NULL AUTO_INCREMENT , `request_id` INT NOT NULL , `user_id` INT NOT NULL , `amount` INT NOT NULL , `status` VARCHAR(10) NOT NULL , `created_at` TIMESTAMP NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
```

Notifications table creation query

```sql
CREATE TABLE `donate_me`.`notifications` ( `id` INT NOT NULL AUTO_INCREMENT , `title` VARCHAR(50) NOT NULL , `description` VARCHAR(250) NOT NULL , `status` VARCHAR(10) NOT NULL , `user_id` INT NOT NULL , `created_at` TIMESTAMP NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
```

Users table modification query

```sql
ALTER TABLE `users` ADD `verified` VARCHAR(10) NULL AFTER `created_at`;
```

Requests table modification query

```sql
ALTER TABLE `requests` ADD `filename` VARCHAR(100) NULL AFTER `status`;
```

Donations table modification query

```sql
ALTER TABLE `donations` ADD `filename` VARCHAR(100) NOT NULL AFTER `status`;
```
