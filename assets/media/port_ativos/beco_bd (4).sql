-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/11/2024 às 14:11
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
-- Banco de dados: `beco_bd`
--

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `novoAcesso` (IN `ip` VARCHAR(45))   BEGIN
    DECLARE ipCount INT;

    -- Verificar se o IP já existe na tabela 'acessos'
    SELECT COUNT(*) INTO ipCount
    FROM acessos
    WHERE acessos.ip = ip;

    -- Se o IP não existir, inserir um novo registro
    IF ipCount = 0 THEN 
        INSERT INTO acessos (ip, datahora) VALUES (ip, NOW());
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VerificaDuplicadosUsuario` (IN `p_cpf` VARCHAR(11), IN `p_username` VARCHAR(255), IN `p_email` VARCHAR(255), OUT `p_result` INT)   BEGIN
    DECLARE duplicate_count INT;

    -- Verifica se existe algum registro com o mesmo CPF, username ou email
    SELECT COUNT(*)
    INTO duplicate_count
    FROM usuario
    WHERE cpf = p_cpf OR username = p_username OR email = p_email;

    -- Se houver duplicados, define p_result como 1; caso contrário, define como 0
    IF duplicate_count > 0 THEN
        SET p_result = 1; -- Duplicado encontrado
    ELSE
        SET p_result = 0; -- Não há duplicados
    END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `acessos`
--

CREATE TABLE `acessos` (
  `ID_ACESSO` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `datahora` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `acessos`
--

INSERT INTO `acessos` (`ID_ACESSO`, `ip`, `datahora`) VALUES
(1, '1270', '2024-08-16 21:03:17'),
(2, '127.0.0.1', '2024-08-16 21:13:32'),
(3, '127.0.0.1', '2024-08-16 21:14:13'),
(4, '127.0.0.1', '2024-08-16 21:17:58');

-- --------------------------------------------------------

--
-- Estrutura para tabela `administradores`
--

CREATE TABLE `administradores` (
  `ID_ADM` int(11) NOT NULL,
  `nome` varchar(110) NOT NULL,
  `email` varchar(110) NOT NULL,
  `pfp` varchar(100) NOT NULL DEFAULT 'nopfp/nopfp.jpeg',
  `senha` varchar(100) NOT NULL,
  `celular` varchar(11) NOT NULL,
  `poder` int(2) NOT NULL,
  `status` int(1) NOT NULL,
  `rg` varchar(11) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `numero` int(11) NOT NULL,
  `estado_civil` varchar(150) NOT NULL,
  `data_nascimento` date NOT NULL,
  `obs` mediumtext DEFAULT NULL,
  `datahora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `administradores`
--

INSERT INTO `administradores` (`ID_ADM`, `nome`, `email`, `pfp`, `senha`, `celular`, `poder`, `status`, `rg`, `cpf`, `cep`, `numero`, `estado_civil`, `data_nascimento`, `obs`, `datahora`) VALUES
(1, 'stela montenegro', 'lucas@g.com', '1722814570.jpeg', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '234324', 2, 1, '123345654', '40527617810', '23423423', 423423, 'Casado', '2024-06-05', 'observações', '2024-06-16 16:35:43'),
(2, 'Lucas Xavier ', 'stelamontenegro21@gmail.com', '1721939593.jpg', '1cf4ab4128362303ea634a0783d6c242a166ebe1f0cadbed5e49f821fdd55439', '234324', 5, 1, '123345654', '40527617810', '23423423', 423423, 'Casado', '2024-06-05', 'observações', '2024-06-16 16:35:43'),
(6, 'Lucas Xavier ', 'stela@g.com', '1722814547.png', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '234324', 2, 1, '123345654', '40527617810', '23423423', 423423, 'Casado', '2024-06-05', 'observações', '2024-06-16 16:35:43');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ativos`
--

CREATE TABLE `ativos` (
  `ID_ATIVO` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `arquivo` varchar(200) NOT NULL,
  `datahora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `ativos`
--

INSERT INTO `ativos` (`ID_ATIVO`, `id_post`, `arquivo`, `datahora`) VALUES
(1, 1, 'teste_atv.png', '2024-09-14 15:06:25'),
(32, 48, 'BECO.rar', '2024-10-16 19:43:50'),
(33, 48, 'Modelo-de-capa-e-folha-de-rosto.pdf', '2024-10-16 19:43:50'),
(36, 54, 'beco_bd (2).sql', '2024-10-21 09:47:44'),
(37, 55, 'beco_bd (2).sql', '2024-10-21 09:49:44'),
(39, 55, 'beco_bd (2).sql', '2024-10-21 09:49:44'),
(40, 57, 'bglogin.png', '2024-10-26 11:07:59'),
(41, 58, 'reposição 2410.docx', '2024-10-26 11:09:37');

-- --------------------------------------------------------

--
-- Estrutura para tabela `banner`
--

CREATE TABLE `banner` (
  `ID_BANNER` int(11) NOT NULL,
  `img` varchar(110) NOT NULL,
  `datahora` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `banner`
--

INSERT INTO `banner` (`ID_BANNER`, `img`, `datahora`, `status`) VALUES
(8, 'oi.jpeg', '2024-09-01 14:03:09', 0),
(11, '1729642241.jpeg', '2024-10-22 21:10:41', 0),
(12, '1729950372.png', '2024-10-26 10:46:12', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `chamados`
--

CREATE TABLE `chamados` (
  `ID_CHAMADO` int(11) NOT NULL,
  `email` varchar(120) NOT NULL,
  `mensagem` text NOT NULL,
  `datahora` datetime NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `chamados`
--

INSERT INTO `chamados` (`ID_CHAMADO`, `email`, `mensagem`, `datahora`, `status`) VALUES
(1, 'stelamontenegro21@gmail.com', 'aaaaa', '2024-10-21 20:37:52', 'Em Análise'),
(2, 'stelamontenegro21@gmail.com', 'socorro', '2024-10-21 20:43:16', 'Em Análise'),
(3, 'lucas@gmail.com', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2024-10-21 20:43:54', 'Em Análise'),
(4, 'lucas@gmail.com', 'hhfhgfffgfghhgfhfhgfhg', '2024-10-21 20:44:14', 'Em Análise');

-- --------------------------------------------------------

--
-- Estrutura para tabela `codigos`
--

CREATE TABLE `codigos` (
  `ID_COD` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `datahora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `codigos`
--

INSERT INTO `codigos` (`ID_COD`, `codigo`, `datahora`) VALUES
(35, 'KSnVY1', '2024-10-15 11:17:48'),
(36, 'G7F2QG', '2024-10-23 19:44:15'),
(37, 'v6RoVQ', '2024-10-28 10:50:50'),
(38, 'fcF6yG', '2024-10-28 11:11:24');

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentario`
--

CREATE TABLE `comentario` (
  `ID_COMENTARIO` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `texto` text NOT NULL,
  `datahora` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `comentario`
--

INSERT INTO `comentario` (`ID_COMENTARIO`, `id_user`, `id_post`, `texto`, `datahora`) VALUES
(1, 1, 1, 'FDFDF', '2024-08-05 18:59:47'),
(2, 1, 1, 'jhjh', '2024-08-05 20:23:06'),
(10, 1, 2, 'ggggggggggg', '2024-08-05 21:47:21'),
(11, 1, 3, 'sssss', '2024-08-05 21:59:44'),
(12, 1, 1, 'ssssssss', '2024-08-05 21:59:47'),
(13, 1, 1, 'tttttttt', '2024-08-05 22:00:26'),
(14, 1, 1, 'dsfsdf', '2024-09-29 22:55:25'),
(15, 1, 1, 'aaaaa', '2024-09-29 22:55:43'),
(16, 1, 1, ' ghhfhfghfghfghfghgfh', '2024-09-29 22:56:03'),
(17, 1, 1, 'aaaaaaaaaa', '2024-09-29 22:57:07'),
(18, 1, 1, 'aaaa', '2024-09-29 22:58:59'),
(19, 1, 1, 'aaaaaaaaaaaaaa', '2024-09-29 23:05:22'),
(20, 1, 1, 'mano que bosta KKKKKK', '2024-09-29 23:05:45'),
(21, 1, 1, 'dsdsd', '2024-10-05 14:33:02'),
(22, 1, 37, 'niiice', '2024-10-11 14:26:03'),
(23, 1, 38, 'hahaha', '2024-10-15 00:31:18'),
(24, 1, 39, 'dfdfdf', '2024-10-15 00:56:02'),
(25, 13, 56, 'que merda', '2024-10-23 21:33:20'),
(26, 38, 57, 'que horror', '2024-10-26 14:12:41');

-- --------------------------------------------------------

--
-- Estrutura para tabela `compras`
--

CREATE TABLE `compras` (
  `ID_COMPRA` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `valor` float NOT NULL,
  `comprador` varchar(110) NOT NULL,
  `vendedor` varchar(110) NOT NULL,
  `metodo` varchar(110) DEFAULT NULL,
  `cod_card_num` varchar(110) DEFAULT NULL COMMENT 'Código pix ou cartão utilizado',
  `codigo` varchar(100) DEFAULT NULL,
  `datahora` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `compras`
--

INSERT INTO `compras` (`ID_COMPRA`, `id_prod`, `valor`, `comprador`, `vendedor`, `metodo`, `cod_card_num`, `codigo`, `datahora`, `status`) VALUES
(1, 2, 11, 'comprador_teste', '13', 'pix', '11212121212', 'ABC123', '2024-09-15 12:34:56', 2),
(2, 2, 11, 'comprador_teste', '13', 'credito', '', 'ABC123', '2024-09-15 12:34:56', 2),
(3, 2, 11, 'comprador_teste', '13', 'debito', '', 'ABC123', '2024-09-15 12:34:56', 2),
(5, 38, 12, '1', '1', NULL, NULL, NULL, '2024-10-15 09:34:29', 2),
(6, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 09:43:42', 2),
(7, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 09:43:46', 2),
(8, 38, 12, '1', '1', NULL, NULL, NULL, '2024-10-15 09:44:29', 2),
(27, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 10:26:42', 2),
(28, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 10:27:05', 2),
(29, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 10:27:13', 2),
(30, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 10:27:30', 2),
(31, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 10:27:31', 2),
(32, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 10:27:39', 2),
(33, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 10:27:48', 2),
(34, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 10:29:19', 2),
(35, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 10:49:05', 2),
(36, 39, 12, '1', '39', NULL, NULL, NULL, '2024-10-15 10:49:25', 2),
(37, 40, 10.5, '44', '40', NULL, NULL, NULL, '2024-10-16 18:49:37', 2),
(38, 42, 1, '44', '42', NULL, NULL, NULL, '2024-10-16 18:55:07', 2),
(55, 55, 123, '38', '13', NULL, NULL, NULL, '2024-10-23 20:51:00', 2),
(56, 55, 23, '38', '13', NULL, NULL, NULL, '2024-10-26 10:35:09', 2),
(60, 54, 23, '1', '13', 'input-cred', '3333 3333 3333 3333', NULL, '2024-10-28 11:18:51', 2),
(61, 55, 23, '1', '13', 'credito', '1111 1111 1111 1111', NULL, '2024-10-29 20:53:51', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `concursos`
--

CREATE TABLE `concursos` (
  `ID_CONCURSO` int(11) NOT NULL,
  `titulo` varchar(110) NOT NULL,
  `tag` varchar(110) NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `img_anuncio` varchar(110) NOT NULL,
  `img_banner` varchar(160) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `concursos`
--

INSERT INTO `concursos` (`ID_CONCURSO`, `titulo`, `tag`, `descricao`, `img_anuncio`, `img_banner`, `data_inicio`, `data_fim`, `status`) VALUES
(1, 'Fotografia', 'fotografia', '#Pic', 'foto_anuncio.jpg', 'banner_fotografia.jpg', '2024-09-01', '2024-09-10', 1),
(2, 'Purple', '#PurpleRain', 'Purple', '1726791405.png', '1726791405.png', '2024-09-01', '2024-09-30', 1),
(3, 'Purple', '#Purple', 'Purple', '1726791405.png', '1726791405.png', '2024-09-29', '2024-10-24', 1),
(15, 'Etec JRM', '#JRM', 'Artes da ETEC JRM', '1729950194.png', '1729950195.png', '2024-10-25', '2024-11-11', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `conversas`
--

CREATE TABLE `conversas` (
  `ID_CONVERSA` int(11) NOT NULL,
  `id_user1` int(11) NOT NULL,
  `id_user2` int(11) NOT NULL,
  `tabela` varchar(30) NOT NULL,
  `datahora` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `conversas`
--

INSERT INTO `conversas` (`ID_CONVERSA`, `id_user1`, `id_user2`, `tabela`, `datahora`) VALUES
(520, 6, 1, 'administradores', '2024-09-15 22:19:19'),
(521, 2, 1, 'administradores', '2024-09-20 00:21:38'),
(522, 1, 13, 'usuario', '2024-10-04 23:09:27'),
(523, 44, 13, 'usuario', '2024-10-19 13:38:13'),
(525, 38, 13, 'usuario', '2024-10-26 14:47:51');

-- --------------------------------------------------------

--
-- Estrutura para tabela `likes`
--

CREATE TABLE `likes` (
  `ID_LIKE` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `datahora` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `likes`
--

INSERT INTO `likes` (`ID_LIKE`, `id_user`, `id_post`, `datahora`) VALUES
(115, 1, 2, '2024-10-07 00:18:26'),
(116, 1, 10, '2024-10-07 00:18:31'),
(117, 1, 7, '2024-10-07 00:18:40'),
(118, 1, 26, '2024-10-10 00:05:02'),
(121, 1, 38, '2024-10-15 23:05:28'),
(123, 44, 3, '2024-10-15 23:22:48'),
(127, 13, 1, '2024-10-20 13:45:54'),
(129, 13, 2, '2024-10-20 14:02:07'),
(132, 38, 57, '2024-10-27 15:20:06');

-- --------------------------------------------------------

--
-- Estrutura para tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `ID_MENSAGEM` int(11) NOT NULL,
  `id_conversa` int(11) DEFAULT NULL,
  `id_remetente` int(11) DEFAULT NULL,
  `texto_mensagem` text DEFAULT NULL,
  `file` varchar(110) DEFAULT NULL,
  `datahora` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `mensagens`
--

INSERT INTO `mensagens` (`ID_MENSAGEM`, `id_conversa`, `id_remetente`, `texto_mensagem`, `file`, `datahora`) VALUES
(231, 520, 6, 'KTYnPEZDUklpSkhTMTM5Zkp2czkxZXVaQ2RWcW1nbWlDOEVL', NULL, '2024-09-15 22:19:25'),
(232, 521, 2, 'KSpGQ1JJaUpIUzEzOWZKdnM5MWV1WkNkVnFtZ21pQzhFSw==', NULL, '2024-09-20 00:21:46'),
(233, 521, 2, NULL, '1726791734.avif', '2024-09-20 00:22:14'),
(234, 522, 1, 'KSo7IAAjITpYRkNSSWlKSFMxMzlmSnZzOTFldVpDZFZxbWdtaUM4RUs=', NULL, '2024-10-04 23:09:31'),
(235, 523, 44, 'Lyo7IAAjRkNSSWlKSFMxMzlmSnZzOTFldVpDZFZxbWdtaUM4RUs=', NULL, '2024-10-19 13:38:17'),
(236, 522, 1, 'MCByisBqJDxEUFhGJLXaGVwEGzVGQ1JJaUpIUzEzOWZKdnM5MWV1WkNkVnFtZ21pQzhFSw==', NULL, '2024-10-23 21:29:42'),
(237, 522, 13, 'JzczaQQrJjwRUloOLx9TSEQAVT8wFzNRAQ4VBmNShupmNzM/CGorPFwTSRQlFB9cXARGQ1JJaUpIUzEzOWZKdnM5MWV1WkNkVnFtZ21pQzhFSw==', NULL, '2024-10-23 21:32:19'),
(238, 522, 13, NULL, '1729719147.sql', '2024-10-23 21:32:27'),
(239, 522, 13, 'RkNSSWlKSFMxMzlmSnZzOTFldVpDZFZxbWdtaUM4RUs=', NULL, '2024-10-23 21:32:28'),
(240, 522, 13, NULL, '1729719159.png', '2024-10-23 21:32:39'),
(241, 522, 13, 'RkNSSWlKSFMxMzlmSnZzOTFldVpDZFZxbWdtaUM4RUs=', NULL, '2024-10-23 21:32:56'),
(242, 522, 13, 'NzY3aQo/RkNSSWlKSFMxMzlmSnZzOTFldVpDZFZxbWdtaUM4RUs=', NULL, '2024-10-23 21:33:01'),
(245, 525, 38, 'KSo7IABGQ1JJaUpIUzEzOWZKdnM5MWV1WkNkVnFtZ21pQzhFSw==', NULL, '2024-10-26 14:47:54'),
(246, 522, 1, 'MCIzKAgrKTJQUlhGORNTX0QBEChGQ1JJaUpIUzEzOWZKdnM5MWV1WkNkVnFtZ21pQzhFSw==', NULL, '2024-10-26 14:53:30'),
(247, 522, 1, NULL, '1729954430.sql', '2024-10-26 14:53:50'),
(249, 521, 1, 'AAwdBiYFBxx+fHYiCyU2RkNSSWlKSFMxMzlmSnZzOTFldVpDZFZxbWdtaUM4RUs=', NULL, '2024-10-28 13:31:44'),
(250, 522, 1, 'KzA8RkNSSWlKSFMxMzlmSnZzOTFldVpDZFZxbWdtaUM4RUs=', NULL, '2024-10-30 00:19:02'),
(251, 522, 1, 'MDA0LQ0uLEZDUklpSkhTMTM5Zkp2czkxZXVaQ2RWcW1nbWlDOEVL', NULL, '2024-10-30 00:23:42'),
(252, 522, 1, 'JCEwK0ZDUklpSkhTMTM5Zkp2czkxZXVaQ2RWcW1nbWlDOEVL', NULL, '2024-10-30 00:24:28'),
(253, 522, 1, 'FQ8ZRkNSSWlKSFMxMzlmSnZzOTFldVpDZFZxbWdtaUM4RUs=', NULL, '2024-10-30 00:38:33');

-- --------------------------------------------------------

--
-- Estrutura para tabela `midia`
--

CREATE TABLE `midia` (
  `ID_MIDIA` int(11) NOT NULL,
  `id_postagem` int(11) NOT NULL,
  `arquivo` varchar(200) NOT NULL,
  `tipo` varchar(60) NOT NULL,
  `datahora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `midia`
--

INSERT INTO `midia` (`ID_MIDIA`, `id_postagem`, `arquivo`, `tipo`, `datahora`) VALUES
(55, 48, 'QR_Code_Afinz.png', 'imagem', '2024-10-16 22:43:50'),
(57, 54, '1726791734.avif', 'imagem', '2024-10-21 12:47:44'),
(58, 55, '1726791734.avif', 'imagem', '2024-10-21 12:49:44'),
(59, 56, '1725219331.png', 'imagem', '2024-10-21 12:50:30'),
(60, 57, 'bglogin.png', 'imagem', '2024-10-26 14:07:59'),
(61, 58, 'Valorant 2023.03.05 - 20.09.59.03.DVR_Trim.mp4', 'video', '2024-10-26 14:09:37');

-- --------------------------------------------------------

--
-- Estrutura para tabela `postagem`
--

CREATE TABLE `postagem` (
  `ID_POST` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `thumbnail` varchar(110) NOT NULL,
  `software` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `tipo` int(11) NOT NULL,
  `datahora` date NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `postagem`
--

INSERT INTO `postagem` (`ID_POST`, `id_user`, `thumbnail`, `software`, `titulo`, `descricao`, `tipo`, `datahora`, `status`) VALUES
(1, 1, 'thumb.png', 101, 'New Colors', 'Piririri #PurpleRain', 1, '2024-09-14', 1),
(2, 1, 'thumb.png', 100, 'Vaisefuder', 'Piririri #PurpleRain', 1, '2024-09-14', 1),
(3, 1, 'thumb.png', 100, 'Merda', 'Piririri #PurpleRain', 1, '2024-09-14', 1),
(4, 1, 'thumb.png', 100, 'Teste', 'Piririri #PurpleRain', 1, '2024-09-14', 1),
(5, 1, 'thumb.png', 100, 'Mano', 'Piririri #Purpl', 1, '2024-09-14', 1),
(6, 1, 'thumb.png', 100, 'Saco', 'Piririri #PurpleRain', 1, '2024-09-14', 1),
(7, 1, 'thumb.png', 100, 'Porra', 'Piririri #PurpleRain', 1, '2024-09-14', 1),
(8, 1, 'thumb.png', 100, 'Lixo', 'Piririri #JR', 1, '2024-09-14', 1),
(48, 44, 'Remove-bg.ai_1726617120290.png', 100, 'testee', 'eeeee', 1, '2024-10-16', 1),
(50, 1, 'thumb.png', 100, 'Mano', 'Piririri #Purpl', 1, '2024-09-14', 1),
(51, 1, 'thumb.png', 100, 'Saco', 'Piririri #PurpleRain', 1, '2024-09-14', 1),
(52, 1, 'thumb.png', 100, 'Porra', 'Piririri #PurpleRain', 1, '2024-09-14', 1),
(53, 1, 'thumb.png', 100, 'Lixo', 'Piririri #PurpleRain', 1, '2024-09-14', 1),
(54, 13, '1726791734.avif', 99, 'teste', 'aaaaaa#ArteVetorial #Fotografia #ArteDigital', 1, '2024-10-21', 1),
(55, 13, '1726791734.avif', 99, 'teste', 'aaaaaa #ArteVetorial #Fotografia #ArteDigital', 1, '2024-10-21', 1),
(56, 13, '1725219331.png', 99, 'TESTE TAGS PORRA', 'TESTE #PixelArt #Animação #Ilustração #ArteDigital', 1, '2024-10-21', 1),
(57, 38, 'bglogin.png', 98, 'Teste Tag ', 'Teste tag concurso #ArteVetorial #Concurso', 1, '2024-10-26', 1),
(58, 38, 'bglogin.png', 104, 'teste2', 'llllll #JRM', 1, '2024-10-26', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `ID_PROD` int(11) NOT NULL,
  `id_postagem` int(11) NOT NULL,
  `licenca` varchar(11) NOT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `banco` varchar(110) NOT NULL,
  `agencia` varchar(110) NOT NULL,
  `conta` varchar(110) NOT NULL,
  `datahora` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`ID_PROD`, `id_postagem`, `licenca`, `valor`, `banco`, `agencia`, `conta`, `datahora`, `status`) VALUES
(1, 1, 'Gratuita', NULL, 'sda', '23232', '1111111', '0000-00-00', 1),
(8, 26, '', 0.00, 'banco_produto', 'agencia_produto', 'conta_produto', '2024-10-09', 1),
(9, 27, '', 0.00, 'banco_produto', 'agencia_produto', 'conta_produto', '2024-10-09', 1),
(10, 28, '', 0.00, 'banco_produto', 'agencia_produto', 'conta_produto', '2024-10-09', 1),
(11, 29, '', 0.00, 'banco_produto', 'agencia_produto', 'conta_produto', '2024-10-09', 1),
(12, 30, '', 0.00, 'banco_produto', 'agencia_produto', 'conta_produto', '2024-10-09', 1),
(13, 31, '', 0.00, 'banco_produto', 'agencia_produto', 'conta_produto', '2024-10-09', 1),
(14, 32, '', 0.00, 'banco_produto', 'agencia_produto', 'conta_produto', '2024-10-09', 1),
(15, 33, 'licenca', 0.00, 'banco_produto', 'agencia_produto', 'conta_produto', '2024-10-11', 1),
(16, 34, 'licenca', 0.00, 'banco_produto', 'agencia_produto', 'conta_produto', '2024-10-11', 1),
(17, 35, 'Pago', 11.00, '', '111', '11', '2024-10-11', 1),
(18, 36, 'Pago', 12.00, 'null', '111', '11', '2024-10-11', 1),
(19, 37, 'Pago', 12.00, 'null', '111', '11', '2024-10-11', 1),
(20, 38, 'Pago', 12.00, 'null', '111', '111111', '2024-10-14', 1),
(30, 48, 'Gratuito', 0.00, 'null', '222', '222', '2024-10-16', 1),
(31, 49, 'Gratuito', 0.00, 'null', '222', '222', '2024-10-16', 1),
(32, 54, 'Pago', 23.00, 'null', '11', '11', '2024-10-21', 1),
(33, 55, 'Pago', 23.00, 'null', '11', '11', '2024-10-21', 1),
(34, 56, 'Pago', 123.00, 'null', '222', '222', '2024-10-21', 1),
(35, 57, 'Gratuito', 0.00, 'null', '111', '11', '2024-10-26', 1),
(36, 58, 'Gratuito', 0.00, 'null', '99999', '9999', '2024-10-26', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `registros`
--

CREATE TABLE `registros` (
  `ID_REG` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `datahora` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `registros`
--

INSERT INTO `registros` (`ID_REG`, `nome`, `datahora`) VALUES
(434, '2024_11.txt', 2147483647),
(435, '2024_11.txt', 2147483647);

-- --------------------------------------------------------

--
-- Estrutura para tabela `salvos`
--

CREATE TABLE `salvos` (
  `ID_SALVO` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `datahora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `salvos`
--

INSERT INTO `salvos` (`ID_SALVO`, `id_post`, `id_user`, `datahora`) VALUES
(15, 2, 1, '2024-10-06 21:18:27'),
(16, 7, 1, '2024-10-06 21:18:30'),
(17, 26, 1, '2024-10-09 21:05:05'),
(21, 48, 44, '2024-10-16 22:11:10'),
(22, 1, 44, '2024-10-19 11:09:12'),
(27, 5, 44, '2024-10-20 00:44:32'),
(28, 1, 13, '2024-10-20 10:45:59'),
(30, 2, 13, '2024-10-21 10:14:19'),
(31, 56, 13, '2024-10-23 18:33:08'),
(32, 57, 38, '2024-10-27 12:20:08'),
(33, 54, 1, '2024-10-28 11:14:20');

-- --------------------------------------------------------

--
-- Estrutura para tabela `seguidores`
--

CREATE TABLE `seguidores` (
  `ID_FOLLOW` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_follower` int(11) NOT NULL,
  `datahora` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `servicos`
--

CREATE TABLE `servicos` (
  `ID_SERVICO` int(11) NOT NULL,
  `id_postagem` int(11) NOT NULL,
  `valor` tinyint(1) NOT NULL,
  `tempo` varchar(50) NOT NULL,
  `datahora` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `softwares`
--

CREATE TABLE `softwares` (
  `ID_SOFTWARE` int(11) NOT NULL,
  `software` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `softwares`
--

INSERT INTO `softwares` (`ID_SOFTWARE`, `software`) VALUES
(97, 'Affinity Designer'),
(98, 'Adobe Fresco'),
(99, 'Adobe Illustrator'),
(100, 'Adobe Photoshop'),
(101, 'ArtRage'),
(102, 'Artweaver'),
(103, 'Blender'),
(104, 'Canva'),
(105, 'Cinema 4D'),
(106, 'Clip Studio Paint'),
(107, 'DaVinci Resolve'),
(108, 'GIMP'),
(109, 'Inkscape'),
(110, 'Krita'),
(111, 'MediBang Paint'),
(112, 'OpenToonz'),
(113, 'Paint Tool SAI'),
(114, 'Paint.NET'),
(115, 'Pixelmator'),
(116, 'Procreate'),
(117, 'CorelDRAW'),
(118, 'Corel Painter'),
(119, 'Serif DrawPlus'),
(120, 'Sculptris'),
(121, 'Sketchbook'),
(122, 'Tayasui Sketches'),
(123, 'Vectornator');

-- --------------------------------------------------------

--
-- Estrutura para tabela `status`
--

CREATE TABLE `status` (
  `ID_STATUS` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `status`
--

INSERT INTO `status` (`ID_STATUS`, `status`) VALUES
(1, 'Pendente'),
(2, 'Pago'),
(3, 'Cancelado'),
(5, 'Falha');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tags`
--

CREATE TABLE `tags` (
  `ID_TAG` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `tag` varchar(110) NOT NULL,
  `datahora` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tags`
--

INSERT INTO `tags` (`ID_TAG`, `id_post`, `tag`, `datahora`) VALUES
(26, 46, '#Concurso', 2147483647),
(27, 47, '#ArteVetorial', 2147483647),
(28, 47, '#Concurso', 2147483647),
(29, 48, '#ArteVetorial', 2147483647),
(30, 48, '#Fotografia', 2147483647),
(31, 49, '#ArteVetorial', 2147483647),
(32, 49, '#Fotografia', 2147483647),
(33, 55, '#ArteVetorial', 2147483647),
(34, 55, '#Fotografia', 2147483647),
(35, 55, '#ArteDigital', 2147483647),
(36, 55, '#ArteVetorial', 2147483647),
(37, 55, '#Fotografia', 2147483647),
(38, 55, '#ArteDigital', 2147483647),
(39, 56, '#PixelArt', 2147483647),
(40, 56, '#Animação', 2147483647),
(41, 56, '#Ilustração', 2147483647),
(42, 56, '#ArteDigital', 2147483647),
(47, 57, '#ArteVetorial', 2147483647),
(48, 57, '#Concurso', 2147483647),
(49, 58, '#JRM', 2147483647);

-- --------------------------------------------------------

--
-- Estrutura para tabela `temp_midia`
--

CREATE TABLE `temp_midia` (
  `ID_TEMP_MIDIA` int(11) NOT NULL,
  `midia` varchar(160) NOT NULL,
  `datahora` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `temp_midia`
--

INSERT INTO `temp_midia` (`ID_TEMP_MIDIA`, `midia`, `datahora`) VALUES
(1, 'Remove-bg.ai_1726617120290.png', '2024-10-09');

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
(13, '@stelasm0', 'STEEE', '28278278278272', 'lucas@gmail.com', '2147483647', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '0000-00-00', '', '', '1729952166.png', 'oiiii', '2024-07-30 19:14:56', '1', ''),
(38, '@stel', 'otário', '', 'stelamontenegro2@gmail.com', '12977878877', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '2024-09-03', 'São Paulo', 'Brasil', '1729953385.png', 'Olá', '2024-07-30 18:15:16', '1', ''),
(44, '@kikikik', 'bexouser', '310.770.454-76', 'kikiik@kikik.bom', NULL, '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', NULL, NULL, NULL, 'Mulan and Shang.jpeg', 'Olá!', '2024-10-15 23:17:30', '1', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `acessos`
--
ALTER TABLE `acessos`
  ADD PRIMARY KEY (`ID_ACESSO`);

--
-- Índices de tabela `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`ID_ADM`);

--
-- Índices de tabela `ativos`
--
ALTER TABLE `ativos`
  ADD PRIMARY KEY (`ID_ATIVO`),
  ADD KEY `id_post_fk` (`id_post`);

--
-- Índices de tabela `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`ID_BANNER`);

--
-- Índices de tabela `chamados`
--
ALTER TABLE `chamados`
  ADD PRIMARY KEY (`ID_CHAMADO`);

--
-- Índices de tabela `codigos`
--
ALTER TABLE `codigos`
  ADD PRIMARY KEY (`ID_COD`);

--
-- Índices de tabela `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`ID_COMENTARIO`),
  ADD KEY `id_user` (`id_user`);

--
-- Índices de tabela `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`ID_COMPRA`);

--
-- Índices de tabela `concursos`
--
ALTER TABLE `concursos`
  ADD PRIMARY KEY (`ID_CONCURSO`);

--
-- Índices de tabela `conversas`
--
ALTER TABLE `conversas`
  ADD PRIMARY KEY (`ID_CONVERSA`);

--
-- Índices de tabela `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`ID_LIKE`);

--
-- Índices de tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`ID_MENSAGEM`),
  ADD KEY `mensagens_ibfk_1` (`id_conversa`);

--
-- Índices de tabela `midia`
--
ALTER TABLE `midia`
  ADD PRIMARY KEY (`ID_MIDIA`),
  ADD KEY `id_postagem_fk_midia` (`id_postagem`);

--
-- Índices de tabela `postagem`
--
ALTER TABLE `postagem`
  ADD PRIMARY KEY (`ID_POST`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`ID_PROD`);

--
-- Índices de tabela `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`ID_REG`);

--
-- Índices de tabela `salvos`
--
ALTER TABLE `salvos`
  ADD PRIMARY KEY (`ID_SALVO`);

--
-- Índices de tabela `seguidores`
--
ALTER TABLE `seguidores`
  ADD PRIMARY KEY (`ID_FOLLOW`);

--
-- Índices de tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`ID_SERVICO`),
  ADD KEY `id_postagem_fk` (`id_postagem`);

--
-- Índices de tabela `softwares`
--
ALTER TABLE `softwares`
  ADD PRIMARY KEY (`ID_SOFTWARE`);

--
-- Índices de tabela `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`ID_STATUS`);

--
-- Índices de tabela `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`ID_TAG`);

--
-- Índices de tabela `temp_midia`
--
ALTER TABLE `temp_midia`
  ADD PRIMARY KEY (`ID_TEMP_MIDIA`);

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
-- AUTO_INCREMENT de tabela `acessos`
--
ALTER TABLE `acessos`
  MODIFY `ID_ACESSO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `administradores`
--
ALTER TABLE `administradores`
  MODIFY `ID_ADM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `ativos`
--
ALTER TABLE `ativos`
  MODIFY `ID_ATIVO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `banner`
--
ALTER TABLE `banner`
  MODIFY `ID_BANNER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `chamados`
--
ALTER TABLE `chamados`
  MODIFY `ID_CHAMADO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `codigos`
--
ALTER TABLE `codigos`
  MODIFY `ID_COD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `ID_COMENTARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `compras`
--
ALTER TABLE `compras`
  MODIFY `ID_COMPRA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de tabela `concursos`
--
ALTER TABLE `concursos`
  MODIFY `ID_CONCURSO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `conversas`
--
ALTER TABLE `conversas`
  MODIFY `ID_CONVERSA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=528;

--
-- AUTO_INCREMENT de tabela `likes`
--
ALTER TABLE `likes`
  MODIFY `ID_LIKE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `ID_MENSAGEM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT de tabela `midia`
--
ALTER TABLE `midia`
  MODIFY `ID_MIDIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de tabela `postagem`
--
ALTER TABLE `postagem`
  MODIFY `ID_POST` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `ID_PROD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `registros`
--
ALTER TABLE `registros`
  MODIFY `ID_REG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=436;

--
-- AUTO_INCREMENT de tabela `salvos`
--
ALTER TABLE `salvos`
  MODIFY `ID_SALVO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `seguidores`
--
ALTER TABLE `seguidores`
  MODIFY `ID_FOLLOW` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `ID_SERVICO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `softwares`
--
ALTER TABLE `softwares`
  MODIFY `ID_SOFTWARE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT de tabela `status`
--
ALTER TABLE `status`
  MODIFY `ID_STATUS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tags`
--
ALTER TABLE `tags`
  MODIFY `ID_TAG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de tabela `temp_midia`
--
ALTER TABLE `temp_midia`
  MODIFY `ID_TEMP_MIDIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `ativos`
--
ALTER TABLE `ativos`
  ADD CONSTRAINT `id_post_fk` FOREIGN KEY (`id_post`) REFERENCES `postagem` (`ID_POST`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `mensagens`
--
ALTER TABLE `mensagens`
  ADD CONSTRAINT `mensagens_ibfk_1` FOREIGN KEY (`id_conversa`) REFERENCES `conversas` (`ID_CONVERSA`) ON DELETE CASCADE;

--
-- Restrições para tabelas `midia`
--
ALTER TABLE `midia`
  ADD CONSTRAINT `id_postagem_fk_midia` FOREIGN KEY (`id_postagem`) REFERENCES `postagem` (`ID_POST`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `servicos`
--
ALTER TABLE `servicos`
  ADD CONSTRAINT `id_postagem_fk` FOREIGN KEY (`id_postagem`) REFERENCES `postagem` (`ID_POST`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
