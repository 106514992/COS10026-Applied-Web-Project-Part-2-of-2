-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2026 at 05:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
(1, 'Zobair Mirranay', '103979488', 'About (about.php)', 'Designed and developed the About page structure, styling, group information section, quotes, group photo and fun facts table.', 'Converted the About page to PHP, modularised it using header, nav and footer includes, and created the about_contributions database table.', 'دانش نور است و نادانی تاریکی.', 'Knowledge is light and ignorance is darkness.', 'Full-Stack Developer', 'Pistachios', 'Kabul, Afghanistan'),
(2, 'Ivan Strmecki', '104548449', 'Apply (apply.php)', 'Form design, HTML5 validation, Flexbox layout', 'Implemented apply form functionality, PHP validation and database submission integration.', 'Tko uči, taj ne griješi uzalud.', 'He who learns does not err in vain.', 'UX Engineer', 'Coffee & Chocolate', 'Zagreb, Croatia'),
(3, 'Sam O\'Connor', '104605182', 'Home (index.php) & Jira Management', 'Homepage design, project management', 'Assisted with homepage PHP conversion, shared project management and repository coordination.', 'Níl aon tinteán mar do thinteán féin.', 'There\'s no fireplace like your own fireplace.', 'Tech Lead', 'Cheese & Crackers', 'Dublin, Ireland'),
(4, 'Charlie Payne', '106514992', 'Jobs (jobs.php)', 'Job listings, semantic HTML structure', 'Implemented jobs database integration, dynamic job listings and search functionality using PHP and MySQL.', 'Le travail, c\'est la liberté.', 'Work is freedom.', 'Creative Director', 'Tim Tams', 'Melbourne, Australia');

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
  `key_responsibilities` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`key_responsibilities`)),
  `requirements_essential` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`requirements_essential`)),
  `requirements_preferable` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`requirements_preferable`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `reference_number`, `title`, `description`, `salary_min`, `salary_max`, `reports_to`, `reporting_line`, `key_responsibilities`, `requirements_essential`, `requirements_preferable`) VALUES
(1, 'SD123', 'Software Developer', 'We are seeking a Software Developer to join our eight-person product engineering team, building and maintaining MediaFlare\'s core content delivery platform. You will work in two-week agile sprints, contributing to a React and Node.js web application that serves over 50,000 daily active users. This is a hands-on development role with a clear pathway to Senior Developer within two to three years.', 90000, 100000, 'Senior Development Manager', 'This position reports directly to the Senior Development Manager, within the Technology division, under the Chief Technology Officer and Managing Director. This role has no direct reports.', '[\"Build and ship new product features in React (TypeScript) and Node.js across each two-week sprint cycle\", \"Write and maintain unit and integration tests using Jest, targeting a minimum 80% code coverage threshold\", \"Participate in code reviews via GitHub pull requests, providing and actioning constructive feedback\", \"Diagnose and resolve production bugs using Datadog logs and error traces, with a target resolution time under four hours for P1 issues\", \"Collaborate with UX designers in Figma to translate wireframes into accessible, responsive front-end components\", \"Contribute to and maintain internal API documentation using OpenAPI/Swagger\"]', '[\"Bachelor\'s degree in Software Engineering, Computer Science, or a related discipline\", \"Minimum two years of professional experience writing JavaScript or TypeScript in a production environment\", \"Demonstrated ability to build and consume RESTful APIs\", \"Experience working in an agile or scrum team with tools such as Jira or Linear\", \"Solid understanding of version control workflows using Git (branching, merging, pull requests)\"]', '[\"Hands-on experience with React and a Node.js backend framework such as Express or Fastify\", \"Familiarity with PostgreSQL or another relational database, including writing and optimising SQL queries\", \"Exposure to CI/CD pipelines (GitHub Actions, CircleCI, or similar)\", \"Understanding of web accessibility standards (WCAG 2.1 AA)\"]'),
(2, 'IT456', 'IT Support Technician', 'MediaFlare\'s IT Support Technician is the first point of contact for approximately 120 staff across our Melbourne CBD headquarters and remote workforce. You will triage and resolve hardware, software, and connectivity issues through our Freshservice helpdesk, maintaining a service level agreement of four-hour response and next-business-day resolution for standard requests. This role suits a detail-oriented technician who takes pride in clear communication and a tidy, well-documented environment.', 60000, 75000, 'IT Operations Manager', 'This position reports directly to the IT Operations Manager, within the Technology division, under the Head of Technology and Managing Director. This role has no direct reports.', '[\"Respond to and resolve helpdesk tickets in Freshservice within agreed SLA timeframes, handling an average queue of 20 to 30 tickets per week\", \"Provision and decommission user accounts, devices, and software licences in Microsoft Entra ID (Azure AD) and Microsoft 365 (Outlook, Teams, SharePoint)\", \"Diagnose and repair hardware faults on Windows 11 laptops and desktops, coordinating warranty replacements with Dell and Lenovo vendor portals where required\", \"Configure and maintain network access including VLAN assignments, Wi-Fi onboarding, and VPN client setup (Cisco AnyConnect)\", \"Image and deploy new workstations using Microsoft Intune, ensuring devices meet the company\'s endpoint security baseline before handover\", \"Maintain accurate asset records in the IT asset register and update knowledge base articles in Confluence after each novel resolution\"]', '[\"Diploma of Information Technology or equivalent vocational qualification, or demonstrated equivalent industry experience\", \"Minimum one year of hands-on experience supporting Windows 10/11 end-user environments in a professional setting\", \"Working knowledge of Microsoft 365 administration including user, licence, and group management\", \"Familiarity with TCP/IP networking fundamentals: DHCP, DNS, subnets, and basic switch/router configuration\", \"Strong written and verbal communication skills, with the ability to explain technical steps clearly to non-technical staff\"]', '[\"CompTIA A+ or Network+ certification\", \"Experience administering Microsoft Entra ID (Azure Active Directory) and Intune MDM\", \"Exposure to ITIL service management practices\", \"Previous experience in a corporate IT environment with 50 or more users\"]'),
(3, 'CAS842', 'Senior Cloud Architecture Specialist', 'MediaFlare is expanding its cloud footprint and requires a Senior Cloud Architecture Specialist to lead the design, governance, and continuous optimisation of our hybrid AWS and Azure environments. You will own the cloud architecture roadmap, partnering directly with product and engineering teams to deliver scalable, secure, and cost-efficient infrastructure. This is a senior individual-contributor role with responsibility for mentoring two mid-level cloud engineers.', 120000, 160000, 'Managing Director', 'This position reports directly to the Managing Director. The role carries direct oversight of two mid-level Cloud Engineers.', '[\"Design and document cloud architecture solutions for new product initiatives, producing architecture decision records (ADRs) and presenting recommendations to the Managing Director and engineering leads\", \"Own the AWS and Azure cost optimisation programme, identifying and implementing savings through Reserved Instances, rightsizing, and storage tiering — with a target of 15% annual reduction in cloud spend\", \"Author and maintain Infrastructure as Code (IaC) using Terraform and Bicep, enforcing standards through policy-as-code (Open Policy Agent) in the CI/CD pipeline\", \"Lead the quarterly disaster recovery and business continuity testing process across AWS (ap-southeast-2) and Azure (australiaeast) regions, documenting RTO and RPO outcomes\", \"Conduct security posture reviews using AWS Security Hub and Microsoft Defender for Cloud, remediating critical and high findings within five business days\", \"Mentor two mid-level cloud engineers through structured fortnightly one-on-ones, code reviews, and pairing sessions on complex infrastructure tasks\"]', '[\"AWS Certified Solutions Architect – Professional (SAP-C02)\", \"Microsoft Certified: Azure Solutions Architect Expert (AZ-305)\", \"Minimum seven years of experience in cloud infrastructure roles, with at least three years designing production-grade AWS and Azure environments\", \"Proficiency in Terraform for multi-cloud IaC, including remote state management and module design\", \"Demonstrated experience conducting cloud security reviews and remediating findings against CIS Benchmarks or equivalent frameworks\", \"CompTIA Security+ or equivalent security qualification\"]', '[\"AWS Certified DevOps Engineer – Professional or Microsoft Certified: DevOps Engineer Expert (AZ-400)\", \"Experience with FinOps practices and tools such as AWS Cost Explorer, Azure Cost Management, or Apptio Cloudability\", \"Familiarity with container orchestration on Amazon EKS or Azure AKS\", \"Previous experience in a regulated industry (financial services, healthcare) with exposure to compliance frameworks such as ISO 27001 or SOC 2\"]'),
(7, 'AB123', 'DevOps Engineer', 'We are looking for a DevOps Engineer to own and evolve the CI/CD infrastructure that ships MediaFlare\'s platform to production dozens of times per week. Working alongside three software developers and one cloud specialist, you will build reliable deployment pipelines, maintain observability tooling, and drive improvements to our engineering velocity. This role sits at the intersection of software engineering and infrastructure and suits someone equally comfortable writing code and configuring cloud services.', 95000, 115000, 'Senior Development Manager', 'This position reports directly to the Senior Development Manager, within the Technology division, under the Chief Technology Officer and Managing Director. This role has no direct reports.', '[\"Design, build, and maintain GitHub Actions CI/CD pipelines that run automated tests, security scans (Snyk, Trivy), and container image builds on every pull request\", \"Manage container workloads on Amazon EKS, including cluster upgrades, Helm chart authoring, and horizontal pod autoscaling configuration\", \"Maintain and improve the observability stack: Prometheus metrics, Grafana dashboards, and PagerDuty alert routing, ensuring on-call engineers have actionable runbooks for every alert\", \"Implement and enforce secrets management using AWS Secrets Manager and HashiCorp Vault, auditing access policies quarterly\", \"Conduct blameless post-incident reviews after P1 outages, producing written reports with root cause analysis and preventive action items within 48 hours\", \"Evaluate and introduce tooling improvements — for example, migrating build caching strategies or adopting new Terraform provider versions — with a proof-of-concept and measured rollout plan\"]', '[\"Minimum three years of professional experience in a DevOps, platform engineering, or site reliability engineering role\", \"Hands-on experience writing and maintaining CI/CD pipelines in GitHub Actions, GitLab CI, or Jenkins\", \"Practical knowledge of containerisation with Docker and orchestration with Kubernetes (EKS, AKS, or GKE)\", \"Proficiency in at least one scripting or programming language used for automation: Python, Bash, or Go\", \"Experience managing cloud infrastructure with Terraform in AWS or Azure\"]', '[\"AWS Certified DevOps Engineer – Professional or Certified Kubernetes Administrator (CKA)\", \"Experience with GitOps workflows using ArgoCD or Flux\", \"Familiarity with service mesh technologies such as Istio or Linkerd\", \"Exposure to platform engineering concepts including internal developer portals (Backstage or similar)\"]');

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
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
