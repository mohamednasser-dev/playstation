CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;


ALTER TABLE `customers_addresses` ADD `is_default` INT(1) NULL DEFAULT '0' AFTER `customer_id`;


ALTER TABLE `customers` ADD `country` INT(11) NULL DEFAULT NULL AFTER `gender`;


ALTER TABLE `country` ADD `name_ar` VARCHAR(255) NULL DEFAULT NULL AFTER `name`;
UPDATE `country` SET `name_ar` = 'البحرين' WHERE `country`.`id` = 18;
UPDATE `country` SET `name_ar` = 'الكويت' WHERE `country`.`id` = 115;
UPDATE `country` SET `name_ar` = 'القطر' WHERE `country`.`id` = 176;
UPDATE `country` SET `name_ar` = 'السعوديه' WHERE `country`.`id` = 191;
UPDATE `country` SET `name_ar` = 'عمان' WHERE `country`.`id` = 163;

ALTER TABLE `country` ADD `currency_rate_to_dinar` FLOAT NOT NULL AFTER `status`;


ALTER TABLE `customers` ADD `currency` VARCHAR(3) NULL DEFAULT NULL AFTER `country`;


CREATE TABLE `box_gift_handle` (
  `id` int(11) NOT NULL,
  `customer_id` int(255) NOT NULL,
  `box_id` int(255) NOT NULL,
  `card_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `box_gift_handle`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `box_gift_handle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;



ALTER TABLE `orders` ADD `ip` VARCHAR(255) NULL DEFAULT NULL AFTER `country_id`;
