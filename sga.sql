-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16-Abr-2016 às 23:05
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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `cad_curso` (
`cd_curso` bigint(20) NOT NULL,
  `desc_curso` text NOT NULL,
  `periodo_inicial` date NOT NULL,
  `cd_prof` bigint(20) NOT NULL,
  `periodo_final` date NOT NULL,
  `nome_curso` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cad_curso`
--

INSERT INTO `cad_curso` (`cd_curso`, `desc_curso`, `periodo_inicial`, `cd_prof`, `periodo_final`, `nome_curso`) VALUES
(1, 'Banco de Dados', '0000-00-00', 0, '0000-00-00', 'Banco de Dados'),
(3, 'Administracao', '0000-00-00', 0, '0000-00-00', 'Administracao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_disciplina`
--

CREATE TABLE IF NOT EXISTS `cad_disciplina` (
  `cd_curso` bigint(20) NOT NULL,
  `nome_disciplina` text NOT NULL,
  `desc_disciplina` varchar(300) NOT NULL,
`cd_disciplina` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cad_disciplina`
--

INSERT INTO `cad_disciplina` (`cd_curso`, `nome_disciplina`, `desc_disciplina`, `cd_disciplina`) VALUES
(1, 'Programacao 1', 'Desc', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_horario`
--

CREATE TABLE IF NOT EXISTS `cad_horario` (
  `horario_inicial` time NOT NULL,
  `observacao` varchar(200) NOT NULL,
  `cd_curso` bigint(10) NOT NULL,
`cd_horario` bigint(10) NOT NULL,
  `data_inicial` date NOT NULL,
  `data_final` date NOT NULL,
  `horario_final` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cad_horario`
--

INSERT INTO `cad_horario` (`horario_inicial`, `observacao`, `cd_curso`, `cd_horario`, `data_inicial`, `data_final`, `horario_final`) VALUES
('02:03:00', 'rererer', 1, 7, '2016-04-08', '0000-00-00', '00:00:00'),
('00:00:00', '', 1, 8, '0000-00-00', '0000-00-00', '00:00:00'),
('00:00:00', '', 1, 9, '0000-00-00', '0000-00-00', '00:00:00'),
('04:05:00', 'egerge', 1, 10, '2016-04-08', '2016-04-14', '00:00:00'),
('03:03:00', '546546565566565', 1, 11, '2016-04-01', '2016-05-12', '00:00:00'),
('02:00:00', 'wrrwrwrwrwr', 1, 12, '2016-04-06', '2016-04-07', '06:00:00'),
('02:01:00', 'fefef', 1, 13, '2016-04-14', '2019-01-08', '04:03:00'),
('02:01:00', 'fefef', 1, 14, '2016-04-14', '2019-01-08', '04:03:00'),
('00:00:00', 'hbvhv', 1, 15, '2016-04-07', '2016-01-01', '00:00:00'),
('00:00:00', 'hbvhv', 1, 16, '2016-04-07', '2016-01-01', '00:00:00'),
('00:00:00', 'hbvhv', 1, 17, '2016-04-07', '2016-01-01', '00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_modulo`
--

CREATE TABLE IF NOT EXISTS `cad_modulo` (
`cd_modulo` bigint(20) NOT NULL,
  `nome_modulo` varchar(180) NOT NULL,
  `permissao` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cad_modulo`
--

INSERT INTO `cad_modulo` (`cd_modulo`, `nome_modulo`, `permissao`) VALUES
(1, 'Administrador', 1),
(2, 'Professor', 2),
(3, 'Aluno', 3);

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
-- Estrutura da tabela `cad_submodulo`
--

CREATE TABLE IF NOT EXISTS `cad_submodulo` (
`cd_submodulo` bigint(20) NOT NULL,
  `cd_modulo` bigint(20) NOT NULL,
  `nome_submodulo` varchar(180) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(12345, 'Construcao Civil'),
(1212121, 'ProgramaÃ§Ã£o'),
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
-- Estrutura da tabela `notificacoes`
--

CREATE TABLE IF NOT EXISTS `notificacoes` (
`cd_notificacao` bigint(20) NOT NULL,
  `cd_usuario` bigint(20) NOT NULL,
  `tp_notificacao` varchar(80) NOT NULL,
  `desc_notificacao` text NOT NULL,
  `dt_sistema` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

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
(8, 1, 'Turma', 'Turma ProgramaÃ§Ã£o adicionado por Eliseu dos Santos', '0000-00-00'),
(9, 1, 'Turma', 'Turma Construcao Civil adicionado por Eliseu dos Santos', '0000-00-00');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
-- Indexes for table `cad_disciplina`
--
ALTER TABLE `cad_disciplina`
 ADD PRIMARY KEY (`cd_disciplina`);

--
-- Indexes for table `cad_horario`
--
ALTER TABLE `cad_horario`
 ADD PRIMARY KEY (`cd_horario`);

--
-- Indexes for table `cad_modulo`
--
ALTER TABLE `cad_modulo`
 ADD PRIMARY KEY (`cd_modulo`);

--
-- Indexes for table `cad_notas`
--
ALTER TABLE `cad_notas`
 ADD PRIMARY KEY (`cd_nota`);

--
-- Indexes for table `cad_submodulo`
--
ALTER TABLE `cad_submodulo`
 ADD PRIMARY KEY (`cd_submodulo`);

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
MODIFY `cd_aluno` bigint(45) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `cad_curso`
--
ALTER TABLE `cad_curso`
MODIFY `cd_curso` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cad_disciplina`
--
ALTER TABLE `cad_disciplina`
MODIFY `cd_disciplina` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cad_horario`
--
ALTER TABLE `cad_horario`
MODIFY `cd_horario` bigint(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `cad_modulo`
--
ALTER TABLE `cad_modulo`
MODIFY `cd_modulo` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cad_notas`
--
ALTER TABLE `cad_notas`
MODIFY `cd_nota` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `cad_submodulo`
--
ALTER TABLE `cad_submodulo`
MODIFY `cd_submodulo` bigint(20) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT for table `notificacoes`
--
ALTER TABLE `notificacoes`
MODIFY `cd_notificacao` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `seg_usuario`
--
ALTER TABLE `seg_usuario`
MODIFY `cd_usuario` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
