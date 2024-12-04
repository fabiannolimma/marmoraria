-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/12/2024 às 00:34
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `marmoraria`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `acabamentos`
--

CREATE TABLE `acabamentos` (
  `ID` int(11) NOT NULL,
  `lados` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `menor` varchar(100) NOT NULL,
  `maior` varchar(100) NOT NULL,
  `id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `acabamentos`
--

INSERT INTO `acabamentos` (`ID`, `lados`, `nome`, `menor`, `maior`, `id_empresa`) VALUES
(3, 0, 'SEM ACABAMENTO', '0', '0', 1),
(4, 1, 'FRENTE', '0', '1', 1),
(5, 1, 'LADO MENOR', '1', '0', 1),
(6, 2, 'DOIS LADOS (MAIOR)', '0', '2', 1),
(7, 2, 'DOIS LADOS (MENOR)', '2', '0', 1),
(10, 4, '4 LADOS', '2', '2', 1),
(11, 3, 'TRÃŠS LADOS (MAIOR)', '1', '2', 1),
(12, 3, 'TRÃŠS LADOS (MENOR)', '2', '1', 1),
(13, 2, '2 LADOS MENOR/MAIOR', '1', '1', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `endereco` varchar(500) NOT NULL,
  `n` int(11) NOT NULL,
  `referencia` varchar(500) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `cep` varchar(50) NOT NULL,
  `cpf` varchar(50) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `telefone1` varchar(100) NOT NULL,
  `id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `endereco`, `n`, `referencia`, `cidade`, `bairro`, `cep`, `cpf`, `telefone`, `telefone1`, `id_empresa`) VALUES
(3, 'BERNADETH ZOCATELLI', 'av. conceicao da barra', 1754, 'N/A', 'Linhares / ES', 'Shell', '29901-590', '22233344455', '73999008331', '73999008331', 1),
(5, 'PABLO FABRIS', 'Rua henrique alves paixÃ£o', 333, 'N/A', 'Sooretama / ES', 'CENTRO', '29927-000', '1111111111', '(73) 99900-8331', '73999008331', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `NomeEmpresa` varchar(250) NOT NULL,
  `empresa_cnpj` varchar(50) NOT NULL,
  `empresa_email` varchar(250) NOT NULL,
  `empresa_endereco` varchar(500) NOT NULL,
  `empresa_bairro` varchar(150) NOT NULL,
  `empresa_numero` int(11) NOT NULL,
  `empresa_cep` varchar(50) NOT NULL,
  `empresa_tel1` varchar(100) NOT NULL,
  `empresa_tel2` varchar(100) NOT NULL,
  `fee_card` varchar(11) NOT NULL,
  `chave_ativacao` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `empresas`
--

INSERT INTO `empresas` (`id`, `NomeEmpresa`, `empresa_cnpj`, `empresa_email`, `empresa_endereco`, `empresa_bairro`, `empresa_numero`, `empresa_cep`, `empresa_tel1`, `empresa_tel2`, `fee_card`, `chave_ativacao`, `status`) VALUES
(1, 'MarmoBraz', '11.222.333/4444-55', 'test@test.com.br', 'Rua henrique alves paixÃ£o', 'centro', 1234, '59255590', '(73) 9990-08331', '(73) 99900-8331', '5', '0000-0000-0000', 'ativo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `orcamento`
--

CREATE TABLE `orcamento` (
  `ID` int(11) NOT NULL,
  `id_orcamento` int(11) NOT NULL,
  `pedraRef` varchar(100) NOT NULL,
  `produto` varchar(100) NOT NULL,
  `preco_unit` varchar(100) NOT NULL,
  `quant` int(11) NOT NULL,
  `comp` varchar(100) NOT NULL,
  `larg` varchar(100) NOT NULL,
  `quantM` int(11) NOT NULL,
  `desconto` varchar(100) NOT NULL,
  `acab` varchar(100) NOT NULL,
  `acresc` int(11) NOT NULL,
  `total` varchar(100) NOT NULL,
  `cliente_id` varchar(100) NOT NULL,
  `id_admin` varchar(100) NOT NULL,
  `data_criacao` varchar(100) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `situacao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedras`
--

CREATE TABLE `pedras` (
  `ID` int(11) NOT NULL,
  `ReferenciaN` varchar(11) NOT NULL,
  `Nome` varchar(250) NOT NULL,
  `Cor` varchar(200) NOT NULL,
  `Quantidade` varchar(50) NOT NULL,
  `valor` varchar(50) NOT NULL,
  `valorM` varchar(50) NOT NULL,
  `id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `pedras`
--

INSERT INTO `pedras` (`ID`, `ReferenciaN`, `Nome`, `Cor`, `Quantidade`, `valor`, `valorM`, `id_empresa`) VALUES
(5, '0002', 'ARABESCO', 'CINZA', '9', '65.00', '250.00', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(200) NOT NULL,
  `id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`ID`, `Nome`, `id_empresa`) VALUES
(5, 'BOX', 1),
(6, 'PIA', 1),
(7, 'LAVATÃ“RIO', 1),
(8, 'RODA BANCA', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `temp_orcamento`
--

CREATE TABLE `temp_orcamento` (
  `id` int(11) NOT NULL,
  `pedraRef` varchar(11) NOT NULL,
  `produto` varchar(100) NOT NULL,
  `preco_unit` varchar(100) NOT NULL,
  `quant` int(11) NOT NULL,
  `comp` varchar(100) NOT NULL,
  `larg` varchar(100) NOT NULL,
  `quantM` varchar(50) NOT NULL,
  `desconto` varchar(100) NOT NULL,
  `acab` varchar(100) NOT NULL,
  `acresc` int(11) NOT NULL,
  `total` varchar(100) NOT NULL,
  `cliente_id` varchar(100) NOT NULL,
  `id_admin` varchar(100) NOT NULL,
  `id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `temp_orcamento`
--

INSERT INTO `temp_orcamento` (`id`, `pedraRef`, `produto`, `preco_unit`, `quant`, `comp`, `larg`, `quantM`, `desconto`, `acab`, `acresc`, `total`, `cliente_id`, `id_admin`, `id_empresa`) VALUES
(31, '0002', ' CINZA ARABESCO', '250.00', 1, '0.82', '0.62', '242.3', '24.23', '115.2', 106, '324.497144', 'PABLO FABRIS', 'limminha', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(300) NOT NULL,
  `email` varchar(250) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `nivel` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`, `email`, `nome`, `nivel`, `id_empresa`) VALUES
(2, 'limminha', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'iotlinkchainproject@gmail.com', 'Fabiano Lima', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `id_orcamento` int(11) NOT NULL,
  `pedraRef` varchar(100) NOT NULL,
  `produto` varchar(200) NOT NULL,
  `preco_unit` varchar(100) NOT NULL,
  `quant` int(11) NOT NULL,
  `comp` varchar(100) NOT NULL,
  `larg` varchar(100) NOT NULL,
  `quantM` varchar(100) NOT NULL,
  `desconto` int(11) NOT NULL,
  `acab` varchar(100) NOT NULL,
  `acresc` int(11) NOT NULL,
  `total` varchar(100) NOT NULL,
  `cliente_id` varchar(100) NOT NULL,
  `id_admin` varchar(100) NOT NULL,
  `data_criacao` varchar(200) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `situacao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `acabamentos`
--
ALTER TABLE `acabamentos`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `orcamento`
--
ALTER TABLE `orcamento`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `pedras`
--
ALTER TABLE `pedras`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `temp_orcamento`
--
ALTER TABLE `temp_orcamento`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acabamentos`
--
ALTER TABLE `acabamentos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `orcamento`
--
ALTER TABLE `orcamento`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `pedras`
--
ALTER TABLE `pedras`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `temp_orcamento`
--
ALTER TABLE `temp_orcamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
