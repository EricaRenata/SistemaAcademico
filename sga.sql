-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02-Maio-2016 às 11:51
-- Versão do servidor: 5.6.26
-- PHP Version: 5.5.28

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
-- Estrutura da tabela `arquivos`
--

CREATE TABLE IF NOT EXISTS `arquivos` (
  `cd_arquivo` int(11) NOT NULL,
  `nome` varchar(520) NOT NULL,
  `cd_usuario` bigint(20) NOT NULL,
  `dt_sistema` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cd_curso` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `arquivos`
--

INSERT INTO `arquivos` (`cd_arquivo`, `nome`, `cd_usuario`, `dt_sistema`, `cd_curso`) VALUES
(13, 'O Que Aconteceu Com Emma - Elizabeth Flock.pdf', 1, '2016-04-21 19:38:10', 1),
(14, 'O Que Aconteceu Com Emma - Elizabeth Flock.pdf', 1, '2016-04-21 19:38:37', 3),
(15, '20160330_150332.jpg', 1, '2016-04-21 20:33:13', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadaluno`
--

CREATE TABLE IF NOT EXISTS `cadaluno` (
  `cd_aluno` bigint(45) NOT NULL,
  `razao_social` varchar(125) NOT NULL,
  `matricula` varchar(45) NOT NULL,
  `cd_turma` bigint(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cadaluno`
--

INSERT INTO `cadaluno` (`cd_aluno`, `razao_social`, `matricula`, `cd_turma`) VALUES
(1, 'Eliseu dos Santos', '123', 35466),
(34, 'Erick Santos', '789', 35466),
(35, 'Silva Santos', '456', 35466),
(36, 'Erinaldo', '2535', 35466),
(37, 'JosÃ© Gomes', '6574', 35466),
(38, 'zzz', '76668678', 43365),
(39, 'zeuzeu', '9999', 43365),
(40, 'hjkuyui', '890', 43365),
(41, 'hjkuyui', '890', 43365),
(42, 'hjkuyui', '890', 43365),
(43, 'hjkuyui', '890', 43365),
(44, 'hjkuyui', '890', 43365),
(45, 'hjkuyui', '890', 43365),
(46, 'hjkuyui', '890', 43365),
(47, 'hjkuyui', '890', 43365),
(48, 'hjkuyui', '4', 43365),
(50, 'eliseu', 'b587d8', 43365);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_admin`
--

CREATE TABLE IF NOT EXISTS `cad_admin` (
  `cd_admin` bigint(20) NOT NULL,
  `razao_social` varchar(180) NOT NULL,
  `cd_usuario` bigint(20) NOT NULL,
  `login` varchar(80) NOT NULL,
  `senha` bigint(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cad_admin`
--

INSERT INTO `cad_admin` (`cd_admin`, `razao_social`, `cd_usuario`, `login`, `senha`) VALUES
(1, 'Eduardo', 32, 'administrador', 123456);

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
  `nome_disciplina` varchar(300) NOT NULL,
  `desc_disciplina` text NOT NULL,
  `cd_disciplina` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cad_disciplina`
--

INSERT INTO `cad_disciplina` (`cd_curso`, `nome_disciplina`, `desc_disciplina`, `cd_disciplina`) VALUES
(1, 'Programacao 1', 'Descricao do curso', 1),
(1, 'eliseu', 'lul ', 2),
(1, '878', ' ', 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

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
('00:00:00', 'hbvhv', 1, 17, '2016-04-07', '2016-01-01', '00:00:00'),
('14:00:00', '', 1, 18, '2016-04-01', '2016-06-15', '14:00:00'),
('14:00:00', '', 1, 19, '2016-04-05', '2016-04-30', '18:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_modulo`
--

CREATE TABLE IF NOT EXISTS `cad_modulo` (
  `cd_modulo` bigint(20) NOT NULL,
  `nome_modulo` varchar(180) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cad_modulo`
--

INSERT INTO `cad_modulo` (`cd_modulo`, `nome_modulo`) VALUES
(1, 'Administrador'),
(2, 'Professor'),
(3, 'Aluno');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cad_notas`
--

INSERT INTO `cad_notas` (`cd_aluno`, `nota1`, `nota2`, `status`, `cd_turma`, `cd_nota`) VALUES
(4, 3, 5, 1, 12345, 6),
(1, 5, 2, 0, 12345, 7),
(2, 3, 2, 0, 12345, 8),
(14, 8, 8, 1, 12345, 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_prof`
--

CREATE TABLE IF NOT EXISTS `cad_prof` (
  `cd_prof` bigint(20) NOT NULL,
  `cd_usuario` bigint(20) NOT NULL,
  `razao_social` varchar(190) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cad_prof`
--

INSERT INTO `cad_prof` (`cd_prof`, `cd_usuario`, `razao_social`) VALUES
(1, 5, 'Erica Renata');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_submodulo`
--

CREATE TABLE IF NOT EXISTS `cad_submodulo` (
  `cd_submodulo` bigint(20) NOT NULL,
  `nome_submodulo` varchar(180) NOT NULL,
  `fonte` varchar(450) NOT NULL,
  `permissao` varchar(11) NOT NULL,
  `icone` varchar(180) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cad_submodulo`
--

INSERT INTO `cad_submodulo` (`cd_submodulo`, `nome_submodulo`, `fonte`, `permissao`, `icone`) VALUES
(1, 'Adiciona Horario', 'addHorario.php', '1', 'glyphicon-calendar'),
(2, 'Adiciona Turma', 'addTurma.php', '1', 'glyphicon-education'),
(3, 'Adiciona Notícia', 'addNoticias.php', '1', 'glyphicon-globe'),
(4, 'Adiciona Aluno', 'addAluno.php', '1', 'glyphicon-user'),
(5, 'Adiciona Submodulo', '', '1', 'glyphicon-cog'),
(6, 'Adiciona Disciplina ', 'addDisciplina.php', '1,2', 'glyphicon-qrcode'),
(7, 'Add Material', 'addArquivo.php', '2', 'glyphicon glyphicon-folder-open'),
(8, 'Adiciona Frequencia', 'addfrequencia.php', '2', 'glyphicon-list-alt'),
(9, 'Ver Frequencia', 'verFrequencia.php', '1,2,3', 'glyphicon glyphicon-list-alt'),
(10, 'Ver Horário', 'verHorario.php', '2,3', 'glyphicon glyphicon-calendar'),
(11, 'Ver Notas', 'verNotas.php', '2,3', 'glyphicon glyphicon-th'),
(12, 'Ver Disciplina', 'verDisciplina.php', '2,3', 'glyphicon glyphicon-tasks'),
(13, 'Mensagens', 'mensagens.php', '1,2,3', 'glyphicon glyphicon-envelope');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_turma`
--

CREATE TABLE IF NOT EXISTS `cad_turma` (
  `id` bigint(20) NOT NULL,
  `cd_curso` bigint(20) NOT NULL,
  `turno` varchar(40) NOT NULL,
  `cd_turma` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12345681 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cad_turma`
--

INSERT INTO `cad_turma` (`id`, `cd_curso`, `turno`, `cd_turma`) VALUES
(12345679, 1, 'manha', 43365),
(12345680, 1, 'manha', 35466);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `frequencia`
--

INSERT INTO `frequencia` (`cd_frequencia`, `cd_aluno`, `presenca`, `data`, `cd_curso`) VALUES
(1, 1, 1, '2016-05-02', 1),
(2, 34, 0, '2016-05-02', 1),
(3, 35, 0, '2016-05-02', 1),
(4, 36, 0, '2016-05-02', 1),
(5, 37, 0, '2016-05-02', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE IF NOT EXISTS `mensagens` (
  `cd_mensagem` bigint(20) NOT NULL,
  `cd_de` varchar(180) NOT NULL,
  `cd_para` varchar(180) NOT NULL,
  `assunto` text NOT NULL,
  `desc_mensagm` text NOT NULL,
  `dt_env` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dt_receb` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `categoria` varchar(20) NOT NULL,
  `foto` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`tit_noticia`, `desc_noticia`, `imagem`, `cd_noticias`, `permissao`, `posicao`, `categoria`, `foto`) VALUES
('InscriÃ§Ãµes Abertas', 'As inscriÃ§Ãµes para cursos tÃ©cnicos iniciam dia 22/04/2016', NULL, 6, '1', '1', '1', ''),
('Pronatec', 'Encontra-se disponÃ­vel o edital do Pronatec.', NULL, 7, '1', '3', '2', ''),
('OlimpÃ­ada ', 'Entre no site do SENAI e tenha acesso a cobertura da OlimpÃ­ada do Conhecimento.', NULL, 8, '1', '1', '3', ''),
('Te Amo Renata', ' Tudo funcionou corretamente. ', NULL, 9, '3', '1', '1', 'amor.jpg'),
('Erica', ' testando!', NULL, 10, '4', '3', '2', '20151004_221820.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacoes`
--

CREATE TABLE IF NOT EXISTS `notificacoes` (
  `cd_notificacao` bigint(20) NOT NULL,
  `cd_usuario` bigint(20) NOT NULL,
  `tp_notificacao` varchar(80) NOT NULL,
  `desc_notificacao` text NOT NULL,
  `dt_sistema` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `notificacoes`
--

INSERT INTO `notificacoes` (`cd_notificacao`, `cd_usuario`, `tp_notificacao`, `desc_notificacao`, `dt_sistema`) VALUES
(13, 3, 'Turma', 'Turma Assistente Administrativo adicionado por 9090', '2016-04-21 17:15:30'),
(14, 3, 'Turma', 'Turma Informatica adicionado por ', '2016-04-21 17:34:20'),
(15, 3, 'Alunos', 'Aluno Erinaldo adicionado por ', '2016-04-21 17:36:32'),
(16, 3, 'Turma', 'Turma Informatica adicionado por ', '2016-04-21 17:37:02'),
(17, 3, 'Alunos', 'Aluno JosÃ© Gomes adicionado por 9090', '2016-04-21 17:58:52'),
(18, 3, 'Turma', 'Turma Design adicionado por ', '2016-04-21 17:59:20'),
(19, 3, 'Turma', 'Turma Design adicionado por ', '2016-04-21 19:55:51'),
(20, 3, 'Turma', 'Turma hjk, adicionado por ', '2016-04-23 18:00:29'),
(21, 3, 'Turma', 'Turma hjk, adicionado por ', '2016-04-23 18:03:30'),
(22, 3, 'Turma', 'Turma hjk, adicionado por ', '2016-04-23 18:03:42'),
(23, 3, 'Turma', 'Turma hjk, adicionado por ', '2016-04-23 18:04:17'),
(24, 3, 'Turma', 'Turma  adicionado por ', '2016-04-23 18:04:52'),
(25, 3, 'Turma', 'Turma 3434 adicionado por ', '2016-04-23 18:09:33'),
(26, 3, 'Turma', 'Turma 23 adicionado por ', '2016-04-23 18:10:50'),
(27, 3, 'Turma', 'Turma  adicionado por ', '2016-04-23 18:27:24'),
(28, 3, 'Turma', 'Turma  adicionado por ', '2016-04-23 18:32:38'),
(29, 3, 'Turma', 'Turma  adicionado por ', '2016-04-23 18:40:56'),
(30, 3, 'Turma', 'Turma  adicionado por ', '2016-04-23 18:41:24'),
(31, 3, 'Turma', 'Turma  adicionado por ', '2016-04-23 18:41:32'),
(32, 3, 'Turma', 'Turma  adicionado por ', '2016-04-23 18:42:11'),
(33, 3, 'Turma', 'Turma  adicionado por ', '2016-04-23 18:42:24'),
(34, 3, 'Turma', 'Turma Banco de Dados adicionado por ', '2016-04-23 18:43:20'),
(35, 3, 'Alunos', 'Aluno zzz adicionado por ', '2016-04-23 18:56:19'),
(36, 32, 'Alunos', 'Aluno zeuzeu adicionado por Eduardo', '2016-05-01 08:25:46'),
(37, 32, 'Alunos', 'Aluno hjkuyui adicionado por Eduardo', '2016-05-01 08:45:24'),
(38, 32, 'Alunos', 'Aluno hjkuyui adicionado por Eduardo', '2016-05-01 08:49:52'),
(39, 32, 'Alunos', 'Aluno hjkuyui adicionado por Eduardo', '2016-05-01 08:51:04'),
(40, 32, 'Alunos', 'Aluno hjkuyui adicionado por Eduardo', '2016-05-01 08:51:08'),
(41, 32, 'Alunos', 'Aluno hjkuyui adicionado por Eduardo', '2016-05-01 08:51:53'),
(42, 32, 'Alunos', 'Aluno hjkuyui adicionado por Eduardo', '2016-05-01 08:51:56'),
(43, 32, 'Alunos', 'Aluno hjkuyui adicionado por Eduardo', '2016-05-01 08:52:01'),
(44, 32, 'Alunos', 'Aluno hjkuyui adicionado por Eduardo', '2016-05-01 08:52:20'),
(45, 32, 'Alunos', 'Aluno hjkuyui adicionado por Eduardo', '2016-05-01 08:53:06'),
(46, 32, 'Alunos', 'Aluno eliseu adicionado por Eduardo', '2016-05-01 08:54:25'),
(47, 32, 'Alunos', 'Aluno eliseu adicionado por Eduardo', '2016-05-01 09:00:44');

-- --------------------------------------------------------

--
-- Estrutura da tabela `seg_usuario`
--

CREATE TABLE IF NOT EXISTS `seg_usuario` (
  `login` varchar(80) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `cd_usuario` bigint(20) NOT NULL,
  `dt_sistema` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cd_aluno` bigint(20) NOT NULL,
  `cd_prof` bigint(1) NOT NULL,
  `foto` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `seg_usuario`
--

INSERT INTO `seg_usuario` (`login`, `senha`, `cd_usuario`, `dt_sistema`, `cd_aluno`, `cd_prof`, `foto`) VALUES
('3456', '123456', 1, '2016-03-12 15:22:45', 1, 0, ''),
('7897897', '789798', 2, '2016-04-16 15:56:52', 31, 0, ''),
('2147483647', '6786876876', 4, '2016-04-16 15:59:14', 33, 0, ''),
('123456', '123456', 5, '2016-04-17 19:48:13', 0, 1, ''),
('eliseu', '123456', 21, '2016-05-01 08:54:25', 49, 0, ''),
('eliseu', '123456', 22, '2016-05-01 09:00:44', 50, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arquivos`
--
ALTER TABLE `arquivos`
  ADD PRIMARY KEY (`cd_arquivo`);

--
-- Indexes for table `cadaluno`
--
ALTER TABLE `cadaluno`
  ADD PRIMARY KEY (`cd_aluno`);

--
-- Indexes for table `cad_admin`
--
ALTER TABLE `cad_admin`
  ADD PRIMARY KEY (`cd_admin`);

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
-- Indexes for table `cad_prof`
--
ALTER TABLE `cad_prof`
  ADD PRIMARY KEY (`cd_prof`);

--
-- Indexes for table `cad_submodulo`
--
ALTER TABLE `cad_submodulo`
  ADD PRIMARY KEY (`cd_submodulo`);

--
-- Indexes for table `cad_turma`
--
ALTER TABLE `cad_turma`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frequencia`
--
ALTER TABLE `frequencia`
  ADD PRIMARY KEY (`cd_frequencia`);

--
-- Indexes for table `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`cd_mensagem`);

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
-- AUTO_INCREMENT for table `arquivos`
--
ALTER TABLE `arquivos`
  MODIFY `cd_arquivo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `cadaluno`
--
ALTER TABLE `cadaluno`
  MODIFY `cd_aluno` bigint(45) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `cad_admin`
--
ALTER TABLE `cad_admin`
  MODIFY `cd_admin` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cad_curso`
--
ALTER TABLE `cad_curso`
  MODIFY `cd_curso` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cad_disciplina`
--
ALTER TABLE `cad_disciplina`
  MODIFY `cd_disciplina` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cad_horario`
--
ALTER TABLE `cad_horario`
  MODIFY `cd_horario` bigint(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `cad_modulo`
--
ALTER TABLE `cad_modulo`
  MODIFY `cd_modulo` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cad_notas`
--
ALTER TABLE `cad_notas`
  MODIFY `cd_nota` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `cad_prof`
--
ALTER TABLE `cad_prof`
  MODIFY `cd_prof` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cad_submodulo`
--
ALTER TABLE `cad_submodulo`
  MODIFY `cd_submodulo` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `cad_turma`
--
ALTER TABLE `cad_turma`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12345681;
--
-- AUTO_INCREMENT for table `frequencia`
--
ALTER TABLE `frequencia`
  MODIFY `cd_frequencia` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `cd_mensagem` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `cd_noticias` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `notificacoes`
--
ALTER TABLE `notificacoes`
  MODIFY `cd_notificacao` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `seg_usuario`
--
ALTER TABLE `seg_usuario`
  MODIFY `cd_usuario` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
