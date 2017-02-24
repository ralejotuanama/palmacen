-- phpMyAdmin SQL Dump
-- version 4.4.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 16-03-2016 a las 13:06:45
-- Versión del servidor: 5.5.44-MariaDB
-- Versión de PHP: 5.5.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `nuevaialesos3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anexos`
--

CREATE TABLE IF NOT EXISTS `anexos` (
  `idAnexos` int(11) NOT NULL,
  `anexo` varchar(45) DEFAULT NULL,
  `thumb` varchar(45) DEFAULT NULL,
  `url` varchar(300) DEFAULT NULL,
  `path` varchar(300) DEFAULT NULL,
  `os_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aparatos`
--

CREATE TABLE IF NOT EXISTS `aparatos` (
  `aparatos_id` int(255) NOT NULL,
  `IDclientes` int(255) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `tipo` varchar(25) NOT NULL,
  `modelo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `marca` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `n_serie` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('570c3e0d2f2ca6201daabae7ffe911ab', '109.111.111.253', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36', 1458070727, 'a:5:{s:9:"user_data";s:0:"";s:4:"nome";s:9:"Alejandro";s:2:"id";s:1:"3";s:9:"permissao";s:1:"1";s:6:"logado";b:1;}'),
('60f2e1b9b7632956b1da25edd9cfdfb8', '109.111.111.253', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36', 1458118040, 'a:5:{s:9:"user_data";s:0:"";s:4:"nome";s:9:"Alejandro";s:2:"id";s:1:"3";s:9:"permissao";s:1:"1";s:6:"logado";b:1;}'),
('86d15b4d44d5de9c0c483ea6ef774a49', '109.111.121.27', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1458082982, ''),
('a087ee06fc3446d9982ca200fa78d630', '109.111.121.27', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36', 1458083485, ''),
('bbef9baafe0c89b07b97758d6aa9b410', '109.111.121.27', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_3) AppleWebKit/601.4.4 (KHTML, like Gecko)', 1458082981, ''),
('dfea3e3e354ae75043006ac4b4117de1', '109.111.121.27', 'Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143', 1458082982, ''),
('e7de61534d5b84809f6dded01f114a45', '109.111.121.27', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_3) AppleWebKit/601.4.4 (KHTML, like Gecko)', 1458082981, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `idClientes` int(11) NOT NULL,
  `nomeCliente` varchar(255) NOT NULL,
  `documento` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `dataCadastro` date DEFAULT NULL,
  `rua` varchar(70) DEFAULT NULL,
  `numero` varchar(30) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE IF NOT EXISTS `documentos` (
  `idDocumentos` int(11) NOT NULL,
  `documento` varchar(70) DEFAULT NULL,
  `descricao` text,
  `file` varchar(100) DEFAULT NULL,
  `path` varchar(300) DEFAULT NULL,
  `url` varchar(300) DEFAULT NULL,
  `cadastro` date DEFAULT NULL,
  `categoria` varchar(80) DEFAULT NULL,
  `tipo` varchar(15) DEFAULT NULL,
  `tamanho` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emitente`
--

CREATE TABLE IF NOT EXISTS `emitente` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cnpj` varchar(45) DEFAULT NULL,
  `ie` varchar(50) DEFAULT NULL,
  `rua` varchar(70) DEFAULT NULL,
  `numero` varchar(15) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `uf` varchar(20) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `url_logo` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `itens_de_vendas`
--

CREATE TABLE IF NOT EXISTS `itens_de_vendas` (
  `idItens` int(11) NOT NULL,
  `subTotal` varchar(45) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `vendas_id` int(11) NOT NULL,
  `produtos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lancamentos`
--

CREATE TABLE IF NOT EXISTS `lancamentos` (
  `idLancamentos` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `valor` varchar(15) NOT NULL,
  `data_vencimento` date NOT NULL,
  `data_pagamento` date DEFAULT NULL,
  `baixado` tinyint(1) DEFAULT NULL,
  `cliente_fornecedor` varchar(255) DEFAULT NULL,
  `forma_pgto` varchar(100) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `anexo` varchar(250) DEFAULT NULL,
  `clientes_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `os`
--

CREATE TABLE IF NOT EXISTS `os` (
  `idOs` int(11) NOT NULL,
  `dataInicial` date DEFAULT NULL,
  `dataFinal` date DEFAULT NULL,
  `garantia` varchar(45) DEFAULT NULL,
  `descricaoProduto` varchar(150) DEFAULT NULL,
  `defeito` varchar(150) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `observacoes` varchar(150) DEFAULT NULL,
  `laudoTecnico` varchar(150) DEFAULT NULL,
  `valorTotal` varchar(15) DEFAULT NULL,
  `clientes_id` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `lancamento` int(11) DEFAULT NULL,
  `faturado` tinyint(1) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `serie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissoes`
--

CREATE TABLE IF NOT EXISTS `permissoes` (
  `idPermissao` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `permissoes` text,
  `situacao` tinyint(1) DEFAULT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permissoes`
--

INSERT INTO `permissoes` (`idPermissao`, `nome`, `permissoes`, `situacao`, `data`) VALUES
(1, 'Administrador', 'a:38:{s:8:"aCliente";s:1:"1";s:8:"eCliente";s:1:"1";s:8:"dCliente";s:1:"1";s:8:"vCliente";s:1:"1";s:8:"aProduto";s:1:"1";s:8:"eProduto";s:1:"1";s:8:"dProduto";s:1:"1";s:8:"vProduto";s:1:"1";s:8:"aServico";s:1:"1";s:8:"eServico";s:1:"1";s:8:"dServico";s:1:"1";s:8:"vServico";s:1:"1";s:3:"aOs";s:1:"1";s:3:"eOs";s:1:"1";s:3:"dOs";s:1:"1";s:3:"vOs";s:1:"1";s:6:"aVenda";s:1:"1";s:6:"eVenda";s:1:"1";s:6:"dVenda";s:1:"1";s:6:"vVenda";s:1:"1";s:8:"aArquivo";s:1:"1";s:8:"eArquivo";s:1:"1";s:8:"dArquivo";s:1:"1";s:8:"vArquivo";s:1:"1";s:11:"aLancamento";s:1:"1";s:11:"eLancamento";s:1:"1";s:11:"dLancamento";s:1:"1";s:11:"vLancamento";s:1:"1";s:8:"cUsuario";s:1:"1";s:9:"cEmitente";s:1:"1";s:10:"cPermissao";s:1:"1";s:7:"cBackup";s:1:"1";s:8:"rCliente";s:1:"1";s:8:"rProduto";s:1:"1";s:8:"rServico";s:1:"1";s:3:"rOs";s:1:"1";s:6:"rVenda";s:1:"1";s:11:"rFinanceiro";s:1:"1";}', 1, '2014-09-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `idProdutos` int(11) NOT NULL,
  `descricao` varchar(80) NOT NULL,
  `unidade` varchar(10) DEFAULT NULL,
  `precoCompra` decimal(10,2) DEFAULT NULL,
  `precoVenda` decimal(10,2) NOT NULL,
  `estoque` int(11) NOT NULL,
  `estoqueMinimo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produtos_os`
--

CREATE TABLE IF NOT EXISTS `produtos_os` (
  `idProdutos_os` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `os_id` int(11) NOT NULL,
  `produtos_id` int(11) NOT NULL,
  `subTotal` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicos`
--

CREATE TABLE IF NOT EXISTS `servicos` (
  `idServicos` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicos_os`
--

CREATE TABLE IF NOT EXISTS `servicos_os` (
  `idServicos_os` int(11) NOT NULL,
  `os_id` int(11) NOT NULL,
  `servicos_id` int(11) NOT NULL,
  `subTotal` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuarios` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `cpf` varchar(20) NOT NULL,
  `rua` varchar(70) DEFAULT NULL,
  `numero` varchar(15) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `situacao` tinyint(1) NOT NULL,
  `dataCadastro` date NOT NULL,
  `nivel` int(11) NOT NULL,
  `permissoes_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuarios`, `nome`, `rg`, `cpf`, `rua`, `numero`, `bairro`, `cidade`, `estado`, `email`, `senha`, `telefone`, `celular`, `situacao`, `dataCadastro`, `nivel`, `permissoes_id`) VALUES
(1, 'POR ASIGNAR', '-', '-', '-', '-', '-', '-', '-', 'admin@admin.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '-', '-', 1, '2013-11-22', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendas`
--

CREATE TABLE IF NOT EXISTS `vendas` (
  `idVendas` int(11) NOT NULL,
  `dataVenda` date DEFAULT NULL,
  `valorTotal` varchar(45) DEFAULT NULL,
  `desconto` varchar(45) DEFAULT NULL,
  `faturado` tinyint(1) DEFAULT NULL,
  `clientes_id` int(11) NOT NULL,
  `usuarios_id` int(11) DEFAULT NULL,
  `lancamentos_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anexos`
--
ALTER TABLE `anexos`
  ADD PRIMARY KEY (`idAnexos`),
  ADD KEY `fk_anexos_os1` (`os_id`);

--
-- Indices de la tabla `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idClientes`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`idDocumentos`);

--
-- Indices de la tabla `emitente`
--
ALTER TABLE `emitente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `itens_de_vendas`
--
ALTER TABLE `itens_de_vendas`
  ADD PRIMARY KEY (`idItens`),
  ADD KEY `fk_itens_de_vendas_vendas1` (`vendas_id`),
  ADD KEY `fk_itens_de_vendas_produtos1` (`produtos_id`);

--
-- Indices de la tabla `lancamentos`
--
ALTER TABLE `lancamentos`
  ADD PRIMARY KEY (`idLancamentos`),
  ADD KEY `fk_lancamentos_clientes1` (`clientes_id`);

--
-- Indices de la tabla `os`
--
ALTER TABLE `os`
  ADD PRIMARY KEY (`idOs`),
  ADD KEY `fk_os_clientes1` (`clientes_id`),
  ADD KEY `fk_os_usuarios1` (`usuarios_id`),
  ADD KEY `fk_os_lancamentos1` (`lancamento`);

--
-- Indices de la tabla `permissoes`
--
ALTER TABLE `permissoes`
  ADD PRIMARY KEY (`idPermissao`);

--
-- Indices de la tabla `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`idProdutos`);

--
-- Indices de la tabla `produtos_os`
--
ALTER TABLE `produtos_os`
  ADD PRIMARY KEY (`idProdutos_os`),
  ADD KEY `fk_produtos_os_os1` (`os_id`),
  ADD KEY `fk_produtos_os_produtos1` (`produtos_id`);

--
-- Indices de la tabla `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`idServicos`);

--
-- Indices de la tabla `servicos_os`
--
ALTER TABLE `servicos_os`
  ADD PRIMARY KEY (`idServicos_os`),
  ADD KEY `fk_servicos_os_os1` (`os_id`),
  ADD KEY `fk_servicos_os_servicos1` (`servicos_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuarios`),
  ADD KEY `fk_usuarios_permissoes1_idx` (`permissoes_id`);

--
-- Indices de la tabla `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`idVendas`),
  ADD KEY `fk_vendas_clientes1` (`clientes_id`),
  ADD KEY `fk_vendas_usuarios1` (`usuarios_id`),
  ADD KEY `fk_vendas_lancamentos1` (`lancamentos_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anexos`
--
ALTER TABLE `anexos`
  MODIFY `idAnexos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idClientes` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `idDocumentos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `emitente`
--
ALTER TABLE `emitente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `itens_de_vendas`
--
ALTER TABLE `itens_de_vendas`
  MODIFY `idItens` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `lancamentos`
--
ALTER TABLE `lancamentos`
  MODIFY `idLancamentos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `os`
--
ALTER TABLE `os`
  MODIFY `idOs` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `permissoes`
--
ALTER TABLE `permissoes`
  MODIFY `idPermissao` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `produtos`
--
ALTER TABLE `produtos`
  MODIFY `idProdutos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `produtos_os`
--
ALTER TABLE `produtos_os`
  MODIFY `idProdutos_os` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `servicos`
--
ALTER TABLE `servicos`
  MODIFY `idServicos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `servicos_os`
--
ALTER TABLE `servicos_os`
  MODIFY `idServicos_os` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `vendas`
--
ALTER TABLE `vendas`
  MODIFY `idVendas` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anexos`
--
ALTER TABLE `anexos`
  ADD CONSTRAINT `fk_anexos_os1` FOREIGN KEY (`os_id`) REFERENCES `os` (`idOs`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `itens_de_vendas`
--
ALTER TABLE `itens_de_vendas`
  ADD CONSTRAINT `fk_itens_de_vendas_vendas1` FOREIGN KEY (`vendas_id`) REFERENCES `vendas` (`idVendas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_itens_de_vendas_produtos1` FOREIGN KEY (`produtos_id`) REFERENCES `produtos` (`idProdutos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `lancamentos`
--
ALTER TABLE `lancamentos`
  ADD CONSTRAINT `fk_lancamentos_clientes1` FOREIGN KEY (`clientes_id`) REFERENCES `clientes` (`idClientes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `os`
--
ALTER TABLE `os`
  ADD CONSTRAINT `fk_os_clientes1` FOREIGN KEY (`clientes_id`) REFERENCES `clientes` (`idClientes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_os_lancamentos1` FOREIGN KEY (`lancamento`) REFERENCES `lancamentos` (`idLancamentos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_os_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`idUsuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `produtos_os`
--
ALTER TABLE `produtos_os`
  ADD CONSTRAINT `fk_produtos_os_os1` FOREIGN KEY (`os_id`) REFERENCES `os` (`idOs`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produtos_os_produtos1` FOREIGN KEY (`produtos_id`) REFERENCES `produtos` (`idProdutos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `servicos_os`
--
ALTER TABLE `servicos_os`
  ADD CONSTRAINT `fk_servicos_os_os1` FOREIGN KEY (`os_id`) REFERENCES `os` (`idOs`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_servicos_os_servicos1` FOREIGN KEY (`servicos_id`) REFERENCES `servicos` (`idServicos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_permissoes1` FOREIGN KEY (`permissoes_id`) REFERENCES `permissoes` (`idPermissao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `fk_vendas_clientes1` FOREIGN KEY (`clientes_id`) REFERENCES `clientes` (`idClientes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vendas_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`idUsuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vendas_lancamentos1` FOREIGN KEY (`lancamentos_id`) REFERENCES `lancamentos` (`idLancamentos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
