-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 12, 2020 at 05:40 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tienda_virtual`
--

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `CLIENTE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_` varchar(30) NOT NULL,
  `CLIENTE_CED` decimal(10,0) NOT NULL,
  `CLIENTE_TLFCONVENCIONAL` decimal(15,0) NOT NULL,
  `CLIENTE_TLFCELULAR` decimal(15,0) DEFAULT NULL,
  `CLIENTE_DIRECCION` varchar(50) NOT NULL,
  `CLIENTE_EMAIL` varchar(30) NOT NULL,
  `CLIENTE_ESTADO` varchar(30) NOT NULL,
  PRIMARY KEY (`CLIENTE_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `compra`
--

DROP TABLE IF EXISTS `compra`;
CREATE TABLE IF NOT EXISTS `compra` (
  `COMPRA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PROVEEDOR_ID` int(11) NOT NULL,
  `PROVEEDOR_RUC` varchar(30) NOT NULL,
  `PRODUCTO_ID` int(11) NOT NULL,
  `INVENTARIO_ID` int(11) NOT NULL,
  `COMPRA_NROFACTURA` decimal(10,0) NOT NULL,
  `COMPRA_VALORBASE` float NOT NULL,
  `COMPRA_IVA` float NOT NULL,
  `COMPRA_VALORTOTAL` float NOT NULL,
  PRIMARY KEY (`COMPRA_ID`),
  KEY `FK_COMPRA_PRODUCTO` (`PRODUCTO_ID`),
  KEY `FK_INVENTARIO_COMPRA` (`INVENTARIO_ID`),
  KEY `FK_PROVEEDOR_COMPRA` (`PROVEEDOR_ID`,`PROVEEDOR_RUC`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detalle_factura`
--

DROP TABLE IF EXISTS `detalle_factura`;
CREATE TABLE IF NOT EXISTS `detalle_factura` (
  `DETALLEFAC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PRODUCTO_ID` int(11) NOT NULL,
  `FACTURA_ID` int(11) NOT NULL,
  `DETALLEFAC_NROUNIDADES` decimal(10,0) NOT NULL,
  `DETALLEFAC_VALORUNITARIO` float NOT NULL,
  `DETALLEFAC_IVA` float NOT NULL,
  `DETALLEFAC_VALORTOTAL` float NOT NULL,
  PRIMARY KEY (`DETALLEFAC_ID`),
  KEY `FK_DETALLE_FACTURA_FACTURA` (`PRODUCTO_ID`),
  KEY `FK_FACTURA_DETALLE_FACTURA` (`FACTURA_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detalle_pedido`
--

DROP TABLE IF EXISTS `detalle_pedido`;
CREATE TABLE IF NOT EXISTS `detalle_pedido` (
  `DETALLEPEDIDO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PRODUCTO_ID` int(11) NOT NULL,
  `PEDIDO_ID` int(11) NOT NULL,
  `DETALLEPEDIDO_NROUNIDADES` decimal(10,0) NOT NULL,
  PRIMARY KEY (`DETALLEPEDIDO_ID`),
  KEY `FK_PEDIDO_DETALLE_PEDIDO` (`PEDIDO_ID`),
  KEY `FK_PRODUCTO_DETALLE_PEDIDO` (`PRODUCTO_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `factura`
--

DROP TABLE IF EXISTS `factura`;
CREATE TABLE IF NOT EXISTS `factura` (
  `FACTURA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CLIENTE_ID` int(11) NOT NULL,
  `USUARIO_ID` int(11) NOT NULL,
  `USUARIO_CEDULA` varchar(10) NOT NULL,
  `FACTURA_FECHA` timestamp NOT NULL,
  `FACTURA_ESTADO` varchar(30) NOT NULL,
  PRIMARY KEY (`FACTURA_ID`),
  KEY `FK_FACTURA_CLIENTE` (`CLIENTE_ID`),
  KEY `FK_RELATIONSHIP_3` (`USUARIO_ID`,`USUARIO_CEDULA`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventario`
--

DROP TABLE IF EXISTS `inventario`;
CREATE TABLE IF NOT EXISTS `inventario` (
  `INVENTARIO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PRODUCTO_ID` int(11) NOT NULL,
  `PROVEEDOR_ID` int(11) NOT NULL,
  `PROVEEDOR_RUC` varchar(30) NOT NULL,
  `INVENTARIO_NROUNIDADES` decimal(10,0) NOT NULL,
  PRIMARY KEY (`INVENTARIO_ID`),
  KEY `FK_INVENTARIO_PROVEEDOR` (`PROVEEDOR_ID`,`PROVEEDOR_RUC`),
  KEY `FK_PRODUCTO_INVENTARIO` (`PRODUCTO_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `PEDIDO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USUARIO_ID` int(11) NOT NULL,
  `USUARIO_CEDULA` varchar(10) NOT NULL,
  `CLIENTE_ID` int(11) NOT NULL,
  `PEDIDO_FECHA` timestamp NOT NULL,
  `PEDIDO_FECHADESPACHO` timestamp NOT NULL,
  `PEDIDO_ESTADO` varchar(30) NOT NULL,
  `PEDIDO_OBSERVACION` varchar(100) NOT NULL,
  `PEDIDO_FORMAENTREGA` varchar(30) NOT NULL,
  `PEDIDO_REPONSABLEENTREGA` varchar(50) NOT NULL,
  PRIMARY KEY (`PEDIDO_ID`),
  KEY `FK_PEDIDO_CLIENTE` (`CLIENTE_ID`),
  KEY `FK_USUARIO_PEIDO` (`USUARIO_ID`,`USUARIO_CEDULA`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permiso`
--

DROP TABLE IF EXISTS `permiso`;
CREATE TABLE IF NOT EXISTS `permiso` (
  `PERMISO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PERMISO_DESPERMISO` varchar(30) NOT NULL,
  PRIMARY KEY (`PERMISO_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `PRODUCTO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(30) NOT NULL,
  `DESCRIPCION` varchar(100) NOT NULL,
  `IMAGE` varchar(100) NOT NULL,
  `PRECIO` float NOT NULL,
  PRIMARY KEY (`PRODUCTO_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`PRODUCTO_ID`, `NOMBRE`, `DESCRIPCION`, `IMAGE`, `PRECIO`) VALUES
(1, 'Desktop', 'COP. HP AIO ProOne 400 G5 i7-9700 8GB 1TB 23.8Inc HDMI 2USB3.1 FREE DOS Black\r\n\r\n', './images/compu-1.jpg', 540.5),
(2, 'Desktop', 'COP. DELL AIO OPTIPLEX 5270 I5-9500 8GB 256GB 21.5Inc. WC W10-Pro Black', './images/compu-2.jpg', 1041.11),
(3, 'Desktop All in One', 'COP. APPLE iMac Intel Core I5 8GB 256GB-SSD 27Inc 5K Retina 4USB3.0 OS Silver', './images/compu-3.jpg', 2348.89),
(4, 'RAM Memory', 'SO-DIMM CORSAIR VENGEANCE 32GB (1X32GB) DDR4 2400 MHZ', './images/ram-1.jpg', 186.67),
(5, 'RAM Memory', 'DIMM DELL 16GB 2Rx8 UDIMM 2666MHz ECC para T40. T140. R340', './images/ram-2.jpg', 220),
(6, 'RAM Memory', 'DIMM DELL 16GB 2Rx8 RDIMM 2933MHZ ECC para R640. R740', './images/ram-3.jpg', 197.78);

-- --------------------------------------------------------

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE IF NOT EXISTS `proveedor` (
  `PROVEEDOR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PROVEEDOR_NOMBRE` varchar(30) NOT NULL,
  `PROVEEDOR_RUC` varchar(30) NOT NULL,
  `PROVEEDOR_DIRECCION` varchar(50) NOT NULL,
  `PROVEEDOR_CIUDAD` varchar(30) NOT NULL,
  `PROVEEDOR_TLFCONVENCIONAL` decimal(15,0) NOT NULL,
  `PROVEEDOR_TLFCELULAR` decimal(10,0) NOT NULL,
  `PROVEEDOR_EMAIL` varchar(30) NOT NULL,
  `PROVEEDOR_CONTACTO` varchar(30) DEFAULT NULL,
  `PROVEEDOR_ESTADO` varchar(30) NOT NULL,
  PRIMARY KEY (`PROVEEDOR_ID`,`PROVEEDOR_RUC`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `ci` varchar(10) NOT NULL,
  `password` varchar(40) NOT NULL,
  `username` varchar(30) NOT NULL,
  `USUARIO_ESTADO` varchar(20) DEFAULT NULL,
  `USUARIO_FECHAINGRES` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`ci`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`user_id`, `ci`, `password`, `username`, `USUARIO_ESTADO`, `USUARIO_FECHAINGRES`) VALUES
(6, '0401485370', '8cb2237d0679ca88db6464eac60da96345513964', 'lenin.montalvo@hotmail.com', NULL, NULL),
(3, '0203948576', '8cb2237d0679ca88db6464eac60da96345513964', 'Alex', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usuario_permiso`
--

DROP TABLE IF EXISTS `usuario_permiso`;
CREATE TABLE IF NOT EXISTS `usuario_permiso` (
  `USUARIO_ID` int(11) NOT NULL,
  `USUARIO_CEDULA` varchar(10) NOT NULL,
  `PERMISO_ID` int(11) NOT NULL,
  PRIMARY KEY (`USUARIO_ID`,`USUARIO_CEDULA`,`PERMISO_ID`),
  KEY `FK_USUARIO_PERMISO2` (`PERMISO_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
