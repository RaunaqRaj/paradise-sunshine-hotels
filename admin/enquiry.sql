-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2022 at 03:52 AM
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
(2, 'Raunaq', 'Raj', '', 7827540501, 8860601972, '2022-03-14 21:21:40'),
(22, 'Rahul', 'Kumar', 'rk@gmail.com', 1234567890, 1234567890, '2022-03-16 15:31:38'),
(23, 'Rahul', 'chaudhary', 'rahul@gmail.com', 1345678902, 1345678902, '2022-03-16 15:32:08'),
(24, 'vipul', 'vaibhav', 'vipul@gmail.com', 1234567890, 1234567890, '2022-03-16 15:32:40'),
(25, 'Raunaq', 'Raj', 'raunaq@gmail.com', 1234567890, 1234567890, '2022-03-17 08:01:37');

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
(3, 'Lokesh', 'lokesh@gmail.com', 'hi', 'hello i am lokesh', '2022-03-11 19:55:46'),
(29, 'Raunaq', 'Raunaq@gmail.com', 'hi', 'hello i am Raunaq', '2022-03-12 08:15:48'),
(30, 'Raunaq', 'Raunaq@gmail.com', 'hi', 'hello i am Raunaq', '2022-03-12 08:15:54'),
(31, 'Raunaq', 'Raunaq@gmail.com', 'hi', 'hello i am Raunaq', '2022-03-12 08:16:00'),
(32, 'Raunaq', 'Raunaq@gmail.com', 'hi', 'hello i am Raunaq', '2022-03-12 08:16:07'),
(33, 'Raunaq', 'Raunaq@gmail.com', 'hi', 'hello i am Raunaq', '2022-03-12 08:16:14');

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
(1, 23, 123456789, 'Rupay', '2022-03-02', 255, '2022-03-17 07:59:10');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `room` varchar(50) NOT NULL COMMENT '1. presidential suite 2. luxury suite\r\n3. classic appartment',
  `checkin` varchar(75) NOT NULL,
  `checkout` varchar(75) NOT NULL,
  `status` text NOT NULL DEFAULT 'pending' COMMENT 'pending , Reserved',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `customer_id`, `room`, `checkin`, `checkout`, `status`, `created_at`) VALUES
(1, 2, '1', '22-03-2022', '22-03-2022', 'pending', '2022-03-14 21:24:14');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_category_id` int(11) NOT NULL,
  `heading` text NOT NULL,
  `description` text NOT NULL,
  `area_code` int(50) NOT NULL,
  `location` text NOT NULL,
  `price` bigint(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_category_id`, `heading`, `description`, `area_code`, `location`, `price`, `created_at`) VALUES
(1, 1, 'Beautiful suite', 'it is very comfortable', 110039, 'new delhi', 2500, '2022-03-14 21:51:20');

-- --------------------------------------------------------

--
-- Table structure for table `room_categories`
--

CREATE TABLE `room_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_categories`
--

INSERT INTO `room_categories` (`id`, `name`, `created_at`) VALUES
(1, 'presidential suite', '2022-03-14 21:49:29');

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

--
-- Dumping data for table `room_facility`
--

INSERT INTO `room_facility` (`id`, `room_id`, `room_facility_list_id`, `created_at`) VALUES
(1, 1, 1, '2022-03-14 21:54:24');

-- --------------------------------------------------------

--
-- Table structure for table `room_facility_lists`
--

CREATE TABLE `room_facility_lists` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` bigint(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_facility_lists`
--

INSERT INTO `room_facility_lists` (`id`, `name`, `price`, `created_at`) VALUES
(1, 'Balcony View', 2500, '2022-03-14 21:52:51');

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
(1, 1, 'suite.jpg', '2022-03-14 21:57:50');

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
(1, 4, 'Raunaq', 'raunaq@gmail.com', 7827540501, '2022-03-14 21:44:53');

-- --------------------------------------------------------

--
-- Table structure for table `staff_designation`
--

CREATE TABLE `staff_designation` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `staff_type_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_designation`
--

INSERT INTO `staff_designation` (`id`, `staff_id`, `staff_type_id`, `created_at`) VALUES
(1, 1, 1, '2022-03-16 09:58:20'),
(2, 1, 2, '2022-03-16 10:00:55');

-- --------------------------------------------------------

--
-- Table structure for table `staff_types`
--

CREATE TABLE `staff_types` (
  `id` int(11) NOT NULL,
  `designation` text NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_types`
--

INSERT INTO `staff_types` (`id`, `designation`, `description`, `created_at`) VALUES
(1, 'Manager', 'Manages all kinds of facilities and staff works', '2022-03-14 21:46:19'),
(3, 'Manager', 'Manages all kinds of facilities and staff works', '2022-03-16 17:02:34'),
(4, 'Receptionist', 'Manages all kinds of facilities and staff works', '2022-03-16 20:13:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `type` int(1) NOT NULL DEFAULT 2,
  `iv` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `type`, `iv`, `created_at`) VALUES
(1, 'Raunaq', 'raunaq@gmail.com', 'sUK0yLMI', 2, '459f56c2af013658f435d8f7876dae4a', '2022-03-02 20:29:12'),
(2, 'Raunaq_01', 'raunaq123@gmail.com', '1Yv1knMv', 2, 'ee9d30e5bfcb0a66a99b66a7b2aa902c', '2022-03-02 21:06:20'),
(3, 'vipul', 'vipul@gmail.com', '5XUpF0g=', 2, '80190e694f167c2dccf751d6b2412598', '2022-03-03 22:26:11'),
(4, 'Hello', 'hello@yahoo.com', 'bw/7tdU=', 2, 'dd09e0d6665b4768cde11790a50db421', '2022-03-04 14:47:00');

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
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_category_id` (`room_category_id`);

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
  ADD KEY `room_id` (`room_id`),
  ADD KEY `room_facility_list_id` (`room_facility_list_id`);

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
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `staff_designation`
--
ALTER TABLE `staff_designation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `staff_type_id` (`staff_type_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `informations`
--
ALTER TABLE `informations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `payment_card`
--
ALTER TABLE `payment_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room_categories`
--
ALTER TABLE `room_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room_facility`
--
ALTER TABLE `room_facility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room_facility_lists`
--
ALTER TABLE `room_facility_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room_image`
--
ALTER TABLE `room_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff_designation`
--
ALTER TABLE `staff_designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff_types`
--
ALTER TABLE `staff_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment_card`
--
ALTER TABLE `payment_card`
  ADD CONSTRAINT `payment_card_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`room_category_id`) REFERENCES `room_categories` (`id`);

--
-- Constraints for table `room_facility`
--
ALTER TABLE `room_facility`
  ADD CONSTRAINT `room_facility_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `room_facility_ibfk_2` FOREIGN KEY (`room_facility_list_id`) REFERENCES `room_facility_lists` (`id`);

--
-- Constraints for table `room_image`
--
ALTER TABLE `room_image`
  ADD CONSTRAINT `room_image_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `staffs`
--
ALTER TABLE `staffs`
  ADD CONSTRAINT `staffs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
