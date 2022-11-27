-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 14, 2022 at 10:46 AM
-- Server version: 5.7.23
-- PHP Version: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `20220924_sahakari`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `panel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `panel_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `office_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `latest_status_id` int(11) DEFAULT NULL,
  `latest_status_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loan_demand_amount` text COLLATE utf8mb4_unicode_ci,
  `b_marital_status` text COLLATE utf8mb4_unicode_ci,
  `b_caste_code` text COLLATE utf8mb4_unicode_ci,
  `loan_apply_date_bs` text COLLATE utf8mb4_unicode_ci,
  `loan_apply_date` datetime DEFAULT NULL,
  `citizenship_former_address` text COLLATE utf8mb4_unicode_ci,
  `borrower_name` text COLLATE utf8mb4_unicode_ci,
  `borrower_name_en` text COLLATE utf8mb4_unicode_ci,
  `borrower_gender` text COLLATE utf8mb4_unicode_ci,
  `b_dob` datetime DEFAULT NULL,
  `b_dob_bs` text COLLATE utf8mb4_unicode_ci,
  `b_age` text COLLATE utf8mb4_unicode_ci,
  `b_grand_father_name` text COLLATE utf8mb4_unicode_ci,
  `b_father_name` text COLLATE utf8mb4_unicode_ci,
  `b_mother_name` text COLLATE utf8mb4_unicode_ci,
  `b_spouse_name` text COLLATE utf8mb4_unicode_ci,
  `b_son_name` text COLLATE utf8mb4_unicode_ci,
  `b_daughter_name` text COLLATE utf8mb4_unicode_ci,
  `b_edu_qualification` text COLLATE utf8mb4_unicode_ci,
  `b_occupation` text COLLATE utf8mb4_unicode_ci,
  `b_occupation_location` text COLLATE utf8mb4_unicode_ci,
  `b_p_province` int(11) DEFAULT NULL,
  `b_p_district` int(11) DEFAULT NULL,
  `b_p_localgovt` int(11) DEFAULT NULL,
  `b_p_ward` text COLLATE utf8mb4_unicode_ci,
  `b_p_tole` text COLLATE utf8mb4_unicode_ci,
  `b_t_province` int(11) DEFAULT NULL,
  `b_t_district` int(11) DEFAULT NULL,
  `b_t_localgovt` int(11) DEFAULT NULL,
  `b_t_ward` text COLLATE utf8mb4_unicode_ci,
  `b_t_tole` text COLLATE utf8mb4_unicode_ci,
  `monthly_income` text COLLATE utf8mb4_unicode_ci,
  `monthly_expenses` text COLLATE utf8mb4_unicode_ci,
  `monthly_saving` text COLLATE utf8mb4_unicode_ci,
  `citizenship_number` text COLLATE utf8mb4_unicode_ci,
  `citizenship_issue_date` datetime DEFAULT NULL,
  `citizenship_issue_date_bs` text COLLATE utf8mb4_unicode_ci,
  `citizenship_issue_district` int(11) DEFAULT NULL,
  `contact_number` text COLLATE utf8mb4_unicode_ci,
  `loan_type` text COLLATE utf8mb4_unicode_ci,
  `status` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `application_files`
--

CREATE TABLE `application_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `citizenship_front` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `citizenship_back` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lalpurja` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charkilla` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiro_rasid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rokka_patra` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `land_lander_citizenship_front` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `land_lander_citizenship_back` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blue_book` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route_permit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `muddati_rasid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_registration_card` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `share_certificate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan_certificate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g1_citizenship_front` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g1_citizenship_back` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g1_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g2_citizenship_front` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g2_citizenship_back` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g2_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g3_citizenship_front` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g3_citizenship_back` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g3_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g4_citizenship_front` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g4_citizenship_back` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g4_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `application_statuses`
--

CREATE TABLE `application_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_notifiable` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `collateral_details`
--

CREATE TABLE `collateral_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscription_id` text COLLATE utf8mb4_unicode_ci,
  `subscription_date` datetime DEFAULT NULL,
  `subscription_date_bs` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `darta_chalanis`
--

CREATE TABLE `darta_chalanis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `office_id` int(10) UNSIGNED NOT NULL,
  `record_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `record_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `register_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fiscal_year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registered_at` datetime DEFAULT NULL,
  `subject` longtext COLLATE utf8mb4_unicode_ci,
  `office_or_person` text COLLATE utf8mb4_unicode_ci,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity_person` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` longtext COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `province_id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_np` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `province_id`, `name_en`, `name_np`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bhojpur', 'भोजपुर', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(2, 1, 'Dhankuta', 'धनकुटा', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(3, 1, 'Ilam', 'ईलाम', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(4, 1, 'Jhapa', 'झापा', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(5, 1, 'Khotang', 'खोटाङ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(6, 1, 'Morang', 'मोरङ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(7, 1, 'Okhaldhunga', 'ओखलढुंगा', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(8, 1, 'Panchthar', 'पाँचथर', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(9, 1, 'Sankhuwasabha', 'संखुवासभा', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(10, 1, 'Solukhumbu', 'सोलुखुम्बु', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(11, 1, 'Sunsari', 'सुनसरी', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(12, 1, 'Taplejung', 'ताप्लेजुङ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(13, 1, 'Terhathum', 'तेह्रथुम', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(14, 1, 'Udayapur', 'उदयपुर', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(15, 2, 'Bara', 'बारा', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(16, 2, 'Dhanusa', 'धनुषा', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(17, 2, 'Mahottari', 'महोत्तरी', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(18, 2, 'Parsa', 'पर्सा', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(19, 2, 'Rautahat', 'रौतहट', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(20, 2, 'Saptari', 'सप्तरी', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(21, 2, 'Sarlahi', 'सर्लाही', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(22, 2, 'Siraha', 'सिराहा', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(23, 3, 'Bhaktapur', 'भक्तपुर', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(24, 3, 'Chitwan', 'चितवन', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(25, 3, 'Dhading', 'धादिङ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(26, 3, 'Dholkha', 'दोलखा', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(27, 3, 'Kathmandu', 'काठमाडौं', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(28, 3, 'Kabhrepalanchok', 'काभ्रेपलाञ्चोक', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(29, 3, 'Lalitpur', 'ललितपुर', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(30, 3, 'Makwanpur', 'मकवानपुर', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(31, 3, 'Nuwakot', 'नुवाकोट', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(32, 3, 'Ramechhap', 'रामेछाप', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(33, 3, 'Rasuwa', 'रसुवा', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(34, 3, 'Sindhuli', 'सिन्धुली', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(35, 3, 'Sindhupalchok', 'सिन्धुपाल्चोक', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(36, 4, 'Mustang', 'मुस्ताङ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(37, 4, 'Manang', 'मनाङ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(38, 4, 'Myagdi', 'म्याग्दी', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(39, 4, 'Baglung', 'वाग्लुङ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(40, 4, 'Parbat', 'पर्वत', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(41, 4, 'Syangja', 'स्याङजा', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(42, 4, 'Tanahun', 'तनहुँ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(43, 4, 'Nawalpur', 'नवलपुर', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(44, 4, 'Gorkha', 'गोरखा', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(45, 4, 'Kaski', 'कास्की ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(46, 4, 'Lamjung', 'लमजुङ ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(47, 5, 'Kapilvastu', 'कपिलवस्तु', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(48, 5, 'Parasi', 'परासी', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(49, 5, 'Rupandehi', 'रुपन्देही', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(50, 5, 'Arghakhanchi', 'अर्घाखाँची', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(51, 5, 'Gulmi', 'गुल्मी', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(52, 5, 'Palpa', 'पाल्पा', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(53, 5, 'Dang', 'दाङ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(54, 5, 'Pyuthan', 'प्युठान', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(55, 5, 'Rolpa', 'रोल्पा', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(56, 5, 'Eastern Rukum', 'पूर्वी रूकुम', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(57, 5, 'Bardiya ', 'बर्दिया', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(58, 5, 'Banke', 'बाँके ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(59, 6, 'Dailekh', 'दैलेख', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(60, 6, 'Dolpa', 'डोल्पा', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(61, 6, 'Humla', 'हुम्ला', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(62, 6, 'Jajarkot', 'जाजरकोट', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(63, 6, 'Jumla', 'जुम्ला', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(64, 6, 'Kalikot', 'कालिकोट', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(65, 6, 'Mugu', 'मुगु', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(66, 6, 'Salyan ', 'सल्यान', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(67, 6, 'Surkhet', 'सुर्खेत', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(68, 6, 'Western Rukum', 'रुकुम ( पश्चिम )', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(69, 7, 'Accham', 'अछाम', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(70, 7, 'baitadi', 'बैतडी', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(71, 7, 'bajhang', 'बझाङ', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(72, 7, 'bajura', 'बाजुरा', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(73, 7, 'darchula', 'दार्चुला', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(74, 7, 'doti', 'डोटी', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(75, 7, 'kailali', 'कैलाली', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(76, 7, 'kanchanpur', 'कंचनपुर', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(77, 7, 'dadeldhura', 'डडेलधुरा', '2022-01-21 17:17:27', '2022-01-21 17:17:27');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guarantor_details`
--

CREATE TABLE `guarantor_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guarantor1_name` text COLLATE utf8mb4_unicode_ci,
  `guarantor1_father_name` text COLLATE utf8mb4_unicode_ci,
  `guarantor1_grand_father_name` text COLLATE utf8mb4_unicode_ci,
  `guarantor1_spouse_name` text COLLATE utf8mb4_unicode_ci,
  `guarantor1_relation` text COLLATE utf8mb4_unicode_ci,
  `guarantor1_subscription_id` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loan_details`
--

CREATE TABLE `loan_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_loan_amount` text COLLATE utf8mb4_unicode_ci,
  `total_loan_amount_in_word` text COLLATE utf8mb4_unicode_ci,
  `loan_title` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `local_govts`
--

CREATE TABLE `local_govts` (
  `id` int(10) UNSIGNED NOT NULL,
  `district_id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_np` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `local_govts`
--

INSERT INTO `local_govts` (`id`, `district_id`, `name_en`, `name_np`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bhojpur Municipality', 'भोजपुर नगरपालिका   ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(2, 1, 'Shadanand Municipality', 'षडानन्द नगरपालिका   ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(3, 1, 'Tyamkemaiyum Rural Municipality', 'ट्याम्केमैयुम गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(4, 1, 'Arun Rural Municipality', 'अरुण गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(5, 1, 'Ramprasad Rai Rural Municipality', 'रामप्रसाद राइ गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(6, 1, 'PauwaDungama Rural Municipality', 'पौवादुङमा गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(7, 1, 'Salpasilichho Rural Municipality', 'साल्पासिलिछो गाउँपालिका  ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(8, 1, 'Aamchok Rural Municipality', 'आमचोक गाउँपालिका  ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(9, 1, 'HatuwaGadhi Rural Municipality', 'हतुवागढी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(10, 2, 'Pakhribas Municipality', 'पाख्रीबास नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(11, 2, 'Dhankuta Municipality', 'धनकुटा नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(12, 2, 'Mahalaxmi Municipality', 'महालक्ष्मी नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(13, 2, 'SanguriGadhi Rural Municipality', 'सागुरीगढी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(14, 2, 'Khalsa Chhintang Sahidbhumi Rural Municipality', 'खाल्सा छिन्ताङ सहीदभूमि	गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(15, 2, 'Chhathat Jorpati Rural Municipality', 'छथर जोरपाटी	गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(16, 2, 'Chaubise Rural Municipality', 'चौविसे गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(17, 3, 'Ilam Municipality', 'इलाम नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(18, 3, 'Deumai Municipality', 'देउमाई नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(19, 3, 'Mai Municipality', 'माई नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(20, 3, 'Suryodaya Municipality', 'सूर्योदय नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(21, 3, 'Phakaphokthum Rural Municipality', 'फाकफोकथुम गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(22, 3, 'Chulachuli Rural Municipality', 'चुलाचुली गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(23, 3, 'Mai Jogmai Rural Municipality', 'माईजोगमाई गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(24, 3, 'Mangsebung Rural Municipality', 'माङसेबुङ गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(25, 3, 'Rong Rural Municipality', 'रोङ	गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(26, 3, 'Sandakpur Rural Municipality', 'सन्दकपुर गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(27, 4, 'MechiNagar Municipality', 'मेची नगर नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(28, 4, 'Damak Municipality', 'दमक नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(29, 4, 'Kankai Municipality', 'कन्काई नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(30, 4, 'Bhadrapur Municipality', 'भद्रपुर नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(31, 4, 'Arjundhara Municipality', 'अर्जुनधारा नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(32, 4, 'ShivaSataxi Municipality', 'शिवसताक्षि नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(33, 4, 'Gauradaha Municipality', 'गौरादह नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(34, 4, 'Birtamod Municipality', 'विर्तामोड नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(35, 4, 'Kamal Rural Municipality', 'कमल गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(36, 4, 'Gaurigunj Rural Municipality', 'गौरीगंज गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(37, 4, 'Barhadashi Rural Municipality', 'बाह्रदशी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(38, 4, 'Jhapa Rural Municipality', 'झापा गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(39, 4, 'BuddaShanti Rural Municipality', 'बुद्धशान्ति गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(40, 4, 'Haldibari Rural Municipality', 'हल्दीवारी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(41, 4, 'Kanchankawal Rural Municipality', 'कचनकवल गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(42, 5, 'Halesi Tuwachung Municipality', 'हलेसी तुवाचुङ नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(43, 5, 'Rupakot Majhuwagadhi Municipality', 'रुपाकोट मजुवागढी नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(44, 5, 'Aiselukharka Rural Municipality', 'ऐसेलुखर्क गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(45, 5, 'Rawa Besi Rural Municipality', 'रावा बेसी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(46, 5, 'Jantedhunga Rural Municipality', 'जन्तेढुंगा गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(47, 5, 'Khotehang Rural Municipality', 'खोटेहाङ गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(48, 5, 'Kepilasgadhi Rural Municipality', 'केपिलासगढी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(49, 5, 'Diprung Rural Municipality', 'दिप्रुङ गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(50, 5, 'Sakela Rural Municipality', 'साकेला गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(51, 5, 'Barahpokhari Rural Municipality', 'बराहपोखरी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(52, 6, 'Biratnagar Metrpolitan City', 'विराटनगर महानगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(53, 6, 'Belbari Municipality', 'बेलवारी नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(54, 6, 'Letang Municipality', 'लेटाङ नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(55, 6, 'Pathari-Sanishchare Municiplaity', 'पथरी शनिश्चरे नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(56, 6, 'Rangeli Municipality', 'रंगेली नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(57, 6, 'Ratuwamai Municipality', 'रतुवामाई नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(58, 6, 'Sunbarshi Municiplaity', 'सुनवर्षी नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(59, 6, 'Urlabari Municipality', 'उर्लावारी नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(60, 6, 'SundarHaraincha Municipality', 'सुन्दरहरैंचा नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(61, 6, 'BudhiGanga Rural Municipality', 'बुढीगंगा गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(62, 6, 'Dhanpalthan Rural Municipality', 'धनपालथान गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(63, 6, 'Gramthan Rural Municipality', 'ग्रामथान गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(64, 6, 'Jahada Rural Municipality', 'जहदा गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(65, 6, 'Kanepokhari Rural Municipality', 'कानेपोखरी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(66, 6, 'Katahari Rural Municipality', 'कटहरी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(67, 6, 'Kerabari Rural Municipality', 'केरावारी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(68, 6, 'Miklajung Rural Municipality', 'मिक्लाजुङ गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(69, 7, 'SiddiCharan Municipality', 'सिद्दिचरण नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(70, 7, 'Khiji Demba Rural Municipality', 'खिजिदेम्वा गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(71, 7, 'Champadevi Rural Municipality', 'चम्पादेवी  गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(72, 7, 'ChishankhuGadhi Rural Municipality', 'चिशंखुगढी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(73, 7, 'ManeBhanjyang Rural Municipality', 'मानेभञ्ज्याङ गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(74, 7, 'Molung Rural Municipality', 'मोलुङ गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(75, 7, 'Likhu Rural Municipality', 'लिखु  गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(76, 7, 'Sunkoshi Rural Municipality', 'सुनकोशी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(77, 8, 'Phidim Municipality', 'फिदिम नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(78, 8, 'Phalelung Rural Municipality', 'फालेलुङ गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(79, 8, 'Palgunanda Rural Municipality', 'फाल्गुनन्द गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(80, 8, 'Hilihang Rural Municipality', 'हिलिहाङ गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(81, 8, 'Kummayak Rural Municipality', 'कुम्मायक गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(82, 8, 'Miklajung Rural Municipality', 'मिक्लाजुङ गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(83, 8, 'Tumbewa Rural Municipality', 'तुम्वेवा गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(84, 8, 'Yangbarak Rural Municipality', 'याङवरक गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(85, 9, 'Chainpur Municipality', 'चैनपुर नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(86, 9, 'DharmaDevi Municipality', 'धर्मदेवी नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(87, 9, 'Khadbari Municipality', 'खाँदवारी नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(88, 9, 'Madi Municipality', 'मादी नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(89, 9, 'PanchKhapan Municipality', 'पाँचखपन नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(90, 9, 'Bhot Khola Rural Municipality', 'भोटखोला गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(91, 9, 'Chichila Rural Municipality', 'चिचिला गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(92, 9, 'Makalu Rural Municipality', 'मकालु गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(93, 9, 'Sabhapokhari Rural Municipality', 'सभापोखरी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(94, 9, 'Silingchong Rural Municipality', 'सिलीचोङ गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(95, 10, 'SoluDudhakund Municipality', 'सोलु दुधकुण्ड नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(96, 10, 'Mypa Dudhakoshi Rural Municipality', 'माप्य दुधकोशी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(97, 10, 'Khumbu PasangLhamu Rural Municipality', 'खुम्वु पासाङल्हमु गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(98, 10, 'Dudhakaushika Rural Municipality', 'दुधकौशिका गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(99, 10, 'Necha Salyan Rural Municipality', 'नेचासल्यान गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(100, 10, 'Maha Kulung Rural Municipality', 'महाकुलुङ गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(101, 10, 'Likhu Pike Rural Municipality', 'लिखु पिके गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(102, 10, 'Sotang Rural Municipality', 'सोताङ गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(103, 11, 'Itahari Sub-Metropolitan City', 'ईटहरी उपमहानगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(104, 11, 'Dharan Sub-Metropolitan City', 'धरान उपमहानगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(105, 11, 'Inaruwa Municipality', 'ईनरुवा नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(106, 11, 'Duhabi Municipality', 'दुहवी नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(107, 11, 'Ramdhuni Municipality', 'रामधुनी नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(108, 11, 'Baraha Municipality', 'बराह नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(109, 11, 'Dewangunj Rural Municipality', 'देवानगन्ज गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(110, 11, 'Koshi Rural Municipality', 'कोशी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(111, 11, 'Gadhi Rural Municipality', 'गढी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(112, 11, 'Barju Rural Municipality', 'बर्जु गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(113, 11, 'Bhokraha Rural Municipality', 'भोक्राहा गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(114, 11, 'Harinagara Rural Municipality', 'हरिनगरा गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(115, 12, 'Phungling Municipality', 'फुङलिङ नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(116, 12, 'Aatharai Triveni Rural Municipality', 'आठराई त्रिवेणी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(117, 12, 'Sidingawa Rural Municipality', 'सिदिङ्वा गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(118, 12, 'Phakatanglung Rural Municipality', 'फक्ताङलुङ गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(119, 12, 'Mikwa Khola Rural Municipality', 'मिक्वाखोला गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(120, 12, 'Meringden Rural Municipality', 'मेरिङदेन गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(121, 12, 'Maiwa Khola Rural Municipality', 'मैवाखोला गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(122, 12, 'Yangbarak Rural Municipality', 'याङवरक गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(123, 12, 'Sirijunga Rural Municipality', 'सिरीजङ्घा गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(124, 13, 'Myanglung Municipality', 'म्याङलुङ नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(125, 13, 'Laligurans Municipality', 'लालिगुँरास नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(126, 13, 'Aatharai Rural Municipality', 'आठराई  गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(127, 13, 'Chhathar Rural Municipality', 'छथर गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(128, 13, 'Phedap Rural Municipality', 'फेदाप  गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(129, 13, 'Menchayayem Rural Municipality', 'मेन्छयायेम गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(130, 14, 'Katari Municipality', 'कटारी  नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(131, 14, 'ChaudandiGadhi Municipality', 'चौदण्डीगढी नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(132, 14, 'Triyuga Municipality', 'त्रियुगा नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(133, 14, 'Belaka Municipality', 'वेलका  नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(134, 14, 'Udayapur Gadhi Rural Municipality', 'उदयपुरगढी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(135, 14, 'Tapli Rural Municipality', 'ताप्ली गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(136, 14, 'Rautamai Rural Municipality', 'रौतामाई गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(137, 14, 'Sunkoshi Rural Municipality', 'सुनकोशी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(138, 15, 'Kalaiya Sub-Metrpolitan City', 'कलैया उपमहानगरपालिका   ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(139, 15, 'Jitpur Simara Sub-Metrpolitan City', 'जीतपुरसिमरा उपमहानगरपालिका  ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(140, 15, 'Kolhabi Municipality', 'कोल्हवी नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(141, 15, 'Nijgadh Municipality', 'निजगढ नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(142, 15, 'Maha Gahdimai Municipality', 'महागढीमाई नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(143, 15, 'Simraun Gadh Municipality', 'सिम्रौनगढ नगरपालिका  ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(144, 15, 'Adarsha Kotwa Rural Municipality', 'आदर्श कोटवाल गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(145, 15, 'Karaiya Mai Rural Municipality', 'करैयामाई गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(146, 15, 'Devtaal Rural Municipality', 'देवताल गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(147, 15, 'PachaRouta Rural Municipality', 'पचरौता नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(148, 15, 'Parawanipur Rural Municipality', 'परवानीपुर गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(149, 15, 'Prasouni Rural Municipality', 'प्रसौनी गाउँपालिक', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(150, 15, 'Pheta Rural Municipality', 'फेटा गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(151, 15, 'Bara Gadhi Rural Municipality', 'बारागढी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(152, 15, 'Subarna Rural Municipality', 'सुवर्ण गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(153, 15, 'Bishrampur Rural Municipality', 'विश्रामपुर गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(154, 16, 'Janakpur Sub-Metropolitan City', 'जनकपुर उपमहानगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(155, 16, 'Chhireshwarnath Municipality', 'क्षिरेश्वरनाथ नगरपालिका  ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(156, 16, 'Ganeshman Charnath Municipality', 'गणेशमान चारनाथ नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(157, 16, 'Dhanusadham Municipality', 'धनुषाधाम नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(158, 16, 'Nagaraen Municipality', 'नगराइन नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(159, 16, 'Bideh Municipality', 'विदेह नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(160, 16, 'Mithila   Municipality', 'मिथिला  नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(161, 16, 'Shahid Nagar Municipality', 'शहीदनगर नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(162, 16, 'Sabaila Municipality', 'सबैला नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(163, 16, 'Kamala Siddidatri Rural Municipality', 'कमला नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(164, 16, 'Janak Nandini Rural Municipality', 'जनकनन्दिनी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(165, 16, 'Bateshwor Rural Municipality', 'बटेश्वर गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(166, 16, 'Mithila Bihar Rural Municipality', 'मिथिला बिहारी नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(167, 16, 'Mukhiyapatti Musaharmiya Rural Municipality', 'मुखियापट्टी मुसहरमिया गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(168, 16, 'Laxminiya Rural Municipality', 'लक्ष्मीनिया गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(169, 16, 'Hanspur Rural Municipality', 'हंसपुर नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(170, 16, 'Aaurahi Rural Municipality', 'औरही  गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(171, 16, 'Dhanauji Rural Municipality', 'धनौजी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(172, 17, 'Jaleshwor Municipality', 'जलेश्वर नगरपालिका   ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(173, 17, 'Bardibas Municipality', 'बर्दिबास नगरपालिका  ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(174, 17, 'Gaushala Municipality', 'गौशाला नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(175, 17, 'Ekadara Rural Municipality', 'एकडारा गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(176, 17, 'Sonama Rural Municipality', 'सोनमा गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(177, 17, 'Samsi Rural Municipality', 'साम्सी गाउँपालिका  ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(178, 17, 'Loharpatti Rural Municipality', 'लोहरपट्टी नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(179, 17, 'RamGopalpur Rural Municipality', 'रामगोपालपुर नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(180, 17, 'Mahottari Rural Municipality', 'महोत्तरी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(181, 17, 'ManaraShiswa Municipality', 'मनरा शिसवा नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(182, 17, 'Matihani Municipality', 'मटिहानी नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(183, 17, 'Bhangaha Municipality', 'भँगाहा नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(184, 17, 'Balawa Municipality', 'बलवा नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(185, 17, 'Pipara Rural Municipality', 'पिपरा गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(186, 17, 'Aurahi Municipality', 'औरही नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(187, 18, 'Birgunj Metropolitan', 'बिरगंज महानगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(188, 18, 'Pokhariya Municipality', 'पोखरिया नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(189, 18, 'Jagarnathapur Rural Municipality', 'जगरनाथपुर गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(190, 18, 'Dhobini Rural Municipality', 'धोबीनी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(191, 18, 'Chhipahar Mai Rural Municipality', 'छिपहरमाई गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(192, 18, 'Pakaha Mainpur Rural Municipality', 'पकाहा मैनपुर गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(193, 18, 'Bindabasini Rural Municipality', 'बिन्दबासिनी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(194, 18, 'Bahudar Mai Rural Municipality', 'बहुदरमाई नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(195, 18, 'Parsa Gadhi Municipality', 'पर्सागढी नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(196, 18, 'Sakhuwa Prasouni Rural Municipality', 'सखुवा प्रसौनी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(197, 18, 'Paterwa Sugauli Rural Municipality', 'पटेर्वा सुगौली गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(198, 18, 'Thori  Rural Municipality', 'ठोरी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(199, 18, 'Jirabhawani Rural Municipality', 'जिराभावानी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(200, 18, 'Kalikamai Rural Municipality', 'कालिकामाई गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(201, 19, 'Chandrapur Municipality', 'चन्द्रपुर नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(202, 19, 'Garuda Municipality', 'गरुडा नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(203, 19, 'Gaur Municipality', 'गौर नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(204, 19, 'BoudhiMai Municipality', 'बौधीमाई नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(205, 19, 'Brindaban  Municipality', 'वृन्दावन नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(206, 19, 'Devahi Gonahi  Municipality', 'देवाही गोनाही   नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(207, 19, 'Durga Bhagawat Rural Municipality', 'दुर्गा भगवती गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(208, 19, 'GadhiMai  Municipality', 'गढीमाई नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(209, 19, 'Gujara  Municipality', 'गुजरा नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(210, 19, 'Katahariya  Municipality', 'कटहरिया नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(211, 19, 'Madhav Narayan Municipality', 'माधव नारायण नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(212, 19, 'Moulapur  Municipality', 'मौलापुर नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(213, 19, 'Phatuwa Bijayapur Municipality', 'फतुवा बिजयपुर नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(214, 19, 'Ishanath Municipality', 'ईशनाथ नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(215, 19, 'Paroha Municipality', 'परोहा नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(216, 19, 'Rajpur Municipality', 'राजपुर नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(217, 19, 'Yamunamai Rural Municipality', 'यमुनामाई गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(218, 19, 'Rajdevi Municipality', 'राजदेवी नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(219, 20, 'Rajbiraj Municipality', 'राजविराज नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(220, 20, 'Kanchanrup Municipality', 'कञ्चनरुप नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(221, 20, 'Dakneshwori Municipality', 'डाक्नेश्वरी नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(222, 20, 'BodeBarsain Municipality', 'बोदे बरसाइन नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(223, 20, 'Khadak Municipality', 'खडक नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(224, 20, 'Shambhunath Municipality', 'शम्भुनाथ  नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(225, 20, 'Surunga Municipality', 'सुरुङ्गा नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(226, 20, 'HanumanNagar Kankalini Municipality', 'हनुमाननगर कङ्कालिनी नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(227, 20, 'Agnisaira Krishna Sawaran Rural Municipality', 'अग्नीसाइर कृष्णासवरन गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(228, 20, 'Chhinnamasta Rural Municipality', 'छिन्नमस्ता गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(229, 20, 'Mahadeva Rural Municipality', 'महादेवा गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(230, 20, 'Saptkoshi Rural Municipality', 'सप्तकोशी नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(231, 20, 'Tirhut Rural Municipality', 'तिरहुत गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(232, 20, 'Tilathi Koiladi Rural Municipality', 'तिलाठी कोईलाडी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(233, 20, 'Rupani Rural Municipality', 'रुपनी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(234, 20, 'Belhi Chapani Rural Municipality', 'बेल्ही चपेना गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(235, 20, 'Bishnupura Rural Municipality', 'विष्णुपुर गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(236, 20, 'Balan-Bihul Rural Development', 'बलान-विहुल  गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(237, 21, 'Ishworpur Municipality', 'ईश्वरपुर नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(238, 21, 'Malangawa Municipality', 'मलंगवा नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(239, 21, 'Lalbandi Municipality', 'लालबन्दी नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(240, 21, 'Haripur Municipality', 'हरिपुर नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(241, 21, 'Haripurwa Municipality', 'हरिपुर्वा नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(242, 21, 'Hariwan Municipality', 'हरिवन नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(243, 21, 'Barahathawa Municipality', 'बरहथवा नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(244, 21, 'Balara Municipality', 'बलरा नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(245, 21, 'Godaita Municipality', 'गोडैटा  नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(246, 21, 'Bagamati Municipality', 'बागमती नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(247, 21, 'Kabilasi Rural Municipality', 'कविलासी नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(248, 21, 'Chakraghatta Rural Municipality', 'चक्रघट्टा  गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(249, 21, 'Chandra Nagar Rural Municipality', 'चन्द्रनगर गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(250, 21, 'DhanaKoul Rural Municipality', 'धनकौल गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(251, 21, 'Bramhapuri Rural Municipality', 'ब्रह्मपुरी  गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(252, 21, 'Ram Nagar Rural Municipality', 'रामनगर गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(253, 21, 'Bishnu Rural Municipality', 'विष्णु गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(254, 21, 'Parsa', 'पर्सा', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(255, 21, 'Kaudena', 'कौडेना', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(256, 21, 'Basbariya', 'वासवारिया', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(257, 22, 'Lahan Municipality', 'लहान नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(258, 22, 'DhanagadhiMai Municipality', 'धनगढीमाई नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(259, 22, 'Siraha Municipality', 'सिराहा नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(260, 22, 'GolBazaar Municipality', 'गोलबजार नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(261, 22, 'Mirchaiya Municipality', 'मिर्चैया नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(262, 22, 'Kalyanpur Municipality', 'कल्याणपुर नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(263, 22, 'Bhagawanpur Rural Municipality', 'भगवानपुर गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(264, 22, 'Aaurahi Rural Municipality', 'औरही गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(265, 22, 'Bishnupur Rural Municipality', 'विष्णुपुर गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(266, 22, 'Sukhipur Rural Municipality', 'सुखीपुर नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(267, 22, 'Karjanha Rural Municipality', 'कर्जन्हा नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(268, 22, 'Bariyarpatti Rural Municipality', 'बरियारपट्टी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(269, 22, 'Laxmipur Patari Rural Municipality', 'लक्ष्मीपुर पतारी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(270, 22, 'Naraha Rural Municipality', 'नरहा गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(271, 22, 'Sakhuwanankarkatti Rural Municipality', 'सखुवानान्कारकट्टी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(272, 22, 'Arnama Rural Municipality', 'अर्नमा गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(273, 22, 'Nawarajpur Rural Municipality', 'नवराजपुर गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(274, 23, 'Changunarayan Municipality', 'चाँगुनारायण नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(275, 23, 'Bhaktapur Municipality', 'भक्तपुर नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(276, 23, 'Madhyapur Thimi Municipality', 'मध्यपुर थिमी नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(277, 23, 'Surya Binayak Municipality', 'सूर्यविनायक नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(278, 24, 'Bharatpur Metropolitan City', 'भरतपुर महानगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(279, 24, 'Kalika Municipality', 'कालिका नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(280, 24, 'Khairhani Municipality', 'खैरहनी नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(281, 24, 'Ichchhakamana Rural Municipality', 'इच्छाकामना गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(282, 24, 'Madi Municipality', 'माडी नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(283, 24, 'Ratna Nagar Municipality', 'रत्ननगर नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(284, 24, 'Rapti Municipality', 'राप्ती नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(285, 25, 'Dhunibesi Municipality', 'धुनीबेंशी नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(286, 25, 'Nilkantha Municipality', 'निलकण्ठ नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(287, 25, 'Khaniyabas Rural Municipality', 'खनियाबास गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(288, 25, 'Gajuri Rural Municipality', 'गजुरी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(289, 25, 'Galchhi Rural Municipality', 'गल्छी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(290, 25, 'Ganga Jamuna Rural Municipality', 'गङ्गाजमुना गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(291, 25, 'Jwalamukhi Rural Municipality', 'ज्वालामूखी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(292, 25, 'Thakre Rural Municipality', 'थाक्रे गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(293, 25, 'Netrawati Rural Municipality', 'नेत्रावती गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(294, 25, 'Benighat Rorang Rural Municipality', 'बेनीघाट रोराङ्ग गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(295, 25, 'Rubi Valley Rural Municipality', 'रुवी भ्याली गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(296, 25, 'Sidda Lekh Rural Municipality', 'सिद्धलेक गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(297, 25, 'Tripura Sundari Rural Municipality', 'त्रिपुरासुन्दरी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(298, 26, 'Jiri Municipality', 'जिरी  नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(299, 26, 'Bhithwor Rural Muncipality', 'वैतेश्वर  गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(300, 26, 'Kalinchok Rural Municipality', 'कालिन्चोक  गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(301, 26, 'Gauri Shankar Rural Municipality', 'गौरिशंकर  गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(302, 26, 'Tamakoshi Rural Municipality', 'तामाकोशी  गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(303, 26, 'Melung Rural Municipality', 'मेलुङ  गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(304, 26, 'Bigu Rural Municipality', 'विगु गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(305, 26, 'Shailung Rural Municipality', 'शैलुङ  गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(306, 26, 'Bhimeshwor Municipality', 'भिमेश्वर नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(307, 27, 'Kathmandu Metropolitan City', 'काठमाण्डौ महानगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(308, 27, 'Kageswori-Manohara Municipality', 'कागेश्वरी मनोहरा नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(309, 27, 'Kirtipur Municipality', 'किर्तिपुर नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(310, 27, 'Gokarneshwor Municipality', 'गोकर्णेश्वर नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(311, 27, 'Chandragiri Municipality', 'चन्द्रागिरी नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(312, 27, 'Tokha Municipality', 'टोखा नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(313, 27, 'Tarkeshwor Municiplaity', 'तारकेश्वर नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(314, 27, 'Daxinkali Municipality', 'दक्षिणकाली नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(315, 27, 'Nagarjun Municipality', 'नागार्जुन नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(316, 27, 'Budhanialkantha Municipality', 'बुढानिलकण्ठ नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(317, 27, 'Sankharapur Municipality', 'शङ्खरापुर नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(318, 28, 'Dhulikhel Municipality', 'धुलिखेल नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(319, 28, 'Banepa Municipality', 'बनेपा नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(320, 28, 'Panauti Municipality', 'पनौती नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(321, 28, 'Panchkhal Municipality', 'पाँचखाल नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(322, 28, 'Namobuddha Municipality', 'नमोबुद्ध नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(323, 28, 'Mandan Deupur Municipality', 'मण्डनदेउपुर नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(324, 28, 'Khanikhola Rural Municipality', 'खानीखोला गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(325, 28, 'Chaunri Deurali Rural Municipality', 'चौंरीदेउराली गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(326, 28, 'Temal Rural Municipality', 'तेमाल गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(327, 28, 'Bethanchok Rural Municipality', 'बेथानचोक गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(328, 28, 'Bhumlu Rural Municipality', 'भुम्लु गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(329, 28, 'Mahabharat Rural Municipality', 'महाभारत गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(330, 28, 'Roshi Rural Municipality', 'रोशी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(331, 29, 'Lalitpur Metropolitan City', 'ललितपुर महानगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(332, 29, 'Godawari Municipality', 'गोदावरी नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(333, 29, 'MahaLaxmi Municipality', 'महालक्ष्मी नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(334, 29, 'Konjyosom Rural Municipality', 'कोन्ज्योसोम गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(335, 29, 'Bagmati Rural Municipality', 'बाग्मती गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(336, 29, 'Mahankal Rural Municipality', 'महाङ्काल गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(337, 30, 'Hetauda Sub-Metropolitan City', 'हेटौडा उपमहानगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(338, 30, 'Thaha Municipality', 'थाहा नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(339, 30, 'Indra Sarobar Rural Municipality', 'ईन्द्र सरोवर गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(340, 30, 'Kailash Rural Municipality', 'कैलाश गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(341, 30, 'Bakaiya Rural Municipality', 'बकैया गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(342, 30, 'Bagmati Rural Municipality', 'बाग्मती गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(343, 30, 'Bhimphedi Rural Municipality', 'भीमफेदी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(344, 30, 'Makawanpur Gadhi Rural Municipality', 'मकवानपुरगढी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(345, 30, 'Manahari Rural Municipality', 'मनहरी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(346, 30, 'Raksirang Rural Municipality', 'राक्सिराङ्ग गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(347, 31, 'Bidur Municipality', 'विदुर नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(348, 31, 'Belkot Gadhi Municipality', 'बेलकोटगढी नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(349, 31, 'Kakani Rural Municipality', 'ककनी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(350, 31, 'Kispang Rural Municipality', 'किस्पाङ गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(351, 31, 'Tadi Rural Municipality', 'तादी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(352, 31, 'Tarkeshwor Rural Municipality', 'तारकेश्वर गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(353, 31, 'Dupcheshwor Rural Municipality', 'दुप्चेश्वर गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(354, 31, 'PanchaKanya Rural Municipality', 'पञ्चकन्या गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(355, 31, 'Likhu Rural Municipality', 'लिखु गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(356, 31, 'Meghang Rural Municipality', 'मेघाङ गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(357, 31, 'Shivpuri Rural Municipality', 'शिवपुरी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(358, 31, 'Surya Gadhi Rural Municipality', 'सुर्यगढी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(359, 32, 'Manthali Municipality', 'मन्थली नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(360, 32, 'Ramechhap Municipality', 'रामेछाप नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(361, 32, 'Umakunda Rural Municipality', 'उमाकुण्ड गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(362, 32, 'KhandaDevi Rural Municipality', 'खाँडादेवी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(363, 32, 'Gokul Ganga Rural Municipality', 'गोकुलगङ्गा गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(364, 32, 'Doramba Rural Municipality', 'दोरम्बा गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(365, 32, 'Likhu Rural Municipality', 'लिखु गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(366, 32, 'Sunapati Rural Municipality', 'सुनापती गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(367, 33, 'Uttar Gaya Rural Municipality', 'उत्तरगया गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(368, 33, 'Kalika Rural Municipality', 'कालिका गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(369, 33, 'GosaiKunda Rural Municipality', 'गोसाईकुण्ड गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(370, 33, 'NauKunda Rural Municipality', 'नौकुण्ड गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(371, 33, 'Aamachodingmo Rural Municipality', 'आमाछोदिङमो गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(372, 34, 'Kamalamai Municipality', 'कमलामाई नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(373, 34, 'Dudhauli Municipality', 'दुधौली नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(374, 34, 'Golanjor Rural Municipality', 'गोलन्जोर गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(375, 34, 'Ghyanglekh Rural Municipality', 'घ्याङलेख गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(376, 34, 'Teen Patan Rural Municipality', 'तिनपाटन गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(377, 34, 'Phikkal Rural Municipality', 'फिक्कल गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(378, 34, 'Marin Rural Municipality', 'मरिण गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(379, 34, 'Sunkoshi Rural Municipality', 'सुनकोशी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(380, 34, 'Hariharpur Gadhi Rural Municipality', 'हरिहरपुरगढी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(381, 35, 'Chautara Sangachokgadhi Municipality', 'चौतारा साँगाचोकगढी नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(382, 35, 'Barhabise Municipality', 'वाह्रविसे नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(383, 35, 'Melamchi Municipality', 'मेलम्ची नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(384, 35, 'Indrawati Rural Municipality', 'र्इन्द्रावती गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(385, 35, 'Jugal Rural Municipality', 'जुगल गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(386, 35, 'PanchaPokhari Rural Municipality', 'पाँचपोखरी थाङपाल  गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(387, 35, 'Balephi Rural Municipality', 'बलेफी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(388, 35, 'Bhotekoshi Rural Municipality', 'भोटेकोशी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(389, 35, 'Lishankhu Pakhar Rural Municipality', 'लिसंखु पाखर गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(390, 35, 'Sunkoshi Rural Municipality', 'सुनकोशी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(391, 35, 'Helambu Rural Municipality', 'हेलम्बु  गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(392, 35, 'TripuraSundari Rural Municipality', 'त्रिपुरासुन्दरी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(393, 36, 'Gharapjhong Gaunpalika', 'घरपझोङ गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(394, 36, 'Thangsang Gaunpalika', 'थासाङ गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(395, 36, 'Dalome Gaunpalika', 'दालोमे गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(396, 36, 'Lomanthang Gaunpalika', 'लोमन्थाङ गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(397, 36, 'Barhagau Muktichhetra Gaunpalika', 'वाह्रगाउँ मुक्तिक्षेत्र  गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(398, 37, 'Chame Gaunpalika', 'चामे गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(399, 37, 'Narphu Gaunpalika', 'नारफू गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(400, 37, 'Nasong Gaunpalika', 'नाशोङ  गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(401, 37, 'Nesyang Gaunpalika', 'नेस्याङ गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(402, 38, 'Beni Nagarpalika', 'बेनी नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(403, 38, 'Annapurna Gaunpalika', 'अन्नपूर्ण  गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(404, 38, 'Dhawalagiri Gaunpalika', 'धवलागिरी   गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(405, 38, 'Mangala Gaunpalika', 'मंगला गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(406, 38, 'Malika Gaunpalika', 'मालिका  गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(407, 38, 'Raghuganga Gaunpalika', 'रघुगंगा   गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(408, 39, 'Baglung Nagarpalika', 'बागलुङ नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(409, 39, 'Galkot Nagarpalika', 'गल्कोट नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(410, 39, 'Jaimuni Nagarpalika', 'जैमूनी नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(411, 39, 'Dhorpatan Nagarpalika', 'ढोरपाटन नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(412, 39, 'Bareng Gaunpalika', 'वरेङ गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(413, 39, 'Katheykhola Gaunpalika', 'काठेखोला गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(414, 39, 'Tamankhola Gaunpalika', 'तमानखोला गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(415, 39, 'Tarakhola Gaunpalika', 'ताराखोला गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(416, 39, 'Nisikhola Gaunpalika', 'निसीखोला गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(417, 39, 'Badigad Gaunpalika', 'वडिगाड गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(418, 40, 'Kusma Nagarpalika', 'कुश्मा नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(419, 40, 'Phalewas Nagarpalika', 'फलेवास नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(420, 40, 'Jaljala Gaunalika', 'जलजला गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(421, 40, 'Paiyun Gaunpalika', 'पैयूं गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(422, 40, 'Mahashila Gaunpalika', 'महाशिला गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(423, 40, 'Modi Gaunpalika', 'मोदी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(424, 40, 'Bihadi Gaunpalika', 'विहादी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(425, 41, 'Galyang  Nagarpalika', 'गल्याङ नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(426, 41, 'Chapakot Nagarpalika', 'चापाकोट नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(427, 41, 'Putalibazar Nagarpalika', 'पुतलीबजार नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(428, 41, 'Bheerkot Nagarpalika', 'भीरकोट नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(429, 41, 'Waling Nagarpalika', 'वालिङ नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(430, 41, 'Arjun Chaupari Gaunpalika', 'अर्जुनचौपारी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(431, 41, 'Aandhikhola Gaunpalika', 'आँधिखोला गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(432, 41, 'Kaligandaki Gaunpalika', 'कालीगण्डकी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(433, 41, 'Phedikhola Gaunpalika', 'फेदीखोला गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(434, 41, 'Harinas Gaunpalika', 'हरिनास गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(435, 41, 'Biruwa Gaunpalika', 'बिरुवा गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(436, 42, 'Bhanu Nagarpalika', 'भानु नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(437, 42, 'Bhimad Nagarpalika', 'भिमाद नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(438, 42, 'Vyas Nagarpalika', 'व्यास नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(439, 42, 'Shuklagandaki Nagarpalika', 'शुक्लागण्डकी नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(440, 42, 'Anbu Khaireni Gaunpalika', 'आँबुखैरेनी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(441, 42, 'Rhishing Gaunpalika', 'ऋषिङ्ग गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(442, 42, 'Ghiring Gaunpalika', 'घिरिङ गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(443, 42, 'Myagde Gaunpalika', 'म्याग्दे गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(444, 42, 'Devghat Gaunpalika', 'देवघाट गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(445, 42, 'Bandipur Gaunpalika', 'वन्दिपुर गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(446, 43, 'Kawasati Nagarpalika', 'कावासोती नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(447, 43, 'Gaindakot Nagarpalika', 'गैडाकोट नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(448, 43, 'Devachuli Nagarpalika', 'देवचुली नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(449, 43, 'Madhyabindu Nagarpalika', 'मध्यविन्दु नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(450, 43, 'Bungdikali Gaunpalika', 'बुङ्दीकाली गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(451, 43, 'Bulingtar Gaunpalika', 'बुलिङटार गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(452, 43, 'Binayi Tribeni Gaunpalika', 'विनयी त्रिवेणी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(453, 43, 'Hupsekot Gaunpalika', 'हुप्सेकोट गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(454, 44, 'Gorkha Nagarpalika', 'गोरखा नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(455, 44, 'Palungtar Nagarpalika', 'पालुङटार नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(456, 44, 'Sulikot Gaunpalika', 'सुलीकोट गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(457, 44, 'Siranchowk Gaunpalika', 'सिरानचोक गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(458, 44, 'Ajirkot Gaunpalika', 'अजिरकोट गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(459, 44, 'Aarughat Gaunpalika', 'आरूघाट गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(460, 44, 'Gandaki Gaunpalika', 'गण्डकी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(461, 44, 'Chumnubri Gaunpalika', 'चुमनुव्री गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(462, 44, 'Gharche Gaunpalika', 'धार्चे गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(463, 44, 'Bhimsen Gaunpalika', 'भिमसेन गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(464, 44, 'Shahid Lakhan Gaunpalika', 'शहिद लखन गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(465, 45, 'Pokhara Mahanagarpalika', 'पोखरा महानगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(466, 45, 'Annapurna Gaunpalika', 'अन्नपूर्ण गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(467, 45, 'Machapuchre Gaunpalika', 'माछापुच्छ्रे गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(468, 45, 'Madi Gaunpalika', 'मादी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(469, 45, 'Rupa Gaunpalika', 'रूपा गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26');
INSERT INTO `local_govts` (`id`, `district_id`, `name_en`, `name_np`, `created_at`, `updated_at`) VALUES
(470, 46, 'Besisahar Nagarpalika', 'बेसीशहर नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(471, 46, 'Madhya Nepal Nagarpalika', 'मध्यनेपाल नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(472, 46, 'Rainas Nagarpalika', 'रार्इनास नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(473, 46, 'Sundarbajar Nagarpalika', 'सुन्दरबजार नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(474, 46, 'Kohlasothar Gaunpalika', 'क्व्होलासोथार गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(475, 46, 'Dudhpokhari Gaunpalika', 'दूधपोखरी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(476, 46, 'Dordi Gaunpalika', 'दोर्दी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(477, 46, 'Marsyangdi Gaunpalika', 'मर्स्याङदी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(478, 47, 'Kapilbastu Municipality', 'कपिलवस्तु नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(479, 47, 'Buddabhumi Municipality', 'बुद्धभूमी नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(480, 47, 'Shivaraj Municipality', 'शिवराज नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(481, 47, 'Maharajganj Municipality', 'महाराजगंज नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(482, 47, 'Krishna Nagar Municipality', 'कृष्णनगर नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(483, 47, 'Banganga Municipality', 'बाणगंगा नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(484, 47, 'Mayadevi Rural Municipality', 'मायादेवी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(485, 47, 'Yashodhara Rural Municipality', 'यसोधरा गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(486, 47, 'Suddodhana Rural Municipality', 'शुद्धोधन गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(487, 47, 'Bijay Nagar Rural Municipality', 'विजयनगर गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(488, 48, 'Bardaghat Municipality', 'बर्दघाट नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(489, 48, 'Ramgram Municipality', 'रामग्राम नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(490, 48, 'Sunwal Municipality', 'सुनवल नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(491, 48, 'Susta Rural Municipality', 'सुस्ता गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(492, 48, 'Palhi Nandan Rural Municipality', 'पाल्हीनन्दन गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(493, 48, 'Pratappur Rural Municipality', 'प्रतापपुर गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(494, 48, 'Sarawal Rural Municipality', 'सरावल गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(495, 49, 'Butwal Sub-Metropolitan City', 'बुटवल उपमहानगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(496, 49, 'Devdaha Municipality', 'देवदह नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(497, 49, 'Lumbini Sanskritik Municipality', 'लुम्बिनी सांस्कृतिक नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(498, 49, 'Siddharthanagar Municipality', 'सिद्धार्थनगर नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(499, 49, 'Saina Maina Municipality', 'सैनामैना नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(500, 49, 'Tilottama Municipality', 'तिलोत्तमा नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(501, 49, 'Gaidahawa Rural Municipality', 'गैडहवा गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(502, 49, 'Kanchan Rural Municipality', 'कंचन गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(503, 49, 'Kotahi Mai Rural Municipality', 'कोटहीमाई गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(504, 49, 'Marchawari Rural Municipality', 'मर्चवारी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(505, 49, 'Mayadevi Rural Municipality', 'मायादेवी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(506, 49, 'Om Satiya Rural Municipality', 'ओमसतिया गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(507, 49, 'Rohini Rural Municipality', 'रोहिणी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(508, 49, 'Sammari Mai Rural Municipality', 'सम्मरीमाई गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(509, 49, 'Siyari Rural Municipality', 'सियारी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(510, 49, 'Suddodhana Rural Municipality', 'शुद्धोधन गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(511, 50, 'Sandhikharka Municipality', 'सन्धिखर्क नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(512, 50, 'Shit Ganga Municipality', 'सितगंगा नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(513, 50, 'Bhumikasthan Municipality', 'भूमिकास्थान नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(514, 50, 'Chhatra Dev Rural Municipality', 'छत्रदेव गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(515, 50, 'Panini Rural Municipality', 'पाणिनी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(516, 50, 'Malarani Rural Municipality', 'मालारानी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(517, 51, 'Chandrakot Rural Municipality', 'चन्द्रकोट गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(518, 51, 'Resunga Municipality', 'रेसुङ्गा नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(519, 51, 'Kali Gandaki Rural Municipality', 'कालीगण्डकी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(520, 51, 'Ruru Rural Municipality', 'रुरु गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(521, 51, 'Gulmi Durbar Rural Municipality', 'गुल्मीदरवार गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(522, 51, 'Isma Rural Municipality', 'ईस्मा गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(523, 51, 'Musikot  Municipality', 'मुसिकोट नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(524, 51, 'Madane Rural Municipality', 'मदाने गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(525, 51, 'ChhatrakotRural Rural Municipality', 'छत्रकोट गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(526, 51, 'Dhurkot Rural Municipality', 'धुर्कोट गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(527, 51, 'Malika Rural Municipality', 'मालिका गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(528, 51, 'Satyawati Rural Municipality', 'सत्यवती गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(529, 52, 'Rampur Municipality', 'रामपुर नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(530, 52, 'Tansen Municipality', 'तानसेन नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(531, 52, 'Nisdi Rural Municipality', 'निस्दी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(532, 52, 'Purba Khola Rural Municipality', 'पूर्वखोला गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(533, 52, 'Rambha Rural Municipality', 'रम्भा गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(534, 52, 'Matha Gadhi Rural Municipality', 'माथागढी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(535, 52, 'Tinau Rural Municipality', 'तिनाउ गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(536, 52, 'Bagnaskali Rural Municipality', 'बगनासकाली गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(537, 52, 'Ribdikot Rural Municipality', 'रिब्दिकोट गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(538, 52, 'Raina Devi Chhahara Rural Municipality', 'रैनादेवी छहरा गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(539, 53, 'Tulsipur Sub-Metropolitan City', 'तुल्सिपुर उपमहानगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(540, 53, 'Ghorahi Sub-Metropolitan City', 'घोराही उपमहानगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(541, 53, 'Lamahi Municipality', 'लमही नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(542, 53, 'Banglachuli Rural Municipality', 'बंगलाचुली गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(543, 53, 'Dangi Sharan Rural Municipality', 'दंगीशरण गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(544, 53, 'Gadhawa Rural Municipality', 'गढवा गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(545, 53, 'Rajpur Rural Municipality', 'राजपुर गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(546, 53, 'Rapti Rural Municipality', 'राप्ती गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(547, 53, 'Shanti Nagar Rural Municipality', 'शान्तिनगर गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(548, 53, 'Babai Rural Municipality', 'बबई गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(549, 54, 'Pyuthan Municipality', 'प्यूठान नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(550, 54, 'Swargadwari Municipality', 'स्वर्गद्वारी नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(551, 54, 'Gaumukhi Rural Municipality', 'गौमुखी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(552, 54, 'Mandavi Rural Municipality', 'माण्डवी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(553, 54, 'Sarumarani Rural Municipality', 'सरुमारानी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(554, 54, 'Mallarani Rural Municipality', 'मल्लरानी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(555, 54, 'Nau Bahini Rural Municipality', 'नौवहिनी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(556, 54, 'Jhimaruk Rural Municipality', 'झिमरुक गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(557, 54, 'Eairabati Rural Municipality', 'ऐरावती गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(558, 55, 'Rolpa Municipality', 'रोल्पा नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(559, 55, 'Triveni Rural Municipality', 'त्रिवेणी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(560, 55, 'Dui Kholi Rural Municipality', 'दुईखोली गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(561, 55, 'Madi Rural Municipality', 'माडी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(562, 55, 'Runti Gadhi Rural Municipality', 'रुन्टीगढी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(563, 55, 'Lungri Rural Municipality', 'लुङग्री गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(564, 55, 'Sukidaha Rural Municipality', 'सुकिदह गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(565, 55, 'Sunchhahari Rural Municipality', 'सुनछहरी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(566, 55, 'Subarnawati Rural Municipality', 'सुवर्णावती गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(567, 55, 'Thawang Rural Municipality', 'थवाङ गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(568, 56, 'Putha Uttar Ganga Rural Municipality', 'पुथा उत्तरगंगा गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(569, 56, 'Bhume Rural Municipality', 'भूमे गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(570, 56, 'Sisne Rural Municipality', 'सिस्ने गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(571, 57, 'Gulariya Municipality', 'गुलरिया नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(572, 57, 'Madhuvan Municipality', 'मधुवन नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(573, 57, 'Rajapur Taratal Municipality', 'राजापुर ताराताल नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(574, 57, 'Thakura Baba Municipality', 'ठाकुरबाबा नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(575, 57, 'Bansgadhi Municipality', 'बासगढी नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(576, 57, 'Bar Bardiya Municipality', 'बारबर्दिया नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(577, 57, 'Badhaiya Tal Rural Municipality', 'बढैयाताल गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(578, 57, 'Geruwa Rural Municipality', 'गेरुवा गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(579, 58, 'Nepalgunj Sub-Metropolitan City', 'नेपालगंज उपमहानगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(580, 58, 'Kohalpur Municipality', 'कोहलपुर नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(581, 58, 'Narainapur Rural Municipality', 'नरैनापुर गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(582, 58, 'Raptisonari Rural Municipality', 'राप्ती सोनारी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(583, 58, 'Baijanath Rural Municipality', 'बैजनाथ गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(584, 58, 'Khajura Rural Municipality', 'खजुरा गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(585, 58, 'Duduwa Rural Municipality', 'डुडुवा गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(586, 58, 'Janaki Rural Municipality', 'जानकी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(587, 59, 'Narayan Municipality', 'नारायण नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(588, 59, 'Dullu Municipality', 'दुल्लु नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(589, 59, 'Chamunda Bindrasaini Municipality', 'चामुण्डा विन्द्रासैनी नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(590, 59, 'Aathbis Municipality', 'आठबीस नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(591, 59, 'Bhagawatimai Rural Municipality', 'भगवतीमाई गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(592, 59, 'Gurans Rural Municipality', 'गुराँस गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(593, 59, 'Dungeshwar Rural Municipality', 'डुंगेश्वर गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(594, 59, 'Naumule Rural Municipality', 'नौमुले गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(595, 59, 'Mahabu Rural Municipality', 'महावु गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(596, 59, 'Bhairabi Rural Municipality', 'भैरवी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(597, 59, 'Thantikandh Rural Municipality', 'ठाँटीकाँध गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(598, 60, 'Thuli Bheri Municipality', 'ठूली भेरी नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(599, 60, 'Tripurasundari Municipality', 'त्रिपुरासुन्दरी नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(600, 60, 'Dolpo Buddha Rural Municipality', 'डोल्पो बुद्ध गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(601, 60, 'She Phoksundo Rural Municipality', 'शे फोक्सुन्डो गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(602, 60, 'Jagadulla Rural Municipality', 'जगदुल्ला गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(603, 60, 'Mudkechula Rural Municipality', 'मुड्केचुला गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(604, 60, 'Kaike Rural Municipality', 'काईके गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(605, 60, 'Chharka Tangsong Rural Municipality', 'छार्का ताङसोङ गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(606, 61, 'Simkot Rural Municipality', 'सिमकोट गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(607, 61, 'Namkha Rural Municipality', 'नाम्खा गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(608, 61, 'Kharpunath Rural Municipality', 'खार्पुनाथ गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(609, 61, 'Sarkegad Rural Municipality', 'सर्केगाड गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(610, 61, 'Chankheli Rural Municipality', 'चंखेली गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(611, 61, 'Adanchuli Rural Municipality', 'अदानचुली गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(612, 61, 'Tajakot Rural Municipality', 'ताँजाकोट गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(613, 62, 'Bheri Municipality', 'भेरी नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(614, 62, 'Chhedagad Municipality', 'छेडागाड नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(615, 62, 'Tribeni Nalgad Municipality', 'त्रिवेणी नलगाड नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(616, 62, 'Kushe Rural Municipality', 'कुसे गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(617, 62, 'Junichande Rural Municipality', 'जुनीचाँदे गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(618, 62, 'Barekot Rural Municipality', 'बारेकोट गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(619, 62, 'Shivalaya Rural Municipality', 'शिवालय गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(620, 63, 'Chandannath Municipality', 'चन्दननाथ नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(621, 63, 'Kankasundari Rural Municipality', 'कनकासुन्दरी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(622, 63, 'Sinja  Rural Municipality', 'सिंजा गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(623, 63, 'Hima Rural Municipality', 'हिमा गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(624, 63, 'Tila Rural Municipality', 'तिला गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(625, 63, 'Guthichaur Rural Municipality', 'गुठिचौर गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(626, 63, 'Tatopani Rural  Municipality', 'तातोपानी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(627, 63, 'Patarasi Rural Municipality', 'पातारासी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(628, 64, 'Khandachakra Municipality', 'खाँडाचक्र नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(629, 64, 'Raskot Municipality', 'रास्कोट नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(630, 64, 'Tilagufa Municipality', 'तिलागुफा नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(631, 64, 'Pachaljharana Rural Municipality', 'पचालझरना गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(632, 64, 'Sanni Triveni Rural Municipality', 'सान्नी त्रिवेणी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(633, 64, 'Narharinath Rural Municipality', 'नरहरिनाथ गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(634, 64, 'Shubha Kalika Rural Municipality', ' शुभ कालिका गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(635, 64, 'Mahawai Rural Municipality', 'महावै गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(636, 64, 'Palata Rural Municipality', 'पलाता गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(637, 65, 'Chhayanath Rara Municipality', 'छायाँनाथ रारा नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(638, 65, 'Mugum Karmarong Rural Municipality', 'मुगुम कार्मारोंग गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(639, 65, 'Soru Rural Municipality', 'सोरु गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(640, 65, 'Khatyad Rural Municipality', 'खत्याड गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(641, 66, 'Shaarda Municipality', 'शारदा नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(642, 66, 'Bagchaur Municipality', 'बागचौर नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(643, 66, 'Bangad Kupinde Municipality', 'बनगाड कुपिण्डे नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(644, 66, 'Kalimati Rural Municipality', 'कालीमाटी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(645, 66, 'Tribeni Rural Municipality', 'त्रिवेणी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(646, 66, 'Kapurkot Rural Municipality', 'कपुरकोट गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(647, 66, 'Chatreshwari Rural Municipality', 'छत्रेश्वरी गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(648, 66, 'Siddha Kumakh Rural Municipality', 'सिद्ध कुमाख गाउँपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(649, 66, 'Darma Rural Municipality', 'दार्मा गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(650, 66, 'Kumakh Rural Municipality ', 'कुमाख  गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(651, 67, 'Birendranagar Municipality', 'बीरेन्द्रनगर नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(652, 67, 'Bheriganga Municipality', 'भेरीगंगा नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(653, 67, 'Gurbha Kot Municipality', 'गुर्भाकोट नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(654, 67, ' Panchapuri Municipality', 'पञ्चपुरी नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(655, 67, 'Lekbesi Municipality', 'लेकबेशी नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(656, 67, 'Chaukune Rural Municipality', 'चौकुने गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(657, 67, 'Barahatal Rural Municipality', 'बराहताल गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(658, 67, 'Chingad Rural Municipality', 'चिङ्गाड गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(659, 67, 'Simta Rural Municipality', 'सिम्ता गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(660, 68, 'Musikot Muncipility', 'मुसिकोट नगरपालिका ', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(661, 68, 'Chaurjahari Municipality', 'चौरजहारी नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(662, 68, 'Aadthbiskot Municipality', 'आठबिसकोट नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(663, 68, 'Bafikot Rural Development', 'बाँफिकोट गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(664, 68, 'Triveni Rural Development', 'त्रिवेणी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(665, 68, 'Sani Bheri Rural Development', 'सानी भेरी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(666, 69, 'Mangalsen Municipality', 'मंगलसेन नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(667, 69, 'Sanfebagar Municipality', 'साफेबगर नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(668, 69, 'Kamalbazar Municipality', 'कमलबजार नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(669, 69, 'Panchdeval Binayak Municipality', 'पञ्चदेवल विनायक नगरपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(670, 69, 'Chourpati Rural Municipality', 'चौरपाटी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(671, 69, 'Mellekh Rural Municipality', 'मेल्लेख गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(672, 69, 'Bannigadhi Jayagadh Rural Municipality', 'बान्नीगढी जयगढ गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(673, 69, 'Rama Roshan Rural Municipality', 'रामारोशन गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(674, 69, 'Dhakari Rural Municipality', 'ढकारी गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(675, 69, 'Turmakhand Rural Municipality', 'तुर्माखाँद गाउँपालिका', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(676, 70, 'Dasharath Chanda Municipality', 'दशरथचन्द नगरपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(677, 70, 'Patan Municipality', 'पाटन नगरपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(678, 70, 'Melauli Municipality', 'मेलौली नगरपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(679, 70, 'Purchaundi Municipality', 'पुर्चौडी नगरपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(680, 70, 'Surnaiya Rural Municipality', 'सुर्नया गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(681, 70, 'Sigas Rural Municipality', 'सिगास गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(682, 70, 'Shivanath Rural Municipality', 'शिवनाथ गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(683, 70, 'Pancheshwor Rural Municipality', 'पन्चेश्वर गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(684, 70, 'Dogada Keda Rural Municipality', 'दोगडाकेदार गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(685, 70, 'Dilasaini Rural Municipality', 'डीलासैनी गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(686, 71, 'Jaya Prithvi Municipality', 'जयपृथ्वी नगरपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(687, 71, 'Bungal Municipality', 'बुंगल नगरपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(688, 71, 'Talkot Rural Municipality', 'तलकोट गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(689, 71, 'Masta Rural Municipality', 'मष्टा गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(690, 71, 'Khaptadchhanna Rural Municipality', 'खप्तडछान्ना गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(691, 71, 'Thalara Rural Municipality', 'थलारा गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(692, 71, 'Bitthadchir Rural Municipality', 'वित्थडचिर गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(693, 71, 'Surma Rural Municipality', 'सूर्मा गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(694, 71, 'Chhabis Pathibhera Rural Municipality', 'छबिसपाथिभेरा गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(695, 71, 'Durgathali Rural Municipality', 'दुर्गाथली गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(696, 71, 'Kedarsyun Rural Municipality', 'केदारस्युँ गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(697, 71, 'Kanda Rural Municipality', 'काँडा गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(698, 72, 'Budhi Nanda Municipality', 'बुढीनन्दा नगरपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(699, 72, 'Triveni Municipality', 'त्रिवेणी नगरपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(700, 72, 'Budhi Ganga Municipality', 'बुढीगंगा नगरपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(701, 72, 'Gaumul Rural Municipality', 'गौमुल गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(702, 72, 'SwamiKartik Rural Municipality', 'स्वामीकार्तिक गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(703, 72, 'Chhededaha Rural Municipality', 'छेडेदह गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(704, 72, 'Himali Rural Municipality', 'हिमाली गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(705, 72, 'Pandav Gupha Rural Municipality', 'पाण्डव गुफा गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(706, 72, 'Badi Malika Municipality', 'बडिमालिका नगरपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(707, 73, 'Mahakali Municipality', 'महाकाली नगरपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(708, 73, 'Sailya Shikhar Municipality', 'शैल्यशिखर नगरपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(709, 73, 'Malikarjun Rural Municipality', 'मालिकार्जुन गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(710, 73, 'Api Himal Rural Municipality', 'अपिहिमाल गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(711, 73, 'Duhun Rural Municipality', 'दुहुँ गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(712, 73, 'Naugad Rural Municipality', 'नौगाड गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(713, 73, 'Marma Rural Municipality', 'मार्मा गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(714, 73, 'Lekam Rural Municipality', 'लेकम गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(715, 73, 'Byans Rural Municipality', 'ब्यास गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(716, 74, 'Dipayal-Silgadi Municipality', 'दिपायल सिलगढी नगरपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(717, 74, 'Shikhar Municipality', 'शिखर नगरपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(718, 74, 'Purbi Chouki Rural Municipality', 'पूर्वीचौकी गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(719, 74, 'Badikedar Rural Municipality', 'बडीकेदार गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(720, 74, 'Jorayal Rural Municipality', 'जोरायल गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(721, 74, 'Sayal Rural Municipality', 'सायल गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(722, 74, 'Aadarsha Rural Municipality', 'आदर्श गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(723, 74, 'K.I. Singh Rural Municipality', 'के.आई.सिं. गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(724, 74, 'Bogtan Rural Municipality', 'बोगटान गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(725, 75, 'Dhangadhi Sub-Metropolitan City', 'धनगढी उपमहानगरपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(726, 75, 'Tikapur Muncipality', 'टिकापुर नगरपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(727, 75, 'Ghodaghodi Municipality', 'घोडाघोडी नगरपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(728, 75, 'Lamki-Chuha Municipality', 'लम्की चुहा नगरपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(729, 75, 'Bhajani Municipality', 'भजनी नगरपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(730, 75, 'Godavari Municipality', 'गोदावरी नगरपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(731, 75, 'Gauri Ganga Municipality', 'गौरीगंगा नगरपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(732, 75, 'Janaki Rural Municipality', 'जानकी गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(733, 75, 'Bardagoriya Rural Municipality', 'बर्दगोरीया गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(734, 75, 'Mohanyal Rural Municipality', 'मोहन्याल गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(735, 75, 'Kailari Rural Municipality', 'कैलारी गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(736, 75, 'Joshipur Rural Municipality', 'जोशीपुर गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(737, 75, 'Chure Rural Municipality', 'चुरे गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(738, 76, 'Bhimdatta Municipality', 'भीमदत्त नगरपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(739, 76, 'Punarbas Municipality ', 'पुनर्वास नगरपालिका ', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(740, 76, 'Bedkot Municipality ', 'वेदकोट नगरपालिका ', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(741, 76, 'Mahakali Municipality', 'माहाकाली नगरपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(742, 76, 'Shuklaphanta Municipality', 'सुक्लाफाँटा नगरपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(743, 76, 'Belauri Municipality', 'बेलौरी नगरपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(744, 76, 'Krishnapur Municipality ', 'कृष्णपुर नगरपालिका ', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(745, 76, 'Beldandi Rural Municipality', 'बेलडाडी गाउँपालिका ', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(746, 76, 'Laljhadi Rural Municipality', 'लालझाँडी गाउँपालिका  ', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(747, 77, 'Amargadhi Municipality', 'अमरगढी नगरपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(748, 77, 'Parshuram Municipality ', 'परशुराम नगरपालिका ', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(749, 77, 'Aalital Rural Municipality ', 'आलिताल गाउँपालिका ', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(750, 77, 'Bhageshwor Rural Municipality', 'भागेश्वर गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(751, 77, 'Navadurga Rural Municipality', 'नवदुर्गा गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(752, 77, 'Ajayameru Rural Municipality', 'अजयमेरु गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27'),
(753, 77, 'Ganyapadhura Rural Municipality', 'गन्यापधुरा गाउँपालिका', '2022-01-21 17:17:27', '2022-01-21 17:17:27');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_06_04_161540_create_site_configs_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_02_09_101812_create_activity_logs_table', 1),
(7, '2021_02_17_114112_create_permission_tables', 1),
(8, '2021_02_19_173914_add_fields_to_users_table', 1),
(9, '2021_03_02_055418_add_date_field_on_users_table', 1),
(10, '2021_04_18_184342_create_provinces_table', 1),
(11, '2021_09_24_073224_add_address_tables', 1),
(12, '2021_10_28_080106_change_field_type_of_activity_logs_table', 1),
(24, '2022_01_24_065219_create_offices_table', 3),
(25, '2022_01_24_070716_add_new_fields_to_users_table', 3),
(30, '2022_01_12_074123_create_applications_table', 3),
(33, '2022_03_10_152119_create_taketa_patras_table', 4),
(34, '2022_03_11_153519_add_parent_id_on_office_table', 4),
(35, '2022_03_15_151119_create_sliders_table', 4),
(36, '2022_01_25_091653_add_new_fields_to_application_table', 5),
(37, '2022_03_25_061126_add_register_nikaye_on_office_table', 6),
(38, '2022_04_20_022450_add_other_fields_in_takeka_patra_table', 7),
(39, '2022_04_22_073103_create_credit_analysis_table', 7),
(40, '2022_04_23_083027_create_loan_details_table', 7),
(41, '2022_04_23_084048_create_guarantor_details_table', 7),
(42, '2022_04_23_084609_create_sanchi_details_table', 7),
(43, '2022_04_23_085120_create_other_details_table', 7),
(45, '2022_05_03_081129_add_fields_on_office_table', 8),
(46, '2022_05_05_144757_add_app_id_on_applications_table', 8),
(49, '2022_05_16_064950_create_application_files_table', 9),
(50, '2022_05_22_090049_create_black_lists_table', 9),
(51, '2022_05_30_032127_add_image_field_on_office_table', 10),
(52, '2022_04_24_091653_add_new_fields_to_application_table', 11),
(53, '2022_08_16_030413_add_slogan_on_office_table', 12),
(54, '2022_08_22_023035_create_application_statuses_table', 13),
(55, '2022_08_27_155947_add_approve_limit_on_user_table', 14),
(56, '2022_09_09_151339_add_agent_name_on_office_table', 15),
(57, '2022_09_10_160436_create_darta_chalanis_table', 16),
(60, '2022_09_24_163433_create_credit_renews_table', 17),
(63, '2022_10_31_141924_create_mortgage_appraisals_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `registration_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_date` datetime DEFAULT NULL,
  `registration_date_bs` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `register_nikaye` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_np` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` int(11) DEFAULT NULL,
  `district` int(11) DEFAULT NULL,
  `localgovt` int(11) DEFAULT NULL,
  `ward` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tole` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `former_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `president_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manager_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vice_president_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secretary` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `treasurer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loan_coordinator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loan_member_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loan_member_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slogan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiration_date` datetime DEFAULT NULL,
  `expiration_date_bs` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `head_office` int(11) DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `registration_number`, `registration_date`, `registration_date_bs`, `register_nikaye`, `name_en`, `name_np`, `province`, `district`, `localgovt`, `ward`, `tole`, `former_address`, `phone`, `president_name`, `manager_name`, `vice_president_name`, `secretary`, `treasurer`, `loan_coordinator`, `loan_member_1`, `loan_member_2`, `email`, `remarks`, `agent_name`, `slogan`, `image`, `expiration_date`, `expiration_date_bs`, `status`, `head_office`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '१७३।०५६।०५७', '2000-05-30 00:00:00', '2057-02-17', 'सहकारी प्रशिक्षण तथा डिभिजन कार्यालय,कास्की', 'JAYAMANAKAMANA SAVING AND CREDIT CO-OPERATIVE LTD', 'जय मनकामना बचत तथा ऋण सहकारी संस्था लि.', 4, 45, 465, '१९', 'लामाचौर', 'लामाचौर १९,पोखरा', '०६१४४१९००', 'सन्जय कुमार अधिकारी', 'टंक प्रसाद अधिकारी', 'नबिन भण्डारी', 'कमल बहादुर बस्नेत', 'बुद्धि बहादुर खत्री', 'कमल बहादुर थापा', 'चिरन्जिबी पाण्डे', 'पदम बहादुर के सी', 'jayasahakari@gmail.com', NULL, NULL, NULL, '16538896757956_14462872_1235910189799667_4461941701711664070_n (2).jpg', '2023-02-02 00:00:00', '2079-10-19', '1', NULL, 1, NULL, '2022-02-02 12:00:30', '2022-05-30 05:47:55'),
(2, '१७३।०५६।०५७', '2022-04-20 00:00:00', '2079-01-07', 'सहकरी बिभाग कास्की', 'NAMUNA SAVING AND CREDIT CO-OPERATIVE LTD', 'नमुना बचत तथा ऋण सहकारी संस्था लि.', 4, 45, 465, '०९', 'मालेपाटन', 'चापाकोट ९ कास्की', '९८५६०२६४२४', 'नमुना तिमिल्सेना', 'नमुना अधिकारी', 'नमुना कार्की', 'नमुना पौडेल', 'नमुना गुरुङ', '.नमुना पुन', 'नमुना  बराल', 'नमुना भण्डारी', 'test@gmail.com', '1 बर्ष', NULL, NULL, '16613202907954_logo.JPG', '2022-09-27 00:00:00', '2079-06-11', '1', NULL, 1, NULL, '2022-02-04 10:24:13', '2022-08-31 11:56:59'),
(3, '६५९।०६६।०६७', '2010-02-11 00:00:00', '2066-10-28', 'भुमी व्यवस्था कृषि सहकारी तथा गरिवि निवारण मन्त्रालय सहकारी रजिष्टार को कार्यालय गण्डकी प्रदेश', 'PRIME  MULTIPUPOSE (SACCOS) CO-OPERATIVE LTD', 'प्राइम बहुउद्देश्यीय (साकोस) संस्था लि.', 4, 45, 465, '०४', 'गैहापाटन', NULL, '9856006418', 'शंकर कार्की', 'निरू थापा', 'दिपा कोइराला', 'ओम प्रकाश उपाध्याय', 'सन्जिव तिमील्सिना', 'दिपा कोइराला', 'रेशम प्रसाद रेग्मी', 'जिवन सार्की', 'primemulticooperative659@gmail.com', NULL, NULL, 'सुख दुखको साथी प्राइम सहकारी', '16626241926753_logo 2.jpg', '2022-09-26 00:00:00', '2079-06-10', '1', NULL, 1, NULL, '2022-02-05 15:24:13', '2022-09-08 08:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `other_details`
--

CREATE TABLE `other_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create-application', 'web', '2022-11-14 10:38:51', '2022-11-14 10:38:51'),
(2, 'update-application', 'web', '2022-11-14 10:38:51', '2022-11-14 10:38:51'),
(3, 'show-application', 'web', '2022-11-14 10:38:51', '2022-11-14 10:38:51'),
(4, 'delete-application', 'web', '2022-11-14 10:38:51', '2022-11-14 10:38:51'),
(5, 'download-application', 'web', '2022-11-14 10:38:51', '2022-11-14 10:38:51'),
(6, 'restore-application', 'web', '2022-11-14 10:38:51', '2022-11-14 10:38:51'),
(7, 'forceDelete-application', 'web', '2022-11-14 10:38:51', '2022-11-14 10:38:51'),
(8, 'create-offices', 'web', '2022-11-14 10:38:51', '2022-11-14 10:38:51'),
(9, 'update-offices', 'web', '2022-11-14 10:38:51', '2022-11-14 10:38:51'),
(10, 'show-offices', 'web', '2022-11-14 10:38:51', '2022-11-14 10:38:51'),
(11, 'delete-offices', 'web', '2022-11-14 10:38:51', '2022-11-14 10:38:51'),
(12, 'restore-offices', 'web', '2022-11-14 10:38:51', '2022-11-14 10:38:51'),
(13, 'forceDelete-offices', 'web', '2022-11-14 10:38:51', '2022-11-14 10:38:51'),
(14, 'create-darta chalani', 'web', '2022-11-14 10:38:51', '2022-11-14 10:38:51'),
(15, 'update-darta chalani', 'web', '2022-11-14 10:38:51', '2022-11-14 10:38:51'),
(16, 'show-darta chalani', 'web', '2022-11-14 10:38:51', '2022-11-14 10:38:51'),
(17, 'delete-darta chalani', 'web', '2022-11-14 10:38:51', '2022-11-14 10:38:51'),
(18, 'restore-darta chalani', 'web', '2022-11-14 10:38:51', '2022-11-14 10:38:51'),
(19, 'forceDelete-darta chalani', 'web', '2022-11-14 10:38:51', '2022-11-14 10:38:51'),
(20, 'create-users', 'web', '2022-11-14 10:38:51', '2022-11-14 10:38:51'),
(21, 'update-users', 'web', '2022-11-14 10:38:51', '2022-11-14 10:38:51'),
(22, 'show-users', 'web', '2022-11-14 10:38:51', '2022-11-14 10:38:51'),
(23, 'delete-users', 'web', '2022-11-14 10:38:51', '2022-11-14 10:38:51'),
(24, 'restore-users', 'web', '2022-11-14 10:38:51', '2022-11-14 10:38:51'),
(25, 'forceDelete-users', 'web', '2022-11-14 10:38:51', '2022-11-14 10:38:51'),
(26, 'create-role', 'web', '2022-11-14 10:38:51', '2022-11-14 10:38:51'),
(27, 'update-role', 'web', '2022-11-14 10:38:51', '2022-11-14 10:38:51'),
(28, 'show-role', 'web', '2022-11-14 10:38:51', '2022-11-14 10:38:51'),
(29, 'delete-role', 'web', '2022-11-14 10:38:51', '2022-11-14 10:38:51'),
(30, 'update-site configuration', 'web', '2022-11-14 10:38:51', '2022-11-14 10:38:51');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_np` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name_en`, `name_np`, `created_at`, `updated_at`) VALUES
(1, 'Province 1', 'प्रदेश १', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(2, 'Madhesh Province', 'मधेश प्रदेश', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(3, 'Bagmati Province', 'वागमति प्रदेश', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(4, 'Gandaki Province', 'गण्डकी प्रदेश', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(5, 'Lumbini Province', 'लुम्बिनी प्रदेश', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(6, 'Karnali Province', 'कणालि प्रदेश', '2022-01-21 17:17:26', '2022-01-21 17:17:26'),
(7, 'Sudur Paschim Province', 'सुदुर पश्चिम् प्रदेश', '2022-01-21 17:17:26', '2022-01-21 17:17:26');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'web', '2022-01-21 17:17:22', '2022-01-21 17:17:22');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanchi_details`
--

CREATE TABLE `sanchi_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sanchi1_name` text COLLATE utf8mb4_unicode_ci,
  `sanchi1_age` text COLLATE utf8mb4_unicode_ci,
  `sanchi1_province` int(11) DEFAULT NULL,
  `sanchi1_district` int(11) DEFAULT NULL,
  `sanchi1_localgovt` int(11) DEFAULT NULL,
  `sanchi1_ward` text COLLATE utf8mb4_unicode_ci,
  `sanchi1_tole` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_configs`
--

CREATE TABLE `site_configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `config_keys` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `config_values` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_configs`
--

INSERT INTO `site_configs` (`id`, `config_keys`, `config_values`, `created_at`, `updated_at`) VALUES
(1, 'office_name_en', 'Sahakari Docs', '2022-01-21 17:17:21', '2022-01-21 17:17:21'),
(2, 'office_address_en', 'Pokhara, Nepal', '2022-01-21 17:17:21', '2022-01-21 17:17:21'),
(3, 'domain', '##', '2022-01-21 17:17:21', '2022-01-21 17:17:21'),
(4, 'email', '##', '2022-01-21 17:17:21', '2022-01-21 17:17:21'),
(5, 'logo', '16523390909494_Untitled Design (2).jpeg', '2022-01-21 17:17:21', '2022-05-12 07:04:50'),
(6, 'favicon', '', '2022-01-21 17:17:21', '2022-01-21 17:17:21'),
(7, 'phone_en', '9856026434', '2022-01-21 17:17:21', '2022-01-31 21:06:59'),
(8, 'fax_en', NULL, '2022-01-21 17:17:21', '2022-01-31 21:06:59'),
(9, 'meta_title', NULL, '2022-01-21 17:17:21', '2022-01-31 21:06:59'),
(10, 'meta_discription', NULL, '2022-01-21 17:17:21', '2022-01-31 21:06:59'),
(11, 'meta_keywords', NULL, '2022-01-21 17:17:21', '2022-01-31 21:06:59'),
(22, 'blacklist_published_at', '2022-05-23', '2022-05-23 00:37:27', '2022-05-23 00:37:27'),
(23, 'blacklist_published_at_bs', '2079-02-09', '2022-05-23 00:37:27', '2022-10-29 12:14:59'),
(24, 'change_log', '<h3><strong>आदरणिय ग्राहक महानुभाबहरु</strong></h3>\r\n\r\n<p><strong><span class=\"marker\">यस सिस्टम यहाहरुको माग बमोजिम सामान्य परिबर्तन भएको छ ।</span></strong></p>\r\n\r\n<p><big>थप जानकारीका लागी निम्न नम्बरमा सम्पर्क गर्नुहोस&nbsp;</big></p>\r\n\r\n<h3><span dir=\"ltr\"><span class=\"marker\"><ins><big>9815103000 (Ncell)</big></ins></span></span></h3>\r\n\r\n<h3><ins><big>9866067777 (Ntc)</big></ins></h3>\r\n\r\n<h3><a href=\"https://api.whatsapp.com/send?phone=9779827157000&amp;text=Loan%20Gen%20Software%20Support\"><big>9827157000</big></a>&nbsp;</h3>\r\n\r\n<p>Email :<a href=\"mailto:aakashdigitalpayment@gmail.com?subject=For%20Problem&amp;body=%E0%A4%95%E0%A5%83%E0%A4%AA%E0%A4%AF%E0%A4%BE%20%E0%A4%AF%E0%A4%B9%E0%A4%BE%E0%A4%95%E0%A5%8B%20%E0%A4%B8%E0%A4%AE%E0%A4%B8%E0%A5%8D%E0%A4%AF%E0%A4%BE%20%E0%A4%A4%E0%A4%A5%E0%A4%BE%20%E0%A4%B8%E0%A5%81%E0%A4%9D%E0%A4%BE%E0%A4%AC%E0%A4%B2%E0%A4%BE%E0%A4%88%20%E0%A4%AF%E0%A4%B9%E0%A4%BE%20%E0%A4%B2%E0%A5%87%E0%A4%96%E0%A5%80%20%E0%A4%B9%E0%A4%BE%E0%A4%AE%E0%A5%80%E0%A4%B2%E0%A4%BE%E0%A4%88%20%E0%A4%AA%E0%A4%A0%E0%A4%BE%E0%A4%89%E0%A4%A8%E0%A5%81%E0%A4%B9%E0%A5%8B%E0%A4%B2%E0%A4%BE%20%E0%A5%A4%0AFor%20Our%20Technical%20Support%20%3A9815103000(Ncell)%2C9866067777(Ntc)%0A\">aakashdigitalpayment@gmail.com</a></p>\r\n\r\n<p><span class=\"marker\">वा यस&nbsp; भिडियो मार्फत थप जानकारी लिनुहोस&nbsp;</span></p>\r\n\r\n<p><span class=\"marker\"><a href=\"https://www.youtube.com/channel/UCT4Sc6rjGggeA8pWkxMUYgw\">https://www.youtube.com/channel/UCT4Sc6rjGggeA8pWkxMUYgw</a></span></p>', '2022-05-23 06:22:27', '2022-09-18 02:55:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `last_login` datetime DEFAULT NULL,
  `office_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `approved_limit` bigint(20) NOT NULL DEFAULT '0',
  `last_password_change` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `status`, `last_login`, `office_id`, `approved_limit`, `last_password_change`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SuperAdmin', 'loan@akashdigital.com.np', NULL, NULL, '$2y$10$KYm9pfCkI/4YzUeLmFp4euL9A8GXMdIId9UGlk2JvjBxVnHeIJzlm', 1, '2022-11-14 13:02:16', 0, 999999999, '2022-08-28 14:15:29', '5SvL17DoWVbYBX8shjsbxr1ge6UzKuCWi1BkHQw3dkjpaTaeIdQlezirKsav', '2022-01-21 17:17:21', '2022-11-14 07:17:16', NULL),
(2, 'jayaloan', 'jayasahakari@gmail.com', NULL, NULL, '$2y$10$hEuKfVW1AQJkrr9papa0pOWi41R3R7KNGa83bbHjwn.rLlioV6tvO', 1, '2022-09-22 08:42:48', 1, 9999999, '2022-02-07 05:43:38', 'sChHYlLyxW9SR4dWmU9zW8AUulNldfSRFfrGSb8MEX79qZp3i1KINPYeBYX0', '2022-01-27 18:34:28', '2022-09-22 08:42:48', NULL),
(3, 'Text Saving', 'test@gmail.com', NULL, NULL, '$2y$10$sV.FOBSIAp1XJsZtSg0sWONM.Xn6IVG/CvnDPdM74baXQiFDr6bGO', 1, '2022-09-15 08:54:49', 2, 99999999, '2022-09-15 08:55:25', '1XSFEU0eW5KGVlPgFYkxRu23zIvc1NjZYi9mHFzKsD7aOZwEHcpt2xuzMWad', '2022-02-04 10:25:35', '2022-09-15 08:55:25', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_files`
--
ALTER TABLE `application_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_statuses`
--
ALTER TABLE `application_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collateral_details`
--
ALTER TABLE `collateral_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `darta_chalanis`
--
ALTER TABLE `darta_chalanis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `darta_chalanis_record_id_unique` (`record_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `guarantor_details`
--
ALTER TABLE `guarantor_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_details`
--
ALTER TABLE `loan_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `local_govts`
--
ALTER TABLE `local_govts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `local_govts_district_id_foreign` (`district_id`);

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
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_details`
--
ALTER TABLE `other_details`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sanchi_details`
--
ALTER TABLE `sanchi_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_configs`
--
ALTER TABLE `site_configs`
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
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `application_files`
--
ALTER TABLE `application_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `application_statuses`
--
ALTER TABLE `application_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `collateral_details`
--
ALTER TABLE `collateral_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `darta_chalanis`
--
ALTER TABLE `darta_chalanis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guarantor_details`
--
ALTER TABLE `guarantor_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_details`
--
ALTER TABLE `loan_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `local_govts`
--
ALTER TABLE `local_govts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=754;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `other_details`
--
ALTER TABLE `other_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sanchi_details`
--
ALTER TABLE `sanchi_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_configs`
--
ALTER TABLE `site_configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `local_govts`
--
ALTER TABLE `local_govts`
  ADD CONSTRAINT `local_govts_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
