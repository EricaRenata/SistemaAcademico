-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09-Abr-2016 às 20:56
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sga`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadaluno`
--

CREATE TABLE `cadaluno` (
  `cd_aluno` bigint(45) NOT NULL,
  `razao_social` varchar(125) NOT NULL,
  `matricula` bigint(45) NOT NULL,
  `cd_curso` bigint(45) NOT NULL,
  `usuario` char(45) NOT NULL,
  `senha` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cadaluno`
--

INSERT INTO `cadaluno` (`cd_aluno`, `razao_social`, `matricula`, `cd_curso`, `usuario`, `senha`) VALUES
(1, 'Eliseu dos Santos', 123, 1, '1', '123456'),
(2, 'Erica Renata', 123, 23, 'erica', '123456'),
(3, 'Jose da Silva', 23424, 1, '3434', '34'),
(4, 'Maria Santos Gomes', 23424, 1, '3434', '34'),
(5, 'Renata Santos Gomes', 23424, 1, '3434', '34'),
(6, 'Gomes Jose', 1234567, 4, '123456789', '123456789'),
(7, 'Gomes Santos Silva', 0, 0, '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_curso`
--

CREATE TABLE `cad_curso` (
  `cd_curso` bigint(20) NOT NULL,
  `desc_curso` text NOT NULL,
  `periodo_inicial` date NOT NULL,
  `cd_prof` bigint(20) NOT NULL,
  `periodo_final` date NOT NULL,
  `nome_curso` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cad_curso`
--

INSERT INTO `cad_curso` (`cd_curso`, `desc_curso`, `periodo_inicial`, `cd_prof`, `periodo_final`, `nome_curso`) VALUES
(1, 'dgdfhgj', '2016-04-18', 1, '2016-05-31', 'administrador de redes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_horario`
--

CREATE TABLE `cad_horario` (
  `horario` time NOT NULL,
  `componente` varchar(200) NOT NULL,
  `cd_curso` bigint(10) NOT NULL,
  `cd_horario` bigint(10) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cad_horario`
--

INSERT INTO `cad_horario` (`horario`, `componente`, `cd_curso`, `cd_horario`, `data`) VALUES
('02:02:00', 'Programador Web', 0, 5, '2016-04-08'),
('02:01:00', 'Programador Web', 1, 6, '2016-04-14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_notas`
--

CREATE TABLE `cad_notas` (
  `cd_aluno` int(50) NOT NULL,
  `nota1` float NOT NULL,
  `nota2` float DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `cd_turma` bigint(50) NOT NULL,
  `cd_nota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `cad_turma` (
  `cod` int(20) NOT NULL,
  `descricao` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cad_turma`
--

INSERT INTO `cad_turma` (`cod`, `descricao`) VALUES
(12345678, 'qwertyuiokmgfdsdfghj');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lista_diciplina`
--

CREATE TABLE `lista_diciplina` (
  `cd_curso` bigint(20) NOT NULL,
  `nome_disciplina` text NOT NULL,
  `desc_disciplina` varchar(300) NOT NULL,
  `cd_disciplina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE `noticias` (
  `tit_noticia` varchar(25) NOT NULL,
  `desc_noticia` varchar(160) NOT NULL,
  `imagem` varchar(50) DEFAULT NULL,
  `cd_noticias` bigint(20) NOT NULL,
  `permissao` varchar(1) NOT NULL,
  `posicao` varchar(10) NOT NULL,
  `categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `seg_usuario` (
  `login` int(10) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `cd_usuario` bigint(20) NOT NULL,
  `dt_sistema` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `seg_usuario`
--

INSERT INTO `seg_usuario` (`login`, `senha`, `cd_usuario`, `dt_sistema`) VALUES
(3456, '123456', 1, '2016-03-12 15:22:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cadaluno`
--
ALTER TABLE `cadaluno`
  ADD PRIMARY KEY (`cd_aluno`);

--
-- Indexes for table `cad_curso`
--
ALTER TABLE `cad_curso`
  ADD PRIMARY KEY (`cd_curso`);

--
-- Indexes for table `cad_horario`
--
ALTER TABLE `cad_horario`
  ADD PRIMARY KEY (`cd_horario`);

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
-- Indexes for table `lista_diciplina`
--
ALTER TABLE `lista_diciplina`
  ADD PRIMARY KEY (`cd_disciplina`);

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
  MODIFY `cd_aluno` bigint(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `cad_curso`
--
ALTER TABLE `cad_curso`
  MODIFY `cd_curso` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cad_horario`
--
ALTER TABLE `cad_horario`
  MODIFY `cd_horario` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cad_notas`
--
ALTER TABLE `cad_notas`
  MODIFY `cd_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `cad_turma`
--
ALTER TABLE `cad_turma`
  MODIFY `cod` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12345679;
--
-- AUTO_INCREMENT for table `lista_diciplina`
--
ALTER TABLE `lista_diciplina`
  MODIFY `cd_disciplina` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `cd_noticias` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `seg_usuario`
--
ALTER TABLE `seg_usuario`
  MODIFY `cd_usuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
