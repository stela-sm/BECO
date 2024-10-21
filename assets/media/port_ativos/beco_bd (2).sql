-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04/10/2024 às 11:52
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
(2, 'Lucas Xavier ', 'stelamontenegro21@gmail.com', '1721939593.jpg', '09b528ded473cca690cbe3af43c872f8a98390711d38deee01dca0f0a7c6f37e', '234324', 5, 1, '123345654', '40527617810', '23423423', 423423, 'Casado', '2024-06-05', 'observações', '2024-06-16 16:35:43'),
(6, 'Lucas Xavier ', 'stela@g.com', '1722814547.png', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '234324', 2, 1, '123345654', '40527617810', '23423423', 423423, 'Casado', '2024-06-05', 'observações', '2024-06-16 16:35:43');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ativos`
--

CREATE TABLE `ativos` (
  `ID_ATIVO` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `arquivo` varchar(200) NOT NULL,
  `tipo` varchar(60) NOT NULL,
  `datahora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `ativos`
--

INSERT INTO `ativos` (`ID_ATIVO`, `id_post`, `arquivo`, `tipo`, `datahora`) VALUES
(1, 1, 'teste_atv.png', '.png', '2024-09-14 15:06:25');

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
(11, 1, 1, 'sssss', '2024-08-05 21:59:44'),
(12, 1, 1, 'ssssssss', '2024-08-05 21:59:47'),
(13, 1, 1, 'tttttttt', '2024-08-05 22:00:26'),
(14, 1, 1, 'dsfsdf', '2024-09-29 22:55:25'),
(15, 1, 1, 'aaaaa', '2024-09-29 22:55:43'),
(16, 1, 1, ' ghhfhfghfghfghfghgfh', '2024-09-29 22:56:03'),
(17, 1, 1, 'aaaaaaaaaa', '2024-09-29 22:57:07'),
(18, 1, 1, 'aaaa', '2024-09-29 22:58:59'),
(19, 1, 1, 'aaaaaaaaaaaaaa', '2024-09-29 23:05:22'),
(20, 1, 1, 'mano que bosta KKKKKK', '2024-09-29 23:05:45');

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
  `metodo` varchar(110) NOT NULL,
  `cod_card_num` varchar(110) NOT NULL COMMENT 'Código pix ou cartão utilizado',
  `codigo` varchar(100) NOT NULL,
  `datahora` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `compras`
--

INSERT INTO `compras` (`ID_COMPRA`, `id_prod`, `valor`, `comprador`, `vendedor`, `metodo`, `cod_card_num`, `codigo`, `datahora`, `status`) VALUES
(1, 2, 11, 'comprador_teste', 'vendedor_teste', 'pix', '11212121212', 'ABC123', '2024-09-15 12:34:56', 0),
(2, 2, 11, 'comprador_teste', 'vendedor_teste', 'credito', '', 'ABC123', '2024-09-15 12:34:56', 0),
(3, 2, 11, 'comprador_teste', 'vendedor_teste', 'debito', '', 'ABC123', '2024-09-15 12:34:56', 0);

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
(3, 'Purple', '#Purple', 'Purple', '1726791405.png', 'image.png', '2024-09-29', '2024-10-19', 1);

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
(521, 2, 1, 'administradores', '2024-09-20 00:21:38');

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
(51, 1, 1, '2024-08-05 18:45:26'),
(63, 1, 12345, '2024-08-05 18:45:51'),
(65, 1, 1234, '2024-08-05 18:45:53');

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
(233, 521, 2, NULL, '1726791734.avif', '2024-09-20 00:22:14');

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
(1, 1, 'tese.png', '.png', '2024-09-14 18:05:07');

-- --------------------------------------------------------

--
-- Estrutura para tabela `postagem`
--

CREATE TABLE `postagem` (
  `ID_POST` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `thumbnail` varchar(110) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `tipo` int(11) NOT NULL,
  `datahora` double NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `postagem`
--

INSERT INTO `postagem` (`ID_POST`, `id_user`, `thumbnail`, `titulo`, `descricao`, `tipo`, `datahora`, `status`) VALUES
(1, 1, 'thumb.png', 'New Colors', 'Piririri #PurpleRain', 1, 20240914150149, 1),
(2, 1, 'thumb.png', 'Vaisefuder', 'Piririri #PurpleRain', 1, 20240914150149, 1),
(3, 1, 'thumb.png', 'Merda', 'Piririri #PurpleRain', 1, 20240914150149, 1),
(4, 1, 'thumb.png', 'Teste', 'Piririri #PurpleRain', 1, 20240914150149, 1),
(5, 1, 'thumb.png', 'Mano', 'Piririri #Purpl', 1, 20240914150149, 1),
(6, 1, 'thumb.png', 'Saco', 'Piririri #PurpleRain', 1, 20240914150149, 1),
(7, 1, 'thumb.png', 'Porra', 'Piririri #PurpleRain', 1, 20240914150149, 1),
(8, 1, 'thumb.png', 'Lixo', 'Piririri #PurpleRain', 1, 20240914150149, 1),
(9, 1, 'thumb.png', 'Cacete', 'Piririri #Purpl', 1, 20240914150149, 1),
(10, 1, 'thumb.png', 'Bosta', 'Piririri #PurpleRain', 1, 20240914150149, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `ID_PROD` int(11) NOT NULL,
  `id_postagem` int(11) NOT NULL,
  `licenca` varchar(11) NOT NULL,
  `valor` float DEFAULT NULL,
  `banco` varchar(110) NOT NULL,
  `agencia` varchar(110) NOT NULL,
  `conta` varchar(110) NOT NULL,
  `datahora` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`ID_PROD`, `id_postagem`, `licenca`, `valor`, `banco`, `agencia`, `conta`, `datahora`, `status`) VALUES
(1, 1, 'Gratuita', NULL, 'sda', '23232', '1111111', 2147483647, 1);

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
(313, '2024_09.txt', 2147483647);

-- --------------------------------------------------------

--
-- Estrutura para tabela `salvos`
--

CREATE TABLE `salvos` (
  `ID_SALVO` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `satahora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `id_prod` int(11) NOT NULL,
  `software` int(11) NOT NULL,
  `datahora` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `tag` varchar(11) NOT NULL,
  `datahora` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tags`
--

INSERT INTO `tags` (`ID_TAG`, `id_post`, `tag`, `datahora`) VALUES
(1, 1, '#PixelArt', 2147483647),
(2, 1, '#3D', 2147483647);

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
(1, '@stelasm', 'stela', '12345678901', 'stelamontenegro21@gmail.com', '2147483647', '1cf4ab4128362303ea634a0783d6c242a166ebe1f0cadbed5e49f821fdd55439', '0000-00-00', 'São Paulo', 'Brasil', '1718575205.png', 'Biooooooo', '2024-06-16 23:21:02', '1', ''),
(9, 'stel', 'stelamontenegro2@gmail.com', '', 'stelamontenegro2@gmail.com', '12977878877', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2024-09-03', 'São Paulo', 'Brasil', '1726704236.png', '', '2024-07-30 18:15:16', '1', ''),
(13, 'stelasm0', 'lucas@gmail.com', '28278278278272', 'lucas@gmail.com', '2147483647', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '0000-00-00', '', '', '1718575205.png', 'oiiii', '2024-07-30 19:14:56', '1', ''),
(25, '@sasas', '', '372.688.110-71', 'sasa@sa.com', NULL, '5cd38f85f66bc64702320d8cb9cb702914e210fc4756e158660976cc9df664c0', NULL, NULL, NULL, NULL, NULL, '2024-09-21 16:00:58', '1', NULL),
(26, '@sese', '', '920.475.800-72', 'sese@sese.com', NULL, '2a5c4b4891d7114ef4d1aa9f3e23ab7a871b4eb3482258fe7a79db01088a77f0', NULL, NULL, NULL, NULL, NULL, '2024-09-21 16:05:44', '1', NULL),
(27, '@wewe', '', '077.660.470-80', 'wewe@wewe.com', NULL, 'd23b499f09b7e2d5276b7a3f77bcb86519e0c48abd379dc37fe30148d7ecb054', NULL, NULL, NULL, NULL, NULL, '2024-09-21 16:06:26', '1', NULL),
(28, '@swsw', '', '534.025.350-33', 'swsw@swsw.com', NULL, 'b0d77126aa4bd62c019de964f7d5a09f2a43437e511ac61298c10eb824493c81', NULL, NULL, NULL, NULL, NULL, '2024-09-21 16:08:04', '1', NULL),
(33, '@fefe', '', '866.289.130-66', 'fefe@fefe.com', NULL, '87ccf22c9ae44ed5ae2a77417e0b6fe5166ad9d3fc4d61d377d58004eba8411d', NULL, NULL, NULL, NULL, NULL, '2024-09-21 16:25:26', '1', NULL);

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
-- Índices de tabela `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`ID_STATUS`);

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
  MODIFY `ID_ATIVO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `ID_COD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `ID_COMENTARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `compras`
--
ALTER TABLE `compras`
  MODIFY `ID_COMPRA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `concursos`
--
ALTER TABLE `concursos`
  MODIFY `ID_CONCURSO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `conversas`
--
ALTER TABLE `conversas`
  MODIFY `ID_CONVERSA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=522;

--
-- AUTO_INCREMENT de tabela `likes`
--
ALTER TABLE `likes`
  MODIFY `ID_LIKE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `ID_MENSAGEM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT de tabela `midia`
--
ALTER TABLE `midia`
  MODIFY `ID_MIDIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `postagem`
--
ALTER TABLE `postagem`
  MODIFY `ID_POST` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `ID_PROD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `registros`
--
ALTER TABLE `registros`
  MODIFY `ID_REG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=314;

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
-- AUTO_INCREMENT de tabela `status`
--
ALTER TABLE `status`
  MODIFY `ID_STATUS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
