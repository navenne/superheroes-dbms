-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2022 at 01:20 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_superheroes`
--

-- --------------------------------------------------------

--
-- Table structure for table `ciudadanos`
--

CREATE TABLE `ciudadanos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ciudadanos`
--

INSERT INTO `ciudadanos` (`id`, `nombre`, `email`, `idUsuario`, `created_at`, `updated_at`) VALUES
(13, 'cat1', 'cat1@email.com', 24, '2022-03-05 11:40:26', NULL),
(14, 'cat2', 'cat2@email.com', 25, '2022-03-05 11:41:17', NULL),
(15, 'cat3', 'cat3@email.com', 26, '2022-03-05 11:42:56', NULL),
(16, 'cat4', 'cat4@email.com', 27, '2022-03-05 11:43:33', NULL),
(17, 'cat5', 'cat5@email.com', 28, '2022-03-05 11:44:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `evolucion`
--

CREATE TABLE `evolucion` (
  `evolucion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evolucion`
--

INSERT INTO `evolucion` (`evolucion`) VALUES
('principiante'),
('experto');

-- --------------------------------------------------------

--
-- Table structure for table `habilidades`
--

CREATE TABLE `habilidades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `habilidades`
--

INSERT INTO `habilidades` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'agilidad', '2022-02-27 15:25:01', NULL),
(2, 'puntería', '2022-02-27 15:25:01', NULL),
(3, 'salto', '2022-02-27 15:25:01', NULL),
(4, 'omnilingüismo', '2022-02-27 15:25:01', NULL),
(5, 'garras', '2022-02-27 15:25:01', NULL),
(6, 'apariencia animal', '2022-02-27 15:25:01', NULL),
(7, 'veneno', '2022-02-27 15:25:01', NULL),
(8, 'respirar bajo el agua', '2022-02-27 15:25:01', NULL),
(9, 'control del clima', '2022-02-27 15:25:01', NULL),
(10, 'supervelocidad', '2022-02-27 15:25:01', NULL),
(11, 'vuelo', '2022-02-27 15:25:01', NULL),
(12, 'escalada', '2022-02-27 15:25:01', NULL),
(13, 'sonar', '2022-02-27 15:25:01', NULL),
(14, 'superfuerza', '2022-02-27 15:25:01', NULL),
(15, 'invisibilidad', '2022-02-27 15:25:01', NULL),
(16, 'transformación animal', '2022-02-27 15:25:01', NULL),
(17, 'telepatía', '2022-02-27 15:25:01', NULL),
(18, 'clarividencia', '2022-02-27 15:25:01', NULL),
(19, 'control mental', '2022-02-27 15:25:01', NULL),
(20, 'telequinesis', '2022-02-27 15:25:01', NULL),
(21, 'visión nocturna', '2022-02-27 15:25:01', NULL),
(22, 'visión laser', '2022-02-27 15:25:01', NULL),
(23, 'manipulación del tiempo', '2022-02-27 15:25:01', NULL),
(24, 'cambio de tamaño', '2022-02-27 15:25:01', NULL),
(25, 'regeneración acelerada', '2022-02-27 15:25:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `peticiones`
--

CREATE TABLE `peticiones` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `realizada` tinyint(1) NOT NULL,
  `idSuperheroe` int(11) NOT NULL,
  `idCiudadano` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peticiones`
--

INSERT INTO `peticiones` (`id`, `titulo`, `descripcion`, `realizada`, `idSuperheroe`, `idCiudadano`, `created_at`, `updated_at`) VALUES
(12, 'Comprar pienso', 'Tengo hambre, tráeme pienso :)', 0, 33, 13, '2022-03-05 11:53:02', NULL),
(13, 'Me traes un ratón?', 'No sé si hay algo que puedas hacer...me traes un ratón?', 0, 32, 15, '2022-03-05 11:54:47', NULL),
(14, 'Vuelve a repetir ayer!', 'Ayer tenía una cena muy rica, vuelve atrás en el tiempo para que pueda volver a comérmela!', 1, 34, 15, '2022-03-05 11:55:53', '2022-03-05 12:19:17'),
(15, 'Eres admin?', 'Hola admin :)', 0, 31, 14, '2022-03-05 12:13:08', NULL),
(16, 'Hola batcat', 'Eres el mejor superhéroe!', 0, 33, 16, '2022-03-05 12:16:10', NULL),
(17, 'Hola breadcat', 'De verdad se te quedó atascado el pan? Me das un poco?', 0, 34, 17, '2022-03-05 12:16:58', NULL),
(18, 'Traer plátanos', 'Me traes un plátano?', 0, 32, 17, '2022-03-05 12:17:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `superheroes`
--

CREATE TABLE `superheroes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `evolucion` enum('principiante','experto') NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp(6) NULL DEFAULT NULL ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `superheroes`
--

INSERT INTO `superheroes` (`id`, `nombre`, `imagen`, `evolucion`, `idUsuario`, `created_at`, `updated_at`) VALUES
(31, 'admin', 'mifoto.png', 'experto', 23, '2022-03-05 11:14:28', NULL),
(32, 'bananacat', '62234dcbb4562.png', 'principiante', 29, '2022-03-05 11:47:23', NULL),
(33, 'batcat', '62234e259e2b4.png', 'principiante', 30, '2022-03-05 11:48:53', NULL),
(34, 'breadcat', '62234e7e5afa4.png', 'principiante', 31, '2022-03-05 11:50:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `superheroes_habilidades`
--

CREATE TABLE `superheroes_habilidades` (
  `id` int(11) NOT NULL,
  `idSuperheroe` int(11) NOT NULL,
  `idHabilidad` int(11) NOT NULL,
  `valor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `superheroes_habilidades`
--

INSERT INTO `superheroes_habilidades` (`id`, `idSuperheroe`, `idHabilidad`, `valor`) VALUES
(18, 32, 20, '10'),
(19, 32, 24, '20'),
(20, 33, 1, '100'),
(21, 33, 5, '50'),
(22, 33, 11, '100'),
(23, 33, 12, '20'),
(24, 33, 15, '90'),
(25, 33, 21, '100'),
(26, 34, 6, '50'),
(27, 34, 23, '90');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `psw` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `psw`, `created_at`, `updated_at`) VALUES
(23, 'admin', '$2y$10$TanwrEvesKd6oW9oMDhhFOoJBo87RNg2HtRc3pepfP1GXbny.xTem', '2022-03-05 11:11:51', NULL),
(24, 'cat1', '$2y$10$Tom0Hp5P24fqoyzk1.VBBukD6uzezArqcrF29duqJyleVcpe582YG', '2022-03-05 11:40:26', NULL),
(25, 'cat2', '$2y$10$xivSYEYNVp82MrSaxxYcIOYqxUAcw0ZpVrRgxgSuHpPs9fVW9Btci', '2022-03-05 11:41:17', NULL),
(26, 'cat3', '$2y$10$jBb0gVdqQJUnm2jeslCOD.6/Oj5jKbMCVygxVSN7Om8ugcr5YrY7u', '2022-03-05 11:42:56', NULL),
(27, 'cat4', '$2y$10$D/uDe.zY0YQ9v571Sv6xFuQopqMblcvF/4Cljzx/GfHJAHpQ.EiaW', '2022-03-05 11:43:33', NULL),
(28, 'cat5', '$2y$10$XqkSgWFrJd8o2rHYbVf6EepCT7Lz5ZK577Puc483DT.5KC7YiJN1e', '2022-03-05 11:44:04', NULL),
(29, 'bananacat', '$2y$10$rWhUWqlrxA9YZkb2ptN2iOPLfMIZo6o4wpDRCkJFKcEdwJ1dyxR9a', '2022-03-05 11:47:23', NULL),
(30, 'batcat', '$2y$10$HOoWsEfGtziF9BWJaK63kO./s0viYZDLuIQux8BL3VL0JpiGtBw2e', '2022-03-05 11:48:53', NULL),
(31, 'breadcat', '$2y$10$nC67hWZjW7VMCr/UZI0qe..akZ6fwvZqMxjLExBtlFbI7MPfcVPie', '2022-03-05 11:50:22', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ciudadanos`
--
ALTER TABLE `ciudadanos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ciudadanos_ibfk_1` (`idUsuario`);

--
-- Indexes for table `habilidades`
--
ALTER TABLE `habilidades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peticiones`
--
ALTER TABLE `peticiones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idSuperheroe` (`idSuperheroe`),
  ADD KEY `idCiudadano` (`idCiudadano`);

--
-- Indexes for table `superheroes`
--
ALTER TABLE `superheroes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indexes for table `superheroes_habilidades`
--
ALTER TABLE `superheroes_habilidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `superheroes_habilidades_ibfk_1` (`idHabilidad`),
  ADD KEY `superheroes_habilidades_ibfk_2` (`idSuperheroe`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ciudadanos`
--
ALTER TABLE `ciudadanos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `habilidades`
--
ALTER TABLE `habilidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `peticiones`
--
ALTER TABLE `peticiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `superheroes`
--
ALTER TABLE `superheroes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `superheroes_habilidades`
--
ALTER TABLE `superheroes_habilidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ciudadanos`
--
ALTER TABLE `ciudadanos`
  ADD CONSTRAINT `ciudadanos_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peticiones`
--
ALTER TABLE `peticiones`
  ADD CONSTRAINT `peticiones_ibfk_1` FOREIGN KEY (`idSuperheroe`) REFERENCES `superheroes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peticiones_ibfk_2` FOREIGN KEY (`idCiudadano`) REFERENCES `ciudadanos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `superheroes`
--
ALTER TABLE `superheroes`
  ADD CONSTRAINT `superheroes_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `superheroes_habilidades`
--
ALTER TABLE `superheroes_habilidades`
  ADD CONSTRAINT `superheroes_habilidades_ibfk_1` FOREIGN KEY (`idHabilidad`) REFERENCES `habilidades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `superheroes_habilidades_ibfk_2` FOREIGN KEY (`idSuperheroe`) REFERENCES `superheroes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
