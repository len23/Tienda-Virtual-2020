-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 16, 2020 at 02:54 AM
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
-- Table structure for table `carrito`
--

DROP TABLE IF EXISTS `carrito`;
CREATE TABLE IF NOT EXISTS `carrito` (
  `carrito_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`carrito_id`),
  KEY `user_id` (`user_id`),
  KEY `producto_id` (`producto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detalle_factura`
--

DROP TABLE IF EXISTS `detalle_factura`;
CREATE TABLE IF NOT EXISTS `detalle_factura` (
  `detalle_id` int(11) NOT NULL AUTO_INCREMENT,
  `producto_id` int(11) NOT NULL,
  `factura_id` int(11) NOT NULL,
  `iva` float NOT NULL,
  `cantidad` float NOT NULL,
  `precio` float NOT NULL,
  PRIMARY KEY (`detalle_id`),
  KEY `factura_id` (`factura_id`),
  KEY `producto_id` (`producto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `factura`
--

DROP TABLE IF EXISTS `factura`;
CREATE TABLE IF NOT EXISTS `factura` (
  `factura_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `factura_fecha` date NOT NULL,
  PRIMARY KEY (`factura_id`),
  KEY `usuario_id` (`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `info_factura`
--

DROP TABLE IF EXISTS `info_factura`;
CREATE TABLE IF NOT EXISTS `info_factura` (
  `info_factura_id` int(11) NOT NULL AUTO_INCREMENT,
  `factura_id` int(11) NOT NULL,
  `Nombres` varchar(50) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `nro_cedula` varchar(10) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  PRIMARY KEY (`info_factura_id`),
  KEY `factura_id` (`factura_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `PRODUCTO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CATEGORY` varchar(30) NOT NULL,
  `DESCRIPCION` varchar(100) NOT NULL,
  `IMAGE` varchar(100) NOT NULL,
  `PRECIO` float NOT NULL,
  PRIMARY KEY (`PRODUCTO_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`PRODUCTO_ID`, `CATEGORY`, `DESCRIPCION`, `IMAGE`, `PRECIO`) VALUES
(1, 'Desktop', 'COP. HP AIO ProOne 400 G5 i7-9700 8GB 1TB 23.8Inc HDMI 2USB3.1 FREE DOS Black\r\n\r\n', 'http://localhost/Tienda-Virtual-2020/images/compu-1.jpg', 540.5),
(2, 'Desktop', 'COP. DELL AIO OPTIPLEX 5270 I5-9500 8GB 256GB 21.5Inc. WC W10-Pro Black', 'http://localhost/Tienda-Virtual-2020/images/compu-2.jpg', 1041.11),
(3, 'Desktop All in One', 'COP. APPLE iMac Intel Core I5 8GB 256GB-SSD 27Inc 5K Retina 4USB3.0 OS Silver', 'http://localhost/Tienda-Virtual-2020/images/compu-3.jpg', 2348.89),
(4, 'RAM Memory', 'SO-DIMM CORSAIR VENGEANCE 32GB (1X32GB) DDR4 2400 MHZ', 'http://localhost/Tienda-Virtual-2020/images/ram-1.jpg', 186.67),
(5, 'RAM Memory', 'DIMM DELL 16GB 2Rx8 UDIMM 2666MHz ECC para T40. T140. R340', 'http://localhost/Tienda-Virtual-2020/images/ram-2.jpg', 220),
(6, 'RAM Memory', 'DIMM DELL 16GB 2Rx8 RDIMM 2933MHZ ECC para R640. R740', 'http://localhost/Tienda-Virtual-2020/images/ram-3.jpg', 197.78);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(40) NOT NULL,
  `username` varchar(30) NOT NULL,
  `register_date` timestamp NULL DEFAULT NULL,
  `names` varchar(30) NOT NULL,
  `Role` varchar(30) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`user_id`, `password`, `username`, `register_date`, `names`, `Role`) VALUES
(11, '8cb2237d0679ca88db6464eac60da96345513964', 'alex@hotmail.com', '2020-09-13 01:44:55', 'Alex Montalvo', 'customer'),
(13, 'd033e22ae348aeb5660fc2140aec35850c4da997', 'silvio_admin@hotmail.com', '2020-09-13 01:51:44', 'Silvio Montalvo', 'admin');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `FK_PRODUCT` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`PRODUCTO_ID`),
  ADD CONSTRAINT `FK_USER` FOREIGN KEY (`user_id`) REFERENCES `usuario` (`user_id`);

--
-- Constraints for table `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD CONSTRAINT `FK_FACTURA` FOREIGN KEY (`factura_id`) REFERENCES `factura` (`factura_id`),
  ADD CONSTRAINT `FK_PROD` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`PRODUCTO_ID`);

--
-- Constraints for table `info_factura`
--
ALTER TABLE `info_factura`
  ADD CONSTRAINT `FK_FACTURA_INFO` FOREIGN KEY (`factura_id`) REFERENCES `factura` (`factura_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
