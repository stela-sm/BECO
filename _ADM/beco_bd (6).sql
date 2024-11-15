-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12/11/2024 às 16:06
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
(17, 'Samuel Roberto ', 'samuel@gmail.com', '1731417452.png', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '11963208060', 4, 1, '726394831', '29836527819', '08734877', 32, 'Solteiro', '2007-05-18', '', '2024-11-12 10:16:54'),
(18, 'Clara Sanches', 'clara@gmail.com', '1731418331.png', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '11992731689', 3, 1, '257382982', '46573849729', '09823647', 34, 'Casada', '2006-07-01', '', '2024-11-12 10:22:55'),
(19, 'Laura Cruz', 'laura@gmail.com', '1731418863.png', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '11980514305', 1, 1, '367637838', '37647838737', '03656378', 33, 'Solteira', '0000-00-00', '', '2024-11-12 10:27:55'),
(20, 'Stela Montenegro', 'stelamontenegro3@gmail.com', '1731418888.png', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '11963220905', 5, 1, '725763764', '27647839829', '08723678', 54, 'Casado', '2006-12-03', '', '2024-11-12 10:32:41');

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
(46, 61, 'wallpaper.avif', '2024-11-06 21:11:02'),
(47, 62, 'pexels-mccutcheon-1566909.jpg', '2024-11-06 21:14:43'),
(48, 63, 'trees.rar', '2024-11-10 19:12:04'),
(50, 65, 'images.jpeg', '2024-11-10 19:40:14'),
(51, 66, 'pintura-digital-de-menina-1024x538.jpg', '2024-11-10 19:49:56'),
(52, 67, 'girl-8799169_1280.jpg', '2024-11-11 10:08:47'),
(56, 71, '1731332496.jpeg', '2024-11-11 10:41:36'),
(57, 72, '1731333378.jpeg', '2024-11-11 10:56:18'),
(58, 73, '1731333679.jpeg', '2024-11-11 11:01:19'),
(59, 74, '1731366563.jpeg', '2024-11-11 20:09:23'),
(60, 75, '1731366708.gif', '2024-11-11 20:11:48'),
(61, 76, '1731367069.jpeg', '2024-11-11 20:17:49'),
(62, 77, '1731367771.jpeg', '2024-11-11 20:29:31'),
(63, 78, '1731368100.jpeg', '2024-11-11 20:35:00'),
(64, 79, '1731368382.jpeg', '2024-11-11 20:39:42'),
(66, 81, '1731368847.jpeg', '2024-11-11 20:47:27');

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
(12, '1729950372.png', '2024-10-26 10:46:12', 0),
(13, '1730851233.png', '2024-11-05 21:00:33', 0),
(14, '1730851938.jpeg', '2024-11-05 21:12:18', 0),
(15, '1731190547.jpeg', '2024-11-09 19:15:47', 1);

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
(4, 'lucas@gmail.com', 'hhfhgfffgfghhgfhfhgfhg', '2024-10-21 20:44:14', 'Em Análise'),
(5, 'stelamontenegro3@gmail.com', 'Precisa de um aviso para ataque epilético. É o post \'psicodélico\' da @julianapereira', '2024-11-06 21:20:32', 'Em Análise');

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
(38, 'fcF6yG', '2024-10-28 11:11:24'),
(39, 'JQwuol', '2024-11-11 10:44:04');

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
(26, 38, 57, 'que horror', '2024-10-26 14:12:41'),
(27, 1, 59, 'dfsdfsf', '2024-11-05 01:03:36'),
(28, 10, 62, 'QUE LEGAL', '2024-11-07 00:15:18'),
(29, 54, 66, 'oiiiiiii', '2024-11-10 22:57:04'),
(30, 54, 62, 'OIIIII', '2024-11-10 22:59:21'),
(31, 57, 63, 'oi', '2024-11-11 13:05:04'),
(32, 57, 64, 'oi', '2024-11-11 13:05:22'),
(33, 57, 64, 'oiiiiiiii', '2024-11-11 13:07:14'),
(34, 55, 71, 'Muito bom!\n', '2024-11-11 13:50:58'),
(35, 51, 76, 'já coloquei no meu!', '2024-11-11 23:29:51'),
(36, 56, 75, 'Que legal!', '2024-11-11 23:48:35'),
(37, 55, 81, 'Arrasou! vou utilizar num projeto', '2024-11-11 23:49:29');

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
(65, 61, 1.5, '10', '10', 'credito', '1111 1111 1111 1111', NULL, '2024-11-06 21:12:38', 2),
(66, 63, 1.5, '50', '50', 'credito', '1111 1111 1111 1111', NULL, '2024-11-10 19:16:56', 2),
(67, 70, 5, '57', '57', 'credito', '1222 2222 2222 2222', NULL, '2024-11-11 10:39:08', 2),
(68, 71, 5, '57', '57', 'credito', '1111 1111 1111 1111', NULL, '2024-11-11 10:41:43', 2),
(69, 71, 5, '55', '57', 'credito', '1233 8473 8483 8348', NULL, '2024-11-11 10:51:01', 2),
(70, 76, 1.5, '51', '55', 'credito', '1211 2121 2121 2121', NULL, '2024-11-11 20:29:57', 2),
(71, 81, 25, '55', '56', 'credito', '2323 2323 2323 2323', NULL, '2024-11-11 20:49:31', 2);

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
(3, 'Purple', '#Purple', 'Purple', '1726791405.png', '1726791405.png', '2024-09-29', '2024-10-24', 1),
(15, 'Etec JRM', '#JRM', 'Artes da ETEC JRM', '1729950194.png', '1729950195.png', '2024-10-25', '2024-11-09', 1),
(16, 'Espiríto Natalino', '#Natal2024', 'Celebre o Espírito Natalino com nosso concurso especial de Natal!', '1731190456.jpg', '1731190457.jpg', '2024-11-10', '2024-11-26', 1);

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
(522, 1, 13, 'usuario', '2024-10-04 23:09:27'),
(523, 44, 13, 'usuario', '2024-10-19 13:38:13'),
(525, 38, 13, 'usuario', '2024-10-26 14:47:51'),
(530, 55, 57, 'usuario', '2024-11-11 13:57:24'),
(531, 51, 55, 'usuario', '2024-11-11 23:30:29'),
(532, 20, 17, 'administradores', '2024-11-12 13:36:13');

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
(132, 38, 57, '2024-10-27 15:20:06'),
(133, 1, 60, '2024-11-06 00:46:29');

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
(250, 522, 1, 'KzA8RkNSSWlKSFMxMzlmSnZzOTFldVpDZFZxbWdtaUM4RUs=', NULL, '2024-10-30 00:19:02'),
(251, 522, 1, 'MDA0LQ0uLEZDUklpSkhTMTM5Zkp2czkxZXVaQ2RWcW1nbWlDOEVL', NULL, '2024-10-30 00:23:42'),
(252, 522, 1, 'JCEwK0ZDUklpSkhTMTM5Zkp2czkxZXVaQ2RWcW1nbWlDOEVL', NULL, '2024-10-30 00:24:28'),
(253, 522, 1, 'FQ8ZRkNSSWlKSFMxMzlmSnZzOTFldVpDZFZxbWdtaUM4RUs=', NULL, '2024-10-30 00:38:33'),
(261, 530, 55, 'KSpyKgUrOjIQE1sJJ1YXUFBGQ1JJaUpIUzEzOWZKdnM5MWV1WkNkVnFtZ21pQzhFSw==', NULL, '2024-11-11 13:57:33'),
(262, 530, 57, 'KSpyOBwvOjpVUkZDUklpSkhTMTM5Zkp2czkxZXVaQ2RWcW1nbWlDOEVL', NULL, '2024-11-11 13:58:09'),
(263, 530, 57, 'DQgZAiIBAxh6eHItAT04cnouPhEILx06JiwmIghzDgANCBlGQ1JJaUpIUzEzOWZKdnM5MWV1WkNkVnFtZ21pQzhFSw==', NULL, '2024-11-11 13:58:24'),
(264, 531, 51, 'KSo7aQw/aDJVXEsDI1YATFBFFCg3AXpRHQYfCCH77CU1YkZDUklpSkhTMTM5Zkp2czkxZXVaQ2RWcW1nbWlDOEVL', NULL, '2024-11-11 23:30:49'),
(265, 532, 20, 'KSpyOggnPX8RR1hGKwcGUBEKVTsxFSMYGwhNGDZdZT0lYz8sSTotN1hGGQkkAhZURkNSSWlKSFMxMzlmSnZzOTFldVpDZFZxbWdtaUM4RUs=', NULL, '2024-11-12 13:36:29'),
(266, 532, 20, NULL, '1731418701.sql', '2024-11-12 13:36:36'),
(267, 532, 17, 'KTMzaR2J6XPygE0PJxlfGUcEGT82RUZDUklpSkhTMTM5Zkp2czkxZXVaQ2RWcW1nbWlDOEVL', NULL, '2024-11-12 13:37:28');

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
(68, 61, 'wallpaper.avif', 'imagem', '2024-11-07 00:11:02'),
(69, 62, 'pexels-mccutcheon-1566909.jpg', 'imagem', '2024-11-07 00:14:43'),
(71, 63, 'pexels-valeriya-19142753.jpg', 'imagem', '2024-11-10 22:12:04'),
(74, 65, 'images.jpeg', 'imagem', '2024-11-10 22:40:14'),
(75, 66, 'pintura-digital-de-menina-1024x538.jpg', 'imagem', '2024-11-10 22:49:56'),
(76, 67, 'girl-8799169_1280.jpg', 'imagem', '2024-11-11 13:08:47'),
(80, 71, '1731332496.jpeg', 'imagem', '2024-11-11 13:41:36'),
(81, 72, '1731333378.jpeg', 'imagem', '2024-11-11 13:56:18'),
(82, 73, '1731333679.jpeg', 'imagem', '2024-11-11 14:01:19'),
(83, 74, '1731366563.jpeg', 'imagem', '2024-11-11 23:09:23'),
(84, 75, '1731366708.gif', 'imagem', '2024-11-11 23:11:48'),
(85, 76, '1731367069.jpeg', 'imagem', '2024-11-11 23:17:49'),
(86, 77, '1731367771.jpeg', 'imagem', '2024-11-11 23:29:31'),
(87, 78, '1731368100.jpeg', 'imagem', '2024-11-11 23:35:00'),
(88, 79, '1731368382.jpeg', 'imagem', '2024-11-11 23:39:42'),
(91, 81, '1731368847.jpeg', 'imagem', '2024-11-11 23:47:27');

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
(61, 10, 'wallpaper.avif', 99, 'Color Wallpapers', 'Wallpaper para monitor. Extensão AVIF. #ArteDigital', 1, '2024-11-06', 1),
(62, 10, 'pexels-mccutcheon-1566909.jpg', 99, 'Psicodélico', 'Arte psicodélica #ArteDigital', 1, '2024-11-06', 1),
(63, 50, 'pexels-lisettkruusimae-14387627.jpg', 99, 'Pinheiros de natal ', 'Mais de 40 inspirações para sua árvore de natal este ano! #Fotografia #Natal2024', 1, '2024-11-10', 1),
(65, 50, 'images.jpeg', 99, 'Girl', 'Rascunhos #ArteDigital', 1, '2024-11-10', 1),
(66, 54, 'pintura-digital-de-menina-1024x538.jpg', 121, 'Wallpaper', 'Primeiro post aqui, oq acharam? #Ilustração #ArteDigital', 1, '2024-11-10', 1),
(67, 57, 'girl-8799169_1280.jpg', 99, 'Garota Lofi', 'Primeira arte no beco! #Ilustração #ArteDigital', 1, '2024-11-11', 1),
(71, 57, '1731332496.jpeg', 99, 'Ícones digitalizados', 'Desenhei e digitalizei esses ícones, os materiais estão em png e svg, oq acharam? #ArteDigital #Natal2024', 1, '2024-11-11', 1),
(72, 55, '1731333378.jpeg', 121, 'Menina png', 'Mais de 40 poses todas separadas em png ou svg, aproveitem! #Ilustração #ArteDigital', 1, '2024-11-11', 1),
(73, 57, '1731333679.jpeg', 121, 'Ilustrção Menino', 'Rascunho de alguns desenhos da semana :p #ArteDigital', 1, '2024-11-11', 1),
(74, 55, '1731366563.jpeg', 100, 'Templates posts', 'Esses e mais 20 templates de posts para instagram, com qualidade máxima e 100% editáveis! #ArteDigital #Natal2024', 1, '2024-11-11', 1),
(75, 55, '1731366708.gif', 106, 'Natal GIF', 'Gif de natal, adorei produzir esse! Oq acharam? #Animação #Natal2024', 1, '2024-11-11', 1),
(76, 55, '1731367069.jpeg', 121, 'Pikachu ', 'Wallpaper de celular 4k <3 #Ilustração', 1, '2024-11-11', 1),
(77, 51, '1731367771.jpeg', 121, 'Hands', 'A arte dessa semana foi baseada num estudo sobre mãos, oq acharam? #Ilustração #ArteDigital', 1, '2024-11-11', 1),
(78, 51, '1731368100.jpeg', 121, 'Percy', 'Arte de um dos meus personagens favoritos! #ArteDigital', 1, '2024-11-11', 1),
(79, 56, '1731368382.jpeg', 121, 'Templos', 'Alguns estudos sobre estruturas antigas, mais de 40 anotações todas reunidas. Vale a pena! #Ilustração #ArteDigital', 1, '2024-11-11', 1),
(81, 56, '1731368847.jpeg', 103, 'Modelos 3d', 'Modelo 3d da estação de metrô ucraniana, incrível! #ArteDigital', 1, '2024-11-11', 1);

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
(30, 48, 'Gratuito', 0.00, 'null', '222', '222', '2024-10-16', 1),
(31, 49, 'Gratuito', 0.00, 'null', '222', '222', '2024-10-16', 1),
(35, 57, 'Gratuito', 0.00, 'null', '111', '11', '2024-10-26', 1),
(36, 58, 'Gratuito', 0.00, 'null', '99999', '9999', '2024-10-26', 1),
(38, 60, 'Gratuito', 0.00, 'Caixa Econômica Federal', '34334', '4343', '2024-11-04', 1),
(39, 61, 'Pago', 1.50, 'Banco Bradesco BBI', '0898', '187181781', '2024-11-06', 1),
(40, 62, 'Pago', 1.30, 'Banese', '3333', '23232323', '2024-11-06', 1),
(41, 63, 'Pago', 1.50, 'Banco Bradesco BBI', '619', '12345678', '2024-11-10', 1),
(42, 64, 'Gratuito', 0.00, 'null', '', '', '2024-11-10', 1),
(43, 65, 'Gratuito', 0.00, 'null', '', '', '2024-11-10', 1),
(44, 66, 'Gratuito', 0.00, 'null', '', '', '2024-11-10', 1),
(45, 67, 'Gratuito', 0.00, 'null', '', '', '2024-11-11', 1),
(46, 68, 'Pago', 3.00, 'Banco Inter', '111', '88986756', '2024-11-11', 1),
(47, 69, 'Pago', 5.00, 'Banco Inter', '111', '23232323', '2024-11-11', 1),
(48, 70, 'Pago', 5.00, 'Banco Inter', '111', '1111111', '2024-11-11', 1),
(49, 71, 'Pago', 5.00, 'Banese', '111', '12333322', '2024-11-11', 1),
(50, 72, 'Pago', 10.00, 'Banco Inter', '123', '123455667', '2024-11-11', 1),
(51, 73, 'Gratuito', 0.00, 'null', '', '', '2024-11-11', 1),
(52, 74, 'Pago', 10.00, 'BRB', '111', '11111111', '2024-11-11', 1),
(53, 75, 'Gratuito', 0.00, 'null', '', '', '2024-11-11', 1),
(54, 76, 'Pago', 1.50, 'Banco Inter', '111', '12233433', '2024-11-11', 1),
(55, 77, 'Gratuito', 0.00, 'null', '', '', '2024-11-11', 1),
(56, 78, 'Pago', 10.00, 'Banco Inter', '111', '11111111', '2024-11-11', 1),
(57, 79, 'Pago', 20.00, 'Banpará', '122', '12323323', '2024-11-11', 1),
(58, 80, 'Gratuito', 0.00, 'Banrisul', '111', '22232323', '2024-11-11', 1),
(59, 81, 'Pago', 25.00, 'Caixa Econômica Federal', '145', '14532456', '2024-11-11', 1);

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
(435, '2024_11.txt', 2147483647),
(436, '2024_11.txt', 2147483647),
(437, '2024_11.txt', 2147483647),
(438, '2024_11.txt', 2147483647),
(439, '2024_11.txt', 2147483647),
(440, '2024_11.txt', 2147483647),
(441, '2024_11.txt', 2147483647),
(442, '2024_11.txt', 2147483647),
(443, '2024_11.txt', 2147483647),
(444, '2024_11.txt', 2147483647),
(445, '2024_11.txt', 2147483647),
(446, '2024_11.txt', 2147483647),
(447, '2024_11.txt', 2147483647),
(448, '2024_11.txt', 2147483647),
(449, '2024_11.txt', 2147483647),
(450, '2024_11.txt', 2147483647),
(451, '2024_11.txt', 2147483647),
(452, '2024_11.txt', 2147483647),
(453, '2024_11.txt', 2147483647),
(454, '2024_11.txt', 2147483647),
(455, '2024_11.txt', 2147483647),
(456, '2024_11.txt', 2147483647),
(457, '2024_11.txt', 2147483647),
(458, '2024_11.txt', 2147483647),
(459, '2024_11.txt', 2147483647),
(460, '2024_11.txt', 2147483647),
(461, '2024_11.txt', 2147483647),
(462, '2024_11.txt', 2147483647),
(463, '2024_11.txt', 2147483647),
(464, '2024_11.txt', 2147483647),
(465, '2024_11.txt', 2147483647),
(466, '2024_11.txt', 2147483647),
(467, '2024_11.txt', 2147483647),
(468, '2024_11.txt', 2147483647),
(469, '2024_11.txt', 2147483647),
(470, '2024_11.txt', 2147483647),
(471, '2024_11.txt', 2147483647),
(472, '2024_11.txt', 2147483647),
(473, '2024_11.txt', 2147483647),
(474, '2024_11.txt', 2147483647),
(475, '2024_11.txt', 2147483647),
(476, '2024_11.txt', 2147483647),
(477, '2024_11.txt', 2147483647),
(478, '2024_11.txt', 2147483647),
(479, '2024_11.txt', 2147483647),
(480, '2024_11.txt', 2147483647),
(481, '2024_11.txt', 2147483647),
(482, '2024_11.txt', 2147483647),
(483, '2024_11.txt', 2147483647),
(484, '2024_11.txt', 2147483647),
(485, '2024_11.txt', 2147483647),
(486, '2024_11.txt', 2147483647),
(487, '2024_11.txt', 2147483647),
(488, '2024_11.txt', 2147483647),
(489, '2024_11.txt', 2147483647),
(490, '2024_11.txt', 2147483647),
(491, '2024_11.txt', 2147483647),
(492, '2024_11.txt', 2147483647),
(493, '2024_11.txt', 2147483647),
(494, '2024_11.txt', 2147483647),
(495, '2024_11.txt', 2147483647),
(496, '2024_11.txt', 2147483647),
(497, '2024_11.txt', 2147483647),
(498, '2024_11.txt', 2147483647),
(499, '2024_11.txt', 2147483647),
(500, '2024_11.txt', 2147483647),
(501, '2024_11.txt', 2147483647),
(502, '2024_11.txt', 2147483647),
(503, '2024_11.txt', 2147483647),
(504, '2024_11.txt', 2147483647);

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
(33, 54, 1, '2024-10-28 11:14:20'),
(34, 60, 1, '2024-11-05 21:46:30'),
(35, 62, 10, '2024-11-06 21:15:06'),
(38, 67, 55, '2024-11-11 10:52:53');

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
(123, 'Vectornator'),
(124, 'Não Informado');

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
(49, 58, '#JRM', 2147483647),
(50, 59, '#JRM', 2147483647),
(51, 60, '#ArteVetorial', 2147483647),
(52, 61, '#ArteDigital', 2147483647),
(53, 62, '#ArteDigital', 2147483647),
(54, 63, '#Fotografia', 2147483647),
(55, 63, '#Natal2024', 2147483647),
(56, 64, '#ArteVetorial', 2147483647),
(57, 64, '#ArteDigital', 2147483647),
(58, 65, '#ArteDigital', 2147483647),
(59, 66, '#Ilustração', 2147483647),
(60, 66, '#ArteDigital', 2147483647),
(61, 67, '#Ilustração', 2147483647),
(62, 67, '#ArteDigital', 2147483647),
(63, 68, '#ArteDigital', 2147483647),
(64, 68, '#Natal2024', 2147483647),
(65, 69, '#ArteVetorial', 2147483647),
(66, 69, '#ArteDigital', 2147483647),
(67, 69, '#Natal2024', 2147483647),
(68, 70, '#ArteVetorial', 2147483647),
(69, 70, '#ArteDigital', 2147483647),
(70, 70, '#Natal2024', 2147483647),
(71, 71, '#ArteDigital', 2147483647),
(72, 71, '#Natal2024', 2147483647),
(73, 72, '#Ilustração', 2147483647),
(74, 72, '#ArteDigital', 2147483647),
(75, 73, '#ArteDigital', 2147483647),
(76, 74, '#ArteDigital', 2147483647),
(77, 74, '#Natal2024', 2147483647),
(78, 75, '#Animação', 2147483647),
(79, 75, '#Natal2024', 2147483647),
(80, 76, '#Ilustração', 2147483647),
(81, 77, '#Ilustração', 2147483647),
(82, 77, '#ArteDigital', 2147483647),
(83, 78, '#ArteDigital', 2147483647),
(84, 79, '#Ilustração', 2147483647),
(85, 79, '#ArteDigital', 2147483647),
(86, 80, '#Ilustração', 2147483647),
(87, 80, '#ArteDigital', 2147483647),
(88, 81, '#ArteDigital', 2147483647);

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
(1, '@frfrfr', 'for real', '12345678901', 'stelamontenegro21@gmail.com', '2147483647', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '2024-11-04', 'São Paulo', 'Brasil', 'nopfp.jpg', 'jjljljljljlkjlkjlk', '2024-06-16 23:21:02', '1', ''),
(9, '@rodrigocosta', 'Rodrigo Costa', '987.321.654-33', 'rodrigo.costa@gmail.com', '11966554433', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '1980-12-03', 'Santa Catarina', 'Brasil', 'nopfp.jpg', 'aaaaaaaaaaaa', '2024-11-05 02:31:35', '1', ''),
(10, '@julianapereira', 'Juliana Pereira', '321.987.654-55', 'juliana.pereira@gmail.com', '11944332211', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '1997-01-22', 'Mato Grosso', 'Brasil', 'nopfp.jpg', 'aaaaaaaaaaaa', '2024-11-05 02:31:35', '1', ''),
(13, '@stelasm0', 'STEEE', '28278278278272', 'lucas@gmail.com', '2147483647', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '0000-00-00', '', '', 'nopfp.jpg', 'oiiii', '2024-07-30 19:14:56', '1', ''),
(44, '@kikikik', 'bexouser', '310.770.454-76', 'kikiik@kikik.bom', '11925252525', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '1970-01-01', 'São Paulo', 'Brasil', 'nopfp.jpg', 'Olá!', '2024-10-15 23:17:30', '1', ''),
(45, '@anaclarafs', 'Ana', '981.851.976-\r\n01', 'anana@gmail.com', '1136589720', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '2005-03-17', 'MinasGerais', 'Brasil', 'nopfp.jpg', 'Olá', '0000-00-00 00:00:00', '1', ''),
(46, '@joaosilva', 'João Silva', '123.456.789-00', 'joao@gmail.com', '11987654321', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '1990-05-10', 'São Paulo', 'Brasil', '1730853297.jpg', 'Olá, sou João.', '2024-11-05 02:27:55', '1', ''),
(50, '@isabelmartins', 'Isabel Martins', '345.678.901-23', 'isabel@gmail.com', '11777766666', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '1997-09-30', 'Santa Catarina', 'Brasil', 'nopfp.jpg', 'Olá, sou Isabel.', '2024-11-05 02:28:41', '1', ''),
(51, '@lauracruz', 'Laura', '456.789.012-34', 'laura@gmail.com', '11666655555', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '1992-03-21', 'Ceará', 'Brasil', 'Results for quiz I’m going to give you a hazbin Hotel character.jpg', 'Me chame de Bárbara ', '2024-11-05 02:28:41', '1', ''),
(54, '@rafaeloliveira', 'Rafael Oliveira', '789.012.345-67', 'rafael@gmail.com', '11333322222', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '1983-08-18', 'Rio de Janeiro', 'Brasil', 'Kermit.jpg', 'Olá, sou Rafael.', '2024-11-05 02:28:41', '1', ''),
(55, '@stela_sm', 'stelinha', '890.123.456-78', 'stelamontenegro3@gmail.com', '11222211111', '1cf4ab4128362303ea634a0783d6c242a166ebe1f0cadbed5e49f821fdd55439', '1990-01-30', 'Minas Gerais', 'Brasil', '3d4a7d59-38c7-419e-b806-572fd80e060d.jpg', 'Etela?', '2024-11-05 02:28:41', '1', ''),
(56, '@samuelmorais', 'Samu', '321.654.987-12', 'samuel@gmail.com', '11922334455', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '1995-11-08', 'Bahia', 'Brasil', 'nopfp.jpg', 'Bob ', '2024-11-05 02:31:09', '1', ''),
(57, '@clarasanches', 'Clara', '654.987.321-45', 'clara@gmail.com', '11933445566', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '2000-04-20', 'Pernambuco', 'Brasil', '3b5202c4-4d37-4e22-bf7a-eacd32e8341b.jpg', 'Clara saches de chá', '2024-11-05 02:31:09', '1', '');

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
  MODIFY `ID_ADM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `ativos`
--
ALTER TABLE `ativos`
  MODIFY `ID_ATIVO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de tabela `banner`
--
ALTER TABLE `banner`
  MODIFY `ID_BANNER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `chamados`
--
ALTER TABLE `chamados`
  MODIFY `ID_CHAMADO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `codigos`
--
ALTER TABLE `codigos`
  MODIFY `ID_COD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `ID_COMENTARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `compras`
--
ALTER TABLE `compras`
  MODIFY `ID_COMPRA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de tabela `concursos`
--
ALTER TABLE `concursos`
  MODIFY `ID_CONCURSO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `conversas`
--
ALTER TABLE `conversas`
  MODIFY `ID_CONVERSA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=533;

--
-- AUTO_INCREMENT de tabela `likes`
--
ALTER TABLE `likes`
  MODIFY `ID_LIKE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `ID_MENSAGEM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;

--
-- AUTO_INCREMENT de tabela `midia`
--
ALTER TABLE `midia`
  MODIFY `ID_MIDIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de tabela `postagem`
--
ALTER TABLE `postagem`
  MODIFY `ID_POST` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `ID_PROD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de tabela `registros`
--
ALTER TABLE `registros`
  MODIFY `ID_REG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=505;

--
-- AUTO_INCREMENT de tabela `salvos`
--
ALTER TABLE `salvos`
  MODIFY `ID_SALVO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `seguidores`
--
ALTER TABLE `seguidores`
  MODIFY `ID_FOLLOW` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `softwares`
--
ALTER TABLE `softwares`
  MODIFY `ID_SOFTWARE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT de tabela `status`
--
ALTER TABLE `status`
  MODIFY `ID_STATUS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tags`
--
ALTER TABLE `tags`
  MODIFY `ID_TAG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de tabela `temp_midia`
--
ALTER TABLE `temp_midia`
  MODIFY `ID_TEMP_MIDIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
