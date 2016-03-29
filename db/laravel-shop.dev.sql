/*
Navicat MySQL Data Transfer

Source Server         : vagrant
Source Server Version : 50710
Source Host           : localhost:3306
Source Database       : laravel-shop.dev

Target Server Type    : MYSQL
Target Server Version : 50710
File Encoding         : 65001

Date: 2016-03-29 17:50:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for currency
-- ----------------------------
DROP TABLE IF EXISTS `currency`;
CREATE TABLE `currency` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `symbol_left` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `symbol_right` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `decimal_place` int(11) NOT NULL,
  `value` double(15,8) NOT NULL,
  `decimal_point` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `thousand_point` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of currency
-- ----------------------------
INSERT INTO `currency` VALUES ('1', 'U.S. Dollar', '$', '', 'USD', '2', '1.00000000', '.', ',', '1', '2013-11-29 19:51:38', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('2', 'Euro', '€', '', 'EUR', '2', '0.89252700', '.', ',', '1', '2013-11-29 19:51:38', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('3', 'Pound Sterling', '£', '', 'GBP', '2', '0.69993500', '.', ',', '1', '2013-11-29 19:51:38', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('4', 'Australian Dollar', '$', '', 'AUD', '2', '1.32933000', '.', ',', '1', '2013-11-29 19:51:38', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('5', 'Canadian Dollar', '$', '', 'CAD', '2', '1.31792000', '.', ',', '1', '2013-11-29 19:51:38', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('6', 'Czech Koruna', '', 'Kč', 'CZK', '2', '24.17345000', '.', ',', '1', '2013-11-29 19:51:38', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('7', 'Danish Krone', 'kr', '', 'DKK', '2', '6.65719700', '.', ',', '1', '2013-11-29 19:51:38', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('8', 'Hong Kong Dollar', '$', '', 'HKD', '2', '7.75731900', '.', ',', '1', '2013-11-29 19:51:38', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('9', 'Hungarian Forint', 'Ft', '', 'HUF', '2', '280.43350000', '.', ',', '1', '2013-11-29 19:51:38', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('10', 'Israeli New Sheqel', '?', '', 'ILS', '2', '3.82774000', '.', ',', '1', '2013-11-29 19:51:38', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('11', 'Japanese Yen', '¥', '', 'JPY', '2', '113.50480000', '.', ',', '1', '2013-11-29 19:51:38', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('12', 'Mexican Peso', '$', '', 'MXN', '2', '17.50045000', '.', ',', '1', '2013-11-29 19:51:38', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('13', 'Norwegian Krone', 'kr', '', 'NOK', '2', '8.47052000', '.', ',', '1', '2013-11-29 19:51:38', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('14', 'New Zealand Dollar', '$', '', 'NZD', '2', '1.48086600', '.', ',', '1', '2013-11-29 19:51:38', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('15', 'Philippine Peso', 'Php', '', 'PHP', '2', '46.35227000', '.', ',', '1', '2013-11-29 19:51:38', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('16', 'Polish Zloty', '', 'zł', 'PLN', '2', '3.79811000', '.', ',', '1', '2013-11-29 19:51:38', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('17', 'Singapore Dollar', '$', '', 'SGD', '2', '1.36820300', '.', ',', '1', '2013-11-29 19:51:38', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('18', 'Swedish Krona', 'kr', '', 'SEK', '2', '8.27865600', '.', ',', '1', '2013-11-29 19:51:38', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('19', 'Swiss Franc', 'CHF', '', 'CHF', '2', '0.97480700', '.', ',', '1', '2013-11-29 19:51:38', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('20', 'Taiwan New Dollar', 'NT$', '', 'TWD', '2', '32.60896000', '.', ',', '1', '2013-11-29 19:51:38', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('21', 'Thai Baht', '฿', '', 'THB', '2', '35.41250000', '.', ',', '1', '2013-11-29 19:51:38', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('22', 'Ukrainian hryvnia', '₴', '', 'UAH', '2', '26.34494000', '.', ',', '1', '2015-07-22 23:25:30', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('23', 'Icelandic króna', 'kr', '', 'ISK', '2', '125.64890000', '.', ',', '1', '2015-07-22 23:25:30', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('24', 'Croatian kuna', 'kn', '', 'HRK', '2', '6.72152700', '.', ',', '1', '2015-07-22 23:25:30', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('25', 'Romanian leu', 'lei', '', 'RON', '2', '3.98685100', '.', ',', '1', '2015-07-22 23:25:30', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('26', 'Bulgarian lev', 'лв.', '', 'BGN', '2', '1.74647200', '.', ',', '1', '2015-07-22 23:25:30', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('27', 'Turkish lira', '₺', '', 'TRY', '2', '2.86870400', '.', ',', '1', '2015-07-22 23:25:30', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('28', 'Chilean peso', '$', '', 'CLP', '2', '680.26310000', '.', ',', '1', '2015-07-22 23:25:30', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('29', 'South African rand', 'R', '', 'ZAR', '2', '15.46334000', '.', ',', '1', '2015-07-22 23:25:30', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('30', 'Brazilian real', 'R$', '', 'BRL', '2', '3.66228200', '.', ',', '1', '2015-07-22 23:25:30', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('31', 'Malaysian ringgit', 'RM', '', 'MYR', '2', '4.00006100', '.', ',', '1', '2015-07-22 23:25:30', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('32', 'Russian ruble', '₽', '', 'RUB', '2', '68.44385000', '.', ',', '1', '2015-07-22 23:25:30', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('33', 'Indonesian rupiah', 'Rp', '', 'IDR', '2', '13346.81666700', '.', ',', '1', '2015-07-22 23:25:30', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('34', 'Indian rupee', '₹', '', 'INR', '2', '66.59032000', '.', ',', '1', '2015-07-22 23:25:30', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('35', 'Korean won', '₩', '', 'KRW', '2', '1166.74831500', '.', ',', '1', '2015-07-22 23:25:30', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('36', 'Renminbi', '¥', '', 'CNY', '2', '6.50932000', '.', ',', '1', '2015-07-22 23:25:30', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('37', 'Special drawing rights', '', '', 'XDR', '2', '0.71477300', '.', ',', '1', '2015-07-22 23:25:30', '2016-03-29 13:50:03');
INSERT INTO `currency` VALUES ('38', 'Armenian dram', 'Դ', '', 'AMD', '2', '482.24250100', '․', ',', '1', '0000-00-00 00:00:00', '2016-03-29 13:50:03');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2016_01_27_100549_create_role_table', '1');
INSERT INTO `migrations` VALUES ('2016_01_27_100749_create_user_table', '1');
INSERT INTO `migrations` VALUES ('2016_01_27_101336_create_products_table', '1');
INSERT INTO `migrations` VALUES ('2016_01_27_111118_create_currencies_table', '1');
INSERT INTO `migrations` VALUES ('2016_01_27_133716_create_transactions_table', '1');
INSERT INTO `migrations` VALUES ('2016_01_28_070423_create_shopping_cart_table', '1');
INSERT INTO `migrations` VALUES ('2013_11_26_161501_create_currency_table', '2');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `short_description` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `products_user_id_foreign` (`user_id`),
  CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('25', 'mercedes-benz-glc', '100000', '0', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'mercedes-benz-glc-class-x253-6567.jpg', 'type1', '1', '2016-03-24 13:26:16', '2016-03-24 13:26:16');
INSERT INTO `products` VALUES ('26', 'mercedes-benz-cla-180', '2000', '1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'mercedes-benz-cla-180-zadok.jpg', 'type1', '1', '2016-03-24 13:35:10', '2016-03-24 13:35:10');
INSERT INTO `products` VALUES ('27', 'mersedes-benz-a45-amg', '40000', '0', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', '4Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'mersedes-benz-a45-amg.jpg', 'type1', '1', '2016-03-24 13:35:51', '2016-03-24 13:35:51');
INSERT INTO `products` VALUES ('28', 'wheelsandmore-mercedes-benz-2902', '5555', '0', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'wheelsandmore-mercedes-benz-2902.jpg', 'type1', '1', '2016-03-24 13:36:33', '2016-03-24 13:36:33');
INSERT INTO `products` VALUES ('29', 'audi-a6-on-rotiform-lhr-s', '1000', '7', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'audi-a6-on-rotiform-lhr-s.jpg', 'type1', '1', '2016-03-24 13:37:10', '2016-03-24 13:37:10');
INSERT INTO `products` VALUES ('30', 'bmw-x6', '70000', '2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'bmw-x6-m-e71-bmv-belyy-chernyy.jpg', 'type1', '1', '2016-03-24 13:37:55', '2016-03-24 13:37:55');
INSERT INTO `products` VALUES ('31', 'mashiny-porshe-kayen', '60000', '2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'mashiny-porshe-kayen.jpg', 'type1', '1', '2016-03-24 13:38:30', '2016-03-24 13:38:30');
INSERT INTO `products` VALUES ('32', 'porsche-car-good', '70156', '4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'porsche-car-good.jpg', 'type1', '1', '2016-03-24 13:39:08', '2016-03-24 13:39:08');
INSERT INTO `products` VALUES ('33', 'mercedes-benz-cls63-amg', '9471', '1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'mercedes-benz-cls63-amg-2929.jpg', 'type2', '1', '2016-03-24 13:40:13', '2016-03-24 13:40:13');
INSERT INTO `products` VALUES ('34', 'bmw-e63-bmw6', '30142', '2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'bmw-e63-bmw6-2859.jpg', 'type2', '1', '2016-03-24 13:41:08', '2016-03-24 13:41:08');
INSERT INTO `products` VALUES ('35', 'bmw-m6-gt3-competition', '54000', '3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'bmw-m6-gt3-competition.jpg', 'type2', '1', '2016-03-24 13:42:31', '2016-03-24 13:42:31');
INSERT INTO `products` VALUES ('36', 'bmw-e92-m3', '67000', '3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'bmw-e92-m3-terry-lau-s-lemans.jpg', 'type2', '1', '2016-03-24 13:43:09', '2016-03-24 13:43:09');
INSERT INTO `products` VALUES ('37', 'mercedes-benz-cl63-amg', '51000', '1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'mercedes-benz-cl63-amg.jpg', 'type1', '1', '2016-03-24 13:44:09', '2016-03-24 13:44:09');
INSERT INTO `products` VALUES ('38', 'bmw-gran-coupe-koncept', '7400', '6', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'bmw-gran-coupe-koncept.jpg', 'type2', '1', '2016-03-24 14:00:33', '2016-03-24 14:00:33');
INSERT INTO `products` VALUES ('39', 'g-power-bmw-760i-storm', '98412', '4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'g-power-bmw-760i-storm.jpg', 'type2', '1', '2016-03-24 14:03:10', '2016-03-24 14:03:10');
INSERT INTO `products` VALUES ('40', 'bmw-pochi-chto-lemuzin', '7421', '4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'bmw-pochi-chto-lemuzin.jpg', 'type2', '1', '2016-03-24 14:04:32', '2016-03-24 14:04:32');
INSERT INTO `products` VALUES ('41', 'avtomobili-bmw-tyuning', '85000', '5', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'avtomobili-bmw-tyuning.jpg', 'type1', '1', '2016-03-24 14:07:21', '2016-03-24 14:07:21');
INSERT INTO `products` VALUES ('42', 'mercedes 111', '1000', '5', null, '5', '1512096_10152097837421670_55511372_o.jpg', 'type1', '1', '2016-03-29 12:16:47', '2016-03-29 12:16:47');

-- ----------------------------
-- Table structure for purchased_products
-- ----------------------------
DROP TABLE IF EXISTS `purchased_products`;
CREATE TABLE `purchased_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `transaction_id` int(10) unsigned NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `description` int(11) DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transaction_id` (`transaction_id`),
  CONSTRAINT `purchased_products_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of purchased_products
-- ----------------------------
INSERT INTO `purchased_products` VALUES ('3', '6', 'mercedes-benz-cl63-amg', '1', '1', '0', '2016-03-29 09:31:17', '2016-03-29 09:31:17');
INSERT INTO `purchased_products` VALUES ('4', '7', 'mercedes-benz-cl63-amg', '1', '37', '0', '2016-03-29 09:36:13', '2016-03-29 09:36:13');
INSERT INTO `purchased_products` VALUES ('5', '15', 'mercedes-benz-cl63-amg', '1', '37', '0', '2016-03-29 09:50:31', '2016-03-29 09:50:31');
INSERT INTO `purchased_products` VALUES ('6', '16', 'mersedes-benz-a45-amg', '4', '27', null, '2016-03-29 10:37:33', '2016-03-29 10:37:33');
INSERT INTO `purchased_products` VALUES ('7', '16', 'wheelsandmore-mercedes-benz-2902', '5', '28', null, '2016-03-29 10:37:33', '2016-03-29 10:37:33');
INSERT INTO `purchased_products` VALUES ('8', '17', 'mercedes-benz-cl63-amg', '1', '37', '0', '2016-03-29 10:58:00', '2016-03-29 10:58:00');
INSERT INTO `purchased_products` VALUES ('9', '18', 'mercedes-benz-glc', '1', '25', '0', '2016-03-29 11:02:25', '2016-03-29 11:02:25');
INSERT INTO `purchased_products` VALUES ('10', '19', 'mercedes-benz-glc', '1', '25', '0', '2016-03-29 11:51:26', '2016-03-29 11:51:26');
INSERT INTO `purchased_products` VALUES ('11', '20', 'mercedes-benz-glc', '1', '25', '0', '2016-03-29 12:00:19', '2016-03-29 12:00:19');
INSERT INTO `purchased_products` VALUES ('12', '21', 'mercedes-benz-cla-180', '1', '26', '0', '2016-03-29 12:10:40', '2016-03-29 12:10:40');
INSERT INTO `purchased_products` VALUES ('13', '22', 'mercedes-benz-glc', '1', '25', '0', '2016-03-29 12:11:35', '2016-03-29 12:11:35');
INSERT INTO `purchased_products` VALUES ('14', '22', 'mercedes-benz-cla-180', '1', '26', '0', '2016-03-29 12:11:35', '2016-03-29 12:11:35');
INSERT INTO `purchased_products` VALUES ('15', '22', 'mersedes-benz-a45-amg', '1', '27', '0', '2016-03-29 12:11:35', '2016-03-29 12:11:35');
INSERT INTO `purchased_products` VALUES ('16', '22', 'wheelsandmore-mercedes-benz-2902', '1', '28', '0', '2016-03-29 12:11:35', '2016-03-29 12:11:35');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', 'buyer', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `role` VALUES ('2', 'seller', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for shopping_card
-- ----------------------------
DROP TABLE IF EXISTS `shopping_card`;
CREATE TABLE `shopping_card` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `currency` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `shopping_card_product_id_foreign` (`product_id`),
  KEY `shopping_card_user_id_foreign` (`user_id`),
  KEY `shopping_card_currency_id_foreign` (`currency`),
  CONSTRAINT `shopping_card_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `shopping_card_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of shopping_card
-- ----------------------------

-- ----------------------------
-- Table structure for transactions
-- ----------------------------
DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `paymentId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cart` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payer_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payer_first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payer_last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payer_id` int(10) NOT NULL,
  `shipping_recipient_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `amount_total` int(10) NOT NULL,
  `invoice_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `paymentId` (`paymentId`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of transactions
-- ----------------------------
INSERT INTO `transactions` VALUES ('6', 'PAY-2PR888', '6', 'saqoxachatryan1988-buyer@gmail.com', 'test', 'buyer', '9', 'test buyer', 'San Jose', 'US', '51110', '56fa158d18c2d', '2016-03-29 09:31:17', '2016-03-29 09:31:17');
INSERT INTO `transactions` VALUES ('7', 'PAY-309825', '84749594', 'saqoxachatryan1988-buyer@gmail.com', 'test', 'buyer', '9', 'test buyer', 'San Jose', 'US', '51110', '56fa4c30d3744', '2016-03-29 09:36:13', '2016-03-29 09:36:13');
INSERT INTO `transactions` VALUES ('8', 'PAY-309825', '84749594', 'saqoxachatryan1988-buyer@gmail.com', 'test', 'buyer', '9', 'test buyer', 'San Jose', 'US', '51110', '56fa4c30d3744', '2016-03-29 09:46:12', '2016-03-29 09:46:12');
INSERT INTO `transactions` VALUES ('9', 'PAY-309825', '84749594', 'saqoxachatryan1988-buyer@gmail.com', 'test', 'buyer', '9', 'test buyer', 'San Jose', 'US', '51110', '56fa4c30d3744', '2016-03-29 09:46:40', '2016-03-29 09:46:40');
INSERT INTO `transactions` VALUES ('10', 'PAY-309825', '84749594', 'saqoxachatryan1988-buyer@gmail.com', 'test', 'buyer', '9', 'test buyer', 'San Jose', 'US', '51110', '56fa4c30d3744', '2016-03-29 09:47:48', '2016-03-29 09:47:48');
INSERT INTO `transactions` VALUES ('11', 'PAY-309825', '84749594', 'saqoxachatryan1988-buyer@gmail.com', 'test', 'buyer', '9', 'test buyer', 'San Jose', 'US', '51110', '56fa4c30d3744', '2016-03-29 09:48:22', '2016-03-29 09:48:22');
INSERT INTO `transactions` VALUES ('12', 'PAY-309825', '84749594', 'saqoxachatryan1988-buyer@gmail.com', 'test', 'buyer', '9', 'test buyer', 'San Jose', 'US', '51110', '56fa4c30d3744', '2016-03-29 09:49:16', '2016-03-29 09:49:16');
INSERT INTO `transactions` VALUES ('13', 'PAY-309825', '84749594', 'saqoxachatryan1988-buyer@gmail.com', 'test', 'buyer', '9', 'test buyer', 'San Jose', 'US', '51110', '56fa4c30d3744', '2016-03-29 09:49:50', '2016-03-29 09:49:50');
INSERT INTO `transactions` VALUES ('14', 'PAY-309825', '84749594', 'saqoxachatryan1988-buyer@gmail.com', 'test', 'buyer', '9', 'test buyer', 'San Jose', 'US', '51110', '56fa4c30d3744', '2016-03-29 09:50:12', '2016-03-29 09:50:12');
INSERT INTO `transactions` VALUES ('15', 'PAY-309825', '84749594', 'saqoxachatryan1988-buyer@gmail.com', 'test', 'buyer', '9', 'test buyer', 'San Jose', 'US', '51110', '56fa4c30d3744', '2016-03-29 09:50:31', '2016-03-29 09:50:31');
INSERT INTO `transactions` VALUES ('16', 'PAY-86K949', '20', 'saqoxachatryan1988-buyer@gmail.com', 'test', 'buyer', '9', 'test buyer', 'San Jose', 'US', '187885', '56fa5ab44e7a3', '2016-03-29 10:37:33', '2016-03-29 10:37:33');
INSERT INTO `transactions` VALUES ('17', 'PAY-7CW294', '7', 'saqoxachatryan1988-buyer@gmail.com', 'test', 'buyer', '9', 'test buyer', 'San Jose', 'US', '51110', '56fa5f7ff18f2', '2016-03-29 10:57:59', '2016-03-29 10:57:59');
INSERT INTO `transactions` VALUES ('18', 'PAY-4HG148', '82', 'saqoxachatryan1988-buyer@gmail.com', 'test', 'buyer', '9', 'test buyer', 'San Jose', 'US', '100110', '56fa60a44aae6', '2016-03-29 11:02:25', '2016-03-29 11:02:25');
INSERT INTO `transactions` VALUES ('19', 'PAY-9F5025', '222714842', 'saqoxachatryan1988-buyer@gmail.com', 'test', 'buyer', '9', 'test buyer', 'San Jose', 'US', '100110', '56fa6c23be978', '2016-03-29 11:51:26', '2016-03-29 11:51:26');
INSERT INTO `transactions` VALUES ('20', 'PAY-1HN521', '1', 'saqoxachatryan1988-buyer@gmail.com', 'test', 'buyer', '9', 'test buyer', 'San Jose', 'US', '100110', '56fa6e15d4fff', '2016-03-29 12:00:19', '2016-03-29 12:00:19');
INSERT INTO `transactions` VALUES ('21', 'PAY-5MF383', '8', 'saqoxachatryan1988-buyer@gmail.com', 'test', 'buyer', '9', 'test buyer', 'San Jose', 'US', '2110', '56fa706256c76', '2016-03-29 12:10:40', '2016-03-29 12:10:40');
INSERT INTO `transactions` VALUES ('22', 'PAY-95J199', '9342658', 'saqoxachatryan1988-buyer@gmail.com', 'test', 'buyer', '9', 'test buyer', 'San Jose', 'US', '147665', '56fa70e035503', '2016-03-29 12:11:35', '2016-03-29 12:11:35');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Sargis', 'saqoxachatryan1988@gmail.com', '$2y$10$/6R8bK9b9vrlGaHsZNPrUu7MbBBUboZPsaBI3Q1XlJmjDNLskF0j6', 'QPmWrWPvQ7iK7eacbp7WCMeEkxwGu1JyFhV2SyvIgeqJZCYVugsVSceOZ9j3', '2', '2016-02-01 11:49:42', '2016-03-29 12:49:56');
INSERT INTO `users` VALUES ('2', 'buyer', 'test@tt.tt', '$2y$10$vGkrzBaT04RWejQqMLGIX.OMzVVJIgXtmnZR8bivf0DxMlSx4hNlS', '2vpHiwDhpUKhLHvh1NFJUU1xhNEvKIr4B6a2pu5nGCtUBhS598EJAQZZqlYw', '1', '2016-02-04 03:29:33', '2016-03-29 12:12:32');
INSERT INTO `users` VALUES ('3', 'Sargis', 'sdfsdf@edew.fg', '$2y$10$Py.hPNv6xddIHvIu/C4WJOhlBoLAoYxOBZwa0FPqPSVylS079js1C', 'GZ1EOWuPHz9JagIli0IrEKfpNV1MAkHQ13Om7tMWBgITO92OZkIqnvB1Dmsu', '2', '2016-03-23 10:07:28', '2016-03-23 10:07:35');
INSERT INTO `users` VALUES ('5', 'test222', 'dscsadsa@edf.hg', '$2y$10$v6VmUL.BJnb1Csfnwu3sS.buNNETjzIxnNAP7Ymysy3R9THqeJnLe', 'xzhBDjanbt0kuMyoPm1uTb38v3brWi5Tj6gp0UglJJeNucuohC6Gxi7nOCOS', '2', '2016-03-23 13:56:08', '2016-03-23 13:56:15');
INSERT INTO `users` VALUES ('6', 'test333', 'vdsfds@fsf.dew', '$2y$10$0FfpHczNMd1EmJS1IEDiMufQZnseaHw7ncfUIVGlKUkywKh9lMh/S', 'oiFllZX3MfxIOv0ON4G1pvzPVmqLNLc37qH6YGVwlFOhOKFBB7CilvfQODpq', '2', '2016-03-24 05:34:45', '2016-03-24 05:34:51');
INSERT INTO `users` VALUES ('7', 'test777', 'adda@ffjhhihrew.frf', '$2y$10$2TwXxVINHPW49edL66LuUeyo1.0cDHEq4F9DcJG39lJS6Sr4t5lny', 'gQk8UI63Jtt2XiJjM53XOuFUfGhbgUqE8bEXkDhDS77X4pFmliANiY0J4EX5', '1', '2016-03-29 12:14:38', '2016-03-29 12:15:58');
