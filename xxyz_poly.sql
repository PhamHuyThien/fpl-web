-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 17, 2022 at 11:03 AM
-- Server version: 10.3.28-MariaDB-log-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xxyz_poly`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms_course`
--

CREATE TABLE `cms_course` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `safety` int(11) DEFAULT NULL,
  `upd` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `id_tool` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `region` varchar(30) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `timezone` varchar(50) DEFAULT NULL,
  `time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `version` varchar(10) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

create table feedbacks(
  id int(11) not null primary key AUTO_INCREMENT,
  tool_id int(11) not null,
  username varchar(50) not null,
  text varchar(1000),
  time int(11),
  CONSTRAINT FOREIGN KEY (tool_id) REFERENCES tools(id)
);

--
-- Indexes for dumped tables
--
INSERT INTO `tools` (`id`, `name`, `version`, `status`, `time`) VALUES
(1, 'fpl@utocms', '4.0.0', 1, 0),
(2, 'fpl@utolms', '2.0.0', 1, 0);

--
-- Indexes for table `cms_course`
--
ALTER TABLE `cms_course`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tool` (`id_tool`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms_course`
--
ALTER TABLE `cms_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`id_tool`) REFERENCES `tools` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
