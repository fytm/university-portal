
-- --------------------------------------------------------
create database if not exists AfrikaKonnect;
use AfrikaKonnect;
--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `app_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `cust_id` int(11) DEFAULT NULL,
  `uni_id` int(11) DEFAULT NULL,
  `ip_add` varchar(45) DEFAULT NULL,
  `price` int(10) NOT NULL,
  FOREIGN KEY (`cust_id`) REFERENCES `customer` (`customer_id`),
FOREIGN KEY (`uni_id`) REFERENCES `university` (`university_id`)) ;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`app_id`, `cust_id`, `uni_id`, `ip_add`, `price`) VALUES
(11, 4, 34, '127.0.0.1', 50),
(12, 4, 34, '127.0.0.1', 75),
(13, 4, 34, '127.0.0.1', 62);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(50) DEFAULT NULL,
  `customer_email` varchar(50) DEFAULT NULL,
  `customer_pass` varchar(255) DEFAULT NULL,
  `customer_country` varchar(50) DEFAULT NULL,
  `customer_city` varchar(20) DEFAULT NULL,
  `customer_contact` varchar(20) DEFAULT NULL,
  `user_role` int(1) NOT NULL DEFAULT 2
);

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `user_role`) VALUES
(4, 'Test User', 'a@gmail.com', '$2y$10$mX1e2cWTIdjKDF7oWVRoWuSUTqi.QBndPzBNEUKuBsQQIDTYnoEL2', 'Ghana', 'Accra', '0555666777', 2);

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `university_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `university_name` varchar(50) DEFAULT NULL,
  `university_email` varchar(50) NOT NULL,
  `mission` varchar(150) DEFAULT NULL,
  `university_description` varchar(500) DEFAULT NULL,
  `university_country` varchar(50) NOT NULL,
  `university_city` varchar(50) DEFAULT NULL,
  `university_contact` varchar(20) NOT NULL
);

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
  `photo_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `uni_id` int(11) NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `isLogo` tinyint(1) NOT NULL DEFAULT 0,
FOREIGN KEY (`uni_id`) REFERENCES `university` (`university_id`)
);

--
-- Dumping data for table `uni_photos`
--

INSERT INTO `uni_photos` (`photo_id`, `uni_id`, `path`, `isLogo`) VALUES
(1, 33, 'assets/img/universities/logos/ashesi_university.jpg', 1),
(2, 34, 'assets/img/universities/logos/University_of_Ghana.jpg', 1),
(3, 34, 'assets/img/universities/UG/UG1.jpg', 0),
(4, 34, 'assets/img/universities/UG/UG2.jpg', 0);

