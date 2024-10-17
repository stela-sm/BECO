-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/10/2024 às 03:12
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `gerar_novo_id` (OUT `p_novo_id` VARCHAR(20), IN `p_tabela` VARCHAR(30), IN `p_prefixo` VARCHAR(4))   BEGIN
    DECLARE ultimo_id INT;
    DECLARE query VARCHAR(255);

    -- Construa a consulta dinâmica para obter o último número do ID
    SET query = CONCAT(
        'SELECT IFNULL(SUBSTRING(id, LENGTH(?)), 0) INTO @ultimo_id FROM ', 
        p_tabela, 
        ' ORDER BY id DESC LIMIT 1'
    );
    
    -- Prepare e execute a consulta dinâmica
    SET @query = query;
    PREPARE stmt FROM @query;
    EXECUTE stmt USING @p_prefixo;
    DEALLOCATE PREPARE stmt;

    -- Construa a nova consulta dinâmica para gerar o novo ID
    SET p_novo_id = CONCAT(p_prefixo, (SELECT @ultimo_id + 1));

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `novoAcesso` (IN `ip` VARCHAR(45))   BEGIN DECLARE ipCount INT;
    
    SELECT COUNT(*) INTO ipCount
    FROM acessos
    WHERE acessos.ip = ip;
    
    -- Se o IP não existir, inserir um novo registro
    IF ipCount =0 THEN INSERT INTO acessos (ip, datahora) VALUES (ip, NOW());
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ObterUltimoIDUsuario` (OUT `p_id_user` INT)   BEGIN
    -- Obtém o ID do último usuário inserido
    SELECT id_user INTO p_id_user 
    FROM usuario 
    ORDER BY id_user DESC 
    LIMIT 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VerificaDuplicadosUsuario` (IN `p_cpf` VARCHAR(11), IN `p_username` VARCHAR(255), IN `p_email` VARCHAR(255), OUT `p_result` INT)   BEGIN
    -- Verifica se já existe algum registro com o mesmo CPF, username ou email
    IF EXISTS (
        SELECT 1 
        FROM usuario 
        WHERE cpf = p_cpf OR username = p_username OR email = p_email
    ) THEN
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
(2, 'Lucas Xavier ', 'stelamontenegro21@gmail.com', '1721939593.jpg', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '234324', 5, 1, '123345654', '40527617810', '23423423', 423423, 'Casado', '2024-06-05', 'observações', '2024-06-16 16:35:43'),
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
(34, 49, 'BECO.rar', '2024-10-16 19:44:22'),
(35, 49, 'Modelo-de-capa-e-folha-de-rosto.pdf', '2024-10-16 19:44:22');

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
(1, 'papap.png', '2024-08-23 11:12:02', 1),
(7, '1725210069.png', '2024-09-01 14:01:09', 0),
(8, 'oi.jpeg', '2024-09-01 14:03:09', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `chamados`
--

CREATE TABLE `chamados` (
  `ID_CHAMADO` int(11) NOT NULL,
  `setor` varchar(30) NOT NULL,
  `user` varchar(60) NOT NULL,
  `mensagem` text NOT NULL,
  `datahora` datetime NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(35, 'KSnVY1', '2024-10-15 11:17:48');

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
(24, 1, 39, 'dfdfdf', '2024-10-15 00:56:02');

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
(1, 2, 11, 'comprador_teste', 'vendedor_teste', 'pix', '11212121212', 'ABC123', '2024-09-15 12:34:56', 0),
(2, 2, 11, 'comprador_teste', 'vendedor_teste', 'credito', '', 'ABC123', '2024-09-15 12:34:56', 0),
(3, 2, 11, 'comprador_teste', 'vendedor_teste', 'debito', '', 'ABC123', '2024-09-15 12:34:56', 0),
(5, 38, 12, '1', '1', NULL, NULL, NULL, '2024-10-15 09:34:29', 1),
(6, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 09:43:42', 1),
(7, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 09:43:46', 1),
(8, 38, 12, '1', '1', NULL, NULL, NULL, '2024-10-15 09:44:29', 2),
(9, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 09:56:07', 1),
(10, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 09:58:26', 1),
(11, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 10:01:05', 1),
(12, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 10:02:43', 1),
(13, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 10:06:44', 1),
(14, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 10:21:25', 1),
(15, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 10:22:14', 1),
(16, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 10:22:23', 1),
(17, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 10:22:39', 1),
(18, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 10:22:53', 1),
(19, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 10:23:27', 1),
(20, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 10:23:48', 1),
(21, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 10:24:55', 1),
(22, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 10:25:08', 1),
(23, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 10:25:17', 1),
(24, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 10:25:26', 1),
(25, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 10:25:43', 1),
(26, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 10:26:25', 1),
(27, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 10:26:42', 1),
(28, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 10:27:05', 1),
(29, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 10:27:13', 1),
(30, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 10:27:30', 1),
(31, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 10:27:31', 1),
(32, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 10:27:39', 1),
(33, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 10:27:48', 1),
(34, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 10:29:19', 1),
(35, 38, 12, '1', '38', NULL, NULL, NULL, '2024-10-15 10:49:05', 1),
(36, 39, 12, '1', '39', NULL, NULL, NULL, '2024-10-15 10:49:25', 1),
(37, 40, 10.5, '44', '40', NULL, NULL, NULL, '2024-10-16 18:49:37', 1),
(38, 42, 1, '44', '42', NULL, NULL, NULL, '2024-10-16 18:55:07', 1);

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
(3, 'Purple', '#Purple', 'Purple', '1726791405.png', '1726791405.png', '2024-09-29', '2024-10-19', 1);

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
(522, 1, 13, 'usuario', '2024-10-04 23:09:27');

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
(122, 0, 38, '2024-10-15 23:08:48'),
(123, 44, 3, '2024-10-15 23:22:48');

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
(234, 522, 1, 'KSo7IAAjITpYRkNSSWlKSFMxMzlmSnZzOTFldVpDZFZxbWdtaUM4RUs=', NULL, '2024-10-04 23:09:31');

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
(56, 49, 'QR_Code_Afinz.png', 'imagem', '2024-10-16 22:44:22');

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
(8, 1, 'thumb.png', 100, 'Lixo', 'Piririri #PurpleRain', 1, '2024-09-14', 1),
(48, 44, 'Remove-bg.ai_1726617120290.png', 100, 'testee', 'eeeee', 1, '2024-10-16', 1),
(49, 44, 'Remove-bg.ai_1726617120290.png', 100, 'testee', 'eeeee', 1, '2024-10-16', 1);

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
(31, 49, 'Gratuito', 0.00, 'null', '222', '222', '2024-10-16', 1);

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
(1, '2024_06.txt', 2147483647),
(2, '2024_06.txt', 2147483647),
(3, '2024_06.txt', 2147483647),
(4, '2024_06.txt', 2147483647),
(5, '2024_06.txt', 2147483647),
(6, '2024_06.txt', 2147483647),
(7, '2024_06.txt', 2147483647),
(8, '2024_06.txt', 2147483647),
(9, '2024_06.txt', 2147483647),
(10, '2024_06.txt', 2147483647),
(11, '2024_06.txt', 2147483647),
(12, '2024_06.txt', 2147483647),
(13, '2024_06.txt', 2147483647),
(14, '2024_06.txt', 2147483647),
(15, '2024_06.txt', 2147483647),
(16, '2024_06.txt', 2147483647),
(17, '2024_06.txt', 2147483647),
(18, '2024_06.txt', 2147483647),
(19, '2024_06.txt', 2147483647),
(20, '2024_06.txt', 2147483647),
(21, '2024_06.txt', 2147483647),
(22, '2024_06.txt', 2147483647),
(23, '2024_06.txt', 2147483647),
(24, '2024_06.txt', 2147483647),
(25, '2024_06.txt', 2147483647),
(26, '2024_06.txt', 2147483647),
(27, '2024_06.txt', 2147483647),
(28, '2024_06.txt', 2147483647),
(29, '2024_06.txt', 2147483647),
(30, '2024_06.txt', 2147483647),
(31, '2024_06.txt', 2147483647),
(32, '2024_06.txt', 2147483647),
(33, '2024_06.txt', 2147483647),
(34, '2024_06.txt', 2147483647),
(35, '2024_06.txt', 2147483647),
(36, '2024_06.txt', 2147483647),
(37, '2024_06.txt', 2147483647),
(38, '2024_06.txt', 2147483647),
(39, '2024_06.txt', 2147483647),
(40, '2024_06.txt', 2147483647),
(41, '2024_06.txt', 2147483647),
(42, '2024_06.txt', 2147483647),
(43, '2024_06.txt', 2147483647),
(44, '2024_06.txt', 2147483647),
(45, '2024_06.txt', 2147483647),
(46, '2024_06.txt', 2147483647),
(47, '2024_06.txt', 2147483647),
(48, '2024_06.txt', 2147483647),
(49, '2024_06.txt', 2147483647),
(50, '2024_06.txt', 2147483647),
(51, '2024_06.txt', 2147483647),
(52, '2024_06.txt', 2147483647),
(53, '2024_06.txt', 2147483647),
(54, '2024_06.txt', 2147483647),
(55, '2024_06.txt', 2147483647),
(56, '2024_06.txt', 2147483647),
(57, '2024_06.txt', 2147483647),
(58, '2024_06.txt', 2147483647),
(59, '2024_06.txt', 2147483647),
(60, '2024_06.txt', 2147483647),
(61, '2024_06.txt', 2147483647),
(62, '2024_06.txt', 2147483647),
(63, '2024_06.txt', 2147483647),
(64, '2024_06.txt', 2147483647),
(65, '2024_06.txt', 2147483647),
(66, '2024_06.txt', 2147483647),
(67, '2024_06.txt', 2147483647),
(68, '2024_06.txt', 2147483647),
(69, '2024_06.txt', 2147483647),
(70, '2024_06.txt', 2147483647),
(71, '2024_06.txt', 2147483647),
(72, '2024_06.txt', 2147483647),
(73, '2024_06.txt', 2147483647),
(74, '2024_06.txt', 2147483647),
(75, '2024_06.txt', 2147483647),
(76, '2024_06.txt', 2147483647),
(77, '2024_06.txt', 2147483647),
(78, '2024_06.txt', 2147483647),
(79, '2024_06.txt', 2147483647),
(80, '2024_06.txt', 2147483647),
(81, '2024_06.txt', 2147483647),
(82, '2024_06.txt', 2147483647),
(83, '2024_06.txt', 2147483647),
(84, '2024_06.txt', 2147483647),
(85, '2024_06.txt', 2147483647),
(86, '2024_06.txt', 2147483647),
(87, '2024_07.txt', 2147483647),
(88, '2024_07.txt', 2147483647),
(89, '2024_07.txt', 2147483647),
(90, '2024_07.txt', 2147483647),
(91, '2024_07.txt', 2147483647),
(92, '2024_07.txt', 2147483647),
(93, '2024_07.txt', 2147483647),
(94, '2024_07.txt', 2147483647),
(95, '2024_07.txt', 2147483647),
(96, '2024_07.txt', 2147483647),
(97, '2024_07.txt', 2147483647),
(98, '2024_07.txt', 2147483647),
(99, '2024_07.txt', 2147483647),
(100, '2024_07.txt', 2147483647),
(101, '2024_07.txt', 2147483647),
(102, '2024_07.txt', 2147483647),
(103, '2024_07.txt', 2147483647),
(104, '2024_07.txt', 2147483647),
(105, '2024_07.txt', 2147483647),
(106, '2024_07.txt', 2147483647),
(107, '2024_07.txt', 2147483647),
(108, '2024_07.txt', 2147483647),
(109, '2024_07.txt', 2147483647),
(110, '2024_07.txt', 2147483647),
(111, '2024_07.txt', 2147483647),
(112, '2024_07.txt', 2147483647),
(113, '2024_07.txt', 2147483647),
(114, '2024_07.txt', 2147483647),
(115, '2024_07.txt', 2147483647),
(116, '2024_07.txt', 2147483647),
(117, '2024_07.txt', 2147483647),
(118, '2024_08.txt', 2147483647),
(119, '2024_08.txt', 2147483647),
(120, '2024_08.txt', 2147483647),
(121, '2024_08.txt', 2147483647),
(122, '2024_08.txt', 2147483647),
(123, '2024_08.txt', 2147483647),
(124, '2024_08.txt', 2147483647),
(125, '2024_08.txt', 2147483647),
(126, '2024_08.txt', 2147483647),
(127, '2024_08.txt', 2147483647),
(128, '2024_08.txt', 2147483647),
(129, '2024_08.txt', 2147483647),
(130, '2024_08.txt', 2147483647),
(131, '2024_08.txt', 2147483647),
(132, '2024_08.txt', 2147483647),
(133, '2024_08.txt', 2147483647),
(134, '2024_08.txt', 2147483647),
(135, '2024_08.txt', 2147483647),
(136, '2024_08.txt', 2147483647),
(137, '2024_08.txt', 2147483647),
(138, '2024_08.txt', 2147483647),
(139, '2024_08.txt', 2147483647),
(140, '2024_08.txt', 2147483647),
(141, '2024_08.txt', 2147483647),
(142, '2024_08.txt', 2147483647),
(143, '2024_08.txt', 2147483647),
(144, '2024_08.txt', 2147483647),
(145, '2024_08.txt', 2147483647),
(146, '2024_08.txt', 2147483647),
(147, '2024_08.txt', 2147483647),
(148, '2024_08.txt', 2147483647),
(149, '2024_08.txt', 2147483647),
(150, '2024_08.txt', 2147483647),
(151, '2024_08.txt', 2147483647),
(152, '2024_08.txt', 2147483647),
(153, '2024_08.txt', 2147483647),
(154, '2024_08.txt', 2147483647),
(155, '2024_08.txt', 2147483647),
(156, '2024_08.txt', 2147483647),
(157, '2024_08.txt', 2147483647),
(158, '2024_08.txt', 2147483647),
(159, '2024_08.txt', 2147483647),
(160, '2024_08.txt', 2147483647),
(161, '2024_08.txt', 2147483647),
(162, '2024_08.txt', 2147483647),
(163, '2024_08.txt', 2147483647),
(164, '2024_08.txt', 2147483647),
(165, '2024_08.txt', 2147483647),
(166, '2024_08.txt', 2147483647),
(167, '2024_08.txt', 2147483647),
(168, '2024_08.txt', 2147483647),
(169, '2024_08.txt', 2147483647),
(170, '2024_09.txt', 2147483647),
(171, '2024_09.txt', 2147483647),
(172, '2024_09.txt', 2147483647),
(173, '2024_09.txt', 2147483647),
(174, '2024_09.txt', 2147483647),
(175, '2024_09.txt', 2147483647),
(176, '2024_09.txt', 2147483647),
(177, '2024_09.txt', 2147483647),
(178, '2024_09.txt', 2147483647),
(179, '2024_09.txt', 2147483647),
(180, '2024_09.txt', 2147483647),
(181, '2024_09.txt', 2147483647),
(182, '2024_09.txt', 2147483647),
(183, '2024_09.txt', 2147483647),
(184, '2024_09.txt', 2147483647),
(185, '2024_09.txt', 2147483647),
(186, '2024_09.txt', 2147483647),
(187, '2024_09.txt', 2147483647),
(188, '2024_09.txt', 2147483647),
(189, '2024_09.txt', 2147483647),
(190, '2024_09.txt', 2147483647),
(191, '2024_09.txt', 2147483647),
(192, '2024_09.txt', 2147483647),
(193, '2024_09.txt', 2147483647),
(194, '2024_09.txt', 2147483647),
(195, '2024_09.txt', 2147483647),
(196, '2024_09.txt', 2147483647),
(197, '2024_09.txt', 2147483647),
(198, '2024_09.txt', 2147483647),
(199, '2024_09.txt', 2147483647),
(200, '2024_09.txt', 2147483647),
(201, '2024_09.txt', 2147483647),
(202, '2024_09.txt', 2147483647),
(203, '2024_09.txt', 2147483647),
(204, '2024_09.txt', 2147483647),
(205, '2024_09.txt', 2147483647),
(206, '2024_09.txt', 2147483647),
(207, '2024_09.txt', 2147483647),
(208, '2024_09.txt', 2147483647),
(209, '2024_09.txt', 2147483647),
(210, '2024_09.txt', 2147483647),
(211, '2024_09.txt', 2147483647),
(212, '2024_09.txt', 2147483647),
(213, '2024_09.txt', 2147483647),
(214, '2024_09.txt', 2147483647),
(215, '2024_09.txt', 2147483647),
(216, '2024_09.txt', 2147483647),
(217, '2024_09.txt', 2147483647),
(218, '2024_09.txt', 2147483647),
(219, '2024_09.txt', 2147483647),
(220, '2024_09.txt', 2147483647),
(221, '2024_09.txt', 2147483647),
(222, '2024_09.txt', 2147483647),
(223, '2024_09.txt', 2147483647),
(224, '2024_09.txt', 2147483647),
(225, '2024_09.txt', 2147483647),
(226, '2024_09.txt', 2147483647),
(227, '2024_09.txt', 2147483647),
(228, '2024_09.txt', 2147483647),
(229, '2024_09.txt', 2147483647),
(230, '2024_09.txt', 2147483647),
(231, '2024_09.txt', 2147483647),
(232, '2024_09.txt', 2147483647),
(233, '2024_09.txt', 2147483647),
(234, '2024_09.txt', 2147483647),
(235, '2024_09.txt', 2147483647),
(236, '2024_09.txt', 2147483647),
(237, '2024_09.txt', 2147483647),
(238, '2024_09.txt', 2147483647),
(239, '2024_09.txt', 2147483647),
(240, '2024_09.txt', 2147483647),
(241, '2024_09.txt', 2147483647),
(242, '2024_09.txt', 2147483647),
(243, '2024_09.txt', 2147483647),
(244, '2024_09.txt', 2147483647),
(245, '2024_09.txt', 2147483647),
(246, '2024_09.txt', 2147483647),
(247, '2024_09.txt', 2147483647),
(248, '2024_09.txt', 2147483647),
(249, '2024_09.txt', 2147483647),
(250, '2024_09.txt', 2147483647),
(251, '2024_09.txt', 2147483647),
(252, '2024_09.txt', 2147483647),
(253, '2024_09.txt', 2147483647),
(254, '2024_09.txt', 2147483647),
(255, '2024_09.txt', 2147483647),
(256, '2024_09.txt', 2147483647),
(257, '2024_09.txt', 2147483647),
(258, '2024_09.txt', 2147483647),
(259, '2024_09.txt', 2147483647),
(260, '2024_09.txt', 2147483647),
(261, '2024_09.txt', 2147483647),
(262, '2024_09.txt', 2147483647),
(263, '2024_09.txt', 2147483647),
(264, '2024_09.txt', 2147483647),
(265, '2024_09.txt', 2147483647),
(266, '2024_09.txt', 2147483647),
(267, '2024_09.txt', 2147483647),
(268, '2024_09.txt', 2147483647),
(269, '2024_09.txt', 2147483647),
(270, '2024_09.txt', 2147483647),
(271, '2024_09.txt', 2147483647),
(272, '2024_09.txt', 2147483647),
(273, '2024_09.txt', 2147483647),
(274, '2024_09.txt', 2147483647),
(275, '2024_09.txt', 2147483647),
(276, '2024_09.txt', 2147483647),
(277, '2024_09.txt', 2147483647),
(278, '2024_09.txt', 2147483647),
(279, '2024_09.txt', 2147483647),
(280, '2024_09.txt', 2147483647),
(281, '2024_09.txt', 2147483647),
(282, '2024_09.txt', 2147483647),
(283, '2024_09.txt', 2147483647),
(284, '2024_09.txt', 2147483647),
(285, '2024_09.txt', 2147483647),
(286, '2024_09.txt', 2147483647),
(287, '2024_09.txt', 2147483647),
(288, '2024_09.txt', 2147483647),
(289, '2024_09.txt', 2147483647),
(290, '2024_09.txt', 2147483647),
(291, '2024_09.txt', 2147483647),
(292, '2024_09.txt', 2147483647),
(293, '2024_09.txt', 2147483647),
(294, '2024_09.txt', 2147483647),
(295, '2024_09.txt', 2147483647),
(296, '2024_09.txt', 2147483647),
(297, '2024_09.txt', 2147483647),
(298, '2024_09.txt', 2147483647),
(299, '2024_09.txt', 2147483647),
(300, '2024_09.txt', 2147483647),
(301, '2024_09.txt', 2147483647),
(302, '2024_09.txt', 2147483647),
(303, '2024_09.txt', 2147483647),
(304, '2024_09.txt', 2147483647),
(305, '2024_09.txt', 2147483647),
(306, '2024_09.txt', 2147483647),
(307, '2024_09.txt', 2147483647),
(308, '2024_09.txt', 2147483647),
(309, '2024_09.txt', 2147483647),
(310, '2024_09.txt', 2147483647),
(311, '2024_09.txt', 2147483647),
(312, '2024_09.txt', 2147483647),
(313, '2024_09.txt', 2147483647),
(314, '2024_10.txt', 2147483647),
(315, '2024_10.txt', 2147483647),
(316, '2024_10.txt', 2147483647),
(317, '2024_10.txt', 2147483647),
(318, '2024_10.txt', 2147483647),
(319, '2024_10.txt', 2147483647),
(320, '2024_10.txt', 2147483647),
(321, '2024_10.txt', 2147483647),
(322, '2024_10.txt', 2147483647),
(323, '2024_10.txt', 2147483647),
(324, '2024_10.txt', 2147483647),
(325, '2024_10.txt', 2147483647),
(326, '2024_10.txt', 2147483647),
(327, '2024_10.txt', 2147483647),
(328, '2024_10.txt', 2147483647),
(329, '2024_10.txt', 2147483647),
(330, '2024_10.txt', 2147483647),
(331, '2024_10.txt', 2147483647),
(332, '2024_10.txt', 2147483647),
(333, '2024_10.txt', 2147483647),
(334, '2024_10.txt', 2147483647),
(335, '2024_10.txt', 2147483647),
(336, '2024_10.txt', 2147483647),
(337, '2024_10.txt', 2147483647),
(338, '2024_10.txt', 2147483647),
(339, '2024_10.txt', 2147483647),
(340, '2024_10.txt', 2147483647),
(341, '2024_10.txt', 2147483647),
(342, '2024_10.txt', 2147483647),
(343, '2024_10.txt', 2147483647),
(344, '2024_10.txt', 2147483647),
(345, '2024_10.txt', 2147483647),
(346, '2024_10.txt', 2147483647),
(347, '2024_10.txt', 2147483647),
(348, '2024_10.txt', 2147483647),
(349, '2024_10.txt', 2147483647),
(350, '2024_10.txt', 2147483647),
(351, '2024_10.txt', 2147483647),
(352, '2024_10.txt', 2147483647),
(353, '2024_10.txt', 2147483647),
(354, '2024_10.txt', 2147483647),
(355, '2024_10.txt', 2147483647),
(356, '2024_10.txt', 2147483647),
(357, '2024_10.txt', 2147483647),
(358, '2024_10.txt', 2147483647),
(359, '2024_10.txt', 2147483647),
(360, '2024_10.txt', 2147483647);

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
(20, 49, 44, '2024-10-16 22:11:01'),
(21, 48, 44, '2024-10-16 22:11:10');

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
(1, 1, '#PixelArt', 2147483647),
(2, 1, '#3D', 2147483647),
(0, 30, 'on', 2147483647),
(0, 30, 'on', 2147483647),
(0, 30, 'on', 2147483647),
(0, 31, 'on', 2147483647),
(0, 33, 'on', 2147483647),
(0, 33, 'on', 2147483647),
(0, 34, 'on', 2147483647),
(0, 34, 'on', 2147483647),
(0, 35, 'on', 2147483647),
(0, 35, 'on', 2147483647),
(0, 37, '#ArteVetori', 2147483647),
(0, 37, '#Fotografia', 2147483647),
(0, 38, '#ArteDigital', 2147483647),
(0, 39, '#ArteDigital', 2147483647),
(0, 40, '#Fotografia', 2147483647),
(0, 41, '#Fotografia', 2147483647),
(0, 42, '#PixelArt', 2147483647),
(0, 43, '#ArteVetorial', 2147483647),
(0, 43, '#Concurso', 2147483647),
(0, 44, '#PixelArt', 2147483647),
(0, 45, '#ArteVetorial', 2147483647),
(0, 45, '#Concurso', 2147483647),
(0, 46, '#ArteVetorial', 2147483647),
(0, 46, '#Concurso', 2147483647),
(0, 47, '#ArteVetorial', 2147483647),
(0, 47, '#Concurso', 2147483647),
(0, 48, '#ArteVetorial', 2147483647),
(0, 48, '#Fotografia', 2147483647),
(0, 49, '#ArteVetorial', 2147483647),
(0, 49, '#Fotografia', 2147483647);

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
(1, '@frfrfr', 'for real', '12345678901', 'stelamontenegro21@gmail.com', '2147483647', '1cf4ab4128362303ea634a0783d6c242a166ebe1f0cadbed5e49f821fdd55439', '0000-00-00', 'São Paulo', 'Brasil', '1718575205.png', 'for reallll', '2024-06-16 23:21:02', '1', ''),
(9, 'stel', 'stelamontenegro2@gmail.com', '', 'stelamontenegro2@gmail.com', '12977878877', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2024-09-03', 'São Paulo', 'Brasil', '1726704236.png', '', '2024-07-30 18:15:16', '1', ''),
(13, 'stelasm0', 'lucas@gmail.com', '28278278278272', 'lucas@gmail.com', '2147483647', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '0000-00-00', '', '', '1718575205.png', 'oiiii', '2024-07-30 19:14:56', '1', ''),
(44, '@kikikik', '', '310.770.454-76', 'kikiik@kikik.bom', NULL, '0aecdbdaba8c692381314cbeeeea4a0cebe7032cfe1bb2ffd8c1dc890bdc35d8', NULL, NULL, NULL, 'Mulan and Shang.jpeg', 'Olá!', '2024-10-15 23:17:30', '1', NULL);

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
  MODIFY `ID_ATIVO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `banner`
--
ALTER TABLE `banner`
  MODIFY `ID_BANNER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `chamados`
--
ALTER TABLE `chamados`
  MODIFY `ID_CHAMADO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `codigos`
--
ALTER TABLE `codigos`
  MODIFY `ID_COD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `ID_COMENTARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `compras`
--
ALTER TABLE `compras`
  MODIFY `ID_COMPRA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `concursos`
--
ALTER TABLE `concursos`
  MODIFY `ID_CONCURSO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `conversas`
--
ALTER TABLE `conversas`
  MODIFY `ID_CONVERSA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=523;

--
-- AUTO_INCREMENT de tabela `likes`
--
ALTER TABLE `likes`
  MODIFY `ID_LIKE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `ID_MENSAGEM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT de tabela `midia`
--
ALTER TABLE `midia`
  MODIFY `ID_MIDIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de tabela `postagem`
--
ALTER TABLE `postagem`
  MODIFY `ID_POST` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `ID_PROD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `registros`
--
ALTER TABLE `registros`
  MODIFY `ID_REG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=361;

--
-- AUTO_INCREMENT de tabela `salvos`
--
ALTER TABLE `salvos`
  MODIFY `ID_SALVO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `deletar_codigos_antigos` ON SCHEDULE EVERY 5 MINUTE STARTS '2024-09-24 21:32:55' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM codigos WHERE TIMESTAMPDIFF(MINUTE, datahora, NOW()) > 5$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
