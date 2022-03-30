-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2022 at 10:45 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enquiry`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `primary_phone_number` bigint(255) NOT NULL,
  `secondary_phone_number` bigint(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `primary_phone_number`, `secondary_phone_number`, `created_at`) VALUES
(40, 'Raunaq', 'Raj', 'raunaq2@gmail.com', 1234567890, 1234567890, '2022-03-21 12:19:01'),
(41, 'Raunaq', 'Raj', 'raunaq@gmail.com', 1234567890, 1234567890, '2022-03-21 17:03:26'),
(43, 'naveen', 'Kumar', 'naveen@gmail.com', 1234567890, 1234567890, '2022-03-23 13:08:11'),
(48, 'sankalp', 'suman', 'sankalp@gmail.com', 1234567890, 1234567890, '2022-03-27 16:40:52'),
(49, 'Aarush', 'raj', 'aarush@hotmail.com', 1234567890, 1234567890, '2022-03-27 16:44:27'),
(50, 'Vipul', 'Vaibhav', 'vipul@gmail.com', 1234567890, 1234567890, '2022-03-27 21:52:36'),
(51, 'Aarush', 'Raj', 'aarush@gmail.com', 1234567890, 1234567890, '2022-03-29 17:59:17'),
(52, 'Lokesh', 'chauhan', 'lokesh247@gmail.com', 1234567890, 1234567890, '2022-03-30 13:17:36'),
(53, 'fardeen', 'khan', 'fardeen@gnail.com', 1234567890, 1234567890, '2022-03-30 13:40:47'),
(54, 'Raunaq', 'Raj', 'raunaq@gmail.com', 1234567890, 1234567890, '2022-03-30 13:53:18');

-- --------------------------------------------------------

--
-- Table structure for table `informations`
--

CREATE TABLE `informations` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `informations`
--

INSERT INTO `informations` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(47, 'Lokesh', 'lokesh@gmail.com', 'Regarding Facilities available', 'hi , \r\nMy name is Lokesh and i would like to know more about your hotel facilities so that i can book a room when i visit your hotel.\r\n\r\nThank You \r\nLokesh', '2022-03-27 17:32:41'),
(48, 'Raunaq', 'raunaq@gmail.com', 'Regarding Room Facilities', 'hi , My name is Lokesh and i would like to know more about your hotel facilities so that i can book a room when i visit your hotel. \r\n\r\nThank You\r\n Lokesh', '2022-03-27 17:33:57'),
(52, 'Aarush', 'aarush@gmail.com', 'Regarding Room Categories', 'Hi ,\r\nI am Aarush and i would like to know about Room categories in your hotel.', '2022-03-29 17:57:50'),
(53, 'Deepak', 'deepak@gmail.com', 'Regarding Your services', 'How are you going to manage every event which is held in your hotels accordingly?', '2022-03-29 20:32:58');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `customer_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `transaction_number` text NOT NULL,
  `mode_of_payments` text NOT NULL,
  `bank` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`customer_id`, `id`, `transaction_number`, `mode_of_payments`, `bank`, `created_at`) VALUES
(48, 5, '1234567890', 'debit card', 'hdfc', '2022-03-27 16:40:52'),
(49, 6, '1234567890', 'credit card', 'punjab national bank', '2022-03-27 16:44:27'),
(50, 7, '1234567890', 'UPI', 'icici', '2022-03-27 21:52:37'),
(51, 8, '1234567890', 'UPI', 'SBI', '2022-03-29 17:59:17'),
(52, 9, '1234567890', 'Credit Card', 'ICICI', '2022-03-30 13:17:36'),
(53, 10, '1234567890', 'upi', 'state bank of india', '2022-03-30 13:40:47'),
(41, 11, '1234567890', 'UPI', 'ICICI Bank', '2022-03-30 13:53:18');

-- --------------------------------------------------------

--
-- Table structure for table `payment_card`
--

CREATE TABLE `payment_card` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `card_number` int(255) NOT NULL,
  `payment_authority` text NOT NULL,
  `expiry_date` date NOT NULL,
  `cvv` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_card`
--

INSERT INTO `payment_card` (`id`, `customer_id`, `card_number`, `payment_authority`, `expiry_date`, `cvv`, `created_at`) VALUES
(11, 40, 1234567890, 'visa', '2022-03-25', 250, '2022-03-21 12:19:02'),
(14, 43, 1234567890, 'VISA', '2022-03-17', 255, '2022-03-23 13:08:11');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `room` int(11) NOT NULL COMMENT '1. presidential suite 2. luxury suite\r\n3. classic appartment',
  `quantity` int(11) NOT NULL,
  `checkin` varchar(75) NOT NULL,
  `checkout` varchar(75) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `customer_id`, `room`, `quantity`, `checkin`, `checkout`, `created_at`) VALUES
(6, 51, 30, 3, '2022-03-10', '2022-03-27', '2022-03-29 17:59:17'),
(7, 52, 32, 7, '2022-03-31', '2022-04-28', '2022-03-30 13:17:36'),
(8, 53, 32, 2, '2022-03-16', '2022-05-20', '2022-03-30 13:40:48'),
(9, 41, 32, 3, '2022-03-25', '2022-03-27', '2022-03-30 13:53:18');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_category_id` int(11) NOT NULL,
  `room_facility_id` int(11) NOT NULL,
  `heading` text NOT NULL,
  `description` text NOT NULL,
  `area_code` int(50) NOT NULL,
  `location` text NOT NULL,
  `price` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_category_id`, `room_facility_id`, `heading`, `description`, `area_code`, `location`, `price`, `created_at`) VALUES
(30, 19, 9, 'Beautiful Appartment', 'Newly Furnished appartment with comfortable bed and food services', 110025, 'https://www.google.com/travel/hotels/s/nmzuS1G6iKM3AbVJA', '₹1500', '2022-03-29 17:31:01'),
(31, 20, 1, 'beautiful suite', 'beautiful suite with a comfortable bed newly furnished', 110047, 'https://www.google.com/travel/hotels/s/nmzuS1G6iKM3AbVJA', '₹5000', '2022-03-29 17:34:35'),
(32, 21, 9, 'best luxury appartment', 'Best luxury appartment with food services and much more', 10077, 'https://www.google.com/travel/hotels/s/nmzuS1G6iKM3AbVJA', '₹3500', '2022-03-29 17:35:56'),
(33, 19, 9, 'newly furbished appartment', 'Newly furbished appartment with comfortable bed and food services', 110025, 'https://goo.gl/maps/ujv9juQPXSAxG7Qe8', '₹2500', '2022-03-30 14:01:43');

-- --------------------------------------------------------

--
-- Table structure for table `room_categories`
--

CREATE TABLE `room_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_categories`
--

INSERT INTO `room_categories` (`id`, `name`, `description`, `created_at`) VALUES
(19, 'presidential blemish appartment', 'Beautiful suite', '2022-03-29 17:13:44'),
(20, 'Deluxe flowers appartment', 'beautiful lawn view from window', '2022-03-29 17:14:54'),
(21, 'Blooming luxury appartment', 'luxury appartment ', '2022-03-29 17:21:29');

-- --------------------------------------------------------

--
-- Table structure for table `room_facility`
--

CREATE TABLE `room_facility` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_facility_list_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room_facility_lists`
--

CREATE TABLE `room_facility_lists` (
  `id` int(11) NOT NULL,
  `facility` text NOT NULL,
  `price` bigint(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_facility_lists`
--

INSERT INTO `room_facility_lists` (`id`, `facility`, `price`, `created_at`) VALUES
(1, 'Comfortable Bed', 1500, '2022-03-22 17:52:52'),
(9, 'Food Services', 1400, '2022-03-23 07:40:46');

-- --------------------------------------------------------

--
-- Table structure for table `room_image`
--

CREATE TABLE `room_image` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_image`
--

INSERT INTO `room_image` (`id`, `room_id`, `image`, `created_at`) VALUES
(28, 30, '2016276002.jpg', '2022-03-29 17:31:48'),
(29, 31, '404959839.jpg', '2022-03-29 17:36:25'),
(30, 32, '157167269.jpg', '2022-03-29 17:38:22'),
(31, 33, '2052226559.jpg', '2022-03-30 14:12:55');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` bigint(12) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `user_id`, `name`, `email`, `phone_number`, `created_at`) VALUES
(52, 47, 'sunny', 'sunny@gmail.com', 1234567890, '2022-03-21 17:02:01'),
(54, 49, 'Neeraj', 'Neeraj@gmail.com', 1234567890, '2022-03-23 08:05:48'),
(56, 52, 'Raunak', 'sharma@raunak.com', 1234567890, '2022-03-28 10:19:11');

-- --------------------------------------------------------

--
-- Table structure for table `staff_designation`
--

CREATE TABLE `staff_designation` (
  `id` int(11) NOT NULL,
  `staff_type_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_designation`
--

INSERT INTO `staff_designation` (`id`, `staff_type_id`, `staff_id`, `created_at`) VALUES
(1, 9, 56, '2022-03-28 10:24:52');

-- --------------------------------------------------------

--
-- Table structure for table `staff_types`
--

CREATE TABLE `staff_types` (
  `id` int(11) NOT NULL,
  `designation` text NOT NULL,
  `info` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_types`
--

INSERT INTO `staff_types` (`id`, `designation`, `info`, `created_at`) VALUES
(9, 'Receptionist', 'Manages all types of request done by customers', '2022-03-17 11:35:14'),
(12, 'Manager', 'manages everything', '2022-03-17 15:58:55'),
(15, 'Receptionist', 'manages all the details of customer', '2022-03-21 16:51:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `type` int(1) NOT NULL DEFAULT 2 COMMENT '1 = admin , 2 = user, 3 = staffs',
  `iv` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `type`, `iv`, `created_at`) VALUES
(1, 'Raunaq', 'raunaq@gmail.com', 'sUK0yLMI', 1, '459f56c2af013658f435d8f7876dae4a', '2022-03-02 20:29:12'),
(3, 'vipul', 'vipul@gmail.com', '5XUpF0g=', 2, '80190e694f167c2dccf751d6b2412598', '2022-03-03 22:26:11'),
(4, 'Hello', 'hello@yahoo.com', 'bw/7tdU=', 2, 'dd09e0d6665b4768cde11790a50db421', '2022-03-04 14:47:00'),
(5, 'lokesh', 'lokesh123@gmail.com', 'AtweZwr4', 2, '20cf6479a7029e082211c00689bbf3c6', '2022-03-17 17:23:14'),
(6, 'sankalp', 'sankalp265@gmail.com', 'vGujf4VmMA==', 2, 'c643b60d81e9e3ca58a0de9adcd6c7fa', '2022-03-17 17:25:30'),
(7, 'kaushal', 'kaushal256@gmail.com', 'UxRXfDFttg==', 2, '6fecc0fc58a2de9619e87c3ec55e900b', '2022-03-18 12:31:41'),
(8, 'soham', 'soham@gmail.com', 'ckuMkqE=', 2, '6de3036b8fd42f354f66ee81cb990b1d', '2022-03-18 13:52:00'),
(14, 'aarush', 'aarush@gmail.com', 'k8ajtU9H', 2, 'd6a7fa92ab612f0e3e544aaed2bec7da', '2022-03-18 19:29:12'),
(15, 'Raunaq', 'mdmishra@gmail.com', 'HueR3VCC8Yg=', 2, '82c984c4d03d9bd3826257ce5e844f76', '2022-03-18 19:29:55'),
(16, 'sahil', 'sahil@gmail.com', 'GqEd/nw=', 2, '9faa35b940e01694ea3245370eb1ca1e', '2022-03-19 08:00:31'),
(17, 'deepak', 'deepak@gmail.com', 'RNmITALX', 2, 'ee87457327bb83cbd41d9fdfd1a39218', '2022-03-19 08:44:29'),
(18, 'hello', 'hello@gmail.com', 'GdpsYEtTEdVYtw==', 2, '7502e1cd20dbe6d32fcfe1da38a777ce', '2022-03-19 08:53:18'),
(19, 'rahul', 'rahul@gmail.com', 'QgTvMMy7CFWO2A==', 2, 'd3552d50c5dd2e2852c01a43da47c1ce', '2022-03-19 08:56:37'),
(20, 'raj', 'raj123@gmail.com', 'bT1kxna4nrsAwg==', 2, 'ede459ac40594c9e29dd365f7a85be4f', '2022-03-19 08:57:37'),
(21, 'rasheed', 'rasheed@gmail.com', 'Z+RzUGEhNQ==', 2, '9c8eec2f00d1396871a3c674595e8615', '2022-03-19 08:58:47'),
(22, 'faizan', 'faizan@gmail.com', 'MNUqspHCSX8+3w==', 2, 'c78202ce58f06520993364ec6ba5a884', '2022-03-19 09:13:26'),
(23, 'fardeen', 'fardeen@gmail.com', '8b0I6VpPx5SG', 2, '22a2bccb39f4c05fab2e62d7542a3418', '2022-03-19 09:14:02'),
(24, 'ramadan', 'ramadan@gmail.com', 'RN4D9oo+gQ==', 2, 'dc46f2930712c494474ba971424bbe16', '2022-03-19 10:20:00'),
(25, 'sahil@gmail.com', 'raunaq256@gmail.com', 'b/DRAIU=', 2, 'f2b03c4cdf9027743ded51d19da24058', '2022-03-19 16:15:29'),
(26, 'shaurya', 'shaurya@gmail.com', 'Rrva5e/kLw==', 2, 'eb34958783752a85ef4237f9bdc33d3e', '2022-03-19 16:16:45'),
(27, 'simon', 'simon@gmail.com', 'rx22gfk=', 2, '41faa2f23f76b743b7ab4b68ce37631f', '2022-03-19 16:18:55'),
(28, 'aarush', 'aarush566@gmail.com', 'F+/DcJ7z', 2, '91e0a877b4e26eb1c7e5ec95d8f47133', '2022-03-19 16:20:57'),
(29, 'aarush', 'aarush66@gmail.com', 'rWKy0tk+', 2, 'e407d9213425334d5c65ef9a56a566f4', '2022-03-19 16:21:06'),
(30, 'aarush', 'aarush6@gmail.com', 'Px646Qr9', 2, '1d7b16193efb688fdc1e337fb1598ea1', '2022-03-19 16:22:03'),
(31, 'aarush', 'sjjcvgc@gmail.com', '9sDLKc0d', 2, 'b16e5045267bc84c1cf1c30fa15ff764', '2022-03-19 16:22:37'),
(32, 'arya', 'arya@gmail.com', 'p4Surg==', 2, '3075e1bc8bbf566c1dbf743e9e9d89c8', '2022-03-19 16:23:31'),
(33, 'deeksha', 'deeksha@gmail.com', 'S9GEFLx8Fw==', 2, 'f754e59d6ed8e8d10281d69d22efae7b', '2022-03-20 11:01:00'),
(34, 'vimal', 'vimal@gmail.com', 'ycjcOt4=', 2, 'b6b6839058b50655355b30d75de306a6', '2022-03-20 12:18:22'),
(35, 'aarush', 'aarush326@hotmail.com', 'IPmei1gQ', 2, 'f9da8db2d705905961676f568412637a', '2022-03-21 07:34:29'),
(36, 'Raunaq', 'raunaq2811@gmail.com', 'UdjDIg==', 2, '5561484259e2fd2b52d744ef44d3c8fb', '2022-03-21 11:10:45'),
(37, 'Raunaq', 'raunaq11@gmail.com', 'LYTQJg==', 2, 'b7f27364979f538eae5a68886b2c2fae', '2022-03-21 11:11:33'),
(38, 'Raunaq', 'raunaq111@gmail.com', 'FDOgvw==', 2, '744f9d05f2e785b9f91fb5016b3ad1a0', '2022-03-21 11:12:12'),
(39, 'Raunaq', 'raunaq1191@gmail.com', '0v1Myg==', 2, 'bd5ef28b0a2fbdf376252bb1cc8a6fa6', '2022-03-21 11:13:24'),
(44, 'ishaan', 'ishaan@gmail.com', 'ZmhCkd7s', 2, '0f5fe7c8cd0f1623cde4d90dd8c4419d', '2022-03-21 11:23:04'),
(45, 'ishaan', 'ishaan1@gmail.com', 'vrU8A+aG', 2, 'e49337d12e3564ecb2ba4660a91c615b', '2022-03-21 11:24:38'),
(46, 'suhana', 'suhana@gmail.com', 'gpzbHWjc', 2, 'dd8e12b9e4fd6f4275f8b540b313073c', '2022-03-21 11:27:25'),
(47, 'sunny', 'sunny@gmail.com', '03mckow=', 2, '508ff6c5263e9039102fec5c165fc1ae', '2022-03-21 17:02:01'),
(48, 'sanjana', 'sanjana@gmail.com', 'uEfwW9fHDA==', 2, '3b9c7462aa3c18782409cd7d03e6b385', '2022-03-21 20:17:27'),
(49, 'Neeraj', 'Neeraj@gmail.com', 'z0RsG2sq', 2, 'a2d08d57af1835e3f610f53d329b53f8', '2022-03-23 08:05:47'),
(51, 'kushal', 'kushal@gmail.com', 'St8qR9+p', 2, 'f3a296f5912a178dc51f67d0eed17866', '2022-03-26 21:34:29'),
(52, 'Raunak', 'sharma@raunak.com', 'ItasCCKf', 2, '7e3fad279dbc3f92415c9b74112302c7', '2022-03-28 10:19:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informations`
--
ALTER TABLE `informations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `payment_card`
--
ALTER TABLE `payment_card`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservation_ibfk_1` (`customer_id`),
  ADD KEY `reservation_ibfk_2` (`room`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_ibfk_2` (`room_facility_id`),
  ADD KEY `rooms_ibfk_3` (`room_category_id`);

--
-- Indexes for table `room_categories`
--
ALTER TABLE `room_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_facility`
--
ALTER TABLE `room_facility`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_facility_list_id` (`room_facility_list_id`),
  ADD KEY `room_facility_ibfk_1` (`room_id`);

--
-- Indexes for table `room_facility_lists`
--
ALTER TABLE `room_facility_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_image`
--
ALTER TABLE `room_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_image_ibfk_1` (`room_id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staffs_ibfk_1` (`user_id`);

--
-- Indexes for table `staff_designation`
--
ALTER TABLE `staff_designation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_designation_ibfk_2` (`staff_type_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `staff_types`
--
ALTER TABLE `staff_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `informations`
--
ALTER TABLE `informations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payment_card`
--
ALTER TABLE `payment_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `room_categories`
--
ALTER TABLE `room_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `room_facility`
--
ALTER TABLE `room_facility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room_facility_lists`
--
ALTER TABLE `room_facility_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `room_image`
--
ALTER TABLE `room_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `staff_designation`
--
ALTER TABLE `staff_designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff_types`
--
ALTER TABLE `staff_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_card`
--
ALTER TABLE `payment_card`
  ADD CONSTRAINT `payment_card_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`room`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_2` FOREIGN KEY (`room_facility_id`) REFERENCES `room_facility_lists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rooms_ibfk_3` FOREIGN KEY (`room_category_id`) REFERENCES `room_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room_facility`
--
ALTER TABLE `room_facility`
  ADD CONSTRAINT `room_facility_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room_facility_ibfk_2` FOREIGN KEY (`room_facility_list_id`) REFERENCES `room_facility_lists` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `room_image`
--
ALTER TABLE `room_image`
  ADD CONSTRAINT `room_image_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staffs`
--
ALTER TABLE `staffs`
  ADD CONSTRAINT `staffs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff_designation`
--
ALTER TABLE `staff_designation`
  ADD CONSTRAINT `staff_designation_ibfk_2` FOREIGN KEY (`staff_type_id`) REFERENCES `staff_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `staff_designation_ibfk_3` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
