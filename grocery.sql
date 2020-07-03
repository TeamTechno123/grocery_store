-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2020 at 10:39 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(250) NOT NULL,
  `admin_email` varchar(150) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Techno', 'info@technothinksup.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `main_category_id` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL,
  `category_img` varchar(150) NOT NULL,
  `is_main` int(11) DEFAULT 0,
  `show_on_home` int(11) NOT NULL DEFAULT 0,
  `category_status` int(11) NOT NULL DEFAULT 1,
  `category_addedby` varchar(50) NOT NULL,
  `category_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` bigint(20) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `company_address` varchar(350) NOT NULL,
  `company_city` varchar(150) NOT NULL,
  `company_state` varchar(150) NOT NULL,
  `company_district` varchar(150) NOT NULL,
  `company_statecode` bigint(20) NOT NULL,
  `company_pincode` varchar(20) DEFAULT NULL,
  `company_mob1` varchar(12) NOT NULL,
  `company_mob2` varchar(12) NOT NULL,
  `company_email` varchar(150) NOT NULL,
  `company_website` varchar(150) NOT NULL,
  `company_pan_no` varchar(12) NOT NULL,
  `company_gst_no` varchar(100) NOT NULL,
  `company_lic1` varchar(150) NOT NULL,
  `company_lic2` varchar(150) NOT NULL,
  `company_start_date` varchar(15) NOT NULL,
  `company_end_date` varchar(15) NOT NULL,
  `company_logo` varchar(200) NOT NULL,
  `company_seal` varchar(150) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_address`, `company_city`, `company_state`, `company_district`, `company_statecode`, `company_pincode`, `company_mob1`, `company_mob2`, `company_email`, `company_website`, `company_pan_no`, `company_gst_no`, `company_lic1`, `company_lic2`, `company_start_date`, `company_end_date`, `company_logo`, `company_seal`, `date`) VALUES
(1, 'Needs On Door', 'Kolhapur', 'Kolhapur', 'Maharashtra', 'Kolhapur', 27, '111222', '9876543210', '9998887770', 'demo@email.com', 'www.ppp.com', '111', '222', '333', '444', '01-01-2019', '01-01-2021', '', '', '2020-06-24 06:04:19');

-- --------------------------------------------------------

--
-- Table structure for table `cookbook_reg`
--

CREATE TABLE `cookbook_reg` (
  `cookbook_reg_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `cookbook_reg_name` varchar(350) NOT NULL,
  `cookbook_reg_addr` text NOT NULL,
  `cookbook_reg_mobile` varchar(20) NOT NULL,
  `cookbook_reg_email` varchar(250) NOT NULL,
  `cookbook_reg_status` int(11) NOT NULL DEFAULT 1,
  `cookbook_reg_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `sortname` varchar(250) DEFAULT NULL,
  `country_name` varchar(100) NOT NULL,
  `phonecode` varchar(250) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `sortname`, `country_name`, `phonecode`, `date`) VALUES
(1, 'AF', 'Afghanistan', '93', '2020-01-28 13:08:18'),
(2, 'AL', 'Albania', '355', '2020-01-28 13:08:18'),
(3, 'DZ', 'Algeria', '213', '2020-01-28 13:08:18'),
(4, 'AS', 'American Samoa', '1684', '2020-01-28 13:08:18'),
(5, 'AD', 'Andorra', '376', '2020-01-28 13:08:18'),
(6, 'AO', 'Angola', '244', '2020-01-28 13:08:18'),
(7, 'AI', 'Anguilla', '1264', '2020-01-28 13:08:18'),
(8, 'AQ', 'Antarctica', '0', '2020-01-28 13:08:18'),
(9, 'AG', 'Antigua And Barbuda', '1268', '2020-01-28 13:08:18'),
(10, 'AR', 'Argentina', '54', '2020-01-28 13:08:18'),
(11, 'AM', 'Armenia', '374', '2020-01-28 13:08:18'),
(12, 'AW', 'Aruba', '297', '2020-01-28 13:08:18'),
(13, 'AU', 'Australia', '61', '2020-01-28 13:08:18'),
(14, 'AT', 'Austria', '43', '2020-01-28 13:08:18'),
(15, 'AZ', 'Azerbaijan', '994', '2020-01-28 13:08:18'),
(16, 'BS', 'Bahamas The', '1242', '2020-01-28 13:08:18'),
(17, 'BH', 'Bahrain', '973', '2020-01-28 13:08:18'),
(18, 'BD', 'Bangladesh', '880', '2020-01-28 13:08:18'),
(19, 'BB', 'Barbados', '1246', '2020-01-28 13:08:18'),
(20, 'BY', 'Belarus', '375', '2020-01-28 13:08:18'),
(21, 'BE', 'Belgium', '32', '2020-01-28 13:08:18'),
(22, 'BZ', 'Belize', '501', '2020-01-28 13:08:18'),
(23, 'BJ', 'Benin', '229', '2020-01-28 13:08:18'),
(24, 'BM', 'Bermuda', '1441', '2020-01-28 13:08:18'),
(25, 'BT', 'Bhutan', '975', '2020-01-28 13:08:18'),
(26, 'BO', 'Bolivia', '591', '2020-01-28 13:08:18'),
(27, 'BA', 'Bosnia and Herzegovina', '387', '2020-01-28 13:08:18'),
(28, 'BW', 'Botswana', '267', '2020-01-28 13:08:18'),
(29, 'BV', 'Bouvet Island', '0', '2020-01-28 13:08:18'),
(30, 'BR', 'Brazil', '55', '2020-01-28 13:08:18'),
(31, 'IO', 'British Indian Ocean Territory', '246', '2020-01-28 13:08:18'),
(32, 'BN', 'Brunei', '673', '2020-01-28 13:08:18'),
(33, 'BG', 'Bulgaria', '359', '2020-01-28 13:08:18'),
(34, 'BF', 'Burkina Faso', '226', '2020-01-28 13:08:18'),
(35, 'BI', 'Burundi', '257', '2020-01-28 13:08:18'),
(36, 'KH', 'Cambodia', '855', '2020-01-28 13:08:18'),
(37, 'CM', 'Cameroon', '237', '2020-01-28 13:08:18'),
(38, 'CA', 'Canada', '1', '2020-01-28 13:08:18'),
(39, 'CV', 'Cape Verde', '238', '2020-01-28 13:08:18'),
(40, 'KY', 'Cayman Islands', '1345', '2020-01-28 13:08:18'),
(41, 'CF', 'Central African Republic', '236', '2020-01-28 13:08:18'),
(42, 'TD', 'Chad', '235', '2020-01-28 13:08:18'),
(43, 'CL', 'Chile', '56', '2020-01-28 13:08:18'),
(44, 'CN', 'China', '86', '2020-01-28 13:08:18'),
(45, 'CX', 'Christmas Island', '61', '2020-01-28 13:08:18'),
(46, 'CC', 'Cocos (Keeling) Islands', '672', '2020-01-28 13:08:18'),
(47, 'CO', 'Colombia', '57', '2020-01-28 13:08:18'),
(48, 'KM', 'Comoros', '269', '2020-01-28 13:08:18'),
(49, 'CG', 'Republic Of The Congo', '242', '2020-01-28 13:08:18'),
(50, 'CD', 'Democratic Republic Of The Congo', '242', '2020-01-28 13:08:18'),
(51, 'CK', 'Cook Islands', '682', '2020-01-28 13:08:18'),
(52, 'CR', 'Costa Rica', '506', '2020-01-28 13:08:18'),
(53, 'CI', 'Cote D\'Ivoire (Ivory Coast)', '225', '2020-01-28 13:08:18'),
(54, 'HR', 'Croatia (Hrvatska)', '385', '2020-01-28 13:08:18'),
(55, 'CU', 'Cuba', '53', '2020-01-28 13:08:18'),
(56, 'CY', 'Cyprus', '357', '2020-01-28 13:08:18'),
(57, 'CZ', 'Czech Republic', '420', '2020-01-28 13:08:18'),
(58, 'DK', 'Denmark', '45', '2020-01-28 13:08:18'),
(59, 'DJ', 'Djibouti', '253', '2020-01-28 13:08:18'),
(60, 'DM', 'Dominica', '1767', '2020-01-28 13:08:18'),
(61, 'DO', 'Dominican Republic', '1809', '2020-01-28 13:08:18'),
(62, 'TP', 'East Timor', '670', '2020-01-28 13:08:18'),
(63, 'EC', 'Ecuador', '593', '2020-01-28 13:08:18'),
(64, 'EG', 'Egypt', '20', '2020-01-28 13:08:18'),
(65, 'SV', 'El Salvador', '503', '2020-01-28 13:08:18'),
(66, 'GQ', 'Equatorial Guinea', '240', '2020-01-28 13:08:18'),
(67, 'ER', 'Eritrea', '291', '2020-01-28 13:08:18'),
(68, 'EE', 'Estonia', '372', '2020-01-28 13:08:18'),
(69, 'ET', 'Ethiopia', '251', '2020-01-28 13:08:18'),
(70, 'XA', 'External Territories of Australia', '61', '2020-01-28 13:08:18'),
(71, 'FK', 'Falkland Islands', '500', '2020-01-28 13:08:18'),
(72, 'FO', 'Faroe Islands', '298', '2020-01-28 13:08:18'),
(73, 'FJ', 'Fiji Islands', '679', '2020-01-28 13:08:18'),
(74, 'FI', 'Finland', '358', '2020-01-28 13:08:18'),
(75, 'FR', 'France', '33', '2020-01-28 13:08:18'),
(76, 'GF', 'French Guiana', '594', '2020-01-28 13:08:18'),
(77, 'PF', 'French Polynesia', '689', '2020-01-28 13:08:18'),
(78, 'TF', 'French Southern Territories', '0', '2020-01-28 13:08:18'),
(80, 'GM', 'Gambia The', '220', '2020-01-28 13:08:18'),
(81, 'GE', 'Georgia', '995', '2020-01-28 13:08:18'),
(82, 'DE', 'Germany', '49', '2020-01-28 13:08:18'),
(83, 'GH', 'Ghana', '233', '2020-01-28 13:08:18'),
(84, 'GI', 'Gibraltar', '350', '2020-01-28 13:08:18'),
(85, 'GR', 'Greece', '30', '2020-01-28 13:08:18'),
(86, 'GL', 'Greenland', '299', '2020-01-28 13:08:18'),
(87, 'GD', 'Grenada', '1473', '2020-01-28 13:08:18'),
(88, 'GP', 'Guadeloupe', '590', '2020-01-28 13:08:18'),
(89, 'GU', 'Guam', '1671', '2020-01-28 13:08:18'),
(90, 'GT', 'Guatemala', '502', '2020-01-28 13:08:18'),
(91, 'XU', 'Guernsey and Alderney', '44', '2020-01-28 13:08:18'),
(92, 'GN', 'Guinea', '224', '2020-01-28 13:08:18'),
(93, 'GW', 'Guinea-Bissau', '245', '2020-01-28 13:08:18'),
(94, 'GY', 'Guyana', '592', '2020-01-28 13:08:18'),
(95, 'HT', 'Haiti', '509', '2020-01-28 13:08:18'),
(96, 'HM', 'Heard and McDonald Islands', '0', '2020-01-28 13:08:18'),
(97, 'HN', 'Honduras', '504', '2020-01-28 13:08:18'),
(98, 'HK', 'Hong Kong S.A.R.', '852', '2020-01-28 13:08:18'),
(99, 'HU', 'Hungary', '36', '2020-01-28 13:08:18'),
(100, 'IS', 'Iceland', '354', '2020-01-28 13:08:18'),
(101, 'IN', 'India', '91', '2020-01-28 13:08:18'),
(102, 'ID', 'Indonesia', '62', '2020-01-28 13:08:18'),
(103, 'IR', 'Iran', '98', '2020-01-28 13:08:18'),
(104, 'IQ', 'Iraq', '964', '2020-01-28 13:08:18'),
(105, 'IE', 'Ireland', '353', '2020-01-28 13:08:18'),
(106, 'IL', 'Israel', '972', '2020-01-28 13:08:18'),
(107, 'IT', 'Italy', '39', '2020-01-28 13:08:18'),
(108, 'JM', 'Jamaica', '1876', '2020-01-28 13:08:18'),
(109, 'JP', 'Japan', '81', '2020-01-28 13:08:18'),
(110, 'XJ', 'Jersey', '44', '2020-01-28 13:08:18'),
(111, 'JO', 'Jordan', '962', '2020-01-28 13:08:18'),
(112, 'KZ', 'Kazakhstan', '7', '2020-01-28 13:08:18'),
(113, 'KE', 'Kenya', '254', '2020-01-28 13:08:18'),
(114, 'KI', 'Kiribati', '686', '2020-01-28 13:08:18'),
(115, 'KP', 'Korea North', '850', '2020-01-28 13:08:18'),
(116, 'KR', 'Korea South', '82', '2020-01-28 13:08:18'),
(117, 'KW', 'Kuwait', '965', '2020-01-28 13:08:18'),
(118, 'KG', 'Kyrgyzstan', '996', '2020-01-28 13:08:18'),
(119, 'LA', 'Laos', '856', '2020-01-28 13:08:18'),
(120, 'LV', 'Latvia', '371', '2020-01-28 13:08:18'),
(121, 'LB', 'Lebanon', '961', '2020-01-28 13:08:18'),
(122, 'LS', 'Lesotho', '266', '2020-01-28 13:08:18'),
(123, 'LR', 'Liberia', '231', '2020-01-28 13:08:18'),
(124, 'LY', 'Libya', '218', '2020-01-28 13:08:18'),
(125, 'LI', 'Liechtenstein', '423', '2020-01-28 13:08:18'),
(126, 'LT', 'Lithuania', '370', '2020-01-28 13:08:18'),
(127, 'LU', 'Luxembourg', '352', '2020-01-28 13:08:18'),
(128, 'MO', 'Macau S.A.R.', '853', '2020-01-28 13:08:18'),
(129, 'MK', 'Macedonia', '389', '2020-01-28 13:08:18'),
(130, 'MG', 'Madagascar', '261', '2020-01-28 13:08:18'),
(131, 'MW', 'Malawi', '265', '2020-01-28 13:08:18'),
(132, 'MY', 'Malaysia', '60', '2020-01-28 13:08:18'),
(133, 'MV', 'Maldives', '960', '2020-01-28 13:08:18'),
(134, 'ML', 'Mali', '223', '2020-01-28 13:08:18'),
(135, 'MT', 'Malta', '356', '2020-01-28 13:08:18'),
(136, 'XM', 'Man (Isle of)', '44', '2020-01-28 13:08:18'),
(137, 'MH', 'Marshall Islands', '692', '2020-01-28 13:08:18'),
(138, 'MQ', 'Martinique', '596', '2020-01-28 13:08:18'),
(139, 'MR', 'Mauritania', '222', '2020-01-28 13:08:18'),
(140, 'MU', 'Mauritius', '230', '2020-01-28 13:08:18'),
(141, 'YT', 'Mayotte', '269', '2020-01-28 13:08:18'),
(142, 'MX', 'Mexico', '52', '2020-01-28 13:08:18'),
(143, 'FM', 'Micronesia', '691', '2020-01-28 13:08:18'),
(144, 'MD', 'Moldova', '373', '2020-01-28 13:08:18'),
(145, 'MC', 'Monaco', '377', '2020-01-28 13:08:18'),
(146, 'MN', 'Mongolia', '976', '2020-01-28 13:08:18'),
(147, 'MS', 'Montserrat', '1664', '2020-01-28 13:08:18'),
(148, 'MA', 'Morocco', '212', '2020-01-28 13:08:18'),
(149, 'MZ', 'Mozambique', '258', '2020-01-28 13:08:18'),
(150, 'MM', 'Myanmar', '95', '2020-01-28 13:08:18'),
(151, 'NA', 'Namibia', '264', '2020-01-28 13:08:18'),
(152, 'NR', 'Nauru', '674', '2020-01-28 13:08:18'),
(153, 'NP', 'Nepal', '977', '2020-01-28 13:08:18'),
(154, 'AN', 'Netherlands Antilles', '599', '2020-01-28 13:08:18'),
(155, 'NL', 'Netherlands The', '31', '2020-01-28 13:08:18'),
(156, 'NC', 'New Caledonia', '687', '2020-01-28 13:08:18'),
(157, 'NZ', 'New Zealand', '64', '2020-01-28 13:08:18'),
(158, 'NI', 'Nicaragua', '505', '2020-01-28 13:08:18'),
(159, 'NE', 'Niger', '227', '2020-01-28 13:08:18'),
(160, 'NG', 'Nigeria', '234', '2020-01-28 13:08:18'),
(161, 'NU', 'Niue', '683', '2020-01-28 13:08:18'),
(162, 'NF', 'Norfolk Island', '672', '2020-01-28 13:08:18'),
(163, 'MP', 'Northern Mariana Islands', '1670', '2020-01-28 13:08:18'),
(164, 'NO', 'Norway', '47', '2020-01-28 13:08:18'),
(165, 'OM', 'Oman', '968', '2020-01-28 13:08:18'),
(166, 'PK', 'Pakistan', '92', '2020-01-28 13:08:18'),
(167, 'PW', 'Palau', '680', '2020-01-28 13:08:18'),
(168, 'PS', 'Palestinian Territory Occupied', '970', '2020-01-28 13:08:18'),
(169, 'PA', 'Panama', '507', '2020-01-28 13:08:18'),
(170, 'PG', 'Papua new Guinea', '675', '2020-01-28 13:08:18'),
(171, 'PY', 'Paraguay', '595', '2020-01-28 13:08:18'),
(172, 'PE', 'Peru', '51', '2020-01-28 13:08:18'),
(173, 'PH', 'Philippines', '63', '2020-01-28 13:08:18'),
(174, 'PN', 'Pitcairn Island', '0', '2020-01-28 13:08:18'),
(175, 'PL', 'Poland', '48', '2020-01-28 13:08:18'),
(176, 'PT', 'Portugal', '351', '2020-01-28 13:08:18'),
(177, 'PR', 'Puerto Rico', '1787', '2020-01-28 13:08:18'),
(178, 'QA', 'Qatar', '974', '2020-01-28 13:08:18'),
(179, 'RE', 'Reunion', '262', '2020-01-28 13:08:18'),
(180, 'RO', 'Romania', '40', '2020-01-28 13:08:18'),
(181, 'RU', 'Russia', '70', '2020-01-28 13:08:18'),
(182, 'RW', 'Rwanda', '250', '2020-01-28 13:08:18'),
(183, 'SH', 'Saint Helena', '290', '2020-01-28 13:08:18'),
(184, 'KN', 'Saint Kitts And Nevis', '1869', '2020-01-28 13:08:18'),
(185, 'LC', 'Saint Lucia', '1758', '2020-01-28 13:08:18'),
(186, 'PM', 'Saint Pierre and Miquelon', '508', '2020-01-28 13:08:18'),
(187, 'VC', 'Saint Vincent And The Grenadines', '1784', '2020-01-28 13:08:18'),
(188, 'WS', 'Samoa', '684', '2020-01-28 13:08:18'),
(189, 'SM', 'San Marino', '378', '2020-01-28 13:08:18'),
(190, 'ST', 'Sao Tome and Principe', '239', '2020-01-28 13:08:18'),
(191, 'SA', 'Saudi Arabia', '966', '2020-01-28 13:08:18'),
(192, 'SN', 'Senegal', '221', '2020-01-28 13:08:18'),
(193, 'RS', 'Serbia', '381', '2020-01-28 13:08:18'),
(194, 'SC', 'Seychelles', '248', '2020-01-28 13:08:18'),
(195, 'SL', 'Sierra Leone', '232', '2020-01-28 13:08:18'),
(196, 'SG', 'Singapore', '65', '2020-01-28 13:08:18'),
(197, 'SK', 'Slovakia', '421', '2020-01-28 13:08:18'),
(198, 'SI', 'Slovenia', '386', '2020-01-28 13:08:18'),
(199, 'XG', 'Smaller Territories of the UK', '44', '2020-01-28 13:08:18'),
(200, 'SB', 'Solomon Islands', '677', '2020-01-28 13:08:18'),
(201, 'SO', 'Somalia', '252', '2020-01-28 13:08:18'),
(202, 'ZA', 'South Africa', '27', '2020-01-28 13:08:18'),
(203, 'GS', 'South Georgia', '0', '2020-01-28 13:08:18'),
(204, 'SS', 'South Sudan', '211', '2020-01-28 13:08:18'),
(205, 'ES', 'Spain', '34', '2020-01-28 13:08:18'),
(206, 'LK', 'Sri Lanka', '94', '2020-01-28 13:08:18'),
(207, 'SD', 'Sudan', '249', '2020-01-28 13:08:18'),
(208, 'SR', 'Suriname', '597', '2020-01-28 13:08:18'),
(209, 'SJ', 'Svalbard And Jan Mayen Islands', '47', '2020-01-28 13:08:18'),
(210, 'SZ', 'Swaziland', '268', '2020-01-28 13:08:18'),
(211, 'SE', 'Sweden', '46', '2020-01-28 13:08:18'),
(212, 'CH', 'Switzerland', '41', '2020-01-28 13:08:18'),
(213, 'SY', 'Syria', '963', '2020-01-28 13:08:18'),
(214, 'TW', 'Taiwan', '886', '2020-01-28 13:08:18'),
(215, 'TJ', 'Tajikistan', '992', '2020-01-28 13:08:18'),
(216, 'TZ', 'Tanzania', '255', '2020-01-28 13:08:18'),
(217, 'TH', 'Thailand', '66', '2020-01-28 13:08:18'),
(218, 'TG', 'Togo', '228', '2020-01-28 13:08:18'),
(219, 'TK', 'Tokelau', '690', '2020-01-28 13:08:18'),
(220, 'TO', 'Tonga', '676', '2020-01-28 13:08:18'),
(221, 'TT', 'Trinidad And Tobago', '1868', '2020-01-28 13:08:18'),
(222, 'TN', 'Tunisia', '216', '2020-01-28 13:08:18'),
(223, 'TR', 'Turkey', '90', '2020-01-28 13:08:18'),
(224, 'TM', 'Turkmenistan', '7370', '2020-01-28 13:08:18'),
(225, 'TC', 'Turks And Caicos Islands', '1649', '2020-01-28 13:08:18'),
(226, 'TV', 'Tuvalu', '688', '2020-01-28 13:08:18'),
(227, 'UG', 'Uganda', '256', '2020-01-28 13:08:18'),
(228, 'UA', 'Ukraine', '380', '2020-01-28 13:08:18'),
(229, 'AE', 'United Arab Emirates', '971', '2020-01-28 13:08:18'),
(230, 'GB', 'United Kingdom', '44', '2020-01-28 13:08:18'),
(231, 'US', 'United States', '1', '2020-01-28 13:08:18'),
(232, 'UM', 'United States Minor Outlying Islands', '1', '2020-01-28 13:08:18'),
(233, 'UY', 'Uruguay', '598', '2020-01-28 13:08:18'),
(234, 'UZ', 'Uzbekistan', '998', '2020-01-28 13:08:18'),
(235, 'VU', 'Vanuatu', '678', '2020-01-28 13:08:18'),
(236, 'VA', 'Vatican City State (Holy See)', '39', '2020-01-28 13:08:18'),
(237, 'VE', 'Venezuela', '58', '2020-01-28 13:08:18'),
(238, 'VN', 'Vietnam', '84', '2020-01-28 13:08:18'),
(239, 'VG', 'Virgin Islands (British)', '1284', '2020-01-28 13:08:18'),
(240, 'VI', 'Virgin Islands (US)', '1340', '2020-01-28 13:08:18'),
(241, 'WF', 'Wallis And Futuna Islands', '681', '2020-01-28 13:08:18'),
(242, 'EH', 'Western Sahara', '212', '2020-01-28 13:08:18'),
(243, 'YE', 'Yemen', '967', '2020-01-28 13:08:18'),
(244, 'YU', 'Yugoslavia', '38', '2020-01-28 13:08:18'),
(245, 'ZM', 'Zambia', '260', '2020-01-28 13:08:18'),
(246, 'ZW', 'Zimbabwe', '263', '2020-01-28 13:08:18'),
(247, '', 'Gabon', '0', '2020-01-28 13:08:18');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `coupon_code` varchar(50) NOT NULL,
  `coupon_desc` text NOT NULL,
  `coupon_amt` double NOT NULL,
  `coupon_exp_date` varchar(20) NOT NULL,
  `coupon_min_spend` varchar(100) NOT NULL,
  `coupon_max_spend` varchar(100) NOT NULL,
  `limit_per_user` int(11) NOT NULL,
  `coupon_status` int(11) NOT NULL DEFAULT 1,
  `coupon_addedby` varchar(50) NOT NULL,
  `coupon_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coupon_used`
--

CREATE TABLE `coupon_used` (
  `coupon_used_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `coupon_code` varchar(250) NOT NULL,
  `coupon_used_date` varchar(100) NOT NULL,
  `coupon_used_time` varchar(50) NOT NULL,
  `coupon_used_dis_amt` double NOT NULL,
  `coupon_used_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `mem_sch_id` int(11) DEFAULT NULL,
  `customer_fname` varchar(100) NOT NULL,
  `customer_lname` varchar(100) NOT NULL,
  `customer_dob` varchar(20) NOT NULL,
  `customer_gender` varchar(20) NOT NULL,
  `customer_mobile` varchar(20) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_password` varchar(100) NOT NULL,
  `customer_address` text DEFAULT NULL,
  `customer_city` varchar(250) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `customer_pin` varchar(10) DEFAULT NULL,
  `customer_img` varchar(150) DEFAULT NULL,
  `customer_loyalty_no` varchar(150) DEFAULT NULL,
  `customer_ration_no` varchar(150) NOT NULL,
  `customer_family_info` text NOT NULL,
  `customer_credit_lim` double DEFAULT NULL,
  `customer_points` double NOT NULL DEFAULT 0,
  `customer_status` int(11) NOT NULL DEFAULT 1,
  `customer_ref_by` int(11) NOT NULL DEFAULT 0,
  `customer_addedby` varchar(50) NOT NULL,
  `customer_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer_level`
--

CREATE TABLE `customer_level` (
  `customer_level_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `customer_level_name` varchar(250) NOT NULL,
  `customer_level_price` double NOT NULL,
  `customer_level_desc` text DEFAULT NULL,
  `customer_level_status` int(11) DEFAULT 1,
  `customer_level_addedby` varchar(50) NOT NULL,
  `customer_level_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cust_membership`
--

CREATE TABLE `cust_membership` (
  `cust_mem_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `mem_sch_id` int(11) NOT NULL,
  `cust_mem_start_date` varchar(20) NOT NULL,
  `cust_mem_end_date` varchar(20) NOT NULL,
  `cust_mem_valid_days` int(11) NOT NULL,
  `cust_mem_amt` double NOT NULL,
  `cust_mem_point` double DEFAULT NULL,
  `payment_type_id` int(11) DEFAULT NULL,
  `peyment_ref_no` varchar(250) DEFAULT NULL,
  `razorpay_payment_id` varchar(500) DEFAULT NULL,
  `razorpay_order_id` varchar(500) DEFAULT NULL,
  `cust_mem_status` int(11) NOT NULL DEFAULT 0,
  `cust_mem_addedby` int(11) NOT NULL DEFAULT 0,
  `cust_mem_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `district_id` bigint(20) NOT NULL,
  `country_id` bigint(20) NOT NULL,
  `state_id` bigint(20) NOT NULL,
  `district_name` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `country_id`, `state_id`, `district_name`, `date`) VALUES
(6, 101, 22, 'Kolhapur', '2020-01-29 11:25:22'),
(7, 101, 22, 'Sangali', '2020-01-29 11:25:57'),
(8, 101, 22, 'Ahmednagar', '2020-02-01 08:57:58'),
(9, 101, 22, 'Akola', '2020-02-01 08:58:24'),
(10, 101, 22, 'Amravati', '2020-02-01 08:58:43'),
(11, 101, 22, 'Beed', '2020-02-01 09:00:44'),
(12, 101, 22, 'Aurangabad', '2020-02-01 09:01:39'),
(13, 101, 22, 'Bhandara', '2020-02-01 09:02:02'),
(14, 101, 22, 'Buldhana', '2020-02-01 09:02:20'),
(15, 101, 22, 'Chandrapur', '2020-02-01 09:02:45'),
(16, 101, 22, 'Dhule', '2020-02-01 09:03:04'),
(17, 101, 22, 'Gadchiroli', '2020-02-01 09:03:40'),
(18, 101, 22, 'Gondia', '2020-02-01 09:04:02'),
(19, 101, 22, 'Hingoli', '2020-02-01 09:04:24'),
(20, 101, 22, 'Jalgaon', '2020-02-01 09:04:49'),
(21, 101, 22, 'Jalna', '2020-02-01 09:05:14'),
(22, 101, 22, 'Latur', '2020-02-01 09:05:36'),
(23, 101, 22, 'Mumbai City', '2020-02-01 09:05:59'),
(24, 101, 22, 'Mumbai Suburban', '2020-02-01 09:06:20'),
(25, 101, 22, 'Nagpur', '2020-02-01 09:06:49'),
(26, 101, 22, 'Nanded', '2020-02-01 09:07:17'),
(27, 101, 22, 'Nandurbar', '2020-02-01 09:07:38'),
(28, 101, 22, 'Nashik', '2020-02-01 09:07:57'),
(29, 101, 22, 'Osmanabad', '2020-02-01 09:08:22'),
(30, 101, 22, 'Palghar', '2020-02-01 09:09:02'),
(31, 101, 22, 'Parbhani', '2020-02-01 09:09:22'),
(32, 101, 22, 'Pune', '2020-02-01 09:09:42'),
(33, 101, 22, 'Raigad', '2020-02-01 09:10:03'),
(34, 101, 22, 'Ratnagiri', '2020-02-01 09:10:21'),
(35, 101, 22, 'Satara', '2020-02-01 09:10:42'),
(36, 101, 22, 'Sindhudurg', '2020-02-01 09:11:07'),
(37, 101, 22, 'Solapur', '2020-02-01 09:11:27'),
(38, 101, 22, 'Thane', '2020-02-01 09:11:46'),
(39, 101, 22, 'Wardha', '2020-02-01 09:12:03'),
(40, 101, 22, 'Washim', '2020-02-01 09:12:21'),
(41, 101, 22, 'Yavatmal', '2020-02-01 09:12:42');

-- --------------------------------------------------------

--
-- Table structure for table `employee_cash`
--

CREATE TABLE `employee_cash` (
  `employee_cash_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `employee_user_id` int(11) NOT NULL,
  `employee_cash_date` varchar(20) NOT NULL,
  `employee_cash_amt` double NOT NULL,
  `employee_cash_desc` text DEFAULT NULL,
  `employee_cash_status` int(11) NOT NULL DEFAULT 1,
  `employee_cash_addedby` varchar(50) NOT NULL,
  `employee_cash_added_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `franchise`
--

CREATE TABLE `franchise` (
  `franchise_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `franchise_type_id` int(11) DEFAULT NULL COMMENT '3=Retailer, 4=Vendor',
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `tahasil_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `franchise_name` varchar(250) DEFAULT NULL,
  `franchise_address` text DEFAULT NULL,
  `franchise_gender` varchar(50) DEFAULT NULL,
  `franchise_email` varchar(150) DEFAULT NULL,
  `franchise_mobile` varchar(15) DEFAULT NULL,
  `franchise_password` varchar(50) DEFAULT NULL,
  `franchise_pay_terms` text DEFAULT NULL,
  `franchise_commission` varchar(250) DEFAULT NULL,
  `franchise_bank` varchar(250) DEFAULT NULL,
  `franchise_branch` varchar(250) DEFAULT NULL,
  `franchise_ifsc` varchar(50) DEFAULT NULL,
  `franchise_acc_no` varchar(50) DEFAULT NULL,
  `franchise_status` int(11) NOT NULL DEFAULT 1,
  `franchise_addedby` varchar(50) NOT NULL,
  `franchise_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `gallery_name` varchar(250) NOT NULL,
  `gallery_img` varchar(250) NOT NULL,
  `gallery_status` int(11) NOT NULL DEFAULT 1,
  `gallery_addedby` varchar(50) NOT NULL,
  `gallery_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loyalty_card`
--

CREATE TABLE `loyalty_card` (
  `loyalty_card_id` int(11) NOT NULL,
  `loyalty_card_no` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loyalty_card`
--

INSERT INTO `loyalty_card` (`loyalty_card_id`, `loyalty_card_no`) VALUES
(1, '3222560858278900'),
(2, '2832560858278900'),
(3, '3352560858278900'),
(4, '3762560858278900'),
(5, '3692560858278900'),
(6, '1520560858278900'),
(7, '2792560858278900'),
(8, '2722560858278900'),
(9, '3332560858278900'),
(10, '3712560858278900'),
(11, '2892560858278900'),
(12, '3232560858278900'),
(13, '1462560858278900'),
(14, '1992560858278900'),
(15, '2822560858278900'),
(16, '2922560858278900'),
(17, '3742560858278900'),
(18, '1982560858278900'),
(19, '3782560858278900'),
(20, '3802560858278900'),
(21, '2672560858278900'),
(22, '3033560858278900'),
(23, '2902560858278900'),
(24, '2622560858278900'),
(25, '1432560858278900'),
(26, '2642560858278900'),
(27, '2702560858278900'),
(28, '3532560858278900'),
(29, '2502560858278900'),
(30, '3282560858278900'),
(31, '1472560858278900'),
(32, '1502560858278900'),
(33, '1942560858278900'),
(34, '2662560858278900'),
(35, '1522560858278900'),
(36, '2282560858278900'),
(37, '1642560858278900'),
(38, '2862560858278900'),
(39, '2092560858278920'),
(40, '2582560858278900'),
(41, '2542560858278900'),
(42, '3272560858278900'),
(43, '3382560858278900'),
(44, '3322560858278900'),
(45, '3842560858278900'),
(46, '3552560858278900'),
(47, '3162560858278900'),
(48, '2682560858278900'),
(49, '3302560858278900'),
(50, '3292560858278900'),
(51, '3542560858278900'),
(52, '3402560858278900'),
(53, '2242560858278900'),
(54, '3452560858278900'),
(55, '1482560858278900'),
(56, '1120560858278900'),
(57, '1962560858278900'),
(58, '2042560858278900'),
(59, '1582560858278900'),
(60, '2842560858278900'),
(61, '3522560858278900'),
(62, '3262560858278900'),
(63, '3392560858278900'),
(64, '2332560858278900'),
(65, '2882560858278900'),
(66, '2272560858278900'),
(67, '3182560858278900'),
(68, '3862560858278900'),
(69, '3022560858278900'),
(70, '3652560858278900'),
(71, '2742560858278900'),
(72, '2952560858278900'),
(73, '2772560858278900'),
(74, '3832560858278900'),
(75, '3772560858278900'),
(76, '3362560858278900'),
(77, '3752560858278900'),
(78, '1972560858278900'),
(79, '120560858278903'),
(80, '3142560858278900'),
(81, '3792560858278900'),
(82, '2492560858278900'),
(83, '2020560858278900'),
(84, '3132560858278900'),
(85, '3012560858278900'),
(86, '2302560858278900'),
(87, '2712560858278900'),
(88, '3052560858278900'),
(89, '3122560858278900'),
(90, '2932560858278900'),
(91, '2442560858278900'),
(92, '3682560858278900'),
(93, '1912560858278900'),
(94, '1452560858278900'),
(95, '3812560858278900'),
(96, '2012560858278900'),
(97, '3212560858278900'),
(98, '3112560858278900'),
(99, '2432560858278900'),
(100, '3502560858278900'),
(101, '2732560858278900'),
(102, '3722560858278900'),
(103, '2002560858278900'),
(104, '1532560858278900'),
(105, '1512560858278900'),
(106, '1492560858278900'),
(107, '2652560858278900'),
(108, '3702560858278900'),
(109, '3062560858278900'),
(110, '3602560858278900'),
(111, '1442560858278900'),
(112, '3562560858278900'),
(113, '2522560858278900'),
(114, '2632560858278900'),
(115, '3092560858278900'),
(116, '2320560858278900'),
(117, '2372560858278900'),
(118, '2342560858278900'),
(119, '3442560858278900'),
(120, '2692560858278900'),
(121, '3152560858278900'),
(122, '3582560858278900'),
(123, '2232560858278900'),
(124, '1932560858278900'),
(125, '1652560858278900'),
(126, '3852560858278900'),
(127, '3822560858278900'),
(128, '3632560858278900'),
(129, '2120560858278900'),
(130, '3512560858278900'),
(131, '2942560858278900'),
(132, '2472560858278900'),
(133, '3422560858278900'),
(134, '2402560858278900'),
(135, '2462560858278900'),
(136, '2322560858278900'),
(137, '3172560858278900'),
(138, '3432560858278900'),
(139, '3412560858278900'),
(140, '2292560858278900'),
(141, '2032560858278900'),
(142, '2262560858278900'),
(143, '2872560858278900'),
(144, '2802560858278900'),
(145, '2392560858278900'),
(146, '3572560858278900'),
(147, '2782560858278900'),
(148, '3042560858278900'),
(149, '2112560858278900'),
(150, '1620560858278900'),
(151, '1720560858278900'),
(152, '2420560858278900'),
(153, '3612560858278900'),
(154, '2972560858278900'),
(155, '3002560858278900'),
(156, '1920560858278900'),
(157, '2962560858278900'),
(158, '3102560858278900'),
(159, '2982560858278900'),
(160, '2992560858278900'),
(161, '2552560858278900'),
(162, '3472560858278900'),
(163, '3642560858278900'),
(164, '3672560858278900'),
(165, '2535560858278900'),
(166, '3462560858278900'),
(167, '3342560858278900'),
(168, '3482560858278900'),
(169, '2252560858278900'),
(170, '1220560858278900'),
(171, '3202560858278900'),
(172, '3492560858278900'),
(173, '2022560858278900'),
(174, '2612560858278900'),
(175, '1902560858278900'),
(176, '3242560858278900'),
(177, '3622560858278900'),
(178, '3662560858278900'),
(179, '3732560858278900'),
(180, '3592560858278900'),
(181, '320560558278903'),
(182, '3072560858278900'),
(183, '2122560858278900'),
(184, '1602560858278900'),
(185, '2452560858278900'),
(186, '2852560858278900'),
(187, '1420560858278900'),
(188, '1892560858278900'),
(189, '2562560858278900'),
(190, '2422560858278900'),
(191, '3252560858278900'),
(192, '2725560858278900'),
(193, '3192560858278900'),
(194, '2382560858278900'),
(195, '2572560858278900'),
(196, '1622560858278900'),
(197, '2592560858278900'),
(198, '3082560858278900'),
(199, '2762560858278900'),
(200, '2482560858278900'),
(201, '2602560858278900'),
(202, '3372560858278900'),
(203, '1952560858278900'),
(204, '2312560858278900'),
(205, '2102560858278900'),
(206, '2812560858278900'),
(207, '2512560858278900'),
(208, '2352560858278900'),
(209, '2220560858278900'),
(210, '2912560858278900'),
(211, '2362560858278900');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `manufacturer_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `manufacturer_name` varchar(250) DEFAULT NULL,
  `manufacturer_info` text DEFAULT NULL,
  `manufacturer_sequence` int(11) NOT NULL,
  `manufacturer_img` varchar(150) DEFAULT NULL,
  `manufacturer_status` int(11) NOT NULL DEFAULT 1,
  `manufacturer_addedby` varchar(50) NOT NULL,
  `manufacturer_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `membership_scheme`
--

CREATE TABLE `membership_scheme` (
  `mem_sch_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `mem_sch_name` varchar(250) DEFAULT NULL,
  `mem_sch_amt` double DEFAULT NULL,
  `mem_sch_valid` int(11) DEFAULT NULL COMMENT 'Valid Days',
  `mem_sch_point` varchar(20) NOT NULL,
  `mem_sch_status` int(11) NOT NULL DEFAULT 1,
  `mem_sch_addedby` varchar(50) DEFAULT NULL,
  `mem_sch_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mem_sch_details`
--

CREATE TABLE `mem_sch_details` (
  `mem_sch_det_id` int(11) NOT NULL,
  `mem_sch_id` int(11) NOT NULL,
  `mem_sch_det_feature` text NOT NULL,
  `mem_sch_det_status` int(11) DEFAULT NULL,
  `mem_sch_det_val` varchar(250) NOT NULL,
  `mem_sch_det_addedby` varchar(50) NOT NULL,
  `mem_sch_det_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `offer_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `offer_name` varchar(250) NOT NULL,
  `offer_img` varchar(250) NOT NULL,
  `offer_status` int(11) NOT NULL DEFAULT 1,
  `offer_addedby` varchar(50) NOT NULL,
  `offer_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_online_payment`
--

CREATE TABLE `order_online_payment` (
  `online_payment_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `razorpay_payment_id` varchar(500) DEFAULT NULL,
  `razorpay_order_id` text DEFAULT NULL,
  `cart_amount` double NOT NULL,
  `shipping_amt` double NOT NULL,
  `total_pay_amt` double NOT NULL,
  `coupon_use_amt` double NOT NULL,
  `point_use_amt` double NOT NULL,
  `online_payment_amt` double NOT NULL,
  `online_payment_date` varchar(20) NOT NULL,
  `online_payment_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_pro`
--

CREATE TABLE `order_pro` (
  `order_pro_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `pro_attri_id` int(11) NOT NULL,
  `order_pro_name` varchar(250) DEFAULT NULL,
  `order_pro_weight` double DEFAULT NULL,
  `order_pro_tot_weight` double DEFAULT NULL,
  `order_pro_unit` varchar(50) DEFAULT NULL,
  `order_pro_mrp` double DEFAULT NULL,
  `order_pro_price` double DEFAULT NULL,
  `order_pro_dis_per` double DEFAULT NULL,
  `order_pro_dis_amt` double DEFAULT NULL,
  `order_pro_gst_per` double DEFAULT NULL,
  `order_pro_gst_amt` double DEFAULT NULL,
  `order_pro_qty` double DEFAULT NULL,
  `order_pro_basic_amt` double DEFAULT NULL,
  `order_pro_amt` double DEFAULT NULL,
  `order_pro_date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `order_status_id` int(11) NOT NULL,
  `order_status_name` varchar(250) NOT NULL,
  `order_status_addedby` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`order_status_id`, `order_status_name`, `order_status_addedby`) VALUES
(1, 'Order Received', '1'),
(2, 'Validate Address', '1'),
(3, 'Confirm Inventory', '1'),
(4, 'Packaging ', '1'),
(5, 'Pickup', '1'),
(6, 'Delivered', '1');

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `order_id` int(11) NOT NULL,
  `order_no` int(11) NOT NULL,
  `order_date` varchar(50) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `order_cust_fname` varchar(100) NOT NULL,
  `order_cust_lname` varchar(100) NOT NULL,
  `order_cust_addr` text NOT NULL,
  `order_cust_city` varchar(250) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `order_cust_pin` varchar(10) NOT NULL,
  `order_cust_mob` varchar(20) NOT NULL,
  `order_cust_email` varchar(250) NOT NULL,
  `order_amount` double NOT NULL,
  `order_shipping_amt` double NOT NULL,
  `order_gst` double NOT NULL,
  `order_total_amount` double NOT NULL,
  `order_total_item` int(11) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT 1,
  `is_order_complete` int(11) NOT NULL DEFAULT 0,
  `payment_status` int(11) NOT NULL DEFAULT 0,
  `payment_type` int(11) NOT NULL DEFAULT 2 COMMENT '1=Online, 2=Cash On Delivery',
  `order_assign_to` int(11) NOT NULL DEFAULT 0,
  `order_addedby` varchar(50) NOT NULL,
  `order_added_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_upl`
--

CREATE TABLE `order_upl` (
  `order_upl_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_upl_img` varchar(250) NOT NULL,
  `order_upl_status` int(11) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Inactive, 2=Submited',
  `order_upl_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE `payment_type` (
  `payment_type_id` int(11) NOT NULL,
  `payment_type_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_type`
--

INSERT INTO `payment_type` (`payment_type_id`, `payment_type_name`) VALUES
(1, 'Cash'),
(2, 'Online Transfer');

-- --------------------------------------------------------

--
-- Table structure for table `point_add`
--

CREATE TABLE `point_add` (
  `point_add_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `point_add_type` int(11) NOT NULL COMMENT '1=Wallet, 2=Cust Ref',
  `point_add_ref_id` int(11) NOT NULL COMMENT 'Cust_id, wallet_add_id',
  `point_add_cnt` int(11) NOT NULL COMMENT 'added points count',
  `point_add_date` varchar(20) NOT NULL,
  `point_add_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `point_use`
--

CREATE TABLE `point_use` (
  `point_use_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `point_use_cnt` double NOT NULL,
  `point_use_date` varchar(50) NOT NULL,
  `point_use_time` varchar(50) DEFAULT NULL,
  `point_use_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `product_name` varchar(250) DEFAULT NULL,
  `manufacturer_id` int(11) DEFAULT NULL,
  `main_category_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `is_feature` int(11) NOT NULL DEFAULT 0,
  `product_mrp` double DEFAULT NULL,
  `product_price` double DEFAULT NULL,
  `product_discount` double DEFAULT NULL,
  `product_discount_amt` double DEFAULT NULL,
  `tax_rate` double DEFAULT 0,
  `min_ord_limit` double DEFAULT 1,
  `max_ord_limit` double DEFAULT 0,
  `product_reward` varchar(100) DEFAULT NULL,
  `product_weight` double DEFAULT NULL,
  `product_unit` varchar(150) DEFAULT NULL,
  `product_img` varchar(150) DEFAULT NULL,
  `flash_sale` varchar(50) DEFAULT NULL,
  `flash_sale_price` double DEFAULT NULL,
  `flash_sale_start_date` varchar(20) DEFAULT NULL,
  `flash_sale_start_time` varchar(20) DEFAULT NULL,
  `flash_sale_end_date` varchar(20) DEFAULT NULL,
  `flash_sale_end_time` varchar(20) DEFAULT NULL,
  `flash_sale_status` int(11) NOT NULL DEFAULT 0,
  `pro_special` varchar(50) NOT NULL DEFAULT 'No',
  `pro_special_price` double DEFAULT NULL,
  `pro_special_exp_date` varchar(20) NOT NULL,
  `pro_special_status` int(11) NOT NULL DEFAULT 1,
  `product_details` text DEFAULT NULL,
  `product_area` varchar(350) NOT NULL,
  `use_attribute` int(11) NOT NULL DEFAULT 0,
  `product_status` int(11) NOT NULL DEFAULT 1,
  `product_addedby` varchar(50) DEFAULT NULL,
  `product_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute`
--

CREATE TABLE `product_attribute` (
  `pro_attri_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `pro_attri_name` varchar(250) DEFAULT NULL,
  `pro_attri_weight` double DEFAULT NULL,
  `pro_attri_unit` varchar(50) DEFAULT NULL,
  `pro_attri_mrp` double DEFAULT NULL,
  `pro_attri_price` double NOT NULL,
  `pro_attri_dis_per` double DEFAULT NULL,
  `pro_attri_dis_amt` double DEFAULT NULL,
  `pro_attri_status` int(11) NOT NULL DEFAULT 1,
  `pro_attri_addedby` varchar(50) NOT NULL,
  `pro_attri_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `product_images_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_images_name` varchar(150) DEFAULT NULL,
  `product_images_addedby` varchar(50) DEFAULT NULL,
  `product_images_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL,
  `purchase_no` int(11) NOT NULL,
  `purchase_date` varchar(20) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `purchase_amount` double NOT NULL,
  `purchase_shipping_amt` double NOT NULL,
  `purchase_gst` double NOT NULL DEFAULT 0,
  `purchase_total_amount` double NOT NULL,
  `purchase_status` int(11) NOT NULL DEFAULT 1,
  `purchase_addedby` varchar(50) NOT NULL,
  `purchase_added_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_pro`
--

CREATE TABLE `purchase_pro` (
  `purchase_pro_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `pro_attri_id` int(11) NOT NULL,
  `purchase_pro_name` varchar(250) DEFAULT NULL,
  `purchase_pro_weight` double DEFAULT NULL,
  `purchase_pro_tot_weight` double DEFAULT NULL,
  `purchase_pro_unit` varchar(50) DEFAULT NULL,
  `purchase_pro_price` double DEFAULT NULL,
  `purchase_pro_gst_per` double DEFAULT 0,
  `purchase_pro_gst_amt` double DEFAULT 0,
  `purchase_pro_qty` double DEFAULT NULL,
  `purchase_pro_basic_amt` double DEFAULT NULL,
  `purchase_pro_amt` double DEFAULT NULL,
  `purchase_pro_date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `receipt_id` int(11) NOT NULL,
  `receipt_no` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `receipt_date` varchar(20) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `outstanding_amt` double NOT NULL,
  `receipt_amt` double NOT NULL,
  `receipt_desc` text NOT NULL,
  `receipt_status` int(11) NOT NULL DEFAULT 1,
  `receipt_addedby` varchar(50) NOT NULL,
  `receipt_added_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `req_product`
--

CREATE TABLE `req_product` (
  `req_product_id` int(11) NOT NULL,
  `req_product_name` varchar(250) NOT NULL,
  `req_product_person` varchar(350) NOT NULL,
  `req_product_email` varchar(150) NOT NULL,
  `req_product_mobile` varchar(20) NOT NULL,
  `req_product_msg` text NOT NULL,
  `req_product_status` int(11) NOT NULL DEFAULT 1,
  `req_product_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reseller_reg`
--

CREATE TABLE `reseller_reg` (
  `reseller_reg_id` int(11) NOT NULL,
  `reseller_reg_name` varchar(250) NOT NULL,
  `reseller_reg_addr` text NOT NULL,
  `reseller_reg_gender` varchar(25) NOT NULL,
  `reseller_reg_mob` varchar(20) NOT NULL,
  `reseller_reg_email` varchar(250) NOT NULL,
  `reseller_reg_status` int(11) NOT NULL DEFAULT 0,
  `reseller_reg_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `role_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `company_id`, `role_name`) VALUES
(1, NULL, 'Admin'),
(2, NULL, 'Office-Employee'),
(3, NULL, 'Reseller / Freelancer'),
(4, NULL, 'Vendor'),
(5, NULL, 'Sales-Executive'),
(6, NULL, 'Cash-Employee'),
(7, NULL, 'Delivery-Boy'),
(8, NULL, 'Store-User');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_title` varchar(250) DEFAULT NULL,
  `slider_possition` int(11) DEFAULT NULL,
  `slider_img` varchar(250) DEFAULT NULL,
  `slider_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_title`, `slider_possition`, `slider_img`, `slider_status`) VALUES
(1, 'Slider1', 1, 'slider_1_1592979174.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_name` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `country_id`, `state_name`, `date`) VALUES
(1, 101, 'Andaman and Nicobar Islands', '2020-01-28 13:11:43'),
(2, 101, 'Andhra Pradesh', '2020-01-28 13:11:43'),
(3, 101, 'Arunachal Pradesh', '2020-01-28 13:11:43'),
(4, 101, 'Assam', '2020-01-28 13:11:43'),
(5, 101, 'Bihar', '2020-01-28 13:11:43'),
(6, 101, 'Chandigarh', '2020-01-28 13:11:43'),
(7, 101, 'Chhattisgarh', '2020-01-28 13:11:43'),
(8, 101, 'Dadra and Nagar Haveli', '2020-01-28 13:11:43'),
(9, 101, 'Daman and Diu', '2020-01-28 13:11:43'),
(10, 101, 'Delhi', '2020-01-28 13:11:43'),
(11, 101, 'Goa', '2020-01-28 13:11:43'),
(12, 101, 'Gujarat', '2020-01-28 13:11:43'),
(13, 101, 'Haryana', '2020-01-28 13:11:43'),
(14, 101, 'Himachal Pradesh', '2020-01-28 13:11:43'),
(15, 101, 'Jammu and Kashmir', '2020-01-28 13:11:43'),
(16, 101, 'Jharkhand', '2020-01-28 13:11:43'),
(17, 101, 'Karnataka', '2020-01-28 13:11:43'),
(18, 101, 'Kenmore', '2020-01-28 13:11:43'),
(19, 101, 'Kerala', '2020-01-28 13:11:43'),
(20, 101, 'Lakshadweep', '2020-01-28 13:11:43'),
(21, 101, 'Madhya Pradesh', '2020-01-28 13:11:43'),
(22, 101, 'Maharashtra', '2020-01-28 13:11:43'),
(23, 101, 'Manipur', '2020-01-28 13:11:43'),
(24, 101, 'Meghalaya', '2020-01-28 13:11:43'),
(25, 101, 'Mizoram', '2020-01-28 13:11:43'),
(26, 101, 'Nagaland', '2020-01-28 13:11:43'),
(27, 101, 'Narora', '2020-01-28 13:11:43'),
(28, 101, 'Natwar', '2020-01-28 13:11:43'),
(29, 101, 'Odisha', '2020-01-28 13:11:43'),
(30, 101, 'Paschim Medinipur', '2020-01-28 13:11:43'),
(31, 101, 'Pondicherry', '2020-01-28 13:11:43'),
(32, 101, 'Punjab', '2020-01-28 13:11:43'),
(33, 101, 'Rajasthan', '2020-01-28 13:11:43'),
(34, 101, 'Sikkim', '2020-01-28 13:11:43'),
(35, 101, 'Tamil Nadu', '2020-01-28 13:11:43'),
(36, 101, 'Telangana', '2020-01-28 13:11:43'),
(37, 101, 'Tripura', '2020-01-28 13:11:43'),
(38, 101, 'Uttar Pradesh', '2020-01-28 13:11:43'),
(39, 101, 'Uttarakhand', '2020-01-28 13:11:43'),
(40, 101, 'Vaishali', '2020-01-28 13:11:43'),
(41, 101, 'West Bengal', '2020-01-28 13:11:43'),
(42, 1, 'Badakhshan', '2020-01-28 13:11:43'),
(43, 1, 'Badgis', '2020-01-28 13:11:43'),
(44, 1, 'Baglan', '2020-01-28 13:11:43'),
(45, 1, 'Balkh', '2020-01-28 13:11:43'),
(46, 1, 'Bamiyan', '2020-01-28 13:11:43'),
(47, 1, 'Farah', '2020-01-28 13:11:43'),
(48, 1, 'Faryab', '2020-01-28 13:11:43'),
(49, 1, 'Gawr', '2020-01-28 13:11:43'),
(50, 1, 'Gazni', '2020-01-28 13:11:43'),
(51, 1, 'Herat', '2020-01-28 13:11:43'),
(52, 1, 'Hilmand', '2020-01-28 13:11:43'),
(53, 1, 'Jawzjan', '2020-01-28 13:11:43'),
(54, 1, 'Kabul', '2020-01-28 13:11:43'),
(55, 1, 'Kapisa', '2020-01-28 13:11:43'),
(56, 1, 'Khawst', '2020-01-28 13:11:43'),
(57, 1, 'Kunar', '2020-01-28 13:11:43'),
(58, 1, 'Lagman', '2020-01-28 13:11:43'),
(59, 1, 'Lawghar', '2020-01-28 13:11:43'),
(60, 1, 'Nangarhar', '2020-01-28 13:11:43'),
(61, 1, 'Nimruz', '2020-01-28 13:11:43'),
(62, 1, 'Nuristan', '2020-01-28 13:11:43'),
(63, 1, 'Paktika', '2020-01-28 13:11:43'),
(64, 1, 'Paktiya', '2020-01-28 13:11:43'),
(65, 1, 'Parwan', '2020-01-28 13:11:43'),
(66, 1, 'Qandahar', '2020-01-28 13:11:43'),
(67, 1, 'Qunduz', '2020-01-28 13:11:43'),
(68, 1, 'Samangan', '2020-01-28 13:11:43'),
(69, 1, 'Sar-e Pul', '2020-01-28 13:11:43'),
(70, 1, 'Takhar', '2020-01-28 13:11:43'),
(71, 1, 'Uruzgan', '2020-01-28 13:11:43'),
(72, 1, 'Wardag', '2020-01-28 13:11:43'),
(73, 1, 'Zabul', '2020-01-28 13:11:43'),
(74, 2, 'Berat', '2020-01-28 13:11:43'),
(75, 2, 'Bulqize', '2020-01-28 13:11:43'),
(76, 2, 'Delvine', '2020-01-28 13:11:43'),
(77, 2, 'Devoll', '2020-01-28 13:11:43'),
(78, 2, 'Dibre', '2020-01-28 13:11:43'),
(79, 2, 'Durres', '2020-01-28 13:11:43'),
(80, 2, 'Elbasan', '2020-01-28 13:11:43'),
(81, 2, 'Fier', '2020-01-28 13:11:43'),
(82, 2, 'Gjirokaster', '2020-01-28 13:11:43'),
(83, 2, 'Gramsh', '2020-01-28 13:11:43'),
(84, 2, 'Has', '2020-01-28 13:11:43'),
(85, 2, 'Kavaje', '2020-01-28 13:11:43'),
(86, 2, 'Kolonje', '2020-01-28 13:11:43'),
(87, 2, 'Korce', '2020-01-28 13:11:43'),
(88, 2, 'Kruje', '2020-01-28 13:11:43'),
(89, 2, 'Kucove', '2020-01-28 13:11:43'),
(90, 2, 'Kukes', '2020-01-28 13:11:43'),
(91, 2, 'Kurbin', '2020-01-28 13:11:43'),
(92, 2, 'Lezhe', '2020-01-28 13:11:43'),
(93, 2, 'Librazhd', '2020-01-28 13:11:43'),
(94, 2, 'Lushnje', '2020-01-28 13:11:43'),
(95, 2, 'Mallakaster', '2020-01-28 13:11:43'),
(96, 2, 'Malsi e Madhe', '2020-01-28 13:11:43'),
(97, 2, 'Mat', '2020-01-28 13:11:43'),
(98, 2, 'Mirdite', '2020-01-28 13:11:43'),
(99, 2, 'Peqin', '2020-01-28 13:11:43'),
(100, 2, 'Permet', '2020-01-28 13:11:43'),
(101, 2, 'Pogradec', '2020-01-28 13:11:43'),
(102, 2, 'Puke', '2020-01-28 13:11:43'),
(103, 2, 'Sarande', '2020-01-28 13:11:43'),
(104, 2, 'Shkoder', '2020-01-28 13:11:43'),
(105, 2, 'Skrapar', '2020-01-28 13:11:43'),
(106, 2, 'Tepelene', '2020-01-28 13:11:43'),
(107, 2, 'Tirane', '2020-01-28 13:11:43'),
(108, 2, 'Tropoje', '2020-01-28 13:11:43'),
(109, 2, 'Vlore', '2020-01-28 13:11:43'),
(110, 3, '\'Ayn Daflah', '2020-01-28 13:11:43'),
(111, 3, '\'Ayn Tamushanat', '2020-01-28 13:11:43'),
(112, 3, 'Adrar', '2020-01-28 13:11:43'),
(113, 3, 'Algiers', '2020-01-28 13:11:43'),
(114, 3, 'Annabah', '2020-01-28 13:11:43'),
(115, 3, 'Bashshar', '2020-01-28 13:11:43'),
(116, 3, 'Batnah', '2020-01-28 13:11:43'),
(117, 3, 'Bijayah', '2020-01-28 13:11:43'),
(118, 3, 'Biskrah', '2020-01-28 13:11:43'),
(119, 3, 'Blidah', '2020-01-28 13:11:43'),
(120, 3, 'Buirah', '2020-01-28 13:11:43'),
(121, 3, 'Bumardas', '2020-01-28 13:11:43'),
(122, 3, 'Burj Bu Arririj', '2020-01-28 13:11:43'),
(123, 3, 'Ghalizan', '2020-01-28 13:11:43'),
(124, 3, 'Ghardayah', '2020-01-28 13:11:43'),
(125, 3, 'Ilizi', '2020-01-28 13:11:43'),
(126, 3, 'Jijili', '2020-01-28 13:11:43'),
(127, 3, 'Jilfah', '2020-01-28 13:11:43'),
(128, 3, 'Khanshalah', '2020-01-28 13:11:43'),
(129, 3, 'Masilah', '2020-01-28 13:11:43'),
(130, 3, 'Midyah', '2020-01-28 13:11:43'),
(131, 3, 'Milah', '2020-01-28 13:11:43'),
(132, 3, 'Muaskar', '2020-01-28 13:11:43'),
(133, 3, 'Mustaghanam', '2020-01-28 13:11:43'),
(134, 3, 'Naama', '2020-01-28 13:11:43'),
(135, 3, 'Oran', '2020-01-28 13:11:43'),
(136, 3, 'Ouargla', '2020-01-28 13:11:43'),
(137, 3, 'Qalmah', '2020-01-28 13:11:43'),
(138, 3, 'Qustantinah', '2020-01-28 13:11:43'),
(139, 3, 'Sakikdah', '2020-01-28 13:11:43'),
(140, 3, 'Satif', '2020-01-28 13:11:43'),
(141, 3, 'Sayda\'', '2020-01-28 13:11:43'),
(142, 3, 'Sidi ban-al-\'Abbas', '2020-01-28 13:11:43'),
(143, 3, 'Suq Ahras', '2020-01-28 13:11:43'),
(144, 3, 'Tamanghasat', '2020-01-28 13:11:43'),
(145, 3, 'Tibazah', '2020-01-28 13:11:43'),
(146, 3, 'Tibissah', '2020-01-28 13:11:43'),
(147, 3, 'Tilimsan', '2020-01-28 13:11:43'),
(148, 3, 'Tinduf', '2020-01-28 13:11:43'),
(149, 3, 'Tisamsilt', '2020-01-28 13:11:43'),
(150, 3, 'Tiyarat', '2020-01-28 13:11:43'),
(151, 3, 'Tizi Wazu', '2020-01-28 13:11:43'),
(152, 3, 'Umm-al-Bawaghi', '2020-01-28 13:11:43'),
(153, 3, 'Wahran', '2020-01-28 13:11:43'),
(154, 3, 'Warqla', '2020-01-28 13:11:43'),
(155, 3, 'Wilaya d Alger', '2020-01-28 13:11:43'),
(156, 3, 'Wilaya de Bejaia', '2020-01-28 13:11:43'),
(157, 3, 'Wilaya de Constantine', '2020-01-28 13:11:43'),
(158, 3, 'al-Aghwat', '2020-01-28 13:11:43'),
(159, 3, 'al-Bayadh', '2020-01-28 13:11:43'),
(160, 3, 'al-Jaza\'ir', '2020-01-28 13:11:43'),
(161, 3, 'al-Wad', '2020-01-28 13:11:43'),
(162, 3, 'ash-Shalif', '2020-01-28 13:11:43'),
(163, 3, 'at-Tarif', '2020-01-28 13:11:43'),
(164, 4, 'Eastern', '2020-01-28 13:11:43'),
(165, 4, 'Manu\'a', '2020-01-28 13:11:43'),
(166, 4, 'Swains Island', '2020-01-28 13:11:43'),
(167, 4, 'Western', '2020-01-28 13:11:43'),
(168, 5, 'Andorra la Vella', '2020-01-28 13:11:43'),
(169, 5, 'Canillo', '2020-01-28 13:11:43'),
(170, 5, 'Encamp', '2020-01-28 13:11:43'),
(171, 5, 'La Massana', '2020-01-28 13:11:43'),
(172, 5, 'Les Escaldes', '2020-01-28 13:11:43'),
(173, 5, 'Ordino', '2020-01-28 13:11:43'),
(174, 5, 'Sant Julia de Loria', '2020-01-28 13:11:43'),
(175, 6, 'Bengo', '2020-01-28 13:11:43'),
(176, 6, 'Benguela', '2020-01-28 13:11:43'),
(177, 6, 'Bie', '2020-01-28 13:11:43'),
(178, 6, 'Cabinda', '2020-01-28 13:11:43'),
(179, 6, 'Cunene', '2020-01-28 13:11:43'),
(180, 6, 'Huambo', '2020-01-28 13:11:43'),
(181, 6, 'Huila', '2020-01-28 13:11:43'),
(182, 6, 'Kuando-Kubango', '2020-01-28 13:11:43'),
(183, 6, 'Kwanza Norte', '2020-01-28 13:11:43'),
(184, 6, 'Kwanza Sul', '2020-01-28 13:11:43'),
(185, 6, 'Luanda', '2020-01-28 13:11:43'),
(186, 6, 'Lunda Norte', '2020-01-28 13:11:43'),
(187, 6, 'Lunda Sul', '2020-01-28 13:11:43'),
(188, 6, 'Malanje', '2020-01-28 13:11:43'),
(189, 6, 'Moxico', '2020-01-28 13:11:43'),
(190, 6, 'Namibe', '2020-01-28 13:11:43'),
(191, 6, 'Uige', '2020-01-28 13:11:43'),
(192, 6, 'Zaire', '2020-01-28 13:11:43'),
(193, 7, 'Other Provinces', '2020-01-28 13:11:43'),
(194, 8, 'Sector claimed by Argentina/Ch', '2020-01-28 13:11:43'),
(195, 8, 'Sector claimed by Argentina/UK', '2020-01-28 13:11:43'),
(196, 8, 'Sector claimed by Australia', '2020-01-28 13:11:43'),
(197, 8, 'Sector claimed by France', '2020-01-28 13:11:43'),
(198, 8, 'Sector claimed by New Zealand', '2020-01-28 13:11:43'),
(199, 8, 'Sector claimed by Norway', '2020-01-28 13:11:43'),
(200, 8, 'Unclaimed Sector', '2020-01-28 13:11:43'),
(201, 9, 'Barbuda', '2020-01-28 13:11:43'),
(202, 9, 'Saint George', '2020-01-28 13:11:43'),
(203, 9, 'Saint John', '2020-01-28 13:11:43'),
(204, 9, 'Saint Mary', '2020-01-28 13:11:43'),
(205, 9, 'Saint Paul', '2020-01-28 13:11:43'),
(206, 9, 'Saint Peter', '2020-01-28 13:11:43'),
(207, 9, 'Saint Philip', '2020-01-28 13:11:43'),
(208, 10, 'Buenos Aires', '2020-01-28 13:11:43'),
(209, 10, 'Catamarca', '2020-01-28 13:11:43'),
(210, 10, 'Chaco', '2020-01-28 13:11:43'),
(211, 10, 'Chubut', '2020-01-28 13:11:43'),
(212, 10, 'Cordoba', '2020-01-28 13:11:43'),
(213, 10, 'Corrientes', '2020-01-28 13:11:43'),
(214, 10, 'Distrito Federal', '2020-01-28 13:11:43'),
(215, 10, 'Entre Rios', '2020-01-28 13:11:43'),
(216, 10, 'Formosa', '2020-01-28 13:11:43'),
(217, 10, 'Jujuy', '2020-01-28 13:11:43'),
(218, 10, 'La Pampa', '2020-01-28 13:11:43'),
(219, 10, 'La Rioja', '2020-01-28 13:11:43'),
(220, 10, 'Mendoza', '2020-01-28 13:11:43'),
(221, 10, 'Misiones', '2020-01-28 13:11:43'),
(222, 10, 'Neuquen', '2020-01-28 13:11:43'),
(223, 10, 'Rio Negro', '2020-01-28 13:11:43'),
(224, 10, 'Salta', '2020-01-28 13:11:43'),
(225, 10, 'San Juan', '2020-01-28 13:11:43'),
(226, 10, 'San Luis', '2020-01-28 13:11:43'),
(227, 10, 'Santa Cruz', '2020-01-28 13:11:43'),
(228, 10, 'Santa Fe', '2020-01-28 13:11:43'),
(229, 10, 'Santiago del Estero', '2020-01-28 13:11:43'),
(230, 10, 'Tierra del Fuego', '2020-01-28 13:11:43'),
(231, 10, 'Tucuman', '2020-01-28 13:11:43'),
(232, 11, 'Aragatsotn', '2020-01-28 13:11:43'),
(233, 11, 'Ararat', '2020-01-28 13:11:43'),
(234, 11, 'Armavir', '2020-01-28 13:11:43'),
(235, 11, 'Gegharkunik', '2020-01-28 13:11:43'),
(236, 11, 'Kotaik', '2020-01-28 13:11:43'),
(237, 11, 'Lori', '2020-01-28 13:11:43'),
(238, 11, 'Shirak', '2020-01-28 13:11:43'),
(239, 11, 'Stepanakert', '2020-01-28 13:11:43'),
(240, 11, 'Syunik', '2020-01-28 13:11:43'),
(241, 11, 'Tavush', '2020-01-28 13:11:43'),
(242, 11, 'Vayots Dzor', '2020-01-28 13:11:43'),
(243, 11, 'Yerevan', '2020-01-28 13:11:43'),
(244, 12, 'Aruba', '2020-01-28 13:11:43'),
(245, 13, 'Auckland', '2020-01-28 13:11:43'),
(246, 13, 'Australian Capital Territory', '2020-01-28 13:11:43'),
(247, 13, 'Balgowlah', '2020-01-28 13:11:43'),
(248, 13, 'Balmain', '2020-01-28 13:11:43'),
(249, 13, 'Bankstown', '2020-01-28 13:11:43'),
(250, 13, 'Baulkham Hills', '2020-01-28 13:11:43'),
(251, 13, 'Bonnet Bay', '2020-01-28 13:11:43'),
(252, 13, 'Camberwell', '2020-01-28 13:11:43'),
(253, 13, 'Carole Park', '2020-01-28 13:11:43'),
(254, 13, 'Castle Hill', '2020-01-28 13:11:43'),
(255, 13, 'Caulfield', '2020-01-28 13:11:43'),
(256, 13, 'Chatswood', '2020-01-28 13:11:43'),
(257, 13, 'Cheltenham', '2020-01-28 13:11:43'),
(258, 13, 'Cherrybrook', '2020-01-28 13:11:43'),
(259, 13, 'Clayton', '2020-01-28 13:11:43'),
(260, 13, 'Collingwood', '2020-01-28 13:11:43'),
(261, 13, 'Frenchs Forest', '2020-01-28 13:11:43'),
(262, 13, 'Hawthorn', '2020-01-28 13:11:43'),
(263, 13, 'Jannnali', '2020-01-28 13:11:43'),
(264, 13, 'Knoxfield', '2020-01-28 13:11:43'),
(265, 13, 'Melbourne', '2020-01-28 13:11:43'),
(266, 13, 'New South Wales', '2020-01-28 13:11:43'),
(267, 13, 'Northern Territory', '2020-01-28 13:11:43'),
(268, 13, 'Perth', '2020-01-28 13:11:43'),
(269, 13, 'Queensland', '2020-01-28 13:11:43'),
(270, 13, 'South Australia', '2020-01-28 13:11:43'),
(271, 13, 'Tasmania', '2020-01-28 13:11:43'),
(272, 13, 'Templestowe', '2020-01-28 13:11:43'),
(273, 13, 'Victoria', '2020-01-28 13:11:43'),
(274, 13, 'Werribee south', '2020-01-28 13:11:43'),
(275, 13, 'Western Australia', '2020-01-28 13:11:43'),
(276, 13, 'Wheeler', '2020-01-28 13:11:43'),
(277, 14, 'Bundesland Salzburg', '2020-01-28 13:11:43'),
(278, 14, 'Bundesland Steiermark', '2020-01-28 13:11:43'),
(279, 14, 'Bundesland Tirol', '2020-01-28 13:11:43'),
(280, 14, 'Burgenland', '2020-01-28 13:11:43'),
(281, 14, 'Carinthia', '2020-01-28 13:11:43'),
(282, 14, 'Karnten', '2020-01-28 13:11:43'),
(283, 14, 'Liezen', '2020-01-28 13:11:43'),
(284, 14, 'Lower Austria', '2020-01-28 13:11:43'),
(285, 14, 'Niederosterreich', '2020-01-28 13:11:43'),
(286, 14, 'Oberosterreich', '2020-01-28 13:11:43'),
(287, 14, 'Salzburg', '2020-01-28 13:11:43'),
(288, 14, 'Schleswig-Holstein', '2020-01-28 13:11:43'),
(289, 14, 'Steiermark', '2020-01-28 13:11:43'),
(290, 14, 'Styria', '2020-01-28 13:11:43'),
(291, 14, 'Tirol', '2020-01-28 13:11:43'),
(292, 14, 'Upper Austria', '2020-01-28 13:11:43'),
(293, 14, 'Vorarlberg', '2020-01-28 13:11:43'),
(294, 14, 'Wien', '2020-01-28 13:11:43'),
(295, 15, 'Abseron', '2020-01-28 13:11:43'),
(296, 15, 'Baki Sahari', '2020-01-28 13:11:43'),
(297, 15, 'Ganca', '2020-01-28 13:11:43'),
(298, 15, 'Ganja', '2020-01-28 13:11:43'),
(299, 15, 'Kalbacar', '2020-01-28 13:11:43'),
(300, 15, 'Lankaran', '2020-01-28 13:11:43'),
(301, 15, 'Mil-Qarabax', '2020-01-28 13:11:43'),
(302, 15, 'Mugan-Salyan', '2020-01-28 13:11:43'),
(303, 15, 'Nagorni-Qarabax', '2020-01-28 13:11:43'),
(304, 15, 'Naxcivan', '2020-01-28 13:11:43'),
(305, 15, 'Priaraks', '2020-01-28 13:11:43'),
(306, 15, 'Qazax', '2020-01-28 13:11:43'),
(307, 15, 'Saki', '2020-01-28 13:11:43'),
(308, 15, 'Sirvan', '2020-01-28 13:11:43'),
(309, 15, 'Xacmaz', '2020-01-28 13:11:43'),
(310, 16, 'Abaco', '2020-01-28 13:11:43'),
(311, 16, 'Acklins Island', '2020-01-28 13:11:43'),
(312, 16, 'Andros', '2020-01-28 13:11:43'),
(313, 16, 'Berry Islands', '2020-01-28 13:11:43'),
(314, 16, 'Biminis', '2020-01-28 13:11:43'),
(315, 16, 'Cat Island', '2020-01-28 13:11:43'),
(316, 16, 'Crooked Island', '2020-01-28 13:11:43'),
(317, 16, 'Eleuthera', '2020-01-28 13:11:43'),
(318, 16, 'Exuma and Cays', '2020-01-28 13:11:43'),
(319, 16, 'Grand Bahama', '2020-01-28 13:11:43'),
(320, 16, 'Inagua Islands', '2020-01-28 13:11:43'),
(321, 16, 'Long Island', '2020-01-28 13:11:43'),
(322, 16, 'Mayaguana', '2020-01-28 13:11:43'),
(323, 16, 'New Providence', '2020-01-28 13:11:43'),
(324, 16, 'Ragged Island', '2020-01-28 13:11:43'),
(325, 16, 'Rum Cay', '2020-01-28 13:11:43'),
(326, 16, 'San Salvador', '2020-01-28 13:11:43'),
(327, 17, '\'Isa', '2020-01-28 13:11:43'),
(328, 17, 'Badiyah', '2020-01-28 13:11:43'),
(329, 17, 'Hidd', '2020-01-28 13:11:43'),
(330, 17, 'Jidd Hafs', '2020-01-28 13:11:43'),
(331, 17, 'Mahama', '2020-01-28 13:11:43'),
(332, 17, 'Manama', '2020-01-28 13:11:43'),
(333, 17, 'Sitrah', '2020-01-28 13:11:43'),
(334, 17, 'al-Manamah', '2020-01-28 13:11:43'),
(335, 17, 'al-Muharraq', '2020-01-28 13:11:43'),
(336, 17, 'ar-Rifa\'a', '2020-01-28 13:11:43'),
(337, 18, 'Bagar Hat', '2020-01-28 13:11:43'),
(338, 18, 'Bandarban', '2020-01-28 13:11:43'),
(339, 18, 'Barguna', '2020-01-28 13:11:43'),
(340, 18, 'Barisal', '2020-01-28 13:11:43'),
(341, 18, 'Bhola', '2020-01-28 13:11:43'),
(342, 18, 'Bogora', '2020-01-28 13:11:43'),
(343, 18, 'Brahman Bariya', '2020-01-28 13:11:43'),
(344, 18, 'Chandpur', '2020-01-28 13:11:43'),
(345, 18, 'Chattagam', '2020-01-28 13:11:43'),
(346, 18, 'Chittagong Division', '2020-01-28 13:11:43'),
(347, 18, 'Chuadanga', '2020-01-28 13:11:43'),
(348, 18, 'Dhaka', '2020-01-28 13:11:43'),
(349, 18, 'Dinajpur', '2020-01-28 13:11:43'),
(350, 18, 'Faridpur', '2020-01-28 13:11:43'),
(351, 18, 'Feni', '2020-01-28 13:11:43'),
(352, 18, 'Gaybanda', '2020-01-28 13:11:43'),
(353, 18, 'Gazipur', '2020-01-28 13:11:43'),
(354, 18, 'Gopalganj', '2020-01-28 13:11:43'),
(355, 18, 'Habiganj', '2020-01-28 13:11:43'),
(356, 18, 'Jaipur Hat', '2020-01-28 13:11:43'),
(357, 18, 'Jamalpur', '2020-01-28 13:11:43'),
(358, 18, 'Jessor', '2020-01-28 13:11:43'),
(359, 18, 'Jhalakati', '2020-01-28 13:11:43'),
(360, 18, 'Jhanaydah', '2020-01-28 13:11:43'),
(361, 18, 'Khagrachhari', '2020-01-28 13:11:43'),
(362, 18, 'Khulna', '2020-01-28 13:11:43'),
(363, 18, 'Kishorganj', '2020-01-28 13:11:43'),
(364, 18, 'Koks Bazar', '2020-01-28 13:11:43'),
(365, 18, 'Komilla', '2020-01-28 13:11:43'),
(366, 18, 'Kurigram', '2020-01-28 13:11:43'),
(367, 18, 'Kushtiya', '2020-01-28 13:11:43'),
(368, 18, 'Lakshmipur', '2020-01-28 13:11:43'),
(369, 18, 'Lalmanir Hat', '2020-01-28 13:11:43'),
(370, 18, 'Madaripur', '2020-01-28 13:11:43'),
(371, 18, 'Magura', '2020-01-28 13:11:43'),
(372, 18, 'Maimansingh', '2020-01-28 13:11:43'),
(373, 18, 'Manikganj', '2020-01-28 13:11:43'),
(374, 18, 'Maulvi Bazar', '2020-01-28 13:11:43'),
(375, 18, 'Meherpur', '2020-01-28 13:11:43'),
(376, 18, 'Munshiganj', '2020-01-28 13:11:43'),
(377, 18, 'Naral', '2020-01-28 13:11:43'),
(378, 18, 'Narayanganj', '2020-01-28 13:11:43'),
(379, 18, 'Narsingdi', '2020-01-28 13:11:43'),
(380, 18, 'Nator', '2020-01-28 13:11:43'),
(381, 18, 'Naugaon', '2020-01-28 13:11:43'),
(382, 18, 'Nawabganj', '2020-01-28 13:11:43'),
(383, 18, 'Netrakona', '2020-01-28 13:11:43'),
(384, 18, 'Nilphamari', '2020-01-28 13:11:43'),
(385, 18, 'Noakhali', '2020-01-28 13:11:43'),
(386, 18, 'Pabna', '2020-01-28 13:11:43'),
(387, 18, 'Panchagarh', '2020-01-28 13:11:43'),
(388, 18, 'Patuakhali', '2020-01-28 13:11:43'),
(389, 18, 'Pirojpur', '2020-01-28 13:11:43'),
(390, 18, 'Rajbari', '2020-01-28 13:11:43'),
(391, 18, 'Rajshahi', '2020-01-28 13:11:43'),
(392, 18, 'Rangamati', '2020-01-28 13:11:43'),
(393, 18, 'Rangpur', '2020-01-28 13:11:43'),
(394, 18, 'Satkhira', '2020-01-28 13:11:43'),
(395, 18, 'Shariatpur', '2020-01-28 13:11:43'),
(396, 18, 'Sherpur', '2020-01-28 13:11:43'),
(397, 18, 'Silhat', '2020-01-28 13:11:43'),
(398, 18, 'Sirajganj', '2020-01-28 13:11:43'),
(399, 18, 'Sunamganj', '2020-01-28 13:11:43'),
(400, 18, 'Tangayal', '2020-01-28 13:11:43'),
(401, 18, 'Thakurgaon', '2020-01-28 13:11:43'),
(402, 19, 'Christ Church', '2020-01-28 13:11:43'),
(403, 19, 'Saint Andrew', '2020-01-28 13:11:43'),
(404, 19, 'Saint George', '2020-01-28 13:11:43'),
(405, 19, 'Saint James', '2020-01-28 13:11:43'),
(406, 19, 'Saint John', '2020-01-28 13:11:43'),
(407, 19, 'Saint Joseph', '2020-01-28 13:11:43'),
(408, 19, 'Saint Lucy', '2020-01-28 13:11:43'),
(409, 19, 'Saint Michael', '2020-01-28 13:11:43'),
(410, 19, 'Saint Peter', '2020-01-28 13:11:43'),
(411, 19, 'Saint Philip', '2020-01-28 13:11:43'),
(412, 19, 'Saint Thomas', '2020-01-28 13:11:43'),
(413, 20, 'Brest', '2020-01-28 13:11:43'),
(414, 20, 'Homjel\'', '2020-01-28 13:11:43'),
(415, 20, 'Hrodna', '2020-01-28 13:11:43'),
(416, 20, 'Mahiljow', '2020-01-28 13:11:43'),
(417, 20, 'Mahilyowskaya Voblasts', '2020-01-28 13:11:43'),
(418, 20, 'Minsk', '2020-01-28 13:11:43'),
(419, 20, 'Minskaja Voblasts\'', '2020-01-28 13:11:43'),
(420, 20, 'Petrik', '2020-01-28 13:11:43'),
(421, 20, 'Vicebsk', '2020-01-28 13:11:43'),
(422, 21, 'Antwerpen', '2020-01-28 13:11:43'),
(423, 21, 'Berchem', '2020-01-28 13:11:43'),
(424, 21, 'Brabant', '2020-01-28 13:11:43'),
(425, 21, 'Brabant Wallon', '2020-01-28 13:11:43'),
(426, 21, 'Brussel', '2020-01-28 13:11:43'),
(427, 21, 'East Flanders', '2020-01-28 13:11:43'),
(428, 21, 'Hainaut', '2020-01-28 13:11:43'),
(429, 21, 'Liege', '2020-01-28 13:11:43'),
(430, 21, 'Limburg', '2020-01-28 13:11:43'),
(431, 21, 'Luxembourg', '2020-01-28 13:11:43'),
(432, 21, 'Namur', '2020-01-28 13:11:43'),
(433, 21, 'Ontario', '2020-01-28 13:11:43'),
(434, 21, 'Oost-Vlaanderen', '2020-01-28 13:11:43'),
(435, 21, 'Provincie Brabant', '2020-01-28 13:11:43'),
(436, 21, 'Vlaams-Brabant', '2020-01-28 13:11:43'),
(437, 21, 'Wallonne', '2020-01-28 13:11:43'),
(438, 21, 'West-Vlaanderen', '2020-01-28 13:11:43'),
(439, 22, 'Belize', '2020-01-28 13:11:43'),
(440, 22, 'Cayo', '2020-01-28 13:11:43'),
(441, 22, 'Corozal', '2020-01-28 13:11:43'),
(442, 22, 'Orange Walk', '2020-01-28 13:11:43'),
(443, 22, 'Stann Creek', '2020-01-28 13:11:43'),
(444, 22, 'Toledo', '2020-01-28 13:11:43'),
(445, 23, 'Alibori', '2020-01-28 13:11:43'),
(446, 23, 'Atacora', '2020-01-28 13:11:43'),
(447, 23, 'Atlantique', '2020-01-28 13:11:43'),
(448, 23, 'Borgou', '2020-01-28 13:11:43'),
(449, 23, 'Collines', '2020-01-28 13:11:43'),
(450, 23, 'Couffo', '2020-01-28 13:11:43'),
(451, 23, 'Donga', '2020-01-28 13:11:43'),
(452, 23, 'Littoral', '2020-01-28 13:11:43'),
(453, 23, 'Mono', '2020-01-28 13:11:43'),
(454, 23, 'Oueme', '2020-01-28 13:11:43'),
(455, 23, 'Plateau', '2020-01-28 13:11:43'),
(456, 23, 'Zou', '2020-01-28 13:11:43'),
(457, 24, 'Hamilton', '2020-01-28 13:11:43'),
(458, 24, 'Saint George', '2020-01-28 13:11:43'),
(459, 25, 'Bumthang', '2020-01-28 13:11:43'),
(460, 25, 'Chhukha', '2020-01-28 13:11:43'),
(461, 25, 'Chirang', '2020-01-28 13:11:43'),
(462, 25, 'Daga', '2020-01-28 13:11:43'),
(463, 25, 'Geylegphug', '2020-01-28 13:11:43'),
(464, 25, 'Ha', '2020-01-28 13:11:43'),
(465, 25, 'Lhuntshi', '2020-01-28 13:11:43'),
(466, 25, 'Mongar', '2020-01-28 13:11:43'),
(467, 25, 'Pemagatsel', '2020-01-28 13:11:43'),
(468, 25, 'Punakha', '2020-01-28 13:11:43'),
(469, 25, 'Rinpung', '2020-01-28 13:11:43'),
(470, 25, 'Samchi', '2020-01-28 13:11:43'),
(471, 25, 'Samdrup Jongkhar', '2020-01-28 13:11:43'),
(472, 25, 'Shemgang', '2020-01-28 13:11:43'),
(473, 25, 'Tashigang', '2020-01-28 13:11:43'),
(474, 25, 'Timphu', '2020-01-28 13:11:43'),
(475, 25, 'Tongsa', '2020-01-28 13:11:43'),
(476, 25, 'Wangdiphodrang', '2020-01-28 13:11:43'),
(477, 26, 'Beni', '2020-01-28 13:11:43'),
(478, 26, 'Chuquisaca', '2020-01-28 13:11:43'),
(479, 26, 'Cochabamba', '2020-01-28 13:11:43'),
(480, 26, 'La Paz', '2020-01-28 13:11:43'),
(481, 26, 'Oruro', '2020-01-28 13:11:43'),
(482, 26, 'Pando', '2020-01-28 13:11:43'),
(483, 26, 'Potosi', '2020-01-28 13:11:43'),
(484, 26, 'Santa Cruz', '2020-01-28 13:11:43'),
(485, 26, 'Tarija', '2020-01-28 13:11:43'),
(486, 27, 'Federacija Bosna i Hercegovina', '2020-01-28 13:11:43'),
(487, 27, 'Republika Srpska', '2020-01-28 13:11:43'),
(488, 28, 'Central Bobonong', '2020-01-28 13:11:43'),
(489, 28, 'Central Boteti', '2020-01-28 13:11:43'),
(490, 28, 'Central Mahalapye', '2020-01-28 13:11:43'),
(491, 28, 'Central Serowe-Palapye', '2020-01-28 13:11:43'),
(492, 28, 'Central Tutume', '2020-01-28 13:11:43'),
(493, 28, 'Chobe', '2020-01-28 13:11:43'),
(494, 28, 'Francistown', '2020-01-28 13:11:43'),
(495, 28, 'Gaborone', '2020-01-28 13:11:43'),
(496, 28, 'Ghanzi', '2020-01-28 13:11:43'),
(497, 28, 'Jwaneng', '2020-01-28 13:11:43'),
(498, 28, 'Kgalagadi North', '2020-01-28 13:11:43'),
(499, 28, 'Kgalagadi South', '2020-01-28 13:11:43'),
(500, 28, 'Kgatleng', '2020-01-28 13:11:43'),
(501, 28, 'Kweneng', '2020-01-28 13:11:43'),
(502, 28, 'Lobatse', '2020-01-28 13:11:43'),
(503, 28, 'Ngamiland', '2020-01-28 13:11:43'),
(504, 28, 'Ngwaketse', '2020-01-28 13:11:43'),
(505, 28, 'North East', '2020-01-28 13:11:43'),
(506, 28, 'Okavango', '2020-01-28 13:11:43'),
(507, 28, 'Orapa', '2020-01-28 13:11:43'),
(508, 28, 'Selibe Phikwe', '2020-01-28 13:11:43'),
(509, 28, 'South East', '2020-01-28 13:11:43'),
(510, 28, 'Sowa', '2020-01-28 13:11:43'),
(511, 29, 'Bouvet Island', '2020-01-28 13:11:43'),
(512, 30, 'Acre', '2020-01-28 13:11:43'),
(513, 30, 'Alagoas', '2020-01-28 13:11:43'),
(514, 30, 'Amapa', '2020-01-28 13:11:43'),
(515, 30, 'Amazonas', '2020-01-28 13:11:43'),
(516, 30, 'Bahia', '2020-01-28 13:11:43'),
(517, 30, 'Ceara', '2020-01-28 13:11:43'),
(518, 30, 'Distrito Federal', '2020-01-28 13:11:43'),
(519, 30, 'Espirito Santo', '2020-01-28 13:11:43'),
(520, 30, 'Estado de Sao Paulo', '2020-01-28 13:11:43'),
(521, 30, 'Goias', '2020-01-28 13:11:43'),
(522, 30, 'Maranhao', '2020-01-28 13:11:43'),
(523, 30, 'Mato Grosso', '2020-01-28 13:11:43'),
(524, 30, 'Mato Grosso do Sul', '2020-01-28 13:11:43'),
(525, 30, 'Minas Gerais', '2020-01-28 13:11:43'),
(526, 30, 'Para', '2020-01-28 13:11:43'),
(527, 30, 'Paraiba', '2020-01-28 13:11:43'),
(528, 30, 'Parana', '2020-01-28 13:11:43'),
(529, 30, 'Pernambuco', '2020-01-28 13:11:43'),
(530, 30, 'Piaui', '2020-01-28 13:11:43'),
(531, 30, 'Rio Grande do Norte', '2020-01-28 13:11:43'),
(532, 30, 'Rio Grande do Sul', '2020-01-28 13:11:43'),
(533, 30, 'Rio de Janeiro', '2020-01-28 13:11:43'),
(534, 30, 'Rondonia', '2020-01-28 13:11:43'),
(535, 30, 'Roraima', '2020-01-28 13:11:43'),
(536, 30, 'Santa Catarina', '2020-01-28 13:11:43'),
(537, 30, 'Sao Paulo', '2020-01-28 13:11:43'),
(538, 30, 'Sergipe', '2020-01-28 13:11:43'),
(539, 30, 'Tocantins', '2020-01-28 13:11:43'),
(540, 31, 'British Indian Ocean Territory', '2020-01-28 13:11:43'),
(541, 32, 'Belait', '2020-01-28 13:11:43'),
(542, 32, 'Brunei-Muara', '2020-01-28 13:11:43'),
(543, 32, 'Temburong', '2020-01-28 13:11:43'),
(544, 32, 'Tutong', '2020-01-28 13:11:43'),
(545, 33, 'Blagoevgrad', '2020-01-28 13:11:43'),
(546, 33, 'Burgas', '2020-01-28 13:11:43'),
(547, 33, 'Dobrich', '2020-01-28 13:11:43'),
(548, 33, 'Gabrovo', '2020-01-28 13:11:43'),
(549, 33, 'Haskovo', '2020-01-28 13:11:43'),
(550, 33, 'Jambol', '2020-01-28 13:11:43'),
(551, 33, 'Kardzhali', '2020-01-28 13:11:43'),
(552, 33, 'Kjustendil', '2020-01-28 13:11:43'),
(553, 33, 'Lovech', '2020-01-28 13:11:43'),
(554, 33, 'Montana', '2020-01-28 13:11:43'),
(555, 33, 'Oblast Sofiya-Grad', '2020-01-28 13:11:43'),
(556, 33, 'Pazardzhik', '2020-01-28 13:11:43'),
(557, 33, 'Pernik', '2020-01-28 13:11:43'),
(558, 33, 'Pleven', '2020-01-28 13:11:43'),
(559, 33, 'Plovdiv', '2020-01-28 13:11:43'),
(560, 33, 'Razgrad', '2020-01-28 13:11:43'),
(561, 33, 'Ruse', '2020-01-28 13:11:43'),
(562, 33, 'Shumen', '2020-01-28 13:11:43'),
(563, 33, 'Silistra', '2020-01-28 13:11:43'),
(564, 33, 'Sliven', '2020-01-28 13:11:43'),
(565, 33, 'Smoljan', '2020-01-28 13:11:43'),
(566, 33, 'Sofija grad', '2020-01-28 13:11:43'),
(567, 33, 'Sofijska oblast', '2020-01-28 13:11:43'),
(568, 33, 'Stara Zagora', '2020-01-28 13:11:43'),
(569, 33, 'Targovishte', '2020-01-28 13:11:43'),
(570, 33, 'Varna', '2020-01-28 13:11:43'),
(571, 33, 'Veliko Tarnovo', '2020-01-28 13:11:43'),
(572, 33, 'Vidin', '2020-01-28 13:11:43'),
(573, 33, 'Vraca', '2020-01-28 13:11:43'),
(574, 33, 'Yablaniza', '2020-01-28 13:11:43'),
(575, 34, 'Bale', '2020-01-28 13:11:43'),
(576, 34, 'Bam', '2020-01-28 13:11:43'),
(577, 34, 'Bazega', '2020-01-28 13:11:43'),
(578, 34, 'Bougouriba', '2020-01-28 13:11:43'),
(579, 34, 'Boulgou', '2020-01-28 13:11:43'),
(580, 34, 'Boulkiemde', '2020-01-28 13:11:43'),
(581, 34, 'Comoe', '2020-01-28 13:11:43'),
(582, 34, 'Ganzourgou', '2020-01-28 13:11:43'),
(583, 34, 'Gnagna', '2020-01-28 13:11:43'),
(584, 34, 'Gourma', '2020-01-28 13:11:43'),
(585, 34, 'Houet', '2020-01-28 13:11:43'),
(586, 34, 'Ioba', '2020-01-28 13:11:43'),
(587, 34, 'Kadiogo', '2020-01-28 13:11:43'),
(588, 34, 'Kenedougou', '2020-01-28 13:11:43'),
(589, 34, 'Komandjari', '2020-01-28 13:11:43'),
(590, 34, 'Kompienga', '2020-01-28 13:11:43'),
(591, 34, 'Kossi', '2020-01-28 13:11:43'),
(592, 34, 'Kouritenga', '2020-01-28 13:11:43'),
(593, 34, 'Kourweogo', '2020-01-28 13:11:43'),
(594, 34, 'Leraba', '2020-01-28 13:11:43'),
(595, 34, 'Mouhoun', '2020-01-28 13:11:43'),
(596, 34, 'Nahouri', '2020-01-28 13:11:43'),
(597, 34, 'Namentenga', '2020-01-28 13:11:43'),
(598, 34, 'Noumbiel', '2020-01-28 13:11:43'),
(599, 34, 'Oubritenga', '2020-01-28 13:11:43'),
(600, 34, 'Oudalan', '2020-01-28 13:11:43'),
(601, 34, 'Passore', '2020-01-28 13:11:43'),
(602, 34, 'Poni', '2020-01-28 13:11:43'),
(603, 34, 'Sanguie', '2020-01-28 13:11:43'),
(604, 34, 'Sanmatenga', '2020-01-28 13:11:43'),
(605, 34, 'Seno', '2020-01-28 13:11:43'),
(606, 34, 'Sissili', '2020-01-28 13:11:43'),
(607, 34, 'Soum', '2020-01-28 13:11:43'),
(608, 34, 'Sourou', '2020-01-28 13:11:43'),
(609, 34, 'Tapoa', '2020-01-28 13:11:43'),
(610, 34, 'Tuy', '2020-01-28 13:11:43'),
(611, 34, 'Yatenga', '2020-01-28 13:11:43'),
(612, 34, 'Zondoma', '2020-01-28 13:11:43'),
(613, 34, 'Zoundweogo', '2020-01-28 13:11:43'),
(614, 35, 'Bubanza', '2020-01-28 13:11:43'),
(615, 35, 'Bujumbura', '2020-01-28 13:11:43'),
(616, 35, 'Bururi', '2020-01-28 13:11:43'),
(617, 35, 'Cankuzo', '2020-01-28 13:11:43'),
(618, 35, 'Cibitoke', '2020-01-28 13:11:43'),
(619, 35, 'Gitega', '2020-01-28 13:11:43'),
(620, 35, 'Karuzi', '2020-01-28 13:11:43'),
(621, 35, 'Kayanza', '2020-01-28 13:11:43'),
(622, 35, 'Kirundo', '2020-01-28 13:11:43'),
(623, 35, 'Makamba', '2020-01-28 13:11:43'),
(624, 35, 'Muramvya', '2020-01-28 13:11:43'),
(625, 35, 'Muyinga', '2020-01-28 13:11:43'),
(626, 35, 'Ngozi', '2020-01-28 13:11:43'),
(627, 35, 'Rutana', '2020-01-28 13:11:43'),
(628, 35, 'Ruyigi', '2020-01-28 13:11:43'),
(629, 36, 'Banteay Mean Chey', '2020-01-28 13:11:43'),
(630, 36, 'Bat Dambang', '2020-01-28 13:11:43'),
(631, 36, 'Kampong Cham', '2020-01-28 13:11:43'),
(632, 36, 'Kampong Chhnang', '2020-01-28 13:11:43'),
(633, 36, 'Kampong Spoeu', '2020-01-28 13:11:43'),
(634, 36, 'Kampong Thum', '2020-01-28 13:11:43'),
(635, 36, 'Kampot', '2020-01-28 13:11:43'),
(636, 36, 'Kandal', '2020-01-28 13:11:43'),
(637, 36, 'Kaoh Kong', '2020-01-28 13:11:43'),
(638, 36, 'Kracheh', '2020-01-28 13:11:43'),
(639, 36, 'Krong Kaeb', '2020-01-28 13:11:43'),
(640, 36, 'Krong Pailin', '2020-01-28 13:11:43'),
(641, 36, 'Krong Preah Sihanouk', '2020-01-28 13:11:43'),
(642, 36, 'Mondol Kiri', '2020-01-28 13:11:43'),
(643, 36, 'Otdar Mean Chey', '2020-01-28 13:11:43'),
(644, 36, 'Phnum Penh', '2020-01-28 13:11:43'),
(645, 36, 'Pousat', '2020-01-28 13:11:43'),
(646, 36, 'Preah Vihear', '2020-01-28 13:11:43'),
(647, 36, 'Prey Veaeng', '2020-01-28 13:11:43'),
(648, 36, 'Rotanak Kiri', '2020-01-28 13:11:43'),
(649, 36, 'Siem Reab', '2020-01-28 13:11:43'),
(650, 36, 'Stueng Traeng', '2020-01-28 13:11:43'),
(651, 36, 'Svay Rieng', '2020-01-28 13:11:43'),
(652, 36, 'Takaev', '2020-01-28 13:11:43'),
(653, 37, 'Adamaoua', '2020-01-28 13:11:43'),
(654, 37, 'Centre', '2020-01-28 13:11:43'),
(655, 37, 'Est', '2020-01-28 13:11:43'),
(656, 37, 'Littoral', '2020-01-28 13:11:43'),
(657, 37, 'Nord', '2020-01-28 13:11:43'),
(658, 37, 'Nord Extreme', '2020-01-28 13:11:43'),
(659, 37, 'Nordouest', '2020-01-28 13:11:43'),
(660, 37, 'Ouest', '2020-01-28 13:11:43'),
(661, 37, 'Sud', '2020-01-28 13:11:43'),
(662, 37, 'Sudouest', '2020-01-28 13:11:43'),
(663, 38, 'Alberta', '2020-01-28 13:11:43'),
(664, 38, 'British Columbia', '2020-01-28 13:11:43'),
(665, 38, 'Manitoba', '2020-01-28 13:11:43'),
(666, 38, 'New Brunswick', '2020-01-28 13:11:43'),
(667, 38, 'Newfoundland and Labrador', '2020-01-28 13:11:43'),
(668, 38, 'Northwest Territories', '2020-01-28 13:11:43'),
(669, 38, 'Nova Scotia', '2020-01-28 13:11:43'),
(670, 38, 'Nunavut', '2020-01-28 13:11:43'),
(671, 38, 'Ontario', '2020-01-28 13:11:43'),
(672, 38, 'Prince Edward Island', '2020-01-28 13:11:43'),
(673, 38, 'Quebec', '2020-01-28 13:11:43'),
(674, 38, 'Saskatchewan', '2020-01-28 13:11:43'),
(675, 38, 'Yukon', '2020-01-28 13:11:43'),
(676, 39, 'Boavista', '2020-01-28 13:11:43'),
(677, 39, 'Brava', '2020-01-28 13:11:43'),
(678, 39, 'Fogo', '2020-01-28 13:11:43'),
(679, 39, 'Maio', '2020-01-28 13:11:43'),
(680, 39, 'Sal', '2020-01-28 13:11:43'),
(681, 39, 'Santo Antao', '2020-01-28 13:11:43'),
(682, 39, 'Sao Nicolau', '2020-01-28 13:11:43'),
(683, 39, 'Sao Tiago', '2020-01-28 13:11:43'),
(684, 39, 'Sao Vicente', '2020-01-28 13:11:43'),
(685, 40, 'Grand Cayman', '2020-01-28 13:11:43'),
(686, 41, 'Bamingui-Bangoran', '2020-01-28 13:11:43'),
(687, 41, 'Bangui', '2020-01-28 13:11:43'),
(688, 41, 'Basse-Kotto', '2020-01-28 13:11:43'),
(689, 41, 'Haut-Mbomou', '2020-01-28 13:11:43'),
(690, 41, 'Haute-Kotto', '2020-01-28 13:11:43'),
(691, 41, 'Kemo', '2020-01-28 13:11:43'),
(692, 41, 'Lobaye', '2020-01-28 13:11:43'),
(693, 41, 'Mambere-Kadei', '2020-01-28 13:11:43'),
(694, 41, 'Mbomou', '2020-01-28 13:11:43'),
(695, 41, 'Nana-Gribizi', '2020-01-28 13:11:43'),
(696, 41, 'Nana-Mambere', '2020-01-28 13:11:43'),
(697, 41, 'Ombella Mpoko', '2020-01-28 13:11:43'),
(698, 41, 'Ouaka', '2020-01-28 13:11:43'),
(699, 41, 'Ouham', '2020-01-28 13:11:43'),
(700, 41, 'Ouham-Pende', '2020-01-28 13:11:43'),
(701, 41, 'Sangha-Mbaere', '2020-01-28 13:11:43'),
(702, 41, 'Vakaga', '2020-01-28 13:11:43'),
(703, 42, 'Batha', '2020-01-28 13:11:43'),
(704, 42, 'Biltine', '2020-01-28 13:11:43'),
(705, 42, 'Bourkou-Ennedi-Tibesti', '2020-01-28 13:11:43'),
(706, 42, 'Chari-Baguirmi', '2020-01-28 13:11:43'),
(707, 42, 'Guera', '2020-01-28 13:11:43'),
(708, 42, 'Kanem', '2020-01-28 13:11:43'),
(709, 42, 'Lac', '2020-01-28 13:11:43'),
(710, 42, 'Logone Occidental', '2020-01-28 13:11:43'),
(711, 42, 'Logone Oriental', '2020-01-28 13:11:43'),
(712, 42, 'Mayo-Kebbi', '2020-01-28 13:11:43'),
(713, 42, 'Moyen-Chari', '2020-01-28 13:11:43'),
(714, 42, 'Ouaddai', '2020-01-28 13:11:43'),
(715, 42, 'Salamat', '2020-01-28 13:11:43'),
(716, 42, 'Tandjile', '2020-01-28 13:11:43'),
(717, 43, 'Aisen', '2020-01-28 13:11:43'),
(718, 43, 'Antofagasta', '2020-01-28 13:11:43'),
(719, 43, 'Araucania', '2020-01-28 13:11:43'),
(720, 43, 'Atacama', '2020-01-28 13:11:43'),
(721, 43, 'Bio Bio', '2020-01-28 13:11:43'),
(722, 43, 'Coquimbo', '2020-01-28 13:11:43'),
(723, 43, 'Libertador General Bernardo O\'', '2020-01-28 13:11:43'),
(724, 43, 'Los Lagos', '2020-01-28 13:11:43'),
(725, 43, 'Magellanes', '2020-01-28 13:11:43'),
(726, 43, 'Maule', '2020-01-28 13:11:43'),
(727, 43, 'Metropolitana', '2020-01-28 13:11:43'),
(728, 43, 'Metropolitana de Santiago', '2020-01-28 13:11:43'),
(729, 43, 'Tarapaca', '2020-01-28 13:11:43'),
(730, 43, 'Valparaiso', '2020-01-28 13:11:43'),
(731, 44, 'Anhui', '2020-01-28 13:11:43'),
(732, 44, 'Anhui Province', '2020-01-28 13:11:43'),
(733, 44, 'Anhui Sheng', '2020-01-28 13:11:43'),
(734, 44, 'Aomen', '2020-01-28 13:11:43'),
(735, 44, 'Beijing', '2020-01-28 13:11:43'),
(736, 44, 'Beijing Shi', '2020-01-28 13:11:43'),
(737, 44, 'Chongqing', '2020-01-28 13:11:43'),
(738, 44, 'Fujian', '2020-01-28 13:11:43'),
(739, 44, 'Fujian Sheng', '2020-01-28 13:11:43'),
(740, 44, 'Gansu', '2020-01-28 13:11:43'),
(741, 44, 'Guangdong', '2020-01-28 13:11:43'),
(742, 44, 'Guangdong Sheng', '2020-01-28 13:11:43'),
(743, 44, 'Guangxi', '2020-01-28 13:11:43'),
(744, 44, 'Guizhou', '2020-01-28 13:11:43'),
(745, 44, 'Hainan', '2020-01-28 13:11:43'),
(746, 44, 'Hebei', '2020-01-28 13:11:43'),
(747, 44, 'Heilongjiang', '2020-01-28 13:11:43'),
(748, 44, 'Henan', '2020-01-28 13:11:43'),
(749, 44, 'Hubei', '2020-01-28 13:11:43'),
(750, 44, 'Hunan', '2020-01-28 13:11:43'),
(751, 44, 'Jiangsu', '2020-01-28 13:11:43'),
(752, 44, 'Jiangsu Sheng', '2020-01-28 13:11:43'),
(753, 44, 'Jiangxi', '2020-01-28 13:11:43'),
(754, 44, 'Jilin', '2020-01-28 13:11:43'),
(755, 44, 'Liaoning', '2020-01-28 13:11:43'),
(756, 44, 'Liaoning Sheng', '2020-01-28 13:11:43'),
(757, 44, 'Nei Monggol', '2020-01-28 13:11:43'),
(758, 44, 'Ningxia Hui', '2020-01-28 13:11:43'),
(759, 44, 'Qinghai', '2020-01-28 13:11:43'),
(760, 44, 'Shaanxi', '2020-01-28 13:11:43'),
(761, 44, 'Shandong', '2020-01-28 13:11:43'),
(762, 44, 'Shandong Sheng', '2020-01-28 13:11:43'),
(763, 44, 'Shanghai', '2020-01-28 13:11:43'),
(764, 44, 'Shanxi', '2020-01-28 13:11:43'),
(765, 44, 'Sichuan', '2020-01-28 13:11:43'),
(766, 44, 'Tianjin', '2020-01-28 13:11:43'),
(767, 44, 'Xianggang', '2020-01-28 13:11:43'),
(768, 44, 'Xinjiang', '2020-01-28 13:11:43'),
(769, 44, 'Xizang', '2020-01-28 13:11:43'),
(770, 44, 'Yunnan', '2020-01-28 13:11:43'),
(771, 44, 'Zhejiang', '2020-01-28 13:11:43'),
(772, 44, 'Zhejiang Sheng', '2020-01-28 13:11:43'),
(773, 45, 'Christmas Island', '2020-01-28 13:11:43'),
(774, 46, 'Cocos (Keeling) Islands', '2020-01-28 13:11:43'),
(775, 47, 'Amazonas', '2020-01-28 13:11:43'),
(776, 47, 'Antioquia', '2020-01-28 13:11:43'),
(777, 47, 'Arauca', '2020-01-28 13:11:43'),
(778, 47, 'Atlantico', '2020-01-28 13:11:43'),
(779, 47, 'Bogota', '2020-01-28 13:11:43'),
(780, 47, 'Bolivar', '2020-01-28 13:11:43'),
(781, 47, 'Boyaca', '2020-01-28 13:11:43'),
(782, 47, 'Caldas', '2020-01-28 13:11:43'),
(783, 47, 'Caqueta', '2020-01-28 13:11:43'),
(784, 47, 'Casanare', '2020-01-28 13:11:43'),
(785, 47, 'Cauca', '2020-01-28 13:11:43'),
(786, 47, 'Cesar', '2020-01-28 13:11:43'),
(787, 47, 'Choco', '2020-01-28 13:11:43'),
(788, 47, 'Cordoba', '2020-01-28 13:11:43'),
(789, 47, 'Cundinamarca', '2020-01-28 13:11:43'),
(790, 47, 'Guainia', '2020-01-28 13:11:43'),
(791, 47, 'Guaviare', '2020-01-28 13:11:43'),
(792, 47, 'Huila', '2020-01-28 13:11:43'),
(793, 47, 'La Guajira', '2020-01-28 13:11:43'),
(794, 47, 'Magdalena', '2020-01-28 13:11:43'),
(795, 47, 'Meta', '2020-01-28 13:11:43'),
(796, 47, 'Narino', '2020-01-28 13:11:43'),
(797, 47, 'Norte de Santander', '2020-01-28 13:11:43'),
(798, 47, 'Putumayo', '2020-01-28 13:11:43'),
(799, 47, 'Quindio', '2020-01-28 13:11:43'),
(800, 47, 'Risaralda', '2020-01-28 13:11:43'),
(801, 47, 'San Andres y Providencia', '2020-01-28 13:11:43'),
(802, 47, 'Santander', '2020-01-28 13:11:43'),
(803, 47, 'Sucre', '2020-01-28 13:11:43'),
(804, 47, 'Tolima', '2020-01-28 13:11:43'),
(805, 47, 'Valle del Cauca', '2020-01-28 13:11:43'),
(806, 47, 'Vaupes', '2020-01-28 13:11:43'),
(807, 47, 'Vichada', '2020-01-28 13:11:43'),
(808, 48, 'Mwali', '2020-01-28 13:11:43'),
(809, 48, 'Njazidja', '2020-01-28 13:11:43'),
(810, 48, 'Nzwani', '2020-01-28 13:11:43'),
(811, 49, 'Bouenza', '2020-01-28 13:11:43'),
(812, 49, 'Brazzaville', '2020-01-28 13:11:43'),
(813, 49, 'Cuvette', '2020-01-28 13:11:43'),
(814, 49, 'Kouilou', '2020-01-28 13:11:43'),
(815, 49, 'Lekoumou', '2020-01-28 13:11:43'),
(816, 49, 'Likouala', '2020-01-28 13:11:43'),
(817, 49, 'Niari', '2020-01-28 13:11:43'),
(818, 49, 'Plateaux', '2020-01-28 13:11:43'),
(819, 49, 'Pool', '2020-01-28 13:11:43'),
(820, 49, 'Sangha', '2020-01-28 13:11:43'),
(821, 50, 'Bandundu', '2020-01-28 13:11:43'),
(822, 50, 'Bas-Congo', '2020-01-28 13:11:43'),
(823, 50, 'Equateur', '2020-01-28 13:11:43'),
(824, 50, 'Haut-Congo', '2020-01-28 13:11:43'),
(825, 50, 'Kasai-Occidental', '2020-01-28 13:11:43'),
(826, 50, 'Kasai-Oriental', '2020-01-28 13:11:43'),
(827, 50, 'Katanga', '2020-01-28 13:11:43'),
(828, 50, 'Kinshasa', '2020-01-28 13:11:43'),
(829, 50, 'Maniema', '2020-01-28 13:11:43'),
(830, 50, 'Nord-Kivu', '2020-01-28 13:11:43'),
(831, 50, 'Sud-Kivu', '2020-01-28 13:11:43'),
(832, 51, 'Aitutaki', '2020-01-28 13:11:43'),
(833, 51, 'Atiu', '2020-01-28 13:11:43'),
(834, 51, 'Mangaia', '2020-01-28 13:11:43'),
(835, 51, 'Manihiki', '2020-01-28 13:11:43'),
(836, 51, 'Mauke', '2020-01-28 13:11:43'),
(837, 51, 'Mitiaro', '2020-01-28 13:11:43'),
(838, 51, 'Nassau', '2020-01-28 13:11:43'),
(839, 51, 'Pukapuka', '2020-01-28 13:11:43'),
(840, 51, 'Rakahanga', '2020-01-28 13:11:43'),
(841, 51, 'Rarotonga', '2020-01-28 13:11:43'),
(842, 51, 'Tongareva', '2020-01-28 13:11:43'),
(843, 52, 'Alajuela', '2020-01-28 13:11:43'),
(844, 52, 'Cartago', '2020-01-28 13:11:43'),
(845, 52, 'Guanacaste', '2020-01-28 13:11:43'),
(846, 52, 'Heredia', '2020-01-28 13:11:43'),
(847, 52, 'Limon', '2020-01-28 13:11:43'),
(848, 52, 'Puntarenas', '2020-01-28 13:11:43'),
(849, 52, 'San Jose', '2020-01-28 13:11:43'),
(850, 53, 'Abidjan', '2020-01-28 13:11:43'),
(851, 53, 'Agneby', '2020-01-28 13:11:43'),
(852, 53, 'Bafing', '2020-01-28 13:11:43'),
(853, 53, 'Denguele', '2020-01-28 13:11:43'),
(854, 53, 'Dix-huit Montagnes', '2020-01-28 13:11:43'),
(855, 53, 'Fromager', '2020-01-28 13:11:43'),
(856, 53, 'Haut-Sassandra', '2020-01-28 13:11:43'),
(857, 53, 'Lacs', '2020-01-28 13:11:43'),
(858, 53, 'Lagunes', '2020-01-28 13:11:43'),
(859, 53, 'Marahoue', '2020-01-28 13:11:43'),
(860, 53, 'Moyen-Cavally', '2020-01-28 13:11:43'),
(861, 53, 'Moyen-Comoe', '2020-01-28 13:11:43'),
(862, 53, 'N\'zi-Comoe', '2020-01-28 13:11:43'),
(863, 53, 'Sassandra', '2020-01-28 13:11:43'),
(864, 53, 'Savanes', '2020-01-28 13:11:43'),
(865, 53, 'Sud-Bandama', '2020-01-28 13:11:43'),
(866, 53, 'Sud-Comoe', '2020-01-28 13:11:43'),
(867, 53, 'Vallee du Bandama', '2020-01-28 13:11:43'),
(868, 53, 'Worodougou', '2020-01-28 13:11:43'),
(869, 53, 'Zanzan', '2020-01-28 13:11:43'),
(870, 54, 'Bjelovar-Bilogora', '2020-01-28 13:11:43'),
(871, 54, 'Dubrovnik-Neretva', '2020-01-28 13:11:43'),
(872, 54, 'Grad Zagreb', '2020-01-28 13:11:43'),
(873, 54, 'Istra', '2020-01-28 13:11:43'),
(874, 54, 'Karlovac', '2020-01-28 13:11:43'),
(875, 54, 'Koprivnica-Krizhevci', '2020-01-28 13:11:43'),
(876, 54, 'Krapina-Zagorje', '2020-01-28 13:11:43'),
(877, 54, 'Lika-Senj', '2020-01-28 13:11:43'),
(878, 54, 'Medhimurje', '2020-01-28 13:11:43'),
(879, 54, 'Medimurska Zupanija', '2020-01-28 13:11:43'),
(880, 54, 'Osijek-Baranja', '2020-01-28 13:11:43'),
(881, 54, 'Osjecko-Baranjska Zupanija', '2020-01-28 13:11:43'),
(882, 54, 'Pozhega-Slavonija', '2020-01-28 13:11:43'),
(883, 54, 'Primorje-Gorski Kotar', '2020-01-28 13:11:43'),
(884, 54, 'Shibenik-Knin', '2020-01-28 13:11:43'),
(885, 54, 'Sisak-Moslavina', '2020-01-28 13:11:43'),
(886, 54, 'Slavonski Brod-Posavina', '2020-01-28 13:11:43'),
(887, 54, 'Split-Dalmacija', '2020-01-28 13:11:43'),
(888, 54, 'Varazhdin', '2020-01-28 13:11:43'),
(889, 54, 'Virovitica-Podravina', '2020-01-28 13:11:43'),
(890, 54, 'Vukovar-Srijem', '2020-01-28 13:11:43'),
(891, 54, 'Zadar', '2020-01-28 13:11:43'),
(892, 54, 'Zagreb', '2020-01-28 13:11:43'),
(893, 55, 'Camaguey', '2020-01-28 13:11:43'),
(894, 55, 'Ciego de Avila', '2020-01-28 13:11:43'),
(895, 55, 'Cienfuegos', '2020-01-28 13:11:43'),
(896, 55, 'Ciudad de la Habana', '2020-01-28 13:11:43'),
(897, 55, 'Granma', '2020-01-28 13:11:43'),
(898, 55, 'Guantanamo', '2020-01-28 13:11:43'),
(899, 55, 'Habana', '2020-01-28 13:11:43'),
(900, 55, 'Holguin', '2020-01-28 13:11:43'),
(901, 55, 'Isla de la Juventud', '2020-01-28 13:11:43'),
(902, 55, 'La Habana', '2020-01-28 13:11:43'),
(903, 55, 'Las Tunas', '2020-01-28 13:11:43'),
(904, 55, 'Matanzas', '2020-01-28 13:11:43'),
(905, 55, 'Pinar del Rio', '2020-01-28 13:11:43'),
(906, 55, 'Sancti Spiritus', '2020-01-28 13:11:43'),
(907, 55, 'Santiago de Cuba', '2020-01-28 13:11:43'),
(908, 55, 'Villa Clara', '2020-01-28 13:11:43'),
(909, 56, 'Government controlled area', '2020-01-28 13:11:43'),
(910, 56, 'Limassol', '2020-01-28 13:11:43'),
(911, 56, 'Nicosia District', '2020-01-28 13:11:43'),
(912, 56, 'Paphos', '2020-01-28 13:11:43'),
(913, 56, 'Turkish controlled area', '2020-01-28 13:11:43'),
(914, 57, 'Central Bohemian', '2020-01-28 13:11:43'),
(915, 57, 'Frycovice', '2020-01-28 13:11:43'),
(916, 57, 'Jihocesky Kraj', '2020-01-28 13:11:43'),
(917, 57, 'Jihochesky', '2020-01-28 13:11:43'),
(918, 57, 'Jihomoravsky', '2020-01-28 13:11:43'),
(919, 57, 'Karlovarsky', '2020-01-28 13:11:43'),
(920, 57, 'Klecany', '2020-01-28 13:11:43'),
(921, 57, 'Kralovehradecky', '2020-01-28 13:11:43'),
(922, 57, 'Liberecky', '2020-01-28 13:11:43'),
(923, 57, 'Lipov', '2020-01-28 13:11:43'),
(924, 57, 'Moravskoslezsky', '2020-01-28 13:11:43'),
(925, 57, 'Olomoucky', '2020-01-28 13:11:43'),
(926, 57, 'Olomoucky Kraj', '2020-01-28 13:11:43'),
(927, 57, 'Pardubicky', '2020-01-28 13:11:43'),
(928, 57, 'Plzensky', '2020-01-28 13:11:43'),
(929, 57, 'Praha', '2020-01-28 13:11:43'),
(930, 57, 'Rajhrad', '2020-01-28 13:11:43'),
(931, 57, 'Smirice', '2020-01-28 13:11:43'),
(932, 57, 'South Moravian', '2020-01-28 13:11:43'),
(933, 57, 'Straz nad Nisou', '2020-01-28 13:11:43'),
(934, 57, 'Stredochesky', '2020-01-28 13:11:43'),
(935, 57, 'Unicov', '2020-01-28 13:11:43'),
(936, 57, 'Ustecky', '2020-01-28 13:11:43'),
(937, 57, 'Valletta', '2020-01-28 13:11:43'),
(938, 57, 'Velesin', '2020-01-28 13:11:43'),
(939, 57, 'Vysochina', '2020-01-28 13:11:43'),
(940, 57, 'Zlinsky', '2020-01-28 13:11:43'),
(941, 58, 'Arhus', '2020-01-28 13:11:43'),
(942, 58, 'Bornholm', '2020-01-28 13:11:43'),
(943, 58, 'Frederiksborg', '2020-01-28 13:11:43'),
(944, 58, 'Fyn', '2020-01-28 13:11:43'),
(945, 58, 'Hovedstaden', '2020-01-28 13:11:43'),
(946, 58, 'Kobenhavn', '2020-01-28 13:11:43'),
(947, 58, 'Kobenhavns Amt', '2020-01-28 13:11:43'),
(948, 58, 'Kobenhavns Kommune', '2020-01-28 13:11:43'),
(949, 58, 'Nordjylland', '2020-01-28 13:11:43'),
(950, 58, 'Ribe', '2020-01-28 13:11:43'),
(951, 58, 'Ringkobing', '2020-01-28 13:11:43'),
(952, 58, 'Roervig', '2020-01-28 13:11:43'),
(953, 58, 'Roskilde', '2020-01-28 13:11:43'),
(954, 58, 'Roslev', '2020-01-28 13:11:43'),
(955, 58, 'Sjaelland', '2020-01-28 13:11:43'),
(956, 58, 'Soeborg', '2020-01-28 13:11:43'),
(957, 58, 'Sonderjylland', '2020-01-28 13:11:43'),
(958, 58, 'Storstrom', '2020-01-28 13:11:43'),
(959, 58, 'Syddanmark', '2020-01-28 13:11:43'),
(960, 58, 'Toelloese', '2020-01-28 13:11:43'),
(961, 58, 'Vejle', '2020-01-28 13:11:43'),
(962, 58, 'Vestsjalland', '2020-01-28 13:11:43'),
(963, 58, 'Viborg', '2020-01-28 13:11:43'),
(964, 59, '\'Ali Sabih', '2020-01-28 13:11:43'),
(965, 59, 'Dikhil', '2020-01-28 13:11:43'),
(966, 59, 'Jibuti', '2020-01-28 13:11:43'),
(967, 59, 'Tajurah', '2020-01-28 13:11:43'),
(968, 59, 'Ubuk', '2020-01-28 13:11:43'),
(969, 60, 'Saint Andrew', '2020-01-28 13:11:43'),
(970, 60, 'Saint David', '2020-01-28 13:11:43'),
(971, 60, 'Saint George', '2020-01-28 13:11:43'),
(972, 60, 'Saint John', '2020-01-28 13:11:43'),
(973, 60, 'Saint Joseph', '2020-01-28 13:11:43'),
(974, 60, 'Saint Luke', '2020-01-28 13:11:43'),
(975, 60, 'Saint Mark', '2020-01-28 13:11:43'),
(976, 60, 'Saint Patrick', '2020-01-28 13:11:43'),
(977, 60, 'Saint Paul', '2020-01-28 13:11:43'),
(978, 60, 'Saint Peter', '2020-01-28 13:11:43'),
(979, 61, 'Azua', '2020-01-28 13:11:43'),
(980, 61, 'Bahoruco', '2020-01-28 13:11:43'),
(981, 61, 'Barahona', '2020-01-28 13:11:43'),
(982, 61, 'Dajabon', '2020-01-28 13:11:43'),
(983, 61, 'Distrito Nacional', '2020-01-28 13:11:43'),
(984, 61, 'Duarte', '2020-01-28 13:11:43'),
(985, 61, 'El Seybo', '2020-01-28 13:11:43'),
(986, 61, 'Elias Pina', '2020-01-28 13:11:43'),
(987, 61, 'Espaillat', '2020-01-28 13:11:43'),
(988, 61, 'Hato Mayor', '2020-01-28 13:11:43'),
(989, 61, 'Independencia', '2020-01-28 13:11:43'),
(990, 61, 'La Altagracia', '2020-01-28 13:11:43'),
(991, 61, 'La Romana', '2020-01-28 13:11:43'),
(992, 61, 'La Vega', '2020-01-28 13:11:43'),
(993, 61, 'Maria Trinidad Sanchez', '2020-01-28 13:11:43'),
(994, 61, 'Monsenor Nouel', '2020-01-28 13:11:43'),
(995, 61, 'Monte Cristi', '2020-01-28 13:11:43'),
(996, 61, 'Monte Plata', '2020-01-28 13:11:43'),
(997, 61, 'Pedernales', '2020-01-28 13:11:43'),
(998, 61, 'Peravia', '2020-01-28 13:11:43'),
(999, 61, 'Puerto Plata', '2020-01-28 13:11:43'),
(1000, 61, 'Salcedo', '2020-01-28 13:11:43'),
(1001, 61, 'Samana', '2020-01-28 13:11:43'),
(1002, 61, 'San Cristobal', '2020-01-28 13:11:43'),
(1003, 61, 'San Juan', '2020-01-28 13:11:43'),
(1004, 61, 'San Pedro de Macoris', '2020-01-28 13:11:43'),
(1005, 61, 'Sanchez Ramirez', '2020-01-28 13:11:43'),
(1006, 61, 'Santiago', '2020-01-28 13:11:43'),
(1007, 61, 'Santiago Rodriguez', '2020-01-28 13:11:43'),
(1008, 61, 'Valverde', '2020-01-28 13:11:43'),
(1009, 62, 'Aileu', '2020-01-28 13:11:43'),
(1010, 62, 'Ainaro', '2020-01-28 13:11:43'),
(1011, 62, 'Ambeno', '2020-01-28 13:11:43'),
(1012, 62, 'Baucau', '2020-01-28 13:11:43'),
(1013, 62, 'Bobonaro', '2020-01-28 13:11:43'),
(1014, 62, 'Cova Lima', '2020-01-28 13:11:43'),
(1015, 62, 'Dili', '2020-01-28 13:11:43'),
(1016, 62, 'Ermera', '2020-01-28 13:11:43'),
(1017, 62, 'Lautem', '2020-01-28 13:11:43'),
(1018, 62, 'Liquica', '2020-01-28 13:11:43'),
(1019, 62, 'Manatuto', '2020-01-28 13:11:43'),
(1020, 62, 'Manufahi', '2020-01-28 13:11:43'),
(1021, 62, 'Viqueque', '2020-01-28 13:11:43'),
(1022, 63, 'Azuay', '2020-01-28 13:11:43'),
(1023, 63, 'Bolivar', '2020-01-28 13:11:43'),
(1024, 63, 'Canar', '2020-01-28 13:11:43'),
(1025, 63, 'Carchi', '2020-01-28 13:11:43'),
(1026, 63, 'Chimborazo', '2020-01-28 13:11:43'),
(1027, 63, 'Cotopaxi', '2020-01-28 13:11:43'),
(1028, 63, 'El Oro', '2020-01-28 13:11:43'),
(1029, 63, 'Esmeraldas', '2020-01-28 13:11:43'),
(1030, 63, 'Galapagos', '2020-01-28 13:11:43'),
(1031, 63, 'Guayas', '2020-01-28 13:11:43'),
(1032, 63, 'Imbabura', '2020-01-28 13:11:43'),
(1033, 63, 'Loja', '2020-01-28 13:11:43'),
(1034, 63, 'Los Rios', '2020-01-28 13:11:43'),
(1035, 63, 'Manabi', '2020-01-28 13:11:43'),
(1036, 63, 'Morona Santiago', '2020-01-28 13:11:43'),
(1037, 63, 'Napo', '2020-01-28 13:11:43'),
(1038, 63, 'Orellana', '2020-01-28 13:11:43'),
(1039, 63, 'Pastaza', '2020-01-28 13:11:43'),
(1040, 63, 'Pichincha', '2020-01-28 13:11:43'),
(1041, 63, 'Sucumbios', '2020-01-28 13:11:43'),
(1042, 63, 'Tungurahua', '2020-01-28 13:11:43'),
(1043, 63, 'Zamora Chinchipe', '2020-01-28 13:11:43'),
(1044, 64, 'Aswan', '2020-01-28 13:11:43'),
(1045, 64, 'Asyut', '2020-01-28 13:11:43'),
(1046, 64, 'Bani Suwayf', '2020-01-28 13:11:43'),
(1047, 64, 'Bur Sa\'id', '2020-01-28 13:11:43'),
(1048, 64, 'Cairo', '2020-01-28 13:11:43'),
(1049, 64, 'Dumyat', '2020-01-28 13:11:43'),
(1050, 64, 'Kafr-ash-Shaykh', '2020-01-28 13:11:43'),
(1051, 64, 'Matruh', '2020-01-28 13:11:43'),
(1052, 64, 'Muhafazat ad Daqahliyah', '2020-01-28 13:11:43'),
(1053, 64, 'Muhafazat al Fayyum', '2020-01-28 13:11:43'),
(1054, 64, 'Muhafazat al Gharbiyah', '2020-01-28 13:11:43'),
(1055, 64, 'Muhafazat al Iskandariyah', '2020-01-28 13:11:43'),
(1056, 64, 'Muhafazat al Qahirah', '2020-01-28 13:11:43'),
(1057, 64, 'Qina', '2020-01-28 13:11:43'),
(1058, 64, 'Sawhaj', '2020-01-28 13:11:43'),
(1059, 64, 'Sina al-Janubiyah', '2020-01-28 13:11:43'),
(1060, 64, 'Sina ash-Shamaliyah', '2020-01-28 13:11:43'),
(1061, 64, 'ad-Daqahliyah', '2020-01-28 13:11:43'),
(1062, 64, 'al-Bahr-al-Ahmar', '2020-01-28 13:11:43'),
(1063, 64, 'al-Buhayrah', '2020-01-28 13:11:43'),
(1064, 64, 'al-Fayyum', '2020-01-28 13:11:43'),
(1065, 64, 'al-Gharbiyah', '2020-01-28 13:11:43'),
(1066, 64, 'al-Iskandariyah', '2020-01-28 13:11:43'),
(1067, 64, 'al-Ismailiyah', '2020-01-28 13:11:43'),
(1068, 64, 'al-Jizah', '2020-01-28 13:11:43'),
(1069, 64, 'al-Minufiyah', '2020-01-28 13:11:43'),
(1070, 64, 'al-Minya', '2020-01-28 13:11:43'),
(1071, 64, 'al-Qahira', '2020-01-28 13:11:43'),
(1072, 64, 'al-Qalyubiyah', '2020-01-28 13:11:43'),
(1073, 64, 'al-Uqsur', '2020-01-28 13:11:43'),
(1074, 64, 'al-Wadi al-Jadid', '2020-01-28 13:11:43'),
(1075, 64, 'as-Suways', '2020-01-28 13:11:43'),
(1076, 64, 'ash-Sharqiyah', '2020-01-28 13:11:43'),
(1077, 65, 'Ahuachapan', '2020-01-28 13:11:43'),
(1078, 65, 'Cabanas', '2020-01-28 13:11:43'),
(1079, 65, 'Chalatenango', '2020-01-28 13:11:43'),
(1080, 65, 'Cuscatlan', '2020-01-28 13:11:43'),
(1081, 65, 'La Libertad', '2020-01-28 13:11:43'),
(1082, 65, 'La Paz', '2020-01-28 13:11:43'),
(1083, 65, 'La Union', '2020-01-28 13:11:43'),
(1084, 65, 'Morazan', '2020-01-28 13:11:43'),
(1085, 65, 'San Miguel', '2020-01-28 13:11:43'),
(1086, 65, 'San Salvador', '2020-01-28 13:11:43'),
(1087, 65, 'San Vicente', '2020-01-28 13:11:43'),
(1088, 65, 'Santa Ana', '2020-01-28 13:11:43'),
(1089, 65, 'Sonsonate', '2020-01-28 13:11:43'),
(1090, 65, 'Usulutan', '2020-01-28 13:11:43'),
(1091, 66, 'Annobon', '2020-01-28 13:11:43'),
(1092, 66, 'Bioko Norte', '2020-01-28 13:11:43'),
(1093, 66, 'Bioko Sur', '2020-01-28 13:11:43'),
(1094, 66, 'Centro Sur', '2020-01-28 13:11:43'),
(1095, 66, 'Kie-Ntem', '2020-01-28 13:11:43'),
(1096, 66, 'Litoral', '2020-01-28 13:11:43'),
(1097, 66, 'Wele-Nzas', '2020-01-28 13:11:43'),
(1098, 67, 'Anseba', '2020-01-28 13:11:43'),
(1099, 67, 'Debub', '2020-01-28 13:11:43'),
(1100, 67, 'Debub-Keih-Bahri', '2020-01-28 13:11:43'),
(1101, 67, 'Gash-Barka', '2020-01-28 13:11:43'),
(1102, 67, 'Maekel', '2020-01-28 13:11:43'),
(1103, 67, 'Semien-Keih-Bahri', '2020-01-28 13:11:43'),
(1104, 68, 'Harju', '2020-01-28 13:11:43'),
(1105, 68, 'Hiiu', '2020-01-28 13:11:43');
INSERT INTO `state` (`state_id`, `country_id`, `state_name`, `date`) VALUES
(1106, 68, 'Ida-Viru', '2020-01-28 13:11:43'),
(1107, 68, 'Jarva', '2020-01-28 13:11:43'),
(1108, 68, 'Jogeva', '2020-01-28 13:11:43'),
(1109, 68, 'Laane', '2020-01-28 13:11:43'),
(1110, 68, 'Laane-Viru', '2020-01-28 13:11:43'),
(1111, 68, 'Parnu', '2020-01-28 13:11:43'),
(1112, 68, 'Polva', '2020-01-28 13:11:43'),
(1113, 68, 'Rapla', '2020-01-28 13:11:43'),
(1114, 68, 'Saare', '2020-01-28 13:11:43'),
(1115, 68, 'Tartu', '2020-01-28 13:11:43'),
(1116, 68, 'Valga', '2020-01-28 13:11:43'),
(1117, 68, 'Viljandi', '2020-01-28 13:11:43'),
(1118, 68, 'Voru', '2020-01-28 13:11:43'),
(1119, 69, 'Addis Abeba', '2020-01-28 13:11:43'),
(1120, 69, 'Afar', '2020-01-28 13:11:43'),
(1121, 69, 'Amhara', '2020-01-28 13:11:43'),
(1122, 69, 'Benishangul', '2020-01-28 13:11:43'),
(1123, 69, 'Diredawa', '2020-01-28 13:11:43'),
(1124, 69, 'Gambella', '2020-01-28 13:11:43'),
(1125, 69, 'Harar', '2020-01-28 13:11:43'),
(1126, 69, 'Jigjiga', '2020-01-28 13:11:43'),
(1127, 69, 'Mekele', '2020-01-28 13:11:43'),
(1128, 69, 'Oromia', '2020-01-28 13:11:43'),
(1129, 69, 'Somali', '2020-01-28 13:11:43'),
(1130, 69, 'Southern', '2020-01-28 13:11:43'),
(1131, 69, 'Tigray', '2020-01-28 13:11:43'),
(1132, 70, 'Christmas Island', '2020-01-28 13:11:43'),
(1133, 70, 'Cocos Islands', '2020-01-28 13:11:43'),
(1134, 70, 'Coral Sea Islands', '2020-01-28 13:11:43'),
(1135, 71, 'Falkland Islands', '2020-01-28 13:11:43'),
(1136, 71, 'South Georgia', '2020-01-28 13:11:43'),
(1137, 72, 'Klaksvik', '2020-01-28 13:11:43'),
(1138, 72, 'Nor ara Eysturoy', '2020-01-28 13:11:43'),
(1139, 72, 'Nor oy', '2020-01-28 13:11:43'),
(1140, 72, 'Sandoy', '2020-01-28 13:11:43'),
(1141, 72, 'Streymoy', '2020-01-28 13:11:43'),
(1142, 72, 'Su uroy', '2020-01-28 13:11:43'),
(1143, 72, 'Sy ra Eysturoy', '2020-01-28 13:11:43'),
(1144, 72, 'Torshavn', '2020-01-28 13:11:43'),
(1145, 72, 'Vaga', '2020-01-28 13:11:43'),
(1146, 73, 'Central', '2020-01-28 13:11:43'),
(1147, 73, 'Eastern', '2020-01-28 13:11:43'),
(1148, 73, 'Northern', '2020-01-28 13:11:43'),
(1149, 73, 'South Pacific', '2020-01-28 13:11:43'),
(1150, 73, 'Western', '2020-01-28 13:11:43'),
(1151, 74, 'Ahvenanmaa', '2020-01-28 13:11:43'),
(1152, 74, 'Etela-Karjala', '2020-01-28 13:11:43'),
(1153, 74, 'Etela-Pohjanmaa', '2020-01-28 13:11:43'),
(1154, 74, 'Etela-Savo', '2020-01-28 13:11:43'),
(1155, 74, 'Etela-Suomen Laani', '2020-01-28 13:11:43'),
(1156, 74, 'Ita-Suomen Laani', '2020-01-28 13:11:43'),
(1157, 74, 'Ita-Uusimaa', '2020-01-28 13:11:43'),
(1158, 74, 'Kainuu', '2020-01-28 13:11:43'),
(1159, 74, 'Kanta-Hame', '2020-01-28 13:11:43'),
(1160, 74, 'Keski-Pohjanmaa', '2020-01-28 13:11:43'),
(1161, 74, 'Keski-Suomi', '2020-01-28 13:11:43'),
(1162, 74, 'Kymenlaakso', '2020-01-28 13:11:43'),
(1163, 74, 'Lansi-Suomen Laani', '2020-01-28 13:11:43'),
(1164, 74, 'Lappi', '2020-01-28 13:11:43'),
(1165, 74, 'Northern Savonia', '2020-01-28 13:11:43'),
(1166, 74, 'Ostrobothnia', '2020-01-28 13:11:43'),
(1167, 74, 'Oulun Laani', '2020-01-28 13:11:43'),
(1168, 74, 'Paijat-Hame', '2020-01-28 13:11:43'),
(1169, 74, 'Pirkanmaa', '2020-01-28 13:11:43'),
(1170, 74, 'Pohjanmaa', '2020-01-28 13:11:43'),
(1171, 74, 'Pohjois-Karjala', '2020-01-28 13:11:43'),
(1172, 74, 'Pohjois-Pohjanmaa', '2020-01-28 13:11:43'),
(1173, 74, 'Pohjois-Savo', '2020-01-28 13:11:43'),
(1174, 74, 'Saarijarvi', '2020-01-28 13:11:43'),
(1175, 74, 'Satakunta', '2020-01-28 13:11:43'),
(1176, 74, 'Southern Savonia', '2020-01-28 13:11:43'),
(1177, 74, 'Tavastia Proper', '2020-01-28 13:11:43'),
(1178, 74, 'Uleaborgs Lan', '2020-01-28 13:11:43'),
(1179, 74, 'Uusimaa', '2020-01-28 13:11:43'),
(1180, 74, 'Varsinais-Suomi', '2020-01-28 13:11:43'),
(1181, 75, 'Ain', '2020-01-28 13:11:43'),
(1182, 75, 'Aisne', '2020-01-28 13:11:43'),
(1183, 75, 'Albi Le Sequestre', '2020-01-28 13:11:43'),
(1184, 75, 'Allier', '2020-01-28 13:11:43'),
(1185, 75, 'Alpes-Cote dAzur', '2020-01-28 13:11:43'),
(1186, 75, 'Alpes-Maritimes', '2020-01-28 13:11:43'),
(1187, 75, 'Alpes-de-Haute-Provence', '2020-01-28 13:11:43'),
(1188, 75, 'Alsace', '2020-01-28 13:11:43'),
(1189, 75, 'Aquitaine', '2020-01-28 13:11:43'),
(1190, 75, 'Ardeche', '2020-01-28 13:11:43'),
(1191, 75, 'Ardennes', '2020-01-28 13:11:43'),
(1192, 75, 'Ariege', '2020-01-28 13:11:43'),
(1193, 75, 'Aube', '2020-01-28 13:11:43'),
(1194, 75, 'Aude', '2020-01-28 13:11:43'),
(1195, 75, 'Auvergne', '2020-01-28 13:11:43'),
(1196, 75, 'Aveyron', '2020-01-28 13:11:43'),
(1197, 75, 'Bas-Rhin', '2020-01-28 13:11:43'),
(1198, 75, 'Basse-Normandie', '2020-01-28 13:11:43'),
(1199, 75, 'Bouches-du-Rhone', '2020-01-28 13:11:43'),
(1200, 75, 'Bourgogne', '2020-01-28 13:11:43'),
(1201, 75, 'Bretagne', '2020-01-28 13:11:43'),
(1202, 75, 'Brittany', '2020-01-28 13:11:43'),
(1203, 75, 'Burgundy', '2020-01-28 13:11:43'),
(1204, 75, 'Calvados', '2020-01-28 13:11:43'),
(1205, 75, 'Cantal', '2020-01-28 13:11:43'),
(1206, 75, 'Cedex', '2020-01-28 13:11:43'),
(1207, 75, 'Centre', '2020-01-28 13:11:43'),
(1208, 75, 'Charente', '2020-01-28 13:11:43'),
(1209, 75, 'Charente-Maritime', '2020-01-28 13:11:43'),
(1210, 75, 'Cher', '2020-01-28 13:11:43'),
(1211, 75, 'Correze', '2020-01-28 13:11:43'),
(1212, 75, 'Corse-du-Sud', '2020-01-28 13:11:43'),
(1213, 75, 'Cote-d\'Or', '2020-01-28 13:11:43'),
(1214, 75, 'Cotes-d\'Armor', '2020-01-28 13:11:43'),
(1215, 75, 'Creuse', '2020-01-28 13:11:43'),
(1216, 75, 'Crolles', '2020-01-28 13:11:43'),
(1217, 75, 'Deux-Sevres', '2020-01-28 13:11:43'),
(1218, 75, 'Dordogne', '2020-01-28 13:11:43'),
(1219, 75, 'Doubs', '2020-01-28 13:11:43'),
(1220, 75, 'Drome', '2020-01-28 13:11:43'),
(1221, 75, 'Essonne', '2020-01-28 13:11:43'),
(1222, 75, 'Eure', '2020-01-28 13:11:43'),
(1223, 75, 'Eure-et-Loir', '2020-01-28 13:11:43'),
(1224, 75, 'Feucherolles', '2020-01-28 13:11:43'),
(1225, 75, 'Finistere', '2020-01-28 13:11:43'),
(1226, 75, 'Franche-Comte', '2020-01-28 13:11:43'),
(1227, 75, 'Gard', '2020-01-28 13:11:43'),
(1228, 75, 'Gers', '2020-01-28 13:11:43'),
(1229, 75, 'Gironde', '2020-01-28 13:11:43'),
(1230, 75, 'Haut-Rhin', '2020-01-28 13:11:43'),
(1231, 75, 'Haute-Corse', '2020-01-28 13:11:43'),
(1232, 75, 'Haute-Garonne', '2020-01-28 13:11:43'),
(1233, 75, 'Haute-Loire', '2020-01-28 13:11:43'),
(1234, 75, 'Haute-Marne', '2020-01-28 13:11:43'),
(1235, 75, 'Haute-Saone', '2020-01-28 13:11:43'),
(1236, 75, 'Haute-Savoie', '2020-01-28 13:11:43'),
(1237, 75, 'Haute-Vienne', '2020-01-28 13:11:43'),
(1238, 75, 'Hautes-Alpes', '2020-01-28 13:11:43'),
(1239, 75, 'Hautes-Pyrenees', '2020-01-28 13:11:43'),
(1240, 75, 'Hauts-de-Seine', '2020-01-28 13:11:43'),
(1241, 75, 'Herault', '2020-01-28 13:11:43'),
(1242, 75, 'Ile-de-France', '2020-01-28 13:11:43'),
(1243, 75, 'Ille-et-Vilaine', '2020-01-28 13:11:43'),
(1244, 75, 'Indre', '2020-01-28 13:11:43'),
(1245, 75, 'Indre-et-Loire', '2020-01-28 13:11:43'),
(1246, 75, 'Isere', '2020-01-28 13:11:43'),
(1247, 75, 'Jura', '2020-01-28 13:11:43'),
(1248, 75, 'Klagenfurt', '2020-01-28 13:11:43'),
(1249, 75, 'Landes', '2020-01-28 13:11:43'),
(1250, 75, 'Languedoc-Roussillon', '2020-01-28 13:11:43'),
(1251, 75, 'Larcay', '2020-01-28 13:11:43'),
(1252, 75, 'Le Castellet', '2020-01-28 13:11:43'),
(1253, 75, 'Le Creusot', '2020-01-28 13:11:43'),
(1254, 75, 'Limousin', '2020-01-28 13:11:43'),
(1255, 75, 'Loir-et-Cher', '2020-01-28 13:11:43'),
(1256, 75, 'Loire', '2020-01-28 13:11:43'),
(1257, 75, 'Loire-Atlantique', '2020-01-28 13:11:43'),
(1258, 75, 'Loiret', '2020-01-28 13:11:43'),
(1259, 75, 'Lorraine', '2020-01-28 13:11:43'),
(1260, 75, 'Lot', '2020-01-28 13:11:43'),
(1261, 75, 'Lot-et-Garonne', '2020-01-28 13:11:43'),
(1262, 75, 'Lower Normandy', '2020-01-28 13:11:43'),
(1263, 75, 'Lozere', '2020-01-28 13:11:43'),
(1264, 75, 'Maine-et-Loire', '2020-01-28 13:11:43'),
(1265, 75, 'Manche', '2020-01-28 13:11:43'),
(1266, 75, 'Marne', '2020-01-28 13:11:43'),
(1267, 75, 'Mayenne', '2020-01-28 13:11:43'),
(1268, 75, 'Meurthe-et-Moselle', '2020-01-28 13:11:43'),
(1269, 75, 'Meuse', '2020-01-28 13:11:43'),
(1270, 75, 'Midi-Pyrenees', '2020-01-28 13:11:43'),
(1271, 75, 'Morbihan', '2020-01-28 13:11:43'),
(1272, 75, 'Moselle', '2020-01-28 13:11:43'),
(1273, 75, 'Nievre', '2020-01-28 13:11:43'),
(1274, 75, 'Nord', '2020-01-28 13:11:43'),
(1275, 75, 'Nord-Pas-de-Calais', '2020-01-28 13:11:43'),
(1276, 75, 'Oise', '2020-01-28 13:11:43'),
(1277, 75, 'Orne', '2020-01-28 13:11:43'),
(1278, 75, 'Paris', '2020-01-28 13:11:43'),
(1279, 75, 'Pas-de-Calais', '2020-01-28 13:11:43'),
(1280, 75, 'Pays de la Loire', '2020-01-28 13:11:43'),
(1281, 75, 'Pays-de-la-Loire', '2020-01-28 13:11:43'),
(1282, 75, 'Picardy', '2020-01-28 13:11:43'),
(1283, 75, 'Puy-de-Dome', '2020-01-28 13:11:43'),
(1284, 75, 'Pyrenees-Atlantiques', '2020-01-28 13:11:43'),
(1285, 75, 'Pyrenees-Orientales', '2020-01-28 13:11:43'),
(1286, 75, 'Quelmes', '2020-01-28 13:11:43'),
(1287, 75, 'Rhone', '2020-01-28 13:11:43'),
(1288, 75, 'Rhone-Alpes', '2020-01-28 13:11:43'),
(1289, 75, 'Saint Ouen', '2020-01-28 13:11:43'),
(1290, 75, 'Saint Viatre', '2020-01-28 13:11:43'),
(1291, 75, 'Saone-et-Loire', '2020-01-28 13:11:43'),
(1292, 75, 'Sarthe', '2020-01-28 13:11:43'),
(1293, 75, 'Savoie', '2020-01-28 13:11:43'),
(1294, 75, 'Seine-Maritime', '2020-01-28 13:11:43'),
(1295, 75, 'Seine-Saint-Denis', '2020-01-28 13:11:43'),
(1296, 75, 'Seine-et-Marne', '2020-01-28 13:11:43'),
(1297, 75, 'Somme', '2020-01-28 13:11:43'),
(1298, 75, 'Sophia Antipolis', '2020-01-28 13:11:43'),
(1299, 75, 'Souvans', '2020-01-28 13:11:43'),
(1300, 75, 'Tarn', '2020-01-28 13:11:43'),
(1301, 75, 'Tarn-et-Garonne', '2020-01-28 13:11:43'),
(1302, 75, 'Territoire de Belfort', '2020-01-28 13:11:43'),
(1303, 75, 'Treignac', '2020-01-28 13:11:43'),
(1304, 75, 'Upper Normandy', '2020-01-28 13:11:43'),
(1305, 75, 'Val-d\'Oise', '2020-01-28 13:11:43'),
(1306, 75, 'Val-de-Marne', '2020-01-28 13:11:43'),
(1307, 75, 'Var', '2020-01-28 13:11:43'),
(1308, 75, 'Vaucluse', '2020-01-28 13:11:43'),
(1309, 75, 'Vellise', '2020-01-28 13:11:43'),
(1310, 75, 'Vendee', '2020-01-28 13:11:43'),
(1311, 75, 'Vienne', '2020-01-28 13:11:43'),
(1312, 75, 'Vosges', '2020-01-28 13:11:43'),
(1313, 75, 'Yonne', '2020-01-28 13:11:43'),
(1314, 75, 'Yvelines', '2020-01-28 13:11:43'),
(1315, 76, 'Cayenne', '2020-01-28 13:11:43'),
(1316, 76, 'Saint-Laurent-du-Maroni', '2020-01-28 13:11:43'),
(1317, 77, 'Iles du Vent', '2020-01-28 13:11:43'),
(1318, 77, 'Iles sous le Vent', '2020-01-28 13:11:43'),
(1319, 77, 'Marquesas', '2020-01-28 13:11:43'),
(1320, 77, 'Tuamotu', '2020-01-28 13:11:43'),
(1321, 77, 'Tubuai', '2020-01-28 13:11:43'),
(1322, 78, 'Amsterdam', '2020-01-28 13:11:43'),
(1323, 78, 'Crozet Islands', '2020-01-28 13:11:43'),
(1324, 78, 'Kerguelen', '2020-01-28 13:11:43'),
(1325, 247, 'Estuaire', '2020-01-28 13:11:43'),
(1326, 247, 'Haut-Ogooue', '2020-01-28 13:11:43'),
(1327, 247, 'Moyen-Ogooue', '2020-01-28 13:11:43'),
(1328, 247, 'Ngounie', '2020-01-28 13:11:43'),
(1329, 247, 'Nyanga', '2020-01-28 13:11:43'),
(1330, 247, 'Ogooue-Ivindo', '2020-01-28 13:11:43'),
(1331, 247, 'Ogooue-Lolo', '2020-01-28 13:11:43'),
(1332, 247, 'Ogooue-Maritime', '2020-01-28 13:11:43'),
(1333, 247, 'Woleu-Ntem', '2020-01-28 13:11:43'),
(1334, 80, 'Banjul', '2020-01-28 13:11:43'),
(1335, 80, 'Basse', '2020-01-28 13:11:43'),
(1336, 80, 'Brikama', '2020-01-28 13:11:43'),
(1337, 80, 'Janjanbureh', '2020-01-28 13:11:43'),
(1338, 80, 'Kanifing', '2020-01-28 13:11:43'),
(1339, 80, 'Kerewan', '2020-01-28 13:11:43'),
(1340, 80, 'Kuntaur', '2020-01-28 13:11:43'),
(1341, 80, 'Mansakonko', '2020-01-28 13:11:43'),
(1342, 81, 'Abhasia', '2020-01-28 13:11:43'),
(1343, 81, 'Ajaria', '2020-01-28 13:11:43'),
(1344, 81, 'Guria', '2020-01-28 13:11:43'),
(1345, 81, 'Imereti', '2020-01-28 13:11:43'),
(1346, 81, 'Kaheti', '2020-01-28 13:11:43'),
(1347, 81, 'Kvemo Kartli', '2020-01-28 13:11:43'),
(1348, 81, 'Mcheta-Mtianeti', '2020-01-28 13:11:43'),
(1349, 81, 'Racha', '2020-01-28 13:11:43'),
(1350, 81, 'Samagrelo-Zemo Svaneti', '2020-01-28 13:11:43'),
(1351, 81, 'Samche-Zhavaheti', '2020-01-28 13:11:43'),
(1352, 81, 'Shida Kartli', '2020-01-28 13:11:43'),
(1353, 81, 'Tbilisi', '2020-01-28 13:11:43'),
(1354, 82, 'Auvergne', '2020-01-28 13:11:43'),
(1355, 82, 'Baden-Wurttemberg', '2020-01-28 13:11:43'),
(1356, 82, 'Bavaria', '2020-01-28 13:11:43'),
(1357, 82, 'Bayern', '2020-01-28 13:11:43'),
(1358, 82, 'Beilstein Wurtt', '2020-01-28 13:11:43'),
(1359, 82, 'Berlin', '2020-01-28 13:11:43'),
(1360, 82, 'Brandenburg', '2020-01-28 13:11:43'),
(1361, 82, 'Bremen', '2020-01-28 13:11:43'),
(1362, 82, 'Dreisbach', '2020-01-28 13:11:43'),
(1363, 82, 'Freistaat Bayern', '2020-01-28 13:11:43'),
(1364, 82, 'Hamburg', '2020-01-28 13:11:43'),
(1365, 82, 'Hannover', '2020-01-28 13:11:43'),
(1366, 82, 'Heroldstatt', '2020-01-28 13:11:43'),
(1367, 82, 'Hessen', '2020-01-28 13:11:43'),
(1368, 82, 'Kortenberg', '2020-01-28 13:11:43'),
(1369, 82, 'Laasdorf', '2020-01-28 13:11:43'),
(1370, 82, 'Land Baden-Wurttemberg', '2020-01-28 13:11:43'),
(1371, 82, 'Land Bayern', '2020-01-28 13:11:43'),
(1372, 82, 'Land Brandenburg', '2020-01-28 13:11:43'),
(1373, 82, 'Land Hessen', '2020-01-28 13:11:43'),
(1374, 82, 'Land Mecklenburg-Vorpommern', '2020-01-28 13:11:43'),
(1375, 82, 'Land Nordrhein-Westfalen', '2020-01-28 13:11:43'),
(1376, 82, 'Land Rheinland-Pfalz', '2020-01-28 13:11:43'),
(1377, 82, 'Land Sachsen', '2020-01-28 13:11:43'),
(1378, 82, 'Land Sachsen-Anhalt', '2020-01-28 13:11:43'),
(1379, 82, 'Land Thuringen', '2020-01-28 13:11:43'),
(1380, 82, 'Lower Saxony', '2020-01-28 13:11:43'),
(1381, 82, 'Mecklenburg-Vorpommern', '2020-01-28 13:11:43'),
(1382, 82, 'Mulfingen', '2020-01-28 13:11:43'),
(1383, 82, 'Munich', '2020-01-28 13:11:43'),
(1384, 82, 'Neubeuern', '2020-01-28 13:11:43'),
(1385, 82, 'Niedersachsen', '2020-01-28 13:11:43'),
(1386, 82, 'Noord-Holland', '2020-01-28 13:11:43'),
(1387, 82, 'Nordrhein-Westfalen', '2020-01-28 13:11:43'),
(1388, 82, 'North Rhine-Westphalia', '2020-01-28 13:11:43'),
(1389, 82, 'Osterode', '2020-01-28 13:11:43'),
(1390, 82, 'Rheinland-Pfalz', '2020-01-28 13:11:43'),
(1391, 82, 'Rhineland-Palatinate', '2020-01-28 13:11:43'),
(1392, 82, 'Saarland', '2020-01-28 13:11:43'),
(1393, 82, 'Sachsen', '2020-01-28 13:11:43'),
(1394, 82, 'Sachsen-Anhalt', '2020-01-28 13:11:43'),
(1395, 82, 'Saxony', '2020-01-28 13:11:43'),
(1396, 82, 'Schleswig-Holstein', '2020-01-28 13:11:43'),
(1397, 82, 'Thuringia', '2020-01-28 13:11:43'),
(1398, 82, 'Webling', '2020-01-28 13:11:43'),
(1399, 82, 'Weinstrabe', '2020-01-28 13:11:43'),
(1400, 82, 'schlobborn', '2020-01-28 13:11:43'),
(1401, 83, 'Ashanti', '2020-01-28 13:11:43'),
(1402, 83, 'Brong-Ahafo', '2020-01-28 13:11:43'),
(1403, 83, 'Central', '2020-01-28 13:11:43'),
(1404, 83, 'Eastern', '2020-01-28 13:11:43'),
(1405, 83, 'Greater Accra', '2020-01-28 13:11:43'),
(1406, 83, 'Northern', '2020-01-28 13:11:43'),
(1407, 83, 'Upper East', '2020-01-28 13:11:43'),
(1408, 83, 'Upper West', '2020-01-28 13:11:43'),
(1409, 83, 'Volta', '2020-01-28 13:11:43'),
(1410, 83, 'Western', '2020-01-28 13:11:43'),
(1411, 84, 'Gibraltar', '2020-01-28 13:11:43'),
(1412, 85, 'Acharnes', '2020-01-28 13:11:43'),
(1413, 85, 'Ahaia', '2020-01-28 13:11:43'),
(1414, 85, 'Aitolia kai Akarnania', '2020-01-28 13:11:43'),
(1415, 85, 'Argolis', '2020-01-28 13:11:43'),
(1416, 85, 'Arkadia', '2020-01-28 13:11:43'),
(1417, 85, 'Arta', '2020-01-28 13:11:43'),
(1418, 85, 'Attica', '2020-01-28 13:11:43'),
(1419, 85, 'Attiki', '2020-01-28 13:11:43'),
(1420, 85, 'Ayion Oros', '2020-01-28 13:11:43'),
(1421, 85, 'Crete', '2020-01-28 13:11:43'),
(1422, 85, 'Dodekanisos', '2020-01-28 13:11:43'),
(1423, 85, 'Drama', '2020-01-28 13:11:43'),
(1424, 85, 'Evia', '2020-01-28 13:11:43'),
(1425, 85, 'Evritania', '2020-01-28 13:11:43'),
(1426, 85, 'Evros', '2020-01-28 13:11:43'),
(1427, 85, 'Evvoia', '2020-01-28 13:11:43'),
(1428, 85, 'Florina', '2020-01-28 13:11:43'),
(1429, 85, 'Fokis', '2020-01-28 13:11:43'),
(1430, 85, 'Fthiotis', '2020-01-28 13:11:43'),
(1431, 85, 'Grevena', '2020-01-28 13:11:43'),
(1432, 85, 'Halandri', '2020-01-28 13:11:43'),
(1433, 85, 'Halkidiki', '2020-01-28 13:11:43'),
(1434, 85, 'Hania', '2020-01-28 13:11:43'),
(1435, 85, 'Heraklion', '2020-01-28 13:11:43'),
(1436, 85, 'Hios', '2020-01-28 13:11:43'),
(1437, 85, 'Ilia', '2020-01-28 13:11:43'),
(1438, 85, 'Imathia', '2020-01-28 13:11:43'),
(1439, 85, 'Ioannina', '2020-01-28 13:11:43'),
(1440, 85, 'Iraklion', '2020-01-28 13:11:43'),
(1441, 85, 'Karditsa', '2020-01-28 13:11:43'),
(1442, 85, 'Kastoria', '2020-01-28 13:11:43'),
(1443, 85, 'Kavala', '2020-01-28 13:11:43'),
(1444, 85, 'Kefallinia', '2020-01-28 13:11:43'),
(1445, 85, 'Kerkira', '2020-01-28 13:11:43'),
(1446, 85, 'Kiklades', '2020-01-28 13:11:43'),
(1447, 85, 'Kilkis', '2020-01-28 13:11:43'),
(1448, 85, 'Korinthia', '2020-01-28 13:11:43'),
(1449, 85, 'Kozani', '2020-01-28 13:11:43'),
(1450, 85, 'Lakonia', '2020-01-28 13:11:43'),
(1451, 85, 'Larisa', '2020-01-28 13:11:43'),
(1452, 85, 'Lasithi', '2020-01-28 13:11:43'),
(1453, 85, 'Lesvos', '2020-01-28 13:11:43'),
(1454, 85, 'Levkas', '2020-01-28 13:11:43'),
(1455, 85, 'Magnisia', '2020-01-28 13:11:43'),
(1456, 85, 'Messinia', '2020-01-28 13:11:43'),
(1457, 85, 'Nomos Attikis', '2020-01-28 13:11:43'),
(1458, 85, 'Nomos Zakynthou', '2020-01-28 13:11:43'),
(1459, 85, 'Pella', '2020-01-28 13:11:43'),
(1460, 85, 'Pieria', '2020-01-28 13:11:43'),
(1461, 85, 'Piraios', '2020-01-28 13:11:43'),
(1462, 85, 'Preveza', '2020-01-28 13:11:43'),
(1463, 85, 'Rethimni', '2020-01-28 13:11:43'),
(1464, 85, 'Rodopi', '2020-01-28 13:11:43'),
(1465, 85, 'Samos', '2020-01-28 13:11:43'),
(1466, 85, 'Serrai', '2020-01-28 13:11:43'),
(1467, 85, 'Thesprotia', '2020-01-28 13:11:43'),
(1468, 85, 'Thessaloniki', '2020-01-28 13:11:43'),
(1469, 85, 'Trikala', '2020-01-28 13:11:43'),
(1470, 85, 'Voiotia', '2020-01-28 13:11:43'),
(1471, 85, 'West Greece', '2020-01-28 13:11:43'),
(1472, 85, 'Xanthi', '2020-01-28 13:11:43'),
(1473, 85, 'Zakinthos', '2020-01-28 13:11:43'),
(1474, 86, 'Aasiaat', '2020-01-28 13:11:43'),
(1475, 86, 'Ammassalik', '2020-01-28 13:11:43'),
(1476, 86, 'Illoqqortoormiut', '2020-01-28 13:11:43'),
(1477, 86, 'Ilulissat', '2020-01-28 13:11:43'),
(1478, 86, 'Ivittuut', '2020-01-28 13:11:43'),
(1479, 86, 'Kangaatsiaq', '2020-01-28 13:11:43'),
(1480, 86, 'Maniitsoq', '2020-01-28 13:11:43'),
(1481, 86, 'Nanortalik', '2020-01-28 13:11:43'),
(1482, 86, 'Narsaq', '2020-01-28 13:11:43'),
(1483, 86, 'Nuuk', '2020-01-28 13:11:43'),
(1484, 86, 'Paamiut', '2020-01-28 13:11:43'),
(1485, 86, 'Qaanaaq', '2020-01-28 13:11:43'),
(1486, 86, 'Qaqortoq', '2020-01-28 13:11:43'),
(1487, 86, 'Qasigiannguit', '2020-01-28 13:11:43'),
(1488, 86, 'Qeqertarsuaq', '2020-01-28 13:11:43'),
(1489, 86, 'Sisimiut', '2020-01-28 13:11:43'),
(1490, 86, 'Udenfor kommunal inddeling', '2020-01-28 13:11:43'),
(1491, 86, 'Upernavik', '2020-01-28 13:11:43'),
(1492, 86, 'Uummannaq', '2020-01-28 13:11:43'),
(1493, 87, 'Carriacou-Petite Martinique', '2020-01-28 13:11:43'),
(1494, 87, 'Saint Andrew', '2020-01-28 13:11:43'),
(1495, 87, 'Saint Davids', '2020-01-28 13:11:43'),
(1496, 87, 'Saint George\'s', '2020-01-28 13:11:43'),
(1497, 87, 'Saint John', '2020-01-28 13:11:43'),
(1498, 87, 'Saint Mark', '2020-01-28 13:11:43'),
(1499, 87, 'Saint Patrick', '2020-01-28 13:11:43'),
(1500, 88, 'Basse-Terre', '2020-01-28 13:11:43'),
(1501, 88, 'Grande-Terre', '2020-01-28 13:11:43'),
(1502, 88, 'Iles des Saintes', '2020-01-28 13:11:43'),
(1503, 88, 'La Desirade', '2020-01-28 13:11:43'),
(1504, 88, 'Marie-Galante', '2020-01-28 13:11:43'),
(1505, 88, 'Saint Barthelemy', '2020-01-28 13:11:43'),
(1506, 88, 'Saint Martin', '2020-01-28 13:11:43'),
(1507, 89, 'Agana Heights', '2020-01-28 13:11:43'),
(1508, 89, 'Agat', '2020-01-28 13:11:43'),
(1509, 89, 'Barrigada', '2020-01-28 13:11:43'),
(1510, 89, 'Chalan-Pago-Ordot', '2020-01-28 13:11:43'),
(1511, 89, 'Dededo', '2020-01-28 13:11:43'),
(1512, 89, 'Hagatna', '2020-01-28 13:11:43'),
(1513, 89, 'Inarajan', '2020-01-28 13:11:43'),
(1514, 89, 'Mangilao', '2020-01-28 13:11:43'),
(1515, 89, 'Merizo', '2020-01-28 13:11:43'),
(1516, 89, 'Mongmong-Toto-Maite', '2020-01-28 13:11:43'),
(1517, 89, 'Santa Rita', '2020-01-28 13:11:43'),
(1518, 89, 'Sinajana', '2020-01-28 13:11:43'),
(1519, 89, 'Talofofo', '2020-01-28 13:11:43'),
(1520, 89, 'Tamuning', '2020-01-28 13:11:43'),
(1521, 89, 'Yigo', '2020-01-28 13:11:43'),
(1522, 89, 'Yona', '2020-01-28 13:11:43'),
(1523, 90, 'Alta Verapaz', '2020-01-28 13:11:43'),
(1524, 90, 'Baja Verapaz', '2020-01-28 13:11:43'),
(1525, 90, 'Chimaltenango', '2020-01-28 13:11:43'),
(1526, 90, 'Chiquimula', '2020-01-28 13:11:43'),
(1527, 90, 'El Progreso', '2020-01-28 13:11:43'),
(1528, 90, 'Escuintla', '2020-01-28 13:11:43'),
(1529, 90, 'Guatemala', '2020-01-28 13:11:43'),
(1530, 90, 'Huehuetenango', '2020-01-28 13:11:43'),
(1531, 90, 'Izabal', '2020-01-28 13:11:43'),
(1532, 90, 'Jalapa', '2020-01-28 13:11:43'),
(1533, 90, 'Jutiapa', '2020-01-28 13:11:43'),
(1534, 90, 'Peten', '2020-01-28 13:11:43'),
(1535, 90, 'Quezaltenango', '2020-01-28 13:11:43'),
(1536, 90, 'Quiche', '2020-01-28 13:11:43'),
(1537, 90, 'Retalhuleu', '2020-01-28 13:11:43'),
(1538, 90, 'Sacatepequez', '2020-01-28 13:11:43'),
(1539, 90, 'San Marcos', '2020-01-28 13:11:43'),
(1540, 90, 'Santa Rosa', '2020-01-28 13:11:43'),
(1541, 90, 'Solola', '2020-01-28 13:11:43'),
(1542, 90, 'Suchitepequez', '2020-01-28 13:11:43'),
(1543, 90, 'Totonicapan', '2020-01-28 13:11:43'),
(1544, 90, 'Zacapa', '2020-01-28 13:11:43'),
(1545, 91, 'Alderney', '2020-01-28 13:11:43'),
(1546, 91, 'Castel', '2020-01-28 13:11:43'),
(1547, 91, 'Forest', '2020-01-28 13:11:43'),
(1548, 91, 'Saint Andrew', '2020-01-28 13:11:43'),
(1549, 91, 'Saint Martin', '2020-01-28 13:11:43'),
(1550, 91, 'Saint Peter Port', '2020-01-28 13:11:43'),
(1551, 91, 'Saint Pierre du Bois', '2020-01-28 13:11:43'),
(1552, 91, 'Saint Sampson', '2020-01-28 13:11:43'),
(1553, 91, 'Saint Saviour', '2020-01-28 13:11:43'),
(1554, 91, 'Sark', '2020-01-28 13:11:43'),
(1555, 91, 'Torteval', '2020-01-28 13:11:43'),
(1556, 91, 'Vale', '2020-01-28 13:11:43'),
(1557, 92, 'Beyla', '2020-01-28 13:11:43'),
(1558, 92, 'Boffa', '2020-01-28 13:11:43'),
(1559, 92, 'Boke', '2020-01-28 13:11:43'),
(1560, 92, 'Conakry', '2020-01-28 13:11:43'),
(1561, 92, 'Coyah', '2020-01-28 13:11:43'),
(1562, 92, 'Dabola', '2020-01-28 13:11:43'),
(1563, 92, 'Dalaba', '2020-01-28 13:11:43'),
(1564, 92, 'Dinguiraye', '2020-01-28 13:11:43'),
(1565, 92, 'Faranah', '2020-01-28 13:11:43'),
(1566, 92, 'Forecariah', '2020-01-28 13:11:43'),
(1567, 92, 'Fria', '2020-01-28 13:11:43'),
(1568, 92, 'Gaoual', '2020-01-28 13:11:43'),
(1569, 92, 'Gueckedou', '2020-01-28 13:11:43'),
(1570, 92, 'Kankan', '2020-01-28 13:11:43'),
(1571, 92, 'Kerouane', '2020-01-28 13:11:43'),
(1572, 92, 'Kindia', '2020-01-28 13:11:43'),
(1573, 92, 'Kissidougou', '2020-01-28 13:11:43'),
(1574, 92, 'Koubia', '2020-01-28 13:11:43'),
(1575, 92, 'Koundara', '2020-01-28 13:11:43'),
(1576, 92, 'Kouroussa', '2020-01-28 13:11:43'),
(1577, 92, 'Labe', '2020-01-28 13:11:43'),
(1578, 92, 'Lola', '2020-01-28 13:11:43'),
(1579, 92, 'Macenta', '2020-01-28 13:11:43'),
(1580, 92, 'Mali', '2020-01-28 13:11:43'),
(1581, 92, 'Mamou', '2020-01-28 13:11:43'),
(1582, 92, 'Mandiana', '2020-01-28 13:11:43'),
(1583, 92, 'Nzerekore', '2020-01-28 13:11:43'),
(1584, 92, 'Pita', '2020-01-28 13:11:43'),
(1585, 92, 'Siguiri', '2020-01-28 13:11:43'),
(1586, 92, 'Telimele', '2020-01-28 13:11:43'),
(1587, 92, 'Tougue', '2020-01-28 13:11:43'),
(1588, 92, 'Yomou', '2020-01-28 13:11:43'),
(1589, 93, 'Bafata', '2020-01-28 13:11:43'),
(1590, 93, 'Bissau', '2020-01-28 13:11:43'),
(1591, 93, 'Bolama', '2020-01-28 13:11:43'),
(1592, 93, 'Cacheu', '2020-01-28 13:11:43'),
(1593, 93, 'Gabu', '2020-01-28 13:11:43'),
(1594, 93, 'Oio', '2020-01-28 13:11:43'),
(1595, 93, 'Quinara', '2020-01-28 13:11:43'),
(1596, 93, 'Tombali', '2020-01-28 13:11:43'),
(1597, 94, 'Barima-Waini', '2020-01-28 13:11:43'),
(1598, 94, 'Cuyuni-Mazaruni', '2020-01-28 13:11:43'),
(1599, 94, 'Demerara-Mahaica', '2020-01-28 13:11:43'),
(1600, 94, 'East Berbice-Corentyne', '2020-01-28 13:11:43'),
(1601, 94, 'Essequibo Islands-West Demerar', '2020-01-28 13:11:43'),
(1602, 94, 'Mahaica-Berbice', '2020-01-28 13:11:43'),
(1603, 94, 'Pomeroon-Supenaam', '2020-01-28 13:11:43'),
(1604, 94, 'Potaro-Siparuni', '2020-01-28 13:11:43'),
(1605, 94, 'Upper Demerara-Berbice', '2020-01-28 13:11:43'),
(1606, 94, 'Upper Takutu-Upper Essequibo', '2020-01-28 13:11:43'),
(1607, 95, 'Artibonite', '2020-01-28 13:11:43'),
(1608, 95, 'Centre', '2020-01-28 13:11:43'),
(1609, 95, 'Grand\'Anse', '2020-01-28 13:11:43'),
(1610, 95, 'Nord', '2020-01-28 13:11:43'),
(1611, 95, 'Nord-Est', '2020-01-28 13:11:43'),
(1612, 95, 'Nord-Ouest', '2020-01-28 13:11:43'),
(1613, 95, 'Ouest', '2020-01-28 13:11:43'),
(1614, 95, 'Sud', '2020-01-28 13:11:43'),
(1615, 95, 'Sud-Est', '2020-01-28 13:11:43'),
(1616, 96, 'Heard and McDonald Islands', '2020-01-28 13:11:43'),
(1617, 97, 'Atlantida', '2020-01-28 13:11:43'),
(1618, 97, 'Choluteca', '2020-01-28 13:11:43'),
(1619, 97, 'Colon', '2020-01-28 13:11:43'),
(1620, 97, 'Comayagua', '2020-01-28 13:11:43'),
(1621, 97, 'Copan', '2020-01-28 13:11:43'),
(1622, 97, 'Cortes', '2020-01-28 13:11:43'),
(1623, 97, 'Distrito Central', '2020-01-28 13:11:43'),
(1624, 97, 'El Paraiso', '2020-01-28 13:11:43'),
(1625, 97, 'Francisco Morazan', '2020-01-28 13:11:43'),
(1626, 97, 'Gracias a Dios', '2020-01-28 13:11:43'),
(1627, 97, 'Intibuca', '2020-01-28 13:11:43'),
(1628, 97, 'Islas de la Bahia', '2020-01-28 13:11:43'),
(1629, 97, 'La Paz', '2020-01-28 13:11:43'),
(1630, 97, 'Lempira', '2020-01-28 13:11:43'),
(1631, 97, 'Ocotepeque', '2020-01-28 13:11:43'),
(1632, 97, 'Olancho', '2020-01-28 13:11:43'),
(1633, 97, 'Santa Barbara', '2020-01-28 13:11:43'),
(1634, 97, 'Valle', '2020-01-28 13:11:43'),
(1635, 97, 'Yoro', '2020-01-28 13:11:43'),
(1636, 98, 'Hong Kong', '2020-01-28 13:11:43'),
(1637, 99, 'Bacs-Kiskun', '2020-01-28 13:11:43'),
(1638, 99, 'Baranya', '2020-01-28 13:11:43'),
(1639, 99, 'Bekes', '2020-01-28 13:11:43'),
(1640, 99, 'Borsod-Abauj-Zemplen', '2020-01-28 13:11:43'),
(1641, 99, 'Budapest', '2020-01-28 13:11:43'),
(1642, 99, 'Csongrad', '2020-01-28 13:11:43'),
(1643, 99, 'Fejer', '2020-01-28 13:11:43'),
(1644, 99, 'Gyor-Moson-Sopron', '2020-01-28 13:11:43'),
(1645, 99, 'Hajdu-Bihar', '2020-01-28 13:11:43'),
(1646, 99, 'Heves', '2020-01-28 13:11:43'),
(1647, 99, 'Jasz-Nagykun-Szolnok', '2020-01-28 13:11:43'),
(1648, 99, 'Komarom-Esztergom', '2020-01-28 13:11:43'),
(1649, 99, 'Nograd', '2020-01-28 13:11:43'),
(1650, 99, 'Pest', '2020-01-28 13:11:43'),
(1651, 99, 'Somogy', '2020-01-28 13:11:43'),
(1652, 99, 'Szabolcs-Szatmar-Bereg', '2020-01-28 13:11:43'),
(1653, 99, 'Tolna', '2020-01-28 13:11:43'),
(1654, 99, 'Vas', '2020-01-28 13:11:43'),
(1655, 99, 'Veszprem', '2020-01-28 13:11:43'),
(1656, 99, 'Zala', '2020-01-28 13:11:43'),
(1657, 100, 'Austurland', '2020-01-28 13:11:43'),
(1658, 100, 'Gullbringusysla', '2020-01-28 13:11:43'),
(1659, 100, 'Hofu borgarsva i', '2020-01-28 13:11:43'),
(1660, 100, 'Nor urland eystra', '2020-01-28 13:11:43'),
(1661, 100, 'Nor urland vestra', '2020-01-28 13:11:43'),
(1662, 100, 'Su urland', '2020-01-28 13:11:43'),
(1663, 100, 'Su urnes', '2020-01-28 13:11:43'),
(1664, 100, 'Vestfir ir', '2020-01-28 13:11:43'),
(1665, 100, 'Vesturland', '2020-01-28 13:11:43'),
(1666, 102, 'Aceh', '2020-01-28 13:11:43'),
(1667, 102, 'Bali', '2020-01-28 13:11:43'),
(1668, 102, 'Bangka-Belitung', '2020-01-28 13:11:43'),
(1669, 102, 'Banten', '2020-01-28 13:11:43'),
(1670, 102, 'Bengkulu', '2020-01-28 13:11:43'),
(1671, 102, 'Gandaria', '2020-01-28 13:11:43'),
(1672, 102, 'Gorontalo', '2020-01-28 13:11:43'),
(1673, 102, 'Jakarta', '2020-01-28 13:11:43'),
(1674, 102, 'Jambi', '2020-01-28 13:11:43'),
(1675, 102, 'Jawa Barat', '2020-01-28 13:11:43'),
(1676, 102, 'Jawa Tengah', '2020-01-28 13:11:43'),
(1677, 102, 'Jawa Timur', '2020-01-28 13:11:43'),
(1678, 102, 'Kalimantan Barat', '2020-01-28 13:11:43'),
(1679, 102, 'Kalimantan Selatan', '2020-01-28 13:11:43'),
(1680, 102, 'Kalimantan Tengah', '2020-01-28 13:11:43'),
(1681, 102, 'Kalimantan Timur', '2020-01-28 13:11:43'),
(1682, 102, 'Kendal', '2020-01-28 13:11:43'),
(1683, 102, 'Lampung', '2020-01-28 13:11:43'),
(1684, 102, 'Maluku', '2020-01-28 13:11:43'),
(1685, 102, 'Maluku Utara', '2020-01-28 13:11:43'),
(1686, 102, 'Nusa Tenggara Barat', '2020-01-28 13:11:43'),
(1687, 102, 'Nusa Tenggara Timur', '2020-01-28 13:11:43'),
(1688, 102, 'Papua', '2020-01-28 13:11:43'),
(1689, 102, 'Riau', '2020-01-28 13:11:43'),
(1690, 102, 'Riau Kepulauan', '2020-01-28 13:11:43'),
(1691, 102, 'Solo', '2020-01-28 13:11:43'),
(1692, 102, 'Sulawesi Selatan', '2020-01-28 13:11:43'),
(1693, 102, 'Sulawesi Tengah', '2020-01-28 13:11:43'),
(1694, 102, 'Sulawesi Tenggara', '2020-01-28 13:11:43'),
(1695, 102, 'Sulawesi Utara', '2020-01-28 13:11:43'),
(1696, 102, 'Sumatera Barat', '2020-01-28 13:11:43'),
(1697, 102, 'Sumatera Selatan', '2020-01-28 13:11:43'),
(1698, 102, 'Sumatera Utara', '2020-01-28 13:11:43'),
(1699, 102, 'Yogyakarta', '2020-01-28 13:11:43'),
(1700, 103, 'Ardabil', '2020-01-28 13:11:43'),
(1701, 103, 'Azarbayjan-e Bakhtari', '2020-01-28 13:11:43'),
(1702, 103, 'Azarbayjan-e Khavari', '2020-01-28 13:11:43'),
(1703, 103, 'Bushehr', '2020-01-28 13:11:43'),
(1704, 103, 'Chahar Mahal-e Bakhtiari', '2020-01-28 13:11:43'),
(1705, 103, 'Esfahan', '2020-01-28 13:11:43'),
(1706, 103, 'Fars', '2020-01-28 13:11:43'),
(1707, 103, 'Gilan', '2020-01-28 13:11:43'),
(1708, 103, 'Golestan', '2020-01-28 13:11:43'),
(1709, 103, 'Hamadan', '2020-01-28 13:11:43'),
(1710, 103, 'Hormozgan', '2020-01-28 13:11:43'),
(1711, 103, 'Ilam', '2020-01-28 13:11:43'),
(1712, 103, 'Kerman', '2020-01-28 13:11:43'),
(1713, 103, 'Kermanshah', '2020-01-28 13:11:43'),
(1714, 103, 'Khorasan', '2020-01-28 13:11:43'),
(1715, 103, 'Khuzestan', '2020-01-28 13:11:43'),
(1716, 103, 'Kohgiluyeh-e Boyerahmad', '2020-01-28 13:11:43'),
(1717, 103, 'Kordestan', '2020-01-28 13:11:43'),
(1718, 103, 'Lorestan', '2020-01-28 13:11:43'),
(1719, 103, 'Markazi', '2020-01-28 13:11:43'),
(1720, 103, 'Mazandaran', '2020-01-28 13:11:43'),
(1721, 103, 'Ostan-e Esfahan', '2020-01-28 13:11:43'),
(1722, 103, 'Qazvin', '2020-01-28 13:11:43'),
(1723, 103, 'Qom', '2020-01-28 13:11:43'),
(1724, 103, 'Semnan', '2020-01-28 13:11:43'),
(1725, 103, 'Sistan-e Baluchestan', '2020-01-28 13:11:43'),
(1726, 103, 'Tehran', '2020-01-28 13:11:43'),
(1727, 103, 'Yazd', '2020-01-28 13:11:43'),
(1728, 103, 'Zanjan', '2020-01-28 13:11:43'),
(1729, 104, 'Babil', '2020-01-28 13:11:43'),
(1730, 104, 'Baghdad', '2020-01-28 13:11:43'),
(1731, 104, 'Dahuk', '2020-01-28 13:11:43'),
(1732, 104, 'Dhi Qar', '2020-01-28 13:11:43'),
(1733, 104, 'Diyala', '2020-01-28 13:11:43'),
(1734, 104, 'Erbil', '2020-01-28 13:11:43'),
(1735, 104, 'Irbil', '2020-01-28 13:11:43'),
(1736, 104, 'Karbala', '2020-01-28 13:11:43'),
(1737, 104, 'Kurdistan', '2020-01-28 13:11:43'),
(1738, 104, 'Maysan', '2020-01-28 13:11:43'),
(1739, 104, 'Ninawa', '2020-01-28 13:11:43'),
(1740, 104, 'Salah-ad-Din', '2020-01-28 13:11:43'),
(1741, 104, 'Wasit', '2020-01-28 13:11:43'),
(1742, 104, 'al-Anbar', '2020-01-28 13:11:43'),
(1743, 104, 'al-Basrah', '2020-01-28 13:11:43'),
(1744, 104, 'al-Muthanna', '2020-01-28 13:11:43'),
(1745, 104, 'al-Qadisiyah', '2020-01-28 13:11:43'),
(1746, 104, 'an-Najaf', '2020-01-28 13:11:43'),
(1747, 104, 'as-Sulaymaniyah', '2020-01-28 13:11:43'),
(1748, 104, 'at-Ta\'mim', '2020-01-28 13:11:43'),
(1749, 105, 'Armagh', '2020-01-28 13:11:43'),
(1750, 105, 'Carlow', '2020-01-28 13:11:43'),
(1751, 105, 'Cavan', '2020-01-28 13:11:43'),
(1752, 105, 'Clare', '2020-01-28 13:11:43'),
(1753, 105, 'Cork', '2020-01-28 13:11:43'),
(1754, 105, 'Donegal', '2020-01-28 13:11:43'),
(1755, 105, 'Dublin', '2020-01-28 13:11:43'),
(1756, 105, 'Galway', '2020-01-28 13:11:43'),
(1757, 105, 'Kerry', '2020-01-28 13:11:43'),
(1758, 105, 'Kildare', '2020-01-28 13:11:43'),
(1759, 105, 'Kilkenny', '2020-01-28 13:11:43'),
(1760, 105, 'Laois', '2020-01-28 13:11:43'),
(1761, 105, 'Leinster', '2020-01-28 13:11:43'),
(1762, 105, 'Leitrim', '2020-01-28 13:11:43'),
(1763, 105, 'Limerick', '2020-01-28 13:11:43'),
(1764, 105, 'Loch Garman', '2020-01-28 13:11:43'),
(1765, 105, 'Longford', '2020-01-28 13:11:43'),
(1766, 105, 'Louth', '2020-01-28 13:11:43'),
(1767, 105, 'Mayo', '2020-01-28 13:11:43'),
(1768, 105, 'Meath', '2020-01-28 13:11:43'),
(1769, 105, 'Monaghan', '2020-01-28 13:11:43'),
(1770, 105, 'Offaly', '2020-01-28 13:11:43'),
(1771, 105, 'Roscommon', '2020-01-28 13:11:43'),
(1772, 105, 'Sligo', '2020-01-28 13:11:43'),
(1773, 105, 'Tipperary North Riding', '2020-01-28 13:11:43'),
(1774, 105, 'Tipperary South Riding', '2020-01-28 13:11:43'),
(1775, 105, 'Ulster', '2020-01-28 13:11:43'),
(1776, 105, 'Waterford', '2020-01-28 13:11:43'),
(1777, 105, 'Westmeath', '2020-01-28 13:11:43'),
(1778, 105, 'Wexford', '2020-01-28 13:11:43'),
(1779, 105, 'Wicklow', '2020-01-28 13:11:43'),
(1780, 106, 'Beit Hanania', '2020-01-28 13:11:43'),
(1781, 106, 'Ben Gurion Airport', '2020-01-28 13:11:43'),
(1782, 106, 'Bethlehem', '2020-01-28 13:11:43'),
(1783, 106, 'Caesarea', '2020-01-28 13:11:43'),
(1784, 106, 'Centre', '2020-01-28 13:11:43'),
(1785, 106, 'Gaza', '2020-01-28 13:11:43'),
(1786, 106, 'Hadaron', '2020-01-28 13:11:43'),
(1787, 106, 'Haifa District', '2020-01-28 13:11:43'),
(1788, 106, 'Hamerkaz', '2020-01-28 13:11:43'),
(1789, 106, 'Hazafon', '2020-01-28 13:11:43'),
(1790, 106, 'Hebron', '2020-01-28 13:11:43'),
(1791, 106, 'Jaffa', '2020-01-28 13:11:43'),
(1792, 106, 'Jerusalem', '2020-01-28 13:11:43'),
(1793, 106, 'Khefa', '2020-01-28 13:11:43'),
(1794, 106, 'Kiryat Yam', '2020-01-28 13:11:43'),
(1795, 106, 'Lower Galilee', '2020-01-28 13:11:43'),
(1796, 106, 'Qalqilya', '2020-01-28 13:11:43'),
(1797, 106, 'Talme Elazar', '2020-01-28 13:11:43'),
(1798, 106, 'Tel Aviv', '2020-01-28 13:11:43'),
(1799, 106, 'Tsafon', '2020-01-28 13:11:43'),
(1800, 106, 'Umm El Fahem', '2020-01-28 13:11:43'),
(1801, 106, 'Yerushalayim', '2020-01-28 13:11:43'),
(1802, 107, 'Abruzzi', '2020-01-28 13:11:43'),
(1803, 107, 'Abruzzo', '2020-01-28 13:11:43'),
(1804, 107, 'Agrigento', '2020-01-28 13:11:43'),
(1805, 107, 'Alessandria', '2020-01-28 13:11:43'),
(1806, 107, 'Ancona', '2020-01-28 13:11:43'),
(1807, 107, 'Arezzo', '2020-01-28 13:11:43'),
(1808, 107, 'Ascoli Piceno', '2020-01-28 13:11:43'),
(1809, 107, 'Asti', '2020-01-28 13:11:43'),
(1810, 107, 'Avellino', '2020-01-28 13:11:43'),
(1811, 107, 'Bari', '2020-01-28 13:11:43'),
(1812, 107, 'Basilicata', '2020-01-28 13:11:43'),
(1813, 107, 'Belluno', '2020-01-28 13:11:43'),
(1814, 107, 'Benevento', '2020-01-28 13:11:43'),
(1815, 107, 'Bergamo', '2020-01-28 13:11:43'),
(1816, 107, 'Biella', '2020-01-28 13:11:43'),
(1817, 107, 'Bologna', '2020-01-28 13:11:43'),
(1818, 107, 'Bolzano', '2020-01-28 13:11:43'),
(1819, 107, 'Brescia', '2020-01-28 13:11:43'),
(1820, 107, 'Brindisi', '2020-01-28 13:11:43'),
(1821, 107, 'Calabria', '2020-01-28 13:11:43'),
(1822, 107, 'Campania', '2020-01-28 13:11:43'),
(1823, 107, 'Cartoceto', '2020-01-28 13:11:43'),
(1824, 107, 'Caserta', '2020-01-28 13:11:43'),
(1825, 107, 'Catania', '2020-01-28 13:11:43'),
(1826, 107, 'Chieti', '2020-01-28 13:11:43'),
(1827, 107, 'Como', '2020-01-28 13:11:43'),
(1828, 107, 'Cosenza', '2020-01-28 13:11:43'),
(1829, 107, 'Cremona', '2020-01-28 13:11:43'),
(1830, 107, 'Cuneo', '2020-01-28 13:11:43'),
(1831, 107, 'Emilia-Romagna', '2020-01-28 13:11:43'),
(1832, 107, 'Ferrara', '2020-01-28 13:11:43'),
(1833, 107, 'Firenze', '2020-01-28 13:11:43'),
(1834, 107, 'Florence', '2020-01-28 13:11:43'),
(1835, 107, 'Forli-Cesena ', '2020-01-28 13:11:43'),
(1836, 107, 'Friuli-Venezia Giulia', '2020-01-28 13:11:43'),
(1837, 107, 'Frosinone', '2020-01-28 13:11:43'),
(1838, 107, 'Genoa', '2020-01-28 13:11:43'),
(1839, 107, 'Gorizia', '2020-01-28 13:11:43'),
(1840, 107, 'L\'Aquila', '2020-01-28 13:11:43'),
(1841, 107, 'Lazio', '2020-01-28 13:11:43'),
(1842, 107, 'Lecce', '2020-01-28 13:11:43'),
(1843, 107, 'Lecco', '2020-01-28 13:11:43'),
(1844, 107, 'Lecco Province', '2020-01-28 13:11:43'),
(1845, 107, 'Liguria', '2020-01-28 13:11:43'),
(1846, 107, 'Lodi', '2020-01-28 13:11:43'),
(1847, 107, 'Lombardia', '2020-01-28 13:11:43'),
(1848, 107, 'Lombardy', '2020-01-28 13:11:43'),
(1849, 107, 'Macerata', '2020-01-28 13:11:43'),
(1850, 107, 'Mantova', '2020-01-28 13:11:43'),
(1851, 107, 'Marche', '2020-01-28 13:11:43'),
(1852, 107, 'Messina', '2020-01-28 13:11:43'),
(1853, 107, 'Milan', '2020-01-28 13:11:43'),
(1854, 107, 'Modena', '2020-01-28 13:11:43'),
(1855, 107, 'Molise', '2020-01-28 13:11:43'),
(1856, 107, 'Molteno', '2020-01-28 13:11:43'),
(1857, 107, 'Montenegro', '2020-01-28 13:11:43'),
(1858, 107, 'Monza and Brianza', '2020-01-28 13:11:43'),
(1859, 107, 'Naples', '2020-01-28 13:11:43'),
(1860, 107, 'Novara', '2020-01-28 13:11:43'),
(1861, 107, 'Padova', '2020-01-28 13:11:43'),
(1862, 107, 'Parma', '2020-01-28 13:11:43'),
(1863, 107, 'Pavia', '2020-01-28 13:11:43'),
(1864, 107, 'Perugia', '2020-01-28 13:11:43'),
(1865, 107, 'Pesaro-Urbino', '2020-01-28 13:11:43'),
(1866, 107, 'Piacenza', '2020-01-28 13:11:43'),
(1867, 107, 'Piedmont', '2020-01-28 13:11:43'),
(1868, 107, 'Piemonte', '2020-01-28 13:11:43'),
(1869, 107, 'Pisa', '2020-01-28 13:11:43'),
(1870, 107, 'Pordenone', '2020-01-28 13:11:43'),
(1871, 107, 'Potenza', '2020-01-28 13:11:43'),
(1872, 107, 'Puglia', '2020-01-28 13:11:43'),
(1873, 107, 'Reggio Emilia', '2020-01-28 13:11:43'),
(1874, 107, 'Rimini', '2020-01-28 13:11:43'),
(1875, 107, 'Roma', '2020-01-28 13:11:43'),
(1876, 107, 'Salerno', '2020-01-28 13:11:43'),
(1877, 107, 'Sardegna', '2020-01-28 13:11:43'),
(1878, 107, 'Sassari', '2020-01-28 13:11:43'),
(1879, 107, 'Savona', '2020-01-28 13:11:43'),
(1880, 107, 'Sicilia', '2020-01-28 13:11:43'),
(1881, 107, 'Siena', '2020-01-28 13:11:43'),
(1882, 107, 'Sondrio', '2020-01-28 13:11:43'),
(1883, 107, 'South Tyrol', '2020-01-28 13:11:43'),
(1884, 107, 'Taranto', '2020-01-28 13:11:43'),
(1885, 107, 'Teramo', '2020-01-28 13:11:43'),
(1886, 107, 'Torino', '2020-01-28 13:11:43'),
(1887, 107, 'Toscana', '2020-01-28 13:11:43'),
(1888, 107, 'Trapani', '2020-01-28 13:11:43'),
(1889, 107, 'Trentino-Alto Adige', '2020-01-28 13:11:43'),
(1890, 107, 'Trento', '2020-01-28 13:11:43'),
(1891, 107, 'Treviso', '2020-01-28 13:11:43'),
(1892, 107, 'Udine', '2020-01-28 13:11:43'),
(1893, 107, 'Umbria', '2020-01-28 13:11:43'),
(1894, 107, 'Valle d\'Aosta', '2020-01-28 13:11:43'),
(1895, 107, 'Varese', '2020-01-28 13:11:43'),
(1896, 107, 'Veneto', '2020-01-28 13:11:43'),
(1897, 107, 'Venezia', '2020-01-28 13:11:43'),
(1898, 107, 'Verbano-Cusio-Ossola', '2020-01-28 13:11:43'),
(1899, 107, 'Vercelli', '2020-01-28 13:11:43'),
(1900, 107, 'Verona', '2020-01-28 13:11:43'),
(1901, 107, 'Vicenza', '2020-01-28 13:11:43'),
(1902, 107, 'Viterbo', '2020-01-28 13:11:43'),
(1903, 108, 'Buxoro Viloyati', '2020-01-28 13:11:43'),
(1904, 108, 'Clarendon', '2020-01-28 13:11:43'),
(1905, 108, 'Hanover', '2020-01-28 13:11:43'),
(1906, 108, 'Kingston', '2020-01-28 13:11:43'),
(1907, 108, 'Manchester', '2020-01-28 13:11:43'),
(1908, 108, 'Portland', '2020-01-28 13:11:43'),
(1909, 108, 'Saint Andrews', '2020-01-28 13:11:43'),
(1910, 108, 'Saint Ann', '2020-01-28 13:11:43'),
(1911, 108, 'Saint Catherine', '2020-01-28 13:11:43'),
(1912, 108, 'Saint Elizabeth', '2020-01-28 13:11:43'),
(1913, 108, 'Saint James', '2020-01-28 13:11:43'),
(1914, 108, 'Saint Mary', '2020-01-28 13:11:43'),
(1915, 108, 'Saint Thomas', '2020-01-28 13:11:43'),
(1916, 108, 'Trelawney', '2020-01-28 13:11:43'),
(1917, 108, 'Westmoreland', '2020-01-28 13:11:43'),
(1918, 109, 'Aichi', '2020-01-28 13:11:43'),
(1919, 109, 'Akita', '2020-01-28 13:11:43'),
(1920, 109, 'Aomori', '2020-01-28 13:11:43'),
(1921, 109, 'Chiba', '2020-01-28 13:11:43'),
(1922, 109, 'Ehime', '2020-01-28 13:11:43'),
(1923, 109, 'Fukui', '2020-01-28 13:11:43'),
(1924, 109, 'Fukuoka', '2020-01-28 13:11:43'),
(1925, 109, 'Fukushima', '2020-01-28 13:11:43'),
(1926, 109, 'Gifu', '2020-01-28 13:11:43'),
(1927, 109, 'Gumma', '2020-01-28 13:11:43'),
(1928, 109, 'Hiroshima', '2020-01-28 13:11:43'),
(1929, 109, 'Hokkaido', '2020-01-28 13:11:43'),
(1930, 109, 'Hyogo', '2020-01-28 13:11:43'),
(1931, 109, 'Ibaraki', '2020-01-28 13:11:43'),
(1932, 109, 'Ishikawa', '2020-01-28 13:11:43'),
(1933, 109, 'Iwate', '2020-01-28 13:11:43'),
(1934, 109, 'Kagawa', '2020-01-28 13:11:43'),
(1935, 109, 'Kagoshima', '2020-01-28 13:11:43'),
(1936, 109, 'Kanagawa', '2020-01-28 13:11:43'),
(1937, 109, 'Kanto', '2020-01-28 13:11:43'),
(1938, 109, 'Kochi', '2020-01-28 13:11:43'),
(1939, 109, 'Kumamoto', '2020-01-28 13:11:43'),
(1940, 109, 'Kyoto', '2020-01-28 13:11:43'),
(1941, 109, 'Mie', '2020-01-28 13:11:43'),
(1942, 109, 'Miyagi', '2020-01-28 13:11:43'),
(1943, 109, 'Miyazaki', '2020-01-28 13:11:43'),
(1944, 109, 'Nagano', '2020-01-28 13:11:43'),
(1945, 109, 'Nagasaki', '2020-01-28 13:11:43'),
(1946, 109, 'Nara', '2020-01-28 13:11:43'),
(1947, 109, 'Niigata', '2020-01-28 13:11:43'),
(1948, 109, 'Oita', '2020-01-28 13:11:43'),
(1949, 109, 'Okayama', '2020-01-28 13:11:43'),
(1950, 109, 'Okinawa', '2020-01-28 13:11:43'),
(1951, 109, 'Osaka', '2020-01-28 13:11:43'),
(1952, 109, 'Saga', '2020-01-28 13:11:43'),
(1953, 109, 'Saitama', '2020-01-28 13:11:43'),
(1954, 109, 'Shiga', '2020-01-28 13:11:43'),
(1955, 109, 'Shimane', '2020-01-28 13:11:43'),
(1956, 109, 'Shizuoka', '2020-01-28 13:11:43'),
(1957, 109, 'Tochigi', '2020-01-28 13:11:43'),
(1958, 109, 'Tokushima', '2020-01-28 13:11:43'),
(1959, 109, 'Tokyo', '2020-01-28 13:11:43'),
(1960, 109, 'Tottori', '2020-01-28 13:11:43'),
(1961, 109, 'Toyama', '2020-01-28 13:11:43'),
(1962, 109, 'Wakayama', '2020-01-28 13:11:43'),
(1963, 109, 'Yamagata', '2020-01-28 13:11:43'),
(1964, 109, 'Yamaguchi', '2020-01-28 13:11:43'),
(1965, 109, 'Yamanashi', '2020-01-28 13:11:43'),
(1966, 110, 'Grouville', '2020-01-28 13:11:43'),
(1967, 110, 'Saint Brelade', '2020-01-28 13:11:43'),
(1968, 110, 'Saint Clement', '2020-01-28 13:11:43'),
(1969, 110, 'Saint Helier', '2020-01-28 13:11:43'),
(1970, 110, 'Saint John', '2020-01-28 13:11:43'),
(1971, 110, 'Saint Lawrence', '2020-01-28 13:11:43'),
(1972, 110, 'Saint Martin', '2020-01-28 13:11:43'),
(1973, 110, 'Saint Mary', '2020-01-28 13:11:43'),
(1974, 110, 'Saint Peter', '2020-01-28 13:11:43'),
(1975, 110, 'Saint Saviour', '2020-01-28 13:11:43'),
(1976, 110, 'Trinity', '2020-01-28 13:11:43'),
(1977, 111, '\'Ajlun', '2020-01-28 13:11:43'),
(1978, 111, 'Amman', '2020-01-28 13:11:43'),
(1979, 111, 'Irbid', '2020-01-28 13:11:43'),
(1980, 111, 'Jarash', '2020-01-28 13:11:43'),
(1981, 111, 'Ma\'an', '2020-01-28 13:11:43'),
(1982, 111, 'Madaba', '2020-01-28 13:11:43'),
(1983, 111, 'al-\'Aqabah', '2020-01-28 13:11:43'),
(1984, 111, 'al-Balqa\'', '2020-01-28 13:11:43'),
(1985, 111, 'al-Karak', '2020-01-28 13:11:43'),
(1986, 111, 'al-Mafraq', '2020-01-28 13:11:43'),
(1987, 111, 'at-Tafilah', '2020-01-28 13:11:43'),
(1988, 111, 'az-Zarqa\'', '2020-01-28 13:11:43'),
(1989, 112, 'Akmecet', '2020-01-28 13:11:43'),
(1990, 112, 'Akmola', '2020-01-28 13:11:43'),
(1991, 112, 'Aktobe', '2020-01-28 13:11:43'),
(1992, 112, 'Almati', '2020-01-28 13:11:43'),
(1993, 112, 'Atirau', '2020-01-28 13:11:43'),
(1994, 112, 'Batis Kazakstan', '2020-01-28 13:11:43'),
(1995, 112, 'Burlinsky Region', '2020-01-28 13:11:43'),
(1996, 112, 'Karagandi', '2020-01-28 13:11:43'),
(1997, 112, 'Kostanay', '2020-01-28 13:11:43'),
(1998, 112, 'Mankistau', '2020-01-28 13:11:43'),
(1999, 112, 'Ontustik Kazakstan', '2020-01-28 13:11:43'),
(2000, 112, 'Pavlodar', '2020-01-28 13:11:43'),
(2001, 112, 'Sigis Kazakstan', '2020-01-28 13:11:43'),
(2002, 112, 'Soltustik Kazakstan', '2020-01-28 13:11:43'),
(2003, 112, 'Taraz', '2020-01-28 13:11:43'),
(2004, 113, 'Central', '2020-01-28 13:11:43'),
(2005, 113, 'Coast', '2020-01-28 13:11:43'),
(2006, 113, 'Eastern', '2020-01-28 13:11:43'),
(2007, 113, 'Nairobi', '2020-01-28 13:11:43'),
(2008, 113, 'North Eastern', '2020-01-28 13:11:43'),
(2009, 113, 'Nyanza', '2020-01-28 13:11:43'),
(2010, 113, 'Rift Valley', '2020-01-28 13:11:43'),
(2011, 113, 'Western', '2020-01-28 13:11:43'),
(2012, 114, 'Abaiang', '2020-01-28 13:11:43'),
(2013, 114, 'Abemana', '2020-01-28 13:11:43'),
(2014, 114, 'Aranuka', '2020-01-28 13:11:43'),
(2015, 114, 'Arorae', '2020-01-28 13:11:43'),
(2016, 114, 'Banaba', '2020-01-28 13:11:43'),
(2017, 114, 'Beru', '2020-01-28 13:11:43'),
(2018, 114, 'Butaritari', '2020-01-28 13:11:43'),
(2019, 114, 'Kiritimati', '2020-01-28 13:11:43'),
(2020, 114, 'Kuria', '2020-01-28 13:11:43'),
(2021, 114, 'Maiana', '2020-01-28 13:11:43'),
(2022, 114, 'Makin', '2020-01-28 13:11:43'),
(2023, 114, 'Marakei', '2020-01-28 13:11:43'),
(2024, 114, 'Nikunau', '2020-01-28 13:11:43'),
(2025, 114, 'Nonouti', '2020-01-28 13:11:43'),
(2026, 114, 'Onotoa', '2020-01-28 13:11:43'),
(2027, 114, 'Phoenix Islands', '2020-01-28 13:11:43'),
(2028, 114, 'Tabiteuea North', '2020-01-28 13:11:43'),
(2029, 114, 'Tabiteuea South', '2020-01-28 13:11:43'),
(2030, 114, 'Tabuaeran', '2020-01-28 13:11:43'),
(2031, 114, 'Tamana', '2020-01-28 13:11:43'),
(2032, 114, 'Tarawa North', '2020-01-28 13:11:43'),
(2033, 114, 'Tarawa South', '2020-01-28 13:11:43'),
(2034, 114, 'Teraina', '2020-01-28 13:11:43'),
(2035, 115, 'Chagangdo', '2020-01-28 13:11:43'),
(2036, 115, 'Hamgyeongbukto', '2020-01-28 13:11:43'),
(2037, 115, 'Hamgyeongnamdo', '2020-01-28 13:11:43'),
(2038, 115, 'Hwanghaebukto', '2020-01-28 13:11:43'),
(2039, 115, 'Hwanghaenamdo', '2020-01-28 13:11:43'),
(2040, 115, 'Kaeseong', '2020-01-28 13:11:43'),
(2041, 115, 'Kangweon', '2020-01-28 13:11:43'),
(2042, 115, 'Nampo', '2020-01-28 13:11:43'),
(2043, 115, 'Pyeonganbukto', '2020-01-28 13:11:43'),
(2044, 115, 'Pyeongannamdo', '2020-01-28 13:11:43'),
(2045, 115, 'Pyeongyang', '2020-01-28 13:11:43'),
(2046, 115, 'Yanggang', '2020-01-28 13:11:43'),
(2047, 116, 'Busan', '2020-01-28 13:11:43'),
(2048, 116, 'Cheju', '2020-01-28 13:11:43'),
(2049, 116, 'Chollabuk', '2020-01-28 13:11:43'),
(2050, 116, 'Chollanam', '2020-01-28 13:11:43'),
(2051, 116, 'Chungbuk', '2020-01-28 13:11:43'),
(2052, 116, 'Chungcheongbuk', '2020-01-28 13:11:43'),
(2053, 116, 'Chungcheongnam', '2020-01-28 13:11:43'),
(2054, 116, 'Chungnam', '2020-01-28 13:11:43'),
(2055, 116, 'Daegu', '2020-01-28 13:11:43'),
(2056, 116, 'Gangwon-do', '2020-01-28 13:11:43'),
(2057, 116, 'Goyang-si', '2020-01-28 13:11:43'),
(2058, 116, 'Gyeonggi-do', '2020-01-28 13:11:43'),
(2059, 116, 'Gyeongsang ', '2020-01-28 13:11:43'),
(2060, 116, 'Gyeongsangnam-do', '2020-01-28 13:11:43'),
(2061, 116, 'Incheon', '2020-01-28 13:11:43'),
(2062, 116, 'Jeju-Si', '2020-01-28 13:11:43'),
(2063, 116, 'Jeonbuk', '2020-01-28 13:11:43'),
(2064, 116, 'Kangweon', '2020-01-28 13:11:43'),
(2065, 116, 'Kwangju', '2020-01-28 13:11:43'),
(2066, 116, 'Kyeonggi', '2020-01-28 13:11:43'),
(2067, 116, 'Kyeongsangbuk', '2020-01-28 13:11:43'),
(2068, 116, 'Kyeongsangnam', '2020-01-28 13:11:43'),
(2069, 116, 'Kyonggi-do', '2020-01-28 13:11:43'),
(2070, 116, 'Kyungbuk-Do', '2020-01-28 13:11:43'),
(2071, 116, 'Kyunggi-Do', '2020-01-28 13:11:43'),
(2072, 116, 'Kyunggi-do', '2020-01-28 13:11:43'),
(2073, 116, 'Pusan', '2020-01-28 13:11:43'),
(2074, 116, 'Seoul', '2020-01-28 13:11:43'),
(2075, 116, 'Sudogwon', '2020-01-28 13:11:43'),
(2076, 116, 'Taegu', '2020-01-28 13:11:43'),
(2077, 116, 'Taejeon', '2020-01-28 13:11:43'),
(2078, 116, 'Taejon-gwangyoksi', '2020-01-28 13:11:43'),
(2079, 116, 'Ulsan', '2020-01-28 13:11:43'),
(2080, 116, 'Wonju', '2020-01-28 13:11:43'),
(2081, 116, 'gwangyoksi', '2020-01-28 13:11:43'),
(2082, 117, 'Al Asimah', '2020-01-28 13:11:43'),
(2083, 117, 'Hawalli', '2020-01-28 13:11:43'),
(2084, 117, 'Mishref', '2020-01-28 13:11:43'),
(2085, 117, 'Qadesiya', '2020-01-28 13:11:43'),
(2086, 117, 'Safat', '2020-01-28 13:11:43'),
(2087, 117, 'Salmiya', '2020-01-28 13:11:43'),
(2088, 117, 'al-Ahmadi', '2020-01-28 13:11:43'),
(2089, 117, 'al-Farwaniyah', '2020-01-28 13:11:43'),
(2090, 117, 'al-Jahra', '2020-01-28 13:11:43'),
(2091, 117, 'al-Kuwayt', '2020-01-28 13:11:43'),
(2092, 118, 'Batken', '2020-01-28 13:11:43'),
(2093, 118, 'Bishkek', '2020-01-28 13:11:43'),
(2094, 118, 'Chui', '2020-01-28 13:11:43'),
(2095, 118, 'Issyk-Kul', '2020-01-28 13:11:43'),
(2096, 118, 'Jalal-Abad', '2020-01-28 13:11:43'),
(2097, 118, 'Naryn', '2020-01-28 13:11:43'),
(2098, 118, 'Osh', '2020-01-28 13:11:43'),
(2099, 118, 'Talas', '2020-01-28 13:11:43'),
(2100, 119, 'Attopu', '2020-01-28 13:11:43'),
(2101, 119, 'Bokeo', '2020-01-28 13:11:43'),
(2102, 119, 'Bolikhamsay', '2020-01-28 13:11:43'),
(2103, 119, 'Champasak', '2020-01-28 13:11:43'),
(2104, 119, 'Houaphanh', '2020-01-28 13:11:43'),
(2105, 119, 'Khammouane', '2020-01-28 13:11:43'),
(2106, 119, 'Luang Nam Tha', '2020-01-28 13:11:43'),
(2107, 119, 'Luang Prabang', '2020-01-28 13:11:43'),
(2108, 119, 'Oudomxay', '2020-01-28 13:11:43'),
(2109, 119, 'Phongsaly', '2020-01-28 13:11:43'),
(2110, 119, 'Saravan', '2020-01-28 13:11:43'),
(2111, 119, 'Savannakhet', '2020-01-28 13:11:43'),
(2112, 119, 'Sekong', '2020-01-28 13:11:43'),
(2113, 119, 'Viangchan Prefecture', '2020-01-28 13:11:43'),
(2114, 119, 'Viangchan Province', '2020-01-28 13:11:43'),
(2115, 119, 'Xaignabury', '2020-01-28 13:11:43'),
(2116, 119, 'Xiang Khuang', '2020-01-28 13:11:43'),
(2117, 120, 'Aizkraukles', '2020-01-28 13:11:43'),
(2118, 120, 'Aluksnes', '2020-01-28 13:11:43'),
(2119, 120, 'Balvu', '2020-01-28 13:11:43'),
(2120, 120, 'Bauskas', '2020-01-28 13:11:43'),
(2121, 120, 'Cesu', '2020-01-28 13:11:43'),
(2122, 120, 'Daugavpils', '2020-01-28 13:11:43'),
(2123, 120, 'Daugavpils City', '2020-01-28 13:11:43'),
(2124, 120, 'Dobeles', '2020-01-28 13:11:43'),
(2125, 120, 'Gulbenes', '2020-01-28 13:11:43'),
(2126, 120, 'Jekabspils', '2020-01-28 13:11:43'),
(2127, 120, 'Jelgava', '2020-01-28 13:11:43'),
(2128, 120, 'Jelgavas', '2020-01-28 13:11:43'),
(2129, 120, 'Jurmala City', '2020-01-28 13:11:43'),
(2130, 120, 'Kraslavas', '2020-01-28 13:11:43'),
(2131, 120, 'Kuldigas', '2020-01-28 13:11:43'),
(2132, 120, 'Liepaja', '2020-01-28 13:11:43'),
(2133, 120, 'Liepajas', '2020-01-28 13:11:43'),
(2134, 120, 'Limbazhu', '2020-01-28 13:11:43'),
(2135, 120, 'Ludzas', '2020-01-28 13:11:43'),
(2136, 120, 'Madonas', '2020-01-28 13:11:43'),
(2137, 120, 'Ogres', '2020-01-28 13:11:43'),
(2138, 120, 'Preilu', '2020-01-28 13:11:43'),
(2139, 120, 'Rezekne', '2020-01-28 13:11:43'),
(2140, 120, 'Rezeknes', '2020-01-28 13:11:43'),
(2141, 120, 'Riga', '2020-01-28 13:11:43'),
(2142, 120, 'Rigas', '2020-01-28 13:11:43'),
(2143, 120, 'Saldus', '2020-01-28 13:11:43'),
(2144, 120, 'Talsu', '2020-01-28 13:11:43'),
(2145, 120, 'Tukuma', '2020-01-28 13:11:43'),
(2146, 120, 'Valkas', '2020-01-28 13:11:43'),
(2147, 120, 'Valmieras', '2020-01-28 13:11:43'),
(2148, 120, 'Ventspils', '2020-01-28 13:11:43'),
(2149, 120, 'Ventspils City', '2020-01-28 13:11:43'),
(2150, 121, 'Beirut', '2020-01-28 13:11:43'),
(2151, 121, 'Jabal Lubnan', '2020-01-28 13:11:43'),
(2152, 121, 'Mohafazat Liban-Nord', '2020-01-28 13:11:43'),
(2153, 121, 'Mohafazat Mont-Liban', '2020-01-28 13:11:43'),
(2154, 121, 'Sidon', '2020-01-28 13:11:43'),
(2155, 121, 'al-Biqa', '2020-01-28 13:11:43'),
(2156, 121, 'al-Janub', '2020-01-28 13:11:43'),
(2157, 121, 'an-Nabatiyah', '2020-01-28 13:11:43'),
(2158, 121, 'ash-Shamal', '2020-01-28 13:11:43'),
(2159, 122, 'Berea', '2020-01-28 13:11:43'),
(2160, 122, 'Butha-Buthe', '2020-01-28 13:11:43'),
(2161, 122, 'Leribe', '2020-01-28 13:11:43'),
(2162, 122, 'Mafeteng', '2020-01-28 13:11:43'),
(2163, 122, 'Maseru', '2020-01-28 13:11:43'),
(2164, 122, 'Mohale\'s Hoek', '2020-01-28 13:11:43'),
(2165, 122, 'Mokhotlong', '2020-01-28 13:11:43'),
(2166, 122, 'Qacha\'s Nek', '2020-01-28 13:11:43'),
(2167, 122, 'Quthing', '2020-01-28 13:11:43'),
(2168, 122, 'Thaba-Tseka', '2020-01-28 13:11:43'),
(2169, 123, 'Bomi', '2020-01-28 13:11:43'),
(2170, 123, 'Bong', '2020-01-28 13:11:43'),
(2171, 123, 'Grand Bassa', '2020-01-28 13:11:43'),
(2172, 123, 'Grand Cape Mount', '2020-01-28 13:11:43'),
(2173, 123, 'Grand Gedeh', '2020-01-28 13:11:43'),
(2174, 123, 'Loffa', '2020-01-28 13:11:43'),
(2175, 123, 'Margibi', '2020-01-28 13:11:43');
INSERT INTO `state` (`state_id`, `country_id`, `state_name`, `date`) VALUES
(2176, 123, 'Maryland and Grand Kru', '2020-01-28 13:11:43'),
(2177, 123, 'Montserrado', '2020-01-28 13:11:43'),
(2178, 123, 'Nimba', '2020-01-28 13:11:43'),
(2179, 123, 'Rivercess', '2020-01-28 13:11:43'),
(2180, 123, 'Sinoe', '2020-01-28 13:11:43');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `store_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `store_user_id` int(11) NOT NULL,
  `store_name` varchar(350) NOT NULL,
  `store_mobile` varchar(20) NOT NULL,
  `store_email` varchar(250) NOT NULL,
  `store_address` text NOT NULL,
  `store_city` varchar(350) NOT NULL,
  `district_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `store_password` varchar(150) NOT NULL,
  `store_status` int(11) NOT NULL DEFAULT 1,
  `store_addedby` int(11) NOT NULL,
  `store_crated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tahasil`
--

CREATE TABLE `tahasil` (
  `tahasil_id` bigint(20) NOT NULL,
  `country_id` bigint(20) NOT NULL,
  `state_id` bigint(20) NOT NULL,
  `district_id` bigint(20) NOT NULL,
  `tahasil_name` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahasil`
--

INSERT INTO `tahasil` (`tahasil_id`, `country_id`, `state_id`, `district_id`, `tahasil_name`, `date`) VALUES
(4, 101, 22, 6, 'Gadhinglaj', '2020-01-29 11:26:55'),
(5, 101, 22, 6, 'karveer', '2020-01-31 12:50:30'),
(6, 101, 22, 6, 'karveer', '2020-01-31 12:50:30'),
(7, 101, 22, 6, 'Karvir ', '2020-02-01 09:41:57'),
(8, 101, 22, 6, 'Panhala ', '2020-02-01 09:42:26'),
(9, 101, 22, 6, 'Shahuwadi ', '2020-02-01 09:42:49'),
(10, 101, 22, 6, 'Kagal ', '2020-02-01 09:43:26'),
(11, 101, 22, 6, 'Hatkanangale ', '2020-02-01 09:43:52'),
(12, 101, 22, 6, 'Shirol ', '2020-02-01 09:44:17'),
(13, 101, 22, 6, 'Radhanagari ', '2020-02-01 09:44:45'),
(14, 101, 22, 6, 'Gaganbawada', '2020-02-01 09:46:08'),
(15, 101, 22, 6, 'Bhudargad ', '2020-02-01 09:46:40'),
(16, 101, 22, 6, 'Chandgad ', '2020-02-01 09:47:13'),
(17, 101, 22, 6, 'Ajra ', '2020-02-01 09:47:36'),
(18, 101, 22, 32, 'Ambegaon', '2020-02-05 09:42:39'),
(19, 101, 22, 32, 'Baramati', '2020-02-05 09:43:29'),
(20, 101, 22, 32, 'Bhor', '2020-02-05 09:44:13'),
(21, 101, 22, 32, 'Daund', '2020-02-05 09:44:50'),
(22, 101, 22, 32, 'Haveli', '2020-02-05 09:46:36'),
(23, 101, 22, 32, 'Indapur', '2020-02-05 09:47:10'),
(24, 101, 22, 32, 'Junnar', '2020-02-05 09:48:13'),
(25, 101, 22, 32, 'Khed', '2020-02-05 09:50:32'),
(26, 101, 22, 32, 'Mawal', '2020-02-05 09:50:57'),
(27, 101, 22, 32, 'Mulshi', '2020-02-05 09:51:55'),
(28, 101, 22, 32, 'PuneCity', '2020-02-05 09:52:30'),
(29, 101, 22, 32, 'Purandhar', '2020-02-05 09:53:00'),
(30, 101, 22, 32, 'Shirur', '2020-02-05 09:53:38'),
(31, 101, 22, 32, 'Velhe', '2020-02-05 09:54:17'),
(32, 101, 22, 33, 'Alibag', '2020-02-05 09:55:39'),
(33, 101, 22, 33, 'Karjat', '2020-02-05 09:56:39'),
(34, 101, 22, 33, 'Khalapur', '2020-02-05 09:57:10'),
(35, 101, 22, 33, 'Mahad', '2020-02-05 09:57:50'),
(36, 101, 22, 33, 'Mangaon', '2020-02-05 09:59:51'),
(37, 101, 22, 33, 'Mhasla', '2020-02-05 10:00:28'),
(38, 101, 22, 33, 'Murud', '2020-02-05 10:41:33'),
(39, 101, 22, 33, 'Panvel', '2020-02-05 10:01:51'),
(40, 101, 22, 33, 'Pen', '2020-02-05 10:02:32'),
(41, 101, 22, 33, 'Poladpur', '2020-02-05 10:03:13'),
(42, 101, 22, 33, 'Roha', '2020-02-05 10:03:43'),
(43, 101, 22, 33, 'Shrivardhan', '2020-02-05 10:04:15'),
(44, 101, 22, 33, 'Sudhagad', '2020-02-05 10:04:55'),
(45, 101, 22, 33, 'Tala', '2020-02-05 10:05:31'),
(46, 101, 22, 33, 'Uran', '2020-02-05 10:06:07'),
(47, 101, 22, 34, 'Chiplun', '2020-02-05 10:07:13'),
(48, 101, 22, 34, 'Dapoli', '2020-02-05 10:07:55'),
(49, 101, 22, 34, 'Guhagar', '2020-02-05 10:08:39'),
(50, 101, 22, 34, 'Khed', '2020-02-05 10:09:47'),
(51, 101, 22, 34, 'Lanja', '2020-02-05 10:29:34'),
(52, 101, 22, 34, 'Mandangad', '2020-02-05 10:30:10'),
(53, 101, 22, 34, 'Rajapur', '2020-02-05 10:30:47'),
(54, 101, 22, 34, 'Ratnagiri', '2020-02-05 10:31:25'),
(55, 101, 22, 34, 'Sangameshwar', '2020-02-05 10:32:06'),
(56, 101, 22, 7, 'Atpadi', '2020-02-05 10:33:55'),
(57, 101, 22, 7, 'Jat', '2020-02-05 10:35:55'),
(58, 101, 22, 7, 'Kadegaon', '2020-02-05 10:36:25'),
(59, 101, 22, 7, 'Kavathe Mahanka', '2020-02-05 10:37:09'),
(60, 101, 22, 7, 'Khanapur', '2020-02-05 10:37:41'),
(61, 101, 22, 7, 'Miraj', '2020-02-05 10:38:06'),
(62, 101, 22, 7, 'Palus', '2020-02-05 10:40:41'),
(63, 101, 22, 7, 'Shirala', '2020-02-05 10:38:56'),
(64, 101, 22, 7, 'Tasgaon', '2020-02-05 10:39:29'),
(65, 101, 22, 7, 'Walwa', '2020-02-05 10:40:14'),
(66, 101, 22, 35, 'Jaoli', '2020-02-05 10:42:36'),
(67, 101, 22, 35, 'Karad', '2020-02-05 10:43:28'),
(68, 101, 22, 35, 'Khandala', '2020-02-05 10:44:00'),
(69, 101, 22, 35, 'Khatav', '2020-02-05 10:44:56'),
(70, 101, 22, 35, 'Koregaon', '2020-02-05 10:45:31'),
(71, 101, 22, 35, 'Mahabaleshwar', '2020-02-05 10:45:58'),
(72, 101, 22, 35, 'Man', '2020-02-05 10:46:27'),
(73, 101, 22, 35, 'Patan', '2020-02-05 11:18:44'),
(75, 101, 22, 35, 'Phaltan', '2020-02-05 10:48:56'),
(76, 101, 22, 35, 'Satara', '2020-02-05 10:50:03'),
(77, 101, 22, 35, 'Wai', '2020-02-05 10:51:13'),
(78, 101, 22, 36, 'Devgad', '2020-02-05 10:52:12'),
(79, 101, 22, 36, 'Dodamarg', '2020-02-05 10:52:58'),
(80, 101, 22, 36, 'Kankavli', '2020-02-05 10:53:59'),
(81, 101, 22, 36, 'Kudal', '2020-02-05 10:54:46'),
(82, 101, 22, 36, 'Malwan', '2020-02-05 10:55:33'),
(83, 101, 22, 36, 'Sawantwadi', '2020-02-05 10:57:24'),
(84, 101, 22, 36, 'Vaibhvvadi', '2020-02-05 10:58:02'),
(85, 101, 22, 36, 'Vengurla', '2020-02-05 10:58:40'),
(86, 101, 22, 37, 'Akkalkot', '2020-02-05 10:59:45'),
(87, 101, 22, 37, 'Barshi', '2020-02-05 11:00:17'),
(88, 101, 22, 37, 'Karmala', '2020-02-05 11:00:49'),
(89, 101, 22, 37, 'Madha', '2020-02-05 11:01:32'),
(90, 101, 22, 37, 'Malshiras', '2020-02-05 11:02:27'),
(92, 101, 22, 37, 'Mangavedhe', '2020-02-05 11:03:47'),
(93, 101, 22, 37, 'Mohol', '2020-02-05 11:04:56'),
(94, 101, 22, 37, 'Pandharpur', '2020-02-05 11:05:43'),
(95, 101, 22, 37, 'Sangole', '2020-02-05 11:08:39'),
(98, 101, 22, 37, 'Solapur North', '2020-02-05 11:09:39'),
(99, 101, 22, 37, 'Solapur South', '2020-02-05 11:12:13'),
(100, 101, 22, 38, 'Ambarnath', '2020-02-05 11:13:35'),
(101, 101, 22, 38, 'Bhiwandi', '2020-02-05 11:14:07'),
(102, 101, 22, 38, 'Kalyan', '2020-02-05 11:14:45'),
(103, 101, 22, 38, 'Murbad', '2020-02-05 11:15:23'),
(104, 101, 22, 38, 'Shahapur', '2020-02-05 11:16:17'),
(105, 101, 22, 38, 'Thane', '2020-02-05 11:16:44'),
(106, 101, 22, 38, 'Ulhasnagar', '2020-02-05 11:19:52'),
(107, 101, 22, 38, 'Vasai', '2020-02-05 11:20:55'),
(108, 101, 22, 29, 'Bhum', '2020-02-05 11:21:50'),
(109, 101, 22, 29, 'Kalamb', '2020-02-05 11:23:05'),
(110, 101, 22, 29, 'Lohara', '2020-02-05 11:23:40'),
(111, 101, 22, 29, 'Osmanabad', '2020-02-05 11:24:08'),
(112, 101, 22, 29, 'Paranda', '2020-02-05 11:24:35'),
(113, 101, 22, 29, 'Tuljapur', '2020-02-05 11:25:07'),
(114, 101, 22, 29, 'Umarga', '2020-02-05 11:25:31'),
(115, 101, 22, 29, 'Washi', '2020-02-05 11:26:07'),
(116, 101, 22, 30, 'Dahanu', '2020-02-05 11:27:08'),
(117, 101, 22, 30, 'Jawhar', '2020-02-05 11:28:07'),
(118, 101, 22, 30, 'Mokhada', '2020-02-05 11:28:41'),
(119, 101, 22, 30, 'Palghar', '2020-02-05 11:29:15'),
(120, 101, 22, 30, 'Palghar', '2020-02-05 11:30:07'),
(122, 101, 22, 30, 'Talasari', '2020-02-05 11:30:50'),
(123, 101, 22, 30, 'Vada', '2020-02-05 11:31:23'),
(124, 101, 22, 30, 'Vikramgad', '2020-02-05 11:31:49'),
(126, 101, 22, 9, 'Akola', '2020-02-06 08:34:11'),
(127, 101, 22, 9, 'Akot', '2020-02-06 08:35:17'),
(128, 101, 22, 9, 'Balapur', '2020-02-06 08:36:02'),
(129, 101, 22, 9, 'Barshitakli', '2020-02-06 08:38:14'),
(130, 101, 22, 9, 'Murtijapur', '2020-02-06 08:38:36'),
(131, 101, 22, 9, 'Patur', '2020-02-06 08:39:17'),
(132, 101, 22, 9, 'Telhara', '2020-02-06 08:39:55'),
(133, 101, 22, 10, 'Achalpur', '2020-02-06 08:40:59'),
(134, 101, 22, 10, 'Achalpur', '2020-02-06 08:41:25'),
(136, 101, 22, 10, 'Amravati', '2020-02-06 08:42:03'),
(137, 101, 22, 10, 'Anjangaon Surji', '2020-02-06 08:42:37'),
(138, 101, 22, 10, 'Bhatkuli', '2020-02-06 08:43:14'),
(139, 101, 22, 10, 'Chandur Railway', '2020-02-06 08:44:05'),
(140, 101, 22, 10, 'Chandurbazar', '2020-02-06 08:44:46'),
(141, 101, 22, 10, 'Chikhaldara', '2020-02-06 08:45:47'),
(142, 101, 22, 10, 'Daryapur', '2020-02-06 08:46:27'),
(143, 101, 22, 10, 'Dhamangaon Railway', '2020-02-06 08:47:05'),
(144, 101, 22, 10, 'Dharni', '2020-02-06 08:47:33'),
(145, 101, 22, 10, 'Morshi', '2020-02-06 08:48:12'),
(146, 101, 22, 10, 'Nandgaon-Khandeshwar', '2020-02-06 08:48:59'),
(147, 101, 22, 10, 'Teosa', '2020-02-06 08:49:44'),
(148, 101, 22, 10, 'Warud', '2020-02-06 08:50:13'),
(149, 101, 22, 13, 'Bhandara', '2020-02-06 08:51:09'),
(150, 101, 22, 13, 'Lakhandur', '2020-02-06 08:51:48'),
(151, 101, 22, 13, 'Lakhani', '2020-02-06 08:52:38'),
(152, 101, 22, 13, 'Mohadi', '2020-02-06 08:54:25'),
(153, 101, 22, 13, 'Pauni', '2020-02-06 08:54:51'),
(154, 101, 22, 13, 'Sakoli', '2020-02-06 08:55:41'),
(155, 101, 22, 13, 'Tumsar', '2020-02-06 08:56:11'),
(156, 101, 22, 14, 'Buldana', '2020-02-06 08:57:35'),
(157, 101, 22, 14, 'Chikhli', '2020-02-06 08:58:10'),
(158, 101, 22, 14, 'Deolgaon Raja', '2020-02-06 08:58:52'),
(159, 101, 22, 14, 'Jalgaon', '2020-02-06 08:59:37'),
(160, 101, 22, 14, 'Khamgaon', '2020-02-06 09:00:01'),
(161, 101, 22, 14, 'Lonar', '2020-02-06 09:00:28'),
(162, 101, 22, 14, 'Malkapur', '2020-02-06 09:01:04'),
(164, 101, 22, 14, 'Motala', '2020-02-06 09:02:19'),
(165, 101, 22, 14, 'Nandura', '2020-02-06 09:03:35'),
(167, 101, 22, 14, 'Sangrampur', '2020-02-06 09:04:47'),
(168, 101, 22, 14, 'Sindkhed Raja', '2020-02-06 09:05:19'),
(169, 101, 22, 14, 'Mehkar', '2020-02-06 09:17:59'),
(170, 101, 22, 15, 'Bhadravati', '2020-02-06 09:41:38'),
(171, 101, 22, 15, 'Bramapuri', '2020-02-06 09:42:07'),
(172, 101, 22, 15, 'Chandrapur', '2020-02-06 09:42:32'),
(173, 101, 22, 15, 'Chimur', '2020-02-06 09:43:02'),
(174, 101, 22, 15, 'Gondpipri', '2020-02-06 09:43:33'),
(175, 101, 22, 15, 'Jiwati', '2020-02-06 09:44:12'),
(176, 101, 22, 15, 'Korpana', '2020-02-06 09:44:44'),
(177, 101, 22, 15, 'Mul', '2020-02-06 09:45:15'),
(178, 101, 22, 15, 'Nagbhir', '2020-02-06 09:45:51'),
(179, 101, 22, 15, 'Pombhurna', '2020-02-06 09:46:25'),
(180, 101, 22, 15, 'Rajura', '2020-02-06 09:46:48'),
(182, 101, 22, 15, 'Sindewahi', '2020-02-06 09:49:25'),
(183, 101, 22, 15, 'Warora', '2020-02-06 09:49:52'),
(184, 101, 22, 17, 'Aheri', '2020-02-06 09:51:30'),
(185, 101, 22, 17, 'Armori', '2020-02-06 09:52:19'),
(186, 101, 22, 17, 'Bhamragad', '2020-02-06 09:52:47'),
(187, 101, 22, 17, 'Chamorshi', '2020-02-06 09:53:15'),
(188, 101, 22, 17, 'Desaiganj', '2020-02-06 09:53:47'),
(189, 101, 22, 17, 'Dhanora', '2020-02-06 09:54:14'),
(190, 101, 22, 17, 'Etapalli', '2020-02-06 09:54:53'),
(191, 101, 22, 17, 'Gadchiroli', '2020-02-06 09:55:36'),
(192, 101, 22, 17, 'Korchi', '2020-02-06 09:56:06'),
(193, 101, 22, 17, 'Kurkheda', '2020-02-06 09:57:18'),
(194, 101, 22, 17, 'Mulchera', '2020-02-06 09:57:41'),
(195, 101, 22, 17, 'Sironcha', '2020-02-06 09:58:05'),
(196, 101, 22, 18, 'Amgaon', '2020-02-06 10:00:02'),
(197, 101, 22, 18, 'Arjuni Morgaon', '2020-02-06 10:00:27'),
(198, 101, 22, 18, 'Deori', '2020-02-06 10:00:51'),
(199, 101, 22, 18, 'Gondiya', '2020-02-06 10:01:20'),
(200, 101, 22, 18, 'Goregaon', '2020-02-06 10:01:45'),
(201, 101, 22, 18, 'Sadak Arjuni', '2020-02-06 10:02:44'),
(202, 101, 22, 18, 'Salekasa', '2020-02-06 10:03:09'),
(203, 101, 22, 18, 'Tirora', '2020-02-06 10:03:37'),
(204, 101, 22, 20, 'Amalner', '2020-02-06 10:04:55'),
(205, 101, 22, 20, 'Bhadgaon', '2020-02-06 10:05:50'),
(206, 101, 22, 20, 'Bhusawal', '2020-02-06 10:06:15'),
(207, 101, 22, 20, 'Bodvad', '2020-02-06 10:06:47'),
(208, 101, 22, 20, 'Chalisgaon', '2020-02-06 10:07:11'),
(209, 101, 22, 20, 'Chopda', '2020-02-06 10:07:43'),
(210, 101, 22, 20, 'Dharangaon', '2020-02-06 10:08:13'),
(211, 101, 22, 20, 'Erandol', '2020-02-06 10:08:36'),
(213, 101, 22, 20, 'Jalgaon', '2020-02-06 10:09:14'),
(214, 101, 22, 20, 'Jamner', '2020-02-06 10:09:44'),
(215, 101, 22, 20, 'Muktainagar', '2020-02-06 10:10:08'),
(216, 101, 22, 20, 'Pachora', '2020-02-06 10:10:57'),
(217, 101, 22, 20, 'Parola', '2020-02-06 10:11:52'),
(218, 101, 22, 20, 'Raver', '2020-02-06 10:12:26'),
(219, 101, 22, 20, 'Yawal', '2020-02-06 10:12:54'),
(220, 101, 22, 25, 'Bhiwapur', '2020-02-06 10:14:55'),
(221, 101, 22, 25, 'Hingna', '2020-02-06 10:15:26'),
(222, 101, 22, 25, 'Kalameshwar', '2020-02-06 10:15:58'),
(223, 101, 22, 25, 'Kamptee', '2020-02-06 10:16:44'),
(224, 101, 22, 25, 'Katol', '2020-02-06 10:17:07'),
(225, 101, 22, 25, 'Kuhi', '2020-02-06 10:17:32'),
(226, 101, 22, 25, 'Mauda', '2020-02-06 10:17:59'),
(227, 101, 22, 25, 'Nagpur Rural', '2020-02-06 10:18:28'),
(228, 101, 22, 25, 'Nagpur Urban', '2020-02-06 10:19:02'),
(229, 101, 22, 25, 'Narkhed', '2020-02-06 10:22:22'),
(230, 101, 22, 25, 'Parseoni', '2020-02-06 10:22:58'),
(231, 101, 22, 25, 'Ramtek', '2020-02-06 10:24:11'),
(232, 101, 22, 25, 'Savner', '2020-02-06 10:25:49'),
(233, 101, 22, 25, 'Umred', '2020-02-06 10:26:54'),
(236, 101, 22, 39, 'Arvi', '2020-02-06 10:31:22'),
(237, 101, 22, 39, 'Ashti', '2020-02-06 10:31:47'),
(238, 101, 22, 39, 'Deoli', '2020-02-06 10:32:10'),
(239, 101, 22, 39, 'Hinganghat', '2020-02-06 10:32:49'),
(240, 101, 22, 39, 'Karanja', '2020-02-06 10:33:38'),
(241, 101, 22, 39, 'Samudrapur', '2020-02-06 10:34:16'),
(242, 101, 22, 39, 'Seloo', '2020-02-06 10:34:51'),
(243, 101, 22, 39, 'Wardha', '2020-02-06 10:35:19'),
(244, 101, 22, 40, 'Karanja', '2020-02-06 10:36:22'),
(245, 101, 22, 40, 'Malegaon', '2020-02-06 10:36:50'),
(246, 101, 22, 40, 'Mangrupir', '2020-02-06 10:37:14'),
(247, 101, 22, 40, 'Manora', '2020-02-06 10:37:38'),
(248, 101, 22, 40, 'Risod', '2020-02-06 10:38:04'),
(249, 101, 22, 40, 'Washim', '2020-02-06 10:38:45'),
(250, 101, 22, 41, 'Arni', '2020-02-06 10:39:39'),
(251, 101, 22, 41, 'Babulgaon', '2020-02-06 10:40:30'),
(252, 101, 22, 41, 'Darwha', '2020-02-06 10:41:07'),
(253, 101, 22, 41, 'Digras', '2020-02-06 10:41:40'),
(254, 101, 22, 41, 'Ghatanji', '2020-02-06 10:42:07'),
(255, 101, 22, 41, 'Kalamb', '2020-02-06 10:42:37'),
(256, 101, 22, 41, 'Kelapur', '2020-02-06 10:43:00'),
(257, 101, 22, 41, 'Mahagaon', '2020-02-06 10:43:54'),
(258, 101, 22, 41, 'Maregaon', '2020-02-06 10:44:29'),
(259, 101, 22, 41, 'Ner', '2020-02-06 10:45:24'),
(260, 101, 22, 41, 'Pusad', '2020-02-06 10:46:16'),
(261, 101, 22, 41, 'Ralegaon', '2020-02-06 10:46:40'),
(262, 101, 22, 41, 'Umarkhed', '2020-02-06 10:47:37'),
(263, 101, 22, 41, 'Wani', '2020-02-06 10:47:59'),
(264, 101, 22, 41, 'Yavatmal', '2020-02-06 10:48:29'),
(265, 101, 22, 41, 'ZariJamani', '2020-02-06 10:48:56'),
(266, 101, 22, 28, 'Baglan', '2020-02-06 12:10:09'),
(267, 101, 22, 28, 'Chandvad', '2020-02-06 12:10:38'),
(268, 101, 22, 28, 'Deola', '2020-02-06 12:11:11'),
(269, 101, 22, 28, 'Dindori', '2020-02-06 12:11:37'),
(270, 101, 22, 28, 'Igatpuri', '2020-02-06 12:12:08'),
(271, 101, 22, 28, 'Kalwan', '2020-02-06 12:12:34'),
(272, 101, 22, 28, 'Malegaon', '2020-02-06 12:12:58'),
(273, 101, 22, 28, 'Nandgaon', '2020-02-06 12:13:28'),
(274, 101, 22, 28, 'Nashik', '2020-02-06 12:13:55'),
(275, 101, 22, 28, 'Niphad', '2020-02-06 12:14:46'),
(276, 101, 22, 28, 'Peint', '2020-02-06 12:15:34'),
(277, 101, 22, 28, 'Sinnar', '2020-02-06 12:16:02'),
(278, 101, 22, 28, 'Surgana', '2020-02-06 12:16:43'),
(279, 101, 22, 28, 'Trimbakeshwar', '2020-02-06 12:17:24'),
(280, 101, 22, 28, 'Yevla', '2020-02-06 12:18:05'),
(281, 101, 22, 31, 'Gangakheda', '2020-02-06 12:20:12'),
(282, 101, 22, 31, 'Jintur', '2020-02-06 12:21:49'),
(283, 101, 22, 31, 'Manwath', '2020-02-06 12:22:19'),
(284, 101, 22, 31, 'Palam', '2020-02-06 12:22:53'),
(285, 101, 22, 31, 'Parbhani', '2020-02-06 12:23:20'),
(286, 101, 22, 31, 'Pathri', '2020-02-06 12:24:14'),
(287, 101, 22, 31, 'Purna', '2020-02-06 12:24:53'),
(288, 101, 22, 31, 'Sonpeth', '2020-02-06 12:26:12'),
(289, 101, 22, 21, 'Ambad', '2020-02-06 12:27:23'),
(290, 101, 22, 21, 'Badnapur', '2020-02-06 12:27:55'),
(291, 101, 22, 21, 'Bhokardan', '2020-02-06 12:28:42'),
(292, 101, 22, 21, 'Ghasawangi', '2020-02-06 12:29:16'),
(293, 101, 22, 21, 'Jafferabad', '2020-02-06 12:30:38'),
(294, 101, 22, 21, 'jalna', '2020-02-06 12:33:05'),
(295, 101, 22, 21, 'Mantha', '2020-02-06 12:33:40'),
(296, 101, 22, 21, 'Partur', '2020-02-06 12:34:08'),
(297, 101, 22, 22, 'Ahmadpur', '2020-02-06 12:37:06'),
(298, 101, 22, 22, 'Ausa', '2020-02-06 12:37:40'),
(299, 101, 22, 22, 'Chakur', '2020-02-06 12:38:11'),
(300, 101, 22, 22, 'Deoni', '2020-02-06 12:38:39'),
(301, 101, 22, 22, 'Jalkot', '2020-02-06 12:39:08'),
(302, 101, 22, 22, 'Latur', '2020-02-06 12:39:49'),
(303, 101, 22, 22, 'Nilanga', '2020-02-06 12:40:19'),
(304, 101, 22, 22, 'Renapur', '2020-02-06 12:40:52'),
(305, 101, 22, 22, 'Shirur Anantpal', '2020-02-06 12:42:03'),
(306, 101, 22, 22, 'Udgir', '2020-02-06 12:42:41'),
(307, 101, 22, 19, 'Aundha', '2020-02-06 12:44:56'),
(308, 101, 22, 19, 'Basmath', '2020-02-06 12:46:53'),
(309, 101, 22, 19, 'Hingoli', '2020-02-06 12:47:18'),
(310, 101, 22, 19, 'Kalamnuri', '2020-02-06 12:47:50'),
(311, 101, 22, 19, 'Sengaon', '2020-02-06 12:48:29'),
(312, 101, 22, 16, 'Dhule', '2020-02-07 09:17:59'),
(313, 101, 22, 16, 'Sakri', '2020-02-07 09:18:28'),
(314, 101, 22, 16, 'Shirpur', '2020-02-07 09:18:51'),
(315, 101, 22, 16, 'Sindkhede', '2020-02-07 09:19:24'),
(316, 101, 22, 11, 'Ambejogai', '2020-02-07 09:34:49'),
(317, 101, 22, 11, 'Ashti', '2020-02-07 09:41:14'),
(318, 101, 22, 11, 'Wadwani', '2020-02-07 09:41:51'),
(319, 101, 22, 11, 'Beed', '2020-02-07 09:42:47'),
(320, 101, 22, 11, 'Georai', '2020-02-07 09:44:16'),
(321, 101, 22, 11, 'Kaij', '2020-02-07 09:44:43'),
(322, 101, 22, 11, 'Manjlegaon', '2020-02-07 09:45:53'),
(323, 101, 22, 11, 'Parli', '2020-02-07 09:46:33'),
(324, 101, 22, 11, 'Patoda', '2020-02-07 09:47:33'),
(325, 101, 22, 11, 'Shirur', '2020-02-07 09:48:05'),
(326, 101, 22, 12, 'Aurangabad', '2020-02-07 09:49:19'),
(327, 101, 22, 12, 'Gangapur', '2020-02-07 09:50:17'),
(328, 101, 22, 12, 'Kannad', '2020-02-07 09:51:11'),
(329, 101, 22, 12, 'Khuldabad', '2020-02-07 09:53:43'),
(330, 101, 22, 12, 'Paithan', '2020-02-07 09:55:13'),
(331, 101, 22, 12, 'Sillod', '2020-02-07 09:55:44'),
(332, 101, 22, 12, 'Soegaon', '2020-02-07 09:56:13'),
(333, 101, 22, 12, 'Vaijapur', '2020-02-07 10:00:07'),
(334, 101, 22, 8, 'Akola', '2020-02-07 10:01:23'),
(335, 101, 22, 8, 'Jamkheda', '2020-02-07 10:02:42'),
(336, 101, 22, 8, 'Karjat', '2020-02-07 10:03:24'),
(337, 101, 22, 8, 'Kopargaon', '2020-02-07 10:03:52'),
(338, 101, 22, 8, 'Nagar', '2020-02-07 10:04:19'),
(339, 101, 22, 8, 'Nevasa', '2020-02-07 10:04:45'),
(340, 101, 22, 8, 'Parner', '2020-02-07 10:06:12'),
(341, 101, 22, 8, 'Pathardi', '2020-02-07 10:06:33'),
(342, 101, 22, 8, 'Rahta', '2020-02-07 10:07:23'),
(343, 101, 22, 8, 'Rahuri', '2020-02-07 10:08:06'),
(344, 101, 22, 8, 'Sangamner', '2020-02-07 10:08:48'),
(345, 101, 22, 8, 'Shevgaon', '2020-02-07 10:10:01'),
(346, 101, 22, 8, 'Shrigonda', '2020-02-07 10:10:25'),
(347, 101, 22, 8, 'Shrirampur', '2020-02-07 10:11:25');

-- --------------------------------------------------------

--
-- Table structure for table `tahsil`
--

CREATE TABLE `tahsil` (
  `tahsil_id` int(11) NOT NULL,
  `tahsil_name` varchar(250) NOT NULL,
  `tahsil_status` int(11) NOT NULL DEFAULT 1,
  `tahsil_addedby` varchar(50) NOT NULL,
  `tahsil_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahsil`
--

INSERT INTO `tahsil` (`tahsil_id`, `tahsil_name`, `tahsil_status`, `tahsil_addedby`, `tahsil_date`) VALUES
(1, 'Demo', 1, '1', '24-06-2020 08:06:50 AM');

-- --------------------------------------------------------

--
-- Table structure for table `tahsil_pincode`
--

CREATE TABLE `tahsil_pincode` (
  `tahsil_pincode_id` int(11) NOT NULL,
  `tahsil_id` int(11) NOT NULL,
  `tahsil_pincode_area` varchar(250) NOT NULL,
  `tahsil_pincode_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahsil_pincode`
--

INSERT INTO `tahsil_pincode` (`tahsil_pincode_id`, `tahsil_id`, `tahsil_pincode_area`, `tahsil_pincode_no`) VALUES
(1, 1, 'Demo 1', '111222'),
(2, 1, 'Demo2', '222333');

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `tax_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `tax_title` varchar(250) DEFAULT NULL,
  `tax_rate` double DEFAULT NULL,
  `tax_desc` text DEFAULT NULL,
  `tax_status` int(11) NOT NULL DEFAULT 1,
  `tax_addedby` varchar(50) DEFAULT NULL,
  `tax_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`tax_id`, `company_id`, `tax_title`, `tax_rate`, `tax_desc`, `tax_status`, `tax_addedby`, `tax_date`) VALUES
(1, 1, '0% GST', 0, '0% GST', 1, '1', '11-03-2020 11:03:37 '),
(2, 1, '5% GST', 5, '5% GST', 1, '1', '11-03-2020 11:03:37 '),
(3, 1, '12% GST', 12, '12% GST', 1, '1', '11-03-2020 11:03:37 ');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `team_emp_name` varchar(250) NOT NULL,
  `team_desig` varchar(250) NOT NULL,
  `team_img` varchar(250) NOT NULL,
  `team_status` int(11) NOT NULL DEFAULT 1,
  `team_addedby` varchar(50) NOT NULL,
  `team_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `unit_name` varchar(250) DEFAULT NULL,
  `unit_status` int(11) NOT NULL DEFAULT 1,
  `unit_addedby` varchar(50) DEFAULT NULL,
  `unit_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `company_id`, `unit_name`, `unit_status`, `unit_addedby`, `unit_date`) VALUES
(1, 1, 'KG', 1, '1', '15-02-2020 09:02:40 '),
(2, 1, 'L', 1, '1', '31-03-2020 05:03:51 '),
(3, 1, 'g', 1, '1', '31-03-2020 12:03:25 '),
(4, 1, 'ml', 1, '1', '03-04-2020 04:04:44 '),
(5, 1, 'Pcs', 1, '1', '03-04-2020 04:04:53 '),
(6, 1, 'Pellets', 1, '1', '27-04-2020 05:04:17 '),
(7, 1, 'Sachet', 1, '1', '28-04-2020 06:04:47 ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `branch_id` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `user_name` varchar(250) NOT NULL,
  `user_lastname` varchar(100) NOT NULL,
  `user_city` varchar(150) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_mobile` varchar(12) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_otp` varchar(10) DEFAULT NULL,
  `user_points` double NOT NULL DEFAULT 0,
  `user_latitude` varchar(100) NOT NULL,
  `user_longitude` varchar(100) NOT NULL,
  `user_status` int(11) NOT NULL DEFAULT 1,
  `user_addedby` varchar(100) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `company_id`, `branch_id`, `role_id`, `user_name`, `user_lastname`, `user_city`, `user_email`, `user_mobile`, `user_password`, `user_otp`, `user_points`, `user_latitude`, `user_longitude`, `user_status`, `user_addedby`, `user_date`, `is_admin`) VALUES
(1, 1, '', 1, 'Admin', '', 'Kolhapur', 'demo@email.com', '9876543210', '123456', NULL, 0, '', '', 1, 'Admin', '2020-02-26 10:11:01', 1),
(9, 1, '', 4, 'dfgdxfg', '', '', 'dfgsdfg@dfgdfg.gfh', '9988774455', '333', NULL, 0, '', '', 1, '1', '2020-02-26 10:43:57', 0),
(17, 1, '', 4, 'abcd', '', 'pune', 'a@gmail.com', '13244526678', '12345678', NULL, 0, '', '', 1, '1', '2020-03-19 13:47:17', 0),
(18, 1, '', 3, 'abc', '', 'pune', 'bb@gmail.com', '123446789099', '12345667', NULL, 0, '', '', 1, '1', '2020-03-19 13:48:04', 0),
(21, 1, '', 2, 'Anjali Patil', '', 'Kolhapur', 'anjalipatil5299@gmail.com', '7057211470', 'anjali123', NULL, 0, '', '', 1, '1', '2020-03-31 12:14:34', 0),
(22, 1, '', 2, 'Mansi Shinde', '', 'Kolhapur', 'shindemansi795@gmail.com', '8879589287', 'mansi@1234', NULL, 0, '', '', 1, '1', '2020-03-23 04:22:05', 0),
(23, 1, '', 5, 'Nimesh Patil', '', 'Kolhapur', 'revapatil1234@gmail.com', '7798774505', 'nimesh@4321', NULL, 0, '', '', 1, '1', '2020-03-31 12:13:17', 0),
(24, 1, '', 5, 'Shrikant Kumbhoje', '', 'Kolhapur', 'mr.kshrikant@gmail.com', '9579437728', 'shrikant@4321', NULL, 0, '', '', 1, '1', '2020-03-31 12:13:32', 0),
(25, 1, '', 2, 'Rutuja Mahajan', '', 'Kolhapur', 'rutujamahajaqn395@gmail.com', '8805420446', 'rutuja@1234', NULL, 0, '', '', 1, '1', '2020-03-23 05:12:13', 0),
(26, 1, '', 6, 'Vikramsinh Patil', '', 'Kolhapur', 'vikramsinhpatil3200.vp@gmail.com', '9890101456', 'vicky123', NULL, 0, '', '', 1, '1', '2020-06-17 12:51:07', 0),
(27, 1, '', 5, 'Prasad Patil', '', 'Kolhapur', 'pashyapatil17@gmail.com', '8983100540', 'prasad123', NULL, 0, '', '', 1, '1', '2020-03-31 12:04:40', 0),
(28, 1, '', 5, 'Yogiraj Yelpale', '', 'Pandharpur', 'yogirajyelpale55@gmail.com', '8668674713', 'yogiraj@1235', NULL, 0, '19.7514798', '75.7138884', 1, '1', '2020-06-17 12:24:49', 0),
(29, 1, '', 7, 'yogiraj yelpale', '', 'pandharpur', 'yogirajyelpale55@gmail.com', '9049128830', 'yogiraj@1234', NULL, 0, '', '', 1, '1', '2020-03-26 08:53:53', 0),
(30, 1, '', 8, 'Demo1', '', 'sdfg', 'demo@fff.com', '5555555555', '123456', NULL, 0, '', '', 1, '1', '2020-06-19 03:58:54', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `vendor_name` varchar(250) NOT NULL,
  `vendor_address` text NOT NULL,
  `vendor_state` varchar(150) NOT NULL,
  `vendor_district` varchar(150) NOT NULL,
  `vendor_tahsil` varchar(150) NOT NULL,
  `vendor_city` varchar(150) NOT NULL,
  `vendor_pincode` varchar(20) NOT NULL,
  `vendor_statecode` varchar(20) NOT NULL,
  `vendor_email` varchar(150) NOT NULL,
  `vendor_mobile` varchar(20) NOT NULL,
  `vendor_gst` varchar(100) NOT NULL,
  `vendor_pan` varchar(50) NOT NULL,
  `vendor_bank_accno` varchar(250) NOT NULL,
  `vendor_ifsc` varchar(250) NOT NULL,
  `vendor_code` varchar(250) NOT NULL,
  `vendor_pay_terms` varchar(250) NOT NULL,
  `vendor_status` int(11) NOT NULL DEFAULT 1,
  `vendor_addedby` varchar(50) NOT NULL,
  `vendor_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wallet_add`
--

CREATE TABLE `wallet_add` (
  `wallet_add_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `wallet_add_amount` double NOT NULL,
  `razorpay_payment_id` varchar(300) DEFAULT NULL,
  `razorpay_order_id` varchar(300) DEFAULT NULL,
  `wallet_add_status` int(11) NOT NULL DEFAULT 1,
  `wallet_add_date` varchar(50) NOT NULL,
  `wallet_add_time` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `cookbook_reg`
--
ALTER TABLE `cookbook_reg`
  ADD PRIMARY KEY (`cookbook_reg_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `coupon_used`
--
ALTER TABLE `coupon_used`
  ADD PRIMARY KEY (`coupon_used_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_level`
--
ALTER TABLE `customer_level`
  ADD PRIMARY KEY (`customer_level_id`);

--
-- Indexes for table `cust_membership`
--
ALTER TABLE `cust_membership`
  ADD PRIMARY KEY (`cust_mem_id`),
  ADD KEY `mem_sch_id` (`mem_sch_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `employee_cash`
--
ALTER TABLE `employee_cash`
  ADD PRIMARY KEY (`employee_cash_id`);

--
-- Indexes for table `franchise`
--
ALTER TABLE `franchise`
  ADD PRIMARY KEY (`franchise_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `loyalty_card`
--
ALTER TABLE `loyalty_card`
  ADD PRIMARY KEY (`loyalty_card_id`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `membership_scheme`
--
ALTER TABLE `membership_scheme`
  ADD PRIMARY KEY (`mem_sch_id`);

--
-- Indexes for table `mem_sch_details`
--
ALTER TABLE `mem_sch_details`
  ADD PRIMARY KEY (`mem_sch_det_id`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `order_online_payment`
--
ALTER TABLE `order_online_payment`
  ADD PRIMARY KEY (`online_payment_id`);

--
-- Indexes for table `order_pro`
--
ALTER TABLE `order_pro`
  ADD PRIMARY KEY (`order_pro_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`order_status_id`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_upl`
--
ALTER TABLE `order_upl`
  ADD PRIMARY KEY (`order_upl_id`);

--
-- Indexes for table `payment_type`
--
ALTER TABLE `payment_type`
  ADD PRIMARY KEY (`payment_type_id`);

--
-- Indexes for table `point_add`
--
ALTER TABLE `point_add`
  ADD PRIMARY KEY (`point_add_id`);

--
-- Indexes for table `point_use`
--
ALTER TABLE `point_use`
  ADD PRIMARY KEY (`point_use_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `manufacturer_id` (`manufacturer_id`),
  ADD KEY `product_ibfk_2` (`main_category_id`);

--
-- Indexes for table `product_attribute`
--
ALTER TABLE `product_attribute`
  ADD PRIMARY KEY (`pro_attri_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`product_images_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `purchase_pro`
--
ALTER TABLE `purchase_pro`
  ADD PRIMARY KEY (`purchase_pro_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`receipt_id`);

--
-- Indexes for table `req_product`
--
ALTER TABLE `req_product`
  ADD PRIMARY KEY (`req_product_id`);

--
-- Indexes for table `reseller_reg`
--
ALTER TABLE `reseller_reg`
  ADD PRIMARY KEY (`reseller_reg_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `tahasil`
--
ALTER TABLE `tahasil`
  ADD PRIMARY KEY (`tahasil_id`);

--
-- Indexes for table `tahsil`
--
ALTER TABLE `tahsil`
  ADD PRIMARY KEY (`tahsil_id`);

--
-- Indexes for table `tahsil_pincode`
--
ALTER TABLE `tahsil_pincode`
  ADD PRIMARY KEY (`tahsil_pincode_id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`tax_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `wallet_add`
--
ALTER TABLE `wallet_add`
  ADD PRIMARY KEY (`wallet_add_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cookbook_reg`
--
ALTER TABLE `cookbook_reg`
  MODIFY `cookbook_reg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupon_used`
--
ALTER TABLE `coupon_used`
  MODIFY `coupon_used_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_level`
--
ALTER TABLE `customer_level`
  MODIFY `customer_level_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cust_membership`
--
ALTER TABLE `cust_membership`
  MODIFY `cust_mem_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `district_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `employee_cash`
--
ALTER TABLE `employee_cash`
  MODIFY `employee_cash_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `franchise`
--
ALTER TABLE `franchise`
  MODIFY `franchise_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loyalty_card`
--
ALTER TABLE `loyalty_card`
  MODIFY `loyalty_card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `membership_scheme`
--
ALTER TABLE `membership_scheme`
  MODIFY `mem_sch_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mem_sch_details`
--
ALTER TABLE `mem_sch_details`
  MODIFY `mem_sch_det_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_online_payment`
--
ALTER TABLE `order_online_payment`
  MODIFY `online_payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_pro`
--
ALTER TABLE `order_pro`
  MODIFY `order_pro_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `order_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_upl`
--
ALTER TABLE `order_upl`
  MODIFY `order_upl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_type`
--
ALTER TABLE `payment_type`
  MODIFY `payment_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `point_add`
--
ALTER TABLE `point_add`
  MODIFY `point_add_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `point_use`
--
ALTER TABLE `point_use`
  MODIFY `point_use_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_attribute`
--
ALTER TABLE `product_attribute`
  MODIFY `pro_attri_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `product_images_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_pro`
--
ALTER TABLE `purchase_pro`
  MODIFY `purchase_pro_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `req_product`
--
ALTER TABLE `req_product`
  MODIFY `req_product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reseller_reg`
--
ALTER TABLE `reseller_reg`
  MODIFY `reseller_reg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2181;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tahasil`
--
ALTER TABLE `tahasil`
  MODIFY `tahasil_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348;

--
-- AUTO_INCREMENT for table `tahsil`
--
ALTER TABLE `tahsil`
  MODIFY `tahsil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tahsil_pincode`
--
ALTER TABLE `tahsil_pincode`
  MODIFY `tahsil_pincode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `tax_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallet_add`
--
ALTER TABLE `wallet_add`
  MODIFY `wallet_add_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cust_membership`
--
ALTER TABLE `cust_membership`
  ADD CONSTRAINT `cust_membership_ibfk_1` FOREIGN KEY (`mem_sch_id`) REFERENCES `membership_scheme` (`mem_sch_id`) ON UPDATE CASCADE;

--
-- Constraints for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD CONSTRAINT `order_tbl_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON UPDATE CASCADE;

--
-- Constraints for table `point_use`
--
ALTER TABLE `point_use`
  ADD CONSTRAINT `point_use_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_tbl` (`order_id`),
  ADD CONSTRAINT `point_use_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturer` (`manufacturer_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`main_category_id`) REFERENCES `category` (`category_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
