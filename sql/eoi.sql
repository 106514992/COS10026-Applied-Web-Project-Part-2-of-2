-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2026 at 11:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mediaflare`
--

-- --------------------------------------------------------

--
-- Table structure for table `eoi`
--

CREATE TABLE `eoi` (
  `EOInumber` int(11) NOT NULL,
  `job_reference` varchar(5) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `date_of_birth` varchar(10) NOT NULL,
  `gender` enum('male','female','prefer-not-to-say') NOT NULL,
  `street_address` varchar(40) NOT NULL,
  `suburb` varchar(40) NOT NULL,
  `state` enum('VIC','NSW','QLD','NT','WA','SA','TAS','ACT') NOT NULL,
  `postcode` char(4) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `other_skills` text DEFAULT NULL,
  `status` enum('New','Current','Final') NOT NULL DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eoi`
--

INSERT INTO `eoi` (`EOInumber`, `job_reference`, `first_name`, `last_name`, `date_of_birth`, `gender`, `street_address`, `suburb`, `state`, `postcode`, `email`, `phone`, `skills`, `other_skills`, `status`) VALUES
(1, 'SD123', 'Alex', 'Taylor', '01/01/2000', 'male', '12 Swanston Street', 'Melbourne', 'VIC', '3000', 'alex.taylor@email.com', '0412345678', 'html-css,javascript', 'React and portfolio website experience', 'New'),
(2, 'SD123', 'Emily', 'Nguyen', '14/03/1998', 'female', '22 Collins Street', 'Melbourne', 'VIC', '3000', 'emily.nguyen@email.com', '0422333444', 'javascript,ui-ux-design', 'Experience building responsive landing pages', 'Current'),
(3, 'SD123', 'Liam', 'Wilson', '09/09/1997', 'male', '8 Lygon Street', 'Carlton', 'VIC', '3053', 'liam.wilson@email.com', '0433555666', 'html-css,seo', 'Basic PHP and MySQL knowledge', 'Final'),
(4, 'IT456', 'Mia', 'Brown', '15/05/1999', 'female', '45 Church Street', 'Richmond', 'VIC', '3121', 'mia.brown@email.com', '0498765432', 'ui-ux-design,seo', 'Strong customer support background', 'New'),
(5, 'IT456', 'Noah', 'Singh', '21/07/1996', 'male', '30 High Street', 'Prahran', 'VIC', '3181', 'noah.singh@email.com', '0411222333', 'content-creation,branding', 'Experience troubleshooting Windows and Microsoft 365', 'Current'),
(6, 'IT456', 'Sophie', 'Martin', '05/12/1995', 'female', '11 Chapel Street', 'South Yarra', 'VIC', '3141', 'sophie.martin@email.com', '0400111222', 'graphic-design,content-creation', 'Helpdesk experience and strong communication skills', 'Final'),
(7, 'AB123', 'Jamie', 'Wilson', '20/09/1998', 'prefer-not-to-say', '88 Flinders Street', 'Melbourne', 'VIC', '3000', 'jamie.wilson@email.com', '0400111333', 'graphic-design,branding', 'Motion graphics portfolio available', 'New'),
(8, 'AB123', 'Olivia', 'Davis', '28/02/2001', 'female', '19 Queens Road', 'St Kilda', 'VIC', '3182', 'olivia.davis@email.com', '0444555666', 'html-css,ui-ux-design', 'Figma, accessibility and design system experience', 'Current'),
(9, 'AB123', 'Ethan', 'Clark', '11/11/1994', 'male', '71 Sydney Road', 'Brunswick', 'VIC', '3056', 'ethan.clark@email.com', '0455666777', 'javascript,seo,content-creation', 'Worked on small business websites', 'Final'),
(10, 'SD123', 'Grace', 'Lee', '03/06/2002', 'female', '6 Bourke Street', 'Melbourne', 'VIC', '3000', 'grace.lee@email.com', '0466777888', 'html-css,graphic-design', 'Interested in front-end development and visual design', 'New');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eoi`
--
ALTER TABLE `eoi`
  ADD PRIMARY KEY (`EOInumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
