-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Jun-2019 às 14:14
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `conhecimentos`
--

CREATE TABLE `conhecimentos` (
  `id` int(11) NOT NULL,
  `nome_linguagem` varchar(100) DEFAULT NULL,
  `tempo_experiencia` varchar(255) DEFAULT NULL,
  `porcentagem_experiencia` int(11) DEFAULT NULL,
  `pessoa_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `conhecimentos`
--

INSERT INTO `conhecimentos` (`id`, `nome_linguagem`, `tempo_experiencia`, `porcentagem_experiencia`, `pessoa_id`) VALUES
(1, 'PHP', '1 ano', 80, 1),
(2, 'Javascript', '6 meses', 51, 1),
(3, 'Java', '6 meses', 25, 1),
(6, 'CSS', '9 meses', 70, 1),
(7, 'Linguagem C', '6 meses', 40, 1),
(8, 'Python', '6 meses', 70, 1),
(9, 'HTML', '1 ano', 90, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `formacoes`
--

CREATE TABLE `formacoes` (
  `id` int(11) NOT NULL,
  `nome_curso` varchar(100) DEFAULT NULL,
  `local` varchar(100) DEFAULT NULL,
  `ano_inicio` char(4) DEFAULT NULL,
  `ano_fim` char(5) DEFAULT NULL,
  `descricao` text,
  `pessoa_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `formacoes`
--

INSERT INTO `formacoes` (`id`, `nome_curso`, `local`, `ano_inicio`, `ano_fim`, `descricao`, `pessoa_id`) VALUES
(3, 'Análise e Desenvolvimento de Sistemas', 'IFSP - Campus Campos do Jordão', '2016', 'Atual', 'O tecnólogo em Análise e Desenvolvimento de Sistemas analisa, projeta, documenta, especifica, testa, implementa e mantém sistemas computacionais de informação.\r\n\r\nEste profissional trabalha, também, com ferramentas computacionais, equipamentos de informática e metodologia de projetos na produção de sistemas. Raciocínio lógico, emprego de linguagens de programação e de metodologias de construção de projetos, preocupação com a qualidade, usabilidade, robustez, integridade e segurança de programas computacionais são fundamentais à atuação desse profissional.', 1),
(4, 'Ensino Médio', 'EE Presidente Wenceslau', '2003', '2006', '3ª etapa da Educação Básica', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `nascimento` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `interesse` varchar(255) DEFAULT NULL,
  `notas_interesse` varchar(255) DEFAULT NULL,
  `profissao` varchar(255) DEFAULT NULL,
  `perfil` text,
  `fundo_site` varchar(50) DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `linkedin` varchar(50) DEFAULT NULL,
  `instagram` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome`, `foto`, `nascimento`, `email`, `telefone`, `interesse`, `notas_interesse`, `profissao`, `perfil`, `fundo_site`, `facebook`, `linkedin`, `instagram`) VALUES
(1, 'Paulo Ricardo Almeida da Silva', NULL, '01/11/1988', 'contato@pauloricardo.ga', '+55 12 99107-3876', 'Freelancer', 'Tenho interesse em freelancer', 'Desenvolvedor Web', 'Sou graduando em Tecnologia em Análise e Desenvolvimento de Sistemas pelo Instituto Federal de Educação, Ciência e Tecnologia de São Paulo.', 'aaa', 'paulocdjsilva', 'paulo-silva-4471a1171', 'paulocdjsilva');

-- --------------------------------------------------------

--
-- Estrutura da tabela `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `descricao` text,
  `data_inicio` varchar(10) DEFAULT NULL,
  `data_fim` varchar(10) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `pessoa_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `pessoa_id` int(11) DEFAULT NULL,
  `autor` varchar(100) DEFAULT NULL,
  `data_postagem` datetime DEFAULT NULL,
  `conteudo` text,
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `trabalhos`
--

CREATE TABLE `trabalhos` (
  `id` int(11) NOT NULL,
  `nome_profissao` varchar(100) DEFAULT NULL,
  `local` varchar(100) DEFAULT NULL,
  `ano_inicio` char(4) DEFAULT NULL,
  `ano_fim` char(4) DEFAULT NULL,
  `descricao` text,
  `pessoa_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `login` varchar(50) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `pessoa_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `login`, `senha`, `pessoa_id`) VALUES
(1, 'paulo', '$2y$10$pYtR1o0DtmCHbt4MsyYGTOk5tcK3w6CRJlzXI5kULbBwQw8npFFsS', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conhecimentos`
--
ALTER TABLE `conhecimentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formacoes`
--
ALTER TABLE `formacoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trabalhos`
--
ALTER TABLE `trabalhos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conhecimentos`
--
ALTER TABLE `conhecimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `formacoes`
--
ALTER TABLE `formacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trabalhos`
--
ALTER TABLE `trabalhos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
