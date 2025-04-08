-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2025 at 05:02 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elegal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`, `admin_date`) VALUES
(1, 'essentialnigeria@gmail.com', '$2y$10$FtRVlhVQ7doS1GMDuQ2SK.4v9l3ar4SmmsFPJ2Z.IpRTSadmPA1Yq', 'Mon, September 09, 2024 5:56PM');

-- --------------------------------------------------------

--
-- Table structure for table `applied_jobs`
--

CREATE TABLE `applied_jobs` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `relocation` tinyint(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `years_of_experience` int(11) NOT NULL,
  `highest_education` varchar(255) NOT NULL,
  `cv_upload` varchar(255) NOT NULL,
  `year_called_to_bar` int(11) NOT NULL,
  `cover_letter` varchar(255) NOT NULL,
  `portfolio_link` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applied_jobs`
--

INSERT INTO `applied_jobs` (`id`, `job_id`, `first_name`, `last_name`, `email`, `phone_number`, `location`, `relocation`, `job_title`, `company`, `start_date`, `end_date`, `years_of_experience`, `highest_education`, `cv_upload`, `year_called_to_bar`, `cover_letter`, `portfolio_link`, `created_at`) VALUES
(1, 1, 'Olaniyi', 'Alabi', 'ngnimitech@gmail.com', '09074456453', '', 0, 'Corporate Attorney', 'Osuya &Osuya', '2025-01-10', '2025-01-04', 5, 'll.b', 'The NEXT PREDICTION.pdf', 2025, '', 'https://www.neeyo.com', '2025-01-24 13:55:44');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `article_images` varchar(255) NOT NULL,
  `article_details` text NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `article_images`, `article_details`, `author_name`, `created_at`) VALUES
(1, 'Reflections on 2022: My Nigerian Law School Experience', 'assets/images/articles/Frame 37.png', ' Our goal is to create a dynamic environment where students can actively participate in their education and connect with the world around them.\" The program will roll out over the next academic year, featuring a variety of projects that encourage collaboration and critical thinking. Students will engage in community service, work with local businesses, and participate in environmental sustainability projects, all while developing essential life skills. One of the standout components of the program is the introduction of technology labs, equipped with the latest tools for coding, robotics, and digital media. This initiative aims to prepare students for the demands of the modern workforce, ensuring they have the skills needed for future careers. Parents and community members are enthusiastic about the program. Jessica Ramirez, a parent of an eighth-grader, expressed her support: \"I love that the school is focusing on real-world experiences. This will help my child not only academically but also socially and emotionally.\" To further enhance the program, Riverside Middle School is partnering with local organizations and educational experts to provide additional resources and mentorship opportunities for students. These collaborations aim to create a well-rounded support system that fosters growth and development. As the excitement builds for the upcoming school year, Riverside Middle School is poised to set a new standard in education. With the \"Learning Beyond the Classroom\" program, students will not only gain knowledge but also experience the joy of learning in a meaningful and impactful way. For more updates on this program and other school initiatives, stay tuned to our local news outlet.', 'RUKKY OTIVE-IGBUZOR', '31/12/2022'),
(2, 'Reflections on 2022: My Nigerian Law School Experience', 'assets/images/articles/Frame 38.png', ' Our goal is to create a dynamic environment where students can actively participate in their education and connect with the world around them.\" The program will roll out over the next academic year, featuring a variety of projects that encourage collaboration and critical thinking. Students will engage in community service, work with local businesses, and participate in environmental sustainability projects, all while developing essential life skills. One of the standout components of the program is the introduction of technology labs, equipped with the latest tools for coding, robotics, and digital media. This initiative aims to prepare students for the demands of the modern workforce, ensuring they have the skills needed for future careers. Parents and community members are enthusiastic about the program. Jessica Ramirez, a parent of an eighth-grader, expressed her support: \"I love that the school is focusing on real-world experiences. This will help my child not only academically but also socially and emotionally.\" To further enhance the program, Riverside Middle School is partnering with local organizations and educational experts to provide additional resources and mentorship opportunities for students. These collaborations aim to create a well-rounded support system that fosters growth and development. As the excitement builds for the upcoming school year, Riverside Middle School is poised to set a new standard in education. With the \"Learning Beyond the Classroom\" program, students will not only gain knowledge but also experience the joy of learning in a meaningful and impactful way. For more updates on this program and other school initiatives, stay tuned to our local news outlet.', 'RUKKY OTIVE-IGBUZOR', '31/12/2022'),
(3, 'Reflections on 2022: My Nigerian Law School Experience', 'assets/images/articles/Frame 39.png', ' Our goal is to create a dynamic environment where students can actively participate in their education and connect with the world around them.\" The program will roll out over the next academic year, featuring a variety of projects that encourage collaboration and critical thinking. Students will engage in community service, work with local businesses, and participate in environmental sustainability projects, all while developing essential life skills. One of the standout components of the program is the introduction of technology labs, equipped with the latest tools for coding, robotics, and digital media. This initiative aims to prepare students for the demands of the modern workforce, ensuring they have the skills needed for future careers. Parents and community members are enthusiastic about the program. Jessica Ramirez, a parent of an eighth-grader, expressed her support: \"I love that the school is focusing on real-world experiences. This will help my child not only academically but also socially and emotionally.\" To further enhance the program, Riverside Middle School is partnering with local organizations and educational experts to provide additional resources and mentorship opportunities for students. These collaborations aim to create a well-rounded support system that fosters growth and development. As the excitement builds for the upcoming school year, Riverside Middle School is poised to set a new standard in education. With the \"Learning Beyond the Classroom\" program, students will not only gain knowledge but also experience the joy of learning in a meaningful and impactful way. For more updates on this program and other school initiatives, stay tuned to our local news outlet.', 'RUKKY OTIVE-IGBUZOR', '31/12/2022'),
(4, 'Reflections on 2022: My Nigerian Law School Experience', 'assets/images/articles/Frame 40.png', ' Our goal is to create a dynamic environment where students can actively participate in their education and connect with the world around them.\" The program will roll out over the next academic year, featuring a variety of projects that encourage collaboration and critical thinking. Students will engage in community service, work with local businesses, and participate in environmental sustainability projects, all while developing essential life skills. One of the standout components of the program is the introduction of technology labs, equipped with the latest tools for coding, robotics, and digital media. This initiative aims to prepare students for the demands of the modern workforce, ensuring they have the skills needed for future careers. Parents and community members are enthusiastic about the program. Jessica Ramirez, a parent of an eighth-grader, expressed her support: \"I love that the school is focusing on real-world experiences. This will help my child not only academically but also socially and emotionally.\" To further enhance the program, Riverside Middle School is partnering with local organizations and educational experts to provide additional resources and mentorship opportunities for students. These collaborations aim to create a well-rounded support system that fosters growth and development. As the excitement builds for the upcoming school year, Riverside Middle School is poised to set a new standard in education. With the \"Learning Beyond the Classroom\" program, students will not only gain knowledge but also experience the joy of learning in a meaningful and impactful way. For more updates on this program and other school initiatives, stay tuned to our local news outlet.', 'RUKKY OTIVE-IGBUZOR', '31/12/2022');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `author_img` varchar(255) NOT NULL,
  `noofbooks` varchar(11) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `author_name`, `author_img`, `noofbooks`, `created_at`) VALUES
(1, 'james crowley', 'assets/images/authors/author1.jpg', '4', 'jan 2, 2024');

-- --------------------------------------------------------

--
-- Table structure for table `courts`
--

CREATE TABLE `courts` (
  `id` int(11) NOT NULL,
  `court_name` varchar(255) NOT NULL,
  `court_about` text NOT NULL,
  `court_images` varchar(255) NOT NULL,
  `court_type` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courts`
--

INSERT INTO `courts` (`id`, `court_name`, `court_about`, `court_images`, `court_type`, `created_at`) VALUES
(1, 'The Supreme Court', 'The Federal High Court of Nigeria (FHC) is one the Federal superior Courts of record in Nigeria.[1] It has coordinate jurisdiction with the High Courts of the States of the Federation, including FCT.\\n The headquarters is located in Shehu Shagari Way, Central District Abuja.  The Federal High Court was formerly called the Federal Revenue Court and was established by the Federal Revenue Act of 1973. \\n However, by virtue of section 228(1) and 230 (2) of the 1979 Constitution of the Federal Republic of Nigeria, it was renamed, Federal High Court. The Federal High Court has both criminal and civil jurisdiction over matter instituted before it pursuant to section 251 of the 1999 Constitution of the Federal Republic of Nigeria (as amended).  \\nThe Federal High Court is composed of the Chief Judge and such number of judges as may be prescribed by an Act of the National Assembly. Judges of the FHC are appointed by the President on the recommendation of the National Judicial Council, and subject to confirmation by the Senate. To qualify for the post of a Chief Judge or judges of the Federal High Court, such a person must have been qualified to practice law in Nigeria, and must have been so qualified for a period not less than ten years. The retirement age for Judges of the Federal High Court of Nigeria is 65 years.  As at December, 2021, the total number of Federal High Court judges in the country stood at 75. Meanwhile, the total number of cases across the various judicial division was 128,000', 'assets/images/courts/Frame 35(3).png', 'federal', 'jan 3 2024'),
(2, 'The Court of Appeal', 'The Federal High Court of Nigeria (FHC) is one the Federal superior Courts of record in Nigeria.[1] It has coordinate jurisdiction with the High Courts of the States of the Federation, including FCT.\\n The headquarters is located in Shehu Shagari Way, Central District Abuja.  The Federal High Court was formerly called the Federal Revenue Court and was established by the Federal Revenue Act of 1973. \\n However, by virtue of section 228(1) and 230 (2) of the 1979 Constitution of the Federal Republic of Nigeria, it was renamed, Federal High Court. The Federal High Court has both criminal and civil jurisdiction over matter instituted before it pursuant to section 251 of the 1999 Constitution of the Federal Republic of Nigeria (as amended).  \\nThe Federal High Court is composed of the Chief Judge and such number of judges as may be prescribed by an Act of the National Assembly. Judges of the FHC are appointed by the President on the recommendation of the National Judicial Council, and subject to confirmation by the Senate. To qualify for the post of a Chief Judge or judges of the Federal High Court, such a person must have been qualified to practice law in Nigeria, and must have been so qualified for a period not less than ten years. The retirement age for Judges of the Federal High Court of Nigeria is 65 years.  As at December, 2021, the total number of Federal High Court judges in the country stood at 75. Meanwhile, the total number of cases across the various judicial division was 128,000', 'assets/images/courts/Frame 35(1).png', 'federal', 'jan 4 2024'),
(3, 'The Federal High Court', 'The Federal High Court of Nigeria (FHC) is one the Federal superior Courts of record in Nigeria.[1] It has coordinate jurisdiction with the High Courts of the States of the Federation, including FCT.\\n The headquarters is located in Shehu Shagari Way, Central District Abuja.  The Federal High Court was formerly called the Federal Revenue Court and was established by the Federal Revenue Act of 1973. \\n However, by virtue of section 228(1) and 230 (2) of the 1979 Constitution of the Federal Republic of Nigeria, it was renamed, Federal High Court. The Federal High Court has both criminal and civil jurisdiction over matter instituted before it pursuant to section 251 of the 1999 Constitution of the Federal Republic of Nigeria (as amended).  \\nThe Federal High Court is composed of the Chief Judge and such number of judges as may be prescribed by an Act of the National Assembly. Judges of the FHC are appointed by the President on the recommendation of the National Judicial Council, and subject to confirmation by the Senate. To qualify for the post of a Chief Judge or judges of the Federal High Court, such a person must have been qualified to practice law in Nigeria, and must have been so qualified for a period not less than ten years. The retirement age for Judges of the Federal High Court of Nigeria is 65 years.  As at December, 2021, the total number of Federal High Court judges in the country stood at 75. Meanwhile, the total number of cases across the various judicial division was 128,000', 'assets/images/courts/Frame 35(2).png', 'federal', 'jan 5 2024'),
(4, 'The State High Court', '', 'assets/images/courts/Frame 35(1).png', 'state', 'jan 5, 2024'),
(5, 'Customary Court of Appeal of a State', '', 'assets/images/courts/Frame 35(2).png', 'state', 'jan 5, 2024'),
(6, 'Sharia Court of Appeal of a State.', '', 'assets/images/courts/Frame 35(3).png', 'state', 'jan 5, 2024');

-- --------------------------------------------------------

--
-- Table structure for table `court_cases`
--

CREATE TABLE `court_cases` (
  `id` int(11) NOT NULL,
  `client` varchar(255) NOT NULL,
  `lawyer` varchar(255) NOT NULL,
  `court_case` varchar(255) NOT NULL,
  `case_status` tinyint(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `unpaid` int(11) NOT NULL,
  `details` text NOT NULL,
  `category_of_case` varchar(255) NOT NULL,
  `court_location` varchar(255) NOT NULL,
  `court_judge` varchar(255) NOT NULL,
  `last_appearance` varchar(255) NOT NULL,
  `next_appearance` varchar(255) NOT NULL,
  `court_remark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `court_cases`
--

INSERT INTO `court_cases` (`id`, `client`, `lawyer`, `court_case`, `case_status`, `paid`, `unpaid`, `details`, `category_of_case`, `court_location`, `court_judge`, `last_appearance`, `next_appearance`, `court_remark`) VALUES
(2, 'beyonce olakunle', 'musa Adewale', '90325', 1, 100, 0, 'this is the case between beyonce olakunle and james cowell', 'intellectual case', 'tsaragi kwara', 'keanu fishburne', 'july 4 2024', 'january 5, 2025', 'case closed'),
(1, 'rihanna olusegun', 'Alan Oshin', '90321', 0, 50, 50, 'this is the case between rihanna olusegun and james cowell', 'criminal case', 'ikoji lagos', 'jack hopkins', 'june 10, 2024', '22 february, 2025', 'ongoing');

-- --------------------------------------------------------

--
-- Table structure for table `fetch_income`
--

CREATE TABLE `fetch_income` (
  `id` int(11) NOT NULL,
  `month` varchar(255) NOT NULL,
  `income` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fetch_income`
--

INSERT INTO `fetch_income` (`id`, `month`, `income`) VALUES
(1, 'january', '5000'),
(2, 'february', '6000'),
(3, 'march', '3000'),
(4, 'april', '8000'),
(5, 'may', '10000'),
(6, 'june', '1000'),
(7, 'july', '3000'),
(8, 'august', '9000'),
(9, 'september', '6000'),
(10, 'october', '2000'),
(11, 'november', '10000'),
(12, 'december', '4000');

-- --------------------------------------------------------

--
-- Table structure for table `firm_notifications`
--

CREATE TABLE `firm_notifications` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `pending` tinyint(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_firm`
--

CREATE TABLE `lawyer_firm` (
  `firm_id` int(11) NOT NULL,
  `firm_name` varchar(255) NOT NULL,
  `firm_email` varchar(255) NOT NULL,
  `firm_password` varchar(255) NOT NULL,
  `firm_about` text NOT NULL,
  `certification_and_accreditation` varchar(255) NOT NULL,
  `date_found` varchar(255) NOT NULL,
  `nooflawyers` int(11) NOT NULL,
  `firm_phone_number` varchar(11) NOT NULL,
  `firm_rating` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `practice_areas` varchar(255) NOT NULL,
  `firm_img` varchar(255) NOT NULL,
  `date_created` varchar(255) NOT NULL,
  `payment_status` tinyint(11) NOT NULL,
  `verified` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lawyer_firm`
--

INSERT INTO `lawyer_firm` (`firm_id`, `firm_name`, `firm_email`, `firm_password`, `firm_about`, `certification_and_accreditation`, `date_found`, `nooflawyers`, `firm_phone_number`, `firm_rating`, `location`, `practice_areas`, `firm_img`, `date_created`, `payment_status`, `verified`) VALUES
(1, 'Richey Law Firm', '', '', 'Resolution Law Firm is one of the leading legal firms in Nigeria. The firm was founded by a group of passionate, hardworking, and honest lawyers committed to the excellent delivery of legal services in Nigeria.\\nThe firm maintains two law offices in Lagos and another office in Abuja, offering corporate and general civil legal services. \\nThe Firm renders legal services for both local and foreign entities seeking legal services and representation in Nigeria.  Our lawyers are driven by their passion for legal services and they are always after the best and fairest deal in every bargaining. We maintained experienced lawyers who have distinguished themselves over time as thoroughbred professionals.  \\nThe firm is internationally recognized and has over the period assisted in several international and cross-border transactions for individuals and foreign corporations.  The major areas of practice are corporate & commercial law, intellectual property law, maritime law, oil & gas law, banking & finance, mining law, taxation, real estate law, family law, litigation, and arbitration.', '', '2003', 3, '', 0, 'Abuja, FCT', 'Corporate, criminal, family law', 'assets/images/firms/Frame 35.png', '', 0, 0),
(2, 'Suleiman Bakare Chambers', '', '', 'Resolution Law Firm is one of the leading legal firms in Nigeria. The firm was founded by a group of passionate, hardworking, and honest lawyers committed to the excellent delivery of legal services in Nigeria.\\nThe firm maintains two law offices in Lagos and another office in Abuja, offering corporate and general civil legal services. \\nThe Firm renders legal services for both local and foreign entities seeking legal services and representation in Nigeria.  Our lawyers are driven by their passion for legal services and they are always after the best and fairest deal in every bargaining. We maintained experienced lawyers who have distinguished themselves over time as thoroughbred professionals.  \\nThe firm is internationally recognized and has over the period assisted in several international and cross-border transactions for individuals and foreign corporations.  The major areas of practice are corporate & commercial law, intellectual property law, maritime law, oil & gas law, banking & finance, mining law, taxation, real estate law, family law, litigation, and arbitration.', '', '2003', 2, '09087654326', 0, 'Abuja, FCT', 'Corporate, criminal, family law', 'assets/images/firms/Frame 35 (1).png', '', 0, 0),
(3, 'Davis W. Smith, P.C.', '', '', 'Resolution Law Firm is one of the leading legal firms in Nigeria. The firm was founded by a group of passionate, hardworking, and honest lawyers committed to the excellent delivery of legal services in Nigeria.\\nThe firm maintains two law offices in Lagos and another office in Abuja, offering corporate and general civil legal services. \\nThe Firm renders legal services for both local and foreign entities seeking legal services and representation in Nigeria.  Our lawyers are driven by their passion for legal services and they are always after the best and fairest deal in every bargaining. We maintained experienced lawyers who have distinguished themselves over time as thoroughbred professionals.  \\nThe firm is internationally recognized and has over the period assisted in several international and cross-border transactions for individuals and foreign corporations.  The major areas of practice are corporate & commercial law, intellectual property law, maritime law, oil & gas law, banking & finance, mining law, taxation, real estate law, family law, litigation, and arbitration.', '', '2003', 6, '', 0, 'Abuja, FCT', 'Corporate, criminal, family law', 'assets/images/firms/Frame 35 (2).png', '', 0, 0),
(4, 'Feldman Kieffer Law Firm ', '', '', 'Resolution Law Firm is one of the leading legal firms in Nigeria. The firm was founded by a group of passionate, hardworking, and honest lawyers committed to the excellent delivery of legal services in Nigeria.\\nThe firm maintains two law offices in Lagos and another office in Abuja, offering corporate and general civil legal services. \\nThe Firm renders legal services for both local and foreign entities seeking legal services and representation in Nigeria.  Our lawyers are driven by their passion for legal services and they are always after the best and fairest deal in every bargaining. We maintained experienced lawyers who have distinguished themselves over time as thoroughbred professionals.  \\nThe firm is internationally recognized and has over the period assisted in several international and cross-border transactions for individuals and foreign corporations.  The major areas of practice are corporate & commercial law, intellectual property law, maritime law, oil & gas law, banking & finance, mining law, taxation, real estate law, family law, litigation, and arbitration.', '', '2003', 10, '', 0, 'Abuja, FCT', 'Corporate, criminal, family law', 'assets/images/firms/Frame 35 (3).png', '', 0, 0),
(5, 'Osuya & Osuya', '', '', 'Resolution Law Firm is one of the leading legal firms in Nigeria. The firm was founded by a group of passionate, hardworking, and honest lawyers committed to the excellent delivery of legal services in Nigeria.\\nThe firm maintains two law offices in Lagos and another office in Abuja, offering corporate and general civil legal services. \\nThe Firm renders legal services for both local and foreign entities seeking legal services and representation in Nigeria.  Our lawyers are driven by their passion for legal services and they are always after the best and fairest deal in every bargaining. We maintained experienced lawyers who have distinguished themselves over time as thoroughbred professionals.  \\nThe firm is internationally recognized and has over the period assisted in several international and cross-border transactions for individuals and foreign corporations.  The major areas of practice are corporate & commercial law, intellectual property law, maritime law, oil & gas law, banking & finance, mining law, taxation, real estate law, family law, litigation, and arbitration.', '', '2003', 36, '09075564353', 0, 'Abuja, FCT', 'Corporate, criminal, family law', 'assets/images/firms/Frame 35 (4).png', '', 0, 0),
(6, 'Okocha & Okocha', '', '', 'Resolution Law Firm is one of the leading legal firms in Nigeria. The firm was founded by a group of passionate, hardworking, and honest lawyers committed to the excellent delivery of legal services in Nigeria.\\nThe firm maintains two law offices in Lagos and another office in Abuja, offering corporate and general civil legal services. \\nThe Firm renders legal services for both local and foreign entities seeking legal services and representation in Nigeria.  Our lawyers are driven by their passion for legal services and they are always after the best and fairest deal in every bargaining. We maintained experienced lawyers who have distinguished themselves over time as thoroughbred professionals.  \\nThe firm is internationally recognized and has over the period assisted in several international and cross-border transactions for individuals and foreign corporations.  The major areas of practice are corporate & commercial law, intellectual property law, maritime law, oil & gas law, banking & finance, mining law, taxation, real estate law, family law, litigation, and arbitration.', '', '2003', 7, '08056435435', 0, 'Abuja, FCT', 'Corporate, criminal, family law', 'assets/images/firms/Frame 35 (5).png', '', 0, 0),
(9, 'Falana', 'ngnimitech@gmail.com', '$2y$10$KeqBEtyoc46A8Bz089aUnuoGu/4FCYIYJ5p7A7UJfSEJqlYDWGyza', 'Resolution Law Firm is one of the leading legal firms in Nigeria. The firm was founded by a group of passionate, hardworking, and honest lawyers committed to the excellent delivery of legal services in Nigeria.\\nThe firm maintains two law offices in Lagos and another office in Abuja, offering corporate and general civil legal services. \\nThe Firm renders legal services for both local and foreign entities seeking legal services and representation in Nigeria.  Our lawyers are driven by their passion for legal services and they are always after the best and fairest deal in every bargaining. We maintained experienced lawyers who have distinguished themselves over time as thoroughbred professionals.  \\nThe firm is internationally recognized and has over the period assisted in several international and cross-border transactions for individuals and foreign corporations.  The major areas of practice are corporate & commercial law, intellectual property law, maritime law, oil & gas law, banking & finance, mining law, taxation, real estate law, family law, litigation, and arbitration.', 'san , usf', '2009-01-26', 5, '09074456453', 0, 'akure', 'civil , corporate', '', '2025-01-26 02:23:50', 0, 0),
(12, 'Falana', 'ngnimitech@gmail.com', '$2y$10$zo7kRBm2DRqc6QSQ4IF/YuGtuiDKnXKFF0bxBWBBn/nJS/kaGI8Be', 'Resolution Law Firm is one of the leading legal firms in Nigeria. The firm was founded by a group of passionate, hardworking, and honest lawyers committed to the excellent delivery of legal services in Nigeria.\\nThe firm maintains two law offices in Lagos and another office in Abuja, offering corporate and general civil legal services. \\nThe Firm renders legal services for both local and foreign entities seeking legal services and representation in Nigeria.  Our lawyers are driven by their passion for legal services and they are always after the best and fairest deal in every bargaining. We maintained experienced lawyers who have distinguished themselves over time as thoroughbred professionals.  \\nThe firm is internationally recognized and has over the period assisted in several international and cross-border transactions for individuals and foreign corporations.  The major areas of practice are corporate & commercial law, intellectual property law, maritime law, oil & gas law, banking & finance, mining law, taxation, real estate law, family law, litigation, and arbitration.', 'usf', '2009-01-26', 5, '09074456453', 0, 'akure', 'civil , corporate', '', '2025-01-26 02:29:23', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_notifications`
--

CREATE TABLE `lawyer_notifications` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `pending` tinyint(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_profile`
--

CREATE TABLE `lawyer_profile` (
  `id` int(11) NOT NULL,
  `lawyer_email` varchar(255) NOT NULL,
  `lawyer_password` varchar(255) NOT NULL,
  `lawyer_name` varchar(255) NOT NULL,
  `lawyer_img` varchar(255) NOT NULL,
  `lawyer_firm` varchar(255) NOT NULL,
  `lawyer_bio` text NOT NULL,
  `lawyer_education` varchar(255) NOT NULL,
  `lawyer_dob` varchar(255) NOT NULL,
  `lawyer_experience` int(11) NOT NULL,
  `lawyer_rating` int(11) NOT NULL,
  `lawyer_location` varchar(255) NOT NULL,
  `current_position` varchar(255) NOT NULL,
  `lawyer_phone_no` varchar(255) NOT NULL,
  `practice_areas` text NOT NULL,
  `practice_location` varchar(255) NOT NULL,
  `published_articles` text NOT NULL,
  `supreme_court_number` varchar(255) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `status` tinyint(11) NOT NULL,
  `currently_engaged` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `verified` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lawyer_profile`
--

INSERT INTO `lawyer_profile` (`id`, `lawyer_email`, `lawyer_password`, `lawyer_name`, `lawyer_img`, `lawyer_firm`, `lawyer_bio`, `lawyer_education`, `lawyer_dob`, `lawyer_experience`, `lawyer_rating`, `lawyer_location`, `current_position`, `lawyer_phone_no`, `practice_areas`, `practice_location`, `published_articles`, `supreme_court_number`, `payment_status`, `status`, `currently_engaged`, `created_at`, `verified`) VALUES
(1, 'kingrichard@gmail.com', '', 'Richard Igwe', 'assets/images/man-law.png', 'Chaman', 'Barr. Richard is well recognized for her in-depth expertise in her areas of specialization. Her major practice areas include Corporate & Commercial Law, intellectual property law, real estate law, family law, general civil litigation, arbitration, and dispute resolution. She is an Associate at Ernest & Young. With records of experience and achievement in Real Estate Law, Family Law, Intellectual Property Law and Litigation, she brings expertise and unwavering enthusiasm to every case. She has a proven record of delivering exceptional legal counsel and representation to various clients and is adept at analysing complex legal issues and developing strategic solutions. She is committed to delivering tailored solutions that address clients’ unique needs and providing legal advice to different clientele. She constantly stays updated on legal developments and adapts to changes in a bid to deliver feasible solutions. Barr. Nneka is result-oriented and driven by a desire to attain excellence.', 'Obafemi Awolowo University,Nigerian Law School', '', 6, 0, 'Lagos', '', '09087654323', 'Criminal Law, Franchising Law, Business Law ,Intellectual Property Law, Dispute Resolution & Arbitration, Litigation', '', '', '', 0, 0, '', 'dec 2, 2023', 0),
(2, 'nnekaharry@gmail.com', '', 'Priscilla Nwosu', 'assets/images/woman-law.png', 'Chaman', 'Barr. Nneka is well recognized for her in-depth expertise in her areas of specialization. Her major practice areas include Corporate & Commercial Law, intellectual property law, real estate law, family law, general civil litigation, arbitration, and dispute resolution. She is an Associate at Ernest & Young. With records of experience and achievement in Real Estate Law, Family Law, Intellectual Property Law and Litigation, she brings expertise and unwavering enthusiasm to every case. She has a proven record of delivering exceptional legal counsel and representation to various clients and is adept at analysing complex legal issues and developing strategic solutions. She is committed to delivering tailored solutions that address clients’ unique needs and providing legal advice to different clientele. She constantly stays updated on legal developments and adapts to changes in a bid to deliver feasible solutions. Barr. Nneka is result-oriented and driven by a desire to attain excellence.', 'Obafemi Awolowo University, Nigerian Law School', '', 9, 0, 'Rivers', 'senior advocate', '09087654368', 'Criminal Law, Franchising Law, Business Law ,Intellectual Property Law, Dispute Resolution & Arbitration, Litigation', '', '', '', 0, 1, '', '10 jan, 2023', 0),
(3, 'dayong@gmail.com', '', 'dayo mudashiru', 'assets/images/woman.png', 'Boss up', 'Barr. Dayo is well recognized for her in-depth expertise in her areas of specialization. Her major practice areas include Corporate & Commercial Law, intellectual property law, real estate law, family law, general civil litigation, arbitration, and dispute resolution. She is an Associate at Ernest & Young. With records of experience and achievement in Real Estate Law, Family Law, Intellectual Property Law and Litigation, she brings expertise and unwavering enthusiasm to every case. She has a proven record of delivering exceptional legal counsel and representation to various clients and is adept at analysing complex legal issues and developing strategic solutions. She is committed to delivering tailored solutions that address clients’ unique needs and providing legal advice to different clientele. She constantly stays updated on legal developments and adapts to changes in a bid to deliver feasible solutions. Barr. Nneka is result-oriented and driven by a desire to attain excellence.', 'University of ilorin, Nigerian Law School', '', 9, 0, 'Rivers', '', '09087654368', 'Criminal Law, Franchising Law, Business Law ,Intellectual Property Law, Dispute Resolution & Arbitration, Litigation', '', '', '', 0, 0, '', '10 jan, 2023', 0),
(5, 'joseagbo@gmail.com', '$2y$10$SpvAvsJXFaOGQr6/5EC/LOvuv3xNvAeRPaCJZWYRMmZOhd93ZDcbW', 'josephine agbo', 'assets/images/woman.png', 'falana', 'hello hello', 'unilorin, nigeria law school abuja', '2008-12-30', 10, 0, 'lagos', 'senior advocate', '09074456453', 'common law', '12345', 'jerry maguire', '12345', 0, 1, 'yes', '2025-01-21 12:21:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_sales`
--

CREATE TABLE `lawyer_sales` (
  `id` int(11) NOT NULL,
  `daily_sales` int(11) NOT NULL,
  `monthly_sales` int(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lawyer_sales`
--

INSERT INTO `lawyer_sales` (`id`, `daily_sales`, `monthly_sales`, `date`) VALUES
(1, 5000, 150000, 'jan 5, 2025'),
(2, 8000, 190000, 'jan 8, 2025'),
(3, 3000, 150000, 'jan 10, 2025');

-- --------------------------------------------------------

--
-- Table structure for table `law_books`
--

CREATE TABLE `law_books` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_details` text NOT NULL,
  `book_img` text NOT NULL,
  `book_price` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `law_books`
--

INSERT INTO `law_books` (`id`, `author_id`, `book_name`, `book_details`, `book_img`, `book_price`, `created_at`) VALUES
(1, 1, 'uprooted', 'In the mystical realm of Elysium, where magic and advanced technology coalesce, \"Chronicles of Elysium: Echoes of the Aether unfolds an epic tale that spans across galaxies and dimensions. As the cosmic balance between magic and science teeters on the edge, a reluctant hero, Seraphina Stormrider, emerges with a destiny intertwined with the fate of the universe. The story begins when Seraphina, a skilled enchantress with an enigmatic post denovers an andent artifact known as tha', 'assets/images/law-books/Frame 53.png', '5000', 'jan 2,2025'),
(2, 1, 'booth', 'In the mystical realm of Elysium, where magic and advanced technology coalesce, \"Chronicles of Elysium: Echoes of the Aether unfolds an epic tale that spans across galaxies and dimensions. As the cosmic balance between magic and science teeters on the edge, a reluctant hero, Seraphina Stormrider, emerges with a destiny intertwined with the fate of the universe. The story begins when Seraphina, a skilled enchantress with an enigmatic post denovers an andent artifact known as tha', 'assets/images/law-books/Frame 54.png', '20000', 'jan 3,2025'),
(3, 1, 'a million to one', 'In the mystical realm of Elysium, where magic and advanced technology coalesce, \"Chronicles of Elysium: Echoes of the Aether unfolds an epic tale that spans across galaxies and dimensions. As the cosmic balance between magic and science teeters on the edge, a reluctant hero, Seraphina Stormrider, emerges with a destiny intertwined with the fate of the universe. The story begins when Seraphina, a skilled enchantress with an enigmatic post denovers an andent artifact known as tha', 'assets/images/law-books/Frame 55.png', '10000', 'jan 4,2025'),
(4, 1, 'trilogy', 'In the mystical realm of Elysium, where magic and advanced technology coalesce, \"Chronicles of Elysium: Echoes of the Aether unfolds an epic tale that spans across galaxies and dimensions. As the cosmic balance between magic and science teeters on the edge, a reluctant hero, Seraphina Stormrider, emerges with a destiny intertwined with the fate of the universe. The story begins when Seraphina, a skilled enchantress with an enigmatic post denovers an andent artifact known as tha', 'assets/images/law-books/Frame 56.png', '3000', 'jan 5,2025'),
(5, 1, 'heidi', 'In the mystical realm of Elysium, where magic and advanced technology coalesce, \"Chronicles of Elysium: Echoes of the Aether unfolds an epic tale that spans across galaxies and dimensions. As the cosmic balance between magic and science teeters on the edge, a reluctant hero, Seraphina Stormrider, emerges with a destiny intertwined with the fate of the universe. The story begins when Seraphina, a skilled enchantress with an enigmatic post denovers an andent artifact known as tha', 'assets/images/law-books/Frame 57.png', '1000000', 'jan 5,2025');

-- --------------------------------------------------------

--
-- Table structure for table `law_jobs`
--

CREATE TABLE `law_jobs` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `established` varchar(255) NOT NULL,
  `nooflawyers` int(11) NOT NULL,
  `job_location` varchar(255) NOT NULL,
  `company_image` varchar(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_type` varchar(255) NOT NULL,
  `practice_areas` text NOT NULL,
  `renumeration` int(11) NOT NULL,
  `job_qualification` varchar(255) NOT NULL,
  `job_experience` int(11) NOT NULL,
  `experience_level` varchar(255) NOT NULL,
  `experience_length` varchar(255) NOT NULL,
  `job_description` text NOT NULL,
  `responsibilities` varchar(255) NOT NULL,
  `requirements` text NOT NULL,
  `job_views` int(11) NOT NULL,
  `noofapplicant` int(11) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `expiry_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `law_jobs`
--

INSERT INTO `law_jobs` (`id`, `company_name`, `established`, `nooflawyers`, `job_location`, `company_image`, `job_title`, `job_type`, `practice_areas`, `renumeration`, `job_qualification`, `job_experience`, `experience_level`, `experience_length`, `job_description`, `responsibilities`, `requirements`, `job_views`, `noofapplicant`, `created_at`, `expiry_date`) VALUES
(1, 'Osuya &Osuya', '2003', 35, 'FCT Abuja', 'assets/images/jobs/Frame 35 (1).png', 'Corporate Attorney', 'full time', 'Corporate law,Criminal law', 400000, 'degree', 5, 'mid-level', '3', 'We are seeking a highly skilled and specialized Corporate Attorney to join our Legal department. In this role, you will be responsible for handling all complex legal matters and projects, ensuring the legality of our commercial transactions, and providing expert advice on our company’s legal rights and duties. As a Corporate Attorney, you will play a crucial role in safeguarding our organization against legal risks by conducting thorough research and analysis. You will develop company policies and positions on legal issues and ensure compliance with relevant laws and regulations. Additionally, you will be involved in structuring, drafting, and reviewing legal documents, as well as representing the company in legal proceedings and liaising with External Lawyers.\r\n', 'Consult and handle all corporate legal processes (e.g. intellectual property, mergers & acquisitions, compliance issues, transactions, agreements, lawsuits)\r\nDevelop company policy and position on legal issues\r\nResearch, anticipate and guard company again', 'Proven comparable law firm experience\r\nProven background on corporate law (contract law, intellectual property rights, licensing, zoning laws)\r\nExcellent negotiation and communications skills\r\nAdministrative and managerial skills\r\nAnalytical ability and strong attention to detail\r\nComputer skills\r\nCurrent license to practice law\r\nMinimum of B.L and LL.B\r\nYears of Experience required- Minimum of 3 Years post-call practice', 0, 20, 'jan 3,2025', 'jan 25,2024');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `compose` text NOT NULL,
  `receiver_email` varchar(255) NOT NULL,
  `has_read` tinyint(11) NOT NULL,
  `is_sender_deleted` tinyint(11) NOT NULL,
  `is_receiver_deleted` tinyint(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_email`, `name`, `subject`, `compose`, `receiver_email`, `has_read`, `is_sender_deleted`, `is_receiver_deleted`, `date`) VALUES
(1, 'essentialng@gmail.com', 'essential nigeria', 'teacher', 'hello', 'teacher@gmail.com', 0, 0, 0, '2024-07-10 10:29:47'),
(2, 'essentialng@gmail.com', 'essential nigeria', 'teacher', 'how are you?', 'ngnimitech@gmail.com', 1, 0, 0, '2024-07-10 10:29:47');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `expiry_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `price`, `user_id`, `user_type`, `reference`, `duration`, `expiry_date`) VALUES
(1, '4000', '8', 'user', '', '1 month', '2025-01-27 22:03:40'),
(2, '1000', '8', 'user', '', '1 day', '2025-01-27 22:20:51');

-- --------------------------------------------------------

--
-- Table structure for table `user_notifications`
--

CREATE TABLE `user_notifications` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `pending` tinyint(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_img` text NOT NULL,
  `user_bio` text NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_location` varchar(255) NOT NULL,
  `user_occupation` varchar(255) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `payment_status` tinyint(11) NOT NULL,
  `verified` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_name`, `user_email`, `user_password`, `user_img`, `user_bio`, `user_phone`, `user_location`, `user_occupation`, `date_of_birth`, `created_at`, `payment_status`, `verified`) VALUES
(1, 'jane doe', 'jane@gmail.com', '', 'assets/images/users/Frame 35 (1).png', 'My name is Jane, and I am a teacher as you already know. I am just exploring, hopefully I find a decent lawyer when I need one', '', 'lagos', 'teacher', '', 'jan 5, 2024', 0, 0),
(2, 'john doe', 'john@gmail.com', '', 'assets/images/users/Frame 35 (2).png', 'My name is John, and I am a teacher as you already know. I am just exploring, hopefully I find a decent lawyer when I need one', '', 'edo', 'nurse', '', 'dec 5, 2024', 0, 0),
(3, 'jane doe', 'janet@gmail.com', '', 'assets/images/users/Frame 35 (3).png', 'My name is Janet, and I am a teacher as you already know. I am just exploring, hopefully I find a decent lawyer when I need one', '', 'lagos', 'fashion designer', '', 'dec 18, 2024', 0, 0),
(4, 'john doe', 'johnathan@gmail.com', '', 'assets/images/users/Frame 35 (4).png', 'My name is Johnathan, and I am a teacher as you already know. I am just exploring, hopefully I find a decent lawyer when I need one', '', 'edo', 'doctor', '', 'dec 21, 2024', 0, 0),
(8, 'neeyo', 'ngnimitech@gmail.com', '$2y$10$7FmsilYFCQ1agWqOmy1A4e7zc3eanyj0qkEOxePwYfux1/vx0AQj2', '', 'hello hello', '09074456453', 'fct abuja', 'student', '2025-01-01', '2025-01-26 13:13:42', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `volunteers`
--

CREATE TABLE `volunteers` (
  `id` int(11) NOT NULL,
  `volunteer_name` varchar(255) NOT NULL,
  `volunteer_image` varchar(255) NOT NULL,
  `practice_areas` varchar(255) NOT NULL,
  `joined_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `volunteers`
--

INSERT INTO `volunteers` (`id`, `volunteer_name`, `volunteer_image`, `practice_areas`, `joined_date`) VALUES
(1, 'james baldwin', 'assets/images/volunteer/volunteer-1.png', 'family law, common law', 'jan 2, 2025'),
(2, 'godwin lord', 'assets/images/volunteer/volunteer-2.png', 'criminal law, common law', 'jan 3, 2025'),
(3, 'adewale salako', 'assets/images/volunteer/volunteer-3.png', 'family law, common law', 'jan 4, 2025'),
(4, 'musa tawakalitu', 'assets/images/volunteer/volunteer-4.png', 'entertainment law, intellectual law', 'jan 5, 2025'),
(5, 'juliet bola', 'assets/images/volunteer/volunteer-5.png', 'criminal law, common law', 'jan 4, 2025');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `applied_jobs`
--
ALTER TABLE `applied_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courts`
--
ALTER TABLE `courts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `court_cases`
--
ALTER TABLE `court_cases`
  ADD PRIMARY KEY (`client`);

--
-- Indexes for table `fetch_income`
--
ALTER TABLE `fetch_income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `firm_notifications`
--
ALTER TABLE `firm_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyer_firm`
--
ALTER TABLE `lawyer_firm`
  ADD PRIMARY KEY (`firm_id`);

--
-- Indexes for table `lawyer_notifications`
--
ALTER TABLE `lawyer_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyer_profile`
--
ALTER TABLE `lawyer_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyer_sales`
--
ALTER TABLE `lawyer_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `law_books`
--
ALTER TABLE `law_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `law_jobs`
--
ALTER TABLE `law_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volunteers`
--
ALTER TABLE `volunteers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applied_jobs`
--
ALTER TABLE `applied_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courts`
--
ALTER TABLE `courts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fetch_income`
--
ALTER TABLE `fetch_income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `firm_notifications`
--
ALTER TABLE `firm_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lawyer_firm`
--
ALTER TABLE `lawyer_firm`
  MODIFY `firm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lawyer_notifications`
--
ALTER TABLE `lawyer_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lawyer_profile`
--
ALTER TABLE `lawyer_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lawyer_sales`
--
ALTER TABLE `lawyer_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `law_books`
--
ALTER TABLE `law_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `law_jobs`
--
ALTER TABLE `law_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_notifications`
--
ALTER TABLE `user_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `volunteers`
--
ALTER TABLE `volunteers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
