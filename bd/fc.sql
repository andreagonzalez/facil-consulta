-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 23, 2020 at 02:17 PM
-- Server version: 8.0.22
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fc`
--

-- --------------------------------------------------------

--
-- Table structure for table `horario`
--

CREATE TABLE `horario` (
  `id` int NOT NULL,
  `id_medico` int NOT NULL,
  `data_horario` datetime NOT NULL,
  `horario_agendado` tinyint(1) NOT NULL,
  `data_criacao` timestamp NULL DEFAULT NULL,
  `data_alteracao` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `horario`
--

INSERT INTO `horario` (`id`, `id_medico`, `data_horario`, `horario_agendado`, `data_criacao`, `data_alteracao`) VALUES
(1, 1, '2020-11-22 11:34:33', 1, '2020-11-21 14:34:33', '2020-11-21 14:34:33'),
(3, 2, '2020-11-22 11:34:33', 1, '2020-11-21 14:34:33', '2020-11-21 14:34:33'),
(4, 1, '2020-11-21 11:40:35', 0, '2020-11-21 14:40:35', '2020-11-21 14:40:35'),
(5, 1, '2020-11-21 11:40:35', 0, '2020-11-21 14:40:35', '2020-11-21 14:40:35');

-- --------------------------------------------------------

--
-- Table structure for table `medico`
--

CREATE TABLE `medico` (
  `id` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `senha` varchar(250) NOT NULL,
  `data_criacao` timestamp NULL DEFAULT NULL,
  `data_alteracao` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medico`
--

INSERT INTO `medico` (`id`, `nome`, `email`, `senha`, `data_criacao`, `data_alteracao`) VALUES
(1, 'Luis', 'luis@teste.com', '81dc9bdb52d04dc20036dbd8313ed055', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Andrea', 'andrea@teste.com', 'julia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Andrea Gonzalez', 'andrea@meumail.com', '1234', '2020-11-21 14:33:18', '2020-11-21 14:33:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_medico` (`id_medico`) USING BTREE;

--
-- Indexes for table `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `horario`
--
ALTER TABLE `horario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `medico`
--
ALTER TABLE `medico`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `id_medico_forK` FOREIGN KEY (`id_medico`) REFERENCES `medico` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
