DROP TABLE IF EXISTS `demo_settings`;
CREATE TABLE IF NOT EXISTS `demo_settings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_style` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_style` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_style` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_style` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart_style` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_page_style` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_style` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `tax_rates` ADD `country_id` BIGINT(20) NOT NULL AFTER `state_id`;

ALTER TABLE `warehouses` ADD `country_id` BIGINT(20) NOT NULL AFTER `email`;
ALTER TABLE `warehouses` ADD `state_id` BIGINT(20) NOT NULL AFTER `country_id`;