-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2026 at 11:43 AM
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
-- Table structure for table `about_contributions`
--

CREATE TABLE `about_contributions` (
  `id` int(11) NOT NULL,
  `member_name` varchar(100) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `assigned_page` varchar(100) NOT NULL,
  `project1_role` text NOT NULL,
  `project2_role` text NOT NULL,
  `quote_original` text NOT NULL,
  `quote_translation` text NOT NULL,
  `dream_job` varchar(100) NOT NULL,
  `coding_snack` varchar(100) NOT NULL,
  `hometown` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_contributions`
--

INSERT INTO `about_contributions` (`id`, `member_name`, `student_id`, `assigned_page`, `project1_role`, `project2_role`, `quote_original`, `quote_translation`, `dream_job`, `coding_snack`, `hometown`) VALUES
(1, 'Zobair Mirranay', '103979488', 'About page', 'Created the About page structure and group information section.', 'Converted the About page to PHP and connected team contributions to the database.', 'دانش نور است و نادانی تاریکی.', 'Knowledge is light and ignorance is darkness.', 'Full-Stack Developer', 'Pistachios', 'Kabul, Afghanistan'),
(2, 'Ivan Strmecki', '104548449', 'Apply page', 'Created the application form layout and validation structure.', 'Implemented process_eoi.php, server-side validation and database submission.', 'Tko uči, taj ne griješi uzalud.', 'He who learns does not err in vain.', 'UX Engineer', 'Coffee & Chocolate', 'Zagreb, Croatia'),
(3, 'Sam O\'Connor', '104605182', 'Manage page', 'Worked on homepage and project coordination.', 'Implemented login, session protection and EOI management functionality.', 'Níl aon tinteán mar do thinteán féin.', 'There is no place like home.', 'Tech Lead', 'Cheese & Crackers', 'Dublin, Ireland'),
(4, 'Charlie Payne', '106514992', 'Jobs page', 'Created the jobs page structure and job listing content.', 'Implemented the jobs database table, dynamic job listings and search functionality.', 'Le travail, c\'est la liberté.', 'Work is freedom.', 'Creative Director', 'Tim Tams', 'Melbourne, Australia');

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

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `reference_number` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `salary_min` int(11) NOT NULL,
  `salary_max` int(11) NOT NULL,
  `reports_to` varchar(100) NOT NULL,
  `reporting_line` text NOT NULL,
  `key_responsibilities` longtext NOT NULL,
  `requirements_essential` longtext NOT NULL,
  `requirements_preferable` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `reference_number`, `title`, `description`, `salary_min`, `salary_max`, `reports_to`, `reporting_line`, `key_responsibilities`, `requirements_essential`, `requirements_preferable`) VALUES
(1, 'SD123', 'Software Developer', 'Develop and maintain web applications for MediaFlare clients.', 90000, 100000, 'Senior Development Manager', 'Reports to the Senior Development Manager within the Technology division.', '[\"Build responsive web features\",\"Write and test code\",\"Participate in code reviews\",\"Work with designers and project managers\"]', '[\"JavaScript experience\",\"Understanding of HTML and CSS\",\"Knowledge of Git\",\"Problem-solving skills\"]', '[\"React experience\",\"PHP or MySQL knowledge\",\"Accessibility awareness\"]'),
(2, 'IT456', 'IT Support Technician', 'Provide technical support for staff, systems and workplace technology.', 60000, 75000, 'IT Operations Manager', 'Reports to the IT Operations Manager within the Technology division.', '[\"Resolve support tickets\",\"Set up user accounts\",\"Maintain hardware and software\",\"Document technical issues\"]', '[\"Basic networking knowledge\",\"Windows support experience\",\"Strong communication skills\"]', '[\"CompTIA A+\",\"Microsoft 365 experience\",\"Helpdesk experience\"]'),
(3, 'AB123', 'DevOps Engineer', 'Support deployment pipelines, cloud systems and development operations.', 95000, 115000, 'Senior Development Manager', 'Reports to the Senior Development Manager within the Technology division.', '[\"Maintain CI/CD pipelines\",\"Support cloud infrastructure\",\"Monitor systems\",\"Improve deployment reliability\"]', '[\"Cloud knowledge\",\"Git experience\",\"Scripting skills\",\"Understanding of deployment workflows\"]', '[\"AWS experience\",\"Docker knowledge\",\"Terraform experience\"]');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$frR094zsGCM9qiDV5/nNAOt7322gcMnYiphGx.xrzKqsGyB9gf7Ve');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_contributions`
--
ALTER TABLE `about_contributions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eoi`
--
ALTER TABLE `eoi`
  ADD PRIMARY KEY (`EOInumber`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reference_number` (`reference_number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_contributions`
--
ALTER TABLE `about_contributions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
