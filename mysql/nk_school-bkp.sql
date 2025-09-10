-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2025 at 03:30 PM
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
(10, 'II-A'),
(11, 'II-B'),
(12, 'II-C'),
(13, 'III-A'),
(14, 'III-B'),
(15, 'III-C'),
(16, 'IV-A'),
(17, 'IV-B'),
(18, 'IV-C'),
(19, 'V-A'),
(20, 'V-B'),
(21, 'V-C'),
(22, 'VI-A'),
(23, 'VI-B'),
(24, 'VI-C'),
(25, 'VII-A'),
(26, 'VII-B'),
(27, 'VII-C'),
(28, 'VIII-A'),
(29, 'VIII-B'),
(30, 'VIII-C'),
(31, 'IX-A'),
(32, 'IX-B'),
(33, 'IX-C'),
(34, 'X-A'),
(35, 'X-B'),
(36, 'X-C'),
(37, 'XI-A'),
(38, 'XI-B'),
(39, 'XI-C'),
(40, 'XII-A'),
(41, 'XII-B'),
(42, 'XII-C');

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
  `role` varchar(50) NOT NULL DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$12$1Dcpr74RUjQm1wSscOg3MO8x4cWh.RcaG1KvRbTH1.gsj5GL8LuQO', 'admin', '2025-06-12 01:49:42', '2025-06-13 23:47:10');

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
(11, '2025_06_14_054543_create_teacher_assign_classes_table', 2),
(12, '2025_06_22_061717_create_student_attendances_table', 3),
(13, '2025_07_06_121116_rename_old_table_to_new_table', 4);

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
('QLb9tbxMFSslHZ3e0tFa3ok0m0Ttowl5Lju6lHhw', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNmtnblA3c3ZhQ3dpRExhQ2pwWnVKbTJtRnVQY3JHRHNNSmZ3TkV2RSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1752326429);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
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

INSERT INTO `students` (`id`, `name`, `age`, `dob`, `father_name`, `mother_name`, `district`, `city`, `state`, `nationality`, `father_occupation`, `mother_occupation`, `mobile_no`, `address`, `bloodgroup`, `class_id`) VALUES
(1, 'Lula Cremin', 10, '2014-11-10', 'Abner Leuschke', 'Ms. Lorena Green', 'Richardville', 'Wisozkfort', 'Manipur', 'Indian', 'Admin', 'Paste-Up Worker', 3145994247, '719 Aurore Shore Suite 991\nLehnerside, RI 98066', 'O+', 16),
(2, 'Alyson O\'Hara', 11, '2014-03-27', 'Freddy Heathcote', 'Daphne Tromp', 'Noemouth', 'Borerside', 'Karnataka', 'Indian', 'Answering Service', 'State', 9509453613, '3707 Lilly Square Suite 283\nLakinmouth, ME 48367-7529', 'AB+', 19),
(3, 'Toy Cruickshank', 16, '2008-11-29', 'Jay Moore', 'Mrs. Donna Hudson Jr.', 'Efrainton', 'North Kim', 'Goa', 'Indian', 'Manufactured Building Installer', 'Central Office', 7962623918, '50426 Emerson Ranch\nNew Dillonmouth, UT 58553-7063', 'AB+', 27),
(4, 'Ernie Kub', 15, '2009-08-03', 'Junior O\'Reilly', 'Mrs. Roxanne Cruickshank', 'Port August', 'Esmeraldaport', 'Bihar', 'Indian', 'Construction Driller', 'Audiologist', 4131680435, '138 Jarrett Orchard\nSouth Maegan, NC 31736', 'A-', 23),
(5, 'Dr. Jaqueline Emmerich', 13, '2012-02-12', 'Kolby Lindgren', 'Wava Will', 'Shannamouth', 'Quitzonstad', 'Kerala', 'Indian', 'Internist', 'Movers', 7659864406, '14210 Margarita Square Apt. 757\nWest Phoebe, AZ 97182', 'O-', 30),
(6, 'Mrs. Maggie Labadie', 10, '2015-06-16', 'Jerrod Lubowitz', 'Jada Kertzmann', 'North Orval', 'Lake Alejandra', 'Uttar pradesh', 'Indian', 'Computer Scientist', 'Graduate Teaching Assistant', 3831337897, '4614 Jasper Fort\nBryonchester, NM 00091', 'AB+', 26),
(7, 'Salvatore Kunde', 15, '2010-04-27', 'Foster Rolfson', 'Miss Olga Kuphal V', 'Harmonyburgh', 'West Oceane', 'Kerala', 'Indian', 'Food Scientists and Technologist', 'Aircraft Assembler', 6171518167, '1827 Bailey Brooks\nLoganfort, MA 06237-7357', 'O+', 38),
(8, 'June Reichert', 13, '2012-05-01', 'Celestino Rohan', 'Ms. Tressie Wunsch V', 'Halleton', 'Port Annamaeton', 'Andra Pradesh', 'Indian', 'Geological Sample Test Technician', 'Reporters OR Correspondent', 9920932720, '18606 Jast Knoll Suite 925\nHandburgh, GA 90222-5388', 'B+', 28),
(9, 'Stephen Prosacco', 10, '2015-02-10', 'Zakary Hessel MD', 'Kasandra Bednar II', 'Sadyestad', 'Jarretmouth', 'Karnataka', 'Indian', 'Computer Security Specialist', 'Postal Service Mail Sorter', 6552425278, '851 Ethelyn Neck Apt. 599\nPort Vicentaside, VA 11312', 'A+', 34),
(10, 'Ara Trantow', 17, '2008-04-01', 'Emil Block', 'Hettie Crona DDS', 'South Mateoburgh', 'East Amalia', 'Karnataka', 'Indian', 'Electronic Drafter', 'Portable Power Tool Repairer', 7984017336, '617 Clay Lodge\nJaymeshire, WI 69061-6511', 'A+', 21),
(11, 'Athena Oberbrunner', 13, '2011-11-22', 'Cyrus Pfeffer', 'Dr. Fatima McCullough V', 'Denesikchester', 'Merrittberg', 'Tamilnadu', 'Indian', 'Architect', 'Textile Cutting Machine Operator', 7405630011, '94680 Gerhold Bridge\nSouth Rexport, IA 36494', 'B-', 36),
(12, 'Immanuel Bogan V', 11, '2014-03-14', 'Guido Dach', 'Erna Hegmann', 'Port Austynshire', 'Lonniemouth', 'Bihar', 'Indian', 'Physician', 'Pipe Fitter', 8242846552, '67719 Vida Courts Suite 129\nZulauffurt, GA 31054-4351', 'A-', 5),
(13, 'Jarod Luettgen', 17, '2007-08-31', 'Faustino Walsh', 'Phyllis Ziemann', 'New Benfort', 'New Kittyfurt', 'Delhi', 'Indian', 'Pharmacy Aide', 'Vending Machine Servicer', 4771445839, '663 Kihn Walks\nEast Keatonview, VA 83083-5209', 'B-', 12),
(14, 'Consuelo Fahey', 14, '2011-03-16', 'Carson Wiegand', 'Sophia Streich', 'Lillieburgh', 'Schillerport', 'Bihar', 'Indian', 'Packaging Machine Operator', 'Trainer', 902748747, '130 Olson Heights Suite 166\nPort Darian, MT 30183', 'B-', 2),
(15, 'Prof. Montana Pouros V', 16, '2008-11-24', 'Mr. Bill Barrows', 'Mrs. Megane Parker', 'Cathyport', 'Arvelport', 'Kerala', 'Indian', 'Agricultural Manager', 'Mining Engineer OR Geological Engineer', 1463875301, '85200 Sydnie Mountain Apt. 320\nWest Jennie, OK 19091-6680', 'A-', 25),
(16, 'Daphne Klein', 12, '2013-01-18', 'Kristoffer Frami', 'Shannon Robel', 'West Otha', 'East Lourdeshaven', 'Delhi', 'Indian', 'Movie Director oR Theatre Director', 'Mathematical Technician', 1596060778, '109 Stokes Turnpike Apt. 494\nJohnathanshire, VA 65494-4615', 'AB+', 16),
(17, 'Mr. Alek Gerlach PhD', 11, '2014-05-27', 'Mr. Jordan Goyette II', 'Jaqueline Gutkowski', 'Wandafort', 'East Kevin', 'Bihar', 'Indian', 'Geoscientists', 'Human Resources Specialist', 5286989492, '157 Shields Forges\nWest Elody, ND 56646', 'A-', 12),
(18, 'Gunnar McDermott PhD', 17, '2008-01-25', 'Garland Keebler', 'Marge Ortiz', 'Franeckishire', 'South Alexzander', 'Bihar', 'Indian', 'Precision Pattern and Die Caster', 'Electrical Engineer', 2328136883, '576 Zieme Parks Apt. 861\nStammton, GA 61450', 'B+', 14),
(19, 'Ms. Adrienne Muller', 16, '2008-10-11', 'Brain Hoeger', 'Cordia Pfeffer', 'Port Dion', 'Weberton', 'Karnataka', 'Indian', 'Signal Repairer OR Track Switch Repairer', 'History Teacher', 6133923528, '3194 Ward Extensions\nWilliamstad, WI 37371-1041', 'O+', 4),
(20, 'Marilyne McKenzie Sr.', 13, '2011-12-27', 'Noel Ullrich', 'Katharina Dicki', 'Lake Nicoletteberg', 'Keeblerview', 'Andra Pradesh', 'Indian', 'Home Appliance Installer', 'Education Teacher', 5879772662, '1235 Zoe Road Suite 895\nHagenesside, WV 70461', 'A+', 35),
(21, 'Dr. Conrad Welch Sr.', 10, '2015-02-23', 'Javier Beatty', 'Alverta Kassulke', 'East Gudrunmouth', 'Waelchiborough', 'Goa', 'Indian', 'Postmasters', 'Command Control Center Specialist', 3403443624, '493 Fahey Spurs\nWuckertfort, VT 15969-7423', 'AB-', 30),
(22, 'Retha Nitzsche V', 16, '2008-07-14', 'Keyon Marquardt', 'Matilde Hills', 'East Rodolfo', 'Thielport', 'Manipur', 'Indian', 'Manager of Weapons Specialists', 'Barber', 6722290097, '39852 Metz Walks Suite 612\nMyrticeside, MO 36752-5008', 'A-', 35),
(23, 'Prof. Kraig Keeling II', 15, '2010-03-20', 'Silas Roberts', 'Tess Sauer II', 'Dallasberg', 'Lake Sylvanchester', 'Goa', 'Indian', 'Multiple Machine Tool Setter', 'Sheriff', 2726563254, '4444 Fisher Spur Suite 298\nFayton, HI 46351', 'A+', 32),
(24, 'Jana Pollich', 13, '2011-07-22', 'Erich Welch', 'Abbigail Kozey', 'Clovisfurt', 'New Pascale', 'Kerala', 'Indian', 'Structural Iron and Steel Worker', 'Security Systems Installer OR Fire Alarm Systems Installer', 1126012360, '1337 Lynch Causeway\nSouth Schuyler, WV 20284', 'B-', 41),
(25, 'Elias Wyman', 10, '2015-01-05', 'August Grady', 'Chaya Lowe', 'New Bentonberg', 'East Nayeli', 'Punjab', 'Indian', 'Purchasing Manager', 'Photographer', 5213717653, '52808 Mills Alley Suite 388\nDarrickmouth, DC 31842-0453', 'B-', 26),
(26, 'Major Mayert Jr.', 15, '2009-12-01', 'Francis Nitzsche MD', 'Tamia Balistreri', 'Teaganhaven', 'South Ralph', 'Delhi', 'Indian', 'Battery Repairer', 'Interpreter OR Translator', 1702069013, '5638 Wyman Ranch\nEast Marquis, WA 25477', 'B-', 5),
(27, 'Mrs. Stefanie Hills PhD', 12, '2012-07-21', 'Mr. Bart Auer', 'Gregoria Gusikowski IV', 'Stevieborough', 'Gutmannfort', 'Tamilnadu', 'Indian', 'Graduate Teaching Assistant', 'Legal Secretary', 7735211048, '12123 Cruickshank Orchard Apt. 870\nSouth Bridie, SC 31607-0613', 'O-', 23),
(28, 'Dominique Armstrong Sr.', 16, '2008-10-13', 'Brannon Treutel', 'Icie Hills Jr.', 'South Chanelle', 'Lake Leonie', 'Delhi', 'Indian', 'Poultry Cutter', 'Dentist', 3831122731, '544 Schmidt Fall\nWest Francesborough, WA 98256', 'O-', 32),
(29, 'Ms. Oma Schneider V', 15, '2010-05-10', 'Jose Wyman', 'Concepcion Smith', 'Murrayburgh', 'Port Zoilaburgh', 'Bihar', 'Indian', 'Transportation and Material-Moving', 'Production Laborer', 3399392521, '3987 Parker Flat Suite 976\nGoyetteberg, CA 19755', 'B-', 37),
(30, 'Neva Botsford', 15, '2009-12-14', 'Mr. Harrison Bauch', 'Aaliyah Schinner', 'Ziemannstad', 'North Jarod', 'Uttar pradesh', 'Indian', 'Vocational Education Teacher', 'Municipal Fire Fighter', 4202349013, '92666 Borer Hollow\nRodrigoberg, GA 29828', 'A-', 8),
(31, 'Makayla Littel', 10, '2014-10-05', 'Keyshawn Hyatt', 'Kathryn Murray', 'Ernsershire', 'Garryside', 'Delhi', 'Indian', 'Mold Maker', 'Claims Examiner', 1962857004, '4193 Schmidt Expressway Suite 991\nSouth Kadin, IL 73318-9625', 'O-', 21),
(32, 'Roy Wisoky', 13, '2011-11-12', 'Corbin Howe Sr.', 'Ms. Ellie Price III', 'Port Miltonchester', 'New Lylamouth', 'Kerala', 'Indian', 'Editor', 'Procurement Clerk', 3421809954, '4402 Avery Rapids Suite 601\nPort Lucio, NH 59137', 'AB-', 27),
(33, 'Clement Stehr MD', 16, '2009-02-16', 'Madyson Koch Sr.', 'Drew Muller', 'Littelberg', 'Fayfurt', 'Bihar', 'Indian', 'Soil Scientist', 'Pastry Chef', 6553815858, '75199 Weimann Mountain\nNew Conrad, ME 81479-1624', 'A+', 37),
(34, 'Alexie Mertz', 15, '2009-08-27', 'Payton Veum', 'Vivianne Ondricka V', 'East Kentonport', 'New Diana', 'Andra Pradesh', 'Indian', 'Food Preparation and Serving Worker', 'Automotive Glass Installers', 1415582085, '5577 Waters Way Apt. 064\nNew Lelandberg, VA 53003-7339', 'AB-', 33),
(35, 'Icie Bayer', 14, '2011-05-31', 'Mr. Mitchell Bahringer', 'Abby Ortiz', 'Runolfssonchester', 'Kochside', 'Tamilnadu', 'Indian', 'Dragline Operator', 'Self-Enrichment Education Teacher', 4006976446, '670 Runolfsson Vista Suite 628\nEast Arvel, PA 42329', 'AB-', 5),
(36, 'Aniyah Emard', 11, '2014-03-17', 'Cullen Medhurst', 'Blanche Cartwright', 'Parkerport', 'Kyraport', 'Uttar pradesh', 'Indian', 'Project Manager', 'Nuclear Equipment Operation Technician', 8608967429, '25618 Herzog Summit\nGerlachbury, AL 85686-2653', 'O+', 13),
(37, 'Nova Johnston', 17, '2007-10-03', 'Vance Rempel', 'Kathryne Tromp', 'East Lia', 'West Schuyler', 'Bihar', 'Indian', 'Production Manager', 'Roofer', 4250770332, '818 Keara Club Suite 827\nMicaelaland, NE 67354-1355', 'A+', 3),
(38, 'Deon Funk Jr.', 17, '2008-03-30', 'Halle Bednar', 'Shaniya Gleason', 'New Yasmineport', 'Orvalbury', 'Punjab', 'Indian', 'Sound Engineering Technician', 'Pediatricians', 114295271, '60791 Mills Divide\nSchillerberg, NJ 17901', 'B+', 15),
(39, 'Orion Bechtelar', 11, '2014-01-12', 'Dr. Kiel Bauch Jr.', 'Adella Morissette', 'Hansenborough', 'Mckaylatown', 'Kerala', 'Indian', 'Data Entry Operator', 'Tank Car', 8525809091, '96229 Jeanette Forest Suite 209\nJenkinsview, NV 33565-8235', 'O+', 28),
(40, 'Devonte Bartoletti', 10, '2014-09-16', 'Sylvester Bartoletti', 'Clementine Raynor', 'Norbertotown', 'New Wilmerport', 'Manipur', 'Indian', 'Precision Mold and Pattern Caster', 'Religious Worker', 5646842650, '12994 Kozey Expressway Suite 011\nNew Clydechester, VT 51822', 'A+', 16),
(41, 'Landen O\'Kon', 10, '2014-12-12', 'Dr. Nicholas Schuster', 'Sabryna Kilback', 'New Marcelinoville', 'Trompburgh', 'Karnataka', 'Indian', 'HR Manager', 'City', 5422489077, '1692 Randal Crossing\nReingerfort, OR 35601', 'AB-', 11),
(42, 'Alvah Buckridge', 13, '2012-03-28', 'Elmer Mohr', 'Mikayla Lubowitz', 'Leliaport', 'Nellaview', 'Bihar', 'Indian', 'Claims Examiner', 'Fire Inspector', 2250658960, '60200 Willms Shores Suite 961\nOrieton, NY 76960-7376', 'B-', 25),
(43, 'Rebeca Oberbrunner', 17, '2008-01-28', 'Mr. Dorian Shanahan III', 'Gabrielle Dare', 'Weberland', 'Rippinbury', 'Kerala', 'Indian', 'Automatic Teller Machine Servicer', 'Portable Power Tool Repairer', 8120529396, '7280 Olson Spurs Suite 960\nJastshire, CT 06238-1263', 'A-', 42),
(44, 'Misty Lind', 11, '2014-01-09', 'Olin Deckow', 'Melyssa Wyman', 'Keelingtown', 'South Velva', 'Uttar pradesh', 'Indian', 'Grinder OR Polisher', 'Fabric Pressers', 1012387095, '22923 Pablo Ferry\nDellmouth, KS 57081', 'O-', 11),
(45, 'Nickolas Runolfsdottir', 15, '2009-09-25', 'Prof. Jacey Ondricka DDS', 'Aryanna Mohr', 'East Ciceroberg', 'Veronaburgh', 'Kerala', 'Indian', 'School Social Worker', 'Caption Writer', 5643104486, '53320 Schmidt Mill\nNorth Rosendoburgh, MN 13480', 'B+', 12),
(46, 'Dakota Lehner', 14, '2011-03-15', 'Newell Metz V', 'Dr. Pascale Casper IV', 'Torpville', 'Port Caleigh', 'Delhi', 'Indian', 'Appliance Repairer', 'Professional Photographer', 8716203367, '411 Malika Shore\nPurdybury, WY 65267', 'B+', 9),
(47, 'Mr. Talon Sauer', 12, '2012-07-31', 'Prof. Dewayne Parisian PhD', 'Carmela Rempel', 'Cronahaven', 'North Karinachester', 'Uttar pradesh', 'Indian', 'Tax Examiner', 'Roof Bolters Mining', 5123204122, '14472 Doyle Stream Suite 072\nMollieberg, MD 01964', 'B+', 4),
(48, 'Xavier Crooks', 14, '2011-04-02', 'Declan Johnson DDS', 'Brenda Labadie', 'Lake Franztown', 'Yesseniabury', 'Punjab', 'Indian', 'Electronic Equipment Assembler', 'Political Science Teacher', 3724437067, '2802 Anahi Branch\nNorth Westleyville, WY 15641-9494', 'B+', 34),
(49, 'Mario Swaniawski', 16, '2008-12-18', 'Prof. Micheal Gislason', 'Kaitlyn Fritsch', 'Reichelfurt', 'Marleetown', 'Karnataka', 'Indian', 'Packer and Packager', 'Machine Operator', 8607557175, '771 Jasen Crest\nPort Angelicafort, AK 58599', 'A-', 18),
(50, 'Maude Pfeffer', 15, '2009-11-23', 'Wallace Gleason', 'Tracy Durgan', 'Port Candace', 'Treutelton', 'Tamilnadu', 'Indian', 'General Manager', 'Computer-Controlled Machine Tool Operator', 2318434922, '837 Nienow Track\nWest Christiana, NV 34001-8793', 'AB+', 13),
(51, 'Heaven Prohaska', 16, '2009-04-22', 'Mr. Ricky Beatty', 'Hallie Raynor', 'East Carolyneview', 'Millsberg', 'Delhi', 'Indian', 'Manufactured Building Installer', 'Special Force', 5323061427, '17571 Little Pass Suite 858\nWesttown, ND 01111', 'A+', 15),
(52, 'Orrin Herman MD', 17, '2007-08-23', 'Lowell Parker', 'Ms. Adriana O\'Hara Jr.', 'East Lily', 'Mayburgh', 'Manipur', 'Indian', 'Mapping Technician', 'Production Planner', 5781541782, '3195 Lebsack Estate\nRoobville, WI 74033', 'AB-', 13),
(53, 'Austen Graham', 12, '2013-03-27', 'Dallas Weber', 'Dr. Alexa Eichmann', 'Chanelmouth', 'Millerstad', 'Bihar', 'Indian', 'Supervisor of Customer Service', 'Grinding Machine Operator', 3767330253, '21030 Amani Mews Apt. 349\nSouth Everettville, TX 74735-6815', 'AB+', 36),
(54, 'Devyn Barton PhD', 14, '2011-05-13', 'Jaquan Raynor', 'Cleta Price', 'Schinnerland', 'Bennettmouth', 'Delhi', 'Indian', 'Commercial Pilot', 'Machinist', 4015373709, '8272 Geoffrey Lock Suite 335\nWest Eleanorehaven, VT 03954-9649', 'B-', 25),
(55, 'Bobby Hessel', 12, '2013-06-13', 'Coty Hane', 'Rebekah Schamberger', 'Andersonville', 'Port Annalise', 'Kerala', 'Indian', 'Gas Plant Operator', 'Account Manager', 3193675652, '408 Maegan Prairie Suite 598\nLeathabury, KY 64257', 'A+', 29),
(56, 'Adah Brakus', 14, '2010-09-01', 'Presley Hessel', 'Luna Cummings', 'Earleneton', 'Vickiemouth', 'Bihar', 'Indian', 'Recruiter', 'Criminal Investigator', 4463656586, '8054 Clementine Garden Apt. 287\nHicklehaven, VA 40972', 'A+', 29),
(57, 'Prof. Gerhard West', 17, '2008-05-29', 'Ignatius Cole', 'Oma Schneider IV', 'South Martaborough', 'South Claireville', 'Bihar', 'Indian', 'Motion Picture Projectionist', 'Reporters OR Correspondent', 8348692441, '61305 Connie Spur Apt. 746\nThompsonburgh, AZ 48668-6752', 'AB+', 33),
(58, 'Edgar Erdman', 14, '2011-02-14', 'Doyle Eichmann', 'Una Medhurst', 'Jasonland', 'East Clara', 'Bihar', 'Indian', 'Biological Science Teacher', 'English Language Teacher', 2417044146, '267 Afton Point\nRusselhaven, NY 72341', 'O+', 19),
(59, 'Sandy Rippin', 13, '2011-07-12', 'Prof. Alec Zemlak', 'Robyn White PhD', 'Port Mallorybury', 'East Christabury', 'Kerala', 'Indian', 'Infantry', 'Animal Control Worker', 6843598060, '33165 Hyatt Divide Apt. 357\nHillsside, MN 48810', 'A-', 27),
(60, 'Kristoffer Ruecker', 17, '2007-12-14', 'Beau Schroeder', 'Miss Vada Becker', 'Lake Valentin', 'East Virginie', 'Tamilnadu', 'Indian', 'Answering Service', 'Freight and Material Mover', 7781628858, '150 Ilene Isle\nHalvorsonbury, WI 80406', 'AB+', 31),
(61, 'Addie Ziemann', 13, '2011-08-17', 'Dr. Hank Ortiz Jr.', 'Betsy Kub', 'Christiansenland', 'New Nathen', 'Delhi', 'Indian', 'Security Guard', 'Loan Interviewer', 1962731066, '30698 Crooks Summit Apt. 236\nLake Jaclynfurt, WV 07500-8706', 'B-', 22),
(62, 'Idella Oberbrunner', 12, '2012-11-23', 'Merritt Jacobson PhD', 'Ilene Jast', 'Bergnaumstad', 'Reichertshire', 'Punjab', 'Indian', 'Order Filler OR Stock Clerk', 'Administrative Services Manager', 13513764, '60086 Kertzmann Fork\nErnestinaview, KS 94316', 'AB-', 29),
(63, 'Marcella Skiles', 14, '2010-09-22', 'Jamal Abernathy', 'Trinity Kiehn', 'Port Juniorport', 'Briceport', 'Manipur', 'Indian', 'Event Planner', 'Home Appliance Installer', 5452810214, '69857 Willis Overpass\nPort Colton, IL 47645', 'O-', 27),
(64, 'Graham Wilkinson', 13, '2012-03-04', 'Mr. Garnet DuBuque', 'Margarita Lakin', 'O\'Keefehaven', 'Jalynport', 'Punjab', 'Indian', 'Human Resources Assistant', 'HR Manager', 3343755091, '59063 Koelpin Junction\nLake Delmer, NE 79062', 'B+', 38),
(65, 'Anastasia Lowe', 14, '2011-05-18', 'Hassan Jenkins', 'Jessika Hane', 'Port Arlie', 'Fatimatown', 'Punjab', 'Indian', 'Bill and Account Collector', 'Agricultural Equipment Operator', 4204053454, '3177 Kuhic Ridges Suite 179\nGertrudestad, NE 73903-2204', 'AB+', 10),
(66, 'Reece Lehner', 13, '2011-12-24', 'Geo Koss', 'Letitia Kuhn', 'Lake Terrence', 'East Ovaland', 'Andra Pradesh', 'Indian', 'Supervisor Fire Fighting Worker', 'Educational Counselor OR Vocationall Counselor', 2657199047, '7075 Aracely Villages\nNew Consuelo, OH 25508-7289', 'B-', 9),
(67, 'Lucienne Turcotte', 16, '2009-06-20', 'Miguel Trantow', 'Shanna Kemmer PhD', 'North Christellestad', 'South Tillman', 'Delhi', 'Indian', 'Composer', 'Maintenance Worker', 9387499051, '236 Kirlin Via\nSonyamouth, SC 53284-4876', 'AB-', 25),
(68, 'Prof. Julia Sanford Sr.', 17, '2008-06-24', 'Garfield Kassulke', 'Monica Kessler', 'Grahamville', 'East Vidal', 'Karnataka', 'Indian', 'Employment Interviewer', 'Operations Research Analyst', 9089379616, '5251 Rippin Spring Suite 191\nMaeveton, CA 72159', 'O-', 19),
(69, 'Leonardo Davis', 16, '2009-07-01', 'Paolo Hamill', 'Shana Bednar', 'South Emie', 'East Carolinemouth', 'Andra Pradesh', 'Indian', 'Bartender Helper', 'Occupational Therapist Aide', 4071828865, '4925 Leffler Spring Suite 558\nHudsonbury, CT 52723-2266', 'B+', 37),
(70, 'Marlon Witting I', 16, '2008-09-01', 'Mr. Deon Nader IV', 'Miss Kailyn Block', 'Demarioside', 'Bashirianstad', 'Punjab', 'Indian', 'Credit Checker', 'Psychiatric Technician', 2154388172, '84696 Cormier Valley\nEast Avery, IA 46917-2225', 'AB-', 18),
(71, 'Dr. Aiden Friesen MD', 17, '2007-11-15', 'Brandt Gleichner', 'Rosamond Schulist', 'Lake Keegan', 'Lake Jaylonshire', 'Andra Pradesh', 'Indian', 'Aircraft Mechanics OR Aircraft Service Technician', 'Infantry', 8842680410, '799 Parker Place\nPhilipville, TN 25522', 'AB-', 36),
(72, 'Prof. Emanuel Harris V', 13, '2011-07-23', 'Prof. Roberto Brown DVM', 'Yasmin Harvey II', 'Spinkaland', 'East Osvaldo', 'Manipur', 'Indian', 'Curator', 'Underground Mining', 3405814343, '83914 Kris Highway\nWest Dockville, NY 60836', 'B-', 33),
(73, 'Quinn Volkman', 10, '2014-08-26', 'Nicholas Hettinger', 'Prof. Everette Heller', 'Dickiview', 'New Laurence', 'Manipur', 'Indian', 'Anthropologist', 'Electromechanical Equipment Assembler', 9597830910, '446 Ricky Mountains\nSashafort, TX 60456-6123', 'B-', 5),
(74, 'Elyse Simonis', 15, '2009-10-04', 'Eriberto Mayer', 'Dr. Brandy Keeling IV', 'Daytonburgh', 'Schulistchester', 'Andra Pradesh', 'Indian', 'GED Teacher', 'Dispatcher', 6258418931, '3050 Konopelski Ports Suite 361\nNew Budport, HI 45713', 'A+', 18),
(75, 'Andres Treutel', 17, '2008-04-06', 'Jayson Howell DDS', 'Maggie Kuhlman', 'East Ashleighhaven', 'Lillianhaven', 'Goa', 'Indian', 'Hand Sewer', 'Housekeeper', 8328149831, '171 Violette Track Suite 199\nWest Bryon, GA 66154', 'O+', 34),
(76, 'Oleta Gerhold', 16, '2008-09-26', 'Mr. Hollis Mraz I', 'Vida Bode', 'Gutmannchester', 'Lake Joany', 'Delhi', 'Indian', 'Food Servers', 'Stringed Instrument Repairer and Tuner', 6059519831, '97352 Travon Plaza\nNew Chanellehaven, CT 18739', 'O-', 14),
(77, 'Emily Fisher', 11, '2014-06-13', 'Axel Blanda', 'Dr. Trisha Steuber', 'Lake Cristian', 'North Winnifred', 'Punjab', 'Indian', 'Operating Engineer', 'Credit Checkers Clerk', 4171244563, '926 Schamberger Meadow\nPort Skylachester, AZ 81184', 'O-', 36),
(78, 'Stacy Turner', 11, '2013-10-07', 'Jordan Altenwerth', 'Daisy Strosin', 'New Wilfordfurt', 'Birdietown', 'Andra Pradesh', 'Indian', 'Library Science Teacher', 'Postal Service Mail Sorter', 9801451108, '24557 Dominique Highway\nManteshire, NM 59436-5743', 'A-', 17),
(79, 'Dejah Funk', 16, '2009-03-17', 'Bertha McDermott', 'Eldridge Johnson', 'East Randalshire', 'Abernathyburgh', 'Delhi', 'Indian', 'Logging Supervisor', 'Parking Enforcement Worker', 6248899851, '8736 Bartholome Tunnel Suite 506\nLake Ilene, CO 31053', 'A-', 35),
(80, 'Julianne Ruecker DVM', 12, '2013-01-16', 'Dr. Leonard Quitzon Sr.', 'Samanta Denesik', 'Kuhnview', 'New Kristintown', 'Delhi', 'Indian', 'Optometrist', 'Sociology Teacher', 2327807267, '19582 Corwin Stream\nCarolinebury, SC 71138', 'A-', 17),
(81, 'Marisa Block', 11, '2014-01-22', 'Madyson Wilkinson', 'Brielle Bruen', 'Friesenview', 'Ahmadbury', 'Bihar', 'Indian', 'Gas Distribution Plant Operator', 'PR Manager', 4680749325, '76264 Wilkinson Crossing Suite 531\nJedidiahfurt, GA 31620-0212', 'A-', 36),
(82, 'Dee Zieme', 14, '2010-11-17', 'Fletcher Weimann', 'Prof. Jennifer Abernathy', 'South Natalieside', 'New Kaleytown', 'Uttar pradesh', 'Indian', 'Loan Interviewer', 'Computer Support Specialist', 4468393414, '256 Bartell Tunnel\nKuvalisbury, UT 35917', 'O+', 14),
(83, 'Ms. Yasmine Dicki', 11, '2014-01-18', 'Terrance Corwin', 'Rachelle Schmitt', 'Harberborough', 'Lake Tyrese', 'Manipur', 'Indian', 'Central Office', 'Auxiliary Equipment Operator', 1131022941, '4757 Barbara Springs\nEvelynberg, FL 96317', 'AB-', 39),
(84, 'Porter Goyette MD', 11, '2013-11-04', 'Dr. Wendell Kihn DVM', 'Prof. Daisha Toy', 'North Lila', 'West Donavonport', 'Andra Pradesh', 'Indian', 'Brazing Machine Operator', 'Patrol Officer', 3970527007, '2538 Marcos Islands Suite 597\nFloydmouth, NH 43671', 'AB+', 11),
(85, 'Jeffry Williamson III', 16, '2009-06-20', 'Theodore Volkman MD', 'Jennyfer Roberts', 'South Antoinette', 'Metzborough', 'Manipur', 'Indian', 'Nuclear Equipment Operation Technician', 'Motorcycle Mechanic', 1821049728, '20173 Magnolia Extensions Suite 823\nSadyechester, OK 18149-1354', 'A-', 30),
(86, 'Georgiana Stroman', 13, '2011-09-07', 'Ambrose Hauck', 'Meda Bogisich PhD', 'Helenburgh', 'Lesleyberg', 'Andra Pradesh', 'Indian', 'Shuttle Car Operator', 'Electronics Engineering Technician', 3481191498, '2751 Bergnaum Course\nNew Berylton, LA 73500', 'O+', 31),
(87, 'Nicholas Robel', 13, '2011-07-23', 'Prof. Devan Rutherford II', 'Miss Karelle Veum', 'Lake Earnestland', 'Lake Murphy', 'Goa', 'Indian', 'Nuclear Medicine Technologist', 'Fish Game Warden', 6671097410, '533 Stoltenberg Causeway\nWest Kenton, MD 40818', 'B+', 42),
(88, 'Andy Harber', 12, '2013-04-03', 'Prof. Ike Parisian V', 'Myra Tromp V', 'Faheytown', 'North Dennis', 'Punjab', 'Indian', 'Middle School Teacher', 'Freight and Material Mover', 3473623984, '535 Mayer Rest Apt. 998\nGeraldinetown, IA 09999-7557', 'B+', 23),
(89, 'Presley Hahn', 17, '2007-12-12', 'Okey Klein', 'Miss Abigale Feeney', 'Lake Alexandroland', 'Zulaufmouth', 'Bihar', 'Indian', 'Computer Hardware Engineer', 'Home Health Aide', 4122228991, '5095 Krajcik Cliff Apt. 229\nPacochaborough, AL 78556-0820', 'AB-', 9),
(90, 'Hugh Nienow II', 12, '2012-07-12', 'Morton Cremin', 'Mrs. Ilene O\'Connell MD', 'Lake Aurelia', 'O\'Connellfort', 'Karnataka', 'Indian', 'Motorboat Mechanic', 'Computer Repairer', 2399427353, '3269 Veum Parkway\nSouth Carmineshire, WA 90673-3509', 'O+', 17),
(91, 'Ross Dibbert', 17, '2008-05-22', 'Mr. Walton Bergstrom', 'Arlene Pfeffer', 'Kautzerburgh', 'Lindgrenfort', 'Kerala', 'Indian', 'Coroner', 'Metal Worker', 2515936817, '3993 Toby Drive\nKeeblerfort, VA 19324', 'AB+', 15),
(92, 'Maximilian Walter IV', 16, '2009-04-12', 'Emmett Schultz V', 'Luisa Spencer', 'Elsastad', 'North Reyshire', 'Punjab', 'Indian', 'Freight and Material Mover', 'Stock Clerk', 1685444965, '3001 Kelly Gardens Suite 644\nNew Eudora, IL 76409-8200', 'AB-', 35),
(93, 'Catalina Hudson DVM', 17, '2008-06-15', 'Michel Walter DVM', 'Miss Lauriane Weissnat V', 'South Pansyberg', 'Shanonchester', 'Uttar pradesh', 'Indian', 'Industrial Engineering Technician', 'Admin', 5472556422, '9149 Lockman Village\nLorainestad, HI 58863', 'AB-', 10),
(94, 'Dane Hauck', 17, '2008-01-09', 'Wilton Reichel', 'Alene O\'Reilly', 'Hillarystad', 'West Katherynmouth', 'Manipur', 'Indian', 'Radiologic Technologist', 'Library Assistant', 9122774386, '98666 Pollich Fords Suite 515\nBeerhaven, NM 54385', 'AB-', 4),
(95, 'Ms. Cathy Walsh MD', 15, '2010-06-01', 'Ron Schowalter', 'Bonnie Rodriguez I', 'Lake Deshawn', 'West Adrianna', 'Andra Pradesh', 'Indian', 'Agricultural Equipment Operator', 'Transportation Attendant', 6851750360, '4286 Loraine Alley Apt. 731\nSouth Rustyshire, OR 75776-0372', 'O+', 31),
(96, 'Beau Heathcote', 11, '2014-06-07', 'Jameson Gutkowski', 'Dawn Schmitt', 'East Pablo', 'West Olenton', 'Delhi', 'Indian', 'Occupational Health Safety Technician', 'Farmer', 6812665017, '63999 Barry Place Apt. 629\nBoehmville, IA 08593-5858', 'A+', 39),
(97, 'Henriette Goyette', 10, '2015-05-03', 'Bruce Friesen', 'Ms. Mariane Leuschke DDS', 'West Jaredbury', 'Stokesport', 'Kerala', 'Indian', 'State', 'Actor', 6877165463, '4962 Harold Road Suite 258\nWisokyfurt, TN 58971-0992', 'O-', 14),
(98, 'Sarah Marks', 11, '2014-01-13', 'Trevion Considine', 'Ariane Goyette V', 'Helenabury', 'North Gracielaport', 'Punjab', 'Indian', 'Personal Service Worker', 'Door To Door Sales', 5943384025, '84165 Pacocha Loaf Apt. 594\nNew Leanne, CO 09544', 'A-', 27),
(99, 'Trey Gaylord', 11, '2014-05-14', 'Prof. Ed Hettinger', 'Imelda Rice', 'East Terry', 'Breitenbergshire', 'Uttar pradesh', 'Indian', 'Costume Attendant', 'Bus Driver', 4163853024, '869 Bauch Highway\nGlovershire, CO 75316-6838', 'AB+', 13),
(100, 'Scottie Ward', 17, '2007-09-05', 'Hector Kuhic', 'Ms. Eldridge Weimann', 'Corymouth', 'Laylaland', 'Uttar pradesh', 'Indian', 'Technical Director', 'Compacting Machine Operator', 7413560480, '4834 Harrison Meadows\nHegmannstad, NM 43132', 'O-', 34),
(101, 'Abdul Jacobson', 16, '2008-08-18', 'Ryann Torp PhD', 'Ashly Miller', 'Rennerton', 'Angelastad', 'Tamilnadu', 'Indian', 'Deburring Machine Operator', 'Bartender', 4417539030, '6989 Monroe Walks\nHectortown, CT 67284-9677', 'B-', 37),
(102, 'Stefan Crist', 12, '2012-09-04', 'Wiley Barrows', 'Ms. Sadie Cronin DVM', 'Laurineborough', 'New Makenna', 'Bihar', 'Indian', 'Machine Operator', 'Radio and Television Announcer', 5677493309, '6548 Jackie Greens Suite 607\nPort Hassieville, MN 26435', 'B-', 36),
(103, 'Josephine Ward', 13, '2011-12-25', 'Darien Rice', 'Dr. Eudora Champlin', 'West Emmet', 'New Rheashire', 'Karnataka', 'Indian', 'Adjustment Clerk', 'Artillery Officer', 293645259, '264 Schamberger Knoll Suite 130\nNew Stevie, VA 69620-3677', 'A-', 11),
(104, 'Raven Paucek', 16, '2009-04-03', 'Brendon O\'Hara II', 'Jeanie Kemmer', 'Murraybury', 'New Gussie', 'Delhi', 'Indian', 'Industrial Production Manager', 'Sailor', 3787282774, '2015 Rosetta Haven Apt. 269\nHuelsbury, NY 57890-8603', 'A-', 15),
(105, 'Kari Hahn', 16, '2008-07-27', 'Dane Kutch', 'Ms. Delpha Klein MD', 'Skylarside', 'Bradyland', 'Manipur', 'Indian', 'Furniture Finisher', 'City', 9909013719, '514 Pink Prairie\nWatersborough, IL 63213', 'AB-', 23),
(106, 'Jannie Cartwright II', 15, '2009-07-25', 'Tremayne Schaefer', 'Anabelle Walsh', 'Lake Norafurt', 'Lake Kennethfurt', 'Tamilnadu', 'Indian', 'Costume Attendant', 'Bridge Tender OR Lock Tender', 798659508, '20466 Hilda Ferry\nSouth Ollie, DE 68166', 'O-', 4),
(107, 'Julia Bins V', 15, '2010-03-13', 'Mr. Doyle Glover II', 'Miss Pinkie Stracke PhD', 'Adammouth', 'Port Dwight', 'Bihar', 'Indian', 'Rail Transportation Worker', 'Curator', 8469003080, '737 Murphy Shore\nMarvinhaven, AK 73062', 'O-', 24),
(108, 'Ardith Zieme', 11, '2013-09-28', 'Dr. Sedrick Koss', 'Kaylin Bechtelar', 'Manuelaton', 'Port Alverta', 'Tamilnadu', 'Indian', 'Waitress', 'Social Worker', 1616071180, '92873 Kunze Tunnel Apt. 637\nLake Reed, NE 11883', 'O+', 23),
(109, 'Virginia Hegmann DVM', 14, '2010-11-02', 'Kris Price', 'Marge Littel', 'New Delphiaborough', 'Lake Alessandra', 'Uttar pradesh', 'Indian', 'Precision Dyer', 'Psychiatrist', 1056142980, '75420 Roob Trace Apt. 314\nSouth Joan, HI 72891', 'AB+', 1),
(110, 'Amaya Raynor', 16, '2008-11-21', 'Armani Macejkovic', 'Daniela Bayer', 'South Bernardoview', 'Andersonton', 'Andra Pradesh', 'Indian', 'Transportation Equipment Maintenance', 'Mechanical Equipment Sales Representative', 1956752966, '5308 Fiona Radial Apt. 900\nPort Myles, MS 99653', 'O-', 34),
(111, 'Mr. Van Graham', 11, '2014-04-16', 'Jonathon Wisozk', 'Nelle Gibson', 'Destineychester', 'Helenatown', 'Bihar', 'Indian', 'Air Traffic Controller', 'Structural Iron and Steel Worker', 8224798901, '828 Fletcher Camp\nNew Cloyd, MD 78211-8676', 'AB+', 7),
(112, 'Pattie Gibson PhD', 11, '2013-09-06', 'Mr. Camren Welch', 'Maryam Spencer', 'Port Enidville', 'New Aliyafurt', 'Karnataka', 'Indian', 'Statement Clerk', 'Nutritionist', 6901697260, '99383 Stehr Cape\nYvonneshire, AZ 03948', 'AB+', 7),
(113, 'Lula Jast', 12, '2012-09-29', 'Abe Herzog', 'Ms. Eudora Morar MD', 'Cristmouth', 'Woodrowland', 'Andra Pradesh', 'Indian', 'Marine Architect', 'Computer Hardware Engineer', 7983501600, '91958 Kassulke Light Suite 456\nMadieberg, KS 71365-4554', 'A+', 26),
(114, 'Rosie Lebsack', 17, '2007-10-28', 'Roel Stanton', 'Delphine Kozey IV', 'South Berenice', 'New Odatown', 'Bihar', 'Indian', 'Fence Erector', 'Ceiling Tile Installer', 4353205564, '336 Gust Mount\nDouglastown, WY 41239-4780', 'A-', 20),
(115, 'Prof. Edwardo Lueilwitz', 17, '2007-09-07', 'Royal Emmerich', 'Cecilia Kemmer', 'New Jasonfort', 'Port Sandyberg', 'Uttar pradesh', 'Indian', 'Musician OR Singer', 'Radio and Television Announcer', 3326511177, '95571 Olson Forest Suite 949\nLake Idella, OH 61985-0267', 'O+', 29),
(116, 'Angelica Bins', 10, '2014-09-17', 'Enid Renner', 'Prof. Bulah Kohler', 'South Andrew', 'Ileneborough', 'Manipur', 'Indian', 'Manufactured Building Installer', 'Food Tobacco Roasting', 4052858062, '4554 Thiel Mountain\nSouth Roycebury, MS 59814-0413', 'B+', 35),
(117, 'Miss Kara Eichmann Jr.', 12, '2013-02-14', 'Jaylon Conn Sr.', 'Adeline Greenholt', 'Omahaven', 'Lake Karliburgh', 'Andra Pradesh', 'Indian', 'Pediatricians', 'Information Systems Manager', 2646004529, '2376 Kaleb Plains\nNew Kelli, RI 62511-5589', 'O-', 6),
(118, 'Florian Upton', 16, '2008-12-25', 'Amos Green', 'Miss Heather Kemmer', 'Carmellamouth', 'South Vicenta', 'Karnataka', 'Indian', 'Metal Fabricator', 'Manager of Air Crew', 3480257718, '579 Walter Spurs Suite 607\nNew Ollieborough, CA 62964-0819', 'B-', 24),
(119, 'Ford Ziemann', 10, '2014-08-07', 'Dr. Green Sporer', 'Prof. Maud Kerluke MD', 'North Jeffry', 'Lake Justice', 'Punjab', 'Indian', 'Janitor', 'Ophthalmic Laboratory Technician', 950701632, '55337 Kunze Plain Apt. 331\nJoshuaview, PA 63731', 'B+', 5),
(120, 'Earl Ledner', 13, '2012-06-28', 'Cooper Thiel Sr.', 'Rowena Bailey II', 'Priceshire', 'East Alexie', 'Punjab', 'Indian', 'Petroleum Technician', 'Punching Machine Setters', 9607001624, '4388 Powlowski Square\nEast Ocie, OH 36299', 'AB+', 30),
(121, 'Jewell Grimes', 11, '2014-03-26', 'Dr. Scot Jakubowski PhD', 'Bernadette Rempel', 'Lake Lia', 'East Trudie', 'Kerala', 'Indian', 'Garment', 'Medical Technician', 7449911546, '6081 Wayne Hill\nSchmelermouth, SC 19623-6156', 'B+', 35),
(122, 'Stanton Goyette', 15, '2010-05-03', 'Jay Walsh', 'Kiarra Gleason', 'Damionland', 'East Billieberg', 'Karnataka', 'Indian', 'Jewelry Model OR Mold Makers', 'Designer', 7177097416, '5924 Mitchell Squares Apt. 207\nSouth Marilouport, VT 30816', 'B-', 32),
(123, 'Lenna Koss PhD', 14, '2011-05-23', 'Prof. Edward Hegmann', 'Agnes Bashirian', 'Pagacview', 'New Jayceside', 'Uttar pradesh', 'Indian', 'Heating and Air Conditioning Mechanic', 'Decorator', 634370093, '94434 Marvin Ridge\nReynaview, SC 49391', 'A-', 12),
(124, 'Tremayne Moore', 16, '2009-05-19', 'Dax Osinski Jr.', 'Neha Langworth', 'Schusterfort', 'Laishashire', 'Goa', 'Indian', 'Anesthesiologist', 'Insurance Investigator', 9830991152, '5597 Ignatius Parkway Suite 753\nPort Leathaside, NJ 95820', 'A+', 3),
(125, 'Junior Reynolds IV', 17, '2008-05-18', 'Halle Wunsch', 'Dr. Kavon Wilderman', 'Jakubowskimouth', 'East Vitoshire', 'Kerala', 'Indian', 'Music Arranger and Orchestrator', 'Soldering Machine Setter', 2315579925, '18398 Dickinson Cape Suite 568\nLake Billy, MS 24779', 'O-', 10),
(126, 'Mr. Oren Klein', 15, '2010-03-30', 'Kamren Kris', 'Mrs. Taryn Mertz', 'Beckerborough', 'Hillsport', 'Goa', 'Indian', 'Safety Engineer', 'Director Of Social Media Marketing', 8870791685, '29482 Metz Passage Apt. 134\nEast Carolehaven, DE 40351', 'O-', 4),
(127, 'Aditya Mosciski', 17, '2008-03-08', 'Werner Macejkovic', 'Ellen Daugherty', 'Beahanland', 'Beattyfurt', 'Andra Pradesh', 'Indian', 'Interpreter OR Translator', 'Broadcast Technician', 3374515387, '3605 Kertzmann Path Apt. 609\nPort Eliezerland, NY 14542-7286', 'AB-', 1),
(128, 'Tod Hagenes', 17, '2008-01-28', 'Alfredo Waters', 'Lura Deckow', 'Alanismouth', 'North Anita', 'Goa', 'Indian', 'Psychiatrist', 'Welding Machine Operator', 9675902197, '81238 Borer Highway Suite 769\nWalshburgh, OR 50922', 'A+', 7),
(129, 'Delta Kuhlman', 14, '2011-04-17', 'Jon Shields IV', 'Linnie Schaden', 'Eichmannshire', 'Jefferyport', 'Punjab', 'Indian', 'Gaming Manager', 'Automotive Glass Installers', 9458666732, '8125 Wuckert Row\nNew Mellie, SD 69181-9987', 'AB-', 24),
(130, 'Cecile Altenwerth', 10, '2014-12-07', 'Royce Bruen', 'Jodie Howe', 'North Kirstin', 'Prosaccomouth', 'Kerala', 'Indian', 'Trainer', 'Legislator', 3925680503, '731 Jayden Station\nLake Melissa, FL 94768', 'AB+', 26),
(131, 'Grady Dietrich Jr.', 13, '2011-08-21', 'Dr. Declan Lowe MD', 'Ms. Lela Dickens Jr.', 'Martyshire', 'New Octavia', 'Kerala', 'Indian', 'Entertainment Attendant', 'Fishing OR Forestry Supervisor', 4553757166, '84822 D\'Amore Lake Apt. 694\nUptonton, RI 30967', 'B+', 6),
(132, 'Jairo Schmidt', 10, '2015-06-15', 'Eino Heller PhD', 'Carlie Lowe', 'Murraystad', 'Littlemouth', 'Uttar pradesh', 'Indian', 'Benefits Specialist', 'Heating and Air Conditioning Mechanic', 7934750310, '6581 Aimee Curve Apt. 581\nPort Barton, LA 21730', 'B+', 16),
(133, 'Kaylie Krajcik IV', 13, '2011-10-21', 'Michale Schultz', 'Dr. Aylin Rutherford', 'Lake Ernestina', 'Danielchester', 'Bihar', 'Indian', 'Ship Captain', 'Office Machine Operator', 3151108919, '62015 Schoen Springs Apt. 893\nNew Mackshire, AZ 06598-2753', 'AB+', 21),
(134, 'Ms. Lesly Corkery', 10, '2015-07-05', 'Mr. Lenny Bailey II', 'Miss Kaelyn VonRueden DDS', 'Port Tyreek', 'South Janickchester', 'Andra Pradesh', 'Indian', 'Claims Examiner', 'Tire Builder', 963143566, '4972 Elwyn Spring\nWest Kenny, UT 72282', 'O+', 38),
(135, 'Prof. Margaret Gulgowski', 12, '2012-11-12', 'Ford Breitenberg', 'Mafalda Corkery', 'Koelpinfort', 'South Rahsaanchester', 'Delhi', 'Indian', 'Respiratory Therapist', 'Veterinarian', 9233463910, '477 Jeffery Springs Suite 096\nGreenville, CT 79160', 'O+', 34),
(136, 'Katelynn Blick Jr.', 16, '2008-12-22', 'Mr. Schuyler Fay I', 'Mrs. Kelly Erdman', 'New Aylafort', 'North Johanstad', 'Andra Pradesh', 'Indian', 'Forester', 'Locomotive Engineer', 9123098211, '3276 Borer Prairie\nO\'Reillyton, GA 13383', 'O-', 32),
(137, 'Alvena Dibbert', 16, '2009-01-17', 'Bryce Bode', 'Vella Goldner', 'West Linneahaven', 'North Clovisshire', 'Bihar', 'Indian', 'Railroad Yard Worker', 'Custom Tailor', 1741956598, '53469 Sipes Summit\nTillmanland, AR 80706-8049', 'B-', 21),
(138, 'Juana Vandervort III', 13, '2012-02-02', 'Mekhi Glover V', 'Dr. Cecilia Kris Sr.', 'Greentown', 'Ziemeland', 'Goa', 'Indian', 'Welder', 'Dishwasher', 3319593130, '5078 Rose Plain Apt. 890\nWest Ramona, PA 41798-1428', 'B-', 11),
(139, 'Miss Thalia Goodwin', 16, '2009-03-31', 'Kole White', 'Prof. Amanda Kling', 'Reichelside', 'Port Lucious', 'Karnataka', 'Indian', 'Mathematician', 'Fast Food Cook', 4855085485, '41371 Howell Corner Suite 606\nO\'Keefeberg, MO 43768', 'O-', 27),
(140, 'Joan Larson III', 12, '2013-07-06', 'Wilber Stanton DVM', 'Ms. Yasmine Monahan', 'New Ayla', 'Lake Santa', 'Kerala', 'Indian', 'Dragline Operator', 'File Clerk', 2588542794, '171 Ratke Mount Suite 114\nSouth Kaciechester, VA 32771', 'AB-', 15),
(141, 'Burdette McClure', 11, '2014-02-24', 'Sid Runte DDS', 'Ebony Witting V', 'Nolanchester', 'South Carmel', 'Punjab', 'Indian', 'Claims Taker', 'Gluing Machine Operator', 9376762268, '59805 O\'Connell Rapids\nLangfort, OK 73176', 'O+', 25),
(142, 'Brooke Lindgren', 11, '2013-07-15', 'Myron Bechtelar', 'Deja Bergnaum III', 'Watersfort', 'North Gonzalo', 'Punjab', 'Indian', 'Vice President Of Marketing', 'Pipelaying Fitter', 4014197166, '13178 Nolan Ford\nSouth Taureanport, ND 41639-8142', 'O+', 9),
(143, 'Damaris Kautzer', 14, '2010-10-24', 'Morris Stiedemann', 'Marlee Mraz', 'New Gussiefort', 'Blandaland', 'Karnataka', 'Indian', 'Locomotive Firer', 'Personnel Recruiter', 7099070746, '25807 Retha Stravenue Suite 717\nGilbertborough, AR 31556-5369', 'B-', 9),
(144, 'Mr. Tristian Breitenberg', 14, '2011-07-01', 'Jarred Lubowitz', 'Margaretta Tremblay', 'Williamsonbury', 'Madgeborough', 'Delhi', 'Indian', 'Actuary', 'Interaction Designer', 970126884, '49480 Jakubowski Tunnel\nPortermouth, ME 53971-7003', 'O+', 25),
(145, 'Freda Von V', 13, '2012-05-23', 'Dr. Riley Casper', 'Yessenia Simonis', 'Johnstonborough', 'D\'angelofort', 'Bihar', 'Indian', 'Obstetrician', 'Composer', 3703465685, '5117 Israel Point Suite 129\nNew Dockbury, MO 90612-7042', 'O-', 2),
(146, 'Kareem McGlynn', 16, '2009-02-07', 'Skylar Nolan', 'Allison Reinger', 'Noebury', 'Gracielaview', 'Andra Pradesh', 'Indian', 'Multi-Media Artist', 'Packaging Machine Operator', 6260417236, '17948 Olson Locks Apt. 076\nEast Gaylordmouth, PA 22548-0268', 'O-', 26),
(147, 'Dr. Dayton Jerde III', 17, '2008-06-29', 'Carlo Watsica', 'Lia Smitham', 'Koelpinstad', 'New Alisonchester', 'Karnataka', 'Indian', 'Commercial Diver', 'Rough Carpenter', 2476909884, '91103 Russel Oval Suite 946\nLake Selinashire, OK 10774', 'B+', 19),
(148, 'Rosemarie Willms', 15, '2009-09-14', 'Felipe Lowe', 'Dr. Odessa Brakus', 'Cierrastad', 'West Ben', 'Uttar pradesh', 'Indian', 'Maid', 'Product Specialist', 2152594261, '7629 Windler Heights\nNorth Parkerside, IA 97172-0191', 'A+', 9),
(149, 'Marquise Ward V', 13, '2012-05-01', 'Sean Mueller', 'Fatima Balistreri III', 'Weissnathaven', 'Feestshire', 'Bihar', 'Indian', 'Fraud Investigator', 'Professor', 2327168217, '1588 Heber Causeway Apt. 769\nNorth Kavonbury, MO 20617', 'A-', 15),
(150, 'Antonietta Abernathy', 16, '2009-02-26', 'Prof. Kamron Brekke PhD', 'Mozelle Feil', 'Russellmouth', 'Ludieberg', 'Manipur', 'Indian', 'Government', 'Production Planner', 2451271272, '5749 Arely Brooks Apt. 375\nPort Viva, DE 73069', 'AB+', 14),
(151, 'Alfonso Ward DDS', 17, '2008-05-20', 'Amos Hessel', 'Miss Lavina Kautzer DDS', 'South Barry', 'Violatown', 'Bihar', 'Indian', 'Professor', 'School Bus Driver', 3001543354, '73459 D\'Amore Union Apt. 744\nNorth Vanberg, TX 13580-3366', 'AB-', 27),
(152, 'Camron Jenkins', 14, '2011-05-07', 'Kolby Shields', 'Aletha Muller', 'North Paula', 'Harveybury', 'Goa', 'Indian', 'Adjustment Clerk', 'Funeral Attendant', 7888192454, '4976 Heidenreich Keys Apt. 412\nLake Lorenzo, OR 66765', 'A+', 35),
(153, 'Nelle Upton', 11, '2013-10-14', 'Justen Hayes Sr.', 'Elfrieda Dare', 'West Minnie', 'West Codyside', 'Karnataka', 'Indian', 'Food Tobacco Roasting', 'Machine Feeder', 4187877321, '702 Price Village\nMaritzaton, MT 17892', 'A-', 15),
(154, 'Davion Langworth', 11, '2013-09-11', 'Marshall Shanahan', 'Otilia Yost', 'Bernhardshire', 'Franeckiborough', 'Tamilnadu', 'Indian', 'Mixing and Blending Machine Operator', 'Instrument Sales Representative', 1175730834, '369 Turcotte Centers\nHollyfort, NH 28324', 'A+', 1),
(155, 'Miss Baby Crooks IV', 14, '2010-09-30', 'Johathan Roberts', 'Andreane Miller', 'Port Elvis', 'Victorton', 'Delhi', 'Indian', 'Mechanical Door Repairer', 'Electrolytic Plating Machine Operator', 3820584439, '60132 Herzog Inlet Apt. 284\nSouth Floy, TN 03190-5587', 'A+', 13),
(156, 'Susanna Schoen', 17, '2008-06-29', 'Prof. Mathias Price V', 'Autumn Weissnat II', 'Magalishire', 'New Malachi', 'Bihar', 'Indian', 'Able Seamen', 'Welder and Cutter', 1712745714, '9394 Scarlett Pass\nEast Lilyan, IN 30969', 'AB-', 24),
(157, 'Prof. Elian O\'Connell', 15, '2009-07-11', 'Dr. Burley Hauck', 'Rubye Stoltenberg', 'Port Quentin', 'Chanellemouth', 'Kerala', 'Indian', 'Fire-Prevention Engineer', 'Packer and Packager', 6527459700, '29072 Precious Rue Suite 562\nLake Noahberg, MD 22136', 'A-', 10),
(158, 'Henriette Lubowitz DDS', 11, '2013-07-27', 'Jasmin Lemke', 'Marilou Nicolas', 'Jairomouth', 'Herzogshire', 'Delhi', 'Indian', 'Aircraft Engine Specialist', 'Nursing Instructor', 630465077, '416 Lowell Expressway\nEast Eduardoville, KY 53949', 'AB+', 6),
(159, 'Prof. Ava Bechtelar III', 16, '2008-08-06', 'Prof. Anderson Witting Sr.', 'Yvonne Schimmel', 'North Vernaton', 'East Eveline', 'Tamilnadu', 'Indian', 'Office Clerk', 'Aircraft Structure Assemblers', 8647636236, '741 Harris Springs\nShirleymouth, MI 10801', 'AB-', 35),
(160, 'Hope Stokes DDS', 15, '2010-01-10', 'Hugh Bruen', 'Hope Gutmann PhD', 'South Noah', 'Xzavierview', 'Uttar pradesh', 'Indian', 'Lodging Manager', 'Nuclear Technician', 2835861927, '157 Medhurst Trail Suite 491\nWest Krystelport, NE 14125', 'O+', 4),
(161, 'Maymie Will', 15, '2009-09-17', 'Harold Johns', 'Claudine Gerhold', 'Criststad', 'North Alan', 'Kerala', 'Indian', 'Bindery Machine Operator', 'Forming Machine Operator', 9172344991, '5061 Gaylord Turnpike\nWest Casandramouth, MA 96618', 'O-', 38),
(162, 'Ewell Toy', 14, '2011-06-13', 'Prof. Reuben Langworth DDS', 'Kellie Kertzmann', 'Lake Felixstad', 'Lutherburgh', 'Punjab', 'Indian', 'Electrolytic Plating Machine Operator', 'Public Health Social Worker', 8191325944, '943 Dare Mills Apt. 480\nBogantown, SC 04238', 'B-', 40),
(163, 'Marcia Roob', 13, '2011-08-18', 'Oswaldo Boehm', 'Reta Hirthe', 'Skilesburgh', 'Ransomborough', 'Uttar pradesh', 'Indian', 'Furnace Operator', 'Precision Mold and Pattern Caster', 6449364885, '4029 Morgan Parkway\nLake Arnold, NE 38788-2012', 'B-', 22),
(164, 'Mr. Jerod Schinner', 12, '2012-08-08', 'Bailey Hayes', 'Kelsi Hodkiewicz MD', 'North Jessica', 'Klingtown', 'Manipur', 'Indian', 'History Teacher', 'Order Filler OR Stock Clerk', 7266654772, '24811 Ashton Mount Suite 438\nJaredport, FL 86435', 'O-', 12),
(165, 'Tommie Brakus', 14, '2011-01-13', 'Fern Heller', 'Margarita Welch', 'South Jermain', 'Port Isomville', 'Bihar', 'Indian', 'Textile Worker', 'Rental Clerk', 7105563320, '64316 Elyssa Mall Apt. 513\nWest Jamieland, NH 75346', 'B-', 4),
(166, 'Malachi Shields', 14, '2011-02-10', 'Richard Botsford', 'Prof. Leatha Schinner', 'New Sigrid', 'New Tomas', 'Kerala', 'Indian', 'Aircraft Rigging Assembler', 'Fraud Investigator', 9118308895, '8411 Ambrose Dale\nSauerland, IN 50679-0935', 'B+', 40),
(167, 'Prof. Rory Marvin', 16, '2009-04-17', 'Kristopher Grady', 'Prof. Burnice Jacobson IV', 'New Derick', 'Brionnabury', 'Punjab', 'Indian', 'Training Manager OR Development Manager', 'Ship Mates', 2495368639, '9127 Scot Track Apt. 524\nEmardbury, NV 98526', 'A-', 39),
(168, 'Ms. Marilou Purdy Jr.', 14, '2010-12-12', 'Jamir Koepp', 'Dixie Fahey', 'East Taylorton', 'Parisianchester', 'Karnataka', 'Indian', 'Child Care Worker', 'Engraver', 5808932200, '752 Newell Wells Suite 707\nGrimesview, WY 81395-3158', 'A-', 24),
(169, 'Elsie Homenick II', 15, '2009-11-20', 'Newton Altenwerth', 'Cecilia Lesch PhD', 'South Dejuanburgh', 'Merlfurt', 'Manipur', 'Indian', 'Financial Examiner', 'Patternmaker', 6785275428, '54428 Huels Plain Apt. 323\nOberbrunnerside, VT 91075', 'AB-', 18),
(170, 'Doris Lindgren', 17, '2007-12-14', 'Chesley Considine V', 'Sonia Rolfson', 'Irvingmouth', 'Watersmouth', 'Andra Pradesh', 'Indian', 'Medical Equipment Repairer', 'Legal Secretary', 5593223898, '598 Aliyah Drive\nHamillberg, MS 34819-1682', 'A-', 27),
(171, 'Mr. Kristopher Ruecker', 15, '2010-06-17', 'Prof. Gaetano Becker Sr.', 'Heath Pacocha Sr.', 'Champlinhaven', 'Lake Lolitahaven', 'Goa', 'Indian', 'Funeral Director', 'Streetcar Operator', 7462191304, '525 Pollich Glen Suite 141\nJeramieburgh, AK 59687', 'AB-', 17),
(172, 'Laura Zulauf', 16, '2009-01-06', 'Melvina Beatty IV', 'Emmy Weber', 'Jalynmouth', 'Boyerfort', 'Kerala', 'Indian', 'Night Security Guard', 'Cafeteria Cook', 1105862918, '18086 Johns Rapids\nLeotown, TN 79873', 'O+', 35),
(173, 'Rickey Herzog IV', 11, '2013-09-02', 'Vincent Cronin', 'Greta Sauer', 'West Fredaberg', 'Collinsmouth', 'Bihar', 'Indian', 'Entertainment Attendant', 'Human Resources Assistant', 4457160369, '19417 Gillian Cape Apt. 964\nKaylahburgh, WI 06503-0603', 'A+', 24),
(174, 'Rhett Block', 15, '2010-05-22', 'Mr. Clair Runte', 'Mrs. Elna Okuneva PhD', 'South Leoneville', 'Bartellton', 'Karnataka', 'Indian', 'Detective', 'Therapist', 6179044023, '176 Bode Harbor\nRomafurt, HI 45716-2325', 'B+', 14),
(175, 'Prof. Geovany Schuster', 14, '2010-10-03', 'Eliseo Dibbert PhD', 'Leanna Jones', 'Neilburgh', 'Winstonmouth', 'Bihar', 'Indian', 'Forest and Conservation Worker', 'Sales Representative', 3764625513, '9070 Ziemann Mission\nBogisichborough, IN 38641', 'A-', 15),
(176, 'Tremayne Conn', 15, '2009-11-30', 'Edwardo Heller I', 'Sabryna Altenwerth', 'West Curt', 'Kamilleville', 'Karnataka', 'Indian', 'Musician OR Singer', 'Merchandise Displayer OR Window Trimmer', 3819208580, '4061 Jacinto Tunnel\nLebsackton, MN 55722-0544', 'A-', 2),
(177, 'Everette Dietrich', 16, '2008-10-11', 'Geovany Krajcik', 'Miss Maiya Stiedemann', 'Dachport', 'Marcelinomouth', 'Kerala', 'Indian', 'Gluing Machine Operator', 'Municipal Fire Fighting Supervisor', 8337825940, '86320 Bauch Flat Suite 164\nWest Helenechester, NE 86101-5285', 'A+', 7),
(178, 'Damaris Herzog', 11, '2013-09-28', 'Harmon Herzog', 'Cassie Gutmann', 'Aliciatown', 'New Darian', 'Uttar pradesh', 'Indian', 'Plant and System Operator', 'Hunter and Trapper', 3693880307, '77034 Hoeger Tunnel Suite 463\nNorth Flossieport, CO 54026', 'A+', 26),
(179, 'Maximillia Schmeler III', 15, '2009-09-24', 'Wiley Johns', 'Ms. Jackie Larkin', 'East Hipolitoshire', 'South Geraldhaven', 'Uttar pradesh', 'Indian', 'Civil Engineering Technician', 'Marine Architect', 4866203812, '8296 Monahan Isle Apt. 531\nSouth Murlhaven, OR 32923', 'O-', 36),
(180, 'Joshua Goodwin', 14, '2010-11-22', 'Dr. Walker Schmeler', 'Mrs. Mozell Christiansen Sr.', 'Tateview', 'Reggiemouth', 'Kerala', 'Indian', 'Waste Treatment Plant Operator', 'Police Identification OR Records Officer', 5244891380, '2370 Ziemann Spurs\nWest Ciara, OK 63424-8146', 'AB+', 16),
(181, 'Meagan Thompson', 14, '2010-09-01', 'Ethan McKenzie', 'Rosetta Runolfsson MD', 'South Delilahbury', 'Rempelchester', 'Karnataka', 'Indian', 'CEO', 'Construction Manager', 7176640504, '81446 Dooley Mission\nLake Myrtle, MD 33142-1883', 'A+', 37),
(182, 'Mrs. Kira Ullrich', 12, '2013-06-01', 'Mckenna Nienow', 'Miss Margret Reynolds', 'Lake Stevie', 'West Suzanne', 'Bihar', 'Indian', 'Chemical Technician', 'Nuclear Engineer', 5394299703, '2384 Javier Garden\nLake Korbinhaven, UT 43152-5689', 'O-', 7),
(183, 'Abigayle Hirthe', 11, '2014-03-19', 'Linwood DuBuque', 'Shanny Reynolds', 'Kilbackhaven', 'Effiemouth', 'Manipur', 'Indian', 'Watch Repairer', 'Terrazzo Workes and Finisher', 8867677542, '74171 Dicki Port\nMcClurestad, ID 19687', 'O+', 27),
(184, 'Mike Rice', 17, '2008-06-06', 'Emile Klocko', 'Henriette Fisher', 'Reynoldsberg', 'East Xavierhaven', 'Goa', 'Indian', 'Rehabilitation Counselor', 'Coil Winders', 3042095929, '834 Troy Station Apt. 127\nMicheleville, AL 08494', 'A-', 37),
(185, 'Vinnie Towne', 15, '2010-03-02', 'Elijah Hartmann', 'Madelynn Kirlin', 'Ryannfort', 'New Leannafurt', 'Punjab', 'Indian', 'Rail Car Repairer', 'Sawing Machine Operator', 4816444036, '85745 Brendon Plaza\nNew Jordymouth, KS 45341-3010', 'A-', 29),
(186, 'Dr. Christa Rowe Sr.', 12, '2013-04-17', 'Deshaun Ebert DDS', 'Hailie Gaylord', 'New Abelardo', 'Port Harmonyshire', 'Tamilnadu', 'Indian', 'Elevator Installer and Repairer', 'Aircraft Engine Specialist', 127662048, '7003 Lorenz Court Apt. 638\nNorth Merlchester, MN 02690-6671', 'A-', 41),
(187, 'Quinton Romaguera', 15, '2009-08-31', 'Dr. Kyle Fisher III', 'Ms. Loraine Conroy Jr.', 'Botsfordburgh', 'Lake Alexysport', 'Karnataka', 'Indian', 'Claims Adjuster', 'Occupational Health Safety Specialist', 607054210, '207 Alena Villages Suite 047\nEast Malika, LA 09109', 'B-', 19),
(188, 'Prof. Deven Moen', 13, '2012-02-16', 'Jabari Rolfson', 'Miss Elna Sawayn', 'Keeblerland', 'Lake Mittie', 'Manipur', 'Indian', 'Real Estate Association Manager', 'Insurance Sales Agent', 1445271111, '15861 Mraz Bypass\nNorth Weldonbury, VT 54054-9574', 'AB+', 27),
(189, 'Prof. Anderson Rowe', 14, '2010-07-17', 'Rogers Hintz', 'Marcelle Christiansen', 'New Fayefurt', 'Carolynberg', 'Goa', 'Indian', 'Sheet Metal Worker', 'Heavy Equipment Mechanic', 1172365543, '2683 Littel Port\nAriellemouth, ND 57147', 'A+', 21),
(190, 'Prof. Arnold Kovacek', 11, '2014-04-25', 'Gaetano Lindgren II', 'Francesca Lehner', 'Pfefferfurt', 'Lake Eileen', 'Manipur', 'Indian', 'Hydrologist', 'Spotters', 4358491719, '48715 Little Divide\nShawnastad, MI 85427-2679', 'AB-', 34),
(191, 'Damien Dietrich', 13, '2011-11-01', 'Mr. Gordon Hodkiewicz DDS', 'Helena Ziemann', 'Reillystad', 'Hoegerchester', 'Uttar pradesh', 'Indian', 'Environmental Science Teacher', 'Petroleum Technician', 7710096892, '709 Ella Circles Suite 050\nWittington, WV 02920', 'A-', 14),
(192, 'Mrs. Freida Ruecker', 17, '2008-01-31', 'Maximilian Crist DVM', 'Jeanie Lesch', 'Gleichnerton', 'Dannyland', 'Kerala', 'Indian', 'Biological Science Teacher', 'Underground Mining', 8558186211, '78803 Jenkins Knoll Apt. 944\nNew Antoinette, RI 30744', 'O-', 24),
(193, 'Jackson Schimmel', 17, '2008-05-07', 'Dr. Ceasar Skiles', 'Ms. Elvera Krajcik', 'Emmerichton', 'Jerrellport', 'Manipur', 'Indian', 'Pewter Caster', 'Statistical Assistant', 2906862325, '755 Beatty Valleys Apt. 592\nAlbinside, OK 66709', 'AB+', 38);
INSERT INTO `students` (`id`, `name`, `age`, `dob`, `father_name`, `mother_name`, `district`, `city`, `state`, `nationality`, `father_occupation`, `mother_occupation`, `mobile_no`, `address`, `bloodgroup`, `class_id`) VALUES
(194, 'Dr. Elias Luettgen', 13, '2012-04-10', 'Clifford Eichmann', 'Miss Elisabeth Hamill', 'North Kole', 'West Sammystad', 'Uttar pradesh', 'Indian', 'Shear Machine Set-Up Operator', 'Computer Support Specialist', 2185628320, '78246 Jonathan Trail Apt. 201\nO\'Reillyville, SD 64711', 'B-', 18),
(195, 'Pearline Beer DVM', 11, '2014-05-26', 'Mr. Tristin Kassulke', 'Aleen Labadie', 'North Carole', 'Osinskimouth', 'Andra Pradesh', 'Indian', 'Material Moving Worker', 'Mathematical Technician', 7299810189, '76849 Tony Glen Suite 180\nConcepcionville, MT 95765-8704', 'O+', 26),
(196, 'Erin Schmitt', 10, '2015-02-22', 'Prof. Matteo Grady', 'Bessie Bernhard III', 'Mitchellmouth', 'South Giovanniville', 'Manipur', 'Indian', 'Sales Person', 'Food Preparation Worker', 7453328930, '2082 Gloria Flat\nLavadatown, MI 54433-3071', 'A-', 23),
(197, 'Mrs. Alfreda Lang', 12, '2013-03-25', 'Sheldon Beier', 'Dr. Lilian Spinka DDS', 'Verliebury', 'South Lavonne', 'Manipur', 'Indian', 'Gaming Manager', 'Bailiff', 3461742940, '12045 Kamren Motorway Apt. 934\nDickifort, AR 49804-7836', 'AB+', 4),
(198, 'Jeffery Rice', 17, '2007-08-17', 'Rick Dietrich', 'Zella Crona', 'North Shawnaton', 'New Pietroville', 'Uttar pradesh', 'Indian', 'Stone Sawyer', 'Meat Packer', 3295156150, '12978 Roma Fall\nPort Rasheed, NJ 42103-7918', 'A+', 3),
(199, 'Tracey Ernser', 11, '2014-03-31', 'Bobby Fadel', 'Ms. Alysha Adams DDS', 'Feestton', 'Lake Garrett', 'Kerala', 'Indian', 'Rail Transportation Worker', 'Pressing Machine Operator', 4766192876, '31875 Gottlieb Roads Apt. 962\nFraneckichester, MN 69554-3299', 'B+', 39),
(200, 'Dr. Erich McClure II', 17, '2008-02-07', 'Mr. Mathias Wiza Sr.', 'Rafaela Sipes', 'North Doris', 'North Hollis', 'Karnataka', 'Indian', 'Costume Attendant', 'Social and Human Service Assistant', 614508770, '206 Wilson Fort Suite 947\nLake Marisol, VA 44577-0368', 'B-', 5);

-- --------------------------------------------------------

--
-- Table structure for table `student_leave_status`
--

CREATE TABLE `student_leave_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `class_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_leave_status`
--

INSERT INTO `student_leave_status` (`id`, `date`, `student_id`, `class_id`, `status`) VALUES
(1, '2025-07-06', 1, 29, 'fever'),
(2, '2025-07-08', 19, 4, 'marriage functions'),
(3, '2025-06-02', 109, 1, 'family tour'),
(4, '2025-06-04', 127, 1, 'Stomach pain'),
(5, '2025-06-06', 154, 1, 'Marriage Function'),
(6, '2025-06-07', 154, 1, 'Marriage Function'),
(7, '2025-06-09', 154, 1, 'Marriage Function'),
(8, '2025-06-10', 154, 1, 'Marriage Function'),
(9, '2025-06-11', 154, 1, 'Marriage Function'),
(10, '2025-06-12', 154, 1, 'Marriage Function'),
(11, '2025-06-16', 154, 1, 'Fever'),
(12, '2025-06-17', 154, 1, 'Fever'),
(13, '2025-06-18', 154, 1, 'Fever'),
(14, '2025-06-19', 154, 1, 'Fever'),
(15, '2025-06-18', 127, 1, 'fever'),
(16, '2025-06-19', 127, 1, 'fever'),
(17, '2025-06-25', 127, 1, 'temple'),
(18, '2025-07-01', 83, 39, 'father died'),
(19, '2025-07-02', 83, 39, 'father died'),
(20, '2025-07-03', 83, 39, 'father died'),
(21, '2025-07-04', 83, 39, 'father died'),
(22, '2025-07-05', 83, 39, 'father died'),
(23, '2025-07-07', 83, 39, 'father died'),
(24, '2025-07-08', 83, 39, 'father died'),
(25, '2025-07-09', 83, 39, 'father died'),
(26, '2025-07-07', 96, 39, 'tirupathi temple'),
(27, '2025-07-08', 96, 39, 'tirupathi temple'),
(28, '2025-07-09', 167, 39, 'fever'),
(29, '2025-07-08', 167, 39, 'fever'),
(30, '2025-07-03', 199, 39, 'family tour'),
(31, '2025-07-04', 199, 39, 'family tour'),
(32, '2025-07-05', 199, 39, 'family tour'),
(33, '2025-07-07', 199, 39, 'family tour');

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
(1, 'Tamil'),
(2, 'English'),
(3, 'Mathematics'),
(4, 'Science'),
(5, 'Social Science'),
(6, 'Computer Science'),
(7, 'Accountancy'),
(8, 'Chemistry'),
(9, 'Physics'),
(10, 'Biology');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `age` bigint(20) UNSIGNED DEFAULT NULL,
  `dob` date DEFAULT NULL,
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

INSERT INTO `teachers` (`id`, `name`, `age`, `dob`, `father_name`, `mother_name`, `degree`, `experience`, `subject_id`, `mobile_no`, `blood_group`, `address`, `password`, `role`) VALUES
(1, 'Kowsick', 26, '1996-06-14', 'Udhaya', 'Lakshmi', 'B.Ed', '5 years', 3, '3216549870', 'B+', 'Udumalpet road, palani', '$2y$12$WEWiNnxYpUVMEAVAxY/WQOFilGrwgh1qvcUFp2FOeUd3g2gpn8W0C', 'teacher'),
(2, 'Madhu', 28, '1992-01-20', 'Logesh', 'ponmani', 'M.ed', '7 years', 7, '987654312', 'A-', 'Udumalpet Road , pollachi', '$2y$12$.F10SAp1TGFacWS4kC8.xu2t574Gr87BR1yK/xNL10ecUBFOwc0vi', 'teacher'),
(5, 'kalaiselvi', 24, '2002-03-13', 'hari', 'sujatha', 'B.ed', '2 years', 2, '987654321', 'O -', 'gandhipuram, coimbatore', '$2y$12$hYU7ZEQEs9Pm7V8qZilH9.MAiLWX0bRwznhi8D.Nkaq6NJ0i3NQ42', 'teacher'),
(6, 'Suriya', 30, '1991-11-11', 'bala', 'priya', 'M.ed', '10 years', 9, '321654987', 'O +', 'saravanam patti , Coimbatore', '$2y$12$udj0Lqw/M0bQKyaKso5lYOdagGOFUskEDX8l5Zie3Ah8MRpb8nMPW', 'teacher'),
(7, 'vivek', 40, '1979-05-13', 'padma kumar', 'ganga', 'M.ed', '20 years', 8, '654321987', 'AB -', 'dindigul road, Madhurai', '$2y$12$6TdbRO9T7jCYXqFxG8jOfO40HrGB5I6wqOnApXO7S9POZgfnl2qZS', 'teacher'),
(8, 'adhick', 30, '1990-06-21', 'chandran', 'preethi', 'M.ed', '10 years', 6, '6546554321321', 'O +', 'madhurai', '$2y$12$OR/rpVgyWKNmlOGCcgM6ZO2iSwDJ8XWs3Fd1J2RjL9mtEj3T9m07e', 'teacher');

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
(3, 7, 8, 39),
(4, 5, 2, 13);

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
-- Indexes for table `student_leave_status`
--
ALTER TABLE `student_leave_status`
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
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `student_leave_status`
--
ALTER TABLE `student_leave_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teacher_assign_classes`
--
ALTER TABLE `teacher_assign_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`);

--
-- Constraints for table `student_leave_status`
--
ALTER TABLE `student_leave_status`
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
