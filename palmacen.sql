-- --------------------------------------------------------
-- Host:                         192.168.100.5
-- Versión del servidor:         5.6.26 - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para palmacen
CREATE DATABASE IF NOT EXISTS `palmacen` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `palmacen`;


-- Volcando estructura para tabla palmacen.anexos
CREATE TABLE IF NOT EXISTS `anexos` (
  `idAnexos` int(11) NOT NULL AUTO_INCREMENT,
  `anexo` varchar(45) DEFAULT NULL,
  `thumb` varchar(45) DEFAULT NULL,
  `url` varchar(300) DEFAULT NULL,
  `path` varchar(300) DEFAULT NULL,
  `os_id` int(11) NOT NULL,
  PRIMARY KEY (`idAnexos`),
  KEY `fk_anexos_os1` (`os_id`),
  CONSTRAINT `fk_anexos_os1` FOREIGN KEY (`os_id`) REFERENCES `os` (`idOs`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla palmacen.anexos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `anexos` DISABLE KEYS */;
/*!40000 ALTER TABLE `anexos` ENABLE KEYS */;


-- Volcando estructura para tabla palmacen.aparatos
CREATE TABLE IF NOT EXISTS `aparatos` (
  `aparatos_id` int(255) NOT NULL,
  `IDclientes` int(255) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `tipo` varchar(25) NOT NULL,
  `modelo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `marca` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `n_serie` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla palmacen.aparatos: 0 rows
/*!40000 ALTER TABLE `aparatos` DISABLE KEYS */;
/*!40000 ALTER TABLE `aparatos` ENABLE KEYS */;


-- Volcando estructura para tabla palmacen.ci_sessions
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla palmacen.ci_sessions: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
	('b7aef6cfc6a63420e04b59e1c642795c', '192.168.100.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 1487964190, ''),
	('fa34f91024b45ff0063290d8b8d9f983', '192.168.100.252', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 1487962819, 'a:5:{s:9:"user_data";s:0:"";s:4:"nome";s:13:"ADMINISTRADOR";s:2:"id";s:1:"1";s:9:"permissao";s:1:"1";s:6:"logado";b:1;}');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;


-- Volcando estructura para tabla palmacen.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `idClientes` int(11) NOT NULL AUTO_INCREMENT,
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
  `cep` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idClientes`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla palmacen.clientes: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`idClientes`, `nomeCliente`, `documento`, `telefone`, `celular`, `email`, `dataCadastro`, `rua`, `numero`, `bairro`, `cidade`, `estado`, `cep`) VALUES
	(1, 'proveedor2', '4444', '66', '', 'admin@admin.com', '2017-02-15', 'hhh', '67', '90', 'ff', 'rt', '51'),
	(2, 'Proveedor1', '645645', '987654321', '922222222', 'mail@mail.com', '2017-02-20', 'Su casa', '', '', '', '', '');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;


-- Volcando estructura para tabla palmacen.documentos
CREATE TABLE IF NOT EXISTS `documentos` (
  `idDocumentos` int(11) NOT NULL AUTO_INCREMENT,
  `documento` varchar(70) DEFAULT NULL,
  `descricao` text,
  `file` varchar(100) DEFAULT NULL,
  `path` varchar(300) DEFAULT NULL,
  `url` varchar(300) DEFAULT NULL,
  `cadastro` date DEFAULT NULL,
  `categoria` varchar(80) DEFAULT NULL,
  `tipo` varchar(15) DEFAULT NULL,
  `tamanho` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idDocumentos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla palmacen.documentos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `documentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `documentos` ENABLE KEYS */;


-- Volcando estructura para tabla palmacen.emitente
CREATE TABLE IF NOT EXISTS `emitente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `url_logo` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla palmacen.emitente: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `emitente` DISABLE KEYS */;
INSERT INTO `emitente` (`id`, `nome`, `cnpj`, `ie`, `rua`, `numero`, `bairro`, `cidade`, `uf`, `telefone`, `email`, `url_logo`) VALUES
	(1, 'BIO', 'BIO', 'BIO', 'XXXX', '52', '99', '99', '55', '887789', 'java.net1@hotmail.com', 'http://192.168.100.5/palmacen/assets/uploads/c467d66772550b858340759f30fcfbc5.png');
/*!40000 ALTER TABLE `emitente` ENABLE KEYS */;


-- Volcando estructura para tabla palmacen.itens_de_vendas
CREATE TABLE IF NOT EXISTS `itens_de_vendas` (
  `idItens` int(11) NOT NULL AUTO_INCREMENT,
  `subTotal` varchar(45) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `vendas_id` int(11) NOT NULL,
  `produtos_id` int(11) NOT NULL,
  PRIMARY KEY (`idItens`),
  KEY `fk_itens_de_vendas_vendas1` (`vendas_id`),
  KEY `fk_itens_de_vendas_produtos1` (`produtos_id`),
  CONSTRAINT `fk_itens_de_vendas_produtos1` FOREIGN KEY (`produtos_id`) REFERENCES `produtos` (`idProdutos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_itens_de_vendas_vendas1` FOREIGN KEY (`vendas_id`) REFERENCES `vendas` (`idVendas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla palmacen.itens_de_vendas: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `itens_de_vendas` DISABLE KEYS */;
INSERT INTO `itens_de_vendas` (`idItens`, `subTotal`, `quantidade`, `vendas_id`, `produtos_id`) VALUES
	(2, '200', 2, 1, 2),
	(3, '400', 4, 1, 2),
	(4, '500', 5, 1, 2),
	(5, '400', 4, 2, 1),
	(6, '160', 2, 2, 2),
	(7, '80', 1, 2, 2),
	(8, '85', 1, 6, 3),
	(9, '100', 1, 6, 12),
	(10, '200', 2, 7, 44);
/*!40000 ALTER TABLE `itens_de_vendas` ENABLE KEYS */;


-- Volcando estructura para tabla palmacen.lancamentos
CREATE TABLE IF NOT EXISTS `lancamentos` (
  `idLancamentos` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) DEFAULT NULL,
  `valor` varchar(15) NOT NULL,
  `data_vencimento` date NOT NULL,
  `data_pagamento` date DEFAULT NULL,
  `baixado` tinyint(1) DEFAULT NULL,
  `cliente_fornecedor` varchar(255) DEFAULT NULL,
  `forma_pgto` varchar(100) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `anexo` varchar(250) DEFAULT NULL,
  `clientes_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`idLancamentos`),
  KEY `fk_lancamentos_clientes1` (`clientes_id`),
  CONSTRAINT `fk_lancamentos_clientes1` FOREIGN KEY (`clientes_id`) REFERENCES `clientes` (`idClientes`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla palmacen.lancamentos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `lancamentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `lancamentos` ENABLE KEYS */;


-- Volcando estructura para tabla palmacen.os
CREATE TABLE IF NOT EXISTS `os` (
  `idOs` int(11) NOT NULL AUTO_INCREMENT,
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
  `serie` varchar(50) NOT NULL,
  `tipodocumento` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idOs`),
  KEY `fk_os_clientes1` (`clientes_id`),
  KEY `fk_os_usuarios1` (`usuarios_id`),
  KEY `fk_os_lancamentos1` (`lancamento`),
  CONSTRAINT `fk_os_clientes1` FOREIGN KEY (`clientes_id`) REFERENCES `clientes` (`idClientes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_os_lancamentos1` FOREIGN KEY (`lancamento`) REFERENCES `lancamentos` (`idLancamentos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_os_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`idUsuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla palmacen.os: ~15 rows (aproximadamente)
/*!40000 ALTER TABLE `os` DISABLE KEYS */;
INSERT INTO `os` (`idOs`, `dataInicial`, `dataFinal`, `garantia`, `descricaoProduto`, `defeito`, `status`, `observacoes`, `laudoTecnico`, `valorTotal`, `clientes_id`, `usuarios_id`, `lancamento`, `faturado`, `tipo`, `modelo`, `marca`, `serie`, `tipodocumento`) VALUES
	(1, '2017-02-14', '2017-02-20', '0', '0', '0', '0', '0', '0', NULL, 1, 1, NULL, 0, '0', '0', '0', '456321', 'factura'),
	(2, '2017-02-13', '2017-02-20', '0', '0', '0', '0', '0', '0', NULL, 2, 5, NULL, 0, '0', '0', '0', '521478', 'factura'),
	(3, '2017-02-10', '2017-02-20', '0', '0', '0', '0', '0', '0', NULL, 2, 4, NULL, 0, '0', '0', '0', '789654', 'factura'),
	(4, '2017-02-20', '2017-02-21', '0', '0', '0', '0', '0', '0', NULL, 1, 3, NULL, 0, '0', '0', '0', '258963', 'factura'),
	(5, '2017-02-13', '2017-02-20', '0', '0', '0', '0', '0', '0', NULL, 2, 3, NULL, 0, '0', '0', '0', '125784', 'factura'),
	(6, '2017-02-21', '1969-12-31', '0', '0', '0', '0', '0', '0', NULL, 2, 4, NULL, 0, '0', '0', '0', '047856', 'factura'),
	(7, '2017-02-22', '1969-12-31', '0', '0', '0', '0', '0', '0', NULL, 1, 3, NULL, 0, '0', '0', '0', '014431', 'factura'),
	(8, '2017-02-23', '1969-12-31', '0', '0', '0', '0', '0', '0', NULL, 1, 6, NULL, 0, '0', '0', '0', '777777777', 'factura'),
	(9, '2017-02-23', '1969-12-31', '0', '0', '0', '0', '0', '0', NULL, 2, 3, NULL, 0, '0', '0', '0', '587469', 'factura'),
	(10, '2017-02-23', '1969-12-31', '0', '0', '0', '0', '0', '0', NULL, 2, 3, NULL, 0, '0', '0', '0', '02222222', 'notacredito'),
	(11, '2017-02-23', '1969-12-31', '0', '0', '0', '0', '0', '0', NULL, 1, 3, NULL, 0, '0', '0', '0', '1112332', 'factura'),
	(12, '2017-02-23', '1969-12-31', '0', '0', '0', '0', '0', '0', NULL, 2, 10, NULL, 0, '0', '0', '0', '00455588', 'boleta'),
	(13, '2017-02-23', '1969-12-31', '0', '0', '0', '0', '0', '0', NULL, 2, 3, NULL, 0, '0', '0', '0', '000012255', 'guia'),
	(14, '2017-02-23', '1969-12-31', '0', '0', '0', '0', '0', '0', NULL, 2, 3, NULL, 0, '0', '0', '0', '4445555666', 'guia'),
	(15, '2017-02-24', '1969-12-31', '0', '0', '0', '0', '0', '0', NULL, 2, 3, NULL, 0, '0', '0', '0', '235698', 'boleta');
/*!40000 ALTER TABLE `os` ENABLE KEYS */;


-- Volcando estructura para tabla palmacen.osdetalles
CREATE TABLE IF NOT EXISTS `osdetalles` (
  `idosdetalle` int(11) NOT NULL AUTO_INCREMENT,
  `idOs` int(11) NOT NULL,
  `fechacreaciond` date NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `tipod` varchar(100) DEFAULT NULL,
  `serie` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idosdetalle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla palmacen.osdetalles: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `osdetalles` DISABLE KEYS */;
/*!40000 ALTER TABLE `osdetalles` ENABLE KEYS */;


-- Volcando estructura para tabla palmacen.permissoes
CREATE TABLE IF NOT EXISTS `permissoes` (
  `idPermissao` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `permissoes` text,
  `situacao` tinyint(1) DEFAULT NULL,
  `data` date DEFAULT NULL,
  PRIMARY KEY (`idPermissao`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla palmacen.permissoes: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `permissoes` DISABLE KEYS */;
INSERT INTO `permissoes` (`idPermissao`, `nome`, `permissoes`, `situacao`, `data`) VALUES
	(1, 'Administrador', 'a:38:{s:8:"aCliente";s:1:"1";s:8:"eCliente";s:1:"1";s:8:"dCliente";s:1:"1";s:8:"vCliente";s:1:"1";s:8:"aProduto";s:1:"1";s:8:"eProduto";s:1:"1";s:8:"dProduto";s:1:"1";s:8:"vProduto";s:1:"1";s:8:"aServico";s:1:"1";s:8:"eServico";s:1:"1";s:8:"dServico";s:1:"1";s:8:"vServico";s:1:"1";s:3:"aOs";s:1:"1";s:3:"eOs";s:1:"1";s:3:"dOs";s:1:"1";s:3:"vOs";s:1:"1";s:6:"aVenda";s:1:"1";s:6:"eVenda";s:1:"1";s:6:"dVenda";s:1:"1";s:6:"vVenda";s:1:"1";s:8:"aArquivo";s:1:"1";s:8:"eArquivo";s:1:"1";s:8:"dArquivo";s:1:"1";s:8:"vArquivo";s:1:"1";s:11:"aLancamento";s:1:"1";s:11:"eLancamento";s:1:"1";s:11:"dLancamento";s:1:"1";s:11:"vLancamento";s:1:"1";s:8:"cUsuario";s:1:"1";s:9:"cEmitente";s:1:"1";s:10:"cPermissao";s:1:"1";s:7:"cBackup";s:1:"1";s:8:"rCliente";s:1:"1";s:8:"rProduto";s:1:"1";s:8:"rServico";s:1:"1";s:3:"rOs";s:1:"1";s:6:"rVenda";s:1:"1";s:11:"rFinanceiro";s:1:"1";}', 1, '2014-09-03'),
	(2, 'Técnico', 'a:46:{s:8:"aCliente";s:1:"1";s:8:"eCliente";s:1:"1";s:8:"dCliente";s:1:"1";s:8:"vCliente";s:1:"1";s:8:"aProduto";s:1:"1";s:8:"eProduto";s:1:"1";s:8:"dProduto";s:1:"1";s:8:"vProduto";s:1:"1";s:9:"aaparatos";b:0;s:9:"eaparatos";b:0;s:9:"daparatos";b:0;s:9:"vaparatos";b:0;s:8:"aServico";s:1:"1";s:8:"eServico";s:1:"1";s:8:"dServico";s:1:"1";s:8:"vServico";s:1:"1";s:3:"aOs";s:1:"1";s:3:"eOs";s:1:"1";s:3:"dOs";s:1:"1";s:3:"vOs";s:1:"1";s:6:"aVenda";s:1:"1";s:6:"eVenda";s:1:"1";s:6:"dVenda";s:1:"1";s:6:"vVenda";s:1:"1";s:8:"aArquivo";s:1:"1";s:8:"eArquivo";s:1:"1";s:8:"dArquivo";s:1:"1";s:8:"vArquivo";s:1:"1";s:12:"aproveedores";b:0;s:12:"eproveedores";b:0;s:12:"dproveedores";b:0;s:12:"vproveedores";b:0;s:11:"aLancamento";s:1:"1";s:11:"eLancamento";s:1:"1";s:11:"dLancamento";s:1:"1";s:11:"vLancamento";s:1:"1";s:8:"cUsuario";s:1:"1";s:9:"cEmitente";s:1:"1";s:10:"cPermissao";s:1:"1";s:7:"cBackup";s:1:"1";s:8:"rCliente";s:1:"1";s:8:"rProduto";s:1:"1";s:8:"rServico";s:1:"1";s:3:"rOs";s:1:"1";s:6:"rVenda";s:1:"1";s:11:"rFinanceiro";s:1:"1";}', 1, '2017-02-23'),
	(3, 'Almacenero', 'a:46:{s:8:"aCliente";s:1:"1";s:8:"eCliente";s:1:"1";s:8:"dCliente";s:1:"1";s:8:"vCliente";s:1:"1";s:8:"aProduto";s:1:"1";s:8:"eProduto";s:1:"1";s:8:"dProduto";s:1:"1";s:8:"vProduto";s:1:"1";s:9:"aaparatos";b:0;s:9:"eaparatos";b:0;s:9:"daparatos";b:0;s:9:"vaparatos";b:0;s:8:"aServico";s:1:"1";s:8:"eServico";s:1:"1";s:8:"dServico";s:1:"1";s:8:"vServico";s:1:"1";s:3:"aOs";s:1:"1";s:3:"eOs";s:1:"1";s:3:"dOs";s:1:"1";s:3:"vOs";s:1:"1";s:6:"aVenda";s:1:"1";s:6:"eVenda";s:1:"1";s:6:"dVenda";s:1:"1";s:6:"vVenda";s:1:"1";s:8:"aArquivo";s:1:"1";s:8:"eArquivo";s:1:"1";s:8:"dArquivo";s:1:"1";s:8:"vArquivo";s:1:"1";s:12:"aproveedores";b:0;s:12:"eproveedores";b:0;s:12:"dproveedores";b:0;s:12:"vproveedores";b:0;s:11:"aLancamento";s:1:"1";s:11:"eLancamento";s:1:"1";s:11:"dLancamento";s:1:"1";s:11:"vLancamento";s:1:"1";s:8:"cUsuario";s:1:"1";s:9:"cEmitente";s:1:"1";s:10:"cPermissao";s:1:"1";s:7:"cBackup";s:1:"1";s:8:"rCliente";s:1:"1";s:8:"rProduto";s:1:"1";s:8:"rServico";s:1:"1";s:3:"rOs";s:1:"1";s:6:"rVenda";s:1:"1";s:11:"rFinanceiro";s:1:"1";}', 1, '2017-02-23');
/*!40000 ALTER TABLE `permissoes` ENABLE KEYS */;


-- Volcando estructura para tabla palmacen.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `idProdutos` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(80) NOT NULL,
  `unidade` varchar(10) DEFAULT NULL,
  `precoCompra` decimal(10,2) DEFAULT NULL,
  `precoVenda` decimal(10,2) NOT NULL,
  `estoque` int(11) NOT NULL,
  `estoqueMinimo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idProdutos`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla palmacen.produtos: ~46 rows (aproximadamente)
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` (`idProdutos`, `descricao`, `unidade`, `precoCompra`, `precoVenda`, `estoque`, `estoqueMinimo`) VALUES
	(1, 'herramienta1', 'paquetes', 100.00, 120.00, 90, 20),
	(2, 'herramienta2', 'unidades', 80.00, 100.00, 28, 5),
	(3, 'uniforme2', 'unidades', 85.00, 0.00, 45, 5),
	(4, 'RATCHET 1/2 X 1/2&quot; STANLEY 86-404 ', 'unidades', 100.00, 0.00, 49, 5),
	(5, 'DADO 1/2 X 11MM STANLEY 86-511 ', 'unidades', 100.00, 0.00, 50, 5),
	(6, 'MARTILLO 20 ONZ STANLEY 51-274 ', 'unidades', 100.00, 0.00, 50, 5),
	(7, 'CINTA PASACABLE 30 MT CON RESORTE  ', 'unidades', 100.00, 0.00, 50, 5),
	(8, 'LLAVE DE COMBINACION 10MM STANLEY 86- 855 ', 'unidades', 100.00, 0.00, 50, 5),
	(9, 'LLAVE DE COMBINACIÓN 11MM STANLEY 86- 856 ', 'unidades', 100.00, 0.00, 50, 5),
	(10, 'DESARMADORES P/CRUZ #2 X 6&quot; 65-169 ', 'unidades', 100.00, 0.00, 50, 5),
	(11, 'DESARMADOR PLANO 1/4&quot; X 6&quot; 65-193 ', 'unidades', 100.00, 0.00, 50, 5),
	(12, 'ALICATE UNIVERSAL 8&quot; STANLEY 84-056 ', 'unidades', 100.00, 0.00, 49, 5),
	(13, 'ALICATE CORTE 6&quot; STANLEY 84-054 ', 'unidades', 100.00, 0.00, 50, 5),
	(14, 'BROCA SDS PLUS 10 X 100MM DW00709 ', 'unidades', 100.00, 0.00, 50, 5),
	(15, 'BROCA PASAMURO SDS PLUS 13 X 300MM DW00715', 'unidades', 100.00, 0.00, 50, 5),
	(16, 'NIVEL TORPEDO 8&quot; MAGNETICO STANLEY 42- 291 ', 'unidades', 100.00, 0.00, 50, 5),
	(17, 'EXTENSION 30 MTS Y ACCESORIO MULTIPLE ', 'unidades', 100.00, 0.00, 50, 5),
	(18, 'CAJA HERRAMIENTAS 19&quot; 19-410 STANLEY ', 'unidades', 100.00, 0.00, 50, 5),
	(19, 'PINZA PELACABLE DUAL ', 'unidades', 100.00, 0.00, 50, 5),
	(20, 'PINZA CRIMPEADORA    ', 'unidades', 100.00, 0.00, 50, 5),
	(21, 'ROTOMARTILLO DeWalt 650W D25013K ', 'unidades', 100.00, 0.00, 50, 5),
	(22, 'SAT FINDER  ', 'unidades', 100.00, 0.00, 50, 5),
	(23, 'LLAVE INGLESA', 'unidades', 100.00, 0.00, 50, 5),
	(24, 'Arnes', 'unidades', 100.00, 0.00, 50, 5),
	(25, 'Botas_40', 'unidades', 100.00, 0.00, 50, 5),
	(26, 'Botas_41', 'unidades', 100.00, 0.00, 45, 5),
	(27, 'Botas_42', 'unidades', 100.00, 0.00, 50, 5),
	(28, 'Botas_43', 'unidades', 100.00, 0.00, 50, 5),
	(29, 'Botas_44', 'unidades', 100.00, 0.00, 50, 5),
	(30, 'Botas_45', 'unidades', 100.00, 0.00, 50, 5),
	(31, 'Casaca_M', 'unidades', 100.00, 0.00, 50, 5),
	(32, 'Casaca_S', 'unidades', 100.00, 0.00, 50, 5),
	(33, 'Casaca_XL', 'unidades', 100.00, 0.00, 50, 5),
	(34, 'Casco', 'unidades', 100.00, 0.00, 50, 5),
	(35, 'Guantes', 'unidades', 100.00, 0.00, 50, 5),
	(36, 'Lentes', 'unidades', 100.00, 0.00, 50, 5),
	(37, 'Pantalon_30', 'unidades', 100.00, 0.00, 50, 5),
	(38, 'Pantalon_31', 'unidades', 100.00, 0.00, 50, 5),
	(39, 'Pantalon_32', 'unidades', 100.00, 0.00, 50, 5),
	(40, 'Pantalon_33', 'unidades', 100.00, 0.00, 50, 5),
	(41, 'Pantalon_34', 'unidades', 100.00, 0.00, 50, 5),
	(42, 'Pantalon_35', 'unidades', 100.00, 0.00, 50, 5),
	(43, 'Pantalon_36', 'unidades', 100.00, 0.00, 50, 5),
	(44, 'Polo_M', 'unidades', 100.00, 0.00, 43, 5),
	(45, 'Polo_S', 'unidades', 100.00, 0.00, 50, 5),
	(46, 'Polo_XL', 'unidades', 100.00, 0.00, 50, 5);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;


-- Volcando estructura para tabla palmacen.produtos_os
CREATE TABLE IF NOT EXISTS `produtos_os` (
  `idProdutos_os` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` int(11) NOT NULL,
  `os_id` int(11) NOT NULL,
  `produtos_id` int(11) NOT NULL,
  `subTotal` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idProdutos_os`),
  KEY `fk_produtos_os_os1` (`os_id`),
  KEY `fk_produtos_os_produtos1` (`produtos_id`),
  CONSTRAINT `fk_produtos_os_os1` FOREIGN KEY (`os_id`) REFERENCES `os` (`idOs`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_produtos_os_produtos1` FOREIGN KEY (`produtos_id`) REFERENCES `produtos` (`idProdutos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla palmacen.produtos_os: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `produtos_os` DISABLE KEYS */;
INSERT INTO `produtos_os` (`idProdutos_os`, `quantidade`, `os_id`, `produtos_id`, `subTotal`) VALUES
	(1, 8, 1, 2, '800'),
	(2, 2, 1, 3, '170'),
	(3, 6, 3, 1, '600'),
	(4, 2, 2, 3, '170'),
	(5, 5, 14, 44, '500'),
	(6, 1, 5, 4, '100');
/*!40000 ALTER TABLE `produtos_os` ENABLE KEYS */;


-- Volcando estructura para tabla palmacen.servicos
CREATE TABLE IF NOT EXISTS `servicos` (
  `idServicos` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  PRIMARY KEY (`idServicos`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla palmacen.servicos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `servicos` DISABLE KEYS */;
INSERT INTO `servicos` (`idServicos`, `nome`, `descricao`, `preco`) VALUES
	(1, 'uniforme1', 'botas talla 40', 30.00),
	(2, 'uniforme2', 'polos talla s', 45.00);
/*!40000 ALTER TABLE `servicos` ENABLE KEYS */;


-- Volcando estructura para tabla palmacen.servicos_os
CREATE TABLE IF NOT EXISTS `servicos_os` (
  `idServicos_os` int(11) NOT NULL AUTO_INCREMENT,
  `os_id` int(11) NOT NULL,
  `servicos_id` int(11) NOT NULL,
  `subTotal` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idServicos_os`),
  KEY `fk_servicos_os_os1` (`os_id`),
  KEY `fk_servicos_os_servicos1` (`servicos_id`),
  CONSTRAINT `fk_servicos_os_os1` FOREIGN KEY (`os_id`) REFERENCES `os` (`idOs`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_servicos_os_servicos1` FOREIGN KEY (`servicos_id`) REFERENCES `servicos` (`idServicos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla palmacen.servicos_os: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `servicos_os` DISABLE KEYS */;
INSERT INTO `servicos_os` (`idServicos_os`, `os_id`, `servicos_id`, `subTotal`) VALUES
	(1, 1, 1, NULL);
/*!40000 ALTER TABLE `servicos_os` ENABLE KEYS */;


-- Volcando estructura para tabla palmacen.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuarios` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
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
  `permissoes_id` int(11) NOT NULL,
  PRIMARY KEY (`idUsuarios`),
  KEY `fk_usuarios_permissoes1_idx` (`permissoes_id`),
  CONSTRAINT `fk_usuarios_permissoes1` FOREIGN KEY (`permissoes_id`) REFERENCES `permissoes` (`idPermissao`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla palmacen.usuarios: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`idUsuarios`, `nome`, `rg`, `cpf`, `rua`, `numero`, `bairro`, `cidade`, `estado`, `email`, `senha`, `telefone`, `celular`, `situacao`, `dataCadastro`, `nivel`, `permissoes_id`) VALUES
	(1, 'ADMINISTRADOR', '44878153', '0', '-', '0', '0', '0', '0', 'admin@admin.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '-', '-', 1, '2013-11-22', 1, 1),
	(3, 'ronald alejo tuanama', '45546465', '87978789', 'dsadsd', '54456', 'dsdsasd', 'saddsa', 'peru', 'ronald152515@hotmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456', '', 1, '2017-02-20', 0, 1),
	(4, 'paul pascual caycho', '777777', '88888', 'aaaaaaa', '24', '56', 'lima', 'peru', 'pascual@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456', '', 1, '2017-02-20', 0, 1),
	(5, 'sandy vega', '122343', '34554', 'dsdfsdf', '3445', 'dggfdgf', 'fgdg', 'gfdgdfgdf', 'sandy@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '456456', '', 1, '2017-02-20', 0, 1),
	(6, 'rafael nadal', '12365478', '', 'av. manacori 852', '', '', '', '', 'rafa@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '23658974', '', 1, '2017-02-22', 0, 1),
	(7, 'aaaa', '44444', '0', 'hjbvfhghgjfv', '0', '0', '0', '0', 'prueba@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '963258', '100000', 1, '2017-02-22', 0, 1),
	(8, 'ddddd', '44444', '0', 'av. jose carlos mariategui 1900', '0', '0', '0', '0', 'admin1@admin.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '78888', '22333', 1, '2017-02-22', 0, 1),
	(9, 'qqqq', '6466454', '', 'av. jose carlos mariategui 1800', '', '', '', '', 'admin2@admin.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2837300', '', 1, '2017-02-22', 0, 1),
	(10, 'prueba2', '11111', '', 'sdsdfdf', '', '', '', '', 'java.net1@hotmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '741258', '', 1, '2017-02-22', 0, 1),
	(11, 'zzzzz', '456456654', '0', 'rrtrt', '0', '0', '0', '0', 'ronald@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '963258741', '', 1, '2017-02-22', 0, 2),
	(12, 'dfdfdfdfddf', '45564654', '', 'hjbvfhghgjfv', '', '', '', '', 'admin@admin.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '963258741', '', 1, '2017-02-22', 0, 1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;


-- Volcando estructura para tabla palmacen.vendas
CREATE TABLE IF NOT EXISTS `vendas` (
  `idVendas` int(11) NOT NULL AUTO_INCREMENT,
  `dataVenda` date DEFAULT NULL,
  `valorTotal` varchar(45) DEFAULT NULL,
  `desconto` varchar(45) DEFAULT NULL,
  `faturado` tinyint(1) DEFAULT NULL,
  `clientes_id` int(11) DEFAULT NULL,
  `usuarios_id` int(11) DEFAULT NULL,
  `lancamentos_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`idVendas`),
  KEY `fk_vendas_clientes1` (`clientes_id`),
  KEY `fk_vendas_usuarios1` (`usuarios_id`),
  KEY `fk_vendas_lancamentos1` (`lancamentos_id`),
  CONSTRAINT `fk_vendas_clientes1` FOREIGN KEY (`clientes_id`) REFERENCES `clientes` (`idClientes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vendas_lancamentos1` FOREIGN KEY (`lancamentos_id`) REFERENCES `lancamentos` (`idLancamentos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vendas_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`idUsuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla palmacen.vendas: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `vendas` DISABLE KEYS */;
INSERT INTO `vendas` (`idVendas`, `dataVenda`, `valorTotal`, `desconto`, `faturado`, `clientes_id`, `usuarios_id`, `lancamentos_id`) VALUES
	(1, '2017-02-20', NULL, NULL, 0, 1, 5, NULL),
	(2, '2017-02-21', NULL, NULL, 0, 1, 3, NULL),
	(5, '2017-02-21', NULL, NULL, 0, 1, 3, NULL),
	(6, '2017-02-18', NULL, NULL, 0, 1, 4, NULL),
	(7, '2017-02-23', NULL, NULL, 0, 1, 4, NULL);
/*!40000 ALTER TABLE `vendas` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
