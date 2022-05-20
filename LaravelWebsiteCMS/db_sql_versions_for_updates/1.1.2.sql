-- --------------------------------------------------------

--
-- Table structure for table `order_histories`
--

DROP TABLE IF EXISTS `order_histories`;
CREATE TABLE IF NOT EXISTS `order_histories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_status` enum('Pending','Complete','Return','Cancel','Shipped') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_histories_order_id_foreign` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Alter tables Queries 
--

ALTER TABLE `payment_methods` ADD `default` TINYINT(1) NOT NULL AFTER `status`;
ALTER TABLE `customer_address_book` ADD `latlong` varchar(191) NOT NULL AFTER `longitude`;
ALTER TABLE `orders` ADD `latlong` VARCHAR(191) NOT NULL AFTER `delivery_phone`;
ALTER TABLE `orders` ADD `delivery_boy_id` BIGINT(20) NOT NULL AFTER `customer_id`;
ALTER TABLE `orders` CHANGE `payment_method` `payment_method` ENUM('cod','paypal','stripe','banktransfer','instamojo','braintree','hyperpay','razor_pay','pay_tm','paystack','midtrans') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cod';
ALTER TABLE `orders` CHANGE `order_status` `order_status` ENUM('Pending','Inprocess','Dispatched','Complete','Return','Cancel','Shipped') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending';
ALTER TABLE `order_histories` CHANGE `order_status` `order_status` ENUM('Pending','Inprocess','Dispatched','Complete','Return','Cancel','Shipped') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending';
ALTER TABLE `settings` CHANGE `type` `type` ENUM('client_secret','business_general','pos','email_smtp','email_template','sms','invoice','barcode','website_general','seo','app_login_signup','website_login_signup','app_general','gallary_setting','store_setting','business_notification_setting','app_display_in_setting','app_notification_setting','web_theme_setting','point_setting','membership_setting','email_notify_setting','login_credential','is_purchased_setting') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL;
UPDATE `settings` SET `type` = 'is_purchased_setting', `created_at` = NULL, `updated_at` = NULL WHERE `settings`.`id` = 157; UPDATE `settings` SET `type` = 'is_purchased_setting', `created_at` = NULL, `updated_at` = NULL WHERE `settings`.`id` = 156; UPDATE `settings` SET `type` = 'is_purchased_setting', `created_at` = NULL, `updated_at` = NULL WHERE `settings`.`id` = 155;

INSERT INTO `user_warehouses` (`id`, `user_id`, `warehouse_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2021-10-29 13:15:09', NULL),
(2, 3, 1, '2021-10-29 13:15:09', NULL),
(3, 4, 1, '2021-10-29 13:15:09', NULL),
(4, 5, 1, '2021-10-29 13:15:09', NULL),
(5, 6, 1, '2021-10-29 13:15:09', NULL),
(6, 7, 1, '2021-10-29 13:15:09', NULL),
(7, 8, 1, '2021-10-29 13:15:09', NULL);


-- --------------------------------------------------------

--
-- Table structure for table `payment_method_descriptions`
--

DROP TABLE IF EXISTS `payment_method_descriptions`;
CREATE TABLE IF NOT EXISTS `payment_method_descriptions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `payment_method_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `sub_name_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_name_2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `payment_method_descriptions_payment_method_id_foreign` (`payment_method_id`),
  KEY `payment_method_descriptions_language_id_foreign` (`language_id`),
  KEY `payment_method_descriptions_name_index` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_method_descriptions`
--

INSERT INTO `payment_method_descriptions` (`id`, `payment_method_id`, `name`, `language_id`, `sub_name_1`, `sub_name_2`) VALUES
(1, 1, 'Braintree', 1, 'Braintree', 'Braintree');

-- --------------------------------------------------------

--
-- Table structure for table `payment_method_settings`
--

DROP TABLE IF EXISTS `payment_method_settings`;
CREATE TABLE IF NOT EXISTS `payment_method_settings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `payment_method_id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `payment_method_settings_payment_method_id_foreign` (`payment_method_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_method_settings`
--

INSERT INTO `payment_method_settings` (`id`, `payment_method_id`, `key`, `value`) VALUES
(1, 1, 'PAYPAL_API_USERNAME', '---'),
(2, 1, 'PAYPAL_API_PASSWORD', '--'),
(3, 1, 'PAYPAL_API_SIGNATURE', '--'),
(4, 2, 'STRIPE_API_KEY', '--'),
(5, 3, 'BANK_TRANSFER_NAME', '--'),
(6, 3, 'BANK_TRANSFER_DETAIL', '--'),
(7, 3, 'BANK_TRANSFER_ACC_NAME', '--'),
(8, 3, 'BANK_TRANSFER_ACC_NUM', '--'),
(9, 3, 'BANK_TRANSFER_BANK_NAME', '--'),
(10, 3, 'BANK_TRANSFER_IFSC', '--'),
(11, 3, 'BANK_TRANSFER_IBAN', '--'),
(12, 3, 'BANK_TRANSFER_BIC_SWIFT', '--');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

DROP TABLE IF EXISTS `payment_methods`;
CREATE TABLE IF NOT EXISTS `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 for active 0 for inactive',
  `default` tinyint(1) NOT NULL DEFAULT 0,
  `environment` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1 for active 0 for inactive',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payment_methods_created_by_foreign` (`created_by`),
  KEY `payment_methods_updated_by_foreign` (`updated_by`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `payment_method`, `status`, `default`, `environment`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'paypal', 1, 1, 0, NULL, NULL, NULL, NULL),
(2, 'stripe', 1, 0, 0, NULL, NULL, NULL, NULL),
(3, 'banktransfer', 1, 0, 0, NULL, NULL, NULL, NULL),
(4, 'cash_on_delivery', 1, 0, 0, NULL, NULL, NULL, NULL);




-- --------------------------------------------------------

--
-- Table structure for table `order_comments`
--

DROP TABLE IF EXISTS `order_comments`;
CREATE TABLE IF NOT EXISTS `order_comments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_comments_order_id_foreign` (`order_id`),
  KEY `order_comments_user_id_foreign` (`user_id`),
  KEY `order_comments_customer_id_foreign` (`customer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- --------------------------------------------------------

--
-- Table structure for table `order_notes`
--

DROP TABLE IF EXISTS `order_notes`;
CREATE TABLE IF NOT EXISTS `order_notes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_notes_order_id_foreign` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_warehouses`
--

DROP TABLE IF EXISTS `user_warehouses`;
CREATE TABLE IF NOT EXISTS `user_warehouses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `warehouse_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_warehouses_user_id_foreign` (`user_id`),
  KEY `user_warehouses_warehouse_id_foreign` (`warehouse_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boys`
--

DROP TABLE IF EXISTS `delivery_boys`;
CREATE TABLE IF NOT EXISTS `delivery_boys` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `availability_status` tinyint(1) NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` bigint(20) UNSIGNED NOT NULL,
  `in_active` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` bigint(20) UNSIGNED NOT NULL,
  `vehicle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_registration_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_details` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driving_license_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_rc_book_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gpay_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ifsc_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `delivery_boys_email_unique` (`email`),
  UNIQUE KEY `delivery_boys_phone_number_unique` (`phone_number`),
  KEY `delivery_boys_country_foreign` (`country`),
  KEY `delivery_boys_state_foreign` (`state`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

