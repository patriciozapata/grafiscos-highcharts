-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-04-2019 a las 03:22:59
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `comisites`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_neg_sitio`
--

CREATE TABLE `tabla_neg_sitio` (
  `SITIO_COD` varchar(50) DEFAULT NULL,
  `ESTADO_SITIO` varchar(53) DEFAULT NULL,
  `SITIO_NOMBRE` varchar(53) DEFAULT NULL,
  `SITIO_DIRECCION` varchar(53) DEFAULT NULL,
  `COORD_LAT` varchar(50) DEFAULT NULL,
  `COORD_LON` varchar(50) DEFAULT NULL,
  `REG_ID` varchar(50) DEFAULT NULL,
  `COM_ID` varchar(50) DEFAULT NULL,
  `TEST_NOMBRE` varchar(50) DEFAULT NULL,
  `EST_ALTURA` varchar(50) DEFAULT NULL,
  `METROS_ARRENDADOS` varchar(50) DEFAULT NULL,
  `SITIO_PROPIETARIO` varchar(50) DEFAULT NULL,
  `NAT_NOMBRE` varchar(50) DEFAULT NULL,
  `TSIT_NOMBRE` varchar(50) DEFAULT NULL,
  `CAT_NOMBRE` varchar(50) DEFAULT NULL,
  `CAT_NOMBRE_2` varchar(50) DEFAULT NULL,
  `CAT_NOMBRE_3` varchar(50) DEFAULT NULL,
  `CONDICION_LDA` varchar(50) DEFAULT NULL,
  `SITIO_CODPOSTAL` varchar(50) DEFAULT NULL,
  `SITIO_ALTURA_PARARRAYOS` varchar(50) DEFAULT NULL,
  `SITIO_TIPO_ARMONIZACION` varchar(50) DEFAULT NULL,
  `SITIO_ENTEL` varchar(50) DEFAULT NULL,
  `TIPO_RED` varchar(50) DEFAULT NULL,
  `ICAR` varchar(50) DEFAULT NULL,
  `FDT` varchar(50) DEFAULT NULL,
  `LLOO` varchar(50) DEFAULT NULL,
  `BAFI` varchar(50) DEFAULT NULL,
  `nombre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tabla_neg_sitio`
--

INSERT INTO `tabla_neg_sitio` (`SITIO_COD`, `ESTADO_SITIO`, `SITIO_NOMBRE`, `SITIO_DIRECCION`, `COORD_LAT`, `COORD_LON`, `REG_ID`, `COM_ID`, `TEST_NOMBRE`, `EST_ALTURA`, `METROS_ARRENDADOS`, `SITIO_PROPIETARIO`, `NAT_NOMBRE`, `TSIT_NOMBRE`, `CAT_NOMBRE`, `CAT_NOMBRE_2`, `CAT_NOMBRE_3`, `CONDICION_LDA`, `SITIO_CODPOSTAL`, `SITIO_ALTURA_PARARRAYOS`, `SITIO_TIPO_ARMONIZACION`, `SITIO_ENTEL`, `TIPO_RED`, `ICAR`, `FDT`, `LLOO`, `BAFI`, `nombre`) VALUES
('ONUTA002', 'OPERATIVO', 'ZOFRI-1', 'AVENIDA OFICINA SALITRERA VICTORIA 2', '-20,20498439', '-70,1371124', 'Región de Tarapacá', 'Iquique', 'Sin Información', '', '', '', 'Urbano', 'ONU', 'Estratégico', 'Estratégico', 'Estratégico', 'Sin Información', '1100000', '', '', 'SI', 'RED FIJA', 'Sin Información', 'Sin Información', 'Sin Información', 'Sin Información\r', NULL),
('ONUTA003', 'OPERATIVO', 'ZOFRI-2', 'AVENIDA OFICINA SALITRERA VICTORIA 2', '-20,20498439', '-70,1371124', 'Región de Tarapacá', 'Iquique', 'Sin Información', '', '', '', 'Urbano', 'ONU', 'Estratégico', 'Estratégico', 'Estratégico', 'Sin Información', '1100000', '', '', 'SI', 'RED FIJA', 'Sin Información', 'Sin Información', 'Sin Información', 'Sin Información\r', NULL),
('PA543', 'OPERATIVO', 'ZONA FRANCA PUNTA ARENAS', 'AV. BULNES KM 3.5 NORTE ZONA FRANCA', '-53,13194444', '-70,87583334', 'Región de Magallanes y de la Antártica Chilena', 'Punta Arenas', 'Microsite/Inbuilding', '', '', '', 'Urbano', 'Micro Indoor', 'Normal', 'Normal', 'Normal', 'Sin Información', '6200000', '', '', 'SI', 'RED MOVIL', 'Sin Información', 'Sin Información', 'Sin Información', 'Sin Información\r', NULL),
('RS139', 'OPERATIVO', 'ZOZIMO ERRAZURIZ', 'ERRAZURIZ 251 EL MONTE', '-33,29966098', '-70,77347494', 'Región Metropolitana de Santiago', 'El Monte', 'Autosoportada', '30', '', 'Entel PCS', 'Urbano', 'Macro', 'Estratégico Plus', 'Estratégico', 'Estratégico Plus', 'Sin Información', '9810000', '', '', 'SI', 'RED MOVIL', 'ICAR', 'FDT', 'NO LLOO', 'BAFI\r', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
