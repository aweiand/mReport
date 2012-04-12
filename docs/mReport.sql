-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 11/04/2012 às 22h37min
-- Versão do Servidor: 5.1.61
-- Versão do PHP: 5.3.6-13ubuntu3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `mReport`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `moodle_in`
--

CREATE TABLE IF NOT EXISTS `moodle_in` (
  `idmoodle` int(4) NOT NULL AUTO_INCREMENT,
  `descmoodle` int(255) NOT NULL,
  PRIMARY KEY (`idmoodle`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `idusers` int(11) NOT NULL AUTO_INCREMENT COMMENT 'codigo do usuario',
  `name` varchar(45) CHARACTER SET latin1 DEFAULT NULL COMMENT 'nome do usuario',
  `login` varchar(45) CHARACTER SET latin1 DEFAULT NULL COMMENT 'login do usuario',
  `password` varchar(45) CHARACTER SET latin1 DEFAULT NULL COMMENT 'senha do usuario',
  `email` varchar(45) CHARACTER SET latin1 DEFAULT NULL COMMENT 'email do usuario',
  `state` varchar(45) CHARACTER SET latin1 DEFAULT NULL COMMENT 'estado do usuario, A = ativado, D = desativado',
  PRIMARY KEY (`idusers`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`idusers`, `name`, `login`, `password`, `email`, `state`) VALUES
(1, 'Augusto Weiand', 'guto', 'guto', 'guto.weiand@gmail.com', 'A');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
