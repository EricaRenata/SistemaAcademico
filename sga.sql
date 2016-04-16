-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16-Abr-2016 às 15:28
-- Versão do servidor: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sga`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadaluno`
--

CREATE TABLE IF NOT EXISTS `cadaluno` (
`cd_aluno` bigint(45) NOT NULL,
  `razao_social` varchar(125) NOT NULL,
  `matricula` bigint(45) NOT NULL,
  `cd_curso` bigint(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cadaluno`
--

INSERT INTO `cadaluno` (`cd_aluno`, `razao_social`, `matricula`, `cd_curso`) VALUES
(1, 'Eliseu dos Santos', 123, 1),
(2, 'Erica Renata', 123, 23),
(3, 'Jose da Silva', 23424, 1),
(4, 'Maria Santos Gomes', 23424, 1),
(5, 'Renata Santos Gomes', 23424, 1),
(6, 'Gomes Jose', 1234567, 4),
(7, 'Gomes Santos Silva', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_notas`
--

CREATE TABLE IF NOT EXISTS `cad_notas` (
  `cd_aluno` int(50) NOT NULL,
  `nota1` float NOT NULL,
  `nota2` float DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `cd_turma` bigint(50) NOT NULL,
`cd_nota` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cad_notas`
--

INSERT INTO `cad_notas` (`cd_aluno`, `nota1`, `nota2`, `status`, `cd_turma`, `cd_nota`) VALUES
(4, 3, 5, 1, 0, 6),
(1, 5, 2, 1, 0, 7),
(2, 3, 2, 0, 0, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_turma`
--

CREATE TABLE IF NOT EXISTS `cad_turma` (
`cod` int(20) NOT NULL,
  `descricao` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12345679 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cad_turma`
--

INSERT INTO `cad_turma` (`cod`, `descricao`) VALUES
(12345678, 'qwertyuiokmgfdsdfghj');

-- --------------------------------------------------------

--
-- Estrutura da tabela `frequencia`
--

CREATE TABLE IF NOT EXISTS `frequencia` (
`cd_frequencia` bigint(20) NOT NULL,
  `cd_aluno` bigint(20) NOT NULL,
  `presenca` tinyint(1) NOT NULL,
  `data` date NOT NULL,
  `cd_curso` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `tit_noticia` varchar(25) NOT NULL,
  `desc_noticia` varchar(160) NOT NULL,
  `imagem` varchar(50) DEFAULT NULL,
`cd_noticias` bigint(20) NOT NULL,
  `permissao` varchar(1) NOT NULL,
  `posicao` varchar(10) NOT NULL,
  `categoria` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`tit_noticia`, `desc_noticia`, `imagem`, `cd_noticias`, `permissao`, `posicao`, `categoria`) VALUES
('Tammy', ' fwedwefiwebfweb', NULL, 1, '1', '1', '1'),
('sdfgh', ' fghjffgh', NULL, 2, '1', '1', '1'),
('sdfgh', ' fghjffgh', NULL, 3, '1', '1', '1'),
('sdfgh', ' fghjffgh', NULL, 4, '1', '1', '1'),
('Primeira Noticia', 'Descricao de noticia descricao de noticia descricao de noticia Descricao de noticia descricao de noticia descricao de noticia Descricao de noticia descricao de ', NULL, 5, '4', '2', '2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `seg_usuario`
--

CREATE TABLE IF NOT EXISTS `seg_usuario` (
  `login` int(10) NOT NULL,
  `senha` varchar(50) NOT NULL,
`cd_usuario` bigint(20) NOT NULL,
  `dt_sistema` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cd_aluno` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `seg_usuario`
--

INSERT INTO `seg_usuario` (`login`, `senha`, `cd_usuario`, `dt_sistema`, `cd_aluno`) VALUES
(3456, '123456', 1, '2016-03-12 15:22:45', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cadaluno`
--
ALTER TABLE `cadaluno`
 ADD PRIMARY KEY (`cd_aluno`);

--
-- Indexes for table `cad_notas`
--
ALTER TABLE `cad_notas`
 ADD PRIMARY KEY (`cd_nota`);

--
-- Indexes for table `cad_turma`
--
ALTER TABLE `cad_turma`
 ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `frequencia`
--
ALTER TABLE `frequencia`
 ADD PRIMARY KEY (`cd_frequencia`);

--
-- Indexes for table `noticias`
--
ALTER TABLE `noticias`
 ADD PRIMARY KEY (`cd_noticias`);

--
-- Indexes for table `seg_usuario`
--
ALTER TABLE `seg_usuario`
 ADD PRIMARY KEY (`cd_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cadaluno`
--
ALTER TABLE `cadaluno`
MODIFY `cd_aluno` bigint(45) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `cad_notas`
--
ALTER TABLE `cad_notas`
MODIFY `cd_nota` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `cad_turma`
--
ALTER TABLE `cad_turma`
MODIFY `cod` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12345679;
--
-- AUTO_INCREMENT for table `frequencia`
--
ALTER TABLE `frequencia`
MODIFY `cd_frequencia` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
MODIFY `cd_noticias` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `seg_usuario`
--
ALTER TABLE `seg_usuario`
MODIFY `cd_usuario` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
