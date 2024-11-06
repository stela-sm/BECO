-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/11/2024 às 00:52
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `beco_backup`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `ID_USER` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `nome` varchar(160) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `celular` varchar(60) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `pais` varchar(100) DEFAULT NULL,
  `pfp` varchar(255) DEFAULT NULL,
  `biografia` text DEFAULT NULL,
  `datahora` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` char(1) DEFAULT '1',
  `obs` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`ID_USER`, `username`, `nome`, `cpf`, `email`, `celular`, `senha`, `data_nascimento`, `estado`, `pais`, `pfp`, `biografia`, `datahora`, `status`, `obs`) VALUES
(1, '@frfrfr', 'for real', '12345678901', 'stelamontenegro21@gmail.com', '2147483647', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '0000-00-00', 'São Paulo', 'Brasil', '1730123240.png', 'for reallll', '2024-06-16 23:21:02', '1', ''),
(2, 'joaosil', 'João Silva', '123.456.789-00', 'joao.silva@gmail.com', '11987654321', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '1990-06-25', 'São Paulo', 'Brasil', '', 'Oiiiii', '2024-11-04 23:29:28', '1', ''),
(3, 'mariasantos', 'Maria Santos', '789.654.123-09', 'maria.santos@gmail.com', '11999887766', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '1985-02-12', 'Rio de Janeiro', 'Brasil', '', 'Olá', '2024-11-04 23:29:28', '1', ''),
(9, 'rodrigocosta', 'Rodrigo Costa', '987.321.654-33', 'rodrigo.costa@gmail.com', '11966554433', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '1980-12-03', 'Santa Catarina', 'Brasil', '', 'aaaaaaaaaaaa', '2024-11-04 23:31:35', '1', ''),
(10, 'julianapereira', 'Juliana Pereira', '321.987.654-55', 'juliana.pereira@gmail.com', '11944332211', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '1997-01-22', 'Mato Grosso', 'Brasil', '', 'aaaaaaaaaaaa', '2024-11-04 23:31:35', '1', ''),
(44, '@kikikik', 'bexouser', '310.770.454-76', 'kikiik@kikik.bom', NULL, '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', NULL, NULL, NULL, 'Mulan and Shang.jpeg', 'Olá!', '2024-10-15 23:17:30', '1', NULL),
(45, 'anaclarafs', 'Ana', '981.851.976-\r\n01', 'anana@gmail.com', '1136589720', '15e2b0d3c33891ebb0f1ef609ec419420c20e3\r\n20ce94c65fbc8c3312448eb225', '2005-03-17', 'Minas\r\nGerais', 'Brasil', '', 'Olá', '0000-00-00 00:00:00', '1', ''),
(46, 'joaosilva', 'João Silva', '123.456.789-00', 'joao@gmail.com', '11987654321', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '1990-05-10', 'São Paulo', 'Brasil', '', 'Olá, sou João.', '2024-11-04 23:27:55', '1', ''),
(47, 'mariaferreira', 'Maria Ferreira', '987.654.321-00', 'maria@gmail.com', '11876543210', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '1995-08-22', 'Rio de Janeiro', 'Brasil', '', 'Olá, sou Maria.', '2024-11-04 23:27:55', '1', ''),
(48, 'luanacosta', 'Luana Costa', '111.222.333-44', 'luana@gmail.com', '11999988888', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '2002-12-05', 'Bahia', 'Brasil', '', 'Olá, sou Luana.', '2024-11-04 23:28:41', '1', ''),
(49, 'marceloalves', 'Marcelo Alves', '222.333.444-55', 'marcelo@gmail.com', '11888877777', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '1988-02-14', 'Paraná', 'Brasil', '', 'Olá, sou Marcelo.', '2024-11-04 23:28:41', '1', ''),
(50, 'isabelmartins', 'Isabel Martins', '345.678.901-23', 'isabel@gmail.com', '11777766666', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '1997-09-30', 'Santa Catarina', 'Brasil', '', 'Olá, sou Isabel.', '2024-11-04 23:28:41', '1', ''),
(51, 'rogerioferreira', 'Rogério Ferreira', '456.789.012-34', 'rogerio@gmail.com', '11666655555', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '1992-03-21', 'Ceará', 'Brasil', '', 'Olá, sou Rogério.', '2024-11-04 23:28:41', '1', ''),
(52, 'fatimaborges', 'Fátima Borges', '567.890.123-45', 'fatima@gmail.com', '11555544444', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '1985-11-12', 'Pernambuco', 'Brasil', '', 'Olá, sou Fátima.', '2024-11-04 23:28:41', '1', ''),
(53, 'andreagarcia', 'Andrea Garcia', '678.901.234-56', 'andrea@gmail.com', '11444433333', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '1995-06-25', 'São Paulo', 'Brasil', '', 'Olá, sou Andrea.', '2024-11-04 23:28:41', '1', ''),
(54, 'rafaeloliveira', 'Rafael Oliveira', '789.012.345-67', 'rafael@gmail.com', '11333322222', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '1983-08-18', 'Rio de Janeiro', 'Brasil', '', 'Olá, sou Rafael.', '2024-11-04 23:28:41', '1', ''),
(55, 'leticiapereira', 'Letícia Pereira', '890.123.456-78', 'leticia@gmail.com', '11222211111', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '1990-01-30', 'Minas Gerais', 'Brasil', '', 'Olá, sou Letícia.', '2024-11-04 23:28:41', '1', ''),
(56, 'pedrolima', 'Pedro Lima', '321.654.987-12', 'pedro.lima@gmail.com', '11922334455', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '1995-11-08', 'Bahia', 'Brasil', '', 'aaaaaaaaaaaa', '2024-11-04 23:31:09', '1', ''),
(57, 'claudiagoncalves', 'Cláudia Gonçalves', '654.987.321-45', 'claudia.goncalves@gmail.com', '11933445566', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '2000-04-20', 'Pernambuco', 'Brasil', '', 'aaaaaaaaaaaa', '2024-11-04 23:31:09', '1', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_USER`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`,`cpf`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
