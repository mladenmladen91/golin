-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2018 at 08:43 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `planner`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_columns`
--

CREATE TABLE `about_columns` (
  `about_column_id` int(3) NOT NULL,
  `about_column_title` varchar(255) NOT NULL,
  `about_column_content` varchar(1200) NOT NULL,
  `about_column_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_columns`
--

INSERT INTO `about_columns` (`about_column_id`, `about_column_title`, `about_column_content`, `about_column_image`) VALUES
(2, 'connectors', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'krug2.png'),
(3, 'creators', 'testiramo navedeni sadrÅ¾aj', 'krug3.png'),
(4, 'catalysts', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'krug4.png'),
(5, 'creators', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'krug1.png');

-- --------------------------------------------------------

--
-- Table structure for table `about_content`
--

CREATE TABLE `about_content` (
  `about_content_id` int(3) NOT NULL,
  `about_title1` varchar(1200) NOT NULL,
  `about_title2` varchar(1200) NOT NULL,
  `about_p1` varchar(1200) NOT NULL,
  `about_p2` varchar(1200) NOT NULL,
  `about_p3` varchar(1200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_content`
--

INSERT INTO `about_content` (`about_content_id`, `about_title1`, `about_title2`, `about_p1`, `about_p2`, `about_p3`) VALUES
(1, 'WE ARE THE RELEVANCE agency', 'We\'re relevance obsessed. More importantly, we\'re relevance equipped', 'We are an integrated agency with PR, Digital and Content at our core. Our ambition is to create change through brave, relevant work worthy of awe, action and awards.\r\nBy embracing new technologies and pushing creative boundries, we help our clients adapt and win in constantly evolving world', 'We are commited to delivering the deepiest insights, boldest ideas and broadest engagement to the world\'s leading brands through seamless integrated communications', 'We\'re the nice guys who kick ass all the time');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(3) NOT NULL,
  `client_image` text NOT NULL,
  `client_moto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_image`, `client_moto`) VALUES
(1, 'client1.png', 'mcdonald&#39;s: the strow'),
(2, 'client2.png', 'mcdonald\'s: frork'),
(3, 'client3.png', 'gunniess: made of more'),
(5, 'client4.png', 'magnum: magnm x mochino'),
(6, 'client5.png', 'gulden\'s: #defend the dog'),
(7, 'client6.png', 'toblerone: the toblerone take');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(3) NOT NULL,
  `contact_address` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_address`, `contact_phone`, `contact_email`) VALUES
(1, 'Bulevar Petra Cetinjskog 56 8100 Podgorica, Montenegro', '+382 223 240', 'info@amplitudo.me');

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE `header` (
  `header_id` int(3) NOT NULL,
  `header_title` varchar(255) NOT NULL,
  `header_content` varchar(1200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`header_id`, `header_title`, `header_content`) VALUES
(1, 'Amplitudo  affiliate of golin', 'Amplitudo provides all kind of support.  provides all kind of support. ');

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `meet_id` int(3) NOT NULL,
  `meet_name` varchar(255) NOT NULL,
  `meet_company` varchar(255) NOT NULL,
  `meet_mail` varchar(255) NOT NULL,
  `meet_phone` varchar(255) NOT NULL,
  `meet_date` date NOT NULL,
  `meet_time` time NOT NULL,
  `meet_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`meet_id`, `meet_name`, `meet_company`, `meet_mail`, `meet_phone`, `meet_date`, `meet_time`, `meet_status`) VALUES
(12, 'Jelena StojanoviÄ‡', 'ELEZ', 'jelena453@gmail.com', '+382456-987', '2018-08-30', '16:10:00', 'prihvacen'),
(14, 'Mladen Jelovac', 'Mladen L.T.D.', 'jelovacmladen@gmail.com', '+382456-987', '2018-08-24', '01:00:00', 'cekanje');

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `office_id` int(3) NOT NULL,
  `office_title` varchar(255) NOT NULL,
  `office_image` text NOT NULL,
  `office_location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`office_id`, `office_title`, `office_image`, `office_location`) VALUES
(1, 'Podgorica', 'podgorica_color.png', 'offices_default emea'),
(2, 'Belgrade', 'belgrade_color.png', 'offices_default emea'),
(3, 'Brussels', 'brussels_color.jpg', 'offices_default emea'),
(4, 'Bucharest', 'bucharest_color.jpg', 'offices_default emea'),
(5, 'Hamburg', 'hamburg_color.jpg', 'offices_default emea'),
(6, 'Istanbul', 'istanbul_color.jpg', 'offices_default emea'),
(7, 'London', 'london_color.jpg', 'offices_default emea'),
(8, 'Madrid', 'madrid_color.jpg', 'offices_default emea'),
(9, 'Moscow', 'moscow_color.jpg', 'offices_default emea'),
(10, 'Paris', 'paris_color.jpg', 'offices_default emea'),
(11, 'Riga', 'riga_color.jpg', 'offices_default emea'),
(12, 'Stockholm', 'stockholm_color.jpg', 'offices_default emea'),
(13, 'Dubai', 'dubai_color.jpg', 'asia'),
(18, 'Milano', 'milano_color.jpg', 'offices_default emea');

-- --------------------------------------------------------

--
-- Table structure for table `pr`
--

CREATE TABLE `pr` (
  `pr_id` int(3) NOT NULL,
  `pr_title` varchar(255) NOT NULL,
  `pr_content` varchar(1200) NOT NULL,
  `pr_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pr`
--

INSERT INTO `pr` (`pr_id`, `pr_title`, `pr_content`, `pr_image`) VALUES
(1, 'Pr and communications', 'Just testing some editing to see how this is will go here. Just testing some editing here and now however. testing this all the time.Just testing some editing here and now however. testing this all the time.Just testing some editing here and now however. testing this all the time. Test test', 'fotka2.png'),
(2, 'Pr and management', 'We are provding management services to all our clients. ', 'fotka3.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_image`, `user_email`) VALUES
(6, 'admin', '$2y$12$X/6h1eQm8XvGULw7zvHYkOZ9mCh6.RFBZGGKfi7sD3tZmRWd6bNnG', 'Mladen', 'Jelovac', '30715567_1798039386927498_3929360661649293312_n.jpg', 'jelovacmladen@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_columns`
--
ALTER TABLE `about_columns`
  ADD PRIMARY KEY (`about_column_id`);

--
-- Indexes for table `about_content`
--
ALTER TABLE `about_content`
  ADD PRIMARY KEY (`about_content_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`header_id`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`meet_id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`office_id`);

--
-- Indexes for table `pr`
--
ALTER TABLE `pr`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_columns`
--
ALTER TABLE `about_columns`
  MODIFY `about_column_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `about_content`
--
ALTER TABLE `about_content`
  MODIFY `about_content_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `header`
--
ALTER TABLE `header`
  MODIFY `header_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `meet_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `office_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pr`
--
ALTER TABLE `pr`
  MODIFY `pr_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
