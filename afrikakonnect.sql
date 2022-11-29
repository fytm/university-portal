-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2022 at 10:38 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `afrikakonnect`
--
CREATE DATABASE IF NOT EXISTS `afrikakonnect` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `afrikakonnect`;

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `app_id` int(11) NOT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `uni_id` int(11) DEFAULT NULL,
  `ip_add` varchar(45) DEFAULT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `application`:
--   `cust_id`
--       `customer` -> `customer_id`
--   `uni_id`
--       `university` -> `university_id`
--

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`app_id`, `cust_id`, `uni_id`, `ip_add`, `price`) VALUES
(23, 5, 34, '127.0.0.1', 50);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(50) DEFAULT NULL,
  `customer_email` varchar(50) DEFAULT NULL,
  `customer_pass` varchar(255) DEFAULT NULL,
  `customer_country` varchar(50) DEFAULT NULL,
  `customer_city` varchar(20) DEFAULT NULL,
  `customer_contact` varchar(20) DEFAULT NULL,
  `user_role` int(1) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `customer`:
--

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `user_role`) VALUES
(4, 'Test User', 'a@gmail.com', '$2y$10$mX1e2cWTIdjKDF7oWVRoWuSUTqi.QBndPzBNEUKuBsQQIDTYnoEL2', 'Ghana', 'Accra', '0555666777', 2),
(5, 'Test Three', 'test3@gmail.com', '$2y$10$XacRtpr9wUXy2ySExcZCZ.mDAlNdKVAUef8FEwtzfMKjpKT4PRlgS', 'Ghana', 'Accra', '0241112223', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `datetime` datetime DEFAULT NULL,
  `status` varchar(500) DEFAULT NULL,
  `cust_id` int(11) NOT NULL,
  `order_total` decimal(10,0) NOT NULL,
  `currency` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `order`:
--   `cust_id`
--       `customer` -> `customer_id`
--

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `datetime`, `status`, `cust_id`, `order_total`, `currency`) VALUES
(1, '2022-01-01 00:00:00', 'test', 4, '0', ''),
(5, '2022-11-27 00:00:00', 'Success', 4, '0', ''),
(30, '2022-11-27 00:00:00', 'Success', 5, '100', 'GHC');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `od_id` int(11) NOT NULL,
  `uni_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `order_details`:
--   `uni_id`
--       `university` -> `university_id`
--   `order_id`
--       `order` -> `order_id`
--

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`od_id`, `uni_id`, `price`, `order_id`) VALUES
(1, 34, '50.00', 1),
(15, 34, '50.00', 5),
(16, 34, '50.00', 5),
(17, 34, '50.00', 5),
(18, 34, '50.00', 5),
(19, 34, '50.00', 5),
(20, 34, '50.00', 5),
(21, 33, '50.00', 5),
(22, 34, '50.00', 5);

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `university_id` int(11) NOT NULL,
  `university_name` varchar(50) DEFAULT NULL,
  `university_email` varchar(50) NOT NULL,
  `mission` varchar(150) DEFAULT NULL,
  `university_description` varchar(500) DEFAULT NULL,
  `university_country` varchar(50) NOT NULL,
  `university_city` varchar(50) DEFAULT NULL,
  `university_contact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `university`:
--

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`university_id`, `university_name`, `university_email`, `mission`, `university_description`, `university_country`, `university_city`, `university_contact`) VALUES
(33, 'Ashesi University', 'ash@gmail.com', 'Our mission is to educate ethical, entrepreneurial', 'Our mission is to educate ethical, entrepreneurial leaders in Africa', 'Ghana', 'Brekuso', '1122'),
(34, 'University of Ghana', 'ug@gmail.com', 'We aim to produce the next generation of thought leaders to drive national development.', 'Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi\r\n                                labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque\r\n                                itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur\r\n                                dignissimos. Sequi nulla at esse enim cum deserunt eius.', 'Ghana', 'Accra', '1122'),
(35, 'Knust', 'knust@gmail.com', NULL, 'Kwame Nkrumah', 'Ghana', 'Acc', '1122');

-- --------------------------------------------------------

--
-- Table structure for table `uni_photos`
--

CREATE TABLE `uni_photos` (
  `photo_id` int(11) NOT NULL,
  `uni_id` int(11) NOT NULL,
  `path` varchar(255) DEFAULT 'assets/img/universities/default.jpg',
  `isLogo` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `uni_photos`:
--   `uni_id`
--       `university` -> `university_id`
--

--
-- Dumping data for table `uni_photos`
--

INSERT INTO `uni_photos` (`photo_id`, `uni_id`, `path`, `isLogo`) VALUES
(1, 33, 'assets/img/universities/logos/ashesi_university.jpg', 1),
(2, 34, 'assets/img/universities/logos/University_of_Ghana.jpg', 1),
(3, 34, 'assets/img/universities/UG/UG1.jpg', 0),
(4, 34, 'assets/img/universities/UG/UG2.jpg', 0),
(5, 33, 'assets/img/universities/UG/UG1.jpg', 0),
(6, 35, 'assets/img/universities/UG/UG2.jpg', 0),
(7, 35, 'assets/img/universities/logos/knust.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`app_id`),
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `uni_id` (`uni_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`od_id`),
  ADD KEY `uni_id` (`uni_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`university_id`);

--
-- Indexes for table `uni_photos`
--
ALTER TABLE `uni_photos`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `uni_id` (`uni_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `od_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `university_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `uni_photos`
--
ALTER TABLE `uni_photos`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `application_ibfk_2` FOREIGN KEY (`uni_id`) REFERENCES `university` (`university_id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`uni_id`) REFERENCES `university` (`university_id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`);

--
-- Constraints for table `uni_photos`
--
ALTER TABLE `uni_photos`
  ADD CONSTRAINT `uni_photos_ibfk_1` FOREIGN KEY (`uni_id`) REFERENCES `university` (`university_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
