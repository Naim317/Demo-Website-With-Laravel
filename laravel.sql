-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2021 at 06:53 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `email`, `password`) VALUES
(1, 'Admin Sir', 'admin', 'admin@gmail.com', '123456@');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_msg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `contact_name`, `contact_mobile`, `contact_email`, `contact_msg`) VALUES
(2, '213e23e2', 'r32r23r', 'r32r32r', 'r23r2323r'),
(3, '1231', '12321', '21313', '213213'),
(10, 'edwdwdwed', 'wedwedwe', 'weedwedwe', 'dwedwedwed');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_totalenroll` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_totalclass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_des`, `course_fee`, `course_totalenroll`, `course_totalclass`, `course_link`, `course_img`) VALUES
(1, 'Project01', 'We Provide You the best from our side', 'One Million Only', '200', '350', 'https://laravel.rabbil.com/login', 'http://localhost/images/android.jpg'),
(2, 'Project02', 'We Provide You the best from our side', 'One Million Only', '500', '350', 'https://laravel.rabbil.com/login', 'http://localhost/images/react.jpg'),
(3, 'Project03', 'We Provide You the best from our side', 'One Million Only', '300', '350', 'https://laravel.rabbil.com/login', 'http://localhost/images/laravel.jpg'),
(4, 'Project04', 'We Provide You the best from our side', 'One Million Only', '400', '350', 'https://laravel.rabbil.com/login', 'http://localhost/images/jwt.png'),
(5, 'Project05', 'We Provide You the best from our side', 'One Million Only', '600', '350', 'https://laravel.rabbil.com/login', 'http://localhost/images/android.jpg'),
(20, 'Project06', 'We Provide You the best from our side', 'One Million Only', '300', '350', 'https://laravel.rabbil.com/login', 'http://localhost/images/laravel.jpg'),
(21, 'Project07', 'We Provide You the best from our side', 'One Million Only', '400', '350', 'https://laravel.rabbil.com/login', 'http://localhost/images/jwt.png'),
(22, 'Project08', 'We Provide You the best from our side', 'One Million Only', '600', '350', 'https://laravel.rabbil.com/login', 'http://localhost/images/android.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(1, '2021_06_06_173556_visitor_table', 1),
(2, '2021_06_07_193657_services_table', 2),
(3, '2021_06_15_155012_course_table', 3),
(4, '2021_06_21_180943_projects_table', 4),
(5, '2021_06_23_102331_contact_table', 5),
(6, '2021_06_24_071956_review_table', 6),
(7, '2014_10_12_000000_create_users_table', 7),
(8, '2019_08_19_000000_create_failed_jobs_table', 7),
(9, '2021_07_08_212907_admin_table', 7),
(10, '2021_07_10_132035_photo_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id`, `location`) VALUES
(499, 'http://127.0.0.1:8000/storage/vhKxDMKdsLyHiVn1mFs5FF4EDGsD2xwgILoOK8eg.jpg'),
(500, 'http://127.0.0.1:8000/storage/vwOGt9OkFflqqVxqztWpFV2ItittyigEsWt0DrYO.jpg'),
(501, 'http://127.0.0.1:8000/storage/TyFSm5F7ywcddUc8jnq9a46yH6xURdiPX6MTLEb9.jpg'),
(502, 'http://127.0.0.1:8000/storage/UgGMsJX0oiJPSA2ETJ37CfJ3XMWZEpUgr0B44EDa.jpg'),
(503, 'http://127.0.0.1:8000/storage/C7FgSTBE9Ny6EBlkQdCYf0ty4xElVMPEkze5FaFv.jpg'),
(504, 'http://127.0.0.1:8000/storage/6UIoDiAu8IZ04Fu2z08UIWTwSg8WH8PZv5PPudHc.jpg'),
(505, 'http://127.0.0.1:8000/storage/d5N5kQcMamdFYB3eF8QASCBPRGSlUrz6bfwdv1gI.jpg'),
(506, 'http://127.0.0.1:8000/storage/pwOSQNeNJwVI3Smu4LAtIvczFPc3gWHxICARwzv6.jpg'),
(507, 'http://127.0.0.1:8000/storage/RmwBeT2anEWRyGmpB6SsTEvSMXwPIhRI8xhxHUpI.jpg'),
(508, 'http://127.0.0.1:8000/storage/t7hsEifdSEhKdZZpRl9Q3ZG6m1Dzd8239UlK59Nd.jpg'),
(509, 'http://127.0.0.1:8000/storage/5gOnREfgwwjqABgyeiJlbYjzPNDMJ10oYFgoOhSR.jpg'),
(510, 'http://127.0.0.1:8000/storage/3guUSLi1nIJ0B7Dju20JhIkI1mWlwR5vpx70RFuD.jpg'),
(511, 'http://127.0.0.1:8000/storage/3guUSLi1nIJ0B7Dju20JhIkI1mWlwR5vpx70RFuD.jpg'),
(512, 'http://127.0.0.1:8000/storage/5gOnREfgwwjqABgyeiJlbYjzPNDMJ10oYFgoOhSR.jpg'),
(513, 'http://127.0.0.1:8000/storage/6UIoDiAu8IZ04Fu2z08UIWTwSg8WH8PZv5PPudHc.jpg'),
(514, 'http://127.0.0.1:8000/storage/C7FgSTBE9Ny6EBlkQdCYf0ty4xElVMPEkze5FaFv.jpg'),
(515, 'http://127.0.0.1:8000/storage/d5N5kQcMamdFYB3eF8QASCBPRGSlUrz6bfwdv1gI.jpg'),
(516, 'http://127.0.0.1:8000/storage/g86YsBWP1nyEiGFgUuKXmJLbsJshcYZuN1JDStv2.jpg'),
(517, 'http://127.0.0.1:8000/storage/GOwQpe64Kqi2ZpzOTnwmG1497owV4FhKf4d1TS0l.jpg'),
(518, 'http://127.0.0.1:8000/storage/kwooDMNBT8v1wN4xuDmMO3Y5gfFSnzJPtUJcYgJX.jpg'),
(519, 'http://127.0.0.1:8000/storage/lUTRp340A8IB9ka8nwHGTcyUysaxFsF8Xm8fF1xN.jpg'),
(520, 'http://127.0.0.1:8000/storage/pwOSQNeNJwVI3Smu4LAtIvczFPc3gWHxICARwzv6.jpg'),
(521, 'http://127.0.0.1:8000/storage/RmwBeT2anEWRyGmpB6SsTEvSMXwPIhRI8xhxHUpI.jpg'),
(522, 'http://127.0.0.1:8000/storage/t7hsEifdSEhKdZZpRl9Q3ZG6m1Dzd8239UlK59Nd.jpg'),
(523, 'http://127.0.0.1:8000/storage/TyFSm5F7ywcddUc8jnq9a46yH6xURdiPX6MTLEb9.jpg'),
(524, 'http://127.0.0.1:8000/storage/UgGMsJX0oiJPSA2ETJ37CfJ3XMWZEpUgr0B44EDa.jpg'),
(525, 'http://127.0.0.1:8000/storage/VCEJHbdPikBsTjlb0QUZYz9vrzEBi5oGXvSEV8EZ.jpg'),
(526, 'http://127.0.0.1:8000/storage/vhKxDMKdsLyHiVn1mFs5FF4EDGsD2xwgILoOK8eg.jpg'),
(527, 'http://127.0.0.1:8000/storage/vwOGt9OkFflqqVxqztWpFV2ItittyigEsWt0DrYO.jpg'),
(528, 'http://127.0.0.1:8000/storage/wwTzLgpzhY6W6lJA3tWlcyGKhtPWPRHK7CMgNWuN.jpg'),
(529, 'http://127.0.0.1:8000/storage/xwxAXd9ExboHYIzURDM2TLpJbViAJLH3LqzI17Gs.jpg'),
(530, 'http://127.0.0.1:8000/storage/ZDGPC1BOlXox0FtOGm0pVWYKOr61mQulwSutbWgX.jpg'),
(531, 'http://127.0.0.1:8000/storage/3guUSLi1nIJ0B7Dju20JhIkI1mWlwR5vpx70RFuD.jpg'),
(532, 'http://127.0.0.1:8000/storage/3guUSLi1nIJ0B7Dju20JhIkI1mWlwR5vpx70RFuD.jpg'),
(533, 'http://127.0.0.1:8000/storage/5gOnREfgwwjqABgyeiJlbYjzPNDMJ10oYFgoOhSR.jpg'),
(534, 'http://127.0.0.1:8000/storage/5gOnREfgwwjqABgyeiJlbYjzPNDMJ10oYFgoOhSR.jpg'),
(535, 'http://127.0.0.1:8000/storage/6UIoDiAu8IZ04Fu2z08UIWTwSg8WH8PZv5PPudHc.jpg'),
(536, 'http://127.0.0.1:8000/storage/6UIoDiAu8IZ04Fu2z08UIWTwSg8WH8PZv5PPudHc.jpg'),
(537, 'http://127.0.0.1:8000/storage/C7FgSTBE9Ny6EBlkQdCYf0ty4xElVMPEkze5FaFv.jpg'),
(538, 'http://127.0.0.1:8000/storage/C7FgSTBE9Ny6EBlkQdCYf0ty4xElVMPEkze5FaFv.jpg'),
(539, 'http://127.0.0.1:8000/storage/d5N5kQcMamdFYB3eF8QASCBPRGSlUrz6bfwdv1gI.jpg'),
(540, 'http://127.0.0.1:8000/storage/d5N5kQcMamdFYB3eF8QASCBPRGSlUrz6bfwdv1gI.jpg'),
(541, 'http://127.0.0.1:8000/storage/g86YsBWP1nyEiGFgUuKXmJLbsJshcYZuN1JDStv2.jpg'),
(542, 'http://127.0.0.1:8000/storage/g86YsBWP1nyEiGFgUuKXmJLbsJshcYZuN1JDStv2.jpg'),
(543, 'http://127.0.0.1:8000/storage/GOwQpe64Kqi2ZpzOTnwmG1497owV4FhKf4d1TS0l.jpg'),
(544, 'http://127.0.0.1:8000/storage/GOwQpe64Kqi2ZpzOTnwmG1497owV4FhKf4d1TS0l.jpg'),
(545, 'http://127.0.0.1:8000/storage/kwooDMNBT8v1wN4xuDmMO3Y5gfFSnzJPtUJcYgJX.jpg'),
(546, 'http://127.0.0.1:8000/storage/kwooDMNBT8v1wN4xuDmMO3Y5gfFSnzJPtUJcYgJX.jpg'),
(547, 'http://127.0.0.1:8000/storage/lUTRp340A8IB9ka8nwHGTcyUysaxFsF8Xm8fF1xN.jpg'),
(548, 'http://127.0.0.1:8000/storage/lUTRp340A8IB9ka8nwHGTcyUysaxFsF8Xm8fF1xN.jpg'),
(549, 'http://127.0.0.1:8000/storage/pwOSQNeNJwVI3Smu4LAtIvczFPc3gWHxICARwzv6.jpg'),
(550, 'http://127.0.0.1:8000/storage/pwOSQNeNJwVI3Smu4LAtIvczFPc3gWHxICARwzv6.jpg'),
(551, 'http://127.0.0.1:8000/storage/RmwBeT2anEWRyGmpB6SsTEvSMXwPIhRI8xhxHUpI.jpg'),
(552, 'http://127.0.0.1:8000/storage/RmwBeT2anEWRyGmpB6SsTEvSMXwPIhRI8xhxHUpI.jpg'),
(553, 'http://127.0.0.1:8000/storage/t7hsEifdSEhKdZZpRl9Q3ZG6m1Dzd8239UlK59Nd.jpg'),
(554, 'http://127.0.0.1:8000/storage/t7hsEifdSEhKdZZpRl9Q3ZG6m1Dzd8239UlK59Nd.jpg'),
(555, 'http://127.0.0.1:8000/storage/TyFSm5F7ywcddUc8jnq9a46yH6xURdiPX6MTLEb9.jpg'),
(556, 'http://127.0.0.1:8000/storage/TyFSm5F7ywcddUc8jnq9a46yH6xURdiPX6MTLEb9.jpg'),
(557, 'http://127.0.0.1:8000/storage/UgGMsJX0oiJPSA2ETJ37CfJ3XMWZEpUgr0B44EDa.jpg'),
(558, 'http://127.0.0.1:8000/storage/UgGMsJX0oiJPSA2ETJ37CfJ3XMWZEpUgr0B44EDa.jpg'),
(559, 'http://127.0.0.1:8000/storage/VCEJHbdPikBsTjlb0QUZYz9vrzEBi5oGXvSEV8EZ.jpg'),
(560, 'http://127.0.0.1:8000/storage/VCEJHbdPikBsTjlb0QUZYz9vrzEBi5oGXvSEV8EZ.jpg'),
(561, 'http://127.0.0.1:8000/storage/vhKxDMKdsLyHiVn1mFs5FF4EDGsD2xwgILoOK8eg.jpg'),
(562, 'http://127.0.0.1:8000/storage/vhKxDMKdsLyHiVn1mFs5FF4EDGsD2xwgILoOK8eg.jpg'),
(563, 'http://127.0.0.1:8000/storage/vwOGt9OkFflqqVxqztWpFV2ItittyigEsWt0DrYO.jpg'),
(564, 'http://127.0.0.1:8000/storage/vwOGt9OkFflqqVxqztWpFV2ItittyigEsWt0DrYO.jpg'),
(565, 'http://127.0.0.1:8000/storage/wwTzLgpzhY6W6lJA3tWlcyGKhtPWPRHK7CMgNWuN.jpg'),
(566, 'http://127.0.0.1:8000/storage/wwTzLgpzhY6W6lJA3tWlcyGKhtPWPRHK7CMgNWuN.jpg'),
(567, 'http://127.0.0.1:8000/storage/xwxAXd9ExboHYIzURDM2TLpJbViAJLH3LqzI17Gs.jpg'),
(568, 'http://127.0.0.1:8000/storage/xwxAXd9ExboHYIzURDM2TLpJbViAJLH3LqzI17Gs.jpg'),
(569, 'http://127.0.0.1:8000/storage/ZDGPC1BOlXox0FtOGm0pVWYKOr61mQulwSutbWgX.jpg'),
(570, 'http://127.0.0.1:8000/storage/ZDGPC1BOlXox0FtOGm0pVWYKOr61mQulwSutbWgX.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `project_des`, `project_link`, `project_img`) VALUES
(1, 'IT Course 01', 'WEB Application Development', 'www.google.com', 'http://localhost/images/poject.jpg'),
(2, 'IT Course 02', 'WEB Application Development', 'www.facebook.com', 'http://localhost/images/knowledge.svg'),
(3, 'IT Course 03', 'WEB Application Development', 'www.google.com', 'http://localhost/images/poject.jpg'),
(4, 'IT Course 04', 'WEB Application Development', 'www.facebook.com', 'http://localhost/images/knowledge.svg'),
(10, 'IT Course 05', 'WEB Application Development', 'www.google.com', 'http://localhost/images/poject.jpg'),
(11, 'IT Course 06', 'WEB Application Development', 'www.facebook.com', 'http://localhost/images/knowledge.svg'),
(12, 'IT Course 07', 'WEB Application Development', 'www.google.com', 'http://localhost/images/poject.jpg'),
(13, 'IT Course 08', 'WEB Application Development', 'www.facebook.com', 'http://localhost/images/knowledge.svg');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `name`, `des`, `img`) VALUES
(2, 'Shahed Mahmud Lemon', 'Become a fan. Thanks for the wonderful service.', 'http://localhost/images/lemon.jpg'),
(5, 'Abdur Rahman Shuvo', 'Ami Shuvo the ExcuseMan ensure you to by courses and get services from ZPO.', 'http://localhost/images/shuvo.jpg'),
(6, 'Shahed Mahmud Lemon', 'Don\'t Trust me.', 'http://localhost/images/lemon.jpg'),
(7, 'Abdur Rahman Shuvo', 'Gharer Rog taan diche...Byeee', 'http://localhost/images/shuvo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_des`, `service_img`) VALUES
(43, 'Source Code 01', 'WEB Development', 'http://localhost/images/code.svg'),
(44, 'Source Code 02', 'WEB Development', 'http://localhost/images/code.svg'),
(63, 'Source Code 04', 'WEB Development', 'http://localhost/images/code.svg'),
(64, 'Source Code 03', 'WEB Development', 'http://localhost/images/code.svg'),
(65, 'Source Code 05', 'WEB Development', 'http://localhost/images/code.svg'),
(66, 'Source Code 06', 'WEB Development', 'http://localhost/images/code.svg'),
(67, 'Source Code 07', 'WEB Development', 'http://localhost/images/code.svg'),
(68, 'Source Code 08', 'WEB Development', 'http://localhost/images/code.svg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visit_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `ip_address`, `visit_time`) VALUES
(1, '127.0.0.1', '2021-06-07 12:08:32am'),
(2, '127.0.0.1', '2021-06-07 12:08:35am'),
(3, '127.0.0.1', '2021-06-07 12:08:36am'),
(4, '127.0.0.1', '2021-06-07 12:08:38am'),
(5, '127.0.0.1', '2021-06-07 01:32:39am'),
(6, '127.0.0.1', '2021-06-08 12:51:15am'),
(7, '127.0.0.1', '2021-06-08 12:51:19am'),
(8, '127.0.0.1', '2021-06-08 12:51:21am'),
(9, '127.0.0.1', '2021-06-08 12:51:24am'),
(10, '127.0.0.1', '2021-06-08 12:51:26am'),
(11, '127.0.0.1', '2021-06-08 12:52:41am'),
(12, '127.0.0.1', '2021-06-08 12:52:52am'),
(13, '127.0.0.1', '2021-06-08 12:53:07am'),
(14, '127.0.0.1', '2021-06-08 01:07:59am'),
(15, '127.0.0.1', '2021-06-08 01:07:59am'),
(16, '127.0.0.1', '2021-06-08 01:08:00am'),
(17, '127.0.0.1', '2021-06-08 01:08:01am'),
(18, '127.0.0.1', '2021-06-08 01:08:01am'),
(19, '127.0.0.1', '2021-06-08 01:08:02am'),
(20, '127.0.0.1', '2021-06-08 01:08:02am'),
(21, '127.0.0.1', '2021-06-08 01:08:03am'),
(22, '127.0.0.1', '2021-06-08 01:08:03am'),
(23, '127.0.0.1', '2021-06-08 01:08:03am'),
(24, '127.0.0.1', '2021-06-08 01:08:04am'),
(25, '127.0.0.1', '2021-06-08 01:08:04am'),
(26, '127.0.0.1', '2021-06-08 01:08:05am'),
(27, '127.0.0.1', '2021-06-08 01:08:06am'),
(28, '127.0.0.1', '2021-06-08 01:08:06am'),
(29, '127.0.0.1', '2021-06-08 01:08:07am'),
(30, '127.0.0.1', '2021-06-08 01:25:28am'),
(31, '127.0.0.1', '2021-06-08 01:26:45am'),
(32, '127.0.0.1', '2021-06-08 01:30:17am'),
(33, '127.0.0.1', '2021-06-08 02:11:25am'),
(34, '127.0.0.1', '2021-06-08 02:12:43am'),
(35, '127.0.0.1', '2021-06-08 06:22:15pm'),
(36, '127.0.0.1', '2021-06-09 09:07:29pm'),
(37, '127.0.0.1', '2021-06-09 09:07:32pm'),
(38, '127.0.0.1', '2021-06-09 09:07:33pm'),
(39, '127.0.0.1', '2021-06-09 09:07:35pm'),
(40, '127.0.0.1', '2021-06-09 09:07:36pm'),
(41, '127.0.0.1', '2021-06-09 09:07:37pm'),
(42, '127.0.0.1', '2021-06-09 09:07:39pm'),
(43, '127.0.0.1', '2021-06-09 09:07:40pm'),
(44, '127.0.0.1', '2021-06-09 09:14:06pm'),
(45, '127.0.0.1', '2021-06-09 09:14:07pm'),
(46, '127.0.0.1', '2021-06-09 09:14:08pm'),
(47, '127.0.0.1', '2021-06-09 09:14:10pm'),
(48, '127.0.0.1', '2021-06-09 09:14:17pm'),
(49, '127.0.0.1', '2021-06-09 09:14:20pm'),
(50, '127.0.0.1', '2021-06-09 09:14:24pm'),
(51, '127.0.0.1', '2021-06-10 08:59:52pm'),
(52, '127.0.0.1', '2021-06-10 09:00:25pm'),
(53, '127.0.0.1', '2021-06-11 12:05:14am'),
(54, '127.0.0.1', '2021-06-11 12:48:45am'),
(55, '127.0.0.1', '2021-06-11 02:04:18am'),
(56, '127.0.0.1', '2021-06-15 08:29:27pm'),
(57, '127.0.0.1', '2021-06-15 08:30:55pm'),
(58, '127.0.0.1', '2021-06-15 08:32:18pm'),
(59, '127.0.0.1', '2021-06-15 08:33:46pm'),
(60, '127.0.0.1', '2021-06-15 08:34:21pm'),
(61, '127.0.0.1', '2021-06-15 08:34:32pm'),
(62, '127.0.0.1', '2021-06-15 08:34:43pm'),
(63, '127.0.0.1', '2021-06-15 08:35:27pm'),
(64, '127.0.0.1', '2021-06-15 08:43:31pm'),
(65, '127.0.0.1', '2021-06-15 09:37:57pm'),
(66, '127.0.0.1', '2021-06-15 10:03:34pm'),
(67, '127.0.0.1', '2021-06-15 10:03:40pm'),
(68, '127.0.0.1', '2021-06-15 11:32:18pm'),
(69, '127.0.0.1', '2021-06-15 11:39:51pm'),
(70, '127.0.0.1', '2021-06-15 11:40:38pm'),
(71, '127.0.0.1', '2021-06-15 11:53:22pm'),
(72, '127.0.0.1', '2021-06-16 01:38:07am'),
(73, '127.0.0.1', '2021-06-22 12:07:15am'),
(74, '127.0.0.1', '2021-06-22 12:23:04am'),
(75, '127.0.0.1', '2021-06-22 12:24:10am'),
(76, '127.0.0.1', '2021-06-22 12:24:35am'),
(77, '127.0.0.1', '2021-06-22 12:24:57am'),
(78, '127.0.0.1', '2021-06-22 12:37:29am'),
(79, '127.0.0.1', '2021-06-22 12:39:36am'),
(80, '127.0.0.1', '2021-06-22 12:41:12am'),
(81, '127.0.0.1', '2021-06-22 12:45:41am'),
(82, '127.0.0.1', '2021-06-23 02:41:44am'),
(83, '127.0.0.1', '2021-06-23 02:41:45am'),
(84, '127.0.0.1', '2021-06-23 02:43:38am'),
(85, '127.0.0.1', '2021-06-23 02:50:22am'),
(86, '127.0.0.1', '2021-06-23 04:16:13pm'),
(87, '127.0.0.1', '2021-06-23 04:16:49pm'),
(88, '127.0.0.1', '2021-06-23 04:16:53pm'),
(89, '127.0.0.1', '2021-06-23 04:17:11pm'),
(90, '127.0.0.1', '2021-06-23 04:17:32pm'),
(91, '127.0.0.1', '2021-06-23 04:18:56pm'),
(92, '127.0.0.1', '2021-06-23 04:19:27pm'),
(93, '127.0.0.1', '2021-06-23 04:19:30pm'),
(94, '127.0.0.1', '2021-06-23 04:19:40pm'),
(95, '127.0.0.1', '2021-06-23 04:19:56pm'),
(96, '127.0.0.1', '2021-06-23 05:22:35pm'),
(97, '127.0.0.1', '2021-06-23 05:23:40pm'),
(98, '127.0.0.1', '2021-06-23 05:26:46pm'),
(99, '127.0.0.1', '2021-06-23 05:27:38pm'),
(100, '127.0.0.1', '2021-06-23 05:36:08pm'),
(101, '127.0.0.1', '2021-06-23 05:39:55pm'),
(102, '127.0.0.1', '2021-06-23 05:42:17pm'),
(103, '127.0.0.1', '2021-06-23 05:43:12pm'),
(104, '127.0.0.1', '2021-06-23 07:30:50pm'),
(105, '127.0.0.1', '2021-06-23 07:33:34pm'),
(106, '127.0.0.1', '2021-06-23 11:02:46pm'),
(107, '127.0.0.1', '2021-06-23 11:04:07pm'),
(108, '127.0.0.1', '2021-06-23 11:07:20pm'),
(109, '127.0.0.1', '2021-06-24 12:40:26am'),
(110, '127.0.0.1', '2021-06-24 12:43:42am'),
(111, '127.0.0.1', '2021-06-24 12:43:56am'),
(112, '127.0.0.1', '2021-06-24 12:44:34am'),
(113, '127.0.0.1', '2021-06-24 12:44:51am'),
(114, '127.0.0.1', '2021-06-24 12:55:05am'),
(115, '127.0.0.1', '2021-06-24 01:02:57am'),
(116, '127.0.0.1', '2021-06-24 01:06:11am'),
(117, '127.0.0.1', '2021-06-24 01:11:51am'),
(118, '127.0.0.1', '2021-06-24 02:15:43am'),
(119, '127.0.0.1', '2021-06-24 01:39:44pm'),
(120, '127.0.0.1', '2021-06-24 01:41:05pm'),
(121, '127.0.0.1', '2021-06-24 01:41:36pm'),
(122, '127.0.0.1', '2021-06-24 02:26:56pm'),
(123, '127.0.0.1', '2021-06-24 02:28:03pm'),
(124, '127.0.0.1', '2021-06-24 02:28:34pm'),
(125, '127.0.0.1', '2021-06-24 05:33:11pm'),
(126, '127.0.0.1', '2021-06-24 05:41:58pm'),
(127, '127.0.0.1', '2021-06-24 05:42:03pm'),
(128, '127.0.0.1', '2021-06-24 05:42:07pm'),
(129, '127.0.0.1', '2021-06-24 05:42:13pm'),
(130, '127.0.0.1', '2021-06-24 05:42:57pm'),
(131, '127.0.0.1', '2021-06-24 05:43:03pm'),
(132, '127.0.0.1', '2021-06-24 05:43:07pm'),
(133, '127.0.0.1', '2021-06-24 05:44:02pm'),
(134, '127.0.0.1', '2021-06-24 05:44:06pm'),
(135, '127.0.0.1', '2021-06-24 05:44:20pm'),
(136, '127.0.0.1', '2021-06-24 05:55:28pm'),
(137, '127.0.0.1', '2021-06-24 05:58:55pm'),
(138, '127.0.0.1', '2021-06-24 06:11:15pm'),
(139, '127.0.0.1', '2021-06-24 06:12:06pm'),
(140, '127.0.0.1', '2021-06-24 06:12:52pm'),
(141, '127.0.0.1', '2021-06-24 06:13:43pm'),
(142, '127.0.0.1', '2021-06-24 06:14:02pm'),
(143, '127.0.0.1', '2021-06-24 06:18:05pm'),
(144, '127.0.0.1', '2021-06-24 10:47:59pm'),
(145, '127.0.0.1', '2021-06-24 10:59:28pm'),
(146, '127.0.0.1', '2021-06-24 11:10:06pm'),
(147, '127.0.0.1', '2021-06-25 12:06:57am'),
(148, '127.0.0.1', '2021-06-25 12:10:12am'),
(149, '127.0.0.1', '2021-06-25 12:12:13am'),
(150, '127.0.0.1', '2021-06-25 12:28:09am'),
(151, '127.0.0.1', '2021-06-25 12:30:47am'),
(152, '127.0.0.1', '2021-06-25 01:27:57am'),
(153, '127.0.0.1', '2021-06-25 02:35:50am'),
(154, '127.0.0.1', '2021-06-29 11:21:28pm'),
(155, '127.0.0.1', '2021-07-08 10:30:43pm'),
(156, '127.0.0.1', '2021-07-08 10:49:55pm'),
(157, '127.0.0.1', '2021-07-12 04:57:41pm'),
(158, '127.0.0.1', '2021-07-12 04:59:30pm'),
(159, '127.0.0.1', '2021-07-12 05:01:42pm'),
(160, '127.0.0.1', '2021-07-12 05:05:14pm'),
(161, '127.0.0.1', '2021-07-12 05:06:23pm'),
(162, '127.0.0.1', '2021-07-12 05:08:17pm'),
(163, '127.0.0.1', '2021-07-12 05:10:02pm'),
(164, '127.0.0.1', '2021-07-12 05:12:08pm'),
(165, '127.0.0.1', '2021-07-12 05:14:34pm'),
(166, '127.0.0.1', '2021-07-12 05:21:05pm'),
(167, '127.0.0.1', '2021-07-12 05:21:23pm'),
(168, '127.0.0.1', '2021-07-12 05:22:35pm'),
(169, '127.0.0.1', '2021-07-12 05:23:03pm'),
(170, '127.0.0.1', '2021-07-12 05:25:52pm'),
(171, '127.0.0.1', '2021-07-12 05:32:33pm'),
(172, '127.0.0.1', '2021-07-12 05:33:08pm'),
(173, '127.0.0.1', '2021-07-12 05:33:40pm'),
(174, '127.0.0.1', '2021-07-12 05:38:39pm'),
(175, '127.0.0.1', '2021-07-12 05:38:54pm'),
(176, '127.0.0.1', '2021-07-12 05:44:40pm'),
(177, '127.0.0.1', '2021-07-12 05:47:17pm'),
(178, '127.0.0.1', '2021-07-12 05:48:50pm'),
(179, '127.0.0.1', '2021-07-12 05:49:23pm'),
(180, '127.0.0.1', '2021-07-12 05:50:36pm'),
(181, '127.0.0.1', '2021-07-12 05:53:31pm'),
(182, '127.0.0.1', '2021-07-12 05:55:29pm'),
(183, '127.0.0.1', '2021-07-12 05:55:34pm'),
(184, '127.0.0.1', '2021-07-12 05:55:37pm'),
(185, '127.0.0.1', '2021-07-12 06:05:41pm'),
(186, '127.0.0.1', '2021-07-12 06:13:22pm'),
(187, '127.0.0.1', '2021-07-12 06:16:25pm'),
(188, '127.0.0.1', '2021-07-12 06:18:21pm'),
(189, '127.0.0.1', '2021-07-12 06:23:38pm'),
(190, '127.0.0.1', '2021-07-12 06:24:09pm'),
(191, '127.0.0.1', '2021-07-12 06:24:18pm'),
(192, '127.0.0.1', '2021-07-12 06:25:33pm'),
(193, '127.0.0.1', '2021-07-12 06:25:44pm'),
(194, '127.0.0.1', '2021-07-12 06:26:29pm'),
(195, '127.0.0.1', '2021-07-12 06:26:56pm'),
(196, '127.0.0.1', '2021-07-12 06:27:07pm'),
(197, '127.0.0.1', '2021-07-12 06:27:48pm'),
(198, '127.0.0.1', '2021-07-12 06:27:59pm'),
(199, '127.0.0.1', '2021-07-12 06:29:26pm'),
(200, '127.0.0.1', '2021-08-02 07:20:58pm'),
(201, '127.0.0.1', '2021-08-02 07:25:51pm'),
(202, '127.0.0.1', '2021-08-02 07:25:54pm'),
(203, '127.0.0.1', '2021-08-02 07:25:56pm'),
(204, '127.0.0.1', '2021-08-02 07:26:00pm'),
(205, '127.0.0.1', '2021-08-12 08:25:01pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=571;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
