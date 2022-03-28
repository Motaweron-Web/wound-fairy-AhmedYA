-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2022 at 12:47 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wound_fairy`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `image`, `title_ar`, `title_en`, `details_ar`, `details_en`, `created_at`, `updated_at`) VALUES
(1, 'storage/uploads/about/about.png', 'حول الجرح الجنية', 'about wound Fairy', 'سيقوم الأطباء بزيارة المرضى الذين يعيشون في المناطق النائية فقط. سيقومون أيضًا بزيارة المرضى المسنين أو المعاقين ولا يمكنهم الخروج من المنزل بسهولة ....\r\nيقوم الأطباء الآن بزيارة المرضى في منازلهم. هذه طريقة للمرضى لتوفير الوقت والمال ، لأنهم لا يضطرون إلى زيارة مكتب الطبيب أو المستشفى.\r\n\r\nسيقوم الأطباء بزيارة المرضى الذين يعيشون في المناطق النائية فقط. سيقومون أيضًا بزيارة المرضى المسنين أو المعاقين ولا يمكنهم الخروج من المنزل بسهولة.', 'Doctors will only visit patients who live in remote areas. They will also visit patients who are elderly or disabled and can\'t get out of the house easily....\r\nDoctors are now visiting patients at their homes. This is a way for patients to save time and money, because they don\'t have to visit the doctor’s office or hospital.\r\n\r\nDoctors will only visit patients who live in remote areas. They will also visit patients who are elderly or disabled and can\'t get out of the house easily.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `photo`, `email`, `name`, `password`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin@admin.com', 'ahmed', '$2y$10$bO//S0o.RIpOejZda1Q/9uR5F/akADL10I5R/GDRNSIO92h8JMOwy', '2022-03-28 06:27:14', '2022-03-28 06:27:14');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` bigint(20) DEFAULT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `image`, `date`, `title_ar`, `title_en`, `details_ar`, `details_en`, `created_at`, `updated_at`) VALUES
(1, 'storage/uploads/blogs/blog.png', 1647271740, 'أخبار طبية', 'Medical News', 'سيقوم الأطباء بزيارة المرضى الذين يعيشون في المناطق النائية فقط. سيقومون أيضًا بزيارة المرضى المسنين أو المعاقين ولا يمكنهم الخروج من المنزل بسهولة ....\r\nيقوم الأطباء الآن بزيارة المرضى في منازلهم. هذه طريقة للمرضى لتوفير الوقت والمال ، لأنهم لا يضطرون إلى زيارة مكتب الطبيب أو المستشفى.\r\n\r\nسيقوم الأطباء بزيارة المرضى الذين يعيشون في المناطق النائية فقط. سيقومون أيضًا بزيارة المرضى المسنين أو المعاقين ولا يمكنهم الخروج من المنزل بسهولة.', 'Doctors will only visit patients who live in remote areas. They will also visit patients who are elderly or disabled and can\'t get out of the house easily....\r\nDoctors are now visiting patients at their homes. This is a way for patients to save time and money, because they don\'t have to visit the doctor’s office or hospital.\r\n\r\nDoctors will only visit patients who live in remote areas. They will also visit patients who are elderly or disabled and can\'t get out of the house easily.', NULL, NULL),
(2, 'storage/uploads/blogs/blog.png', NULL, 'أخبار طبية', 'Medical News', 'سيقوم الأطباء بزيارة المرضى الذين يعيشون في المناطق النائية فقط. سيقومون أيضًا بزيارة المرضى المسنين أو المعاقين ولا يمكنهم الخروج من المنزل بسهولة ....\r\nيقوم الأطباء الآن بزيارة المرضى في منازلهم. هذه طريقة للمرضى لتوفير الوقت والمال ، لأنهم لا يضطرون إلى زيارة مكتب الطبيب أو المستشفى.\r\n\r\nسيقوم الأطباء بزيارة المرضى الذين يعيشون في المناطق النائية فقط. سيقومون أيضًا بزيارة المرضى المسنين أو المعاقين ولا يمكنهم الخروج من المنزل بسهولة.', 'Doctors will only visit patients who live in remote areas. They will also visit patients who are elderly or disabled and can\'t get out of the house easily....\r\nDoctors are now visiting patients at their homes. This is a way for patients to save time and money, because they don\'t have to visit the doctor’s office or hospital.\r\n\r\nDoctors will only visit patients who live in remote areas. They will also visit patients who are elderly or disabled and can\'t get out of the house easily.', NULL, NULL),
(3, 'storage/uploads/blogs/blog.png', NULL, 'أخبار طبية', 'Medical News', 'سيقوم الأطباء بزيارة المرضى الذين يعيشون في المناطق النائية فقط. سيقومون أيضًا بزيارة المرضى المسنين أو المعاقين ولا يمكنهم الخروج من المنزل بسهولة ....\r\nيقوم الأطباء الآن بزيارة المرضى في منازلهم. هذه طريقة للمرضى لتوفير الوقت والمال ، لأنهم لا يضطرون إلى زيارة مكتب الطبيب أو المستشفى.\r\n\r\nسيقوم الأطباء بزيارة المرضى الذين يعيشون في المناطق النائية فقط. سيقومون أيضًا بزيارة المرضى المسنين أو المعاقين ولا يمكنهم الخروج من المنزل بسهولة.', 'Doctors will only visit patients who live in remote areas. They will also visit patients who are elderly or disabled and can\'t get out of the house easily....\r\nDoctors are now visiting patients at their homes. This is a way for patients to save time and money, because they don\'t have to visit the doctor’s office or hospital.\r\n\r\nDoctors will only visit patients who live in remote areas. They will also visit patients who are elderly or disabled and can\'t get out of the house easily.', NULL, NULL),
(4, 'storage/uploads/blogs/blog.png', NULL, 'أخبار طبية', 'Medical News', 'سيقوم الأطباء بزيارة المرضى الذين يعيشون في المناطق النائية فقط. سيقومون أيضًا بزيارة المرضى المسنين أو المعاقين ولا يمكنهم الخروج من المنزل بسهولة ....\r\nيقوم الأطباء الآن بزيارة المرضى في منازلهم. هذه طريقة للمرضى لتوفير الوقت والمال ، لأنهم لا يضطرون إلى زيارة مكتب الطبيب أو المستشفى.\r\n\r\nسيقوم الأطباء بزيارة المرضى الذين يعيشون في المناطق النائية فقط. سيقومون أيضًا بزيارة المرضى المسنين أو المعاقين ولا يمكنهم الخروج من المنزل بسهولة.', 'Doctors will only visit patients who live in remote areas. They will also visit patients who are elderly or disabled and can\'t get out of the house easily....\r\nDoctors are now visiting patients at their homes. This is a way for patients to save time and money, because they don\'t have to visit the doctor’s office or hospital.\r\n\r\nDoctors will only visit patients who live in remote areas. They will also visit patients who are elderly or disabled and can\'t get out of the house easily.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `from_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `to_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` date DEFAULT NULL,
  `is_read` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `time` time DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `room_id`, `from_user_id`, `to_user_id`, `date`, `is_read`, `time`, `image`, `text`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, '2022-03-28', '1', '12:09:08', NULL, 'السلام عليكم', '2022-03-27 10:09:08', '2022-03-28 12:32:31'),
(2, 1, 1, NULL, '2022-03-28', '1', '12:09:08', NULL, 'ممكن استفسار لك', '2022-03-27 10:09:08', '2022-03-28 12:32:31'),
(15, 1, NULL, 1, '2022-03-28', '1', '15:37:56', NULL, 'تفضل', '2022-03-28 11:37:56', '2022-03-28 12:31:33'),
(16, 1, NULL, 1, '2022-03-28', '1', '15:41:47', NULL, 'اهلا بك', '2022-03-28 11:41:47', '2022-03-28 12:30:32'),
(17, 1, 1, NULL, '2022-03-28', '1', '12:09:08', NULL, 'اريد حجز موعد', '2022-03-28 13:09:08', '2022-03-28 12:31:33'),
(18, 1, NULL, 1, '2022-03-28', '1', '16:20:33', NULL, 'من الادمن', '2022-03-28 12:20:33', '2022-03-28 12:28:06'),
(19, 1, NULL, 1, '2022-03-28', '1', '16:20:50', NULL, 'اهلا', '2022-03-28 12:20:50', '2022-03-28 12:28:06'),
(20, 1, NULL, 1, '2022-03-28', '1', '16:39:16', NULL, 'مرحبا', '2022-03-28 12:39:16', '2022-03-28 12:39:21'),
(21, 1, 1, NULL, '2022-03-28', '1', '12:09:08', NULL, 'اخر رسالة', '2022-03-27 10:09:08', '2022-03-28 13:15:35'),
(22, 1, NULL, 1, '2022-03-28', '1', '17:15:42', NULL, 'ررر', '2022-03-28 13:15:42', '2022-03-28 13:23:29'),
(23, 1, 1, NULL, '2022-03-28', '1', '17:21:16', NULL, NULL, '2022-03-28 13:21:16', '2022-03-28 13:23:29'),
(24, 1, 1, NULL, '2022-03-28', '1', '17:22:18', NULL, NULL, '2022-03-28 13:22:18', '2022-03-28 13:23:29'),
(25, 1, 1, NULL, '2022-03-28', '1', '17:22:49', NULL, 'تم الارسال بنجاح', '2022-03-28 13:22:49', '2022-03-28 13:23:29'),
(26, 1, NULL, 1, '2022-03-28', '1', '17:23:06', NULL, 'اهلا', '2022-03-28 13:23:06', '2022-03-28 13:23:29'),
(27, 1, NULL, 1, '2022-03-28', '1', '17:24:04', NULL, 'مرحبا', '2022-03-28 13:24:04', '2022-03-28 13:41:13'),
(28, 1, 1, NULL, '2022-03-28', '1', '17:24:34', NULL, 'تم الارسال بنجاح', '2022-03-28 13:24:34', '2022-03-28 13:41:14'),
(29, 1, 1, NULL, '2022-03-28', '1', '17:41:18', NULL, 'تم الارسال بنجاح', '2022-03-28 13:41:18', '2022-03-28 14:04:12'),
(30, 1, 1, NULL, '2022-03-28', '1', '18:04:18', NULL, 'تم الارسال بنجاح', '2022-03-28 14:04:18', '2022-03-28 14:05:50'),
(31, 1, 1, NULL, '2022-03-28', '1', '18:06:00', NULL, 'حجز استشارة', '2022-03-28 14:06:00', '2022-03-28 14:09:52'),
(32, 1, 1, NULL, '2022-03-28', '1', '18:08:30', NULL, 'حجز استشارة', '2022-03-28 14:08:30', '2022-03-28 14:09:52'),
(33, 1, 1, NULL, '2022-03-28', '1', '18:09:46', NULL, 'حجز استشارة', '2022-03-28 14:09:46', '2022-03-28 14:09:52'),
(34, 1, 1, NULL, '2022-03-28', '1', '18:10:11', NULL, 'رسالة من اليوزر', '2022-03-28 14:10:11', '2022-03-28 14:15:24'),
(35, 1, 1, NULL, '2022-03-28', '1', '18:11:30', NULL, 'رسالة من اليوزر', '2022-03-28 14:11:30', '2022-03-28 14:15:25'),
(36, 1, NULL, 1, '2022-03-28', '1', '18:11:51', NULL, 'هلا', '2022-03-28 14:11:51', '2022-03-28 14:15:25'),
(37, 1, NULL, 1, '2022-03-28', '1', '18:15:35', NULL, 'اهلا', '2022-03-28 14:15:35', '2022-03-28 14:18:22'),
(38, 1, 1, NULL, '2022-03-28', '1', '18:15:42', NULL, 'رسالة من اليوزر', '2022-03-28 14:15:42', '2022-03-28 14:18:22'),
(39, 1, 1, NULL, '2022-03-28', '1', '18:17:49', NULL, 'رسالة من اليوزر', '2022-03-28 14:17:49', '2022-03-28 14:18:23'),
(40, 1, NULL, 1, '2022-03-28', '1', '18:18:30', NULL, 'ادمن', '2022-03-28 14:18:30', '2022-03-28 14:21:31'),
(41, 1, 1, NULL, '2022-03-28', '1', '18:18:37', NULL, 'رسالة من اليوزر', '2022-03-28 14:18:37', '2022-03-28 14:21:31'),
(42, 1, 1, NULL, '2022-03-28', '1', '18:21:10', NULL, 'رسالة من اليوزر', '2022-03-28 14:21:10', '2022-03-28 14:21:31'),
(43, 1, NULL, 1, '2022-03-28', '1', '18:21:39', NULL, 'هي', '2022-03-28 14:21:39', '2022-03-28 14:25:35'),
(44, 1, 1, NULL, '2022-03-28', '1', '18:21:43', NULL, 'رسالة من اليوزر', '2022-03-28 14:21:43', '2022-03-28 14:25:35'),
(45, 1, NULL, 1, '2022-03-28', '1', '18:25:42', NULL, 'اهلا', '2022-03-28 14:25:42', '2022-03-28 14:26:23'),
(46, 1, 1, NULL, '2022-03-28', '1', '18:25:44', NULL, 'رسالة من اليوزر', '2022-03-28 14:25:44', '2022-03-28 14:26:23'),
(47, 1, NULL, 1, '2022-03-28', '1', '18:26:30', NULL, 'اهلا', '2022-03-28 14:26:30', '2022-03-28 14:27:53'),
(48, 1, 1, NULL, '2022-03-28', '1', '18:27:24', NULL, 'رسالة من اليوزر', '2022-03-28 14:27:24', '2022-03-28 14:27:53'),
(49, 1, NULL, 1, '2022-03-28', '1', '18:28:00', NULL, 'اعلا', '2022-03-28 14:28:00', '2022-03-28 14:33:38'),
(50, 1, NULL, 1, '2022-03-28', '1', '18:28:02', NULL, 'اعلا', '2022-03-28 14:28:02', '2022-03-28 14:33:38'),
(51, 1, NULL, 1, '2022-03-28', '1', '18:28:06', NULL, 'اعلا', '2022-03-28 14:28:06', '2022-03-28 14:33:38'),
(52, 1, 1, NULL, '2022-03-28', '1', '18:28:38', NULL, 'رسالة من اليوزر', '2022-03-28 14:28:38', '2022-03-28 14:33:38'),
(53, 1, 1, NULL, '2022-03-28', '1', '18:28:47', NULL, 'رسالة من اليوزر', '2022-03-28 14:28:47', '2022-03-28 14:33:38'),
(54, 1, 1, NULL, '2022-03-28', '1', '18:29:03', NULL, 'رسالة من اليوزر', '2022-03-28 14:29:03', '2022-03-28 14:33:38'),
(55, 1, 1, NULL, '2022-03-28', '1', '18:29:24', NULL, 'رسالة من اليوزر', '2022-03-28 14:29:24', '2022-03-28 14:33:38'),
(56, 1, 1, NULL, '2022-03-28', '1', '18:29:59', NULL, 'رسالة من اليوزر', '2022-03-28 14:29:59', '2022-03-28 14:33:38'),
(57, 1, 1, NULL, '2022-03-28', '1', '18:32:03', NULL, 'رسالة من اليوزر', '2022-03-28 14:32:03', '2022-03-28 14:33:38'),
(58, 1, NULL, 1, '2022-03-28', '1', '18:33:45', NULL, 'hig', '2022-03-28 14:33:45', '2022-03-28 14:35:54'),
(59, 1, 1, NULL, '2022-03-28', '1', '18:35:40', NULL, 'رسالة من اليوزر', '2022-03-28 14:35:40', '2022-03-28 14:35:54'),
(60, 1, NULL, 1, '2022-03-28', '1', '18:35:59', NULL, 'اهلا', '2022-03-28 14:35:59', '2022-03-28 14:37:11'),
(61, 1, NULL, 1, '2022-03-28', '1', '18:37:19', NULL, 'hi', '2022-03-28 14:37:19', '2022-03-28 14:39:23'),
(62, 1, 1, NULL, '2022-03-28', '1', '18:39:14', NULL, 'رسالة من اليوزر', '2022-03-28 14:39:14', '2022-03-28 14:39:23'),
(63, 1, NULL, 1, '2022-03-28', '1', '18:39:56', NULL, 'ad', '2022-03-28 14:39:56', '2022-03-28 14:46:43'),
(64, 1, NULL, 1, '2022-03-28', '1', '18:40:07', NULL, 'ad', '2022-03-28 14:40:07', '2022-03-28 14:46:43'),
(65, 1, NULL, 1, '2022-03-28', '1', '18:40:15', NULL, 'ad', '2022-03-28 14:40:15', '2022-03-28 14:46:43'),
(66, 1, 1, NULL, '2022-03-28', '1', '18:40:53', NULL, 'رسالة من اليوزر', '2022-03-28 14:40:53', '2022-03-28 14:46:43'),
(67, 1, 1, NULL, '2022-03-28', '1', '18:41:04', NULL, 'رسالة من اليوزر', '2022-03-28 14:41:04', '2022-03-28 14:46:43'),
(68, 1, 1, NULL, '2022-03-28', '1', '18:43:19', NULL, 'رسالة من اليوزر', '2022-03-28 14:43:19', '2022-03-28 14:46:43'),
(69, 1, 1, NULL, '2022-03-28', '1', '18:46:31', NULL, 'رسالة من اليوزر', '2022-03-28 14:46:31', '2022-03-28 14:46:43'),
(70, 1, NULL, 1, '2022-03-28', '1', '18:46:50', NULL, 'هلا بيك', '2022-03-28 14:46:50', '2022-03-28 14:48:15'),
(71, 1, 1, NULL, '2022-03-28', '1', '18:46:54', NULL, 'رسالة من اليوزر', '2022-03-28 14:46:54', '2022-03-28 14:48:15'),
(72, 1, 1, NULL, '2022-03-28', '1', '18:47:59', NULL, 'رسالة من اليوزر', '2022-03-28 14:47:59', '2022-03-28 14:48:15'),
(73, 1, NULL, 1, '2022-03-28', '1', '18:48:25', NULL, 'تمن', '2022-03-28 14:48:25', '2022-03-28 14:49:06'),
(74, 1, 1, NULL, '2022-03-28', '1', '18:48:28', NULL, 'رسالة من اليوزر', '2022-03-28 14:48:28', '2022-03-28 14:49:06'),
(75, 1, 1, NULL, '2022-03-28', '1', '18:48:50', NULL, 'رسالة من اليوزر', '2022-03-28 14:48:50', '2022-03-28 14:49:06'),
(76, 1, NULL, 1, '2022-03-28', '1', '18:49:14', NULL, 'اهلا', '2022-03-28 14:49:14', '2022-03-28 14:52:17'),
(77, 1, 1, NULL, '2022-03-28', '1', '18:49:18', NULL, 'رسالة من اليوزر', '2022-03-28 14:49:18', '2022-03-28 14:52:17'),
(78, 1, NULL, 1, '2022-03-28', '1', '18:52:24', NULL, 'اهال', '2022-03-28 14:52:24', '2022-03-28 14:54:00'),
(79, 1, 1, NULL, '2022-03-28', '1', '18:52:28', NULL, 'رسالة من اليوزر', '2022-03-28 14:52:28', '2022-03-28 14:54:00'),
(80, 1, 1, NULL, '2022-03-28', '1', '18:53:55', NULL, 'رسالة من اليوزر', '2022-03-28 14:53:55', '2022-03-28 14:54:01'),
(81, 1, NULL, 1, '2022-03-28', '1', '18:54:11', NULL, 'اهلا', '2022-03-28 14:54:11', '2022-03-28 14:55:09'),
(82, 1, 1, NULL, '2022-03-28', '1', '18:54:18', NULL, 'رسالة من اليوزر', '2022-03-28 14:54:18', '2022-03-28 14:55:09'),
(83, 1, NULL, 1, '2022-03-28', '1', '18:55:15', NULL, 'اهلا', '2022-03-28 14:55:15', '2022-03-28 14:56:26'),
(84, 1, 1, NULL, '2022-03-28', '1', '18:55:18', NULL, 'رسالة من اليوزر', '2022-03-28 14:55:18', '2022-03-28 14:56:27'),
(85, 1, NULL, 1, '2022-03-28', '1', '18:56:31', NULL, 's', '2022-03-28 14:56:31', '2022-03-28 14:57:17'),
(86, 1, 1, NULL, '2022-03-28', '1', '18:56:36', NULL, 'رسالة من اليوزر', '2022-03-28 14:56:36', '2022-03-28 14:57:17'),
(87, 1, NULL, 1, '2022-03-28', '1', '18:57:24', NULL, 'اهلا', '2022-03-28 14:57:24', '2022-03-28 14:59:01'),
(88, 1, 1, NULL, '2022-03-28', '1', '18:57:29', NULL, 'رسالة من اليوزر', '2022-03-28 14:57:29', '2022-03-28 14:59:01'),
(89, 1, NULL, 1, '2022-03-28', '1', '18:59:07', NULL, 'مرخبا', '2022-03-28 14:59:07', '2022-03-28 14:59:48'),
(90, 1, 1, NULL, '2022-03-28', '1', '18:59:11', NULL, 'رسالة من اليوزر', '2022-03-28 14:59:11', '2022-03-28 14:59:48'),
(91, 1, 1, NULL, '2022-03-28', '1', '18:59:52', NULL, 'رسالة من اليوزر', '2022-03-28 14:59:52', '2022-03-28 15:04:35'),
(92, 1, 1, NULL, '2022-03-28', '1', '19:00:00', NULL, 'رسالة من اليوزر', '2022-03-28 15:00:00', '2022-03-28 15:04:36'),
(93, 1, 1, NULL, '2022-03-28', '1', '19:04:28', NULL, 'رسالة من اليوزر', '2022-03-28 15:04:28', '2022-03-28 15:04:36'),
(94, 1, NULL, 1, '2022-03-28', '1', '19:04:44', NULL, 'اهلا', '2022-03-28 15:04:44', '2022-03-28 15:06:12'),
(95, 1, 1, NULL, '2022-03-28', '1', '19:04:48', NULL, 'رسالة من اليوزر', '2022-03-28 15:04:48', '2022-03-28 15:06:12'),
(96, 1, 1, NULL, '2022-03-28', '1', '19:06:17', NULL, 'رسالة من اليوزر', '2022-03-28 15:06:17', '2022-03-28 15:09:15'),
(97, 1, NULL, 1, '2022-03-28', '1', '19:09:22', NULL, 'هلا', '2022-03-28 15:09:22', '2022-03-28 15:14:36'),
(98, 1, 1, NULL, '2022-03-28', '1', '19:09:27', NULL, 'رسالة من اليوزر', '2022-03-28 15:09:27', '2022-03-28 15:14:36'),
(99, 1, NULL, 1, '2022-03-28', '1', '19:14:43', NULL, 'هالا', '2022-03-28 15:14:43', '2022-03-28 15:15:46'),
(100, 1, 1, NULL, '2022-03-28', '1', '19:14:47', NULL, 'رسالة من اليوزر', '2022-03-28 15:14:47', '2022-03-28 15:15:46'),
(101, 1, NULL, 1, '2022-03-28', '1', '19:15:52', NULL, 'هلا', '2022-03-28 15:15:52', '2022-03-28 15:18:18'),
(102, 1, 1, NULL, '2022-03-28', '1', '19:15:56', NULL, 'رسالة من اليوزر', '2022-03-28 15:15:56', '2022-03-28 15:18:18'),
(103, 1, 1, NULL, '2022-03-28', '1', '19:16:21', NULL, 'رسالة من اليوزر', '2022-03-28 15:16:21', '2022-03-28 15:18:18'),
(104, 1, 1, NULL, '2022-03-28', '1', '19:18:21', NULL, 'رسالة من اليوزر', '2022-03-28 15:18:21', '2022-03-28 15:19:49'),
(105, 1, NULL, 1, '2022-03-28', '1', '19:18:29', NULL, 'asd', '2022-03-28 15:18:29', '2022-03-28 15:19:49'),
(106, 1, 1, NULL, '2022-03-28', '1', '19:19:53', NULL, 'رسالة من اليوزر', '2022-03-28 15:19:54', '2022-03-28 15:21:49'),
(107, 1, 1, NULL, '2022-03-28', '1', '19:21:01', NULL, 'رسالة من اليوزر', '2022-03-28 15:21:01', '2022-03-28 15:21:49'),
(108, 1, NULL, 1, '2022-03-28', '1', '19:21:56', NULL, 'اهلا', '2022-03-28 15:21:56', '2022-03-28 15:25:47'),
(109, 1, 1, NULL, '2022-03-28', '1', '19:22:00', NULL, 'رسالة من اليوزر', '2022-03-28 15:22:00', '2022-03-28 15:25:47'),
(110, 1, NULL, 1, '2022-03-28', '1', '19:25:52', NULL, 'هلا', '2022-03-28 15:25:52', '2022-03-28 15:30:55'),
(111, 1, 1, NULL, '2022-03-28', '1', '19:25:57', NULL, 'رسالة من اليوزر', '2022-03-28 15:25:57', '2022-03-28 15:30:55'),
(112, 1, 1, NULL, '2022-03-28', '1', '19:28:21', NULL, 'رسالة من اليوزر', '2022-03-28 15:28:21', '2022-03-28 15:30:55'),
(113, 1, 1, NULL, '2022-03-28', '1', '19:30:59', NULL, 'رسالة من اليوزر', '2022-03-28 15:30:59', '2022-03-28 15:32:46'),
(114, 1, NULL, 1, '2022-03-28', '1', '19:32:52', NULL, 'اهلا', '2022-03-28 15:32:52', '2022-03-28 15:33:21'),
(115, 1, 1, NULL, '2022-03-28', '1', '19:32:55', NULL, 'رسالة من اليوزر', '2022-03-28 15:32:55', '2022-03-28 15:33:21'),
(116, 1, 1, NULL, '2022-03-28', '1', '19:33:18', NULL, 'رسالة من اليوزر', '2022-03-28 15:33:18', '2022-03-28 15:33:21'),
(117, 1, 1, NULL, '2022-03-28', '1', '19:33:28', NULL, 'رسالة من اليوزر', '2022-03-28 15:33:28', '2022-03-28 18:14:57'),
(118, 1, 1, NULL, '2022-03-28', '1', '22:14:42', NULL, 'رسالة من اليوزر', '2022-03-28 18:14:42', '2022-03-28 18:14:57'),
(119, 1, 1, NULL, '2022-03-28', '1', '22:17:35', NULL, 'رسالة من اليوزر', '2022-03-28 18:17:35', '2022-03-28 18:17:39'),
(120, 1, 1, NULL, '2022-03-28', '1', '22:17:43', NULL, 'رسالة من اليوزر', '2022-03-28 18:17:43', '2022-03-28 18:18:15'),
(121, 1, 1, NULL, '2022-03-28', '1', '22:18:03', NULL, 'رسالة من اليوزر 1', '2022-03-28 18:18:03', '2022-03-28 18:18:15'),
(122, 1, 1, NULL, '2022-03-28', '1', '22:18:20', NULL, 'رسالة من اليوزر 1', '2022-03-28 18:18:20', '2022-03-28 18:21:46'),
(123, 1, 1, NULL, '2022-03-28', '1', '22:20:52', NULL, 'رسالة من اليوزر 1', '2022-03-28 18:20:52', '2022-03-28 18:21:46'),
(124, 1, 1, NULL, '2022-03-28', '1', '22:25:09', NULL, 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.', '2022-03-28 18:25:09', '2022-03-28 18:25:26'),
(125, 1, 1, NULL, '2022-03-28', '1', '22:25:20', NULL, 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.', '2022-03-28 18:25:20', '2022-03-28 18:25:26'),
(126, 1, NULL, 1, '2022-03-28', '1', '22:36:08', NULL, 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.', '2022-03-28 18:36:08', '2022-03-28 18:46:13'),
(127, 1, 1, NULL, '2022-03-28', '1', '22:46:20', NULL, 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.', '2022-03-28 18:46:20', '2022-03-28 18:48:40'),
(128, 1, 1, NULL, '2022-03-28', '1', '22:48:13', NULL, ' أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.', '2022-03-28 18:48:13', '2022-03-28 18:48:40'),
(129, 1, 1, NULL, '2022-03-28', '1', '22:48:46', NULL, ' أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.', '2022-03-28 18:48:46', '2022-03-28 18:49:37'),
(130, 1, 1, NULL, '2022-03-28', '1', '22:49:43', NULL, ' أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.', '2022-03-28 18:49:43', '2022-03-28 18:53:55'),
(131, 1, 1, NULL, '2022-03-28', '1', '22:53:59', NULL, ' أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.', '2022-03-28 18:53:59', '2022-03-28 18:54:23'),
(132, 1, 1, NULL, '2022-03-28', '1', '22:54:26', NULL, ' أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.', '2022-03-28 18:54:26', '2022-03-28 18:54:40'),
(133, 1, 1, NULL, '2022-03-28', '1', '22:55:33', NULL, ' أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.', '2022-03-28 18:55:33', '2022-03-28 18:58:30'),
(134, 1, 1, NULL, '2022-03-28', '1', '22:56:05', NULL, ' أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.', '2022-03-28 18:56:05', '2022-03-28 18:58:30'),
(135, 1, 1, NULL, '2022-03-28', '1', '22:56:51', NULL, ' أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.', '2022-03-28 18:56:51', '2022-03-28 18:58:30'),
(136, 1, 1, NULL, '2022-03-28', '1', '22:58:08', NULL, ' أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.', '2022-03-28 18:58:08', '2022-03-28 18:58:30'),
(137, 1, NULL, 1, '2022-03-28', '1', '23:12:17', NULL, 'هلا', '2022-03-28 19:12:17', '2022-03-28 19:14:48'),
(138, 1, NULL, 1, '2022-03-28', '1', '23:14:56', NULL, 'اهلا', '2022-03-28 19:14:56', '2022-03-28 19:15:04'),
(139, 1, NULL, 1, '2022-03-28', '1', '23:16:01', NULL, 'تيست', '2022-03-28 19:16:01', '2022-03-28 19:19:31'),
(140, 1, 1, NULL, '2022-03-28', '1', '23:18:47', NULL, ' أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.', '2022-03-28 19:18:47', '2022-03-28 19:19:31'),
(141, 1, NULL, 1, '2022-03-28', '1', '23:19:06', NULL, 'لما', '2022-03-28 19:19:06', '2022-03-28 19:19:31'),
(142, 1, NULL, 1, '2022-03-28', '1', '23:19:07', NULL, 'لما', '2022-03-28 19:19:07', '2022-03-28 19:19:31'),
(143, 1, NULL, 1, '2022-03-28', '1', '23:20:17', NULL, 'س', '2022-03-28 19:20:17', '2022-03-28 19:24:05'),
(144, 1, 1, NULL, '2022-03-28', '1', '23:23:43', NULL, ' عمد', '2022-03-28 19:23:43', '2022-03-28 19:24:05'),
(145, 1, NULL, 1, '2022-03-28', '1', '23:23:58', NULL, 's', '2022-03-28 19:23:58', '2022-03-28 19:24:05'),
(146, 1, NULL, 1, '2022-03-28', '1', '23:27:41', NULL, 'اهلا', '2022-03-28 19:27:41', '2022-03-28 19:27:47'),
(147, 1, 1, NULL, '2022-03-28', '1', '23:40:51', NULL, ' عمد', '2022-03-28 19:40:51', '2022-03-28 19:40:58'),
(148, 1, 1, NULL, '2022-03-28', '1', '23:41:38', NULL, ' عمد', '2022-03-28 19:41:38', '2022-03-28 20:24:43'),
(149, 1, 1, NULL, '2022-03-28', '1', '23:55:39', NULL, ' عمد', '2022-03-28 19:55:39', '2022-03-28 20:24:43'),
(150, 1, 1, NULL, '2022-03-28', '1', '00:24:50', NULL, ' عمد', '2022-03-28 20:24:50', '2022-03-28 20:33:49'),
(151, 1, 1, NULL, '2022-03-28', '1', '00:26:16', NULL, ' عمد', '2022-03-28 20:26:16', '2022-03-28 20:33:49'),
(152, 1, 1, NULL, '2022-03-28', '1', '00:28:07', NULL, ' عمد', '2022-03-28 20:28:07', '2022-03-28 20:33:49'),
(153, 1, 1, NULL, '2022-03-28', '1', '00:28:22', NULL, ' عمد', '2022-03-28 20:28:22', '2022-03-28 20:33:49'),
(154, 1, 1, NULL, '2022-03-28', '1', '00:30:25', NULL, ' عمد', '2022-03-28 20:30:25', '2022-03-28 20:33:50'),
(155, 1, 1, NULL, '2022-03-28', '1', '00:30:33', NULL, ' عمد', '2022-03-28 20:30:33', '2022-03-28 20:33:50'),
(156, 1, 1, NULL, '2022-03-28', '1', '00:32:57', NULL, ' عمد', '2022-03-28 20:32:57', '2022-03-28 20:33:50'),
(157, 1, 1, NULL, '2022-03-28', '1', '00:33:42', NULL, ' عمد', '2022-03-28 20:33:42', '2022-03-28 20:33:50'),
(158, 1, 1, NULL, '2022-03-28', '1', '00:33:51', NULL, ' عمد', '2022-03-28 20:33:51', '2022-03-28 20:45:22'),
(159, 1, 1, NULL, '2022-03-28', '1', '00:37:56', NULL, ' عمد', '2022-03-28 20:37:56', '2022-03-28 20:45:22'),
(160, 1, 1, NULL, '2022-03-28', '1', '00:39:15', NULL, ' عمد', '2022-03-28 20:39:15', '2022-03-28 20:45:22'),
(161, 1, 1, NULL, '2022-03-28', '1', '00:41:37', NULL, ' عمد', '2022-03-28 20:41:37', '2022-03-28 20:45:22'),
(162, 1, 1, NULL, '2022-03-28', '0', '00:46:05', NULL, ' عمد', '2022-03-28 20:46:05', '2022-03-28 20:46:05'),
(163, 1, 1, NULL, '2022-03-28', '0', '00:46:25', NULL, ' عمد', '2022-03-28 20:46:25', '2022-03-28 20:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `chat_data`
--

CREATE TABLE `chat_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `complaint` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_paid` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `type` enum('visit','online') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'online',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_data`
--

INSERT INTO `chat_data` (`id`, `complaint`, `images`, `user_id`, `is_paid`, `type`, `created_at`, `updated_at`) VALUES
(1, 'come to visit me', '[\"\\/storage\\/uploads\\/ChatData\\/UmVjdGFuZ2xlIDU3OC5wbmc=_1647333744.png\",\"\\/storage\\/uploads\\/ChatData\\/UmVjdGFuZ2xlIDUwOSAoMSkucG5n_1647333744.png\",\"\\/storage\\/uploads\\/ChatData\\/UmVjdGFuZ2xlIDUwOS5wbmc=_1647333744.png\"]', NULL, 'no', 'online', '2022-03-15 06:42:24', '2022-03-15 06:42:24'),
(2, 'come to visit me', '[\"\\/storage\\/uploads\\/ChatData\\/UmVjdGFuZ2xlIDU3OC5wbmc=_1647333765.png\",\"\\/storage\\/uploads\\/ChatData\\/UmVjdGFuZ2xlIDUwOSAoMSkucG5n_1647333765.png\",\"\\/storage\\/uploads\\/ChatData\\/UmVjdGFuZ2xlIDUwOS5wbmc=_1647333765.png\"]', NULL, 'no', 'visit', '2022-03-15 06:42:45', '2022-03-15 06:42:45'),
(3, 'come to visit me', '[\"\\/storage\\/uploads\\/ChatData\\/UmVjdGFuZ2xlIDU3OC5wbmc=_1647333798.png\",\"\\/storage\\/uploads\\/ChatData\\/UmVjdGFuZ2xlIDUwOSAoMSkucG5n_1647333798.png\",\"\\/storage\\/uploads\\/ChatData\\/UmVjdGFuZ2xlIDUwOS5wbmc=_1647333798.png\"]', 1, 'no', 'visit', '2022-03-15 06:43:18', '2022-03-15 06:43:18');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'mohamed gamal', 'mohamed@mohamed.com', 'عنوان', 'رسالة', '2022-03-15 09:23:16', '2022-03-15 09:23:16');

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hours`
--

CREATE TABLE `hours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hour` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `last_images`
--

CREATE TABLE `last_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2022_02_11_160038_create_admins_table', 1),
(3, '2022_03_02_121303_create_sliders_table', 1),
(4, '2022_03_03_081017_create_users_table', 1),
(5, '2022_03_03_081055_create_services_table', 1),
(6, '2022_03_03_081157_create_days_table', 1),
(7, '2022_03_03_081216_create_hours_table', 1),
(8, '2022_03_03_081235_create_about_us_table', 1),
(9, '2022_03_03_081244_create_blogs_table', 1),
(11, '2022_03_03_081427_create_last_images_table', 1),
(15, '2022_03_03_082006_create_reservation_images_table', 1),
(16, '2022_03_03_082151_create_settings_table', 1),
(17, '2022_03_14_131428_create_phone_tokens_table', 2),
(18, '2022_03_03_081318_create_products_table', 3),
(19, '2022_03_14_143226_create_product_images_table', 4),
(20, '2022_03_03_081434_create_orders_table', 5),
(21, '2022_03_15_075204_create_online_consultations_table', 6),
(22, '2022_03_15_081432_create_chat_data_table', 7),
(24, '2022_03_03_081449_create_reservations_table', 8),
(25, '2022_03_15_105805_create_notifications_table', 9),
(26, '2022_02_10_210652_create_contact_us_table', 10),
(27, '2022_03_28_094621_create_rooms_table', 11),
(29, '2022_03_03_081959_create_chats_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `text`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'رسالة جديدة', 'اهلا ومرحبا بكم', 1, '2022-03-15 09:04:50', '2022-03-15 08:04:50');

-- --------------------------------------------------------

--
-- Table structure for table `online_consultations`
--

CREATE TABLE `online_consultations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('online','visit') COLLATE utf8mb4_unicode_ci DEFAULT 'online',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `online_consultations`
--

INSERT INTO `online_consultations` (`id`, `image`, `title_ar`, `title_en`, `details_ar`, `details_en`, `type`, `created_at`, `updated_at`) VALUES
(1, 'storage/uploads/OnlineConsultation/Online Consultation.png', 'الاستشارة عبر الإنترنت', 'Online counseling', 'هناك العديد من الأسباب التي تجعل الناس يرغبون في استشارة طبيب عبر الإنترنت. قد يكون بسبب ضيق المسافة أو الوقت. قد يكون أيضًا بسبب تفضيل المريض للخصوصية أو الراحة.\r\n\r\nأصبحت الاستشارات عبر الإنترنت أكثر شيوعًا الآن ، حيث أصبح بإمكان الأطباء تقديم خدماتهم في بيئة افتراضية ، يمكن الوصول إليها من أي مكان وفي أي وقت.', 'There are many reasons why people would want to consult a doctor online. It might be because of the distance or time constraints. It might also be because of the patient\'s preference for privacy or for convenience.\r\n\r\nOnline consultations are now becoming more and more popular, as doctors are able to offer their services in a virtual environment, which is accessible from anywhere at any time.', 'online', NULL, NULL),
(2, 'storage/uploads/OnlineConsultation/Rectangle 521.png', 'تحديد زيارة منزلية', 'Determine a home visit\r\n', 'يقوم الأطباء الآن بزيارة المرضى في منازلهم. هذه طريقة للمرضى لتوفير الوقت والمال ، لأنهم لا يضطرون إلى زيارة مكتب الطبيب أو المستشفى.\r\n\r\nسيقوم الأطباء بزيارة المرضى الذين يعيشون في المناطق النائية فقط. سيقومون أيضًا بزيارة المرضى المسنين أو المعاقين ولا يمكنهم الخروج من المنزل بسهولة.', 'Doctors are now visiting patients at their homes. This is a way for patients to save time and money, because they don\'t have to visit the doctor’s office or hospital.\r\n\r\nDoctors will only visit patients who live in remote areas. They will also visit patients who are elderly or disabled and can\'t get out of the house easily.', 'visit', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` double DEFAULT 0,
  `price` double DEFAULT 0,
  `total_price` double DEFAULT 0,
  `latitude` double DEFAULT 0,
  `longitude` double DEFAULT 0,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('new','accepted','refused','ended') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `user_id`, `amount`, `price`, `total_price`, `latitude`, `longitude`, `address`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, 10, 90, 10.5, 5.5, 'القاهره', 'ملاحظه', 'new', '2022-03-14 14:02:51', '2022-03-15 08:57:27'),
(2, 1, 1, 3, 10, 30, 10.5, 5.5, 'القاهره', 'ملاحظه', 'new', '2022-03-14 14:02:51', '2022-03-14 14:02:51'),
(3, 1, 1, 3, 10, 30, 10.5, 5.5, 'القاهره', 'ملاحظه', 'refused', '2022-03-14 14:02:51', '2022-03-14 14:02:51');

-- --------------------------------------------------------

--
-- Table structure for table `phone_tokens`
--

CREATE TABLE `phone_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `phone_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('ios','android') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL DEFAULT 0,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `price`, `title_ar`, `title_en`, `details_ar`, `details_en`, `created_at`, `updated_at`) VALUES
(1, 'storage/uploads/product/product.png', 10, 'سماعه', 'headphone', '<h2>الوصف</h2>', '<h2>disc</h2>', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'storage/uploads/product/product2.png', 1, NULL, NULL),
(2, 'storage/uploads/product/product2.png', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `complaint` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date_time` bigint(20) DEFAULT NULL,
  `status` enum('new','accepted','refused','ended') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `total_price` double DEFAULT 0,
  `latitude` double DEFAULT 0,
  `longitude` double DEFAULT 0,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `complaint`, `images`, `service_id`, `user_id`, `date_time`, `status`, `total_price`, `latitude`, `longitude`, `address`, `created_at`, `updated_at`) VALUES
(12, 'كشف', '[\"storage\\/uploads\\/Reservation\\/T25saW5lIENvbnN1bHRhdGlvbi5wbmc=_1647341484.png\"]', 1, 1, 1647338100, 'new', 50, NULL, NULL, NULL, '2022-03-15 08:16:01', '2022-03-15 08:51:24');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-03-28 07:51:35', '2022-03-28 07:51:35'),
(2, 2, '2022-03-28 07:51:35', '2022-03-28 07:51:35');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title_ar`, `title_en`, `created_at`, `updated_at`) VALUES
(1, 'كشف باطنة', 'internal examination', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `terms` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privacy` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `online_price` double DEFAULT NULL,
  `home_visit_price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `terms`, `privacy`, `facebook`, `insta`, `twitter`, `linkedin`, `online_price`, `home_visit_price`, `created_at`, `updated_at`) VALUES
(1, 'الشروط والأحكام', 'الامان', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://twitter.com/', 'https://linkedin.com/', 50, 60, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `created_at`, `updated_at`) VALUES
(2, 'storage/uploads/slider/1.png', NULL, NULL),
(3, 'storage/uploads/slider/2.png', NULL, NULL),
(4, 'storage/uploads/slider/3.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone_code`, `phone`, `email`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Ahmed yahya', '+20', '1026638997', 'ahmed@gmail.com', 'storage/uploads/users/1647263010--MTY0NzI2MzAxMC1iVzlvWVcxbFpDQm5ZVzFoYkE9PQ==.png', '2022-03-14 11:03:30', '2022-03-14 11:12:05'),
(2, 'mohamed gamal', '+20', '1095081882', 'mohamed2@gmail.com', 'storage/uploads/users/1647263565--MTY0NzI2MzU2NS1iVzlvWVcxbFpDQm5ZVzFoYkE9PQ==.png', '2022-03-14 11:12:45', '2022-03-14 11:12:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chats_room_id_foreign` (`room_id`),
  ADD KEY `chats_from_user_id_foreign` (`from_user_id`),
  ADD KEY `chats_to_user_id_foreign` (`to_user_id`);

--
-- Indexes for table `chat_data`
--
ALTER TABLE `chat_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_data_user_id_foreign` (`user_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hours`
--
ALTER TABLE `hours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `last_images`
--
ALTER TABLE `last_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `online_consultations`
--
ALTER TABLE `online_consultations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_product_id_foreign` (`product_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `phone_tokens`
--
ALTER TABLE `phone_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phone_tokens_user_id_foreign` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_service_id_foreign` (`service_id`),
  ADD KEY `reservations_user_id_foreign` (`user_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_user_id_foreign` (`user_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `chat_data`
--
ALTER TABLE `chat_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hours`
--
ALTER TABLE `hours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `last_images`
--
ALTER TABLE `last_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `online_consultations`
--
ALTER TABLE `online_consultations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `phone_tokens`
--
ALTER TABLE `phone_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_from_user_id_foreign` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chats_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chats_to_user_id_foreign` FOREIGN KEY (`to_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chat_data`
--
ALTER TABLE `chat_data`
  ADD CONSTRAINT `chat_data_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phone_tokens`
--
ALTER TABLE `phone_tokens`
  ADD CONSTRAINT `phone_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
