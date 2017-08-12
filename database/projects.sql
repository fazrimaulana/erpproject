-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2017 at 03:34 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projects`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pos_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `company_name`, `country_code`, `address`, `province`, `city`, `pos_code`, `email`, `no_hp`, `created_at`, `updated_at`) VALUES
(1, 'Client 1', 'Maxindo Content Solution', 'ID', '["Rukan Duren Tiga Blok 7K Jl. Duren Tiga Raya No. 7 Jakarta Selatan 12760 ",""]', 'DKI Jakarta', 'Jakarta Selatan', '12760', 'client.1@gmail.com', '089673797344', '2017-01-09 20:49:47', '2017-01-09 21:06:09'),
(2, 'Client 2', 'PT CS Pola Sehat', 'ID', '["Tangerang",""]', 'Jawa Barat', 'Tangerang', '45553', 'client.2@gmail.com', '089673797344', '2017-01-12 21:19:51', '2017-01-12 21:19:51');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`code`, `name`, `created_at`, `updated_at`) VALUES
('AD', 'Andorra', '2017-01-09 20:44:53', '2017-01-09 20:44:53'),
('AE', 'Uni Emirat Arab', '2017-01-09 20:45:01', '2017-01-09 20:45:01'),
('AF', 'Afganistan', '2017-01-09 20:44:53', '2017-01-09 20:44:53'),
('AG', 'Antigua dan Barbuda', '2017-01-09 20:44:53', '2017-01-09 20:44:53'),
('AI', 'Anguilla', '2017-01-09 20:44:53', '2017-01-09 20:44:53'),
('AL', 'Albania', '2017-01-09 20:44:53', '2017-01-09 20:44:53'),
('AM', 'Armenia', '2017-01-09 20:44:53', '2017-01-09 20:44:53'),
('AN', 'Antillen Belanda', '2017-01-09 20:44:53', '2017-01-09 20:44:53'),
('AO', 'Angola', '2017-01-09 20:44:53', '2017-01-09 20:44:53'),
('AQ', 'Antarktika', '2017-01-09 20:44:53', '2017-01-09 20:44:53'),
('AR', 'Argentina', '2017-01-09 20:44:53', '2017-01-09 20:44:53'),
('AS', 'Samoa Amerika', '2017-01-09 20:45:00', '2017-01-09 20:45:00'),
('AT', 'Austria', '2017-01-09 20:44:53', '2017-01-09 20:44:53'),
('AU', 'Australia', '2017-01-09 20:44:53', '2017-01-09 20:44:53'),
('AW', 'Aruba', '2017-01-09 20:44:53', '2017-01-09 20:44:53'),
('AX', 'Aland, Kepulauan', '2017-01-09 20:44:53', '2017-01-09 20:44:53'),
('AZ', 'Azerbaijan', '2017-01-09 20:44:53', '2017-01-09 20:44:53'),
('BA', 'Bosnia dan Herzegovina', '2017-01-09 20:44:54', '2017-01-09 20:44:54'),
('BB', 'Barbados', '2017-01-09 20:44:54', '2017-01-09 20:44:54'),
('BD', 'Bangladesh', '2017-01-09 20:44:53', '2017-01-09 20:44:53'),
('BE', 'Belgia', '2017-01-09 20:44:54', '2017-01-09 20:44:54'),
('BF', 'Burkina Faso', '2017-01-09 20:44:54', '2017-01-09 20:44:54'),
('BG', 'Bulgaria', '2017-01-09 20:44:54', '2017-01-09 20:44:54'),
('BH', 'Bahrain', '2017-01-09 20:44:53', '2017-01-09 20:44:53'),
('BI', 'Burundi', '2017-01-09 20:44:54', '2017-01-09 20:44:54'),
('BJ', 'Benin', '2017-01-09 20:44:54', '2017-01-09 20:44:54'),
('BL', 'Saint-Barthelemy', '2017-01-09 20:44:59', '2017-01-09 20:44:59'),
('BM', 'Bermuda', '2017-01-09 20:44:54', '2017-01-09 20:44:54'),
('BN', 'Brunei', '2017-01-09 20:44:54', '2017-01-09 20:44:54'),
('BO', 'Bolivia', '2017-01-09 20:44:54', '2017-01-09 20:44:54'),
('BR', 'Brazil', '2017-01-09 20:44:54', '2017-01-09 20:44:54'),
('BS', 'Bahamas', '2017-01-09 20:44:53', '2017-01-09 20:44:53'),
('BT', 'Bhutan', '2017-01-09 20:44:54', '2017-01-09 20:44:54'),
('BV', 'Bouvet, Pulau', '2017-01-09 20:44:54', '2017-01-09 20:44:54'),
('BW', 'Botswana', '2017-01-09 20:44:54', '2017-01-09 20:44:54'),
('BY', 'Belarus', '2017-01-09 20:44:54', '2017-01-09 20:44:54'),
('BZ', 'Belize', '2017-01-09 20:44:54', '2017-01-09 20:44:54'),
('CA', 'Kanada', '2017-01-09 20:44:56', '2017-01-09 20:44:56'),
('CC', 'Cocos (Keeling), Kepulauan', '2017-01-09 20:44:54', '2017-01-09 20:44:54'),
('CD', 'Kongo, Republik Demokratik', '2017-01-09 20:44:57', '2017-01-09 20:44:57'),
('CF', 'Afrika Tengah, Republik', '2017-01-09 20:44:53', '2017-01-09 20:44:53'),
('CG', 'Kongo, Republik', '2017-01-09 20:44:57', '2017-01-09 20:44:57'),
('CH', 'Swiss', '2017-01-09 20:45:01', '2017-01-09 20:45:01'),
('CI', 'Pantai Gading', '2017-01-09 20:44:59', '2017-01-09 20:44:59'),
('CK', 'Cook, Kepulauan', '2017-01-09 20:44:54', '2017-01-09 20:44:54'),
('CL', 'Chili', '2017-01-09 20:44:54', '2017-01-09 20:44:54'),
('CM', 'Kamerun', '2017-01-09 20:44:56', '2017-01-09 20:44:56'),
('CN', 'Tiongkok, Republik Rakyat', '2017-01-09 20:45:01', '2017-01-09 20:45:01'),
('CO', 'Kolombia', '2017-01-09 20:44:57', '2017-01-09 20:44:57'),
('CR', 'Kosta Rika', '2017-01-09 20:44:57', '2017-01-09 20:44:57'),
('CU', 'Kuba', '2017-01-09 20:44:57', '2017-01-09 20:44:57'),
('CV', 'Tanjung Verde', '2017-01-09 20:45:01', '2017-01-09 20:45:01'),
('CX', 'Natal, Pulau', '2017-01-09 20:44:58', '2017-01-09 20:44:58'),
('CY', 'Siprus', '2017-01-09 20:45:00', '2017-01-09 20:45:00'),
('CZ', 'Ceko, Republik', '2017-01-09 20:44:54', '2017-01-09 20:44:54'),
('DE', 'Jerman', '2017-01-09 20:44:56', '2017-01-09 20:44:56'),
('DJ', 'Djibouti', '2017-01-09 20:44:55', '2017-01-09 20:44:55'),
('DK', 'Denmark', '2017-01-09 20:44:55', '2017-01-09 20:44:55'),
('DM', 'Dominika', '2017-01-09 20:44:55', '2017-01-09 20:44:55'),
('DO', 'Dominika, Republik', '2017-01-09 20:44:55', '2017-01-09 20:44:55'),
('DZ', 'Aljazair', '2017-01-09 20:44:53', '2017-01-09 20:44:53'),
('EC', 'Ekuador', '2017-01-09 20:44:55', '2017-01-09 20:44:55'),
('EE', 'Estonia', '2017-01-09 20:44:55', '2017-01-09 20:44:55'),
('EG', 'Mesir', '2017-01-09 20:44:58', '2017-01-09 20:44:58'),
('EH', 'Sahara Barat', '2017-01-09 20:44:59', '2017-01-09 20:44:59'),
('ER', 'Eritrea', '2017-01-09 20:44:55', '2017-01-09 20:44:55'),
('ES', 'Spanyol', '2017-01-09 20:45:00', '2017-01-09 20:45:00'),
('ET', 'Ethiopia', '2017-01-09 20:44:55', '2017-01-09 20:44:55'),
('FI', 'Finlandia', '2017-01-09 20:44:55', '2017-01-09 20:44:55'),
('FJ', 'Fiji', '2017-01-09 20:44:55', '2017-01-09 20:44:55'),
('FK', 'Falkland, Kepulauan', '2017-01-09 20:44:55', '2017-01-09 20:44:55'),
('FM', 'Mikronesia, Federasi', '2017-01-09 20:44:58', '2017-01-09 20:44:58'),
('FO', 'Faroe, Kepulauan', '2017-01-09 20:44:55', '2017-01-09 20:44:55'),
('FR', 'Perancis', '2017-01-09 20:44:59', '2017-01-09 20:44:59'),
('GA', 'Gabon', '2017-01-09 20:44:55', '2017-01-09 20:44:55'),
('GB', 'Britania Raya', '2017-01-09 20:44:54', '2017-01-09 20:44:54'),
('GD', 'Grenada', '2017-01-09 20:44:55', '2017-01-09 20:44:55'),
('GE', 'Georgia', '2017-01-09 20:44:55', '2017-01-09 20:44:55'),
('GF', 'Guyana Prancis', '2017-01-09 20:44:56', '2017-01-09 20:44:56'),
('GG', 'Guernsey', '2017-01-09 20:44:55', '2017-01-09 20:44:55'),
('GH', 'Ghana', '2017-01-09 20:44:55', '2017-01-09 20:44:55'),
('GI', 'Gibraltar', '2017-01-09 20:44:55', '2017-01-09 20:44:55'),
('GL', 'Greenland', '2017-01-09 20:44:55', '2017-01-09 20:44:55'),
('GM', 'Gambia', '2017-01-09 20:44:55', '2017-01-09 20:44:55'),
('GN', 'Guinea', '2017-01-09 20:44:55', '2017-01-09 20:44:55'),
('GP', 'Guadeloupe', '2017-01-09 20:44:55', '2017-01-09 20:44:55'),
('GQ', 'Guinea Khatulistiwa', '2017-01-09 20:44:56', '2017-01-09 20:44:56'),
('GR', 'Yunani', '2017-01-09 20:45:02', '2017-01-09 20:45:02'),
('GS', 'Georgia Selatan dan Kepulauan Sandwich Selatan', '2017-01-09 20:44:55', '2017-01-09 20:44:55'),
('GT', 'Guatemala', '2017-01-09 20:44:55', '2017-01-09 20:44:55'),
('GU', 'Guam', '2017-01-09 20:44:55', '2017-01-09 20:44:55'),
('GW', 'Guinea-Bissau', '2017-01-09 20:44:56', '2017-01-09 20:44:56'),
('GY', 'Guyana', '2017-01-09 20:44:56', '2017-01-09 20:44:56'),
('HK', 'Hong Kong', '2017-01-09 20:44:56', '2017-01-09 20:44:56'),
('HM', 'Heard dan Kepulauan McDonald, Pulau', '2017-01-09 20:44:56', '2017-01-09 20:44:56'),
('HN', 'Honduras', '2017-01-09 20:44:56', '2017-01-09 20:44:56'),
('HR', 'Kroasia', '2017-01-09 20:44:57', '2017-01-09 20:44:57'),
('HT', 'Haiti', '2017-01-09 20:44:56', '2017-01-09 20:44:56'),
('HU', 'Hongaria', '2017-01-09 20:44:56', '2017-01-09 20:44:56'),
('ID', 'Indonesia', '2017-01-09 20:44:56', '2017-01-09 20:44:56'),
('IE', 'Irlandia Republik', '2017-01-09 20:44:56', '2017-01-09 20:44:56'),
('IL', 'Israel', '2017-01-09 20:44:56', '2017-01-09 20:44:56'),
('IM', 'Man, Pulau', '2017-01-09 20:44:58', '2017-01-09 20:44:58'),
('IN', 'India', '2017-01-09 20:44:56', '2017-01-09 20:44:56'),
('IO', 'Samudra Hindia Britania, Teritori', '2017-01-09 20:45:00', '2017-01-09 20:45:00'),
('IQ', 'Irak', '2017-01-09 20:44:56', '2017-01-09 20:44:56'),
('IR', 'Iran', '2017-01-09 20:44:56', '2017-01-09 20:44:56'),
('IS', 'Islandia', '2017-01-09 20:44:56', '2017-01-09 20:44:56'),
('IT', 'Italia', '2017-01-09 20:44:56', '2017-01-09 20:44:56'),
('JE', 'Jersey', '2017-01-09 20:44:56', '2017-01-09 20:44:56'),
('JM', 'Jamaika', '2017-01-09 20:44:56', '2017-01-09 20:44:56'),
('JO', 'Yordania', '2017-01-09 20:45:02', '2017-01-09 20:45:02'),
('JP', 'Jepang', '2017-01-09 20:44:56', '2017-01-09 20:44:56'),
('KE', 'Kenya', '2017-01-09 20:44:56', '2017-01-09 20:44:56'),
('KG', 'Kirgizstan', '2017-01-09 20:44:57', '2017-01-09 20:44:57'),
('KH', 'Kamboja', '2017-01-09 20:44:56', '2017-01-09 20:44:56'),
('KI', 'Kiribati', '2017-01-09 20:44:57', '2017-01-09 20:44:57'),
('KM', 'Komoro', '2017-01-09 20:44:57', '2017-01-09 20:44:57'),
('KN', 'Saint Kitts dan Nevis', '2017-01-09 20:45:00', '2017-01-09 20:45:00'),
('KP', 'Korea, Republik Rakyat Demokratik', '2017-01-09 20:44:57', '2017-01-09 20:44:57'),
('KR', 'Korea, Republik', '2017-01-09 20:44:57', '2017-01-09 20:44:57'),
('KW', 'Kuwait', '2017-01-09 20:44:57', '2017-01-09 20:44:57'),
('KY', 'Cayman, Kepulauan', '2017-01-09 20:44:54', '2017-01-09 20:44:54'),
('KZ', 'Kazakhstan', '2017-01-09 20:44:56', '2017-01-09 20:44:56'),
('LA', 'Laos', '2017-01-09 20:44:57', '2017-01-09 20:44:57'),
('LB', 'Lebanon', '2017-01-09 20:44:57', '2017-01-09 20:44:57'),
('LC', 'Saint Lucia', '2017-01-09 20:45:00', '2017-01-09 20:45:00'),
('LI', 'Liechtenstein', '2017-01-09 20:44:57', '2017-01-09 20:44:57'),
('LK', 'Sri Lanka', '2017-01-09 20:45:00', '2017-01-09 20:45:00'),
('LR', 'Liberia', '2017-01-09 20:44:57', '2017-01-09 20:44:57'),
('LS', 'Lesotho', '2017-01-09 20:44:57', '2017-01-09 20:44:57'),
('LT', 'Lituania', '2017-01-09 20:44:57', '2017-01-09 20:44:57'),
('LU', 'Luksemburg', '2017-01-09 20:44:57', '2017-01-09 20:44:57'),
('LV', 'Latvia', '2017-01-09 20:44:57', '2017-01-09 20:44:57'),
('LY', 'Libya', '2017-01-09 20:44:57', '2017-01-09 20:44:57'),
('MA', 'Maroko', '2017-01-09 20:44:58', '2017-01-09 20:44:58'),
('MC', 'Monako', '2017-01-09 20:44:58', '2017-01-09 20:44:58'),
('MD', 'Moldova', '2017-01-09 20:44:58', '2017-01-09 20:44:58'),
('ME', 'Montenegro', '2017-01-09 20:44:58', '2017-01-09 20:44:58'),
('MF', 'Saint Martin (Perancis)', '2017-01-09 20:45:00', '2017-01-09 20:45:00'),
('MG', 'Madagaskar', '2017-01-09 20:44:57', '2017-01-09 20:44:57'),
('MH', 'Marshall, Kepulauan', '2017-01-09 20:44:58', '2017-01-09 20:44:58'),
('MK', 'Makedonia, Republik', '2017-01-09 20:44:57', '2017-01-09 20:44:57'),
('ML', 'Mali', '2017-01-09 20:44:58', '2017-01-09 20:44:58'),
('MM', 'Myanmar', '2017-01-09 20:44:58', '2017-01-09 20:44:58'),
('MN', 'Mongolia', '2017-01-09 20:44:58', '2017-01-09 20:44:58'),
('MO', 'Makau', '2017-01-09 20:44:57', '2017-01-09 20:44:57'),
('MP', 'Mariana Utara, Kepulauan', '2017-01-09 20:44:58', '2017-01-09 20:44:58'),
('MQ', 'Martinik', '2017-01-09 20:44:58', '2017-01-09 20:44:58'),
('MR', 'Mauritania', '2017-01-09 20:44:58', '2017-01-09 20:44:58'),
('MS', 'Montserrat', '2017-01-09 20:44:58', '2017-01-09 20:44:58'),
('MT', 'Malta', '2017-01-09 20:44:58', '2017-01-09 20:44:58'),
('MU', 'Mauritius', '2017-01-09 20:44:58', '2017-01-09 20:44:58'),
('MV', 'Maladewa', '2017-01-09 20:44:57', '2017-01-09 20:44:57'),
('MW', 'Malawi', '2017-01-09 20:44:57', '2017-01-09 20:44:57'),
('MX', 'Meksiko', '2017-01-09 20:44:58', '2017-01-09 20:44:58'),
('MY', 'Malaysia', '2017-01-09 20:44:57', '2017-01-09 20:44:57'),
('MZ', 'Mozambik', '2017-01-09 20:44:58', '2017-01-09 20:44:58'),
('NA', 'Namibia', '2017-01-09 20:44:58', '2017-01-09 20:44:58'),
('NC', 'Kaledonia Baru', '2017-01-09 20:44:56', '2017-01-09 20:44:56'),
('NE', 'Niger', '2017-01-09 20:44:58', '2017-01-09 20:44:58'),
('NF', 'Norfolk, Pulau', '2017-01-09 20:44:59', '2017-01-09 20:44:59'),
('NG', 'Nigeria', '2017-01-09 20:44:58', '2017-01-09 20:44:58'),
('NI', 'Nikaragua', '2017-01-09 20:44:58', '2017-01-09 20:44:58'),
('NL', 'Belanda', '2017-01-09 20:44:54', '2017-01-09 20:44:54'),
('NO', 'Norwegia', '2017-01-09 20:44:59', '2017-01-09 20:44:59'),
('NP', 'Nepal', '2017-01-09 20:44:58', '2017-01-09 20:44:58'),
('NR', 'Nauru', '2017-01-09 20:44:58', '2017-01-09 20:44:58'),
('NU', 'Niue', '2017-01-09 20:44:59', '2017-01-09 20:44:59'),
('NZ', 'Selandia Baru', '2017-01-09 20:45:00', '2017-01-09 20:45:00'),
('OM', 'Oman', '2017-01-09 20:44:59', '2017-01-09 20:44:59'),
('PA', 'Panama', '2017-01-09 20:44:59', '2017-01-09 20:44:59'),
('PE', 'Peru', '2017-01-09 20:44:59', '2017-01-09 20:44:59'),
('PF', 'Polinesia Perancis', '2017-01-09 20:44:59', '2017-01-09 20:44:59'),
('PG', 'Papua Nugini', '2017-01-09 20:44:59', '2017-01-09 20:44:59'),
('PH', 'Filipina', '2017-01-09 20:44:55', '2017-01-09 20:44:55'),
('PK', 'Pakistan', '2017-01-09 20:44:59', '2017-01-09 20:44:59'),
('PL', 'Polandia', '2017-01-09 20:44:59', '2017-01-09 20:44:59'),
('PM', 'Saint Pierre dan Miquelon', '2017-01-09 20:45:00', '2017-01-09 20:45:00'),
('PN', 'Pitcairn, Kepulauan', '2017-01-09 20:44:59', '2017-01-09 20:44:59'),
('PR', 'Puerto Riko', '2017-01-09 20:44:59', '2017-01-09 20:44:59'),
('PS', 'Palestina', '2017-01-09 20:44:59', '2017-01-09 20:44:59'),
('PT', 'Portugal', '2017-01-09 20:44:59', '2017-01-09 20:44:59'),
('PW', 'Pulau', '2017-01-09 20:44:59', '2017-01-09 20:44:59'),
('PY', 'Paraguay', '2017-01-09 20:44:59', '2017-01-09 20:44:59'),
('QA', 'Qatar', '2017-01-09 20:44:59', '2017-01-09 20:44:59'),
('RE', 'Reunion', '2017-01-09 20:44:59', '2017-01-09 20:44:59'),
('RO', 'Rumania', '2017-01-09 20:44:59', '2017-01-09 20:44:59'),
('RS', 'Serbia', '2017-01-09 20:45:00', '2017-01-09 20:45:00'),
('RU', 'Rusia', '2017-01-09 20:44:59', '2017-01-09 20:44:59'),
('RW', 'Rwanda', '2017-01-09 20:44:59', '2017-01-09 20:44:59'),
('SA', 'Arab Saudi', '2017-01-09 20:44:53', '2017-01-09 20:44:53'),
('SB', 'Solomon, Kepulauan', '2017-01-09 20:45:00', '2017-01-09 20:45:00'),
('SC', 'Seychelles', '2017-01-09 20:45:00', '2017-01-09 20:45:00'),
('SD', 'Sudan', '2017-01-09 20:45:00', '2017-01-09 20:45:00'),
('SE', 'Swedia', '2017-01-09 20:45:01', '2017-01-09 20:45:01'),
('SG', 'Singapura', '2017-01-09 20:45:00', '2017-01-09 20:45:00'),
('SH', 'Saint Helena, Ascension, dan Tristan da Cunha', '2017-01-09 20:45:00', '2017-01-09 20:45:00'),
('SI', 'Slovenia', '2017-01-09 20:45:00', '2017-01-09 20:45:00'),
('SJ', 'Svalbard dan Jan Mayen', '2017-01-09 20:45:00', '2017-01-09 20:45:00'),
('SK', 'Slowakia', '2017-01-09 20:45:00', '2017-01-09 20:45:00'),
('SL', 'Sierra Leone', '2017-01-09 20:45:00', '2017-01-09 20:45:00'),
('SM', 'San Marino', '2017-01-09 20:45:00', '2017-01-09 20:45:00'),
('SN', 'Senegal', '2017-01-09 20:45:00', '2017-01-09 20:45:00'),
('SO', 'Somalia', '2017-01-09 20:45:00', '2017-01-09 20:45:00'),
('SR', 'Suriname', '2017-01-09 20:45:00', '2017-01-09 20:45:00'),
('ST', 'Sao Tome dan Principe', '2017-01-09 20:45:00', '2017-01-09 20:45:00'),
('SV', 'El Savador', '2017-01-09 20:44:55', '2017-01-09 20:44:55'),
('SY', 'Suriah', '2017-01-09 20:45:00', '2017-01-09 20:45:00'),
('SZ', 'Swaziland', '2017-01-09 20:45:00', '2017-01-09 20:45:00'),
('TC', 'Turks dan Caicos, Kepulauan', '2017-01-09 20:45:01', '2017-01-09 20:45:01'),
('TD', 'Chad', '2017-01-09 20:44:54', '2017-01-09 20:44:54'),
('TF', 'Perancis Selatan, Teritori', '2017-01-09 20:44:59', '2017-01-09 20:44:59'),
('TG', 'Togo', '2017-01-09 20:45:01', '2017-01-09 20:45:01'),
('TH', 'Thailand', '2017-01-09 20:45:01', '2017-01-09 20:45:01'),
('TJ', 'Tajikistan', '2017-01-09 20:45:01', '2017-01-09 20:45:01'),
('TK', 'Tokelau', '2017-01-09 20:45:01', '2017-01-09 20:45:01'),
('TL', 'Timor Leste', '2017-01-09 20:45:01', '2017-01-09 20:45:01'),
('TM', 'Turkmenistan', '2017-01-09 20:45:01', '2017-01-09 20:45:01'),
('TN', 'Tunisia', '2017-01-09 20:45:01', '2017-01-09 20:45:01'),
('TO', 'Tonga', '2017-01-09 20:45:01', '2017-01-09 20:45:01'),
('TR', 'Turki', '2017-01-09 20:45:01', '2017-01-09 20:45:01'),
('TT', 'Trinidad dan Tobago', '2017-01-09 20:45:01', '2017-01-09 20:45:01'),
('TV', 'Tuvalu', '2017-01-09 20:45:01', '2017-01-09 20:45:01'),
('TW', 'Taiwan', '2017-01-09 20:45:01', '2017-01-09 20:45:01'),
('TZ', 'Tanzania', '2017-01-09 20:45:01', '2017-01-09 20:45:01'),
('UA', 'Ukraina', '2017-01-09 20:45:01', '2017-01-09 20:45:01'),
('UG', 'Uganda', '2017-01-09 20:45:01', '2017-01-09 20:45:01'),
('UM', 'Kepulauan Terluar Kecil Amerika Serikat', '2017-01-09 20:44:58', '2017-01-09 20:44:58'),
('US', 'Amerika Serikat', '2017-01-09 20:44:53', '2017-01-09 20:44:53'),
('UY', 'Uruguay', '2017-01-09 20:45:01', '2017-01-09 20:45:01'),
('UZ', 'Uzbekistan', '2017-01-09 20:45:01', '2017-01-09 20:45:01'),
('VA', 'Vatikan', '2017-01-09 20:45:01', '2017-01-09 20:45:01'),
('VC', 'Saint Vincent dan Grenadines', '2017-01-09 20:45:00', '2017-01-09 20:45:00'),
('VE', 'Venezuela', '2017-01-09 20:45:01', '2017-01-09 20:45:01'),
('VG', 'Virgin Britania Raya, Kepulauan', '2017-01-09 20:45:02', '2017-01-09 20:45:02'),
('VI', 'Virgin Amerika Serikat, Kepulauan', '2017-01-09 20:45:01', '2017-01-09 20:45:01'),
('VN', 'Vietnam', '2017-01-09 20:45:01', '2017-01-09 20:45:01'),
('VU', 'Vanuatu', '2017-01-09 20:45:01', '2017-01-09 20:45:01'),
('WF', 'Wallis dan Futuna', '2017-01-09 20:45:02', '2017-01-09 20:45:02'),
('WS', 'Samoa', '2017-01-09 20:45:00', '2017-01-09 20:45:00'),
('YE', 'Yaman', '2017-01-09 20:45:02', '2017-01-09 20:45:02'),
('YT', 'Mayotte', '2017-01-09 20:44:58', '2017-01-09 20:44:58'),
('ZA', 'Afrika Selatan', '2017-01-09 20:44:53', '2017-01-09 20:44:53'),
('ZM', 'Zambia', '2017-01-09 20:45:02', '2017-01-09 20:45:02'),
('ZW', 'Zimbabwe', '2017-01-09 20:45:02', '2017-01-09 20:45:02');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extension` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mimetype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `name`, `path`, `extension`, `mimetype`, `created_at`, `updated_at`) VALUES
(1, '20170110035344_laravel-web-development', 'files/20170110035344_laravel-web-development.png', 'png', 'image/png', '2017-01-09 20:53:44', '2017-01-09 20:53:44'),
(2, '20170110035411_Reservasi', 'files/20170110035411_Reservasi.xls', 'xls', 'application/vnd.ms-excel', '2017-01-09 20:54:11', '2017-01-09 20:54:11'),
(3, '20170111025239_Capture', 'files/20170111025239_Capture.JPG', 'JPG', 'image/jpeg', '2017-01-10 19:52:39', '2017-01-10 19:52:39'),
(4, '20170117032428_background-orange', 'files/20170117032428_background-orange.jpg', 'jpg', 'image/jpeg', '2017-01-16 20:24:28', '2017-01-16 20:24:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_12_24_032753_create_table_clients', 1),
(4, '2016_12_24_040701_create_table_teams', 1),
(5, '2016_12_24_040714_create_table_countries', 1),
(6, '2016_12_24_042025_create_foreign_key_team_id', 1),
(7, '2016_12_24_042137_create_foreign_key_country_id', 1),
(8, '2016_12_26_123202_create_table_projects', 1),
(9, '2016_12_27_014832_create_table_project_has_team', 1),
(10, '2016_12_27_031313_create_table_tasks', 1),
(11, '2017_01_04_023855_create_table_file', 1),
(12, '2017_01_04_063821_create_table_project_has_file', 1),
(13, '2017_01_04_072217_create_table_task_has_file', 1),
(14, '2017_01_13_070030_create_column_status_table_tasks', 2),
(15, '2017_02_06_035007_update_users_table_add_api_token_field', 3),
(16, '2017_02_06_041447_create_table_users_api', 4),
(17, '2016_06_01_000001_create_oauth_auth_codes_table', 5),
(18, '2016_06_01_000002_create_oauth_access_tokens_table', 5),
(19, '2016_06_01_000003_create_oauth_refresh_tokens_table', 5),
(20, '2016_06_01_000004_create_oauth_clients_table', 5),
(21, '2016_06_01_000005_create_oauth_personal_access_clients_table', 5),
(22, '2017_02_11_105845_create_field_api_token_at_table_users', 6);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'SvCJXD3jNDI31cXAAOLmoQ4yCrGlwmNt5OoKRfZ4', 'http://localhost', 1, 0, 0, '2017-02-05 23:27:55', '2017-02-05 23:27:55'),
(2, NULL, 'Laravel Password Grant Client', '1qyrznaDgLkt5QB8jPdVvrp8b6cwJoIRXmOow12y', 'http://localhost', 0, 1, 0, '2017-02-05 23:27:55', '2017-02-05 23:27:55'),
(3, 1, 'mcs', '2FVEfhMwE5EFDiLIJ3Rf4B8zSckcnt9pJZoSrWjJ', 'http://localhost/auth/callback', 0, 0, 0, '2017-02-06 01:02:00', '2017-02-06 01:02:00'),
(4, NULL, 'Laravel Personal Access Client', '39rk1oZNIVa0srkNlAhWW13FmQTOR9suTrzPk1cs', 'http://localhost', 1, 0, 0, '2017-02-06 01:06:01', '2017-02-06 01:06:01'),
(5, NULL, 'Laravel Password Grant Client', 'O3NEV0SOkhvqZchni6V9jg5NW80xb4Hkqft9lRSu', 'http://localhost', 0, 1, 0, '2017-02-06 01:06:01', '2017-02-06 01:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-02-05 23:27:55', '2017-02-05 23:27:55'),
(2, 4, '2017-02-06 01:06:01', '2017-02-06 01:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `assign_to` int(10) UNSIGNED NOT NULL,
  `start_at` date NOT NULL,
  `end_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `client_id`, `name`, `description`, `assign_to`, `start_at`, `end_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Website', 'Profil Perusahaan dan Fitur Lamaran Pekerjaan', 1, '2017-01-10', '2017-03-10', '2017-01-09 20:51:22', '2017-01-09 20:55:15'),
(2, 2, 'Website Profil Perusahaan', 'Website Umum', 2, '2017-01-13', '2017-04-14', '2017-01-12 21:20:39', '2017-01-12 21:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `project_has_file`
--

CREATE TABLE `project_has_file` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `file_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_has_file`
--

INSERT INTO `project_has_file` (`id`, `project_id`, `file_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_has_team`
--

CREATE TABLE `project_has_team` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_has_team`
--

INSERT INTO `project_has_team` (`id`, `project_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `assign_to` int(10) UNSIGNED NOT NULL,
  `start_at` date NOT NULL,
  `end_at` date NOT NULL,
  `status` enum('open','close') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `project_id`, `name`, `description`, `assign_to`, `start_at`, `end_at`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Membuat Design Website', 'Membuat Design Web', 3, '2017-01-10', '2017-01-20', 'open', '2017-01-09 20:53:44', '2017-01-09 21:03:54'),
(2, 1, 'Membuat Backend', 'Membuat Backend untuk Website', 1, '2017-01-20', '2017-01-31', 'open', '2017-01-09 21:04:56', '2017-01-09 21:04:56'),
(3, 1, 'Rancangan Database', 'Merancang Database', 1, '2017-01-20', '2017-01-27', 'close', '2017-01-12 23:43:31', '2017-01-16 04:14:41');

-- --------------------------------------------------------

--
-- Table structure for table `task_has_file`
--

CREATE TABLE `task_has_file` (
  `id` int(10) UNSIGNED NOT NULL,
  `task_id` int(10) UNSIGNED NOT NULL,
  `file_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `task_has_file`
--

INSERT INTO `task_has_file` (`id`, `task_id`, `file_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 3, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Developer', 'Programmer', NULL, '2017-01-09 20:50:13'),
(2, 'Project Manager', 'Project', '2017-01-09 20:50:27', '2017-01-09 20:50:27'),
(3, 'Web Designer', 'Designer', '2017-01-09 20:50:42', '2017-01-09 20:50:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `team_id` int(10) UNSIGNED NOT NULL,
  `birthday` date DEFAULT NULL,
  `here_date` date DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `api_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `team_id`, `birthday`, `here_date`, `avatar`, `remember_token`, `api_token`, `created_at`, `updated_at`) VALUES
(1, 'Fazri Maulana', 'fm.fazri.m@gmail.com', '$2y$10$M8KhHinxwbKaZPPGtKZtwuoLFT7baAwpIMDqJM1mA9o/ODVbU6h0a', 1, '1994-08-14', '2016-08-03', '', 'IGcHiQW1W7yXXNLjJJXzm0FFBQDm6HxmW7tTewTgQO1V3Ru5V3tRhYp7PU3U', NULL, '2017-01-09 20:40:05', '2017-01-19 02:14:52'),
(2, 'pm1', 'pm1@gmail.com', '$2y$10$OOJ6.HClOSDiG/SYfhdeWerXbfq9Gcp8e4q.Eba3tGRprCIi5fz.y', 2, '2017-01-17', '2017-01-17', '', 'FmbTiguakxxuNEWNg6u02d5r3EJNYcRy4dedzBxvPM6unqD6G6e6tQuP4FpN', NULL, '2017-01-09 20:52:03', '2017-01-17 23:27:59'),
(3, 'wd1', 'wd1@gmail.com', '$2y$10$LMsLKjFF.c95tzxOIVjF9uLLU5Kywq71kIjn2Q/u.7VzBH8S3WX2W', 3, '2017-01-17', '2017-01-17', '', 'kuWMn7YdrKBqnLZMFDDgZntP675YvvCjR3LNs1ZJIcbkktNQBboi5c7Kt1hT', NULL, '2017-01-09 20:52:33', '2017-01-16 21:05:22'),
(4, 'fegy', 'fegy@gmail.com', '$2y$10$qrEUw69kY3z45eicwdp96e.KhD2sIzc9zCjaLWx0yCdtg3fPdSyQa', 1, NULL, NULL, NULL, NULL, NULL, '2017-02-11 03:49:24', '2017-02-11 03:49:24'),
(5, 'Tia', 'tia@gmail.com', '$2y$10$tltVns.Utg42Bx8oe506pOOib7m.CcbvKAieX/fCfgkdWYptRhZCe', 2, NULL, NULL, NULL, NULL, NULL, '2017-02-11 04:41:57', '2017-02-11 04:41:57'),
(6, 'Novie', 'novie@gmail.com', '$2y$10$cj1QKR5STAwSt/L8Y23NiujVwIE/1ewFBfWGqkjzU4qdlZ.DpQHmO', 3, NULL, NULL, NULL, NULL, '$2y$10$5yABsD2lpnHZLMl0Xtus8.k3WVa0pI5yCmR1BzgIydYQSVWqziFJS', '2017-02-11 04:44:42', '2017-02-11 04:44:42'),
(7, 'Susi', 'susi@gmail.com', '$2y$10$IHT9AW4zzzEX6K27ZHrWueRHSQ/6WfgC7ci.WAyrgq5XW2mRGYUa2', 2, NULL, NULL, NULL, NULL, '$2y$10$MMwVsgYSi4zv4UlzDIFpEu3Psp3fjkNvPL7ggnmWi8NaT3IqvPPpK', '2017-02-11 04:54:16', '2017-02-11 04:54:16');

-- --------------------------------------------------------

--
-- Table structure for table `users_api`
--

CREATE TABLE `users_api` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `api_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_api`
--

INSERT INTO `users_api` (`id`, `name`, `email`, `password`, `api_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Fegy', 'fegy@gmail.com', '$2y$10$7cJ4wR.8tirJKUcEXnDIWuZJV10yPw/lfHa4sdRStDqGPy.rOUoPy', '$2y$10$w8Tjxf3loN7Wf0AC.OTfs.dxgwJb0hPqLyDQHzVK0bgrNbhf0cGTC', NULL, '2017-02-05 21:26:31', '2017-02-05 21:26:31'),
(2, 'Tia', 'tia@gmail.com', '$2y$10$vKGI1ToxSJMN3o8zhm3jA.1nYi.QL/3hiobGtP2kGOZA2L/f10Apa', '$2y$10$mkJSeyukoLwarJOGF26tbuOsHY0OUeQaAdSmBQMGOTPcjWOJAZqv.', NULL, '2017-02-05 21:31:19', '2017-02-05 21:31:19'),
(3, 'a', 'a@gmail.com', '$2y$10$kvxiBIVVDVXDP9UW44ftlOvc3Z0OSRHZ0aqfLhyuziiMsWub4rdii', '$2y$10$ZKJqhGFJSNU7HX8QP7pnOuzyoCPG5CPm3rPxilesEFqns0vMxrU5m', NULL, '2017-02-05 21:34:17', '2017-02-05 21:34:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_country_code_foreign` (`country_code`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_client_id_foreign` (`client_id`),
  ADD KEY `projects_assign_to_foreign` (`assign_to`);

--
-- Indexes for table `project_has_file`
--
ALTER TABLE `project_has_file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_has_file_project_id_foreign` (`project_id`),
  ADD KEY `project_has_file_file_id_foreign` (`file_id`);

--
-- Indexes for table `project_has_team`
--
ALTER TABLE `project_has_team`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_has_team_project_id_foreign` (`project_id`),
  ADD KEY `project_has_team_user_id_foreign` (`user_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_project_id_foreign` (`project_id`),
  ADD KEY `tasks_assign_to_foreign` (`assign_to`);

--
-- Indexes for table `task_has_file`
--
ALTER TABLE `task_has_file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_has_file_task_id_foreign` (`task_id`),
  ADD KEY `task_has_file_file_id_foreign` (`file_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_team_id_foreign` (`team_id`);

--
-- Indexes for table `users_api`
--
ALTER TABLE `users_api`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_api_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `project_has_file`
--
ALTER TABLE `project_has_file`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `project_has_team`
--
ALTER TABLE `project_has_team`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `task_has_file`
--
ALTER TABLE `task_has_file`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users_api`
--
ALTER TABLE `users_api`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_country_code_foreign` FOREIGN KEY (`country_code`) REFERENCES `countries` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_assign_to_foreign` FOREIGN KEY (`assign_to`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_has_file`
--
ALTER TABLE `project_has_file`
  ADD CONSTRAINT `project_has_file_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `file` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_has_file_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_has_team`
--
ALTER TABLE `project_has_team`
  ADD CONSTRAINT `project_has_team_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_has_team_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_assign_to_foreign` FOREIGN KEY (`assign_to`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tasks_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `task_has_file`
--
ALTER TABLE `task_has_file`
  ADD CONSTRAINT `task_has_file_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `file` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `task_has_file_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
