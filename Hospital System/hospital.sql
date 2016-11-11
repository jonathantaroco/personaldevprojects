-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 17-Nov-2014 às 04:13
-- Versão do servidor: 5.6.12-log
-- versão do PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `hospital`
--
CREATE DATABASE IF NOT EXISTS `hospital` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hospital`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `alocado`
--

CREATE TABLE IF NOT EXISTS `alocado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cpfmed` varchar(11) NOT NULL,
  `cpfenf` varchar(11) NOT NULL,
  `dia` date NOT NULL,
  `turno` varchar(10) NOT NULL,
  `numero` int(3) NOT NULL,
  `horainicio` time NOT NULL,
  `hrstrabalhado` varchar(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cpfmed` (`cpfmed`),
  KEY `cpfenf` (`cpfenf`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Extraindo dados da tabela `alocado`
--

INSERT INTO `alocado` (`id`, `cpfmed`, `cpfenf`, `dia`, `turno`, `numero`, `horainicio`, `hrstrabalhado`) VALUES
(1, '61253303118', '97106675059', '2014-10-16', 'Manha', 200, '08:00:00', '4'),
(7, '61253303118', '97106675059', '2014-10-16', 'Tarde', 201, '13:00:00', '4'),
(12, '10423978640', '97106675059', '2014-10-16', 'Noite', 299, '18:00:00', '4'),
(21, '82426750316', '27816481594', '2014-10-17', 'Tarde', 299, '16:00:00', '3'),
(22, '82426750316', '22222222222', '2014-10-28', 'Noite', 299, '18:00:00', '4');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atende`
--

CREATE TABLE IF NOT EXISTS `atende` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cpfmed` varchar(11) NOT NULL,
  `numero` int(3) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cpfmed` (`cpfmed`),
  KEY `numero` (`numero`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Extraindo dados da tabela `atende`
--

INSERT INTO `atende` (`id`, `cpfmed`, `numero`, `data`, `hora`) VALUES
(2, '20676366180', 300, '2014-10-13', '00:00:00'),
(3, '20676366180', 301, '2014-10-13', '00:00:00'),
(8, '61253303118', 300, '2014-10-14', '00:00:00'),
(12, '82426750316', 302, '2014-10-17', '00:00:00'),
(13, '20676366180', 300, '2014-10-16', '00:00:00'),
(14, '82426750316', 301, '2014-10-17', '00:00:00'),
(15, '20676366180', 301, '2014-10-15', '00:00:00'),
(16, '82426750316', 301, '2014-10-17', '00:00:00'),
(22, '61253303118', 302, '2014-10-17', '08:20:00'),
(36, '61253303118', 300, '2014-10-17', '08:00:00'),
(37, '61253303118', 302, '2014-10-18', '08:00:00'),
(38, '61253303118', 302, '2014-10-17', '08:51:00'),
(39, '61253303118', 302, '2014-10-18', '14:00:00'),
(40, '82426750316', 302, '2014-10-18', '15:00:00'),
(41, '82426750316', 302, '2014-10-28', '09:00:00'),
(42, '82426750316', 301, '2014-10-28', '09:20:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `enfermeiro`
--

CREATE TABLE IF NOT EXISTS `enfermeiro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cpfenf` varchar(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cpfenf` (`cpfenf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `medico`
--

CREATE TABLE IF NOT EXISTS `medico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cpfmed` varchar(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cpfmed` (`cpfmed`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `possuiconsulta`
--

CREATE TABLE IF NOT EXISTS `possuiconsulta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cpfmed` varchar(11) NOT NULL,
  `cpfpac` varchar(11) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `numero` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cpfmed` (`cpfmed`),
  KEY `cpfpac` (`cpfpac`),
  KEY `numero` (`numero`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `possuiconsulta`
--

INSERT INTO `possuiconsulta` (`id`, `cpfmed`, `cpfpac`, `data`, `hora`, `numero`) VALUES
(1, '20676366180', '87452118251', '2014-10-13', '09:00:00', 301),
(9, '20676366180', '23586632398', '2014-10-13', '08:00:00', 300),
(11, '82426750316', '87452118251', '2014-10-17', '16:00:00', 302),
(12, '82426750316', '87452118251', '2014-10-18', '15:00:00', 302);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cpfmed` varchar(11) NOT NULL,
  `cpfpac` varchar(11) NOT NULL,
  `numero` int(3) NOT NULL,
  `datainicio` date NOT NULL,
  `datafim` date NOT NULL,
  `hora` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cpfmed` (`cpfmed`),
  KEY `numero` (`numero`),
  KEY `cpfpac` (`cpfpac`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `reserva`
--

INSERT INTO `reserva` (`id`, `cpfmed`, `cpfpac`, `numero`, `datainicio`, `datafim`, `hora`) VALUES
(2, '82426750316', '87452118251', 299, '2014-10-17', '2014-10-17', '15:00:00'),
(3, '20676366180', '87452118251', 202, '2014-10-17', '2014-10-17', '13:00:00'),
(4, '20676366180', '87452118251', 100, '2014-10-19', '2014-10-25', '09:00:00'),
(5, '20676366180', '23586632398', 101, '2014-10-19', '2014-10-25', '09:00:00'),
(6, '82426750316', '87452118251', 400, '2014-10-21', '2014-10-26', '16:00:00'),
(7, '20676366180', '23586632398', 400, '2014-10-28', '2014-10-31', '19:00:00'),
(8, '82426750316', '11111111111', 401, '2014-10-28', '2014-10-29', '18:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `salas`
--

CREATE TABLE IF NOT EXISTS `salas` (
  `numero` int(3) NOT NULL,
  `cpfadmin` varchar(11) NOT NULL,
  `capacidade` varchar(8) NOT NULL,
  `tipocirurgia` varchar(20) NOT NULL,
  `tiposala` varchar(25) NOT NULL,
  PRIMARY KEY (`numero`),
  KEY `cpfadmin` (`cpfadmin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `salas`
--

INSERT INTO `salas` (`numero`, `cpfadmin`, `capacidade`, `tipocirurgia`, `tiposala`) VALUES
(100, '10423978640', 'Unica', '', 'Leito UTI'),
(101, '10423978640', 'Multipla', '', 'Leito UTI'),
(199, '10423978640', 'Multipla', '', 'Leito UTI'),
(200, '10423978640', '', 'Cardiaca', 'Sala de Cirurgia'),
(201, '10423978640', '', 'Cardiaca', 'Sala de Cirurgia'),
(202, '10423978640', '', 'Plastica', 'Sala de Cirurgia'),
(299, '10423978640', '', 'Plastica', 'Sala de Cirurgia'),
(300, '10423978640', '', '', 'Consultorio'),
(301, '10423978640', '', '', 'Consultorio'),
(302, '10423978640', '', '', 'Consultorio'),
(330, '10423978640', '', '', 'Consultorio'),
(399, '10423978640', '', '', 'Consultorio'),
(400, '10423978640', 'Unica', '', 'Quarto de Recuperacao'),
(401, '10423978640', 'Multipla', '', 'Quarto de Recuperacao'),
(499, '10423978640', 'Unica', '', 'Quarto de Recuperacao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `tipousuario` varchar(20) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `login` varchar(10) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `telefone` int(8) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `cidade` varchar(35) NOT NULL,
  `rua` varchar(40) NOT NULL,
  `numero` int(5) NOT NULL,
  `nascimento` date NOT NULL,
  `sexo` varchar(6) NOT NULL,
  `coren` int(5) NOT NULL,
  `espenf` varchar(30) NOT NULL,
  `crm` int(5) NOT NULL,
  `espmed` varchar(30) NOT NULL,
  `plano` varchar(20) NOT NULL,
  PRIMARY KEY (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`tipousuario`, `cpf`, `nome`, `login`, `senha`, `telefone`, `estado`, `cidade`, `rua`, `numero`, `nascimento`, `sexo`, `coren`, `espenf`, `crm`, `espmed`, `plano`) VALUES
('Administrador', '10423978640', 'Usuario Administrador', 'admin', 'admin', 33726501, 'MG', 'SJDR', 'Rua Principal', 10, '1993-02-09', 'homem', 0, '', 0, '', ''),
('Paciente', '11111111111', 'Alan Neves', 'alan', 'alan', 333333333, 'MG', 'SJDR', 'Rua Principal', 403, '2014-10-28', 'Homem', 0, '', 0, '', 'Bradesco'),
('Medico', '20676366180', 'Aline Mesquita', 'aline', 'aline', 33729865, 'MG', 'SJDR', 'Rua SecundÃ¡ria', 103, '1970-11-11', 'Mulher', 0, '', 45123, 'Dermatologia', ''),
('Enfermeiro', '22222222222', 'Nicolas Silva', 'nicolas', 'nicolas', 33333333, 'MG', 'SJDR', 'Rua Principal', 409, '2014-10-06', 'Homem', 12345, 'Pediatria', 0, '', ''),
('Paciente', '23586632398', 'Lucas Oliveira', 'lucas', 'lucas', 33792456, 'MG', 'SJDR', 'Rua Principal', 145, '1980-10-01', 'Homem', 0, '', 0, '', 'Unimed'),
('Enfermeiro', '27816481594', 'Luiz Paulo', 'luiz', 'luiz', 33542608, 'RJ', 'Rio de Janeiro', 'Rua Principal 2', 145, '1970-12-31', 'Homem', 12345, 'Cardiologia', 0, '', ''),
('Conselho Presidente', '49157672806', 'Conselho Presidente', 'presidente', 'presidente', 33236776, 'RS', 'Curitiba', 'Rua Mil', 1000, '1962-02-16', 'Homem', 0, '', 0, '', ''),
('Medico', '61253303118', 'Matheus Silva', 'matheus', 'matheus', 33725612, 'MG', 'SJDR', 'Rua Principal', 12, '1880-03-14', 'Homem', 0, '', 45675, 'Ortopedia', ''),
('Medico', '82426750316', 'Samuel Ribeiro', 'samuel', 'samuel', 33724553, 'MG', 'SJDR', 'Rua Principal 3', 453, '1977-11-04', 'Homem', 0, '', 45555, 'Psiquiatria', ''),
('Paciente', '87452118251', 'Joao da Silva', 'joao', 'joao', 33792608, 'MG', 'SJDR', 'Rua Principal', 90, '1990-11-09', 'Homem', 0, '', 0, '', 'Bradesco'),
('Enfermeiro', '97106675059', 'Rafael Nascimento', 'rafael', 'rafael', 33725610, 'MG', 'SJDR', 'Rua Principal', 11, '1983-03-17', 'Homem', 32222, 'Cirurgica', 0, '', '');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `alocado`
--
ALTER TABLE `alocado`
  ADD CONSTRAINT `alocado_ibfk_1` FOREIGN KEY (`cpfmed`) REFERENCES `usuario` (`cpf`),
  ADD CONSTRAINT `alocado_ibfk_2` FOREIGN KEY (`cpfenf`) REFERENCES `usuario` (`cpf`);

--
-- Limitadores para a tabela `atende`
--
ALTER TABLE `atende`
  ADD CONSTRAINT `atende_ibfk_1` FOREIGN KEY (`cpfmed`) REFERENCES `usuario` (`cpf`),
  ADD CONSTRAINT `atende_ibfk_2` FOREIGN KEY (`numero`) REFERENCES `salas` (`numero`);

--
-- Limitadores para a tabela `enfermeiro`
--
ALTER TABLE `enfermeiro`
  ADD CONSTRAINT `enfermeiro_ibfk_1` FOREIGN KEY (`cpfenf`) REFERENCES `usuario` (`cpf`);

--
-- Limitadores para a tabela `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `medico_ibfk_1` FOREIGN KEY (`cpfmed`) REFERENCES `usuario` (`cpf`);

--
-- Limitadores para a tabela `possuiconsulta`
--
ALTER TABLE `possuiconsulta`
  ADD CONSTRAINT `possuiconsulta_ibfk_1` FOREIGN KEY (`cpfmed`) REFERENCES `usuario` (`cpf`),
  ADD CONSTRAINT `possuiconsulta_ibfk_2` FOREIGN KEY (`cpfpac`) REFERENCES `usuario` (`cpf`),
  ADD CONSTRAINT `possuiconsulta_ibfk_3` FOREIGN KEY (`numero`) REFERENCES `salas` (`numero`);

--
-- Limitadores para a tabela `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`cpfmed`) REFERENCES `usuario` (`cpf`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`numero`) REFERENCES `salas` (`numero`),
  ADD CONSTRAINT `reserva_ibfk_3` FOREIGN KEY (`cpfpac`) REFERENCES `usuario` (`cpf`);

--
-- Limitadores para a tabela `salas`
--
ALTER TABLE `salas`
  ADD CONSTRAINT `salas_ibfk_1` FOREIGN KEY (`cpfadmin`) REFERENCES `usuario` (`cpf`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
