-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2023 at 08:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel-final`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `hash_unique_id` (`id` INT, `unique_id` VARCHAR(222)) RETURNS VARCHAR(64) CHARSET utf8 COLLATE utf8_general_ci  BEGIN
  DECLARE hash VARCHAR(64);
  SET hash = SHA2(CONCAT(id, unique_id), 256);
  RETURN hash;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(222) NOT NULL,
  `guest_id` int(222) NOT NULL,
  `booking_date` date NOT NULL,
  `duration_of_stay` varchar(10) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `booking_payment_method` int(222) NOT NULL,
  `total_rooms_booked` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `unique_id` varchar(222) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `guest_id`, `booking_date`, `duration_of_stay`, `check_in_date`, `check_out_date`, `booking_payment_method`, `total_rooms_booked`, `total_amount`, `created_at`, `updated_at`, `deleted_at`, `unique_id`, `is_deleted`) VALUES
(1, 1, '2023-06-03', '42', '2023-06-09', '2023-07-21', 3, 21, 22000.00, '2023-06-02 17:00:09', '2023-06-02 17:00:09', '2023-06-02 17:00:09', '2da985c3170bf26724ee3a33bac6710e43c0358a2654f7e615d362c1bd5ed15f', 0),
(17, 1, '2023-06-16', '1', '2023-06-03', '2023-06-10', 2, 1221, 2.00, '2023-06-15 01:47:53', '2023-06-15 01:47:53', '2023-06-15 01:47:53', '5feceb66ffc86f38d952786c6d696c79c2dbc239dd4e91b46729d73a27fb57e9', 0),
(18, 1, '2023-06-09', '1221', '2023-06-03', '2023-06-03', 1, 21212, 211.00, '2023-06-15 01:48:18', '2023-06-15 01:48:18', '2023-06-15 01:48:18', '5feceb66ffc86f38d952786c6d696c79c2dbc239dd4e91b46729d73a27fb57e9', 0),
(24, 29, '2023-06-10', '5', '2023-06-10', '2023-07-01', 4, 4, 3.00, '2023-06-15 08:12:07', '2023-06-15 08:12:07', '2023-06-15 08:12:07', '5feceb66ffc86f38d952786c6d696c79c2dbc239dd4e91b46729d73a27fb57e9', 0),
(25, 29, '2023-06-03', '2', '2023-06-03', '2023-06-24', 2, 4, 2.00, '2023-06-15 08:12:19', '2023-06-15 08:12:19', '2023-06-15 08:12:19', '5feceb66ffc86f38d952786c6d696c79c2dbc239dd4e91b46729d73a27fb57e9', 0),
(26, 32, '2023-06-03', '3', '2023-06-03', '2023-06-17', 4, 4344, 4344.00, '2023-06-15 08:23:52', '2023-06-15 08:23:52', '2023-06-15 08:23:52', '5feceb66ffc86f38d952786c6d696c79c2dbc239dd4e91b46729d73a27fb57e9', 0);

--
-- Triggers `booking`
--
DELIMITER $$
CREATE TRIGGER `hash_booking_unique_id` BEFORE INSERT ON `booking` FOR EACH ROW SET NEW.`unique_id` = hash_unique_id(NEW.`id`, NEW.`unique_id`)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bookingdetails`
--

CREATE TABLE `bookingdetails` (
  `id` int(11) NOT NULL,
  `id_of_booking` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `number_of_rooms` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `unique_id` varchar(222) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `bookingdetails`
--
DELIMITER $$
CREATE TRIGGER `hash_bookingdetails_unique_id` BEFORE INSERT ON `bookingdetails` FOR EACH ROW SET NEW.`unique_id` = hash_unique_id(NEW.`id`, NEW.`unique_id`)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(222) NOT NULL,
  `name` varchar(222) NOT NULL,
  `type` varchar(222) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `unique_id` varchar(222) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `name`, `type`, `created_at`, `updated_at`, `deleted_at`, `unique_id`, `is_deleted`) VALUES
(1, 'cardholder_name', 'text', '2023-06-02 16:56:54', '2023-06-02 16:56:54', '2023-06-02 16:56:54', '0e157267a368632ecb7246a665797f6c0a007dcfc04f1eea1f01254481131aef', 0),
(2, 'cardholder_number', 'int', '2023-06-02 16:56:54', '2023-06-02 16:56:54', '2023-06-02 16:56:54', '6e209714595614625ac68db5e0a9cb51c7e59716da5c89f2eb7b3082effdd65f', 0),
(3, 'exp_date', 'date', '2023-06-02 16:57:46', '2023-06-02 16:57:46', '2023-06-02 16:57:46', '388b4bd3d73f8c3d338c124cc20a300eb21227cb53f1ee89bfb39777b1d70397', 0),
(4, 'security_no', 'int', '2023-06-02 16:57:46', '2023-06-02 16:57:46', '2023-06-02 16:57:46', '7479ca95cb99684988e2a991d5e39449742e162ebf3fa51d64eb98beccbb421a', 0),
(5, 'billing_address', 'text', '2023-06-02 16:57:46', '2023-06-02 16:57:46', '2023-06-02 16:57:46', '81e5c83f8bdf0572b28937d83b58aa121d6320c2111889f88b13fd2d35972d85', 0);

--
-- Triggers `options`
--
DELIMITER $$
CREATE TRIGGER `hash_options_unique_id` BEFORE INSERT ON `options` FOR EACH ROW SET NEW.`unique_id` = hash_unique_id(NEW.`id`, NEW.`unique_id`)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethod`
--

CREATE TABLE `paymentmethod` (
  `id` int(222) NOT NULL,
  `name` varchar(222) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `unique_id` varchar(222) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paymentmethod`
--

INSERT INTO `paymentmethod` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`, `unique_id`, `is_deleted`) VALUES
(1, 'visa', '2023-06-02 16:54:58', '2023-06-02 16:54:58', '2023-06-02 16:54:58', '3542e1ecc8f02a78ea071fe95be2eb0e448d863b21fef79adf01c5ece1423956', 0),
(2, 'fawry', '2023-06-02 16:54:58', '2023-06-02 16:54:58', '2023-06-02 16:54:58', '4cdb1c207aebf4898403daedf687cd154949670a5bfa64e79aaa787a304f5a44', 0),
(3, 'telda', '2023-06-02 16:55:19', '2023-06-02 16:55:19', '2023-06-02 16:55:19', '18345b24a333810d0fb48980bf216679f7585d48da696573147a3dffa7ead579', 0),
(4, 'cash on delivery', '2023-06-02 16:55:19', '2023-06-02 16:55:19', '2023-06-02 16:55:19', '687b8971ec2edfb9d64ce0b6f206f2a15411d86763a3148a51da02b29725dd21', 0);

--
-- Triggers `paymentmethod`
--
DELIMITER $$
CREATE TRIGGER `hash_paymentmethod_unique_id` BEFORE INSERT ON `paymentmethod` FOR EACH ROW SET NEW.`unique_id` = hash_unique_id(NEW.`id`, NEW.`unique_id`)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethodoptions`
--

CREATE TABLE `paymentmethodoptions` (
  `id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `unique_id` varchar(222) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paymentmethodoptions`
--

INSERT INTO `paymentmethodoptions` (`id`, `payment_id`, `option_id`, `created_at`, `updated_at`, `deleted_at`, `unique_id`, `is_deleted`) VALUES
(1, 1, 1, '2023-06-02 17:18:15', '2023-06-02 17:18:15', '2023-06-02 17:18:15', 'fbadb72abd6291f90443d83fa3a1653732dcd3b62c5be8371a742a7701232d74', 0),
(2, 1, 2, '2023-06-02 17:18:15', '2023-06-02 17:18:15', '2023-06-02 17:18:15', 'f7de8c47535bfe9dffc5b1e64c6870d6d51658a8456ba41788d3315708790d2c', 0),
(3, 1, 3, '2023-06-02 17:18:15', '2023-06-02 17:18:15', '2023-06-02 17:18:15', '6ca7a54051a039ae3c93574d423ed0d43e33f99fb69c147c6fcbf37fca51d9e0', 0);

--
-- Triggers `paymentmethodoptions`
--
DELIMITER $$
CREATE TRIGGER `hash_paymentmethodoptions_unique_id` BEFORE INSERT ON `paymentmethodoptions` FOR EACH ROW SET NEW.`unique_id` = hash_unique_id(NEW.`id`, NEW.`unique_id`)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethod_options_value`
--

CREATE TABLE `paymentmethod_options_value` (
  `id` int(222) NOT NULL,
  `paymentmethod_options_value_id` int(222) NOT NULL,
  `value` text NOT NULL,
  `id_info` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `unique_id` varchar(222) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paymentmethod_options_value`
--

INSERT INTO `paymentmethod_options_value` (`id`, `paymentmethod_options_value_id`, `value`, `id_info`, `created_at`, `updated_at`, `deleted_at`, `unique_id`, `is_deleted`) VALUES
(1, 1, 'yousefges', 4, '2023-06-02 18:31:41', '2023-06-02 18:31:41', '2023-06-02 18:31:41', 'd2daf62aa71bc4803e772384314e02c9f824fef51564bfb63ba873125c6bc54d', 0),
(2, 1, 'yousef ashraf', 1, '2023-06-02 21:21:29', '2023-06-02 21:21:29', '2023-06-02 21:21:29', 'd4735e3a265e16eee03f59718b9b5d03019c07d8b6c51f90da3a666eec13ab35', 0),
(3, 2, '321231123', 1, '2023-06-02 21:21:29', '2023-06-02 21:21:29', '2023-06-02 21:21:29', '4e07408562bedb8b60ce05c1decfe3ad16b72230967de01f640b7e4729b49fce', 0),
(4, 1, 'text', 4, '2023-06-11 00:01:00', '2023-06-11 00:01:00', '2023-06-11 00:01:00', '82243b5a22d64972a8ccbc2e2965d9408111df66e4ead236593df03a76889b78', 0);

--
-- Triggers `paymentmethod_options_value`
--
DELIMITER $$
CREATE TRIGGER `hash_paymentmethod_options_value_unique_id` BEFORE INSERT ON `paymentmethod_options_value` FOR EACH ROW SET NEW.`unique_id` = hash_unique_id(NEW.`id`, NEW.`unique_id`)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(222) NOT NULL,
  `room_number` int(111) NOT NULL,
  `room_category` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `unique_id` varchar(222) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `room_number`, `room_category`, `price`, `created_at`, `updated_at`, `deleted_at`, `unique_id`, `is_deleted`) VALUES
(2, 0, 2, 3000, '2023-06-02 16:44:48', '2023-06-02 16:44:48', '2023-06-02 16:44:48', 'f3546c7efd0bbcf837f068f778e4daac28df8088981469412f1ca2c67bd28e0f', 0),
(3, 103, 1, 1000, '2023-06-14 15:35:01', '2023-06-14 15:35:01', '2023-06-14 15:35:01', '5feceb66ffc86f38d952786c6d696c79c2dbc239dd4e91b46729d73a27fb57e9', 0),
(663, 69696, 1, 69696, '2023-06-14 17:34:14', '2023-06-14 17:34:14', '2023-06-14 17:34:14', '5feceb66ffc86f38d952786c6d696c79c2dbc239dd4e91b46729d73a27fb57e9', 0),
(664, 12, 1, 2313, '2023-06-14 17:40:32', '2023-06-14 17:40:32', '2023-06-14 17:40:32', '5feceb66ffc86f38d952786c6d696c79c2dbc239dd4e91b46729d73a27fb57e9', 0);

--
-- Triggers `room`
--
DELIMITER $$
CREATE TRIGGER `hash_room_unique_id` BEFORE INSERT ON `room` FOR EACH ROW SET NEW.`unique_id` = hash_unique_id(NEW.`id`, NEW.`unique_id`)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `roomfile`
--

CREATE TABLE `roomfile` (
  `id` int(222) NOT NULL,
  `room_id` int(222) NOT NULL,
  `file_path` varchar(222) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `unique_id` varchar(222) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roomfile`
--

INSERT INTO `roomfile` (`id`, `room_id`, `file_path`, `created_at`, `updated_at`, `deleted_at`, `unique_id`, `is_deleted`) VALUES
(1, 2, 'images/rooms/double.jpg', '2023-06-02 16:50:50', '2023-06-02 16:50:50', '2023-06-02 16:50:50', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 0);

--
-- Triggers `roomfile`
--
DELIMITER $$
CREATE TRIGGER `hash_roomfile_unique_id` BEFORE INSERT ON `roomfile` FOR EACH ROW SET NEW.`unique_id` = hash_unique_id(NEW.`id`, NEW.`unique_id`)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

CREATE TABLE `roomtype` (
  `id` int(222) NOT NULL,
  `category` varchar(222) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `unique_id` varchar(222) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roomtype`
--

INSERT INTO `roomtype` (`id`, `category`, `created_at`, `updated_at`, `deleted_at`, `unique_id`, `is_deleted`) VALUES
(1, 'single', '2023-06-02 16:41:23', '2023-06-02 16:41:23', '2023-06-02 16:41:23', '4fc82b26aecb47d2868c4efbe3581732a3e7cbcc6c2efb32062c08170a05eeb8', 0),
(2, 'double', '2023-06-02 16:41:23', '2023-06-02 16:41:23', '2023-06-02 16:41:23', '9b871512327c09ce91dd649b3f96a63b7408ef267c8cc5710114e629730cb61f', 0);

--
-- Triggers `roomtype`
--
DELIMITER $$
CREATE TRIGGER `hash_roomtype_unique_id` BEFORE INSERT ON `roomtype` FOR EACH ROW SET NEW.`unique_id` = hash_unique_id(NEW.`id`, NEW.`unique_id`)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(222) NOT NULL,
  `full_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `user_type` int(222) NOT NULL,
  `DOB` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `unique_id` varchar(222) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `full_name`, `email`, `password`, `user_type`, `DOB`, `created_at`, `updated_at`, `deleted_at`, `unique_id`, `is_deleted`) VALUES
(1, 'Yousef ashraf', 'saw@gmail.com', '231313', 1, '2023-06-16', '2023-06-02 16:39:24', '2023-06-02 16:39:24', '2023-06-02 16:39:24', '4fc82b26aecb47d2868c4efbe3581732a3e7cbcc6c2efb32062c08170a05eeb8', 0),
(29, 'ahmed mo7sen', 'kovomig272@cutefier.com', 'sawy', 1, '0000-00-00', '2023-06-06 20:37:33', '2023-06-06 20:37:33', '2023-06-06 20:37:33', '35135aaa6cc23891b40cb3f378c53a17a1127210ce60e125ccf03efcfdaec458', 0),
(32, 'me', 'yousef.sawy3@gmail.com', 'sawy', 1, '2023-06-05', '2023-06-06 22:47:22', '2023-06-06 22:47:22', '2023-06-06 22:47:22', 'e29c9c180c6279b0b02abd6a1801c7c04082cf486ec027aa13515e4f3884bb6b', 0),
(33, 'me', 'yousef.sawy3@gmail.com', 'saw', 1, '2023-06-02', '2023-06-07 20:05:39', '2023-06-07 20:05:39', '2023-06-07 20:05:39', 'c6f3ac57944a531490cd39902d0f777715fd005efac9a30622d5f5205e7f6894', 0),
(34, 'me', 'yousefsawy2@gmail.com', '123', 2, '2023-06-04', '2023-06-07 21:06:55', '2023-06-07 21:06:55', '2023-06-07 21:06:55', '86e50149658661312a9e0b35558d84f6c6d3da797f552a9657fe0558ca40cdef', 0),
(35, 'malkk12', 'ma12lk@malk.com', 'malk', 1, '2023-06-15', '2023-06-07 22:01:51', '2023-06-07 22:01:51', '2023-06-07 22:01:51', '9f14025af0065b30e47e23ebb3b491d39ae8ed17d33739e5ff3827ffb3634953', 0),
(36, 'malkk', 'malk@malk.com', 'malk', 1, '2023-06-01', '2023-06-07 22:02:19', '2023-06-07 22:02:19', '2023-06-07 22:02:19', '76a50887d8f1c2e9301755428990ad81479ee21c25b43215cf524541e0503269', 0),
(37, 'dwqq', 'yousefsawy2@gmail.com', 'sawy', 2, '2023-06-13', '2023-06-08 18:25:28', '2023-06-08 18:25:28', '2023-06-08 18:25:28', '7a61b53701befdae0eeeffaecc73f14e20b537bb0f8b91ad7c2936dc63562b25', 0),
(38, 'hala', 'hala@hala.com', 'hala', 2, '1986-02-11', '2023-06-10 13:41:40', '2023-06-10 13:41:40', '2023-06-10 13:41:40', 'aea92132c4cbeb263e6ac2bf6c183b5d81737f179f21efdc5863739672f0f470', 0),
(39, 'ahmed new', 'newww@gmail.com', '123', 1, '2023-06-01', '2023-06-10 15:28:59', '2023-06-10 15:28:59', '2023-06-10 15:28:59', '0b918943df0962bc7a1824c0555a389347b4febdc7cf9d1254406d80ce44e3f9', 0);

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `hash_user_unique_id` BEFORE INSERT ON `user` FOR EACH ROW SET NEW.`unique_id` = hash_unique_id(NEW.`id`, NEW.`unique_id`)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `id` int(11) NOT NULL,
  `name` varchar(222) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `unique_id` varchar(222) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`, `unique_id`, `is_deleted`) VALUES
(1, 'guest', '2023-06-02 16:37:44', '2023-06-02 16:37:44', '2023-06-02 16:37:44', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 0),
(2, 'admin', '2023-06-02 16:38:21', '2023-06-02 16:38:21', '2023-06-02 16:38:21', '785f3ec7eb32f30b90cd0fcf3657d388b5ff4297f2f9716ff66e9b69c05ddd09', 0);

--
-- Triggers `usertype`
--
DELIMITER $$
CREATE TRIGGER `hash_usertype_unique_id` BEFORE INSERT ON `usertype` FOR EACH ROW SET NEW.`unique_id` = hash_unique_id(NEW.`id`, NEW.`unique_id`)
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guest_id` (`guest_id`,`booking_payment_method`),
  ADD KEY `booking_payment_method` (`booking_payment_method`);

--
-- Indexes for table `bookingdetails`
--
ALTER TABLE `bookingdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_of_booking` (`id_of_booking`,`room_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentmethodoptions`
--
ALTER TABLE `paymentmethodoptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_id` (`payment_id`,`option_id`),
  ADD KEY `option_id` (`option_id`);

--
-- Indexes for table `paymentmethod_options_value`
--
ALTER TABLE `paymentmethod_options_value`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paymentmethod_options_value` (`paymentmethod_options_value_id`),
  ADD KEY `id_info` (`id_info`),
  ADD KEY `paymentmethod_options_value_id` (`paymentmethod_options_value_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_category` (`room_category`);

--
-- Indexes for table `roomfile`
--
ALTER TABLE `roomfile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_type` (`user_type`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `bookingdetails`
--
ALTER TABLE `bookingdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `paymentmethodoptions`
--
ALTER TABLE `paymentmethodoptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `paymentmethod_options_value`
--
ALTER TABLE `paymentmethod_options_value`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=665;

--
-- AUTO_INCREMENT for table `roomfile`
--
ALTER TABLE `roomfile`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roomtype`
--
ALTER TABLE `roomtype`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`guest_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`booking_payment_method`) REFERENCES `paymentmethod` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bookingdetails`
--
ALTER TABLE `bookingdetails`
  ADD CONSTRAINT `bookingdetails_ibfk_1` FOREIGN KEY (`id_of_booking`) REFERENCES `booking` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookingdetails_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paymentmethodoptions`
--
ALTER TABLE `paymentmethodoptions`
  ADD CONSTRAINT `paymentmethodoptions_ibfk_1` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paymentmethodoptions_ibfk_2` FOREIGN KEY (`payment_id`) REFERENCES `paymentmethod` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paymentmethod_options_value`
--
ALTER TABLE `paymentmethod_options_value`
  ADD CONSTRAINT `paymentmethod_options_value_ibfk_1` FOREIGN KEY (`id_info`) REFERENCES `paymentmethod` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paymentmethod_options_value_ibfk_2` FOREIGN KEY (`paymentmethod_options_value_id`) REFERENCES `paymentmethodoptions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`room_category`) REFERENCES `roomtype` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `roomfile`
--
ALTER TABLE `roomfile`
  ADD CONSTRAINT `roomfile_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_type`) REFERENCES `usertype` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
