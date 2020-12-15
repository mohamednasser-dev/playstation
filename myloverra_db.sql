-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 15, 2020 at 06:50 PM
-- Server version: 5.5.65-MariaDB
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myloverra_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `slack` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_id` int(11) NOT NULL,
  `category_code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label_en` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label_ar` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `description_ar` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parent`, `slack`, `store_id`, `category_code`, `label_en`, `label_ar`, `description_en`, `description_ar`, `photo`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 0, 'CVFeEjNoRa7xh5dvCXo8hYzxk', 1, 'CAT101', 'Perfume', '', 'Perfume', NULL, 'uploads/category/1594742841.jpg', 1, 1, NULL, '2020-07-14 14:07:21', '2020-07-14 14:07:21');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dial_code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_symbol` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`, `code`, `dial_code`, `currency_name`, `currency_code`, `currency_symbol`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Afghanistan', 'AF', '+93', 'Afghan afghani', 'AFN', '؋', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(2, 'Aland Islands', 'AX', '+358', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(3, 'Albania', 'AL', '+355', 'Albanian lek', 'ALL', 'L', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(4, 'Algeria', 'DZ', '+213', 'Algerian dinar', 'DZD', 'د.ج', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(5, 'AmericanSamoa', 'AS', '+1684', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(6, 'Andorra', 'AD', '+376', 'Euro', 'EUR', '€', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(7, 'Angola', 'AO', '+244', 'Angolan kwanza', 'AOA', 'Kz', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(8, 'Anguilla', 'AI', '+1264', 'East Caribbean dolla', 'XCD', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(9, 'Antarctica', 'AQ', '+672', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(10, 'Antigua and Barbuda', 'AG', '+1268', 'East Caribbean dolla', 'XCD', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(11, 'Argentina', 'AR', '+54', 'Argentine peso', 'ARS', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(12, 'Armenia', 'AM', '+374', 'Armenian dram', 'AMD', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(13, 'Aruba', 'AW', '+297', 'Aruban florin', 'AWG', 'ƒ', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(14, 'Australia', 'AU', '+61', 'Australian dollar', 'AUD', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(15, 'Austria', 'AT', '+43', 'Euro', 'EUR', '€', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(16, 'Azerbaijan', 'AZ', '+994', 'Azerbaijani manat', 'AZN', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(17, 'Bahamas', 'BS', '+1242', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(18, 'Bahrain', 'BH', '+973', 'Bahraini dinar', 'BHD', '.د.ب', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(19, 'Bangladesh', 'BD', '+880', 'Bangladeshi taka', 'BDT', '৳', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(20, 'Barbados', 'BB', '+1246', 'Barbadian dollar', 'BBD', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(21, 'Belarus', 'BY', '+375', 'Belarusian ruble', 'BYR', 'Br', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(22, 'Belgium', 'BE', '+32', 'Euro', 'EUR', '€', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(23, 'Belize', 'BZ', '+501', 'Belize dollar', 'BZD', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(24, 'Benin', 'BJ', '+229', 'West African CFA fra', 'XOF', 'Fr', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(25, 'Bermuda', 'BM', '+1441', 'Bermudian dollar', 'BMD', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(26, 'Bhutan', 'BT', '+975', 'Bhutanese ngultrum', 'BTN', 'Nu.', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(27, 'Bolivia, Plurination', 'BO', '+591', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(28, 'Bosnia and Herzegovi', 'BA', '+387', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(29, 'Botswana', 'BW', '+267', 'Botswana pula', 'BWP', 'P', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(30, 'Brazil', 'BR', '+55', 'Brazilian real', 'BRL', 'R$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(31, 'British Indian Ocean', 'IO', '+246', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(32, 'Brunei Darussalam', 'BN', '+673', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(33, 'Bulgaria', 'BG', '+359', 'Bulgarian lev', 'BGN', 'лв', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(34, 'Burkina Faso', 'BF', '+226', 'West African CFA fra', 'XOF', 'Fr', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(35, 'Burundi', 'BI', '+257', 'Burundian franc', 'BIF', 'Fr', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(36, 'Cambodia', 'KH', '+855', 'Cambodian riel', 'KHR', '៛', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(37, 'Cameroon', 'CM', '+237', 'Central African CFA ', 'XAF', 'Fr', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(38, 'Canada', 'CA', '+1', 'Canadian dollar', 'CAD', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(39, 'Cape Verde', 'CV', '+238', 'Cape Verdean escudo', 'CVE', 'Esc or $', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(40, 'Cayman Islands', 'KY', '+ 345', 'Cayman Islands dolla', 'KYD', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(41, 'Central African Repu', 'CF', '+236', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(42, 'Chad', 'TD', '+235', 'Central African CFA ', 'XAF', 'Fr', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(43, 'Chile', 'CL', '+56', 'Chilean peso', 'CLP', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(44, 'China', 'CN', '+86', 'Chinese yuan', 'CNY', '¥ or 元', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(45, 'Christmas Island', 'CX', '+61', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(46, 'Cocos (Keeling] Isla', 'CC', '+61', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(47, 'Colombia', 'CO', '+57', 'Colombian peso', 'COP', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(48, 'Comoros', 'KM', '+269', 'Comorian franc', 'KMF', 'Fr', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(49, 'Congo', 'CG', '+242', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(50, 'Congo, The Democrati', 'CD', '+243', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(51, 'Cook Islands', 'CK', '+682', 'New Zealand dollar', 'NZD', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(52, 'Costa Rica', 'CR', '+506', 'Costa Rican colón', 'CRC', '₡', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(53, 'Cote d\'Ivoire', 'CI', '+225', 'West African CFA fra', 'XOF', 'Fr', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(54, 'Croatia', 'HR', '+385', 'Croatian kuna', 'HRK', 'kn', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(55, 'Cuba', 'CU', '+53', 'Cuban convertible pe', 'CUC', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(56, 'Cyprus', 'CY', '+357', 'Euro', 'EUR', '€', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(57, 'Czech Republic', 'CZ', '+420', 'Czech koruna', 'CZK', 'Kč', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(58, 'Denmark', 'DK', '+45', 'Danish krone', 'DKK', 'kr', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(59, 'Djibouti', 'DJ', '+253', 'Djiboutian franc', 'DJF', 'Fr', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(60, 'Dominica', 'DM', '+1767', 'East Caribbean dolla', 'XCD', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(61, 'Dominican Republic', 'DO', '+1849', 'Dominican peso', 'DOP', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(62, 'Ecuador', 'EC', '+593', 'United States dollar', 'USD', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(63, 'Egypt', 'EG', '+20', 'Egyptian pound', 'EGP', '£ or ج.م', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(64, 'El Salvador', 'SV', '+503', 'United States dollar', 'USD', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(65, 'Equatorial Guinea', 'GQ', '+240', 'Central African CFA ', 'XAF', 'Fr', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(66, 'Eritrea', 'ER', '+291', 'Eritrean nakfa', 'ERN', 'Nfk', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(67, 'Estonia', 'EE', '+372', 'Euro', 'EUR', '€', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(68, 'Ethiopia', 'ET', '+251', 'Ethiopian birr', 'ETB', 'Br', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(69, 'Falkland Islands (Ma', 'FK', '+500', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(70, 'Faroe Islands', 'FO', '+298', 'Danish krone', 'DKK', 'kr', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(71, 'Fiji', 'FJ', '+679', 'Fijian dollar', 'FJD', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(72, 'Finland', 'FI', '+358', 'Euro', 'EUR', '€', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(73, 'France', 'FR', '+33', 'Euro', 'EUR', '€', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(74, 'French Guiana', 'GF', '+594', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(75, 'French Polynesia', 'PF', '+689', 'CFP franc', 'XPF', 'Fr', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(76, 'Gabon', 'GA', '+241', 'Central African CFA ', 'XAF', 'Fr', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(77, 'Gambia', 'GM', '+220', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(78, 'Georgia', 'GE', '+995', 'Georgian lari', 'GEL', 'ლ', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(79, 'Germany', 'DE', '+49', 'Euro', 'EUR', '€', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(80, 'Ghana', 'GH', '+233', 'Ghana cedi', 'GHS', '₵', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(81, 'Gibraltar', 'GI', '+350', 'Gibraltar pound', 'GIP', '£', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(82, 'Greece', 'GR', '+30', 'Euro', 'EUR', '€', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(83, 'Greenland', 'GL', '+299', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(84, 'Grenada', 'GD', '+1473', 'East Caribbean dolla', 'XCD', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(85, 'Guadeloupe', 'GP', '+590', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(86, 'Guam', 'GU', '+1671', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(87, 'Guatemala', 'GT', '+502', 'Guatemalan quetzal', 'GTQ', 'Q', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(88, 'Guernsey', 'GG', '+44', 'British pound', 'GBP', '£', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(89, 'Guinea', 'GN', '+224', 'Guinean franc', 'GNF', 'Fr', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(90, 'Guinea-Bissau', 'GW', '+245', 'West African CFA fra', 'XOF', 'Fr', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(91, 'Guyana', 'GY', '+595', 'Guyanese dollar', 'GYD', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(92, 'Haiti', 'HT', '+509', 'Haitian gourde', 'HTG', 'G', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(93, 'Holy See (Vatican Ci', 'VA', '+379', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(94, 'Honduras', 'HN', '+504', 'Honduran lempira', 'HNL', 'L', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(95, 'Hong Kong', 'HK', '+852', 'Hong Kong dollar', 'HKD', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(96, 'Hungary', 'HU', '+36', 'Hungarian forint', 'HUF', 'Ft', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(97, 'Iceland', 'IS', '+354', 'Icelandic króna', 'ISK', 'kr', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(98, 'India', 'IN', '+91', 'Indian rupee', 'INR', '₹', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(99, 'Indonesia', 'ID', '+62', 'Indonesian rupiah', 'IDR', 'Rp', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(100, 'Iran, Islamic Republ', 'IR', '+98', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(101, 'Iraq', 'IQ', '+964', 'Iraqi dinar', 'IQD', 'ع.د', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(102, 'Ireland', 'IE', '+353', 'Euro', 'EUR', '€', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(103, 'Isle of Man', 'IM', '+44', 'British pound', 'GBP', '£', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(104, 'Israel', 'IL', '+972', 'Israeli new shekel', 'ILS', '₪', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(105, 'Italy', 'IT', '+39', 'Euro', 'EUR', '€', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(106, 'Jamaica', 'JM', '+1876', 'Jamaican dollar', 'JMD', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(107, 'Japan', 'JP', '+81', 'Japanese yen', 'JPY', '¥', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(108, 'Jersey', 'JE', '+44', 'British pound', 'GBP', '£', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(109, 'Jordan', 'JO', '+962', 'Jordanian dinar', 'JOD', 'د.ا', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(110, 'Kazakhstan', 'KZ', '+7 7', 'Kazakhstani tenge', 'KZT', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(111, 'Kenya', 'KE', '+254', 'Kenyan shilling', 'KES', 'Sh', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(112, 'Kiribati', 'KI', '+686', 'Australian dollar', 'AUD', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(113, 'Korea, Democratic Pe', 'KP', '+850', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(114, 'Korea, Republic of S', 'KR', '+82', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(115, 'Kuwait', 'KW', '+965', 'Kuwaiti dinar', 'KWD', 'د.ك', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(116, 'Kyrgyzstan', 'KG', '+996', 'Kyrgyzstani som', 'KGS', 'лв', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(117, 'Laos', 'LA', '+856', 'Lao kip', 'LAK', '₭', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(118, 'Latvia', 'LV', '+371', 'Euro', 'EUR', '€', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(119, 'Lebanon', 'LB', '+961', 'Lebanese pound', 'LBP', 'ل.ل', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(120, 'Lesotho', 'LS', '+266', 'Lesotho loti', 'LSL', 'L', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(121, 'Liberia', 'LR', '+231', 'Liberian dollar', 'LRD', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(122, 'Libyan Arab Jamahiri', 'LY', '+218', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(123, 'Liechtenstein', 'LI', '+423', 'Swiss franc', 'CHF', 'Fr', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(124, 'Lithuania', 'LT', '+370', 'Euro', 'EUR', '€', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(125, 'Luxembourg', 'LU', '+352', 'Euro', 'EUR', '€', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(126, 'Macao', 'MO', '+853', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(127, 'Macedonia', 'MK', '+389', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(128, 'Madagascar', 'MG', '+261', 'Malagasy ariary', 'MGA', 'Ar', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(129, 'Malawi', 'MW', '+265', 'Malawian kwacha', 'MWK', 'MK', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(130, 'Malaysia', 'MY', '+60', 'Malaysian ringgit', 'MYR', 'RM', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(131, 'Maldives', 'MV', '+960', 'Maldivian rufiyaa', 'MVR', '.ރ', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(132, 'Mali', 'ML', '+223', 'West African CFA fra', 'XOF', 'Fr', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(133, 'Malta', 'MT', '+356', 'Euro', 'EUR', '€', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(134, 'Marshall Islands', 'MH', '+692', 'United States dollar', 'USD', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(135, 'Martinique', 'MQ', '+596', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(136, 'Mauritania', 'MR', '+222', 'Mauritanian ouguiya', 'MRO', 'UM', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(137, 'Mauritius', 'MU', '+230', 'Mauritian rupee', 'MUR', '₨', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(138, 'Mayotte', 'YT', '+262', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(139, 'Mexico', 'MX', '+52', 'Mexican peso', 'MXN', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(140, 'Micronesia, Federate', 'FM', '+691', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(141, 'Moldova', 'MD', '+373', 'Moldovan leu', 'MDL', 'L', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(142, 'Monaco', 'MC', '+377', 'Euro', 'EUR', '€', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(143, 'Mongolia', 'MN', '+976', 'Mongolian tögrög', 'MNT', '₮', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(144, 'Montenegro', 'ME', '+382', 'Euro', 'EUR', '€', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(145, 'Montserrat', 'MS', '+1664', 'East Caribbean dolla', 'XCD', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(146, 'Morocco', 'MA', '+212', 'Moroccan dirham', 'MAD', 'د.م.', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(147, 'Mozambique', 'MZ', '+258', 'Mozambican metical', 'MZN', 'MT', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(148, 'Myanmar', 'MM', '+95', 'Burmese kyat', 'MMK', 'Ks', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(149, 'Namibia', 'NA', '+264', 'Namibian dollar', 'NAD', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(150, 'Nauru', 'NR', '+674', 'Australian dollar', 'AUD', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(151, 'Nepal', 'NP', '+977', 'Nepalese rupee', 'NPR', '₨', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(152, 'Netherlands', 'NL', '+31', 'Euro', 'EUR', '€', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(153, 'Netherlands Antilles', 'AN', '+599', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(154, 'New Caledonia', 'NC', '+687', 'CFP franc', 'XPF', 'Fr', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(155, 'New Zealand', 'NZ', '+64', 'New Zealand dollar', 'NZD', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(156, 'Nicaragua', 'NI', '+505', 'Nicaraguan córdoba', 'NIO', 'C$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(157, 'Niger', 'NE', '+227', 'West African CFA fra', 'XOF', 'Fr', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(158, 'Nigeria', 'NG', '+234', 'Nigerian naira', 'NGN', '₦', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(159, 'Niue', 'NU', '+683', 'New Zealand dollar', 'NZD', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(160, 'Norfolk Island', 'NF', '+672', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(161, 'Northern Mariana Isl', 'MP', '+1670', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(162, 'Norway', 'NO', '+47', 'Norwegian krone', 'NOK', 'kr', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(163, 'Oman', 'OM', '+968', 'Omani rial', 'OMR', 'ر.ع.', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(164, 'Pakistan', 'PK', '+92', 'Pakistani rupee', 'PKR', '₨', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(165, 'Palau', 'PW', '+680', 'Palauan dollar', '', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(166, 'Palestinian Territor', 'PS', '+970', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(167, 'Panama', 'PA', '+507', 'Panamanian balboa', 'PAB', 'B/.', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(168, 'Papua New Guinea', 'PG', '+675', 'Papua New Guinean ki', 'PGK', 'K', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(169, 'Paraguay', 'PY', '+595', 'Paraguayan guaraní', 'PYG', '₲', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(170, 'Peru', 'PE', '+51', 'Peruvian nuevo sol', 'PEN', 'S/.', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(171, 'Philippines', 'PH', '+63', 'Philippine peso', 'PHP', '₱', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(172, 'Pitcairn', 'PN', '+872', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(173, 'Poland', 'PL', '+48', 'Polish z?oty', 'PLN', 'zł', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(174, 'Portugal', 'PT', '+351', 'Euro', 'EUR', '€', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(175, 'Puerto Rico', 'PR', '+1939', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(176, 'Qatar', 'QA', '+974', 'Qatari riyal', 'QAR', 'ر.ق', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(177, 'Romania', 'RO', '+40', 'Romanian leu', 'RON', 'lei', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(178, 'Russia', 'RU', '+7', 'Russian ruble', 'RUB', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(179, 'Rwanda', 'RW', '+250', 'Rwandan franc', 'RWF', 'Fr', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(180, 'Reunion', 'RE', '+262', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(181, 'Saint Barthelemy', 'BL', '+590', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(182, 'Saint Helena, Ascens', 'SH', '+290', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(183, 'Saint Kitts and Nevi', 'KN', '+1869', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(184, 'Saint Lucia', 'LC', '+1758', 'East Caribbean dolla', 'XCD', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(185, 'Saint Martin', 'MF', '+590', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(186, 'Saint Pierre and Miq', 'PM', '+508', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(187, 'Saint Vincent and th', 'VC', '+1784', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(188, 'Samoa', 'WS', '+685', 'Samoan t?l?', 'WST', 'T', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(189, 'San Marino', 'SM', '+378', 'Euro', 'EUR', '€', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(190, 'Sao Tome and Princip', 'ST', '+239', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(191, 'Saudi Arabia', 'SA', '+966', 'Saudi riyal', 'SAR', 'ر.س', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(192, 'Senegal', 'SN', '+221', 'West African CFA fra', 'XOF', 'Fr', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(193, 'Serbia', 'RS', '+381', 'Serbian dinar', 'RSD', 'дин. or din.', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(194, 'Seychelles', 'SC', '+248', 'Seychellois rupee', 'SCR', '₨', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(195, 'Sierra Leone', 'SL', '+232', 'Sierra Leonean leone', 'SLL', 'Le', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(196, 'Singapore', 'SG', '+65', 'Brunei dollar', 'BND', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(197, 'Slovakia', 'SK', '+421', 'Euro', 'EUR', '€', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(198, 'Slovenia', 'SI', '+386', 'Euro', 'EUR', '€', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(199, 'Solomon Islands', 'SB', '+677', 'Solomon Islands doll', 'SBD', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(200, 'Somalia', 'SO', '+252', 'Somali shilling', 'SOS', 'Sh', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(201, 'South Africa', 'ZA', '+27', 'South African rand', 'ZAR', 'R', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(202, 'South Georgia and th', 'GS', '+500', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(203, 'Spain', 'ES', '+34', 'Euro', 'EUR', '€', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(204, 'Sri Lanka', 'LK', '+94', 'Sri Lankan rupee', 'LKR', 'Rs or රු', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(205, 'Sudan', 'SD', '+249', 'Sudanese pound', 'SDG', 'ج.س.', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(206, 'Suriname', 'SR', '+597', 'Surinamese dollar', 'SRD', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(207, 'Svalbard and Jan May', 'SJ', '+47', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(208, 'Swaziland', 'SZ', '+268', 'Swazi lilangeni', 'SZL', 'L', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(209, 'Sweden', 'SE', '+46', 'Swedish krona', 'SEK', 'kr', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(210, 'Switzerland', 'CH', '+41', 'Swiss franc', 'CHF', 'Fr', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(211, 'Syrian Arab Republic', 'SY', '+963', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(212, 'Taiwan', 'TW', '+886', 'New Taiwan dollar', 'TWD', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(213, 'Tajikistan', 'TJ', '+992', 'Tajikistani somoni', 'TJS', 'ЅМ', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(214, 'Tanzania, United Rep', 'TZ', '+255', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(215, 'Thailand', 'TH', '+66', 'Thai baht', 'THB', '฿', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(216, 'Timor-Leste', 'TL', '+670', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(217, 'Togo', 'TG', '+228', 'West African CFA fra', 'XOF', 'Fr', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(218, 'Tokelau', 'TK', '+690', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(219, 'Tonga', 'TO', '+676', 'Tongan pa?anga', 'TOP', 'T$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(220, 'Trinidad and Tobago', 'TT', '+1868', 'Trinidad and Tobago ', 'TTD', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(221, 'Tunisia', 'TN', '+216', 'Tunisian dinar', 'TND', 'د.ت', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(222, 'Turkey', 'TR', '+90', 'Turkish lira', 'TRY', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(223, 'Turkmenistan', 'TM', '+993', 'Turkmenistan manat', 'TMT', 'm', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(224, 'Turks and Caicos Isl', 'TC', '+1649', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(225, 'Tuvalu', 'TV', '+688', 'Australian dollar', 'AUD', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(226, 'Uganda', 'UG', '+256', 'Ugandan shilling', 'UGX', 'Sh', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(227, 'Ukraine', 'UA', '+380', 'Ukrainian hryvnia', 'UAH', '₴', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(228, 'United Arab Emirates', 'AE', '+971', 'United Arab Emirates', 'AED', 'د.إ', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(229, 'United Kingdom', 'GB', '+44', 'British pound', 'GBP', '£', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(230, 'United States', 'US', '+1', 'United States dollar', 'USD', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(231, 'Uruguay', 'UY', '+598', 'Uruguayan peso', 'UYU', '$', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(232, 'Uzbekistan', 'UZ', '+998', 'Uzbekistani som', 'UZS', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(233, 'Vanuatu', 'VU', '+678', 'Vanuatu vatu', 'VUV', 'Vt', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(234, 'Venezuela, Bolivaria', 'VE', '+58', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(235, 'Vietnam', 'VN', '+84', 'Vietnamese ??ng', 'VND', '₫', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(236, 'Virgin Islands, Brit', 'VG', '+1284', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(237, 'Virgin Islands, U.S.', 'VI', '+1340', '', '', '', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(238, 'Wallis and Futuna', 'WF', '+681', 'CFP franc', 'XPF', 'Fr', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(239, 'Yemen', 'YE', '+967', 'Yemeni rial', 'YER', '﷼', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(240, 'Zambia', 'ZM', '+260', 'Zambian kwacha', 'ZMW', 'ZK', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24'),
(241, 'Zimbabwe', 'ZW', '+263', 'Botswana pula', 'BWP', 'P', 1, '2020-03-08 16:11:24', '2020-03-08 16:11:24');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `slack` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_type` enum('DEFAULT','CUSTOM','WALKIN','Mobile-Api') COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `gender` tinyint(4) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `slack`, `customer_type`, `name`, `email`, `password`, `api_token`, `phone`, `address`, `status`, `gender`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '8MXXtSaEyNaOVoGi88Ygk3lzi', 'DEFAULT', 'Customer', NULL, '$2y$10$rTkEHVrJOH78wmF2t0NwAulO5OgP6.ufj/..tesiSsfMtmGPjXKvy', 'bf74f3e9c2425013e739bf5c3599dd86fa66340be35c21030982c38bad03cdff', '0000000000', NULL, 1, NULL, NULL, NULL, '2020-03-08 16:11:17', '2020-03-14 18:45:06'),
(6, 'IbZPoRcYJAH5PPdQXKRKxTKpL', 'Mobile-Api', 'aaa', 'sdfsd@sdf.com', '$2y$10$71ysWJvPQENB.WRmbV1MI.C/baLZusP90CdlWf0APOqIJpJtelYSS', 'AjXZjA8WxXqlqqmL5d3UA68gWHfBLRGwyn2jZ6LqpJwX4yP7WZp0XT8nHoVR', '123456', NULL, 1, NULL, NULL, 1, '2020-03-11 05:02:08', '2020-06-15 23:33:02'),
(10, 'aP4w1LMZKNaFVB0qJxntNZoI7', 'CUSTOM', 'aaa', 'amany1@yahoo.com', NULL, NULL, '3333333333333', NULL, 1, NULL, 1, 1, '2020-03-14 18:42:01', '2020-03-17 07:27:58'),
(11, 'qXZnDG299aA9f1zqw39cRfqg8', 'Mobile-Api', 'aaa', 'asasas@yahoo.com', '$2y$10$R3/Oq6l2L9Ag61dGQWlV8ui1fk75voZ7PgDSWEjtrTZKPSx.g4qny', 'QZbwj2v4qA0bZqimLBT9zsmmfthHNcJy3PmsZ0laBCNcEdavnksbm5nK60lV', '123434', NULL, 1, NULL, NULL, NULL, '2020-06-15 22:26:31', '2020-06-15 22:26:31'),
(18, 'hegtDwWNLx8V5TR3BuuBoQlVt', 'Mobile-Api', 'aaass', 'asasssas@yahoo.com', '$2y$10$3kCejEdTIorvVEJJzY/ujutak.GqheyV3BmnDkdJ73qLPC5Haujfa', 'ReeRwDXz5ObP5XXo6ebFSKa9Un8YrW6V29MO4bahwwNbifx33l7RP3wJN55k', '123434', NULL, 1, 1, NULL, NULL, '2020-06-17 22:31:29', '2020-06-17 22:31:29'),
(20, 'EDOQaylmq2jbBRYlBtCQTr3y3', 'Mobile-Api', 'aaass', 'asasssas1@yahoo.com', '$2y$10$AZBHcFtkXe23VkyArjX9geIxGdrvCN1sa5GwCv1D1DSLWa8LZCZBa', 'FO1UsqHwJIhJSp9YlZViUIjyv5ixgQMyYR4Ok96Z7LDdLfp21JjX6s45F5Il', '555555', NULL, 1, 1, NULL, NULL, '2020-06-17 23:44:53', '2020-06-17 23:44:53'),
(21, 'FH1tRSH9riQkFoypRBUsVxmWv', 'Mobile-Api', 'aaass', 'asasssas21@yahoo.com', '$2y$10$h/wXxpOOeVKZN6KCkuSDyuOviQ..nQA.EVxEnDT9msOOXwJr7SKDS', '5vm5NcATx9kRSQlJ2y4q0Tjizn6U7Uw4Rim3HpcT6JQwU5SNClTUXUIcA1mA', '555555', NULL, 1, 1, NULL, NULL, '2020-06-17 23:45:43', '2020-06-17 23:45:43'),
(22, 'SZaCdsEM8QT58gvJ3hGbh9XVP', 'Mobile-Api', 'aaa', 'sdfsd@sdf.comw', '$2y$10$sD0QYbvI5xOFtg8toBN5iOBVCCJTdbPy5.3YueIzVykx2pHfvw2im', 'fyoeLZUZlef8LZzxjCEByvkUdFGWLhXZT4GQ0T4oDeiNWSeaV8bI5KpAmcQG', '123456', NULL, 1, 1, NULL, NULL, '2020-06-18 01:42:12', '2020-07-14 14:46:17'),
(23, 'pRtyd6feGSGnNx59d6NGtKwdN', 'WALKIN', '', 'null', NULL, NULL, '12121', NULL, 1, NULL, 1, NULL, '2020-06-28 00:15:08', '2020-06-28 00:15:08'),
(24, 'Vc3bYcRhLILimINRqcKQal1bN', 'Mobile-Api', 'aaass', 'asasssffddas@yahoo.com', '$2y$10$CafdmJt6QJQkjmXB1rJX/eabfAaFtZFY.G/Nn7kAD8m86dVgvimrS', 'DLpBV0vTlxIP4Tb2ebvD7GO4U4a62FKs5hOeNlDzhuydZVf1zZSbPqY14gx6', '123434', NULL, 1, 1, NULL, NULL, '2020-07-08 17:46:56', '2020-07-08 17:46:56'),
(25, 'YO6eBOx6jeM2jj5d64re3iHew', 'Mobile-Api', 'aaass', 'me@i0sa.com', '$2y$10$zOc4gtUBN3hdoH.AkR9zE.afr7JrTmf8lI3bsm.ObsjzjUhPWyFjW', 'fXEIENVIta50oqrBrTHkiHUF7IWhaWH1HHJXTvzNSFlugAiyFhDamStiizx9', '123434', NULL, 1, 1, NULL, NULL, '2020-07-09 16:58:00', '2020-07-09 16:58:00'),
(26, 'Oh09gXB29CqULTpLGgjdf6hSE', 'Mobile-Api', 'Osama', 'me@i0sa.comm', '$2y$10$nvfFU5gQ72uFgJFgZivEa.CDFRvjaQgBvW4AuvI.xJEloxiBDXcDi', 'lLBseEt2NnjgUuQzSYe6qPNd0jc4H1yJtZZLOGYVy1BdIDn9lYjfh2NekMqm', '1234545', NULL, 1, 1, NULL, NULL, '2020-07-09 17:39:22', '2020-07-09 17:39:22');

-- --------------------------------------------------------

--
-- Table structure for table `customers_addresses`
--

CREATE TABLE `customers_addresses` (
  `id` int(11) NOT NULL,
  `slack` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `delivery_area` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `building` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `flatnumber` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `landmark` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers_addresses`
--

INSERT INTO `customers_addresses` (`id`, `slack`, `delivery_area`, `building`, `street`, `flatnumber`, `landmark`, `country`, `city`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, 'IbZPoRcYJAH5PPdQXKRKxTKpL', 'testss', 'test54545', 'test', 'test', 'test', 1, 1, 6, '2020-03-17 02:54:35', '2020-03-17 07:54:35');

-- --------------------------------------------------------

--
-- Table structure for table `discount_codes`
--

CREATE TABLE `discount_codes` (
  `id` int(10) UNSIGNED NOT NULL,
  `slack` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_id` int(11) NOT NULL,
  `label` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_percentage` decimal(8,2) NOT NULL DEFAULT '0.00',
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `master_date_format`
--

CREATE TABLE `master_date_format` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_format_value` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_format_label` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_date_format`
--

INSERT INTO `master_date_format` (`id`, `key`, `date_format_value`, `date_format_label`, `status`, `created_at`, `updated_at`) VALUES
(1, 'DATE_TIME_FORMAT', 'd-m-Y H:i', '01-12-2020 23:00', 1, '2020-03-08 16:11:26', '2020-03-08 16:11:26'),
(2, 'DATE_TIME_FORMAT', 'j-n-Y H:i', '1-12-2020 23:00', 1, '2020-03-08 16:11:26', '2020-03-08 16:11:26'),
(3, 'DATE_TIME_FORMAT', 'd-m-Y h:i A', '01-12-2020 01:00 PM', 1, '2020-03-08 16:11:26', '2020-03-08 16:11:26'),
(4, 'DATE_TIME_FORMAT', 'j-n-Y h:i A', '1-12-2020 01:00 PM', 1, '2020-03-08 16:11:26', '2020-03-08 16:11:26'),
(5, 'DATE_FORMAT', 'd-m-Y', '01-12-2020', 1, '2020-03-08 16:11:26', '2020-03-08 16:11:26'),
(6, 'DATE_FORMAT', 'j-n-Y', '1-12-2020', 1, '2020-03-08 16:11:26', '2020-03-08 16:11:26'),
(7, 'DATE_FORMAT', 'Y-m-d', '2020-12-01', 1, '2020-03-08 16:11:26', '2020-03-08 16:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `master_invoice_print_type`
--

CREATE TABLE `master_invoice_print_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `print_type_value` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `print_type_label` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_invoice_print_type`
--

INSERT INTO `master_invoice_print_type` (`id`, `print_type_value`, `print_type_label`, `status`, `created_at`, `updated_at`) VALUES
(1, 'A4', 'A4 Sheet', 1, '2020-03-08 16:11:26', '2020-03-08 16:11:26'),
(2, 'SMALL', 'Small Sheet', 1, '2020-03-08 16:11:27', '2020-03-08 16:11:27');

-- --------------------------------------------------------

--
-- Table structure for table `master_status`
--

CREATE TABLE `master_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value_constant` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_status`
--

INSERT INTO `master_status` (`id`, `key`, `value`, `value_constant`, `label`, `color`, `status`, `created_at`, `updated_at`) VALUES
(1, 'USER_STATUS', '1', 'ACTIVE', 'Active', 'label green-label', 1, '2020-03-08 16:11:10', '2020-03-08 16:11:10'),
(2, 'USER_STATUS', '0', 'INACTIVE', 'Inactive', 'label red-label', 1, '2020-03-08 16:11:10', '2020-03-08 16:11:10'),
(3, 'CUSTOMER_STATUS', '1', 'ACTIVE', 'Active', 'label green-label', 1, '2020-03-08 16:11:10', '2020-03-08 16:11:10'),
(4, 'CUSTOMER_STATUS', '0', 'INACTIVE', 'Inactive', 'label red-label', 1, '2020-03-08 16:11:10', '2020-03-08 16:11:10'),
(5, 'ROLE_STATUS', '1', 'ACTIVE', 'Active', 'label green-label', 1, '2020-03-08 16:11:10', '2020-03-08 16:11:10'),
(6, 'ROLE_STATUS', '0', 'INACTIVE', 'Inactive', 'label red-label', 1, '2020-03-08 16:11:10', '2020-03-08 16:11:10'),
(7, 'CATEGORY_STATUS', '1', 'ACTIVE', 'Active', 'label green-label', 1, '2020-03-08 16:11:10', '2020-03-08 16:11:10'),
(8, 'CATEGORY_STATUS', '0', 'INACTIVE', 'Inactive', 'label red-label', 1, '2020-03-08 16:11:10', '2020-03-08 16:11:10'),
(9, 'PRODUCT_STATUS', '1', 'ACTIVE', 'Active', 'label green-label', 1, '2020-03-08 16:11:10', '2020-03-08 16:11:10'),
(10, 'PRODUCT_STATUS', '0', 'INACTIVE', 'Inactive', 'label red-label', 1, '2020-03-08 16:11:10', '2020-03-08 16:11:10'),
(11, 'SUPPLIER_STATUS', '1', 'ACTIVE', 'Active', 'label green-label', 1, '2020-03-08 16:11:10', '2020-03-08 16:11:10'),
(12, 'SUPPLIER_STATUS', '0', 'INACTIVE', 'Inactive', 'label red-label', 1, '2020-03-08 16:11:10', '2020-03-08 16:11:10'),
(13, 'TAX_CODE_STATUS', '1', 'ACTIVE', 'Active', 'label green-label', 1, '2020-03-08 16:11:10', '2020-03-08 16:11:10'),
(14, 'TAX_CODE_STATUS', '0', 'INACTIVE', 'Inactive', 'label red-label', 1, '2020-03-08 16:11:10', '2020-03-08 16:11:10'),
(15, 'ORDER_STATUS', '0', 'DELETED', 'Deleted', 'label red-label', 1, '2020-03-08 16:11:11', '2020-03-08 16:11:11'),
(16, 'ORDER_STATUS', '1', 'CLOSED', 'Closed', 'label green-label', 1, '2020-03-08 16:11:11', '2020-03-08 16:11:11'),
(17, 'ORDER_STATUS', '2', 'HOLD', 'Hold', 'label red-label', 1, '2020-03-08 16:11:11', '2020-03-08 16:11:11'),
(18, 'ORDER_PRODUCT_STATUS', '1', 'ACTIVE', 'Active', 'label green-label', 1, '2020-03-08 16:11:11', '2020-03-08 16:11:11'),
(19, 'ORDER_PRODUCT_STATUS', '2', 'INACTIVE', 'Inactive', 'label red-label', 1, '2020-03-08 16:11:11', '2020-03-08 16:11:11'),
(20, 'STORE_STATUS', '1', 'ACTIVE', 'Active', 'label green-label', 1, '2020-03-08 16:11:11', '2020-03-08 16:11:11'),
(21, 'STORE_STATUS', '0', 'INACTIVE', 'Inactive', 'label red-label', 1, '2020-03-08 16:11:11', '2020-03-08 16:11:11'),
(22, 'DISCOUNTCODE_STATUS', '1', 'ACTIVE', 'Active', 'label green-label', 1, '2020-03-08 16:11:11', '2020-03-08 16:11:11'),
(23, 'DISCOUNTCODE_STATUS', '0', 'INACTIVE', 'Inactive', 'label red-label', 1, '2020-03-08 16:11:11', '2020-03-08 16:11:11'),
(24, 'PAYMENT_METHOD_STATUS', '1', 'ACTIVE', 'Active', 'label green-label', 1, '2020-03-08 16:11:11', '2020-03-08 16:11:11'),
(25, 'PAYMENT_METHOD_STATUS', '0', 'INACTIVE', 'Inactive', 'label red-label', 1, '2020-03-08 16:11:11', '2020-03-08 16:11:11'),
(26, 'PURCHASE_ORDER_STATUS', '1', 'CREATED', 'Created', 'label green-label', 1, '2020-03-08 16:11:11', '2020-03-08 16:11:11'),
(27, 'PURCHASE_ORDER_STATUS', '2', 'APPROVED', 'Approved', 'label blue-label', 1, '2020-03-08 16:11:11', '2020-03-08 16:11:11'),
(28, 'PURCHASE_ORDER_STATUS', '3', 'RELEASED_TO_SUPPLIER', 'Released To Supplier', 'label orange-label', 1, '2020-03-08 16:11:11', '2020-03-08 16:11:11'),
(29, 'PURCHASE_ORDER_STATUS', '4', 'CLOSED', 'Closed', 'label grey-label', 1, '2020-03-08 16:11:11', '2020-03-08 16:11:11'),
(30, 'PURCHASE_ORDER_STATUS', '0', 'CANCELLED', 'Cancelled', 'label red-label', 1, '2020-03-08 16:11:11', '2020-03-08 16:11:11'),
(31, 'PURCHASE_ORDER_PRODUCT_ST', '1', 'ACTIVE', 'Active', 'label green-label', 1, '2020-03-08 16:11:11', '2020-03-08 16:11:11'),
(32, 'PURCHASE_ORDER_PRODUCT_ST', '0', 'INACTIVE', 'Inactive', 'label red-label', 1, '2020-03-08 16:11:11', '2020-03-08 16:11:11'),
(33, 'MAIL_SETTING_STATUS', '1', 'ACTIVE', 'Active', 'label green-label', 1, '2020-03-08 16:11:11', '2020-03-08 16:11:11'),
(34, 'MAIL_SETTING_STATUS', '0', 'INACTIVE', 'Inactive', 'label red-label', 1, '2020-03-08 16:11:11', '2020-03-08 16:11:11'),
(35, 'MASTER_DATE_FORMAT_STATUS', '1', 'ACTIVE', 'Active', 'label green-label', 1, '2020-03-08 16:11:12', '2020-03-08 16:11:12'),
(36, 'MASTER_DATE_FORMAT_STATUS', '0', 'INACTIVE', 'Inactive', 'label red-label', 1, '2020-03-08 16:11:12', '2020-03-08 16:11:12'),
(37, 'MASTER_INVOICE_PRINT_TYPE', '1', 'ACTIVE', 'Active', 'label green-label', 1, '2020-03-08 16:11:12', '2020-03-08 16:11:12'),
(38, 'MASTER_INVOICE_PRINT_TYPE', '0', 'INACTIVE', 'Inactive', 'label red-label', 1, '2020-03-08 16:11:12', '2020-03-08 16:11:12');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` enum('MAIN_MENU','SUB_MENU','ACTIONS') COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_key` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `sort_order` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `type`, `menu_key`, `label`, `route`, `parent`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'MAIN_MENU', 'MM_DASHBOARD', 'Dashboard', 'dashboard', 0, 1, 1, '2020-03-08 16:11:03', '2020-03-08 16:11:03'),
(2, 'MAIN_MENU', 'MM_ORDERS', 'Order', '', 0, 2, 1, '2020-03-08 16:11:03', '2020-03-08 16:11:03'),
(3, 'MAIN_MENU', 'MM_USER', 'User', '', 0, 3, 1, '2020-03-08 16:11:03', '2020-03-08 16:11:03'),
(4, 'MAIN_MENU', 'MM_SUPPLIER', 'Supplier', '', 0, 4, 1, '2020-03-08 16:11:03', '2020-03-08 16:11:03'),
(5, 'MAIN_MENU', 'MM_TAX_AND_DISCOUNT', 'Tax & Discount Codes', '', 0, 5, 1, '2020-03-08 16:11:03', '2020-03-08 16:11:03'),
(6, 'MAIN_MENU', 'MM_PRODUCT', 'Product', '', 0, 6, 1, '2020-03-08 16:11:03', '2020-03-08 16:11:03'),
(7, 'MAIN_MENU', 'MM_REPORT', 'Reports', 'reports', 0, 7, 1, '2020-03-08 16:11:03', '2020-03-08 16:11:03'),
(8, 'MAIN_MENU', 'MM_SETTINGS', 'Settings', '', 0, 8, 1, '2020-03-08 16:11:03', '2020-03-08 16:11:03'),
(9, 'SUB_MENU', 'SM_ORDERS', 'Orders', 'orders', 2, 1, 1, '2020-03-08 16:11:03', '2020-03-08 16:11:03'),
(10, 'SUB_MENU', 'SM_PURCHASE_ORDERS', 'Purchase Orders', 'purchase_orders', 2, 2, 1, '2020-03-08 16:11:03', '2020-03-08 16:11:03'),
(11, 'SUB_MENU', 'SM_USERS', 'Users', 'users', 3, 1, 1, '2020-03-08 16:11:03', '2020-03-08 16:11:03'),
(12, 'SUB_MENU', 'SM_CUSTOMERS', 'Customers', 'customers', 3, 2, 1, '2020-03-08 16:11:03', '2020-03-08 16:11:03'),
(13, 'SUB_MENU', 'SM_ROLES', 'Roles', 'roles', 3, 3, 1, '2020-03-08 16:11:03', '2020-03-08 16:11:03'),
(14, 'SUB_MENU', 'SM_SUPPLIERS', 'Suppliers', 'suppliers', 4, 1, 1, '2020-03-08 16:11:03', '2020-03-08 16:11:03'),
(15, 'SUB_MENU', 'SM_TAXCODES', 'Tax Codes', 'tax_codes', 5, 1, 1, '2020-03-08 16:11:03', '2020-03-08 16:11:03'),
(16, 'SUB_MENU', 'SM_DISCOUNTCODES', 'Discount Codes', 'discount_codes', 5, 2, 1, '2020-03-08 16:11:03', '2020-03-08 16:11:03'),
(17, 'SUB_MENU', 'SM_PRODUCTS', 'Products', 'products', 6, 1, 1, '2020-03-08 16:11:03', '2020-03-08 16:11:03'),
(18, 'SUB_MENU', 'SM_CATEGORY', 'Categories', 'categories', 6, 2, 1, '2020-03-08 16:11:04', '2020-03-08 16:11:04'),
(19, 'SUB_MENU', 'SM_STORE', 'Stores', 'stores', 8, 1, 1, '2020-03-08 16:11:04', '2020-03-08 16:11:04'),
(20, 'SUB_MENU', 'SM_PAYMENT_METHOD', 'Payment Methods', 'payment_methods', 8, 2, 1, '2020-03-08 16:11:04', '2020-03-08 16:11:04'),
(21, 'SUB_MENU', 'SM_IMPORT_DATA', 'Import Data', 'import_data', 8, 3, 1, '2020-03-08 16:11:04', '2020-03-08 16:11:04'),
(22, 'SUB_MENU', 'SM_UPDATE_DATA', 'Upload & Update Data', 'update_data', 8, 4, 1, '2020-03-08 16:11:04', '2020-03-08 16:11:04'),
(23, 'SUB_MENU', 'SM_EMAIL_SETTING', 'Email Settings', 'email_setting', 8, 5, 1, '2020-03-08 16:11:04', '2020-03-08 16:11:04'),
(24, 'SUB_MENU', 'SM_APP_SETTING', 'App Settings', 'app_setting', 8, 6, 1, '2020-03-08 16:11:04', '2020-03-08 16:11:04'),
(25, 'ACTIONS', 'A_ADD_USER', 'Add User', '', 11, 1, 1, '2020-03-08 16:11:04', '2020-03-08 16:11:04'),
(26, 'ACTIONS', 'A_EDIT_USER', 'Edit User', '', 11, 2, 1, '2020-03-08 16:11:04', '2020-03-08 16:11:04'),
(27, 'ACTIONS', 'A_DETAIL_USER', 'View User Detail', '', 11, 3, 1, '2020-03-08 16:11:04', '2020-03-08 16:11:04'),
(28, 'ACTIONS', 'A_ADD_ROLE', 'Add Role', '', 13, 1, 1, '2020-03-08 16:11:04', '2020-03-08 16:11:04'),
(29, 'ACTIONS', 'A_EDIT_ROLE', 'Edit Role', '', 13, 2, 1, '2020-03-08 16:11:04', '2020-03-08 16:11:04'),
(30, 'ACTIONS', 'A_DETAIL_ROLE', 'View Role Detail', '', 13, 3, 1, '2020-03-08 16:11:04', '2020-03-08 16:11:04'),
(31, 'ACTIONS', 'A_ADD_CUSTOMER', 'Add Customer', '', 12, 1, 1, '2020-03-08 16:11:04', '2020-03-08 16:11:04'),
(32, 'ACTIONS', 'A_EDIT_CUSTOMER', 'Edit Customer', '', 12, 2, 1, '2020-03-08 16:11:04', '2020-03-08 16:11:04'),
(33, 'ACTIONS', 'A_DETAIL_CUSTOMER', 'View Customer Detail', '', 12, 3, 1, '2020-03-08 16:11:04', '2020-03-08 16:11:04'),
(34, 'ACTIONS', 'A_ADD_ORDER', 'Add Order', '', 9, 1, 1, '2020-03-08 16:11:04', '2020-03-08 16:11:04'),
(35, 'ACTIONS', 'A_EDIT_ORDER', 'Edit Order', '', 9, 2, 1, '2020-03-08 16:11:04', '2020-03-08 16:11:04'),
(36, 'ACTIONS', 'A_DETAIL_ORDER', 'View Order Details', '', 9, 3, 1, '2020-03-08 16:11:04', '2020-03-08 16:11:04'),
(37, 'ACTIONS', 'A_DELETE_ORDER', 'Delete Order', '', 9, 4, 1, '2020-03-08 16:11:04', '2020-03-08 16:11:04'),
(38, 'ACTIONS', 'A_ADD_PRODUCT', 'Add Product', '', 17, 1, 1, '2020-03-08 16:11:04', '2020-03-08 16:11:04'),
(39, 'ACTIONS', 'A_EDIT_PRODUCT', 'Edit Product', '', 17, 2, 1, '2020-03-08 16:11:04', '2020-03-08 16:11:04'),
(40, 'ACTIONS', 'A_DETAIL_PRODUCT', 'View Product Detail', '', 17, 3, 1, '2020-03-08 16:11:04', '2020-03-08 16:11:04'),
(41, 'ACTIONS', 'A_GENERATE_BARCODE_PRODUCT', 'Generate Product Barcode', '', 17, 4, 1, '2020-03-08 16:11:04', '2020-03-08 16:11:04'),
(42, 'ACTIONS', 'A_ADD_CATEGORY', 'Add Category', '', 18, 1, 1, '2020-03-08 16:11:04', '2020-03-08 16:11:04'),
(43, 'ACTIONS', 'A_EDIT_CATEGORY', 'Edit Category', '', 18, 2, 1, '2020-03-08 16:11:04', '2020-03-08 16:11:04'),
(44, 'ACTIONS', 'A_DETAIL_CATEGORY', 'View Category Detail', '', 18, 3, 1, '2020-03-08 16:11:04', '2020-03-08 16:11:04'),
(45, 'ACTIONS', 'A_ADD_TAXCODE', 'Add Tax Code', '', 15, 1, 1, '2020-03-08 16:11:04', '2020-03-08 16:11:04'),
(46, 'ACTIONS', 'A_EDIT_TAXCODE', 'Edit Tax Code', '', 15, 2, 1, '2020-03-08 16:11:04', '2020-03-08 16:11:04'),
(47, 'ACTIONS', 'A_DETAIL_TAXCODE', 'View Tax Code Detail', '', 15, 3, 1, '2020-03-08 16:11:05', '2020-03-08 16:11:05'),
(48, 'ACTIONS', 'A_ADD_DISCOUNTCODE', 'Add Discount Code', '', 16, 1, 1, '2020-03-08 16:11:05', '2020-03-08 16:11:05'),
(49, 'ACTIONS', 'A_EDIT_DISCOUNTCODE', 'Edit Discount Code', '', 16, 2, 1, '2020-03-08 16:11:05', '2020-03-08 16:11:05'),
(50, 'ACTIONS', 'A_DETAIL_DISCOUNTCODE', 'View Discount Code Detail', '', 16, 3, 1, '2020-03-08 16:11:05', '2020-03-08 16:11:05'),
(51, 'ACTIONS', 'A_ADD_SUPPLIER', 'Add Supplier', '', 14, 1, 1, '2020-03-08 16:11:05', '2020-03-08 16:11:05'),
(52, 'ACTIONS', 'A_EDIT_SUPPLIER', 'Edit Supplier', '', 14, 2, 1, '2020-03-08 16:11:05', '2020-03-08 16:11:05'),
(53, 'ACTIONS', 'A_DETAIL_SUPPLIER', 'View Supplier Detail', '', 14, 3, 1, '2020-03-08 16:11:05', '2020-03-08 16:11:05'),
(54, 'ACTIONS', 'A_ADD_STORE', 'Add Store', '', 19, 1, 1, '2020-03-08 16:11:05', '2020-03-08 16:11:05'),
(55, 'ACTIONS', 'A_EDIT_STORE', 'Edit Store', '', 19, 2, 1, '2020-03-08 16:11:05', '2020-03-08 16:11:05'),
(56, 'ACTIONS', 'A_DETAIL_STORE', 'View Store Detail', '', 19, 3, 1, '2020-03-08 16:11:05', '2020-03-08 16:11:05'),
(57, 'ACTIONS', 'A_ADD_PAYMENT_METHOD', 'Add Payment Method', '', 20, 1, 1, '2020-03-08 16:11:05', '2020-03-08 16:11:05'),
(58, 'ACTIONS', 'A_EDIT_PAYMENT_METHOD', 'Edit Payment Method', '', 20, 2, 1, '2020-03-08 16:11:05', '2020-03-08 16:11:05'),
(59, 'ACTIONS', 'A_DETAIL_PAYMENT_METHOD', 'View Payment Method Detail', '', 20, 3, 1, '2020-03-08 16:11:05', '2020-03-08 16:11:05'),
(60, 'ACTIONS', 'A_UPLOAD_USER', 'Upload Users', '', 21, 1, 1, '2020-03-08 16:11:05', '2020-03-08 16:11:05'),
(61, 'ACTIONS', 'A_UPLOAD_STORE', 'Upload Store', '', 21, 2, 1, '2020-03-08 16:11:05', '2020-03-08 16:11:05'),
(62, 'ACTIONS', 'A_UPLOAD_SUPPLIER', 'Upload Supplier', '', 21, 3, 1, '2020-03-08 16:11:05', '2020-03-08 16:11:05'),
(63, 'ACTIONS', 'A_UPLOAD_CATEGORY', 'Upload Category', '', 21, 4, 1, '2020-03-08 16:11:05', '2020-03-08 16:11:05'),
(64, 'ACTIONS', 'A_UPLOAD_PRODUCT', 'Upload Product', '', 21, 5, 1, '2020-03-08 16:11:05', '2020-03-08 16:11:05'),
(65, 'ACTIONS', 'A_UPDATE_USER', 'Update Users', '', 22, 1, 1, '2020-03-08 16:11:05', '2020-03-08 16:11:05'),
(66, 'ACTIONS', 'A_UPDATE_STORE', 'Update Store', '', 22, 2, 1, '2020-03-08 16:11:05', '2020-03-08 16:11:05'),
(67, 'ACTIONS', 'A_UPDATE_SUPPLIER', 'Update Supplier', '', 22, 3, 1, '2020-03-08 16:11:05', '2020-03-08 16:11:05'),
(68, 'ACTIONS', 'A_UPDATE_CATEGORY', 'Update Category', '', 22, 4, 1, '2020-03-08 16:11:05', '2020-03-08 16:11:05'),
(69, 'ACTIONS', 'A_UPDATE_PRODUCT', 'Update Product', '', 22, 5, 1, '2020-03-08 16:11:05', '2020-03-08 16:11:05'),
(70, 'ACTIONS', 'A_ADD_PURCHASE_ORDER', 'Add Purchase Order', '', 10, 1, 1, '2020-03-08 16:11:05', '2020-03-08 16:11:05'),
(71, 'ACTIONS', 'A_EDIT_PURCHASE_ORDER', 'Edit Purchase Order', '', 10, 2, 1, '2020-03-08 16:11:05', '2020-03-08 16:11:05'),
(72, 'ACTIONS', 'A_DETAIL_PURCHASE_ORDER', 'View Purchase Order Detail', '', 10, 3, 1, '2020-03-08 16:11:05', '2020-03-08 16:11:05'),
(73, 'ACTIONS', 'A_EDIT_STATUS_PURCHASE_ORDER', 'Change Purchase Order Status', '', 10, 3, 1, '2020-03-08 16:11:05', '2020-03-08 16:11:05'),
(74, 'ACTIONS', 'A_EDIT_EMAIL_SETTING', 'Edit Email Setting', '', 23, 1, 1, '2020-03-08 16:11:05', '2020-03-08 16:11:05'),
(75, 'ACTIONS', 'A_EDIT_APP_SETTING', 'Edit App Setting', '', 24, 1, 1, '2020-03-08 16:11:05', '2020-03-08 16:11:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_06_26_051735_create_users_table', 1),
(2, '2019_06_26_053209_create_menus_table', 1),
(3, '2019_06_26_060037_create_user_menus_table', 1),
(4, '2019_07_04_063904_create_roles_table', 1),
(5, '2019_07_05_093727_create_master_status_table', 1),
(6, '2019_08_01_095649_create_role_menus_table', 1),
(7, '2019_08_08_063950_create_products_table_', 1),
(8, '2019_08_08_064020_create_category_table_', 1),
(9, '2019_08_08_064039_create_tax_codes_table_', 1),
(10, '2019_08_08_065740_create_suppliers_table_', 1),
(11, '2019_08_12_111921_create_tax_code_type_table', 1),
(12, '2019_09_02_091654_create_orders_table', 1),
(13, '2019_09_02_093147_create_order_products_table', 1),
(14, '2019_09_02_102236_create_customers_table', 1),
(15, '2019_09_22_143359_create_stores_table', 1),
(16, '2019_09_25_073244_create_user_stores_table', 1),
(17, '2019_10_07_110215_create_discount_codes_table', 1),
(18, '2019_10_19_120057_create_payment_methods_table', 1),
(19, '2019_11_12_185655_create_purchase_orders_table', 1),
(20, '2019_11_13_094741_create_purchase_order_products_table', 1),
(21, '2019_11_13_111337_create_country_table', 1),
(22, '2019_12_11_113654_create_setting_mail_table', 1),
(23, '2019_12_28_083017_create_setting_app_table', 1),
(24, '2019_12_30_071527_create_master_date_format_table', 1),
(25, '2020_01_08_182121_create_master_invoice_print_type_table', 1),
(26, '2020_01_28_171546_create_sessions_table', 1),
(27, '2020_01_30_065150_create_user_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `slack` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_id` int(11) NOT NULL,
  `order_number` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_level_discount_code_id` int(11) DEFAULT NULL,
  `store_level_discount_code` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_level_total_discount_percentage` decimal(8,2) NOT NULL DEFAULT '0.00',
  `store_level_total_discount_amount` decimal(13,2) NOT NULL DEFAULT '0.00',
  `product_level_total_discount_amount` decimal(13,2) NOT NULL DEFAULT '0.00',
  `store_level_tax_code_id` int(11) DEFAULT NULL,
  `store_level_tax_code` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_level_total_tax_percentage` decimal(8,2) NOT NULL DEFAULT '0.00',
  `store_level_total_tax_amount` decimal(13,2) NOT NULL DEFAULT '0.00',
  `store_level_total_tax_components` text COLLATE utf8mb4_unicode_ci,
  `product_level_total_tax_amount` decimal(13,2) NOT NULL DEFAULT '0.00',
  `purchase_amount_subtotal_excluding_tax` decimal(13,2) NOT NULL DEFAULT '0.00',
  `sale_amount_subtotal_excluding_tax` decimal(13,2) NOT NULL DEFAULT '0.00',
  `total_discount_amount` decimal(13,2) NOT NULL DEFAULT '0.00',
  `total_after_discount` decimal(13,2) NOT NULL DEFAULT '0.00',
  `total_tax_amount` decimal(13,2) NOT NULL DEFAULT '0.00',
  `total_order_amount` decimal(13,2) NOT NULL DEFAULT '0.00',
  `payment_method_id` int(11) DEFAULT NULL,
  `payment_method_slack` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `slack`, `store_id`, `order_number`, `customer_id`, `customer_phone`, `customer_email`, `store_level_discount_code_id`, `store_level_discount_code`, `store_level_total_discount_percentage`, `store_level_total_discount_amount`, `product_level_total_discount_amount`, `store_level_tax_code_id`, `store_level_tax_code`, `store_level_total_tax_percentage`, `store_level_total_tax_amount`, `store_level_total_tax_components`, `product_level_total_tax_amount`, `purchase_amount_subtotal_excluding_tax`, `sale_amount_subtotal_excluding_tax`, `total_discount_amount`, `total_after_discount`, `total_tax_amount`, `total_order_amount`, `payment_method_id`, `payment_method_slack`, `payment_method`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'fGoq4zo4fvi5UmaMcCjBnoiu4', 1, '101', 6, '0000000000', 'customer@alltool.com', NULL, NULL, '0.00', '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '1.00', '10.00', '10.00', '0.00', '10.00', '1.00', '11.00', 1, 'lRW6S2TDr7FuWkMqzmq8Ntv3I', 'Cash', 1, 1, NULL, '2020-03-08 16:48:25', '2020-03-08 16:48:25'),
(2, 'uzXSlIONjIxUdCb752Zrm3mce', 1, '102', 1, '0000000000', 'customer@alltool.com', NULL, NULL, '0.00', '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '4.00', '40.00', '40.00', '0.00', '40.00', '4.00', '44.00', 1, 'lRW6S2TDr7FuWkMqzmq8Ntv3I', 'Cash', 1, 1, NULL, '2020-03-09 04:55:33', '2020-03-09 04:55:33'),
(3, '170ImY1YX5ZjTHrnX80aGCkS7', 1, '103', 23, '12121', 'null', NULL, NULL, '0.00', '0.00', '0.00', NULL, NULL, '0.00', '0.00', NULL, '1.00', '10.00', '10.00', '0.00', '10.00', '1.00', '11.00', 1, 'lRW6S2TDr7FuWkMqzmq8Ntv3I', 'Cash', 1, 1, NULL, '2020-06-28 00:15:08', '2020-06-28 00:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `slack` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_slack` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `purchase_amount_excluding_tax` decimal(13,2) NOT NULL,
  `sale_amount_excluding_tax` decimal(13,2) NOT NULL,
  `discount_code_id` int(11) DEFAULT NULL,
  `discount_code` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_percentage` decimal(8,2) NOT NULL DEFAULT '0.00',
  `tax_code_id` int(11) DEFAULT NULL,
  `tax_code` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_percentage` decimal(8,2) NOT NULL DEFAULT '0.00',
  `tax_components` text COLLATE utf8mb4_unicode_ci,
  `sub_total_purchase_price_excluding_tax` decimal(13,2) NOT NULL,
  `sub_total_sale_price_excluding_tax` decimal(13,2) NOT NULL,
  `discount_amount` decimal(13,2) NOT NULL DEFAULT '0.00',
  `total_after_discount` decimal(13,2) NOT NULL DEFAULT '0.00',
  `tax_amount` decimal(13,2) NOT NULL DEFAULT '0.00',
  `total_amount` decimal(13,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `slack`, `order_id`, `product_id`, `product_slack`, `product_code`, `name`, `quantity`, `purchase_amount_excluding_tax`, `sale_amount_excluding_tax`, `discount_code_id`, `discount_code`, `discount_percentage`, `tax_code_id`, `tax_code`, `tax_percentage`, `tax_components`, `sub_total_purchase_price_excluding_tax`, `sub_total_sale_price_excluding_tax`, `discount_amount`, `total_after_discount`, `tax_amount`, `total_amount`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'fSkpBbGCqPP2EOLdYokyRSKqC', 1, 1, 'R0ghodMYQwIvCtzjxwujjqPUR', '545', 'burger', '1.00', '10.00', '10.00', NULL, NULL, '0.00', 1, '545', '10.00', '[{\"tax_type\":\"tax type\",\"tax_percentage\":\"10.00\",\"tax_amount\":1}]', '10.00', '10.00', '0.00', '10.00', '1.00', '11.00', 1, 1, NULL, '2020-03-08 16:48:25', NULL),
(2, 'jswBS9XGf78sGzFiEXZcJyfMk', 2, 1, 'R0ghodMYQwIvCtzjxwujjqPUR', '545', 'burger', '4.00', '10.00', '10.00', NULL, NULL, '0.00', 1, '545', '10.00', '[{\"tax_type\":\"tax type\",\"tax_percentage\":\"10.00\",\"tax_amount\":4}]', '40.00', '40.00', '0.00', '40.00', '4.00', '44.00', 1, 1, NULL, '2020-03-09 04:55:33', NULL),
(3, 'mDQGPibjTP3HlpTphhXeMx1a3', 3, 1, 'R0ghodMYQwIvCtzjxwujjqPUR', '545', 'burger', '1.00', '10.00', '10.00', NULL, NULL, '0.00', 1, '545', '10.00', '[{\"tax_type\":\"tax type\",\"tax_percentage\":\"10.00\",\"tax_amount\":1}]', '10.00', '10.00', '0.00', '10.00', '1.00', '11.00', 1, 1, NULL, '2020-06-28 00:15:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `slack` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `slack`, `label`, `description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'lRW6S2TDr7FuWkMqzmq8Ntv3I', 'Cash', NULL, 1, 1, NULL, '2020-03-08 16:47:54', '2020-03-08 16:47:54'),
(2, 'M4E5fQeU7GBeWPFmXEL3eQKVV', 'Visa', NULL, 1, 2, NULL, '2020-03-17 19:40:14', '2020-03-17 19:40:14');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `product_id`, `photo`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/product/1594744245.jpg', '2020-07-14 14:30:45', '2020-07-14 14:30:45'),
(2, 1, 'uploads/product/1594744245.jpg', '2020-07-14 14:30:45', '2020-07-14 14:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `slack` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_id` int(11) NOT NULL,
  `product_code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `description_ar` text COLLATE utf8mb4_unicode_ci,
  `category_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `tax_code_id` int(11) NOT NULL,
  `discount_code_id` int(11) DEFAULT NULL,
  `quantity` decimal(8,2) NOT NULL DEFAULT '0.00',
  `purchase_amount_excluding_tax` decimal(13,2) NOT NULL,
  `sale_amount_excluding_tax` decimal(13,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soldout` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL,
  `available` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `slack`, `store_id`, `product_code`, `name_en`, `name_ar`, `description_en`, `description_ar`, `category_id`, `supplier_id`, `tax_code_id`, `discount_code_id`, `quantity`, `purchase_amount_excluding_tax`, `sale_amount_excluding_tax`, `status`, `photo`, `soldout`, `available`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'OpVnbOx6qD46iuwS7OAulVSqo', 1, '123', 'BOSS', '', 'BOSS', NULL, 1, 1, 1, NULL, '10.00', '3.00', '3.00', 1, 'uploads/product/1594744245.jpg', '0', '1', 1, NULL, '2020-07-14 14:30:45', '2020-07-14 14:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

CREATE TABLE `purchase_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `slack` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_id` int(11) NOT NULL,
  `po_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `po_reference` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `order_due_date` date DEFAULT NULL,
  `supplier_id` int(11) NOT NULL,
  `supplier_code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_address` text COLLATE utf8mb4_unicode_ci,
  `currency_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_code` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal_excluding_tax` decimal(13,2) NOT NULL DEFAULT '0.00',
  `total_discount_amount` decimal(13,2) NOT NULL DEFAULT '0.00',
  `total_after_discount` decimal(13,2) NOT NULL DEFAULT '0.00',
  `total_tax_amount` decimal(13,2) NOT NULL DEFAULT '0.00',
  `shipping_charge` decimal(13,2) NOT NULL DEFAULT '0.00',
  `packing_charge` decimal(13,2) NOT NULL DEFAULT '0.00',
  `total_order_amount` decimal(13,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_orders`
--

INSERT INTO `purchase_orders` (`id`, `slack`, `store_id`, `po_number`, `po_reference`, `order_date`, `order_due_date`, `supplier_id`, `supplier_code`, `supplier_name`, `supplier_address`, `currency_name`, `currency_code`, `subtotal_excluding_tax`, `total_discount_amount`, `total_after_discount`, `total_tax_amount`, `shipping_charge`, `packing_charge`, `total_order_amount`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'MzdWlJliDej7ZscfxFlaWhYVk', 1, '323', '32', '2020-06-04', '2020-06-08', 1, 'SUP101', 'Supplier', 'fdlokodi, 44555', 'Egyptian pound', 'EGP', '4.00', '0.40', '3.60', '0.36', '10.00', '0.00', '13.96', 1, 1, NULL, '2020-06-28 00:18:28', '2020-06-28 00:18:28');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_products`
--

CREATE TABLE `purchase_order_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `slack` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_order_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_slack` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` decimal(8,2) NOT NULL DEFAULT '0.00',
  `amount_excluding_tax` decimal(13,2) NOT NULL DEFAULT '0.00',
  `subtotal_amount_excluding_tax` decimal(13,2) NOT NULL DEFAULT '0.00',
  `discount_percentage` decimal(8,2) NOT NULL DEFAULT '0.00',
  `tax_percentage` decimal(8,2) NOT NULL DEFAULT '0.00',
  `discount_amount` decimal(13,2) NOT NULL DEFAULT '0.00',
  `total_after_discount` decimal(13,2) NOT NULL DEFAULT '0.00',
  `tax_amount` decimal(13,2) NOT NULL DEFAULT '0.00',
  `total_amount` decimal(13,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_order_products`
--

INSERT INTO `purchase_order_products` (`id`, `slack`, `purchase_order_id`, `product_id`, `product_slack`, `product_code`, `name`, `quantity`, `amount_excluding_tax`, `subtotal_amount_excluding_tax`, `discount_percentage`, `tax_percentage`, `discount_amount`, `total_after_discount`, `tax_amount`, `total_amount`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'U58NgwFKOYIGRbgo7T4sMKjzR', 1, NULL, NULL, NULL, 'burger', '2.00', '2.00', '4.00', '10.00', '10.00', '0.40', '3.60', '0.36', '3.96', 1, 1, NULL, '2020-06-28 00:18:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slack` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slack`, `role_code`, `label`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'jaaDSzue9LKrE2t8el9dD7eef', 'SA', 'Super Admin', 1, 1, NULL, '2020-03-08 16:11:09', '2020-03-08 16:11:09'),
(2, '7Nt31ldsw4MmhQ4KqbcE8AiJp', '102', 'Admin', 1, 1, NULL, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(3, 'Vgp7zsL5ypyRybcbaBfHooICd', '103', 'Cashier', 1, 2, NULL, '2020-03-17 19:32:53', '2020-03-17 19:32:53');

-- --------------------------------------------------------

--
-- Table structure for table `role_menus`
--

CREATE TABLE `role_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_menus`
--

INSERT INTO `role_menus` (`id`, `role_id`, `menu_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(2, 2, 2, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(3, 2, 9, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(4, 2, 10, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(5, 2, 34, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(6, 2, 35, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(7, 2, 36, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(8, 2, 37, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(9, 2, 70, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(10, 2, 71, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(11, 2, 72, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(12, 2, 73, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(13, 2, 3, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(14, 2, 11, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(15, 2, 12, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(16, 2, 13, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(17, 2, 25, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(18, 2, 26, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(19, 2, 27, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(20, 2, 31, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(21, 2, 32, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(22, 2, 33, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(23, 2, 28, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(24, 2, 29, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(25, 2, 30, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(26, 2, 4, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(27, 2, 14, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(28, 2, 51, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(29, 2, 52, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(30, 2, 53, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(31, 2, 5, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(32, 2, 15, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(33, 2, 16, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(34, 2, 45, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(35, 2, 46, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(36, 2, 47, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(37, 2, 48, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(38, 2, 49, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(39, 2, 50, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(40, 2, 6, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(41, 2, 17, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(42, 2, 18, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(43, 2, 38, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(44, 2, 39, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(45, 2, 40, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(46, 2, 41, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(47, 2, 42, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(48, 2, 43, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(49, 2, 44, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(50, 2, 7, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(51, 2, 8, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(52, 2, 19, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(53, 2, 20, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(54, 2, 21, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(55, 2, 22, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(56, 2, 23, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(57, 2, 24, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(58, 2, 54, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(59, 2, 55, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(60, 2, 56, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(61, 2, 57, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(62, 2, 58, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(63, 2, 59, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(64, 2, 60, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(65, 2, 61, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(66, 2, 62, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(67, 2, 63, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(68, 2, 64, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(69, 2, 65, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(70, 2, 66, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(71, 2, 67, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(72, 2, 68, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(73, 2, 69, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(74, 2, 74, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(75, 2, 75, 1, '2020-03-11 17:25:39', '2020-03-11 17:25:39'),
(76, 3, 9, 2, '2020-03-17 19:32:53', '2020-03-17 19:32:53'),
(77, 3, 2, 2, '2020-03-17 19:32:53', '2020-03-17 19:32:53'),
(78, 3, 34, 2, '2020-03-17 19:32:53', '2020-03-17 19:32:53'),
(79, 3, 35, 2, '2020-03-17 19:32:53', '2020-03-17 19:32:53'),
(80, 3, 36, 2, '2020-03-17 19:32:53', '2020-03-17 19:32:53');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('7szYTyL7OQppAGjuMizZunvKBxed6bSa8sECisNr', NULL, '154.179.150.159', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibFVEenpQTVNFUUpzdmJGSTBtdWNGZ1JrWUxYaHZsbEF3dVFZZWVIcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHBzOi8vY3AubXlsb3ZlcnJhLmNvbS9tb2JpbGVhcGkvY2F0ZWdvcnk/aXRlbXNfbnVtPTUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1594772829),
('cAZu9Np8NZhQsfhG1ZRljF4qDkENPFgbUg4Velso', NULL, '54.78.67.121', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/78.0.3882.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVkV2VFpoYXlsTzBQQ0M0Zk14djZXVEZBNkhLOG4zNDBnU2dQSG5QViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vY3AubXlsb3ZlcnJhLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1594784696),
('Gv8wFyjbEmYXfnQtFp88NiIgFrDxm9h0okJU2w5q', NULL, '34.240.83.40', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/78.0.3882.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMmF4WFY5cmg2TnBQVlpqbkl5THhjZHRQZ3pOV0NVRHBWSFRtT2l2cyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vY3AubXlsb3ZlcnJhLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1594766808),
('oiUxhb0NzT1ebxDGjvKTYAXJihwVkCGdDHEgMcyL', NULL, '3.249.42.48', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/78.0.3882.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaFQxOGtoTUYxQ1NDUmdUcFNRZ2hFczhmaVZ1ekUyOERoSVFsOVRYSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vY3AubXlsb3ZlcnJhLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1594829087),
('OS8atSpySqKr7El15LtEaTh4A62DGGigIKwRgO8d', 22, '154.179.150.159', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidVNzeUNtVnZYR0xJaThhQUFPME1kWk9OdWJBckFBN1lpN28wNzhLUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTE0OiJodHRwczovL2NwLm15bG92ZXJyYS5jb20vbW9iaWxlYXBpL2Zhdm9yaXRlP2FwaV90b2tlbj1meW9lTFpVWmxlZjhMWnp4akNFQnl2a1VkRkdXTGhYWlQ0R1EwVDRvRGVpTldTZWFWOGJJNUtwQW1jUUciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1594784850),
('SKJmrGnlPRAb0kqBMmqiHz85SnJpwCFSRKP7EI2q', NULL, '34.240.83.40', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/78.0.3882.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVGMxd3hWc0lUVXZ1dElRcjVGcjBwVWpaQWxqTlhkMkloUFZpWUhFQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vY3AubXlsb3ZlcnJhLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1594784697),
('YUNa3QwnubO6EUhipIg7z6B1LVBbsYTEL50c38GK', NULL, '154.179.150.159', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'YTozOntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNDoiaHR0cHM6Ly9jcC5teWxvdmVycmEuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6IkI5RDBiTEZucE9nUjc0UW1QakZXdE1SNFU4MU95a1I3amJBNnNCS1oiO30=', 1594785000);

-- --------------------------------------------------------

--
-- Table structure for table `setting_app`
--

CREATE TABLE `setting_app` (
  `company_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_date_time_format` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_date_format` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_logo` text COLLATE utf8mb4_unicode_ci,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_app`
--

INSERT INTO `setting_app` (`company_name`, `app_date_time_format`, `app_date_format`, `company_logo`, `updated_by`, `created_at`, `updated_at`) VALUES
('Appsthing POS', 'd-m-Y H:i', 'd-m-Y', '', 1, '2020-03-08 16:11:26', '2020-03-08 16:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `setting_mail`
--

CREATE TABLE `setting_mail` (
  `id` int(10) UNSIGNED NOT NULL,
  `slack` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `host` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `port` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `encryption` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_email_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(10) UNSIGNED NOT NULL,
  `slack` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_number` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_code_id` int(11) DEFAULT NULL,
  `discount_code_id` int(11) DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `pincode` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_contact` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_contact` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'SMALL',
  `currency_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_code` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT 'USD',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `slack`, `store_code`, `name`, `tax_number`, `tax_code_id`, `discount_code_id`, `address`, `pincode`, `primary_contact`, `secondary_contact`, `primary_email`, `secondary_email`, `invoice_type`, `currency_name`, `currency_code`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'YmFbRphhOfvDvl3GWq3wDxLs4', 'TEST', 'test', '145', NULL, NULL, 'cairo', '11255', '44545545545', '54454545455', 'amany.zalat@gmail.com', NULL, 'A4', 'Egyptian pound', 'EGP', 1, 1, NULL, '2020-03-08 16:39:38', '2020-03-08 16:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `slack` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_id` int(11) NOT NULL,
  `supplier_code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `pincode` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `slack`, `store_id`, `supplier_code`, `name`, `email`, `phone`, `address`, `pincode`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '4ljHNc8eBipmJNX6X2LBLm3mF', 1, 'SUP101', 'Supplier', 'iiewu@iudf.com', '1255455555', 'fdlokodi', '44555', 1, 1, NULL, '2020-03-08 16:42:46', '2020-03-08 16:42:46');

-- --------------------------------------------------------

--
-- Table structure for table `tax_codes`
--

CREATE TABLE `tax_codes` (
  `id` int(10) UNSIGNED NOT NULL,
  `slack` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_id` int(11) NOT NULL,
  `label` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_tax_percentage` decimal(8,2) NOT NULL DEFAULT '0.00',
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tax_codes`
--

INSERT INTO `tax_codes` (`id`, `slack`, `store_id`, `label`, `tax_code`, `total_tax_percentage`, `description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '4OxP57p48ZpGVDbBgtmtcXlB4', 1, 'tax', '545', '10.00', NULL, 1, 1, NULL, '2020-03-08 16:44:04', '2020-03-08 16:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `tax_code_type`
--

CREATE TABLE `tax_code_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `tax_code_id` int(11) NOT NULL,
  `tax_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_percentage` decimal(8,2) NOT NULL DEFAULT '0.00',
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tax_code_type`
--

INSERT INTO `tax_code_type` (`id`, `tax_code_id`, `tax_type`, `tax_percentage`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'tax type', '10.00', 1, '2020-03-08 16:44:04', '2020-03-08 16:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `slack` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `init_password` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_reset_token` text COLLATE utf8mb4_unicode_ci,
  `password_reset_max_tries` int(11) NOT NULL DEFAULT '0',
  `password_reset_last_tried_on` datetime DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` text COLLATE utf8mb4_unicode_ci,
  `role_id` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `slack`, `user_code`, `fullname`, `email`, `password`, `init_password`, `password_reset_token`, `password_reset_max_tries`, `password_reset_last_tried_on`, `phone`, `profile_image`, `role_id`, `store_id`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'pQAvkWx3bGx55kzelaNNaLdSg', 'SA', 'Appsthing Admin', 'admin@appsthing.com', '$2y$10$ev6LTmm5BHIRD/P7PTAk0eNhMWOIsJZjrwM0B0KfUiZSOGHoXkP6G', NULL, NULL, 0, NULL, '0000000000', NULL, 1, 1, 1, NULL, NULL, '2020-03-08 16:11:02', '2020-03-08 16:39:51'),
(2, 'atrJCo6e6DajsEoOm4NnYYMJU', '102', 'Osama Gamal', 'me@i0sa.com', '$2y$10$ZRDnXXU7Kn/YgqUdrJ0uiO0VHiEH7s5AglK5fqhkdnWuqoLfi7kWW', NULL, NULL, 0, NULL, '01288324283', NULL, 2, 1, 1, 1, 1, '2020-03-11 17:25:58', '2020-03-11 18:10:28'),
(3, 'UMb8fqtqdOsXfSi87nFVmRq1f', '103', 'wdwd', 'w@w.com', '$2y$10$Hvoh2HAfFyQfD07p6vQirOH/fZhNkecr5NyD4EYB/OWss6fIx4DBC', 'NTZKkb', NULL, 0, NULL, '01288324283', NULL, 2, NULL, 1, 2, NULL, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(4, 'r8pBEVVO4uJhS8ocVBVQwKyxd', '104', 'Ahmed', 'x@x.com', '$2y$10$El55p6TqObGXixzyCjD7iOmZTexNVLS7w1WMNFtHrnsb.38DeONuu', 'ptHZZP', NULL, 0, NULL, '01299324293', NULL, 3, NULL, 1, 2, NULL, '2020-03-17 19:33:17', '2020-03-17 19:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_tokens`
--

CREATE TABLE `user_access_tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `session_id` text COLLATE utf8mb4_unicode_ci,
  `access_token` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_access_tokens`
--

INSERT INTO `user_access_tokens` (`id`, `user_id`, `session_id`, `access_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'sOHgSRjTwXOn8nwHAM8Z3I9DM66rZ3M9ytWyResV', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJqd3RfdG9rZW4iLCJzdWIiOnsidXNlcl9pZCI6MSwidXNlcl9zbGFjayI6InBRQXZrV3gzYkd4NTVremVsYU5OYUxkU2cifSwiaWF0IjoxNTgzNjkyMzY0LCJleHAiOjE1ODM3Nzg3NjR9.mFf9LfNJeteGIC5tJA0uiiAA_47LcQ19U7-VwrQUcGU', '2020-03-08 16:32:44', '2020-03-08 16:32:44'),
(2, 1, 'ONcNIvjAEbotNcsSO84KVBvSmPUFhRSvZ70BWsT8', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJqd3RfdG9rZW4iLCJzdWIiOnsidXNlcl9pZCI6MSwidXNlcl9zbGFjayI6InBRQXZrV3gzYkd4NTVremVsYU5OYUxkU2cifSwiaWF0IjoxNTgzNjk0OTYwLCJleHAiOjE1ODM3ODEzNjB9.s6_lnIJQyvq30U5fOnwmSbwr3Ch0awlzeeN0ThbQc84', '2020-03-08 17:16:00', '2020-03-08 17:16:00'),
(3, 1, 'ONcNIvjAEbotNcsSO84KVBvSmPUFhRSvZ70BWsT8', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJqd3RfdG9rZW4iLCJzdWIiOnsidXNlcl9pZCI6MSwidXNlcl9zbGFjayI6InBRQXZrV3gzYkd4NTVremVsYU5OYUxkU2cifSwiaWF0IjoxNTgzNjk1MTM0LCJleHAiOjE1ODM3ODE1MzR9.PZbZq3RlTuxAhYEWjF3Q7RoAzyq5-Qp77PajY-KagEk', '2020-03-08 17:18:54', '2020-03-08 17:18:54'),
(4, 1, 'cIWCyBjIaRZ9CDsDxTi24xi3joO4Qcp4hgUXhrzX', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJqd3RfdG9rZW4iLCJzdWIiOnsidXNlcl9pZCI6MSwidXNlcl9zbGFjayI6InBRQXZrV3gzYkd4NTVremVsYU5OYUxkU2cifSwiaWF0IjoxNTgzNzExMzU3LCJleHAiOjE1ODM3OTc3NTd9.C8onvNEi3wVGewUpBdP3OL4xYLe8TVV-DXFdKC7XI_A', '2020-03-09 04:49:17', '2020-03-09 04:49:17'),
(5, 1, 'METvqhn6YmYDiFNW8DFa3UlWWK6pgaHjATF8vX32', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJqd3RfdG9rZW4iLCJzdWIiOnsidXNlcl9pZCI6MSwidXNlcl9zbGFjayI6InBRQXZrV3gzYkd4NTVremVsYU5OYUxkU2cifSwiaWF0IjoxNTgzNzExNDIwLCJleHAiOjE1ODM3OTc4MjB9.5WWri7WvQlrT3Z5Hwm4nkq_iM0QTID2hqTOnCX6d6EY', '2020-03-09 04:50:20', '2020-03-09 04:50:20'),
(6, 1, 'gkuueYc9gOxLl2MmHNJoDPAJ6P5iFvPhTgXoPqBa', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJqd3RfdG9rZW4iLCJzdWIiOnsidXNlcl9pZCI6MSwidXNlcl9zbGFjayI6InBRQXZrV3gzYkd4NTVremVsYU5OYUxkU2cifSwiaWF0IjoxNTgzODI2NjA4LCJleHAiOjE1ODM5MTMwMDh9.G0RgC8LyQVpGzsWJPYTKQaoMQsv1QLAF_1Ub1CWBF7M', '2020-03-10 12:50:08', '2020-03-10 12:50:08'),
(11, 2, 'hOcBh45Tovh3UWfTjKxLlQvss8qE4bvEJ1r3pDF0', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJqd3RfdG9rZW4iLCJzdWIiOnsidXNlcl9pZCI6MiwidXNlcl9zbGFjayI6ImF0ckpDbzZlNkRhanNFb09tNE5uWVlNSlUifSwiaWF0IjoxNTgzOTI5NjQ4LCJleHAiOjE1ODQwMTYwNDh9.KMxMLXZrmjog6T7QzQHZ5AGaTZUX9IbvjkJBtRoM9jk', '2020-03-11 17:27:28', '2020-03-11 17:27:28'),
(12, 2, 'BvbX6ZAH5YmdQuQaI51wDfyWRUfE2lGS6fnsq8lH', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJqd3RfdG9rZW4iLCJzdWIiOnsidXNlcl9pZCI6MiwidXNlcl9zbGFjayI6ImF0ckpDbzZlNkRhanNFb09tNE5uWVlNSlUifSwiaWF0IjoxNTg0MDIxMjI2LCJleHAiOjE1ODQxMDc2MjZ9.AkOgQ7cK71u-KvmG-NyiXHPgMcg-NK2sdzIE9woRfZ4', '2020-03-12 18:53:46', '2020-03-12 18:53:46'),
(15, 1, 'xCuWGTJbrGSv26ML8IgxkOhrt5WjBs4nDFk9N2MY', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJqd3RfdG9rZW4iLCJzdWIiOnsidXNlcl9pZCI6MSwidXNlcl9zbGFjayI6InBRQXZrV3gzYkd4NTVremVsYU5OYUxkU2cifSwiaWF0IjoxNTg0MTkzNTQxLCJleHAiOjE1ODQyNzk5NDF9.A8x50njOpH3ir73kMgXuhDMW9PnTqi3xkylGn_opiJk', '2020-03-14 18:45:41', '2020-03-14 18:45:41'),
(16, 1, '6iyDpETXosxz1D2ZX3N7wPZC2u4sPO5aeJlpIDBy', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJqd3RfdG9rZW4iLCJzdWIiOnsidXNlcl9pZCI6MSwidXNlcl9zbGFjayI6InBRQXZrV3gzYkd4NTVremVsYU5OYUxkU2cifSwiaWF0IjoxNTg0Mjg1NzM3LCJleHAiOjE1ODQzNzIxMzd9.XiM9nOSakNomZ6f6yQywA4XzpJzE9fNpkjlYJglcYl4', '2020-03-15 20:22:17', '2020-03-15 20:22:17'),
(17, 1, 'To8sCPhMaPTqu7cOQdwwCDeYwiREgZeE1ZKUP5SY', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJqd3RfdG9rZW4iLCJzdWIiOnsidXNlcl9pZCI6MSwidXNlcl9zbGFjayI6InBRQXZrV3gzYkd4NTVremVsYU5OYUxkU2cifSwiaWF0IjoxNTg0MzQ5ODQ0LCJleHAiOjE1ODQ0MzYyNDR9.N72AuUf2OD9VDrEDeMtUQX2VfXPUtA_7z1HT5HN73d8', '2020-03-16 14:10:44', '2020-03-16 14:10:44'),
(22, 2, '1KvoXcmOfE6UYnLXjrTgJsYLYdduk5C04o1iEsKI', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJqd3RfdG9rZW4iLCJzdWIiOnsidXNlcl9pZCI6MiwidXNlcl9zbGFjayI6ImF0ckpDbzZlNkRhanNFb09tNE5uWVlNSlUifSwiaWF0IjoxNTg0NDQyNDQwLCJleHAiOjE1ODQ1Mjg4NDB9.3K_QZWxkI13zUyu8CH5bo6yYqjZ6Suqim2yReF963HU', '2020-03-17 15:54:00', '2020-03-17 15:54:00'),
(24, 1, 'Gvrl8cuabsCtH79D6Zw1J93aoUmFOOLLpJGVoKyZ', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJqd3RfdG9rZW4iLCJzdWIiOnsidXNlcl9pZCI6MSwidXNlcl9zbGFjayI6InBRQXZrV3gzYkd4NTVremVsYU5OYUxkU2cifSwiaWF0IjoxNTg0NDU1MDU5LCJleHAiOjE1ODQ1NDE0NTl9.S2A9udoIO9gdNclxER_tPO1qQzZgetlfilPMH77Trbc', '2020-03-17 19:24:19', '2020-03-17 19:24:19'),
(26, 2, 'ZcLwIfHsZeJ2pWrAFrzzww3iS7uFBRP1Sxgr8YPz', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJqd3RfdG9rZW4iLCJzdWIiOnsidXNlcl9pZCI6MiwidXNlcl9zbGFjayI6ImF0ckpDbzZlNkRhanNFb09tNE5uWVlNSlUifSwiaWF0IjoxNTg0NDU2ODI4LCJleHAiOjE1ODQ1NDMyMjh9.lLWnHVs6uEz1IlffgFJqEu_bxBj4jNrkuhhp_LTlIEE', '2020-03-17 19:53:48', '2020-03-17 19:53:48'),
(27, 2, 'X4kyWTUZeqCKsfWXlyX6pCn5wbRvp2dJl2PPmz7x', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJqd3RfdG9rZW4iLCJzdWIiOnsidXNlcl9pZCI6MiwidXNlcl9zbGFjayI6ImF0ckpDbzZlNkRhanNFb09tNE5uWVlNSlUifSwiaWF0IjoxNTg0NDg5MzIwLCJleHAiOjE1ODQ1NzU3MjB9.p8L9EHw49cXPUiUbI2LtNud_HKaUwVgdXkLrJm9lnaY', '2020-03-18 04:55:20', '2020-03-18 04:55:20'),
(29, 1, '14UrqGEoBJ5Aye4hNNgW4SpIuU79hAkjjybQXERs', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJqd3RfdG9rZW4iLCJzdWIiOnsidXNlcl9pZCI6MSwidXNlcl9zbGFjayI6InBRQXZrV3gzYkd4NTVremVsYU5OYUxkU2cifSwiaWF0IjoxNTkyMTg5MzYwLCJleHAiOjE1OTIyNzU3NjB9.ShSsgY9KRKLNflukifPADteGn8hwF2dw5572oO3gmZg', '2020-06-15 00:49:20', '2020-06-15 00:49:20'),
(30, 1, 'Pmsd2mol14cuY8YUk6kdY9XoHVFjZGc3RCHaNkJd', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJqd3RfdG9rZW4iLCJzdWIiOnsidXNlcl9pZCI6MSwidXNlcl9zbGFjayI6InBRQXZrV3gzYkd4NTVremVsYU5OYUxkU2cifSwiaWF0IjoxNTkzMzAzMjcxLCJleHAiOjE1OTMzODk2NzF9.VlbG1s166e6jmkYAdb84YdTuap9dXe2nMpbgdVsEcAI', '2020-06-27 22:14:31', '2020-06-27 22:14:31'),
(31, 1, 'Mvt548jicVxSMDz4uj7Aq2gaVwhW3EA1MtjVhnP0', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJqd3RfdG9rZW4iLCJzdWIiOnsidXNlcl9pZCI6MSwidXNlcl9zbGFjayI6InBRQXZrV3gzYkd4NTVremVsYU5OYUxkU2cifSwiaWF0IjoxNTk0NTE3OTgzLCJleHAiOjE1OTQ2MDQzODN9.lWNO41JviG5kcopf2NmjT3TqMcf1w8xEfUuzk1oM7Ek', '2020-07-11 23:39:43', '2020-07-11 23:39:43'),
(32, 1, '5Mlg2PgA5K6xXrtJhPUNABVwsW2okoQFprIovTmj', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJqd3RfdG9rZW4iLCJzdWIiOnsidXNlcl9pZCI6MSwidXNlcl9zbGFjayI6InBRQXZrV3gzYkd4NTVremVsYU5OYUxkU2cifSwiaWF0IjoxNTk0NTI2MzA5LCJleHAiOjE1OTQ2MTI3MDl9.OfSFmhiMF483BD42VvshVxViAUr35EDz76PJBDAHcEo', '2020-07-12 01:58:29', '2020-07-12 01:58:29'),
(33, 1, 'iXWm9ADeLDkzR6KoSW6JQtp4VBifz9jnwIFJMKnq', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJqd3RfdG9rZW4iLCJzdWIiOnsidXNlcl9pZCI6MSwidXNlcl9zbGFjayI6InBRQXZrV3gzYkd4NTVremVsYU5OYUxkU2cifSwiaWF0IjoxNTk0NzQyMDE0LCJleHAiOjE1OTQ4Mjg0MTR9.rSoMHV73O7CgGUkCk6o2ecwK-BYW5V63YPAZi-CuTeQ', '2020-07-14 13:53:34', '2020-07-14 13:53:34'),
(35, 1, 'Wzoh7Id3upcOWHBJb8FyIAE1qPcvphQGD7FFmF4S', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJqd3RfdG9rZW4iLCJzdWIiOnsidXNlcl9pZCI6MSwidXNlcl9zbGFjayI6InBRQXZrV3gzYkd4NTVremVsYU5OYUxkU2cifSwiaWF0IjoxNTk0NzYxNzczLCJleHAiOjE1OTQ4NDgxNzN9.6WtTknebgzsB0VKtSBzu8O4Tl8OrJDP2yx-Y7Qnf07A', '2020-07-14 19:22:53', '2020-07-14 19:22:53');

-- --------------------------------------------------------

--
-- Table structure for table `user_menus`
--

CREATE TABLE `user_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_menus`
--

INSERT INTO `user_menus` (`id`, `user_id`, `menu_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2020-03-08 16:11:06', '2020-03-08 16:11:06'),
(2, 1, 2, 1, '2020-03-08 16:11:06', '2020-03-08 16:11:06'),
(3, 1, 3, 1, '2020-03-08 16:11:06', '2020-03-08 16:11:06'),
(4, 1, 4, 1, '2020-03-08 16:11:06', '2020-03-08 16:11:06'),
(5, 1, 5, 1, '2020-03-08 16:11:06', '2020-03-08 16:11:06'),
(6, 1, 6, 1, '2020-03-08 16:11:06', '2020-03-08 16:11:06'),
(7, 1, 7, 1, '2020-03-08 16:11:06', '2020-03-08 16:11:06'),
(8, 1, 8, 1, '2020-03-08 16:11:06', '2020-03-08 16:11:06'),
(9, 1, 9, 1, '2020-03-08 16:11:06', '2020-03-08 16:11:06'),
(10, 1, 10, 1, '2020-03-08 16:11:06', '2020-03-08 16:11:06'),
(11, 1, 11, 1, '2020-03-08 16:11:06', '2020-03-08 16:11:06'),
(12, 1, 12, 1, '2020-03-08 16:11:06', '2020-03-08 16:11:06'),
(13, 1, 13, 1, '2020-03-08 16:11:06', '2020-03-08 16:11:06'),
(14, 1, 14, 1, '2020-03-08 16:11:06', '2020-03-08 16:11:06'),
(15, 1, 15, 1, '2020-03-08 16:11:06', '2020-03-08 16:11:06'),
(16, 1, 16, 1, '2020-03-08 16:11:06', '2020-03-08 16:11:06'),
(17, 1, 17, 1, '2020-03-08 16:11:06', '2020-03-08 16:11:06'),
(18, 1, 18, 1, '2020-03-08 16:11:07', '2020-03-08 16:11:07'),
(19, 1, 19, 1, '2020-03-08 16:11:07', '2020-03-08 16:11:07'),
(20, 1, 20, 1, '2020-03-08 16:11:07', '2020-03-08 16:11:07'),
(21, 1, 21, 1, '2020-03-08 16:11:07', '2020-03-08 16:11:07'),
(22, 1, 22, 1, '2020-03-08 16:11:07', '2020-03-08 16:11:07'),
(23, 1, 23, 1, '2020-03-08 16:11:07', '2020-03-08 16:11:07'),
(24, 1, 24, 1, '2020-03-08 16:11:07', '2020-03-08 16:11:07'),
(25, 1, 25, 1, '2020-03-08 16:11:07', '2020-03-08 16:11:07'),
(26, 1, 26, 1, '2020-03-08 16:11:07', '2020-03-08 16:11:07'),
(27, 1, 27, 1, '2020-03-08 16:11:07', '2020-03-08 16:11:07'),
(28, 1, 28, 1, '2020-03-08 16:11:07', '2020-03-08 16:11:07'),
(29, 1, 29, 1, '2020-03-08 16:11:07', '2020-03-08 16:11:07'),
(30, 1, 30, 1, '2020-03-08 16:11:07', '2020-03-08 16:11:07'),
(31, 1, 31, 1, '2020-03-08 16:11:07', '2020-03-08 16:11:07'),
(32, 1, 32, 1, '2020-03-08 16:11:07', '2020-03-08 16:11:07'),
(33, 1, 33, 1, '2020-03-08 16:11:07', '2020-03-08 16:11:07'),
(34, 1, 34, 1, '2020-03-08 16:11:07', '2020-03-08 16:11:07'),
(35, 1, 35, 1, '2020-03-08 16:11:07', '2020-03-08 16:11:07'),
(36, 1, 36, 1, '2020-03-08 16:11:07', '2020-03-08 16:11:07'),
(37, 1, 37, 1, '2020-03-08 16:11:07', '2020-03-08 16:11:07'),
(38, 1, 38, 1, '2020-03-08 16:11:07', '2020-03-08 16:11:07'),
(39, 1, 39, 1, '2020-03-08 16:11:07', '2020-03-08 16:11:07'),
(40, 1, 40, 1, '2020-03-08 16:11:07', '2020-03-08 16:11:07'),
(41, 1, 41, 1, '2020-03-08 16:11:07', '2020-03-08 16:11:07'),
(42, 1, 42, 1, '2020-03-08 16:11:07', '2020-03-08 16:11:07'),
(43, 1, 43, 1, '2020-03-08 16:11:07', '2020-03-08 16:11:07'),
(44, 1, 44, 1, '2020-03-08 16:11:07', '2020-03-08 16:11:07'),
(45, 1, 45, 1, '2020-03-08 16:11:07', '2020-03-08 16:11:07'),
(46, 1, 46, 1, '2020-03-08 16:11:08', '2020-03-08 16:11:08'),
(47, 1, 47, 1, '2020-03-08 16:11:08', '2020-03-08 16:11:08'),
(48, 1, 48, 1, '2020-03-08 16:11:08', '2020-03-08 16:11:08'),
(49, 1, 49, 1, '2020-03-08 16:11:08', '2020-03-08 16:11:08'),
(50, 1, 50, 1, '2020-03-08 16:11:08', '2020-03-08 16:11:08'),
(51, 1, 51, 1, '2020-03-08 16:11:08', '2020-03-08 16:11:08'),
(52, 1, 52, 1, '2020-03-08 16:11:08', '2020-03-08 16:11:08'),
(53, 1, 53, 1, '2020-03-08 16:11:08', '2020-03-08 16:11:08'),
(54, 1, 54, 1, '2020-03-08 16:11:08', '2020-03-08 16:11:08'),
(55, 1, 55, 1, '2020-03-08 16:11:08', '2020-03-08 16:11:08'),
(56, 1, 56, 1, '2020-03-08 16:11:08', '2020-03-08 16:11:08'),
(57, 1, 57, 1, '2020-03-08 16:11:08', '2020-03-08 16:11:08'),
(58, 1, 58, 1, '2020-03-08 16:11:08', '2020-03-08 16:11:08'),
(59, 1, 59, 1, '2020-03-08 16:11:08', '2020-03-08 16:11:08'),
(60, 1, 60, 1, '2020-03-08 16:11:08', '2020-03-08 16:11:08'),
(61, 1, 61, 1, '2020-03-08 16:11:08', '2020-03-08 16:11:08'),
(62, 1, 62, 1, '2020-03-08 16:11:08', '2020-03-08 16:11:08'),
(63, 1, 63, 1, '2020-03-08 16:11:08', '2020-03-08 16:11:08'),
(64, 1, 64, 1, '2020-03-08 16:11:08', '2020-03-08 16:11:08'),
(65, 1, 65, 1, '2020-03-08 16:11:08', '2020-03-08 16:11:08'),
(66, 1, 66, 1, '2020-03-08 16:11:08', '2020-03-08 16:11:08'),
(67, 1, 67, 1, '2020-03-08 16:11:08', '2020-03-08 16:11:08'),
(68, 1, 68, 1, '2020-03-08 16:11:08', '2020-03-08 16:11:08'),
(69, 1, 69, 1, '2020-03-08 16:11:08', '2020-03-08 16:11:08'),
(70, 1, 70, 1, '2020-03-08 16:11:09', '2020-03-08 16:11:09'),
(71, 1, 71, 1, '2020-03-08 16:11:09', '2020-03-08 16:11:09'),
(72, 1, 72, 1, '2020-03-08 16:11:09', '2020-03-08 16:11:09'),
(73, 1, 73, 1, '2020-03-08 16:11:09', '2020-03-08 16:11:09'),
(74, 1, 74, 1, '2020-03-08 16:11:09', '2020-03-08 16:11:09'),
(75, 1, 75, 1, '2020-03-08 16:11:09', '2020-03-08 16:11:09'),
(76, 2, 1, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(77, 2, 2, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(78, 2, 3, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(79, 2, 4, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(80, 2, 5, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(81, 2, 6, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(82, 2, 7, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(83, 2, 8, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(84, 2, 9, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(85, 2, 10, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(86, 2, 11, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(87, 2, 12, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(88, 2, 13, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(89, 2, 14, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(90, 2, 15, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(91, 2, 16, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(92, 2, 17, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(93, 2, 18, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(94, 2, 19, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(95, 2, 20, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(96, 2, 21, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(97, 2, 22, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(98, 2, 23, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(99, 2, 24, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(100, 2, 25, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(101, 2, 26, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(102, 2, 27, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(103, 2, 28, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(104, 2, 29, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(105, 2, 30, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(106, 2, 31, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(107, 2, 32, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(108, 2, 33, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(109, 2, 34, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(110, 2, 35, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(111, 2, 36, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(112, 2, 37, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(113, 2, 38, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(114, 2, 39, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(115, 2, 40, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(116, 2, 41, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(117, 2, 42, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(118, 2, 43, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(119, 2, 44, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(120, 2, 45, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(121, 2, 46, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(122, 2, 47, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(123, 2, 48, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(124, 2, 49, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(125, 2, 50, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(126, 2, 51, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(127, 2, 52, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(128, 2, 53, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(129, 2, 54, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(130, 2, 55, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(131, 2, 56, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(132, 2, 57, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(133, 2, 58, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(134, 2, 59, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(135, 2, 60, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(136, 2, 61, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(137, 2, 62, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(138, 2, 63, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(139, 2, 64, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(140, 2, 65, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(141, 2, 66, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(142, 2, 67, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(143, 2, 68, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(144, 2, 69, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(145, 2, 70, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(146, 2, 71, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(147, 2, 72, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(148, 2, 73, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(149, 2, 74, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(150, 2, 75, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(151, 3, 1, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(152, 3, 2, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(153, 3, 3, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(154, 3, 4, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(155, 3, 5, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(156, 3, 6, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(157, 3, 7, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(158, 3, 8, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(159, 3, 9, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(160, 3, 10, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(161, 3, 11, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(162, 3, 12, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(163, 3, 13, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(164, 3, 14, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(165, 3, 15, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(166, 3, 16, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(167, 3, 17, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(168, 3, 18, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(169, 3, 19, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(170, 3, 20, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(171, 3, 21, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(172, 3, 22, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(173, 3, 23, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(174, 3, 24, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(175, 3, 25, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(176, 3, 26, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(177, 3, 27, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(178, 3, 28, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(179, 3, 29, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(180, 3, 30, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(181, 3, 31, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(182, 3, 32, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(183, 3, 33, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(184, 3, 34, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(185, 3, 35, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(186, 3, 36, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(187, 3, 37, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(188, 3, 38, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(189, 3, 39, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(190, 3, 40, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(191, 3, 41, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(192, 3, 42, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(193, 3, 43, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(194, 3, 44, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(195, 3, 45, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(196, 3, 46, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(197, 3, 47, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(198, 3, 48, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(199, 3, 49, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(200, 3, 50, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(201, 3, 51, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(202, 3, 52, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(203, 3, 53, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(204, 3, 54, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(205, 3, 55, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(206, 3, 56, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(207, 3, 57, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(208, 3, 58, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(209, 3, 59, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(210, 3, 60, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(211, 3, 61, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(212, 3, 62, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(213, 3, 63, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(214, 3, 64, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(215, 3, 65, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(216, 3, 66, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(217, 3, 67, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(218, 3, 68, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(219, 3, 69, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(220, 3, 70, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(221, 3, 71, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(222, 3, 72, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(223, 3, 73, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(224, 3, 74, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(225, 3, 75, 2, '2020-03-17 17:54:12', '2020-03-17 17:54:12'),
(226, 4, 2, 2, '2020-03-17 19:33:17', '2020-03-17 19:33:17'),
(227, 4, 9, 2, '2020-03-17 19:33:17', '2020-03-17 19:33:17'),
(228, 4, 34, 2, '2020-03-17 19:33:17', '2020-03-17 19:33:17'),
(229, 4, 35, 2, '2020-03-17 19:33:17', '2020-03-17 19:33:17'),
(230, 4, 36, 2, '2020-03-17 19:33:17', '2020-03-17 19:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `user_stores`
--

CREATE TABLE `user_stores` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_stores`
--

INSERT INTO `user_stores` (`id`, `user_id`, `store_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, '2020-03-11 17:25:58', '2020-03-11 17:25:58'),
(2, 4, 1, 2, '2020-03-17 19:33:17', '2020-03-17 19:33:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_slack_unique` (`slack`),
  ADD KEY `category_status_store_id_category_code_index` (`status`,`store_id`,`category_code`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_status_index` (`status`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_slack_unique` (`slack`),
  ADD UNIQUE KEY `customer_apitoken_index` (`api_token`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `customers_email_phone_status_index` (`email`,`phone`,`status`);

--
-- Indexes for table `customers_addresses`
--
ALTER TABLE `customers_addresses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_slack` (`slack`);

--
-- Indexes for table `discount_codes`
--
ALTER TABLE `discount_codes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `discount_codes_slack_unique` (`slack`),
  ADD KEY `discount_codes_status_store_id_discount_code_index` (`status`,`store_id`,`discount_code`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_date_format`
--
ALTER TABLE `master_date_format`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_invoice_print_type`
--
ALTER TABLE `master_invoice_print_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_status`
--
ALTER TABLE `master_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `master_status_key_value_value_constant_status_index` (`key`,`value`,`value_constant`,`status`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_menu_key_unique` (`menu_key`),
  ADD KEY `menus_type_menu_key_parent_status_index` (`type`,`menu_key`,`parent`,`status`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_slack_unique` (`slack`),
  ADD UNIQUE KEY `orders_order_number_unique` (`order_number`),
  ADD KEY `orders_customer_id_store_id_status_index` (`customer_id`,`store_id`,`status`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_products_slack_unique` (`slack`),
  ADD KEY `order_products_order_id_product_id_product_code_status_index` (`order_id`,`product_id`,`product_code`,`status`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_methods_slack_unique` (`slack`),
  ADD KEY `payment_methods_status_index` (`status`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slack_unique` (`slack`),
  ADD KEY `products_status_store_id_product_code_index` (`status`,`store_id`,`product_code`);

--
-- Indexes for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `purchase_orders_slack_unique` (`slack`),
  ADD UNIQUE KEY `purchase_orders_po_number_unique` (`po_number`),
  ADD KEY `purchase_orders_store_id_po_number_supplier_id_status_index` (`store_id`,`po_number`,`supplier_id`,`status`);

--
-- Indexes for table `purchase_order_products`
--
ALTER TABLE `purchase_order_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `purchase_order_products_slack_unique` (`slack`),
  ADD KEY `purchase_order_products_purchase_order_id_status_index` (`purchase_order_id`,`status`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slack_unique` (`slack`),
  ADD UNIQUE KEY `roles_role_code_unique` (`role_code`),
  ADD KEY `roles_status_index` (`status`);

--
-- Indexes for table `role_menus`
--
ALTER TABLE `role_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_menus_role_id_menu_id_index` (`role_id`,`menu_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `setting_app`
--
ALTER TABLE `setting_app`
  ADD KEY `setting_app_company_name_app_date_format_index` (`company_name`(191),`app_date_format`);

--
-- Indexes for table `setting_mail`
--
ALTER TABLE `setting_mail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting_mail_slack_unique` (`slack`),
  ADD KEY `setting_mail_type_status_index` (`type`,`status`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stores_slack_unique` (`slack`),
  ADD UNIQUE KEY `stores_store_code_unique` (`store_code`),
  ADD KEY `stores_status_index` (`status`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliers_slack_unique` (`slack`),
  ADD KEY `suppliers_status_store_id_supplier_code_index` (`status`,`store_id`,`supplier_code`);

--
-- Indexes for table `tax_codes`
--
ALTER TABLE `tax_codes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tax_codes_slack_unique` (`slack`),
  ADD KEY `tax_codes_status_store_id_tax_code_index` (`status`,`store_id`,`tax_code`);

--
-- Indexes for table `tax_code_type`
--
ALTER TABLE `tax_code_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tax_code_type_tax_code_id_index` (`tax_code_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_slack_unique` (`slack`),
  ADD UNIQUE KEY `users_user_code_unique` (`user_code`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_status_index` (`status`);

--
-- Indexes for table `user_access_tokens`
--
ALTER TABLE `user_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `user_menus`
--
ALTER TABLE `user_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_menus_user_id_menu_id_index` (`user_id`,`menu_id`);

--
-- Indexes for table `user_stores`
--
ALTER TABLE `user_stores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_stores_user_id_store_id_index` (`user_id`,`store_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `customers_addresses`
--
ALTER TABLE `customers_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `discount_codes`
--
ALTER TABLE `discount_codes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_date_format`
--
ALTER TABLE `master_date_format`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `master_invoice_print_type`
--
ALTER TABLE `master_invoice_print_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master_status`
--
ALTER TABLE `master_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_order_products`
--
ALTER TABLE `purchase_order_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_menus`
--
ALTER TABLE `role_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `setting_mail`
--
ALTER TABLE `setting_mail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tax_codes`
--
ALTER TABLE `tax_codes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tax_code_type`
--
ALTER TABLE `tax_code_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_access_tokens`
--
ALTER TABLE `user_access_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_menus`
--
ALTER TABLE `user_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT for table `user_stores`
--
ALTER TABLE `user_stores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
