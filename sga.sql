-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16-Abr-2016 às 18:24
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
  `cd_curso` bigint(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cadaluno`
--

INSERT INTO `cadaluno` (`cd_aluno`, `razao_social`, `matricula`, `cd_curso`) VALUES
(1, 'Eliseu dos Santos', 123, 1),
(14, '4567', 3456, 1),
(15, '5678', 456, 1),
(16, '121212', 1221212, 1),
(17, '121212', 1221212, 1),
(18, '121212', 1221212, 1),
(19, '121212', 1221212, 1),
(20, '121212', 1221212, 1),
(21, '121212', 1221212, 1),
(22, 'Jjjjjjjj', 555555, 1),
(23, '7777', 4567, 1),
(24, '8888', 88888, 1),
(25, '8888', 88888, 1),
(26, '8888', 88888, 1),
(27, '09090909', 90909, 1),
(28, '090909', 909, 1),
(29, '989898', 98989, 1),
(30, '789798', 87879, 1),
(31, '7897897', 87987, 1),
(32, '9090', 99090909, 1),
(33, '6786876876', 2147483647, 1);

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
(1212121, 'ProgramaÃ§Ã£o'),
(12345678, 'qwertyuiokmgfdsdfghj');

-- --------------------------------------------------------

--
-- Estrutura da tabela `frequencia`
--

CREATE TABLE `frequencia` (
  `cd_frequencia` bigint(20) NOT NULL,
  `cd_aluno` bigint(20) NOT NULL,
  `presenca` tinyint(1) NOT NULL,
  `data` date NOT NULL,
  `cd_curso` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Estrutura da tabela `notificacoes`
--

CREATE TABLE `notificacoes` (
  `cd_notificacao` bigint(20) NOT NULL,
  `cd_usuario` bigint(20) NOT NULL,
  `tp_notificacao` varchar(80) NOT NULL,
  `desc_notificacao` text NOT NULL,
  `dt_sistema` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `notificacoes`
--

INSERT INTO `notificacoes` (`cd_notificacao`, `cd_usuario`, `tp_notificacao`, `desc_notificacao`, `dt_sistema`) VALUES
(1, 1, 'Aluno', 'Aluno adicionado', '0000-00-00'),
(2, 1, 'Aluno', 'Aluno adicionado', '0000-00-00'),
(3, 1, 'Aluno', 'Aluno adicionado', '0000-00-00'),
(4, 1, 'Aluno', 'AlunoEliseuadicionado', '0000-00-00'),
(5, 1, 'Aluno', 'Aluno Outro adicionado', '0000-00-00'),
(6, 1, 'Aluno', 'Aluno 9090 adicionado', '0000-00-00'),
(7, 1, 'Aluno', 'Aluno 6786876876 adicionado por Eliseu dos Santos', '0000-00-00'),
(8, 1, 'Turma', 'Turma ProgramaÃ§Ã£o adicionado por Eliseu dos Santos', '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `seg_usuario`
--

CREATE TABLE `seg_usuario` (
  `login` int(10) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `cd_usuario` bigint(20) NOT NULL,
  `dt_sistema` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cd_aluno` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `seg_usuario`
--

INSERT INTO `seg_usuario` (`login`, `senha`, `cd_usuario`, `dt_sistema`, `cd_aluno`) VALUES
(3456, '123456', 1, '2016-03-12 15:22:45', 1),
(7897897, '789798', 2, '2016-04-16 15:56:52', 31),
(9090, '9090', 3, '2016-04-16 15:57:28', 32),
(2147483647, '6786876876', 4, '2016-04-16 15:59:14', 33);

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
-- Indexes for table `frequencia`
--
ALTER TABLE `frequencia`
  ADD PRIMARY KEY (`cd_frequencia`);

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
-- Indexes for table `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD PRIMARY KEY (`cd_notificacao`);

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
  MODIFY `cd_aluno` bigint(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
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
-- AUTO_INCREMENT for table `frequencia`
--
ALTER TABLE `frequencia`
  MODIFY `cd_frequencia` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
-- AUTO_INCREMENT for table `notificacoes`
--
ALTER TABLE `notificacoes`
  MODIFY `cd_notificacao` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `seg_usuario`
--
ALTER TABLE `seg_usuario`
  MODIFY `cd_usuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
