-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
<<<<<<< HEAD
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2016 at 12:00 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15
=======
-- Host: localhost:3306
-- Generation Time: Aug 01, 2016 at 09:04 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.10
>>>>>>> 9e6129050e5672cc8dcb8b5ff01a24a3a4c397da

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ris2`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam_info`
--

CREATE TABLE `exam_info` (
  `exam_id` varchar(30) NOT NULL,
  `performer_id` varchar(30) NOT NULL,
  `patient_id` varchar(30) NOT NULL,
  `req_physician` varchar(50) NOT NULL,
  `modality` varchar(2) NOT NULL,
  `exam_name` varchar(50) NOT NULL,
  `exam_reason` text NOT NULL,
  `receipt` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL,
<<<<<<< HEAD
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `exam_done` tinyint(4) NOT NULL,
  `report_done` tinyint(4) NOT NULL
=======
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `exam_done` int(1) NOT NULL DEFAULT '0',
  `report_done` int(1) NOT NULL DEFAULT '0'
>>>>>>> 9e6129050e5672cc8dcb8b5ff01a24a3a4c397da
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_info`
--

<<<<<<< HEAD
INSERT INTO `exam_info` (`exam_id`, `performer_id`, `patient_id`, `req_physician`, `modality`, `exam_name`, `exam_reason`, `receipt`, `amount`, `created_at`, `exam_done`, `report_done`) VALUES
('1', '1', '578df1530ed11', 'test Doc', 'MX', 'mammoghraph', 'test', '10011', 100, '2016-08-01 09:07:26', 1, 1);
=======
INSERT INTO `exam_info` (`exam_id`, `performer_id`, `patient_id`, `req_physician`, `modality`, `exam_name`, `exam_reason`, `receipt`, `amount`, `date_time`, `exam_done`, `report_done`) VALUES
('1', '1', '578df1530ed11', 'test Doc', 'MX', 'mammoghraph', 'test', '10011', 100, '2016-07-19 12:35:47', 0, 0);
>>>>>>> 9e6129050e5672cc8dcb8b5ff01a24a3a4c397da

-- --------------------------------------------------------

--
-- Table structure for table `modalities`
--

CREATE TABLE `modalities` (
  `modality_abbr` varchar(4) NOT NULL,
  `modality_name` varchar(60) NOT NULL,
  `install_date` date NOT NULL,
  `next_service` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modalities`
--

INSERT INTO `modalities` (`modality_abbr`, `modality_name`, `install_date`, `next_service`) VALUES
('', 'XA', '2016-07-28', '2017-07-28'),
('CR', '', '0000-00-00', '0000-00-00'),
('DX', 'Digital X-ray', '0000-00-00', '0000-00-00'),
('MG', '', '0000-00-00', '0000-00-00'),
('PX', '', '0000-00-00', '0000-00-00'),
('US', 'Ultra Sound', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `patient_details`
--

CREATE TABLE `patient_details` (
  `patient_id` varchar(30) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `phonenumber` varchar(50) NOT NULL,
  `national_id` varchar(50) NOT NULL,
  `status` varchar(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_details`
--

INSERT INTO `patient_details` (`patient_id`, `patient_name`, `birthday`, `phonenumber`, `national_id`, `status`, `gender`, `created_at`) VALUES
('578dee3861eaa', '', '0000-00-00', '', '', '', '', '2016-08-01 08:40:54'),
('578df0a3c1fab', ', janet ', '1970-01-01', '', '', '', '', '2016-08-01 08:40:54'),
('578df1530ed11', 'ross, james rick', '2016-12-07', '000000000', '000000000', '1', 'M', '2016-08-01 08:40:54'),
('578e1584c3c44', ',  james', '1970-01-01', '', '', '', '', '2016-08-01 08:40:54'),
('578f246057c55', ',  ', '1970-01-01', '', '', '', '', '2016-08-01 08:40:54'),
('578f246e49575', ', kakakakakak ', '1970-01-01', '', '', '', '', '2016-08-01 08:40:54'),
('578f2f04121e6', ', kkkkkkkkkkk ', '1970-01-01', '', '', '', '', '2016-08-01 08:40:54'),
('578f2ffc8b601', ', l ', '1970-01-01', '', '', '', '', '2016-08-01 08:40:54'),
('578f30c28915d', ', llll ', '1970-01-01', '', '', '', '', '2016-08-01 08:40:54'),
('578f31b3a953c', ', kamau ', '1970-01-01', '', '', '', '', '2016-08-01 08:40:54'),
('578f35e1a378c', ', d ', '1970-01-01', '', '', '', '', '2016-08-01 08:40:54'),
('578f3a105a736', ', llllllllll ', '1970-01-01', '', '', '', '', '2016-08-01 08:40:54'),
('578f3f65e67b2', ', new ', '1970-01-01', '', '', '', '', '2016-08-01 08:40:54'),
('578f4a23ef71b', ',  ', '1970-01-01', '', '', '', '', '2016-08-01 08:40:54'),
('578f4b1f6a2da', ', kamau ', '1970-01-01', '', '', '', '', '2016-08-01 08:40:54'),
('578f4ce6a2d2b', ', kamau ', '1970-01-01', '', '', '', '', '2016-08-01 08:40:54'),
('578f6dd61d408', 'mbugua, kibugi ', '1970-01-01', 'd', 's', '', 'M', '2016-08-01 08:40:54'),
('578f6dfc0a79f', 'sdfsf, lakdlaskd ', '2016-07-06', '', '', '', 'M', '2016-08-01 08:40:54'),
('578f6fae9ac5e', 'sdfsf, lakdlaskd ', '2016-07-06', '', '', '', 'M', '2016-08-01 08:40:54'),
('578f6ff833b68', 'mbugua, kibugi ', '1970-01-01', 'd', 's', '', 'M', '2016-08-01 08:40:54'),
('578f6ffc372e0', 'mbugua, kibugi ', '1970-01-01', 'd', 's', '', 'M', '2016-08-01 08:40:54'),
('578f708a2ed82', 'idhjf, ajlkjfaskdjf ', '1970-01-01', '', '', '', 'F', '2016-08-01 08:40:54'),
('578f70c02c236', 'x, lll ', '1970-01-01', '', '', '', 'F', '2016-08-01 08:40:54'),
('578f721975535', 'z, z ', '2016-04-07', 'zzzzzzzzzz', 'zzzxxzx', '', 'M', '2016-08-01 08:40:54');

-- --------------------------------------------------------

--
-- Table structure for table `procedures`
--

CREATE TABLE `procedures` (
  `procedure_id` int(11) NOT NULL,
  `procedure_name` varchar(20) NOT NULL,
  `modality` varchar(2) NOT NULL,
  `price` double DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `created_by` varchar(60) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `procedures`
--

INSERT INTO `procedures` (`procedure_id`, `procedure_name`, `modality`, `price`, `duration`, `created_by`, `created_on`) VALUES
(1, 'procedure1', 'UX', 1000, 120, 'Mbugua, Kibugi Kamau', '2016-07-22 13:00:35'),
(2, 'procedure2', 'MX', 2000, 80, 'user', '2016-07-22 13:00:35'),
(3, 'procedure3', 'DX', 3000, 20, 'mbugua, kibugi kamau', '2016-07-22 13:00:35'),
(4, 'procedure4', 'US', 4000, 30, 'mbugua, kibugi kamau', '2016-07-22 13:00:35');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` varchar(30) NOT NULL,
  `reviewer_id` varchar(30) NOT NULL,
  `exam_id` varchar(30) NOT NULL,
  `patient_id` varchar(30) NOT NULL,
  `report` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `reviewer_id`, `exam_id`, `patient_id`, `report`, `created_at`) VALUES
<<<<<<< HEAD
('578e24267be3a', '1', '1 ', '578df1530ed11', 'this it a test report', '2016-07-19 12:59:18');
=======
('578e24267be3a', '3', '1 ', '578df1530ed11', 'this is test 1jmbkjbkh test', '2016-07-19 12:59:18');
>>>>>>> 9e6129050e5672cc8dcb8b5ff01a24a3a4c397da

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(256) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `first_login` int(1) NOT NULL DEFAULT '0'
<<<<<<< HEAD
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
=======
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
>>>>>>> 9e6129050e5672cc8dcb8b5ff01a24a3a4c397da

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `full_name`, `user_name`, `password`, `admin`, `first_login`) VALUES
(1, 'Sevenseas, Technologies', 'sevenseastech', 'a460f0a5ffed85fe0c46f6abae07a741', 1, 1),
(2, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1),
(3, 'User', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam_info`
--
ALTER TABLE `exam_info`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `modalities`
--
ALTER TABLE `modalities`
  ADD PRIMARY KEY (`modality_abbr`);

--
-- Indexes for table `patient_details`
--
ALTER TABLE `patient_details`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `procedures`
--
ALTER TABLE `procedures`
  ADD PRIMARY KEY (`procedure_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `procedures`
--
ALTER TABLE `procedures`
  MODIFY `procedure_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
<<<<<<< HEAD
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
=======
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
>>>>>>> 9e6129050e5672cc8dcb8b5ff01a24a3a4c397da
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
