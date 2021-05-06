-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2021 at 10:19 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `murphy_cemetery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `user_name`, `user_password`) VALUES
(1, 'admin', 'murphy');

-- --------------------------------------------------------

--
-- Table structure for table `cemetery_burials`
--

CREATE TABLE `cemetery_burials` (
  `burials_id` int(11) NOT NULL,
  `burials_first_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `burials_middle_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `burials_last_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `burials_dob` date DEFAULT NULL,
  `burials_birth_year` int(4) NOT NULL,
  `burials_birthplace_city` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `burials_birthplace_state` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `burials_date_of_death` date DEFAULT NULL,
  `burials_death_year` int(4) NOT NULL,
  `burials_plot_row` int(5) NOT NULL,
  `burials_plot_number` int(5) NOT NULL,
  `burials_interment_date` date DEFAULT NULL,
  `burials_interment_year` int(4) NOT NULL,
  `burials_veteran` varchar(3) CHARACTER SET utf8mb4 NOT NULL,
  `burials_veteran_branch` varchar(25) CHARACTER SET utf8mb4 NOT NULL,
  `burials_veteran_rank` varchar(25) CHARACTER SET utf8mb4 NOT NULL,
  `burials_veteran_service_time` varchar(25) CHARACTER SET utf8mb4 NOT NULL,
  `burials_spouse_first_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `burials_spouse_middle_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `burials_spouse_last_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `burials_children_names` mediumtext CHARACTER SET utf8mb4 NOT NULL,
  `burials_mother_first_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `burials_mother_middle_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `burials_mother_last_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `burials_father_first_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `burials_father_middle_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `burials_father_last_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `burials_img_deceased` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `burials_img_grave1` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `burials_img_grave2` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `burials_obituary` longtext CHARACTER SET utf8mb4 NOT NULL,
  `burials_family_notes` longtext CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cemetery_burials`
--

INSERT INTO `cemetery_burials` (`burials_id`, `burials_first_name`, `burials_middle_name`, `burials_last_name`, `burials_dob`, `burials_birth_year`, `burials_birthplace_city`, `burials_birthplace_state`, `burials_date_of_death`, `burials_death_year`, `burials_plot_row`, `burials_plot_number`, `burials_interment_date`, `burials_interment_year`, `burials_veteran`, `burials_veteran_branch`, `burials_veteran_rank`, `burials_veteran_service_time`, `burials_spouse_first_name`, `burials_spouse_middle_name`, `burials_spouse_last_name`, `burials_children_names`, `burials_mother_first_name`, `burials_mother_middle_name`, `burials_mother_last_name`, `burials_father_first_name`, `burials_father_middle_name`, `burials_father_last_name`, `burials_img_deceased`, `burials_img_grave1`, `burials_img_grave2`, `burials_obituary`, `burials_family_notes`) VALUES
(1, 'Hannah', '', 'Dunning', '1779-01-02', 1779, '', '', '1860-04-23', 1860, 1, 1, '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 'Frank', '', 'Vincent', '1862-03-14', 1862, '', '', '1863-01-03', 1863, 1, 2, '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Son of WS and J Vincent'),
(3, 'Maude', '', 'Vincent', '0000-00-00', 0, '', '', '1870-03-23', 1870, 1, 2, '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'daughter of WS and J Vincent. The year of death is not certain. 187? She was 11m 27 days old.'),
(4, 'Eugene', '', 'McLain', '1887-08-04', 1887, '', '', '1887-12-14', 1887, 1, 3, '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'Mary', 'J', 'Page', '0000-00-00', 1842, '', '', '0000-00-00', 1885, 1, 4, '0000-00-00', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(55, 'Joshua', 'Alex', 'Barron', '1997-10-03', 0, '', 'Alabama', '0000-00-00', 0, 0, 0, '0000-00-00', 0, 'fal', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(58, 'Joshua', 'Alex', 'Barron', '1997-10-03', 1997, 'Des Moines', 'Iowa', '2045-10-05', 2045, 4521, 1254, '2045-10-20', 2045, 'tru', 'Air Force', 'Yes', '10', 'spouse', 'spouse', 'spoue', 'child1 child2 child3', 'christine', 'eliza', 'barron', 'kit', 'carwin', 'barron', 'images/6094440e353254.52924975.jpg', 'images/6094440e3532f4.56400428.jpg', 'images/6094440e353338.47131143.jpg', 'obituary stuff', 'family notes stuff'),
(59, 'resident', 'midde', 'name', '1997-10-03', 1997, 'Des Moines', 'Iowa', '1997-10-03', 1997, 1542, 1542, '1997-10-03', 1997, 'tru', 'air force', 'captain', '10 years', 'spouse', 'spouse', 'spouse', 'child1 child2 child3', 'mother', 'mother', 'mother', 'father', 'father', 'father', 'images/60944cc8c78619.98545233.jpg', 'images/60944cc8c78711.36522143.jpg', 'images/60944cc8c78773.68359186.jpg', 'obituary', 'family notes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `cemetery_burials`
--
ALTER TABLE `cemetery_burials`
  ADD PRIMARY KEY (`burials_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cemetery_burials`
--
ALTER TABLE `cemetery_burials`
  MODIFY `burials_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
