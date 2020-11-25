-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 23/11/2020 às 15:28
-- Versão do servidor: 10.4.14-MariaDB-1:10.4.14+maria~bionic
-- Versão do PHP: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `fc`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `horario`
--

CREATE TABLE `horario` (
  `id` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL,
  `data_consulta` datetime NOT NULL,
  `horario_disponivel` tinyint(1) NOT NULL,
  `data_criacao` timestamp NULL DEFAULT NULL,
  `data_alteracao` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `horario`
--

INSERT INTO `horario` (`id`, `id_medico`, `data_consulta`, `horario_disponivel`, `data_criacao`, `data_alteracao`) VALUES
(1, 1, '2020-11-22 11:34:33', 1, '2020-11-21 14:34:33', '2020-11-21 14:34:33'),
(3, 2, '2020-11-22 11:34:33', 1, '2020-11-21 14:34:33', '2020-11-21 14:34:33'),
(4, 1, '2020-11-21 11:40:35', 0, '2020-11-21 14:40:35', '2020-11-21 14:40:35'),
(5, 1, '2020-11-21 11:40:35', 0, '2020-11-21 14:40:35', '2020-11-21 14:40:35'),
(6, 7, '2020-11-25 16:00:00', 1, NULL, NULL),
(7, 7, '2020-11-25 17:00:00', 1, NULL, NULL),
(10, 7, '2020-11-25 18:00:00', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `medico`
--

CREATE TABLE `medico` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `senha` varchar(250) NOT NULL,
  `data_criacao` timestamp NULL DEFAULT NULL,
  `data_alteracao` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `medico`
--

INSERT INTO `medico` (`id`, `nome`, `email`, `senha`, `data_criacao`, `data_alteracao`) VALUES
(1, 'Luis', 'luis@teste.com', '81dc9bdb52d04dc20036dbd8313ed055', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Andrea', 'andrea@teste.com', 'julia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Andrea Gonzalez', 'andrea@meumail.com', '1234', '2020-11-21 14:33:18', '2020-11-21 14:33:18'),
(7, 'beto', 'beto@email.com', '1234', NULL, NULL);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_medico` (`id_medico`) USING BTREE;

--
-- Índices de tabela `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `horario`
--
ALTER TABLE `horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de tabela `medico`
--
ALTER TABLE `medico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `id_medico_forK` FOREIGN KEY (`id_medico`) REFERENCES `medico` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
