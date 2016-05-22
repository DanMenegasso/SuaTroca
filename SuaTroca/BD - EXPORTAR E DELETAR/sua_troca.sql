-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22-Maio-2016 às 23:16
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sua_troca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `mercadoria`
--

CREATE TABLE IF NOT EXISTS `mercadoria` (
  `idMercadoria` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(45) NOT NULL,
  `Qtde` int(11) NOT NULL,
  `Preco` decimal(8,2) NOT NULL,
  `Descricao` text NOT NULL,
  `idTipoMercadoria` int(11) NOT NULL,
  `idTipoNegocio` int(11) NOT NULL,
  PRIMARY KEY (`idMercadoria`),
  KEY `fk_Mercadoria_TipoMercadoria_idx` (`idTipoMercadoria`),
  KEY `fk_Mercadoria_TipoNegocio1_idx` (`idTipoNegocio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Extraindo dados da tabela `mercadoria`
--

INSERT INTO `mercadoria` (`idMercadoria`, `Nome`, `Qtde`, `Preco`, `Descricao`, `idTipoMercadoria`, `idTipoNegocio`) VALUES
(10, 'Matheus', 52, '6589.00', 'GAY', 3, 1),
(11, 'TESTE', 8, '548.00', 'TESTE', 2, 0),
(12, 'Daniel', 1, '9999.00', 'menino pseudo gay', 2, 1),
(13, 'teste', 343, '12323.00', 'TESTE', 13, 1),
(14, 'teste', 343, '12323.00', 'TESTE', 13, 1),
(15, 'teste', 343, '12323.00', 'TESTE', 13, 1),
(16, 'teste', 343, '12323.00', 'TESTE', 13, 1),
(17, 'teste', 343, '12323.00', 'TESTE', 13, 1),
(18, 'teste', 343, '12323.00', 'TESTE', 13, 1),
(19, 'teste', 343, '12323.00', 'TESTE', 13, 1),
(20, 'daniel', 1, '999999.99', 'GAY', 14, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipomercadoria`
--

CREATE TABLE IF NOT EXISTS `tipomercadoria` (
  `idTipoMercadoria` int(11) NOT NULL,
  `Descricao` varchar(45) NOT NULL,
  PRIMARY KEY (`idTipoMercadoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipomercadoria`
--

INSERT INTO `tipomercadoria` (`idTipoMercadoria`, `Descricao`) VALUES
(0, 'Carro'),
(1, 'Casa'),
(2, 'Eletronicos'),
(3, 'Eletrodomesticos'),
(4, 'Acessorios'),
(5, 'Alimenticio'),
(6, 'Esoterismo e Ocultismo'),
(7, 'Ingressos/Convites'),
(8, 'Material Escolar'),
(9, 'Colecionaveis'),
(10, 'Antiguidades'),
(11, 'Arte e Artesanato'),
(12, 'Brinquedos'),
(13, 'Decoracao'),
(14, 'Esportes'),
(15, 'Series e Filmes'),
(16, 'games'),
(17, 'Informatica'),
(18, 'Livros'),
(19, 'Musica'),
(20, 'Saude e Beleza'),
(21, 'Outros');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tiponegocio`
--

CREATE TABLE IF NOT EXISTS `tiponegocio` (
  `idTipoNegocio` int(11) NOT NULL,
  `Descricao` varchar(45) NOT NULL,
  PRIMARY KEY (`idTipoNegocio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tiponegocio`
--

INSERT INTO `tiponegocio` (`idTipoNegocio`, `Descricao`) VALUES
(0, 'Compra'),
(1, 'Venda');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `nome` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `idUser` int(5) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `mercadoria`
--
ALTER TABLE `mercadoria`
  ADD CONSTRAINT `fk_Mercadoria_TipoMercadoria` FOREIGN KEY (`idTipoMercadoria`) REFERENCES `tipomercadoria` (`idTipoMercadoria`),
  ADD CONSTRAINT `fk_Mercadoria_TipoNegocio1` FOREIGN KEY (`idTipoNegocio`) REFERENCES `tiponegocio` (`idTipoNegocio`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
