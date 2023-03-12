-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Mar-2023 às 01:18
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `restaurante`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `email`, `username`, `contact`, `password`) VALUES
(25, 'marcelocaetano655@gmail.com', 'Gilberto Caetano', '+244942232403', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_categoria`
--

CREATE TABLE `tb_categoria` (
  `id_categoria` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `nome_imagem` varchar(250) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tb_categoria`
--

INSERT INTO `tb_categoria` (`id_categoria`, `title`, `nome_imagem`, `featured`, `active`) VALUES
(2, 'burger', 'categoria_de_comidas_819.jpg', 'sim', 'sim'),
(3, 'momo', 'categoria_de_comidas_995.jpg', 'sim', 'sim'),
(4, 'Pizza', 'categoria_de_comidas_49.jpg', 'sim', 'sim');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_comida`
--

CREATE TABLE `tb_comida` (
  `id_comida` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `nome_imagem` varchar(255) NOT NULL,
  `id_categoria` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tb_comida`
--

INSERT INTO `tb_comida` (`id_comida`, `title`, `descripcion`, `price`, `nome_imagem`, `id_categoria`, `featured`, `active`) VALUES
(4, 'burgerfive', 'Burgerfive é o Humburger mais suculento da banda', '450.00', 'comidas_861.jpg', 2, 'sim', 'sim'),
(5, 'Pizza-Calabreza', 'Essa é a pizza calabreza, a mais gostosa do país ', '2500.00', 'comidas_946.jpg', 4, 'sim', 'sim'),
(6, 'momo picante', 'momo é uma espécie de carne moída e um tempero extra-picante proveniente da India', '1200.00', 'comidas_773.jpg', 3, 'sim', 'sim'),
(7, 'burger-madrux', 'Burge-extra é o Humburger com poucas especiarias mas muito nutritivo', '750.00', 'comidas_422.jpg', 2, 'sim', 'sim'),
(8, 'momo', 'momo é uma espécie de carne moída e um tempero de toque mestre', '1200.00', 'comidas_390.jpg', 3, 'sim', 'sim'),
(9, 'Pizza-peperone', 'Essa é a pizza peperone, a mais gostosa do país ', '2500.00', 'comidas_681.jpg', 4, 'sim', 'sim');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_encomenda`
--

CREATE TABLE `tb_encomenda` (
  `id_encomenda` int(11) NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `encomenda_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_addres` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tb_encomenda`
--

INSERT INTO `tb_encomenda` (`id_encomenda`, `food`, `price`, `quantity`, `total`, `encomenda_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_addres`) VALUES
(1, 'burgerfive', '450.00', 1, '450.00', '2023-03-11 05:20:52', 'entregado', 'Gilberto Caetano', '+244942232403', 'marcelocaetano655@gmail.com', 'Luanda'),
(2, 'Pizza-Calabreza', '2500.00', 2, '5000.00', '2023-03-11 09:14:28', 'entregado', 'Josemar Mateus', '+244942232403', 'marcelocaetano655@gmail.com', 'São Paulo');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Índices para tabela `tb_categoria`
--
ALTER TABLE `tb_categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices para tabela `tb_comida`
--
ALTER TABLE `tb_comida`
  ADD PRIMARY KEY (`id_comida`);

--
-- Índices para tabela `tb_encomenda`
--
ALTER TABLE `tb_encomenda`
  ADD PRIMARY KEY (`id_encomenda`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `tb_categoria`
--
ALTER TABLE `tb_categoria`
  MODIFY `id_categoria` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_comida`
--
ALTER TABLE `tb_comida`
  MODIFY `id_comida` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tb_encomenda`
--
ALTER TABLE `tb_encomenda`
  MODIFY `id_encomenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
