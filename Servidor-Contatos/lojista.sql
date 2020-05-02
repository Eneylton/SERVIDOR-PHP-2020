-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Abr-2020 às 01:11
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
-- Banco de dados: `db_lojas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `lojista`
--

CREATE TABLE `lojista` (
  `id` int(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `whatsapp` varchar(50) NOT NULL,
  `hinstagram` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `cep` varchar(30) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `bairro` varchar(10) NOT NULL,
  `numero` int(10) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `lojista`
--

INSERT INTO `lojista` (`id`, `nome`, `telefone`, `email`, `whatsapp`, `hinstagram`, `facebook`, `cep`, `endereco`, `bairro`, `numero`, `cidade`, `estado`, `foto`) VALUES
(1, 'Eneylton Barros', '98991581962', 'eneylton@hotmail.com', '98991581962', 'eneyltonbarros', 'eneylton.barros', '65054530', 'Rua Três', 'Cohatrac I', 89, 'São Luís', 'MA', 'uu'),
(2, 'Elias Barros ', '988979050', 'elias@gmail.com', '98991581962 ', 'eneyltonbarros', 'eneylton.barros', '65054530', 'Rua Três', 'Cohatrac I', 36, 'São Luís', 'MA', 'Oook'),
(3, 'Karinna Silva', '98991581962', 'eneylton@hotmail.com', 'whatsapp', 'hinstagram', 'Facebbok', '65054530', 'Rua Três', 'Cohatrac I', 52, 'São Luís', 'MA', 'ok'),
(4, 'Samuel Cristo', '98991581962', 'eneylton@hotmail.com', 'what', 'hinst', 'face', '65054530', 'Rua Três', 'Cohatrac I', 15, 'São Luís', 'MA', 'ok'),
(5, 'Joao Barcelar ', '8985654', 'jao@hotmail.com', 'whatspp', 'hnistagr', 'face', '65054700', 'Rua Treze', 'Cohatrac I', 52, 'São Luís', 'MA', '96'),
(6, 'Horlado Cardoso', '98 965652', 'horlaa@gmail.com', 'whatasp', 'hinstgran', 'face', '65054410', 'Rua Um', 'Cohatrac I', 14, 'São Luís', 'MA', '85'),
(7, 'Marianna Gimendes', '98991581962', 'eneylton@hotmail.com', 'Whatsapp', 'hinstagean', 'facebokk', '65054530', 'Rua Três', 'Cohatrac I', 15, 'São Luís', 'MA', 'ok'),
(8, 'Kamilla Cristina ', '9856665888', 'eneylton@hotmail.com', 'whatspp', 'hinstagran', 'facebook', '65054530', 'Rua Três', 'Cohatrac I', 33, 'São Luís', 'MA', 'ok'),
(9, 'Tarantino Roots', '98991581962', 'eneylton@hotmail.com', 'ww', 'ww', 'ww', '65054530', 'Rua Três', 'Cohatrac I', 14, 'São Luís', 'MA', 'ok'),
(10, 'Priscila', '98991581962', 'eneylton@hotmail.com', 'ee', 'ee', 'ee', '65054530', 'Rua Três', 'Cohatrac I', 14, 'São Luís', 'MA', 'rr'),
(11, 'Solianne Colto', '98991581962', 'eneylton@hotmail.com', 'r', 'r', 'r', '65054530', 'Rua Três', 'Cohatrac I', 14, 'São Luís', 'MA', ''),
(12, 'Milagres Souto', '98991581962', 'eneylton@hotmail.com', '', '', '', '65054530', 'Rua Três', 'Cohatrac I', 0, 'São Luís', 'MA', ''),
(13, 'Karlla Sila', '98991581962', 'eneylton@hotmail.com', '', '', '', '65054530', 'Rua Três', 'Cohatrac I', 0, 'São Luís', 'MA', ''),
(14, 'Rodrigoo Castro', '98991581962', 'eneylton@hotmail.com', '', '', '', '65054530', 'Rua Três', 'Cohatrac I', 0, 'São Luís', 'MA', ''),
(15, 'Siprianno Costa', '98991581962', 'eneylton@hotmail.com', '', '', '', '65054530', 'Rua Três', 'Cohatrac I', 0, 'São Luís', 'MA', ''),
(16, 'Glesia Dantas', '98991581962', 'eneylton@hotmail.com', '', '', '', '65054530', 'Rua Três', 'Cohatrac I', 0, 'São Luís', 'MA', ''),
(17, 'Samiras Cristinna', '98991581962', 'eneylton@hotmail.com', '', '', '', '65054530', 'Rua Três', 'Cohatrac I', 0, 'São Luís', 'MA', ''),
(18, 'Taleessa rihanna', '98991581962', 'eneylton@hotmail.com', '', '', '', '65054530', 'Rua Três', 'Cohatrac I', 0, 'São Luís', 'MA', ''),
(19, 'Mornna Silva', '98991581962', 'eneylton@hotmail.com', '', '', '', '65054530', 'Rua Três', 'Cohatrac I', 0, 'São Luís', 'MA', ''),
(20, 'Morranna Marienna', '98991581962', 'eneylton@hotmail.com', '', '', '', '65054530', 'Rua Três', 'Cohatrac I', 0, 'São Luís', 'MA', ''),
(21, 'Carlos Eduado', '98991581962', 'eneylton@hotmail.com', '', '', '', '65054530', 'Rua Três', 'Cohatrac I', 0, 'São Luís', 'MA', ''),
(22, 'Roberta Portela', '98991581962', 'eneylton@hotmail.com', '', '', '', '65054530', 'Rua Três', 'Cohatrac I', 0, 'São Luís', 'MA', ''),
(23, 'Camdese Drea', '98991581962', 'eneylton@hotmail.com', '', '', '', '65054530', 'Rua Três', 'Cohatrac I', 0, 'São Luís', 'MA', ''),
(24, 'Xashar Robens', '9898655', 'eneylton@hotmail.com', '', '', '', '65054530', 'Rua Três', 'Cohatrac I', 0, 'São Luís', 'MA', ''),
(25, 'Capitan oliyde', '98991581962', 'eneylton@hotmail.com', '', '', '', '65054530', 'Rua Três', 'Cohatrac I', 0, 'São Luís', 'MA', ''),
(26, 'Cris Elda', '98991581962', 'eneylton@hotmail.com', '', '', '', '65054530', 'Rua Três', 'Cohatrac I', 0, 'São Luís', 'MA', ''),
(27, 'Cheldon Fraudo', '98991581962', 'eneylton@hotmail.com', '', '', '', '65054530', 'Rua Três', 'Cohatrac I', 0, 'São Luís', 'MA', ''),
(28, 'Penny Santo', '98991581962', 'eneylton@hotmail.com', '', '', '', '65054530', 'Rua Três', 'Cohatrac I', 0, 'São Luís', 'MA', ''),
(29, 'Priscila Amorin', '98991581962', 'samba@hotmail.com', '', '', '', '65054530', 'Rua Três', 'Cohatrac I', 0, 'São Luís', 'MA', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `lojista`
--
ALTER TABLE `lojista`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `lojista`
--
ALTER TABLE `lojista`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
