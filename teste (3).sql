-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Nov-2017 às 18:32
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teste`
--
CREATE DATABASE IF NOT EXISTS `teste` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `teste`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE `administrador` (
  `idLogin` int(4) NOT NULL,
  `idAdm` int(4) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `tipo` int(1) NOT NULL,
  `idStatus` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`idLogin`, `idAdm`, `nome`, `tipo`, `idStatus`) VALUES
(1, 1, 'Samuel', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendente`
--

DROP TABLE IF EXISTS `atendente`;
CREATE TABLE `atendente` (
  `idAtendente` int(11) NOT NULL,
  `idLogin` int(11) NOT NULL,
  `idServ` varchar(100) DEFAULT NULL,
  `idStatus` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `atendente`
--

INSERT INTO `atendente` (`idAtendente`, `idLogin`, `idServ`, `idStatus`, `nome`) VALUES
(1, 2, '1,2,5,8,12', 1, 'Amanda'),
(13, 14, '1,2,3,4,8,11', 1, 'sam'),
(10, 10, '1,2,3,4,11,12', 1, 'lucia'),
(12, 12, '1,2,3,9,12', 1, 'sueli'),
(11, 12, '1', 1, 'sueli');

-- --------------------------------------------------------

--
-- Estrutura da tabela `calendario`
--

DROP TABLE IF EXISTS `calendario`;
CREATE TABLE `calendario` (
  `ano` int(2) NOT NULL,
  `mes` int(2) NOT NULL,
  `dia` int(2) NOT NULL,
  `idAtendente` int(11) NOT NULL,
  `idServ` int(11) NOT NULL,
  `idStatus` int(11) NOT NULL,
  `idLogin` int(11) NOT NULL,
  `idAgendamento` int(11) NOT NULL,
  `horario` int(4) NOT NULL,
  `TE` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE `comentarios` (
  `idComent` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefone` int(15) DEFAULT NULL,
  `comentario` varchar(500) NOT NULL,
  `idLogin` int(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `comentarios`
--

INSERT INTO `comentarios` (`idComent`, `nome`, `email`, `telefone`, `comentario`, `idLogin`) VALUES
(5, 'Carlos', 'car_melo@yahoo.com', 1122293271, 'Na ultima vez que fui ai, uma dos atendentes me tratou muito mal, espero que na proxima vez ele esteja mais.. amigavel', NULL),
(3, 'Sueli', 'sueli.brito@superig.com.br', 1122293271, 'Adorei o corte', NULL),
(4, 'Rafaela', 'r.holiver@ig.com', 24567508, 'Lugar perfeito!', NULL),
(7, 'Bruna', 'bru_gatinha2007@hotmail.com', 957842376, 'Adorei o atendimento enquanto estava nas sessões de hidratação, super recomendo!!!', NULL),
(8, 'Amanda', 'amanda.goncalves@gmail.com', 1124663129, 'Atendimento muito bom, sai muito satisfeita com o resultado que obtive no meu cabelo.', NULL),
(12, 'JoÃ£o', 'jao@igtest.com', 24697073, 'Seria interessante um "passe" para clientes antigos..', 21),
(39, '0', '0', 0, 'dtrgfdtr', 28),
(40, '0', '0', 0, 'heheh to te vendfo', 21),
(42, '0', '0', 0, 'Teste pra func', 10),
(43, '0', '0', 0, 'eita, agr foi', 10),
(44, 'lucia', 'Hair Stars Studio', 0, 'ai mds', NULL),
(45, '0', '0', 0, 'HUUUUMMMM', 1),
(46, '0', '0', 0, 'e esse ta certo?', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `idLogin` int(4) NOT NULL,
  `userLogin` varchar(30) NOT NULL,
  `userPass` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`idLogin`, `userLogin`, `userPass`) VALUES
(1, 'carlin', 'batata'),
(28, 'gsdftrd', 'batata'),
(27, 'sueli', '210373'),
(21, 'jao', 'tigre'),
(20, 'manda', 'oli'),
(29, 'SUELI', '210373'),
(30, '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `loginadm`
--

DROP TABLE IF EXISTS `loginadm`;
CREATE TABLE `loginadm` (
  `idLogin` int(4) NOT NULL,
  `admLogin` varchar(30) NOT NULL,
  `admPass` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `loginadm`
--

INSERT INTO `loginadm` (`idLogin`, `admLogin`, `admPass`) VALUES
(1, 'samuel', 'dog'),
(2, 'Amanda', '123'),
(3, 'Amanda', '123'),
(4, 'Amanda', '123'),
(5, 'Amanda', '123'),
(6, 'Amanda', '123'),
(7, 'Amanda', '123'),
(8, 'Amanda', '123'),
(9, 'asd', '123'),
(10, 'lucia', '123'),
(11, 'lucia', '123'),
(12, 'sueli', '123'),
(13, 'sueli', '123'),
(14, 'sam', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

DROP TABLE IF EXISTS `servicos`;
CREATE TABLE `servicos` (
  `idServ` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idStatus` int(11) NOT NULL,
  `TE` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`idServ`, `nome`, `idStatus`, `TE`) VALUES
(1, 'Hidratação', 1, 60),
(2, 'Corte Masculino', 1, 15),
(3, 'Corte Feminino', 2, 30),
(4, 'Penteado', 1, 15),
(5, 'vai!', 1, 15),
(6, 'Cachorro Loco Boladão', 2, 75),
(7, 'Reparo', 1, 15),
(8, 'Opaaa', 1, 90),
(9, 'Progressiva', 1, 90),
(10, 'Fone de Ouvido', 1, 60),
(11, 'Ja vi!', 1, 15),
(12, 'Luzes', 1, 90);

-- --------------------------------------------------------

--
-- Estrutura da tabela `superstatus`
--

DROP TABLE IF EXISTS `superstatus`;
CREATE TABLE `superstatus` (
  `idStatus` int(11) NOT NULL,
  `menStatus` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `superstatus`
--

INSERT INTO `superstatus` (`idStatus`, `menStatus`) VALUES
(1, 'ativo'),
(2, 'indisponivel'),
(3, 'desabilitado'),
(5, 'em breve');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idLogin` int(4) NOT NULL,
  `idUser` int(4) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `telefone` int(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idLogin`, `idUser`, `nome`, `endereco`, `telefone`, `email`) VALUES
(1, 1, 'Carlos', 'Av metropole', 1124983049, 'we@transfer.com'),
(20, 6, 'Amanda', 'Rua monte alegre', 23564321, NULL),
(21, 7, 'João', 'Av. Minas Gerais 457', 24697073, 'eutenhoumemail@gmail.com'),
(27, 13, 'sueli oliveira', 'rua taubate, 68', 1124697165, 'sueli.brito@superig.com.br'),
(28, 14, 'Mario José', 'av saeila', 24697045, 'hehe@gmail.com'),
(29, 15, 'Sueli Pereira', 'AV MINAS GERAIS 457', 1124697073, 'sueli.brito@superig.com.br');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idAdm`),
  ADD KEY `idLogin` (`idLogin`),
  ADD KEY `idStatus` (`idStatus`);

--
-- Indexes for table `atendente`
--
ALTER TABLE `atendente`
  ADD PRIMARY KEY (`idAtendente`),
  ADD KEY `idLogin` (`idLogin`),
  ADD KEY `idServ` (`idServ`),
  ADD KEY `idStatus` (`idStatus`);

--
-- Indexes for table `calendario`
--
ALTER TABLE `calendario`
  ADD PRIMARY KEY (`idAgendamento`),
  ADD KEY `idAtendente` (`idAtendente`),
  ADD KEY `idServ` (`idServ`),
  ADD KEY `idStatus` (`idStatus`),
  ADD KEY `idLogin` (`idLogin`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idComent`),
  ADD KEY `idLogin` (`idLogin`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idLogin`);

--
-- Indexes for table `loginadm`
--
ALTER TABLE `loginadm`
  ADD PRIMARY KEY (`idLogin`);

--
-- Indexes for table `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`idServ`),
  ADD KEY `idStatus` (`idStatus`);

--
-- Indexes for table `superstatus`
--
ALTER TABLE `superstatus`
  ADD PRIMARY KEY (`idStatus`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `idLogin` (`idLogin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idAdm` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `atendente`
--
ALTER TABLE `atendente`
  MODIFY `idAtendente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `calendario`
--
ALTER TABLE `calendario`
  MODIFY `idAgendamento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idComent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `idLogin` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `loginadm`
--
ALTER TABLE `loginadm`
  MODIFY `idLogin` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `servicos`
--
ALTER TABLE `servicos`
  MODIFY `idServ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUser` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
