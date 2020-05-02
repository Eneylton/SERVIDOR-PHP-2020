-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Abr-2020 às 15:58
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_help`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`) VALUES
(1, 'Eneylton Barros', 'enaylton@gmail.com'),
(2, 'Isabelly  Barros', 'isableeli@gmail.com'),
(3, 'Kamilla Cris', 'kamilla@gmail'),
(4, 'Jamila Barros', 'jamila@hotmail.com'),
(5, 'Estella Quia', 'estell@gmail.com'),
(6, 'Jacare Mendonsa', 'jac@gmail.co,'),
(7, 'Marianan Barros', 'marian@gmail.com'),
(8, 'Felippe Compos', 'felipe@gmail.com'),
(9, 'Sandra Santos', 'sadra@gmail.com'),
(10, 'Livia Barros', 'livinh@gmail.com'),
(11, 'Karrina Elanne', 'akka@gmail'),
(12, 'Ellane Almeida', 'souza@gmail.com'),
(13, 'Carlos Cesar', 'livinh@gmail.com'),
(14, 'Emiliano sousa ', 'livinh@gmail.com'),
(15, 'Wellington Corria', 'livinh@gmail.com'),
(16, 'Saulo Dimas', 'souza@gmail.com'),
(17, 'Karlo Secas', 'souza@gmail.com'),
(18, 'Jose emiliano Cutrim', 'souza@gmail.com'),
(19, 'Tersia', 'souza@gmail.com'),
(20, 'Gorette Correia', 'souza@gmail.com'),
(21, 'Luis', 'souza@gmail.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
