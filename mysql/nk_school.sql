-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2025 at 03:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nk_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `amounts`
--

CREATE TABLE `amounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_id` text NOT NULL,
  `status` enum('pending','success','failed') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amounts`
--

INSERT INTO `amounts` (`id`, `student_id`, `email`, `class_name`, `amount`, `payment_id`, `status`) VALUES
(1, NULL, 'sriharius62@gmail.com', 'IV', 50000.00, 'plink_RDwlVCsCYp2PUU', 'pending'),
(2, NULL, 'sriharius62@gmail.com', 'IV', 50000.00, 'plink_RDx04BDjfF0CFw', 'pending'),
(3, NULL, 'sriharius62@gmail.com', 'IV', 50000.00, 'plink_RDx3K8jUYSCIKz', 'pending'),
(4, NULL, 'sriharius62@gmail.com', 'IV', 50000.00, 'plink_RDx9A4utVP40mB', 'pending'),
(5, NULL, 'sriharius62@gmail.com', 'IV', 50000.00, 'plink_RDxLxKHSgivH7G', 'pending'),
(6, NULL, 'sriharius62@gmail.com', 'IV', 50000.00, 'order_RDyi7l6AZ93SL5', 'pending'),
(7, NULL, 'sriharius62@gmail.com', 'IV', 50000.00, 'order_RDyvdhZLJw0nlW', 'pending'),
(8, NULL, 'sriharius62@gmail.com', 'IV', 50000.00, 'order_RDz7VufYYfdbP6', 'pending'),
(9, NULL, 'sriharius62@gmail.com', 'IV', 50000.00, 'order_RDzDHLeqESDI0T', 'pending'),
(10, NULL, 'sriharius62@gmail.com', 'IV', 50000.00, 'order_RDzhcGHi2Is5gj', 'pending'),
(11, NULL, 'sriharius62@gmail.com', 'IV', 50000.00, 'order_RE7OJONMBDeG16', 'pending'),
(12, NULL, 'sriharius62@gmail.com', 'IV', 50000.00, 'order_RE7UVWE9AAAls5', 'pending'),
(13, NULL, 'sriharius62@gmail.com', 'IV', 50000.00, 'order_RE7fZXWcRHyxrR', 'pending'),
(14, NULL, 'sriharius62@gmail.com', 'IV', 5000.00, 'order_REgxdoLmhYvDjL', 'pending'),
(15, NULL, 'sriharius62@gmail.com', 'IV', 5000.00, 'order_REiSBbamJ7iE3p', 'pending'),
(16, NULL, 'sriharius62@gmail.com', 'IV', 5000.00, 'order_REiUp8iAX0sUqN', 'pending'),
(17, NULL, 'sriharius62@gmail.com', 'IV', 5000.00, 'order_REiYrh6qCS2qdI', 'pending'),
(18, NULL, 'sriharius62@gmail.com', 'IV', 5000.00, 'order_REidCZXIOTKCvI', 'pending'),
(19, NULL, 'sriharius62@gmail.com', 'IV', 5000.00, 'order_REis4X8TbDkMwx', 'pending'),
(20, NULL, 'sriharius62@gmail.com', 'IV', 5000.00, 'order_REjyHDLat301bV', 'pending'),
(21, NULL, 'sriharius62@gmail.com', 'IV', 5000.00, 'pay_REk4xlRRTgs01j', 'success'),
(22, NULL, 'sriharius62@gmail.com', 'IV', 5000.00, 'pay_REk93AiVxul184', 'success'),
(23, 1, 'sriharius62@gmail.com', 'IV-D', 5000.00, 'order_REuHcxslsZacfy', 'pending'),
(24, 1, 'sriharius62@gmail.com', 'IV-D', 5000.00, 'pay_REuS3EaYUpSd3M', 'success'),
(25, 2, 'sriharisanjay46@gmail.com', 'X-A,B,C,D', 60000.00, 'order_RFIp7SoM5JQgy1', 'pending'),
(26, 3, 'sanjaysrihari8@gmail.com', 'X-A,B,C,D', 60000.00, 'order_RFIp7SoM5JQgy1', 'pending'),
(27, 4, 'shmediaworks671@gmail.com', 'X-A,B,C,D', 60000.00, 'order_RFIp7SoM5JQgy1', 'pending'),
(28, 1, 'sriharius62@gmail.com', 'X-A,B,C,D', 60000.00, 'order_RFIp7SoM5JQgy1', 'pending'),
(29, 2, 'sriharisanjay46@gmail.com', 'X-A,B,C,D', 50000.00, 'pay_RFJ5yH3R9lRN5A', 'success'),
(30, 3, 'sanjaysrihari8@gmail.com', 'X-A,B,C,D', 50000.00, 'pay_RFJ5yH3R9lRN5A', 'success'),
(31, 4, 'shmediaworks671@gmail.com', 'X-A,B,C,D', 50000.00, 'pay_RFJ5yH3R9lRN5A', 'success'),
(32, 1, 'sriharius62@gmail.com', 'X-A,B,C,D', 50000.00, 'pay_RFJ5yH3R9lRN5A', 'success');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class_name`) VALUES
(1, 'LKG-A'),
(2, 'LKG-B'),
(3, 'LKG-C'),
(4, 'UKG-A'),
(5, 'UKG-B'),
(6, 'UKG-C'),
(7, 'I-A'),
(8, 'I-B'),
(9, 'I-C'),
(10, 'I-D'),
(11, 'II-A'),
(12, 'II-B'),
(13, 'II-C'),
(14, 'II-D'),
(15, 'III-A'),
(16, 'III-B'),
(17, 'III-C'),
(18, 'III-D'),
(19, 'IV-A'),
(20, 'IV-B'),
(21, 'IV-C'),
(22, 'IV-D'),
(23, 'V-A'),
(24, 'V-B'),
(25, 'V-C'),
(26, 'V-D'),
(27, 'VI-A'),
(28, 'VI-B'),
(29, 'VI-C'),
(30, 'VI-D'),
(31, 'VII-A'),
(32, 'VII-B'),
(33, 'VII-C'),
(34, 'VII-D'),
(35, 'VIII-A'),
(36, 'VIII-B'),
(37, 'VIII-C'),
(38, 'VIII-D'),
(39, 'IX-A'),
(40, 'IX-B'),
(41, 'IX-C'),
(42, 'IX-D'),
(43, 'X-A'),
(44, 'X-B'),
(45, 'X-C'),
(46, 'X-D'),
(47, 'XI-A'),
(48, 'XI-B'),
(49, 'XI-C'),
(50, 'XI-D'),
(51, 'XII-A'),
(52, 'XII-B'),
(53, 'XII-C'),
(54, 'XII-D');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$12$xHyaqVjkVGqtZIoA1LoTc.EuQvtkfovSdrSZpq1pnrLudghzZOBly', '2025-07-31 00:44:03', '2025-07-31 00:44:03');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_08_110146_create_logins_table', 1),
(5, '2025_06_10_043918_create_students_table', 1),
(6, '2025_06_10_045007_create_classes_table', 1),
(7, '2025_06_10_045806_add_classid_to_students_table', 1),
(8, '2025_06_11_123457_add_mobile_no_to_students_table', 1),
(9, '2025_06_11_165039_create_subjects_table', 1),
(10, '2025_06_12_065809_create_teachers_table', 1),
(11, '2025_06_14_054543_create_teacher_assign_classes_table', 1),
(12, '2025_06_22_061717_create_student_attendances_table', 1),
(13, '2025_07_06_121116_rename_old_table_to_new_table', 1),
(15, '2025_07_31_064644_add_section_to_classes_table', 2),
(16, '2025_08_24_132711_add_column_name_to_students_table', 2),
(17, '2025_08_24_133400_add_column_name_to_teachers_table', 3),
(20, '2025_08_31_133637_create_amounts_table', 4),
(21, '2025_08_31_235602_drop_column_section_table', 4),
(23, '2025_09_10_004830_rename_student_leave_status_table', 5),
(24, '2025_09_10_005108_change_status_column_in_student_leave_statuses_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('RgP3mzWcgsnFGdIlkrUUjQgJEexhw2Ivg82rDuNf', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic0ZBQWlpYnc3TGVCMXpSTDdZR1FLZWtzYW9IQ2hJRW5obmUyUTRQciI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90ZWFjaGVyLWxvZ2luIjt9fQ==', 1757465910);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `father_occupation` varchar(255) DEFAULT NULL,
  `mother_occupation` varchar(255) DEFAULT NULL,
  `mobile_no` bigint(20) UNSIGNED DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `bloodgroup` varchar(255) DEFAULT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `age`, `dob`, `email`, `father_name`, `mother_name`, `district`, `city`, `state`, `nationality`, `father_occupation`, `mother_occupation`, `mobile_no`, `address`, `bloodgroup`, `class_id`) VALUES
(1, 'veeran', 10, '2015-04-29', 'sriharius62@gmail.com', 'Raghul', 'madhu', 'tirupur', 'tiruppur', 'Tamilnadu', 'indian', 'carpentar', 'house wife', 1234657890, 'tiruppur', 'AB-', 22),
(2, 'banu priya', 10, '2010-06-04', 'sriharisanjay46@gmail.com', 'Udhaya', 'ponmani', 'tiruppur', 'udumalpet', 'Tamilnadu', 'Indian', 'Business Man', 'Housewife', 9456858691, 'Udumalpet', 'AB-', 43),
(3, 'Raj Kumar', 10, '2008-05-06', 'sanjaysrihari8@gmail.com', 'Sudharkar', 'latha', 'tiruppur', 'tiruppur', 'Tamilnadu', 'Indian', 'manager hotel', 'teacher', 9876543218, 'tiruppur', 'B+', 44),
(4, 'pandi', 15, '2010-08-04', 'shmediaworks671@gmail.com', 'kumar', 'priya', 'coimbatore', 'coimbatore', 'Tamilnadu', 'Indian', 'Business Man', 'teacher', 1345678945, 'mettupalayam raad, coimbatore', 'AB+', 44),
(5, 'ganesh', 15, '2010-05-25', 'sriharius62@gmail.com', 'Jagan', 'madhumitha', 'chennai', 'vadapalani', 'Tamilnadu', 'indian', 'Govt Staff', 'Govt Staff', 9876543210, 'aishwaraya street , vadapalani', 'A+', 46);

-- --------------------------------------------------------

--
-- Table structure for table `student_leave_statuses`
--

CREATE TABLE `student_leave_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_leave_statuses`
--

INSERT INTO `student_leave_statuses` (`id`, `date`, `student_id`, `class_id`, `status`) VALUES
(1, '2025-09-04', 1, 22, 'fever');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject`) VALUES
(1, 'TAMIL'),
(2, 'ENGLISH'),
(3, 'MATHEMATICS'),
(4, 'SCIENCE'),
(5, 'SOCIAL SCIENCE'),
(6, 'CHEMISTRY'),
(7, 'PHYSICS'),
(8, 'COMPUTER SCIENCE'),
(9, 'HISTORY'),
(10, 'ECONOMICS'),
(11, 'GEOGRAPHY');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `age` bigint(20) UNSIGNED DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mobile_no` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'teacher'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `age`, `dob`, `email`, `father_name`, `mother_name`, `degree`, `experience`, `subject_id`, `mobile_no`, `blood_group`, `address`, `password`, `role`) VALUES
(1, 'Kathir', 30, '1990-08-15', 'kathir@gmail.com', 'Raghul', 'madhu', 'B.ED', '8 Years', 2, '1234567890', 'AB-', 'Peelamedu', '$2y$12$OtEVFW8Iy20IzYcVKDyfSObfg2GaE76A4vjIk.A/jwLZTe9CQQrfe', 'teacher'),
(2, 'Latha', 28, '1994-05-03', 'latha@gmail.com', 'Karthick', 'lakshmi', 'M.ED', '3 years', 3, '1234567899', 'A-', 'vadapalani, coimbatore', '$2y$12$IipiPZN8u56Y4UcIlhaxYeRruIoHjL7DfBDZ0kKmF6GaPDfxLerO.', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_assign_classes`
--

CREATE TABLE `teacher_assign_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `class_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_assign_classes`
--

INSERT INTO `teacher_assign_classes` (`id`, `teacher_id`, `subject_id`, `class_id`) VALUES
(1, 2, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amounts`
--
ALTER TABLE `amounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `amounts_student_id_foreign` (`student_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_class_id_foreign` (`class_id`);

--
-- Indexes for table `student_leave_statuses`
--
ALTER TABLE `student_leave_statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_attendances_student_id_foreign` (`student_id`),
  ADD KEY `student_attendances_class_id_foreign` (`class_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachers_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `teacher_assign_classes`
--
ALTER TABLE `teacher_assign_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_assign_classes_teacher_id_foreign` (`teacher_id`),
  ADD KEY `teacher_assign_classes_subject_id_foreign` (`subject_id`),
  ADD KEY `teacher_assign_classes_class_id_foreign` (`class_id`);

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
-- AUTO_INCREMENT for table `amounts`
--
ALTER TABLE `amounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_leave_statuses`
--
ALTER TABLE `student_leave_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teacher_assign_classes`
--
ALTER TABLE `teacher_assign_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `amounts`
--
ALTER TABLE `amounts`
  ADD CONSTRAINT `amounts_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`);

--
-- Constraints for table `student_leave_statuses`
--
ALTER TABLE `student_leave_statuses`
  ADD CONSTRAINT `student_attendances_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_attendances_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teacher_assign_classes`
--
ALTER TABLE `teacher_assign_classes`
  ADD CONSTRAINT `teacher_assign_classes_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_assign_classes_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_assign_classes_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
