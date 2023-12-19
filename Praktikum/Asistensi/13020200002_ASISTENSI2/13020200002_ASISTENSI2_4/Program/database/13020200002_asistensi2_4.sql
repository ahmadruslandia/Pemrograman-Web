-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 03:15 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `13020200002_asistensi2_4`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_karyawan`
--

CREATE TABLE `data_karyawan` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `age` int(11) NOT NULL,
  `skills` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `designation` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

INSERT INTO `data_karyawan` (`id`, `name`, `age`, `skills`, `address`,`designation`) VALUES
('3', 'Andy', '30', 'jQuery', 'New Jersey','WEB Developer'),
('4', 'Arun', '25', 'Javascript', 'Delhi','WEB Developer'),
('5', 'Shyrlin', '35', 'NodeJs', 'Tokyo','Programmer'),
('6', 'Tom', '28', 'Angular', 'London','WEB Developer'),
('7', 'Pollock', '26', 'MySQL', 'Paris','WEB Developer'),
('8', 'David', '28', 'HTML', 'Paris','WEB Developer'),
('9', 'Root', '23', 'jQuery', 'Sydney','WEB Developer'),
('10', 'Nathan', '28', 'PHP', 'London','WEB Developer'),
('11', 'Cook', '38', 'PHP', 'Delhi','WEB Developer'),
('12', 'Roy', '30', 'PHP', 'Delhi','WEB Developer');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
