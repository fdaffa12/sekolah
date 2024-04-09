-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2024 at 10:21 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `fname` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `avatar` varchar(191) NOT NULL,
  `city` varchar(191) NOT NULL,
  `cv` varchar(191) NOT NULL,
  `job_status` varchar(191) NOT NULL,
  `recruited` tinyint(1) NOT NULL,
  `job_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `time_in` time DEFAULT NULL,
  `time_out` time DEFAULT NULL,
  `timestamp_in` datetime DEFAULT NULL,
  `timestamp_out` datetime DEFAULT NULL,
  `comment` varchar(191) DEFAULT NULL,
  `date` date NOT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'present',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance_breaks`
--

CREATE TABLE `attendance_breaks` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `timestamp_break_start` datetime NOT NULL,
  `timestamp_break_end` datetime DEFAULT NULL,
  `date` date NOT NULL,
  `comment` varchar(191) DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'present',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance_corrections`
--

CREATE TABLE `attendance_corrections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(191) NOT NULL,
  `time_in` varchar(191) DEFAULT NULL,
  `time_out` varchar(191) DEFAULT NULL,
  `break_start` varchar(191) DEFAULT NULL,
  `break_end` varchar(191) DEFAULT NULL,
  `date` varchar(191) NOT NULL,
  `status` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance_summaries`
--

CREATE TABLE `attendance_summaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `first_time_in` time DEFAULT NULL,
  `last_time_out` time DEFAULT NULL,
  `first_timestamp_in` datetime DEFAULT NULL,
  `last_timestamp_out` datetime DEFAULT NULL,
  `total_time` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'present',
  `is_delay` varchar(191) NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `timing_start` time DEFAULT NULL,
  `timing_off` time DEFAULT NULL,
  `weekend` varchar(191) DEFAULT NULL,
  `address` varchar(191) NOT NULL,
  `phone_number` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `status`, `timing_start`, `timing_off`, `weekend`, `address`, `phone_number`, `created_at`, `updated_at`) VALUES
(1, 'GlowLogix', 1, '14:00:00', '22:00:00', '[\"Saturday\",\"Sunday\"]', 'Islamabad', NULL, '2024-04-04 06:09:38', '2024-04-04 06:09:38'),
(2, 'GlowLogix', 1, '09:00:00', '18:00:00', '[\"Sunday\"]', 'Gujrat', NULL, '2024-04-04 06:09:38', '2024-04-04 06:09:38');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `code` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'United States', 'US', NULL, NULL),
(2, 'Canada', 'CA', NULL, NULL),
(3, 'Afghanistan', 'AF', NULL, NULL),
(4, 'Albania', 'AL', NULL, NULL),
(5, 'Algeria', 'DZ', NULL, NULL),
(6, 'American Samoa', 'AS', NULL, NULL),
(7, 'Andorra', 'AD', NULL, NULL),
(8, 'Angola', 'AO', NULL, NULL),
(9, 'Anguilla', 'AI', NULL, NULL),
(10, 'Antarctica', 'AQ', NULL, NULL),
(11, 'Antigua and/or Barbuda', 'AG', NULL, NULL),
(12, 'Argentina', 'AR', NULL, NULL),
(13, 'Armenia', 'AM', NULL, NULL),
(14, 'Aruba', 'AW', NULL, NULL),
(15, 'Australia', 'AU', NULL, NULL),
(16, 'Austria', 'AT', NULL, NULL),
(17, 'Azerbaijan', 'AZ', NULL, NULL),
(18, 'Bahamas', 'BS', NULL, NULL),
(19, 'Bahrain', 'BH', NULL, NULL),
(20, 'Bangladesh', 'BD', NULL, NULL),
(21, 'Barbados', 'BB', NULL, NULL),
(22, 'Belarus', 'BY', NULL, NULL),
(23, 'Belgium', 'BE', NULL, NULL),
(24, 'Belize', 'BZ', NULL, NULL),
(25, 'Benin', 'BJ', NULL, NULL),
(26, 'Bermuda', 'BM', NULL, NULL),
(27, 'Bhutan', 'BT', NULL, NULL),
(28, 'Bolivia', 'BO', NULL, NULL),
(29, 'Bosnia and Herzegovina', 'BA', NULL, NULL),
(30, 'Botswana', 'BW', NULL, NULL),
(31, 'Bouvet Island', 'BV', NULL, NULL),
(32, 'Brazil', 'BR', NULL, NULL),
(33, 'British lndian Ocean Territory', 'IO', NULL, NULL),
(34, 'Brunei Darussalam', 'BN', NULL, NULL),
(35, 'Bulgaria', 'BG', NULL, NULL),
(36, 'Burkina Faso', 'BF', NULL, NULL),
(37, 'Burundi', 'BI', NULL, NULL),
(38, 'Cambodia', 'KH', NULL, NULL),
(39, 'Cameroon', 'CM', NULL, NULL),
(40, 'Cape Verde', 'CV', NULL, NULL),
(41, 'Cayman Islands', 'KY', NULL, NULL),
(42, 'Central African Republic', 'CF', NULL, NULL),
(43, 'Chad', 'TD', NULL, NULL),
(44, 'Chile', 'CL', NULL, NULL),
(45, 'China', 'CN', NULL, NULL),
(46, 'Christmas Island', 'CX', NULL, NULL),
(47, 'Cocos (Keeling) Islands', 'CC', NULL, NULL),
(48, 'Colombia', 'CO', NULL, NULL),
(49, 'Comoros', 'KM', NULL, NULL),
(50, 'Congo', 'CG', NULL, NULL),
(51, 'Cook Islands', 'CK', NULL, NULL),
(52, 'Costa Rica', 'CR', NULL, NULL),
(53, 'Croatia (Hrvatska)', 'HR', NULL, NULL),
(54, 'Cuba', 'CU', NULL, NULL),
(55, 'Cyprus', 'CY', NULL, NULL),
(56, 'Czech Republic', 'CZ', NULL, NULL),
(57, 'Democratic Republic of Congo', 'CD', NULL, NULL),
(58, 'Denmark', 'DK', NULL, NULL),
(59, 'Djibouti', 'DJ', NULL, NULL),
(60, 'Dominica', 'DM', NULL, NULL),
(61, 'Dominican Republic', 'DO', NULL, NULL),
(62, 'East Timor', 'TP', NULL, NULL),
(63, 'Ecudaor', 'EC', NULL, NULL),
(64, 'Egypt', 'EG', NULL, NULL),
(65, 'El Salvador', 'SV', NULL, NULL),
(66, 'Equatorial Guinea', 'GQ', NULL, NULL),
(67, 'Eritrea', 'ER', NULL, NULL),
(68, 'Estonia', 'EE', NULL, NULL),
(69, 'Ethiopia', 'ET', NULL, NULL),
(70, 'Falkland Islands (Malvinas)', 'FK', NULL, NULL),
(71, 'Faroe Islands', 'FO', NULL, NULL),
(72, 'Fiji', 'FJ', NULL, NULL),
(73, 'Finland', 'FI', NULL, NULL),
(74, 'France', 'FR', NULL, NULL),
(75, 'France, Metropolitan', 'FX', NULL, NULL),
(76, 'French Guiana', 'GF', NULL, NULL),
(77, 'French Polynesia', 'PF', NULL, NULL),
(78, 'French Southern Territories', 'TF', NULL, NULL),
(79, 'Gabon', 'GA', NULL, NULL),
(80, 'Gambia', 'GM', NULL, NULL),
(81, 'Georgia', 'GE', NULL, NULL),
(82, 'Germany', 'DE', NULL, NULL),
(83, 'Ghana', 'GH', NULL, NULL),
(84, 'Gibraltar', 'GI', NULL, NULL),
(85, 'Greece', 'GR', NULL, NULL),
(86, 'Greenland', 'GL', NULL, NULL),
(87, 'Grenada', 'GD', NULL, NULL),
(88, 'Guadeloupe', 'GP', NULL, NULL),
(89, 'Guam', 'GU', NULL, NULL),
(90, 'Guatemala', 'GT', NULL, NULL),
(91, 'Guinea', 'GN', NULL, NULL),
(92, 'Guinea-Bissau', 'GW', NULL, NULL),
(93, 'Guyana', 'GY', NULL, NULL),
(94, 'Haiti', 'HT', NULL, NULL),
(95, 'Heard and Mc Donald Islands', 'HM', NULL, NULL),
(96, 'Honduras', 'HN', NULL, NULL),
(97, 'Hong Kong', 'HK', NULL, NULL),
(98, 'Hungary', 'HU', NULL, NULL),
(99, 'Iceland', 'IS', NULL, NULL),
(100, 'India', 'IN', NULL, NULL),
(101, 'Indonesia', 'ID', NULL, NULL),
(102, 'Iran (Islamic Republic of)', 'IR', NULL, NULL),
(103, 'Iraq', 'IQ', NULL, NULL),
(104, 'Ireland', 'IE', NULL, NULL),
(105, 'Israel', 'IL', NULL, NULL),
(106, 'Italy', 'IT', NULL, NULL),
(107, 'Ivory Coast', 'CI', NULL, NULL),
(108, 'Jamaica', 'JM', NULL, NULL),
(109, 'Japan', 'JP', NULL, NULL),
(110, 'Jordan', 'JO', NULL, NULL),
(111, 'Kazakhstan', 'KZ', NULL, NULL),
(112, 'Kenya', 'KE', NULL, NULL),
(113, 'Kiribati', 'KI', NULL, NULL),
(114, 'Korea, Democratic People\'s Republic of', 'KP', NULL, NULL),
(115, 'Korea, Republic of', 'KR', NULL, NULL),
(116, 'Kuwait', 'KW', NULL, NULL),
(117, 'Kyrgyzstan', 'KG', NULL, NULL),
(118, 'Lao People\'s Democratic Republic', 'LA', NULL, NULL),
(119, 'Latvia', 'LV', NULL, NULL),
(120, 'Lebanon', 'LB', NULL, NULL),
(121, 'Lesotho', 'LS', NULL, NULL),
(122, 'Liberia', 'LR', NULL, NULL),
(123, 'Libyan Arab Jamahiriya', 'LY', NULL, NULL),
(124, 'Liechtenstein', 'LI', NULL, NULL),
(125, 'Lithuania', 'LT', NULL, NULL),
(126, 'Luxembourg', 'LU', NULL, NULL),
(127, 'Macau', 'MO', NULL, NULL),
(128, 'Macedonia', 'MK', NULL, NULL),
(129, 'Madagascar', 'MG', NULL, NULL),
(130, 'Malawi', 'MW', NULL, NULL),
(131, 'Malaysia', 'MY', NULL, NULL),
(132, 'Maldives', 'MV', NULL, NULL),
(133, 'Mali', 'ML', NULL, NULL),
(134, 'Malta', 'MT', NULL, NULL),
(135, 'Marshall Islands', 'MH', NULL, NULL),
(136, 'Martinique', 'MQ', NULL, NULL),
(137, 'Mauritania', 'MR', NULL, NULL),
(138, 'Mauritius', 'MU', NULL, NULL),
(139, 'Mayotte', 'TY', NULL, NULL),
(140, 'Mexico', 'MX', NULL, NULL),
(141, 'Micronesia, Federated States of', 'FM', NULL, NULL),
(142, 'Moldova, Republic of', 'MD', NULL, NULL),
(143, 'Monaco', 'MC', NULL, NULL),
(144, 'Mongolia', 'MN', NULL, NULL),
(145, 'Montserrat', 'MS', NULL, NULL),
(146, 'Morocco', 'MA', NULL, NULL),
(147, 'Mozambique', 'MZ', NULL, NULL),
(148, 'Myanmar', 'MM', NULL, NULL),
(149, 'Namibia', 'NA', NULL, NULL),
(150, 'Nauru', 'NR', NULL, NULL),
(151, 'Nepal', 'NP', NULL, NULL),
(152, 'Netherlands', 'NL', NULL, NULL),
(153, 'Netherlands Antilles', 'AN', NULL, NULL),
(154, 'New Caledonia', 'NC', NULL, NULL),
(155, 'New Zealand', 'NZ', NULL, NULL),
(156, 'Nicaragua', 'NI', NULL, NULL),
(157, 'Niger', 'NE', NULL, NULL),
(158, 'Nigeria', 'NG', NULL, NULL),
(159, 'Niue', 'NU', NULL, NULL),
(160, 'Norfork Island', 'NF', NULL, NULL),
(161, 'Northern Mariana Islands', 'MP', NULL, NULL),
(162, 'Norway', 'NO', NULL, NULL),
(163, 'Oman', 'OM', NULL, NULL),
(164, 'Pakistan', 'PK', NULL, NULL),
(165, 'Palau', 'PW', NULL, NULL),
(166, 'Panama', 'PA', NULL, NULL),
(167, 'Papua New Guinea', 'PG', NULL, NULL),
(168, 'Paraguay', 'PY', NULL, NULL),
(169, 'Peru', 'PE', NULL, NULL),
(170, 'Philippines', 'PH', NULL, NULL),
(171, 'Pitcairn', 'PN', NULL, NULL),
(172, 'Poland', 'PL', NULL, NULL),
(173, 'Portugal', 'PT', NULL, NULL),
(174, 'Puerto Rico', 'PR', NULL, NULL),
(175, 'Qatar', 'QA', NULL, NULL),
(176, 'Republic of South Sudan', 'SS', NULL, NULL),
(177, 'Reunion', 'RE', NULL, NULL),
(178, 'Romania', 'RO', NULL, NULL),
(179, 'Russian Federation', 'RU', NULL, NULL),
(180, 'Rwanda', 'RW', NULL, NULL),
(181, 'Saint Kitts and Nevis', 'KN', NULL, NULL),
(182, 'Saint Lucia', 'LC', NULL, NULL),
(183, 'Saint Vincent and the Grenadines', 'VC', NULL, NULL),
(184, 'Samoa', 'WS', NULL, NULL),
(185, 'San Marino', 'SM', NULL, NULL),
(186, 'Sao Tome and Principe', 'ST', NULL, NULL),
(187, 'Saudi Arabia', 'SA', NULL, NULL),
(188, 'Senegal', 'SN', NULL, NULL),
(189, 'Serbia', 'RS', NULL, NULL),
(190, 'Seychelles', 'SC', NULL, NULL),
(191, 'Sierra Leone', 'SL', NULL, NULL),
(192, 'Singapore', 'SG', NULL, NULL),
(193, 'Slovakia', 'SK', NULL, NULL),
(194, 'Slovenia', 'SI', NULL, NULL),
(195, 'Solomon Islands', 'SB', NULL, NULL),
(196, 'Somalia', 'SO', NULL, NULL),
(197, 'South Africa', 'ZA', NULL, NULL),
(198, 'South Georgia South Sandwich Islands', 'GS', NULL, NULL),
(199, 'Spain', 'ES', NULL, NULL),
(200, 'Sri Lanka', 'LK', NULL, NULL),
(201, 'St. Helena', 'SH', NULL, NULL),
(202, 'St. Pierre and Miquelon', 'PM', NULL, NULL),
(203, 'Sudan', 'SD', NULL, NULL),
(204, 'Suriname', 'SR', NULL, NULL),
(205, 'Svalbarn and Jan Mayen Islands', 'SJ', NULL, NULL),
(206, 'Swaziland', 'SZ', NULL, NULL),
(207, 'Sweden', 'SE', NULL, NULL),
(208, 'Switzerland', 'CH', NULL, NULL),
(209, 'Syrian Arab Republic', 'SY', NULL, NULL),
(210, 'Taiwan', 'TW', NULL, NULL),
(211, 'Tajikistan', 'TJ', NULL, NULL),
(212, 'Tanzania, United Republic of', 'TZ', NULL, NULL),
(213, 'Thailand', 'TH', NULL, NULL),
(214, 'Togo', 'TG', NULL, NULL),
(215, 'Tokelau', 'TK', NULL, NULL),
(216, 'Tonga', 'TO', NULL, NULL),
(217, 'Trinidad and Tobago', 'TT', NULL, NULL),
(218, 'Tunisia', 'TN', NULL, NULL),
(219, 'Turkey', 'TR', NULL, NULL),
(220, 'Turkmenistan', 'TM', NULL, NULL),
(221, 'Turks and Caicos Islands', 'TC', NULL, NULL),
(222, 'Tuvalu', 'TV', NULL, NULL),
(223, 'Uganda', 'UG', NULL, NULL),
(224, 'Ukraine', 'UA', NULL, NULL),
(225, 'United Arab Emirates', 'AE', NULL, NULL),
(226, 'United Kingdom', 'GB', NULL, NULL),
(227, 'United States minor outlying islands', 'UM', NULL, NULL),
(228, 'Uruguay', 'UY', NULL, NULL),
(229, 'Uzbekistan', 'UZ', NULL, NULL),
(230, 'Vanuatu', 'VU', NULL, NULL),
(231, 'Vatican City State', 'VA', NULL, NULL),
(232, 'Venezuela', 'VE', NULL, NULL),
(233, 'Vietnam', 'VN', NULL, NULL),
(234, 'Virgin Islands (British)', 'VG', NULL, NULL),
(235, 'Virgin Islands (U.S.)', 'VI', NULL, NULL),
(236, 'Wallis and Futuna Islands', 'WF', NULL, NULL),
(237, 'Western Sahara', 'EH', NULL, NULL),
(238, 'Yemen', 'YE', NULL, NULL),
(239, 'Yugoslavia', 'YU', NULL, NULL),
(240, 'Zaire', 'ZR', NULL, NULL),
(241, 'Zambia', 'ZM', NULL, NULL),
(242, 'Zimbabwe', 'ZW', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_name` varchar(191) NOT NULL,
  `status` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'HR', 'Active', '2024-04-04 06:09:38', '2024-04-04 06:09:38'),
(2, 'Development', 'Active', '2024-04-04 06:09:38', '2024-04-04 06:09:38');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(10) UNSIGNED NOT NULL,
  `designation_name` varchar(191) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `designation_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'CEO', 1, NULL, NULL),
(2, 'Project Coordinator', 1, NULL, NULL),
(3, 'Web Developer', 1, NULL, NULL),
(4, 'Junior Web Developer', 1, NULL, NULL),
(5, 'Web Developer', 1, NULL, NULL),
(6, 'Front-end Developer', 1, NULL, NULL),
(7, 'Account Sales Executive', 1, NULL, NULL),
(8, 'Sales Officer', 1, NULL, NULL),
(9, 'Digital Marketing Executive', 1, NULL, NULL),
(10, 'Account Sales Executive', 1, NULL, NULL),
(11, 'Content Writer', 1, NULL, NULL),
(12, 'Digital Marketer', 1, NULL, NULL),
(13, 'Web Designer Lead', 1, NULL, NULL),
(14, 'Junior Web Designer', 1, NULL, NULL),
(15, 'HR Manager', 1, NULL, NULL),
(16, 'HR Officer', 1, NULL, NULL),
(17, 'Admin', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `url` varchar(191) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `name`, `url`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Termination and Resignation Policy.pdf', 'storage/documents/Termination and Resignation Policy.pdf', 1, '2024-04-04 06:09:38', '2024-04-04 06:09:38'),
(2, 'Code of Conduct.pdf', 'storage/documents/Code of Conduct.pdf', 1, '2024-04-04 06:09:38', '2024-04-04 06:09:38');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(191) NOT NULL,
  `lastname` varchar(191) NOT NULL,
  `contact_no` varchar(191) NOT NULL,
  `official_email` varchar(191) NOT NULL,
  `personal_email` varchar(191) NOT NULL,
  `identity_no` varchar(191) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(191) DEFAULT NULL,
  `emergency_contact_relationship` varchar(191) DEFAULT NULL,
  `emergency_contact` varchar(191) DEFAULT NULL,
  `emergency_contact_address` text DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `current_address` text DEFAULT NULL,
  `permanent_address` text DEFAULT NULL,
  `city` varchar(191) DEFAULT NULL,
  `designation` varchar(191) DEFAULT NULL,
  `type` varchar(191) NOT NULL DEFAULT 'office' COMMENT 'work from remote/office',
  `status` int(11) NOT NULL DEFAULT 1,
  `employment_status` varchar(191) DEFAULT NULL,
  `picture` varchar(191) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `exit_date` date DEFAULT NULL,
  `gross_salary` int(11) DEFAULT 0,
  `bonus` int(11) DEFAULT 0,
  `branch_id` varchar(191) NOT NULL DEFAULT '0',
  `department_id` varchar(191) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `firstname`, `lastname`, `contact_no`, `official_email`, `personal_email`, `identity_no`, `date_of_birth`, `gender`, `emergency_contact_relationship`, `emergency_contact`, `emergency_contact_address`, `password`, `current_address`, `permanent_address`, `city`, `designation`, `type`, `status`, `employment_status`, `picture`, `joining_date`, `exit_date`, `gross_salary`, `bonus`, `branch_id`, `department_id`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '', '03324567833', 'admin@glowlogix.com', 'admin@gmail.com', '1320245699852', '1998-09-19', NULL, 'brother', '03324567833', NULL, '$2y$10$pjF6zHgrDhFySzsyveeIYOOojRwxuA4jW8qF0VzHuPMU5ADhkr/pq', NULL, NULL, 'Islamabad', 'admin', 'office', 0, NULL, NULL, '2021-08-23', NULL, 0, 0, '1', NULL, NULL, NULL, '2024-04-04 06:09:36', '2024-04-04 06:09:36'),
(2, 'Hr', 'Manager', '03324567834', 'hr@glowlogix.com', 'hr@gmail.com', '1320245699855', '1998-09-19', NULL, 'brother', '03324567834', NULL, '$2y$10$mEp.5OkMy1/74Rw182OJvOCE.ZcIZd9LlGw7cB6qXQy44pNafzVpS', NULL, NULL, 'Islamabad', 'HR Manager', 'office', 1, 'permanent', NULL, '2021-08-23', NULL, 20000, 0, '1', '1', NULL, NULL, '2024-04-04 06:09:36', '2024-04-04 06:09:36'),
(3, 'user', '', '03324567844', 'user@glowlogix.com', 'user@gmail.com', '1320245699855', '1998-09-19', NULL, 'brother', '03324567844', NULL, '$2y$10$vbnVyx9jR4kOklXdc5Z6PemE3sBMnSFhqHoyrrO5VKqfEl0Ziz3Fq', NULL, NULL, 'Islamabad', 'Web Developer', 'office', 1, 'permanent', NULL, '2021-08-23', NULL, 20000, 0, '1', '2', NULL, NULL, '2024-04-04 06:09:38', '2024-04-04 06:09:38');

-- --------------------------------------------------------

--
-- Table structure for table `employee_leave_type`
--

CREATE TABLE `employee_leave_type` (
  `employee_id` int(10) UNSIGNED NOT NULL,
  `leave_type_id` int(10) UNSIGNED NOT NULL,
  `count` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_leave_type`
--

INSERT INTO `employee_leave_type` (`employee_id`, `leave_type_id`, `count`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 12, 0, '2024-04-04 06:09:38', '2024-04-04 06:09:38'),
(1, 2, 12, 0, '2024-04-04 06:09:38', '2024-04-04 06:09:38'),
(2, 1, 12, 0, '2024-04-04 06:09:38', '2024-04-04 06:09:38'),
(2, 2, 12, 0, '2024-04-04 06:09:38', '2024-04-04 06:09:38');

-- --------------------------------------------------------

--
-- Table structure for table `employee_skills`
--

CREATE TABLE `employee_skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_timings`
--

CREATE TABLE `employee_timings` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `day` varchar(191) NOT NULL,
  `timing_start` time DEFAULT NULL,
  `timing_off` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq_categories`
--

CREATE TABLE `faq_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq_categories`
--

INSERT INTO `faq_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'General', '2024-04-04 06:09:38', '2024-04-04 06:09:38'),
(2, 'Others', '2024-04-04 06:09:38', '2024-04-04 06:09:38');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `skill` varchar(191) DEFAULT NULL,
  `branch_id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs_queue`
--

CREATE TABLE `jobs_queue` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `leave_type` varchar(191) NOT NULL,
  `datefrom` datetime DEFAULT NULL,
  `dateto` datetime DEFAULT NULL,
  `cc_to` varchar(191) DEFAULT NULL,
  `point_of_contact` int(11) NOT NULL DEFAULT 0,
  `description` longtext DEFAULT NULL,
  `line_manager` varchar(191) DEFAULT NULL,
  `subject` varchar(191) DEFAULT NULL,
  `status` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `count` int(11) NOT NULL DEFAULT 12,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `name`, `count`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sick Leaves', 12, 1, '2024-04-04 06:09:38', '2024-04-04 06:09:38'),
(2, 'Casual Leaves', 12, 1, '2024-04-04 06:09:38', '2024-04-04 06:09:38'),
(3, 'Annual Leave', 12, 1, '2024-04-04 06:15:27', '2024-04-04 06:15:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2018_02_06_074222_create_job_table', 1),
(3, '2018_02_08_091352_create_applicants_table', 1),
(4, '2018_04_18_144447_create_documents_table', 1),
(5, '2018_04_21_145717_create_leaves_table', 1),
(6, '2018_04_25_110113_create_monthly_salaries_table', 1),
(7, '2018_09_19_150012_create_jobs_queue_table', 1),
(8, '2018_09_26_145034_create_attendances_table', 1),
(9, '2018_09_26_145035_create_attendance_summaries_table', 1),
(10, '2018_09_28_152616_create_employees_table', 1),
(11, '2018_10_09_193641_create_permission_tables', 1),
(12, '2018_10_10_191301_create_organization_hierarchies_table', 1),
(13, '2018_10_11_173408_create_branches_table', 1),
(14, '2018_10_24_180154_create_leave_types_table', 1),
(15, '2018_10_24_185808_create_employee_leave_type_table', 1),
(16, '2018_11_05_184925_add_description_to_attendances_table', 1),
(17, '2018_11_06_211148_create_employee_timings_table', 1),
(18, '2018_11_07_155619_remove_category_id_from_applicants_table', 1),
(19, '2018_11_07_190942_alter_applicants_table', 1),
(20, '2018_11_22_145356_create_departments_table', 1),
(21, '2018_11_22_145457_create_vendors_table', 1),
(22, '2018_11_22_201323_create_vendor_categories_table', 1),
(23, '2018_11_26_193826_create_teams_table', 1),
(24, '2018_11_26_204612_create_team_members_table', 1),
(25, '2018_11_27_141830_create_designations_table', 1),
(26, '2018_11_28_151030_create_skills_table', 1),
(27, '2018_11_28_164219_create_sub_skills_table', 1),
(28, '2018_11_28_195940_create_employee_skills_table', 1),
(29, '2018_11_29_192709_add_status_to_teams_table', 1),
(30, '2018_11_30_112837_create_countries_table', 1),
(31, '2018_11_30_123324_add_skill-to_jobs_table', 1),
(32, '2018_12_12_153109_add_weekend_to_branches_table', 1),
(33, '2018_12_17_201252_add_timestamp_in_and_timestamp_out_in_attendance_table', 1),
(34, '2018_12_17_202329_add_first_timestamp_in_and_last_timestamp_out_to_attendance_summary_table', 1),
(35, '2018_12_18_133352_create_attendance_breaks_table', 1),
(36, '2018_12_24_201537_add_gender_to_employees_table', 1),
(37, '2021_08_24_121624_create_attendance_corrections_table', 1),
(38, '2021_09_06_132257_create_faq_categories_table', 1),
(39, '2021_09_06_152254_create_faqs_table', 1),
(40, '2021_09_07_152552_create_platforms_table', 1),
(41, '2021_09_13_183223_create_salaries_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Employee', 2),
(2, 'App\\Employee', 2),
(3, 'App\\Employee', 2),
(4, 'App\\Employee', 2),
(5, 'App\\Employee', 2),
(6, 'App\\Employee', 2),
(7, 'App\\Employee', 2),
(8, 'App\\Employee', 2),
(9, 'App\\Employee', 2),
(10, 'App\\Employee', 2),
(11, 'App\\Employee', 2),
(12, 'App\\Employee', 2),
(13, 'App\\Employee', 2),
(14, 'App\\Employee', 2),
(15, 'App\\Employee', 2),
(16, 'App\\Employee', 2),
(17, 'App\\Employee', 2),
(18, 'App\\Employee', 2),
(19, 'App\\Employee', 2),
(20, 'App\\Employee', 2),
(21, 'App\\Employee', 2),
(22, 'App\\Employee', 2),
(23, 'App\\Employee', 2),
(24, 'App\\Employee', 2),
(25, 'App\\Employee', 2),
(26, 'App\\Employee', 2),
(27, 'App\\Employee', 2),
(28, 'App\\Employee', 2),
(29, 'App\\Employee', 2),
(30, 'App\\Employee', 2),
(31, 'App\\Employee', 2),
(32, 'App\\Employee', 2),
(33, 'App\\Employee', 2),
(34, 'App\\Employee', 2),
(35, 'App\\Employee', 2),
(36, 'App\\Employee', 2),
(37, 'App\\Employee', 2),
(38, 'App\\Employee', 2),
(39, 'App\\Employee', 2),
(40, 'App\\Employee', 2),
(41, 'App\\Employee', 2),
(42, 'App\\Employee', 2),
(43, 'App\\Employee', 2),
(44, 'App\\Employee', 2),
(45, 'App\\Employee', 2),
(46, 'App\\Employee', 2),
(47, 'App\\Employee', 2),
(48, 'App\\Employee', 2),
(49, 'App\\Employee', 2),
(50, 'App\\Employee', 2),
(51, 'App\\Employee', 2),
(52, 'App\\Employee', 2),
(53, 'App\\Employee', 2),
(54, 'App\\Employee', 2),
(55, 'App\\Employee', 2),
(56, 'App\\Employee', 2),
(57, 'App\\Employee', 2),
(58, 'App\\Employee', 2),
(59, 'App\\Employee', 2),
(60, 'App\\Employee', 2),
(61, 'App\\Employee', 2),
(62, 'App\\Employee', 2),
(63, 'App\\Employee', 2),
(64, 'App\\Employee', 2),
(65, 'App\\Employee', 2),
(67, 'App\\Employee', 2),
(68, 'App\\Employee', 2),
(69, 'App\\Employee', 2),
(70, 'App\\Employee', 2),
(71, 'App\\Employee', 2),
(72, 'App\\Employee', 2),
(73, 'App\\Employee', 2),
(74, 'App\\Employee', 2),
(75, 'App\\Employee', 2),
(76, 'App\\Employee', 2),
(77, 'App\\Employee', 2),
(78, 'App\\Employee', 2),
(79, 'App\\Employee', 2),
(80, 'App\\Employee', 2),
(81, 'App\\Employee', 2),
(82, 'App\\Employee', 2),
(83, 'App\\Employee', 2),
(84, 'App\\Employee', 2),
(85, 'App\\Employee', 2),
(96, 'App\\Employee', 2),
(97, 'App\\Employee', 2),
(98, 'App\\Employee', 2),
(99, 'App\\Employee', 2),
(100, 'App\\Employee', 2),
(101, 'App\\Employee', 2),
(102, 'App\\Employee', 2),
(103, 'App\\Employee', 2),
(104, 'App\\Employee', 2),
(105, 'App\\Employee', 2),
(106, 'App\\Employee', 2),
(107, 'App\\Employee', 2),
(108, 'App\\Employee', 2),
(109, 'App\\Employee', 2),
(110, 'App\\Employee', 2),
(111, 'App\\Employee', 2),
(112, 'App\\Employee', 2),
(113, 'App\\Employee', 2),
(114, 'App\\Employee', 2),
(115, 'App\\Employee', 2),
(116, 'App\\Employee', 2),
(117, 'App\\Employee', 2),
(118, 'App\\Employee', 2),
(119, 'App\\Employee', 2),
(120, 'App\\Employee', 2),
(121, 'App\\Employee', 2),
(123, 'App\\Employee', 2),
(124, 'App\\Employee', 2),
(125, 'App\\Employee', 2),
(126, 'App\\Employee', 2),
(127, 'App\\Employee', 2),
(128, 'App\\Employee', 2),
(129, 'App\\Employee', 2),
(130, 'App\\Employee', 2),
(131, 'App\\Employee', 2),
(132, 'App\\Employee', 2),
(133, 'App\\Employee', 2),
(134, 'App\\Employee', 2),
(135, 'App\\Employee', 2),
(136, 'App\\Employee', 2),
(137, 'App\\Employee', 2),
(138, 'App\\Employee', 2),
(139, 'App\\Employee', 2),
(140, 'App\\Employee', 2),
(141, 'App\\Employee', 2),
(142, 'App\\Employee', 2),
(143, 'App\\Employee', 2),
(144, 'App\\Employee', 2),
(145, 'App\\Employee', 2),
(146, 'App\\Employee', 2),
(147, 'App\\Employee', 2),
(148, 'App\\Employee', 2),
(149, 'App\\Employee', 2),
(150, 'App\\Employee', 2),
(151, 'App\\Employee', 2),
(152, 'App\\Employee', 2),
(153, 'App\\Employee', 2),
(156, 'App\\Employee', 2),
(157, 'App\\Employee', 2),
(158, 'App\\Employee', 2),
(159, 'App\\Employee', 2),
(160, 'App\\Employee', 2),
(161, 'App\\Employee', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Employee', 1),
(2, 'App\\Employee', 2);

-- --------------------------------------------------------

--
-- Table structure for table `monthly_salaries`
--

CREATE TABLE `monthly_salaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `bonus` int(11) NOT NULL DEFAULT 0,
  `gross_salary` int(11) NOT NULL,
  `leave_deduction` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organization_hierarchies`
--

CREATE TABLE `organization_hierarchies` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `line_manager_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'JobsController:getSkillsByJob', 'web', '2024-04-04 06:09:30', '2024-04-04 06:09:30'),
(2, 'JobsController:index', 'web', '2024-04-04 06:09:30', '2024-04-04 06:09:30'),
(3, 'JobsController:create', 'web', '2024-04-04 06:09:30', '2024-04-04 06:09:30'),
(4, 'JobsController:store', 'web', '2024-04-04 06:09:30', '2024-04-04 06:09:30'),
(5, 'JobsController:show', 'web', '2024-04-04 06:09:30', '2024-04-04 06:09:30'),
(6, 'JobsController:edit', 'web', '2024-04-04 06:09:30', '2024-04-04 06:09:30'),
(7, 'JobsController:update', 'web', '2024-04-04 06:09:30', '2024-04-04 06:09:30'),
(8, 'JobsController:destroy', 'web', '2024-04-04 06:09:30', '2024-04-04 06:09:30'),
(9, 'HomeController:index', 'web', '2024-04-04 06:09:30', '2024-04-04 06:09:30'),
(10, 'SalarySlipController:index', 'web', '2024-04-04 06:09:30', '2024-04-04 06:09:30'),
(11, 'SalarySlipController:showSalarySlip', 'web', '2024-04-04 06:09:30', '2024-04-04 06:09:30'),
(12, 'DashboardController:index', 'web', '2024-04-04 06:09:30', '2024-04-04 06:09:30'),
(13, 'DashboardController:contact', 'web', '2024-04-04 06:09:30', '2024-04-04 06:09:30'),
(14, 'DashboardController:contact_us', 'web', '2024-04-04 06:09:30', '2024-04-04 06:09:30'),
(15, 'BranchesController:index', 'web', '2024-04-04 06:09:30', '2024-04-04 06:09:30'),
(16, 'BranchesController:create', 'web', '2024-04-04 06:09:30', '2024-04-04 06:09:30'),
(17, 'BranchesController:store', 'web', '2024-04-04 06:09:30', '2024-04-04 06:09:30'),
(18, 'BranchesController:show', 'web', '2024-04-04 06:09:30', '2024-04-04 06:09:30'),
(19, 'BranchesController:edit', 'web', '2024-04-04 06:09:30', '2024-04-04 06:09:30'),
(20, 'BranchesController:update', 'web', '2024-04-04 06:09:30', '2024-04-04 06:09:30'),
(21, 'BranchesController:destroy', 'web', '2024-04-04 06:09:30', '2024-04-04 06:09:30'),
(22, 'ApplicantController:create', 'web', '2024-04-04 06:09:30', '2024-04-04 06:09:30'),
(23, 'ApplicantController:index', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(24, 'ApplicantController:single_Cat_Job', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(25, 'ApplicantController:singleApplicant', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(26, 'ApplicantController:destroy', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(27, 'ApplicantController:trashed', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(28, 'ApplicantController:kill', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(29, 'ApplicantController:restore', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(30, 'ApplicantController:hire', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(31, 'ApplicantController:retire', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(32, 'ApplicantController:hiredApplicants', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(33, 'ApplicantController:store', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(34, 'ApplicantController:findjob', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(35, 'DepartmentController:index', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(36, 'DepartmentController:create', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(37, 'DepartmentController:update', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(38, 'DepartmentController:delete', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(39, 'VendorController:index', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(40, 'VendorController:create', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(41, 'VendorController:store', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(42, 'VendorController:edit', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(43, 'VendorController:update', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(44, 'VendorController:delete', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(45, 'VendorCategoryController:index', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(46, 'VendorCategoryController:create', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(47, 'VendorCategoryController:update', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(48, 'VendorCategoryController:delete', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(49, 'TeamController:index', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(50, 'TeamController:create', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(51, 'TeamController:update', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(52, 'TeamController:delete', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(53, 'TeamMembersController:create', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(54, 'TeamMembersController:edit', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(55, 'TeamMembersController:delete', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(56, 'DesignationController:index', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(57, 'DesignationController:create', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(58, 'DesignationController:update', 'web', '2024-04-04 06:09:31', '2024-04-04 06:09:31'),
(59, 'DesignationController:delete', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(60, 'ProfileController:index', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(61, 'ProfileController:update', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(62, 'ProfileController:updatePic', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(63, 'LeaveTypeController:index', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(64, 'LeaveTypeController:create', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(65, 'LeaveTypeController:update', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(66, 'LeaveTypeController:delete', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(67, 'SkillController:index', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(68, 'SkillController:create', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(69, 'SkillController:update', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(70, 'SkillController:delete', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(71, 'SkillController:assign', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(72, 'SkillController:assign_edit', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(73, 'SkillController:unassign', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(74, 'SubSkillController:index', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(75, 'SubSkillController:create', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(76, 'SubSkillController:edit', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(77, 'SubSkillController:sub_edit', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(78, 'SubSkillController:delete', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(79, 'OrganizationHierarchyController:index', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(80, 'OrganizationHierarchyController:create', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(81, 'OrganizationHierarchyController:store', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(82, 'OrganizationHierarchyController:show', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(83, 'OrganizationHierarchyController:edit', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(84, 'OrganizationHierarchyController:update', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(85, 'OrganizationHierarchyController:destroy', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(86, 'RolePermissionsController:index', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(87, 'RolePermissionsController:create', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(88, 'RolePermissionsController:store', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(89, 'RolePermissionsController:applyRole', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(90, 'RolePermissionsController:applyRolePost', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(91, 'RolePermissionsController:getPermissionsFromRole', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(92, 'RolePermissionsController:checkPermissions', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(93, 'RolePermissionsController:edit', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(94, 'RolePermissionsController:update', 'web', '2024-04-04 06:09:32', '2024-04-04 06:09:32'),
(95, 'RolePermissionsController:destroy', 'web', '2024-04-04 06:09:33', '2024-04-04 06:09:33'),
(96, 'EmployeeController:index', 'web', '2024-04-04 06:09:33', '2024-04-04 06:09:33'),
(97, 'EmployeeController:all_employees', 'web', '2024-04-04 06:09:33', '2024-04-04 06:09:33'),
(98, 'EmployeeController:create', 'web', '2024-04-04 06:09:33', '2024-04-04 06:09:33'),
(99, 'EmployeeController:store', 'web', '2024-04-04 06:09:33', '2024-04-04 06:09:33'),
(100, 'EmployeeController:edit', 'web', '2024-04-04 06:09:33', '2024-04-04 06:09:33'),
(101, 'EmployeeController:profile', 'web', '2024-04-04 06:09:33', '2024-04-04 06:09:33'),
(102, 'EmployeeController:update', 'web', '2024-04-04 06:09:33', '2024-04-04 06:09:33'),
(103, 'EmployeeController:trashed', 'web', '2024-04-04 06:09:33', '2024-04-04 06:09:33'),
(104, 'EmployeeController:kill', 'web', '2024-04-04 06:09:33', '2024-04-04 06:09:33'),
(105, 'EmployeeController:restore', 'web', '2024-04-04 06:09:33', '2024-04-04 06:09:33'),
(106, 'EmployeeController:destroy', 'web', '2024-04-04 06:09:33', '2024-04-04 06:09:33'),
(107, 'AttendanceController:showAttendance', 'web', '2024-04-04 06:09:33', '2024-04-04 06:09:33'),
(108, 'AttendanceController:showTimeline', 'web', '2024-04-04 06:09:33', '2024-04-04 06:09:33'),
(109, 'AttendanceController:todayTimeline', 'web', '2024-04-04 06:09:33', '2024-04-04 06:09:33'),
(110, 'AttendanceController:sheet', 'web', '2024-04-04 06:09:33', '2024-04-04 06:09:33'),
(111, 'AttendanceController:create', 'web', '2024-04-04 06:09:33', '2024-04-04 06:09:33'),
(112, 'AttendanceController:createByAjax', 'web', '2024-04-04 06:09:33', '2024-04-04 06:09:33'),
(113, 'AttendanceController:getbyAjax', 'web', '2024-04-04 06:09:33', '2024-04-04 06:09:33'),
(114, 'AttendanceController:edit', 'web', '2024-04-04 06:09:33', '2024-04-04 06:09:33'),
(115, 'AttendanceController:storeAttendanceSummaryToday', 'web', '2024-04-04 06:09:33', '2024-04-04 06:09:33'),
(116, 'AttendanceController:store', 'web', '2024-04-04 06:09:33', '2024-04-04 06:09:33'),
(117, 'AttendanceController:storeBreak', 'web', '2024-04-04 06:09:33', '2024-04-04 06:09:33'),
(118, 'AttendanceController:index', 'web', '2024-04-04 06:09:33', '2024-04-04 06:09:33'),
(119, 'AttendanceController:destroy', 'web', '2024-04-04 06:09:33', '2024-04-04 06:09:33'),
(120, 'AttendanceController:deleteChecktime', 'web', '2024-04-04 06:09:33', '2024-04-04 06:09:33'),
(121, 'AttendanceController:update', 'web', '2024-04-04 06:09:33', '2024-04-04 06:09:33'),
(122, 'AttendanceController:showExport', 'web', '2024-04-04 06:09:33', '2024-04-04 06:09:33'),
(123, 'AttendanceController:exportAttendance', 'web', '2024-04-04 06:09:33', '2024-04-04 06:09:33'),
(124, 'AttendanceController:createBreak', 'web', '2024-04-04 06:09:33', '2024-04-04 06:09:33'),
(125, 'AttendanceController:deleteBreakChecktime', 'web', '2024-04-04 06:09:33', '2024-04-04 06:09:33'),
(126, 'AttendanceController:updateBreak', 'web', '2024-04-04 06:09:33', '2024-04-04 06:09:33'),
(127, 'AttendanceController:authUserTimeline', 'web', '2024-04-04 06:09:33', '2024-04-04 06:09:33'),
(128, 'AttendanceController:correctionEmail', 'web', '2024-04-04 06:09:33', '2024-04-04 06:09:33'),
(129, 'AttendanceController:attendanceCorrection', 'web', '2024-04-04 06:09:33', '2024-04-04 06:09:33'),
(130, 'AttendanceController:updateAttendanceCorrection', 'web', '2024-04-04 06:09:34', '2024-04-04 06:09:34'),
(131, 'AttendanceController:Attendance_Summary_Delete', 'web', '2024-04-04 06:09:34', '2024-04-04 06:09:34'),
(132, 'SalariesController:index', 'web', '2024-04-04 06:09:34', '2024-04-04 06:09:34'),
(133, 'SalariesController:addBonus', 'web', '2024-04-04 06:09:34', '2024-04-04 06:09:34'),
(134, 'SalariesController:processSalary', 'web', '2024-04-04 06:09:34', '2024-04-04 06:09:34'),
(135, 'SalariesController:export', 'web', '2024-04-04 06:09:34', '2024-04-04 06:09:34'),
(136, 'LeaveController:employeeleaves', 'web', '2024-04-04 06:09:34', '2024-04-04 06:09:34'),
(137, 'LeaveController:edit', 'web', '2024-04-04 06:09:34', '2024-04-04 06:09:34'),
(138, 'LeaveController:show', 'web', '2024-04-04 06:09:34', '2024-04-04 06:09:34'),
(139, 'LeaveController:update', 'web', '2024-04-04 06:09:34', '2024-04-04 06:09:34'),
(140, 'LeaveController:updateStatus', 'web', '2024-04-04 06:09:34', '2024-04-04 06:09:34'),
(141, 'LeaveController:destroy', 'web', '2024-04-04 06:09:34', '2024-04-04 06:09:34'),
(142, 'LeaveController:leaveDelete', 'web', '2024-04-04 06:09:34', '2024-04-04 06:09:34'),
(143, 'LeaveController:index', 'web', '2024-04-04 06:09:34', '2024-04-04 06:09:34'),
(144, 'LeaveController:create', 'web', '2024-04-04 06:09:34', '2024-04-04 06:09:34'),
(145, 'LeaveController:adminCreate', 'web', '2024-04-04 06:09:34', '2024-04-04 06:09:34'),
(146, 'LeaveController:store', 'web', '2024-04-04 06:09:34', '2024-04-04 06:09:34'),
(147, 'LeaveController:adminStore', 'web', '2024-04-04 06:09:34', '2024-04-04 06:09:34'),
(148, 'DocumentsController:index', 'web', '2024-04-04 06:09:34', '2024-04-04 06:09:34'),
(149, 'DocumentsController:createDocs', 'web', '2024-04-04 06:09:34', '2024-04-04 06:09:34'),
(150, 'DocumentsController:uploadDocs', 'web', '2024-04-04 06:09:34', '2024-04-04 06:09:34'),
(151, 'DocumentsController:deleteDocument', 'web', '2024-04-04 06:09:34', '2024-04-04 06:09:34'),
(152, 'DocumentsController:editDocument', 'web', '2024-04-04 06:09:34', '2024-04-04 06:09:34'),
(153, 'DocumentsController:update', 'web', '2024-04-04 06:09:34', '2024-04-04 06:09:34'),
(154, 'PlatformController:edit', 'web', '2024-04-04 06:09:34', '2024-04-04 06:09:34'),
(155, 'PlatformController:update', 'web', '2024-04-04 06:09:34', '2024-04-04 06:09:34'),
(156, 'PlatformController:index', 'web', '2024-04-04 06:09:34', '2024-04-04 06:09:34'),
(157, 'FaqController:index', 'web', '2024-04-04 06:09:34', '2024-04-04 06:09:34'),
(158, 'FaqController:store', 'web', '2024-04-04 06:09:34', '2024-04-04 06:09:34'),
(159, 'FaqController:update', 'web', '2024-04-04 06:09:34', '2024-04-04 06:09:34'),
(160, 'FaqController:destroy', 'web', '2024-04-04 06:09:34', '2024-04-04 06:09:34'),
(161, 'FaqController:faqCategoryStore', 'web', '2024-04-04 06:09:35', '2024-04-04 06:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `platforms`
--

CREATE TABLE `platforms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `website` varchar(191) DEFAULT NULL,
  `logo` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `hr_email` varchar(191) DEFAULT NULL,
  `mobile_no` varchar(191) DEFAULT NULL,
  `phone_no` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2024-04-04 06:09:35', '2024-04-04 06:09:35'),
(2, 'HR Manager', 'web', '2024-04-04 06:09:35', '2024-04-04 06:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(41, 2),
(42, 2),
(43, 2),
(44, 2),
(45, 2),
(46, 2),
(47, 2),
(48, 2),
(49, 2),
(50, 2),
(51, 2),
(52, 2),
(53, 2),
(54, 2),
(55, 2),
(56, 2),
(57, 2),
(58, 2),
(59, 2),
(60, 2),
(61, 2),
(62, 2),
(63, 2),
(64, 2),
(65, 2),
(67, 2),
(68, 2),
(69, 2),
(70, 2),
(71, 2),
(72, 2),
(73, 2),
(74, 2),
(75, 2),
(76, 2),
(77, 2),
(78, 2),
(79, 2),
(80, 2),
(81, 2),
(82, 2),
(83, 2),
(84, 2),
(85, 2),
(96, 2),
(97, 2),
(98, 2),
(99, 2),
(100, 2),
(101, 2),
(102, 2),
(103, 2),
(104, 2),
(105, 2),
(106, 2),
(107, 2),
(108, 2),
(109, 2),
(110, 2),
(111, 2),
(112, 2),
(113, 2),
(114, 2),
(115, 2),
(116, 2),
(117, 2),
(118, 2),
(119, 2),
(120, 2),
(121, 2),
(123, 2),
(124, 2),
(125, 2),
(126, 2),
(127, 2),
(128, 2),
(129, 2),
(130, 2),
(131, 2),
(132, 2),
(133, 2),
(134, 2),
(135, 2),
(136, 2),
(137, 2),
(138, 2),
(139, 2),
(140, 2),
(141, 2),
(142, 2),
(143, 2),
(144, 2),
(145, 2),
(146, 2),
(147, 2),
(148, 2),
(149, 2),
(150, 2),
(151, 2),
(152, 2),
(153, 2),
(156, 2),
(157, 2),
(158, 2),
(159, 2),
(160, 2),
(161, 2);

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gross_salary` varchar(191) DEFAULT NULL,
  `basic_salary` varchar(191) DEFAULT NULL,
  `home_allowance` varchar(191) DEFAULT NULL,
  `medical_allowance` varchar(191) DEFAULT NULL,
  `special_allowance` varchar(191) DEFAULT NULL,
  `meal_allowance` varchar(191) DEFAULT NULL,
  `conveyance_allowance` varchar(191) DEFAULT NULL,
  `pf_deduction` varchar(191) DEFAULT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `skill_name` varchar(191) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_skills`
--

CREATE TABLE `sub_skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `sub_skill_name` varchar(191) NOT NULL,
  `skill_id` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` int(10) UNSIGNED NOT NULL,
  `team_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_category_id` int(11) DEFAULT NULL,
  `company_name` varchar(191) DEFAULT NULL,
  `contact_name` varchar(191) NOT NULL,
  `contact_title` varchar(191) NOT NULL,
  `email` varchar(191) DEFAULT NULL,
  `vendor_type` varchar(191) NOT NULL,
  `tax_payer` varchar(191) NOT NULL,
  `tax_no` varchar(191) DEFAULT NULL,
  `branch_id` varchar(191) NOT NULL,
  `address` varchar(191) DEFAULT NULL,
  `city` varchar(191) DEFAULT NULL,
  `postal_code` varchar(191) DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `mobile` varchar(191) DEFAULT NULL,
  `fax` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_categories`
--

CREATE TABLE `vendor_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_breaks`
--
ALTER TABLE `attendance_breaks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_corrections`
--
ALTER TABLE `attendance_corrections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_summaries`
--
ALTER TABLE `attendance_summaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_official_email_unique` (`official_email`),
  ADD UNIQUE KEY `employees_personal_email_unique` (`personal_email`);

--
-- Indexes for table `employee_leave_type`
--
ALTER TABLE `employee_leave_type`
  ADD PRIMARY KEY (`employee_id`,`leave_type_id`),
  ADD KEY `employee_leave_type_employee_id_index` (`employee_id`),
  ADD KEY `employee_leave_type_leave_type_id_index` (`leave_type_id`);

--
-- Indexes for table `employee_skills`
--
ALTER TABLE `employee_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_timings`
--
ALTER TABLE `employee_timings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faqs_category_id_foreign` (`category_id`);

--
-- Indexes for table `faq_categories`
--
ALTER TABLE `faq_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs_queue`
--
ALTER TABLE `jobs_queue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_queue_index` (`queue`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `monthly_salaries`
--
ALTER TABLE `monthly_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization_hierarchies`
--
ALTER TABLE `organization_hierarchies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `platforms`
--
ALTER TABLE `platforms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salaries_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_skills`
--
ALTER TABLE `sub_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_categories`
--
ALTER TABLE `vendor_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance_breaks`
--
ALTER TABLE `attendance_breaks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance_corrections`
--
ALTER TABLE `attendance_corrections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance_summaries`
--
ALTER TABLE `attendance_summaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_skills`
--
ALTER TABLE `employee_skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_timings`
--
ALTER TABLE `employee_timings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq_categories`
--
ALTER TABLE `faq_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs_queue`
--
ALTER TABLE `jobs_queue`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `monthly_salaries`
--
ALTER TABLE `monthly_salaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organization_hierarchies`
--
ALTER TABLE `organization_hierarchies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `platforms`
--
ALTER TABLE `platforms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_skills`
--
ALTER TABLE `sub_skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor_categories`
--
ALTER TABLE `vendor_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee_leave_type`
--
ALTER TABLE `employee_leave_type`
  ADD CONSTRAINT `employee_leave_type_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_leave_type_leave_type_id_foreign` FOREIGN KEY (`leave_type_id`) REFERENCES `leave_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `faqs`
--
ALTER TABLE `faqs`
  ADD CONSTRAINT `faqs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `faq_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `salaries`
--
ALTER TABLE `salaries`
  ADD CONSTRAINT `salaries_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
