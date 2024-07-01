-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01/07/2024 às 03:04
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `testphp`
--
CREATE DATABASE IF NOT EXISTS `testphp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `testphp`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `registro`
--

CREATE TABLE `registro` (
  `IDres` int(11) NOT NULL,
  `Item` varchar(100) NOT NULL,
  `Titulo` varchar(100) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `registro`
--

INSERT INTO `registro` (`IDres`, `Item`, `Titulo`, `descricao`, `img`) VALUES
(8, 'gato', 'animal', 'felno', 'gatos.jpg'),
(9, 'dog', 'cachorro', 'mini doginho', 'cachorro-mini-pet.jpg'),
(10, 'ave', 'Psittaciformes ', 'ave bonita', 'licensed-image.jfif'),
(11, 'Peixe', 'Peixe Dourado', 'O peixe-dourado-meteoro é considerado uma espécie rara, pois não possui registro cientifico comprovado. No entanto, seu surgimento seria derivado a partir de diversas mutações do peixe-dourado comum.  Dessa forma, este tipo pode realmente existir, mas é visto em raríssimas aparições.', 'peixa.jpg'),
(12, 'urso-beiçudo', 'Urso', 'O corpo do urso-beiçudo é coberto por um pelo longo e felpudo que vai de castanho-avermelhado a preto e possui um \"V\" amarelo, característico da espécie, no peito.\r\n\r\nNão são muito rápidos, mas são bons nadadores e conseguem escalar árvores altas.\r\n\r\nOs machos adultos pesam de 80 à 192 kg e as fêmeas pesam até 130 kg.\r\n\r\nTêm de 60 a 90 cm na altura da cernelha e de 1,40 a 1,90 metros de comprimento. Suas garras possuem até 8 cm de comprimento.', 'Lippenbaer.jpg'),
(13, 'águia', 'Chordata', 'A águia é o nome comum dado algumas aves de rapina da família Accipitridae, geralmente de grande porte, carnívoras, de grande acuidade visual. O nome é atribuído a animais pertencentes a gêneros diversos e não corresponde a nenhum clade taxonômico. Por vezes, dentro de um mesmo gênero ocorrem espécies conhecidas popularmente por gavião ou búteo.\r\n\r\nSuas principais presas são: coelhos, esquilos, cobras, marmotas e outros animais, principalmente roedores, de pequeno porte. Algumas espécies aliment', 'Bald_Eagle_Portrait.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`IDres`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `registro`
--
ALTER TABLE `registro`
  MODIFY `IDres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
