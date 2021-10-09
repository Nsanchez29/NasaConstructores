-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2021 at 10:39 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nasaconstructores`
--

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `telefono` int(8) NOT NULL,
  `direccion` text NOT NULL,
  `nit` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `telefono`, `direccion`, `nit`, `estado`) VALUES
(1, 'Cliente', 12345678, 'Calle Principal San Agustin', 1234850, 1),
(2, 'Cliente 2', 876543210, 'Calle Principal 2', 234850, 1);

-- --------------------------------------------------------

--
-- Table structure for table `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL,
  `departamento` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `departamento`) VALUES
(1, 'Guatemala'),
(2, 'El Progreso'),
(3, 'Sacatepéquez'),
(4, 'Chimaltenango'),
(5, 'Escuintla'),
(6, 'Santa Rosa'),
(7, 'Sololá'),
(8, 'Totonicapán'),
(9, 'Quetzaltenango'),
(10, 'Suchitepéquez'),
(11, 'Retalhuleu'),
(12, 'San Marcos'),
(13, 'Huehuetenango'),
(14, 'Quiché'),
(15, 'Baja Verapaz'),
(16, 'Alta Verapaz'),
(17, 'Petén'),
(18, 'Izabal'),
(19, 'Zacapa'),
(20, 'Chiquimula'),
(21, 'Jalapa'),
(22, 'Jutiapa');

-- --------------------------------------------------------

--
-- Table structure for table `egreso`
--

CREATE TABLE `egreso` (
  `id_egreso` int(11) NOT NULL,
  `proyecto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `egreso`
--

INSERT INTO `egreso` (`id_egreso`, `proyecto`, `id_usuario`, `fecha`, `monto`, `descripcion`, `estado`) VALUES
(1, 1, 1, '2021-10-03', '200.00', 'Gasolina', 1),
(2, 1, 1, '2021-10-03', '200.00', 'Gastos', 1),
(3, 1, 1, '2021-10-03', '150.00', 'otros', 1),
(4, 1, 1, '2021-10-03', '50.00', 'otros 2', 0),
(5, 1, 1, '2021-10-03', '250.00', 'PRUEBA', 1),
(6, 1, 2, '2021-10-03', '935.20', 'Comida', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ingreso`
--

CREATE TABLE `ingreso` (
  `id_ingreso` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ingreso`
--

INSERT INTO `ingreso` (`id_ingreso`, `id_proyecto`, `fecha`, `monto`, `descripcion`, `estado`) VALUES
(1, 1, '2021-10-03', '50000.00', 'Anticipo de proyecto Prueba', 1);

-- --------------------------------------------------------

--
-- Table structure for table `municipio`
--

CREATE TABLE `municipio` (
  `id_municipio` int(11) NOT NULL,
  `municipio` text NOT NULL,
  `id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `municipio`
--

INSERT INTO `municipio` (`id_municipio`, `municipio`, `id_departamento`) VALUES
(1, 'Guatemala', 1),
(2, 'Santa Catarina Pinula', 1),
(3, 'San José Pinula', 1),
(4, 'San José del Golfo', 1),
(5, 'Palencia', 1),
(6, 'Chinautla', 1),
(7, 'San Pedro Ayampuc', 1),
(8, 'Mixco', 1),
(9, 'San Pedro Sacatepéquez', 1),
(10, 'San Juan Sacatepéquez', 1),
(11, 'San Raymundo', 1),
(12, 'Chuarrancho', 1),
(13, 'Fraijanes', 1),
(14, 'Amatitlán', 1),
(15, 'Villa Nueva', 1),
(16, 'Villa Canales', 1),
(17, 'Petapa', 1),
(18, 'Guastatoya', 2),
(19, 'Morazán', 2),
(20, 'San Agustín Acasaguastlán', 2),
(21, 'San Cristóbal Acasaguastlán', 2),
(22, 'El Jícaro', 2),
(23, 'Sansare', 2),
(24, 'Sanarate', 2),
(25, 'San Antonio la Paz', 2),
(26, 'Antigua Guatemala', 3),
(27, 'Jocotenango', 3),
(28, 'Pastores', 3),
(29, 'Sumpango', 3),
(30, 'Santo Domingo Xenacoj', 3),
(31, 'Santiago Sacatepéquez', 3),
(32, 'San Bartolomé Milpas Altas', 3),
(33, 'San Lucas Sacatepéquez', 3),
(34, 'Santa Lucía Milpas Altas', 3),
(35, 'Magdalena Milpas Altas', 3),
(36, 'Santa María de Jesús', 3),
(37, 'Ciudad Vieja', 3),
(38, 'San Miguel Dueñas', 3),
(39, 'Alotenango', 3),
(40, 'San Antonio Aguas Calientes', 3),
(41, 'Santa Catarina Barahona', 3);

-- --------------------------------------------------------

--
-- Table structure for table `proyecto`
--

CREATE TABLE `proyecto` (
  `id_proyecto` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `municipio` int(11) NOT NULL,
  `departamento` int(11) NOT NULL,
  `direccion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `contrato` text NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `nog` text NOT NULL,
  `estadoproyecto` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proyecto`
--

INSERT INTO `proyecto` (`id_proyecto`, `id_cliente`, `nombre`, `municipio`, `departamento`, `direccion`, `precio`, `contrato`, `fecha_inicio`, `fecha_fin`, `nog`, `estadoproyecto`, `estado`) VALUES
(1, 1, 'Proyecto de prueba 1', 1, 1, 'Calle Principal Barrio Guaytan 1', '82000.00', 'SN0010', '2021-10-01', '2021-10-17', 'Nog10', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `rol` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`id_rol`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Gerencia'),
(3, 'Secretaria');

-- --------------------------------------------------------

--
-- Table structure for table `transferencia`
--

CREATE TABLE `transferencia` (
  `id_transferencia` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_usuariodest` int(11) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` date NOT NULL,
  `tipo` text NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transferencia`
--

INSERT INTO `transferencia` (`id_transferencia`, `id_usuario`, `id_usuariodest`, `monto`, `descripcion`, `fecha`, `tipo`, `estado`) VALUES
(1, 1, 1, '6000.00', 'Salario', '2021-10-03', 'PROPIA', 1),
(2, 1, 2, '2000.00', 'Gastos internos', '2021-10-03', 'TERCEROS', 1),
(3, 1, 2, '8200.00', 'Otros Gastos', '2021-10-03', 'TERCEROS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `usuario` text NOT NULL,
  `password` text NOT NULL,
  `estado` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `usuario`, `password`, `estado`, `id_rol`) VALUES
(1, 'Néstor Antonio Sánchez Larios', 'nsanchez', '$2y$10$SxML3yNqwHV2Z4Odug1pGem6ITsJ0GpJ3gZo.0mGuy7gkggigSDsO', 1, 1),
(2, 'Antonio Salvador Sánchez Ayala', 'asanchez', '$2y$10$kb3coAoKDkmpvcvhKhBXXeAZYk1mDJLB0hKPar/tS2X0LTy4Kethy', 1, 2),
(3, 'Irma Beatriz Vásquez', 'ivasquez', '$2y$10$XYdSrjVLoADIan9VjkqMq.5u/6FKvGtWDxRSU7PcagPXwlZmruhk6', 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indexes for table `egreso`
--
ALTER TABLE `egreso`
  ADD PRIMARY KEY (`id_egreso`),
  ADD KEY `proyecto` (`proyecto`);

--
-- Indexes for table `ingreso`
--
ALTER TABLE `ingreso`
  ADD PRIMARY KEY (`id_ingreso`),
  ADD KEY `id_proyecto` (`id_proyecto`);

--
-- Indexes for table `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id_municipio`),
  ADD KEY `id_departamento` (`id_departamento`);

--
-- Indexes for table `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`id_proyecto`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indexes for table `transferencia`
--
ALTER TABLE `transferencia`
  ADD PRIMARY KEY (`id_transferencia`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `egreso`
--
ALTER TABLE `egreso`
  MODIFY `id_egreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ingreso`
--
ALTER TABLE `ingreso`
  MODIFY `id_ingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id_municipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transferencia`
--
ALTER TABLE `transferencia`
  MODIFY `id_transferencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `egreso`
--
ALTER TABLE `egreso`
  ADD CONSTRAINT `proyecto` FOREIGN KEY (`proyecto`) REFERENCES `proyecto` (`id_proyecto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ingreso`
--
ALTER TABLE `ingreso`
  ADD CONSTRAINT `id_proyecto` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `id_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proyecto`
--
ALTER TABLE `proyecto`
  ADD CONSTRAINT `id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transferencia`
--
ALTER TABLE `transferencia`
  ADD CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `id_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
