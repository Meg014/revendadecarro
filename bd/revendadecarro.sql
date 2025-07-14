-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Jul-2025 às 03:25
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `revendadecarro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carros`
--

CREATE TABLE `carros` (
  `id` int(11) NOT NULL,
  `exposicao_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `marca_id` int(11) NOT NULL,
  `modelo_id` int(11) NOT NULL,
  `combustivel_id` int(11) NOT NULL,
  `transmissao_id` int(11) NOT NULL,
  `condicao_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `ano` year(4) NOT NULL,
  `quilometragem` int(11) DEFAULT 0,
  `cor_exterior` varchar(40) DEFAULT NULL,
  `cor_interior` varchar(40) DEFAULT NULL,
  `portas` tinyint(4) DEFAULT 4,
  `motor` varchar(60) DEFAULT NULL,
  `torque` varchar(60) DEFAULT NULL,
  `potencia` varchar(40) DEFAULT NULL,
  `velocidade_maxima` varchar(40) DEFAULT NULL,
  `tracao` varchar(60) DEFAULT NULL,
  `capacidade_reboque` varchar(40) DEFAULT NULL,
  `placa` varchar(150) NOT NULL,
  `codigo_estoque` varchar(150) NOT NULL,
  `preco` decimal(12,2) NOT NULL DEFAULT 0.00,
  `preco_promocional` decimal(12,2) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `extras` text DEFAULT NULL,
  `observacoes` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `destaque` tinyint(1) DEFAULT 0,
  `visualizacoes` int(11) DEFAULT 0,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `carros`
--

INSERT INTO `carros` (`id`, `exposicao_id`, `user_id`, `marca_id`, `modelo_id`, `combustivel_id`, `transmissao_id`, `condicao_id`, `categoria_id`, `nome`, `ano`, `quilometragem`, `cor_exterior`, `cor_interior`, `portas`, `motor`, `torque`, `potencia`, `velocidade_maxima`, `tracao`, `capacidade_reboque`, `placa`, `codigo_estoque`, `preco`, `preco_promocional`, `descricao`, `extras`, `observacoes`, `status`, `destaque`, `visualizacoes`, `created`, `modified`) VALUES
(3, 1, 5, 3, 10, 4, 2, 2, 2, 'Fiat Corolla 2.0 Flex Automático 2023 - Cinza Grafite', '2023', 28500, 'Cinza Grafite', 'Bege', 4, '2.0 Flex 16V', '21,4 kgfm', '117', '210', 'Dianteira', '600 kg', 'RXZ1H23', '57294-FC', 11500.00, 0.00, 'Modelo elegante, completo e confortável, o Fiat Corolla traz sofisticação e tecnologia para o seu dia a dia. Equipado com motor 2.0 Flex, transmissão automática CVT, interior em couro bege e amplo espaço interno. Ideal para quem busca conforto sem abrir mão da performance.\r\n\r\nDestaques:\r\n\r\nTeto solar panorâmico\r\n\r\nMultimídia com espelhamento\r\n\r\nRodas de liga leve aro 17\r\n\r\nCâmera de ré\r\n\r\nBancos elétricos\r\n\r\nSensor de estacionamento dianteiro e traseiro', 'IPVA 2025 pago\r\n\r\nGarantia de motor e câmbio de 1 ano\r\n\r\nManual e chave reserva disponíveis\r\n\r\nRevisado e com laudo cautelar aprovado', 'Carro seminovo em excelente estado de conservação. Veículo periciado, sem passagem por leilão ou sinistro. Unidade exclusiva na cor Cinza Grafite com interior bege – poucas disponíveis.', 1, 1, 0, '2025-07-13 02:25:06', '2025-07-13 14:17:03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `carros_features`
--

CREATE TABLE `carros_features` (
  `carro_id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `carros_features`
--

INSERT INTO `carros_features` (`carro_id`, `feature_id`) VALUES
(3, 1),
(3, 2),
(3, 7),
(3, 14),
(3, 17),
(3, 18),
(3, 20),
(3, 22),
(3, 26),
(3, 28),
(3, 29),
(3, 30),
(3, 32),
(3, 33);

-- --------------------------------------------------------

--
-- Estrutura da tabela `carro_imagem_principal`
--

CREATE TABLE `carro_imagem_principal` (
  `id` int(11) NOT NULL,
  `carro_id` int(11) NOT NULL,
  `caminho` varchar(255) NOT NULL,
  `created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `carro_imagem_principal`
--

INSERT INTO `carro_imagem_principal` (`id`, `carro_id`, `caminho`, `created`) VALUES
(1, 3, 'uploads/carros/principal/68731902ced28.jfif', '2025-07-13 02:25:06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `carro_imagens`
--

CREATE TABLE `carro_imagens` (
  `id` int(11) NOT NULL,
  `carro_id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `caminho` varchar(255) NOT NULL,
  `created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `carro_imagens`
--

INSERT INTO `carro_imagens` (`id`, `carro_id`, `titulo`, `caminho`, `created`) VALUES
(1, 3, 'OIP (7).jfif', 'uploads/carros/galeria/68731966a8bdd.jfif', '2025-07-13 02:26:46'),
(2, 3, 'OIP (6).jfif', 'uploads/carros/galeria/68731966c67d0.jfif', '2025-07-13 02:26:46'),
(3, 3, 'OIP (5).jfif', 'uploads/carros/galeria/68731966c7ba1.jfif', '2025-07-13 02:26:46'),
(4, 3, 'OIP (4).jfif', 'uploads/carros/galeria/68731966c95fc.jfif', '2025-07-13 02:26:46'),
(5, 3, 'OIP (3).jfif', 'uploads/carros/galeria/68731966ca502.jfif', '2025-07-13 02:26:46'),
(6, 3, 'OIP (2).jfif', 'uploads/carros/galeria/68731966cb470.jfif', '2025-07-13 02:26:46');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`, `created_at`, `updated_at`) VALUES
(1, 'Hatch', '2025-07-13 01:25:08', NULL),
(2, 'Sedan', '2025-07-13 01:25:08', NULL),
(3, 'SUV', '2025-07-13 01:25:08', NULL),
(4, 'Picape', '2025-07-13 01:25:08', NULL),
(5, 'Conversível', '2025-07-13 01:25:08', NULL),
(6, 'Crossover', '2025-07-13 01:25:08', NULL),
(7, 'Minivan', '2025-07-13 01:25:08', NULL),
(8, 'Perua', '2025-07-13 01:25:08', NULL),
(9, 'Esportivo', '2025-07-13 01:25:08', NULL),
(10, 'Elétrico', '2025-07-13 01:25:08', NULL),
(11, 'Utilitário', '2025-07-13 01:25:08', NULL),
(12, 'Off-road', '2025-07-13 01:25:08', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `combustiveis`
--

CREATE TABLE `combustiveis` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `combustiveis`
--

INSERT INTO `combustiveis` (`id`, `nome`, `created_at`, `updated_at`) VALUES
(1, 'Gasolina', '2025-07-13 01:28:25', NULL),
(2, 'Etanol', '2025-07-13 01:28:25', NULL),
(3, 'Diesel', '2025-07-13 01:28:25', NULL),
(4, 'Flex (Gasolina/Etanol)', '2025-07-13 01:28:25', NULL),
(5, 'GNV (Gás Natural Veicular)', '2025-07-13 01:28:25', NULL),
(6, 'Elétrico', '2025-07-13 01:28:25', NULL),
(7, 'Híbrido (Elétrico + Combustível)', '2025-07-13 01:28:25', NULL),
(8, 'Biodiesel', '2025-07-13 01:28:25', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `condicoes`
--

CREATE TABLE `condicoes` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `condicoes`
--

INSERT INTO `condicoes` (`id`, `nome`, `created_at`, `updated_at`) VALUES
(1, 'Zero km', '2025-07-13 01:27:20', NULL),
(2, 'Seminovo', '2025-07-13 01:27:20', NULL),
(3, 'Usado', '2025-07-13 01:27:20', NULL),
(4, 'Revisado', '2025-07-13 01:27:20', NULL),
(5, 'Com Garantia de Fábrica', '2025-07-13 01:27:20', NULL),
(6, 'Com Garantia da Loja', '2025-07-13 01:27:20', NULL),
(7, 'Bom Estado', '2025-07-13 01:27:20', NULL),
(8, 'Precisando de Reparos', '2025-07-13 01:27:20', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `exposicoes`
--

CREATE TABLE `exposicoes` (
  `id` int(11) NOT NULL,
  `loja_id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `exposicoes`
--

INSERT INTO `exposicoes` (`id`, `loja_id`, `nome`, `endereco`, `cidade`, `estado`, `cep`, `telefone`, `created_at`, `updated_at`) VALUES
(1, 1, 'Concessionária Primaria', 'Avenida das Indústrias, 1350 – Bairro Nova América', 'Catalão', 'GO', '31080-310', '(61) 9968-7517', '2025-07-13 01:56:27', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `features`
--

INSERT INTO `features` (`id`, `nome`, `created_at`, `updated_at`) VALUES
(1, 'Acendedor de Cigarro', '2025-07-08 01:55:58', NULL),
(2, 'Assento aquecido', '2025-07-08 01:56:02', NULL),
(3, 'Cassette Player', '2025-07-09 03:06:23', NULL),
(4, 'Controle de tração', '2025-07-09 03:06:23', NULL),
(5, 'Espelhos elétricos', '2025-07-09 03:06:23', NULL),
(6, 'Insufilm', '2025-07-09 03:06:23', NULL),
(7, 'Sistema anti-roubo', '2025-07-09 03:06:23', NULL),
(8, 'Superfície interna de couro', '2025-07-09 03:06:23', NULL),
(9, 'Volante de couro', '2025-07-09 03:06:23', NULL),
(10, 'Airbags laterais', '2025-07-09 03:06:23', NULL),
(11, 'Assento de passageiro elétrico', '2025-07-09 03:06:23', NULL),
(12, 'CD Player', '2025-07-09 03:06:23', NULL),
(13, 'Desembaçador traseiro', '2025-07-09 03:06:23', NULL),
(14, 'Espelhos Elétricos', '2025-07-09 03:06:23', NULL),
(15, 'Janelas Elétricas', '2025-07-09 03:06:23', NULL),
(16, 'Sistema de freio antitravamento', '2025-07-09 03:06:23', NULL),
(17, 'Teto solar elétrico', '2025-07-09 03:06:23', NULL),
(18, 'Ar Condicionado', '2025-07-09 03:06:23', NULL),
(19, 'Assento dos motoristas', '2025-07-09 03:06:23', NULL),
(20, 'Controle de clima automático', '2025-07-09 03:08:20', NULL),
(21, 'Digital Info Center', '2025-07-09 03:08:20', NULL),
(22, 'Estribos laterais', '2025-07-09 03:08:20', NULL),
(23, 'Limpadores intermitentes', '2025-07-09 03:08:20', NULL),
(24, 'Sistema de monitoramento da pressão dos pneus (TPMS)', '2025-07-09 03:08:20', NULL),
(25, 'Tração nas quatro rodas', '2025-07-09 03:08:20', NULL),
(26, 'Ar condicionado traseiro', '2025-07-09 03:08:20', NULL),
(27, 'Assentos de couro', '2025-07-09 03:08:20', NULL),
(28, 'Controle de estabilidade', '2025-07-09 03:08:20', NULL),
(29, 'DVD Player', '2025-07-09 03:08:20', NULL),
(30, 'Faróis de nevoeiro', '2025-07-09 03:08:20', NULL),
(31, 'Partida Remota', '2025-07-09 03:08:20', NULL),
(32, 'Sistema de navegação', '2025-07-09 03:08:20', NULL),
(33, 'Sistema de segurança', '2025-07-09 03:08:20', NULL),
(34, 'Travas elétricas', '2025-07-09 03:08:20', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lojas`
--

CREATE TABLE `lojas` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `lojas`
--

INSERT INTO `lojas` (`id`, `nome`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Alta Motors Concessionária', 5, '2025-07-13 01:54:56', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `marcas`
--

INSERT INTO `marcas` (`id`, `nome`, `created_at`, `updated_at`) VALUES
(1, 'Chevrolet', '2025-07-13 01:25:45', NULL),
(2, 'Volkswagen', '2025-07-13 01:25:45', NULL),
(3, 'Fiat', '2025-07-13 01:25:45', NULL),
(4, 'Toyota', '2025-07-13 01:25:45', NULL),
(5, 'Honda', '2025-07-13 01:25:45', NULL),
(6, 'Hyundai', '2025-07-13 01:25:45', NULL),
(7, 'Renault', '2025-07-13 01:25:45', NULL),
(8, 'Ford', '2025-07-13 01:25:45', NULL),
(9, 'Nissan', '2025-07-13 01:25:45', NULL),
(10, 'Jeep', '2025-07-13 01:25:45', NULL),
(11, 'BMW', '2025-07-13 01:25:45', NULL),
(12, 'Mercedes-Benz', '2025-07-13 01:25:45', NULL),
(13, 'Audi', '2025-07-13 01:25:45', NULL),
(14, 'Peugeot', '2025-07-13 01:25:45', NULL),
(15, 'Citroën', '2025-07-13 01:25:45', NULL),
(16, 'Mitsubishi', '2025-07-13 01:25:45', NULL),
(17, 'Kia', '2025-07-13 01:25:45', NULL),
(18, 'Volvo', '2025-07-13 01:25:45', NULL),
(19, 'Land Rover', '2025-07-13 01:25:45', NULL),
(20, 'Porsche', '2025-07-13 01:25:45', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelos`
--

CREATE TABLE `modelos` (
  `id` int(11) NOT NULL,
  `marca_id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `modelos`
--

INSERT INTO `modelos` (`id`, `marca_id`, `nome`, `created_at`, `updated_at`) VALUES
(1, 1, 'Onix', '2025-07-13 01:26:35', NULL),
(2, 1, 'Cruze', '2025-07-13 01:26:35', NULL),
(3, 1, 'S10', '2025-07-13 01:26:35', NULL),
(4, 2, 'Gol', '2025-07-13 01:26:35', NULL),
(5, 2, 'Polo', '2025-07-13 01:26:35', NULL),
(6, 2, 'T-Cross', '2025-07-13 01:26:35', NULL),
(7, 3, 'Uno', '2025-07-13 01:26:35', NULL),
(8, 3, 'Argo', '2025-07-13 01:26:35', NULL),
(9, 3, 'Toro', '2025-07-13 01:26:35', NULL),
(10, 3, 'Corolla', '2025-07-13 01:26:35', NULL),
(11, 4, 'Hilux', '2025-07-13 01:26:35', NULL),
(12, 4, 'Yaris', '2025-07-13 01:26:35', NULL),
(13, 5, 'Civic', '2025-07-13 01:26:35', NULL),
(14, 5, 'Fit', '2025-07-13 01:26:35', NULL),
(15, 5, 'HR-V', '2025-07-13 01:26:35', NULL),
(16, 6, 'HB20', '2025-07-13 01:26:35', NULL),
(17, 6, 'Creta', '2025-07-13 01:26:35', NULL),
(18, 6, 'Azera', '2025-07-13 01:26:35', NULL),
(19, 7, 'Kwid', '2025-07-13 01:26:35', NULL),
(20, 7, 'Duster', '2025-07-13 01:26:35', NULL),
(21, 7, 'Sandero', '2025-07-13 01:26:35', NULL),
(22, 8, 'Ka', '2025-07-13 01:26:35', NULL),
(23, 8, 'EcoSport', '2025-07-13 01:26:35', NULL),
(24, 8, 'Ranger', '2025-07-13 01:26:35', NULL),
(25, 9, 'Versa', '2025-07-13 01:26:35', NULL),
(26, 9, 'Kicks', '2025-07-13 01:26:35', NULL),
(27, 9, 'Sentra', '2025-07-13 01:26:35', NULL),
(28, 10, 'Compass', '2025-07-13 01:26:35', NULL),
(29, 10, 'Renegade', '2025-07-13 01:26:35', NULL),
(30, 10, 'Commander', '2025-07-13 01:26:35', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `roles`
--

INSERT INTO `roles` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2025-06-24 22:49:46', NULL),
(2, 'Dono', '2025-06-24 22:49:46', NULL),
(3, 'Cliente', '2025-06-24 22:49:46', NULL),
(4, 'Funcionário', '2025-06-24 22:49:46', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessions_logins`
--

CREATE TABLE `sessions_logins` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(60) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_time` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `sessions_logins`
--

INSERT INTO `sessions_logins` (`id`, `ip_address`, `user_id`, `login_time`, `created_at`, `updated_at`) VALUES
(1, '::1', 1, '2025-07-01 18:22:06', '2025-07-01 18:22:06', NULL),
(2, '::1', 1, '2025-07-01 18:53:44', '2025-07-01 18:53:44', NULL),
(3, '::1', 1, '2025-07-01 18:55:36', '2025-07-01 18:55:36', NULL),
(4, '::1', 1, '2025-07-01 19:27:44', '2025-07-01 19:27:44', NULL),
(5, '::1', 1, '2025-07-03 03:45:45', '2025-07-03 03:45:45', NULL),
(6, '::1', 1, '2025-07-03 03:57:28', '2025-07-03 03:57:28', NULL),
(7, '::1', 1, '2025-07-03 13:48:04', '2025-07-03 13:48:04', NULL),
(8, '::1', 1, '2025-07-03 14:26:21', '2025-07-03 14:26:21', NULL),
(9, '::1', 1, '2025-07-04 13:43:13', '2025-07-04 13:43:13', NULL),
(10, '::1', 1, '2025-07-04 14:40:31', '2025-07-04 14:40:31', NULL),
(11, '::1', 1, '2025-07-07 16:44:43', '2025-07-07 16:44:43', NULL),
(12, '::1', 1, '2025-07-08 01:17:02', '2025-07-08 01:17:02', NULL),
(13, '::1', 1, '2025-07-08 02:55:19', '2025-07-08 02:55:19', NULL),
(14, '::1', 1, '2025-07-09 01:30:27', '2025-07-09 01:30:28', NULL),
(15, '::1', 1, '2025-07-10 16:47:53', '2025-07-10 16:47:53', NULL),
(16, '::1', 1, '2025-07-10 17:09:58', '2025-07-10 17:09:58', NULL),
(17, '::1', 1, '2025-07-10 23:35:04', '2025-07-10 23:35:04', NULL),
(18, '::1', 1, '2025-07-11 00:00:39', '2025-07-11 00:00:39', NULL),
(19, '::1', 1, '2025-07-11 19:10:47', '2025-07-11 19:10:47', NULL),
(20, '::1', 1, '2025-07-12 01:19:49', '2025-07-12 01:19:49', NULL),
(21, '::1', 1, '2025-07-12 01:20:33', '2025-07-12 01:20:33', NULL),
(22, '::1', 1, '2025-07-12 20:50:38', '2025-07-12 20:50:38', NULL),
(23, '::1', 1, '2025-07-12 21:10:00', '2025-07-12 21:10:00', NULL),
(24, '::1', 1, '2025-07-13 00:40:59', '2025-07-13 00:40:59', NULL),
(25, '::1', 1, '2025-07-13 01:00:14', '2025-07-13 01:00:14', NULL),
(26, '::1', 1, '2025-07-13 01:00:39', '2025-07-13 01:00:39', NULL),
(27, '::1', 1, '2025-07-13 01:31:04', '2025-07-13 01:31:04', NULL),
(28, '::1', 1, '2025-07-13 01:41:24', '2025-07-13 01:41:24', NULL),
(29, '::1', 1, '2025-07-13 01:47:30', '2025-07-13 01:47:30', NULL),
(30, '::1', 5, '2025-07-13 01:52:28', '2025-07-13 01:52:28', NULL),
(31, '::1', 5, '2025-07-13 01:54:03', '2025-07-13 01:54:03', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `transmissoes`
--

CREATE TABLE `transmissoes` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `transmissoes`
--

INSERT INTO `transmissoes` (`id`, `nome`, `created_at`, `updated_at`) VALUES
(1, 'Manual', '2025-07-13 01:27:57', NULL),
(2, 'Automática', '2025-07-13 01:27:57', NULL),
(3, 'Automatizada', '2025-07-13 01:27:57', NULL),
(4, 'CVT', '2025-07-13 01:27:57', NULL),
(5, 'Tiptronic', '2025-07-13 01:27:57', NULL),
(6, 'Dual Clutch (DCT)', '2025-07-13 01:27:57', NULL),
(7, 'Sequencial', '2025-07-13 01:27:57', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `role_id`, `active`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '$2y$10$u.V8xl2bRkMqwyd/KPZD4OJamqeOVsRUAo./Jv5EEGCAyfqKsaBCG', 1, 1, '2025-07-13 01:47:30', '2025-06-24 22:52:43', NULL),
(5, 'Meg', 'meg@gmail.com', 'meg', '$2y$10$HjFYt6P3muYV3RhU7e/sT./.0Ws3npmrVmcSRMMI10RAlpgtQF8j.', 2, 1, '2025-07-13 01:54:03', '2025-07-13 01:52:28', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `carros`
--
ALTER TABLE `carros`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `placa` (`placa`),
  ADD KEY `fk_carro_exposicao` (`exposicao_id`),
  ADD KEY `fk_carro_usuario` (`user_id`),
  ADD KEY `fk_carro_marca` (`marca_id`),
  ADD KEY `fk_carro_modelo` (`modelo_id`),
  ADD KEY `fk_carro_combustivel` (`combustivel_id`),
  ADD KEY `fk_carro_transmissao` (`transmissao_id`),
  ADD KEY `fk_carro_condicao` (`condicao_id`),
  ADD KEY `fk_carro_categoria` (`categoria_id`);

--
-- Índices para tabela `carros_features`
--
ALTER TABLE `carros_features`
  ADD PRIMARY KEY (`carro_id`,`feature_id`),
  ADD KEY `fk_cf_feature` (`feature_id`);

--
-- Índices para tabela `carro_imagem_principal`
--
ALTER TABLE `carro_imagem_principal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carro_id` (`carro_id`);

--
-- Índices para tabela `carro_imagens`
--
ALTER TABLE `carro_imagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carro_id` (`carro_id`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `combustiveis`
--
ALTER TABLE `combustiveis`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `condicoes`
--
ALTER TABLE `condicoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `exposicoes`
--
ALTER TABLE `exposicoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loja_id` (`loja_id`);

--
-- Índices para tabela `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `lojas`
--
ALTER TABLE `lojas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_loja_usuario` (`user_id`);

--
-- Índices para tabela `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `modelos`
--
ALTER TABLE `modelos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marca_id` (`marca_id`);

--
-- Índices para tabela `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sessions_logins`
--
ALTER TABLE `sessions_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices para tabela `transmissoes`
--
ALTER TABLE `transmissoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carros`
--
ALTER TABLE `carros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `carro_imagem_principal`
--
ALTER TABLE `carro_imagem_principal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `carro_imagens`
--
ALTER TABLE `carro_imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `combustiveis`
--
ALTER TABLE `combustiveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `condicoes`
--
ALTER TABLE `condicoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `exposicoes`
--
ALTER TABLE `exposicoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `lojas`
--
ALTER TABLE `lojas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `modelos`
--
ALTER TABLE `modelos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `sessions_logins`
--
ALTER TABLE `sessions_logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `transmissoes`
--
ALTER TABLE `transmissoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `carros`
--
ALTER TABLE `carros`
  ADD CONSTRAINT `fk_carro_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `fk_carro_combustivel` FOREIGN KEY (`combustivel_id`) REFERENCES `combustiveis` (`id`),
  ADD CONSTRAINT `fk_carro_condicao` FOREIGN KEY (`condicao_id`) REFERENCES `condicoes` (`id`),
  ADD CONSTRAINT `fk_carro_exposicao` FOREIGN KEY (`exposicao_id`) REFERENCES `exposicoes` (`id`),
  ADD CONSTRAINT `fk_carro_marca` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`),
  ADD CONSTRAINT `fk_carro_modelo` FOREIGN KEY (`modelo_id`) REFERENCES `modelos` (`id`),
  ADD CONSTRAINT `fk_carro_transmissao` FOREIGN KEY (`transmissao_id`) REFERENCES `transmissoes` (`id`),
  ADD CONSTRAINT `fk_carro_usuario` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `carros_features`
--
ALTER TABLE `carros_features`
  ADD CONSTRAINT `fk_cf_carro` FOREIGN KEY (`carro_id`) REFERENCES `carros` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_cf_feature` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `carro_imagem_principal`
--
ALTER TABLE `carro_imagem_principal`
  ADD CONSTRAINT `carro_imagem_principal_ibfk_1` FOREIGN KEY (`carro_id`) REFERENCES `carros` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `carro_imagens`
--
ALTER TABLE `carro_imagens`
  ADD CONSTRAINT `carro_imagens_ibfk_1` FOREIGN KEY (`carro_id`) REFERENCES `carros` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `exposicoes`
--
ALTER TABLE `exposicoes`
  ADD CONSTRAINT `fk_exposicao_loja` FOREIGN KEY (`loja_id`) REFERENCES `lojas` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `lojas`
--
ALTER TABLE `lojas`
  ADD CONSTRAINT `fk_loja_usuario` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `modelos`
--
ALTER TABLE `modelos`
  ADD CONSTRAINT `fk_modelo_marca` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `sessions_logins`
--
ALTER TABLE `sessions_logins`
  ADD CONSTRAINT `sessions_logins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
