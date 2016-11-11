-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 15-Dez-2013 às 15:19
-- Versão do servidor: 5.6.12-log
-- versão do PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `sistema_hoteis`
--
CREATE DATABASE IF NOT EXISTS `sistema_hoteis` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sistema_hoteis`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cupom`
--

CREATE TABLE IF NOT EXISTS `cupom` (
  `id_cupom` int(11) NOT NULL,
  `valor` double NOT NULL,
  `cpf` varchar(11) NOT NULL,
  PRIMARY KEY (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `hoteis`
--

CREATE TABLE IF NOT EXISTS `hoteis` (
  `nome` varchar(40) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `cidade` varchar(25) NOT NULL,
  `estado` varchar(25) NOT NULL,
  `rua` varchar(25) NOT NULL,
  `numero` int(11) NOT NULL,
  PRIMARY KEY (`cnpj`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `hoteis`
--

INSERT INTO `hoteis` (`nome`, `cnpj`, `cidade`, `estado`, `rua`, `numero`) VALUES
('', '', '', '', '', 0),
('Copacabana Palace', '00.123.321/0001-12', 'SJDR', 'MG', 'Rua Batista', 1009),
('Jonathan Ãcaro TarÃ´co', '12343545', 'adv', 'asasa', 'sasa', 96),
('ABC', '123455678', 'SJDR', 'MG', 'Avenida das Flores', 666),
('GALO', '25541122', 'Marrakesh', 'Minas Gerais', 'Castelo Branco', 52),
('Minas Gerais', '255425222', 'Morro do Ferro', 'Minas Gerais', 'Castelo Branco', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `quartos`
--

CREATE TABLE IF NOT EXISTS `quartos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` int(11) NOT NULL,
  `preco` double NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `quant` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cnpj` (`cnpj`),
  KEY `cnpj_2` (`cnpj`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `quartos`
--

INSERT INTO `quartos` (`id`, `tipo`, `preco`, `cnpj`, `quant`) VALUES
(1, 1, 50, '25541122', 20),
(2, 2, 80, '25541122', 10),
(3, 1, 0, '', 0),
(4, 2, 0, '', 0),
(5, 1, 100, '123455678', 1),
(6, 2, 200, '123455678', 2),
(7, 1, 0, '', 0),
(8, 2, 0, '', 0),
(9, 1, 100, '12343545', 1),
(10, 2, 200, '12343545', 2),
(11, 1, 50, '00.123.321/0001-12', 20),
(12, 2, 80, '00.123.321/0001-12', 20);

-- --------------------------------------------------------
--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `nome` varchar(40) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `cidade` varchar(25) NOT NULL,
  `estado` varchar(25) NOT NULL,
  `rua` varchar(35) NOT NULL,
  `numero` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(20) NOT NULL,
  PRIMARY KEY (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`nome`, `cpf`, `cidade`, `estado`, `rua`, `numero`, `login`, `senha`) VALUES
('Jonathan Ãcaro TarÃ´co', '10423978640', 'Santa Cruz de Minas', 'Minas Gerais', 'Vereador JosÃ© Moreira de Aquino', 96, 'jon', 'jon'),
('JoÃ£o Gabriel', '12345678912', 'Morro do Ferro', 'Minas Gerais', 'PraÃ§a Coronel JosÃ© Machado', 108, 'jo', 'jo');
--
-- Estrutura da tabela `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `id_reserva` int AUTO_INCREMENT NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `estado` varchar(9) NOT NULL,
  `id` int(11) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  PRIMARY KEY (`id_reserva`),
  FOREIGN KEY (`cpf`) references usuarios(`cpf`),
  FOREIGN KEY (`id`) references quartos(`id`)
)

-- --------------------------------------------------------



--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `quartos`
--
ALTER TABLE `quartos`
  ADD CONSTRAINT `quartos_ibfk_1` FOREIGN KEY (`cnpj`) REFERENCES `hoteis` (`cnpj`);

--
-- Limitadores para a tabela `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id`) REFERENCES `quartos` (`id`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`cpf`) REFERENCES `usuarios` (`cpf`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
