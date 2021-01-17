-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2020 at 05:05 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bestlaravel2018`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `products_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `products_id`, `product_name`, `product_code`, `product_color`, `size`, `price`, `quantity`, `user_email`, `session_id`, `created_at`, `updated_at`) VALUES
(41, 31, 'House', 'SKU-House2', 'White and Brown', '10*10', 20.00, 2, 'weshare@gmail.com', 'bKnMoW6lH0eA6ciYTU47tgeayw5CFUzBkjkBb3F5', '2018-12-06 18:17:37', '2018-12-06 18:17:37'),
(42, 34, 'Lenovo ThinkPad', 'SKU-Lenovo X1', 'Black', '15 inch', 10.00, 2, 'weshare@gmail.com', 'bKnMoW6lH0eA6ciYTU47tgeayw5CFUzBkjkBb3F5', '2018-12-06 18:18:26', '2018-12-06 18:18:26'),
(40, 30, 'Link House New LC2', 'SKU-Link House1', 'Gray', 'Small', 10.00, 5, 'weshare@gmail.com', 'SFoV6rkDUv7y5F81nKOo5H3u0ERK3EYkcBQhUrcm', '2018-12-06 17:50:30', '2018-12-06 17:50:30'),
(39, 31, 'House', 'SKU-House1', 'White and Brown', '5*20', 25.00, 4, 'weshare@gmail.com', 'SFoV6rkDUv7y5F81nKOo5H3u0ERK3EYkcBQhUrcm', '2018-12-06 17:49:50', '2018-12-06 17:49:50'),
(36, 33, 'Cole Haan', 'SKU-Haan1', 'Brown', '25', 12.00, 1, 'weshare@gmail.com', 'OrHCEFHcACdGNXet3m2jVbzlJS0VybkkeknXXilx', '2018-12-06 02:18:10', '2018-12-06 02:18:10'),
(37, 32, 'Vionic Shoes Brand', 'SKU-Vionic3', 'All Colors', '30', 20.00, 1, 'weshare@gmail.com', 'OrHCEFHcACdGNXet3m2jVbzlJS0VybkkeknXXilx', '2018-12-06 02:30:33', '2018-12-06 02:30:33'),
(43, 35, 'Cloths', 'SKU-Red', 'Black', 'S', 2.00, 5, 'weshare@gmail.com', 'bKnMoW6lH0eA6ciYTU47tgeayw5CFUzBkjkBb3F5', '2018-12-06 18:18:31', '2018-12-06 18:18:31'),
(45, 29, 'LTS CMIP9382NW-28M 8MP IR H.265 Outdoor Bullet IP Security Camera', 'SKU-Prius1', 'White', 'One Size', 12.00, 2, 'weshare@gmail.com', 'a3j0zpYpS4MVcsMhzVRMGmQHV0pPxOylOy0YRQ9V', '2020-12-12 07:12:36', '2020-12-12 07:12:36');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `description`, `url`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(12, 0, 'Security Camera', 'Security Camera', 'http://wornnarith.cambosoft.com', 1, NULL, '2018-10-22 21:32:33', '2020-12-12 07:01:43'),
(30, 0, 'Rack Station RS1219+', NULL, 'http://camara.com', 1, NULL, '2020-12-12 07:32:48', '2020-12-12 07:32:48'),
(31, 30, 'Rack Station RS1219+ product', NULL, 'http://camara.com', 1, NULL, '2020-12-12 07:33:14', '2020-12-12 07:33:14'),
(32, 0, 'Synology DS1019+', NULL, 'http://camara.com', 1, NULL, '2020-12-12 07:35:42', '2020-12-12 08:27:06'),
(33, 32, 'Synology DS1019+ product', NULL, 'http://camara.com', 1, NULL, '2020-12-12 07:36:11', '2020-12-12 07:36:11'),
(26, 25, 'Hybrid Network Video Recorder products', NULL, 'http://camara.com', 1, NULL, '2020-12-12 06:53:38', '2020-12-12 07:05:27'),
(27, 12, 'Camara product', NULL, 'http://camara.com', 1, NULL, '2020-12-12 07:04:50', '2020-12-12 07:06:08'),
(28, 0, 'Hard drive array', NULL, 'http://camara.com', 1, NULL, '2020-12-12 07:18:03', '2020-12-12 07:18:03'),
(29, 28, 'Hard drive array Product', NULL, 'http://camara.com', 1, NULL, '2020-12-12 07:18:35', '2020-12-12 07:18:35'),
(25, 0, 'Hybrid Network Video Recorder', NULL, 'http://camara.com', 1, NULL, '2020-12-12 06:35:40', '2020-12-12 06:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `created_at`, `updated_at`) VALUES
(2, 'AL', 'Albania', NULL, NULL),
(3, 'DZ', 'Algeria', NULL, NULL),
(4, 'DS', 'American Samoa', NULL, NULL),
(5, 'AD', 'Andorra', NULL, NULL),
(6, 'AO', 'Angola', NULL, NULL),
(7, 'AI', 'Anguilla', NULL, NULL),
(8, 'AQ', 'Antarctica', NULL, NULL),
(9, 'AG', 'Antigua and Barbuda', NULL, NULL),
(10, 'AR', 'Argentina', NULL, NULL),
(11, 'AM', 'Armenia', NULL, NULL),
(12, 'AW', 'Aruba', NULL, NULL),
(13, 'AU', 'Australia', NULL, NULL),
(14, 'AT', 'Austria', NULL, NULL),
(15, 'AZ', 'Azerbaijan', NULL, NULL),
(16, 'BS', 'Bahamas', NULL, NULL),
(17, 'BH', 'Bahrain', NULL, NULL),
(18, 'BD', 'Bangladesh', NULL, NULL),
(19, 'BB', 'Barbados', NULL, NULL),
(20, 'BY', 'Belarus', NULL, NULL),
(21, 'BE', 'Belgium', NULL, NULL),
(22, 'BZ', 'Belize', NULL, NULL),
(23, 'BJ', 'Benin', NULL, NULL),
(24, 'BM', 'Bermuda', NULL, NULL),
(25, 'BT', 'Bhutan', NULL, NULL),
(26, 'BO', 'Bolivia', NULL, NULL),
(27, 'BA', 'Bosnia and Herzegovina', NULL, NULL),
(28, 'BW', 'Botswana', NULL, NULL),
(29, 'BV', 'Bouvet Island', NULL, NULL),
(30, 'BR', 'Brazil', NULL, NULL),
(31, 'IO', 'British Indian Ocean Territory', NULL, NULL),
(32, 'BN', 'Brunei Darussalam', NULL, NULL),
(33, 'BG', 'Bulgaria', NULL, NULL),
(34, 'BF', 'Burkina Faso', NULL, NULL),
(35, 'BI', 'Burundi', NULL, NULL),
(36, 'KH', 'Cambodia', NULL, NULL),
(37, 'CM', 'Cameroon', NULL, NULL),
(38, 'CA', 'Canada', NULL, NULL),
(39, 'CV', 'Cape Verde', NULL, NULL),
(40, 'KY', 'Cayman Islands', NULL, NULL),
(41, 'CF', 'Central African Republic', NULL, NULL),
(42, 'TD', 'Chad', NULL, NULL),
(43, 'CL', 'Chile', NULL, NULL),
(44, 'CN', 'China', NULL, NULL),
(45, 'CX', 'Christmas Island', NULL, NULL),
(46, 'CC', 'Cocos (Keeling) Islands', NULL, NULL),
(47, 'CO', 'Colombia', NULL, NULL),
(48, 'KM', 'Comoros', NULL, NULL),
(49, 'CG', 'Congo', NULL, NULL),
(50, 'CK', 'Cook Islands', NULL, NULL),
(51, 'CR', 'Costa Rica', NULL, NULL),
(52, 'AF', 'Afghanistan', NULL, NULL),
(53, 'AL', 'Albania', NULL, NULL),
(54, 'DZ', 'Algeria', NULL, NULL),
(55, 'DS', 'American Samoa', NULL, NULL),
(56, 'AD', 'Andorra', NULL, NULL),
(57, 'AO', 'Angola', NULL, NULL),
(58, 'AI', 'Anguilla', NULL, NULL),
(59, 'AQ', 'Antarctica', NULL, NULL),
(60, 'AG', 'Antigua and Barbuda', NULL, NULL),
(61, 'AR', 'Argentina', NULL, NULL),
(62, 'AM', 'Armenia', NULL, NULL),
(63, 'AW', 'Aruba', NULL, NULL),
(64, 'AU', 'Australia', NULL, NULL),
(65, 'AT', 'Austria', NULL, NULL),
(66, 'AZ', 'Azerbaijan', NULL, NULL),
(67, 'BS', 'Bahamas', NULL, NULL),
(68, 'BH', 'Bahrain', NULL, NULL),
(69, 'BD', 'Bangladesh', NULL, NULL),
(70, 'BB', 'Barbados', NULL, NULL),
(71, 'BY', 'Belarus', NULL, NULL),
(72, 'BE', 'Belgium', NULL, NULL),
(73, 'BZ', 'Belize', NULL, NULL),
(74, 'BJ', 'Benin', NULL, NULL),
(75, 'BM', 'Bermuda', NULL, NULL),
(76, 'BT', 'Bhutan', NULL, NULL),
(77, 'BO', 'Bolivia', NULL, NULL),
(78, 'BA', 'Bosnia and Herzegovina', NULL, NULL),
(79, 'BW', 'Botswana', NULL, NULL),
(80, 'BV', 'Bouvet Island', NULL, NULL),
(81, 'BR', 'Brazil', NULL, NULL),
(82, 'IO', 'British Indian Ocean Territory', NULL, NULL),
(83, 'BN', 'Brunei Darussalam', NULL, NULL),
(84, 'BG', 'Bulgaria', NULL, NULL),
(85, 'BF', 'Burkina Faso', NULL, NULL),
(86, 'BI', 'Burundi', NULL, NULL),
(87, 'KH', 'Cambodia', NULL, NULL),
(88, 'CM', 'Cameroon', NULL, NULL),
(89, 'CA', 'Canada', NULL, NULL),
(90, 'CV', 'Cape Verde', NULL, NULL),
(91, 'KY', 'Cayman Islands', NULL, NULL),
(92, 'CF', 'Central African Republic', NULL, NULL),
(93, 'TD', 'Chad', NULL, NULL),
(94, 'CL', 'Chile', NULL, NULL),
(95, 'CN', 'China', NULL, NULL),
(96, 'CX', 'Christmas Island', NULL, NULL),
(97, 'CC', 'Cocos (Keeling) Islands', NULL, NULL),
(98, 'CO', 'Colombia', NULL, NULL),
(99, 'KM', 'Comoros', NULL, NULL),
(100, 'CG', 'Congo', NULL, NULL),
(101, 'CK', 'Cook Islands', NULL, NULL),
(102, 'CR', 'Costa Rica', NULL, NULL),
(103, 'HR', 'Croatia (Hrvatska)', NULL, NULL),
(104, 'CU', 'Cuba', NULL, NULL),
(105, 'CY', 'Cyprus', NULL, NULL),
(106, 'CZ', 'Czech Republic', NULL, NULL),
(107, 'DK', 'Denmark', NULL, NULL),
(108, 'DJ', 'Djibouti', NULL, NULL),
(109, 'DM', 'Dominica', NULL, NULL),
(110, 'DO', 'Dominican Republic', NULL, NULL),
(111, 'TP', 'East Timor', NULL, NULL),
(112, 'EC', 'Ecuador', NULL, NULL),
(113, 'EG', 'Egypt', NULL, NULL),
(114, 'SV', 'El Salvador', NULL, NULL),
(115, 'GQ', 'Equatorial Guinea', NULL, NULL),
(116, 'ER', 'Eritrea', NULL, NULL),
(117, 'EE', 'Estonia', NULL, NULL),
(118, 'ET', 'Ethiopia', NULL, NULL),
(119, 'FK', 'Falkland Islands (Malvinas)', NULL, NULL),
(120, 'FO', 'Faroe Islands', NULL, NULL),
(121, 'FJ', 'Fiji', NULL, NULL),
(122, 'FI', 'Finland', NULL, NULL),
(123, 'FR', 'France', NULL, NULL),
(124, 'FX', 'France, Metropolitan', NULL, NULL),
(125, 'GF', 'French Guiana', NULL, NULL),
(126, 'PF', 'French Polynesia', NULL, NULL),
(127, 'TF', 'French Southern Territories', NULL, NULL),
(128, 'GA', 'Gabon', NULL, NULL),
(129, 'GM', 'Gambia', NULL, NULL),
(130, 'GE', 'Georgia', NULL, NULL),
(131, 'DE', 'Germany', NULL, NULL),
(132, 'GH', 'Ghana', NULL, NULL),
(133, 'GI', 'Gibraltar', NULL, NULL),
(134, 'GK', 'Guernsey', NULL, NULL),
(135, 'GR', 'Greece', NULL, NULL),
(136, 'GL', 'Greenland', NULL, NULL),
(137, 'GD', 'Grenada', NULL, NULL),
(138, 'GP', 'Guadeloupe', NULL, NULL),
(139, 'GU', 'Guam', NULL, NULL),
(140, 'GT', 'Guatemala', NULL, NULL),
(141, 'GN', 'Guinea', NULL, NULL),
(142, 'GW', 'Guinea-Bissau', NULL, NULL),
(143, 'GY', 'Guyana', NULL, NULL),
(144, 'HT', 'Haiti', NULL, NULL),
(145, 'HM', 'Heard and Mc Donald Islands', NULL, NULL),
(146, 'HN', 'Honduras', NULL, NULL),
(147, 'HK', 'Hong Kong', NULL, NULL),
(148, 'HU', 'Hungary', NULL, NULL),
(149, 'IS', 'Iceland', NULL, NULL),
(150, 'IN', 'India', NULL, NULL),
(151, 'IM', 'Isle of Man', NULL, NULL),
(152, 'ID', 'Indonesia', NULL, NULL),
(153, 'IR', 'Iran (Islamic Republic of)', NULL, NULL),
(154, 'IQ', 'Iraq', NULL, NULL),
(155, 'IE', 'Ireland', NULL, NULL),
(156, 'IL', 'Israel', NULL, NULL),
(157, 'IT', 'Italy', NULL, NULL),
(158, 'CI', 'Ivory Coast', NULL, NULL),
(159, 'JE', 'Jersey', NULL, NULL),
(160, 'JM', 'Jamaica', NULL, NULL),
(161, 'JP', 'Japan', NULL, NULL),
(162, 'JO', 'Jordan', NULL, NULL),
(163, 'KZ', 'Kazakhstan', NULL, NULL),
(164, 'KE', 'Kenya', NULL, NULL),
(165, 'KI', 'Kiribati', NULL, NULL),
(166, 'KP', 'Korea, Democratic People\'s Republic of', NULL, NULL),
(167, 'KR', 'Korea, Republic of', NULL, NULL),
(168, 'XK', 'Kosovo', NULL, NULL),
(169, 'KW', 'Kuwait', NULL, NULL),
(170, 'KG', 'Kyrgyzstan', NULL, NULL),
(171, 'LA', 'Lao People\'s Democratic Republic', NULL, NULL),
(172, 'LV', 'Latvia', NULL, NULL),
(173, 'LB', 'Lebanon', NULL, NULL),
(174, 'LS', 'Lesotho', NULL, NULL),
(175, 'LR', 'Liberia', NULL, NULL),
(176, 'LY', 'Libyan Arab Jamahiriya', NULL, NULL),
(177, 'LI', 'Liechtenstein', NULL, NULL),
(178, 'LT', 'Lithuania', NULL, NULL),
(179, 'LU', 'Luxembourg', NULL, NULL),
(180, 'MO', 'Macau', NULL, NULL),
(181, 'MK', 'Macedonia', NULL, NULL),
(182, 'MG', 'Madagascar', NULL, NULL),
(183, 'MW', 'Malawi', NULL, NULL),
(184, 'MY', 'Malaysia', NULL, NULL),
(185, 'MV', 'Maldives', NULL, NULL),
(186, 'ML', 'Mali', NULL, NULL),
(187, 'MT', 'Malta', NULL, NULL),
(188, 'MH', 'Marshall Islands', NULL, NULL),
(189, 'MQ', 'Martinique', NULL, NULL),
(190, 'MR', 'Mauritania', NULL, NULL),
(191, 'MU', 'Mauritius', NULL, NULL),
(192, 'TY', 'Mayotte', NULL, NULL),
(193, 'MX', 'Mexico', NULL, NULL),
(194, 'FM', 'Micronesia, Federated States of', NULL, NULL),
(195, 'MD', 'Moldova, Republic of', NULL, NULL),
(196, 'MC', 'Monaco', NULL, NULL),
(197, 'MN', 'Mongolia', NULL, NULL),
(198, 'ME', 'Montenegro', NULL, NULL),
(199, 'MS', 'Montserrat', NULL, NULL),
(200, 'MA', 'Morocco', NULL, NULL),
(201, 'MZ', 'Mozambique', NULL, NULL),
(202, 'MM', 'Myanmar', NULL, NULL),
(203, 'NA', 'Namibia', NULL, NULL),
(204, 'NR', 'Nauru', NULL, NULL),
(205, 'NP', 'Nepal', NULL, NULL),
(206, 'NL', 'Netherlands', NULL, NULL),
(207, 'AN', 'Netherlands Antilles', NULL, NULL),
(208, 'NC', 'New Caledonia', NULL, NULL),
(209, 'NZ', 'New Zealand', NULL, NULL),
(210, 'NI', 'Nicaragua', NULL, NULL),
(211, 'NE', 'Niger', NULL, NULL),
(212, 'NG', 'Nigeria', NULL, NULL),
(213, 'NU', 'Niue', NULL, NULL),
(214, 'NF', 'Norfolk Island', NULL, NULL),
(215, 'MP', 'Northern Mariana Islands', NULL, NULL),
(216, 'NO', 'Norway', NULL, NULL),
(217, 'OM', 'Oman', NULL, NULL),
(218, 'PK', 'Pakistan', NULL, NULL),
(219, 'PW', 'Palau', NULL, NULL),
(220, 'PS', 'Palestine', NULL, NULL),
(221, 'PA', 'Panama', NULL, NULL),
(222, 'PG', 'Papua New Guinea', NULL, NULL),
(223, 'PY', 'Paraguay', NULL, NULL),
(224, 'PE', 'Peru', NULL, NULL),
(225, 'PH', 'Philippines', NULL, NULL),
(226, 'PN', 'Pitcairn', NULL, NULL),
(227, 'PL', 'Poland', NULL, NULL),
(228, 'PT', 'Portugal', NULL, NULL),
(229, 'PR', 'Puerto Rico', NULL, NULL),
(230, 'QA', 'Qatar', NULL, NULL),
(231, 'RE', 'Reunion', NULL, NULL),
(232, 'RO', 'Romania', NULL, NULL),
(233, 'RU', 'Russian Federation', NULL, NULL),
(234, 'RW', 'Rwanda', NULL, NULL),
(235, 'KN', 'Saint Kitts and Nevis', NULL, NULL),
(236, 'LC', 'Saint Lucia', NULL, NULL),
(237, 'VC', 'Saint Vincent and the Grenadines', NULL, NULL),
(238, 'WS', 'Samoa', NULL, NULL),
(239, 'SM', 'San Marino', NULL, NULL),
(240, 'ST', 'Sao Tome and Principe', NULL, NULL),
(241, 'SA', 'Saudi Arabia', NULL, NULL),
(242, 'SN', 'Senegal', NULL, NULL),
(243, 'RS', 'Serbia', NULL, NULL),
(244, 'SC', 'Seychelles', NULL, NULL),
(245, 'SL', 'Sierra Leone', NULL, NULL),
(246, 'SG', 'Singapore', NULL, NULL),
(247, 'SK', 'Slovakia', NULL, NULL),
(248, 'SI', 'Slovenia', NULL, NULL),
(249, 'SB', 'Solomon Islands', NULL, NULL),
(250, 'SO', 'Somalia', NULL, NULL),
(251, 'ZA', 'South Africa', NULL, NULL),
(252, 'GS', 'South Georgia South Sandwich Islands', NULL, NULL),
(253, 'SS', 'South Sudan', NULL, NULL),
(254, 'ES', 'Spain', NULL, NULL),
(255, 'LK', 'Sri Lanka', NULL, NULL),
(256, 'SH', 'St. Helena', NULL, NULL),
(257, 'PM', 'St. Pierre and Miquelon', NULL, NULL),
(258, 'SD', 'Sudan', NULL, NULL),
(259, 'SR', 'Suriname', NULL, NULL),
(260, 'SJ', 'Svalbard and Jan Mayen Islands', NULL, NULL),
(261, 'SZ', 'Swaziland', NULL, NULL),
(262, 'SE', 'Sweden', NULL, NULL),
(263, 'CH', 'Switzerland', NULL, NULL),
(264, 'SY', 'Syrian Arab Republic', NULL, NULL),
(265, 'TW', 'Taiwan', NULL, NULL),
(266, 'TJ', 'Tajikistan', NULL, NULL),
(267, 'TZ', 'Tanzania, United Republic of', NULL, NULL),
(268, 'TH', 'Thailand', NULL, NULL),
(269, 'TG', 'Togo', NULL, NULL),
(270, 'TK', 'Tokelau', NULL, NULL),
(271, 'TO', 'Tonga', NULL, NULL),
(272, 'TT', 'Trinidad and Tobago', NULL, NULL),
(273, 'TN', 'Tunisia', NULL, NULL),
(274, 'TR', 'Turkey', NULL, NULL),
(275, 'TM', 'Turkmenistan', NULL, NULL),
(276, 'TC', 'Turks and Caicos Islands', NULL, NULL),
(277, 'TV', 'Tuvalu', NULL, NULL),
(278, 'UG', 'Uganda', NULL, NULL),
(279, 'UA', 'Ukraine', NULL, NULL),
(280, 'AE', 'United Arab Emirates', NULL, NULL),
(281, 'GB', 'United Kingdom', NULL, NULL),
(282, 'US', 'United States', NULL, NULL),
(283, 'UM', 'United States minor outlying islands', NULL, NULL),
(284, 'UY', 'Uruguay', NULL, NULL),
(285, 'UZ', 'Uzbekistan', NULL, NULL),
(286, 'VU', 'Vanuatu', NULL, NULL),
(287, 'VA', 'Vatican City State', NULL, NULL),
(288, 'VE', 'Venezuela', NULL, NULL),
(289, 'VN', 'Vietnam', NULL, NULL),
(290, 'VG', 'Virgin Islands (British)', NULL, NULL),
(291, 'VI', 'Virgin Islands (U.S.)', NULL, NULL),
(292, 'WF', 'Wallis and Futuna Islands', NULL, NULL),
(293, 'EH', 'Western Sahara', NULL, NULL),
(294, 'YE', 'Yemen', NULL, NULL),
(295, 'ZR', 'Zaire', NULL, NULL),
(296, 'ZM', 'Zambia', NULL, NULL),
(297, 'ZW', 'Zimbabwe', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `amount_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `amount`, `amount_type`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Coupon001', 10, 'Percentage', '2019-12-06', 1, '2018-12-05 20:19:15', '2018-12-05 20:19:15');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_address`
--

CREATE TABLE `delivery_address` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(11) NOT NULL,
  `users_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_address`
--

INSERT INTO `delivery_address` (`id`, `users_id`, `users_email`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `created_at`, `updated_at`) VALUES
(2, 4, 'weshare@gmail.com', 'weshare', 'address', 'city', 'state', 'Cambodia', 'pincode', 'mobile', NULL, NULL),
(3, 1, 'demo@gmail.com', 'WeShare', '123 Street', 'Phnom Penh', 'PP', 'Cambodia', '12252', '010313234', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2014_10_12_000000_create_users_table', 2),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2018_10_20_040609_create_categories_table', 3),
(9, '2018_10_24_075802_create_products_table', 4),
(10, '2018_11_08_024109_create_product_att_table', 5),
(11, '2018_11_20_055123_create_tblgallery_table', 6),
(12, '2018_11_26_070031_create_cart_table', 7),
(13, '2018_11_28_072535_create_coupons_table', 8),
(15, '2018_12_01_042342_create_countries_table', 10),
(19, '2018_12_03_043804_add_more_fields_to_users_table', 14),
(17, '2018_12_03_093548_create_delivery_address_table', 12),
(18, '2018_12_05_024718_create_orders_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(11) NOT NULL,
  `users_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_charges` double(8,2) NOT NULL,
  `coupon_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_amount` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grand_total` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `users_id`, `users_email`, `name`, `address`, `city`, `state`, `pincode`, `country`, `mobile`, `shipping_charges`, `coupon_code`, `coupon_amount`, `order_status`, `payment_method`, `grand_total`, `created_at`, `updated_at`) VALUES
(7, 1, 'demo@gmail.com', 'WeShare', '123 Street', 'Phnom Penh', 'PP', '12252', 'Cambodia', '010313234', 0.00, 'NO Coupon', '0', 'success', 'Paypal', '70', '2018-12-06 18:20:18', '2018-12-06 18:20:18'),
(6, 4, 'weshare@gmail.com', 'weshare', 'address', 'city', 'state', 'pincode', 'Cambodia', 'mobile', 0.00, 'Coupon001', '2', 'success', 'Paypal', '18', '2018-12-06 01:45:09', '2018-12-06 01:45:09');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `categories_id` int(11) NOT NULL,
  `p_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `categories_id`, `p_name`, `p_code`, `p_color`, `description`, `price`, `image`, `created_at`, `updated_at`) VALUES
(38, 25, 'LTS LTN8716K-P16 16 Channel 4K Network Video Recorder - No HDD included', '006', 'Black', '<div>Key features:</div><div>16 Channel Network Video Recorder</div><div>No HDD included</div><div>Platinum Series</div><div>Support Live View,</div><div>Playback up to 4K(8MP) IP Camera</div><div>160MB Bandwidth</div><div>1U</div><div>16 Built-in PoE</div><div>4K (3840x2160) HDMI Video Output</div><div>2 SATA up to 12TB</div><div>H.265/H.264/H.264+/MPEG4</div>', 608.00, '1607782591-lts-ltn8716k-p16-16-channel-4k-network-video-recorder-no-hdd-included.png', '2020-12-12 07:16:31', '2020-12-12 07:16:31'),
(29, 12, 'LTS CMIP9382NW-28M 8MP IR H.265 Outdoor Bullet IP Security Camera', '002', 'White', '<div>Key features:</div><div>8MP /4K High Definition</div><div>Up to 3840x2160@15fps</div><div>2.8mm Fixed Lens</div><div>Matrix IR 2.0, IR Range up to 165 feet</div><div>H.265, H.265+, H.264, H.264+ Ready</div><div>True WDR 120dB</div><div>IP67 Weatherproof</div><div>MicroSD Slot up to 128GB</div><div>DC 12V, PoE</div><div>Dimensions:Φ4.13″ x 11.80″ (Φ105 x 299.7 mm)</div><div>ONVIF</div>', 335.00, '1607778315-2018-toyota-prius.png', '2018-12-05 19:38:44', '2020-12-12 06:25:22'),
(39, 28, 'LaCie 2big RAID STHJ4000800', '007', 'Black', '<div>Key Features: Hard drive array</div><div>4 TB</div><div>2 bays</div><div>HDD 2 TB x 2</div><div>USB 3.1 Gen 2 (external)</div><div>with 5 years Rescue Data Recovery Service Plan</div>', 260.00, '1607782860-lacie-2big-raid-sthj4000800.png', '2020-12-12 07:21:00', '2020-12-12 07:21:00'),
(32, 25, 'LTS LTN8708K-HT 8 Channel Hybrid Network Video Recorder - No HDD included', '005', 'White', '<div>Key features:</div><div>8 Channel Hybrid Network Video Recorder</div><div>No HDD included</div><div>Support 4K/8MP HD-TVI 4.0 Cameras</div><div>1x HDMI, 1x VGA</div><div>Support 6MP IP Cameras</div><div>4K (3840x2160) HDMI Video Output</div><div>H.265+/H.265/H.264 Zip+/H.264</div><div>Support 8CH HD-TVI and 4CH IP Cameras</div><div>2x SATA ports, up to 8TB each HDD</div><div>1U chassis</div>', 354.00, '1607780439-lts-ltn8708k-ht-8-channel-hybrid-network-video-recorder-no-hdd-included.png', '2018-12-05 19:50:07', '2020-12-12 06:40:39'),
(34, 12, 'LTS CMIP9362W-M 6MP IR H.265+ Outdoor Bullet IP Security Camera', '004', 'White', '<div>Key features of LTS CMIP9362W-M</div><div>6MP High Definition</div><div>3072x2048@20fps</div><div>4mm Fixed Lens</div><div>Matrix IR 2.0, IR Range up to 100 feet</div><div>H.265, H.265+, H.264, H.264+ Ready</div><div>True WDR 120dB</div><div>Weatherproof IP67</div><div>MicroSD Slot up to 128GB</div><div>DC 12V, PoE</div>', 262.00, '1607779903-lts-cmip9362w-m-6mp-ir-h265-outdoor-bullet-ip-security-camera.png', '2018-12-05 20:02:12', '2020-12-12 06:31:44'),
(35, 12, 'LTS CMIP7863W-SZ 6MP IR H.265 Outdoor Dome IP Security Camera', '003', 'White', '<div>Key features of LTS CMIP7863W-SZ</div><div>6MP High Definition</div><div>Up to 3072x2048@20fps</div><div>2.8-12mm Varifocal Motorized Lens with Smart Focus</div><div>0.018 Lux @ F1.6</div><div>Matrix IR 2.0, IR Range up to 100 feet</div><div>H.265, H.265+, H.264, H.264+ Ready</div><div>True WDR 120dB</div><div>Weatherproof IP67</div><div>Vandal Proof IK10</div><div>MicroSD Slot up to 128GB</div><div>Audio I/O, Alarm I/O</div><div>DC 12V, PoE</div><div>Built-in Junction Box</div><div>Dimensions:Φ 6 .04″ x 5.24″(Φ 153.4x 133.1 mm)</div><div>ONVIF</div>', 450.00, '1607779449-lts-cmip7863w-sz-6mp-ir-h265-outdoor-dome-ip-security-camera.png', '2018-12-05 20:04:54', '2020-12-12 06:24:09'),
(37, 12, 'LTS CMIP7362W-28M 6MP IR H.265 Outdoor Dome IP Security Camera', '002', 'White', '<div>Key features:</div><div>6MP High Definition</div><div>3072x2048@20fps</div><div>2.8mm Fixed Lens</div><div>Matrix IR 2.0, IR Range up to 100 feet</div><div>H.265, H.265+, H.264, H.264+ MJPEG</div><div>True WDR 120dB</div><div>IP67 Weatherproof</div><div>IK10 Vandal Proof</div><div>MicroSD Slot up to 128GB</div><div>DC 12V, PoE</div><div>Dimensions:4.4″ x 3.2″ (Φ 111x 82.4 mm)</div><div>ONVIF</div>', 237.00, '1607782445-lts-cmip7362w-28m-6mp-ir-h265-outdoor-dome-ip-security-camera.png', '2020-12-12 07:14:06', '2020-12-12 07:14:06'),
(40, 28, 'LaCie 2big Dock Thunderbolt 3', '008', 'Gray', '<div>Hard drive array</div><div>8 TB</div><div>2 bays (SATA-600)</div><div>HDD 4 TB x 2</div><div>USB 3.1, Thunderbolt 3 (external)</div>', 785.00, '1607783058-lacie-2big-dock-thunderbolt-3.png', '2020-12-12 07:24:18', '2020-12-12 07:24:18'),
(41, 28, 'LaCie 2big Dock Thunderbolt 3', '009', 'Gray', '<div>Hard drive array</div><div>16 TB</div><div>2 bays (SATA-600)</div><div>HDD 8 TB x 2</div><div>USB 3.1, Thunderbolt 3 (external)</div>', 1110.00, '1607783206-lacie-2big-dock-thunderbolt-3.png', '2020-12-12 07:26:46', '2020-12-12 07:26:46'),
(42, 28, 'LaCie 6big Thunderbolt 3 STFK24000400', '010', 'Gray', '<div>Hard drive array</div><div>24 TB</div><div>6 bays (SATA)</div><div>HDD 4 TB x 6</div><div>USB 3.1, Thunderbolt 3 (external)</div>', 2605.00, '1607783371-lacie-6big-thunderbolt-3-stfk24000400.png', '2020-12-12 07:29:31', '2020-12-12 07:29:31'),
(43, 28, 'LaCie 1big Dock SSD Pro STHW4000800', '011', 'Black', '<div>Quad-core 4-bay NAS with AES-NI</div><div>support, with over 1,099 MB/s reading</div><div>and 401 MB/s writing performance</div><div>• PCIe slot for optional 10GbE add-in</div><div>network interface card</div><div>• Four 1GbE (RJ-45) ports with failover</div><div>and Link Aggregation support</div><div>• 2GB DDR3 memory, expandable up to</div><div>16GB</div><div>• Scale up to 8 drives with RX418</div><div>expansion unit2</div><div>• Redundant power supplies ensure</div><div>service uptime (RS818RP+ only)</div>', 1016.00, '1607783456-lacie-1big-dock-ssd-pro-sthw4000800.png', '2020-12-12 07:30:56', '2020-12-12 07:30:56'),
(44, 30, 'Rack Station RS1219+', '012', 'Black', '<div>CPU Model&nbsp; Intel Atom C2538</div><div>CPU Architecture&nbsp; 64-bit</div><div>CPU Frequency&nbsp; 4-core 2.4 GHz</div><div>System Memory&nbsp; 2 GB DDR3L non-ECC SODIMM</div><div>Memory Module Pre-installed&nbsp; 2 GB (2 GB x 1)</div><div>Total Memory Slots&nbsp; 2</div><div>Maximum Memory Capacity&nbsp; 16 GB (8 GB x 2)</div><div>Drive Bays&nbsp; 8</div><div>Maximum Drive Bays with Expansion Unit&nbsp; 12 (RX418 x 1)</div><div>Compatible Drive Type* (See all supported drives)&nbsp;&nbsp;</div><div>3.5\" SATA HDD</div><div>2.5\" SATA HDD</div><div>2.5\" SATA SSD</div><div>Maximum Single Volume Size*&nbsp; 108 TB</div><div>Hot Swappable Drive&nbsp;&nbsp;</div><div>RJ-45 1GbE LAN Port&nbsp; 4 (with Link Aggregation / Failover support)</div><div>USB 3.0 Port&nbsp; 2</div><div>eSATA Port&nbsp; 1</div><div>Form Factor (RU)&nbsp; 2U</div><div>Size (Height x Width x Depth)&nbsp; 88 mm x 481.9 mm x 306.6 mm</div><div>Weight&nbsp; 6.9 kg</div><div>Rack Installation Support*&nbsp;&nbsp;</div><div>2-post 19\" rack (direct mounting)</div><div>4-post 19\" rack (Synology Rail Kit - RKS1317)</div><div>Notes&nbsp; The rail kit is sold separately</div>', 1177.00, '1607783679-rack-station-rs1219.jpg', '2020-12-12 07:34:39', '2020-12-12 07:34:39'),
(45, 12, 'Synology DS1019+', '013', 'Black', '<div>Quad-core CPU with AES-NI encryption engine, delivering reading and writing throughput at over 225 MB/s even when data are encrypted. Loaded with two 4GB DDR3L memory module, providing 8GB memory capacity in total. Power Supply Unit / Adapter - 120 W. AC Input Power Voltage - 100 V to 240 V AC.Power Frequency - 50/60 Hz, Single Phase.Built-in two M.2 NVMe SSD slots for system cache support; Dual 1GbE (RJ-45) ports with failover and Link Aggregation support.</div><div>•&nbsp; Dual-channel H.264/H.265 4K video transcoding on the fly</div><div>•&nbsp; Scalable up to 10 drives with one expansion unit DX517 connected</div><div>•&nbsp; Connectivity technology: Bluetooth</div>', 802.00, '1607786583-synology-ds1019.png', '2020-12-12 07:46:30', '2020-12-12 08:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `product_att`
--

CREATE TABLE `product_att` (
  `id` int(10) UNSIGNED NOT NULL,
  `products_id` int(11) NOT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_att`
--

INSERT INTO `product_att` (`id`, `products_id`, `sku`, `size`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(14, 34, 'SKU-Lenovo X1', '15 inch', 10.00, 2, '2018-12-05 20:08:43', '2018-12-05 20:08:43'),
(13, 35, 'SKU-Red', 'S', 2.00, 5, '2018-12-05 20:08:08', '2018-12-05 20:08:08'),
(12, 35, 'SKU-White', 'L', 6.00, 2, '2018-12-05 20:07:42', '2018-12-05 20:07:42'),
(11, 35, 'SKU-Black', 'M', 5.00, 10, '2018-12-05 20:07:11', '2018-12-05 20:07:11'),
(15, 34, 'SKU-Carbon', '14 inch', 4.00, 5, '2018-12-05 20:09:05', '2018-12-05 20:09:05'),
(16, 33, 'SKU-Haan1', '25', 12.00, 3, '2018-12-05 20:09:45', '2018-12-05 20:09:45'),
(17, 33, 'SKU-Haan2', '22', 10.00, 1, '2018-12-05 20:09:58', '2018-12-05 20:09:58'),
(18, 33, 'SKU-Haan3', '19', 2.00, 3, '2018-12-05 20:10:16', '2018-12-05 20:10:16'),
(19, 32, 'SKU-Vionic1', '20', 10.00, 5, '2018-12-05 20:11:02', '2018-12-05 20:11:02'),
(20, 32, 'SKU-Vionic2', '20', 15.00, 4, '2018-12-05 20:11:24', '2018-12-05 20:11:24'),
(21, 32, 'SKU-Vionic3', '30', 20.00, 1, '2018-12-05 20:11:38', '2018-12-05 20:11:38'),
(22, 31, 'SKU-House1', '5*20', 25.00, 4, '2018-12-05 20:12:13', '2018-12-05 20:12:13'),
(23, 31, 'SKU-House2', '10*10', 20.00, 2, '2018-12-05 20:12:30', '2018-12-05 20:12:30'),
(24, 31, 'SKU-House3', '20*20', 20.00, 5, '2018-12-05 20:12:46', '2018-12-05 20:12:46'),
(25, 30, 'SKU-Link House1', 'Small', 10.00, 5, '2018-12-05 20:13:06', '2018-12-05 20:13:06'),
(26, 30, 'SKU-House2', 'Medium', 15.00, 23, '2018-12-05 20:13:23', '2018-12-05 20:13:23'),
(27, 30, 'SKU-House3', 'Large', 5.00, 2, '2018-12-05 20:14:55', '2018-12-05 20:14:55'),
(28, 29, 'SKU-Prius1', 'One Size', 12.00, 2, '2018-12-05 20:15:43', '2018-12-05 20:15:43'),
(29, 28, 'SKU-Lexus Red', 'Size Red', 12.00, 12, '2018-12-05 20:16:28', '2018-12-05 20:16:28'),
(30, 28, 'SKU-Lexus2', 'Size Black', 11.00, 22, '2018-12-05 20:16:48', '2018-12-05 20:16:48'),
(31, 28, 'SKU-Lexus3', 'Size White', 12.00, 2, '2018-12-05 20:17:02', '2018-12-05 20:17:02'),
(32, 27, 'SKU-Hilander', 'Size Black', 50.00, 10, '2018-12-05 20:17:35', '2018-12-05 20:17:35'),
(33, 27, 'SKU-Hilander1', 'Size White', 20.00, 10, '2018-12-05 20:17:46', '2018-12-05 20:17:46'),
(34, 27, 'SKU-Hilande3', 'Size Red', 20.00, 10, '2018-12-05 20:18:01', '2018-12-05 20:18:01');

-- --------------------------------------------------------

--
-- Table structure for table `tblgallery`
--

CREATE TABLE `tblgallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `products_id` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblgallery`
--

INSERT INTO `tblgallery` (`id`, `products_id`, `image`, `created_at`, `updated_at`) VALUES
(8, 27, '7664271544063472.jpg', '2018-12-05 19:31:12', '2018-12-05 19:31:12'),
(9, 27, '6768551544063472.jpg', '2018-12-05 19:31:13', '2018-12-05 19:31:13'),
(10, 27, '4131281544063473.jpg', '2018-12-05 19:31:13', '2018-12-05 19:31:13'),
(11, 28, '6720891544063734.jpg', '2018-12-05 19:35:34', '2018-12-05 19:35:34'),
(12, 28, '4686631544063734.jpg', '2018-12-05 19:35:34', '2018-12-05 19:35:34'),
(13, 28, '5960611544063759.jpeg', '2018-12-05 19:35:59', '2018-12-05 19:35:59'),
(14, 29, '5146071544063935.JPG', '2018-12-05 19:38:55', '2018-12-05 19:38:55'),
(15, 29, '762811544063935.jpg', '2018-12-05 19:38:55', '2018-12-05 19:38:55'),
(16, 29, '3716041544063935.jpg', '2018-12-05 19:38:56', '2018-12-05 19:38:56'),
(17, 30, '6832831544064156.jpg', '2018-12-05 19:42:37', '2018-12-05 19:42:37'),
(18, 30, '1655391544064157.jpg', '2018-12-05 19:42:37', '2018-12-05 19:42:37'),
(19, 30, '4693601544064157.jpg', '2018-12-05 19:42:37', '2018-12-05 19:42:37'),
(20, 31, '9233341544064441.jpg', '2018-12-05 19:47:21', '2018-12-05 19:47:21'),
(21, 31, '8167501544064441.jpg', '2018-12-05 19:47:22', '2018-12-05 19:47:22'),
(22, 31, '3887071544064442.jpg', '2018-12-05 19:47:22', '2018-12-05 19:47:22'),
(23, 32, '3998691544064618.jpg', '2018-12-05 19:50:18', '2018-12-05 19:50:18'),
(24, 32, '1159141544064618.jpg', '2018-12-05 19:50:18', '2018-12-05 19:50:18'),
(25, 32, '2035101544064618.jpg', '2018-12-05 19:50:18', '2018-12-05 19:50:18'),
(26, 33, '2128501544064917.jpg', '2018-12-05 19:55:17', '2018-12-05 19:55:17'),
(27, 33, '5649911544064917.jpg', '2018-12-05 19:55:17', '2018-12-05 19:55:17'),
(28, 33, '3704141544064917.jpg', '2018-12-05 19:55:17', '2018-12-05 19:55:17'),
(29, 34, '3899431544065346.JPG', '2018-12-05 20:02:26', '2018-12-05 20:02:26'),
(30, 34, '119131544065346.jpg', '2018-12-05 20:02:27', '2018-12-05 20:02:27'),
(31, 34, '6905491544065347.jpg', '2018-12-05 20:02:27', '2018-12-05 20:02:27'),
(32, 35, '981591544065510.jpeg', '2018-12-05 20:05:10', '2018-12-05 20:05:10'),
(33, 35, '5320811544065510.jpg', '2018-12-05 20:05:11', '2018-12-05 20:05:11'),
(34, 35, '1153181544065511.jpg', '2018-12-05 20:05:11', '2018-12-05 20:05:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(4) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `admin`, `remember_token`, `created_at`, `updated_at`, `address`, `city`, `state`, `country`, `pincode`, `mobile`) VALUES
(1, 'WeShare', 'demo@gmail.com', NULL, '$2y$10$m9fNpTgwyBVqqVfsJ9bXUensvx5iqlYhzqmL3khhSpKpgqNQnW0t2', 1, 'eXRJYaZCo6qXgGfTHiOFvShGWta2eLgaIhcBVfa9ppQnN5SFFH7yo516DQs1', '2018-10-15 02:32:54', '2018-12-05 01:39:52', '123 Street', 'Phnom Penh', 'PP', 'Cambodia', '12252', '010313234'),
(4, 'weshare', 'weshare@gmail.com', NULL, '$2y$10$3Ccxg17LYw/.qS7ib5Xcr.T5po6AXUsnjEcEI4IHcQ0MGkcuRfO.O', NULL, 'za7FtmzYvfzBYmkQtE5tfvStl7dY3Z6uZKSpuRtBRIvlbXzM0csZEQYzjuEb', '2018-12-06 01:40:27', '2018-12-06 01:40:27', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`name`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_address`
--
ALTER TABLE `delivery_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_att`
--
ALTER TABLE `product_att`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblgallery`
--
ALTER TABLE `tblgallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=298;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `delivery_address`
--
ALTER TABLE `delivery_address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `product_att`
--
ALTER TABLE `product_att`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tblgallery`
--
ALTER TABLE `tblgallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
