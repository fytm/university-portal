-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 01:10 AM
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
  `university_contact` varchar(20) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`university_id`, `university_name`, `university_email`, `mission`, `university_description`, `university_country`, `university_city`, `university_contact`, `price`) VALUES
(33, 'Ashesi University', 'ash@gmail.com', 'Our mission is to educate ethical, entrepreneurial', 'Our mission is to educate ethical, entrepreneurial leaders in Africa', 'Ghana', 'Brekuso', '1122', 0.50),
(34, 'University of Ghana', 'ug@gmail.com', 'We aim to produce the next generation of thought leaders to drive national development.', 'Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi\r\n                                labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque\r\n                                itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur\r\n                                dignissimos. Sequi nulla at esse enim cum deserunt eius.', 'Ghana', 'Accra', '1122', 0.30),
(35, 'Knust', 'knust@gmail.com', 'Science                   ', 'Kwame Nkrumah University                  ', 'Ghana', 'Kumasi', '+23312122123', 0.20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`university_id`),
  ADD UNIQUE KEY `university_name` (`university_name`,`university_email`),
  ADD UNIQUE KEY `university_name_3` (`university_name`,`university_email`),
  ADD KEY `university_name_2` (`university_name`),
  ADD KEY `university_email` (`university_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `university_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
